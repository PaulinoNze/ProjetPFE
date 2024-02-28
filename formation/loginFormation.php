<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
<link rel="stylesheet" href="signin.css">
   </head>
  <body class="text-center">

<main class="form-signin">
  <form action="auth.php" method="post">
    <img class="mb-4" src="../Img/logo2.png" alt="" width="300" height="200" style="border-radius: 20px;">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <?php if(isset($_GET['error'])){ ?>
      <p class = "error" style="color: red;"> <?php echo $_GET['error']; ?></p>
    <?php } ?>
    
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    
    
    
    <button class="w-100 btn btn-lg btn-primary" type="submit" href="formation/loginFormation.php?id=<?php echo $dataCours['formationID']; ?>">Sign in</button>
    <?php
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        echo "<input type='text' value = '$userId' name = 'userId' hidden>";
    }
    ?>
  </form>
</main>


  </body>
</html>