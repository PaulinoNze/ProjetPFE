<?php
session_start();
include "../database.php";
if (isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <nomCours>EST-D professeur compte</nomCours>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <?php include('css.html'); ?>
        <style type="text/css" media="screen">
            .sidebar ul li a {
                color: #606060 !important;
                font-weight: 600 !important;
            }

            ul li a:hover {
                color: #333 !important;
            }
        </style>
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

        <link rel="stylesheet" href="../assets/css/select2.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">
        <!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
	<![endif]-->
    </head>

    <body>

        <div class="main-wrapper">

            <div class="header-outer">
                <div class="header">
                    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
                    <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                        <img src="../assets/img/sidebar/icon-21.png" alt="">
                    </a>

                    <ul class="nav float-left">
                        <li>
                            <div class="top-nav-search">
                                <a href="javascript:void(0);" class="responsive-search">
                                    <i class="fa fa-search"></i>
                                </a>
                                <form action="search.html">
                                    <input class="form-control" type="text" placeholder="Search here">
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                        <li>
                            <a href="professeurDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../assets/img/logo1.png" alt="" width="30" height="30"></a>
                        </li>
                    </ul>

                    <ul class="nav user-menu float-right">
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="../assets/img/sidebar/icon-23.png" alt=""> </a>
                        </li>
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <?php if (!empty($_SESSION['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="professeur">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                                    <?php endif; ?>
                                    <span class="status online"></span></span>
                                <span><?php echo $_SESSION['prenom']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
                            <a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="header-left">
                            <a href="professeurDashboard.php" class="logo">
                                <img src="../Img/logo1.jpg" height="60" alt="">
                                <span class="text-uppercase">EST-D</span>
                            </a>
                        </div>
                        <ul class="sidebar-ul">
                            <li class="menu-nomCours">Menu</li>
                            <li class="active">
                                <a href="professeurDashboard.php"><img src="../assets/img/sidebar/icon-1.png" alt="icon"><span>Tableau de Bord</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Etudiants</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousEtudiants.php"><span>Etudiants inscrits à la formation</span></a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Cours</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="cours.php"><span>Cours</span></a></li>
                                </ul>
                            </li>

                        </ul>
                        </li>

                    </div>
                </div>
            </div>


            <div class="page-wrapper">
                <!-- partial -->
                <?php
                include('msj.php');

                // Suponiendo que tienes el ID del profesor almacenado en $_SESSION['profId']
                $professor_id = $_SESSION['profId'];

                // Consulta SQL para seleccionar solo los cursos del profesor actual
                $sqlCours = "SELECT * FROM cours WHERE profId = $professor_id";
                $queryCours = mysqli_query($conn, $sqlCours);
                ?>

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-nomCours text-center">LISTE DES COURS</h4>
                            <p>
                                <a href="#" data-toggle="modal" data-target="#editChildres" class="btn btn-danger" style="float: right;">
                                    <i class="zmdi zmdi-crop-free" style='color: black; font-size: 20px;'></i>
                                    Ajouter un cours</a>
                            </p>
                            <br>
                            <br><br>

                            <!--- ventana modal para editar Registro --->
                            <div class="row text-center mt-7">
                                <?php
                                while ($dataCours = mysqli_fetch_array($queryCours)) {
                                ?>
                                    <div class="row text-center mt-7">
                                        <?php
                                        while ($dataCours = mysqli_fetch_array($queryCours)) { ?>
                                            <div class="col-10 col-md-4">
                                                <div class="form-group" id="marcoborder">
                                                    <h5 class="text-center" id="nomCours">
                                                        Cours: <?php echo  $dataCours['nomCours']; ?>
                                                    </h5>
                                                    <hr>
                                                    <p><?php echo $dataCours['description']; ?></p>

                                                    <img src="<?php echo $dataCours['image']; ?>" id="imgLogo">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar<?php echo $dataCours['coursId']; ?>">
                                                        Modifier
                                                    </button>
                                                    <a href="deleteCours.php?id=<?php echo $dataCours['coursId']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le cours ?');">Supprimer</a>
                                                </div>
                                            </div>

                                            <!--- ventana modal para editar Registro --->
                                            <div class="modal fade" id="modificar<?php echo $dataCours['coursId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #0190e0  !important;">
                                                            <h6 class="modal-nomCours" style="color: #fff; text-align: center;">
                                                                Modifier les informations du cours
                                                            </h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="recibUpdateCours.php" enctype="multipart/form-data">
    <input type="hidden" name="coursId" value="<?php echo $dataCours['coursId']; ?>">
    <input type="hidden" name="datePublish" value="<?php echo $dataCours['datePublish']; ?>">

    <!-- Contenido del curso -->
    <div class="modal-body" id="cont_modal">
        <div class="form-group">
            <label for="recipient-name">Nom du cours</label>
            <input type="text" name="nomCours" class="form-control" value="<?php echo $dataCours['nomCours']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description du cours</label>
            <textarea class="form-control" name="description" rows="8"><?php echo $dataCours['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image" style="float:left;">Photo</label>
            <br>
            <img src="<?php echo $dataCours['image']; ?>" style="width: 100%; width:150px; border-radius: 5px;">
            <br><br>
            <label style="float:left;">Changer Photo</label>
            <br>
            <input type="file" name="image" accept="image/*">
        </div>

        <!-- Contenido de los capítulos -->
        <?php
        // Consulta SQL para obtener los capítulos asociados a este curso
        $sqlChapitres = "SELECT * FROM chapitre WHERE coursId = " . $dataCours['coursId'];
        $queryChapitres = mysqli_query($conn, $sqlChapitres);

        // Verificar si hay capítulos asociados
        if (mysqli_num_rows($queryChapitres) > 0) {
            while ($dataChapitre = mysqli_fetch_assoc($queryChapitres)) {
                ?>
                <div class="form-group">
                    <label for="nomChapitre">Nom du chapitre</label>
                    <input type="text" name="nomChapitre[]" class="form-control" value="<?php echo $dataChapitre['nomChapitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="video">Vidéo du chapitre</label>
                    <video controls style="width:100%;">
                        <source src="<?php echo $dataChapitre['video']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <br><br>
                    <label style="float:left;">Changer Vidéo</label>
                    <br>
                    <input type="file" name="video[]" accept="video/*">
                </div>
                <div class="form-group">
                    <label for="pdf">PDF du chapitre</label>
                    <embed src="<?php echo $dataChapitre['pdf']; ?>" type="application/pdf" width="100%" height="600px" />
                    <br><br>
                    <label style="float:left;">Changer PDF</label>
                    <br>
                    <input type="file" name="pdf[]" accept=".pdf">
                </div>
        <?php
            }
        } else {
            echo "<p>Aucun chapitre trouvé.</p>";
        }
        ?>

        <!-- Campo de formación -->
        <div class="form-group">
            <label for="formation">Sélectionner la formation</label>
            <select name="formation" class="form-control">
                <?php
                // Consulta SQL para obtener todas las formaciones disponibles
                $sqlFormations = "SELECT * FROM formation";
                $queryFormations = mysqli_query($conn, $sqlFormations);

                // Iterar sobre cada formación y mostrarla como una opción en el campo de selección
                while ($formation = mysqli_fetch_assoc($queryFormations)) {
                    $selected = ($formation['formationID'] == $dataCours['formation']) ? 'selected' : '';
                    echo "<option value='" . $formation['formationID'] . "' $selected>" . $formation['titre'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
    </div>
</form>




                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin de editar en ventana modal -->
                                        <?php } ?>
                                    </div>

                                    <!--- ventana modal para editar Registro --->
                                    <div class="modal fade" id="modificar<?php echo $dataCours['coursId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #0190e0 !important;">
                                                    <h6 class="modal-nomCours" style="color: #fff; text-align: center;">Modifier les informations du cours</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="recibUpdateCours.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="coursId" value="<?php echo $dataCours['coursId']; ?>">
                                                    <input type="hidden" name="datePublish" value="<?php echo $dataCours['datePublish']; ?>">
                                                    <div class="modal-body" id="cont_modal">
                                                        <div class="form-group">
                                                            <label for="nomCours">Nom du cours</label>
                                                            <input type="text" name="nomCours" class="form-control" value="<?php echo $dataCours['nomCours']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description du cours</label>
                                                            <textarea class="form-control" name="description" rows="3"><?php echo $dataCours['description']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Photo</label><br>
                                                            <input type="file" name="image" accept="image/*">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="video">Vidéo</label><br>
                                                            <input type="file" name="video" accept="video/*">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pdf">PDF</label><br>
                                                            <input type="file" name="pdf" accept=".pdf">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="datePublish">Date de publication</label>
                                                            <input type="date" name="datePublish" class="form-control" value="<?php echo $dataCours['datePublish']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formation">Sélectionner la formation</label>
                                                            <select name="formation" class="form-control">
                                                                <?php
                                                                // Consulta SQL para obtener todas las formaciones disponibles
                                                                $sqlFormations = "SELECT * FROM formation";
                                                                $queryFormations = mysqli_query($conn, $sqlFormations);

                                                                // Iterar sobre cada formación y mostrarla como una opción en el campo de selección
                                                                while ($formation = mysqli_fetch_assoc($queryFormations)) {
                                                                    echo "<option value='" . $formation['formationID'] . "'>" . $formation['titre'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <!-- fin de editar en ventana modal -->
                        <?php } ?>
                        </div>



                        <!--ventana Modal Nuevo Destino--->
                        <div class="modal fade" id="editChildres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #0190e0  !important;">
                                        <h6 class="modal-nomCours" style="color: #fff; text-align: center;">Enregistrer un nouveau cours</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form method="POST" action="recibNouvelleCours.php" enctype="multipart/form-data">
                                        <div class="modal-body" id="cont_modal">
                                            <!-- Resto del formulario -->
                                            <div class="form-group">
                                                <label for="recipient-name">Nom du cours</label>
                                                <input type="text" name="nomCours" class="form-control" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description du cours</label>
                                                <textarea class="form-control" name="description" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Photo</label><br>
                                                <input type="file" name="image" accept="image/*" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="datePublish">Date de publication</label>
                                                <input type="date" name="datePublish" class="form-control" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="formation">Sélectionner la formation</label>
                                                <select name="formation" class="form-control">
                                                    <?php
                                                    // Consulta SQL para obtener todas las formaciones disponibles
                                                    $sqlFormations = "SELECT * FROM formation";
                                                    $queryFormations = mysqli_query($conn, $sqlFormations);

                                                    // Itera sobre cada formación y muestra como opción en el campo de selección
                                                    while ($formation = mysqli_fetch_assoc($queryFormations)) {
                                                        echo "<option value='" . $formation['formationID'] . "'>" . $formation['titre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- Sección de Chapitres -->
                                            <div class="form-group">
                                                <label for="numChapitres">Nombre de chapitres à ajouter</label>
                                                <input type="number" name="numChapitres" id="numChapitres" class="form-control">
                                            </div>
                                            <!-- Contenedor de los campos de los capítulos -->
                                            <div id="chapitres-container"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">S'inscrire au cours</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>






                        <?php include('js.html'); ?>

                    </div>
                </div>


            </div>
            <script>
                $(document).ready(function() {
                    $('#numChapitres').on('change', function() {
                        var numChapitres = $(this).val();
                        var html = '';
                        for (var i = 1; i <= numChapitres; i++) {
                            html += '<div class="form-group">';
                            html += '<label for="chapitre' + i + '">Chapitre ' + i + '</label>';
                            html += '<input type="text" name="nomChapitre' + i + '" class="form-control">';
                            html += '<label for="video' + i + '">Vidéo</label>';
                            html += '<input type="file" name="video' + i + '" accept="video/*" class="form-control">';
                            html += '<label for="pdf' + i + '">PDF</label>';
                            html += '<input type="file" name="pdf' + i + '" accept=".pdf" class="form-control">';
                            // Puedes agregar más campos aquí según sea necesario
                            html += '</div>';
                        }
                        $('#chapitres-container').html(html);
                    });
                });
            </script>
            <script>
                function agregarCapitulos() {
                    var numChapitres = document.getElementById('numChapitres').value;
                    var container = document.getElementById('chapitres-section');

                    // Generar campos para cada capítulo
                    for (var i = 1; i <= numChapitres; i++) {
                        var div = document.createElement('div');
                        div.className = 'chapitre-existing';
                        div.innerHTML = `
                <input type="text" name="nomChapitre[]" class="form-control" placeholder="Nom du chapitre" required>
                <input type="file" name="video[]" accept="video/*">
                <input type="file" name="pdf[]" accept=".pdf">
            `;
                        container.appendChild(div);
                    }
                }
            </script>
            <script src="../assets/js/jquery-3.6.0.min.js"></script>

            <script src="../assets/js/bootstrap.bundle.min.js"></script>

            <script src="../assets/js/jquery.slimscroll.js"></script>

            <script src="../assets/js/select2.min.js"></script>
            <script src="../assets/js/moment.min.js"></script>

            <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>