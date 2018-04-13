<?php

namespace app\models;

use vendor\core\Model;
use vendor\libs\Session;

class Cart extends Model
{
    public $id;
    public $products = []; // Пустой масив для товаров в корзине
    public $product;
    public static $booking = []; // Добавляеться общая стоимость товара

    // Добавляет товар в сессию
    public function add()
    {
        // Если товары уже есть в корзине ( они храняться в сесии )
        if (Session::isSession("products")) {
            $this->products = Session::get("products");
        }

        if (array_key_exists($this->id, $this->products)) {
            $this->products[$this->id]["quality"]++;
        } else {
            $this->products[$this->id] = $this->product;
//            array_push($this->products[$this->id], "quality");
            $this->products[$this->id]["quality"] = 1;
        }
        Session::update("products", $this->products);
        $quality = $this->products[$this->id]["quality"];
        return $quality;
//        return true;
//        return self::count();
    }

    // Побсчитывает общуюю суму товаров
    public static function total()
    {
        $count = 0;
        if (Session::isSession("products")) {
            foreach (Session::get("products") as $id => $product) {
                $count = $count + ($product["price"] * $product["quality"]);
            }
            self::$booking["total"] = $count;
            Session::update("booking", self::$booking);
            return $count;
        }
    }

    /**
     * // Добавляет товар в сессию
     * public function add()
     * {
     * // Если товары уже есть в корзине ( они храняться в сесии )
     * if (Session::isSession("products")) {
     * $this->products = Session::get("products");
     * }
     *
     * $product = new Product();
     * $product->id = $this->id;
     *
     * // Получаем информацию о товаре
     * $property = $product->getProductById();
     *
     * if (array_key_exists($this->id, $this->products)) {
     * $this->products[$this->id]["quality"]++;
     * } else {
     * $this->products[$this->id] = $property;
     * //            array_push($this->products[$this->id], "quality");
     * $this->products[$this->id]["quality"] = 1;
     * }
     *
     *
     * Session::create("products", $this->products);
     * return true;
     * //        return self::count();
     * }
     */

    // Увеличивает число товара в корзине
    public function plus()
    {
//       // Если товары уже есть в корзине ( они храняться в сесии )
        if (Session::isSession("products")) {
            $this->products = Session::get("products");
        }

        if (array_key_exists($this->id, $this->products)) {
            if ($this->products[$this->id]["quality"] >= 3) {
                return 3;
            } else {
                $this->products[$this->id]["quality"]++;
            }
        } else {
            $this->products[$this->id]["quality"] = 1;
        }

        Session::create("products", $this->products);

        $quality = $this->products[$this->id]["quality"];
        return $quality;
    }

    // Уменьшает число товара в корзине
    public function minus()
    {
//       // Если товары уже есть в корзине ( они храняться в сесии )
        if (Session::isSession("products")) {
            $this->products = Session::get("products");
        }

        if (array_key_exists($this->id, $this->products)) {
            if ($this->products[$this->id]["quality"] <= 1) {
                return 1;
            }
            $this->products[$this->id]["quality"]--;
        }

        Session::create("products", $this->products);

        $quality = $this->products[$this->id]["quality"];
        return $quality;
    }

    // Удаляет товар из сессии
    public function remove()
    {
        Session::remove("products", $this->id);
        if (sizeof(Session::get("products"))) {
            Session::remove("booking");
        }
        return self::count();
    }

    // Возвращает масив продуктов
    public static function get()
    {
        if (Session::isSession("products")) {
            return Session::get("products");
        }
        return false;
    }

    // Подсчитывает количество товаров в корзине
    public static function count()
    {
        $count = 0;
        if (Session::isSession("products")) {
            foreach (Session::get("products") as $id => $product) {
                $count = $count + $product["quality"];
            }
            return $count;
        } else {
            return $count;
        }
    }

    // Записывает товары в сессию
    public function write()
    {

    }
}
