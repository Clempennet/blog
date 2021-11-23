<?php

namespace App\controller;
use App\repository\ArticleRepository;

class ArticleController
{
    public function read($id) {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getById($id);
        header('Location: article.php?id='.$id);

    }

    public function create() {
        $articleRepository = new ArticleRepository();
    }
}