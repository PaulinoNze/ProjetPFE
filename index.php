<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Paulino nze, syabonga, and edmon evens">
  <meta name="generator" content="Hugo 0.84.0">
  <title>EST'D E-learning</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo2.png">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="./Css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/stileCours.css">
  <link rel="stylesheet" type="text/css" href="assets1/css/slider_marcas.css">
  <link rel="stylesheet" type="text/css" href="assets1/css/ol_li.css">
  <style>
    /* Estilos para las imágenes redondas */
    .customer-logos .slick-slide img {
      border-radius: 50%;
      width: 150px;
      /* Ancho de las imágenes */
      height: 150px;
      /* Alto de las imágenes */
      object-fit: cover;
      /* Para mantener el aspecto circular */
    }

    /* Estilo para el contenedor del slider */
    .customer-logos .slick-track {
      display: flex;
      /* Flexbox para alinear las imágenes en filas */
    }
  </style>
<style>
  .card {
    height: 100%;
  }

  .card-body {
    max-height: 400px; /* Ajusta esta altura máxima según tus necesidades */
    overflow: hidden;
    text-overflow: ellipsis; /* Esto cortará el texto que exceda la altura máxima y mostrará puntos suspensivos */
  }

  .card-img-top {
    max-height: 200px; /* Ajusta esta altura máxima según tus necesidades */
    object-fit: cover; /* Esto asegurará que la imagen se ajuste dentro del contenedor sin distorsionarla */
  }
</style>
  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">

</head>

