<?php
$password = "admin";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>