<?php
session_start();
include "../database.php";
if (isset($_SESSION['userid']) && isset($_SESSION['email'])) {

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
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php"><i class="fas fa-home text-white"></i><strong>Home</strong> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cours.php"><i class="fas fa-book-open text-white"></i> <strong>Cours</strong></a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            
                                <ul class="nav user-menu float-right">
                                    <li class="nav-item dropdown has-arrow">
                                        <a href="../Etudiant/etudiantdashboard.php" class=" nav-link user-link" data-toggle="dropdown">
                                            <span class="user-img">
                                                <?php if (!empty($_SESSION['image'])) : ?>
                            <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="Admin">
                        <?php else : ?>
                            <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                        <?php endif; ?>
                        <span class="status online"></span></span>
                    <span><?php echo $_SESSION['prenom'];?></span>
                                        </a>
                                        
                                </div>
                            
                        </li>
                    </ul>
                </div>
</nav>
    </header>
    <main">
    <div class="main-wrapper">
    <div class="page-wrapper" style="margin-left: 1px;">
        <div class="content container-fluid">
            <div class="page-header" >
                <div class="row">
                    <div class="col-md-5">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Description des Formations</h5>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET['formation'])) {
                $formation = $_GET['formation'];
                $statut = "Actif";
                $sql = "SELECT coursId, nomCours, description, datePublish, image FROM cours WHERE statut = 'Actif' AND formationID = $formation ";
                $result = mysqli_query($conn, $sql);
                // Comprobar si existen cursos
                if (mysqli_num_rows($result) > 0) {
                    $counter = 0; // Inicializar contador
                    while($user = mysqli_fetch_assoc($result)){
                        if ($counter % 2 == 0) {
                            // Abre una nueva fila para cada dos elementos
                            echo '<div class="row">';
                        }
                        ?>

                        <div class="col-md-6">
                            <div class="blog-view">
                                <article class="blog blog-single-post">
                                    <h3 class="blog-title"><?php echo $user['nomCours'] ?></h3>
                                    <div class="blog-info clearfix">
                                        <div class="post-left">
                                            <ul>
                                                <li><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i> <span><?php echo $user['datePublish'] ?></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-image" style="height: 400px;">
                                        <a href="#">
                                            <?php if (!empty($user['image'])) : ?>
                                                <img class="img-fluid" src="../professeurDashboard/<?php echo $user['image']; ?>" >
                                            <?php else : ?>
                                                <img class="img-fluid" src="../Img/logo2.png" alt="Default Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div id="curso">
                                        <div class="container">
                                            <div class="blog-content mt-4">
                                                <h2>Introduction</h2>
                                                <p><?php echo $user['description'] ?></p>
                                                <br>
                                                <?php
                                                $coursId = $user['coursId'];
                                                $etudId = $_SESSION['userid'];
                                                $sqlCount = "SELECT count(*) FROM  coursinscrit where coursId = $coursId and etudId = $etudId";
                                                $resultCount = mysqli_query($conn, $sqlCount);
                                                $rowCount = mysqli_fetch_assoc($resultCount);
                                                $count = $rowCount['count(*)'];
                                                if($count > 0){
                                                    echo '<span style="color: green;"><h5>Vous êtes déjà inscrit dans ce cours</h5></span>';
                                                }else{
                                                    echo "<a href='add_course.php?coursId=$coursId&etudId=$etudId'><button id='add-course-btn' class='btn btn-primary' data-toggle='modal' data-target='#loginModal' data-Cours_inscrits='1'>Suivre Le Cours</button></a>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                </article>
                            </div>
                        </div>

                        <?php
                        $counter++; // Incrementar contador
                        if ($counter % 2 == 0) {
                            // Cierra la fila después de dos elementos
                            echo '</div>';
                        }
                    }
                    if ($counter % 2 != 0) {
                        // Si hay un número impar de elementos, cerrar la fila
                        echo '</div>';
                    }
                } else {
                    // Formación no encontrada
                    echo " Auncun Formation.";
                    exit();
                }
            } else {
                // ID de formación no especificado en la URL
                echo "ID de l'formation non spécifié.";
                exit();
            }
            ?>
            
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