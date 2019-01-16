<?php
/**
 * Class Property
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    12/20/18
 * Time:    3:56 PM
 */

namespace Common;

use Exceptions\InvalidArgumentException;
use Message\Message;

Class Property {

    /**
     * Check if the object property exists, if it does not exist, return null.
     *
     * @param $object
     * @param $property
     * @return null
     */
    public static function nonExistsReturnNull($object, $property) {
        return $object->{$property} ?? null;
    }

    /**
     * Check if the object property exists, if it does not exist, return 0.
     *
     * @param $object
     * @param $property
     * @return int
     */
    public static function nonExistsReturnZero($object, $property) {
        return $object->{$property} ?? 0;
    }

    /**
     * Check if the object property exists and is an empty string.
     *
     * @param $object
     * @param $property
     * @return bool
     */
    public static function existsAndEmpty($object, $property) {
        if (property_exists($object, $property) && $object->{$property} == '') {
            return true;
        }

        return false;
    }

    /**
     * Check if the object property exists and is an true.
     *
     * @param $params
     * @return bool
     */
    public static function reality($params) {
        return $params ?? false;
    }

    /**
     * Check if the object property exists return self, else return defined
     *
     * @param $object
     * @param $property
     * @param $defined
     * @return mixed
     */
    public static function isExists($object, $property, $defined) {
        if (property_exists($object, $property)) {
            return $object->{$property};
        }

        return $defined;
    }

    /**
     * Check if the argument exists and is an null.
     *
     * @param $params
     * @param $paramName
     * @throws InvalidArgumentException
     */
    public static function argumentRequired($params, string $paramName) {
        if ($params === null) {
            throw new InvalidArgumentException(Message::ERR_REQUIRED . $paramName);
        }
    }

    /**
     * Check if the argument is an object.
     *
     * @param $params
     * @param string $paramName
     * @return bool
     * @throws InvalidArgumentException
     */
    public static function argumentIsObject($params, string $paramName) {
        if (!is_object($params)) {
            throw new InvalidArgumentException(Message::ERR_NON_OBJECT . $paramName);
        }

        return true;
    }
}
