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
        $sql = "SELECT * FROM utilisateurs WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                if($email === "admin@gmail.com" && $password === "admin"){
                    header("Location: ../adminDashboard/adminDashboard.php");
                    exit();
                } else {
                    header("Location: ../dashboard.php");
                    exit();
                }
            }else{
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorrect Email or Password");
            exit();
        }
    }else{
        header("Location: ../index.php");
        exit();
    }
?>
