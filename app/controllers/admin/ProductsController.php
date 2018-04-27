<?php

namespace app\controllers\admin;

use vendor\core\Controller;
use vendor\libs\Session;

class ProductsController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/admin/login");
        }



        $this->view->layout = "admin";
        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render('admin/products/index');
        return true;
    }
}