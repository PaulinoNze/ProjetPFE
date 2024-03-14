<?php
session_start();
include "../database.php";
if (isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>ESTD professeur compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

        <link href="../../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

        <link rel="stylesheet" href="../assets/css/fullcalendar.min.css">

        <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link rel="stylesheet" href="../assets/css/style.css">
        <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
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
                                    <?php if (!empty($_SESSION['image'])) : ?>
                                        <img class="rounded-circle" src="<?php echo 'data:image;base64,' . base64_encode($_SESSION['image']); ?>" width="30" alt="professeur">
                                    <?php else : ?>
                                        <img class="rounded-circle" src="../assets/img/user.jpg" width="30" alt="Default Image">
                                    <?php endif; ?>
                                    <span class="status online"></span></span>
                                <span><?php echo $_SESSION['prenom']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
                                <a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
                                <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown mobile-user-menu float-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="professeurInfo.php">Mon Profil</a>
                            <a class="dropdown-item" href="modifierprofesseur.php">Modifier le profil</a>
                            <a class="dropdown-item" href="../PHP/index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="header-left">
                            <a href="professeurDashboard.php" class="logo">
                                <img src="../Img/logo1.jpg" height="60" alt="">
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
                                <a href="#"><img src="../assets/img/sidebar/icon-3.png" alt="icon"> <span> Cours</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="cours.php"><span>Cours</span></a></li>
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
                            <div class="col-md-6">
                                <h3 class="page-title mb-0">Tableau de Bord</h3>
                            </div>
                            <div class="col-md-6">
                                <ul class="breadcrumb mb-0 p-0 float-right">
                                    <li class="breadcrumb-item"><a href="professeurDashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><span>Tableau de Bord</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget dash-widget5">
                                <span class="float-left"><img src="../assets/img/dash/dash-1.png" alt="" width="80"></span>
                                <div class="dash-widget-info text-right">
                                    <span>Etudiants</span>
                                    <?php
                                    $profId = $_SESSION['profId'];
                                    // Fetch data from the etudiant table
                                    $sqlEtud = "SELECT COUNT(e.etudId) AS student_count
                                    FROM etudiant e
                                    JOIN coursInscrit ci ON e.etudId = ci.etudId
                                    JOIN cours c ON ci.coursId = c.coursId
                                    JOIN formation f ON f.formationID = f.formationID
                                    WHERE c.profId = $profId;";
                                    $resultEtud = mysqli_query($conn, $sqlEtud);
                                    $rowEtud = mysqli_fetch_assoc($resultEtud);
                                    if ($rowEtud != 0) {
                                        $studentCount = $rowEtud['student_count'];;
                                    } else {
                                        $studentCount = 0;
                                    }

                                    ?>
                                    <h3><?php echo $studentCount; ?></h3>
                                </div>
                            </div>
                        </div>

                        <!--------------------------------------------tous les etudiants----------------------------------------------->
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title">
                                                    Etudiants inscrits à la formation
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <div class=" mt-sm-0 mt-2">
                                                    <button class="btn btn-outline-danger mr-2" onclick="downloadPDF()">
                                                        <img src="../assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span>
                                                    </button>
                                                    <script>
                                                        function downloadPDF() {
                                                            // Redirect to the PHP script that generates the PDF
                                                            window.location.href = 'generate_pdf.php?profId=<?php echo $_SESSION['profId']; ?>';
                                                        }
                                                    </script>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table custom-table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Email</th>
                                                        <th>Telephone</th>
                                                        <th>Date de Naissance</th>
                                                        <th>Cours</th>
                                                        <th>Formation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Assuming you have already started the session and included the database connection
                                                    $profId = $_SESSION['profId'];
                                                    // Fetch data from the etudiant table
                                                    $sql = "SELECT e.*, ci.*,f.*, c.nomCours
                                                        FROM etudiant e
                                                        JOIN coursInscrit ci ON e.etudId = ci.etudId
                                                        JOIN cours c ON ci.coursId = c.coursId
                                                        JOIN formation f ON f.formationID = f.formationID
                                                        WHERE c.profId = $profId;";
                                                    $result = mysqli_query($conn, $sql);


                                                    // Check if there are any rows returned
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // Loop through each row and display the data in the table
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <h2><a href="etudiantInfo.php?id=<?php echo $row['etudId']; ?>" class="avatar text-white"><?php if (!empty($row['image'])) : ?>
                                                                                <img class="avatar" src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" alt="User Image">
                                                                            <?php else : ?>
                                                                                <img class="avatar" src="../assets/img/user.jpg" alt="Default Image">
                                                                            <?php endif; ?></a></a><a href="professeurInfo.php"> <span></span></a></h2>
                                                                </td>
                                                                <td><?php echo $row['nom']; ?></td>
                                                                <td><?php echo $row['prenom']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['telephone']; ?></td>
                                                                <td><?php echo $row['date_naissance']; ?></td>
                                                                <td><?php echo $row['nomCours']; ?></td>
                                                                <td><?php echo $row['titre']; ?></td>

                                                                <!-- Include jQuery library -->
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('.delete-btn').click(function() {
                                                                            var etudId = $(this).data('etudid');
                                                                            // Send AJAX request to delete.php
                                                                            $.ajax({
                                                                                url: 'professeurDashboard.php',
                                                                                type: 'POST',
                                                                                data: {
                                                                                    etudId: etudId
                                                                                },
                                                                                success: function(response) {
                                                                                    // Redirect to the current page after successful deletion
                                                                                    window.location.reload();
                                                                                },
                                                                                error: function(xhr, status, error) {
                                                                                    console.error(xhr.responseText);
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                </script>
                                                                <?php
                                                                if (isset($_POST['etudId'])) {
                                                                    $etudId = $_POST['etudId'];

                                                                    // SQL to delete a record
                                                                    $sql = "DELETE FROM etudiant WHERE etudId = $etudId";

                                                                    if (mysqli_query($conn, $sql)) {
                                                                        // Deletion successful
                                                                        echo "Record deleted successfully";
                                                                    } else {
                                                                        // Error in deletion
                                                                        echo "Error deleting record: " . mysqli_error($conn);
                                                                    }
                                                                }
                                                                ?>

                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        // No rows returned from the database
                                                        echo "<tr><td colspan='7'>Aucun étudiant</td></tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
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

            <script src="../assets/js/fullcalendar.min.js"></script>
            <script src="../assets/js/jquery.fullcalendar.js"></script>

            <script src="../assets/plugins/morris/morris.min.js"></script>
            <script src="../assets/plugins/raphael/raphael-min.js"></script>
            <script src="../assets/js/apexcharts.js"></script>
            <script src="../assets/js/chart-data.js"></script>

            <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>