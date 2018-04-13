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

    private $table = "products";

    // Получаем информацию о продукте
    public function getProductById()
    {
        return $this->getRow("SELECT `id`,`appellation`,`denomination`,`category`,`img`,`price` FROM `products` WHERE id = ?", [$this->id]);
    }

    public function getListOfProductsByCategory()
    {
        return $this->getRows("SELECT * FROM products WHERE category = ?", [$this->category]);
    }

    // Получаем все продукты от последних добаленых
    public function getAllProducts() {
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

    public function getProductsByDenominationAndCategory() {
        return $this->getRows("SELECT * FROM `products` WHERE `denomination` = ? AND `category` = ?", [$this->denomination, $this->category]);
    }
}