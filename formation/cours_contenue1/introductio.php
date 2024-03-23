<?php
include "../../database.php";
if (isset($_GET['coursId'])) {
    $coursId = $_GET['coursId'];
    $sql = "SELECT description FROM cours WHERE coursId = $coursId";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    echo '<h2>introduction du cours</h2>';
    echo '<p>' . $data['description'] . '</p>';
} else {
    // No rows returned from the database
    echo "<p>Aucun cours</p>";
}
?>


