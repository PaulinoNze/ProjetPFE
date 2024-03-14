<?php
    include "../database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate(mysqli_real_escape_string($conn, $_POST['title']));
    $content = validate(mysqli_real_escape_string($conn, $_POST['content']));
    $description = validate(mysqli_real_escape_string($conn, $_POST['description']));;
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "INSERT INTO forum(title,description, content, image) VALUES ('$title', '$description', '$content', '$imgData')";
        } else {
            // Update query without image data
            $sql = "INSERT INTO forum(title,description, content) VALUES ('$title', '$description', '$content')";
        }
        
        // Perform update query
        if(mysqli_query($conn, $sql)) {
            // Redirect to another page to display edited information
            header("Location: ../adminDashboard/forum.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
?>