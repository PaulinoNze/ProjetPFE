<?php
include "../database.php";
if(isset($_POST['etudId'])) {
    $etudId = $_POST['etudId'];
    
    // SQL to delete a record
    $sql = "DELETE FROM etudiant WHERE etudId = $etudId";
    
    if(mysqli_query($conn, $sql)) {
        // Deletion successful
        echo "Record deleted successfully";
    } else {
        // Error in deletion
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>