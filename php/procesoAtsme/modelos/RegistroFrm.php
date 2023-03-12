<?php
class RegistroFrm {
    private $conexion; // objeto mysqli que representa la conexión a la base de datos
    // objetos mysqli_stmt que representa una consulta preparada
    private $stmt1; 
    private $stmt2;
    private $stmt3;
    private $stmt4; 

    // Constructor que recibe los parámetros necesarios para conectarse a la base de datos y preparar la consulta
    public function __construct($host, $usuario, $contraseña, $bd) {
        // Crear objeto mysqli para conectar con la base de datos
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);

        // Verificar si la conexión se estableció correctamente
        if ($this->conexion->connect_error) {
            throw new Exception("Error al conectar a la base de datos: " . $this->conexion->connect_error);
        }

        // Preparar consulta INSERT utilizando la función prepare del objeto de conexión y asignarla a $stmt1
        $this->stmt1 = $this->conexion->prepare("INSERT INTO `tbl_proceso_atsme`(`lote`, `separacionFp04`, `materiaPrimaSeparada`, `aprobacionInicio`, `estado`, `seccion1`) 
            VALUES (?, ?,?,?,'en Proceso', '1')");

        $this->stmt2 = $this->conexion->prepare("INSERT INTO `tbl_equipo_atsme`(`dietrich1`, `escamador`, `idProceso`)
            VALUES (?, ?, ?)");
        
        $this->stmt3 = $this->conexion->prepare("INSERT INTO `tbl_materia_prima_atsme`(`TOO00`, `TORECO`, `SWF098`, `STW000`, `SSO000`, `GLG000`, `idProceso`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");

        $this -> stmt4 = $this->conexion->prepare("INSERT INTO `tbl_estado_equipo_atsme`(`reactorLimpio`, `bombaMangueraLineasLimpias`, `hermeticidadReactorOk`, `reactorFuncionaOk`, `sistemaVacioOk`, `sistemaVaporOk`, `sistemaEnfiramientoOk`, `condensadorSinFugas`, `idProceso`)
             VALUES (?,?,?,?,?,?,?,?,?)");
    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion1($arrayDatos) {

        // registro encabezado proceso

        // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
        $this->stmt1->bind_param("ssss", $arrayDatos["lote"], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos["aprobacionInicio"]);
        // Ejecutar la consulta preparada utilizando la función execute
        $resultado = $this->stmt1->execute();
        $idProceso = $this->conexion->insert_id;

        // registro equipo usado

        $dietrich = isset($arrayDatos["dietrich1"]) ? 1 : 0;
        $escamador = isset($arrayDatos["escamador"]) ? 1 : 0;

        $this->stmt2->bind_param("iii", $dietrich, $escamador, $idProceso);
        $this->stmt2->execute();

        // registro materia prima

        $TOO00 = isset($_POST["TOO00"]) ? $_POST["TOO00"] : 0;
        $TORECO = isset($_POST["TORECO"]) ? $_POST["TORECO"] : 0;
        $SWF098 = isset($_POST["SWF098"]) ? $_POST["SWF098"] : 0;
        $STW000 = isset($_POST["STW000"]) ? $_POST["STW000"] : 0;
        $SSO000 = isset($_POST["SSO000"]) ? $_POST["SSO000"] : 0;
        $GLG000 = isset($_POST["GLG000"]) ? $_POST["GLG000"] : 0;

        $this->stmt3->bind_param("iiiiiii", $TOO00, $TORECO, $SWF098, $STW000, $SSO000, $GLG000, $idProceso);
        $this->stmt3->execute();

        // registro estado equipo

        $reactorLimpio = isset($_POST['reactorLimpio']) ? $_POST['reactorLimpio'] : 0;
        $bombaMangueraLineasLimpias = isset($_POST['bombaMangueraLineasLimpias']) ? $_POST['bombaMangueraLineasLimpias'] : 0;
        $hermeticidadReactorOk = isset($_POST['hermeticidadReactorOk']) ? $_POST['hermeticidadReactorOk'] : 0;
        $reactorFuncionaOk = isset($_POST['reactorFuncionaOk']) ? $_POST['reactorFuncionaOk'] : 0;
        $sistemaVacioOk = isset($_POST['sistemaVacioOk']) ? $_POST['sistemaVacioOk'] : 0;
        $sistemaVaporOk = isset($_POST['sistemaVaporOk']) ? $_POST['sistemaVaporOk'] : 0;
        $sistemaEnfiramientoOk = isset($_POST['sistemaEnfiramientoOk']) ? $_POST['sistemaEnfiramientoOk'] : 0;
        $condensadorSinFugas = isset($_POST['condensadorSinFugas']) ? $_POST['condensadorSinFugas'] : 0;

        $this->stmt4->bind_param("iiiiiiiii", $reactorLimpio, $bombaMangueraLineasLimpias, $hermeticidadReactorOk, $reactorFuncionaOk,
         $sistemaVacioOk, $sistemaVaporOk, $sistemaEnfiramientoOk, $condensadorSinFugas, $idProceso);
        $this->stmt4->execute();

        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        return $resultado ? $idProceso : null;
    }

     // Método para insertar datos en la tabla utilizando la consulta preparada
     function registroSeccion2($arrayDatos) {
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