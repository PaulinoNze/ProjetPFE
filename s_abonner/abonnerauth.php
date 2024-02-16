<?php
    include("../database.php");
    if(isset($_POST['submit'])) {
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword) {
            header("Location: inscritp.php?errorpass=Passwords do not match");
            exit();
        }
        $sql_check_email = "SELECT * FROM utilisateurs WHERE email = '$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);
        if(mysqli_num_rows($result_check_email) > 0) {
            header("Location: inscritp.php?error=Email already exists");
            exit();
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql_insert_user = "INSERT INTO utilisateurs(nom, prenom, email, password) VALUES ('$nom','$prenom','$email','$hash')";
        if(mysqli_query($conn, $sql_insert_user)) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    } 
?>