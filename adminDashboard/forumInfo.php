<?php
session_start();
if (isset($_SESSION['adminId']) && $_SESSION['email']) {

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
                                    <li><a class="active" href="forum.php"><span>Forum</span></a></li>
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
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Forum</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Tableau de Bord</a></li>
                                    <li class="breadcrumb-item"><a href="forum.php">Forum</a></li>
                                    <li class="breadcrumb-item"><span> Forum Info</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        include "../database.php";
                        $forumId = $_GET['id'];
                        $sql = "SELECT * FROM forum WHERE forumId = $forumId";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="col-md-8">
                            <div class="blog-view">
                                <article class="blog blog-single-post">
                                    <h3 class="blog-title"><?php echo $row['title']; ?></h3>

                                    <div class="blog-image">
                                        <a href="#">
                                            <?php if (!empty($row['image'])) : ?>
                                                <img class="img-fluid" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>">
                                            <?php else : ?>
                                                <img class="img-fluid" src="../assets/img/user.jpg" alt="Default Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <p><?php echo nl2br($row['content']); ?></p>
                                    </div>
                                </article>
                                <?php
                                include "../database.php";
                                $forumId = $_GET['id'];
                                $sql = "SELECT count(commentaire) FROM commentaire WHERE forumId = $forumId";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result)

                                ?>
                                <div class="widget blog-comments clearfix">
                                    <h3>Commentaires (<?php echo $row['count(commentaire)']; ?>)</h3>
                                    <ul class="comments-list">
                                        <?php
                                        include "../database.php";
                                        $forumId = $_GET['id'];
                                        $sql = "SELECT nom, email, commentaire FROM commentaire WHERE forumId = $forumId";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                                <li>
                                                <fieldset>
                                                    <div class="comment">
                                                    <div class="comment-author">
												<img class="avatar" alt="" src="../assets/img/user.jpg">
											</div>
                                                        <div class="comment-block">
                                                            <span class="comment-by">
                                                                <span class="blog-author-name"><?php echo $row['nom']; ?></span>

                                                            </span>
                                                            <p><?php echo $row['commentaire']; ?></p>

                                                        </div>
                                                    </div>
                                                    </fieldset>
                                                </li>
                                        <?php
                                            }
                                        } else {
                                            echo "<h3> Pas des commentaires </h3>";
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <div class="widget new-comment clearfix">
                                    <?php
                                    include "../database.php";
                                    $adminId = $_SESSION['adminId'];
                                    $sql = "SELECT * FROM admin WHERE adminID = $adminId";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <h3>laissez un commentaire</h3>
                                    <form action="ajoutCommentaire.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                    <input type="hidden" class="form-control" name="nom" value="<?php echo $row['nom'];?>">
                                                    <input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?> ">
                                                <div class="form-group">
                                                    <label>Commentaire</label>
                                                    <input type="text" class="form-control" name="commentaire">
                                                    <input type="hidden" name="forumID" value="<?php echo $_GET['id']; ?>">
                                                </div>
                                                <div class="comment-submit">
                                                    <input type="submit" value="Soumettre" class="btn" name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <aside class="col-md-4">

                            <div class="widget post-widget ">
                                <h5>Autres articles</h5>
                                <?php
                                include "../database.php";
                                $forumId = $_GET['id'];
                                $sql = "SELECT * FROM forum WHERE forumID <> $forumId";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <ul class="laTest-posts">

                                            <li>
                                                <div class="post-thumb">
                                                    <a href="forumInfo.php?id=<?php echo $row['forumID']; ?>" class="avatar text-white">
                                                        <?php if (!empty($row['image'])) : ?>
                                                            <img class="img-fluid" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>">
                                                        <?php else : ?>
                                                            <img class="img-fluid" src="../assets/img/user.jpg" alt="Default Image">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h4>
                                                        <a href="blog-details.html"><?php echo $row['title']; ?></a>
                                                    </h4>
                                                    <br>
                                                </div>
                                            </li>

                                        </ul>
                                <?php
                                    }
                                }
                                ?>
                            </div>


                        </aside>
                    </div>
                </div>

            </div>

        </div>

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