<?php
/**
 * Created by IntelliJ IDEA.
 * User: kernel Huang
 * Email: kernelman79@gmail.com
 * Date: 2018/11/26
 * Time: 9:11 PM
 */

namespace Common;


/**
 * Get client ip address
 * Class ClientIp
 *
 * @package Services
 */
class ClientIp {

    const REMOTE    = 'REMOTE_ADDR';
    private static $default  = '0.0.0.0';

    /**
     * @param bool $type 输出IPV4类型，默认true为字符串类型，false为数字类型
     * @return bool|int
     */
    public static function get(bool $type = true) {

        $ip =  self::httpClient()
            ?: self::xForwardedFor()
            ?: self::xForwarded()
            ?: self::forwardedFor()
            ?: self::forForwarded()
            ?: self::remoteAddress()
            ?: self::$default;

        return $type ? $ip : (int)ip2long($ip);
    }

    /**
     * @return array|bool|false|string
     */
    private static function httpClient() {
        $get = getenv('HTTP_CLIENT_IP');

        if ($get) {
            return $get;
        }
        return false;
    }

    /**
     * @return bool|mixed
     */
    private static function xForwardedFor() {
        $get = getenv('HTTP_X_FORWARDED_FOR');

        if ($get) {
            $ips = explode(',', $get);
            return  array_shift($ips);
        }
        return false;
    }

    /**
     * @return array|bool|false|string
     */
    private static function xForwarded() {
        $get = getenv('HTTP_X_FORWARDED');

        if ($get) {
            return $get;
        }
        return false;
    }

    /**
     * @return array|bool|false|string
     */
    private static function forwardedFor() {
        $get = getenv('HTTP_FORWARDED_FOR');

        if ($get) {
            return $get;
        }
        return false;
    }

    /**
     * @return array|bool|false|string
     */
    private static function forForwarded() {
        $get = getenv('HTTP_FORWARDED');

        if ($get) {
            return $get;
        }
        return false;
    }

    /**
     * @return bool
     */
    private static function remoteAddress() {

        if (isset($_SERVER[self::REMOTE]) && $_SERVER[self::REMOTE] != '') {

            $get = $_SERVER[self::REMOTE];

            if ($get) {
                return $get;
            }
        }
        return false;
    }
}
