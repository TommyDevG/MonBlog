
<form action="app/Create-article.php" method="post">

  <div class="form-group">
    <label for="exampleFormControlInput1">Titre</label>
    <input type="text" name="titreArticle" class="form-control" id="exampleFormControlInput1">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Catégorie</label>
    <select class="form-control" name="categorieArticle" id="exampleFormControlSelect1">
        <?php foreach ($db->query("SELECT * FROM categories", 'App\Table\Categories') as $category): ?>
            <option><?= $category->nom; ?></option>
        <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="descriptionArticle" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-primary mb-2">Publier</button>

</form>