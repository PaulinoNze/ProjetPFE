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
        <br><br><br><br><br>
        <?php
        include('config.php');
        $sqlCours = "SELECT * FROM formation where statut = 'Actif'";
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
                                <img src="professeurDashboard/<?php echo 'data:image;base64,' . base64_encode($dataCours['image']); ?>" class="card-img-top" alt="<?php echo $dataCours['titre']; ?>" style="max-height: 300px;">
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
                                        <button id="add-course-btn" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" data-Cours_inscrits="1">Suivre Le Cours
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
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- Bootstrap y Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

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