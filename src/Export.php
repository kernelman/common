<?php
/**
 * Class Export
 *
 * Author:  Kernel Huang
 * Mail:    kernelman79@gmail.com
 * Date:    2/25/19
 * Time:    6:14 PM
 */

namespace Common;


class Export
{
    public $show = true;
    public $save = true;

    /**
     * Export to terminal or web.
     *
     * @param string $content
     * @return $this
     */
    public function show(string $content) {
        if ($this->show) {
            echo $content;
        }

        return $this;
    }

    /**
     * Export to file or db.
     *
     * @param $object
     * @param $method
     * @param string $content
     * @return bool|mixed
     * @throws \Exceptions\NotFoundException
     */
    public function save($object, $method, string $content) {
        if ($this->save) {
            return Property::callExistsMethodOnClass($object, $method, $content);
        }

        return $this;
    }
}
