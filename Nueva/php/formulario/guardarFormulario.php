<?php   

session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../inicio/session.html");
	exit();
	
}

require_once "../conexion/conexion.php";
require_once "acciones.php";

$conex = new conection();
$result = $conex->conex();
date_default_timezone_set('America/Bogota');

$id     = $_POST['id'];
$final  = false;
$_form  = new formulario();
$query  = $_form->get_formulario($id);


if($_POST['pasos'] == 1){

    // Actualización Equipos
    $dietrich2  = isset($_POST["dietrich2"])    ?   isset($_POST["dietrich2"])   : 0;
    $fLukas     = isset($_POST["fLukas"])       ?   isset($_POST["fLukas"])      : 0;
    $contOlor   = isset($_POST["contOlor"])     ?   isset($_POST["contOlor"])    : 0;
    
    $queryEquipos = "UPDATE Equipos SET dietrich2 = '$dietrich2', fLukas = '$fLukas', contOlor = '$contOlor' WHERE IdProceso = '$id';";
    // echo $queryEquipos; die();
    $query = mysqli_query($result,$queryEquipos);
    // Finaliza actialización de Equipos
    
    // Actualización Materia Prima
    $nan000  = isset($_POST["nan000"])     ? $_POST["nan000"]    :'';
    $swf098  = isset($_POST["swf098"])     ? $_POST["swf098"]    :'';
    $stw000  = isset($_POST["stw000"])     ? $_POST["stw000"]    :'';
    $fdo037  = isset($_POST["fdo037"])     ? $_POST["fdo037"]    :'';
    $myo000  = isset($_POST["myo000"])     ? $_POST["myo000"]    :'';
    $stw0002 = isset($_POST["stw0002"])    ? $_POST["stw0002"]   :'';
    $csc050  = isset($_POST["csc050"])     ? $_POST["csc050"]    :'';
    $stw0003 = isset($_POST["stw0003"])    ? $_POST["stw0003"]   :'';
    
    $queryMateria = "UPDATE MateriaPrima SET nan000 = '$nan000', swf098 = '$swf098', stw000 = '$stw000', fdo037 = '$fdo037', myo000 = '$myo000', stw0002 = '$stw0002', csc050 = '$csc050', stw0003 = '$stw0003' WHERE IdProceso = '$id';";
    $query = mysqli_query($result,$queryMateria);

    $MatPriFP04     = isset($_POST["MatPriFP04"])    ? $_POST["MatPriFP04"]      :'';
    $MatPriSeparada = isset($_POST["MatPriSeparada"]) ? $_POST["MatPriSeparada"]   :'';

    $queryEntregaBodega = "UPDATE NFO SET MatPriFP04 = '$MatPriFP04', MatPriSeparada = '$MatPriSeparada' WHERE IdProceso = '$id';";
    
    $query = mysqli_query($result,$queryEntregaBodega);
    // Finaliza actualización Materia Prima
}

if($_POST['pasos'] == 2){

    $ReactorLimpio  = isset($_POST["ReactorLimpio"]) ? $_POST["ReactorLimpio"]   :'';
    
    // Actualización checks varios
    $HermeticidadReactor    = isset($_POST["HermeticidadReactor"])  ? $_POST["HermeticidadReactor"] :'';
    $ReactorFunciona        = isset($_POST["ReactorFunciona"])      ? $_POST["ReactorFunciona"]     :'';
    $VacioFunciona          = isset($_POST["VacioFunciona"])        ? $_POST["VacioFunciona"]       :'';
    $VaporFunciona          = isset($_POST["VaporFunciona"])        ? $_POST["VaporFunciona"]       :'';
    $EnfriamientoFunciona   = isset($_POST["EnfriamientoFunciona"]) ? $_POST["EnfriamientoFunciona"]:'';
    $EmisionesFunciona      = isset($_POST["EmisionesFunciona"])    ? $_POST["EmisionesFunciona"]   :'';
    $phsodatanque           = isset($_POST["phsodatanque"])         ? $_POST["phsodatanque"]        :'';
    $CondensadorFunciona    = isset($_POST["CondensadorFunciona"])  ? $_POST["CondensadorFunciona"] :'';
    
    $ApruebaInicio      = isset($_POST["ApruebaInicio"])    ? $_POST["ApruebaInicio"]  :'';
    $RazonesNoAprob     = isset($_POST["RazonesNoAprob"])   ? $_POST["RazonesNoAprob"] :'';
    
    $queryChecks = "UPDATE NFO SET ReactorLimpio = '$ReactorLimpio', HermeticidadReactor = '$HermeticidadReactor', ReactorFunciona = '$ReactorFunciona', VacioFunciona = '$VacioFunciona', VaporFunciona = '$VaporFunciona', EnfriamientoFunciona = '$EnfriamientoFunciona', EmisionesFunciona = '$EmisionesFunciona', phsodatanque = '$phsodatanque', CondensadorFunciona = '$CondensadorFunciona', ApruebaInicio = '$ApruebaInicio', RazonesNoAprob = '$RazonesNoAprob' WHERE IdProceso = '$id';";
    
    $query = mysqli_query($result,$queryChecks);
    
}

if($_POST['pasos'] == 3){

    $SeguridadNaftaleno     = isset($_POST["SeguridadNaftaleno"])   ? $_POST["SeguridadNaftaleno"]  :'';
    $EquipoNaftaleno        = isset($_POST["EquipoNaftaleno"])      ? $_POST["EquipoNaftaleno"]     :'';
    $EnfriamientoCerrado    = isset($_POST["EnfriamientoCerrado"])  ? $_POST["EnfriamientoCerrado"] :'';
    
    // Paso 5   28
    $triturado              = isset($_POST["triturado"])           ? $_POST["triturado"]          :'';
    $fusion                 = isset($_POST["fusion"])              ? $_POST["fusion"]             :'';
    $horainiciocarganaf     = isset($_POST["horainiciocarganaf"])  ? $_POST["horainiciocarganaf"] :'';
    $horafincarganaf        = isset($_POST["horafincarganaf"])     ? $_POST["horafincarganaf"]    :'';
    $ValvBloqueo            = isset($_POST["ValvBloqueo"])         ? $_POST["ValvBloqueo"]        :'';
    $AbrirControlOlores     = isset($_POST["AbrirControlOlores"])  ? $_POST["AbrirControlOlores"] :'';
    $fusion                 = isset($_POST["fusion"])              ? $_POST["fusion"] :'';
    $horainiciofusionnaf    = isset($_POST["horainiciofusionnaf"]) ? $_POST["horainiciofusionnaf"]:'';
    $Estartazos             = isset($_POST["Estartazos"])          ? $_POST["Estartazos"]         :'';
    $temp1                  = $_POST["temp1"] != ''                ? $_POST["temp1"]              :'';
    $presion1               = $_POST["presion1"] != ''             ? $_POST["presion1"]           :'';
    $horafinfusionnaf       = isset($_POST["horafinfusionnaf"])    ? $_POST["horafinfusionnaf"]   :'';
    $AgitadorOk             = isset($_POST["AgitadorOk"])          ? $_POST["AgitadorOk"]         :'';
    $ProblemaFund           = isset($_POST["ProblemaFund"])        ? $_POST["ProblemaFund"]       :'';
    $ProblemaFundirNaf      = $_POST["ProblemaFundirNaf"] != ''    ? $_POST["ProblemaFundirNaf"]  :'';

    $queryNfo = "UPDATE NFO SET SeguridadNaftaleno = '$SeguridadNaftaleno', EquipoNaftaleno = '$EquipoNaftaleno', EnfriamientoCerrado = '$EnfriamientoCerrado', ValvBloqueo = '$ValvBloqueo', AbrirControlOlores = '$AbrirControlOlores', Estartazos = '$Estartazos', AgitadorOk = '$AgitadorOk', ProblemaFund = '$ProblemaFund', ProblemaFundirNaf = '$ProblemaFundirNaf' WHERE IdProceso = '$id';";
    $query = mysqli_query($result,$queryNfo);

    
    if($triturado == 'triturado'){
        $query_etapas  = $_form->get_formulario_etapas($id,'triturado');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa1 = "UPDATE Etapas SET HoraInicio = '$horainiciocarganaf', HoraFin = '$horafincarganaf' WHERE IdProceso = '$id' AND NombreEtapa = '$triturado';";
        }else{
            $queryEtapa1 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, HoraFin) VALUE ('$id','$triturado','$horainiciocarganaf','$horafincarganaf');";
        }
        
        $query = mysqli_query($result,$queryEtapa1);
    }
    
    if($fusion == 'fusion'){
        $query_etapas  = $_form->get_formulario_etapas($id,'fusion');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa2 = "UPDATE Etapas SET HoraInicio = '$horainiciofusionnaf', HoraFin = '$horafinfusionnaf', Temperatura = '$temp1', Presion = '$presion1' WHERE IdProceso = '$id' AND NombreEtapa = '$fusion';";
        }else{
            $queryEtapa2 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, HoraFin, Temperatura, Presion) VALUE ('$id','$fusion','$horainiciofusionnaf','$horafinfusionnaf','$temp1','$presion1');";
        }
        
        $query = mysqli_query($result,$queryEtapa2);
    }

}

