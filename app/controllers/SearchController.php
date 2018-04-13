<?php

namespace app\controllers;

use app\models\Search;
use vendor\core\Controller;
use vendor\libs\Post;

class SearchController extends Controller
{
    public function indexAction()
    {
        if ($this->isAjax()) {
            $search = new Search();
            $search->text = Post::get("search");
            $reply = $search->getFoundResults();
            exit(json_encode($reply));
        }else{
            $this->redirect("/");
        }
        return true;
    }
}