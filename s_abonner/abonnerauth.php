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
                // Set session variables
                $_SESSION['user_type'] = $userType;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $_SESSION['telephone'] = $telephone;
                // Redirect to appropriate page
                header("Location: ../prof.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        } elseif($userType === 'Professeur'){
            $sqlProf = "INSERT INTO professeur(nom, prenom, email, password, telephone, cours, gender, date_naissance,cin) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$designation', '$genre', '$dateNaissance', '$CIN')";
            if(mysqli_query($conn, $sqlProf)) {
                // Set session variables
                $_SESSION['user_type'] = $userType;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $_SESSION['telephone'] = $telephone;
                // Redirect to appropriate page
                header("Location: ../prof.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        } elseif($userType === 'Administration'){
            $sqlAdmin = "INSERT INTO admin(nom, prenom, email, password, telephone, designation, gender, dateNaissance, cin) VALUES ('$nom', '$prenom', '$email', '$hash', '$telephone', '$designation', '$genre', '$dateNaissance', '$CIN')";
            if(mysqli_query($conn, $sqlAdmin)) {
                // Set session variables
                $_SESSION['user_type'] = $userType;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $_SESSION['telephone'] = $telephone;
                // Redirect to appropriate page
                header("Location: ../adminDashboard/adminDashboard.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }
    }
?>
