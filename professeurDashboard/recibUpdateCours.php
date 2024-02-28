<?php
    session_start();
    include "../database.php";
    if(isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']){
        
?>

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

    if (!empty($_FILES['video']['name'])) {
        // Procesar el video
    }

    if (!empty($_FILES['pdf']['name'])) {
        // Procesar el PDF
    }

    // Actualizar la base de datos
    $UpdateCursos = "UPDATE cours SET nomCours='$nomCours', description='$description', datePublish='$datePublish'";

    if (!empty($rutaBannerBD)) {
        $UpdateCursos .= ", image='$rutaBannerBD'";
    }

    if (!empty($rutaVideoBD)) {
        $UpdateCursos .= ", video='$rutaVideoBD'";
    }

    if (!empty($rutaPDFBD)) {
        $UpdateCursos .= ", pdf='$rutaPDFBD'";
    }

    // Agregar el ID de la formación a la consulta de actualización
    $UpdateCursos .= ", formationID='$formationID'";

    $UpdateCursos .= " WHERE coursId ='$coursId'";

    $resultadoCurso = mysqli_query($conn, $UpdateCursos);

    if ($resultadoCurso) {
        header("Location: cours.php?dia=dia");
        exit;
    } else {
        echo "Error al actualizar el curso. Por favor, inténtalo de nuevo.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>


<?php
    }else{
        header("Location: index.php");
        exit();
    }
?>