<?php

namespace app\models;

use vendor\core\Model;
use vendor\libs\Session;

class Saved extends Model
{
    public $id;
    public $client; // id client
    public $product; // id product

    public function getAllSavedProducts()
    {
        return $this->getRows("SELECT * FROM saved, products WHERE saved.client = ? AND saved.product = products.id", [$this->id]);
    }

    public function addToSaved()
    {
        return $this->insertRow("INSERT INTO `saved` (`client`, `product`) VALUES (?, ?)", [$this->client, $this->product]);
    }

    public function removeFromSaved()
    {
        $this->deleteRow("DELETE FROM `saved` WHERE `client`=? AND `product`=?", [$this->client, $this->product]);
    }

    public function getProductById() {
        return $this->getRow("SELECT * FROM `saved` WHERE `product` = ?", [$this->product]);
    }
}