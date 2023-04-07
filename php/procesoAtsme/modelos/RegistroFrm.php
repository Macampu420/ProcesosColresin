<?php
class RegistroFrm {
    public $idProceso;
    private $conexion; // objeto mysqli que representa la conexión a la base de datos

    private $stmtActualizarSeccion, $stmtRegProcesoAtsme, $stmtRegProceso, $stmtRegEquipo, $stmtRegMatPrima, $stmtRegEstadoEquipo; 
    private $stmtRegCargaToo000;
    private $stmtFaseDescarga;
    private $stmtConversion, $stmtLavadoEquipo;
    private $stmtCargaSwf, $stmtRegSeguimientoSwf, $stmtPivoteSegsSwf, $stmtActualizarFinReflujo;
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
        $this->stmtRegProcesoAtsme = $this->conexion->prepare("INSERT INTO `tbl_proceso_atsme`(`NumLote`,`separacionFp04`, `materiaPrimaSeparada`, `problemaInicioProceso`, `comentarioProblemaInicioProceso`, `aprobacionInicio`, `IdEquipo`, `IdRegMateriaPrima`) 
             VALUES (?,?,?,?,?,?,?,?)");

        $this->stmtRegEquipo = $this->conexion->prepare("INSERT INTO equipos (dietrich1, escamador)
             VALUES (?, ?);");
        
        $this->stmtRegMatPrima = $this->conexion->prepare("INSERT INTO materiaprima (too00, torec0, swf098, stw000, sso000, glg000)
             VALUES (?, ?, ?, ?, ?, ?)");

        $this -> stmtRegEstadoEquipo = $this->conexion->prepare("INSERT INTO `tbl_estado_equipo_atsme`(`reactorLimpio`, `bombaMangueraLineasLimpias`, `hermeticidadReactorOk`, `reactorFuncionaOk`, `sistemaVacioOk`, `sistemaVaporOk`, `sistemaEnfiramientoOk`, `condensadorSinFugas`, `NumLote`)
             VALUES (?,?,?,?,?,?,?,?,?)");

        $this ->stmtRegCargaToo000 = $this->conexion->prepare("INSERT INTO `tbl_fase_carga_too000`(`fichaLeída`, `equipoSeguridad`, `cargaBomba`, `conexionesAcoplesTuberiasOk`, `coloracionTOO`, `cargaConVacio`, `bloqueoAjusteVacio`, `inicioCargaTOO000`, `finCargaTOO000`, `problemaCarga`, `comentarioProblema`, `NumLote`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
        $this ->stmtFaseDescarga = $this->conexion->prepare("INSERT INTO `tbl_fase_descarga`(`fichaLeída`, `equipoSeguridad`, `RPMCilindro`, `frecuenciaVariador`, `temperaturaAgua`, `telaFiltrante`, `inicioVapor`, `finVapor`, `inicioDescarga`, `finDescarga`, `kgAtsme0`, `kgAtsxxx`, `problemaEscamado`, `comentarioProblema`, `NumLote`) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $this ->stmtConversion = $this->conexion->prepare("INSERT INTO `tbl_conversion_tod100atoreco`(`cargoTod100`, `adicionSso000yGlg000`, `homogenizarSuspenderReposar`, `kgStw000`, `KgToreco`, `torecoEtiquetado`, `NumLote`)
             VALUES (?, ?, ?, ?, ?, ?, ?)");

        $this->stmtLavadoEquipo = $this->conexion->prepare("INSERT INTO `tbl_lavado_equipo_atsme`(`inicioEnjuague`, `finEnjuague`, `tuberiasLimpias`, `kgAguaLavada`, `NumLote`)
             VALUES (?, ?, ?, ?, ?)");

        $this->stmtCargaSwf = $this->conexion->prepare("INSERT INTO `tbl_fase_cargaswf098_atsme`(`fichaLeida`, `equipoSeguirdad`, `swf098Transparente`, `reactorEnEnfriamiento`, `inicioCargaSWF098`, `finCargaSWF098`, `inicioVapor`, `problemaAdicionAcido`, `comentarioProblema`, `equipoEnReflujo`, `inicioReflujo`, `finReflujo`, `totalAguaDestilada`, `NumLote`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $this->stmtRegSeguimientoSwf = $this->conexion->prepare("INSERT INTO `tbl_seguimiento_cargaswf098`( `nroHoraSeguimiento`, `temperatura`, `presion`, `kgAguaDestilada`, `observaciones`, `NumLote`) 
            VALUES (?,?,?,?,?,?)");
    
        $this->stmtRegDest = $this->conexion->prepare("INSERT INTO `tbl_destilacion_tod100`( `confirmInicioDestilacion`, `inicioDestilacion`, `finDestilacion`, `kgTOD100`, `reactorEnEnfriamiento`, `inicioEnfriamiento`, `finEnfriamiento`, `inicioSostener`, `finSostener`, `NumLote`)
             VALUES (?,?,?,?,?,?,?,?,?,?)");

        $this->stmtRegSeguimientoDest = $this->conexion->prepare("INSERT INTO `tbl_seguimiento_desttod100`(`nroHoraSeguimiento`, `temperatura`, `presion`, `vacio`, `kgTOD100`, `observaciones`, `NumLote`) 
             VALUES (?,'','','','','',?)");

        $this->stmtActualizSegsDest = $this->conexion->prepare("UPDATE `tbl_seguimiento_desttod100` SET `temperatura`=?,`presion`=?,`vacio`=?,`kgTOD100`=?,`observaciones`=? WHERE `NumLote` =? && `nroHoraSeguimiento`=? ");
    }

    function actualizarSeccionProceso($nroSeccion, $NumLote){
        $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion".$nroSeccion."`= 1 WHERE NumLote = ?");

        $this->stmtActualizarSeccion->bind_param('s', $NumLote);
        return $this->stmtActualizarSeccion->execute();
    }

    function verificarConexion(){
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    function registroSeccion1($arrayDatos) {


        $cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : 0;
    
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
            $this->stmtRegProceso = $this->conexion->prepare("INSERT INTO `procesos`(`NumLote`, `FechaInicial`, `Estado`, `Cedula`) VALUES (?,CURDATE(),1,?)");
            $this->stmtRegProceso->bind_param('si', $arrayDatos['lote'], $cedula);
    
            // Iniciar la transacción
            $this->conexion->autocommit(false);
            $this->conexion->begin_transaction();

            // Ejecutar las consultas
            $resultadoEquipo = $this->stmtRegEquipo->execute();
            $idEquipo = $this->conexion->insert_id;
            $resultadoRegProceso = $this->stmtRegProceso->execute();

            $resultadoRegMatPrima = $this -> stmtRegMatPrima -> execute();
            $idMatPrima = $this -> conexion -> insert_id;

            if(!$resultadoRegProceso){
                echo "Error reg proceso: " . $this->stmtRegProceso->error;
                $this->conexion->rollback();
                return;
            }

            // Verificar si ocurrió un error en la transacción
            if (!$resultadoEquipo || !$resultadoRegMatPrima) {
                echo "Error en la consulta equipo met prima: " . $this->stmtRegEquipo->error;
                echo "Error en la consulta equipo met prima: " . $this->stmtRegMatPrima->error;
                // Si ocurre un error, hacer un rollback para deshacer los cambios
                $this->conexion->rollback();
                return;
            } 

            // Unir los parámetros de la consulta preparada a los valores del array utilizando la función bind_param
            $this -> stmtRegProcesoAtsme -> bind_param("siiisiii", $arrayDatos['lote'], $arrayDatos["separacionFp04"], $arrayDatos["materiaPrimaSeparada"], $arrayDatos['problemaInicioProceso'], $arrayDatos['comentarioProblemaInicio'], $arrayDatos["aprobacionInicio"], $idEquipo, $idMatPrima);
            // Ejecutar la consulta preparada utilizando la función execute
            
            $resultadoRegEncProceso = $this->stmtRegProcesoAtsme->execute();
            
            if (!$resultadoRegEncProceso) {
                echo "Error en la consulta encabezado: " . $this->stmtRegProcesoAtsme->error;
                // Si ocurre un error, puedes hacer un rollback para deshacer los cambios
                $this->conexion->rollback();
                return;
            }
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
                return;
            } 

            $this->conexion->commit();
            // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
            // de lo contrario, devolver null
            return true;

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
    
        //empieza la transaccion
        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        // Si la consulta se ejecutó correctamente, devolver el valor del campo AUTO_INCREMENT utilizando la función insert_id
        // de lo contrario, devolver null
        $resultado = $this->stmtRegCargaToo000->execute();
        $resultadoActualizar = $this->actualizarSeccionProceso(2, $lote);

        if(!$resultado){
           $this->conexion->rollback();
           echo "error reg seccion 2".$this->stmtRegCargaToo000->error;
           return;
        }

        if(!$resultadoActualizar){
            $this->conexion->rollback();
            echo "error actualizar estado seccion 2".$this->stmtActualizarSeccion->error;
            return; 
        }

        $this->conexion->commit();
        return $resultado;

    }


    // Métodos para insertar datos de la seccion 3 utilizando las consultas preparadas
    function registrarSegumientosSWF($NumLote, $arraySeguimientos, $swReflujo){
        $pivoteSeguimiento = 0;
        $resultado  = false;
        $nroHoraSeguimiento;

        // condicion para definir pivote registro
        if($swReflujo == 1){
            $this->stmtPivoteSegsSwf = $this->conexion->prepare("SELECT `nroHoraSeguimiento` FROM `tbl_seguimiento_cargaswf098` WHERE NumLote = ? ORDER BY nroHoraSeguimiento DESC LIMIT 1");
            $this->stmtPivoteSegsSwf->bind_param('s', $NumLote);
            // Ejecutar consulta
            $this->stmtPivoteSegsSwf->execute();

            // Vincular resultado
            $this->stmtPivoteSegsSwf->bind_result($pivoteSeguimiento);

            // Recuperar resultado
            $this->stmtPivoteSegsSwf->fetch();

            $this->stmtPivoteSegsSwf->free_result();
        }

        for($pivoteSeguimiento; $pivoteSeguimiento < count($arraySeguimientos); $pivoteSeguimiento++){

            $json = $arraySeguimientos[$pivoteSeguimiento]; // Obtenemos el json del seguimiento (codificado como string) de $arraySeguimientos
            $datosSeguimiento = json_decode($json, true); // Decodificamos el json del seguimiento a un array asociativo
            $nroHoraSeguimiento = $pivoteSeguimiento + 1;

            // Asignamos los valores a las variables auxiliares
            $temperatura = isset($datosSeguimiento["auxTemp"]) ? $datosSeguimiento["auxTemp"] : 0;
            $presion = isset($datosSeguimiento["auxPres"]) ? $datosSeguimiento["auxPres"] : 0;
            $kgAguaDestilada = isset($datosSeguimiento["auxAguaDest"]) ? $datosSeguimiento["auxAguaDest"] : 0;
            $observaciones = isset($datosSeguimiento["auxObs"]) ? $datosSeguimiento["auxObs"] : "";
            
            //vinculacion de parametros
            $this->stmtRegSeguimientoSwf->bind_param("idddss", $nroHoraSeguimiento, $temperatura, $presion, $kgAguaDestilada, $observaciones, $NumLote);
            $resultado = $this->stmtRegSeguimientoSwf->execute();
            
            //si el seguimiento tiene muestra se hace el registro de esta
            if(isset($datosSeguimiento['muestra'])){
                //registro carga
                $this->stmtRegMuestraSwf = $this->conexion->prepare("INSERT INTO `tbl_muestra_segs_swf`(`nroHora`, `muestraNecesaria`, `resultadoMuestra`, `muestraCumple`, `NumLote`) 
                VALUES (?,?,?,?,?)");

                $muestra = $datosSeguimiento['muestra'];
                $muestraNecesaria = isset($muestra['muestraNecesaria']) ? $muestra['muestraNecesaria'] : 0;
                $resultadoMuestra = isset($muestra['resultadoMuestra']) ? $muestra['resultadoMuestra'] : 0;
                $muestraCumple = isset($muestra['muestraCumple']) ? $muestra['muestraCumple'] : 0;

                $this->stmtRegMuestraSwf->bind_param('iidis', $nroHoraSeguimiento, $muestraNecesaria, $resultadoMuestra, $muestraCumple, $NumLote);

                $resultado = $this->stmtRegMuestraSwf->execute();
                var_dump($resultado);
            } 
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
        $totalAguaDestilada = isset($arrayDatos['totalAguaDestilada']) ? $arrayDatos['totalAguaDestilada'] : 0;
        $lote = $arrayDatos['lote'];
        $swReflujo = $arrayDatos['swReflujo'];

        $this->verificarConexion();
        
        //empieza la transaccion
        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        //se setea la consulta para el registro
        $this->stmtCargaSwf->bind_param('iiiissiisissds', $fichaLeida, $equipoSeguirdad, $swf098Transparente, $reactorEnEnfriamiento,
        $inicioCargaSWF098, $finCargaSWF098, $inicioVapor, $problemaAdicionAcido, $comentarioProblema, $equipoEnReflujo, 
        $inicioReflujo, $finReflujo, $totalAguaDestilada, $lote);        

        //registra todos los seguimientos del proceso que se envien
        if($swReflujo == 0){
            $resultadoRegSWF =  $this->stmtCargaSwf->execute();
            $resultadoActualizar = $this->actualizarSeccionProceso(3, $lote);

            if(!$resultadoRegSWF){
                $this->conexion->rollback();
                echo "error reg seccion 3".$this->stmtCargaSwf->error;
                return false;
            }
            if(!$resultadoActualizar){
                $this->conexion->rollback();
                echo "error actualizar estado seccion 3".$this->stmtActualizarSeccion->error;
                return false; 
            }
        } else {
            $this->stmtActualizarFinReflujo = $this->conexion->prepare("UPDATE `tbl_fase_cargaswf098_atsme` SET `finReflujo`= ?, `totalAguaDestilada`= ? WHERE `NumLote` = ?");
            $this->stmtActualizarFinReflujo->bind_param('sss', $finReflujo, $totalAguaDestilada, $lote);
    
            $resAcutializarFinReflujo = $this->stmtActualizarFinReflujo->execute();
    
            var_dump( $this->conexion->affected_rows );
    
            if(!$resAcutializarFinReflujo){
                $this->conexion->rollback();
                echo "error actualizar fin reflujo: ".$this->stmtActualizarFinReflujo->error;
                return false;
            }
        }

        $resultadoSeguimientos = $this->registrarSegumientosSWF($arrayDatos['lote'], $arrayDatos['arraySeguimientos'], $arrayDatos['swReflujo']);

        if(!$resultadoSeguimientos){
            $this->conexion->rollback();
            echo "error reg seguims seccion 3".$this->stmtRegSeguimientoSwf->error;
            return false;
        }

        $this->conexion->commit();
        return $resultadoSeguimientos;

    }


    // Método para insertar los seguimientos de la destilacion vacios para despues actualizarlos    
    function registrarSegumientosDest($NumLote){
        $data = array();
        $resultado;

        for($index = 1; $index<9; $index++){
            $this->stmtRegSeguimientoDest->bind_param('is', $index, $NumLote);

            $resultado = $this->stmtRegSeguimientoDest->execute();
        }
        return $resultado;
    }
    function actualizarSeguimientosDest($arraySeguimientos, $NumLote){
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

            $this->stmtActualizSegsDest->bind_param("ddidssi", $temperatura, $presion, $vacio, $kgTOD100, $observaciones, $NumLote, $nroHoraSeguimiento);
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
        $NumLote = $arrayDatos['lote'];
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
            $reactorEnEnfriamiento, $inicioEnfriamiento, $finEnfriamiento, $inicioSostener, $finSostener, $NumLote);
                        
            $resRegDest = $this->stmtRegDest->execute();
            $resCrearSegs = $this->registrarSegumientosDest($arrayDatos['lote']);
            $resultadoSeguimientos = $this->actualizarSeguimientosDest($arrayDatos['arraySeguimientos'], $arrayDatos['lote']);
            $resultadoActualizar = $this->actualizarSeccionProceso(4, $NumLote);

            if(!$resRegDest){
                echo "Error reg destilacion: ".$this->stmtRegDest->error;
                $this->conexion->rollback();
                return false;
            }

            if(!$resCrearSegs){
                echo "Error crear seguimientos destilacion: ".$this->stmtRegDest->error;
                $this->conexion->rollback();
                return false;
            } 

            if(!$resultadoSeguimientos){
                echo "Error reg seguimientos destilacion: ".$this->stmtActualizSegsDest->error;"";
                $this->conexion->rollback();
                return false;
            }

            if(!$resultadoActualizar){
                echo "Error actualiz estado seccion 4: ".$this->stmtActualizarSeccion->error;"";
                $this->conexion->rollback();
                return false;
            }
            
            $this->conexion->commit();
            return true;
            
        } else {

            $this->stmtActualizarFinalDest = $this->conexion->prepare("UPDATE `tbl_destilacion_tod100` SET `finDestilacion`=?,`kgTOD100`=?, `reactorEnEnfriamiento`=?,`inicioEnfriamiento`=?,`finEnfriamiento`=?,`inicioSostener`=?,`finSostener`=? WHERE `NumLote` = ?");
            $this->stmtActualizarFinalDest->bind_param('siisssss', $finDestilacion, $kgTOD100, $reactorEnEnfriamiento, $inicioEnfriamiento, $finEnfriamiento, $inicioSostener, $finSostener, $NumLote);
           
            $resultActualizarFinalDest = $this->stmtActualizarFinalDest->execute();
            $resultRegSegs = $this->actualizarSeguimientosDest($arrayDatos['arraySeguimientos'], $arrayDatos['lote']);
            if(!$resultRegSegs){
                echo "err actualizar dest: ". $this->stmtActualizSegsDest->error;
                $this->conexion->rollback();
                return false;
            }
            if(!$resultActualizarFinalDest){
                echo "err actualizar finDest: ". $this->stmtActualizarFinalDest->error;
                $this->conexion->rollback();
                return false;
            }
            echo "registro segs destilacion exitoso";
            $this->conexion->commit();
            return true;

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
            $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion5`= 1 WHERE NumLote = ?");

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
            $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion6`= 1 WHERE NumLote = ?");

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
    
    
        $this->stmtActualizarSeccion = $this->conexion->prepare("UPDATE `tbl_proceso_atsme` SET `seccion7`= 1 WHERE NumLote = ?");
        $this->stmtActualizarProceso = $this->conexion->prepare("UPDATE `procesos` SET `FechaFinal`=CURDATE(),`HoraFinal`=CURTIME(),`Estado`= 2 WHERE `NumLote` = ?");
        
        $this->stmtLavadoEquipo->bind_param('ssids', $inicioEnjuague, $finEnjuague, $tuberiasLimpias, $kgAguaLavada, $lote);
        $this->stmtActualizarSeccion->bind_param('s', $arrayDatos['lote']);
        $this->stmtActualizarProceso->bind_param('s', $lote);

        $resultado =  $this->stmtLavadoEquipo->execute();
        $resActualizarSeccion = $this->stmtActualizarSeccion->execute();
        $resActualizarProceso = $this->stmtActualizarProceso->execute();

        if(!$resultado){
            echo "error reg lavado equipo: ".$this->stmtLavadoEquipo->error;
            $this->conexion->rollback();
            return false;
        }
        if(!$resActualizarSeccion){
            echo "error actualizar seccion 7: ".$this->stmtActualizarSeccion->error;
            $this->conexion->rollback();
            return false;
        }
        if(!$resActualizarProceso){
            echo "error actualizar proceso: ".$this->stmtActualizarProceso->error;
            $this->conexion->rollback();
            return false;
        }

        return $resActualizarProceso;
    }

    function eliminarProceso($NumLote){
        $this->stmtEliminar = $this->conexion->prepare('UPDATE `procesos` SET `Estado`= 3 WHERE `NumLote` = ?');
        $this->stmtEliminar->bind_param('s', $NumLote);
        $resultado = $this->stmtEliminar->execute();
        return $resultado;
    }
}

?>