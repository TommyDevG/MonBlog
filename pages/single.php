<?php

    $idArticle = $_GET['id']

?>

<?php //foreach ($db->query("SELECT * FROM articles WHERE id_article=" . $idArticle . "", 'App\Table\Article') as $post): ?>
<?php foreach ($db->query("SELECT articles.id_article, articles.titre, articles.contenu, articles.date, articles.categorie_id, articles.utilisateur_id, utilisateurs.id_utilisateur, utilisateurs.nom, utilisateurs.prenom FROM articles, utilisateurs WHERE articles.utilisateur_id = utilisateurs.id_utilisateur AND articles.id_article=" . $idArticle . "", 'App\Table\Article') as $post) :?>
    <h2><?= $post->titre; ?></h2>
    <p><?= $post->prenom ?> <?= $post->nom ?></p>
    <p>Publié il y a <?= $post->getTimeSincePost();?></p>
    <p><?= $post->contenu; ?></p>
 
<?php endforeach; ?>

<h2>Commentaires</h2>

<form action="app/Post-comment.php?id=<?=$idArticle?>" method="post">

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Commentaire</label>
    <textarea class="form-control" name="commentaireArticle" id="exampleFormControlTextarea1" rows="1"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-primary mb-2">Publier</button>

</form>

<?php foreach ($db->query("SELECT * FROM commentaires WHERE article_id LIKE $idArticle ORDER BY date DESC", 'App\Table\Commentaire') as $comment): ?>
     
    <h2><?= $comment->nomUtilisateur(); ?></h2>
    <p>Publié il y a <?= $comment->getTimeSincePost();?></p>
    <p><?= $comment->contenu; ?></p>
 
<?php endforeach; ?>