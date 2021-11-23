<?php

namespace App\repository;

use App\inc\Database;
use App\model\ArticleModel;
use ArrayObject;

class ArticleRepository extends Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function createArticle(ArticleModel $article) {
        $sql = 'INSERT INTO articles VALUES (:id, :date, :titre, :contenu, :auteur, :etat)';
        $result = $this->createQuery($sql, [
            ':id' => $article->getId(),
            ':title' => $article->getDate(),
            ':content' => $article->getTitre(),
            ':createdAt' => $article->getContenu(),
            'updatedAt' => $article->getAuteur(),
            'deletedAt' => $article->getEtat(),
        ]);
        return (bool) $result->rowCount();
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

    public function getAll() : ArrayObject
    {
        $prep = $this->connection->prepare("SELECT * FROM articles");
        $prep->execute();
        $result= $prep->fetchAll(\PDO::FETCH_ASSOC);
        $res=new ArrayObject();
        foreach($result as $row) {
            $res->append($this->buildObject($row));
        }
        return $res;
    }

    public function buildObject($row) {
        $article = new ArticleModel();
        $article->setId($row['article_id']);
        $article->setDate($row['article_date']);
        $article->setTitre($row['article_titre']);
        $article->setContenu($row['article_contenu']);
        $article->setAuteur($row['article_auteur']);
        $article->setEtat($row['article_etat']);

        //Etc
    }
}