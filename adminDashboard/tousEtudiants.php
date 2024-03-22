<?php
session_start();
include "../database.php";
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
                                <a href="#"><img src="../assets/img/sidebar/icon-2.png" alt="icon"> <span> Professeur</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousProfessur.php"><span>Tous Professeurs</span></a></li>
                                    <li><a href="ajouterProfessur.php"><span>Ajouter Professeur</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Etudiants</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a class="active" href="tousEtudiants.php"><span>Tous L'Etudiants</span></a></li>
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
                                    <li><a href="cours.php"><span>Approver Les Cours</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Forum</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="blog.html"><span>Forum</span></a></li>
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
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Tous L'Etudiants</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="adminDashboard.php">Etudiants</a></li>
                                    <li class="breadcrumb-item"> <span>Tous L'Etudiants</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php

                    $sql = "SELECT * FROM etudiant";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<div class="row">'; 
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                <div class="profile-widget">
                                    <div class="profile-img">
                                        <a href="etudiantInfo.php?id=<?php echo $row['etudId']; ?>" class="avatar text-white">
                                            <?php if (!empty($row['image'])) : ?>
                                                <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" alt="User Image">
                                            <?php else : ?>
                                                <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item delete-etudiant" href="#" onclick="updateStatus(<?php echo $row['etudId']; ?>)">
                                                <i>✔ </i> Activer
                                            </a>
                                            <a class="dropdown-item delete-etudiant" href="#" data-etudiant-id="<?php echo $row['etudId']; ?>">
                                                <i class="fas fa-trash-alt m-r-5"></i> Désactiver
                                            </a>
                                            <a class="dropdown-item delete-etudiant" href="#" data-etudiant-id="<?php echo $row['etudId']; ?>">
                                                <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="user-name m-t-10 m-b-0 text-ellipsis">
                                        <a href="etudiantInfo.php?id=<?php echo $row['etudId']; ?>">
                                            <?php echo $row['nom']; ?>
                                        </a>
                                    </h4>
                                    <div class="small text-muted"><?php
                                                                    if ($row['statut'] != 0) {
                                                                        echo "statut: Actif ";
                                                                    } else {
                                                                        echo "statut: Inactif ";
                                                                    }
                                                                    ?></div>
                                </div>
                            </div>
                    <?php
                        }
                        echo '</div>'; // End of row
                    } else {
                        echo "Aucun professeur trouvé";
                    }
                    ?>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('.delete-etudiant').click(function(e) {
                                e.preventDefault();
                                var etudiantId = $(this).data('etudiant-id');
                                if (confirm("Êtes-vous sûr de vouloir supprimer ce etudiant ?")) {
                                    $.ajax({
                                        url: 'tousEtudiants.php',
                                        type: 'POST',
                                        data: {
                                            etudId: etudiantId
                                        }, // Update to match the attribute name in HTML
                                        success: function(response) {
                                            // Reload the page after successful deletion
                                            window.location.reload();
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                    <?php
                    include '../database.php';

                    if (isset($_POST['etudId'])) {
                        $etudiantId = $_POST['etudId'];

                        // SQL to delete a professor
                        $sql = "DELETE FROM etudiant WHERE etudId = $etudiantId";

                        if (mysqli_query($conn, $sql)) {
                            // Deletion successful
                            echo "Professor deleted successfully";
                        } else {
                            // Error in deletion
                            echo "Error deleting professor: " . mysqli_error($conn);
                        }
                    }
                    ?>


                    
                </div>
            </div>

            <div id="delete_employee" class="modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-md">
                        <div class="modal-header">
                            <h4 class="modal-title">Supprimer Employee</h4>
                        </div>
                        <form>
                            <div class="modal-body">
                                <p>Are you sure want to delete this?</p>
                                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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