<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Cours</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="./Css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="Css/stileCours.css">
<link rel="stylesheet" href="CSS/bulma.min.css">
  </head>
  <body>

<header>
     <?php
      require 'header/header.php';
     ?>
</header>

<main>

  <?php
include('config.php');
$sqlCours = "SELECT * FROM cours";
$queryCours = mysqli_query($conn, $sqlCours);
?>

<section class="awe-section">
    <div class="container">
        <div class="title title__style-02">
            <h2 class="title__title text-center">Nuestros Cursos</h2>
            <hr>
        </div>

        <div class="row">
            <?php
            while ($dataCours = mysqli_fetch_array($queryCours)) { ?>
                <div class="col-md-4">
                    <div class="card mb-4" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                    <img src="professeurDashboard/<?php echo $dataCours['image']; ?>" class="card-img-top" alt="<?php echo $dataCours['nomCours']; ?>" style="max-height: 300px;">
                        <div class="card-body">
                            <h2 class="card-title course-title"><?php echo $dataCours['nomCours']; ?></h2>
                            <p class="card-text"><?php echo $dataCours['description']; ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <i class="fas fa-calendar-alt mr-2"></i> <!-- Icono de calendario -->
                                    <?php echo $dataCours['datePublish']; ?> <!-- Fecha de publicación -->
                                </div>
                                <a href="#" class="btn btn-link text-white bg-primary" style="text-decoration: none;">Suivre</a> <!-- Enlace -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Bootstrap y Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<style>
    .course-title {
        font-size: 24px; /* Ajusta el tamaño del texto según sea necesario */
        margin-bottom: 15px; /* Espacio inferior para separar el título de la descripción */
    }
</style>

<script>
    function zoomIn(element) {
        element.style.transform = "scale(1.05)";
        element.style.transition = "transform 0.3s ease";
    }

    function zoomOut(element) {
        element.style.transform = "scale(1)";
    }
</script>




</main>

<footer class="text-muted py-5">
  <?php
    require './Footer/footer.php';
   ?>
  <a href="#" id="scrollToTop" class="btn">↑</a>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>


  </body>
</html>