if($_POST['pasos'] == 4){
    // Paso 6
    $SeguridadSulfurico   = isset($_POST["SeguridadSulfurico"]) ? $_POST["SeguridadSulfurico"]  :'';
    $EquipoSulfurico      = isset($_POST["EquipoSulfurico"])    ? $_POST["EquipoSulfurico"]     :'';
    $sulfurico            = isset($_POST["sulfurico"])          ? $_POST["sulfurico"]           :'';
    $sulfurico1           = isset($_POST["sulfurico1"])         ? $_POST["sulfurico1"]          :'';
    $sostener1            = isset($_POST["sostener1"])          ? $_POST["sostener1"]           :'';
    $sostener2            = isset($_POST["sostener2"])          ? $_POST["sostener2"]           :'';
    $sostener3            = isset($_POST["sostener3"])          ? $_POST["sostener3"]           :'';
    $enfriado1            = isset($_POST["enfriado1"])          ? $_POST["enfriado1"]           :'';
    $enfriado2            = isset($_POST["enfriado2"])          ? $_POST["enfriado2"]           :'';

    // Paso 7     41
    $horainiciocargaswfo   = $_POST["horainiciocargaswfo"] != ''     ? $_POST["horainiciocargaswfo"]    :'';
    $horafincargaswfo      = $_POST["horafincargaswfo"] != ''        ? $_POST["horafincargaswfo"]       :'';
    $CierreControlOlores   = isset($_POST["CierreControlOlores"])    ? $_POST["CierreControlOlores"]    :'';
    $horainiciocargaswfo2  = $_POST["horainiciocargaswfo2"] != ''    ? $_POST["horainiciocargaswfo2"]   :'';
    $horafincargaswfo2     = $_POST["horafincargaswfo2"] != ''       ? $_POST["horafincargaswfo2"]      :'';
    $tempswfo1             = $_POST["tempswfo1"] != ''               ? $_POST["tempswfo1"]              :'';
    $presionswfo1          = $_POST["presionswfo1"] != ''            ? $_POST["presionswfo1"]           :'';
    $Vapor                 = isset($_POST["Vapor"])                  ? $_POST["Vapor"]                  :'';
    $horainiciosostenertemp= $_POST["horainiciosostenertemp"] != ''  ? $_POST["horainiciosostenertemp"] :'';
    $temphr1               = $_POST["temphr1"] != ''                 ? $_POST["temphr1"]                :'';
    $presionhr1            = $_POST["presionhr1"] != ''              ? $_POST["presionhr1"]             :'';
    $temphr2               = $_POST["temphr2"] != ''                 ? $_POST["temphr2"]                :'';
    $presionhr2            = $_POST["presionhr2"] != ''              ? $_POST["presionhr2"]             :'';
    $temphr3               = $_POST["temphr3"] != ''                 ? $_POST["temphr3"]                :'';
    $presionhr3            = $_POST["presionhr3"] != ''              ? $_POST["presionhr3"]             :'';
    $horafinsostenertemp   = $_POST["horafinsostenertemp"] != ''    ? $_POST["horafinsostenertemp"]    :'';
    
    $ProblemaSWFO          = $_POST["ProblemaSWFO"] != ''            ? $_POST["ProblemaSWFO"]           :'';
    $TextoProblemaSWFO     = $_POST["TextoProblemaSWFO"] != ''       ? $_POST["TextoProblemaSWFO"]      :'';
    $tempenfriado          = $_POST["tempenfriado"] != ''            ? $_POST["tempenfriado"]           :'';
    $presionenfriado       = $_POST["presionenfriado"] != ''         ? $_POST["presionenfriado"]        :'';
    $tempadicionstw        = $_POST["tempadicionstw"] != ''          ? $_POST["tempadicionstw"]         :'';
    $presionadicionstw     = $_POST["presionadicionstw"] != ''       ? $_POST["presionadicionstw"]      :'';
    $EvacuarCamisa         = isset($_POST["EvacuarCamisa"])          ? $_POST["EvacuarCamisa"]          :'';
    $SuministroVapor       = isset($_POST["SuministroVapor"])        ? $_POST["SuministroVapor"]        :'';
    $SeguridadFDO          = isset($_POST["SeguridadFDO"])       ? $_POST["SeguridadFDO"]       :'';
    $EquipoFDO   = isset($_POST["EquipoFDO"])    ? $_POST["EquipoFDO"]    :'';

    $queryNfo = "UPDATE NFO SET SeguridadSulfurico = '$SeguridadSulfurico', EquipoSulfurico = '$EquipoSulfurico', CierreControlOlores = '$CierreControlOlores', Vapor = '$Vapor', ProblemaSWFO = '$ProblemaSWFO', TextoProblemaSWFO = '$TextoProblemaSWFO', EvacuarCamisa = '$EvacuarCamisa', SuministroVapor = '$SuministroVapor', SeguridadFDO = '$SeguridadFDO', EquipoFDO = '$EquipoFDO' WHERE IdProceso = '$id';";
    
    $query = mysqli_query($result,$queryNfo);

    if($sulfurico == 'sulfurico'){
        $query_etapas  = $_form->get_formulario_etapas($id,'sulfurico');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa3 = "UPDATE Etapas SET HoraInicio = '$horainiciocargaswfo', HoraFin = '$horafincargaswfo' WHERE IdProceso = '$id' AND NombreEtapa = '$sulfurico';";
        }else{
            $queryEtapa3 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, HoraFin) VALUE ('$id','$sulfurico','$horainiciocargaswfo','$horafincargaswfo');";
        }
        
        $query = mysqli_query($result,$queryEtapa3);
    }

    if($sulfurico1 == 'sulfurico1'){
        $query_etapas  = $_form->get_formulario_etapas($id,'sulfurico1');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa4 = "UPDATE Etapas SET HoraInicio = '$horainiciocargaswfo', HoraFin = '$horafincargaswfo', Temperatura = '$tempswfo1', Presion = '$presionswfo1' WHERE IdProceso = '$id' AND NombreEtapa = '$sulfurico1';";
        }else{
            $queryEtapa4 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, HoraFin, Temperatura, Presion) VALUE ('$id','$sulfurico1','$horainiciocargaswfo','$horafincargaswfo','$tempswfo1','$presionswfo1');";
        }
        
        $query = mysqli_query($result,$queryEtapa4);
    }

    if($sostener1 == 'sostener1'){
        $query_etapas  = $_form->get_formulario_etapas($id,'sostener1');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa5 = "UPDATE Etapas SET HoraInicio = '$horainiciosostenertemp', Temperatura = '$temphr1', Presion = '$presionhr1' WHERE IdProceso = '$id' AND NombreEtapa = '$sostener1';";
        }else{
            $queryEtapa5 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, Temperatura, Presion) VALUE ('$id','$sostener1','$horainiciosostenertemp','$temphr1','$presionhr1');";
        }
        
        $query = mysqli_query($result,$queryEtapa5);
    }

    if($sostener2 == 'sostener2'){
        $query_etapas  = $_form->get_formulario_etapas($id,'sostener2');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa6 = "UPDATE Etapas SET Temperatura = '$temphr1', Presion = '$presionhr1' WHERE IdProceso = '$id' AND NombreEtapa = '$sostener2';";
        }else{
            $queryEtapa6 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion) VALUE ('$id','$sostener2','$temphr1','$presionhr1');";
        }
        
        $query = mysqli_query($result,$queryEtapa6);
    }

    if($sostener3 == 'sostener3'){
        $query_etapas  = $_form->get_formulario_etapas($id,'sostener3');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa7 = "UPDATE Etapas SET Temperatura = '$temphr1', Presion = '$presionhr1',HoraFin = '$horafinsostenertemp' WHERE IdProceso = '$id' AND NombreEtapa = '$sostener3';";
        }else{
            $queryEtapa7 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, HoraFin) VALUE ('$id','$sostener3','$temphr1','$presionhr1','$horafinsostenertemp');";
        }
        
        $query = mysqli_query($result,$queryEtapa7);
    }

    if($enfriado1 == 'enfriado1'){
        $query_etapas  = $_form->get_formulario_etapas($id,'enfriado1');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa8 = "UPDATE Etapas SET Temperatura = '$tempenfriado', Presion = '$presionenfriado' WHERE IdProceso = '$id' AND NombreEtapa = '$enfriado1';";
        }else{
            $queryEtapa8 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion) VALUE ('$id','$enfriado1','$tempenfriado','$presionenfriado');";
        }
        
        $query = mysqli_query($result,$queryEtapa8);
    }

    if($enfriado2 == 'enfriado2'){
        $query_etapas  = $_form->get_formulario_etapas($id,'enfriado2');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa9 = "UPDATE Etapas SET Temperatura = '$tempadicionstw', Presion = '$presionadicionstw' WHERE IdProceso = '$id' AND NombreEtapa = '$enfriado2';";
        }else{
            $queryEtapa9 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion) VALUE ('$id','$enfriado2','$tempadicionstw','$presionadicionstw');";
        }
        
        $query = mysqli_query($result,$queryEtapa9);
    }
}

