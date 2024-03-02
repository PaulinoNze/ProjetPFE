<?php
session_start();
if (isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']) {

?>

  <!DOCTYPE html>
  <!--[if lte IE 9]><html class="ie ie9 lte9" lang="fr"><![endif]-->
  <!--[if !IE]><!-->
  <html lang="fr">
  <!--<![endif]-->

  <head dir="ltr">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>cours1</title>
    <meta name="platform.node" CONTENT="edxapp-lms-wsgi-d-240216-15h48m43s-75dbc55599-hdmsc">
    <link rel="alternate" type="application/rss+xml" title="Flux RSS des cours FUN" href="/cours/feed/" />

    <link href="../../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="../../assets/css/fullcalendar.min.css">

    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../../assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="../../assets/css/style.css">





    <title>


    </title>

    <script type="text/javascript">
      /* immediately break out of an iframe if coming from the marketing website */
      (function(window) {
        if (window.location !== window.top.location) {
          window.top.location = window.location;
        }
      })(this);
    </script>

    <script type="text/javascript" src="/i18n.js"></script>

    <link rel="icon" type="image/x-icon" href="static/fun/images/favicon.70034e408662.ico" />

    <link href="static/css/lms-style-vendor.57333ced8b3b.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="static/css/lms-main.ad71203f3b66.css" type="text/css" media="all" />


    <script type="text/javascript" src="static/js/lms-main_vendor.89cec402191b.js" charset="utf-8"></script>

    <script type="text/javascript" src="static/js/lms-application.4ded1a473dec.js" charset="utf-8"></script>



    <script>
      window.baseUrl = "static/";
      (function(require) {
        require.config({
          baseUrl: window.baseUrl
        });
      }).call(this, require || RequireJS.require);
    </script>
    <script type="text/javascript" src="static/lms/js/require-config.7f71a899fb73.js"></script>


    <script type="text/javascript" src="static/js/lms-modules.0edf675aec10.js" charset="utf-8"></script>

    <link href="static/css/lms-style-course-vendor.d65f103108eb.css" rel="stylesheet" type="text/css" />

    <link href="static/css/lms-course.5b5638d506a0.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="static/js/jquery.autocomplete.3bd10d7510d2.js"></script>
    <script type="text/javascript" src="static/js/src/tooltip_manager.c80266d685f1.js"></script>

    <script type="text/javascript" src="static/js/discussion_vendor.347a9c6c51a4.js" charset="utf-8"></script>

    <link href="static/css/vendor/jquery.autocomplete.09a0b34739a2.css" rel="stylesheet" type="text/css">

    <meta name="path_prefix" content="">

  </head>

  <body class="ltr view-in-course view-courseware courseware  lang_fr">
    <div class="main-wrapper">
      <!-------------------------------------------------- nav ------------------------------------->
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a href="../../Etudiant/etudiantdashboard.php" class="btn btn-outline-light bg- text-dark" >
    <?php if (!empty($_SESSION['image'])) : ?>
      <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="Admin">
    <?php else : ?>
      <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
    <?php endif; ?>
    Etudiant Dashboard
 
</a>

        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../cours.php"><i class="fas fa-book-open"></i> Cours</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-------------------------------------------------- nav ------------------------------------->

      <div class="content-wrapper" id="content">



        <script type="text/template" id="image-modal-tpl">
          <div class="wrapper-modal wrapper-modal-image">
  <section class="image-link">
    <%= smallHTML%>
    <a href="#" class="modal-ui-icon action-fullscreen" role="button">
      <span class="label">
        <i class="icon fa fa-arrows-alt fa-large"></i> <%= gettext("Fullscreen") %>
      </span>
    </a>
  </section>

  <section class="image-modal">
    <section class="image-content">
      <div class="image-wrapper">
        <img alt="<%= largeALT %>, <%= gettext('Large') %>" src="<%= largeSRC %>" />
      </div>

      <a href="#" class="modal-ui-icon action-close" role="button">
        <span class="label">
          <i class="icon fa fa-remove fa-large"></i> <%= gettext("Close") %>
        </span>
      </a>

      <ul class="image-controls">
        <li class="image-control">
          <a href="#" class="modal-ui-icon action-zoom-in" role="button">
            <span class="label">
              <i class="icon fa fa fa-search-plus fa-large"></i> <%= gettext("Zoom In") %>
            </span>
          </a>
        </li>

        <li class="image-control">
          <a href="#" class="modal-ui-icon action-zoom-out is-disabled" aria-disabled="true" role="button">
            <span class="label">
              <i class="icon fa fa fa-search-minus fa-large"></i> <%= gettext("Zoom Out") %>
            </span>
          </a>
        </li>
      </ul>
    </section>
  </section>
</div>
</script>



        <nav class="courseware wrapper-course-material" aria-label="Cours">
          <div class="course-material">
            <ol class="course-tabs">

              <li>
                <a href="#" class="btn btn-primary">
                  Cours
                </a>
              </li>

            </ol>
          </div>
        </nav>



        <div class="container">

          <div class="course-wrapper" role="presentation">

            <div class="sidebar" id="sidebar">
              <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">

                  <ul class="sidebar-ul">

                    <li class="submenu">

                      <a href="#"><img src="../../assets/img/sidebar/icon-17.png" alt="icon"> <span>introduction</span> <span class="menu-arrow"></span></a>
                      <ul class="list-unstyled" style="display: none;">
                        <li><a href="#" class="btn btn-primary cargar-pagina" data-url="introductio.php?coursId=<?php echo $_GET['coursId']; ?>  "><span>introduction au cours</span></a></li>
                      </ul>
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
                              <li><a href="#" class="btn btn-primary cargar-pagina" data-url="video1.php?chapitreId=<?php echo $row['chapitreId']; ?>"><span>Video</span></a></li>
                              <li><a href="#" class="btn btn-primary cargar-pagina" data-url="coursPDF.php?chapitreId=<?php echo $row['chapitreId']; ?>"><span>PDF</span></a></li>
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
                          <li><a href="#" class="btn btn-primary cargar-pagina" data-url="exameFinale.php"><span>question de exame finale</span></a></li>
                        </ul>
                      </li>

                      <li class="submenu">
                        <a href="#"><img src="../../assets/img/sidebar/icon-8.png" alt="icon"> <span>Attestation</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                          <li><a href="#" class="btn btn-primary cargar-pagina" data-url="obtenir_certificat.php"><span>Obtenir Attestation de reussir</span></a></li>
                        </ul>
                      </li>
                  </ul>

                </div>
              </div>
            </div>
          <?php
                    }
          ?>


          <section class="course-content" id="course-content" role="main" aria-label="Content">
            <div id="contenido-pagina"></div>
          </section>
          </div>
        </div>
        <div class="container-footer">
        </div>

        <nav class="nav-utilities " aria-label="Utilitaires du cours">

        </nav>

      </div>
    </div>


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