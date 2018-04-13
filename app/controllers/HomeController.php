<?php

namespace app\controllers;

use app\models\Request;
use vendor\core\Controller;
use vendor\core\Db;
use vendor\libs\Post;

class HomeController extends Controller
{
    public function indexAction()
    {

        $this->view->render('home/index');
        return true;
    }
}