<body>

  <header>
    <?php
    require 'header/header.php';
    ?>
  </header>

  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Img/curs.jpeg" width="100%" height="100%" />
          <div class="container">
            <div class="carousel-caption text-start">
            <h1>l'EST'D e-learning.</h1>
              <p>Dans le monde actuel, l'éducation en ligne a révolutionné la manière dont les gens 
                accèdent aux connaissances et acquièrent de nouvelles compétences. EST'D e-learning offre 
                la flexibilité d'apprendre à votre propre rythme, n'importe quand et n'importe où.
                Nos cours en ligne sont conçus pour vous offrir une expérience éducative
                 interactive et immersive, où vous pourrez explorer des sujets passionnants et développer 
                 de nouvelles compétences de manière efficace.
                </p>
                  <a href="s_abonner/inscritp.php" class="btn btn-primary me-2">S'abonner</a>
        <a href="login/login.php" class="btn btn-success">Connect</a>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="Img/cursOnly.webp" width="100%" height="100%" />
          <div class="container">
            <div class="carousel-caption">
              <h1>l'EST'D e-learning.</h1>
              <p>Dans le monde actuel, l'éducation en ligne a révolutionné la manière dont les gens 
                accèdent aux connaissances et acquièrent de nouvelles compétences. EST'D e-learning offre 
                la flexibilité d'apprendre à votre propre rythme, n'importe quand et n'importe où.
                Nos cours en ligne sont conçus pour vous offrir une expérience éducative
                 interactive et immersive, où vous pourrez explorer des sujets passionnants et développer 
                 de nouvelles compétences de manière efficace.
                </p>
                 <a href="s_abonner/inscritp.php" class="btn btn-primary me-2">S'abonner</a>
        <a href="login/login.php" class="btn btn-success">Connect</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Img/stablecment.jpg" width="100%" height="100%" />
          <div class="container">
            <div class="carousel-caption text-end">
            <h1>l'EST'D e-learning.</h1>
              <p>Dans le monde actuel, l'éducation en ligne a révolutionné la manière dont les gens 
                accèdent aux connaissances et acquièrent de nouvelles compétences. EST'D e-learning offre 
                la flexibilité d'apprendre à votre propre rythme, n'importe quand et n'importe où.
                Nos cours en ligne sont conçus pour vous offrir une expérience éducative
                 interactive et immersive, où vous pourrez explorer des sujets passionnants et développer 
                 de nouvelles compétences de manière efficace.
                </p>
                 <a href="s_abonner/inscritp.php" class="btn btn-primary me-2">S'abonner</a>
        <a href="login/login.php" class="btn btn-success">Connect</a>
            </div>
          </div>
        </div>
      </div>

    </div>



    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img src="Img/aprender-en-linea.png" alt="" class="img-fluid" style="max-width: 100px;">
          <title>Éducatives Numériques</title>
          </svg>

          <h2>Éducatives Numériques</h2>
          <p>Plongez dans une expérience éducative interactive où la technologie et 
            la connaissance se rejoignent. Découvrez un environnement d'apprentissage dynamique qui
             vous permet d'explorer de nouveaux horizons académiques de manière innovante.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
        <img src="Img/libro.png" alt="" class="img-fluid" style="max-width: 100px;">
          <title>Apprentissage Interactif</title>
          </svg>

          <h2>Collaboration Éducative</h2>
          <p>Connectez-vous à une communauté éducative vibrante et collaborative,
            où vous pourrez partager des idées, participer à des discussions et travailler sur des projets communs.
             Découvrez le pouvoir de la collaboration dans l'apprentissage
             et enrichissez votre expérience éducative de manière significative.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="Img/leccion-en-linea.png" alt="" class="img-fluid" style="max-width: 100px;">
          <title>Ressources Éducatives Numériques</title>
          </svg>

          <h2>Apprentissage Interactif </h2>
          <p> Accédez à une variété de ressources éducatives numériques qui enrichiront votre
             processus d'apprentissage. Des livres électroniques interactifs au contenu multimédia, 
            découvrez comment la technologie peut renforcer votre éducation de manière unique.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <?php
      include('config.php');
      $sqlCours = "SELECT * FROM formation where statut = 'Actif'";
      $queryCours = mysqli_query($conn, $sqlCours);
      ?>
      <div class="row">
        <?php
        $counter = 0; // Variable para llevar el conteo de los cursos mostrados
        while ($dataCours = mysqli_fetch_array($queryCours)) {
          if ($counter < 3) { // Muestra solo los primeros tres cursos
        ?>
            <div class="col-md-4">
              <div class="card mb-4" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                <img src="<?php echo 'data:image;base64,' . base64_encode($dataCours['image']); ?>" class="card-img-top" alt="<?php echo $dataCours['titre']; ?>" style="max-height: 300px;">
                <div class="card-body">
                  <h2 class="card-title course-title"><?php echo $dataCours['titre']; ?></h2>
                  <p class="card-text"><?php echo $dataCours['description']; ?></p>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                      <i class="fas fa-calendar-alt mr-2"></i> <!-- Icono de calendario -->
                      <?php echo $dataCours['datePublish']; ?> <!-- Fecha de publicación -->
                    </div>
                    <!-- Enlace -->
                    <!-- Agregar el atributo data-curso-id con el ID del curso -->
                    <!-- Botón "Ajouter Cours" -->
                    <button id="add-course-btn" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" data-Cours_inscrits="1">Suivre La formation
                    </button>
                    <!-- Modal de Inicio de Sesión -->
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Authentifiez-Vous</h5>
                    <ul class="navbar-nav ml-auto" style="display:inline-block;">
                      <li class="nav-item d-inline" style="margin-right: 10px;">
                        <a class="btn btn-success" href="formation/loginFormation.php?id=<?php echo $dataCours['formationID']; ?>">Conectar</a>
                      </li>
                      <li class="nav-item d-inline">
                        <a class="btn btn-danger" href="s_abonner/inscritp.php">S'abonner</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        <?php
            $counter++; // Incrementa el contador de cursos mostrados
          } else {
            break; // Detiene el bucle después de mostrar tres cursos
          }
        }
        ?>
      </div>

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <h2 class="featurette-heading">Découvrez l'Effiçacité et <span class="text-muted">la Convivialité de notre Application E-learning </span></h2>
          <p class="lead">Notre application EST'D a été conçue avec un accent mis sur l'efficacité et la convivialité
             pour vous offrir la meilleure expérience éducative possible. Avec une interface intuitive et facile à utiliser, 
             vous pourrez naviguer à travers nos cours, 
            accéder à des ressources éducatives et participer à des activités interactives de manière simple et rapide.</p>
        </div>
        <div class="col-md-7">
          <img src="Img/index.png" class="w-100 h-100" alt="">
          <title>Placeholder</title>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5 order-md-2">
          <h2 class="featurette-heading">Découverte de l'Apprentissage  <span class="text-muted">en Ligne avec EST'D</span></h2>
          <p class="lead"> Nos cours en ligne sont conçus pour vous offrir une expérience éducative interactive et immersive, où vous pourrez explorer
              des sujets passionnants et développer de nouvelles compétences de manière efficace
            </p>
        </div>
        <div class="col-md-7 order-md-1">
        <img src="Img/caracteristicas-plataforma-elearning-2.jpg" class="w-100 h-200" alt="">


        </div>
      </div>

   <br><br><br><br><br>

    </div>


    <!-- FOOTER -->

  </main>
  <section>



  <div class="container">
    <div class="title title__style-02">
      <h2 class="title__title text-center">NOS SPONSORS</h2>
      <hr>
    </div>


    <section class="customer-logos slider mb-5">
    <div class="slide">
        <img src="Img/IMG_7.png">
      </div>
      <div class="slide">
        <img src="Img/IMG_3.jpg">
      </div>
     <div class="slide">
        <img src="Img/logo1.jpg">
      </div>
      <div class="slide">
        <img src="Img/IMG_1.jpg">
      </div>
      <div class="slide">
        <img src="Img/bcm.jpeg">
      </div>
      <div class="slide">
        <img src="Img/IMG_3.jpg">
      </div>
      <div class="slide">
        <img src="Img/IMG_1.jpg">
      </div>
      <div class="slide">
        <img src="Img/logo1.jpg">
      </div>
      <div class="slide">
        <img src="Img/IMG_6.png">
      </div>
      <div class="slide">
        <img src="Img/bcm.jpeg">
      </div>
    </section>
    <br><br>

  </div>
  <hr>
  <footer class="container">
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
  <style>
    .course-title {
      font-size: 24px;
      /* Ajusta el tamaño del texto según sea necesario */
      margin-bottom: 15px;
      /* Espacio inferior para separar el título de la descripción */
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <!---slider de Marcas -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <!-- App-->
  <script type="text/javascript" src="assets1/js/main.js"></script>

  <script src="assets1/js/scroll.js"></script>
  <script>
    $(document).ready(function() {
      $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 3
          }
        }]
      });
    });
  </script>

</body>

</html>