<?php
include "../database.php";
if(isset($_POST['formationID'])) {
    $formationID = $_POST['formationID'];
    
    // SQL to update the status
    $sql = "UPDATE formation SET statut = 'Inactif' WHERE formationID = $formationID";
    
    if(mysqli_query($conn, $sql)) {
        // Update successful
        echo "Status updated successfully";
    } else {
        // Error in update
        echo "Error updating status: " . mysqli_error($conn);
    }
}

if(isset($_POST['coursId'])) {
    $coursId = $_POST['coursId'];
    
    // SQL to update the status
    $sql = "UPDATE cours SET statut = 'Inactif' WHERE coursId = $coursId";
    
    if(mysqli_query($conn, $sql)) {
        // Update successful
        echo "Status updated successfully";
    } else {
        // Error in update
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>