<?php
require_once "../conexion/conexion.php";

class procesos{

    function get_process_x_users($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,'SELECT * FROM Procesos p INNER JOIN Usuarios u ON p.cedula = u.cedula ORDER BY FechaInicial');
        return $query;
    }

    function get_process(){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,'SELECT u.*, p.*, n.nfo nombreProceso FROM Procesos p INNER JOIN Usuarios u INNER JOIN NFO n ON p.cedula = u.cedula and p.IdProceso = n.IdProceso ORDER BY FechaInicial DESC');
        return $query;
    }

    function get_only_process(){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,'SELECT u.*, p.*, n.nfo nombreProceso FROM procesos p INNER JOIN usuarios u INNER JOIN NFO n ON p.cedula = u.cedula and p.IdProceso = n.IdProceso WHERE p.Estado = 1 ORDER BY FechaInicial DESC');
        return $query;
    }

    function eliminarProceso(){
        $IdProceso = $_GET['id'];
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $q = "UPDATE Procesos SET Estado = 3 WHERE IdProceso = '$IdProceso';";
        $query = mysqli_query($result,$q);
        return $query;
    }

}