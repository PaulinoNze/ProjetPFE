<?php
    session_start();
    if(isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']){
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Ajouter Quiz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

<link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

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
<!-- Other notification messages -->
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View All Notifications</a>
</div>
</div>
</li>
<!-- Other menu items -->
</ul>
<!-- Other menu items -->
</div>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
<!-- Sidebar content -->
</div>
<!-- End Sidebar -->

<!-- Main Content -->
<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<!-- Page header content -->
</div>
<!-- Page content -->
<div class="content-page">
<!-- Form to add quiz -->
<div class="row">
<div class="col-md-8 offset-md-2">
<div class="card">
<div class="card-body">
<h4 class="card-title">Ajouter un Quiz</h4>
<form method="post" action="add_quiz.php">
<div class="form-group">
<label for="quiz_name">Nom du Quiz</label>
<input type="text" class="form-control" id="quiz_name" name="quiz_name" required>
</div>
<!-- Other input fields for quiz details -->
<button type="submit" class="btn btn-primary">Ajouter Quiz</button>
</form>
</div>
</div>
</div>
</div>

<!-- Table to display added quizzes -->
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
<h4 class="card-title">Liste des Quiz</h4>
<div class="table-responsive">
<table class="table table-striped table-bordered" id="example">
<thead>
<tr>
<th>Nom du Quiz</th>
<!-- Other table headers for quiz details -->
<th>Action</th>
</tr>
</thead>
<tbody>
<!-- PHP code to fetch and display added quizzes -->
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- End Page content -->
</div>
</div>
<!-- End Main Content -->

</div>

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/select2.min.js"></script>

<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>

<script src="../assets/js/app.js"></script>

</body>
</html>

<?php
    }else{
        header("Location: index.php");
    }
?>