if($_POST['pasos'] == 5){
 
    //  Paso 8      67
    $LineaTierraOk      = isset($_POST["LineaTierraOk"])        ? $_POST["LineaTierraOk"]       :'';
    $BombaNeumaticaOk   = isset($_POST["BombaNeumaticaOk"])     ? $_POST["BombaNeumaticaOk"]    :'';
    $ConexionOk         = isset($_POST["ConexionOk"])           ? $_POST["ConexionOk"]          :'';
    $MangueraOk         = isset($_POST["MangueraOk"])           ? $_POST["MangueraOk"]          :'';
    $LineaCargaOk       = isset($_POST["LineaCargaOk"])         ? $_POST["LineaCargaOk"]        :'';
    $ValvulasCerradas   = isset($_POST["ValvulasCerradas"])     ? $_POST["ValvulasCerradas"]    :'';
    $CapacidadTanque    = isset($_POST["CapacidadTanque"])      ? $_POST["CapacidadTanque"]     :'';
    $carga7001          = isset($_POST["carga7001"])            ? $_POST["carga7001"]           :'';
    $carga7002          = isset($_POST["carga7002"])            ? $_POST["carga7002"]           :'';
    $carga7003          = isset($_POST["carga7003"])            ? $_POST["carga7003"]           :'';
    $carga7004          = isset($_POST["carga7004"])            ? $_POST["carga7004"]           :'';
    $carga7005          = isset($_POST["carga7005"])            ? $_POST["carga7005"]           :'';
    $reaccion1          = isset($_POST["reaccion1"])            ? $_POST["reaccion1"]           :'';
    $reaccion2          = isset($_POST["reaccion2"])            ? $_POST["reaccion2"]           :'';
    $reaccion3          = isset($_POST["reaccion3"])            ? $_POST["reaccion3"]           :'';
    $reaccion4          = isset($_POST["reaccion4"])            ? $_POST["reaccion4"]           :'';
    $reaccion5          = isset($_POST["reaccion5"])            ? $_POST["reaccion5"]           :'';
    $reaccion6          = isset($_POST["reaccion6"])            ? $_POST["reaccion6"]           :'';
    $reaccion7          = isset($_POST["reaccion7"])            ? $_POST["reaccion7"]           :'';
    
    // Paso 9
    $horainicioadc   = $_POST["horainicioadc"] != ''   ? $_POST["horainicioadc"]   :'';
    $tempadc1        = isset($_POST["tempadc1"])        ? $_POST["tempadc1"]        :'';
    $presionadc1     = isset($_POST["presionadc1"])     ? $_POST["presionadc1"]     :'';
    $comentarioadc1  = isset($_POST["comentarioadc1"])  ? $_POST["comentarioadc1"]  :'';
    $tempadc2        = isset($_POST["tempadc2"])        ? $_POST["tempadc2"]        :'';
    $presionadc2     = isset($_POST["presionadc2"])     ? $_POST["presionadc2"]     :'';
    $comentarioadc2  = isset($_POST["comentarioadc2"])  ? $_POST["comentarioadc2"]  :'';
    $tempadc3        = isset($_POST["tempadc3"])        ? $_POST["tempadc3"]        :'';
    $presionadc3     = isset($_POST["presionadc3"])     ? $_POST["presionadc3"]     :'';
    $comentarioadc3  = isset($_POST["comentarioadc3"])  ? $_POST["comentarioadc3"]  :'';
    $tempadc4        = isset($_POST["tempadc4"])        ? $_POST["tempadc4"]        :'';
    $presionadc4     = isset($_POST["presionadc4"])     ? $_POST["presionadc4"]     :'';
    $comentarioadc4  = isset($_POST["comentarioadc4"])  ? $_POST["comentarioadc4"]  :'';
    $tempadc5        = isset($_POST["tempadc5"])        ? $_POST["tempadc5"]        :'';
    $presionadc5     = isset($_POST["presionadc5"])     ? $_POST["presionadc5"]     :'';
    $comentarioadc5  = isset($_POST["comentarioadc5"])  ? $_POST["comentarioadc5"]  :'';
    $horafinadc      = $_POST["horafinadc"] != ''       ? $_POST["horafinadc"]      : NULL;
    $horainicioreac  = $_POST["horainicioreac"] != ''   ? $_POST["horainicioreac"]  : NULL;
    $tempreac1       = isset($_POST["tempreac1"])       ? $_POST["tempreac1"]       :'';
    $presionreac1    = isset($_POST["presionreac1"])    ? $_POST["presionreac1"]    :'';
    $comentarioreac1 = isset($_POST["comentarioreac1"]) ? $_POST["comentarioreac1"] :'';
    $tempreac2      = isset($_POST["tempreac2"])      ? $_POST["tempreac2"]      :'';
    $presionreac2    = isset($_POST["presionreac2"])    ? $_POST["presionreac2"]   :'';
    $comentarioreac2 = isset($_POST["comentarioreac2"]) ? $_POST["comentarioreac2"] :'';
    $tempreac3       = isset($_POST["tempreac3"])       ? $_POST["tempreac3"]       :'';
    $presionreac3    = isset($_POST["presionreac3"])    ? $_POST["presionreac3"]    :'';
    $comentarioreac3 = isset($_POST["comentarioreac3"]) ? $_POST["comentarioreac3"] :'';
    $tempreac4       = isset($_POST["tempreac4"])       ? $_POST["tempreac4"]       :'';
    $presionreac4    = isset($_POST["presionreac4"])    ? $_POST["presionreac4"]    :'';
    $comentarioreac4 = isset($_POST["comentarioreac4"]) ? $_POST["comentarioreac4"] :'';
    $tempreac5       = isset($_POST["tempreac5"])       ? $_POST["tempreac5"]       :'';
    $presionreac5    = isset($_POST["presionreac5"])    ? $_POST["presionreac5"]    :'';
    $comentarioreac5 = isset($_POST["comentarioreac5"]) ? $_POST["comentarioreac5"] :'';
    $tempreac6       = isset($_POST["tempreac6"])       ? $_POST["tempreac6"]       :'';
    $presionreac6    = isset($_POST["presionreac6"])    ? $_POST["presionreac6"]    :'';
    $comentarioreac6 = isset($_POST["comentarioreac6"]) ? $_POST["comentarioreac6"] :'';
    $tempreac7       = isset($_POST["tempreac7"])       ? $_POST["tempreac7"]       :'';
    $presionreac7    = isset($_POST["presionreac7"])    ? $_POST["presionreac7"]    :'';
    $comentarioreac7 = isset($_POST["comentarioreac7"]) ? $_POST["comentarioreac7"] :'';
    $horafinreac     = $_POST["horafinreac"] != ''     ? $_POST["horafinreac"]     :'';
    $ProblemaCondensacion       = isset($_POST["ProblemaCondensacion"])     ? $_POST["ProblemaCondensacion"]        :'';
    $TextoProblemaCondensacion  = isset($_POST["TextoProblemaCondensacion"])? $_POST["TextoProblemaCondensacion"]   :'';

    $queryNfo = "UPDATE NFO SET LineaTierraOk = '$LineaTierraOk', BombaNeumaticaOk = '$BombaNeumaticaOk', ConexionOk = '$ConexionOk', MangueraOk = '$MangueraOk', LineaCargaOk = '$LineaCargaOk', ValvulasCerradas = '$ValvulasCerradas', CapacidadTanque = '$CapacidadTanque', ProblemaCondensacion = '$ProblemaCondensacion', TextoProblemaCondensacion = '$TextoProblemaCondensacion' WHERE IdProceso = '$id';";
    
    $query = mysqli_query($result,$queryNfo);

    if($carga7001 == 'carga7001'){
        $query_etapas  = $_form->get_formulario_etapas($id,'carga7001');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa1 = "UPDATE Etapas SET HoraInicio = '$horainicioadc', Temperatura = '$tempadc1',Presion = '$presionadc1', Comentario = '$comentarioadc1' WHERE IdProceso = '$id' AND NombreEtapa = '$carga7001';";
        }else{
            $queryEtapa1 = "INSERT INTO Etapas (IdProceso, NombreEtapa, HoraInicio, Temperatura, Presion, Comentario) VALUE ('$id','$carga7001','$horainicioadc','$tempadc1', '$presionadc1', '$comentarioadc1');";
        }
        $query = mysqli_query($result,$queryEtapa1);
    }

    if($carga7002 == 'carga7002'){
        $query_etapas  = $_form->get_formulario_etapas($id,'carga7002');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa2 = "UPDATE Etapas SET Temperatura = '$tempadc2',Presion = '$presionadc2', Comentario = '$comentarioadc2' WHERE IdProceso = '$id' AND NombreEtapa = '$carga7002';";
        }else{
            $queryEtapa2 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$carga7002','$tempadc2', '$presionadc2', '$comentarioadc2');";
        }
        $query = mysqli_query($result,$queryEtapa2);
    }

    if($carga7003 == 'carga7003'){
        $query_etapas  = $_form->get_formulario_etapas($id,'carga7003');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa3 = "UPDATE Etapas SET Temperatura = '$tempadc3',Presion = '$presionadc3', Comentario = '$comentarioadc3' WHERE IdProceso = '$id' AND NombreEtapa = '$carga7003';";
        }else{
            $queryEtapa3 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$carga7003','$tempadc3', '$presionadc3', '$comentarioadc3');";
        }
        $query = mysqli_query($result,$queryEtapa3);
    }

    if($carga7004 == 'carga7004'){
        $query_etapas  = $_form->get_formulario_etapas($id,'carga7004');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa4 = "UPDATE Etapas SET Temperatura = '$tempadc4',Presion = '$presionadc4', Comentario = '$comentarioadc4' WHERE IdProceso = '$id' AND NombreEtapa = '$carga7004';";
        }else{
            $queryEtapa4 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$carga7004','$tempadc4', '$presionadc4', '$comentarioadc4');";
        }
        $query = mysqli_query($result,$queryEtapa4);
    }

    if($carga7005 == 'carga7005'){
        $query_etapas  = $_form->get_formulario_etapas($id,'carga7005');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorafinadc = ($horafinadc != '')?"HoraFin = '$horafinadc',":"";
            $queryEtapa5 = "UPDATE Etapas SET ".$txthorafinadc." Temperatura = '$tempadc5',Presion = '$presionadc5', Comentario = '$comentarioadc5' WHERE IdProceso = '$id' AND NombreEtapa = '$carga7005';";
        }else{
            $txthorafinadc1 = ($horafinadc != '')?"HoraFin, ":"";
            $txthorafinadc2 = ($horafinadc != '')?"'$horafinadc', ":"";
            $queryEtapa5 = "INSERT INTO Etapas (IdProceso, NombreEtapa, ".$txthorafinadc1."Temperatura, Presion, Comentario) VALUE ('$id','$carga7005', ".$txthorafinadc2."'$tempadc5', '$presionadc5', '$comentarioadc5');";
        }
        $query = mysqli_query($result,$queryEtapa5);
    }

    if($reaccion1 == 'reaccion1'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion1');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainicioreac = ($horainicioreac != '')?"HoraInicio = '$horainicioreac', ":"";
            $queryEtapa6 = "UPDATE Etapas SET ".$txthorainicioreac."Temperatura = '$tempreac1',Presion = '$presionreac1', Comentario = '$comentarioreac1' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion1';";
        }else{
            $txthorainicioreac1 = ($horainicioreac != '')?"HoraInicio, ":"";
            $txthorainicioreac2 = ($horainicioreac != '')?"'$horainicioreac', ":"";
            $queryEtapa6 = "INSERT INTO Etapas (IdProceso, NombreEtapa, ".$txthorainicioreac1."Temperatura, Presion, Comentario) VALUE ('$id','$reaccion1', ".$txthorainicioreac2."'$tempreac1', '$presionreac1', '$comentarioreac1');";
        }
        $query = mysqli_query($result,$queryEtapa6);
    }

    if($reaccion2 == 'reaccion2'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion2');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa7 = "UPDATE Etapas SET Temperatura = '$tempreac2',Presion = '$presionreac2', Comentario = '$comentarioreac2' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion2';";
        }else{
            $queryEtapa7 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$reaccion2',  '$tempreac2', '$presionreac2', '$comentarioreac2');";
        }
        $query = mysqli_query($result,$queryEtapa7);
    }

    if($reaccion3 == 'reaccion3'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion3');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa8 = "UPDATE Etapas SET Temperatura = '$tempreac3',Presion = '$presionreac3', Comentario = '$comentarioreac3' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion3';";
        }else{
            $queryEtapa8 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$reaccion3',  '$tempreac3', '$presionreac3', '$comentarioreac3');";
        }
        $query = mysqli_query($result,$queryEtapa8);
    }

    if($reaccion4 == 'reaccion4'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion4');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa9 = "UPDATE Etapas SET Temperatura = '$tempreac4',Presion = '$presionreac4', Comentario = '$comentarioreac4' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion4';";
        }else{
            $queryEtapa9 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$reaccion4',  '$tempreac4', '$presionreac4', '$comentarioreac4');";
        }
        $query = mysqli_query($result,$queryEtapa9);
    }

    if($reaccion5 == 'reaccion5'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion5');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa10 = "UPDATE Etapas SET Temperatura = '$tempreac5',Presion = '$presionreac5', Comentario = '$comentarioreac5' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion5';";
        }else{
            $queryEtapa10 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$reaccion5',  '$tempreac5', '$presionreac5', '$comentarioreac5');";
        }
        $query = mysqli_query($result,$queryEtapa10);
    }

    if($reaccion6 == 'reaccion6'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion6');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa11 = "UPDATE Etapas SET Temperatura = '$tempreac6',Presion = '$presionreac6', Comentario = '$comentarioreac6' WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion6';";
        }else{
            $queryEtapa11 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$reaccion6',  '$tempreac6', '$presionreac6', '$comentarioreac6');";
        }
        $query = mysqli_query($result,$queryEtapa11);
    }

    if($reaccion7 == 'reaccion7'){
        $query_etapas  = $_form->get_formulario_etapas($id,'reaccion7');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorafinreac = ($horafinreac != '')?", HoraFin = '$horafinreac'":"";
            $queryEtapa12 = "UPDATE Etapas SET Temperatura = '$tempreac7',Presion = '$presionreac7', Comentario = '$comentarioreac7'".$txthorafinreac." WHERE IdProceso = '$id' AND NombreEtapa = '$reaccion7';";
        }else{
            $txthorafinreac1 = ($horafinreac != '')?", HoraFin":"";
            $txthorafinreac2 = ($horafinreac != '')?", '$horafinreac'":"";
            $queryEtapa12 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario ".$txthorafinreac1.") VALUE ('$id','$reaccion7', '$tempreac7', '$presionreac7', '$comentarioreac7'".$txthorafinreac2.");";
        }
        $query = mysqli_query($result,$queryEtapa12);
    }
    
}

