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

    public function requestAction()
    {
        header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        // header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        // header('Cache-Control: no-cache, must-revalidate');
        //    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        //    // header('Content-type: application/json');
        //    header('Access-Control-Allow-Headers: Content-Type');
        if (isset($_POST)) {
            $exit = [
                "id" => $_POST["id"] + 1,
                "title" => $_POST["title"]
            ];
            exit(json_encode($exit));
        }
        // exit(json_encode(["id"=>$_POST["id"],"title"=>$_POST["title"]]));
    }

    public function updateAction()
    {
        header('Access-Control-Allow-Origin: *');
        if (isset($_POST)) {
            $exit = [
                "id" => $_POST["id"] + 1,
                "title" => $_POST["title"]
            ];
            exit(json_encode($exit));
        }
    }

    public function getAction()
    {
        header('Access-Control-Allow-Origin: *');

        $request = new Request();
        $request->id = 1;
        $reply =  $request->get();
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        header('Access-Control-Allow-Headers: Content-Type');
//        $reply = [
//            "id" => 1,
//            "title" => "Hello"
//        ];
        exit(json_encode($reply));
//        exit("dfdf");
    }

    public function getsAction() {
        header('Access-Control-Allow-Origin: *');

        $request = new Request();
        $reply =  $request->gets();

        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        header('Access-Control-Allow-Headers: Content-Type');

        exit(json_encode($reply));
    }

    public function renameAction()
    {
        header('Access-Control-Allow-Origin: *');

        $request = new Request();
        $request->id = Post::get("id");
        $request->title = Post::get("title");
        $reply = $request->rename();

        exit(json_encode($reply));
    }
}