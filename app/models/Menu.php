<?php

namespace app\models;

use vendor\core\Model;

class Menu extends Model
{
    public $id;
    public $gender;
    public $category;

    public function getAllGenders()
    {
        return $this->getRows("
            SELECT *
            FROM `gender`
        ");
    }

    public function getAllCategories()
    {
        return $this->getRows("
            SELECT *
            FROM `category`
        ");
    }

}