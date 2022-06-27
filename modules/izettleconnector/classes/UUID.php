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

class UUID
{
    const UUID_TIME = 1;

    private static $m_uuid_field = array(
        'time_low'      => 0,
        'time_mid'      => 0,
        'time_hi'       => 0,
        'clock_seq_hi'  => 0,
        'clock_seq_low' => 0,
        'node'          => array()
    );

    private static $m_generate = array(
        self::UUID_TIME => "generateTime"
    );

    private static function generateTime($node)
    {
        $uuid = self::$m_uuid_field;

        /*
         * Get current time in 100 ns intervals. The magic value
         * is the offset between UNIX epoch and the UUID UTC
         * time base October 15, 1582.
         */
        $tp = gettimeofday();
        $time = ($tp['sec'] * 10000000) + ($tp['usec'] * 10) +
            0x01B21DD213814000;

        $uuid['time_low'] = $time & 0xffffffff;
        /* Work around PHP 32-bit bit-operation limits */
        $high = (int)($time / 0xffffffff);
        $uuid['time_mid'] = $high & 0xffff;
        $uuid['time_hi'] = (($high >> 16) & 0xfff) | (self::UUID_TIME << 12);

        /*
         * We don't support saved state information and generate
         * a random clock sequence each time.
         */
        $uuid['clock_seq_hi'] = 0x80 | mt_rand(0, 64);
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        /*
         * Node should be set to the 48-bit IEEE node identifier, but
         * we leave it for the user to supply the node.
         */
        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = ord(Tools::substr($node, $i, 1));
        }

        return ($uuid);
    }


    /**
     * Generates version 4 UUID: random
     */
    public static function generateV4()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }


    public static function emulateV1()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x1000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }


    public static function generateV1()
    {
        $node = defined('_COOKIE_KEY_')
            ? _COOKIE_KEY_
            : sprintf('%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));

        $src = self::generateTime($node);

        $str = sprintf(
            '%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
            $src['time_low'],
            $src['time_mid'],
            $src['time_hi'],
            $src['clock_seq_hi'],
            $src['clock_seq_low'],
            $src['node'][0],
            $src['node'][1],
            $src['node'][2],
            $src['node'][3],
            $src['node'][4],
            $src['node'][5]
        );
        return $str;
    }
}
