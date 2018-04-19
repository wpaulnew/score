<?php

namespace app\controllers;

use app\models\Register;
use vendor\libs\Post;
use vendor\libs\Session;
use vendor\core\Controller;

class RegisterController extends Controller
{
    public function indexAction()
    {
        if ($this->isAjax()) {

            $register = new Register();
            $register->name = Post::get("name");
            $register->login = Post::get("login");
            $register->email = Post::get("email");
            $register->password = Post::get("password");

            // Проверяем на существования логин
            if ($register->isClientByLogin()) {
                $exit = [
                    "login" => false,
                ];
                exit(json_encode($exit));
            }

            $register->register();
            $information = $register->getAllByLoginAndPassword();
            Session::create("id", $information["id"]);
            Session::create("name", $information["name"]);
            $exit = [
                "corrent" => true,
            ];
            exit(json_encode($exit));
        }
        $this->view->menu = "register";
        $this->view->render('register/index');
        return true;
    }
}