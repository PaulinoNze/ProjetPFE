<?php
session_start();
if (isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']) {

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
                            <a href="adminDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../assets/img/logo1.png" alt="" width="30" height="30"></a>
                        </li>
                    </ul>

                    <ul class="nav user-menu float-right">
                        
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <?php if (!empty($_SESSION['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="Admin">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                                    <?php endif; ?>
                                    <span class="status online"></span></span>
                                <span><?php echo $_SESSION['prenom']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierAdmin.php">Modifier le profile</a>
                                <a class="dropdown-item" href="adminSettings.php">Parametres</a>
                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="adminInfo.php">Mon profil</a>
                            <a class="dropdown-item" href="modifierAdmin.php">Modifier le profile</a>
                            <a class="dropdown-item" href="adminSettings.php">Parametres</a>
                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------------------sidebar---------------------------------------------------->

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
                            <li>
                                <a href="adminDashboard.php" class="border-top-0"><i class="fas fa-home back-icon"></i> Retour a Accueil</a>
                            </li>
                            <li class="menu-title">Parametres</li>
                            <li>
                                <a href="adminSettings.php">Parametres de l'ecole</a>
                            </li>
                            <li>
                                <a href="permissionsAdmin.php">Permissions</a>
                            </li>
                            <li class="active">
                                <a href="changePassword.php">Changer le mot de passe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Changer le mot de passe</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="adminSettings.php">Parametres</a></li>
                                    <li class="breadcrumb-item"><span> Changer le mot de passe</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!----------------------------------------------content----------------------------------->
                    <div class="content-page">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Ancien Mot de Passe</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>nouveau mot de passe</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Comfirmez le mot de passe</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center m-t-20">
                                                    <button type="button" class="btn btn-primary btn-lg">Mettre à jour le mot de passe</button>
                                                </div>
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