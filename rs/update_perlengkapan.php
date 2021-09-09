<?php 
require_once('library.php');
$call = new manajemen;

echo $call->barang_update();
header("location: perlengkapan.php?page=1");
?>