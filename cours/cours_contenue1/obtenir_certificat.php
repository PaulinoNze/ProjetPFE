<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificat de Cours</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1>Félicitations ! Vous avez terminé le cours.</h1>
  <button type="button" class="btn btn-primary" id="showCertificateBtn"><span style="color: black;">Obtenir le certificat</span></button>
  
  <div id="certificateDiv" class="mt-4" style="display: none;">
    <h2>Certificat de Fin de Cours</h2>
    <!-- Ajoutez votre certificat ici -->
    <img src="foto_certificat.png" class="img-fluid" alt="Certificat de Fin de Cours">
    <a href="certificate.pdf" download="certificate.pdf" class="btn btn-success mt-3"><span style="color: black;">Télécharger le Certificat</span></a>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('showCertificateBtn').addEventListener('click', function() {
  // Afficher le div du certificat
  document.getElementById('certificateDiv').style.display = 'block';
});
</script>

</body>
</html>
