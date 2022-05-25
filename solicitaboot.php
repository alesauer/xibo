<?php


$ipaddress = getenv("REMOTE_ADDR") ;

$motivo = $_REQUEST['motivo'];
$passw = $_REQUEST['motivo1'];
$datanow = date("Y-m-d H:i:s");
echo "$motivo - $passw - $ipaddress - $datanow";


?>