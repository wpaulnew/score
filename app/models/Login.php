<?php

namespace app\models;

use vendor\core\Model;

class Login extends Model
{
    public $id;
    public $login;
    public $password;

    public function getAllById()
    {
        return $this->getRow("SELECT * FROM `client` WHERE `id`=?", [$this->id]);
    }

    public function getAllByLoginAndPassword() {
        return $this->getRow("SELECT * FROM `clients` WHERE `login` = ? AND `password` = ?", [$this->login, $this->password]);
    }

    public function getLoginById()
    {
        return $this->getRow("SELECT `login` FROM `client` WHERE `id`=?", [$this->id]);
    }

    public function getPasswordById()
    {
        return $this->getRow("SELECT `password` FROM `client` WHERE `id`=?", [$this->id]);
    }

    public function isClientByLoginAndPassword()
    {
        return $this->findRow("SELECT * FROM `clients` WHERE `login` = ? AND `password` = ?", [$this->login, $this->password]);
    }
}