<?php 
require_once("library.php");
$call = new manajemen;

$id = $_GET['id'];

if($call->peralatan_delete($id) > 0){
    echo "<script>
    alert('data berhasil dihapus');
    window.location='peralatan.php';
    </script>";
    exit;
}


?>