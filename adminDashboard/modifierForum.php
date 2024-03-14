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

        <link rel="stylesheet" href="../assets/css/select2.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-tagsinput.css">

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
                                    <li><a class="active" href="modifierForum.php"><span>Modifier Forum</span></a></li>
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
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Modifier Forum</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="forum.php">Forum</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label>Nom du Forum</label>
                                            <input type="text" class="form-control" value="Apple Macbook Air MQD42HN/A 13-inch Laptop">
                                        </div>
                                        <div class="form-group">
                                            <label>Image du Forum</label>
                                            <input type="file" name="pic" accept="image/*" class="form-control">
                                            <small class="form-text text-muted">Max. taille du fichier : 50 Mo. Images autorisées : jpg, gif, png. Maximum 10 images seulement.</small>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/blog/blog-thumb-01.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/placeholder-thumb.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/placeholder-thumb.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/placeholder-thumb.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/placeholder-thumb.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                                    <div class="product-thumbnail">
                                                        <img src="../assets/img/placeholder-thumb.jpg" class="img-thumbnail img-fluid" alt="">
                                                        <span class="product-remove" title="remove"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Catégorie du forum</label>
                                                    <select class="form-control select">
                                                        <option>Sports</option>
                                                        <option>Library</option>
                                                        <option>Management</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Sous-Catégorie du forum</label>
                                                    <select class="form-control select">
                                                        <option>Maths </option>
                                                        <option>Science</option>
                                                        <option>Social Science</option>
                                                        <option>English</option>
                                                        <option>Codeignitor</option>
                                                        <option>Tamil</option>
                                                        <option>H.O.D</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description du Forum </label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mots Cles <small>(séparé par une virgule)</small></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Statu du Forum </h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="radio1">
                                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked="">Actif
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="radio2">
                                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Inactif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <button class="btn btn-primary btn-lg mb-3">Soumettre</button>
                                        </div>
                                    </form>
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
        <script src="../assets/js/tagsinput.js"></script>

        <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>