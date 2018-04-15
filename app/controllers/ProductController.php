<?php

namespace app\controllers;

use app\models\Product;
use app\models\Saved;
use vendor\core\Controller;
use vendor\libs\Session;

/**
 * Отвечает за меню категори, то есть ( мужчина, женщина, аксессуары )
 */
class ProductController extends Controller
{
    public function indexAction($category)
    {
        $product = new Product();
        $products = $product->getAllProducts();
        $this->view->menu = "alpha";
        $this->view->render("category/index", [
            "products" => $products
        ]);
    }

    public function denominationAction($category, $denomination)
    {
        $product = new Product();
        $product->denomination = $denomination;
        $product->category = $category;
        $products = $product->getProductsByDenominationAndCategory();
        $this->view->menu = "alpha";
        $this->view->render("denomination/index", [
            "products" => $products
        ]);
    }

    public function viewAction($id)
    {
        $this->view->menu = "opened";

        $product = new Product();
        $product->id = $id;
        $reply = $product->getProductById();

        $saved = new Saved();
        $saved->product = $id;
        $bookmark = $saved->getProductById();

        $reply["saved"] = false;

        if ($reply['id'] == $bookmark['product']) {
            $reply["saved"] = true;
        }

        $incart = false;
        if (Session::isSession("products")) {
            if (array_key_exists($id, Session::get("products"))) {
                $incart = true;
            }
        }

        $this->view->render("id/index", [
            "reply" => $reply,
            "incart" => $incart
        ]);
    }

}