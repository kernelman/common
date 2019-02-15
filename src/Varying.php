<?php
/**
 * Class Varying
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    2/15/19
 * Time:    1:20 PM
 */

namespace Common;


class Varying
{

    /**
     * 判断变量是否为整数0, 字符串'0', 空数组[], 如是则返回null.
     *
     * @param $variable
     * @return mixed
     */
    public static function ifNull($variable) {
        $is = Strings::ifNull($variable) ?: Arrays::ifNull($variable) ?: Integers::ifNull($variable);

        if($is) {
            return null;
        }
        return $variable;
    }
}
