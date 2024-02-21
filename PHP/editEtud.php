<?php
session_start();
include "../database.php";

    if(isset($_POST['submit'])){
        if(isset($_GET['id'])){
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $filiere = $_POST['filiere'];
        $gender = $_POST['gender'];
        $dateNaissance = $_POST['dateNaissance'];
        $salle = $_POST['salle'];
        $nom = $_POST['nom'];
        $telephone = $_POST['telephone'];
        $cin = $_POST['cin'];
        

        if(isset($_FILES['image'])){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin', image='$imgData' WHERE etudId=$userId";
        } else {
            // Update query without image data
            $sqlUpdate = "UPDATE etudiant SET prenom='$prenom', email='$email', password='$password', filiere='$filiere', gender='$gender', date_naissance='$dateNaissance', salle='$salle', nom='$nom', telephone='$telephone', cin='$cin' WHERE etudId=$userId";
        }
        
        // Perform update query
        if(mysqli_query($conn, $sqlUpdate)) {
            // Redirect to another page to display edited information
            header("Location: etudiantInfo.php?id=$userId");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ID de l'utilisateur non spécifié.";
    }
    }
?>
