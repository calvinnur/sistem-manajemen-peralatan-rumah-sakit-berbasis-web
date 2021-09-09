<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?<?php echo time()?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="shortcut icon" href="img/logo0.png">
    <title>Selamat Datang Di Sistem Manajemen Gudang</title>
</head>
<body style="background-color:#f0f2f0 ;">
    <div class="navbar">
        <img src="img/logo0.png">
        <h2>Aplikasi Manajemen</h2>
        <p>System Manajemen Gudang Berbasis Web</p>

        <ul>
            <li><i class="fas fa-sign-out-alt" style="position:relative; left:-5px;"></i><a href="logout.php">Logout</a></li>
            <li><i class="fas fa-cog" style="position:relative; left:-5px;"></i><a href="dashboard.php?page=pengaturan">Pengaturan</a></li>
            <li><i class="fas fa-home" style="position:relative; left:-5px;"></i><a href="dashboard.php?page=home">Home</a> </li>
        </ul>
    </div>