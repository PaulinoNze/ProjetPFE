<?php
session_start();
include "../../database.php";
if (isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']) {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>ESTD compte Etudiant </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

    <link href="../../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="../../assets/css/fullcalendar.min.css">

    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../../assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="../../assets/css/style.css">
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
            <img src="../../assets/img/sidebar/icon-21.png" alt="">
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
              <a href="adminDashboard.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="../../assets/img/logo1.png" alt="" width="30" height="30"></a>
            </li>
          </ul>

          <ul class="nav user-menu float-right">
            <li class="nav-item dropdown d-none d-sm-block">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <img src="../../assets/img/sidebar/icon-22.png" alt="">
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
                            <img alt="John Doe" src="../../assets/img/user-06.jpg" class="img-fluid rounded-circle">
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
              <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="../../assets/img/sidebar/icon-23.png" alt=""> </a>
            </li>
            <li class="nav-item dropdown has-arrow">
              <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                  <?php if (!empty($_SESSION['image'])) : ?>
                    <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="Admin">
                  <?php else : ?>
                    <img class="rounded-circle" src="../../assets/img/user.jpg" width="30" alt="Default Image">
                  <?php endif; ?>
                  <span class="status online"></span></span>
                <span><?php echo $_SESSION['prenom']; ?></span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../../Etudiant/monprofil.php">Mon Profil</a>
                <a class="dropdown-item" href="../../Etudiant/modifierprofil.php">Modifier le profil</a>

                <a class="dropdown-item" href="../../PHP/logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="../../Etudiant/monprofil.php">Mon Profil</a>
              <a class="dropdown-item" href="../../Etudiant/modifierprofil.php">Modifier le profil</a>

              <a class="dropdown-item" href="../../PHP/index.php">Logout</a>
            </div>
          </div>
        </div>
      </div>


      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
              <a href="../../Etudiant/etudiantdashboard.php" class="logo">
                <img src="../../Img/logo1.jpg" height="60" alt="">
                <span class="text-uppercase">EST-D</span>
              </a>
            </div>
            <ul class="sidebar-ul">
            <li>
<a href="../../Etudiant/etudiantdashboard.php" class="border-top-0"><i class="fas fa-home back-icon"></i> Retour a Accueil</a>
</li>
              <li >
              <a href="#" class="cargar-pagina" data-url="introductio.php?coursId=<?php echo $_GET['coursId']; ?>  "><img src="../../assets/img/sidebar/icon-17.png" alt="icon"><span>introduction</span></a>
              </li>
              <?php
                    include "../../database.php";
                    if (isset($_GET['coursId'])) {
                      $coursId = $_GET['coursId'];
                      $sql = "SELECT chapitreId, nomChapitre FROM chapitre WHERE coursId = $coursId";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
              <li class="submenu">
              <a href="#"><img src="../../assets/img/sidebar/icon-17.png" alt="icon"> <span> <?php echo $row['nomChapitre']; ?></span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                <li><a href="#" class="cargar-pagina" data-url="video1.php?chapitreId=<?php echo $row['chapitreId']; ?>"><span>Video</span></a></li>
                              <li><a href="#" class="cargar-pagina" data-url="coursPDF.php?chapitreId=<?php echo $row['chapitreId']; ?>"><span>PDF</span></a></li>
                              <li><a href="#" class="cargar-pagina" data-url="quiz.php?chapitreId=<?php echo $row['chapitreId']; ?>"><span>QUIZ</span></a></li>

                </ul>
              </li>
              <?php
                        }
                      } else {
                        // No rows returned from the database
                        echo "<tr><td colspan='7'></td></tr>";
                      }
                      ?>

