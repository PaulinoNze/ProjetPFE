<?php
session_start();
include "../database.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email) || empty($password)){
        header("Location: login.php?error=Email and password are required");
        exit();
    }
    try{
        $sqlAdmin = "SELECT * FROM admin WHERE email = ?";
        $stmtAdmin = mysqli_prepare($conn, $sqlAdmin);
        mysqli_stmt_bind_param($stmtAdmin, "s", $email);
        mysqli_stmt_execute($stmtAdmin);
        $resultAdmin = mysqli_stmt_get_result($stmtAdmin);

        $sqlEtud = "SELECT * FROM etudiant WHERE email = ?";
        $stmtEtud = mysqli_prepare($conn, $sqlEtud);
        mysqli_stmt_bind_param($stmtEtud, "s", $email);
        mysqli_stmt_execute($stmtEtud);
        $resultEtud = mysqli_stmt_get_result($stmtEtud);

        $sqlProf = "SELECT * FROM professeur WHERE email = ?";
        $stmtProf = mysqli_prepare($conn, $sqlProf);
        mysqli_stmt_bind_param($stmtProf, "s", $email);
        mysqli_stmt_execute($stmtProf);
        $resultProf = mysqli_stmt_get_result($stmtProf);

        if(mysqli_num_rows($resultAdmin) > 0){
            $row = mysqli_fetch_array($resultAdmin);
            if(password_verify($password, $row['password'])){
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                header("Location: ../adminDashboard/adminDashboard.php");
                exit();
            }else {
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        }elseif(mysqli_num_rows($resultEtud) > 0){
            $row = mysqli_fetch_array($resultEtud);
            if(password_verify($password, $row['password'])){
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                header("Location: ../prof.php");
                exit();
            }else {
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        }elseif((mysqli_num_rows($resultProf) > 0)){
            $row = mysqli_fetch_array($resultProf);
            if(password_verify($password, $row['password'])){
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                header("Location: ../prof.php");
                exit();
            }else {
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        }else {
            throw new Exception("Email does not exist");
        }
    }catch (Exception $e) {
        header("Location: login.php?error=" . "L'utilisateur n'existe pas");
        exit();
    }
}else {
    header("Location: ../index.php");
    exit();
}
?>
