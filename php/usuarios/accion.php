<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: ../../login.html");
	exit();
}

require_once "acciones.php";

$action = $_GET["action"];
$id     = $_GET["id"];
$prm['nombre']      = isset($_POST['nombre'])   ?$_POST['nombre']       :'';
$prm['apellido']    = isset($_POST['apellido']) ?$_POST['apellido']     :'';
$prm['cedula']      = isset($_POST['cedula'])   ?$_POST['cedula']       :'';
$prm['correo']      = isset($_POST['correo'])   ?$_POST['correo']       :'';
$prm['contrasena']  = isset($_POST['contrasena'])?$_POST['contrasena']  :'';
$prm['correo']      = isset($_POST['correo'])   ?$_POST['correo']       :'';
$prm['estado']      = isset($_POST['estado'])   ?$_POST['estado']       :'';
$prm['rol']         = isset($_POST['rol'])      ?$_POST['rol']          :'';

if ($action == "agregar"){
    
}elseif($action == "actualizar"){
    $_user = new usuarios();
    $resultado = $_user->update_user($id,$prm);

    if ($resultado == true){
        $msg = "El usuario fue actualizado";
    }else{
        $msg = "Error al actualizar el usuario";
    }
    $html = "<script>
		    window.alert('$msg');
		    self.location='usuarios.php';
        </script>";
            
    echo $html;	
    
}elseif($action == "eliminar"){
    $_user = new usuarios();
    $resultado = $_user->delete_user($id);

    if ($resultado == true){
        $msg = "El usuario fue eliminado";
    }
    $html = "<script>
		    window.alert('$msg');
		    self.location='usuarios.php';
        </script>";
            
    echo $html;	
}else{
    echo("Ninguno");

}