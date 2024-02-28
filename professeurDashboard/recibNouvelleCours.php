<?php
    session_start();
    include "../database.php";
    if(isset($_SESSION['profId']) || $_SESSION['nom'] || $_SESSION['email']){
        
?>

<?php
session_start();
include "../database.php";

if(isset($_SESSION['profId']) && isset($_SESSION['nom']) && isset($_SESSION['email'])){
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si la variable de sesión profId está definida y no está vacía
        if (isset($_SESSION['profId']) && !empty($_SESSION['profId'])) {
            $profId = $_SESSION['profId']; // Obtener el ID del profesor de la sesión
            $nomCours = $_POST['nomCours'];
            $description = $_POST['description'];
            $datePublish = $_POST['datePublish']; // Recibo la fecha de publicación
            $foto = $_FILES['image']['name'];
            $fotoTmp = $_FILES['image']['tmp_name'];
            $video = $_FILES['video']['name']; // Nuevo campo para el video
            $videoTmp = $_FILES['video']['tmp_name'];
            $pdf = $_FILES['pdf']['name']; // Nuevo campo para el PDF
            $pdfTmp = $_FILES['pdf']['tmp_name'];
            $formationID = $_POST['formation']; // Obtener el ID de la formación seleccionada

            date_default_timezone_set("America/Bogota");
            setlocale(LC_ALL, "es_ES");
            $nuewNameFoto = date('h_i_s_a', time());

            $explode = explode('.', $foto);
            $extension_arch = array_pop($explode);
            $namelogoevento = $nuewNameFoto . '.' . $extension_arch;

            $rutaBannerBD = "FotosCursos/" . $namelogoevento;

            if (move_uploaded_file($fotoTmp, $rutaBannerBD)) {
                // Carpeta donde se guardarán los videos
                $rutaVideo = "video/";
                $rutaVideoBD = $rutaVideo . $_FILES['video']['name'];

                if (move_uploaded_file($videoTmp, $rutaVideoBD)) {
                    // Carpeta donde se guardarán los PDF
                    $rutaPDF = "pdf/";
                    $rutaPDFBD = $rutaPDF . $_FILES['pdf']['name'];

                    if (move_uploaded_file($pdfTmp, $rutaPDFBD)) {
                        // Incluir la fecha de publicación en la consulta SQL
                        $query = "INSERT INTO cours (nomCours, description, image, video, pdf, datePublish, profId, formationID) VALUES ('$nomCours', '$description', '$rutaBannerBD', '$rutaVideoBD', '$rutaPDFBD', '$datePublish', '$profId', '$formationID')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            header("Location: cours.php?cr=cr");
                            exit;
                        } else {
                            echo "Error al registrar el curso. Por favor, inténtalo de nuevo.";
                        }
                    } else {
                        echo "Error al subir el PDF. Por favor, verifica que el archivo sea válido.";
                    }
                } else {
                    echo "Error al subir el video. Por favor, verifica que el archivo sea válido.";
                }
            } else {
                echo "Error al subir la imagen. Por favor, verifica que el archivo sea una imagen válida.";
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
?>
<?php
    }else{
        header("Location: index.php");
        exit();
    }
?>