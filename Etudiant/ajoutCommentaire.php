<?php
include "../database.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = validate(mysqli_real_escape_string($conn, $_POST['nom']));
$email = validate(mysqli_real_escape_string($conn, $_POST['email']));
$commentaire = validate(mysqli_real_escape_string($conn, $_POST['commentaire']));
$forumID = $_POST['forumID'];

$sql = "INSERT INTO commentaire (commentaire, nom, email, forumID) VALUES ('$commentaire', '$nom', '$email', '$forumID')";

if(mysqli_query($conn, $sql)) {
    header ("Location: forumInfo.php?id=$forumID");
    exit();
} else {
    // Redirect to error page
    header("Location: ../error.php");
    exit();
}
?>
