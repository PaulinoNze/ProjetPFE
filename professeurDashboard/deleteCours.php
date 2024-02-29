<?php
require_once('config.php');

if(isset($_GET['id'])) {
    $coursId = $_GET['id'];

    $sqlDeleteChapitres = "DELETE FROM chapitre WHERE coursId = '$coursId'";
    $resultChapitres = mysqli_query($conn, $sqlDeleteChapitres);

    if($resultChapitres) {
        // Ahora que se han eliminado los capítulos asociados, procedemos a eliminar el curso
        $sqlDeleteCours = "DELETE FROM cours WHERE coursId = '$coursId'";
        $resultCours = mysqli_query($conn, $sqlDeleteCours);

        if($resultCours) {
            header("Location: cours.php?cbe=cbe");
        } else {
            echo "Error al intentar eliminar el curso.";
        }
    } else {
        echo "Error al intentar eliminar los capítulos del curso.";
    }
} else {
    echo "ID de curso no proporcionado.";
}
?>

