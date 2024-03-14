<?php
session_start();
include "../database.php";
if (isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']) {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        // Fetch user information from the database using the user ID
        $sql = "SELECT * FROM professeur WHERE ProfId = $userId";
        $result = mysqli_query($conn, $sql);
        // Check if user exists
        if (mysqli_num_rows($result) > 0) {
            // User found, fetch user details
            $user = mysqli_fetch_assoc($result);
        } else {
            // User not found
            echo "Utilisateur non trouvé.";
            exit();
        }
    } else {
        // User ID not provided in URL
        echo "ID de l'utilisateur non spécifié.";
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>ESTD Admin compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

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
                                <a href="#"><img src="../assets/img/sidebar/icon-2.png" alt="icon"> <span> Professeurs</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="tousProfessur.php"><span>Tous Professeurs</span></a></li>
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
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Profil Du Professeur</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="tousProfessur.php">Professeur</a></li>
                                    <li class="breadcrumb-item"><span> Profil Du Professeur</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-box m-b-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="">
                                                <?php if (!empty($user['image'])) : ?>
                                                    <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($user['image']); ?>" alt="User Image">
                                                <?php else : ?>
                                                    <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0"><?php echo $user['prenom'] . " " . $user['nom']; ?></h3>
                                                    <h5 class="company-role m-t-0 m-b-0">L'Ecole Superirure de Technologie - Dakhla</h5>
                                                    <small class="text-muted">Professeur</small>

                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <span class="title">Telephone:</span>
                                                        <span class="text"><a href=""><?php echo $user['telephone']; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Email:</span>
                                                        <span class="text"><a href=""><?php echo $user['email']; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Date Naissance:</span>
                                                        <span class="text"><?php echo $user['date_naissance']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Adresse:</span>
                                                        <span class="text"><?php echo $user['adresse']; ?></span>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <span class="title">Genre:</span>
                                                        <span class="text"><?php echo $user['gender']; ?></span>
                                                    </li>
                                                </ul>
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

        <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/js/jquery.slimscroll.js"></script>

        <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>