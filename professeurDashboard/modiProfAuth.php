<?php
session_start();
include "../database.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $profId = $_POST['profId'];
    if(!empty($password)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE professeur SET email='$email',password='$hash',telephone='$telephone'WHERE profId = $profId";
        try{
            mysqli_query($conn, $sql);
            header("Location: professeurInfo.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }else{
        $sql = "UPDATE professeur SET email='$email',telephone='$telephone'WHERE profId = $profId";
        try{
            mysqli_query($conn, $sql);
            header("Location: professeurInfo.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
?>