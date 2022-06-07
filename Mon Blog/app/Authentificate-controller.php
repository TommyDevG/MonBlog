<?php

namespace App;

use \PDO;

class AuthentificateController {
    
    private $email;
    private $mdp;
    private $db;

    public function __construct($email, $mdp, $db)
    
    {
        $this->email = $email;
        $this->mdp = $mdp;
        $this->db = $db;
    }

    public function queryUser() {
        $query = $this->db->prepare("SELECT id_utilisateur, email, motDePasse FROM utilisateurs WHERE email = ? AND motDePasse = ?");
        $query->execute(array($this->email, $this->mdp));
        return $query;
    }

    public function checkUser() {

        $identifiantCorrect = false;

        $query = $this->queryUser();

        $count = $query->rowCount();
        
        if ($count >= 1) {

            $identifiantCorrect = true;

        }

        return $identifiantCorrect;

    }

    public function getUserID() {

        $utilisateurID = "";

        $query = $this->queryUser();

        $data = $query->fetch(PDO::FETCH_OBJ);
        $utilisateurID = $data->id_utilisateur;

        return $utilisateurID;
    }

}