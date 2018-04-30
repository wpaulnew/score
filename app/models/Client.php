<?php

namespace app\models;

use vendor\core\Model;

class Client extends Model
{
    public $id;
    public $name;
    public $login;
    public $number;
    public $email;
    public $password;

    public function getAllClients() {
        return $this->getRows("
            SELECT *
            FROM `clients`
            ORDER BY `id` DESC
        ");
    }

    public function getInformationById() {
        return $this->getRow("
            SELECT *
            FROM `clients`
            WHERE `id` = ?
        ",[
            $this->id
        ]);
    }
}