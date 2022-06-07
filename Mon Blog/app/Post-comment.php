<?php

require 'publish-controller.php';
require '../index.php';

$idArticle = $_GET['id'];

if (isset($_POST["submit"])) {
    if (!empty($_POST["commentaireArticle"])) {
        $content = $_POST["commentaireArticle"];

        $comment = new App\CommentController($content, $db->getPDO());
        $result = $comment->publishComment($_SESSION['utilisateurID'], $idArticle);
    }
}
?>