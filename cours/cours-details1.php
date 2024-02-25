<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<title>Cour</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="../Img/logo1.jpg">

<link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../Css/stileCours.css">
<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<header class="header bg-primary">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container-fluid">
      <img src="../Img/logo_0.png" alt="Imagen" style="float: left; margin-right: 10px; width: 200px; height: 70px;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cours.php">Cours</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="#">Établissement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../conctat.php">Contact</a>
          </li>
        </ul>
         <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 550px;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="btn btn-success" href="../login/login.php" style="margin-right: 10px;">Connect</a>
          </li>
          <li class="nav-item" >
            <a class="btn btn-danger" href="../s_abonner/inscritp.php" >S'abonner</a>
          </li>
        </ul>
       </div>

      </div>
    </div>
  </nav>
</header>

<div class="main-wrapper">
<div class="page-wrapper" style="margin-left: 170px;" >
<div class="content container-fluid">
<div class="page-header" style="margin-right: 180px;">
<div class="row" >
<div class="col-md-10" >
<h5 class="text-uppercase mb-0 mt-0 page-title">Description du cours</h5>
</div>
</div>
</div>
<div class="row">
<div class="col-md-10">
<div class="blog-view">
<article class="blog blog-single-post">
<h3 class="blog-title">Do you know the ABCs school?</h3>
<div class="blog-info clearfix">
<div class="post-left">
<ul>
<li><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i> <span>December 6, 2018</span></a></li>
<li><a href="#"><i class="fas fa-user-o" aria-hidden="true"></i> <span>By Andrew Dawis</span></a></li>
</ul>
</div>
<div class="post-right"><a href="#"><i class="fas fa-comment-o" aria-hidden="true"></i>1 Comment</a></div>
</div>
<div class="blog-image">
<a href="#"><img alt="" src="../assets/img/blog/blog-01.jpg" class="img-fluid"></a>
</div>


<div id="curso" >
    <div class="container">
        <div class="blog-content mt-4">
            <h2>Introduction</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id eft laborum.</p>
            <ul>
                <li>Objetivo 1: [Descripción del primer objetivo]</li>
                <li>Objetivo 2: [Descripción del segundo objetivo]</li>
                <li>Objetivo 3: [Descripción del tercer objetivo]</li>
            </ul>
            
            <p><strong>Duración del Curso:</strong> [Duración del curso, por ejemplo: 10 horas, 4 semanas, etc.]</p>
            
            <!-- Agregar el atributo data-curso-id con el ID del curso -->   
            <!-- Botón "Ajouter Cours" -->
            <button id="add-course-btn" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" data-Cours_inscrits="1">Suivre Le Cours</button>
            
           <!-- Modal de Inicio de Sesión -->
           <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Authentifiez-Vous</h5>
                <ul class="navbar-nav ml-auto" style="display:inline-block;">
                    <li class="nav-item d-inline" style="margin-right: 10px;">
                        <a class="btn btn-success" href="../cours/coursLogin.php">Conectar</a>
                    </li>
                    <li class="nav-item d-inline">
                        <a class="btn btn-danger" href="../cours/coursSignup.php">S'abonner</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



    </div>
</div>



</article>
<div class="widget author-widget clearfix">
<h3>Équipe pédagogique</h3>
<div class="about-author">
<div class="about-author-img">
<div class="author-img-wrap">
<img class="img-fluid rounded-circle" alt="" src="../assets/img/user.jpg">
</div>
</div>
<div class="author-details">
<span class="blog-author-name" style="color:blue;">Linda Barrett</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
</div>
<div class="about-author">
<div class="about-author-img">
<div class="author-img-wrap">
<img class="img-fluid rounded-circle" alt="" src="../assets/img/user.jpg">
</div>
</div>
<div class="author-details">
<span class="blog-author-name" style="color:blue;">Linda Barrett</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
</div>
<div class="about-author">
<div class="about-author-img">
<div class="author-img-wrap">
<img class="img-fluid rounded-circle" alt="" src="../assets/img/user.jpg">
</div>
</div>
<div class="author-details">
<span class="blog-author-name" style="color:blue;">Linda Barrett</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
</div>
</div>


</div>
</div>

</div>
</div>
</div>
</div>

<footer class="footer " style="margin-top: 1170px;">
  <div class="container">
    <div class="row">
     <img src="../Img/logo.png" alt="Imagen" style="float: left; margin-right: 10px; width: 200px; height: 80px;">
      <div class="col-md-4">
        <h4><b>About Us</b></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue.</p>
      </div>
      <div class="col-md-3">
        <h4><b>Quick Links</b></h4>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h4><b>Follow Us</b></h4>
        <ul class="list-inline">
          <li><a href="#"><i class="fab fa-facebook "></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <a href="#" id="scrollToTop" class="btn">↑</a>
</footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });       
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/jquery.slimscroll.js"></script>

<script src="../assets/js/app.js"></script>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/jquery.slimscroll.js"></script>

<script src="../assets/js/app.js"></script>
</body>
</html>