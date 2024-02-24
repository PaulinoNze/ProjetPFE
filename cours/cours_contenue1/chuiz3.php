<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz de base </title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1>Quiz de base 3</h1>
  <form id="quizForm">
    <div class="form-group">
      <p>1. Quelle est la capitale de la France ?</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q1" id="q1a" value="a">
        <label class="form-check-label" for="q1a">
          a) Madrid
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q1" id="q1b" value="b">
        <label class="form-check-label" for="q1b">
          b) Paris
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q1" id="q1c" value="c">
        <label class="form-check-label" for="q1c">
          c) Londres
        </label>
      </div>
    </div>
    <div class="form-group">
      <p>2. Quel est le plus long fleuve du monde ?</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q2" id="q2a" value="a">
        <label class="form-check-label" for="q2a">
          a) Amazone
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q2" id="q2b" value="b">
        <label class="form-check-label" for="q2b">
          b) Nil
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q2" id="q2c" value="c">
        <label class="form-check-label" for="q2c">
          c) Mississippi
        </label>
      </div>
    </div>
    <div class="form-group">
      <p>3. Quel est le symbole chimique de l'or ?</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q3" id="q3a" value="a">
        <label class="form-check-label" for="q3a">
          a) Fe
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q3" id="q3b" value="b">
        <label class="form-check-label" for="q3b">
          b) Au
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="q3" id="q3c" value="c">
        <label class="form-check-label" for="q3c">
          c) Ag
        </label>
      </div>
    </div>
    <button type="button" class="btn btn-primary" id="checkAnswersBtn"><span style="color: black;">Vérifier les réponses</span></button>
  </form>
  <div id="results" class="mt-4"></div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('checkAnswersBtn').addEventListener('click', function() {
  var correctAnswers = ['b', 'a', 'b']; // Réponses correctes pour chaque question
  var userAnswers = [];
  
  // Obtenir les réponses sélectionnées par l'utilisateur
  for (var i = 1; i <= 3; i++) {
    var selectedOption = document.querySelector('input[name="q' + i + '"]:checked');
    if (selectedOption) {
      userAnswers.push(selectedOption.value);
    } else {
      userAnswers.push(null);
    }
  }
  
  // Vérifier les réponses
  var correctCount = 0;
  var resultsHTML = '<h2>Résultats :</h2><ul>';
  for (var j = 0; j < correctAnswers.length; j++) {
    resultsHTML += '<li>Question ' + (j + 1) + ' : ';
    if (userAnswers[j] === correctAnswers[j]) {
      resultsHTML += '<span class="text-success">Correct</span>';
      correctCount++;
    } else {
      resultsHTML += '<span class="text-danger">Incorrect</span> (La réponse correcte est ' + correctAnswers[j] + ')';
    }
    resultsHTML += '</li>';
  }
  resultsHTML += '</ul><p>Réponses correctes : ' + correctCount + ' sur 3.</p>';
  
  // Afficher les résultats
  var resultsDiv = document.getElementById('results');
  resultsDiv.innerHTML = resultsHTML;
});
</script>

</body>
</html>
