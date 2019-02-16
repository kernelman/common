<?php
/**
 * Created by IntelliJ IDEA.
 * User: kernel Huang
 * Email: kernelman79@gmail.com
 * Date: 2018/11/22
 * Time: 12:26 PM
 */

namespace Common;

/**
 * Class Bytes
 * @package Processor
 */
class Bytes {

    private static $unit    = [ 0 => 'Byte', 1 => 'KB', 2 => 'MB', 3 => 'GB' ];
    private static $type    = null;
    private static $bytes   = null;
    private static $toType  = null;

    private static function initialize() {
        self::$type     = null;
        self::$bytes    = null;
        self::$toType   = null;
    }

    /**
     * Byte type
     *
     * @param $bytes
     * @return string
     */
    public static function byte($bytes) {
        self::initialize();

        self::$type  = 0;
        self::$bytes = $bytes;
        return self::class;
    }

    /**
     * Kilobyte type
     *
     * @param $kilobyte
     * @return string
     */
    public static function kilobyte($kilobyte) {
        self::initialize();

        self::$type  = 1;
        self::$bytes = $kilobyte;
        return self::class;
    }

    /**
     * Megabyte type
     *
     * @param $megabyte
     * @return float|int
     */
    public static function megabyte($megabyte) {
        self::initialize();

        self::$type  = 2;
        self::$bytes = $megabyte;
        return self::class;
    }

    /**
     * Gigabyte type
     *
     * @param $gigabyte
     * @return string
     */
    public static function gigabyte($gigabyte) {
        self::initialize();

        self::$type  = 3;
        self::$bytes = $gigabyte;
        return self::class;
    }

    /**
     * Change to Byte type
     *
     * @return bool
     */
    public static function toByte() {

        if (self::$bytes == null) {
            return false;
        }

        self::$toType = 0;
        return self::calculator(self::$bytes, self::$toType, self::$type);
    }

    /**
     * Change to Kilobyte type
     *
     * @return bool
     */
    public static function toKilobyte() {

        if (self::$bytes == null) {
            return false;
        }

        self::$toType = 1;
        return self::calculator(self::$bytes, self::$toType, self::$type);
    }

    /**
     * Change to Megabyte type
     *
     * @return bool
     */
    public static function toMegabyte() {
        if (self::$bytes == null) {
            return false;
        }

        self::$toType = 2;
        return self::calculator(self::$bytes, self::$toType, self::$type);
    }

    /**
     * Change to Gigabyte type
     *
     * @return bool
     */
    public static function toGigabyte() {

        if (self::$bytes == null) {
            return false;
        }

        self::$toType = 3;
        return self::calculator(self::$bytes, self::$toType, self::$type);
    }

    /**
     * Get unit
     *
     * @return mixed
     */
    private static function units() {
        return self::$unit[self::$toType];
    }

    /**
     * Print unit
     *
     * @param $bytes
     */
    public static function print($bytes) {
        echo $bytes . self::units();
    }

    /**
     * Conversion type Calculator
     *
     * @param $byte
     * @param int $toType
     * @param int $selfType
     * @return bool
     */
    public static function calculator($byte, int $toType, int $selfType) {
        $calculable = [
            // to Byte type
            0 => [
                0 => $byte,
                1 => $byte * 1024,
                2 => $byte * 1024 * 1024,
                3 => $byte * 1024 * 1024 * 1024,
            ],
            // to KB type
            1 => [
                0 => $byte / 1024,
                1 => $byte,
                2 => $byte * 1024,
                3 => $byte * 1024 * 1024,
            ],
            // to MB type
            2 => [
                0 => $byte / 1024 / 1024,
                1 => $byte / 1024,
                2 => $byte,
                3 => $byte * 1024,
            ],
            // to GB type
            3 => [
                0 => $byte / 1024 / 1024 / 1024,
                1 => $byte / 1024 / 1024,
                2 => $byte / 1024,
                3 => $byte,
            ],
        ];

        if (array_key_exists($toType, $calculable) && (array_key_exists($selfType, $calculable[$toType]))) {
            return $calculable[$toType][$selfType];
        }

        return false;
    }
}
