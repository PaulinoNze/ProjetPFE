<?php
session_start();
include "../database.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $adminId = $_POST['adminId'];
    if(!empty($password)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET email='$email',password='$hash',telephone='$telephone'WHERE adminId = $adminId";
        try{
            mysqli_query($conn, $sql);
            header("Location: adminInfo.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }else{
        $sql = "UPDATE admin SET email='$email',telephone='$telephone'WHERE adminId = $adminId";
        try{
            mysqli_query($conn, $sql);
            header("Location: adminInfo.php");
            exit();
        }catch(Exception $e){
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
?>