<li class="submenu">
                        <a href="#"><img src="../../assets/img/sidebar/icon-17.png" alt="icon"> <span>exame finale</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                          <li><a href="#" class="cargar-pagina" data-url="exameFinale.php?coursId=<?php echo $coursId; ?>&etudId=<?php echo $_GET['etudId']; ?>"><span>question de examen finale</span></a></li>
                        </ul>
                      </li>
                      <li class="submenu">
                        <a href="#"><img src="../../assets/img/sidebar/icon-8.png" alt="icon"> <span>Attestation</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                          <li><a href="#" class="cargar-pagina" data-url="obtenir_certificat.php"><span>Obtenir Attestation de reussir</span></a></li>
                        </ul>
                      </li>

          </div>
        </div>
      </div>


      <div class="page-wrapper">
        <div class="content container-fluid">
          <?php
          include "../../database.php";
          $coursId = $_GET['coursId'];
          $sql = "SELECT nomCours FROM cours WHERE coursId = '$coursId'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
          ?>
          <div class="page-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="page-title mb-0"><?php echo $row['nomCours']; ?></h3>
              </div>
              <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                  <li class="breadcrumb-item"><a href="../../Etudiant/etudiantdashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                  <li class="breadcrumb-item"><span><?php echo $row['nomCours']; ?></span></li>
                </ul>
              </div>
            </div>
          </div>
          <?php
            }
          }
          }
          ?>

          <!--------------------------------------------contents----------------------------------------------->
          <section class="course-content" id="course-content" role="main" aria-label="Content">
            <div id="contenido-pagina"></div>
          </section>
          
    <!-- jQuery (obligatorio para Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="static/js/vendor/jquery.scrollTo-1.4.2-min.4aa3e2dfa312.js"></script>
    <script type="text/javascript" src="static/js/vendor/jquery.flot.d3d45ff0c6a8.js"></script>
    <script type="text/javascript" src="static/js/vendor/codemirror-compressed.dd4b74f7c5fe.js"></script>
    <script type="text/javascript" src="static/js/lms-courseware.94e582ddac20.js" charset="utf-8"></script>
    <script type="text/javascript" src="static/js/discussion.9309e213b3dc.js" charset="utf-8"></script>
    <script type="text/javascript" src="static/js/vendor/noreferrer.aa62a3e70ffa.js" charset="utf-8"></script>
    <script type="text/javascript" src="//tag.aticdn.net/602676/smarttag.js"></script>
    <script type="text/javascript">
      if (window.ATInternet) {
        var tag = new ATInternet.Tracker.Tag({
          site: 602676
        });
        tag.page.set({});
        tag.dispatch();
      }
    </script>

    <script>
      $(document).ready(function() {
        // Manejar el clic en los enlaces para cargar la página
        $(".cargar-pagina").click(function(e) {
          e.preventDefault(); // Prevenir el comportamiento por defecto del enlace

          // Obtener la URL de la página a cargar
          var url = $(this).data("url");

          // Cargar la página dentro del contenedor
          $("#contenido-pagina").load(url);
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        var previousScroll = 0;

        $(window).scroll(function() {
          var currentScroll = $(this).scrollTop();

          // Si el desplazamiento actual es mayor que el desplazamiento anterior,
          // es decir, estamos desplazándonos hacia abajo.
          if (currentScroll > previousScroll) {
            // Oculta la barra de navegación con una animación
            $(".header-outer").slideUp();
          } else {
            // Muestra la barra de navegación con una animación
            $(".header-outer").slideDown();
          }
          // Guarda el desplazamiento actual para compararlo con el siguiente
          previousScroll = currentScroll;
        });
      });
    </script>
          <!--------------------------------------------notifications------------------------------------------->
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

    </div>


    <script src="../../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/js/jquery.slimscroll.js"></script>

    <script src="../../assets/js/select2.min.js"></script>
    <script src="../../assets/js/moment.min.js"></script>

    <script src="../../assets/js/fullcalendar.min.js"></script>
    <script src="../../assets/js/jquery.fullcalendar.js"></script>

    <script src="../../assets/plugins/morris/morris.min.js"></script>
    <script src="../../assets/plugins/raphael/raphael-min.js"></script>
    <script src="../../assets/js/apexcharts.js"></script>
    <script src="../../assets/js/chart-data.js"></script>

    <script src="../../assets/js/app.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>