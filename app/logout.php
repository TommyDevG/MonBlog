<?php 

session_start();
session_destroy();
//unset($_SESSION['connecte']);

header('Location: ../index.php');