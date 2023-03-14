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

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 6
    private $stmt7;

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 7
    private $stmt8;

    // objeto mysqli_stmt que representa una consulta preparada para el registro de la seccion 3
    private $stmt9;
    private $stmt10;



    // Constructor que recibe los parámetros necesarios para conectarse a la base de datos y preparar la consulta
    public function __construct($host, $usuario, $contraseña, $bd) {
        // Crear objeto mysqli para conectar con la base de datos
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);

        // Verificar si la conexión se estableció correctamente
        if ($this->conexion->connect_error) {
            throw new Exception("Error al conectar a la base de datos: " . $this->conexion->connect_error);
        }

        // Preparar consulta INSERT utilizando la función prepare del objeto de conexión y asignarla a $stmt1
        $this->stmt1 = $this->conexion->prepare("INSERT INTO `tbl_proceso_atsme`(`loteProceso`,`separacionFp04`, `materiaPrimaSeparada`, `aprobacionInicio`, `IdEquipo`, `IdRegMateriaPrima`) VALUES (?,?,?,?,?,?)");

        $this->stmt2 = $this->conexion->prepare("INSERT INTO equipos (dietrich1, escamador)
             VALUES (?, ?);
        ");
        
        $this->stmt3 = $this->conexion->prepare("INSERT INTO materiaprima (too00, torec0, swf098, stw000, sso000, glg000)
             VALUES (?, ?, ?, ?, ?, ?)");

        $this -> stmt4 = $this->conexion->prepare("INSERT INTO `tbl_estado_equipo_atsme`(`reactorLimpio`, `bombaMangueraLineasLimpias`, `hermeticidadReactorOk`, `reactorFuncionaOk`, `sistemaVacioOk`, `sistemaVaporOk`, `sistemaEnfiramientoOk`, `condensadorSinFugas`, `loteProceso`)
         VALUES (?,?,?,?,?,?,?,?,?)");

        $this ->stmt5 = $this->conexion->prepare("INSERT INTO `tbl_fase_carga_too000`(`fichaLeída`, `equipoSeguridad`, `cargaBomba`, `conexionesAcoplesTuberiasOk`, `coloracionTOO`, `cargaConVacio`, `bloqueoAjusteVacio`, `inicioCargaTOO000`, `finCargaTOO000`, `problemaCarga`, `comentarioProblema`, `loteProceso`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
        $this ->stmt6 = $this->conexion->prepare("INSERT INTO `tbl_fase_descarga`(`fichaLeída`, `equipoSeguridad`, `RPMCilindro`, `frecuenciaVariador`, `temperaturaAgua`, `telaFiltrante`, `inicioVapor`, `finVapor`, `inicioDescarga`, `finDescarga`, `kgAtsme0`, `kgAtsxxx`, `problemaEscamado`, `comentarioProblema`, `lote`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $this ->stmt7 = $this->conexion->prepare("INSERT INTO `tbl_conversion_tod100atoreco`(`cargoTod100`, `adicionSso000yGlg000`, `homogenizarSuspenderReposar`, `kgStw000`, `KgToreco`, `torecoEtiquetado`, `lote`)
             VALUES (?, ?, ?, ?, ?, ?, ?)");

        $this->stmt8 = $this->conexion->prepare("INSERT INTO `tbl_lavado_equipo_atsme`(`inicioEnjuague`, `finEnjuague`, `tuberiasLimpias`, `kgAguaLavada`, `lote`)
             VALUES (?, ?, ?, ?, ?)");

        $this->stmt9 = $this->conexion->prepare("INSERT INTO `tbl_fase_cargaswf098_atsme` (`fichaLeida`, `equipoSeguirdad`, `swf098Transparente`, `reactorEnEnfriamiento`, `inicioCargaSWF098`, `finCargaSWF098`, `inicioVapor`, `problemaAdicionAcido`, `comentarioProblema`, `equipoEnReflujo`, `inicioReflujo`, `finReflujo`, `muestraAcidoSulfNecesario`, `resultadoMuestra`, `totalAguaDestilada`, `muestraPasa`, `lote`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $this->stmt10 = $this->conexion->prepare("INSERT INTO `tbl_seguimiento_cargaswf098`( `nroHoraSeguimiento`, `temperatura`, `presion`, `kgAguaDestilada`, `observaciones`, `idCarga`) 
            VALUES (?,?,?,?,?,?)");
    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion1($arrayDatos) {

        // registro materia prima
        try {
            // Verificar la conexión a la base de datos
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }

            //variables para registro de equipo usado
            $dietrich = isset($arrayDatos["dietrich1"]) ? $arrayDatos["dietrich1"] : 0;
            $escamador = isset($arrayDatos["escamador"]) ? $arrayDatos["escamador"] : 0;

            //variables para registro de materia prima usada
            $TOO00 = isset($_POST["TOO00"]) ? $_POST["TOO00"] : 0;
            $TORECO = isset($_POST["TORECO"]) ? $_POST["TORECO"] : 0;
            $SWF098 = isset($_POST["SWF098"]) ? $_POST["SWF098"] : 0;
            $STW000 = isset($_POST["STW000"]) ? $_POST["STW000"] : 0;
            $SSO000 = isset($_POST["SSO000"]) ? $_POST["SSO000"] : 0;
            $GLG000 = isset($_POST["GLG000"]) ? $_POST["GLG000"] : 0;    

            // Vincular los parámetros
            $this->stmt2->bind_param("ii", $dietrich, $escamador);
            $this->stmt3->bind_param("dddddd", $TOO00, $TORECO, $SWF098, $STW000, $SSO000, $GLG000);

            // Iniciar la transacción
            $this->conexion->autocommit(false);
            $this->conexion->begin_transaction();

            // Ejecutar las consultas
            $resultadoEquipo = $this->stmt2->execute();
            $idEquipo = $this->conexion->insert_id;

            $resultadoRegMatPrima = $this -> stmt3 -> execute();
            $idMatPrima = $this -> conexion -> insert_id;

            // Verificar si ocurrió un error en la transacción
            if (!$resultadoEquipo || !$resultadoRegMatPrima) {
                echo "Error en la consulta equipo met prima: " . $this->conexion->error;
                // Si ocurre un error, hacer un rollback para deshacer los cambios
                $this->conexion->rollback();
            } else {
                // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
                $this -> stmt1 -> bind_param("siiiii", $arrayDatos['lote'], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos["aprobacionInicio"], $idEquipo, $idMatPrima);
                // Ejecutar la consulta preparada utilizando la función execute
                
                $resultadoRegEncProceso = $this->stmt1->execute();
                
                if (!$resultadoRegEncProceso) {
                    echo "Error en la consulta encabezado: " . $this->stmt1->error;
                    // Si ocurre un error, puedes hacer un rollback para deshacer los cambios
                    $this->conexion->rollback();
                } else {
                    // registro estado equipo
    
                    $reactorLimpio = isset($_POST['reactorLimpio']) ? $_POST['reactorLimpio'] : 0;
                    $bombaMangueraLineasLimpias = isset($_POST['bombaMangueraLineasLimpias']) ? $_POST['bombaMangueraLineasLimpias'] : 0;
                    $hermeticidadReactorOk = isset($_POST['hermeticidadReactorOk']) ? $_POST['hermeticidadReactorOk'] : 0;
                    $reactorFuncionaOk = isset($_POST['reactorFuncionaOk']) ? $_POST['reactorFuncionaOk'] : 0;
                    $sistemaVacioOk = isset($_POST['sistemaVacioOk']) ? $_POST['sistemaVacioOk'] : 0;
                    $sistemaVaporOk = isset($_POST['sistemaVaporOk']) ? $_POST['sistemaVaporOk'] : 0;
                    $sistemaEnfiramientoOk = isset($_POST['sistemaEnfiramientoOk']) ? $_POST['sistemaEnfiramientoOk'] : 0;
                    $condensadorSinFugas = isset($_POST['condensadorSinFugas']) ? $_POST['condensadorSinFugas'] : 0;
        
                    $this->stmt4->bind_param("iiiiiiiis", $reactorLimpio, $bombaMangueraLineasLimpias, $hermeticidadReactorOk, $reactorFuncionaOk,
                    $sistemaVacioOk, $sistemaVaporOk, $sistemaEnfiramientoOk, $condensadorSinFugas, $arrayDatos['lote']);

                    $resultadoEstEquipo = $this->stmt4->execute();

                    if (!$resultadoEstEquipo) {
                        echo "Error en la consulta estadoEquipo: " . $this->stmt4->error;
                        // Si ocurre un error, puedes hacer un rollback para deshacer los cambios
                        $this->conexion->rollback();    
                    } else {
                        $this->conexion->commit();
                        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
                        // de lo contrario, devolver null
                        return true;
                    }
                }
            }                

        } catch (Exception $e) {
            // Rollback de transacción en caso de error
            // $conn->rollback();
            echo "Error: " . $e->getMessage();
        
        }
    }

     // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion2($arrayDatos) {

        $fichaLeída = isset($arrayDatos['fichaLeída']) ? $arrayDatos['fichaLeída'] : 0;
        $equipoSeguridad = isset($arrayDatos['equipoSeguridad']) ? $arrayDatos['equipoSeguridad'] : 0;
        $cargaBomba = isset($arrayDatos['cargaBomba']) ? $arrayDatos['cargaBomba'] : 0;
        $conexionesAcoplesTuberiasOk = isset($arrayDatos['conexionesAcoplesTuberiasOk']) ? $arrayDatos['conexionesAcoplesTuberiasOk'] : 0;
        $coloracionTOO = isset($arrayDatos['coloracionTOO']) ? $arrayDatos['coloracionTOO'] : 0;
        $cargaConVacio = isset($arrayDatos['cargaConVacio']) ? $arrayDatos['cargaConVacio'] : 0;
        $bloqueoAjusteVacio = isset($arrayDatos['bloqueoAjusteVacio']) ? $arrayDatos['bloqueoAjusteVacio'] : 0;
        $inicioCargaTOO000 = isset($arrayDatos['inicioCargaTOO000']) ? $arrayDatos['inicioCargaTOO000'] : "NOW()";
        $finCargaTOO000 = isset($arrayDatos['finCargaTOO000']) ? $arrayDatos['finCargaTOO000'] : "NOW()";
        $problemaCarga = isset($arrayDatos['problemaCarga']) ? $arrayDatos['problemaCarga'] : 0;
        $comentarioProblema = isset($arrayDatos['comentarioProblema']) ? $arrayDatos['comentarioProblema'] : "";
        $lote = $arrayDatos['lote'];        

        // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
        $this->stmt5->bind_param("iiiiiiississ", $fichaLeída, $equipoSeguridad, $cargaBomba, $conexionesAcoplesTuberiasOk,
        $coloracionTOO, $cargaConVacio, $bloqueoAjusteVacio, $inicioCargaTOO000, $finCargaTOO000, $problemaCarga, $comentarioProblema, $lote);
    
        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        $resultadob = $this->stmt5->execute();
        var_dump($this->stmt5->error);
        return $resultadob;

    }

     // Método para insertar datos en la tabla utilizando la consulta preparada
    function registroSeccion5($arrayDatos){
        
        // Las siguientes líneas de código asignan los valores correspondientes a las variables. Si el valor no existe en $arrayDatos, se asigna un valor predeterminado de 0 o "NOW()".
        $fichaLeída = isset($arrayDatos['fichaLeída']) ? $arrayDatos['fichaLeída'] : 0;
        $equipoSeguridad = isset($arrayDatos['equipoSeguridad']) ? $arrayDatos['equipoSeguridad'] : 0;
        $RPMCilindro = isset($arrayDatos['RPMCilindro']) ? $arrayDatos['RPMCilindro'] : 0;
        $frecuenciaVariador = isset($arrayDatos['frecuenciaVariador']) ? $arrayDatos['frecuenciaVariador'] : 0;
        $temperaturaAgua = isset($arrayDatos['temperaturaAgua']) ? $arrayDatos['temperaturaAgua'] : 0;
        $telaFiltrante = isset($arrayDatos['telaFiltrante']) ? $arrayDatos['telaFiltrante'] : 0;
        $inicioVapor = isset($arrayDatos['inicioVapor']) ? $arrayDatos['inicioVapor'] : "NOW()";
        $finVapor = isset($arrayDatos['finVapor']) ? $arrayDatos['finVapor'] : "NOW()";
        $inicioDescarga = isset($arrayDatos['inicioDescarga']) ? $arrayDatos['inicioDescarga'] : "NOW()";
        $finDescarga = isset($arrayDatos["finDescarga"]) ? $arrayDatos["finDescarga"] : "NOW()";
        $kgAtsme0 = isset($arrayDatos['kgAtsme0']) ? $arrayDatos['kgAtsme0'] : 0;
        $kgAtsxxx = isset($arrayDatos['kgAtsxxx']) ? $arrayDatos["kgAtsxxx"] : 0;
        $problemaEscamado = isset($arrayDatos['problemaEscamado']) ? $arrayDatos['problemaEscamado'] : 0;
        $comentarioProblema = isset($arrayDatos['comentarioProblema']) ? $arrayDatos['comentarioProblema'] : "";
        $lote = $arrayDatos['lote'];

        // El siguiente comando vincula los parámetros de la consulta preparada con los valores asignados a las variables.
        $this->stmt6->bind_param('iiiiiissssiiisi', $fichaLeída, $equipoSeguridad, $RPMCilindro, $frecuenciaVariador, $temperaturaAgua, $telaFiltrante,
        $inicioVapor, $finVapor, $inicioDescarga, $finDescarga, $kgAtsme0, $kgAtsxxx, $problemaEscamado, $comentarioProblema, $lote);

         // El siguiente comando ejecuta la consulta preparada.
        return $this->stmt6->execute();

    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registrarSeccion6($arrayDatos){

        $cargoTod100 = isset($arrayDatos['cargoTod100']) ? $arrayDatos['cargoTod100'] : 0;
        $adicionSso000yGlg000 = isset($arrayDatos['adicionSso000yGlg000']) ? $arrayDatos['adicionSso000yGlg000'] : 0;
        $homogenizarSuspenderReposar = isset($arrayDatos['homogenizarSuspenderReposar']) ? $arrayDatos['homogenizarSuspenderReposar'] : 0;
        $kgStw000 = isset($arrayDatos['kgStw000']) ? $arrayDatos['kgStw000'] : 0;
        $KgToreco = isset($arrayDatos['KgToreco']) ? $arrayDatos['KgToreco'] : 0;
        $torecoEtiquetado = isset($arrayDatos['torecoEtiquetado']) ? $arrayDatos['torecoEtiquetado'] : 0;
        $lote = $arrayDatos['lote'];

        $this->stmt7->bind_param('iiiddii', $cargoTod100, $adicionSso000yGlg000, $homogenizarSuspenderReposar, $kgStw000,
        $KgToreco, $torecoEtiquetado, $lote);

        return $this->stmt7->execute();
    }

    function registrarSegumientosSWF($idCargaSWF, $arraySeguimientos){
        $data = array();
        $nroHoraSeguimiento = 1;
        $swTodoOk = true;

        foreach($arraySeguimientos as $valor){
            $data[] = json_decode($valor, true);
        }

        foreach($data as $clave => $valor){
            $temperatura = isset($valor["auxTemp"]) ? $valor["auxTemp"] : 0;
            $presion = isset($valor["auxPres"]) ? $valor["auxPres"] : 0;
            $kgAguaDestilada = isset($valor["auxAguaDest"]) ? $valor["auxAguaDest"] : 0;
            $observaciones = isset($valor["auxObs"]) ? $valor["auxObs"] : "";

            $this->stmt10->bind_param("iiiisi", $nroHoraSeguimiento, $temperatura, $presion, $kgAguaDestilada, $observaciones, $idCargaSWF);
            $resultado = $this->stmt10->execute();
            $nroHoraSeguimiento++;

            $swTodoOk = $resultado;
        }

        return $swTodoOk;

    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registrarSeccion7($arrayDatos){

        $fichaLeida = isset($arrayDatos['fichaLeida']) ? $arrayDatos['fichaLeida'] : 0;
        $equipoSeguirdad = isset($arrayDatos['equipoSeguridad']) ? $arrayDatos['equipoSeguridad'] : 0;
        $swf098Transparente = isset($arrayDatos['swf098Transparente']) ? $arrayDatos['swf098Transparente'] : 0;
        $reactorEnEnfriamiento = isset($arrayDatos['reactorEnEnfriamiento']) ? $arrayDatos['reactorEnEnfriamiento'] : 0;
        $inicioCargaSWF098 = isset($arrayDatos['inicioCargaSWF098']) ? $arrayDatos['inicioCargaSWF098'] : "NOW()";
        $finCargaSWF098 = isset($arrayDatos['finCargaSWF098']) ? $arrayDatos['finCargaSWF098'] : "NOW()";
        $inicioVapor = isset($arrayDatos['inicioVapor']) ? $arrayDatos['inicioVapor'] : 0;        
        $problemaAdicionAcido = isset($arrayDatos['problemaAdicionAcido']) ? $arrayDatos['problemaAdicionAcido'] : 0;
        $comentarioProblema = isset($arrayDatos['comentarioProblema']) ? $arrayDatos['comentarioProblema'] : "";
        $equipoEnReflujo = isset($arrayDatos['equipoEnReflujo']) ? $arrayDatos['equipoEnReflujo'] : 0;
        $inicioReflujo = isset($arrayDatos['inicioReflujo']) ? $arrayDatos['inicioReflujo'] : "NOW()";
        $finReflujo = isset($arrayDatos['finReflujo']) ? $arrayDatos['finReflujo'] : "NOW()";
        $muestraAcidoSulfNecesario = isset($arrayDatos['muestraAcidoSulfNecesario']) ? $arrayDatos['muestraAcidoSulfNecesario'] : 0;
        $resultadoMuestra = isset($arrayDatos['resultadoMuestra']) ? $arrayDatos['resultadoMuestra'] : 0;
        $totalAguaDestilada = isset($arrayDatos['totalAguaDestilada']) ? $arrayDatos['totalAguaDestilada'] : 0;
        $muestraPasa = isset($arrayDatos['muestraPasa']) ? $arrayDatos['muestraPasa'] : 0;
        $lote = $arrayDatos['lote'];

        $this->stmt9->bind_param('iiiissiisissiiiii', $fichaLeida, $equipoSeguirdad, $swf098Transparente, $reactorEnEnfriamiento,
         $inicioCargaSWF098, $finCargaSWF098, $inicioVapor, $problemaAdicionAcido, $comentarioProblema, $equipoEnReflujo, 
         $inicioReflujo, $finReflujo, $muestraAcidoSulfNecesario, $resultadoMuestra, $totalAguaDestilada, $muestraPasa, 
         $lote);

        $resultado =  $this->stmt9->execute();

        if($resultado){
            $idCargaSWF = $this->conexion->insert_id;
            isset($arrayDatos['arraySeguimientos']) ? $resultadoSeguimientos = $this->registrarSegumientosSWF($idCargaSWF, $arrayDatos['arraySeguimientos']) : http_response_code(400);
            
            var_dump($resultadoSeguimientos);

            if ($resultadoSeguimientos) {
                echo 1;
                http_response_code(200);
            } else {
                echo "-1";
                http_response_code(500);
            }
            
        } else {
            var_dump($this->stmt9->error);
            http_response_code(500);
        }
    }

    function registrarSegumientosTOD100($idCargaSWF, $arraySeguimientos){
        $data = array();
        $nroHoraSeguimiento = 1;
        $swTodoOk = true;

        foreach($arraySeguimientos as $valor){
            $data[] = json_decode($valor, true);
        }

        foreach($data as $clave => $valor){
            $temperatura = isset($valor["auxTemp"]) ? $valor["auxTemp"] : 0;
            $presion = isset($valor["auxPres"]) ? $valor["auxPres"] : 0;
            $kgAguaDestilada = isset($valor["auxAguaDest"]) ? $valor["auxAguaDest"] : 0;
            $observaciones = isset($valor["auxObs"]) ? $valor["auxObs"] : "";

            $this->stmt10->bind_param("iiiisi", $nroHoraSeguimiento, $temperatura, $presion, $kgAguaDestilada, $observaciones, $idCargaSWF);
            $resultado = $this->stmt10->execute();
            $nroHoraSeguimiento++;

            $swTodoOk = $resultado;
        }

        return $swTodoOk;

    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registrarSeccion3($arrayDatos){

        $fichaLeida = isset($arrayDatos['fichaLeida']) ? $arrayDatos['fichaLeida'] : 0;
        $equipoSeguirdad = isset($arrayDatos['equipoSeguridad']) ? $arrayDatos['equipoSeguridad'] : 0;
        $swf098Transparente = isset($arrayDatos['swf098Transparente']) ? $arrayDatos['swf098Transparente'] : 0;
        $reactorEnEnfriamiento = isset($arrayDatos['reactorEnEnfriamiento']) ? $arrayDatos['reactorEnEnfriamiento'] : 0;
        $inicioCargaSWF098 = isset($arrayDatos['inicioCargaSWF098']) ? $arrayDatos['inicioCargaSWF098'] : "NOW()";
        $finCargaSWF098 = isset($arrayDatos['finCargaSWF098']) ? $arrayDatos['finCargaSWF098'] : "NOW()";
        $inicioVapor = isset($arrayDatos['inicioVapor']) ? $arrayDatos['inicioVapor'] : 0;        
        $problemaAdicionAcido = isset($arrayDatos['problemaAdicionAcido']) ? $arrayDatos['problemaAdicionAcido'] : 0;
        $comentarioProblema = isset($arrayDatos['comentarioProblema']) ? $arrayDatos['comentarioProblema'] : "";
        $equipoEnReflujo = isset($arrayDatos['equipoEnReflujo']) ? $arrayDatos['equipoEnReflujo'] : 0;
        $inicioReflujo = isset($arrayDatos['inicioReflujo']) ? $arrayDatos['inicioReflujo'] : "NOW()";
        $finReflujo = isset($arrayDatos['finReflujo']) ? $arrayDatos['finReflujo'] : "NOW()";
        $muestraAcidoSulfNecesario = isset($arrayDatos['muestraAcidoSulfNecesario']) ? $arrayDatos['muestraAcidoSulfNecesario'] : 0;
        $resultadoMuestra = isset($arrayDatos['resultadoMuestra']) ? $arrayDatos['resultadoMuestra'] : 0;
        $totalAguaDestilada = isset($arrayDatos['totalAguaDestilada']) ? $arrayDatos['totalAguaDestilada'] : 0;
        $muestraPasa = isset($arrayDatos['muestraPasa']) ? $arrayDatos['muestraPasa'] : 0;
        $idProceso = $arrayDatos['idProceso'];

        $this->stmt9->bind_param('iiiissiisissiiiii', $fichaLeida, $equipoSeguirdad, $swf098Transparente, $reactorEnEnfriamiento,
         $inicioCargaSWF098, $finCargaSWF098, $inicioVapor, $problemaAdicionAcido, $comentarioProblema, $equipoEnReflujo, 
         $inicioReflujo, $finReflujo, $muestraAcidoSulfNecesario, $resultadoMuestra, $totalAguaDestilada, $muestraPasa, 
         $idProceso);

        $resultado =  $this->stmt9->execute();

        if($resultado){
            $idCargaSWF = $this->conexion->insert_id;
            isset($arrayDatos['arraySeguimientos']) ? $resultadoSeguimientos = $this->registrarSegumientosSWF($idCargaSWF, $arrayDatos['arraySeguimientos']) : http_response_code(400);
            
            var_dump($resultadoSeguimientos);

            if ($resultadoSeguimientos) {
                echo 1;
                http_response_code(200);
            } else {
                echo "-1";
                http_response_code(500);
            }
            
        } else {
            var_dump($this->stmt9->error);
            http_response_code(500);
        }
    }
}

?>