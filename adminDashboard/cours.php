<?php
session_start();
if (isset($_SESSION['adminId']) && $_SESSION['email']) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>EST-D admin compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

        <link rel="stylesheet" href="../assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

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

                            <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
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
                            <li>
                                <a href="adminDashboard.php"><img src="../assets/img/sidebar/icon-1.png" alt="icon"><span>Tableau de Bord</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-2.png" alt="icon"> <span>Professeurs</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousProfessur.php"><span>Tous Professeurs</span></a></li>
                                    <li><a href="ajouterProfessur.php"><span>AJouter Professeur</span></a></li>

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
                                <a href="#"><img src="../assets/img/sidebar/icon-5.png" alt="icon"> <span> Formation</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="approveformation.php"><span>Approver Formation</span></a></li>
                                    <li><a href="ajouterFormation.php"><span>Ajouter Formation</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Cours</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a class="active" href="cours.php"><span>Approver Les Cours</span></a></li>
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Cours</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="cours.php">Cours</a></li>
                                    <li class="breadcrumb-item"><span> Approver Les Cours</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------------content------------------------------------------------>
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div class="page-title">
                                                Les Cours
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <div class=" mt-sm-0 mt-1">
                                                <button class="btn btn-outline-danger mr-2" onclick="downloadPDF()">
                                                    <img src="../assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span>
                                                </button>
                                                <script>
                                                    function downloadPDF() {
                                                        // Redirect to the PHP script that generates the PDF
                                                        window.location.href = 'generate_cours_pdf.php';
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
                                                    <th>Nom de Cours</th>
                                                    <th>Date Publish</th>
                                                    <th>Statut</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include "../database.php";
                                                $sql = "SELECT * FROM cours";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <h2><a href="../cours/coursInfo.php?id=<?php echo $row['coursId']; ?>" class="avatar text-white">
                                                                <?php if (!empty($row['image'])) : ?>
                                                                            <img class="avatar" src="../professeurDashboard/<?php echo $row['image']; ?>" alt="User Image">
                                                                        <?php else : ?>
                                                                            <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                                        <?php endif; ?></a></a><a href="adminInfo.php"> <span></span></a></h2>
                                                            </td>
                                                            <br>
                                                            <td><?php echo $row['nomCours']; ?></td>
                                                            <td><?php echo $row['datePublish']; ?></td>
                                                            <td><?php echo $row['statut']; ?></td>
                                                            <td class="text-right">
                                                                <button onclick="updateStatus(<?php echo $row['coursId']; ?>)" type="button" class="btn btn-outline-success"> ✔ </button>
                                                                <button onclick="inActif(<?php echo $row['coursId']; ?>)" type="button" class="btn btn-outline-warning">✘</button>
                                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_employee" onclick="deleteRequest(<?php echo $row['coursId']; ?>)">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    // No rows returned from the database
                                                    echo "<tr><td colspan='7'>Aucun Formation</td></tr>";
                                                }
                                                ?>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                <script>
                                                    function updateStatus(coursId) {
                                                        $.ajax({
                                                            url: 'updateStatus.php',
                                                            type: 'POST',
                                                            data: {
                                                                coursId: coursId
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
                                                    function inActif(coursId) {
                                                        $.ajax({
                                                            url: 'inActif.php',
                                                            type: 'POST',
                                                            data: {
                                                                coursId: coursId
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
                                                    function deleteRequest(coursId) {
                                                        $.ajax({
                                                            url: 'deleteRequest.php',
                                                            type: 'POST',
                                                            data: {
                                                                coursId: coursId
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

            <script src="../assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

            <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>