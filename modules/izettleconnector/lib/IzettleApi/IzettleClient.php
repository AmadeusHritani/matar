<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

namespace IzettleApi;

use DateTime;
use IzettleApi\API\Universal\IzettleHttpResponse;
use IzettleApi\API\Universal\IzettlePostableInterface;
use IzettleApi\Client\AccessToken;
use IzettleApi\Client\ApiScope;
use IzettleApi\Client\Exception\AccessTokenExpiredException;
use IzettleApi\Client\Exception\NotFoundException;
use IzettleApi\Exception\IzettleApiConnectionException;
use IzettleApi\Exception\UnprocessableEntityException;
use IzettleApi\Utils\IzettleLogger;
use IzettleApi\Utils\Cipher;
use IzettleApi\Utils\AuthorizationCache;
use IzettleApi\Utils\RefreshTokenStoreInterface;

class IzettleClient implements IzettleClientInterface
{

    /**
     * Private Variable
     *
     * @var int $expiryBufferTime
     */
    public static $expiryBufferTime = 150;

    const HEADER_SEPARATOR = ';';
    const HTTP_GET = 'GET';
    const HTTP_POST = 'POST';
    const HTTP_PUT = 'PUT';
    const HTTP_PATCH = 'PATCH';
    const HTTP_DELETE = 'DELETE';

    const MODE_REFRESH = 'REFRESH';
    const MODE_API_KEY = 'API_KEY';

    private $mode = self::MODE_REFRESH;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $refreshToken;


    /**
     * @var Utils\RefreshTokenStoreInterface
     */
    private $refreshTokenStore;

    private $autoRefresh = true;

    private $logger;

    private $isCacheAccessToken = true;

    private $cachePath = null;

    private $curlOptions;

    /**
     * Instance of cipher used to encrypt/decrypt data while storing in cache.
     *
     * @var Cipher
     */
    private $cipher;

    public function __construct($clientId, $clientSecret, $logPath = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->logger = $logPath == null ? new IzettleLogger(__CLASS__) : new IzettleLogger(__CLASS__, $logPath);
        $this->logger->setLoggingLevel('DEBUG');
        $this->cipher = new Cipher($this->clientSecret);
        $this->curlOptions = self::DEFAULT_CURL_OPTIONS;
        $curl = curl_version();
        $sslVersion = isset($curl['ssl_version']) ? $curl['ssl_version'] : '';
        if($sslVersion && substr_compare($sslVersion, "NSS/", 0, strlen("NSS/")) === 0) {
            //Remove the Cipher List for NSS
            unset($this->curlOptions[CURLOPT_SSL_CIPHER_LIST]);
        }
    }


    public function setAccessToken(AccessToken $accessToken)//: void
    {
        $this->accessToken = $accessToken;
        $this->validateAccessToken();
    }

    /**
     * @param $redirectUrl
     * @param ApiScope $apiScope
     * @return string
     */
    public function getAuthoriseUserLogin($redirectUrl, $apiScope, $state = null)//: string
    {
        $url = self::API_AUTHORIZE_USER_LOGIN_URL;
        $url .= '?response_type=code';
        $url .= '&redirect_uri=' . $redirectUrl;
        $url .= '&client_id=' . $this->clientId;
        $url .= '&scope=' . $apiScope->getUrlParameters();
        $url .= '&state=' . ($state == null ? md5(microtime()) : $state);

        return $url;
    }

    
    public function getRefreshTokenFromAuthorizedCode($redirectUrl, $code)//: AccessToken
    {
        $options = [
            'grant_type'    => self::API_ACCESS_TOKEN_CODE_GRANT,
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri'  => $redirectUrl,
            'code'          => $code
        ];

        try {
            //force means overwrite cached token value
            $this->setAccessToken($this->requestAccessToken(self::API_ACCESS_TOKEN_REQUEST_URL, $options, true));
        } catch (IzettleApiConnectionException $exception) {
            $this->logger->error($exception->getMessage());
            throw $exception;
        }

        return $this->refreshToken;
    }


