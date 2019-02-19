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
use Exceptions\NotFoundException;
use Message\Message;

Class Property {

    const NOT_FOUND = ' Property does not exist in the object: ';

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
     * Check if the object property exists, if it does not exist, return null.
     *
     * @param $params
     * @return null
     */
    public static function notExistsReturnNull($params) {
        return $params ?? null;
    }

    /**
     * Check if the object property exists, if it does not exist, return 0.
     *
     * @param $params
     * @return int
     */
    public static function notExistsReturnZero($params) {
        return $params ?? 0;
    }

    /**
     * Check the params set, if it does not set, return 0.
     *
     * @param $params
     * @return int
     */
    public static function nonSetReturnZero($params) {
        if (isset($params)) {
            return $params;
        }

        return 0;
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
     * Check if the object property exists and is an true, return true
     *
     * @param $params
     * @return bool
     */
    public static function realityReturnTrue($params) {
        if (isset($params) && ($params)) {
            return true;
        }

        return false;
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

    /**
     * Run exists method of object.
     *
     * @param object $class Instantiated object
     * @param string $methodName
     * @param mixed ...$params
     * @return mixed
     * @throws NotFoundException
     */
    public static function callExistsMethod($class, $methodName, $params) {
        if (is_object($class) && method_exists($class, $methodName)) {
            return call_user_func([ $class, $methodName ], $params);
        }

        throw new NotFoundException('Method: ' . $methodName);
    }

    /**
     * Run exists method and class.
     *
     * @param string $className
     * @param string $methodName
     * @param mixed ...$params
     * @return mixed
     * @throws NotFoundException
     */
    public static function callExistsMethodAndClass($className, $methodName, $params) {
        if (class_exists($className)) {
            $instance = new $className();

            if (method_exists($instance, $methodName)) {
                return call_user_func([ $instance, $methodName ], $params);
            }

            throw new NotFoundException('Method: ' . $methodName);
        }

        throw new NotFoundException('Class: ' . $className);
    }

    /**
     * Filters an object with a null value and returns an array of property values that are not empty.
     *
     * @param $object
     * @return array
     * @throws InvalidArgumentException
     */
    public static function filterNullProperty($object) {
        if (is_object($object)) {
            $getVars = get_object_vars($object);
            return array_keys(array_filter($getVars));
        }

        throw new InvalidArgumentException('$object ' . Message::ERR_NON_OBJECT);
    }

    /**
     * Check if the property exists and the object is an object.
     *
     * @param $object
     * @param $property
     * @return bool
     * @throws InvalidArgumentException
     * @throws NotFoundException
     */
    public static function isPropertyAndObject($object, $property) {
        if (is_object($object)) {

            if (property_exists($object, $property)) {
                return true;
            }

            throw new NotFoundException($property . self::NOT_FOUND . get_class($object));
        }

        throw new InvalidArgumentException('$object ' . Message::ERR_NON_OBJECT);
    }
}
