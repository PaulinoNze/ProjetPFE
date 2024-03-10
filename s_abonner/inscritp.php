<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte</title>
  <!-- Incluimos Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="../login/bootstrap.min.css" rel="stylesheet"
</head>

<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
      <img class="mb-4" src="logo1.jpg" alt="" width="300" style="border-radius: 20px; margin-left: 170px;">
        <h2 class="mb-4" style="text-align: center;">Créer un compte</h2>
        <form action="abonnerauth.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <label for="nombre">Nom:</label>
              <input type="text" class="form-control" placeholder="Nom" name="nom" require>
            </div>
            <div class="col">
              <label for="nombre">Prenom:</label>
              <input type="text" class="form-control" placeholder="Prenom" name="prenom" require>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label for="nombre">Email:</label>
              <input type="text" class="form-control" placeholder="Email" name="email" id="emailInput" required>
              <span id="emailError" style="color: red;"></span>
            </div>
            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const emailInput = document.getElementById("emailInput");
                const emailError = document.getElementById("emailError");
                const submitButton = document.getElementById("submitButton");

                emailInput.addEventListener("input", function() {
                  const email = emailInput.value.trim();
                  if (email === "") {
                    emailError.textContent = "";
                    return;
                  }

                  // AJAX request to check if email exists
                  const xhr = new XMLHttpRequest();
                  xhr.open("POST", "check_email.php", true);
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                      const response = JSON.parse(xhr.responseText);
                      if (response.exists) {
                        emailError.textContent = "Email already registered";
                        submitButton.disabled = true;
                      } else {
                        emailError.textContent = "";
                        submitButton.disabled = false;
                      }
                    }
                  };
                  xhr.send("email=" + encodeURIComponent(email));
                });
              });
            </script>


            </script>
            <div class="col">
              <label for="nombre">Telephone:</label>
              <input type="text" class="form-control" placeholder="07 77 77 77 77" name="telephone" require>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label for="nombre">Mot de Passe:</label>
              <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" required>
              <small id="passwordRequirements" class="form-text text-danger" style="display: none;">Le mot de passe doit comporter au moins 8 caractères, dont au moins une lettre majuscule, un chiffre et un caractère spécial (-, _, /).</small>
            </div>
            <div class="col">
              <label for="nombre">Confirmez Votre Mot de Passe:</label>
              <input type="password" class="form-control" placeholder="Confirmez Votre Mot de Passe" name="cpassword" id="confirmPassword" required>
              <small id="passwordMismatch" class="form-text text-danger" style="display: none;">Les mots de passe ne correspondent pas</small>
            </div>
          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              var passwordInput = document.getElementById('password');
              var confirmPasswordInput = document.getElementById('confirmPassword');
              var passwordMismatchText = document.getElementById('passwordMismatch');
              var passwordRequirementsText = document.getElementById('passwordRequirements');

              confirmPasswordInput.addEventListener('input', function() {
                if (passwordInput.value !== confirmPasswordInput.value) {
                  passwordMismatchText.style.display = 'block';
                } else {
                  passwordMismatchText.style.display = 'none';
                }
              });

              passwordInput.addEventListener('input', function() {
                var password = passwordInput.value;
                var hasUpperCase = /[A-Z]/.test(password);
                var hasNumber = /\d/.test(password);
                var hasSpecialChar = /[-_\/]/.test(password);
                var isValidLength = password.length >= 8;

                if (hasUpperCase && hasNumber && hasSpecialChar && isValidLength) {
                  passwordRequirementsText.style.display = 'none';
                } else {
                  passwordRequirementsText.style.display = 'block';
                }
              });
            });
          </script>


          <br>
          <div class="row">
            <div class="col">
              <label for="nombre">Date de Naissance:</label>
              <input type="date" class="form-control" placeholder="dateNaissance" name="dateNaissance" require>
            </div>
            <div class="col">
              <label for="nombre">Adresse:</label>
              <input type="text" class="form-control" placeholder="adresse" name="adresse" require>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label for="nombre">Genre:</label><br>
              <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Homme" name="genre">
                <label class="form-check-label" for="inlineRadio1">Homme</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Femme" name="genre">
                <label class="form-check-label" for="inlineRadio2">Femme</label>
              </div>
            </div>
            <div class="col">
              <label for="nombre">Vous êtes:</label><br>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Etudiant" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Etudiant
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Professeur">
                <label class="form-check-label" for="exampleRadios2">
                  Professeur
                </label>
              </div>
              
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col">
              <label>Image</label>
              <input type="file" name="image" class="form-control" require>
            </div>

          </div><br>
          <button type="submit" class="btn btn-primary" name="submit" id="submitButton">Enregistrement</button>


        </form>
</body>

</html>