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
     * Begin encode
     *
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
	 * Alias, refer to the boot method
	 *
	 * @param $property
	 * @param null $uMask // JSON encode uMask.
	 * @return bool|false|string
	 */
	public static function from($property, $uMask = null) {
    	return self::boot($property, $uMask);
	}

	/**
	 * JSON decode
	 *
	 * @param $property
	 * @param bool $assoc
	 * @param null $uMask
	 * @return mixed
	 */
	public static function to($property, $assoc = false, $uMask = null) {
		self::$jsonUMask = $uMask;

		if (!$assoc) {
			return self::toArray($property);
		}

		return self::toObject($property);
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
     * JSON encode
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

	/**
	 * Decode JSON to array
	 *
	 * @param $property
	 * @param null $uMask
	 * @return mixed
	 * @throws UnFormattedException
	 */
	public static function toArray($property, $uMask = null) {

		try {

			if ($uMask != null) {
				self::$jsonUMask = $uMask;
			}

			if (self::$jsonUMask !== null) {
				return json_decode($property, true, 512, self::$jsonUMask);
			}

			return json_decode($property, true);

		} catch (\Exception $exception) {
			throw new UnFormattedException($exception->getMessage());
		}
	}

	/**
	 * Decode JSON to object
	 *
	 * @param $property
	 * @param null $uMask
	 * @return mixed
	 * @throws UnFormattedException
	 */
	public static function toObject($property, $uMask = null) {

		try {

			if ($uMask != null) {
				self::$jsonUMask = $uMask;
			}

			if (self::$jsonUMask !== null) {
				return json_decode($property, false, 512, self::$jsonUMask);
			}

			return json_decode($property, false);

		} catch (\Exception $exception) {
			throw new UnFormattedException($exception->getMessage());
		}
	}
}
