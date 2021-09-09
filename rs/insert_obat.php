<?php  
require_once('library.php');
$call = new manajemen;

if($call->required_peralatan()['status'] == false){
    echo "<script>
    alert('mohon isi field ".$call->required_peralatan()['field']."');
    window.location='obat.php';
    </script>";
    exit;
}

if($call->numeric_check() == false){
    echo "<script>
    alert('mohon isi field stok dengan angka');
    window.location='obat.php';
    </script>";
    exit;
}

$call->obat_insert();
header("location: obat.php");

?>