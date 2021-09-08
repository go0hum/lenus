<?php 
include_once 'core/config.php';
include_once 'core/validate-session.php';
include_once 'models/usuario.php';
$Usuario = $_SESSION['User']['Name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
</head>
<body>
    
<div class="container">
  <div class="row">
    <div class="col">
        <h1>Bienvenido <?=$Usuario;?></h1>
        <!-- Code of bootstrap -->
        <a href="change-password.php">Cambiar password</a> - 
        <a href="signout.php">Salir</a>
    </div>
  </div>
</div>

<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>