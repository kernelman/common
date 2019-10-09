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
     * 判断数组是否为空数组.
     *
     * @param $source
     * @return null
     */
    public static function ifNull($source) {
        if (is_array($source) && empty($source)) {
            return true;
        }

        return false;
    }

	/**
	 * 检查是否完全为空数组
	 *
	 * @param array $source
	 * @return bool
	 */
    public static function isEmpty(array $source) {
    	if (count($source) > 0) {
    		return false;
	    }

    	return true;
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

	/**
	 * 过滤数组空值并重置数组索引
	 *
	 * @param array $source
	 * @return array
	 */
    public static function filterAndReset(array $source) {
    	$filterNullValue = array_filter($source);
	    return array_values($filterNullValue);
    }
}
