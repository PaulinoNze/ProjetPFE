<?php
session_start();
include "../database.php";
if (isset($_SESSION['userid']) && isset($_SESSION['email'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>ESTD compte Etudiant </title>
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
                        <?php
                                include "../database.php";
                                $adminId = $_SESSION['userid'];
                                $sql = "SELECT prenom, image FROM etudiant WHERE etudId = $adminId";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
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
                                <a class="dropdown-item" href="monprofil.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierprofil.php">Modifier le profil</a>

                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="monprofil.php">Mon Profil</a>
                            <a class="dropdown-item" href="modifierprofil.php">Modifier le profil</a>

                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="header-left">
                            <a href="etudiantdashboard.php" class="logo">
                                <img src="../Img/logo1.jpg" height="60" alt="">
                                <span class="text-uppercase">EST-D</span>
                            </a>
                        </div>
                        <ul class="sidebar-ul">
                            <li class="menu-title">Menu</li>
                            <li class="active">
                                <a href="etudiantdashboard.php"><img src="../assets/img/sidebar/icon-1.png" alt="icon"><span>Tableau de Bord</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-2.png" alt="icon"> <span> Cours</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="../cours/Cours_inscrit_info.php"><span>Cours actuels </span></a></li>
                                    <li><a href="../cours/Cours_terminer.php"><span>Cours terminés</span></a></li>

                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Forum</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="forum.php"><span>Forum</span></a></li>

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

                    <!--------------------------------------------tous les etudiants----------------------------------------------->
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div class="page-title">
                                                Tous les Cours
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
                                                    <th>Image du Cours</th>
                                                    <th>Nom du Cours</th>
                                                    <th>description</th>


                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $etudId = $_SESSION['userid'];

                                                $sql = "SELECT c.coursId, c.nomCours, c.description
                                                FROM cours c
                                                JOIN coursinscrit ci ON c.coursId = ci.coursId
                                                JOIN etudiant e ON ci.etudId = e.etudId
                                                WHERE e.etudId = $etudId AND ci.note IS NULL";
                                                $result = mysqli_query($conn, $sql);

                                                // Check if there are any rows returned
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Loop through each row and display the data in the table
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <h2><a href="../formation/cours_contenue1/contenuCours.php?coursId=<?php echo $row['coursId']; ?>&etudId=<?php echo $_SESSION['userid'] ?>" class="avatar text-white"><?php if (!empty($row['image'])) : ?>
                                                                            <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" alt="User Image">
                                                                        <?php else : ?>
                                                                            <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                                        <?php endif; ?></a></a><a href="adminInfo.php"> <span></span></a></h2>
                                                            </td>
                                                            <td><?php echo $row['nomCours']; ?></td>
                                                            <td><?php echo $row['description']; ?></td>

                                                            <td class="text-right">
                                                                <button type="button" class="btn btn-danger btn-sm mb-1 delete-btn" data-toggle="modal" data-target="#delete_employee" data-etudid="<?php echo $row['coursId']; ?>">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                                <!-- Include jQuery library -->
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('.delete-btn').click(function() {
                                                                            var coursId = $(this).data('coursId');
                                                                            // Send AJAX request to delete.php
                                                                            $.ajax({
                                                                                url: 'etudiantdashboard.php',
                                                                                type: 'POST',
                                                                                data: {
                                                                                    coursId: coursId
                                                                                },
                                                                                success: function(response) {
                                                                                    // Redirect to the current page after successful deletion
                                                                                    window.location.reload();
                                                                                },
                                                                                error: function(xhr, status, error) {
                                                                                    console.error(xhr.responseText);
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                </script>
                                                                <?php
                                                                if (isset($_POST['coursId'])) {
                                                                    $coursId = $_POST['coursId'];

                                                                    // SQL to delete a record
                                                                    $sql = "DELETE FROM cours WHERE coursId = $coursId";

                                                                    if (mysqli_query($conn, $sql)) {
                                                                        // Deletion successful
                                                                        echo "Record deleted successfully";
                                                                    } else {
                                                                        // Error in deletion
                                                                        echo "Error deleting record: " . mysqli_error($conn);
                                                                    }
                                                                }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    // No rows returned from the database
                                                    echo "<tr><td colspan='7'>Aucun cours </td></tr>";
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