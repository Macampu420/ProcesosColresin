<?php

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

var_dump($datos);

?>