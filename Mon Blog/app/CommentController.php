<?php

namespace App;

use DateTime;

class CommentController {
    
    private $content;
    private $db;

    public function __construct($content, $db)
    
    {
        $this->content = $content;
        $this->db = $db;
    }

    public function publishComment($utilisateurID, $articleID) {

        $publicationReussie = false;

        $content = htmlentities($this->content);
        $actualDate = new DateTime(Date('Y-m-d H:i:s'));
        $stringDate = $actualDate->format('Y-m-d H:i:s');

        $query = $this->db->prepare("INSERT INTO commentaires (contenu, date, article_id, utilisateur_id) VALUES (?, ?, ?, ?)");
        $query->bindParam(1, $content);
        $query->bindParam(2, $stringDate);
        $query->bindParam(3, $articleID);
        $query->bindParam(4, $utilisateurID);
        $result = $query->execute();

        if ($result === true) {
            $publicationReussie = true;
        }
        
        return $publicationReussie;

    }

}