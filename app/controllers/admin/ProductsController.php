<?php

namespace app\controllers\admin;

use app\models\Product;
use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class ProductsController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/admin/login");
        }

        $product = new Product();
        $products = $product->getAllProducts();

        $this->view->layout = "admin";
        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render('admin/products/index', [
            "products" => $products
        ]);
        return true;
    }

    public function editAction()
    {
        if (isset($_FILES)) {
            if (!empty($_FILES)) {
                $filename = $_FILES['img']['name'];
                $uploaddir = IMG . '/';
                $filename = basename(md5($filename . time()) . ".png");
                $uploadfile = $uploaddir . $filename;
                if (copy($_FILES['img']['tmp_name'], $uploadfile)) {
                    exit($filename);
                }

            }
        }

        if ($this->isAjax()) {
            // Удалить предыдущие фото ж
            $product = new Product();
            $product->id = Post::get("id");
            $product->appellation = Post::get("appellation");


            if (strlen(Post::get("img")) == 5) {
                $product->img = false;
            }

            if (strlen(Post::get("img")) > 5) {
                $product->img = Post::get("img");
            }
//            var_dump($product->img);

            $product->price = Post::get("price");
            $product->description = Post::get("description");

            $edited = $product->updateProductInformation();
            print_r($edited);
            exit();
            if (!$edited) {
                exit(json_encode(["correct" => false]));
            }
            exit(json_encode(["correct" => true]));
        }

        return true;
    }
}