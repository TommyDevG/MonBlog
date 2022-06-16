<?php 

$categoryID = $_GET['id'];

foreach ($db->query("SELECT * FROM articles WHERE categorie_id = $categoryID", 'App\Table\Article') as $post): ?>
     
     <h2><a href="<?= $post->getURL(); ?>"><?= $post->titre; ?></a></h2>
     <p>Publié il y a <?= $post->getTimeSincePost();?></p>
     <p><?= $post->getExtrait(); ?></p>
 
 <?php endforeach; ?>