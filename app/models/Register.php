<?php

namespace app\models;

use vendor\core\Model;

class Register extends Model
{
    public $id;
    public $name;
    public $login;
    public $number;
    public $email;
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

    // Проверяет существует ли пользователь с таким логном
    public function isClientByLogin() {
        return $this->findRow("SELECT * FROM `clients` WHERE `login` = ?", [$this->login]);
    }

    // Записываем данные пользователя в базу
    public function register() {
        return $this->insertRow("INSERT INTO `clients`(`name`, `login`, `number`,`email`, `password`) VALUES (?, ?, ?, ?, ?)", [$this->name, $this->login, $this->number,$this->email, $this->password]);
    }
}