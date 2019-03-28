<?php
/**
 * Class Arrays
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    2/15/19
 * Time:    2:18 PM
 */

namespace Common;


class Arrays
{

    /**
     * 判断数组是否为[]空数组.
     *
     * @param $variable
     * @return null
     */
    public static function ifNull($variable) {
        if (is_array($variable) && empty($variable)) {
            return true;
        }

        return false;
    }

    /**
     * 替换源数组的键名为键值
     *
     * @param array $source
     * @param array $needle
     * @return array
     */
    public static function shiftKeyToValue(array $source, array $needle) {
        $result = [];
        foreach ($source as $key => $value) {
            $result[$needle[$key]] = $value;
        }

        unset($source);
        return $result;
    }
}
