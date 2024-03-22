<?php
session_start();
if (isset($_SESSION['adminId']) && $_SESSION['email']) {

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
        <!------------------------------------------------------header----------------------------------------------->
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
                    <?php
                    include "../database.php";
                    $adminId = $_SESSION['adminId'];
                    $sql = "SELECT nom, prenom, email, telephone, adminId, image  FROM admin where adminId = $adminId";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                        <li class="nav-item dropdown has-arrow">
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
                                <a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierAdmin.php">Modifier le profile</a>
                                
                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="adminInfo.php">Mon profil</a>
                            <a class="dropdown-item" href="modifierAdmin.php">Modifier le profile</a>
                            
                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------sidebar--------------------------------------------------------->
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
                                    <li><a href="forum.php"><span>Forum</span></a></li>
                                    <li><a href="ajouterForum.php"><span>Ajouter Forum</span></a></li>

                                </ul>
                            </li>

                    </div>
                </div>
            </div>

            <!--------------------------------------------------------page contents-------------------------------------------->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Modifier le profile</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item"><span>Modifier le profile</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">informations de base</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <form class="custom-mt-form" action="modiAdminAuth.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['nom']; ?>" name="nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mot de Passe</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                        <label>prenom</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['prenom']; ?>" name="prenom">
                                                    </div>
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="text" class="form-control" name="telephone" value="<?php echo $row['telephone']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Comfirmez le mot de passe</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                                <input type="hidden" name="adminId" value="<?php echo $_SESSION['adminId']; ?>">
                                                
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label>Image de Formation</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="form-group text-center custom-mt-form-group">
                                                    <button class="btn btn-primary mr-2" type="submit" name="submit">Soumettre</button>
                                                    <button class="btn btn-secondary" type="reset">Annuler</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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