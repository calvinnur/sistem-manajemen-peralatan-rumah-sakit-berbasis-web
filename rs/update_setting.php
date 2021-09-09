<?php 
require_once('library.php');
$call = new manajemen;

echo $call->update_setting();
header("location: dashboard.php?page=pengaturan");


?>