<?php
include "../../database.php";
$coursId = $_GET['coursId'];
$etudId = $_GET['etudId'];


$sql = "SELECT note FROM coursinscrit WHERE etudId = $etudId AND coursId = $coursId";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $note = $row['note'];


    if ($note < 60) {
        $buttonStatus = "disabled";
        $message = "Vous devez valider le cours pour obtenir une attestation.";
    } else {
        $buttonStatus = "";
        $message = "Félicitations ! Vous avez terminé le cours.";
    }
} else {
    
    $buttonStatus = "disabled";
    $message = "Aucune note n'est disponible pour ce cours.";
}
?>
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
  <h1><?php echo $message; ?></h1>
  <button id="showCertificateBtn" class="btn btn-primary" <?php echo $buttonStatus; ?>>Obtenir le certificat</button>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('showCertificateBtn').addEventListener('click', function() {
  // Make an AJAX request to generate the PDF
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'certificate.php?coursId=<?php echo $coursId; ?>&etudId=<?php echo $etudId; ?>', true);
  xhr.responseType = 'blob';
  xhr.onload = function() {
    if (this.status === 200) {
      // Create a blob URL for the PDF
      var blob = new Blob([this.response], { type: 'application/pdf' });
      var url = URL.createObjectURL(blob);
      // Create a link and trigger a download
      var a = document.createElement('a');
      a.href = url;
      a.download = 'certificate.pdf';
      document.body.appendChild(a);
      a.click();
      // Cleanup
      window.URL.revokeObjectURL(url);
    }
  };
  xhr.send();
});
</script>

</body>
</html>
