<?php

namespace app\controllers;

use app\models\Order;
use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class OrderController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/login");
        }

        /**
         * Здесь я просто жду кнопки подтверждение заказа,
         * создаю ключ по времени клика
         * добавляю товар к себе, у пользователя удаляю
         * сесию, и кидаю его обравно к себе в /me
         * и там будут отображаться его заказы с их
         * статусом
         */

        if ($this->isAjax()) {
            if (Post::verification("understand")) {

                $order = new Order();
                $order->client = Session::get("id");
                $order->generateCode();
                $reply = $order->addProductsToOrder(Session::get("products"));
                Session::remove("products");
                $exit = [
                    "correct" => true
                ];
                exit(json_encode($exit));
            }
        }

        $this->view->menu = "custom";
        $this->view->render('order/index');
        return true;
    }
}