<?php
namespace App\model;

class ArticleModel
{
    private int $id;
    private string $date;
    private string $titre;
    private string $contenu;
    private string $auteur;
    private bool $etat;
/*
    public function __construct(int $id, \DateTime $date, String $titre, String $contenu, String $auteur, bool $etat)
    {
        $this->id = $id;
        $this->date = $date;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
        $this->etat = $etat;
    }
*/
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id) : self 
    {
        $this->id=$id;
        return $this;
    }
    
    public function getDate() : string
    {
        return $this->date;
    }

    public function setDate(string $date) : self
    {
        $this->date = $date;
        return $this;
    }

    public function getTitre() : String
    {
        return $this->titre;
    }

    public function setTitre(String $titre):self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getContenu():String
    {
        return $this->contenu;
    }

    public function setContenu(String $contenu):self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getAuteur() : string
    {
        return $this->auteur;
    }

    public function setAuteur(String $auteur) : self
    {
        $this->auteur = $auteur;
        return $this;
    }

    public function getEtat() : bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat) : self
    {
        $this->etat = $etat;
        return $this;
    }
}