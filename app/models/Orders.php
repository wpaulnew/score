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

    public function getAllOrders()
    {
        $codes = $this->getRows("
            SELECT `code` 
            FROM `cart`
        ");
        echo "<pre>";
        $orders = [];
        foreach ($codes as $index => $value) {
            $orders[] = $value["code"];
        }

        /**
         * Удаляем дубликаты из масива
         */
        $clears = array_unique($orders);

        $newCodes = [];
        foreach ($clears as $clear) {
            $newCodes[] = $clear;
        }
//        print_r($newCodes);

        $clientOrdersByCode = [];
        $order = new Order();
        $client = new Client();
        $product = new Product();

        for ($i = 0; $i < count($newCodes); $i++) {
            $order->code = $newCodes[$i];
            $booking = $order->getOrderByCode();
            $clientOrdersByCode[] = $booking;
        }
        $_orders = [];
        foreach ($clientOrdersByCode as $c => $a) {
            for ($i = 0; $i < count($clientOrdersByCode[$c]); $i++) {
                $element = $clientOrdersByCode[$c][$i];
//                print_r($element);
            }
            $_orders[] = $a;
        }
//        print_r($_orders);

        for ($i = 0; $i < count($_orders); $i++) {
            print_r($_orders[$i]);
        }

        $_orders[] = $a;
//        foreach ($clientOrdersByCode as $index => $value) {
//            $client->id = $value["client"];
//            $product->id = $value["product"];
//            $value["client"] = $client->getInformationById();
//            $value["product"] = $product->getProductById();
//            $_orders[] = $value;
//        }

//        $orders = array_unique($codes);
//        print_r($clientOrdersByCode);

    }

}