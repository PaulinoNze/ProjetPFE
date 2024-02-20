<?php
session_start();
include("../database.php");
if(isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        echo json_encode(['error' => 'Invalid email format']);
        exit();
    }

    $sqlAdmin = "SELECT COUNT(*) AS count FROM admin WHERE email = ?";
    $stmtAdmin = mysqli_prepare($conn, $sqlAdmin);
    mysqli_stmt_bind_param($stmtAdmin, "s", $email);
    mysqli_stmt_execute($stmtAdmin);
    $resultAdmin = mysqli_stmt_get_result($stmtAdmin);
    $rowAdmin = mysqli_fetch_assoc($resultAdmin);
    $countAdmin = $rowAdmin['count'];

    $sqlEtud = "SELECT COUNT(*) AS count FROM etudiant WHERE email = ?";
    $stmtEtud = mysqli_prepare($conn, $sqlEtud);
    mysqli_stmt_bind_param($stmtEtud, "s", $email);
    mysqli_stmt_execute($stmtEtud);
    $resultEtud = mysqli_stmt_get_result($stmtEtud);
    $rowEtud = mysqli_fetch_assoc($resultEtud);
    $countEtud = $rowEtud['count'];

    $sqlProf = "SELECT COUNT(*) AS count FROM professeur WHERE email = ?";
    $stmtProf = mysqli_prepare($conn, $sqlProf);
    mysqli_stmt_bind_param($stmtProf, "s", $email);
    mysqli_stmt_execute($stmtProf);
    $resultProf = mysqli_stmt_get_result($stmtProf);
    $rowProf = mysqli_fetch_assoc($resultProf);
    $countProf = $rowProf['count'];
    echo json_encode(['exists' => ($countAdmin || $countEtud || $countProf)]);
} else {
    echo json_encode(['error' => 'Email parameter is missing']);
}
?>
