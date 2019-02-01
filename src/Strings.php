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
     * 获取字符串中剔除某字符串之前的字符串, 并在得到截取后的字符串中剔除首字符
     *
     * @param string $str
     * @param $needle
     * @return string
     */
    public static function trimStrString(string $str, $needle) {
        return trim(strstr($str, $needle), $needle);
    }

    /**
     * 获取字符串中剔除某字符串之前的字符串, 并在得到截取后的字符串中剔除尾字符
     *
     * @param string $str
     * @param $needle
     * @return string
     */
    public static function rTrimStrString(string $str, $needle) {
        return rtrim(strstr($str, $needle), $needle);
    }
}
