<<?php
session_start();
include "../database.php";
if(isset($_SESSION['userid']) || isset($_SESSION['nom']) || isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_GET['id'])) {
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
        

        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin', image='$imgData' WHERE etudId=$userId";
        } else {
            // Update query without image data
            $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin' WHERE etudId=$userId";
        }
        
        // Perform update query
        if(mysqli_query($conn, $sqlUpdate)) {
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
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="search.html">
<input class="form-control" type="text" placeholder="Search here">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
</li>
<li>
<a href="adminDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../assets/img/logo1.png" alt="" width="30" height="30"></a>
</li>
</ul>

<ul class="nav user-menu float-right">
<li class="nav-item dropdown d-none d-sm-block">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<img src="../assets/img/sidebar/icon-22.png" alt="">
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span>Notifications</span>
</div>
<div class="drop-scroll">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">
<img alt="John Doe" src="../assets/img/user-06.jpg" class="img-fluid rounded-circle">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">John Doe</span> is now following you </p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
 </div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">T</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> sent you a message.</p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">L</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Misty Tison</span> like your photo.</p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">G</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> booking appoinment for meeting.</p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">T</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> like your photo.</p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>
<li class="nav-item dropdown d-none d-sm-block">
<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="../assets/img/sidebar/icon-23.png" alt=""> </a>
</li>
<li class="nav-item dropdown has-arrow">
 <a href="#" class=" nav-link user-link" data-toggle="dropdown">
<span class="user-img">
    <?php if(!empty($_SESSION['image'])): ?>
        <img class="rounded-circle" src="<?php echo $_SESSION['image'];?>" width="30" alt="Admin">
    <?php else: ?>
        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
    <?php endif; ?>
<span class="status online"></span></span>
<span><?php echo $_SESSION['prenom']; ?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
<a class="dropdown-item" href="modifierAdmin.php">Modifier le profil</a>
<a class="dropdown-item" href="adminSettings.php">Parametres</a>
<a class="dropdown-item" href="../PHP/logout.php">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right"> 
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="adminInfo.php">Mon Profil</a>
<a class="dropdown-item" href="modifierAdmin.php">Modifier le profil</a>
<a class="dropdown-item" href="adminSettings.php">Parametres</a>
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
<img src="../Img/logo1.jpg"  height="60" alt="">
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
<li><a href="tousProfessur.php"><span>AJouter Professeur</span></a></li>
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
<li>
<a href="Exam.php"><img src="../assets/img/sidebar/icon-7.png" alt="icon"> <span>Examen</span></a>
</li>
<li class="submenu">
<a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Forum</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="forum.php"><span>Forum</span></a></li>
<li><a href="ajouterForum.php"><span>Ajouter Forum</span></a></li>
<li><a href="modifierForum.php"><span>Modifier Forum</span></a></li>

</div>
</div>
</div>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<h5 class="text-uppercase mb-0 mt-0 page-title">Modifier Etudiant</h5>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<ul class="breadcrumb float-right p-0 mb-0">
<li class="breadcrumb-item"><a href="adminDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
<li class="breadcrumb-item"><a href="tousEtudiants.php">Etudiant</a></li>
<li class="breadcrumb-item"><span> Modifier Etudiant</span></li>
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
<form class="custom-mt-form" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <?php
            if(isset($_GET['id'])) {
                // Retrieve the user ID from the URL
                $userId = $_GET['id'];
            
                // Fetch user information from the database using the user ID
                $sql = "SELECT * FROM etudiant WHERE etudId = $userId";
                $result = mysqli_query($conn, $sql);
            
                // Check if a user was found with the specified ID
                if(mysqli_num_rows($result) > 0) {
                    // User found, display user information or perform any necessary actions
                    $user = mysqli_fetch_assoc($result);
                } else {
                    // User not found with the specified ID
                    echo "Utilisateur non trouvé.";
                }
            } else {
                    // User ID not set in the URL
                    echo "ID de l'utilisateur non spécifié.";
                }
        ?>
    <label>Prenom</label>
    <input type="text" class="form-control" value="<?php echo $user['prenom']; ?> " name="prenom">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" value="<?php echo $user['email']; ?>" name="email">
    </div>
    <div class="form-group">
    <label>Mot De Passe</label>
    <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
    <label>Filiere</label>
    <input type="text" class="form-control" value="<?php echo $user['filiere']; ?>" name="filiere">
    </div>
    <div class="form-group">
        <label>Genre</label>
        <select class="form-control select" name="gender">
            <option value="Hommme" <?php echo ($user['gender'] === 'Hommme') ? 'selected' : ''; ?> name="gender">Homme</option>
            <option value="Femme" <?php echo ($user['gender'] === 'Femme') ? 'selected' : ''; ?> name="gender" >Femme</option>
        </select>
    </div>

    <div class="form-group">
        <label>Date de Naissance</label>
        <input class="form-control datetimepicker-input datetimepicker" type="text" data-toggle="datetimepicker" name="dateNaissance" value="<?php echo $user['date_naissance']; ?>">
    </div>

    <div class="form-group">
    <label>Salle</label>
    <input type="text" class="form-control" value="<?php echo $user['salle']; ?>" name="salle">
    </div>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">
    <label>Nom</label>
    <input type="text" class="form-control" value="<?php echo $user['nom']; ?>" name="nom">
    </div>
    <div class="form-group">
    <label>Comfirmez le mot de passe</label>
    <input type="password" class="form-control">
    </div>
    <div class="form-group">
    <label>Telephone</label>
    <input type="number" value="<?php echo $user['telephone']; ?>" class="form-control" name="telephone">
    </div>
    <div class="form-group">
    <label>CIN</label>
    <input type="text" class="form-control" value="<?php echo $user['cin']; ?>" name="cin">
    </div>
    <div class="form-group">
    <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    </div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group text-center custom-mt-form-group">
    <button class="btn btn-primary mr-2" type="submit" name="submit">Soumettre</button>
    <button class="btn btn-secondary" type="reset"><a href="adminDashboard.php" style="text-decoration: none; color:white;">Annuler</a></button>
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

<div class="notification-box">
<div class="msg-sidebar notifications msg-noti">
<div class="topnav-dropdown-header">
 <span>Messages</span>
</div>
<div class="drop-scroll msg-list-scroll">
<ul class="list-box">
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">R</span>
</div>
<div class="list-body">
<span class="message-author">Richard Miles </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item new-message">
<div class="list-left">
<span class="avatar">J</span>
</div>
<div class="list-body">
<span class="message-author">Ruth C. Gault</span>
<span class="message-time">1 Aug</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">T</span>
</div>
<div class="list-body">
<span class="message-author"> Tarah Shropshire </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">M</span>
</div>
<div class="list-body">
<span class="message-author">Mike Litorus</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
 <div class="list-left">
<span class="avatar">C</span>
</div>
<div class="list-body">
<span class="message-author"> Catherine Manseau </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">D</span>
</div>
<div class="list-body">
<span class="message-author"> Domenic Houston </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">B</span>
</div>
<div class="list-body">
<span class="message-author"> Buster Wigton </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">R</span>
</div>
<div class="list-body">
<span class="message-author"> Rolland Webber </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">C</span>
</div>
<div class="list-body">
<span class="message-author"> Claire Mapes </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">M</span>
</div>
<div class="list-body">
<span class="message-author">Melita Faucher</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">J</span>
</div>
<div class="list-body">
<span class="message-author">Jeffery Lalor</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">L</span>
</div>
<div class="list-body">
<span class="message-author">Loren Gatlin</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">T</span>
</div>
<div class="list-body">
<span class="message-author">Tarah Shropshire</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
 </div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="chat.html">See all messages</a>
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
    }else{
        header("Location: index.php");
        exit();
    }
?>