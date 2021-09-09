<?php 
require_once('library.php');
$call = new manajemen;

echo $call->barang_update();
header("location: obat.php?page=1");

?>