<?php
session_start();
include "../database.php";
if(isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur les Cours</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2 class="mt-5 mb-3">Informations sur les Cours</h2>
    <div class="row">
        <?php
        // Fetch data from the cours table
        $sql = "SELECT * FROM cours";
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display the data
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nomCours']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <p class="card-text">Formation ID: <?php echo $row['formationId']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // If no rows are returned, display a message
            echo "<div class='col'>Aucun cours disponible.</div>";
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
} else {
    header("Location:../index.php");
}
?>
