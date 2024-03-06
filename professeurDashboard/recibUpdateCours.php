<?php
session_start();
include "../database.php";

if(isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']) {
    include('config.php');

    $coursId = mysqli_real_escape_string($conn, $_REQUEST['coursId']);
    $nomCours = mysqli_real_escape_string($conn, $_REQUEST['nomCours']);
    $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
    $datePublish = mysqli_real_escape_string($conn, $_REQUEST['datePublish']);
    $formationID = mysqli_real_escape_string($conn, $_POST['formation']); // Obtener el ID de la formación desde el formulario

    // Inicializar variables para almacenar las rutas de los archivos actualizados
    $rutaBannerBD = $rutaVideoBD = $rutaPDFBD = "";

    if (!empty($_FILES['image']['name'])) {
        // Procesar la imagen
    }

    // Actualizar la información del curso
    $UpdateCursos = "UPDATE cours SET nomCours='$nomCours', description='$description', datePublish='$datePublish'";

    if (!empty($rutaBannerBD)) {
        $UpdateCursos .= ", image='$rutaBannerBD'";
    }

    // Agregar el ID de la formación a la consulta de actualización
    $UpdateCursos .= ", formationID='$formationID'";

    $UpdateCursos .= " WHERE coursId ='$coursId'";

    $resultadoCurso = mysqli_query($conn, $UpdateCursos);

    if (!$resultadoCurso) {
        echo "Error al actualizar el curso. Por favor, inténtalo de nuevo.";
        exit;
    }

    // Procesar la información del chapitre
    if (isset($_POST['nomChapitre']) && isset($_FILES['video']['name']) && isset($_FILES['pdf']['name'])) {
        $nombresChapitres = $_POST['nomChapitre'];
        $videosChapitres = $_FILES['video'];
        $pdfsChapitres = $_FILES['pdf'];

        // Contador para recorrer los arrays de los capítulos
        $countChapitres = count($nombresChapitres);

        // Validar que hay capítulos a procesar
        if ($countChapitres > 0) {
            // Iterar sobre los capítulos y procesar cada uno
            for ($i = 0; $i < $countChapitres; $i++) {
                $nombreChapitre = mysqli_real_escape_string($conn, $nombresChapitres[$i]);

                // Procesar video
                $videoName = $_FILES['video']['name'][$i];
                $videoTmpName = $_FILES['video']['tmp_name'][$i];
                $videoError = $_FILES['video']['error'][$i];
                if ($videoError === 0) {
                    $videoDestination = 'video/' . $videoName;
                    move_uploaded_file($videoTmpName, $videoDestination);
                }

                // Procesar PDF
                $pdfName = $_FILES['pdf']['name'][$i];
                $pdfTmpName = $_FILES['pdf']['tmp_name'][$i];
                $pdfError = $_FILES['pdf']['error'][$i];
                if ($pdfError === 0) {
                    $pdfDestination = 'pdf/' . $pdfName;
                    move_uploaded_file($pdfTmpName, $pdfDestination);
                }

                // Actualizar la información del capítulo en la base de datos
                $updateChapitre = "UPDATE chapitre SET nomChapitre='$nombreChapitre', video='$videoDestination', pdf='$pdfDestination' WHERE coursId='$coursId'";
                $resultadoUpdateChapitre = mysqli_query($conn, $updateChapitre);

                if (!$resultadoUpdateChapitre) {
                    echo "Error al actualizar el capítulo. Por favor, inténtalo de nuevo.";
                    exit;
                }
            }
        }
    }

    // Procesar la información del quiz
    if(isset($_POST['questions'])) {
        $questions = $_POST['questions'];

        foreach ($questions as $index => $questionData) {
            $question = mysqli_real_escape_string($conn, $questionData['question']);
            $reponses = $questionData['reponses'];
            $correct = (int) $questionData['correct'];

            // Update the quiz question
            $updateQuizQuery = "UPDATE quiz SET question='$question', reponse_1='{$reponses[0]}', reponse_2='{$reponses[1]}', reponse_3='{$reponses[2]}', num_reponse_correcte=$correct WHERE chapitreId IN (SELECT chapitreId FROM chapitre WHERE coursId='$coursId') LIMIT 1";
            $updateQuizResult = mysqli_query($conn, $updateQuizQuery);

            if(!$updateQuizResult) {
                echo "Error al actualizar la pregunta del quiz. Por favor, inténtalo de nuevo.";
                exit;
            }
        }
    }

    // Redireccionar después de la actualización exitosa
    header("Location: cours.php?dia=dia");
    exit;
} else {
    header("Location: index.php");
    exit();
}
?>
