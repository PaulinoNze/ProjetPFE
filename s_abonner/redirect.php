<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Created</title>
<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
    }
    
    .container {
        text-align: center;
        position: relative;
        animation: slideUp 0.5s ease forwards;
        opacity: 0;
    }

    .message {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #0056b3;
    }

    .image {
        position: absolute;
        top: -110px; 
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        width: 150px; 
        animation: slideImage 0.5s ease forwards;
        opacity: 0;
    }

    @keyframes slideUp {
        0% {
            opacity: 0;
            transform: translateY(100%);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideImage {
        0% {
            opacity: 0;
            top: 100%;
        }
        100% {
            opacity: 1;
            top: calc(50% - 115px); 
        }
    }
</style>
</head>
<body>
<div class="container">
    <img class="image" src="../Img/logo2.png" alt="Image">
    <br>
    <br>
    <br>
    <div class="message">
    Votre demande d'inscription a été envoyée, vous la recevez et l'envoyez par email lorsqu'elle est approuvée.
    </div>
    <button class="button"><a href="../cours.php" style="text-decoration: none; color: white;">VOIR LES COURS</a></button>
</div>
</body>
</html>
