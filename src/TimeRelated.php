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
    const FIRST  = 'Y-m-d 00:00:00';
    const LAST   = 'Y-m-d 23:59:59';

    /**
     * Get the start time and end time for the current week.
     *
     * @param int $startDay Start day: 0 for sunday, 1 for monday.
     * @param bool $timestamp
     * @return object
     */
    public static function week($startDay = 0, $timestamp = true) {
        $current    = date('Y-m-d');
        $week       = date('w', strtotime($current));
        $weekStart  = date(self::FIRST, strtotime("$current - " . ($week ? $week - $startDay : 6) .' days'));
        $weekEnd    = date(self::LAST, strtotime("$weekStart +6 days"));

        if ($timestamp) {
            return (object)[ 'start' => self::toTimestamp($weekStart), 'end' => self::toTimestamp($weekEnd) ];
        }

        return (object)[ 'start' => $weekStart, 'end' => $weekEnd ];
    }

    /**
     * Get the start time for the current week.
     *
     * @param int $startDay Start day: 0 for sunday, 1 for monday.
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function weekFirst($startDay = 0, $timestamp = true) {
        $current    = date('Y-m-d');
        $week       = date('w', strtotime($current));
        $weekStart  = date(self::FIRST, strtotime("$current - " . ($week ? $week - $startDay : 6) .' days'));
        if ($timestamp) {
            return self::toTimestamp($weekStart);
        }

        return $weekStart;
    }

    /**
     * Get the end time for the current week.
     *
     * @param int $startDay
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function weekLast($startDay = 0, $timestamp = true) {
        $weekEnd = date(self::LAST, strtotime(self::weekFirst($startDay, false) . ' +6 days'));
        if ($timestamp) {
            return self::toTimestamp($weekEnd);
        }

        return $weekEnd;
    }

    /**
     * Get the today 00:00:00 timestamp or date.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function todayFirst($timestamp = true) {
        if ($timestamp) {
            return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        }

        return  date(self::FIRST, time());
    }

    /**
     * Get the today 23:59:59 timestamp or date.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function todayLast($timestamp = true) {
        if ($timestamp) {
            return mktime(23, 59, 59, date('m'), date('d'), date('Y'));
        }

        return  date(self::LAST, time());
    }

    /**
     * Get any time the timestamp or date on today.
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
