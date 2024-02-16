<?php
    include("../database.php");
    if(isset($_POST['submit'])){
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
    }
    $sql1 = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $result = mysqli_query($conn, $sql1);
    $count_email = mysqli_num_rows($result);
    if($count_email == 0){
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql2 = "INSERT INTO utilisateurs(nom, prenom, email, password) VALUES ('$nom','$prenom','$email','$hash')";
        try{
            mysqli_query($conn, $sql2);
            header("Location: ../dashboard.php");
        }catch(mysqli_sql_exception){
            echo "Could not register user";
        }
        }else{
            header("Location: inscritp.php?errorpass=Passwords do not match");
        }
    }else{
        echo '<script> 
            window.location.href = "inscritp.php";
            alert("Email already exits")
            </script>';
    }
    
?>