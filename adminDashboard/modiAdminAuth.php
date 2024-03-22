<?php
session_start();
include "../database.php";
if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $adminId = $_POST['adminId'];
    if(!empty($password)){
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE admin SET nom='$nom', prenom='$prenom', email='$email',password='$hash',telephone='$telephone', image='$imgData' WHERE adminId = $adminId";
            try{
                mysqli_query($conn, $sql);
                header("Location: adminInfo.php");
                exit();
            }catch(Exception $e){
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }else{
            $sql = "UPDATE admin SET nom='$nom', prenom='$prenom', email='$email',password='$hash',telephone='$telephone'WHERE adminId = $adminId";
            try{
                mysqli_query($conn, $sql);
                header("Location: adminInfo.php");
                exit();
            }catch(Exception $e){
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }
    }else{
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE admin SET email='$email',telephone='$telephone', image = '$imgData' WHERE adminId = $adminId";
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
}
?>