    public function requestAccessTokenViaApiKey()//: AccessToken
    {
        $options = [
            'grant_type' => self::API_ACCESS_TOKEN_API_KEY_GRANT,
            'client_id'  => $this->clientId,
            'assertion'  => $this->clientSecret
        ];
        $this->setAccessToken($this->requestAccessToken(self::API_ACCESS_TOKEN_REQUEST_URL, $options));

        return $this->accessToken;
    }

    /**
     * @param bool $is_recursive
     * @return AccessToken
     * @throws IzettleApiConnectionException
     * @throws NotFoundException
     */
    public function requestAccessTokenViaRefreshToken($is_recursive = false)//: AccessToken
    {
        if (empty($this->refreshToken)) {
            throw new NotFoundException("refresh token is empty");
        }

        $options = [
            'grant_type'    => self::API_ACCESS_TOKEN_REFRESH_TOKEN_GRANT,
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $this->refreshToken
        ];

        try {
            $this->setAccessToken(
                $this->requestAccessToken(
                    self::API_ACCESS_TOKEN_REFRESH_TOKEN_URL,
                    $options
                )
            );
        } catch (IzettleApiConnectionException $e) {
            if ($is_recursive) {
                throw $e;
            }
            $json = json_decode($e->getData(), true);
            if (isset($json['error_description'])
                && $json['error_description'] == "invalid refresh_token"
                && $this->refreshTokenStore != null
                && $this->refreshTokenStore != null
            ) {
                $this->refreshToken = $this->refreshTokenStore->getStoredRefreshToken();
                $this->requestAccessTokenViaRefreshToken(true);
            }
        }

        return $this->accessToken;
    }

    /**
     * @return AccessToken
     * @throws IzettleApiConnectionException
     * @throws NotFoundException
     */
    public function renewAccessToken()//: AccessToken
    {
        switch ($this->mode) {
            case self::MODE_API_KEY:
                $this->requestAccessTokenViaApiKey();
                break;
            case self::MODE_REFRESH:
                $this->requestAccessTokenViaRefreshToken();
                break;
        }

        return $this->accessToken;
    }

    private function validateAccessToken()//: void
    {
        if (empty($this->accessToken) || $this->accessToken->isExpired()) {
            if ($this->autoRefresh) {
                $this->renewAccessToken();
            } else {
                throw new AccessTokenExpiredException(
                    sprintf(
                        'Access Token was valid till \'%s\' it\'s now \'%s\'',
                        $this->accessToken->getExpires()->format('Y-m-d H:i:s.u'),
                        (new DateTime())->format('Y-m-d H:i:s.u')
                    )
                );
            }
        }
    }

    private function requestAccessToken($url, $options, $force = false)//: AccessToken
    {
        if (!$force && $this->accessToken
            && (time() - $this->accessToken->getTokenCreateTime()) < ($this->accessToken->getTokenExpiresIn() - self::$expiryBufferTime)
        ) {
            return $this->accessToken;
        }

        if (!$force && $this->isCacheAccessToken) {
            $token = AuthorizationCache::pull($this->getConfigurationHash(), $this->cachePath);

            if ($token
                && array_key_exists('tokenCreateTime', $token)
                && array_key_exists('tokenExpiresIn', $token)
                && array_key_exists('accessTokenEncrypted', $token)
                && (time() - (int) $token['tokenCreateTime']) < ((int) $token['tokenExpiresIn'] - self::$expiryBufferTime)
            ) {
                $accessTokenDecrypted = $this->decrypt($token['accessTokenEncrypted']);
                $tokenExpiresIn = $token['tokenExpiresIn'];
                $tokenCreateTime = $token['tokenCreateTime'];

                $access_token = new AccessToken(
                    $accessTokenDecrypted,
                    $tokenExpiresIn,
                    $tokenCreateTime
                );

                return $access_token;
            }
        }

        $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];

