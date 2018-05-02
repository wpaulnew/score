<?php

namespace app\models;

use vendor\core\Model;

class Orders extends Model
{
    public $id;
    public $client;
    public $product;
    public $quantity;
    public $code;
    public $processed;

    public function getOrdersByCode()
    {
        return $this->getRows("
            SELECT * 
            FROM `cart`
            WHERE `code` = ?
        ", [
            $this->code
        ]);
    }

    public function getClientByCode()
    {
        return $this->getRow("
            SELECT `client`
            FROM `cart`
            WHERE `code` = ?
            LIMIT 1
        ", [
            $this->code
        ]);
    }

    public function getAllOrders()
    {
        $codes = $this->getRows("
            SELECT `code` 
            FROM `cart`
            WHERE `processed` = 0
        ");
        $keysOfOrders = [];
        foreach ($codes as $index => $value) {
            $keysOfOrders[$index] = $value["code"];
        }
        $keys = array_unique($keysOfOrders);

        /**
         * Будем вытягивать к одному ордеру
         * информацию о клиенте, и и заказах
         */

        $final = [];
        $client = new Client();
        $product = new Product();
        $booking = [];
//        echo "<pre>";
        foreach ($keys as $key) {
            $this->code = $key;
            $orders = $this->getOrdersByCode();
            $id = $this->getClientByCode();
            $client->id = $id["client"];
            $buyer = $client->getInformationById();
            $final["client"] = $buyer;

            for ($i = 0; $i < count($orders); $i++) {
                $id = $orders[$i]["product"];
                $product->id = $id;
                $orders[$i]["product"] = $product->getProductById();
            }
//            print_r($orders);

            $final["orders"] = $orders;
            array_push($booking, $final);
        }
//        print_r($booking);
        return $booking;
    }

    public function removeOrderByCode() {
        $this->deleteRow("
            DELETE
            FROM `cart`
            WHERE `code` = ?
        ", [
            $this->code
        ]);
    }

    public function moveOrderByCode() {
        $this->updateRow("
            UPDATE `cart`
            SET `processed` = 1
            WHERE `code` = ?
        ",[
            $this->code
        ]);
    }
}