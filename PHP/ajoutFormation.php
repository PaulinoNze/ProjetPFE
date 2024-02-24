<?php
    include "../database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nomFormation = validate(mysqli_real_escape_string($conn, $_POST['nomFormation']));
    $description = validate(mysqli_real_escape_string($conn, $_POST['description']));
    $statut = validate($_POST['statut']);
    $datePublish = validate($_POST['datePublish']);
    $autheur = validate(mysqli_real_escape_string($conn, $_POST['autheur']));
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "INSERT INTO formation(titre, description, datePublish, autheur, image, statut) VALUES ('$nomFormation', '$description', '$datePublish', '$autheur', '$imgData','$statut')";
        } else {
            // Update query without image data
            $sql = "INSERT INTO formation(titre, description, datePublish, autheur, statut) VALUES ('$nomFormation', '$description', '$datePublish', '$autheur', '$statut')";
        }
        
        // Perform update query
        if(mysqli_query($conn, $sql)) {
            // Redirect to another page to display edited information
            header("Location: ../adminDashboard/approveformation.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
?>