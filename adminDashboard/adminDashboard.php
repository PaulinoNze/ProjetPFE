<?php
session_start();
include "../database.php";
if (isset($_SESSION['adminId']) && isset($_SESSION['email'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>ESTD admin compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

        <link rel="stylesheet" href="../assets/css/fullcalendar.min.css">

        <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link rel="stylesheet" href="../assets/css/style.css">
        <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
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
                            <a href="adminDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../Img/logo2.png" alt="" width="30" height="30"></a>
                        </li>
                    </ul>

                    <ul class="nav user-menu float-right">
                        
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                                <?php
                                include "../database.php";
                                $adminId = $_SESSION['adminId'];
                                $sql = "SELECT prenom, image FROM admin WHERE adminId = $adminId";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                                <span class="user-img">
                                    <?php if (!empty($row['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" width="30" alt="Admin">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                                    <?php endif; ?>
                                    <span class="status online"></span></span>
                                <span><?php echo $row['prenom']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierAdmin.php">Modifier le profil</a>
                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
                            <a class="dropdown-item" href="modifierAdmin.php">Modifier le profil</a>
                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="header-left">
                            <a href="adminDashboard.php" class="logo">
                                <img src="../Img/logo1.jpg" height="60" alt="">
                                <span class="text-uppercase">EST-D</span>
                            </a>
                        </div>
                        <ul class="sidebar-ul">
                            <li class="menu-title">Menu</li>
                            <li class="active">
                                <a href="adminDashboard.php"><img src="../assets/img/sidebar/icon-1.png" alt="icon"><span>Tableau de Bord</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-2.png" alt="icon"> <span> Professeur</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousProfessur.php"><span>Professeurs</span></a></li>
                                    <li><a href="ajouterProfessur.php"><span>Ajouter Professeur</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Etudiants</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousEtudiants.php"><span>Tous L'Etudiants</span></a></li>
                                    <li><a href="ajouterEdutiant.php"><span>Ajouter Etudiant</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Formation</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="approveformation.php"><span>Les Formation</span></a></li>
                                    <li><a href="ajouterFormation.php"><span>Ajouter Formation</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
<a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Cour</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="cours.php"><span>Les Cours</span></a></li>
</ul>
</li>

                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Forum</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="forum.php"><span>Forum</span></a></li>
                                    <li><a href="ajouterForum.php"><span>Ajouter Forum</span></a></li>

                                </ul>
                            </li>

                    </div>
                </div>
            </div>


            <div class="page-wrapper">
                <div class="content container-fluid">

                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="page-title mb-0">Tableau de Bord</h3>
                            </div>
                            <div class="col-md-6">
                                <ul class="breadcrumb mb-0 p-0 float-right">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><span>Tableau de Bord</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget dash-widget5">
                                <span class="float-left"><img src="../assets/img/dash/dash-1.png" alt="" width="80"></span>
                                <div class="dash-widget-info text-right">
                                    <span>Etudiants</span>
                                    <?php
                                    $sqlEtud = "SELECT COUNT(*) AS student_count FROM etudiant WHERE statut = '1'";
                                    $resultEtud = mysqli_query($conn, $sqlEtud);
                                    $rowEtud = mysqli_fetch_assoc($resultEtud);
                                    if ($rowEtud != 0) {
                                        $studentCount = $rowEtud['student_count'];;
                                    } else {
                                        $studentCount = 0;
                                    }

                                    ?>
                                    <h3><?php echo $studentCount; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget dash-widget5">
                                <div class="dash-widget-info text-left d-inline-block">
                                    <span>Professeurs</span>
                                    <?php
                                    $sqlProf = "SELECT COUNT(*) AS professeur_count FROM professeur WHERE statut = '1'";
                                    $resultProf = mysqli_query($conn, $sqlProf);
                                    $rowProf = mysqli_fetch_assoc($resultProf);
                                    if ($rowProf != 0) {
                                        $professeurCount = $rowProf['professeur_count'];
                                    } else {
                                        $professeurCount = 0;
                                    }

                                    ?>
                                    <h3><?php echo $professeurCount; ?></h3>
                                </div>
                                <span class="float-right"><img src="../assets/img/dash/dash-2.png" width="80" alt=""></span>
                            </div>
                        </div>
                        <!--------------------------------------------tous les etudiants----------------------------------------------->
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title">
                                                    Demandes des étudiants
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <div class=" mt-sm-0 mt-2">
                                                    <button class="btn btn-outline-danger mr-2" onclick="downloadEtudPDF()">
                                                        <img src="../assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span>
                                                    </button>
                                                    <script>
                                                        function downloadEtudPDF() {
                                                            // Redirect to the PHP script that generates the PDF
                                                            window.location.href = 'generate_pdf.php';
                                                        }
                                                    </script>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table custom-table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Email</th>
                                                        <th>Telephone</th>
                                                        <th>Date de Naissance</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM etudiant WHERE statut = '0'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <h2><a href="etudiantInfo.php?id=<?php echo $row['etudId']; ?>" class="avatar text-white"><?php if (!empty($row['image'])) : ?>
                                                                                <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" alt="User Image">
                                                                            <?php else : ?>
                                                                                <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                                            <?php endif; ?></a></a><a href="adminInfo.php"> <span></span></a></h2>
                                                                </td>
                                                                <td><?php echo $row['nom']; ?></td>
                                                                <td><?php echo $row['prenom']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['telephone']; ?></td>
                                                                <td><?php echo $row['date_naissance']; ?></td>
                                                                <td class="text-right">
                                                                    <button onclick="updateStatusEtud(<?php echo $row['etudId']; ?>)" type="button" class="btn btn-outline-success"> ✔ </button>

                                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_employee" onclick="deleteRequestEtud(<?php echo $row['etudId']; ?>)">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                </td>
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                                                <script>
                                                                    function updateStatusEtud(etudId) {
                                                                        $.ajax({
                                                                            url: 'updateStatus.php',
                                                                            type: 'POST',
                                                                            data: {
                                                                                etudId: etudId
                                                                            },
                                                                            success: function(response) {
                                                                                window.location.reload();
                                                                            },
                                                                            error: function(xhr, status, error) {
                                                                                console.error(xhr.responseText);
                                                                            }
                                                                        });
                                                                    }
                                                                </script>
                                                                <script>
                                                                    function deleteRequestEtud(etudId) {
                                                                        $.ajax({
                                                                            url: 'deleteRequest.php',
                                                                            type: 'POST',
                                                                            data: {
                                                                                etudId: etudId
                                                                            },
                                                                            success: function(response) {
                                                                                window.location.reload();
                                                                            },
                                                                            error: function(xhr, status, error) {
                                                                                console.error(xhr.responseText);
                                                                            }
                                                                        });
                                                                    }
                                                                </script>


                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        // No rows returned from the database
                                                        echo "<tr><td colspan='7'>Aucun étudiant</td></tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-lg-11">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title">
                                                    Demandes des professeurs
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <div class=" mt-sm-0 mt-2">
                                                    <button class="btn btn-outline-danger mr-2" onclick="downloadPDF()">
                                                        <img src="../assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span>
                                                    </button>
                                                    <script>
                                                        function downloadPDF() {
                                                            // Redirect to the PHP script that generates the PDF
                                                            window.location.href = 'generate_pdf_prof.php';
                                                        }
                                                    </script>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table custom-table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Email</th>
                                                        <th>Telephone</th>
                                                        <th>Date de Naissance</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM professeur WHERE statut = '0'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <h2><a href="professeurInfo.php?id=<?php echo $row['profId']; ?>" class="avatar text-white"><?php if (!empty($row['image'])) : ?>
                                                                                <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" alt="User Image">
                                                                            <?php else : ?>
                                                                                <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                                            <?php endif; ?></a></a><a href="adminInfo.php"> <span></span></a></h2>
                                                                </td>
                                                                <td><?php echo $row['nom']; ?></td>
                                                                <td><?php echo $row['prenom']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['telephone']; ?></td>
                                                                <td><?php echo $row['date_naissance']; ?></td>
                                                                <td class="text-right">
                                                                    <button onclick="updateStatus(<?php echo $row['profId']; ?>)" type="button" class="btn btn-outline-success"> ✔ </button>

                                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_employee" onclick="deleteRequest(<?php echo $row['profId']; ?>)">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                </td>
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                                                <script>
                                                                    function updateStatus(profId) {
                                                                        $.ajax({
                                                                            url: 'updateStatus.php',
                                                                            type: 'POST',
                                                                            data: {
                                                                                profId: profId
                                                                            },
                                                                            success: function(response) {
                                                                                window.location.reload();
                                                                            },
                                                                            error: function(xhr, status, error) {
                                                                                console.error(xhr.responseText);
                                                                            }
                                                                        });
                                                                    }
                                                                </script>
                                                                <script>
                                                                    function deleteRequest(profId) {
                                                                        $.ajax({
                                                                            url: 'deleteRequest.php',
                                                                            type: 'POST',
                                                                            data: {
                                                                                profId: profId
                                                                            },
                                                                            success: function(response) {
                                                                                window.location.reload();
                                                                            },
                                                                            error: function(xhr, status, error) {
                                                                                console.error(xhr.responseText);
                                                                            }
                                                                        });
                                                                    }
                                                                </script>


                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        // No rows returned from the database
                                                        echo "<tr><td colspan='7'>Aucun professeur</td></tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

            </div>


            <script src="../assets/js/jquery-3.6.0.min.js"></script>

            <script src="../assets/js/bootstrap.bundle.min.js"></script>

            <script src="../assets/js/jquery.slimscroll.js"></script>

            <script src="../assets/js/select2.min.js"></script>
            <script src="../assets/js/moment.min.js"></script>

            <script src="../assets/js/fullcalendar.min.js"></script>
            <script src="../assets/js/jquery.fullcalendar.js"></script>

            <script src="../assets/plugins/morris/morris.min.js"></script>
            <script src="../assets/plugins/raphael/raphael-min.js"></script>
            <script src="../assets/js/apexcharts.js"></script>
            <script src="../assets/js/chart-data.js"></script>

            <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>