<?php   

session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../inicio/session.html");
	exit();
	
}

require_once "../conexion/conexion.php";
require_once "acciones.php";

$conex = new conection();
$result = $conex->conex();
date_default_timezone_set('America/Bogota');

$id     = $_POST['id'];