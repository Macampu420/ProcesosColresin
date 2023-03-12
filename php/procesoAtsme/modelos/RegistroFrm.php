<?php
class RegistroFrm {
    private $conexion; // objeto mysqli que representa la conexión a la base de datos
    private $stmt1; // objeto mysqli_stmt que representa una consulta preparada

    // Constructor que recibe los parámetros necesarios para conectarse a la base de datos y preparar la consulta
    public function __construct($host, $usuario, $contraseña, $bd) {
        // Crear objeto mysqli para conectar con la base de datos
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);

        // Preparar consulta INSERT utilizando la función prepare del objeto de conexión y asignarla a $stmt1
        $this->stmt1 = $this->conexion->prepare("INSERT INTO `tbl_proceso_atsme`(`lote`, `separacionFp04`, `materiaPrimaSeparada`, `aprobacionInicio`, `estado`, `seccion1`) 
            VALUES (?, ?,?,?,'en Proceso', '1')");
    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion1($arrayDatos) {
        // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
        $this->stmt1->bind_param("ssss", $arrayDatos["lote"], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos["aprobacionInicio"]);
    
        // Ejecutar la consulta preparada utilizando la función execute
        $resultado = $this->stmt1->execute();

        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        return $resultado ? $this->conexion->insert_id : null;
    }
}
?>