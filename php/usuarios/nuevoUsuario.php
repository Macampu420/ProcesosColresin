<?php

session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../inicio/session.html");
	exit();
	
}

require_once "../conexion/conexion.php";

$conex = new conection();
$result = $conex->conex();
date_default_timezone_set('America/Bogota');

$nombre	    =	$_POST['nombre'];
$apellido	=	$_POST['apellido'];
$cedula	    =	$_POST['cedula'];
$correo 	=	$_POST['correo'];
$contrasena =	md5($_POST['contrasena']);
$estado 	=	$_POST['estado'];
$rol 	    =	$_POST['rol'];


// Agrega nuevos usuarios según el formulario recibido
$query = mysqli_query($result,"INSERT INTO Usuarios (Nombre, Apellido, Cedula, CorreoElectronico, Contrasena, Estado, Rol) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$contrasena', '$estado', '$rol');");

//Según la respuesta de la inserción se da una respuesta en un alert 
if($query > 0){
    $msg = "El usuario " . $nombre . " fue agregado";
}else{
    $msg = 'Error al agregar el usuario. Intente nuevamente';
}
    
$html = "<script>
    window.alert('$msg');
    self.location='usuarios.php';
	opener.location.reload();
</script>";
	
echo $html;	