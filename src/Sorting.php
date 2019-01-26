<?php
/**
 * Class Sorting
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    1/26/19
 * Time:    1:18 PM
 */

namespace Common;


/**
 * 数组排序
 *
 * Class Sorting
 * @package Common
 */
class Sorting
{

    /**
     * 二维数组根据指定字段倒序
     *
     * @param $array
     * @param $key
     * @return mixed
     */
    public static function descArray2D(array $array, string $key) {
        return self::array2D($array, $key, SORT_DESC);
    }

    /**
     * 二维数组根据指定字段升序
     *
     * @param $array
     * @param $key
     * @return mixed
     */
    public static function ascArray2D(array $array, string $key) {
        return self::array2D($array, $key, SORT_ASC);
    }

    /**
     * 二维数组根据指定字段排序
     *
     * @param $array
     * @param $key
     * @param int $sort SORT_ASC 升序 SORT_DESC 倒序
     * @return mixed
     */
    private static function array2D(array $array, string $key, int $sort) {
        $keys = [];
        foreach ($array as $k => $v) {
            $keys[$k] = $v[$key];
        }

        array_multisort($keys, $sort, $array);
        return $array;
    }
}
