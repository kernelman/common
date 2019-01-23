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
     * @return false|int
     */
    public static function todayFirst() {
        return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    }

    /**
     * Get the today 23:59:59 timestamp.
     *
     * @return false|int
     */
    public static function todayLast() {
        return mktime(23, 59, 59, date('m'), date('d'), date('Y'));
    }

    /**
     * Get any time the timestamp on today
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @return false|int
     */
    public static function todayAny(int $hour, int $minute, int $second) {
        return mktime($hour, $minute, $second, date('m'), date('d'), date('Y'));
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
