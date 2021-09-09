<?php 
require_once('library.php');
$call = new manajemen;

if($call->required_peralatan()['status'] == false){
    echo "<script>
    alert('mohon isi field ".$call->required_peralatan()['field']."');
    window.location='peralatan.php';
    </script>";
    exit;
}

if($call->numeric_check() == false){
    echo "<script>
    alert('mohon isi field stok dengan angka');
    window.location='peralatan.php';
    </script>";
    exit;
}
$call->peralatan_insert();
header("location: peralatan.php");
?>