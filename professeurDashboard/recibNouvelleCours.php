<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto = $_FILES['image']['name'];
    $fotoTmp = $_FILES['image']['tmp_name'];
    $nomCours = $_POST['nomCours'];
    $description = $_POST['description'];

    date_default_timezone_set("America/Bogota");
    setlocale(LC_ALL, "es_ES");
    $nuewNameFoto = date('h_i_s_a', time());

    $explode = explode('.', $foto);
    $extension_arch = array_pop($explode);
    $namelogoevento = $nuewNameFoto . '.' . $extension_arch;

    $rutaBannerBD = "FotosCursos/" . $namelogoevento;

    if (move_uploaded_file($fotoTmp, $rutaBannerBD)) {
        $query = "INSERT INTO cours (nomCours, description, image) VALUES ('$nomCours', '$description', '$rutaBannerBD')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: cours.php?cr=cr");
            exit;
        } else {
            echo "Error al registrar el curso. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Error al subir la imagen. Por favor, verifica que el archivo sea una imagen válida.";
    }
} else {
    echo "Error: Método de solicitud incorrecto.";
}
?>
