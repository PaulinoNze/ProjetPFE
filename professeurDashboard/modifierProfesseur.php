<?php
    session_start();
    if(isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']){
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EST-D professeur compte</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

<link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="../assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="../assets/css/select2.min.css">

<link rel="stylesheet" href="../assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

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
<a href="professeurDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../assets/img/logo1.png" alt="" width="30" height="30"></a>
</li>
</ul>

<ul class="nav user-menu float-right">
<li class="nav-item dropdown has-arrow">
<a href="#" class=" nav-link user-link" data-toggle="dropdown">
<span class="user-img">
    <?php if(!empty($_SESSION['image'])): ?>
        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="professeur">
    <?php else: ?>
        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
    <?php endif; ?>
<span class="status online"></span></span>
<span><?php echo $_SESSION['prenom']; ?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
<a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
<a class="dropdown-item" href="professeurSettings.php">Parametres</a>
<a class="dropdown-item" href="../PHP/logout.php">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right"> 
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
<a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
<a class="dropdown-item" href="professeurSettings.php">Parametres</a>
<a class="dropdown-item" href="../PHP/logout.php">Logout</a>
</div>
</div>
</div>
</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<div class="header-left">
<a href="professeurDashboard.php" class="logo">
<img src="../Img/logo1.jpg"  height="60" alt="">
<span class="text-uppercase">EST-D</span>
</a>
</div>
<ul class="sidebar-ul">
<li class="menu-title">Menu</li>
<li class="active">
<a href="professeurDashboard.php"><img src="../assets/img/sidebar/icon-1.png" alt="icon"><span>Tableau de Bord</span></a>
</li>

<li class="submenu">
<a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Etudiants</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="tousEtudiants.php"><span>Etudiants inscrits à la formation</span></a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><img src="../assets/img/sidebar/icon-12.png" alt="icon"> <span> Formation</span> <span class="menu-arrow"></span></a>
</li>


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
<h5 class="text-uppercase mb-0 mt-0 page-title">Modifier Professeur</h5>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<ul class="breadcrumb float-right p-0 mb-0">
<li class="breadcrumb-item"><a href="professeurDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
<li class="breadcrumb-item"><a href="tousProfessur.php">Professeurs</a></li>
<li class="breadcrumb-item"><span> Modifier Professeur</span></li>
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
<form class="custom-mt-form">
<div class="form-group">
<label>Prenom</label>
<input type="text" class="form-control" value="Ruth">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" value="you@example.com">
</div>
<div class="form-group">
<label>Mot de Passe</label>
<input type="password" class="form-control">
</div>
<div class="form-group">
<label>Cours</label>
<input type="text" class="form-control" value="Maths Teacher">
</div>
<div class="form-group">
<label>Genre</label>
<select class="form-control select">
<option>Homme</option>
<option>Femme</option>
</select>
</div>
<div class="form-group">
<label>Date de Naissance</label>
<input class="form-control datetimepicker-input datetimepicker" type="text" data-toggle="datetimepicker">
</div>
</form>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<form class="custom-mt-form">
<div class="form-group">
<label>Nom</label>
<input type="text" class="form-control" value=" C. Gault">
</div>
<div class="form-group">
<label>Comfirmez le mot de passe</label>
<input type="password" class="form-control">
</div>
<div class="form-group">
<label>Telephone</label>
<input type="number" value="9873456121" class="form-control">
</div>
</form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<form class="custom-mt-form">
<div class="form-group">
<label>Adresse</label>
<textarea class="form-control" placeholder="Adresse"></textarea>
</div>
</form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<form class="custom-mt-form">
<div class="form-group">
<label>Image</label>
<input type="file" name="pic" accept="image/*" class="form-control">
</div>
</form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<form class="custom-mt-form">
<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2" type="submit">Soumettre</button>
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