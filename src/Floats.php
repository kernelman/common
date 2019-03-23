<?php
/**
 * Created by IntelliJ IDEA.
 * User: kernel Huang
 * Email: kernelman79@gmail.com
 * Date: 2018/11/22
 * Time: 12:26 PM
 */

namespace Common;

class Floats
{
    /**
     * 将浮点数格式化成百分比字符串
     *
     * @param float $floats
     * @return string
     */
    public static function toPercentage(float $floats): string {
        return (string)$floats . '%';
    }
}
