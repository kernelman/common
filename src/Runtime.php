<?php
/**
 * Created by IntelliJ IDEA.
 * User: kernel Huang
 * Email: kernelman79@gmail.com
 * Date: 2018/11/22
 * Time: 9:56 AM
 */

namespace Processor;

/**
 * Class Runtime
 * @package Processor
 */
class Runtime {

    private $start = null;
    private $end   = null;

    /**
     * 程序运行开始时间
     */
    public function start() {
        $this->start = $this->getTime();
    }

    /**
     * 程序运行结束时间
     */
    public function end() {
        $this->end = $this->getTime();
    }

    /**
     * 获取微秒时间
     *
     * @return float
     */
    private function getMicrosecond(){
        list($microSec, $sec)   = explode(' ', microtime());
        return (float)$microSec + (float)$sec;
    }

    /**
     * 获取毫秒时间
     *
     * @return float|int
     */
    private function getTime(){
        return $this->getMicrosecond() * 1000;
    }

    /**
     * 获取运行时间
     *
     * @return float|int
     */
    public function get() {
        $this->end();

        if ($this->start != null && $this->end != null) {
            return round($this->end - $this->start, 3);
        }

        return 0;
    }

    /**
     * 输出运行时间
     */
    public function print() {
        echo $this->get() . ' ms';
    }
}
