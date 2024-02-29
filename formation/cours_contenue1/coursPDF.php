<?php
include "../../database.php";
if (isset($_GET['chapitreId'])) {
	$chapitreId = $_GET['chapitreId'];
?>
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
  
  <div id="pdfDiv" class="mt-4">
    <h2>PDF du Cours</h2>
<?php
    $sql = "SELECT pdf FROM chapitre WHERE chapitreId = $chapitreId";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $pdf  = $row['pdf'];
    
    ?>
    <!-- Ajoutez votre PDF ici -->
    <object data="../../professeurDashboard/<?php echo $pdf;?>" type="application/pdf" width="100%" height="500px">
      <p>Le PDF ne peut pas être affiché. <a href="../../professeurDashboard/<?php echo $pdf;?>">Cliquez ici pour le télécharger</a>.</p>
    </object>
    <a href="cours_pdf.pdf" download="cours_pdf.pdf" class="btn btn-success mt-3"><span style="color: black;">Télécharger le PDF</span></a>
  </div>
</div>
<?php
    }else{
      echo "Aucun PDF";
    }
?>

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
<?php
} else {
	// No rows returned from the database
	echo "<p>Aucun cours</p>";
}
?>