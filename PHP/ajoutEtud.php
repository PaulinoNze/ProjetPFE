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
    $salle = validate($_POST['salle']);
    $nom = validate(mysqli_real_escape_string($conn, $_POST['nom']));;
    $telephone = validate(mysqli_real_escape_string($conn, $_POST['telephone']));
    $cin = $_POST['cin'];
    $filiere = $_POST['filiere'];
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "INSERT INTO etudiant(nom, prenom, email, password, telephone, filiere, gender, date_naissance, salle, cin, adresse, image) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$filiere', '$gender', '$dateNaissance', '$salle', '$cin', '$adresse', '$imgData')";
        } else {
            // Update query without image data
            $sql = "INSERT INTO etudiant(nom, prenom, email, password, telephone, filiere, gender, date_naissance, salle, cin, adresse) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$filiere', '$gender', '$dateNaissance', '$salle', '$cin', '$adresse')";
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