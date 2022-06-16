<?php

namespace App;

use DateTime;
use \PDO;

class PublishController {
    
    private $titreArticle;
    private $descriptionArticle;
    private $nomCategorie;
    private $utilisateurID;
    private $db;

    public function __construct($titreArticle, $descriptionArticle, $nomCategorie, $utilisateurID, $db)
    
    {
        $this->titreArticle = $titreArticle;
        $this->descriptionArticle = $descriptionArticle;
        $this->nomCategorie = $nomCategorie;
        $this->utilisateurID = $utilisateurID;
        $this->db = $db;
    }

    public function getCategoryID() {

        $query = $this->db->prepare("SELECT id_categorie, nom FROM categories WHERE nom LIKE ?");
        $query->execute(array($this->nomCategorie));
        $data = $query->fetch(PDO::FETCH_OBJ);
        $categorieID = $data->id_categorie;

        return $categorieID;
    }
    
    public function publishArticle() {

        $publicationReussie = false;

        $titre = htmlentities($this->titreArticle);
        $description = htmlentities($this->titreArticle);
        $actualDate = new DateTime(Date('Y-m-d H:i:s'));
        $stringDate = $actualDate->format('Y-m-d H:i:s');
        $categorieID = $this->getCategoryID();
        $utilisateurID = $this->utilisateurID;

        $query = $this->db->prepare("INSERT INTO articles (titre, contenu, date, categorie_id, utilisateur_id) VALUES (?, ?, ?, ?, ?)");
        $query->bindParam(1, $titre);
        $query->bindParam(2, $description);
        $query->bindParam(3, $stringDate);
        $query->bindParam(4, $categorieID);
        $query->bindParam(5, $utilisateurID);
        $result = $query->execute();

        if ($result === true) {
            $publicationReussie = true;
        }
        //return false;
        return $publicationReussie;

    }

}