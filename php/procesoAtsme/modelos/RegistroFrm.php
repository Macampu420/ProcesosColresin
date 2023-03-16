<?php
class RegistroFrm {
    public $idProceso;
    private $conexion; // objeto mysqli que representa la conexión a la base de datos

    private $stmtActualizarSeccion, $stmtRegProcesoAtsme, $stmtRegEquipo, $stmtRegMatPrima, $stmtRegEstadoEquipo; 

    private $stmtRegCargaToo000;
    
    private $stmtFaseDescarga;
    
    private $stmtConversion, $stmtLavadoEquipo;
    
    private $stmtCargaSwf, $stmtRegSeguimientoSwf, $stmtActualizSeguimientoSwf;

    private $stmtRegDest, $stmtRegSeguimientoDest, $stmtActualizSegsDest;

    // Constructor que recibe los parámetros necesarios para conectarse a la base de datos y preparar la consulta
    //tambien prepara todas las consultas a realizar
    public function __construct($host, $usuario, $contraseña, $bd) {
        // Crear objeto mysqli para conectar con la base de datos
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);

        // Verificar si la conexión se estableció correctamente
        if ($this->conexion->connect_error) {
            throw new Exception("Error al conectar a la base de datos: " . $this->conexion->connect_error);
        }

        // Preparar consulta INSERT utilizando la función prepare del objeto de conexión y asignarla a $stmtRegProcesoAtsme
        $this->stmtRegProcesoAtsme = $this->conexion->prepare("INSERT INTO `tbl_proceso_atsme`(`loteProceso`,`separacionFp04`, `materiaPrimaSeparada`, `aprobacionInicio`, `IdEquipo`, `IdRegMateriaPrima`) 
             VALUES (?,?,?,?,?,?)");

        $this->stmtRegEquipo = $this->conexion->prepare("INSERT INTO equipos (dietrich1, escamador)
             VALUES (?, ?);");
        
        $this->stmtRegMatPrima = $this->conexion->prepare("INSERT INTO materiaprima (too00, torec0, swf098, stw000, sso000, glg000)
             VALUES (?, ?, ?, ?, ?, ?)");

        $this -> stmtRegEstadoEquipo = $this->conexion->prepare("INSERT INTO `tbl_estado_equipo_atsme`(`reactorLimpio`, `bombaMangueraLineasLimpias`, `hermeticidadReactorOk`, `reactorFuncionaOk`, `sistemaVacioOk`, `sistemaVaporOk`, `sistemaEnfiramientoOk`, `condensadorSinFugas`, `loteProceso`)
             VALUES (?,?,?,?,?,?,?,?,?)");

        $this ->stmtRegCargaToo000 = $this->conexion->prepare("INSERT INTO `tbl_fase_carga_too000`(`fichaLeída`, `equipoSeguridad`, `cargaBomba`, `conexionesAcoplesTuberiasOk`, `coloracionTOO`, `cargaConVacio`, `bloqueoAjusteVacio`, `inicioCargaTOO000`, `finCargaTOO000`, `problemaCarga`, `comentarioProblema`, `loteProceso`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
        $this ->stmtFaseDescarga = $this->conexion->prepare("INSERT INTO `tbl_fase_descarga`(`fichaLeída`, `equipoSeguridad`, `RPMCilindro`, `frecuenciaVariador`, `temperaturaAgua`, `telaFiltrante`, `inicioVapor`, `finVapor`, `inicioDescarga`, `finDescarga`, `kgAtsme0`, `kgAtsxxx`, `problemaEscamado`, `comentarioProblema`, `loteProceso`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $this ->stmtConversion = $this->conexion->prepare("INSERT INTO `tbl_conversion_tod100atoreco`(`cargoTod100`, `adicionSso000yGlg000`, `homogenizarSuspenderReposar`, `kgStw000`, `KgToreco`, `torecoEtiquetado`, `loteProceso`)
             VALUES (?, ?, ?, ?, ?, ?, ?)");

        $this->stmtLavadoEquipo = $this->conexion->prepare("INSERT INTO `tbl_lavado_equipo_atsme`(`inicioEnjuague`, `finEnjuague`, `tuberiasLimpias`, `kgAguaLavada`, `loteProceso`)
             VALUES (?, ?, ?, ?, ?)");

        $this->stmtCargaSwf = $this->conexion->prepare("INSERT INTO `tbl_fase_cargaswf098_atsme` (`fichaLeida`, `equipoSeguirdad`, `swf098Transparente`, `reactorEnEnfriamiento`, `inicioCargaSWF098`, `finCargaSWF098`, `inicioVapor`, `problemaAdicionAcido`, `comentarioProblema`, `equipoEnReflujo`, `inicioReflujo`, `finReflujo`, `muestraAcidoSulfNecesario`, `resultadoMuestra`, `totalAguaDestilada`, `muestraPasa`, `loteProceso`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $this->stmtRegSeguimientoSwf = $this->conexion->prepare("INSERT INTO `tbl_seguimiento_cargaswf098`( `nroHoraSeguimiento`, `temperatura`, `presion`, `kgAguaDestilada`, `observaciones`, `loteProceso`) 
            VALUES (?,?,?,?,?,?)");

        $this->stmtActualizSeguimientoSwf = $this->conexion->prepare("UPDATE `tbl_seguimiento_cargaswf098` SET `temperatura`=?, `presion`=?, `kgAguaDestilada`=?, `observaciones`=? WHERE `loteProceso` = ? AND `nroHoraSeguimiento` = ?");
    
        $this->stmtRegDest = $this->conexion->prepare("INSERT INTO `tbl_destilacion_tod100`( `confirmInicioDestilacion`, `inicioDestilacion`, `finDestilacion`, `kgTOD100`, `reactorEnEnfriamiento`, `inicioEnfriamiento`, `finEnfriamiento`, `inicioSostener`, `finSostener`, `loteProceso`)
             VALUES (?,?,?,?,?,?,?,?,?,?)");

        $this->stmtRegSeguimientoDest = $this->conexion->prepare("INSERT INTO `tbl_seguimiento_desttod100`(`nroHoraSeguimiento`, `temperatura`, `presion`, `vacio`, `kgTOD100`, `observaciones`, `loteProceso`) 
             VALUES (?,'','','','','',?)");

        $this->stmtActualizSegsDest = $this->conexion->prepare("UPDATE `tbl_seguimiento_desttod100` SET `temperatura`=?,`presion`=?,`vacio`=?,`kgTOD100`=?,`observaciones`=? WHERE `loteProceso` =? && `nroHoraSeguimiento`=? ");
    }

    function actualizarSeccionProceso($nroSeccion, $arrayDatos){
        $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion".$nroSeccion."`= 1 WHERE loteProceso = ?");

        $this->stmtActualizarSeccion->bind_param('s', $arrayDatos['lote']);
        $this->stmtActualizarSeccion->execute();
    }

    function verificarConexion(){
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

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
            $this->stmtRegEquipo->bind_param("ii", $dietrich, $escamador);
            $this->stmtRegMatPrima->bind_param("dddddd", $TOO00, $TORECO, $SWF098, $STW000, $SSO000, $GLG000);

            // Iniciar la transacción
            $this->conexion->autocommit(false);
            $this->conexion->begin_transaction();

            // Ejecutar las consultas
            $resultadoEquipo = $this->stmtRegEquipo->execute();
            $idEquipo = $this->conexion->insert_id;

            $resultadoRegMatPrima = $this -> stmtRegMatPrima -> execute();
            $idMatPrima = $this -> conexion -> insert_id;

            // Verificar si ocurrió un error en la transacción
            if (!$resultadoEquipo || !$resultadoRegMatPrima) {
                echo "Error en la consulta equipo met prima: " . $this->stmtRegEquipo->error;
                echo "Error en la consulta equipo met prima: " . $this->stmtRegMatPrima->error;
                // Si ocurre un error, hacer un rollback para deshacer los cambios
                $this->conexion->rollback();
            } else {
                // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
                $this -> stmtRegProcesoAtsme -> bind_param("siiiii", $arrayDatos['lote'], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos["aprobacionInicio"], $idEquipo, $idMatPrima);
                // Ejecutar la consulta preparada utilizando la función execute
                
                $resultadoRegEncProceso = $this->stmtRegProcesoAtsme->execute();
                
                if (!$resultadoRegEncProceso) {
                    echo "Error en la consulta encabezado: " . $this->stmtRegProcesoAtsme->error;
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
        
                    $this->stmtRegEstadoEquipo->bind_param("iiiiiiiis", $reactorLimpio, $bombaMangueraLineasLimpias, $hermeticidadReactorOk, $reactorFuncionaOk,
                    $sistemaVacioOk, $sistemaVaporOk, $sistemaEnfiramientoOk, $condensadorSinFugas, $arrayDatos['lote']);

                    $resultadoEstEquipo = $this->stmtRegEstadoEquipo->execute();

                    if (!$resultadoEstEquipo) {
                        echo "Error en la consulta estadoEquipo: " . $this->stmtRegEstadoEquipo->error;
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
        $this->stmtRegCargaToo000->bind_param("iiiiiiississ", $fichaLeída, $equipoSeguridad, $cargaBomba, $conexionesAcoplesTuberiasOk,
        $coloracionTOO, $cargaConVacio, $bloqueoAjusteVacio, $inicioCargaTOO000, $finCargaTOO000, $problemaCarga, $comentarioProblema, $lote);
    
        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        $resultado = $this->stmtRegCargaToo000->execute();

        if($resultado){
            $actualizarSeccion(2, $arrayDatos);
        }

        return $resultado;

    }


    // Métodos para insertar datos de la seccion 3 utilizando las consultas preparadas
    function registrarSegumientosSWF($loteProceso, $arraySeguimientos){
        $data = array();
        $nroHoraSeguimiento = 1;
        $resultado;

        for($i = 0; $i < 10; $i++){
            if (isset($arraySeguimientos[$i])) {
                $json = $arraySeguimientos[$i]; // Obtenemos el objeto JSON de $arraySeguimientos
                $datosSeguimiento = json_decode($json, true); // Decodificamos el objeto JSON a un array asociativo
        
                // Asignamos los valores a las variables auxiliares
                $temperatura = isset($datosSeguimiento["auxTemp"]) ? $datosSeguimiento["auxTemp"] : 0;
                $presion = isset($datosSeguimiento["auxPres"]) ? $datosSeguimiento["auxPres"] : 0;
                $kgAguaDestilada = isset($datosSeguimiento["auxAguaDest"]) ? $datosSeguimiento["auxAguaDest"] : 0;
                $observaciones = isset($datosSeguimiento["auxObs"]) ? $datosSeguimiento["auxObs"] : "";
            } else {
                // Si el índice no existe, asignamos valores predeterminados a las variables auxiliares
                $temperatura = 0;
                $presion = 0;
                $kgAguaDestilada = 0;
                $observaciones = "";
            }
            $this->stmtRegSeguimientoSwf->bind_param("idddss", $nroHoraSeguimiento, $temperatura, $presion, $kgAguaDestilada, $observaciones, $loteProceso);
            $resultado = $this->stmtRegSeguimientoSwf->execute();
            $nroHoraSeguimiento++;
        }        

        return $resultado;

    }
    function actualizarSeguimientosSWF($loteProceso, $arraySeguimientos){
        $data = array();
        $nroHoraSeguimiento = 1;
        $resultado;

        foreach($arraySeguimientos as $valor){
            $data[] = json_decode($valor, true);
        }

        foreach($data as $clave => $valor){
            $temperatura = isset($valor["auxTemp"]) ? $valor["auxTemp"] : 0;
            $presion = isset($valor["auxPres"]) ? $valor["auxPres"] : 0;
            $kgAguaDestilada = isset($valor["auxAguaDest"]) ? $valor["auxAguaDest"] : 0;
            $observaciones = isset($valor["auxObs"]) ? $valor["auxObs"] : "";

            $this->stmtActualizSeguimientoSwf->bind_param("dddssi", $temperatura, $presion, $kgAguaDestilada, $observaciones, $loteProceso, $nroHoraSeguimiento);
            $resultado = $this->stmtActualizSeguimientoSwf->execute();
            $nroHoraSeguimiento++;

        }

        return $resultado; 
    }
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
        $lote = $arrayDatos['lote'];

        $this->verificarConexion();
        
        //empieza la transaccion
        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        //se setea la consulta para el registro
        $this->stmtCargaSwf->bind_param('iiiissiisissiiiis', $fichaLeida, $equipoSeguirdad, $swf098Transparente, $reactorEnEnfriamiento,
        $inicioCargaSWF098, $finCargaSWF098, $inicioVapor, $problemaAdicionAcido, $comentarioProblema, $equipoEnReflujo, 
        $inicioReflujo, $finReflujo, $muestraAcidoSulfNecesario, $resultadoMuestra, $totalAguaDestilada, $muestraPasa, $lote);

        $resultadoRegSWF =  $this->stmtCargaSwf->execute();

        //si el sw es 1 registra todos los seguimientos del proceso sino actualiza los que se envien
        if($arrayDatos['swReflujo'] == 1){
            //se registran los seguimientos si la carga registró bien
            if($resultadoRegSWF){
                $resultadoSeguimientos = $this->registrarSegumientosSWF($arrayDatos['lote'], $arrayDatos['arraySeguimientos']);
                //si el registro de los seguimientos sale bien se comprometen si es erroneo hace rollback
                if($resultadoSeguimientos){
                    echo "todo se registro bn";
                    $this->conexion->commit();
                    return $resultadoSeguimientos;
                }else{
                    $this->conexion->rollback();
                    echo "error registro seguimientos".$this->stmtRegSeguimientoSwf->error;
                }
            } else{
                echo "error registro carga: ".$this->stmtCargaSwf->error;
                $this->conexion->rollback();
            }

        } else {
            $resultadoSeguimientos = $this->actualizarSeguimientosSWF($arrayDatos['lote'], $arrayDatos['arraySeguimientos']);
            if($resultadoSeguimientos){
                echo "todo se actualizó bn";
                $this->conexion->commit();
            }else{
                $this->conexion->rollback();
                echo "error actualizar seguimientos".$this->stmtActualizSeguimientoSwf->error;
            }
        }
    }


    // Método para insertar los seguimientos de la destilacion vacios para despues actualizarlos    
    function registrarSegumientosDest($loteProceso){
        $data = array();
        $nroHoraSeguimiento = 1;
        $resultado;

        for($index = 1; $index<11; $index++){
            $this->stmtRegSeguimientoDest->bind_param('is', $index, $loteProceso);

            $resultado = $this->stmtRegSeguimientoDest->execute();
        }
        return $resultado;
    }
    function actualizarSeguimientosDest($arraySeguimientos, $loteProceso){
        $nroHoraSeguimiento = 1;
        for ($i = 0; $i < count($arraySeguimientos); $i++){
            $jsonStringed = $arraySeguimientos[$i]; // Obtenemos el objeto JSON de $arraySeguimientos como string
            $datosSeguimiento = json_decode($jsonStringed, true); // Decodificamos el objeto JSON a un array asociativo

            // Asignamos los valores a las variables auxiliares
            $temperatura = isset($datosSeguimiento["auxTemp"]) ? $datosSeguimiento["auxTemp"] : 0;
            $presion = isset($datosSeguimiento["auxPres"]) ? $datosSeguimiento["auxPres"] : 0;
            $observaciones = isset($datosSeguimiento["auxObs"]) ? $datosSeguimiento["auxObs"] : "";
            $kgTOD100 = isset($datosSeguimiento["auxKgTod100"]) ? $datosSeguimiento["auxKgTod100"] : 0;
            $vacio = isset($datosSeguimiento["auxVacio"]) ? $datosSeguimiento["auxVacio"] : 0;

            $this->stmtActualizSegsDest->bind_param("ddidssi", $temperatura, $presion, $vacio, $kgTOD100, $observaciones, $loteProceso, $nroHoraSeguimiento);
            $resultado = $this->stmtActualizSegsDest->execute();
            $nroHoraSeguimiento++;
        } 

        return $resultado;
    }

    function registrarSeccion4($arrayDatos){

        $confirmInicioDestilacion = isset($arrayDatos['confirmInicioDestilacion']) ? $arrayDatos['confirmInicioDestilacion'] : 0;
        $inicioDestilacion = isset($arrayDatos['inicioDestilacion']) ? $arrayDatos['inicioDestilacion'] : "";
        $finDestilacion = isset($arrayDatos['finDestilacion']) ? $arrayDatos['finDestilacion'] : ""; 
        $kgTOD100 = isset($arrayDatos['kgTOD100']) ? $arrayDatos['kgTOD100'] : 0; 
        $reactorEnEnfriamiento = isset($arrayDatos['reactorEnEnfriamiento']) ? $arrayDatos['reactorEnEnfriamiento'] : 0;
        $inicioEnfriamiento = isset($arrayDatos['inicioEnfriamiento']) ? $arrayDatos['inicioEnfriamiento'] : ""; 
        $finEnfriamiento = isset($arrayDatos['finEnfriamiento']) ? $arrayDatos['finEnfriamiento'] : ""; 
        $inicioSostener = isset($arrayDatos['inicioSostener']) ? $arrayDatos['inicioSostener'] : ""; 
        $finSostener = isset($arrayDatos['finSostener']) ? $arrayDatos['finSostener'] : ""; 
        $loteProceso = $arrayDatos['lote'];
        $swDest = $arrayDatos['swDest'];

        // Verificar la conexión a la base de datos
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
                
        //empieza la transaccion
        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        $resRegDest = false;

        //sw == 1 registrar segs vacios sw == 0 actualizar segs
        if($swDest == 1){
            $this->stmtRegDest->bind_param("issiisssss", $confirmInicioDestilacion, $inicioDestilacion, $finDestilacion, $kgTOD100, 
            $reactorEnEnfriamiento, $inicioEnfriamiento, $finEnfriamiento, $inicioSostener, $finSostener, $loteProceso);
            $resRegDest = $this->stmtRegDest->execute();

            //si el destilado registro bien procede a registrar los seguimientos
            if(!$resRegDest){
                echo "Error reg destilacion ".$this->stmtRegDest->error;
            } else {
                $resCrearSegs = $this->registrarSegumientosDest($arrayDatos['lote']);
                $resultadoSeguimientos = $this->actualizarSeguimientosDest($arrayDatos['arraySeguimientos'], $arrayDatos['lote']);
                if(!$resCrearSegs && $resultadoSeguimientos){
                    echo "Error crear seguimientos destilacion ".$this->stmtRegDest->error;
                    echo "Error reg seguimientos destilacion ".$this->stmtActualizSegsDest->error;"";
                    $this->conexion->rollback();
                } else {
                    $this->conexion->commit();
                }
                return $resCrearSegs;
            }
        } else {
            $resultRegSegs = $this->actualizarSeguimientosDest($arrayDatos['arraySeguimientos'], $arrayDatos['lote']);
            if(!$resultRegSegs){
                echo "err actualizar ". $this->stmtActualizSegsDest->error;
                $this->conexion->rollback();
            } else {
                echo "registro segs destilacion exitoso";
                $this->conexion->commit();
            }
        }

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
        $this->stmtFaseDescarga->bind_param('iiiiiissssiiiss', $fichaLeída, $equipoSeguridad, $RPMCilindro, $frecuenciaVariador, $temperaturaAgua, $telaFiltrante,
        $inicioVapor, $finVapor, $inicioDescarga, $finDescarga, $kgAtsme0, $kgAtsxxx, $problemaEscamado, $comentarioProblema, $lote);

         // El siguiente comando ejecuta la consulta preparada.
        $resultado = $this->stmtFaseDescarga->execute();

        if($resultado){
            $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion5`= 1 WHERE loteProceso = ?");

            $this->stmtActualizarSeccion->bind_param('s', $arrayDatos['lote']);
            $this->stmtActualizarSeccion->execute();
        }

        return $resultado;

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

        $this->stmtConversion->bind_param('iiiddis', $cargoTod100, $adicionSso000yGlg000, $homogenizarSuspenderReposar, $kgStw000,
        $KgToreco, $torecoEtiquetado, $lote);

        $resultado = $this->stmtConversion->execute();

        if($resultado){
            $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion6`= 1 WHERE loteProceso = ?");

            $this->stmtActualizarSeccion->bind_param('s', $arrayDatos['lote']);
            $this->stmtActualizarSeccion->execute();
        }

        return $resultado;
    }

    // Método para insertar datos en la tabla utilizando la consulta preparada
    function registrarSeccion7($arrayDatos) {

        $inicioEnjuague = $arrayDatos['inicioEnjuague'] ? $arrayDatos['inicioEnjuague'] : 'NOW()';
        $finEnjuague = $arrayDatos['finEnjuague'] ? $arrayDatos['finEnjuague'] : 'NOW()';
        $tuberiasLimpias = $arrayDatos['tuberiasLimpias'] ? $arrayDatos['tuberiasLimpias'] : 0;
        $kgAguaLavada = $arrayDatos['kgAguaLavada'] ? $arrayDatos['kgAguaLavada'] : 0;
        $lote = $arrayDatos['lote'];
    
        $this->stmtLavadoEquipo->bind_param('ssids', $inicioEnjuague, $finEnjuague, $tuberiasLimpias, $kgAguaLavada, $lote);
    
        $resultado =  $this->stmtLavadoEquipo->execute();

        if($resultado){
            $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion7`= 1 WHERE loteProceso = ?");

            $this->stmtActualizarSeccion->bind_param('s', $arrayDatos['lote']);
            $this->stmtActualizarSeccion->execute();
        } else {
            var_dump($this->stmtLavadoEquipo->error);
        }

        return $resultado;
    }
}

?>