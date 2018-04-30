<?php

namespace app\controllers\admin;

use app\models\Client;
use vendor\core\Controller;
use vendor\libs\Session;

class ClientsController extends Controller
{
    public function indexAction()
    {
//        if (!Session::isSession("id")) {
//            $this->redirect("http://" . DEFAULT_LINK . "/admin/login");
//        }

        $client = new Client();
        $clients = $client->getAllClients();

        $this->view->layout = "admin";
        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render('admin/clients/index',[
            "clients" => $clients
        ]);
        return true;
    }
}