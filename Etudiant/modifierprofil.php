<?php
session_start();
include "../database.php";
if (isset($_SESSION['userid']) && isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            // Retrieve form data
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $filiere = $_POST['filiere'];
            $gender = $_POST['gender'];
            $dateNaissance = $_POST['dateNaissance'];
            $salle = $_POST['salle'];
            $nom = $_POST['nom'];
            $telephone = $_POST['telephone'];
            $cin = $_POST['cin'];


            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin', image='$imgData' WHERE etudId=$userId";
            } else {
                // Update query without image data
                $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin' WHERE etudId=$userId";
            }

            // Perform update query
            if (mysqli_query($conn, $sqlUpdate)) {
                // Redirect to another page to display edited information
                header("Location: etudiantInfo.php?id=$userId");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "ID de l'utilisateur non spécifié.";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>EST-D compte Etudiant </title>
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
                            <a href="adminDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../Img/logo1.jpg" alt="" width="30" height="30"></a>
                        </li>
                    </ul>

                    <ul class="nav user-menu float-right">
                       
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                            <?php
                                include "../database.php";
                                $adminId = $_SESSION['userid'];
                                $sql = "SELECT prenom, image FROM etudiant WHERE etudId = $adminId";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                                <span class="user-img">
                                    <?php if (!empty($row['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" width="30" alt="Admin">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../../assets/img/user.jpg" width="30" alt="Default Image">
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
                                    <li><a href="../Cours_inscrit_info.php"><span>Cours actuel </span></a></li>
                                    <li><a href="../Cours_terminer.php"><span>Cours terminé</span></a></li>

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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <h5 class="text-uppercase mb-0 mt-0 page-title">Modifier Profil</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <ul class="breadcrumb float-right p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="etudiantdashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><span> Modifier Profil</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <?php
                                                include "../database.php";
                                                $etudId = $_SESSION['userid'];
                                                $sql = "SELECT email, password, telephone FROM etudiant WHERE etudId = $etudId";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_fetch_array($result);
                                                ?>
                                                <form class="custom-mt-form" action="modiEtudAuth.php" method="post">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" id="emailInput">
                                                        <span id="emailError" style="color: red;"></span>
                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                const emailInput = document.getElementById("emailInput");
                                                                const emailError = document.getElementById("emailError");
                                                                const submitButton = document.getElementById("submitButton");

                                                                emailInput.addEventListener("input", function() {
                                                                const email = emailInput.value.trim();
                                                                if (email === "") {
                                                                    emailError.textContent = "";
                                                                    return;
                                                                }

                                                                // AJAX request to check if email exists
                                                                const xhr = new XMLHttpRequest();
                                                                xhr.open("POST", "../s_abonner/check_email.php", true);
                                                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                                xhr.onreadystatechange = function() {
                                                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                                                    const response = JSON.parse(xhr.responseText);
                                                                    if (response.exists) {
                                                                        emailError.textContent = "Email already registered";
                                                                        submitButton.disabled = true;
                                                                    } else {
                                                                        emailError.textContent = "";
                                                                        submitButton.disabled = false;
                                                                    }
                                                                    }
                                                                };
                                                                xhr.send("email=" + encodeURIComponent(email));
                                                                });
                                                            });
                                                        </script>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mot de Passe</label>
                                                        <input type="password" class="form-control" name="password" id="password">
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="number" class="form-control" name="telephone" value="<?php echo $row['telephone']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Comfirmez le mot de passe</label>
                                                    <input type="password" class="form-control" id="confirmPassword">
                                                    <small id="passwordMismatch" class="form-text text-danger" style="display: none;">Les mots de passe ne correspondent pas</small>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                        var passwordInput = document.getElementById('password');
                                                        var confirmPasswordInput = document.getElementById('confirmPassword');
                                                        var passwordMismatchText = document.getElementById('passwordMismatch');
                                                        var passwordRequirementsText = document.getElementById('passwordRequirements');

                                                        confirmPasswordInput.addEventListener('input', function() {
                                                            if (passwordInput.value !== confirmPasswordInput.value) {
                                                            passwordMismatchText.style.display = 'block';
                                                            } else {
                                                            passwordMismatchText.style.display = 'none';
                                                            }
                                                        });

                                                        
                                                        });
                                                    </script>
                                                </div>
                                                <input type="hidden" name="etudId" value="<?php echo $_SESSION['userid']; ?>">

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