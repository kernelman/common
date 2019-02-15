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
        if (is_array($variable) && empty($variable)) {
            return null;
        }

        if (is_string($variable) && $variable == '') {
            return null;
        }

        if (is_int($variable) && $variable == 0) {
            return null;
        }

        return $variable;
    }
}
