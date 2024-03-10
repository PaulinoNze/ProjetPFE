<?php
session_start();
include "../database.php";
if (isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']) {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $sql = "SELECT * FROM formation WHERE formationID = $userId";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        } else {
            echo "Utilisateur non trouvé.";
            exit();
        }
    } else {
        echo "ID de l'utilisateur non spécifié.";
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="shortcut icon" type="image/x-icon" href="../Img/logo1.jpg">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="../Css/stileCours.css">

        <!-- Bootstrap core CSS -->


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .p-1:hover {
                background-color: blue !important;
                color: white !important;
            }
        </style>

        <!-- Custom styles for this template -->
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary " style="margin-top: 1px;">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="../Img/logo2.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                            Cours
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link bg-body-tertiary text-dark" aria-current="page" href="../adminDashboard/approveformation.php">Retour pour approuver la formation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main">

            <div class="main-wrapper">
                <div class="page-wrapper" style="margin-left: 170px;">
                    <div class="content container-fluid">
                        <div class="page-header" style="margin-right: 180px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="text-uppercase mb-0 mt-0 page-title">Description des Formations</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="blog-view">
                                    <article class="blog blog-single-post">
                                        <h3 class="blog-title"><?php echo $user['titre'] ?></h3>
                                        <div class="blog-info clearfix">
                                            <div class="post-left">
                                                <ul>
                                                    <li><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i> <span><?php echo $user['datePublish'] ?></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-image">
                                            <a href="#"><?php if (!empty($user['image'])) : ?>
                                                    <img class="img-fluid" src="<?php echo 'data:image;base64,' . base64_encode($user['image']); ?>">
                                                <?php else : ?>
                                                    <img class="img-fluid" src="../Img/logo2.png" alt="Default Image">
                                                    <?php endif; ?></a>
                                        </div>
                                        <div id="curso">
                                            <div class="container">
                                                <div class="blog-content mt-4">
                                                    <h2>Introduction</h2>
                                                    <p><?php echo $user['description'] ?></p>
                                                    <button id="add-course-btn" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" data-Cours_inscrits="1">Suivre Le Cours</button>
                                                </div>
                                            </div>
                                    </article>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>