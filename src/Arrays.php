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
     * 如果是为空的数组则返回null.
     *
     * @param $variable
     * @return null
     */
    public static function ifNull($variable) {
        if (is_array($variable) && empty($variable)) {
            return null;
        }

        return $variable;
    }
}
