<?php

namespace App;

use App\controller\ArticleController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;

        if (isset($_GET['route'])) {
            if ($_GET['route'] === "post" && isset($_GET['action'])) {
                $postController = new ArticleController();

                if ($_GET['action'] === 'read') {
                    return $postController->read();
                } else if ($_GET['action'] == "create") {
                    return $postController->create();
                }
            }
        }



        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if ('post' === $action) {
                return (new ArticleController())->read();
            } elseif ('contact' === $action) {
                var_dump('contact');
            }
        } else {
            var_dump('hello');
            require_once 'index.php';
        }
    }
}
