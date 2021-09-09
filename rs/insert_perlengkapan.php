<?php 
require_once('library.php');
$call = new manajemen;

if($call->required_peralatan()['status'] == false){
    echo "<script>
    alert('mohon isi field ".$call->required_peralatan()['field']."');
    window.location='perlengkapan.php';
    </script>";
    exit;
}

if($call->numeric_check() == false){
    echo "<script>
    alert('mohon isi field stok dengan angka');
    window.location='perlengkapan.php';
    </script>";
    exit;
}
$call->perlengkapan_insert();
header("location: perlengkapan.php");

?>