if($_POST['pasos'] == 6){

    // Paso 10      114
    $adicionarstw       = isset($_POST["adicionarstw"])        ? $_POST["adicionarstw"]  : '';
    
    $horainicioadcstw2  = $_POST["horainicioadcstw2"] != ''    ? $_POST["horainicioadcstw2"]   :'';
    $tempadcstw2        = isset($_POST["tempadcstw2"])         ? $_POST["tempadcstw2"]         :'';
    $presionadcstw2     = isset($_POST["presionadcstw2"])      ? $_POST["presionadcstw2"]      :'';
    $horafinadcstw2     = $_POST["horafinadcstw2"] != ''       ? $_POST["horafinadcstw2"]      :'';

    $SeguridadCSO       = isset($_POST["SeguridadCSO"])       ? $_POST["SeguridadCSO"]       :'';
    $EquipoCSO          = isset($_POST["EquipoCSO"])          ? $_POST["EquipoCSO"]          :'';

    $queryNfo = "UPDATE NFO SET SeguridadCSO = '$SeguridadCSO', EquipoCSO = '$EquipoCSO' WHERE IdProceso = '$id';";
    $query = mysqli_query($result,$queryNfo);
    
    if($adicionarstw == 'adicionarstw'){
        $query_etapas  = $_form->get_formulario_etapas($id,'adicionarstw');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainicioadcstw2 = ($horainicioadcstw2 != '')?"HoraInicio = '$horainicioadcstw2',":"";
            $txthorafinadcstw2 = ($horafinadcstw2 != '')?", HoraFin = '$horafinadcstw2'":"";
            $queryEtapa13 = "UPDATE Etapas SET ".$txthorainicioadcstw2." Temperatura = '$tempadcstw2',Presion = '$presionadcstw2'".$txthorafinadcstw2." WHERE IdProceso = '$id' AND NombreEtapa = '$adicionarstw';";
        }else{
            $txthorainicioadcstw21 = ($horainicioadcstw2 != '')?"HoraInicio, ":"";
            $txthorainicioadcstw22 = ($horainicioadcstw2 != '')?"'$horainicioadcstw2', ":"";
            $txthorafinadcstw21 = ($horafinadcstw2 != '')?", HoraFin":"";
            $txthorafinadcstw22 = ($horafinadcstw2 != '')?", '$horafinadcstw2'":"";
            $queryEtapa13 = "INSERT INTO Etapas (IdProceso, NombreEtapa, ".$txthorainicioadcstw21."Temperatura, Presion".$txthorafinadcstw21.") VALUE ('$id','$adicionarstw', ".$txthorainicioadcstw22."'$tempadcstw2', '$presionadcstw2'".$txthorafinadcstw22.");";
        }
        $query = mysqli_query($result,$queryEtapa13);
    }
    // die();
}

