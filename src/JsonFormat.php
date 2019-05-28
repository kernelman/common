<?php
/**
 * Class Formatted
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    12/5/18
 * Time:    1:37 PM
 */

namespace Common;


use Exceptions\UnFormattedException;

/**
 * Class Formatted
 * @package Processor
 */
class JsonFormat {

    private static $jsonUMask = null;

    /**
     * @param $property
     * @param null $uMask // Json encode uMask.
     * @return bool|false|string
     * @throws UnFormattedException
     */
    public static function boot($property, $uMask = null) {
        if ($uMask !== null) {
            self::$jsonUMask = $uMask;
        }

        return self::isString($property) ?: self::isObject($property) ?: self::isArray($property);
    }

    /**
     * @param $property
     * @return bool
     */
    public static function isString($property) {
        if(is_string($property)) {
            return $property;
        }

        return false;
    }

    /**
     * @param $property
     * @return bool|false|string
     * @throws UnFormattedException
     */
    public static function isArray($property) {
        if(is_array($property)) {
            return self::toJson($property);
        }

        return false;
    }

    /**
     * @param $property
     * @return bool|false|string
     * @throws UnFormattedException
     */
    public static function isObject($property) {
        if(is_object($property)) {
            return self::toJson($property);
        }

        return false;
    }

    /**
     * Json encode
     *
     * @param $property
     * @return false|string
     * @throws UnFormattedException
     */
    public static function toJson($property) {

        try {

            if (self::$jsonUMask !== null) {
                return json_encode($property, self::$jsonUMask);
            }

            return json_encode($property);

        } catch (\Exception $exception) {
            throw new UnFormattedException($exception->getMessage());
        }
    }
}
