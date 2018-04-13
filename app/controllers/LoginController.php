<?php

namespace app\controllers;

use app\models\Login;
use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class LoginController extends Controller
{
    public function indexAction()
    {
        if ($this->isAjax()) {
            $login = new Login();
            $login->login = Post::get("login");
            $login->password = Post::get("password");
            if ($login->isClientByLoginAndPassword()) {
                $information = $login->getAllByLoginAndPassword();
                Session::create("id", $information["id"]);
                Session::create("name", $information["name"]);
                $exit = [
                    "current" => true,
                ];
                exit(json_encode($exit));
            }else{
                $exit = [
                    "current" => false,
                ];
                exit(json_encode($exit));
            }
        }
        $this->view->menu = "login";
        $this->view->render('login/index');
        return true;
    }
}