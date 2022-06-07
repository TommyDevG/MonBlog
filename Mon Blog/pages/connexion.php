<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h1 class="text-center mt-5">Connexion</h1>
  <div class="container mt-5">
    <form action="app/Auth.php" method="post"">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="emailUtilisateur" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="mdpUtilisateur" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Mot de passe</label>
      </div>

      <!-- Submit button -->
      <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>