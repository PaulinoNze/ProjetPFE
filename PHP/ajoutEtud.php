<?php
    include "../database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $prenom = validate(mysqli_real_escape_string($conn, $_POST['prenom']));
    $email = validate(mysqli_real_escape_string($conn, $_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = validate($_POST['gender']);
    $dateNaissance = validate($_POST['dateNaissance']);
    $statut = validate($_POST['statut']);
    $nom = validate(mysqli_real_escape_string($conn, $_POST['nom']));;
    $telephone = validate(mysqli_real_escape_string($conn, $_POST['telephone']));
    $adresse = validate(mysqli_real_escape_string($conn, $_POST['adresse']));
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "INSERT INTO etudiant(nom, prenom, email, password, telephone, gender, date_naissance, adresse, image, statut) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$gender', '$dateNaissance', '$adresse', '$imgData', '$statut')";
        } else {
            // Update query without image data
            $sql = "INSERT INTO etudiant(nom, prenom, email, password, telephone, gender, date_naissance, adresse, statut) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$gender', '$dateNaissance', '$adresse', '$statut')";
        }
        
        // Perform update query
        if(mysqli_query($conn, $sql)) {
            // Redirect to another page to display edited information
            header("Location: ../adminDashboard/tousEtudiants.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
?>