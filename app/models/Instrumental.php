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

    /**
     * Ставит товар в статус "отправлен"
     * на стороне пользователя
     */
    public function moveProduct($id)
    {
        $this->updateRow("
            UPDATE `cart` 
            SET`processed`=1 
            WHERE `client` = {$id} 
        ");
    }

    public function getAll()
    {
        $clients = $this->getRows("
            SELECT * 
            FROM `clients`
        ");
        echo "<pre>";
        $ordersOfClients = [];

        foreach ($clients as $client) {
            $orders = $this->getRows("
                SELECT `code`
                FROM `cart`
                WHERE `client` = {$client['id']}
            ");
            if ($orders) {
                $client["orders"] = $orders;
                array_push($ordersOfClients, $client);
            }

        }
        $differentBooking = [];
        foreach ($ordersOfClients as $order) {

            foreach ($order["orders"] as $key => $value) {
//                $differentBooking[] = $value;
                if (isset($value)) {
//                    echo $value["code"] . "<br />";
                    $differentBooking[] = $value["code"];
                }

                // Сдесь есть только ключи товаров
                $codesOfBooking = array_values(array_unique($differentBooking));
                print_r($ordersOfClients);
            }
        }
    }
}