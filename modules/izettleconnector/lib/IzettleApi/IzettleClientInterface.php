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

use IzettleApi\API\Universal\IzettlePostableInterface;
use IzettleApi\Client\AccessToken;
use IzettleApi\Client\ApiScope;
use IzettleApi\Exception\UnprocessableEntityException;
use Psr\Http\Message\ResponseInterface;

interface IzettleClientInterface
{
    const API_BASE_URL = 'https://oauth.izettle.com';
    const API_AUTHORIZE_USER_LOGIN_URL = self::API_BASE_URL . '/authorize';
    const API_REGISTER_URL = self::API_BASE_URL . '/register';
    //const API_RETURN_URL = 'finnvid.net/v2';

    const API_ACCESS_TOKEN_REQUEST_URL = self::API_BASE_URL . '/token';
    const API_ACCESS_TOKEN_PASSWORD_GRANT = 'password';
    const API_ACCESS_TOKEN_CODE_GRANT = 'authorization_code';
    const API_ACCESS_TOKEN_REFRESH_TOKEN_URL = self::API_BASE_URL . '/token';
    const API_ACCESS_TOKEN_REFRESH_TOKEN_GRANT = 'refresh_token';
    const API_ACCESS_TOKEN_API_KEY_GRANT = 'urn:ietf:params:oauth:grant-type:jwt-bearer';

    public function getAuthoriseUserLogin($redirectUrl, $apiScope);//: string;

    public function renewAccessToken();

    public function get($url, $queryParameters = null);//: ResponseInterface;

    /**
     * @throws UnprocessableEntityException
     */
    public function post($url, $object);//: ResponseInterface;

    /**
     * @throws UnprocessableEntityException
     */
    public function put($url, $jsonData, $headers);//: void;

    /**
     * @throws UnprocessableEntityException
     */
    public function delete($url);//: void;

    public function getJson($response);//: string;
}
