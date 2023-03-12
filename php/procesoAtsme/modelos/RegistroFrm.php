<?php
class RegistroFrm {
    public $idProceso;
    private $conexion; // objeto mysqli que representa la conexión a la base de datos
    // objetos mysqli_stmt que representa una consulta preparada para el registro de la seccion 1
    private $stmt1; 
    private $stmt2;
    private $stmt3;
    private $stmt4; 

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 2
    private $stmt5;

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 5
    private $stmt6;

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 5
    private $stmt7;

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 5
    private $stmt8;


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

        $this ->stmt5 = $this->conexion->prepare("INSERT INTO `tbl_fase_carga_too000`( `fichaLeída`, `equipoSeguridad`, `cargaBomba`, `conexionesAcoplesTuberiasOk`, `coloracionTOO`, `cargaConVacio`, `bloqueoAjusteVacio`, `inicioCargaTOO000`, `finCargaTOO000`, `problemaCarga`, `comentarioProblema`, `idProceso`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
        $this ->stmt6 = $this->conexion->prepare("INSERT INTO `tbl_fase_descarga`(`fichaLeída`, `equipoSeguridad`, `RPMCilindro`, `frecuenciaVariador`, `temperaturaAgua`, `telaFiltrante`, `inicioVapor`, `finVapor`, `inicioDescarga`, `finDescarga`, `kgAtsme0`, `kgAtsxxx`, `problemaEscamado`, `comentarioProblema`, `idProceso`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $this ->stmt7 = $this->conexion->prepare("INSERT INTO `tbl_conversion_tod100atoreco`(`cargoTod100`, `adicionSso000yGlg000`, `homogenizarSuspenderReposar`, `kgStw000`, `KgToreco`, `torecoEtiquetado`, `idProceso`)
             VALUES (?, ?, ?, ?, ?, ?, ?)");

        $this->stmt8 =  $this->conexion->prepare("INSERT INTO `tbl_lavado_equipo_atsme`(`inicioEnjuague`, `finEnjuague`, `tuberiasLimpias`, `kgAguaLavada`, `idProceso`)
             VALUES (?, ?, ?, ?, ?)");
    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion1($arrayDatos) {

        // registro encabezado proceso

        // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
        $this->stmt1->bind_param("ssss", $arrayDatos["lote"], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos["aprobacionInicio"]);
        // Ejecutar la consulta preparada utilizando la función execute
        $resultado = $this->stmt1->execute();
        $this->idProceso = $this->conexion->insert_id;

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
        return $resultado ? $this -> idProceso : null;
    }

     // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion2($arrayDatos) {

        $fichaLeída = $arrayDatos['fichaLeída'] ? $arrayDatos['fichaLeída'] : 0;
        $equipoSeguridad = $arrayDatos['equipoSeguridad'] ? $arrayDatos['equipoSeguridad'] : 0;
        $cargaBomba = $arrayDatos['cargaBomba'] ? $arrayDatos['cargaBomba'] : 0;
        $conexionesAcoplesTuberiasOk = $arrayDatos['conexionesAcoplesTuberiasOk'] ? $arrayDatos['conexionesAcoplesTuberiasOk'] : 0;
        $coloracionTOO = $arrayDatos['coloracionTOO'] ? $arrayDatos['coloracionTOO'] : 0;
        $cargaConVacio = $arrayDatos['cargaConVacio'] ? $arrayDatos['cargaConVacio'] : 0;
        $bloqueoAjusteVacio = $arrayDatos['bloqueoAjusteVacio'] ? $arrayDatos['bloqueoAjusteVacio'] : 0;
        $inicioCargaTOO000 = $arrayDatos['inicioCargaTOO000'] ? $arrayDatos['inicioCargaTOO000'] : "NOW()";
        $finCargaTOO000 = $arrayDatos['finCargaTOO000'] ? $arrayDatos['finCargaTOO000'] : "NOW()";
        $problemaCarga = $arrayDatos['problemaCarga'] ? $arrayDatos['problemaCarga'] : 0;
        $comentarioProblema = $arrayDatos['comentarioProblema'] ? $arrayDatos['comentarioProblema'] : "";
        $idProceso = $arrayDatos['idProceso'];        

        // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
        $this->stmt5->bind_param("iiiiiiissisi", $fichaLeída, $equipoSeguridad, $cargaBomba, $conexionesAcoplesTuberiasOk,
        $coloracionTOO, $cargaConVacio, $bloqueoAjusteVacio, $inicioCargaTOO000, $finCargaTOO000, $problemaCarga, $comentarioProblema, $idProceso);
    
        // Ejecutar la consulta preparada utilizando la función execute
        $resultado = $this->stmt5->execute();

        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        return $resultado;
    }

     // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion5($arrayDatos){
        
        // Las siguientes líneas de código asignan los valores correspondientes a las variables. Si el valor no existe en $arrayDatos, se asigna un valor predeterminado de 0 o "NOW()".
        $fichaLeída = $arrayDatos['fichaLeída'] ? $arrayDatos['fichaLeída'] : 0;
        $equipoSeguridad = $arrayDatos['equipoSeguridad'] ? $arrayDatos['equipoSeguridad'] : 0;
        $RPMCilindro = $arrayDatos['RPMCilindro'] ? $arrayDatos['RPMCilindro'] : 0;
        $frecuenciaVariador = $arrayDatos['frecuenciaVariador'] ? $arrayDatos['frecuenciaVariador'] : 0;
        $temperaturaAgua = $arrayDatos['temperaturaAgua'] ? $arrayDatos['temperaturaAgua'] : 0;
        $telaFiltrante = $arrayDatos['telaFiltrante'] ? $arrayDatos['telaFiltrante'] : 0;
        $inicioVapor = $arrayDatos['inicioVapor'] ? $arrayDatos['inicioVapor'] : "NOW()";
        $finVapor = $arrayDatos['finVapor'] ? $arrayDatos['finVapor'] : "NOW()";
        $inicioDescarga = $arrayDatos['inicioDescarga'] ? $arrayDatos['inicioDescarga'] : "NOW()";
        $finDescarga = $arrayDatos["finDescarga"] ? $arrayDatos["finDescarga"] : "NOW()";
        $kgAtsme0 = $arrayDatos['kgAtsme0'] ? $arrayDatos['kgAtsme0'] : 0;
        $kgAtsxxx = $arrayDatos['kgAtsxxx'] ? $arrayDatos["kgAtsxxx"] : 0;
        $problemaEscamado = $arrayDatos['problemaEscamado'] ? $arrayDatos['problemaEscamado'] : 0;
        $comentarioProblema = $arrayDatos['comentarioProblema'] ? $arrayDatos['comentarioProblema'] : "";
        $idProceso = $arrayDatos['idProceso'];

        // El siguiente comando vincula los parámetros de la consulta preparada con los valores asignados a las variables.
        $this->stmt6->bind_param('iiiiiissssiiisi', $fichaLeída, $equipoSeguridad, $RPMCilindro, $frecuenciaVariador, $temperaturaAgua, $telaFiltrante,
        $inicioVapor, $finVapor, $inicioDescarga, $finDescarga, $kgAtsme0, $kgAtsxxx, $problemaEscamado, $comentarioProblema, $idProceso);

         // El siguiente comando ejecuta la consulta preparada.
        return $this->stmt6->execute();

    }

    function registrarSeccion6($arrayDatos){

        $cargoTod100 = $arrayDatos['cargoTod100'] ? $arrayDatos['cargoTod100'] : 0;
        $adicionSso000yGlg000 = $arrayDatos['adicionSso000yGlg000'] ? $arrayDatos['adicionSso000yGlg000'] : 0;
        $homogenizarSuspenderReposar = $arrayDatos['homogenizarSuspenderReposar'] ? $arrayDatos['homogenizarSuspenderReposar'] : 0;
        $kgStw000 = $arrayDatos['kgStw000'] ? $arrayDatos['kgStw000'] : 0;
        $KgToreco = $arrayDatos['KgToreco'] ? $arrayDatos['KgToreco'] : 0;
        $torecoEtiquetado = $arrayDatos['torecoEtiquetado'] ? $arrayDatos['torecoEtiquetado'] : 0;
        $idProceso = $arrayDatos['idProceso'];

        $this->stmt7->bind_param('iiiddii', $cargoTod100, $adicionSso000yGlg000, $homogenizarSuspenderReposar, $kgStw000,
        $KgToreco, $torecoEtiquetado, $idProceso);

        return $this->stmt7->execute();
    }

    function registrarSeccion7($arrayDatos){

        $inicioEnjuague = $arrayDatos['inicioEnjuague'] ? $arrayDatos['inicioEnjuague'] : 'NOW()';
        $finEnjuague = $arrayDatos['finEnjuague'] ? $arrayDatos['finEnjuague'] : 'NOW()';
        $tuberiasLimpias = $arrayDatos['tuberiasLimpias'] ? $arrayDatos['tuberiasLimpias'] : 0;
        $kgAguaLavada = $arrayDatos['kgAguaLavada'] ? $arrayDatos['kgAguaLavada'] : 0;
        $idProceso = $arrayDatos['idProceso'];

        $this->stmt8->bind_param('ssidi', $inicioEnjuague, $finEnjuague, $tuberiasLimpias, $kgAguaLavada, $idProceso);

        return $this->stmt8->execute();
    }
}

?>