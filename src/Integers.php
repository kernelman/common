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
     * 如果是为0的整数则返回null.
     *
     * @param $variable
     * @return null
     */
    public static function ifNull($variable) {
        if (is_int($variable) && $variable == 0) {
            return null;
        }

        return $variable;
    }
}
