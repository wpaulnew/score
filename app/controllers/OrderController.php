<?php

namespace app\controllers;

use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class OrderController extends Controller
{
    public function indexAction()
    {
        if ($this->isAjax()) {
            if (Post::verification("unregister")) {
                exit("Order is processed");
            }
        }

        $this->view->menu = "custom";
        if (Session::isSession("id")) {
            $this->view->render('order/index');
        } else {
            $this->view->render('order/unregister');
        }
        return true;
    }
}