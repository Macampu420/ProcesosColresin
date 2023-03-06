<?php
require_once "../conexion/conexion.php";

class usuarios{

    function get_user($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM Usuarios WHERE IdUsuario = '$prm';");
        return $query;
    }
    
    function get_users(){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,'SELECT * FROM Usuarios ORDER BY Nombre');
        return $query;
    }

    function add_user(){
        $conex = new conection();
        $result = $conex->conex();
    }

    function update_user($id,$prm){
        $conex = new conection();
        $result = $conex->conex();
        $resultado = false;

        $nombre     = isset($prm["nombre"])     ? $prm["nombre"]    :'';
        $apellido   = isset($prm["apellido"])   ? $prm["apellido"]  :'';
        $cedula     = isset($prm["cedula"])     ? $prm["cedula"]    :'';
        $correo     = isset($prm["correo"])     ? $prm["correo"]    :'';
        $contrasena = isset($prm["contrasena"]) ? $prm["contrasena"]:'';
        $estado     = isset($prm["estado"])     ? $prm["estado"]    :'';
        $rol        = isset($prm["rol"])        ? $prm["rol"]       :'';

        if($contrasena != ''){
            $query = mysqli_query($result,"UPDATE Usuarios SET Nombre = '$nombre', Apellido = '$apellido', Cedula = '$cedula', CorreoElectronico = '$correo', Contrasena = '$contrasena', Estado = '$estado', Rol = '$rol' WHERE IdUsuario = '$id';");
        }else{
            $query = mysqli_query($result,"UPDATE Usuarios SET Nombre = '$nombre', Apellido = '$apellido', Cedula = '$cedula', CorreoElectronico = '$correo', Estado = '$estado', Rol = '$rol' WHERE IdUsuario = '$id';");
        }
        if ($query > 0){
            $resultado = true;
        }
        return $resultado;
    }

    function delete_user($id){
        $conex = new conection();
        $result = $conex->conex();
        $resultado = false;
        $query = mysqli_query($result,"DELETE FROM usuarios WHERE IdUsuario = '$id';");
        if ($query > 0){
            $resultado = true;
        }
        return $resultado;
    }

    function get_process_x_users(){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,'SELECT * FROM Procesos p INNER JOIN Usuarios u ON p.cedula = u.cedula ORDER BY Nombre');
        return $query;
    }

}