        try {
            $response =
                $this->execute(
                    $url,
                    self::HTTP_POST,
                    $headers,
                    $this->buildFormParams($options)
                );
        } catch (IzettleApiConnectionException $exception) {
            $this->logger->error($exception->getMessage());
            throw $exception;
        }

        $data = json_decode($response->getBody(), true);

        if (isset($data['refresh_token'])) {
            $this->setRefreshToken($data['refresh_token']);
        }

        $access_token = new AccessToken(
            $data['access_token'],
            (int) $data['expires_in']
        );

        if ($this->isCacheAccessToken) {
            AuthorizationCache::push(
                $this->getConfigurationHash(),
                $this->encrypt($access_token->getToken()),
                $access_token->getTokenCreateTime(),
                $access_token->getTokenExpiresIn(),
                $this->cachePath
            );
        }

        return $access_token;
    }

    public function getConfigurationHash() {
        return md5($this->clientId.$this->getMode().$this->clientSecret);
    }

    public function get($url, $queryParameters = null)//: ResponseInterface
    {
        $url_with_query = $url;
        if ($queryParameters) {
            if (is_array($queryParameters)) {
                $url_with_query .= $this->buildFormParams($queryParameters);
            } else {
                $url_with_query .= $queryParameters;
            }
        }
        $headers = $this->buildHeaders(
            array_merge(
                $this->getAuthorizationHeader(),
                [
                    'Accept'       => 'application/json',
                ]
            )
        );
        //$headers = $this->buildHeaders($this->getAuthorizationHeader());

//        try {
            $response = $this->execute($url_with_query, self::HTTP_GET, $headers);
//        } catch (IzettleApiConnectionException $exception) {
//            throw new UnprocessableEntityException($exception);
//        }

        return $response;
    }

    /**
     * @param $url
     * @param IzettlePostableInterface $postable
     * @return bool|string
     * @throws IzettleApiConnectionException
     * @throws UnprocessableEntityException
     */
    public function post($url, $postable)//: ResponseInterface
    {
        $headers = $this->buildHeaders(
            array_merge(
                $this->getAuthorizationHeader(),
                [
                    'content-type' => 'application/json',
                    'Accept'       => 'application/json',
                ]
            )
        );

        try {
            return $this->execute($url, self::HTTP_POST, $headers, $postable->getPostBodyData());
        } catch (IzettleApiConnectionException $exception) {
            throw $exception;
        } catch (\Exception $e) {
            throw new UnprocessableEntityException($e->getMessage());
        }

    }

    /**
     * @param $url
     * @param $jsonData
     * @param array $headers
     * @return IzettleHttpResponse
     * @throws IzettleApiConnectionException
     * @throws UnprocessableEntityException
     */
    public function put($url, $jsonData, $headers = array())//: void
    {
        $headers = $this->buildHeaders(
            array_merge(
                $this->getAuthorizationHeader(),
                $headers,
                [
                    'content-type' => 'application/json',
                    'Accept'       => 'application/json',
                ]
            )
        );


        try {
            return $this->execute($url, self::HTTP_PUT, $headers, $jsonData);
        } catch (IzettleApiConnectionException $exception) {
            throw $exception;
        } catch (\Exception $e) {
            throw new UnprocessableEntityException($e->getMessage());
        }
    }

    /**
     * @param $url
     * @throws IzettleApiConnectionException
     * @throws UnprocessableEntityException
     */
    public function delete($url)//: void
    {
        $headers = $this->buildHeaders($this->getAuthorizationHeader());
        try {
            $this->execute($url, self::HTTP_DELETE, $headers, array());
        } catch (IzettleApiConnectionException $exception) {
            throw $exception;
        } catch (\Exception $e) {
            throw new UnprocessableEntityException($e->getMessage());
        }
    }

    /**
     * @param IzettleHttpResponse $response
     * @return mixed
     */
    public function getJson($response)//: string
    {
        return $response->getBody();
    }

    private function getAuthorizationHeader()//: array
    {
        $this->validateAccessToken();

        return [
            'Authorization' => sprintf('Bearer %s', $this->accessToken->getToken()),
            'X-iZettle-Application-Id' => $this->clientId,
        ];
    }




    private function notifyRefreshTokenObserver() {
        if (!is_null($this->refreshTokenStore) && $this->refreshTokenStore instanceof RefreshTokenStoreInterface) {
            $this->refreshTokenStore->refreshTokenChanged($this->refreshToken);
        }
    }



    const DEFAULT_CURL_OPTIONS = array(
        CURLOPT_SSLVERSION => 6,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 80,    // maximum number of seconds to allow cURL functions to execute
        CURLOPT_USERAGENT => 'iZettle-Prestashop-Connector',
        CURLOPT_HTTPHEADER => array(),
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => 1,
        CURLOPT_SSL_CIPHER_LIST => 'TLSv1:TLSv1.2'
        //Allowing TLSv1 cipher list.
        //Adding it like this for backward compatibility with older versions of curl
    );

    /**
     * @var array
     */
    private $responseHeaders = array();

    /**
     * @var bool
     */
    private $skippedHttpStatusLine = false;

    const MAX_LOG_LENGTH = 10000;

    public function execute($url, $method, $headers, $data = null)
    {
        //Initialize the logger
        $this->logger->info($method . ' ' . $url);

        //Initialize Curl Options
        $ch = curl_init($url);

//        if (empty($options[CURLOPT_HTTPHEADER])) {
//            unset($options[CURLOPT_HTTPHEADER]);
//        }
        curl_setopt_array($ch, $this->curlOptions);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //Determine Curl Options based on Method
        switch ($method) {
            case self::HTTP_POST:
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case self::HTTP_PUT:
            case self::HTTP_PATCH:
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                break;
            case self::HTTP_DELETE:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                break;
        }

        //Default Option if Method not of given types in switch case
//        if ($method != null) {
//            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
//        }

        $this->responseHeaders = array();
        $this->skippedHttpStatusLine = false;
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, array($this, 'parseResponseHeaders'));

        //Execute Curl Request
        $result = curl_exec($ch);
        //Retrieve Response Status
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Retry if Certificate Exception
        if (curl_errno($ch) == 60) {
            $this->logger->info("Invalid or no certificate authority found - Retrying using bundled CA certs file");
            curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
            $result = curl_exec($ch);
            //Retrieve Response Status
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }

        //Throw Exception if Retries and Certificates doenst work
        if (curl_errno($ch)) {
            $ex = new IzettleApiConnectionException(
                $url,
                curl_error($ch),
                curl_errno($ch)
            );
            curl_close($ch);
            throw $ex;
        }

        // Get Request and Response Headers
        $requestHeaders = curl_getinfo($ch, CURLINFO_HEADER_OUT);
        $this->logger->debug("Request Headers \t: " . str_replace("\r\n", ", ", $requestHeaders));
        $this->logger->debug(($data && $data != '' ? "Request Data\t\t: " . (strlen($data) > self::MAX_LOG_LENGTH ? (mb_substr($data, 0, self::MAX_LOG_LENGTH)."...") : $data) : "No Request Payload") . "\n" . str_repeat('-', 128) . "\n");
        $this->logger->info("Response Status \t: " . $httpStatus);
        $this->logger->debug("Response Headers\t: " . $this->implodeArray($this->responseHeaders));

        //Close the curl request
        curl_close($ch);

        //More Exceptions based on HttpStatus Code
        if ($httpStatus < 200 || $httpStatus >= 300) {
            $ex = new IzettleApiConnectionException(
                $url,
                "Got Http response code $httpStatus when accessing {$url}. Message: {$result}",
                $httpStatus
            );
            $ex->setData($result);
            $this->logger->error("Got Http response code $httpStatus when accessing {$url}. " . $result);
            $this->logger->debug("\n\n" . str_repeat('=', 128) . "\n");
            throw $ex;
        }

        $this->logger->debug(($result && $result != '' ? "Response Data \t: " . (strlen($result) > self::MAX_LOG_LENGTH ? (mb_substr($result, 0, self::MAX_LOG_LENGTH)."...") : $result) : "No Response Body") . "\n\n" . str_repeat('=', 128) . "\n");

        //Return result object
        return IzettleHttpResponse::create($result, $httpStatus, $this->responseHeaders);
    }

    protected function parseResponseHeaders($ch, $data) {
        if (!$this->skippedHttpStatusLine) {
            $this->skippedHttpStatusLine = true;
            return strlen($data);
        }

        $trimmedData = trim($data);
        if (strlen($trimmedData) == 0) {
            return strlen($data);
        }

        // Added condition to ignore extra header which dont have colon ( : )
        if (strpos($trimmedData, ":") == false) {
            return strlen($data);
        }

        list($key, $value) = explode(":", $trimmedData, 2);

        $key = trim($key);
        $value = trim($value);

        // This will skip over the HTTP Status Line and any other lines
        // that don't look like header lines with values
        if (strlen($key) > 0 && strlen($value) > 0) {
            // This is actually a very basic way of looking at response headers
            // and may miss a few repeated headers with different (appended)
            // values but this should work for debugging purposes.
            $this->responseHeaders[$key] = $value;
        }

        return strlen($data);
    }


    protected function implodeArray($arr) {
        $retStr = '';
        foreach($arr as $key => $value) {
            $retStr .= $key . ': ' . $value . ', ';
        }
        rtrim($retStr, ', ');
        return $retStr;
    }

    private function buildFormParams($data) {
        $paramsJoined = array();

        foreach($data as $param => $value) {
            $paramsJoined[] = "$param=$value";
        }

        return implode('&', $paramsJoined);
    }

    private function buildHeaders($data) {
        $paramsJoined = array();

        foreach($data as $param => $value) {
            $paramsJoined[] = "$param: $value";
        }

        return $paramsJoined;
    }


    /**
     * Helper method to encrypt data using clientSecret as key
     *
     * @param $data
     * @return string
     */
    public function encrypt($data)
    {
        return $this->cipher->encrypt($data);
    }

    /**
     * Helper method to decrypt data using clientSecret as key
     *
     * @param $data
     * @return string
     */
    public function decrypt($data)
    {
        return $this->cipher->decrypt($data);
    }

    public function clearRefreshTokenObserver()
    {
        $this->refreshTokenStore = null;
    }

    /**
     * @param Utils\RefreshTokenStoreInterface $refreshTokenStore
     */
    public function setRefreshTokenStore($refreshTokenStore)
    {
        $this->refreshTokenStore = $refreshTokenStore;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        $this->notifyRefreshTokenObserver();
    }
    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return bool
     */
    public function isCacheAccessToken()
    {
        return $this->isCacheAccessToken;
    }

    /**
     * @param bool $isCacheAccessToken
     */
    public function setIsCacheAccessToken($isCacheAccessToken)
    {
        $this->isCacheAccessToken = $isCacheAccessToken;
    }

    /**
     * @return null
     */
    public function getCachePath()
    {
        return $this->cachePath;
    }

    /**
     * @param null $cachePath
     */
    public function setCachePath($cachePath)
    {
        $this->cachePath = $cachePath;
    }


    /**
     * @return bool
     */
    public function isAutoRefresh()
    {
        return $this->autoRefresh;
    }

    /**
     * @param bool $autoRefresh
     */
    public function setAutoRefresh($autoRefresh)
    {
        $this->autoRefresh = $autoRefresh;
    }
}
