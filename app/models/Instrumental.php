<?php

namespace app\models;

use vendor\core\Model;
use vendor\libs\Session;

class Instrumental extends Model
{
    public function getAllOrders()
    {
        return $this->getRows("
            SELECT * 
            FROM `cart`
        ");
    }

    /**
     * Возвращаем информацию о
     * клиенте и все заказы клиента
     * @return array
     */
    public function getAllClientsOrders()
    {
        $clients = $this->getRows("
            SELECT * 
            FROM `clients`
        ");
        $ordersOfClients = [];
        foreach ($clients as $client) {
            $orders = $this->getRows("
                SELECT *
                FROM `cart`
                WHERE `client` = {$client['id']}
            ");

            if ($orders) {

                $product = new Product();
                for ($i = 0; $i < count($orders); $i++) {
                    $product->id = $orders[$i]["product"];
                    $orders[$i]["product"] = $product->getProductById();
                }

                $client["orders"] = $orders;
                array_push($ordersOfClients, $client);
            }
        }
//        print_r($ordersOfClients);
        return $ordersOfClients;
    }
}