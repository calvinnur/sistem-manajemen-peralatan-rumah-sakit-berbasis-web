<?php 
require_once('library.php');
if(isset($_SESSION['username'])){
    header('location:dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?<?php echo time() ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="shortcut icon" href="img/logo0.png">
    <title>Login Aplikasi Manajemen Gudang</title>
</head>

<body style="background-color: #9df5f2;">
    <form method="POST" action="proses_login.php">
        <div class="form-login">
            <h3>Login</h3>
            <label>Username</label><br>
            <input type="text" name="username" placeholder="Username"><br>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="password"><br>
            <button type="submit">Login</button>
        </div>
    </form>

</body>

</html>