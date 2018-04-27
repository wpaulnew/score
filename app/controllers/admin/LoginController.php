<?php

namespace app\controllers\admin;

use app\models\Login;
use vendor\core\Controller;
use vendor\libs\Post;
use vendor\libs\Session;

class LoginController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/admin/login");
        }

        if (Session::isSession("id")) {
            $this->redirect("http://" . DEFAULT_LINK . "/admin/home");
        }

        if ($this->isAjax()) {
            $login = new Login();
            $login->login = Post::get("login");
            $login->password = Post::get("password");
            if ($login->isClientByLoginAndPassword()) {
                $information = $login->getAllByLoginAndPassword();
                Session::create("id", $information["id"]);
                Session::create("login", $information["login"]);
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
        $this->view->layout = "admin";
        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render('admin/login/index');
        return true;
    }

    public function exitAction() {
        Session::remove("id");
        Session::remove("name");
        $this->redirect("http://" . DEFAULT_LINK . "/login");
    }
}