<?php
session_start();
include "../database.php";
if (isset($_SESSION['adminId']) && $_SESSION['email']) {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $sql = "SELECT coursId, nomCours, description, datePublish, image FROM cours WHERE statut = 'Actif' AND formationID = $userId";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
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
                            <img src="../Img/school_logo.png" alt="Logo" width="50" height="30" class="d-inline-block align-text-top">

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
                                    <div class="row">
                                        <?php
                                        while ($user = mysqli_fetch_assoc($result)) { ?>
                                            <div class="col-md-4">
                                                <div class="card mb-4" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                                                    <img src="../professeurDashboard/<?php echo $user['image']; ?>" class="card-img-top" alt="<?php echo $user['nomCours']; ?>" style="max-height: 300px;">
                                                    <div class="card-body">
                                                        <h2 class="card-title course-title"><?php echo $user['nomCours']; ?></h2>
                                                        <p class="card-text"><?php echo $user['description']; ?></p>
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div>
                                                                <i class="fas fa-calendar-alt mr-2"></i> <!-- Icono de calendario -->
                                                                <?php echo $user['datePublish']; ?> <!-- Fecha de publicación -->
                                                            </div>
                                                                <a href="../cours/coursInfo.php?id=<?php echo $user['coursId'];?>" class="btn btn-primary">Suivre La formation</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        echo "Utilisateur non trouvé.";
                                        exit();
                                    }
                                } else {
                                    echo "ID de l'utilisateur non spécifié.";
                                    exit();
                                }
                                        ?>
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