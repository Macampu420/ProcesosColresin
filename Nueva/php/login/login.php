<?php

require_once "../conexion/conexion.php";

$conex 		= new conection();
$conection 	= $conex->conex();

$login = $_POST['nombre'];
$password = md5($_POST['password']);
$q = "SELECT * FROM Usuarios WHERE Nombre = '" . $login . "' AND Contrasena = '" . $password . "'";
$query = mysqli_query($conection,$q);

$row = $query->fetch_assoc();

// Agrega datos a las variables de configuración
$numrows = mysqli_num_rows($query);
if($numrows > 0){
/* Redirect browser */
    session_start();
    
    $_SESSION['login'] 	= $login;
    $_SESSION['rol'] 	= $row['Rol'];
    $_SESSION['cedula'] = $row['Cedula'];
    
    header("Location: ../inicio/index.php");
    
    } else {
        
    header("Location: ../../login.html");
}
	 

?>