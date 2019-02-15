<?php
/**
 * Class Integers
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    2/15/19
 * Time:    2:15 PM
 */

namespace Common;


class Integers
{

    /**
     * 判断整数是否为0.
     *
     * @param $variable
     * @return null
     */
    public static function ifNull($variable) {
        if (is_int($variable) && $variable == 0) {
            return true;
        }

        return false;
    }
}
