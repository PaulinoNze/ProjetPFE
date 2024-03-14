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
        <title>EST-D professeur compte</title>
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
<div class="header" >
<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
<a id="toggle_btn" class="float-left" href="javascript:void(0);">
<img src="../assets/img/sidebar/icon-21.png" alt="">
</a>

<ul class="nav float-left">
<li>

</li>
<li>
<a href="professeurDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../assets/img/logo1.png" alt="" width="30" height="30"></a>
</li>
</ul>

<ul class="nav user-menu float-right">
<li class="nav-item dropdown has-arrow">
<a href="#" class=" nav-link user-link" data-toggle="dropdown">
<span class="user-img">
    <?php if(!empty($_SESSION['image'])): ?>
        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="professeur">
    <?php else: ?>
        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
    <?php endif; ?>
</span>

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
<a class="dropdown-item" href="../PHP/logout.php">Logout</a>
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
                <div class="col-12 grid-margin">
                    <?php
                    include('msj.php');

                    ?>
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

                                <div class="row text-center mt-6">
                                    <?php


                                    // Suponiendo que tienes el ID del profesor almacenado en $_SESSION['profId']
                                    $professor_id = $_SESSION['profId'];
                                    $statut = "Actif";
                                    // Consulta SQL para seleccionar solo los cursos del profesor actual
                                    $sqlCours = "SELECT * FROM cours WHERE profId = $professor_id AND statut = '$statut'";
                                    $queryCours = mysqli_query($conn, $sqlCours);
                                    while ($dataCours = mysqli_fetch_array($queryCours)) {
                                    ?>
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

                                                            <!-- Sección de preguntas del examen final -->
                                                            <div class="form-group">
                                                                <label for="questions">Questions de l'examen final :</label><br>
                                                                <?php
                                                                // Consulta SQL para obtener las preguntas del examen final asociadas a este curso
                                                                $sqlQuestionsFinale = "SELECT * FROM examefinale WHERE coursId = " . $dataCours['coursId'];
                                                                $queryQuestionsFinale = mysqli_query($conn, $sqlQuestionsFinale);

                                                                // Iterar sobre cada pregunta y mostrarla en el formulario
                                                                $index = 1;
                                                                while ($questionData = mysqli_fetch_assoc($queryQuestionsFinale)) {
                                                                    echo "<div class='question'>";
                                                                    echo "<label for='question$index'>Question $index :</label><br>";
                                                                    echo "<input type='text' name='questionsFinale[$index][questionFinale]' class='form-control' value='{$questionData['question']}'>";
                                                                    echo "<br>";
                                                                    echo "<label for='r1'>Réponse 1 :</label><br>";
                                                                    echo "<input type='text' name='questionsFinale[$index][reponsesFinale][]' class='form-control' value='{$questionData['reponse_1']}'>";
                                                                    echo "<br>";
                                                                    echo "<label for='r2'>Réponse 2 :</label><br>";
                                                                    echo "<input type='text' name='questionsFinale[$index][reponsesFinale][]' class='form-control' value='{$questionData['reponse_2']}'>";
                                                                    echo "<br>";
                                                                    echo "<label for='r3'>Réponse 3 :</label><br>";
                                                                    echo "<input type='text' name='questionsFinale[$index][reponsesFinale][]' class='form-control' value='{$questionData['reponse_3']}'>";
                                                                    echo "<br>";
                                                                    echo "<label for='r4'>Réponse 4 :</label><br>";
                                                                    echo "<input type='text' name='questionsFinale[$index][reponsesFinale][]' class='form-control' value='{$questionData['reponse_4']}'>";
                                                                    echo "<br>";
                                                                    echo "<label for='num_rep_correct'>Numéro de la réponse correcte :</label><br>";
                                                                    echo "<select name='questionsFinale[$index][correctFinale]' class='form-control'>";
                                                                    for ($i = 1; $i <= 4; $i++) {
                                                                        $selected = ($questionData['reponse_correcte'] == $i) ? 'selected' : '';
                                                                        echo "<option value='$i' $selected>$i</option>";
                                                                    }
                                                                    echo "</select>";
                                                                    echo "</div>";
                                                                    $index++;
                                                                }
                                                                ?>
                                                            </div>


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



                                                            <!-- Sección de preguntas del quiz -->
                                                            <div class="form-group">
                                                                <label for="questions">Questions du quiz :</label><br>
                                                                <?php
                                                                // Consulta SQL para obtener las preguntas asociadas a este curso
                                                                $sqlQuestions = "SELECT * FROM quiz WHERE chapitreId IN (SELECT chapitreId FROM chapitre WHERE coursId='" . $dataCours['coursId'] . "')";
                                                                $queryQuestions = mysqli_query($conn, $sqlQuestions);

                                                                // Iterar sobre cada pregunta y mostrarla en el formulario
                                                                $index = 1;
                                                                while ($questionData = mysqli_fetch_assoc($queryQuestions)) {
                                                                    echo "<div class='question'>";
                                                                    echo "<label for='question$index'>Question $index :</label><br>";
                                                                    echo "<input type='text' name='questions[$index][question]' class='form-control' value='{$questionData['question']}'><br>";
                                                                    echo "<label for='r1'>Réponse 1 :</label><br>";
                                                                    echo "<input type='text' name='questions[$index][reponses][]' class='form-control' value='{$questionData['reponse_1']}'><br>";
                                                                    echo "<label for='r2'>Réponse 2 :</label><br>";
                                                                    echo "<input type='text' name='questions[$index][reponses][]' class='form-control' value='{$questionData['reponse_2']}'><br>";
                                                                    echo "<label for='r3'>Réponse 3 :</label><br>";
                                                                    echo "<input type='text' name='questions[$index][reponses][]' class='form-control' value='{$questionData['reponse_3']}'><br>";
                                                                    echo "<label for='num_rep_correct'>Numéro de la réponse correcte :</label><br>";
                                                                    echo "<select name='questions[$index][correct]' class='form-control'>";
                                                                    for ($i = 1; $i <= 3; $i++) {
                                                                        $selected = ($questionData['num_reponse_correcte'] == $i) ? 'selected' : '';
                                                                        echo "<option value='$i' $selected>$i</option>";
                                                                    }
                                                                    echo "</select><br>";
                                                                    echo "</div>";
                                                                    $index++;
                                                                }
                                                                ?>


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
                                            <div id="questions">
                                                <!-- Aquí se agregarán las preguntas dinámicamente -->

                                            </div>

                                            <hr>
                                            <div id="questionsExamen">
                                                <!-- Aquí se agregarán las preguntas dinámicamente -->

                                            </div>

                                            <button type="button" id="ajouter_Question_examen" class="btn btn-primary">Ajouter une Question au Examen finale</button>

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
        // Script para agregar capítulos
        function agregarCapitulos() {
            var numChapitres = document.getElementById('numChapitres').value;
            var container = document.getElementById('chapitres-section');

            // Limpiar el contenedor antes de agregar nuevos elementos
            container.innerHTML = '';

            // Generar campos para cada capítulo
            for (var i = 1; i <= numChapitres; i++) {
                var div = document.createElement('div');
                div.className = 'chapitre-existing';
                div.innerHTML = `
                    <div class="form-group">
                        <label for="chapitre${i}">Chapitre ${i}</label>
                        <input type="text" name="nomChapitre[]" class="form-control" placeholder="Nom du chapitre" required>
                        <label for="video${i}">Vidéo</label>
                        <input type="file" name="video[]" accept="video/*" class="form-control" required>
                        <label for="pdf${i}">PDF</label>
                        <input type="file" name="pdf[]" accept=".pdf" class="form-control" required>
                    </div>
                `;
                container.appendChild(div);
            }
        }
    </script>

            <script src="../assets/js/jquery-3.6.0.min.js"></script>
            <script>
    $(document).ready(function() {
        var questionIndexQuiz = 0; // Declaración de la variable questionIndexQuiz

        $('#numChapitres').on('change', function() {
            var numChapitres = $(this).val();
            var html = '';

            for (var i = 1; i <= numChapitres; i++) {
                html += '<div class="form-group">';
                html += '<label for="chapitre' + i + '">Chapitre ' + i + '</label>';
                html += '<input type="text" name="nomChapitre' + i + '" class="form-control" >';
                html += '<label for="video' + i + '">Vidéo</label>';
                html += '<input type="file" name="video' + i + '" accept="video/*" class="form-control" required>';
                html += '<label for="pdf' + i + '">PDF</label>';
                html += '<input type="file" name="pdf' + i + '" accept=".pdf" class="form-control" required><br>';
                html += '<div class="questions"></div>'; // Contenedor de las preguntas
                html += '<button type="button" class="ajouter_Question btn btn-primary">Ajouter une Question au Quiz</button><br>';
                // Puedes agregar más campos aquí según sea necesario
                html += '</div>';
            }

            $('#chapitres-container').html(html);
        });

        // Delegar el evento clic a un elemento padre
        $('#chapitres-container').on('click', '.ajouter_Question', function() {
            var questions = $(this).siblings('.questions');
            var nouvelleQuestion = $('<div class="question">');

            nouvelleQuestion.html(`
                <!-- Contenido de la pregunta del quiz -->
                <hr>
                <label for="question">Question du Quiz:</label><br>
                <input type="text" name="questions[${questionIndexQuiz}][question]" class="form-control"><br>
                <label for="r1">Réponse du Quiz 1 :</label><br>
                <input type="text" name="questions[${questionIndexQuiz}][reponses][]" class="form-control"><br>
                <label for="r2">Réponse du Quiz 2 :</label><br>
                <input type="text" name="questions[${questionIndexQuiz}][reponses][]" class="form-control"><br>
                <label for="r3">Réponse du Quiz 3 :</label><br>
                <input type="text" name="questions[${questionIndexQuiz}][reponses][]" class="form-control"><br>
                <label for="num_rep_correct">Num de la réponse correcte du Quiz :</label><br>
                <select name="questions[${questionIndexQuiz}][correct]" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>
            `);

            questions.append(nouvelleQuestion);
            questionIndexQuiz++;
        });
    });
</script>

<script>
    let questionExamenIndex = 0; // Contador para preguntas de examen final
    document.getElementById('ajouter_Question_examen').addEventListener('click', function() {
        var questionsExamen = document.getElementById('questionsExamen');
        var nouvelleQuestion = document.createElement('div');
        nouvelleQuestion.classList.add('question');

        nouvelleQuestion.innerHTML = `
            <!-- Contenido de la pregunta de examen final -->
            <hr>
            <label for="question">Question de l'examen :</label><br>
            <input type="text" name="questionsFinale[${questionExamenIndex}][questionFinale]" class="form-control"><br>
            <label for="r1">Réponse de l'examen 1 :</label><br>
            <input type="text" name="questionsFinale[${questionExamenIndex}][reponsesFinale][]" class="form-control"><br>
            <label for="r2">Réponse de l'examen 2 :</label><br>
            <input type="text" name="questionsFinale[${questionExamenIndex}][reponsesFinale][]" class="form-control"><br>
            <label for="r3">Réponse de l'examen 3 :</label><br>
            <input type="text" name="questionsFinale[${questionExamenIndex}][reponsesFinale][]" class="form-control"><br>
            <label for="r4">Réponse de l'examen 4 :</label><br>
            <input type="text" name="questionsFinale[${questionExamenIndex}][reponsesFinale][]" class="form-control"><br>
            <label for="num_rep_correct">Num de la réponse correcte de l'examen :</label><br>
            <select name="questionsFinale[${questionExamenIndex}][correctFinale]" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br>
        `;
        questionsExamen.appendChild(nouvelleQuestion);
        questionExamenIndex++;
    });
</script>
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