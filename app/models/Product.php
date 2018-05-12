<?php

namespace app\models;

use vendor\core\Db;
use vendor\core\Model;

/**
 * В DB название products
 * Class Product
 * @package app\models
 */
class Product extends Model
{
    public $id;
    public $appellation;
    public $denomination;
    public $img;
    public $price;
    public $category;
    public $ended = 0;
    public $description;

    private $table = "products";

    public function updateProductInformation()
    {

        if ($this->img === false) {
            echo "==";
            $this->updateRow("
            UPDATE `products`
            SET `appellation` = ?, `price` = ?, `description` = ?
            WHERE `id` = ?
        ", [
                $this->appellation,
                $this->price,
                $this->description,
                $this->id
            ]);
        } else {
            echo "!=";
            $this->updateRow("
            UPDATE `products`
            SET `appellation` = ?, `img` =?, `price` = ?, `description` = ?
            WHERE `id` = ?
        ", [
                $this->appellation,
                $this->img,
                $this->price,
                $this->description,
                $this->id
            ]);
        }

    }

    public function addProduct()
    {
        $this->insertRow("
            INSERT INTO `products` (`appellation`,`denomination`,`category`,`img`,`price`,`description`)
            VALUES (?, ?, ?, ?, ?, ?)
        ", [
            $this->appellation,
            $this->denomination, // gender
            $this->category,
            $this->img,
            $this->price,
            $this->description
        ]);
        return true;
    }

    // Получаем информацию о продукте
    public function getProductById()
    {
        return $this->getRow("SELECT `id`,`appellation`,`denomination`,`category`,`img`,`price`, `description` FROM `products` WHERE id = ?", [$this->id]);
    }

    public function getListOfProductsByCategory()
    {
        return $this->getRows("SELECT * FROM products WHERE category = ?", [$this->category]);
    }

    // Получаем все продукты от последних добаленых
    public function getAllProducts()
    {
        return $this->getRows("SELECT * FROM $this->table ORDER BY `id` DESC");
    }

    // Получаем информацию о продуктах из базы
    public function getProductsByIds($ids)
    {
        try {
            $ids = implode(",", $ids);
            return $this->getRows("SELECT * FROM products WHERE id IN ({$ids})");
        } catch (\Exception $exception) {
            echo "Товары по ids не выбраны " . $exception->getMessage();
        }
    }

    public function getProductsByDenominationAndCategory()
    {
        return $this->getRows("
        SELECT * 
        FROM `products` 
        WHERE `denomination` = ? AND `category` = ?
        ", [$this->category, $this->denomination]
        );
    }
}