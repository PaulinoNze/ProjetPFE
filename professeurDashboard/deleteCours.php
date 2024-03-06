<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $coursId = $_GET['id'];

    try {
        // Iniciar una transacción
        mysqli_begin_transaction($conn);

        // Eliminar las preguntas asociadas a los capítulos del curso
        $sqlDeleteQuiz = "DELETE FROM quiz WHERE chapitreId IN (SELECT chapitreId FROM chapitre WHERE coursId = '$coursId')";
        $resultQuiz = mysqli_query($conn, $sqlDeleteQuiz);

        if ($resultQuiz !== false || mysqli_affected_rows($conn) == 0) { // Verificar si se eliminaron las preguntas o si no había ninguna
            // Ahora que se han eliminado las preguntas asociadas, procedemos a eliminar los capítulos
            $sqlDeleteChapitres = "DELETE FROM chapitre WHERE coursId = '$coursId'";
            $resultChapitres = mysqli_query($conn, $sqlDeleteChapitres);

            if ($resultChapitres !== false) {
                // Ahora que se han eliminado los capítulos asociados, procedemos a eliminar el curso
                $sqlDeleteCours = "DELETE FROM cours WHERE coursId = '$coursId'";
                $resultCours = mysqli_query($conn, $sqlDeleteCours);

                if ($resultCours !== false) {
                    // Confirmar la transacción
                    mysqli_commit($conn);
                    header("Location: cours.php?cbe=cbe");
                    exit(); // Salir del script después de redirigir
                } else {
                    throw new Exception("Error al intentar eliminar el curso.");
                }
            } else {
                throw new Exception("Error al intentar eliminar los capítulos del curso.");
            }
        } else {
            throw new Exception("Error al intentar eliminar las preguntas asociadas a los capítulos del curso.");
        }
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        mysqli_rollback($conn);
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de curso no proporcionado.";
}
