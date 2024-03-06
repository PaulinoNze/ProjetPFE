<?php
session_start();
include "../database.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_SESSION['profId']) && isset($_SESSION['nom']) && isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si la variable de sesión profId está definida y no está vacía
        if (isset($_SESSION['profId']) && !empty($_SESSION['profId'])) {
            $profId = $_SESSION['profId']; // Obtener el ID del profesor de la sesión
            $nomCours = validate(mysqli_real_escape_string($conn, $_POST['nomCours']));
            $description = validate(mysqli_real_escape_string($conn, $_POST['description']));
            $datePublish = $_POST['datePublish']; // Recibo la fecha de publicación
            $formationID = $_POST['formation']; // Obtener el ID de la formación seleccionada
            $numChapitres = $_POST['numChapitres']; // Obtener el número de capítulos a agregar

            // Subir la imagen del curso
            $foto = $_FILES['image']['name'];
            $fotoTmp = $_FILES['image']['tmp_name'];

            // Carpeta donde se guardará la imagen
            $rutaFoto = "FotosCursos/";
            $rutaFotoBD = $rutaFoto . $_FILES['image']['name'];

            // Mover la imagen a su carpeta correspondiente
            if (move_uploaded_file($fotoTmp, $rutaFotoBD)) {
                // Guardar el curso en la base de datos
                $queryCours = "INSERT INTO cours (nomCours, description, image, datePublish, profId, formationID) VALUES ('$nomCours', '$description', '$rutaFotoBD', '$datePublish', '$profId', '$formationID')";
                $resultCours = mysqli_query($conn, $queryCours);

                // Verificar si se pudo insertar el curso correctamente
                if ($resultCours) {
                    // Obtener el ID del curso recién insertado
                    $coursId = mysqli_insert_id($conn);

                    // Iterar sobre cada capítulo y guardarlos en la base de datos
                    for ($i = 1; $i <= $numChapitres; $i++) {
                        $nomChapitre = $_POST['nomChapitre' . $i];
                        $video = $_FILES['video' . $i]['name'];
                        $videoTmp = $_FILES['video' . $i]['tmp_name'];
                        $pdf = $_FILES['pdf' . $i]['name'];
                        $pdfTmp = $_FILES['pdf' . $i]['tmp_name'];

                        // Carpeta donde se guardarán los videos
                        $rutaVideo = "video/";
                        $rutaVideoBD = $rutaVideo . $_FILES['video' . $i]['name'];

                        // Carpeta donde se guardarán los PDF
                        $rutaPDF = "pdf/";
                        $rutaPDFBD = $rutaPDF . $_FILES['pdf' . $i]['name'];

                        // Mover los archivos de video y PDF a sus carpetas correspondientes
                        if (move_uploaded_file($videoTmp, $rutaVideoBD) && move_uploaded_file($pdfTmp, $rutaPDFBD)) {
                            // Guardar el capítulo en la base de datos
                            $queryChapitre = "INSERT INTO chapitre (nomChapitre, video, pdf, coursId) VALUES ('$nomChapitre', '$rutaVideoBD', '$rutaPDFBD', '$coursId')";
                            $resultChapitre = mysqli_query($conn, $queryChapitre);

                            // Verificar si se pudo insertar el capítulo correctamente
                            if (!$resultChapitre) {
                                echo "Error al insertar el capítulo $nomChapitre en la base de datos.";
                            } else {
                                // Obtener el ID del capítulo recién insertado
                                $chapitreId = mysqli_insert_id($conn);

                                // Insertar datos del quiz en la base de datos
                                $num_questions = $_POST['nb_questions']; // Obtener el número de preguntas del quiz
                                foreach ($_POST['questions'] as $questionData) {
                                    // Obtener los datos de cada pregunta
                                    $question = validate(mysqli_real_escape_string($conn, $questionData['question']));
                                    $reponses = $questionData['reponses'];
                                    $correct = $questionData['correct'];

                                    // Verificar si las respuestas están definidas y no están vacías
                                    $reponse_1 = isset($reponses[0]) ? validate(mysqli_real_escape_string($conn, $reponses[0])) : null;
                                    $reponse_2 = isset($reponses[1]) ? validate(mysqli_real_escape_string($conn, $reponses[1])) : null;
                                    $reponse_3 = isset($reponses[2]) ? validate(mysqli_real_escape_string($conn, $reponses[2])) : null;

                                    // Insertar la pregunta en la tabla quiz
                                    $queryQuiz = "INSERT INTO quiz (question, reponse_1, reponse_2, reponse_3, num_reponse_correcte, chapitreId) VALUES ('$question', '$reponse_1', '$reponse_2', '$reponse_3', '$correct', '$chapitreId')";
                                    $resultQuiz = mysqli_query($conn, $queryQuiz);

                                    // Verificar si se pudo insertar la pregunta correctamente
                                    if (!$resultQuiz) {
                                        echo "Error al insertar la pregunta en la base de datos.";
                                    }
                                }
                            }
                        } else {
                            echo "Error al subir los archivos del capítulo $nomChapitre.";
                        }
                    }

                    // Redirigir a una página de éxito o mostrar un mensaje de éxito
                    header("Location: cours.php?cr=cr");
                    exit;
                } else {
                    echo "Error al registrar el curso. Por favor, inténtalo de nuevo.";
                }
            } else {
                echo "Error al subir la imagen del curso. Por favor, verifica que el archivo sea una imagen válida.";
            }
        } else {
            echo "Error: ID del profesor no definido en la sesión.";
        }
    } else {
        echo "Error: Método de solicitud incorrecto.";
    }
} else {
    header("Location: index.php");
    exit();
}
