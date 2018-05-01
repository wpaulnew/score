<?php

namespace app\controllers\admin;

use app\models\Orders;
use vendor\core\Controller;
use vendor\libs\Session;

class OrdersController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/admin/login");
        }

        $orders = new Orders();

        $booking = $orders->getAllOrders();

        $this->view->layout = "admin";
        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render('admin/orders/index',[
            "booking" => $booking
        ]);
        return true;
    }
}