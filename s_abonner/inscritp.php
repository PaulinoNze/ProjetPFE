<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte</title>
  <!-- Incluimos Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4" style="text-align: center;">Créer un compte</h2>
      <img class="mb-4" src="logo1.jpg" alt="" width="300" height="200" style="border-radius: 20px; margin-left: 120px;">
      <form>

        <div class="form-group">
          <label for="nombre">Nom</label>
          <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
        </div>
        <div class="form-group">
          <label for="nombre">Prenom</label>
          <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prenom">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Entrer votre Email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Tapez votre mot de passe">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirmer Password</label>
          <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmer mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrement</button>
        <br>
        <br>
      </form>
    </div>
  </div>
</div>

<!-- Incluimos jQuery, Popper.js y Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
