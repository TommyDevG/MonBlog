<?php $isAdmin = $db->queryObject("SELECT admin FROM utilisateurs WHERE id_utilisateur = " . $_SESSION['utilisateurID'] . "");?>
<?php foreach ($db->query("SELECT articles.id_article, articles.titre, articles.contenu, articles.date, articles.categorie_id, articles.utilisateur_id, utilisateurs.id_utilisateur, utilisateurs.nom, utilisateurs.prenom, utilisateurs.admin FROM articles, utilisateurs WHERE articles.utilisateur_id = utilisateurs.id_utilisateur", 'App\Table\Article') as $post): ?>
     
    <h2><a href="<?= $post->getURL(); ?>"><?= $post->titre; ?></a></h2>
    <p><?= $post->prenom ?> <?= $post->nom ?></p>
    <p>Publié il y a <?= $post->getTimeSincePost();?></p>

    <?php
      
        if(isset($_POST[$post->id_article])) {
            $db->getPDO()->query("DELETE FROM articles WHERE id_article = $post->id_article");
        }

    ?>

    <?php if ($isAdmin->admin === "1"): ?>
        <form method="post">
            <input type="submit" class="alert alert-danger" type="submit" name="<?=$post->id_article; ?>" value="<?=$post->id_article; ?>">
        </form>
    <?php endif; ?>

    <p><?= $post->getExtrait(); ?></p>

<?php endforeach; ?>