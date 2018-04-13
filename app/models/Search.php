<?php

namespace app\models;

use vendor\core\Model;

class Search extends Model
{
    public $text;

    public function getFoundResults() {
        return $this->getRows("SELECT * FROM `products` WHERE `appellation` LIKE '%{$this->text}%'");
    }
}