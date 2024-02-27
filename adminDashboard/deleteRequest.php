<?php
include "../database.php";
if(isset($_POST['etudId'])) {
    $etudId = $_POST['etudId'];
    $sql = "DELETE FROM etudiant WHERE etudId = $etudId";
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if(isset($_POST['formationID'])) {
    $formationID = $_POST['formationID'];
    $sql = "DELETE FROM `formation` WHERE formationID = '$formationID'";
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if(isset($_POST['profId'])) {
    $profId = $_POST['profId'];
    $sql = "DELETE FROM `professeur` WHERE profId = '$profId'";
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if(isset($_POST['coursId'])) {
    $coursId = $_POST['coursId'];
    $sql = "DELETE FROM `cours` WHERE coursId = '$coursId'";
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>