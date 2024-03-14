<?php
session_start();
include "../database.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $etudId = $_POST['etudId'];
    if(!empty($password)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE etudiant SET email='$email',password='$hash',telephone='$telephone'WHERE etudId = $etudId";
        try{
            mysqli_query($conn, $sql);
            header("Location: monprofil.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }else{
        $sql = "UPDATE etudiant SET email='$email',telephone='$telephone'WHERE etudId = $etudId";
        try{
            mysqli_query($conn, $sql);
            header("Location: monprofil.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
?>