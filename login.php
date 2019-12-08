<?php
require 'function.php';

if(isset($_POST['btn-login'])){

    $username = $_POST['username'];
    $password = $_POST['pswd'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    // die;
    // var_dump($result);
    // die;
    if(mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);
            if($password == $row['passUser']){
                header('Location: index.php');
                exit;
            }

    }
    echo ' <script>
    alert("username atau password yang anda masukan salah");
    document.location.href="login.php";
    </script>';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="img/logo2.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="asset/css/simple-sidebar.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Login</title>
    
</head>

<body>

<div class="login-box">
    <form class="login-form" method="post">
    <div class="h1-login">Welcome</div> 
    <input type="text" class="txtb" name="username" placeholder="Username" id="username" autocomplete="off">
    <input type="password" class="txtb" name="pswd" placeholder="Password" id="pswd">
    <input class="btn-login" type="submit" value="Login" name="btn-login">
    </form>

</div>

</body>

</html>
