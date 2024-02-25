<?php
include "../database.php";
if(isset($_POST['etudId'])) {
    $etudId = $_POST['etudId'];
    $sql = "UPDATE etudiant SET statut = 1 WHERE etudId = $etudId";
    if(mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}

if(isset($_POST['formationID'])) {
    $formationID = $_POST['formationID'];
    $sql = "UPDATE formation SET statut = 'Actif' WHERE formationID = $formationID";
    if(mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}

if(isset($_POST['coursId'])) {
    $coursId = $_POST['coursId'];
    $sql = "UPDATE cours SET statut = 'Actif' WHERE coursId = $coursId";
    if(mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>