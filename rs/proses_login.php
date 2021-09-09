<?php 
require_once('library.php');
$call = new manajemen;

if($call->required_login()['status'] == false){
    echo "<script>
    alert('mohon isi field ".$call->required_login()['field']."');
    window.location = 'index.php'; 
    </script>";
    exit;
}

if($call->check_user() == false){
    echo "<script>
    alert('username tidak pernah ada');
    window.location = 'index.php'; 
    </script>";
    exit;
}

if($call->pass_check() == false){
    echo "<script>
    alert('password tidak sama');
    window.location = 'index.php'; 
    </script>";
    exit;
}

if($call->pass_check() == true){
    echo "<script>
    alert('selamat datang ".$_POST['username']."');
    window.location = 'dashboard.php?page=home'; 
    </script>";
    exit;
}



?>