<?php

namespace App;

use App\controller\ArticleController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;

        if (isset($route)) {
            if ($route === "article" && isset($action) && isset($_GET['id'])) {
                $articleController = new ArticleController();

                if ($_GET['action'] === 'read') {
                    return $articleController->read($_GET['id']);
                } else if ($_GET['action'] == "create") {
                    return $articleController->create();
                }
            }
        }



        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if ('post' === $action) {
                return (new ArticleController())->read($_GET['id']);
            } elseif ('contact' === $action) {
                var_dump('contact');
            }
        } else {
            var_dump('hello');
            require_once 'index.php';
        }
    }
}
