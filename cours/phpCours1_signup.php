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
        // Validate and sanitize input data
        $nom = validate(mysqli_real_escape_string($conn, $_POST['nom']));
        $prenom = validate(mysqli_real_escape_string($conn, $_POST['prenom']));
        $email = validate(mysqli_real_escape_string($conn, $_POST['email']));
        $telephone = validate(mysqli_real_escape_string($conn, $_POST['telephone']));
        $password = validate(mysqli_real_escape_string($conn, $_POST['password']));
        $dateNaissance = validate($_POST['dateNaissance']);
        $CIN = validate(mysqli_real_escape_string($conn, $_POST['CIN']));
        $genre = validate($_POST['inlineRadioOptions']);
        $userType = validate($_POST['exampleRadios']);
        
        if ($userType === 'Etudiant') {
            $selectedOption = validate($_POST['cours']);
        } elseif ($userType === 'Professeur' || $userType === 'Administration') {
            $designation = validate($_POST['designation']);
        }

        // Hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        if($userType === 'Etudiant'){
            $sqlEtud = "INSERT INTO etudiant(nom, prenom, email, password, telephone, filiere, gender, date_naissance, cin) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$selectedOption', '$genre', '$dateNaissance', '$CIN')";
            if(mysqli_query($conn, $sqlEtud)) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['telephone'] = isset($row['telephone']) ? $row['telephone'] : '';
                $_SESSION['filiere'] = isset($row['filiere']) ? $row['filiere'] : '';
                $_SESSION['gender'] = isset($row['gender']) ? $row['gender'] : '';
                $_SESSION['dateNaissance'] = isset($row['dateNaissance']) ? $row['dateNaissance'] : '';
                $_SESSION['cin'] = isset($row['cin']) ? $row['cin'] : '';
                $_SESSION['adresse'] = isset($row['adresse']) ? $row['adresse'] : '';
                $_SESSION['image'] = isset($row['image']) ? $row['image'] : '';
                $_SESSION['cour_inscrits'] = isset($row['cour_inscrits']) ? $row['cour_inscrits'] : '';
                $_SESSION['notes_obtenues'] = isset($row['notes_obtenues']) ? $row['notes_obtenues'] : '';
                header("Location: cours/cours_contenue1/contenuCours.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        } elseif($userType === 'Professeur'){
            $sqlProf = "INSERT INTO professeur(nom, prenom, email, password, telephone, cours, gender, date_naissance,cin) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$designation', '$genre', '$dateNaissance', '$CIN')";
            if(mysqli_query($conn, $sqlProf)) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = isset($row['prenom']) ? $row['prenom'] : '';
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['cours'] = isset($row['cours']) ? $row['cours'] : '';
                $_SESSION['designation'] = isset($row['designation']) ? $row['designation'] : '';
                $_SESSION['gender'] = isset($row['gender']) ? $row['gender'] : '';
                $_SESSION['dateNaissance'] = isset($row['dateNaissance']) ? $row['dateNaissance'] : '';
                $_SESSION['cin'] = isset($row['cin']) ? $row['cin'] : '';
                $_SESSION['adresse'] = isset($row['adresse']) ? $row['adresse'] : '';
                $_SESSION['image'] = isset($row['image']) ? $row['image'] : '';
                $_SESSION['salle'] = isset($row['salle']) ? $row['salle'] : '';
                header("Location: cours/cours_contenue1/contenuCours.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        } elseif($userType === 'Administration'){
            $sqlAdmin = "INSERT INTO admin(nom, prenom, email, password, telephone, designation, gender, dateNaissance, cin) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$designation', '$genre', '$dateNaissance', '$CIN')";
            if(mysqli_query($conn, $sqlAdmin)) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['telephone'] = isset($row['telephone']) ? $row['telephone'] : '';
                $_SESSION['designation'] = isset($row['designation']) ? $row['designation'] : '';
                $_SESSION['gender'] = isset($row['gender']) ? $row['gender'] : '';
                $_SESSION['dateNaissance'] = isset($row['dateNaissance']) ? $row['dateNaissance'] : '';
                $_SESSION['cin'] = isset($row['cin']) ? $row['cin'] : '';
                $_SESSION['adresse'] = isset($row['adresse']) ? $row['adresse'] : '';
                $_SESSION['image'] = isset($row['image']) ? $row['image'] : '';
                header("Location: cours/cours_contenue1/contenuCours.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }
    }
?>
