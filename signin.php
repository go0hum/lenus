<?php 
include_once 'core/config.php';
include_once 'models/usuario.php';
if ($_POST) {

    $Error = false;

    if (!isset($_POST['Email']) || empty($_POST['Email'])) {
        $Error = "Email is empty";
    }

    if (!isset($_POST['Password']) || empty($_POST['Password'])) {
        $Error = "Password is empty";
    }

    if (!$Error) {
        $Usuario = new Usuario;
        $Usuario->Email = $_POST['Email'];
        $Usuario->Password = $_POST['Password'];
        $User = $Usuario->Login();
        if ($User) {
            if (isset($_SESSION['User'])) {
                unset($_SESSION['User']);
            }

            $_SESSION['User'] = array(
                'Id' => $User['usuarioid'],
                'Name' => $User['nombre']
            );

            header('Location: home.php');
        } else {
            header('Location: signin.php');
        }
    }
}

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
        <h1>Sign in</h1>
        <!-- Code of bootstrap -->
        <?php if ($Error) { ?>
            <div class="alert alert-danger" role="alert">
                <?=$Error;?>
            </div>
        <?php } ?>
        <form class="row g-3 needs-validation" novalidate method="post">
            <div class="col-md-12">
                <label for="validationCustomEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustomEmail" name="Email" required>
                <div class="invalid-feedback">
                    Please add a Email.
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationPassword" name="Password" required>
                <div class="invalid-feedback">
                    Please add your password
                </div>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary" type="submit">Sign in</button> or <a href="register.php">Register</a>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>