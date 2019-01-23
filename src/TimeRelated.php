<?php
/**
 * Class TimeRelated
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    1/23/19
 * Time:    5:17 PM
 */

namespace Common;


class TimeRelated
{

    /**
     * Get the today 00:00:00 timestamp.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function todayFirst($timestamp = true) {
        if ($timestamp) {
            return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        }

        return  date('Y-m-d 00:00:00', time());
    }

    /**
     * Get the today 23:59:59 timestamp.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function todayLast($timestamp = true) {
        if ($timestamp) {
            return mktime(23, 59, 59, date('m'), date('d'), date('Y'));
        }

        return  date('Y-m-d 23:59:59', time());
    }

    /**
     * Get any time the timestamp on today
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function todayAny(int $hour, int $minute, int $second, $timestamp = true) {
        if ($timestamp) {
            return mktime($hour, $minute, $second, date('m'), date('d'), date('Y'));
        }

        return  date('Y-m-d ' . (string)$hour . ':' . (string)$minute . ':' . (string)$second, time());
    }

    /**
     * Date to timestamp
     *
     * @param string $dateString Date Format: 2010-01-01 01:01:01
     * @return false|int
     */
    public static function toTimestamp(string $dateString) {
        return strtotime($dateString);
    }
}
