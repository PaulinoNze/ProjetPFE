<?php
session_start();
include "../database.php";

if (isset($_SESSION['profId']) && isset($_SESSION['nom']) && isset($_SESSION['email'])) {
    $profId = $_SESSION['profId'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $coursId = $_REQUEST['coursId']; 
        $nomCours = $_REQUEST['nomCours']; 
        $description = $_REQUEST['description']; 
        $datePublish = $_REQUEST['datePublish']; 
        $formationID = $_POST['formation']; 

        // Actualizar información del curso
        $updateCoursQuery = "UPDATE cours SET nomCours='$nomCours', description='$description', datePublish='$datePublish', formationID='$formationID' WHERE coursId='$coursId'";
        $updateCoursResult = mysqli_query($conn, $updateCoursQuery);

        if (!$updateCoursResult) {
            echo "Error al actualizar la información del curso.";
            exit;
        }

        // Procesar la información de los capítulos
        if (isset($_POST['nomChapitre']) && isset($_FILES['video']['name']) && isset($_FILES['pdf']['name'])) {
            $nombresChapitres = $_POST['nomChapitre'];
            $videosChapitres = $_FILES['video'];
            $pdfsChapitres = $_FILES['pdf'];
            $chapitreIds = $_POST['chapitreId']; // Obtener los IDs de los capítulos

            // Contador para recorrer los arrays de los capítulos
            $countChapitres = count($nombresChapitres);

            // Validar que hay capítulos a procesar
            if ($countChapitres > 0) {
                // Iterar sobre los capítulos y procesar cada uno
                for ($i = 0; $i < $countChapitres; $i++) {
                    $nombreChapitre = mysqli_real_escape_string($conn, $nombresChapitres[$i]);
                    $chapitreId = $chapitreIds[$i]; // Obtener el ID del capítulo correspondiente a la pregunta actual

                  // Procesar video
$videoName = $_FILES['video']['name'][$i];
$videoTmpName = $_FILES['video']['tmp_name'][$i];
$videoError = $_FILES['video']['error'][$i];
if ($videoError === 0) {
    $videoDestination = 'video/' . $videoName;
    move_uploaded_file($videoTmpName, $videoDestination);
} else {
    // Manejar el error de carga de video aquí
    // Por ejemplo, mostrar un mensaje de error o registrar el error
    echo "Error al cargar el archivo de video: " . $_FILES['video']['error'][$i];
    exit;
}

// Procesar PDF
$pdfName = $_FILES['pdf']['name'][$i];
$pdfTmpName = $_FILES['pdf']['tmp_name'][$i];
$pdfError = $_FILES['pdf']['error'][$i];
if ($pdfError === 0) {
    $pdfDestination = 'pdf/' . $pdfName;
    move_uploaded_file($pdfTmpName, $pdfDestination);
} else {
    // Manejar el error de carga de PDF aquí
    // Por ejemplo, mostrar un mensaje de error o registrar el error
    echo "Error al cargar el archivo PDF: " . $_FILES['pdf']['error'][$i];
    exit;
}


                    // Actualizar la información del capítulo en la base de datos con la cláusula WHERE que especifica el chapitreId
                    $updateChapitreQuery = "UPDATE chapitre SET nomChapitre='$nombreChapitre', video='$videoDestination', pdf='$pdfDestination' WHERE chapitreId='$chapitreId' AND coursId='$coursId'";
                    $updateChapitreResult = mysqli_query($conn, $updateChapitreQuery);

                    if (!$updateChapitreResult) {
                        echo "Error al actualizar la información del capítulo.";
                        exit;
                    }
                }
            }
        }

// Procesar la información del examen final
if (isset($_POST['questionsFinale'])) {
    $questionsFinale = $_POST['questionsFinale'];
    $coursIdFinale = $_POST['coursIdFinale'];

    foreach ($questionsFinale as $questionId => $questionData) {
        $questionFinale = $questionData['questionFinale'];
        $reponsesFinale = $questionData['reponsesFinale'];
        $correctFinale = (int) $questionData['correctFinale'];
        $coursId = $coursIdFinale[$questionId];

        // Update the final exam question
        $updateExamQuery = "UPDATE examefinale SET question='$questionFinale', reponse_1='{$reponsesFinale[0]}', reponse_2='{$reponsesFinale[1]}', reponse_3='{$reponsesFinale[2]}', reponse_correcte=$correctFinale WHERE exameFinaleId='$questionId' ";
        $updateExamResult = mysqli_query($conn, $updateExamQuery);

        if (!$updateExamResult) {
            echo "Error al actualizar la pregunta del examen final.";
            exit;
        }
    }
}

// Procesar la información del quiz
if (isset($_POST['questions'])) {
    $questions = $_POST['questions'];
    $chapitreIdQuiz = $_POST['chapitreIdQuiz'];

    foreach ($questions as $questionId => $questionData) {
        $question =  $questionData['question'];
        $reponses = $questionData['reponses'];
        $correct = (int) $questionData['correct'];
        $chapitreId = $chapitreIdQuiz[$questionId];

        // Modificar la consulta SQL para incluir una cláusula WHERE que especifique el ID de la pregunta del quiz
        $updateQuizQuery = "UPDATE quiz SET question='$question', reponse_1='{$reponses[0]}', reponse_2='{$reponses[1]}', reponse_3='{$reponses[2]}', num_reponse_correcte=$correct WHERE idQuiz='$questionId' ";
        $updateQuizResult = mysqli_query($conn, $updateQuizQuery);

        if (!$updateQuizResult) {
            echo "Error al actualizar la pregunta del quiz.";
            exit;
        }
    }
}

        // Redireccionar después de la actualización exitosa
        header("Location: cours.php?dia=dia");
        exit;
    } else {
        echo "Error: método de solicitud incorrecto.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
