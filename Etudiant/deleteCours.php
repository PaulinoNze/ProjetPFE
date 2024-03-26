<?php
include "../database.php";
if(isset($_POST['coursId']) && isset($_POST['userid'])) {
    $coursId = $_POST['coursId'];
    $userid = $_POST['userid'];
    $sql = "DELETE FROM `coursinscrit` WHERE coursId = '$coursId' AND etudId = '$userid'";
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>