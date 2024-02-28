<?php
session_start();
include "../database.php";
if (isset($_SESSION['etudId']) || $_SESSION['nom'] || $_SESSION['email']) {

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Online</title>
    <!-- Enlaces a Bootstrap y FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Curso Online</a>
        <!-- Botón para abrir/cerrar menú en dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Enlaces del menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Introducción
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <!-- Contenido de la Introducción -->
                        <a class="dropdown-item" href="#introduction">Subsección 1</a>
                        <a class="dropdown-item" href="#introduction">Subsección 2</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Capítulos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <!-- Contenido de los Capítulos -->
                        <a class="dropdown-item" href="#chapters">Capítulo 1</a>
                        <a class="dropdown-item" href="#chapters">Capítulo 2</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quiz">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#final-exam">Examen Final</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#certificate">Certificado</a>
                </li>
            </ul>
        </div>
        <!-- Enlaces adicionales a la derecha -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <ul class="nav user-menu float-right">
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <?php if (!empty($_SESSION['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="Admin">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                                    <?php endif; ?>
                                    <span class="status online"></span>
                                </span>
                                <span><?php echo $_SESSION['prenom'];?></span>
                            </a>
                            <!-- Dropdown menu -->
                            <!-- Contenido del menú desplegable -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Contenido de la página -->
<div class="container mt-5">
    <!-- Introducción -->
    <section id="introduction">
        <h2>Introducción</h2>
        <p>Descripción general del curso...</p>
    </section>

    <!-- Capítulos -->
    <section id="chapters" class="mt-5">
        <h2>Capítulos</h2>
        <!-- Contenido de los capítulos -->
    </section>

    <!-- Quiz -->
    <section id="quiz" class="mt-5">
        <h2>Quiz</h2>
        <p>Completa los quizzes después de cada capítulo.</p>
    </section>

    <!-- Examen Final -->
    <section id="final-exam" class="mt-5">
        <h2>Examen Final</h2>
        <p>Completa el examen final para evaluar tus conocimientos.</p>
    </section>

    <!-- Certificado -->
    <section id="certificate" class="mt-5">
        <h2>Certificado</h2>
        <p>Obtén tu certificado después de completar el curso y el examen final.</p>
    </section>
</div>

<!-- Scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
} else {
    header("Location:../index.php");
}
?>