<?php
session_start();
include "../database.php";
if(isset($_SESSION['userid']) || $_SESSION['nom'] || $_SESSION['email']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation Info</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2 class="mt-5 mb-3">Informations sur les Formations</h2>
    <div class="row">
        <?php
        // Fetch data from the formation table
        $sql = "SELECT * FROM formation";
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display the data
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo 'data:image;base64,' . base64_encode($row['image']); ?>" class="card-img-top" alt="Formation Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['titre']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <p class="card-text">Date de Publication: <?php echo $row['datePublish']; ?></p>
                            <p class="card-text">Auteur: <?php echo $row['autheur']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // If no rows are returned, display a message
            echo "<div class='col'>Aucune formation disponible.</div>";
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
