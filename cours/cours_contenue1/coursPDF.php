<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cours PDF</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1>Ceci est le pdf du cours.</h1>
  <button type="button" class="btn btn-primary" id="showPdfBtn"><span style="color: black;">Voir le PDF du cours</span></button>
  
  <div id="pdfDiv" class="mt-4" style="display: none;">
    <h2>PDF du Cours</h2>
    <!-- Ajoutez votre PDF ici -->
    <object data="cours_pdf.pdf" type="application/pdf" width="100%" height="500px">
      <p>Le PDF ne peut pas être affiché. <a href="cours.pdf">Cliquez ici pour le télécharger</a>.</p>
    </object>
    <a href="cours_pdf.pdf" download="cours_pdf.pdf" class="btn btn-success mt-3"><span style="color: black;">Télécharger le PDF</span></a>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('showPdfBtn').addEventListener('click', function() {
  // Afficher le div du PDF
  document.getElementById('pdfDiv').style.display = 'block';
});
</script>

</body>
</html>
