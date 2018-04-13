<?php

namespace app\controllers;

use vendor\core\Controller;

class AboutController extends Controller
{

    public function indexAction($text)
    {
        echo $text;
    }

}
