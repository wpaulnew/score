<?php

namespace app\models;

use vendor\core\Model;

class Order extends Model
{
    public $id;
    public $client; // id-client
    public $product; // id-product
    public $code; // group order key
    public $processed; // status of order

    /**
     * width code
     * @var
     */
    public $width = 5;

    private $table = "cart";
    /**
     * Добавляем в цыкле из масива products, товары
     * в таблицу заказов
     */

    public function addProductsToOrder($products = []) {
        foreach ($products as $product) {
            $this->insertRow("INSERT INTO $this->table (`client`,`product`,`quantity`,`code`) VALUES (?, ?, ?, ?)", [$this->client, $product["id"], $product["quality"], $this->code]);
        }
        return true;
    }

    public function getOrderByCode() {
        return $this->getRows("
            SELECT *
            FROM `cart`
            WHERE `code` = ?
        ", [
            $this->code
        ]);
    }

    // Генирирует ключ заказа
    public function generateCode() {
        $d = date("d");
        $h = date("h");
        $m = date("m");
        $s = date("s");
        $this->code = substr(md5($d + $h + $m + $s + $this->client), -$this->width);
        return $this->code;
    }

    // Выводит список заказов клиента
    public function getOrdersByClient() {
        return $this->getRows("SELECT cart.processed, products.id, products.appellation, products.img
FROM cart,products WHERE cart.client = ? AND cart.product = products.id", [$this->client]);
    }
}