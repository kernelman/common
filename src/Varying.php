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
     * @param $variable
     * @return mixed
     */
    public static function ifNull($variable) {
        return Strings::ifNull($variable) ?? Arrays::ifNull($variable) ?? Integers::ifNull($variable);
    }
}