// Paso 11
if($_POST['pasos'] == 7){
    $ReaccionNeutra1       = isset($_POST["ReaccionNeutra1"])        ? $_POST["ReaccionNeutra1"]  : '';
    $ReaccionNeutra2       = isset($_POST["ReaccionNeutra2"])        ? $_POST["ReaccionNeutra2"]  : '';
    $ReaccionNeutra3       = isset($_POST["ReaccionNeutra3"])        ? $_POST["ReaccionNeutra3"]  : '';
    $ReaccionNeutra4       = isset($_POST["ReaccionNeutra4"])        ? $_POST["ReaccionNeutra4"]  : '';
    $homogenizacion       = isset($_POST["homogenizacion"])        ? $_POST["homogenizacion"]  : '';
    $homogenizacion2       = isset($_POST["homogenizacion2"])        ? $_POST["homogenizacion2"]  : '';
    $homogenizacion3       = isset($_POST["homogenizacion3"])        ? $_POST["homogenizacion3"]  : '';

    $horainicioneut     = $_POST["horainicioneut"] != ''       ? $_POST["horainicioneut"]      :'';
    $tempneut1          = isset($_POST["tempneut1"])            ? $_POST["tempneut1"]           :'';
    $presionneut1       = isset($_POST["presionneut1"])         ? $_POST["presionneut1"]        :'';
    $comentarioneut1    = isset($_POST["comentarioneut1"])      ? $_POST["comentarioneut1"]     :'';
    $tempneut2          = isset($_POST["tempneut2"])            ? $_POST["tempneut2"]           :'';
    $presionneut2       = isset($_POST["presionneut2"])         ? $_POST["presionneut2"]        :'';
    $comentarioneut2    = isset($_POST["comentarioneut2"])      ? $_POST["comentarioneut2"]     :'';
    $tempneut3          = isset($_POST["tempneut3"])            ? $_POST["tempneut3"]           :'';
    $presionneut3       = isset($_POST["presionneut3"])         ? $_POST["presionneut3"]        :'';
    $comentarioneut3    = isset($_POST["comentarioneut3"])      ? $_POST["comentarioneut3"]     :'';
    $tempneut4          = isset($_POST["tempneut4"])            ? $_POST["tempneut4"]           :'';
    $presionneut4       = isset($_POST["presionneut4"])         ? $_POST["presionneut4"]        :'';
    $comentarioneut4    = isset($_POST["comentarioneut4"])      ? $_POST["comentarioneut4"]     :'';
    $horafinneut        = $_POST["horafinneut"] != ''          ? $_POST["horafinneut"]         :'';
    $horainiciohomoge   = $_POST["horainiciohomoge"] != ''     ? $_POST["horainiciohomoge"]    :'';
    $temphomoge1        = isset($_POST["temphomoge1"])          ? $_POST["temphomoge1"]         :'';
    $presionhomoge1     = isset($_POST["presionhomoge1"])       ? $_POST["presionhomoge1"]      :'';
    $comentariohomoge1  = isset($_POST["comentariohomoge1"])    ? $_POST["comentariohomoge1"]   :'';
    $temphomoge2        = isset($_POST["temphomoge2"])          ? $_POST["temphomoge2"]         :'';
    $presionhomoge2     = isset($_POST["presionhomoge2"])       ? $_POST["presionhomoge2"]      :'';
    $comentariohomoge2  = isset($_POST["comentariohomoge2"])    ? $_POST["comentariohomoge2"]   :'';
    $temphomoge3        = isset($_POST["temphomoge3"])          ? $_POST["temphomoge3"]         :'';
    $presionhomoge3     = isset($_POST["presionhomoge3"])       ? $_POST["presionhomoge3"]      :'';
    $horafinhomoge      = $_POST["horafinhomoge"] != ''        ? $_POST["horafinhomoge"]       :'';

    $OlorFormol         = isset($_POST["OlorFormol"])           ? $_POST["OlorFormol"]          :'';

    $queryNfo = "UPDATE NFO SET OlorFormol = '$OlorFormol' WHERE IdProceso = '$id';";
    $query = mysqli_query($result,$queryNfo);
    
    if($ReaccionNeutra1 == 'ReaccionNeutra1'){
        $query_etapas  = $_form->get_formulario_etapas($id,'ReaccionNeutra1');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainicioneut = ($horainicioneut != '')?"HoraInicio = '$horainicioneut', ":"";
            $queryEtapa14 = "UPDATE Etapas SET ".$txthorainicioneut."Temperatura = '$tempneut1',Presion = '$presionneut1', Comentario = '$comentarioneut1' WHERE IdProceso = '$id' AND NombreEtapa = '$ReaccionNeutra1';";
        }else{
            $txthorainicioneut1 = ($horainicioneut != '')?"HoraInicio, ":"";
            $txthorainicioneut2 = ($horainicioneut != '')?"'$horainicioneut', ":"";
            $queryEtapa14 = "INSERT INTO Etapas (IdProceso, NombreEtapa, ".$txthorainicioneut1."Temperatura, Presion, Comentario) VALUE ('$id','$ReaccionNeutra1', ".$txthorainicioneut2."'$tempneut1', '$presionneut1', '$comentarioneut1');";
        }
        $query = mysqli_query($result,$queryEtapa14);
    }
    
    if($ReaccionNeutra2 == 'ReaccionNeutra2'){
        $query_etapas  = $_form->get_formulario_etapas($id,'ReaccionNeutra2');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa15 = "UPDATE Etapas SET Temperatura = '$tempneut2',Presion = '$presionneut2', Comentario = '$comentarioneut2' WHERE IdProceso = '$id' AND NombreEtapa = '$ReaccionNeutra2';";
        }else{
            $queryEtapa15 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$ReaccionNeutra2', '$tempneut2', '$presionneut2', '$comentarioneut2');";
        }
        $query = mysqli_query($result,$queryEtapa15);
    }
    
    if($ReaccionNeutra3 == 'ReaccionNeutra3'){
        $query_etapas  = $_form->get_formulario_etapas($id,'ReaccionNeutra3');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa16 = "UPDATE Etapas SET Temperatura = '$tempneut3',Presion = '$presionneut3', Comentario = '$comentarioneut3' WHERE IdProceso = '$id' AND NombreEtapa = '$ReaccionNeutra3';";
        }else{
            $queryEtapa16 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$ReaccionNeutra3', '$tempneut3', '$presionneut3', '$comentarioneut3');";
        }
        $query = mysqli_query($result,$queryEtapa16);
    }
    
    if($ReaccionNeutra4 == 'ReaccionNeutra4'){
        $query_etapas  = $_form->get_formulario_etapas($id,'ReaccionNeutra4');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorafinneut = ($horafinneut != '')?", HoraFin = '$horafinneut'":"";
            $queryEtapa17 = "UPDATE Etapas SET Temperatura = '$tempneut4',Presion = '$presionneut4', Comentario = '$comentarioneut4'".$txthorafinneut." WHERE IdProceso = '$id' AND NombreEtapa = '$ReaccionNeutra4';";
        }else{
            $txthorafinneut1 = ($horafinneut != '')?", HoraFin":"";
            $txthorafinneut2 = ($horafinneut != '')?", '$horafinneut'":"";
            $queryEtapa17 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario".$txthorafinneut1.") VALUE ('$id','$ReaccionNeutra4', '$tempneut4', '$presionneut4', '$comentarioneut4'".$txthorafinneut2.");";
        }
        $query = mysqli_query($result,$queryEtapa17);
    }

    if($homogenizacion == 'homogenizacion'){
        $query_etapas  = $_form->get_formulario_etapas($id,'homogenizacion');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainiciohomoge = ($horainiciohomoge != '')?"HoraInicio = '$horainiciohomoge', ":"";
            $queryEtapa17 = "UPDATE Etapas SET ".$txthorainiciohomoge."Temperatura = '$temphomoge1', Presion = '$presionhomoge1', Comentario = '$comentariohomoge1' WHERE IdProceso = '$id' AND NombreEtapa = '$homogenizacion';";
        }else{
            $txthorainiciohomoge1 = ($horainiciohomoge != '')?"HoraInicio, ":"";
            $txthorainiciohomoge2 = ($horainiciohomoge != '')?"'$horainiciohomoge', ":"";
            $queryEtapa17 = "INSERT INTO Etapas (IdProceso, NombreEtapa, ".$txthorainiciohomoge1."Temperatura, Presion, Comentario) VALUE ('$id','$homogenizacion', ".$txthorainiciohomoge2."'$temphomoge1', '$presionhomoge1', '$comentariohomoge1');";
        }
        $query = mysqli_query($result,$queryEtapa17);
    }

    if($homogenizacion2 == 'homogenizacion2'){
        $query_etapas  = $_form->get_formulario_etapas($id,'homogenizacion2');
        if(mysqli_num_rows($query_etapas) > 0){
            $queryEtapa18 = "UPDATE Etapas SET Temperatura = '$temphomoge2', Presion = '$presionhomoge2', Comentario = '$comentariohomoge2' WHERE IdProceso = '$id' AND NombreEtapa = '$homogenizacion2';";
        }else{
            $queryEtapa18 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario) VALUE ('$id','$homogenizacion2', '$temphomoge2', '$presionhomoge2', '$comentariohomoge2');";
        }
        $query = mysqli_query($result,$queryEtapa18);
    }

    if($homogenizacion3 == 'homogenizacion3'){
        $query_etapas  = $_form->get_formulario_etapas($id,'homogenizacion3');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorafinhomoge = ($horafinhomoge != '')?", HoraFin = '$horafinhomoge'":"";
            $queryEtapa18 = "UPDATE Etapas SET Temperatura = '$temphomoge3', Presion = '$presionhomoge3', Comentario = '$comentariohomoge2'".$txthorafinhomoge." WHERE IdProceso = '$id' AND NombreEtapa = '$homogenizacion3';";
        }else{
            $txthorafinhomoge1 = ($horafinhomoge != '')?", HoraFin":"";
            $txthorafinhomoge2 = ($horafinhomoge != '')?", '$horafinhomoge'":"";
            $queryEtapa18 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura, Presion, Comentario".$txthorafinhomoge1.") VALUE ('$id','$homogenizacion3', '$temphomoge3', '$presionhomoge3', '$comentariohomoge2'".$txthorafinhomoge2.");";
        }
        $query = mysqli_query($result,$queryEtapa18);
    }

    // if($OlorFormol == 0){
    //     $final = true;
    // }
}

