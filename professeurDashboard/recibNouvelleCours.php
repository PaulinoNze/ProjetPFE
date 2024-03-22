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
                        $nomChapitre = validate(mysqli_real_escape_string($conn, $_POST['nomChapitre' . $i]));
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
                            if ($resultChapitre) {
                                // Obtener el ID del capítulo recién insertado
                                $chapitreId = mysqli_insert_id($conn);

                                // Verificar si se han agregado preguntas de quiz para este capítulo
                                if (isset($_POST['question' . $i])) {
                                    // Iterar sobre cada pregunta de quiz
                                    foreach ($_POST['question' . $i] as $key => $question) {
                                        $question = validate(mysqli_real_escape_string($conn, $question));
                                        $answer1 = validate(mysqli_real_escape_string($conn, $_POST['answer1' . $i][$key]));
                                        $answer2 = validate(mysqli_real_escape_string($conn, $_POST['answer2' . $i][$key]));
                                        $answer3 = validate(mysqli_real_escape_string($conn, $_POST['answer3' . $i][$key]));
                                        $correctAnswer = $_POST['correctAnswer' . $i][$key];

                                        // Insertar la pregunta de quiz en la base de datos
                                        $queryQuiz = "INSERT INTO quiz (question, reponse_1, reponse_2, reponse_3, num_reponse_correcte, chapitreId) VALUES ('$question', '$answer1', '$answer2', '$answer3', '$correctAnswer', '$chapitreId')";
                                        $resultQuiz = mysqli_query($conn, $queryQuiz);
                                        // Verificar si se pudo insertar la pregunta de quiz correctamente
                                        if (!$resultQuiz) {
                                            echo "Error al insertar la pregunta de quiz en la base de datos.";
                                        }
                                    }
                                }
                            } else {
                                echo "Error al insertar el capítulo $nomChapitre en la base de datos.";
                            }
                        } else {
                            echo "Error al subir los archivos de video y PDF del capítulo $nomChapitre.";
                        }
                    }
                    // Verificar si se han agregado preguntas de examen final para este curso
                    // Insertar datos del quiz en la base de datos

                    foreach ($_POST['questionsFinale'] as $questionData) {
                        $question = validate(mysqli_real_escape_string($conn, $questionData['questionFinale']));
                        $reponses = array_map('validate', $questionData['reponsesFinale']);
                        $correct = validate(mysqli_real_escape_string($conn, $questionData['correctFinale']));

                        // Insertar pregunta en la tabla examen final
                        $queryExamen = "INSERT INTO examefinale (question, reponse_1, reponse_2, reponse_3, reponse_correcte, coursId) VALUES ('$question', '$reponses[0]', '$reponses[1]', '$reponses[2]','$correct', '$coursId')";
                        $resultExamen = mysqli_query($conn, $queryExamen);

                        if (!$resultExamen) {
                            echo "Error al insertar la pregunta del examen final en la base de datos.";
                        }
                    }

                    // Redirigir a una página de éxito o mostrar un mensaje de éxito
                    header("Location: cours.php?cr=cr");
                    exit;
                } else {
                    echo "Error al insertar el curso en la base de datos.";
                }
            } else {
                echo "Error al subir la imagen del curso.";
            }
        } else {
            echo "Error: ID de profesor no definido en la sesión.";
        }
    } else {
        echo "Error: método de solicitud incorrecto.";
    }
} else {
    header("Location: index.php");
    exit();
}
