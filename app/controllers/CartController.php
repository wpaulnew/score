<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use vendor\core\Controller;
use vendor\libs\Post;

class CartController extends Controller
{
    public function indexAction()
    {
        if ($this->isAjax()) {
            if (Post::verification("plus")) {
                $cart = new Cart();
                $cart->id = Post::get("plus");

                // Добаляем товар в сесию и в масив products
                $quality = $cart->plus();
                $total = Cart::total();
                $exit = [
                    "quality" => $quality,
                    "total" => $total
                ];
//                return json_encode($exit);
//                print_r($_SESSION);
//                exit();
                exit(json_encode($exit));
            }

            if (Post::verification("minus")) {
                $cart = new Cart();
                $cart->id = Post::get("minus");

                // Добаляем товар в сесию и в масив products
                $quality = $cart->minus();
                $total = Cart::total();
                $exit = [
                    "quality" => $quality,
                    "total" => $total
                ];
//                return json_encode($exit);
//                print_r($_SESSION);
//                exit();
                exit(json_encode($exit));
            }
        }

        $products = Cart::get();
        $this->view->menu = "custom";
        if (!$products) {
            /*
            $product = new Product();
            $ids = array_keys($products);
            // Получаем информацию о продуктах из базы по ключам
            $products = $product->getProductsByIds($ids);
            */
            $this->view->render("cart/none");
        }

        $this->view->render('cart/index');
        return true;
    }

    // Берет из базы данные о товаре и кладет в массив при этом все обновляя
    public function addAction($id)
    {
        $cart = new Cart();
        $cart->id = $id;
        $product = new Product();
        $product->id = $id;
        $cart->product = $product->getProductById();
        // Добаляем товар в сесию и в масив products
        $cart->add();
        Cart::total();
        return true;
    }

    public function removeAction($id)
    {
        /*
        $cart = new Cart();
        $cart->id = $id;
        echo $cart->remove();
        */
        unset($_SESSION["products"][$id]);
//        echo Cart::count();
        return true;
    }


}