if($_POST['pasos'] == 8){
     // Paso 12
    $Enfriet85     = isset($_POST["Enfriet85-"])        ? $_POST["Enfriet85-"]  : '';

    $temp85             = isset($_POST["temp85"])               ? $_POST["temp85"]              :'';
    $horainiciostw85    = $_POST["horainiciostw85"] != ''       ? $_POST["horainiciostw85"]     :'';
    $horafinstw85       = $_POST["horafinstw85"] != ''          ? $_POST["horafinstw85"]        :'';
    $ph10               = isset($_POST["ph10"])                 ? $_POST["ph10"]                :'';
    $Csc050Ajuste       = isset($_POST["Csc050Ajuste"])         ? $_POST["Csc050Ajuste"]        :'';
    $Stw00Ajuste        = isset($_POST["Stw00Ajuste"])          ? $_POST["Stw00Ajuste"]         :'';
    $ph10Fin            = isset($_POST["ph10Fin"])              ? $_POST["ph10Fin"]             :'';
    $ProductoBrillante  = isset($_POST["ProductoBrillante"])    ? $_POST["ProductoBrillante"]   :'';
    $HoraInicioLukas    = $_POST["HoraInicioLukas"] != ''       ? ", HoraInicio = '".$_POST['HoraInicioLukas']."'"  :'';
    $HoraFinLukas       = $_POST["HoraFinLukas"] != ''          ? ", HoraFin = '".$_POST['HoraFinLukas']."'"  :'';
    $ProductoBrillante2 = isset($_POST["ProductoBrillante2"])   ? $_POST["ProductoBrillante2"]  :'';
    $NotificarLaboratorio  = isset($_POST["NotificarLaboratorio"])? $_POST["NotificarLaboratorio"]   :'';
    // $HoraFinal          = $_POST["HoraFinal"] != ''             ? $_POST["HoraFinal"]           :'';

    $queryNfo = "UPDATE NFO SET ph10 = '$ph10', ph10Fin = '$ph10Fin', ProductoBrillante = '$ProductoBrillante', ProductoBrillante2 = '$ProductoBrillante2'".$HoraInicioLukas." ".$HoraFinLukas.", Csc050Ajuste = '$Csc050Ajuste', Stw00Ajuste = '$Stw00Ajuste', NotificarLaboratorio = '$NotificarLaboratorio' WHERE IdProceso = '$id';";
    // echo $queryNfo; die();
    $query = mysqli_query($result,$queryNfo);

    // $queryProceso = "UPDATE Procesos SET HoraFinal = '$HoraFinal' WHERE IdProceso = '$id';";
    // $query = mysqli_query($result,$queryProceso);

    if($Enfriet85 == 'Enfriet85-'){
        $query_etapas  = $_form->get_formulario_etapas($id,'Enfriet85-');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainiciostw85  = ($horainiciostw85  != '')?", HoraInicio = '$horainiciostw85'":"";
            $txthorafinstw85     = ($horafinstw85     != '')?", HoraFin = '$horafinstw85'":"";
            $queryEtapa18 = "UPDATE Etapas SET Temperatura = '$temp85'". $txthorainiciostw85."".$txthorafinstw85." WHERE IdProceso = '$id' AND NombreEtapa = '$Enfriet85';";
        }else{
            $txthorainiciostw851 = ($horainiciostw85 != '')?",  HoraInicio":"";
            $txthorainiciostw852 = ($horainiciostw85 != '')?", '$horainiciostw85'":"";
            $txthorafinstw851    = ($horafinstw85 != '')?", HoraFin":"";
            $txthorafinstw852    = ($horafinstw85 != '')?", '$horafinstw85'":"";
            $queryEtapa18 = "INSERT INTO Etapas (IdProceso, NombreEtapa, Temperatura".$txthorainiciostw851."".$txthorafinstw851.") VALUE ('$id','$Enfriet85', '$temp85'".$txthorainiciostw852."".$txthorafinstw852.");";
        }
        $query = mysqli_query($result,$queryEtapa18);
    }

}

