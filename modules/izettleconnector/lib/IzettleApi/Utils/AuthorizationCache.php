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

namespace IzettleApi\Utils;


abstract class AuthorizationCache
{
    public static $CACHE_PATH = __DIR__.DIRECTORY_SEPARATOR.'auth.cache';


    /**
     * A pull method which would read the persisted data based on clientId.
     * If clientId is not provided, an array with all the tokens would be passed.
     *
     * @param string $clientId
     * @param null $cache_path
     * @return mixed|null
     */
    public static function pull($clientId = null, $cache_path = null)
    {

        $tokens = null;
        $cachePath = $cache_path == null? self::$CACHE_PATH : $cache_path;
        if (file_exists($cachePath)) {
            // Read from the file
            $cachedToken = file_get_contents($cachePath);
            if ($cachedToken && self::validate($cachedToken, true)) {
                $tokens = json_decode($cachedToken, true);
                if ($clientId && is_array($tokens) && array_key_exists($clientId, $tokens)) {
                    // If client Id is found, just send in that data only
                    return $tokens[$clientId];
                } elseif ($clientId) {
                    // If client Id is provided, but no key in persisted data found matching it.
                    return $tokens;
                }
            }
        }
        return $tokens;
    }

    /**
     * Persists the data into a cache file provided in $CACHE_PATH
     *
     * @param      $clientId
     * @param      $accessToken
     * @param      $tokenCreateTime
     * @param      $tokenExpiresIn
     * @param null $cache_path
     * @throws \Exception
     */
    public static function push($clientId, $accessToken, $tokenCreateTime, $tokenExpiresIn, $cache_path = null)
    {

        $cachePath = $cache_path == null? self::$CACHE_PATH : $cache_path;
        if (!is_dir(dirname($cachePath))) {
            if (mkdir(dirname($cachePath), 0755, true) == false) {
                throw new \Exception("Failed to create directory at $cachePath");
            }
        }

        // Reads all the existing persisted data
        $tokens = self::pull(null , $cachePath);
        $tokens = $tokens ? $tokens : array();
        if (is_array($tokens)) {
            $tokens[$clientId] = array(
                'clientId' => $clientId,
                'accessTokenEncrypted' => $accessToken,
                'tokenCreateTime' => $tokenCreateTime,
                'tokenExpiresIn' => $tokenExpiresIn
            );
        }
        if (!file_put_contents($cachePath, json_encode($tokens))) {
            throw new \Exception("Failed to write cache");
        };
    }



    public static function validate($string, $silent = false)
    {
        @json_decode($string);
        if (json_last_error() != JSON_ERROR_NONE) {
            if ($string === '' || $string === null) {
                return true;
            }
            if ($silent == false) {
                //Throw an Exception for string or array
                throw new \InvalidArgumentException("Invalid JSON String");
            }
            return false;
        }
        return true;
    }
}
