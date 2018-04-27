<?php

namespace app\controllers\admin;

use app\models\Instrumental;
use vendor\core\Controller;
use vendor\libs\Post;

class InstrumentalController extends Controller
{
    public function indexAction()
    {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT');
        if (Post::verification("client")) {
            $instrumental = new Instrumental();
            $orders = $instrumental->getAllClientsOrders();
            $exit = [
                "orders" => $orders,
            ];
            exit(json_encode($exit));
        }

        if (Post::verification("move")) {
            $instrumental = new Instrumental();
            $instrumental->moveProduct(Post::get("move"));
            $orders = $instrumental->getAllClientsOrders();
            $exit = [
                "orders" => $orders,
            ];
            exit(json_encode($exit));
//            $orders = $instrumental->getAllClientsOrders();
//            $exit = [
//                "orders" => $orders,
//            ];
//            exit(json_encode($exit));
        }

//        require(VIEWS . "/admin/core1/index.html");
        return true;
    }

    public function exitAction()
    {
        $this->view->render("admin/admin/index");
        return true;
    }
}