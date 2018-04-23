<?php

namespace app\controllers\admin;

use vendor\core\Controller;
use vendor\libs\Post;

class LoginController extends Controller
{
    public function indexAction()
    {

//        $this->view->layout = "admin";
//        $this->view->menu = "admin";
//        $this->view->render("admin/panel");

//        header();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT');
        if (isset($_POST["client"])) {
            $exit = [
                "id" => 1,
                "login" => "login"
            ];
            exit(json_encode($exit));
        }
//        require("G:/xampp/htdocs/app/views/admin/panel/public/index.html");
        return true;
    }

    public function exitAction()
    {

//        $this->view->render("admin/admin/index");
        $this->view->render("admin/admin/index");
        return true;
    }
}