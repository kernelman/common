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
    const FIRST = 'Y-m-d 00:00:00';
    const LAST  = 'Y-m-d 23:59:59';
    const START = 'start';
    const END   = 'end';

    /**
     * Get the start time for the current year.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function yearFirst($timestamp = true) {
        if ($timestamp) {
            return self::toTimestamp(date(self::FIRST, self::toTimestamp('first day of january this year')));
        }

        return date(self::FIRST, self::toTimestamp('first day of january this year'));
    }

    /**
     * Get the end time for the current year.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function yearLast($timestamp = true) {
        if ($timestamp) {
            return self::toTimestamp(date(self::LAST, self::toTimestamp('last day of december this year')));
        }

        return date(self::LAST, self::toTimestamp('last day of december this year'));
    }

    /**
     * Get the current time.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function current($timestamp = true) {
        if ($timestamp) {
            return time();
        }

        return date("Y-m-d H:i:s", time());
    }

    /**
     * Get day number of the current day.
     *
     * @return false|string
     */
    public static function currentDay() {
        return date("d", time());
    }

    /**
     * Get month number of the current month.
     *
     * @return false|string
     */
    public static function currentMonth() {
        return date("m", time());
    }

    /**
     * Get year number of the current year.
     *
     * @return false|string
     */
    public static function currentYear() {
        return date("Y", time());
    }

    /**
     * Get the start time and end time for the current month.
     *
     * @param bool $timestamp
     * @return object
     */
    public static function month($timestamp = true) {
        $year   = self::currentYear();
        $month  = self::currentMonth();
        $start  = mktime(0, 0, 0, $month, 1, $year);
        $end    = mktime(23, 59, 59, $month, self::monthDays(), $year);

        if ($timestamp) {
            return (object)[ self::START => $start, self::END => $end ];
        }

        return (object)[ self::START => self::toDate($start), self::END => self::toDate($end) ];
    }

    /**
     * Get the start time for the current month.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function monthFirst($timestamp = true) {
        $year   = self::currentYear();
        $month  = self::currentMonth();
        $start  = mktime(0, 0, 0, $month, 1, $year);

        if ($timestamp) {
            return $start;
        }

        return self::toDate($start);
    }

    /**
     * Get the end time for the current month.
     *
     * @param bool $timestamp
     * @return false|int|string
     */
    public static function monthLast($timestamp = true) {
        $year   = self::currentYear();
        $month  = self::currentMonth();
        $end    = mktime(23, 59, 59, $month, self::monthDays(), $year);

        if ($timestamp) {
            return $end;
        }

        return self::toDate($end);
    }

    /**
     * Get the number of days of the current month
     *
     * @return false|string
     */
    public static function monthDays() {
        return date('t');
    }

    /**
     * Get the start time and end time for the current week.
     *
     * @param int $startDay Start day: 0 for sunday, 1 for monday.
     * @param bool $timestamp
     * @return object
     */
    public static function week($startDay = 0, $timestamp = true) {
        $current    = date('Y-m-d');
        $week       = date('w', self::toTimestamp($current));
        $weekStart  = date(self::FIRST, self::toTimestamp("$current - " . ($week ? $week - $startDay : 6) .' days'));
        $weekEnd    = date(self::LAST, self::toTimestamp("$weekStart +6 days"));

        if ($timestamp) {
            return (object)[ self::START => self::toTimestamp($weekStart), self::END => self::toTimestamp($weekEnd) ];
        }

        return (object)[ self::START => $weekStart, self::END => $weekEnd ];
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
        $week       = date('w', self::toTimestamp($current));
        $weekStart  = date(self::FIRST, self::toTimestamp("$current - " . ($week ? $week - $startDay : 6) .' days'));
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
        $weekEnd = date(self::LAST, self::toTimestamp(self::weekFirst($startDay, false) . ' +6 days'));
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
    public static function todayAny($hour, $minute, $second, $timestamp = true) {
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

    public static function toDate($timestamp) {
        return date("Y-m-d H:i:s", $timestamp);
    }
}