// Paso 13     160
if($_POST['pasos'] == 9){
    $DescargaIbc        = isset($_POST["DescargaIbc"])          ? $_POST["DescargaIbc"]         : '';
    $PasoFinal          = isset($_POST["PasoFinal"])            ? $_POST["PasoFinal"]           : '';

    $SegNFO             = isset($_POST["SegNFO"])               ? $_POST["SegNFO"]              :'';
    $EquipoNFO          = isset($_POST["EquipoNFO"])            ? $_POST["EquipoNFO"]           :'';
    $AgitacionOff       = isset($_POST["AgitacionOff"])         ? $_POST["AgitacionOff"]        :'';
    $TalegoDescarga     = isset($_POST["TalegoDescarga"])       ? $_POST["TalegoDescarga"]      :'';
    $ResiduoTalego      = isset($_POST["ResiduoTalego"])        ? $_POST["ResiduoTalego"]       :'';
    $Aspecto            = isset($_POST["Aspecto"])              ? $_POST["Aspecto"]             :'';
    $horainiciodescarga = $_POST["horainiciodescarga"] != ''    ? $_POST["horainiciodescarga"]  :'';
    $horafindescarga    = $_POST["horafindescarga"] != ''       ? $_POST["horafindescarga"]     :'';
    $EnviarMuestraFinal = isset($_POST["EnviarMuestraFinal"])   ? $_POST["EnviarMuestraFinal"]  :'';
    $PorcentajeSolidos  = isset($_POST["PorcentajeSolidos"])    ? $_POST["PorcentajeSolidos"]   :'';
    $pH10Final          = isset($_POST["pH10Final"])            ? $_POST["pH10Final"]           :'';
    $Solubilidad10      = isset($_POST["Solubilidad10"])        ? $_POST["Solubilidad10"]       :'';
    $Solubilidad40      = isset($_POST["Solubilidad40"])        ? $_POST["Solubilidad40"]       :'';
    $ProcesoDif         = isset($_POST["ProcesoDif"])           ? $_POST["ProcesoDif"]          :'';
    $Rendimiento        = isset($_POST["Rendimiento"])          ? $_POST["Rendimiento"]         :'';
    $KgEnjuague         = isset($_POST["KgEnjuague"])           ? $_POST["KgEnjuague"]          :'';
    $horainiciolavado   = $_POST["horainiciolavado"] != ''      ? $_POST["horainiciolavado"]    :'';
    $horafinlavado      = $_POST["horafinlavado"]    != ''      ? $_POST["horafinlavado"]       :'';
    $KgLavado           = isset($_POST["KgLavado"])             ? $_POST["KgLavado"]            :'';

    $queryNfo = "UPDATE NFO SET SegNFO = '$SegNFO', EquipoNFO = '$EquipoNFO', AgitacionOff = '$AgitacionOff', TalegoDescarga = '$TalegoDescarga', ResiduoTalego = '$ResiduoTalego', Aspecto = '$Aspecto', EnviarMuestraFinal = '$EnviarMuestraFinal', PorcentajeSolidos = '$PorcentajeSolidos', pH10Final = '$pH10Final', Solubilidad10 = '$Solubilidad10', Solubilidad40 = '$Solubilidad40', Rendimiento = '$Rendimiento', ProcesoDif = '$ProcesoDif', KgEnjuague = '$KgEnjuague', KgLavado = '$KgLavado' WHERE IdProceso = '$id';";
    $query = mysqli_query($result,$queryNfo);

    if($DescargaIbc == 'DescargaIbc'){
        $query_etapas  = $_form->get_formulario_etapas($id,'DescargaIbc');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainiciodescarga  = ($horainiciodescarga  != '')?"HoraInicio = '$horainiciodescarga', ":"";
            $txthorafindescarga     = ($horafindescarga     != '')?", HoraFin = '$horafindescarga'":"";
            $txt    = ($txthorainiciodescarga != '' && $txthorafindescarga != '')?",":"";
            $queryEtapa18 = "UPDATE Etapas SET ".$txthorainiciodescarga." ".$txt." ".$txthorafindescarga." WHERE IdProceso = '$id' AND NombreEtapa = '$DescargaIbc';";
        }else{
            $txthorainiciodescarga1 = ($horainiciodescarga != '')?",  HoraInicio":"";
            $txthorainiciodescarga2 = ($horainiciodescarga != '')?", '$horainiciodescarga'":"";
            $txthorafindescarga1    = ($horafindescarga != '')?", HoraFin":"";
            $txthorafindescarga2    = ($horafindescarga != '')?", '$horafindescarga'":"";
            $queryEtapa18 = "INSERT INTO Etapas (IdProceso, NombreEtapa".$txthorainiciodescarga1."".$txthorafindescarga1.") VALUE ('$id','$DescargaIbc'".$txthorainiciodescarga2."".$txthorafindescarga2.");";
        }
        $query = mysqli_query($result,$queryEtapa18);
    }

    if($PasoFinal == 'PasoFinal'){
        $query_etapas  = $_form->get_formulario_etapas($id,'PasoFinal');
        if(mysqli_num_rows($query_etapas) > 0){
            $txthorainiciolavado  = ($horainiciolavado  != '')?"HoraInicio = '$horainiciolavado', ":"";
            $txthorafinlavado     = ($horafinlavado     != '')?", HoraFin = '$horafinlavado'":"";
            $queryEtapa19 = "UPDATE Etapas SET ".$txthorainiciolavado." ".$txthorafinlavado." WHERE IdProceso = '$id' AND NombreEtapa = '$PasoFinal';";
        }else{
            $txthorainiciolavado1 = ($horainiciolavado != '')?",  HoraInicio":"";
            $txthorainiciolavado2 = ($horainiciolavado != '')?", '$horainiciolavado'":"";
            $txthorafinlavado1    = ($horafinlavado != '')?", HoraFin":"";
            $txthorafinlavado2    = ($horafinlavado != '')?", '$horafinlavado'":"";
            $queryEtapa19 = "INSERT INTO Etapas (IdProceso, NombreEtapa".$txthorainiciolavado1."".$txthorafinlavado1.") VALUE ('$id','$PasoFinal'".$txthorainiciolavado2."".$txthorafinlavado2.");";
        }

        if($horafinlavado != ''){
            $final = true;
        }
        $query = mysqli_query($result,$queryEtapa19);
    }
    // die();
}

//  176 Campos
$queryFinal = 0;
// $queryFinal = 0;

if($final == true){

    $fechaFinal = date("Y-m-d");
    $horaFinal = date("H:i:s");
    $qp = "UPDATE Procesos SET FechaFinal = '$fechaFinal', HoraFinal = '$horaFinal', Estado = 2 WHERE IdProceso = '$id';";
    $queryFinal = mysqli_query($result,$qp);
    
}

if($queryFinal > 0){
    $msg    = "El formulario fue agregado";
    $ruta   = "../procesos/procesos.php";
}else{
    $ruta   = "editarFormulario.php?id=".$id."";
    $msg    = 'El formulario se actualizo correctamente';
}

$html = "<script>
    window.alert('$msg');
    self.location='".$ruta."';
</script>";
	
echo $html;	