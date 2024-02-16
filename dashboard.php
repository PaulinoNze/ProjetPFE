<?php
    session_start();
    if(isset($_SESSION['userid']) && $_SESSION['nom']){
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['nom']; ?></h1>
    <a href="PHP/">Logout</a>
</body>
</html>
<?php
    }else{
        header("Location: index.php");
        exit();
    }
?>