<?php
require_once "../conexion/conexion.php";

class formulario{

    function get_formulario($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM NFO n inner join Equipos e inner join MateriaPrima m on n.IdProceso = e.IdProceso and n.IdProceso = m.IdProceso WHERE n.IdProceso = '$prm';");
        return $query;
    }

    function get_formulario_procesos($id){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM Procesos WHERE IdProceso = '$id';");
        return $query;
    }
    
    function get_formulario_equipos($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM Equipos e WHERE e.IdProceso = '$prm';");
        return $query;
    }
    
    function get_formulario_materias($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM MateriaPrima m WHERE m.IdProceso = '$prm';");
        return $query;
    }
    
    function get_formulario_nfo($prm){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM NFO WHERE IdProceso = '$prm';");
        return $query;
    }
    
    function get_formulario_etapas($id,$name){
        $conex = new conection();
        $result = $conex->conex();
        // Consulta y por medio de un while muestra la lista de los clientes
        $query = mysqli_query($result,"SELECT * FROM Etapas WHERE IdProceso = '$id' AND NombreEtapa = '$name';");
        return $query;
    }

}