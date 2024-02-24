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
      <img class="mb-4" src="logo1.jpg" alt="" width="100" style="border-radius: 20px; margin-left: 120px;">
      <form action="abonnerauth.php" method="POST">
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
  document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirmPassword');
    var passwordMismatchText = document.getElementById('passwordMismatch');
    var passwordRequirementsText = document.getElementById('passwordRequirements');

    confirmPasswordInput.addEventListener('input', function () {
      if (passwordInput.value !== confirmPasswordInput.value) {
        passwordMismatchText.style.display = 'block';
      } else {
        passwordMismatchText.style.display = 'none';
      }
    });

    passwordInput.addEventListener('input', function () {
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
    <label for="nombre">CIN:</label>
      <input type="text" class="form-control" placeholder="CIN" name="CIN" require>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
    <label for="nombre">Genre:</label><br>
  <div class="form-check form-check-inline">
  
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Homme" name="genre">
  <label class="form-check-label" for="inlineRadio1" >Homme</label>
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
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Administration">
              <label class="form-check-label" for="exampleRadios3">
                Administration
              </label>
            </div>
          </div>
        </div>
        <br>

        <!-- Dynamic input field -->
<div class="row">
  <div class="col">
    <label id="dynamicInputLabel" for="dynamicInput">Filière:</label>
    <div id="dynamicInput">
    <select class="form-control" name="cours" id="dynamicInput">
        <option value="Genie Informatique">Genie Informatique</option>
        <option value="Genie Electrique">Genie Electrique</option>
        <option value="Technique de Management">Technique de Management</option>
        <option value="Genie des Procedes Alimentaires">Genie des Procedes Alimentaires</option>
      </select>
    </div>
  </div>
  
</div><br>
<button type="submit" class="btn btn-primary" name="submit" id="submitButton">Enregistrement</button>

<br>
<?php if(isset($_GET['error'])){ ?>
      <p class = "error" style="color: red;"> <?php echo $_GET['error']; ?></p>
    <?php } ?>
<br>
<br>

<script>
  // Function to create dynamic input fields
  function createDynamicInput(type) {
    // Get the dynamic input container and label
    var dynamicInput = document.getElementById('dynamicInput');
    var dynamicInputLabel = document.getElementById('dynamicInputLabel');
    
    // Clear previous dynamic input fields
    dynamicInput.innerHTML = '';

    // Create new input based on type
    if (type === 'Etudiant') {
      // Update label
      dynamicInputLabel.textContent = 'Filière:';
      // Create select element
      var select = document.createElement('select');
      select.classList.add('form-control');
      select.setAttribute('name', 'cours');
      // Create options
      var option1 = document.createElement('option');
      option1.setAttribute('value', 'Genie Informatique');
      option1.textContent = 'Genie Informatique';
      var option2 = document.createElement('option');
      option2.setAttribute('value', 'Genie Electrique');
      option2.textContent = 'Genie Electrique';
      var option3 = document.createElement('option');
      option3.setAttribute('value', 'Technique de Management');
      option3.textContent = 'Technique de Management';
      var option4 = document.createElement('option');
      option4.setAttribute('value', 'Genie des Procedes Alimentaires');
      option4.textContent = 'Genie des Procedes Alimentaires';
      // Append options to select
      select.appendChild(option1);
      select.appendChild(option2);
      select.appendChild(option3);
      select.appendChild(option4);
      // Append select to dynamic input container
      dynamicInput.appendChild(select);
    } else if (type === 'Professeur' || type === 'Administration') {
      // Update label
      dynamicInputLabel.textContent = type === 'Professeur' ? 'Cours (séparé par une virgule):' : 'Designation:';
      // Create input element
      var input = document.createElement('input');
      input.classList.add('form-control');
      input.setAttribute('type', 'text');
      input.setAttribute('placeholder', type === 'Professeur' ? 'Cours (séparé par une virgule)' : 'Ecrire Votre Designation');
      input.setAttribute('name', 'designation');
      // Append input to dynamic input container
      dynamicInput.appendChild(input);
    }
  }

  // Add event listeners to radio buttons
  document.getElementById('exampleRadios1').addEventListener('change', function() {
    createDynamicInput('Etudiant');
  });

  document.getElementById('exampleRadios2').addEventListener('change', function() {
    createDynamicInput('Professeur');
  });

  document.getElementById('exampleRadios3').addEventListener('change', function() {
    createDynamicInput('Administration');
  });
</script>


      </form>
</body>
</html>
