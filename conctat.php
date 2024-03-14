<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Paulino nze, syabonga, and edmon evens">
  <title>Contact</title>
  <!-- Incluimos Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="./Css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/stileCours.css">
  <!-- Estilos adicionales -->
  <style>
    /* Estilo para la imagen del establecimiento */
    .location-image {
      width: 100%;
      height: auto;
    }
    /* Estilo para los iconos */
    .contact-icon {
      font-size: 24px;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <header>
   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container-fluid">
      <img src="Img/logo_0.png" alt="Imagen" style="float: left; margin-right: 10px; width: 200px; height: 70px;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cours.php">Formation</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="etablissement.php">Établissement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="conctat.php">Contact</a>
          </li>
        </ul>
         <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 529px;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="btn btn-success" href="login/login.php" style="margin-right: 10px;">Connect</a>
          </li>
          <li class="nav-item" >
            <a class="btn btn-danger" href="s_abonner/inscritp.php" >S'abonner</a>
          </li>
        </ul>
       </div>

      </div>
    </div>
  </nav>
</header>
<br>
<br>
<br>

<section class="container-fluid bg-while text-light-black py-4">
  <div class="container">
    <div class="row align-items-center">
              <!-- Imagen a la derecha -->
      <div class="col-md-7 text-md-end">    <br>
      <a href="https://www.google.com/maps/place/High+School+of+Technologie+Dakhla/@23.7614356,-15.9155645,19.07z/data=!4m6!3m5!1s0xc2249374281fd6f:0x6fbdf2dd10080a9!8m2!3d23.7611875!4d-15.9148125!16s%2Fg%2F11pb15200j?entry=ttu" target="_blank">
      <img src="Img/map-with-location-pin-vector.jpg" alt="Imagen" class="img-fluid">
      </a>
      </div>
      <!-- Contenido a la izquierda -->
      <div class="col-md-5">
        <!-- Título y descripción -->
        <h2>Contactez-Nous Pour Plus D'informations</h2>
        <p>N'hésitez pas à nous contacter pour obtenir plus d'informations sur nos programmes, 
          nos services et nos offres éducatives. Notre équipe dévouée est là pour répondre à toutes vos questions,
           vous guider dans votre parcours éducatif et vous fournir les détails nécessaires pour 
           prendre des décisions éclairées.</p>
             <div class="row">
    <div class="col-md-4">
      <!-- Detalles de contacto -->
      <div>
        <i class="fas fa-map-marker-alt contact-icon"></i><p style="font-size: 11px;">Q36P+F3F, Dakhla 73000</p>
        
      </div>
      <div>
        <i class="fas fa-phone contact-icon"></i>
        <p style="font-size: 11px;">Téléphone: +123456789</p>
      </div>
      <div>
        <i class="fas fa-envelope contact-icon"></i>
        <p style="font-size: 11px;">Courrier électronique: info@tuestablecimiento.com</p>
      </div>
    </div>
  </div>
        <!-- Enlaces -->
        <a href="s_abonner/inscritp.php" class="btn btn-primary me-2">S'abonner</a>
        <a href="login/login.php" class="btn btn-outline-success">Connect</a>
      </div>
    </div>
  </div>
</section>


<hr>

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


<!-- Incluimos FontAwesome para los iconos -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
