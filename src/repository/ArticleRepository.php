<?php

namespace App\repository;

use App\inc\Database;
use App\model\ArticleModel;

class ArticleRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function createArticle(ArticleModel $article) {
        $prep = $this->connection->prepare('INSERT INTO articles VALUES (:id, :date, :titre, :contenu, :auteur, :etat)');
        $prep->execute([
            ':id' => $article->getId(),
            ':title' => $article->getDate(),
            ':content' => $article->getTitre(),
            ':createdAt' => $article->getContenu(),
            'updatedAt' => $article->getAuteur(),
            'deletedAt' => $article->getEtat(),
        ]);
        return (bool) $prep->rowCount();
    }

    public function getLast3() : array
    {
        $prep = $this->connection->prepare("SELECT article_id, article_titre, article_contenu FROM articles WHERE article_etat = 1 ORDER BY article_date DESC");
        $prep->execute();
        return $prep->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNumberArticles() : int
    {
        $prep = $this->connection->prepare("SELECT count(*) AS 'nb' FROM articles WHERE article_etat = 1");
        $prep->execute();
        return ($prep->fetch())['nb'];
    }
}