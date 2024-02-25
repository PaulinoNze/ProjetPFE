<?php
include('config.php');
$coursId     = $_REQUEST['coursId'];
$nomCours          = $_REQUEST['nomCours'];
$description    = $_REQUEST['description'];


if(!empty($_FILES['image']['name'])){
$foto           = $_FILES['image']['name'];
$fotoTmp        = $_FILES['image']['tmp_name'];

date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
$nuewNameFoto   = date('h_i_s_a', time());


$explode        = explode('.', $foto);
$extension_arch = array_pop($explode);
$namelogoevento = $nuewNameFoto.'.'.$extension_arch;

$rutaBannerBD   = "FotosCursos/".$namelogoevento;
$dir            = opendir('FotosCursos/');

if(move_uploaded_file($fotoTmp, $rutaBannerBD)){
    $UpdateCurso = ("UPDATE cours SET nomCours='$nomCours', description='$description', image='$rutaBannerBD'  WHERE coursId ='".$coursId."' ");
    $resultadoCurso = mysqli_query($conn, $UpdateCurso);
    }
closedir($dir);

}else{
$UpdateCursos    = ("UPDATE cours SET nomCours='$nomCours', description='$description' WHERE coursId ='".$coursId."' ");
$resultadoCurso = mysqli_query($conn, $UpdateCursos);
}

header("Location:cours.php?dia=dia");
?>