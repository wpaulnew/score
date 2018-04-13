<?php

namespace app\controllers;

use app\models\Order;
use app\models\Saved;
use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class MeController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/login");
        }

        $order = new Order();
        $order->client = Session::get("id");
        $orders = $order->getOrdersByClient();

        $this->view->menu = "client";
        $this->view->render('me/index', [
            "orders" => $orders
        ]);
        return true;
    }

    public function savedAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/login");
        }

        if ($this->isAjax()) {
            if (Post::verification("add")) {
                $saved = new Saved();
                $saved->client = Session::get("id");
                $saved->product = Post::gets("add", "id");
                $reply = $saved->addToSaved();
                exit(json_encode($reply));
            }
            if (Post::verification("remove")) {
                $saved = new Saved();
                $saved->product = Post::gets("remove", "id");
                $saved->client = Session::get("id");
                $reply = $saved->removeFromSaved();
                exit(json_encode($reply));
            }

        }

        $saved = new Saved();
        $saved->id = Session::get("id");
        $reply = $saved->getAllSavedProducts();
        $this->view->menu = "client";
        $this->view->render('me/saved', [
            "reply" => $reply
        ]);
        return true;
    }

    public function exitAction()
    {
        Session::remove("id");
        Session::remove("name");
        $this->redirect("http://" . DEFAULT_LINK . "/");
    }
}