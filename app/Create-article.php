<?php

require 'publish-controller.php';
require '../index.php';

if (isset($_POST["submit"])) {
    if (!empty($_POST["titreArticle"]) && !empty($_POST["descriptionArticle"])) {
        $titreArticle = $_POST["titreArticle"];
        $descriptionArticle = $_POST["descriptionArticle"];
        $categorieArticle = $_POST["categorieArticle"];

        $publish = new App\PublishController($titreArticle, $descriptionArticle, $categorieArticle, $_SESSION['utilisateurID'], $db->getPDO());
        $result = $publish->publishArticle();
    }
}
?>