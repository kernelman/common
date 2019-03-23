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
     * 判断字符串是否为空或者为0.
     *
     * @param $str
     * @return null
     */
    public static function ifNull($str) {
        if (is_string($str) && ($str == '' || $str == '0')) {
            return true;
        }

        return false;
    }

    /**
     * 将字符串浮点数格式化成float型
     *
     * @param string $str
     * @return float
     */
    public static function ToFloat(string $str): float {
        return (float)$str;
    }

    /**
     * 将百分比字符串格式化成float型
     *
     * @param string $str
     * @return float
     */
    public static function percentageToFloat(string $str): float {
        return (float)rtrim($str, '%');
    }
}
