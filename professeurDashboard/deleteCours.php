<?php
require_once('config.php');

if(isset($_GET['id'])) {
    $coursId = $_GET['id'];

    $sqlDeleteCours = "DELETE FROM cours WHERE coursId = '$coursId'";
    $resultCours = mysqli_query($conn, $sqlDeleteCours);

    if($resultCours) {
        header("Location: cours.php?cbe=cbe");
    } else {
        echo "Error al intentar eliminar el curso.";
    }
} else {
    echo "ID de curso no proporcionado.";
}
?>
