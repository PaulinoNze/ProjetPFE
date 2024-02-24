<?php
    session_start();
    include "../database.php";
    if(isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']){
        
?>
<!DOCTYPE html>
<html lang="zxx">
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
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="search.html">
<input class="form-control" type="text" placeholder="Recherche">
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
<a href="activities.html">Voir Tous les Notifications</a>
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
<li><a href="tousEtudiants.php"><span>Tous Professeurs</span></a></li>
<li><a href="ajouterEdutiant.php"><span>Ajouter Professeur</span></a></li>
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
<li><a href="tousEtudiants.php"><span>Approver Formation</span></a></li>
<li><a href="ajouterEdutiant.php"><span>Ajouter Formation</span></a></li>
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
<li class="breadcrumb-item"><a href="#">Pages</a></li>
<li class="breadcrumb-item"><span> Forum</span></li>
</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-md-8">
<div class="blog-view">
<article class="blog blog-single-post">
<h3 class="blog-title">À Quoi S'Attendre À L'Estd?</h3>
<div class="blog-info clearfix">
<div class="post-left">
<ul>
<li><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i> <span>December 6, 2018</span></a></li>
<li><a href="#"><i class="fas fa-user-o" aria-hidden="true"></i> <span>Par Andrew Dawis</span></a></li>
</ul>
</div>
<div class="post-right"><a href="#"><i class="fas fa-comment-o" aria-hidden="true"></i>1 Comment</a></div>
</div>
<div class="blog-image">
<a href="#"><img alt="" src="../assets/img/blog/blog-01.jpg" class="img-fluid"></a>
</div>
<div class="blog-content">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id eft laborum.</p>
<p>Sed ut perspiciatis unde omnis ifte natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam eft, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis noftrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil moleftiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
<blockquote>
<p>Veftibulum id ligula porta felis euismod semper. Sed posuere consectetur eft at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis veftibulum. Duis mollis, eft non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Veftibulum id ligula porta felis euismod semper.</p>
</blockquote>
<p>At vero eos et accusamus et iufto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas moleftias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id eft laborum et dolorum fuga. Et harum quidem rerum facilis eft et expedita distinctio. Nam libero tempore, cum soluta nobis eft eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda eft, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et moleftiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
</div>
</article>
<div class="widget blog-share clearfix">
<h3>Partager la publication</h3>
<ul class="social-share">
<li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
<li><a href="#" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
<li><a href="#" title="Google Plus"><i class="fab fa-google-plus-g"></i></a></li>
<li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
</ul>
</div>
<div class="widget author-widget clearfix">
<h3>À propos de l'auteur</h3>
<div class="about-author">
<div class="about-author-img">
<div class="author-img-wrap">
<img class="img-fluid rounded-circle" alt="" src="../assets/img/user.jpg">
</div>
</div>
<div class="author-details">
<span class="blog-author-name">Linda Barrett</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noftrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
</div>
</div>
<div class="widget blog-comments clearfix">
<h3>Comments (3)</h3>
<ul class="comments-list">
<li>
<div class="comment">
<div class="comment-author">
<img class="avatar" alt="" src="../assets/img/user.jpg">
</div>
<div class="comment-block">
<span class="comment-by">
<span class="blog-author-name">Diana Bailey</span>
<span class="float-right">
<span class="blog-reply"><a href="#"><i class="fas fa-reply"></i> Répondre</a></span>
</span>
</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
 <span class="blog-date">December 6, 2018</span>
</div>
</div>
<ul class="comments-list reply">
<li>
<div class="comment">
<div class="comment-author">
<img class="avatar" alt="" src="../assets/img/user.jpg">
</div>
<div class="comment-block">
<span class="comment-by">
<span class="blog-author-name">Henry Daniels</span>
<span class="float-right">
<span class="blog-reply"><a href="#"><i class="fas fa-reply"></i> Répondre</a></span>
</span>
</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
<span class="blog-date">December 6, 2018</span>
</div>
</div>
</li>
<li>
<div class="comment">
<div class="comment-author">
<img class="avatar" alt="" src="../assets/img/user.jpg">
</div>
<div class="comment-block">
<span class="comment-by">
<span class="blog-author-name">Diana Bailey</span>
<span class="float-right">
<span class="blog-reply"> <a href="#"><i class="fas fa-reply"></i> Répondre</a></span>
</span>
</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
<span class="blog-date">December 7, 2018</span>
</div>
</div>
</li>
</ul>
</li>
<li>
<div class="comment">
<div class="comment-author">
<img class="avatar" alt="" src="../assets/img/user.jpg">
</div>
<div class="comment-block">
<span class="comment-by">
<span class="blog-author-name">Marie Wells</span>
<span class="float-right">
<span class="blog-reply"><a href="#"><i class="fas fa-reply"></i> Répondre</a></span>
</span>
</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<span class="blog-date">December 11, 2018</span>
</div>
 </div>
</li>
<li>
<div class="comment">
<div class="comment-author">
<img class="avatar" alt="" src="../assets/img/user.jpg">
</div>
<div class="comment-block">
<span class="comment-by">
<span class="blog-author-name">Pamela Curtis</span>
<span class="float-right">
<span class="blog-reply"><a href="#"><i class="fas fa-reply"></i> Répondre</a></span>
</span>
</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<span class="blog-date">December 13, 2018</span>
</div>
</div>
</li>
</ul>
</div>
<div class="widget new-comment clearfix">
<h3>laissez un commentaire</h3>
<form>
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Nom <span class="text-red">*</span></label>
<input type="text" class="form-control">
</div>
<div class="form-group">
<label>Votre adresse email <span class="text-red">*</span></label>
<input type="email" class="form-control">
</div>
<div class="form-group">
<label>Commentaire</label>
<input type="text" class="form-control">
</div>
<div class="comment-submit">
<input type="submit" value="Soumettre" class="btn">
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<aside class="col-md-4">
<div class="widget search-widget">
<h5>Recherche Forum</h5>
<form class="search-form">
<div class="input-group">
<input type="text" placeholder="Recherche..." class="form-control">
<div class="input-group-append">
<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
</div>
</div>
</form>
</div>
<div class="widget post-widget">
<h5>Autres articles</h5>
<ul class="laTest-posts">
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="../assets/img/blog/blog-thumb-01.jpg" alt="">
</a>
 </div>
<div class="post-info">
<h4>
<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
</h4>
<p><i aria-hidden="true" class="fas fa-calendar-alt"></i> December 6, 2018</p>
</div>
</li>
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="../assets/img/blog/blog-thumb-02.jpg" alt="">
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
</h4>
<p><i aria-hidden="true" class="fas fa-calendar-alt"></i> December 6, 2018</p>
</div>
</li>
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="../assets/img/blog/blog-thumb-03.jpg" alt="">
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
</h4>
<p><i aria-hidden="true" class="fas fa-calendar-alt"></i> December 6, 2018</p>
</div>
</li>
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="../assets/img/blog/blog-thumb-04.jpg" alt="">
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
</h4>
<p><i aria-hidden="true" class="fas fa-calendar-alt"></i> December 6, 2018</p>
</div>
</li>
</ul>
</div>
<div class="widget category-widget">
<h5>Catégorie du forum</h5>
<ul class="categories">
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
<li><a href="#"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i> Lorem ipsum dolor</a></li>
</ul>
</div>
<div class="widget tags-widget">
<h5>Mots cles</h5>
<ul class="tags">
<li><a href="#" class="tag">Maths</a></li>
<li><a href="#" class="tag">Science</a></li>
<li><a href="#" class="tag">Library</a></li>
<li><a href="#" class="tag">Family</a></li>
<li><a href="#" class="tag">Sports</a></li>
<li><a href="#" class="tag">Test</a></li>
<li><a href="#" class="tag">student</a></li>
<li><a href="#" class="tag">Employee</a></li>
<li><a href="#" class="tag">Assignment</a></li>
<li><a href="#" class="tag">Exam</a></li>
<li><a href="#" class="tag">Forum</a></li>
</ul>
</div>
</aside>
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

</div>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/jquery.slimscroll.js"></script>

<script src="../assets/js/app.js"></script>
</body>
</html>
<?php
    }else{
        header("Location: index.php");
        exit();
    }
?>