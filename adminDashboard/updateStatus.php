<?php
include "../database.php";
if(isset($_POST['etudId'])) {
    $etudId = $_POST['etudId'];
    
    // SQL to update the status
    $sql = "UPDATE etudiant SET statut = 1 WHERE etudId = $etudId";
    
    if(mysqli_query($conn, $sql)) {
        // Update successful
        echo "Status updated successfully";
    } else {
        // Error in update
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>