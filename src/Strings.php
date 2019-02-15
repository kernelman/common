<?php
/**
 * Class Strings
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    2/1/19
 * Time:    1:18 PM
 */

namespace Common;


class Strings
{

    /**
     * 获取字符串中剔除某字符串之前的字符串, 并在得到截取后的字符串中剔除首字符串
     *
     * @param string $str
     * @param $needle
     * @return string
     */
    public static function trimStrString(string $str, $needle) {
        return trim(strstr($str, $needle), $needle);
    }

    /**
     * 获取字符串中剔除某字符串之前的字符串, 并在得到截取后的字符串中剔除尾字符串
     *
     * @param string $str
     * @param $needle
     * @return string
     */
    public static function rTrimStrString(string $str, $needle) {
        return rtrim(strstr($str, $needle), $needle);
    }

    /**
     * 如果为空或者为0的字符串则返回null.
     *
     * @param $str
     * @return null
     */
    public static function ifNull($str) {
        if (is_string($str) && ($str == '' || $str == '0')) {
            return null;
        }

        return $str;
    }
}
