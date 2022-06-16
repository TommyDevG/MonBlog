<?php

require 'Authentificate-controller.php';
require '../index.php';

$erreur = null;

?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif ?>

<?php

if (isset($_POST["submit"])) {

    $email = $_POST["emailUtilisateur"];
    $mdp = hash("sha256", $_POST["mdpUtilisateur"], false);
    $connexion = new App\AuthentificateController($email, $mdp, $db->getPDO());
    $result = $connexion->checkUser();



    if ($result === true) {
        $_SESSION['connecte'] = 1;

        //$actualUser = $db->queryObject("SELECT * FROM utilisateurs WHERE email LIKE $email AND motDePasse LIKE $mdp");
        //$_SESSION['utilisateurID'] = $actualUser->id_utilisateur;
        $_SESSION['utilisateurID'] = $connexion->getUserID();

        header('Location: ../index.php');
    } else {
        $erreur = "Identifiants incorrects";
    }
}
?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif ?>