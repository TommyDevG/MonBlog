<?php

require 'app/Autoloader.php';
require_once 'app/connectDatabase.php';

App\Autoloader::register();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

$db = new App\Database('guillier_blog', $db_user, $db_pass, $db_host);

if ((!empty($_SESSION['connecte']))) {

    ob_start();

    if ($p === 'home') {
    
        require 'pages/home.php';
    
    } elseif ($p === 'article') {
    
        require 'pages/single.php';
    
    } elseif ($p === 'category') {
    
        require 'pages/category.php';
    
    } elseif ($p === 'publier') {
    
        require 'pages/publish.php';
    
    }
    
    $content = ob_get_clean();
    require 'pages/templates/default.php';

} else {

    require 'pages/connexion.php';

}

