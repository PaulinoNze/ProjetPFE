<?php
session_start();
include "../database.php";
if (isset($_GET['coursId']) && isset($_GET['etudId'])) {
    $coursId = $_GET['coursId'];
    $etudId = $_GET['etudId'];
    $sql = "INSERT INTO coursinscrit(coursId, etudId) VALUES ('$coursId', '$etudId')";
    if(mysqli_query($conn, $sql)) {
        header("Location: suivreCours.php?coursId=" . $coursId . "&etudId=" . $etudId);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
