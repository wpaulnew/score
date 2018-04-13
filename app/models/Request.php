<?php

namespace app\models;

use vendor\core\Model;
use vendor\libs\Session;

/**
 * В DB название denominations
 * Class Denomination
 * @package app\models
 */
class Request extends Model
{
    public $id;
    public $title;

    public function rename()
    {
        $this->updateRow("UPDATE `request` SET `title` = ? WHERE `id` = ?", [$this->title, $this->id]);
    }

    public function get() {
        return $this->getRow("SELECT `id`,`title` FROM `request` WHERE `id` = ?", [$this->id]);
    }

    public function gets() {
        return $this->getRows("SELECT `id`,`title` FROM `request`");
    }
}