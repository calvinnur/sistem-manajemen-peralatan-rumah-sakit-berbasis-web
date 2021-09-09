<?php 
require_once('library.php');
$call = new manajemen;
header("Content-type:application/json");
echo json_encode($call->data_peralatan());
?>