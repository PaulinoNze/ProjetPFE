<?php
    session_start();

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include("../database.php");

    if(isset($_POST['submit'])) {
        $nom = validate(mysqli_real_escape_string($conn, $_POST['nom']));
        $prenom = validate(mysqli_real_escape_string($conn, $_POST['prenom']));
        $email = validate(mysqli_real_escape_string($conn, $_POST['email']));
        $telephone = validate(mysqli_real_escape_string($conn, $_POST['telephone']));
        $password = validate(mysqli_real_escape_string($conn, $_POST['password']));
        $dateNaissance = validate($_POST['dateNaissance']);
        $adresse = validate(mysqli_real_escape_string($conn, $_POST['adresse']));
        $genre = validate($_POST['inlineRadioOptions']);
        $userType = validate($_POST['exampleRadios']);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $statut = 0;
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            if($userType === 'Administration'){
                $sqlAdmin = "INSERT INTO `admin`(nom,prenom, email,password, telephone, gender, dateNaissance, adresse, image) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$genre', '$dateNaissance', '$adresse', '$imgData')";
                if(mysqli_query($conn, $sqlAdmin)) {
                    header("Location: ../login/login.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                    exit();
                }
            }
            elseif($userType === 'Etudiant'){
                $sqlEtud = "INSERT INTO `etudiant`(nom, prenom, email, password, telephone, gender, date_naissance, adresse, image, statut) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$genre', '$dateNaissance', '$adresse', '$imgData', '$statut')";
                if(mysqli_query($conn, $sqlEtud)) {
                    header("Location: redirect.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                    exit();
                }
            } elseif($userType === 'Professeur'){
                $sqlProf = "INSERT INTO professeur(nom, prenom, email, password, telephone, gender, date_naissance, adresse, image, statut) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$genre', '$dateNaissance', '$adresse', '$imgData', '$statut')";
                if(mysqli_query($conn, $sqlProf)) {
                    header("Location: redirect.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                    exit();
                }
            } 
        }
        
        
    }
?>
