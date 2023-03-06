<?php
session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../../login.html");
	exit();
	
}

if (isset($_SESSION['rol'])){

	$idrol 	= $_SESSION['rol'];
}

$display = "";
if($idrol == 1 ){
    $display = "style='display:none;'";
}

require_once "acciones.php";

$id = $_GET['id'];
$disabled = "";

$_form = new formulario();

$query  = $_form->get_formulario($id);
$row    = $query->fetch_assoc();

$nfo        = isset($row["nfo"]) && $row["nfo"] != "" ? $row["nfo"] : '';
$numeroLote = isset($row["numeroLote"])   ? $row["numeroLote"]  : '';

// Inicio validación Equipos
$query_equipos  = $_form->get_formulario_equipos($id);
$row_equipos    = $query_equipos->fetch_assoc();

if($row_equipos['dietrich2'] == '1'){
    $dietrich2     = "checked";
    $d_dietrich2   = "readonly";
}else{
    $dietrich2     = "";
    $d_dietrich2   = "";
}

if($row_equipos['fLukas']    == '1'){
    $fLukas     = "checked";
    $d_fLukas   = "readonly";
}else{
    $fLukas     = "";
    $d_fLukas   = "";
}

if($row_equipos['contOlor']  == '1'){
    $contOlor   = "checked";
    $d_contOlor = "readonly";
}else{
    $contOlor   = "";
    $d_contOlor = "";
}

// Finaliza validación Equipos

// Inicio validación Materia Prima
$query_materias  = $_form->get_formulario_materias($id);
$query_materia    = $query_materias->fetch_assoc();

if(isset($row["nan000"]) && $row["nan000"] != ''){
    $nan000   =  $row["nan000"];
    $d_nan000 = "readonly";
}else{
    $nan000   =  "";
    $d_nan000 = "";
}
if(isset($row["swf098"]) && $row["swf098"] != ''){
    $swf098   = $row["swf098"];
    $d_swf098 = "readonly";
}else{
    $swf098   = "";
    $d_swf098 = "";
}
if(isset($row["stw000"]) && $row["stw000"] != ''){
    $stw000   =  $row["stw000"];
    $d_stw000 = "readonly";
}else{
    $stw000   = "";
    $d_stw000 = "";
}
if(isset($row["fdo037"]) && $row["fdo037"] != ''){
    $fdo037   =  $row["fdo037"];
    $d_fdo037 = "readonly";
}else{
    $fdo037   = "";
    $d_fdo037 = "";
}
if(isset($row["myo000"]) && $row["myo000"] != ''){
    $myo000   =  $row["myo000"];
    $d_myo000 = "readonly";
}else{
    $myo000   = "";
    $d_myo000 = "";
}
if(isset($row["stw0002"]) && $row["stw0002"] != ''){
    $stw0002   = $row["stw0002"];
    $d_stw0002 = "readonly";
}else{
    $stw0002   = "";
    $d_stw0002 = "";
}
if(isset($row["csc050"]) && $row["csc050"] != ''){
    $csc050   =  $row["csc050"];
    $d_csc050 = "readonly";
}else{
    $csc050   =  "";
    $d_csc050 =  "";
}
if(isset($row["stw0003"]) && $row["stw0003"] != ''){
    $stw0003   = $row["stw0003"];
    $d_stw0003 = "readonly";
}else{
    $stw0003   = "";
    $d_stw0003 = "";
}

// Finaliza validación Materia Prima

$script = '';

if(isset($row["MatPriFP04"]) && $row["MatPriFP04"] == '1'){
    $MatPriFP04Si = "checked";
    $MatPriFP04No = "";
    $d_MatPriFP04 = "readonly";
}else if(isset($row["MatPriFP04"]) && $row["MatPriFP04"] == '0'){
    $MatPriFP04Si = "";
    $MatPriFP04No = "checked";
    $d_MatPriFP04 = "";
}else{
    $MatPriFP04Si = "";
    $MatPriFP04No = "";
    $d_MatPriFP04 = "";
}

if(isset($row["MatPriSeparada"]) && $row["MatPriSeparada"] == '1'){
    $MatPriSeparadaSi = "checked";
    $MatPriSeparadaNo = "";
    $displayMatPriSeparada   = "show";
    $d_MatPriSeparada = "readonly";
}else if(isset($row["MatPriSeparada"]) && $row["MatPriSeparada"] == '0'){
    $MatPriSeparadaSi = "";
    $MatPriSeparadaNo = "checked";
    $displayMatPriSeparada   = "none";
    $d_MatPriSeparada = "";
}else{
    $MatPriSeparadaSi = "";
    $MatPriSeparadaNo = "";
    $displayMatPriSeparada   = "none";
    $d_MatPriSeparada = "";
}

if(isset($row["ReactorLimpio"]) && $row["ReactorLimpio"] == '1'){
    $ReactorLimpioSi = "checked";
    $ReactorLimpioNo = "";
    $displayReactorLimpio   = "show";
    $d_ReactorLimpio = "readonly";
}else if(isset($row["ReactorLimpio"]) && $row["ReactorLimpio"] == '0'){
    $ReactorLimpioSi = "";
    $ReactorLimpioNo = "checked";
    $displayReactorLimpio   = "none";
    $d_ReactorLimpio = "";
}else{
    $ReactorLimpioSi = "";
    $ReactorLimpioNo = "";
    $displayReactorLimpio   = "none";
    $d_ReactorLimpio = "";
}

// Inicio validación Equipos
$query_nfo  = $_form->get_formulario_nfo($id);
$row_nfo    = $query_nfo->fetch_assoc();

if(isset($row_nfo["HermeticidadReactor"]) && $row_nfo["HermeticidadReactor"] == '1'){
    $HermeticidadReactorSi = "checked";
    $HermeticidadReactorNo = "";
    $d_HermeticidadReactor = "readonly";
}else if(isset($row_nfo["HermeticidadReactor"]) && $row_nfo["HermeticidadReactor"] == '0'){
    $HermeticidadReactorSi = "";
    $HermeticidadReactorNo = "checked";
    $d_HermeticidadReactor = "";
}else{
    $HermeticidadReactorSi = "";
    $HermeticidadReactorNo = "";
    $d_HermeticidadReactor = "";
}

if(isset($row_nfo["ReactorFunciona"]) && $row_nfo["ReactorFunciona"] == '1'){
    $ReactorFuncionaSi = "checked";
    $ReactorFuncionaNo = "";
    $d_ReactorFunciona = "readonly";
}else if(isset($row_nfo["ReactorFunciona"]) && $row_nfo["ReactorFunciona"] == '0'){
    $ReactorFuncionaSi = "";
    $ReactorFuncionaNo = "checked";
    $d_ReactorFunciona = "";
}else{
    $ReactorFuncionaSi = "";
    $ReactorFuncionaNo = "";
    $d_ReactorFunciona = "";
}

if(isset($row_nfo["VacioFunciona"]) && $row_nfo["VacioFunciona"] == '1'){
    $VacioFuncionaSi = "checked";
    $VacioFuncionaNo = "";
    $d_VacioFunciona = "readonly";
}else if(isset($row_nfo["VacioFunciona"]) && $row_nfo["VacioFunciona"] == '0'){
    $VacioFuncionaSi = "";
    $VacioFuncionaNo = "checked";
    $d_VacioFunciona = "";
}else{
    $VacioFuncionaSi = "";
    $VacioFuncionaNo = "";
    $d_VacioFunciona = "";
}

if(isset($row_nfo["VaporFunciona"]) && $row_nfo["VaporFunciona"] == '1'){
    $VaporFuncionaSi = "checked";
    $VaporFuncionaNo = "";
    $d_VaporFunciona = "readonly";
}else if(isset($row_nfo["VaporFunciona"]) && $row_nfo["VaporFunciona"] == '0'){
    $VaporFuncionaSi = "";
    $VaporFuncionaNo = "checked";
    $d_VaporFunciona = "";
}else{
    $VaporFuncionaSi = "";
    $VaporFuncionaNo = "";
    $d_VaporFunciona = "";
}

if(isset($row_nfo["EnfriamientoFunciona"]) && $row_nfo["EnfriamientoFunciona"] == '1'){
    $EnfriamientoFuncionaSi = "checked";
    $EnfriamientoFuncionaNo = "";
    $d_EnfriamientoFunciona = "readonly";
}else if(isset($row_nfo["EnfriamientoFunciona"]) && $row_nfo["EnfriamientoFunciona"] == '0'){
    $EnfriamientoFuncionaSi = "";
    $EnfriamientoFuncionaNo = "checked";
    $d_EnfriamientoFunciona = "";
}else{
    $EnfriamientoFuncionaSi = "";
    $EnfriamientoFuncionaNo = "";
    $d_EnfriamientoFunciona = "";
}

if(isset($row_nfo["EmisionesFunciona"]) && $row_nfo["EmisionesFunciona"] == '1'){
    $EmisionesFuncionaSi = "checked";
    $EmisionesFuncionaNo = "";
    $displayEmisionesFunciona = "show";
    $d_EmisionesFunciona = "readonly";
}else if(isset($row_nfo["EmisionesFunciona"]) && $row_nfo["EmisionesFunciona"] == '0'){
    $EmisionesFuncionaSi = "";
    $EmisionesFuncionaNo = "checked";
    $displayEmisionesFunciona = "none";
    $d_EmisionesFunciona = "";
}else{
    $EmisionesFuncionaSi = "";
    $EmisionesFuncionaNo = "";
    $displayEmisionesFunciona = "none";
    $d_EmisionesFunciona = "";
}

if(isset($row_nfo["phsodatanque"]) && $row_nfo["phsodatanque"] == '1'){
    $phsodatanqueSi             = "checked";
    $phsodatanqueNo             = "";
    $displayCondensadorFunciona = "show";
    $d_phsodatanque             = "readonly";
}else if(isset($row_nfo["phsodatanque"]) && $row_nfo["phsodatanque"] == '0'){
    $phsodatanqueSi             = "";
    $phsodatanqueNo             = "checked";
    $displayCondensadorFunciona = "none";
    $d_phsodatanque             = "";
}else{
    $phsodatanqueSi             = "";
    $phsodatanqueNo             = "";
    $displayCondensadorFunciona = "none";
    $d_phsodatanque             = "";
}

if(isset($row_nfo["CondensadorFunciona"]) && $row_nfo["CondensadorFunciona"] == '1'){
    $CondensadorFuncionaSi  = "checked";
    $CondensadorFuncionaNo  = "";
    $displayApruebaInicio   = "show";
    $d_CondensadorFunciona  = "readonly";
}else if(isset($row_nfo["CondensadorFunciona"]) && $row_nfo["CondensadorFunciona"] == '0'){
    $CondensadorFuncionaSi = "";
    $CondensadorFuncionaNo = "";
    $displayApruebaInicio  = "none";
    $d_CondensadorFunciona = "";
}else{
    $CondensadorFuncionaSi = "";
    $CondensadorFuncionaNo = "";
    $displayApruebaInicio  = "none";
    $d_CondensadorFunciona = "";
}

if(isset($row_nfo["ApruebaInicio"]) && $row_nfo["ApruebaInicio"] == '1'){
    $ApruebaInicioSi        = "checked";
    $ApruebaInicioNo        = "";
    $displayRazonesNoAprob  = "none";
    $displayInicioProceso   = "show";
    $d_ApruebaInicio        = "readonly";
}else if(isset($row_nfo["ApruebaInicio"]) && $row_nfo["ApruebaInicio"] == '0'){
    $ApruebaInicioSi = "";
    $ApruebaInicioNo = "checked";
    $displayRazonesNoAprob = "show";
    $displayInicioProceso = "none";
    $d_ApruebaInicio      = "";
}else{
    $ApruebaInicioSi = "";
    $ApruebaInicioNo = "";
    $displayRazonesNoAprob = "show";
    $displayInicioProceso = "none";
    $d_ApruebaInicio      = "";
}

if(isset($row["RazonesNoAprob"])){
    $RazonesNoAprob  = $row["RazonesNoAprob"];
    $d_RazonesNoAprob= "readonly";
}else{
    $RazonesNoAprob  = "";
    $d_RazonesNoAprob= "";
}

if(isset($row_nfo["SeguridadNaftaleno"]) && $row_nfo["SeguridadNaftaleno"] == '1'){
    $SeguridadNaftalenoSi   = "checked";
    $SeguridadNaftalenoNo   = "";
    $EquipoSeguridad        = "show";
    $d_SeguridadNaftaleno   = "readonly";
}else if(isset($row_nfo["SeguridadNaftaleno"]) && $row_nfo["SeguridadNaftaleno"] == '0'){
    $SeguridadNaftalenoSi = "";
    $SeguridadNaftalenoNo = "checked";
    $EquipoSeguridad = "none";
    $d_SeguridadNaftaleno   = "";
}
else{
    $SeguridadNaftalenoSi   = "";
    $SeguridadNaftalenoNo   = "";
    $EquipoSeguridad        = "none";
    $d_SeguridadNaftaleno   = "";
}

if(isset($row_nfo["EquipoNaftaleno"]) && $row_nfo["EquipoNaftaleno"] == '1'){
    $EquipoNaftalenoSi = "checked";
    $EquipoNaftalenoNo = "";
    $TrituradoSaco     = "show";
    $d_EquipoNaftaleno = "readonly";
}else if(isset($row_nfo["EquipoNaftaleno"]) && $row_nfo["EquipoNaftaleno"] == '0'){
    $EquipoNaftalenoSi = "";
    $EquipoNaftalenoNo = "checked";
    $TrituradoSaco     = "none";
    $d_EquipoNaftaleno = "";
}else{
    $EquipoNaftalenoSi = "";
    $EquipoNaftalenoNo = "";
    $TrituradoSaco     = "none";
    $d_EquipoNaftaleno = "";
}

if(isset($row_nfo["EnfriamientoCerrado"]) && $row_nfo["EnfriamientoCerrado"] == '1'){
    $EnfriamientoCerrado    = "checked";
    $TrituradoSaco2         = "show";
    $d_EnfriamientoCerrado  = "readonly";
}else{
    $EnfriamientoCerrado    = "";
    $TrituradoSaco2         = "none";
    $d_EnfriamientoCerrado  = "";
}

// Paso 5   28
// Inicio validación Equipos
$query_etapas  = $_form->get_formulario_etapas($id,'triturado');
$row_etapas1    = $query_etapas->fetch_assoc();
if(isset($row_etapas1["HoraInicio"]) && $row_etapas1["HoraInicio"] != ''){
    $horainiciocarganaf     =  $row_etapas1["HoraInicio"];
    $d_horainiciocarganaf   = "readonly";
}else{
    $horainiciocarganaf     = "";
    $d_horainiciocarganaf   = "";
}

if(isset($row_etapas1["HoraFin"]) && $row_etapas1["HoraFin"] != ''){
    $horafincarganaf    = $row_etapas1["HoraFin"];
    $d_horafincarganaf  = "readonly";
}else{
    $horafincarganaf    = "";
    $d_horafincarganaf  = "";
}

if(isset($row_nfo["ValvBloqueo"]) && $row_nfo["ValvBloqueo"] == '1'){
    $ValvBloqueo    = "checked";
    $d_ValvBloqueo  = "readonly";
}else{
    $ValvBloqueo    = "";
    $d_ValvBloqueo  = "";
}

if(isset($row_nfo["AbrirControlOlores"]) && $row_nfo["AbrirControlOlores"] == '1'){
    $AbrirControlOlores     = "checked";
    $d_AbrirControlOlores   = "readonly";
}else{
    $AbrirControlOlores     = "";
    $d_AbrirControlOlores   = "";
}

if(isset($row_nfo["Estartazos"]) && $row_nfo["Estartazos"] == '1'){
    $Estartazos     = "checked";
    $d_Estartazos   = "readonly";
}else{
    $Estartazos     = "";
    $d_Estartazos   = "";
}

$query_etapas  = $_form->get_formulario_etapas($id,'fusion');
$row_etapas2    = $query_etapas->fetch_assoc();

if(isset($row_etapas2["HoraInicio"]) && $row_etapas2["HoraInicio"] != ''){
    $horainiciofusionnaf    =  $row_etapas2["HoraInicio"];
    $d_horainiciofusionnaf  = "readonly";
}else{
    $horainiciofusionnaf   = "";
    $d_horainiciofusionnaf = "";
}

if(isset($row_etapas2["Temperatura"]) && $row_etapas2["Temperatura"] != ''){
    $temp1   =  $row_etapas2["Temperatura"];
    $d_temp1 = "readonly";
}else{
    $temp1   = "";
    $d_temp1 = "";
}

if(isset($row_etapas2["Presion"]) && $row_etapas2["Presion"] != ''){
    $presion1   =  $row_etapas2["Presion"];
    $d_presion1 = "readonly";
}else{
    $presion1   = "";
    $d_presion1 = "";
}

if(isset($row_etapas2["HoraFin"]) && $row_etapas2["HoraFin"] != ''){
    $horafinfusionnaf    =  $row_etapas2["HoraFin"];
    $d_horafinfusionnaf  = "readonly";
}else{
    $horafinfusionnaf    = "";
    $d_horafinfusionnaf  = "";
}


if(isset($row_nfo["AgitadorOk"]) && $row_nfo["AgitadorOk"] == '1'){
    $AgitadorOkSi     = "checked";
    $AgitadorOkNo     = "";
    $d_AgitadorOk     = "readonly";
}else if(isset($row_nfo["AgitadorOk"]) && $row_nfo["AgitadorOk"] == '0'){
    $AgitadorOkSi     = "";
    $AgitadorOkNo     = "checked";
    $d_AgitadorOk     = "";
}else{
    $AgitadorOkSi     = "";
    $AgitadorOkNo     = "";
    $d_AgitadorOk     = "";
}

if(isset($row_nfo["ProblemaFund"]) && $row_nfo["ProblemaFund"] == '1'){
    $ProblemaFundSi     = "checked";
    $ProblemaFundNo     = "";
    $AfirmativaRespuesta = "show";
    $Carga710            = "none";
    $d_ProblemaFund      = "readonly";
}else if(isset($row_nfo["ProblemaFund"]) && $row_nfo["ProblemaFund"] == '0'){
    $ProblemaFundSi     = "";
    $ProblemaFundNo     = "checked";
    $AfirmativaRespuesta = "none";
    $Carga710            = "show";
    $d_ProblemaFund      = "";
}else{
    $ProblemaFundSi     = "";
    $ProblemaFundNo     = "";
    $AfirmativaRespuesta = "none";
    $Carga710            = "none";
    $d_ProblemaFund      = "";
}

if(isset($row_nfo["ProblemaFundirNaf"]) && $row_nfo["ProblemaFundirNaf"] != ''){
    $ProblemaFundirNaf   =  $row_nfo["ProblemaFundirNaf"];
    $d_ProblemaFundirNaf = "readonly";
}else{
    $ProblemaFundirNaf   = "";
    $d_ProblemaFundirNaf = "";
}

// Paso 6
if(isset($row_nfo["SeguridadSulfurico"]) && $row_nfo["SeguridadSulfurico"] == '1'){
    $SeguridadSulfuricoSi   = "checked";
    $SeguridadSulfuricoNo   = "";
    $d_SeguridadSulfurico   = "readonly";
}else if(isset($row_nfo["SeguridadSulfurico"]) && $row_nfo["SeguridadSulfurico"] == '0'){
    $SeguridadSulfuricoSi     = "";
    $SeguridadSulfuricoNo     = "checked";
    $d_SeguridadSulfurico     = "";
}else{
    $SeguridadSulfuricoSi     = "";
    $SeguridadSulfuricoNo     = "";
    $d_SeguridadSulfurico     = "";
}

if(isset($row_nfo["EquipoSulfurico"]) && $row_nfo["EquipoSulfurico"] == '1'){
    $EquipoSulfuricoSi     = "checked";
    $EquipoSulfuricoNo     = "";
    $CargueSWF098          = "show";
    $d_EquipoSulfurico     = "readonly";
}else if(isset($row_nfo["EquipoSulfurico"]) && $row_nfo["EquipoSulfurico"] == '0'){
    $EquipoSulfuricoSi     = "";
    $EquipoSulfuricoNo     = "checked";
    $CargueSWF098          = "none";
    $d_EquipoSulfurico     = "";
}else{
    $EquipoSulfuricoSi     = "";
    $EquipoSulfuricoNo     = "";
    $CargueSWF098          = "none";
    $d_EquipoSulfurico     = "";
}

$query_etapas3  = $_form->get_formulario_etapas($id,'sulfurico');
$row_etapas2    = $query_etapas3->fetch_assoc();

// Paso 7     41
if(isset($row_etapas2["HoraInicio"]) && $row_etapas2["HoraInicio"] != ''){
    $horainiciocargaswfo   =  $row_etapas2["HoraInicio"];
    $d_horainiciocargaswfo = "readonly";
}else{
    $horainiciocargaswfo   = "";
    $d_horainiciocargaswfo = "";
}

if(isset($row_etapas2["HoraFin"]) && $row_etapas2["HoraFin"] != ''){
    $horafincargaswfo      =  $row_etapas2["HoraFin"];
    $d_horafincargaswfo    = "readonly";
}else{
    $horafincargaswfo      = "";
    $d_horafincargaswfo    = "";
}

if(isset($row_nfo["CierreControlOlores"]) && $row_nfo["CierreControlOlores"] == '1'){
    $CierreControlOlores    = "checked";
    $d_CierreControlOlores  = "readonly";
}else{
    $CierreControlOlores    = "";
    $d_CierreControlOlores  = "";
}

$query_etapas4  = $_form->get_formulario_etapas($id,'sulfurico1');
$row_etapas4    = $query_etapas4->fetch_assoc();

if(isset($row_etapas4["HoraInicio"]) && $row_etapas4["HoraInicio"] != ''){
    $horainiciocargaswfo2   = $row_etapas4["HoraInicio"];
    $d_horainiciocargaswfo2 = "readonly";
}else{
    $horainiciocargaswfo2   = "";
    $d_horainiciocargaswfo2 = "";
}

if(isset($row_etapas4["HoraFin"]) && $row_etapas4["HoraFin"] != ''){
    $horafincargaswfo2     = $row_etapas4["HoraFin"];
    $d_horafincargaswfo2   = "readonly";
}else{
    $horafincargaswfo2     = "";
    $d_horafincargaswfo2   = "";
}

if(isset($row_etapas4["Temperatura"]) && $row_etapas4["Temperatura"] != ''){
    $tempswfo1             = $row_etapas4["Temperatura"];
    $d_tempswfo1           = "readonly";
}else{
    $tempswfo1             = "";
    $d_tempswfo1           = "";
}

if(isset($row_etapas4["Presion"]) && $row_etapas4["Presion"] != ''){
    $presionswfo1          = $row_etapas4["Presion"];
    $d_presionswfo1        = "readonly";
}else{
    $presionswfo1          = "";
    $d_presionswfo1        = "";
}


if(isset($row_nfo["Vapor"]) && $row_nfo["Vapor"] == '0'){
    $VaporSi     = "checked";
    $VaporNo     = "";
    $d_Vapor     = "readonly";
}else if(isset($row_nfo["Vapor"]) && $row_nfo["Vapor"] == '1'){
    $VaporSi     = "";
    $VaporNo     = "checked";
    $d_Vapor     = "";
}else{
    $VaporSi     = "";
    $VaporNo     = "";
    $d_Vapor     = "";
}

$query_etapas5  = $_form->get_formulario_etapas($id,'sostener1');
$row_etapas5    = $query_etapas5->fetch_assoc();

if(isset($row_etapas5["HoraInicio"]) && $row_etapas5["HoraInicio"] != ''){
    $horainiciosostenertemp     = $row_etapas5["HoraInicio"];
    $d_horainiciosostenertemp   = "readonly";
}else{
    $horainiciosostenertemp     = "";
    $d_horainiciosostenertemp   = "";
}

if(isset($row_etapas5["Temperatura"]) && $row_etapas5["Temperatura"] != ''){
    $temphr1     = $row_etapas5["Temperatura"];
    $d_temphr1   = "readonly";
}else{
    $temphr1     = "";
    $d_temphr1   = "";
}

if(isset($row_etapas5["Presion"]) && $row_etapas5["Presion"] != ''){
    $presionhr1   = $row_etapas5["Presion"];
    $d_presionhr1 = "readonly";
}else{
    $presionhr1     = "";
    $d_presionhr1   = "";
}

$query_etapas6  = $_form->get_formulario_etapas($id,'sostener2');
$row_etapas6    = $query_etapas6->fetch_assoc();

if(isset($row_etapas6["Temperatura"]) && $row_etapas6["Temperatura"] != ''){
    $temphr2     = $row_etapas6["Temperatura"];
    $d_temphr2   = "readonly";
}else{
    $temphr2     = "";
    $d_temphr2   = "";
}

if(isset($row_etapas6["Presion"]) && $row_etapas6["Presion"] != ''){
    $presionhr2     = $row_etapas6["Presion"];
    $d_presionhr2   = "readonly";
}else{
    $presionhr2     = "";
    $d_presionhr2   = "";
}

$query_etapas7  = $_form->get_formulario_etapas($id,'sostener3');
$row_etapas7    = $query_etapas7->fetch_assoc();

if(isset($row_etapas7["Temperatura"]) && $row_etapas7["Temperatura"] != ''){
    $temphr3     = $row_etapas7["Temperatura"];
    $d_temphr3   = "readonly";
}else{
    $temphr3     = "";
    $d_temphr3   = "";
}

if(isset($row_etapas7["Presion"]) && $row_etapas7["Presion"] != ''){
    $presionhr3     = $row_etapas7["Presion"];
    $d_presionhr3   = "readonly";
}else{
    $presionhr3     = "";
    $d_presionhr3   = "";
}

if(isset($row_etapas7["HoraFin"]) && $row_etapas7["HoraFin"] != ''){
    $horafinsostenertemp   = $row_etapas7["HoraFin"];
    $d_horafinsostenertemp = "readonly";
}else{
    $horafinsostenertemp   = "";
    $d_horafinsostenertemp = "";
}

if(isset($row_nfo["ProblemaSWFO"]) && $row_nfo["ProblemaSWFO"] == '1'){
    $ProblemaSWFOSi     = "checked";
    $ProblemaSWFONo     = "";
    $_TextoProblemaSWFO = "show";
    $d_ProblemaSWFO     = "readonly";
}else if(isset($row_nfo["ProblemaSWFO"]) && $row_nfo["ProblemaSWFO"] == '0'){
    $ProblemaSWFOSi     = "";
    $ProblemaSWFONo     = "checked";
    $_TextoProblemaSWFO = "none";
    $d_ProblemaSWFO     = "";
}else{
    $ProblemaSWFOSi     = "";
    $ProblemaSWFONo     = "";
    $_TextoProblemaSWFO = "none";
    $d_ProblemaSWFO     = "";
}

$TextoProblemaSWFO   = isset($row["TextoProblemaSWFO"])    ? $row["TextoProblemaSWFO"]    :'';

if(isset($row_nfo["EnfriarOk"]) && $row_nfo["EnfriarOk"] == '1'){
    $EnfriarOkSi     = "checked";
    $EnfriarOkNo     = "";
    $d_EnfriarOk     = "readonly";
}else if(isset($row_nfo["EnfriarOk"]) && $row_nfo["EnfriarOk"] == '0'){
    $EnfriarOkSi     = "";
    $EnfriarOkNo     = "checked";
    $d_EnfriarOk     = "";
}else{
    $EnfriarOkSi     = "";
    $EnfriarOkNo     = "";
    $d_EnfriarOk     = "";
}

$query_etapas8  = $_form->get_formulario_etapas($id,'enfriado1');
$row_etapas8    = $query_etapas8->fetch_assoc();
if(isset($row_etapas8["Temperatura"]) && $row_etapas8["Temperatura"] != ''){
    $tempenfriado    = $row_etapas8["Temperatura"];
    $d_tempenfriado  = "readonly";
}else{
    $tempenfriado    = "";
    $d_tempenfriado  = "";
}
if(isset($row_etapas8["Presion"]) && $row_etapas8["Presion"] != ''){
    $presionenfriado = $row_etapas8["Presion"];
    $d_presionenfriado  = "readonly";
}else{
    $presionenfriado    = "";
    $d_presionenfriado  = "";
}

$query_etapas9  = $_form->get_formulario_etapas($id,'enfriado2');
$row_etapas9    = $query_etapas9->fetch_assoc();
if(isset($row_etapas9["Temperatura"]) && $row_etapas9["Temperatura"] != ''){
    $tempadicionstw     = $row_etapas9["Temperatura"];
    $d_tempadicionstw   = "readonly";
}else{
    $tempadicionstw     = "";
    $d_tempadicionstw   = "";
}
if(isset($row_etapas9["Presion"]) && $row_etapas9["Presion"] != ''){
    $presionadicionstw  = $row_etapas9["Presion"];
    $d_presionadicionstw= "readonly";
}else{
    $presionadicionstw     = "";
    $d_presionadicionstw   = "";
}

if(isset($row_nfo["EvacuarCamisa"]) && $row_nfo["EvacuarCamisa"] == '1'){
    $EvacuarCamisa   = "checked";
    $d_EvacuarCamisa = "readonly";
}else{
    $EvacuarCamisa     = "";
    $d_EvacuarCamisa   = "";
}

if(isset($row_nfo["SuministroVapor"]) && $row_nfo["SuministroVapor"] == '1'){
    $SuministroVaporSi     = "checked";
    $SuministroVaporNo     = "";
    $d_SuministroVapor     = "readonly";
}else if(isset($row_nfo["SuministroVapor"]) && $row_nfo["SuministroVapor"] == '0'){
    $SuministroVaporSi     = "";
    $SuministroVaporNo     = "checked";
    $d_SuministroVapor     = "";
}else{
    $SuministroVaporSi     = "";
    $SuministroVaporNo     = "";
    $d_SuministroVapor     = "";
}

if(isset($row_nfo["SeguridadFDO"]) && $row_nfo["SeguridadFDO"] == '1'){
    $SeguridadFDOSi     = "checked";
    $SeguridadFDONo     = "";
    $d_SeguridadFDO     = "readonly";
}else if(isset($row_nfo["SeguridadFDO"]) && $row_nfo["SeguridadFDO"] == '0'){
    $SeguridadFDOSi     = "";
    $SeguridadFDONo     = "checked";
    $d_SeguridadFDO     = "";
}else{
    $SeguridadFDOSi     = "";
    $SeguridadFDONo     = "";
    $d_SeguridadFDO     = "";
}

if(isset($row_nfo["EquipoFDO"]) && $row_nfo["EquipoFDO"] == '1'){
    $EquipoFDOSi     = "checked";
    $EquipoFDONo     = "";
    $RevisoConexion  = "show";
    $Carga700        = "show";
    $d_EquipoFDO     = "readonly";
}else if(isset($row_nfo["EquipoFDO"]) && $row_nfo["EquipoFDO"] == '0'){
    $EquipoFDOSi     = "";
    $EquipoFDONo     = "checked";
    $RevisoConexion  = "none";
    $Carga700        = "none";
    $d_EquipoFDO     = "";
}else{
    $EquipoFDOSi     = "";
    $EquipoFDONo     = "";
    $RevisoConexion  = "none";
    $Carga700        = "none";
    $d_EquipoFDO     = "";
}

//  Paso 8      67
if(isset($row_nfo["LineaTierraOk"]) && $row_nfo["LineaTierraOk"] == '1'){
    $LineaTierraOk     = "checked";
    $d_LineaTierraOk   = "readonly";
}else{
    $LineaTierraOk     = "";
    $d_LineaTierraOk   = "";
}

if(isset($row_nfo["BombaNeumaticaOk"]) && $row_nfo["BombaNeumaticaOk"] == '1'){
    $BombaNeumaticaOk     = "checked";
    $d_BombaNeumaticaOk   = "readonly";
}else{
    $BombaNeumaticaOk     = "";
    $d_BombaNeumaticaOk   = "";
}
if(isset($row_nfo["ConexionOk"]) && $row_nfo["ConexionOk"] == '1'){
    $ConexionOk     = "checked";
    $d_ConexionOk   = "readonly";
}else{
    $ConexionOk     = "";
    $d_ConexionOk   = "";
}
if(isset($row_nfo["MangueraOk"]) && $row_nfo["MangueraOk"] == '1'){
    $MangueraOk     = "checked";
    $d_MangueraOk   = "readonly";
}else{
    $MangueraOk     = "";
    $d_MangueraOk   = "";
}
if(isset($row_nfo["LineaCargaOk"]) && $row_nfo["LineaCargaOk"] == '1'){
    $LineaCargaOk     = "checked";
    $d_LineaCargaOk   = "readonly";
}else{
    $LineaCargaOk     = "";
    $d_LineaCargaOk   = "";
}
if(isset($row_nfo["ValvulasCerradas"]) && $row_nfo["ValvulasCerradas"] == '1'){
    $ValvulasCerradas   = "checked";
    $d_ValvulasCerradas = "readonly";
}else{
    $ValvulasCerradas     = "";
    $d_ValvulasCerradas   = "";
}
if(isset($row_nfo["CapacidadTanque"]) && $row_nfo["CapacidadTanque"] == '1'){
    $CapacidadTanque    = "checked";
    $d_CapacidadTanque  = "readonly";
}else{
    $CapacidadTanque     = "";
    $d_CapacidadTanque   = "";
}

// Paso 9
$query_etapas10  = $_form->get_formulario_etapas($id,'carga7001');
$row_etapas10    = $query_etapas10->fetch_assoc();
if(isset($row_etapas10["HoraInicio"]) && $row_etapas10["HoraInicio"] != ''){
    $horainicioadc   = $row_etapas10["HoraInicio"];
    $d_horainicioadc = "readonly";
}else{
    $horainicioadc   = "";
    $d_horainicioadc = "";
}

if(isset($row_etapas10["Temperatura"]) && $row_etapas10["Temperatura"] != ''){
    $tempadc1        = $row_etapas10["Temperatura"];
    $d_tempadc1      = "readonly";
}else{
    $tempadc1        = "";
    $d_tempadc1      = "";
}

if(isset($row_etapas10["Presion"]) && $row_etapas10["Presion"] != ''){
    $presionadc1     = $row_etapas10["Presion"];
    $d_presionadc1   = "readonly";
}else{
    $presionadc1     = "";
    $d_presionadc1   = "";
}

if(isset($row_etapas10["Comentario"]) && $row_etapas10["Comentario"] != ''){
    $comentarioadc1     = $row_etapas10["Comentario"];
    $d_comentarioadc1   = "readonly";
}else{
    $comentarioadc1     = "";
    $d_comentarioadc1   = "";
}


$query_etapas11  = $_form->get_formulario_etapas($id,'carga7002');
$row_etapas11    = $query_etapas11->fetch_assoc();
if(isset($row_etapas11["Temperatura"]) && $row_etapas11["Temperatura"] != ''){
    $tempadc2        = $row_etapas11["Temperatura"];
    $d_tempadc2      = "readonly";
}else{
    $tempadc2        = "";
    $d_tempadc2      = "";
}

if(isset($row_etapas11["Presion"]) && $row_etapas11["Presion"] != ''){
    $presionadc2     = $row_etapas11["Presion"];
    $d_presionadc2   = "readonly";
}else{
    $presionadc2     = "";
    $d_presionadc2   = "";
}

if(isset($row_etapas11["Comentario"]) && $row_etapas11["Comentario"] != ''){
    $comentarioadc2     = $row_etapas11["Comentario"];
    $d_comentarioadc2   = "readonly";
}else{
    $comentarioadc2     = "";
    $d_comentarioadc2   = "";
}


$query_etapas12  = $_form->get_formulario_etapas($id,'carga7003');
$row_etapas12    = $query_etapas12->fetch_assoc();
if(isset($row_etapas12["Temperatura"])&& $row_etapas12["Temperatura"] != ''){
    $tempadc3        = $row_etapas12["Temperatura"];
    $d_tempadc3      = "readonly";
}else{
    $tempadc3        = "";
    $d_tempadc3      = "";
}

if(isset($row_etapas12["Presion"]) && $row_etapas12["Presion"] != ''){
    $presionadc3     = $row_etapas12["Presion"];
    $d_presionadc3   = "readonly";
}else{
    $presionadc3     = "";
    $d_presionadc3   = "";
}

if(isset($row_etapas12["Comentario"]) && $row_etapas12["Comentario"] != ''){
    $comentarioadc3     = $row_etapas12["Comentario"];
    $d_comentarioadc3   = "readonly";
}else{
    $comentarioadc3     = "";
    $d_comentarioadc3   = "";
}


$query_etapas13  = $_form->get_formulario_etapas($id,'carga7004');
$row_etapas13    = $query_etapas13->fetch_assoc();
if(isset($row_etapas13["Temperatura"]) && $row_etapas13["Temperatura"] != ''){
    $tempadc4        = $row_etapas13["Temperatura"];
    $d_tempadc4      = "readonly";
}else{
    $tempadc4        = "";
    $d_tempadc4      = "";
}

if(isset($row_etapas13["Presion"]) && $row_etapas13["Presion"] != ''){
    $presionadc4     = $row_etapas13["Presion"];
    $d_presionadc4   = "readonly";
}else{
    $presionadc4     = "";
    $d_presionadc4   = "";
}

if(isset($row_etapas13["Comentario"]) && $row_etapas13["Comentario"] != ''){
    $comentarioadc4     = $row_etapas13["Comentario"];
    $d_comentarioadc4   = "readonly";
}else{
    $comentarioadc4     = "";
    $d_comentarioadc4   = "";
}


$query_etapas14  = $_form->get_formulario_etapas($id,'carga7005');
$row_etapas14    = $query_etapas14->fetch_assoc();
if(isset($row_etapas14["Temperatura"])&& $row_etapas14["Temperatura"] != ''){
    $tempadc5        = $row_etapas14["Temperatura"];
    $d_tempadc5      = "readonly";
}else{
    $tempadc5        = "";
    $d_tempadc5      = "";
}

if(isset($row_etapas14["Presion"]) && $row_etapas14["Presion"] != ''){
    $presionadc5     = $row_etapas14["Presion"];
    $d_presionadc5   = "readonly";
}else{
    $presionadc5     = "";
    $d_presionadc5   = "";
}

if(isset($row_etapas14["Comentario"]) && $row_etapas14["Comentario"] != ''){
    $comentarioadc5     = $row_etapas14["Comentario"];
    $d_comentarioadc5   = "readonly";
}else{
    $comentarioadc5     = "";
    $d_comentarioadc5   = "";
}

if(isset($row_etapas14["HoraFin"]) && $row_etapas14["HoraFin"] != ''){
    $horafinadc      = $row_etapas14["HoraFin"];
    $d_horafinadc    = "readonly";
}else{
    $horafinadc      = "";
    $d_horafinadc    = "";
}


$query_etapas15  = $_form->get_formulario_etapas($id,'reaccion1');
$row_etapas15    = $query_etapas15->fetch_assoc();
if(isset($row_etapas15["HoraInicio"]) && $row_etapas15["HoraInicio"] != ''){
    $horainicioreac     = $row_etapas15["HoraInicio"];
    $d_horainicioreac   = "readonly";
}else{
    $horainicioreac     = "";
    $d_horainicioreac   = "readonly";
}

if(isset($row_etapas15["Temperatura"]) && $row_etapas15["Temperatura"] != ''){
    $tempreac1       = $row_etapas15["Temperatura"];
    $d_tempreac1     = "readonly";
}else{
    $tempreac1       = "";
    $d_tempreac1     = "";
}

if(isset($row_etapas15["Presion"]) && $row_etapas15["Presion"] != ''){
    $presionreac1    = $row_etapas15["Presion"];
    $d_presionreac1  = "readonly";
}else{
    $presionreac1    = "";
    $d_presionreac1  = "";
}

if(isset($row_etapas15["Comentario"]) && $row_etapas15["Comentario"] != ''){
    $comentarioreac1    = $row_etapas15["Comentario"];
    $d_comentarioreac1  = "readonly";
}else{
    $comentarioreac1    = "";
    $d_comentarioreac1  = "";
}


$query_etapas16  = $_form->get_formulario_etapas($id,'reaccion2');
$row_etapas16    = $query_etapas16->fetch_assoc();
if(isset($row_etapas16["Temperatura"]) && $row_etapas16["Temperatura"] != ''){
    $tempreact2      = $row_etapas16["Temperatura"];
    $d_tempreact2    = "readonly";
}else{
    $tempreact2      = "";
    $d_tempreact2    = "";
}

if(isset($row_etapas16["Presion"]) && $row_etapas16["Presion"] != ''){
    $presionreact2   = $row_etapas16["Presion"];
    $d_presionreact2 = "readonly";
}else{
    $presionreact2   = "";
    $d_presionreact2 = "";
}

if(isset($row_etapas16["Comentario"]) && $row_etapas16["Comentario"] != ''){
    $comentarioreac2    = $row_etapas16["Comentario"];
    $d_comentarioreac2  = "readonly";
}else{
    $comentarioreac2    = "";
    $d_comentarioreac2  = "";
}


$query_etapas17  = $_form->get_formulario_etapas($id,'reaccion3');
$row_etapas17    = $query_etapas17->fetch_assoc();
if(isset($row_etapas17["Temperatura"]) && $row_etapas17["Temperatura"] != ''){
    $tempreac3       = $row_etapas17["Temperatura"];
    $d_tempreac3     = "readonly";
}else{
    $tempreac3       = "";
    $d_tempreac3     = "";
}

if(isset($row_etapas17["Presion"]) && $row_etapas17["Presion"] != ''){
    $presionreac3    = $row_etapas17["Presion"];
    $d_presionreac3  = "readonly";
}else{
    $presionreac3    = "";
    $d_presionreac3  = "";
}

if(isset($row_etapas17["Comentario"]) && $row_etapas17["Comentario"] != ''){
    $comentarioreac3    = $row_etapas17["Comentario"];
    $d_comentarioreac3  = "readonly";
}else{
    $comentarioreac3    = "";
    $d_comentarioreac3  = "";
}


$query_etapas18  = $_form->get_formulario_etapas($id,'reaccion4');
$row_etapas18    = $query_etapas18->fetch_assoc();
if(isset($row_etapas18["Temperatura"]) && $row_etapas18["Temperatura"] != ''){
    $tempreac4       = $row_etapas18["Temperatura"];
    $d_tempreac4     = "readonly";
}else{
    $tempreac4       = "";
    $d_tempreac4     = "";
}

if(isset($row_etapas18["Presion"]) && $row_etapas18["Presion"] != ''){
    $presionreac4    = $row_etapas18["Presion"];
    $d_presionreac4  = "readonly";
}else{
    $presionreac4    = "";
    $d_presionreac4  = "";
}

if(isset($row_etapas18["Comentario"]) && $row_etapas18["Comentario"] != ''){
    $comentarioreac4    = $row_etapas18["Comentario"];
    $d_comentarioreac4  = "readonly";
}else{
    $comentarioreac4    = "";
    $d_comentarioreac4  = "";
}


$query_etapas19  = $_form->get_formulario_etapas($id,'reaccion5');
$row_etapas19    = $query_etapas19->fetch_assoc();
if(isset($row_etapas19["Temperatura"]) && $row_etapas19["Temperatura"] != ''){
    $tempreac5       = $row_etapas19["Temperatura"];
    $d_tempreac5     = "readonly";
}else{
    $tempreac5       = "";
    $d_tempreac5     = "";
}

if(isset($row_etapas19["Presion"]) && $row_etapas19["Presion"] != ''){
    $presionreac5    = $row_etapas19["Presion"];
    $d_presionreac5  = "readonly";
}else{
    $presionreac5    = "";
    $d_presionreac5  = "";
}

if(isset($row_etapas19["Comentario"]) && $row_etapas19["Comentario"] != ''){
    $comentarioreac5    = $row_etapas19["Comentario"];
    $d_comentarioreac5  = "readonly";
}else{
    $comentarioreac5    = "";
    $d_comentarioreac5  = "";
}


$query_etapas20  = $_form->get_formulario_etapas($id,'reaccion6');
$row_etapas20    = $query_etapas20->fetch_assoc();
if(isset($row_etapas20["Temperatura"]) && $row_etapas20["Temperatura"] != ''){
    $tempreac6       = $row_etapas20["Temperatura"];
    $d_tempreac6     = "readonly";
}else{
    $tempreac6       = "";
    $d_tempreac6     = "";
}

if(isset($row_etapas20["Presion"]) && $row_etapas20["Presion"] != ''){
    $presionreac6    = $row_etapas20["Presion"];
    $d_presionreac6  = "readonly";
}else{
    $presionreac6    = "";
    $d_presionreac6  = "";
}

if(isset($row_etapas20["Comentario"]) && $row_etapas20["Comentario"] != ''){
    $comentarioreac6    = $row_etapas20["Comentario"];
    $d_comentarioreac6  = "readonly";
}else{
    $comentarioreac6    = "";
    $d_comentarioreac6  = "";
}


$query_etapas21  = $_form->get_formulario_etapas($id,'reaccion7');
$row_etapas21    = $query_etapas21->fetch_assoc();
if(isset($row_etapas21["Temperatura"]) && $row_etapas21["Temperatura"] != ''){
    $tempreac7       = $row_etapas21["Temperatura"];
    $d_tempreac7     = "readonly";
}else{
    $tempreac7       = "";
    $d_tempreac7     = "";
}

if(isset($row_etapas21["Presion"]) && $row_etapas21["Presion"] != ''){
    $presionreac7    = $row_etapas21["Presion"];
    $d_presionreac7  = "readonly";
}else{
    $presionreac7    = "";
    $d_presionreac7  = "";
}

if(isset($row_etapas21["Comentario"]) && $row_etapas21["Comentario"] != ''){
    $comentarioreac7    = $row_etapas21["Comentario"];
    $d_comentarioreac7  = "";
}else{
    $comentarioreac7    = "";
    $d_comentarioreac7  = "";
}

if(isset($row_etapas21["HoraFin"]) && $row_etapas21["HoraFin"] != ''){
    $horafinreac     = $row_etapas21["HoraFin"];
    $d_horafinreac   = "readonly";
}else{
    $horafinreac     = "";
    $d_horafinreac   = "";
}


if(isset($row_nfo["ProblemaCondensacion"]) && $row_nfo["ProblemaCondensacion"] == '1'){
    $ProblemaCondensacionSi     = "checked";
    $ProblemaCondensacionNo     = "";
    $ShowTextoProblemaCondensacion  = "show";
    $AdicionarSTW               = "show";
    $d_ProblemaCondensacion     = "readonly";
}else if(isset($row_nfo["ProblemaCondensacion"]) && $row_nfo["ProblemaCondensacion"] == '0'){
    $ProblemaCondensacionSi     = "";
    $ProblemaCondensacionNo     = "checked";
    $ShowTextoProblemaCondensacion  = "none";
    $AdicionarSTW               = "none";
    $d_ProblemaCondensacion     = "";
}else{
    $ProblemaCondensacionSi     = "";
    $ProblemaCondensacionNo     = "";
    $ShowTextoProblemaCondensacion  = "none";
    $AdicionarSTW               = "none";
    $d_ProblemaCondensacion     = "";
}

if(isset($row_nfo["TextoProblemaCondensacion"]) && $row_nfo["TextoProblemaCondensacion"] != ''){
    $TextoProblemaCondensacion   =  $row_nfo["TextoProblemaCondensacion"];
    $d_TextoProblemaCondensacion = "readonly";
}else{
    $TextoProblemaCondensacion   = "";
    $d_TextoProblemaCondensacion = "";
}


// Paso 10      114
$query_etapas22  = $_form->get_formulario_etapas($id,'adicionarstw');
$row_etapas22    = $query_etapas22->fetch_assoc();
if(isset($row_etapas22["HoraInicio"]) && $row_etapas22["HoraInicio"] != ''){
    $horainicioadcstw2      = $row_etapas22["HoraInicio"];
    $d_horainicioadcstw2    = "readonly";
}else{
    $horainicioadcstw2      = "";
    $d_horainicioadcstw2    = "";
}

if(isset($row_etapas22["Temperatura"]) && $row_etapas22["Temperatura"] != ''){
    $tempadcstw2        = $row_etapas22["Temperatura"];
    $d_tempadcstw2      = "readonly";
}else{
    $tempadcstw2        = "";
    $d_tempadcstw2      = "";
}

if(isset($row_etapas22["Presion"]) && $row_etapas22["Presion"] != ''){
    $presionadcstw2     = $row_etapas22["Presion"];
    $d_presionadcstw2   = "readonly";
}else{
    $presionadcstw2     = "";
    $d_presionadcstw2   = "";
}

if(isset($row_etapas22["HoraFin"]) && $row_etapas22["HoraFin"] != ''){
    $horafinadcstw2     = $row_etapas22["HoraFin"];
    $d_horafinadcstw2   = "readonly";
}else{
    $horafinadcstw2     = "";
    $d_horafinadcstw2   = "";
}


if(isset($row_nfo["SeguridadCSO"]) && $row_nfo["SeguridadCSO"] == '1'){
    $SeguridadCSOSi     = "checked";
    $SeguridadCSONo     = "";
    $d_SeguridadCSO     = "readonly";
}else if(isset($row_nfo["SeguridadCSO"]) && $row_nfo["SeguridadCSO"] == '0'){
    $SeguridadCSOSi     = "";
    $SeguridadCSONo     = "checked";
    $d_SeguridadCSO     = "";
}else{
    $SeguridadCSOSi     = "";
    $SeguridadCSONo     = "";
    $d_SeguridadCSO     = "";
}

if(isset($row_nfo["EquipoCSO"]) && $row_nfo["EquipoCSO"] == '1'){
    $EquipoCSOSi     = "checked";
    $EquipoCSONo     = "";
    $ReaccionNeutra  = "show";
    $d_EquipoCSO     = "readonly";
}else if(isset($row_nfo["EquipoCSO"]) && $row_nfo["EquipoCSO"] == '0'){
    $EquipoCSOSi     = "";
    $EquipoCSONo     = "checked";
    $ReaccionNeutra  = "none";
    $d_EquipoCSO     = "";
}else{
    $EquipoCSOSi     = "";
    $EquipoCSONo     = "checked";
    $ReaccionNeutra  = "none";
    $d_EquipoCSO     = "";
}

// Paso 11
$query_etapas23  = $_form->get_formulario_etapas($id,'ReaccionNeutra1');
$row_etapas23    = $query_etapas23->fetch_assoc();
if(isset($row_etapas23["HoraInicio"]) && $row_etapas23["HoraInicio"] != ''){
    $horainicioneut     = $row_etapas23["HoraInicio"];
    $d_horainicioneut   = "readonly";
}else{
    $horainicioneut     = "";
    $d_horainicioneut   = "";
}

if(isset($row_etapas23["Temperatura"]) && $row_etapas23["Temperatura"] != ''){
    $tempneut1      = $row_etapas23["Temperatura"];
    $d_tempneut1    = "readonly";
}else{
    $tempneut1      = "";
    $d_tempneut1    = "";
}

if(isset($row_etapas23["Presion"]) && $row_etapas23["Presion"] != ''){
    $presionneut1   = $row_etapas23["Presion"];
    $d_presionneut1 = "readonly";
}else{
    $presionneut1   = "";
    $d_presionneut1 = "";
}

if(isset($row_etapas23["Comentario"]) && $row_etapas23["Comentario"] != ''){
    $comentarioneut1    = $row_etapas23["Comentario"];
    $d_comentarioneut1  = "readonly";
}else{
    $comentarioneut1    = "";
    $d_comentarioneut1  = "";
}


$query_etapas24  = $_form->get_formulario_etapas($id,'ReaccionNeutra2');
$row_etapas24    = $query_etapas24->fetch_assoc();
if(isset($row_etapas24["Temperatura"]) && $row_etapas24["Temperatura"] != ''){
    $tempneut2      = $row_etapas24["Temperatura"];
    $d_tempneut2    = "readonly";
}else{
    $tempneut2      = "";
    $d_tempneut2    = "";
}

if(isset($row_etapas24["Presion"]) && $row_etapas24["Presion"] != ''){
    $presionneut2   = $row_etapas24["Presion"];
    $d_presionneut2 = "readonly";
}else{
    $presionneut2   = "";
    $d_presionneut2 = "";
}

if(isset($row_etapas24["Comentario"]) && $row_etapas24["Comentario"] != ''){
    $comentarioneut2    = $row_etapas24["Comentario"];
    $d_comentarioneut2  = "readonly";
}else{
    $comentarioneut2    = "";
    $d_comentarioneut2  = "";
}


$query_etapas25  = $_form->get_formulario_etapas($id,'ReaccionNeutra3');
$row_etapas25    = $query_etapas25->fetch_assoc();
if(isset($row_etapas25["Temperatura"]) && $row_etapas25["Temperatura"] != ''){
    $tempneut3  = $row_etapas25["Temperatura"];
    $d_tempneut3= "readonly";
}else{
    $tempneut3      = "";
    $d_tempneut3    = "";
}

if(isset($row_etapas25["Presion"]) && $row_etapas25["Presion"] != ''){
    $presionneut3   = $row_etapas25["Presion"];
    $d_presionneut3 = "readonly";
}else{
    $presionneut3   = "";
    $d_presionneut3 = "";
}

if(isset($row_etapas25["Comentario"]) && $row_etapas25["Comentario"] != ''){
    $comentarioneut3    = $row_etapas25["Comentario"];
    $d_comentarioneut3  = "readonly";
}else{
    $comentarioneut3    = "";
    $d_comentarioneut3  = "";
}


$query_etapas26  = $_form->get_formulario_etapas($id,'ReaccionNeutra4');
$row_etapas26    = $query_etapas26->fetch_assoc();
if(isset($row_etapas26["Temperatura"]) && $row_etapas26["Temperatura"] != ''){
    $tempneut4  = $row_etapas26["Temperatura"];
    $d_tempneut4= "readonly";
}else{
    $tempneut4      = "";
    $d_tempneut4    = "";
}

if(isset($row_etapas26["Presion"]) && $row_etapas26["Presion"] != ''){
    $presionneut4   = $row_etapas26["Presion"];
    $d_presionneut4 = "readonly";
}else{
    $presionneut4   = "";
    $d_presionneut4 = "";
}

if(isset($row_etapas26["Comentario"]) && $row_etapas26["Comentario"] != ''){
    $comentarioneut4    = $row_etapas26["Comentario"];
    $d_comentarioneut4  = "readonly";
}else{
    $comentarioneut4    = "";
    $d_comentarioneut4  = "";
}

if(isset($row_etapas26["HoraFin"]) && $row_etapas26["HoraFin"] != ''){
    $horafinneut    = $row_etapas26["HoraFin"];
    $d_horafinneut  = "readonly";
}else{
    $horafinneut    = "";
    $d_horafinneut  = "";
}


$query_etapas27  = $_form->get_formulario_etapas($id,'homogenizacion');
$row_etapas27    = $query_etapas27->fetch_assoc();
if(isset($row_etapas27["HoraInicio"]) && $row_etapas27["HoraInicio"] != ''){
    $horainiciohomoge   = $row_etapas27["HoraInicio"];
    $d_horainiciohomoge = "readonly";
}else{
    $horainiciohomoge   = "";
    $d_horainiciohomoge = "";
}

if(isset($row_etapas27["Temperatura"]) && $row_etapas27["Temperatura"] != ''){
    $temphomoge1    = $row_etapas27["Temperatura"];
    $d_temphomoge1  = "readonly";
}else{
    $temphomoge1    = "";
    $d_temphomoge1  = "";
}

if(isset($row_etapas27["Presion"]) && $row_etapas27["Presion"] != ''){
    $presionhomoge1     = $row_etapas27["Presion"];
    $d_presionhomoge1   = "readonly";
}else{
    $presionhomoge1     = "";
    $d_presionhomoge1   = "";
}

if(isset($row_etapas27["Comentario"]) && $row_etapas27["Comentario"] != ''){
    $comentariohomoge1      = $row_etapas27["Comentario"];
    $d_comentariohomoge1    = "readonly";
}else{
    $comentariohomoge1      = "";
    $d_comentariohomoge1    = "";
}


$query_etapas28  = $_form->get_formulario_etapas($id,'homogenizacion2');
$row_etapas28    = $query_etapas28->fetch_assoc();
if(isset($row_etapas28["Temperatura"]) && $row_etapas28["Temperatura"] != ''){
    $temphomoge2    = $row_etapas28["Temperatura"];
    $d_temphomoge2  = "readonly";
}else{
    $temphomoge2    = "";
    $d_temphomoge2  = "";
}

if(isset($row_etapas28["Presion"]) && $row_etapas28["Presion"] != ''){
    $presionhomoge2     = $row_etapas28["Presion"];
    $d_presionhomoge2   = "readonly";
} else{
    $presionhomoge2     = "";
    $d_presionhomoge2   = "";
}

if(isset($row_etapas28["Comentario"]) && $row_etapas28["Comentario"] != ''){
    $comentariohomoge2      = $row_etapas28["Comentario"];
    $d_comentariohomoge2    = "readonly";
}else{
    $comentariohomoge2      = "";
    $d_comentariohomoge2    = "";
}


$query_etapas29  = $_form->get_formulario_etapas($id,'homogenizacion3');
$row_etapas29    = $query_etapas29->fetch_assoc();
if(isset($row_etapas29["Temperatura"]) && $row_etapas29["Temperatura"] != ''){
    $temphomoge3    = $row_etapas29["Temperatura"];
    $d_temphomoge3  = "readonly";
}else{
    $temphomoge3    = "";
    $d_temphomoge3  = "";
}

if(isset($row_etapas29["Presion"]) && $row_etapas29["Presion"] != ''){
    $presionhomoge3     = $row_etapas29["Presion"];
    $d_presionhomoge3   = "readonly";
}else{
    $presionhomoge3     = "";
    $d_presionhomoge3   = "";
}

if(isset($row_etapas29["HoraFin"]) && $row_etapas29["HoraFin"] != ''){
    $horafinhomoge      = $row_etapas29["HoraFin"];
    $d_horafinhomoge    = "readonly";
}else{
    $horafinhomoge      = "";
    $d_horafinhomoge    = "";
}


if(isset($row_nfo["OlorFormol"]) && $row_nfo["OlorFormol"] == '1'){
    $OlorFormolSi     = "checked";
    $OlorFormolNo     = "";
    $Enfriet85        = "show";
    $d_OlorFormol     = "readonly";
}else if(isset($row_nfo["OlorFormol"]) && $row_nfo["OlorFormol"] == '0'){
    $OlorFormolSi     = "";
    $OlorFormolNo     = "checked";
    $Enfriet85        = "none";
    $d_OlorFormol     = "";
}else{
    $OlorFormolSi     = "";
    $OlorFormolNo     = "";
    $Enfriet85        = "none";
    $d_OlorFormol     = "";
}

$query_etapas24  = $_form->get_formulario_etapas($id,'Enfriet85-');
$row_etapas24    = $query_etapas24->fetch_assoc();
if(isset($row_etapas24["Temperatura"]) && $row_etapas24["Temperatura"] != ''){
    $temp85             =  $row_etapas24["Temperatura"];
    $d_temp85           = "readonly";
}else{
    $temp85             = "";
    $d_temp85           = "";
}

if(isset($row_etapas24["HoraInicio"]) && $row_etapas24["HoraInicio"] != ''){
    $horainiciostw85    =  $row_etapas24["HoraInicio"];
    $d_horainiciostw85  = "readonly";
}else{
    $horainiciostw85    = "";
    $d_horainiciostw85  = "";
}

if(isset($row_etapas24["HoraFin"]) && $row_etapas24["HoraFin"] != ''){
    $horafinstw85       =  $row_etapas24["HoraFin"];
    $d_horafinstw85     = "readonly";
}else{
    $horafinstw85       = "";
    $d_horafinstw85     = "";
}


if(isset($row["ph10"]) && $row["ph10"] != ''){
    $ph10             = $row["ph10"];
    $d_ph10           = "readonly";
}else{
    $ph10             = "";
    $d_ph10           = "";
}

if(isset($row["Csc050Ajuste"]) && $row["Csc050Ajuste"] != ''){
    $Csc050Ajuste       = $row["Csc050Ajuste"];
    $d_Csc050Ajuste     = "readonly";
}else{
    $Csc050Ajuste       = "";
    $d_Csc050Ajuste     = "";
}

if(isset($row["Stw00Ajuste"]) && $row["Stw00Ajuste"] != ''){
    $Stw00Ajuste      =  $row["Stw00Ajuste"];
    $d_Stw00Ajuste    = "readonly";
}else{
    $Stw00Ajuste      = "";
    $d_Stw00Ajuste    = "";
}

if(isset($row["ph10fin"]) && $row["ph10fin"] != ''){
    $ph10fin          =  $row["ph10fin"];
    $d_ph10fin        = "readonly";
}else{
    $ph10fin          = "";
    $d_ph10fin        = "";
}


if(isset($row_nfo["ProductoBrillante"]) && $row_nfo["ProductoBrillante"] == '1'){
    $ProductoBrillanteSi     = "checked";
    $ProductoBrillanteNo     = "";
    $d_ProductoBrillante     = "readonly";
}else if(isset($row_nfo["ProductoBrillante"]) && $row_nfo["ProductoBrillante"] == '0'){
    $ProductoBrillanteSi     = "";
    $ProductoBrillanteNo     = "checked";
    $d_ProductoBrillante     = "";
}else{
    $ProductoBrillanteSi     = "";
    $ProductoBrillanteNo     = "";
    $d_ProductoBrillante     = "";
}

if(isset($row["HoraInicioLukas"]) && $row["HoraInicioLukas"] != ''){
    $HoraInicioLukas    = $row["HoraInicioLukas"];
    $d_HoraInicioLukas  = "readonly";
}else{
    $HoraInicioLukas    = "";
    $d_HoraInicioLukas  = "";
}

if(isset($row["HoraFinLukas"]) && $row["HoraFinLukas"] != ''){
    $HoraFinLukas       = $row["HoraFinLukas"];
    $d_HoraFinLukas     = "readonly";
}else{
    $HoraFinLukas       = "";
    $d_HoraFinLukas     = "";
}

if(isset($row_nfo["ProductoBrillante2"]) && $row_nfo["ProductoBrillante2"] == '1'){
    $ProductoBrillante2Si     = "checked";
    $ProductoBrillante2No     = "";
    $ProcesoDescarga          = "show";
    $d_ProductoBrillante2     = "readonly";
}else if(isset($row_nfo["ProductoBrillante2"]) && $row_nfo["ProductoBrillante2"] == '0'){
    $ProductoBrillante2Si     = "";
    $ProductoBrillante2No     = "checked";
    $ProcesoDescarga          = "none";
    $d_ProductoBrillante2     = "";
}else{
    $ProductoBrillante2Si     = "";
    $ProductoBrillante2No     = "";
    $ProcesoDescarga          = "none";
    $d_ProductoBrillante2     = "";
}

$queryProcesos  = $_form->get_formulario_procesos($id);
$rowProcesos    = $queryProcesos->fetch_assoc();
if(isset($rowProcesos["HoraFinal"]) && $rowProcesos["HoraFinal"] != ''){
    $HoraFinal      = $rowProcesos["HoraFinal"];
    $d_HoraFinal    = "readonly";
}else{
    $HoraFinal      = "";
    $d_HoraFinal    = "";
}

// Paso 12
if(isset($row["SegNFO"]) && $row["SegNFO"] == '1'){
    $SegNFO     = "checked";
    $d_SegNFO   = "readonly";
}else{
    $SegNFO     = "";
    $d_SegNFO   = "";
}

if(isset($row_nfo["EquipoNFO"]) && $row_nfo["EquipoNFO"] == '1'){
    $EquipoNFOSi        = "checked";
    $EquipoNFONo        = "";
    $SuspendioAgitacion = "show";
    $d_EquipoNFO        = "readonly";
}else if(isset($row_nfo["EquipoNFO"]) && $row_nfo["EquipoNFO"] == '0'){
    $EquipoNFOSi        = "";
    $EquipoNFONo        = "checked";
    $SuspendioAgitacion = "none";
    $d_EquipoNFO        = "";
}else{
    $EquipoNFOSi        = "";
    $EquipoNFONo        = "";
    $SuspendioAgitacion = "none";
    $d_EquipoNFO        = "";
}

// Paso 13     160
if(isset($row["AgitacionOff"]) && $row["AgitacionOff"] == '1'){
    $AgitacionOff   = "checked";
    $d_AgitacionOff = "readonly";
}else{
    $AgitacionOff       = "";
    $d_AgitacionOff     = "";
}
if(isset($row["TalegoDescarga"]) && $row["TalegoDescarga"] == '1'){
    $TalegoDescarga     = "checked";
    $d_TalegoDescarga   = "readonly";
}else{
    $TalegoDescarga     = "";
    $d_TalegoDescarga   = "";
}

$query_etapas25  = $_form->get_formulario_etapas($id,'DescargaIbc');
$row_etapas25    = $query_etapas25->fetch_assoc();
if(isset($row_etapas25["HoraInicio"]) && $row_etapas25["HoraInicio"] != ''){
    $horainiciodescarga     = $row_etapas25["HoraInicio"];
    $d_horainiciodescarga   = "readonly";
}else{
    $horainiciodescarga     = "";
    $d_horainiciodescarga   = "";
}

if(isset($row_etapas25["HoraFin"]) && $row_etapas25["HoraFin"] != ''){
    $horafindescarga    =  $row_etapas25["HoraFin"];
    $d_horafindescarga  = "readonly";
}else{
    $horafindescarga    = "";
    $d_horafindescarga  = "";
}


if(isset($row_nfo["ResiduoTalego"]) && $row_nfo["ResiduoTalego"] == '1'){
    $ResiduoTalegoSi        = "checked";
    $ResiduoTalegoNo        = "";
    $d_ResiduoTalego        = "readonly";
}else if(isset($row_nfo["ResiduoTalego"]) && $row_nfo["ResiduoTalego"] == '0'){
    $ResiduoTalegoSi        = "";
    $ResiduoTalegoNo        = "checked";
    $d_ResiduoTalego        = "";
}else{
    $ResiduoTalegoSi        = "";
    $ResiduoTalegoNo        = "";
    $d_ResiduoTalego        = "";
}

if(isset($row["EnviarMuestraFinal"]) && $row["EnviarMuestraFinal"] == '1'){
    $EnviarMuestraFinal     = "checked";
    $d_EnviarMuestraFinal   = "readonly";
}else{
    $EnviarMuestraFinal     = "";
    $d_EnviarMuestraFinal   = "";
}

if(isset($row["Aspecto"])){
    $Aspecto   = $row["Aspecto"] ;
    $d_Aspecto = "readonly";
}else{
    $Aspecto    = "";
    $d_Aspecto  = "";
}

if(isset($row["PorcentajeSolidos"])){
    $PorcentajeSolidos    =  $row["PorcentajeSolidos"];
    $d_PorcentajeSolidos  = "readonly";
}else{
    $PorcentajeSolidos    = "";
    $d_PorcentajeSolidos  = "";
}

if(isset($row["pH10Final"])){
    $pH10Final      =  $row["pH10Final"];
    $d_pH10Final    = "readonly";
}else{
    $pH10Final      = "";
    $d_pH10Final    = "";
}

if(isset($row["Solubilidad10"])){
    $Solubilidad10    =  $row["Solubilidad10"] ;
    $d_Solubilidad10  = "readonly";
}else{
    $Solubilidad10    = "";
    $d_Solubilidad10  = "";
}

if(isset($row["Solubilidad40"])){
    $Solubilidad40    = $row["Solubilidad40"] ;
    $d_Solubilidad40  = "";
}else{
    $Solubilidad40    = "";
    $d_Solubilidad40  = "";
}

if(isset($row["Rendimiento"])){
    $Rendimiento      =  $row["Rendimiento"] ;
    $d_Rendimiento    = "readonly";
}else{
    $Rendimiento      = "";
    $d_Rendimiento    = "";
}

if(isset($row_nfo["ProcesoDif"]) && $row_nfo["ProcesoDif"] == '1'){
    $ProcesoDifSi        = "checked";
    $ProcesoDifNo        = "";
    $d_ProcesoDif        = "readonly";
}else if(isset($row_nfo["ProcesoDif"]) && $row_nfo["ProcesoDif"] == '0'){
    $ProcesoDifSi        = "";
    $ProcesoDifNo        = "checked";
    $d_ProcesoDif        = "";
}else{
    $ProcesoDifSi        = "";
    $ProcesoDifNo        = "";
    $d_ProcesoDif        = "";
}

$query_etapas26  = $_form->get_formulario_etapas($id,'PasoFinal');
$row_etapas26    = $query_etapas26->fetch_assoc();
if(isset($row_etapas26["HoraInicio"]) && $row_etapas26["HoraInicio"] != ''){
    $horainiciolavado   = $row_etapas26["HoraInicio"];
    $d_horainiciolavado = "readonly";
}else{
    $horainiciolavado   = "";
    $d_horainiciolavado = "";
}
if(isset($row_etapas26["HoraFin"]) && $row_etapas26["HoraFin"] != ''){
    $horafinlavado      =  $row_etapas26["HoraFin"]; 
    $d_horafinlavado    = "readonly";
}else{
    $horafinlavado      = "";
    $d_horafinlavado    = "";
}

if(isset($row["KgEnjuague"]) && $row["KgEnjuague"] != ''){
    $KgEnjuague     = $row["KgEnjuague"];
    $d_KgEnjuague   = "readonly";
}else{
    $KgEnjuague     = "";
    $d_KgEnjuague   = "";
}
if(isset($row["KgLavado"]) && $row["KgLavado"] != ''){
    $KgLavado   = $row["KgLavado"] ;
    $d_KgLavado = "readonly";
}else{
    $KgLavado   = "";
    $d_KgLavado = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALTMANN - Modelando Conocimiento</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" type="ico" href="favicon16x16.ico">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Document</title>
</head>

<body>
    <header class="site-header p-5">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                <img src="../../img/colresin-altmann.PNG" alt="Logotipo Altmann">
                </a>

                <nav class="navegacion">
                    <a href="../inicio/index.php">Inicio</a>
                    <a href="../usuarios/usuarios.php" <?php echo $display; ?> >Usuarios</a>
                    <a href="../procesos/procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>
    <div class="container">
        <main>       
            <section id="formulario">
                
                <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="pasos" value="1">
                    <fieldset>
                        <center>
                        <!-- Paso 1 -->
                        <div class="container" id="seleccioneProceso">
                            <H4>Seleccione proceso</H4>
                            <label>NFO</label>
                            <input type="text" id="nfo" name="nfo" value="<?php echo $nfo; ?>" disabled />

                            <legend>Proceso NFO</legend><br />

                            <label for="NumeroLote">Número de lote:</label>
                            <input type="text" size="2" id="NumeroLote" placeholder="Número de Lote" value="<?php echo $numeroLote; ?>" name="numeroLote" disabled />

                            <h4>Equipos a Utilizar</h4>
                            <table class="table">
                                <tr>
                                    <td style='width:35%;' align="center" >
                                        <label>DeDietrich 2</label>
                                        <input type="checkbox" id="Dietrich2" name="dietrich2" <?php echo $dietrich2 . ' ' . $d_dietrich2; ?>>
                                    </td>
                                    <td style='width:30%;' align="center" >
                                        <label>Filtro Lukas</label>
                                        <input type="checkbox" id="FLukas" name="fLukas" <?php echo $fLukas . ' ' . $d_fLukas; ?>>
                                    </td>
                                    <td style='width:35%;' align="center" >
                                        <label>Sistema de Control de Olor</label>
                                        <input type="checkbox" id="ContOlor" name="contOlor" <?php echo $contOlor . ' ' . $d_contOlor; ?>>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <hr> 

                        <div class="container">
                            <h4>Formulación</h4>
                            <b>Indique la cantidad utilizada de cada materia prima</b><br />
                            <!-- Formulario de Materia prima -->
                            <label for="nan000">NAN000: </label>
                            <input type="number" id="nan000" placeholder="Kg"  name="nan000"  size="12px" value="<?php echo $nan000; ?>" <?php echo $d_nan000; ?> />
                            <label for="swf098">SWF098: </label>
                            <input type="number" id="swf098" placeholder="Garrafas"  name="swf098" value="<?php echo $swf098; ?>" <?php echo $d_swf098; ?> />
                            <label for="stw000">STW000: </label>
                            <input type="number" id="stw000" placeholder="Kg"  name="stw000" value="<?php echo $stw000; ?>" <?php echo $d_stw000; ?> />
                            <label for="fdo037">FDO037: </label>
                            <input type="number" id="fdo037" placeholder="Kg"  name="fdo037" value="<?php echo $fdo037; ?>" <?php echo $d_fdo037; ?> />
                            <label for="myo000">MYO000: </label>
                            <input type="number" id="myo000" placeholder="Kg"  name="myo000" value="<?php echo $myo000; ?>" <?php echo $d_myo000; ?> />
                            <label for="fdo037">STW000: </label>
                            <input type="number" id="stw0002" placeholder="Kg"  name="stw0002" value="<?php echo $stw0002; ?>" <?php echo $d_stw0002; ?> />
                            <label for="csc050">CSC050: </label>
                            <input type="number" id="csc050" placeholder="Kg"  name="csc050" value="<?php echo $csc050; ?>" <?php echo $d_csc050; ?> />
                            <label for="fdo037">STW000: </label>
                            <input type="number" id="stw0003" placeholder="Kg"  name="stw0003" value="<?php echo $stw0003; ?>" <?php echo $d_stw0003; ?> /> 
                        </div>
                        
                        <hr>
                        <div class="container">
                            <h4>Formulación entregada por Bodega</h4>
                            <p>¿ Todas las materias primas están correctamente separadas en cantidad (Kg) segun el FP-04 ?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="MatPriFP04Si" name="MatPriFP04" value="1" <?php echo $MatPriFP04Si . ' ' . $d_MatPriFP04; ?> ></label></td>
                                    <td align="center"><label>No <input type="radio" id="MatPriFP04No" name="MatPriFP04" value="0" <?php echo $MatPriFP04No . ' ' . $d_MatPriFP04; ?>></label><br /></td>
                                </tr>
                            </table>
                            
                            <p>¿ Todas las materias primas están correctamente marcadas y ubicadas en la zona de separacion?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="MatPriSeparadaSi" name="MatPriSeparada" value="1" <?php echo $MatPriSeparadaSi . ' ' . $d_MatPriSeparada; ?> ></label></td>
                                    <td align="center"><label>No <input type="radio" id="MatPriSeparadaNo" name="MatPriSeparada" value="0" <?php echo $MatPriSeparadaNo . ' ' . $d_MatPriSeparada; ?> ></label></td>
                                </tr>
                            </table>
                            <i>
                                <u>
                                    Si la respuesta es negativa a cualquiera de las preguntas anteriores,  notifiquelo al area de Bodega para hacer la correccion correspondiente.
                                </u>
                            </i>
                        </div>
                        <hr>
                </form>
                <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <!-- Paso 2 -->
                        <div class="container" id="CheckEquipo" style="display: <?php echo $displayMatPriSeparada;?>;">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="pasos" value="2">
                            <h4>Chequeo del Equipo</h4>
                            <p>¿El reactor esta completamente limpio?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si</label><input type="radio" id="ReactorLimpioSi" name="ReactorLimpio" value="1" <?php echo $ReactorLimpioSi . ' ' . $d_ReactorLimpio; ?>/></td>
                                    <td align="center"><label>No</label><input type="radio" id="ReactorLimpioNo" name="ReactorLimpio" value="0" <?php echo $ReactorLimpioNo . ' ' . $d_ReactorLimpio; ?>/></td>
                                </tr>
                            </table>
                            <i>Si la respuesta en negativa, realizar limpieza nuevamente.</i>
                            
                            <div class="container" id="limpiezaEquipo" style="display: <?php echo $displayReactorLimpio;?>;">
                                <p>¿ Revisó la hermeticidad del reactor y líneas de traslado para evitar fugas de FDO035 y 700NAN000 sublimado?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="HermeticidadReactorSi" name="HermeticidadReactor" value="1" <?php echo $HermeticidadReactorSi . ' ' . $d_HermeticidadReactor; ?>/></label></td>
                                        <td align="center"><label>No<input type="radio" id="HermeticidadReactorNo" name="HermeticidadReactor" value="0" <?php echo $HermeticidadReactorNo . ' ' . $d_HermeticidadReactor; ?>/></label></td>
                                    </tr>
                                </table>    
                                    
                                <p>¿ Revisó que el reactor funcione correctamente ?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="ReactorFuncionaSi" name="ReactorFunciona" value="1" <?php echo $ReactorFuncionaSi . ' ' . $d_ReactorFunciona; ?>> </label></td>
                                        <td align="center"><label>No<input type="radio" id="ReactorFuncionaNo" name="ReactorFunciona" value="0" <?php echo $ReactorFuncionaNo . ' ' . $d_ReactorFunciona; ?>> </label></td>
                                    </tr>
                                </table> 
                                    
                                <p>¿ Funciona bien el sistema de vacío ?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="VacioFuncionaSi" name="VacioFunciona" value="1" <?php echo $VacioFuncionaSi . ' ' . $d_VacioFunciona; ?>> </label></td>
                                        <td align="center"><label>No<input type="radio" id="VacioFuncionaNo" name="VacioFunciona" value="0" <?php echo $VacioFuncionaNo . ' ' . $d_VacioFunciona; ?>> </label></td>
                                    </tr>
                                </table> 
                                    
                                <p>¿ Funciona bien el sistema de vapor ?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="VaporFuncionaSi" name="VaporFunciona" value="1" <?php echo $VaporFuncionaSi . ' ' . $d_VaporFunciona; ?>> </label></td>
                                        <td align="center"><label>No<input type="radio" id="VaporFuncionaNo" name="VaporFunciona" value="0" <?php echo $VaporFuncionaNo . ' ' . $d_VaporFunciona; ?>> </label></td>
                                    </tr>
                                </table> 
                                    
                                <p>¿ Funciona bien el sistema de enfriamiento ? </p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="EnfriamientoFuncionaSi" name="EnfriamientoFunciona" value="1" <?php echo $EnfriamientoFuncionaSi . ' ' . $d_EnfriamientoFunciona; ?>> </label></td>
                                        <td align="center"><label>No<input type="radio" id="EnfriamientoFuncionaNo" name="EnfriamientoFunciona" value="0" <?php echo $EnfriamientoFuncionaNo . ' ' . $d_EnfriamientoFunciona; ?>> </label></td>
                                    </tr>
                                </table> 
                                    
                                <p>¿ Funciona bien el sistema de emisiones (TANAN, CSO050 Y SWF098) ?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si<input type="radio" id="EmisionesFuncionaSi" name="EmisionesFunciona" value="1" <?php echo $EmisionesFuncionaSi . ' ' . $d_EmisionesFunciona; ?>> </label></td>
                                        <td align="center"><label>No<input type="radio" id="EmisionesFuncionaNo" name="EmisionesFunciona" value="0" <?php echo $EmisionesFuncionaNo . ' ' . $d_EmisionesFunciona; ?>> </label></td>
                                    </tr>
                                </table> 
                                <i>Si la respuesta en negativa a cualquiera de las preguntas anteriores, notifique al area de mantenimiento para realizar las correspondientes mejoras o reparaciones.  Una vez realizadas continue con el proceso.</i>
                                
                                <div id="phsodatanque" style="display: <?php echo $displayEmisionesFunciona; ?>;">

                                    <p>¿ Reviso ph alcalino de la soda cáustica del tanque de emisiones ?</p>
                                    <table class="table" style="width:50%;">
                                        <tr>
                                            <td align="center"><label>Si<input type="radio" id="phsodatanqueSi" name="phsodatanque" value="1" <?php echo $phsodatanqueSi . ' ' . $d_phsodatanque; ?>> </label></td>
                                            <td align="center"><label>No<input type="radio" id="phsodatanqueNo" name="phsodatanque" value="0" <?php echo $phsodatanqueNo . ' ' . $d_phsodatanque; ?>> </label></td>
                                        </tr>
                                    </table> 
                                    
                                    <i>Si la respuesta en negativa, realizar cambio de la soda caustica para continuar con el proceso</i><br />
                                    
                                    <div id="CondensadorFunciona" style="display: <?php echo $displayCondensadorFunciona;?>">
                                        <p>¿ El condensador no presenta escapes y funciona correctamente ?</p>
                                        <table class="table" style="width:50%;">
                                            <tr>
                                                <td align="center"><label>Si<input type="radio" id="CondensadorFuncionaSi" name="CondensadorFunciona" value="1" <?php echo $CondensadorFuncionaSi . ' ' . $d_CondensadorFunciona; ?>> </label></td>
                                                <td align="center"><label>No<input type="radio" id="CondensadorFuncionaNo" name="CondensadorFunciona" value="0" <?php echo $CondensadorFuncionaNo . ' ' . $d_CondensadorFunciona; ?>> </label></td>
                                            </tr>
                                        </table> 
                                    </div>
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!-- Paso 3 -->
                        
                        <div class="container" id="checkEquipo2" style="display: <?php echo $displayCondensadorFunciona;?>;">
                            <b>¿Aprueba Inicio del Proceso?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ApruebaInicioSi" name="ApruebaInicio" value="1" <?php echo $ApruebaInicioSi . ' ' . $d_ApruebaInicio; ?>> </label></td>
                                    <td align="center"><label>No <input type="radio" id="ApruebaInicioNo" name="ApruebaInicio" value="0" <?php echo $ApruebaInicioNo . ' ' . $d_ApruebaInicio; ?>> </label></td>
                                </tr>
                            </table>
                            <div style="display: <?php echo $displayRazonesNoAprob;?>;">
                                <p>En caso de respuesta negativa, indique las razones (contacte a mantenimiento y dejar el proceso en espera hasta dar solucion):</p>
                                <input id="RazonesNoAprob" type="text" name="RazonesNoAprob" value="<?php echo $RazonesNoAprob; ?>" <?php echo $d_RazonesNoAprob; ?> />
                            </div>
                            <hr>
                            <br />
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="3">
                        <!-- Paso 4 -->
                        <div class="container" id="InicioProceso" style="display: <?php echo $displayInicioProceso;?>;">
                            <h4>Inicio del Proceso</h4><hr>

                            <h4>Carga del NAN000</h4>

                            <b>¿Leyó la ficha y hoja de seguridad (FS-01y FS-01-1) para este producto?</b><br />
                            <a href="img/SeguridadNaftaleno.PNG" target="popup" onclick="window.open('img/SeguridadNaftaleno.PNG','popup','width=888,height=234'); return false;">
                                Ver Ficha de Seguridad
                            </a>
                            <br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="SeguridadNaftalenoSi" name="SeguridadNaftaleno" value="1" <?php echo $SeguridadNaftalenoSi . ' ' . $d_SeguridadNaftaleno; ?>> </label></td>
                                    <td align="center"><label>No <input type="radio" id="SeguridadNaftalenoNo" name="SeguridadNaftaleno" value="0" <?php echo $SeguridadNaftalenoNo . ' ' . $d_SeguridadNaftaleno; ?>> </label></td>
                                </tr>
                            </table>
                            
                            <p style="color: red;"><i><u>CASO DE INCIDENTE CON 700NAN000 (Contacto con piel, ojos, inhalacion o derrame o incendio consulte la lista de contingencia)</i></u> </p>
                            <a href="img/ContingenciaNaftaleno.PNG" target="popup" onclick="window.open('img/ContingenciaNaftaleno.PNG','popup','width=883,height=260'); return false;"> Ver</a> <br />
                        </div>
                        <br />
                        
                        <!-- Paso 5 -->
                        <div class="container" id="EquipoSeguridad" style="display: <?php echo $EquipoSeguridad;?>;">
                            <b>¿Cuenta con el equipo de seguridad adecuado para el manejo?</b>
                            <br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EquipoNaftalenoSi" name="EquipoNaftaleno" value="1" <?php echo $EquipoNaftalenoSi . ' ' . $d_EquipoNaftaleno; ?>> </label></td>
                                    <td align="center"><label>No <input type="radio" id="EquipoNaftalenoNo" name="EquipoNaftaleno" value="0" <?php echo $EquipoNaftalenoNo . ' ' . $d_EquipoNaftaleno; ?>> </label></td>
                                </tr>
                            </table>
                            
                            <br />
                            <i>En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</i> <br />

                        </div>		
                        
                        <div class="container" id="TrituradoSaco" style="display: <?php echo $TrituradoSaco;?>;">
                            
                            <label> <b>¿Cerro el sistema de enfriamiento para evitar obstrucción de las lineas con 700NAN000 sublimado?</b> 
                            <input type="checkbox" id="EnfriamientoCerrado" name="EnfriamientoCerrado" value="1" <?php echo $EnfriamientoCerrado; ?> <?php echo $d_EnfriamientoCerrado;?> ></label>
                            <br />
    
                            <p style="color: red;"><i><u>NOTA: Para esta etapa el condensador y la torre debe estar sin enfriamiento, además SIN reflujo directo.</i></u></p>
                            <hr>
                            
                            <div class="container" id="TrituradoSaco2" style="display: <?php echo $TrituradoSaco2; ?>;">
                                <input type="hidden" name="triturado" value="triturado">
                                <b>Cargue el (1)700NAN000, triturando si es necesario los sacos</b>
                                <br />
                                <label for="horainiciocarganaf">Hora de Inicio:</label>
                                <input type="time" id="horainiciocarganaf" name="horainiciocarganaf" value="<?php echo $horainiciocarganaf; ?>" <?php echo $d_horainiciocarganaf; ?>/>
                                <label for="horafincarganaf">Hora de Fin:</label>
                                <input type="time" id="horafincarganaf" name="horafincarganaf" value="<?php echo $horafincarganaf; ?>" <?php echo $d_horafincarganaf; ?>/>
                                <br />
                                <br />
                                <label> <b>Cierre todas las válvulas y bloquee el equipo</b> 
                                <input type="checkbox" id="ValvBloqueo" name="ValvBloqueo" value="1" <?php echo $ValvBloqueo; ?> <?php echo $d_ValvBloqueo; ?> /></label>
                                <br />
                                <label> <b>Abra el sistema de control de olores TANAN e inicie enfriamiento a su camisa.</b> 
                                <input type="checkbox" id="AbrirControlOlores" name="AbrirControlOlores" value="1" <?php echo $AbrirControlOlores; ?> <?php echo $d_AbrirControlOlores; ?> /></label>
                                <br />
                                <input type="hidden" name="fusion" value="fusion">
                                <b>Inicie Fusion del naftaleno calentando la camisa del reactor máximo a 60 psi hasta que la tempertura alcance T= 95-100°C.</b>             <br />
                                <label for="horainiciofusionnaf">Hora de Inicio:</label>
                                <input type="time" id="horainiciofusionnaf" name="horainiciofusionnaf" value="<?php echo $horainiciofusionnaf; ?>" <?php echo $d_horainiciofusionnaf; ?> /> 
                                <p style="color: red;"><i><u>IMPORTANTE: No sobrepasar esta temperatura, para evitar reacción violenta con (2)SWF098.</u></i></p>
                                <br />
                                
                                <label> <b>Dar estartazos inicialmente hasta que se pueda dejar encendido el agitador.</b> 
                                <input type="checkbox" id="Estartazos" name="Estartazos" value="1" <?php echo $Estartazos; ?> <?php echo $d_Estartazos; ?> /></label>
                                <br />
                                <label for="temp1">Temperatura: </label>
                                <input type="number" id="temp1" name="temp1" placeholder="°C" value="<?php echo $temp1; ?>" <?php echo $d_temp1; ?>/>
                                <label for="presion1">Presión: </label>
                                <input type="number" id="presion1" name="presion1" value="<?php echo $presion1; ?>" <?php echo $d_presion1; ?> />
                                <label for="horafinfusionnaf">Hora de Fin:</label>
                                <input type="time" id="horafinfusionnaf" name="horafinfusionnaf" value="<?php echo $horafinfusionnaf; ?>" <?php echo $d_horafinfusionnaf; ?> /> 
                                <br />

                                <b>¿ Cuando el 700NAN000 esta completamente fundido arrancó bien el agitador ?</b><br />
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si <input type="radio" id="AgitadorOkSi" name="AgitadorOk" value="1" <?php echo $AgitadorOkSi . ' ' . $d_AgitadorOk; ?>/></label></td>
                                        <td align="center"><label>No <input type="radio" id="AgitadorOkNo" name="AgitadorOk" value="0" <?php echo $AgitadorOkNo . ' ' . $d_AgitadorOk; ?>/></label></td>
                                    </tr>
                                </table>
                                
                                <i>Si la respuesta en negativa, notifique al area de mantenimiento para realizar las correspondientes mejoras o reparaciones.  Una vez realizadas continue con el proceso.</i>
                                <br />
                                <b>¿ Se presento algún problema al cargar y fundir el naftaleno ?</b><br />
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si <input type="radio" id="ProblemaFundSi" name="ProblemaFund" value="1" <?php echo $ProblemaFundSi . ' ' . $d_ProblemaFund; ?>/></label></td>
                                        <td align="center"><label>No <input type="radio" id="ProblemaFundNo" name="ProblemaFund" value="0" <?php echo $ProblemaFundNo . ' ' . $d_ProblemaFund; ?>/></label></td>
                                    </tr>
                                </table>
                                <div class="container" id="AfirmativaRespuesta" style="display: <?php echo $AfirmativaRespuesta; ?>">
                                    <i>Si la respuesta es afirmativa, mencione lo ocurrido y notifique al area encargada para dar solución.</i>
                                    <input type="text" name="ProblemaFundirNaf" value="<?php echo $ProblemaFundirNaf; ?>" <?php echo $d_ProblemaFundirNaf; ?>>
                                    <hr>
                                </div>
                                <hr>
                                </div>
                        </div>
                </form>
                <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="4">
                        <!-- Paso 6 -->
                        <div class="container" id="Carga710" style="display: <?php echo $Carga710; ?>;">
                            <hr>
                            <h4>Carga del 710SWF098</h4>
                            <b>¿Leyó la ficha y hoja de seguridad (FS-01y FS-01-1) para este producto?</b><br />
                            <a href="img/SeguridadSulfurico.PNG" target="popup" onclick="window.open('img/SeguridadSulfurico.PNG','popup','width=889,height=522'); return false;">Ver Ficha de Seguridad</a><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="SeguridadSulfuricoSi" name="SeguridadSulfurico" value="1" <?php echo $SeguridadSulfuricoSi . ' ' . $d_SeguridadSulfurico; ?>/> </label></td>
                                    <td align="center"><label>No <input type="radio" id="SeguridadSulfuricoNo" name="SeguridadSulfurico" value="0" <?php echo $SeguridadSulfuricoNo . ' ' . $d_SeguridadSulfurico; ?>/> </label></td>
                                </tr>
                            </table>
                            <p style="color: red;"><i><u>EN CASO DE INCIDENTE CON 710SWF098 (Contacto con piel, ojos, inhalacion o derrame o incendio consulte la lista de contingencia</u></i> </p>
                            <a href="img/ContingenciaSulfurico.PNG" target="popup" onclick="window.open('img/ContingenciaSulfurico.PNG','popup','width=881,height=347'); return false;">Ver</a> <br />
                            <b>¿Cuenta con el equipo de seguridad adecuado para el manejo?</b>
                            <br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EquipoSulfuricoSi" name="EquipoSulfurico" value="1" <?php echo $EquipoSulfuricoSi . ' ' . $d_EquipoSulfurico; ?>/></label></td>
                                    <td align="center"><label>No <input type="radio" id="EquipoSulfuricoNo" name="EquipoSulfurico" value="0" <?php echo $EquipoSulfuricoNo . ' ' . $d_EquipoSulfurico; ?>/></label></td>
                                </tr>
                            </table>
                            <i>En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</i><br />
                        </div>

                        <!-- Paso 7 -->
                        <div class="container" id="CargueSWF098" style="display: <?php echo $CargueSWF098; ?>;">
                            <b>Cargue al tanque de adición (2) SWF098 garrafas) mediante vacío desde el 3 nivel del módulo. </b><br />
                            <input type="hidden" name="sulfurico" value="sulfurico">
                            <label for="horainiciocargaswfo">Hora de Inicio:</label>
                            <input type="time" id="horainiciocargaswfo" name="horainiciocargaswfo" value="<?php echo $horafincargaswfo; ?>" <?php echo $d_horainiciocargaswfo; ?>/>
                            <label for="horafincargaswfo">Hora de Fin:</label>
                            <input type="time" id="horafincargaswfo" name="horafincargaswfo" value="<?php echo $horafincargaswfo; ?>" <?php echo $d_horafincargaswfo; ?>/>
                            <br />
                            <label> <b>Cierre sistema de control de olores TANAN.</b> 
                            <input type="checkbox" id="CierreControlOlores" name="CierreControlOlores" value="1" <?php echo $CierreControlOlores; ?> <?php echo $d_CierreControlOlores; ?>/></label>
                            <br />
                            <b>Inicie adición de (2) SWF098 al reactor en 60 minutos aproximadamente.</b><br />
                            <input type="hidden" name="sulfurico1" value="sulfurico1">
                            <label for="horainiciocargaswfo2">Hora de Inicio:</label>
                            <input type="time" id="horainiciocargaswfo2" name="horainiciocargaswfo2" value="<?php echo $horainiciocargaswfo2; ?>" <?php echo $d_horainiciocargaswfo2; ?> />
                            <label for="horafincargaswfo2">Hora de Fin:</label>
                            <input type="time" id="horafincargaswfo2" name="horafincargaswfo2" value="<?php echo $horainiciocargaswfo2; ?>" <?php echo $d_horafincargaswfo2; ?> />
                            <p style="color: red;"><i><u>Durante la adición se puede formar vacío dentro del equipo, controlar por medio del embudo.  Una vez se presente de nuevo presión y se note salida de vapor o gases cerrar el embudo y abrir el sistema de control para iniciar su lavado de gases.</u></i></p>
                            <b>Verificar temperatura de reacción, si esta no sube por sí sola a T=140-150°C máximo, suministrar vapor para alcanzarla. </b><br />
                            <label for="tempswfo1">Temperatura: </label>
                            <input type="number" id="tempswfo1" placeholder="°C" name="tempswfo1" value="<?php echo $tempswfo1;?>" <?php echo $d_tempswfo1; ?>/>
                            <label for="presionswfo1">Presión: </label>
                            <input type="number" id="presionswfo1" name="presionswfo1" value="<?php echo $presionswfo1;?>" <?php echo $d_presionswfo1; ?>/> 
                            <b>Suministro Vapor</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="VaporSi" name="Vapor" value="1" <?php echo $VaporSi . ' ' . $d_Vapor; ?>/></label></td>
                                    <td align="center"><label>No <input type="radio" id="VaporNo" name="Vapor" value="0" <?php echo $VaporNo . ' ' . $d_Vapor; ?>/></label></td>
                                </tr>
                            </table>
                            <br />
                            <b>Sostener temperatura T = 140-150°C y reacción durante 3 horas.</b><br />
                            <label for="horainiciosostenertemp">Hora de Inicio:</label>
                            <input type="hidden" name="sostener1" value="sostener1">
                            <input type="time" id="horainiciosostenertemp" name="horainiciosostenertemp" value="<?php echo $horainiciosostenertemp;?>" <?php echo $d_horainiciosostenertemp; ?>/>
                            <hr>
                            <b>Seguimiento de la Reacción</b><br />
                            <!-- Validar para que aparezcan los campos cuando se llenen -->
                            <b>Hora 1</b><br />
                            <label for="temphr1">Temperatura: </label>
                            <input type="number" id="temphr1" placeholder="°C" name="temphr1" value="<?php echo $temphr1;?>" <?php echo $d_temphr1; ?>/>
                            <label for="presionhr1">Presión:</label>
                            <input type="number" id="presionhr1" name="presionhr1" value="<?php echo $presionhr1;?>" <?php echo $d_presionhr1; ?>/><hr>
                            <b>Hora 2</b><br />
                            <input type="hidden" name="sostener2" value="sostener2">
                            <label for="temphr2">Temperatura: </label>
                            <input type="number" id="temphr2" placeholder="°C" name="temphr2" value="<?php echo $temphr2;?>" <?php echo $d_temphr2; ?>/>
                            <label for="presionhr2">Presión:</label>
                            <input type="number" id="presionhr2" name="presionhr2" value="<?php echo $presionhr2;?>" <?php echo $d_presionhr2; ?>/><hr>
                            <b>Hora 3</b><br />
                            <input type="hidden" name="sostener3" value="sostener3">
                            <label for="temphr3">Temperatura: </label>
                            <input type="number" id="temphr3" placeholder="°C" name="temphr3" value="<?php echo $temphr3;?>" <?php echo $d_temphr3; ?>/>
                            <label for="presiohr3">Presión: </label>
                            <input type="number" id="presionhr3" name="presionhr3" value="<?php echo $presionhr3;?>" <?php echo $d_presionhr3; ?>/><hr>
                            <label for="horafinsostenertemp">Hora de Fin:</label>
                            <input type="time" id="horafinsostenertemp" name="horafinsostenertemp" value="<?php echo $horafinsostenertemp;?>" <?php echo $d_horafinsostenertemp; ?>/><hr>
                            <b>¿ Se presento algún problema al adicionar el ácido sulfúrico ?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ProblemaSWFOSi" name="ProblemaSWFO" value="1" <?php echo $ProblemaSWFOSi . ' ' . $d_ProblemaSWFO; ?>/> </label></td>
                                    <td align="center"><label>No <input type="radio" id="ProblemaSWFONo" name="ProblemaSWFO" value="0" <?php echo $ProblemaSWFONo . ' ' . $d_ProblemaSWFO; ?>/> </label></td>
                                </tr>
                            </table>
                            <br />
                            <!-- En caso de ser positiva validarlo -->
                            <b>En caso de ser positiva la respuesta indique el problema presentado:</b>
                            <input type="text" size="2" id="TextoProblemaSWFO" name="TextoProblemaSWFO" value="<?php echo $TextoProblemaSWFO; ?>" style="display: <?php echo $d_TextoProblemaSWFO; ?>"> <br />
                            <b>Terminadas las 3 horas de reacción. Enfrie  a T = 100 - 110°C,  con reflujo directo y restablezca el suministro de agua en el condensador.</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EnfriarOkSi" name="EnfriarOk" value="1" <?php echo $EnfriarOkSi . ' ' . $d_EnfriarOk; ?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="EnfriarOkNo" name="EnfriarOk" value="0" <?php echo $EnfriarOkNo . ' ' . $d_EnfriarOk; ?> /></label></td>
                                </tr>
                            </table>
                            <input type="hidden" name="enfriado1" value="enfriado1">
                            <label for="tempenfriado">Temperatura: </label>
                            <input type="number" id="tempenfriado" name="tempenfriado" placeholder="°C" value="<?php echo $tempenfriado; ?>" <?php echo $d_tempenfriado; ?>/>
                            <label for="presionenfriado">Presión: </label>
                            <input type="number" id="presionenfriado" name="presionenfriado" value="<?php echo $presionenfriado; ?>" <?php echo $d_presionenfriado; ?>/> 
                            <hr>
                            <h4>Carga del 700STW00</h4><br />
                            <b>Adicione (3) STW000 en 1 hora como tiempo maximo con reflujo directo y enfriar hasta conseguir una temperatura T = 85 - 90°C. </b><br />
                            <input type="hidden" name="enfriado2" value="enfriado2">
                            <label for="tempadicionstw">Temperatura: </label>
                            <input type="number" id="tempadicionstw" name="tempadicionstw" placeholder="°C" value="<?php echo $tempadicionstw; ?>" <?php echo $d_tempadicionstw; ?>/>
                            <label for="presionadicionstw">Presión: </label>
                            <input type="number" id="presionadicionstw" name="presionadicionstw" value="<?php echo $presionadicionstw; ?>" <?php echo $d_presionadicionstw; ?>/>
                            <br />
                            
                            <label> <b>Evacue la camisa del reactor, para evitar que siga bajando la temperatura.</b> 
                            <input type="checkbox" id="EvacuarCamisa" name="EvacuarCamisa" value="1" <?php echo $EvacuarCamisa; ?> <?php echo $d_EvacuarCamisa; ?>/></label>
                            <p style="color: red;"><i><u>Con la adición del agua la temperatura puede bajar aproximadamente entre T = 70-75°C. Subir con vapor si es necesario para obtener T=85-90°C.							
                            </u></i></p>
                            <b>¿Suministro Vapor?</b>
                            <br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="SuministroVaporSi" name="SuministroVapor" value="1" <?php echo $SuministroVaporSi . ' ' . $d_SuministroVapor; ?>></label></td>
                                    <td align="center"><label>No <input type="radio" id="SuministroVaporNo" name="SuministroVapor" value="0" <?php echo $SuministroVaporNo . ' ' . $d_SuministroVapor; ?>></label></td>
                                </tr>
                            </table>
                            <hr>
                            <h4>Carga del 700FDO035 y 710MYO000</h4><br />
                            <b>¿Leyó la ficha y hoja de seguridad (FS-01y FS-01-1) para estos productos?</b> <br />
                            <a href="img/FormolMetanolseguridad.PNG" target="popup" onclick="window.open('img/FormolMetanolseguridad.PNG','popup','width=861,height=317'); return false;">Ver Ficha de Seguridad</a>
                            <br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="SeguridadFDOSi" name="SeguridadFDO" value="1" <?php echo $SeguridadFDOSi . ' ' . $d_SeguridadFDO; ?>></label></td>
                                    <td align="center"><label>No <input type="radio" id="SeguridadFDONo" name="SeguridadFDO" value="0" <?php echo $SeguridadFDONo . ' ' . $d_SeguridadFDO; ?>></label><br /></td>
                                </tr>
                            </table>
                            <p style="color: red;"><i><u>EN CASO DE INCIDENTE CON 700FDO037 Y 710MYO000 (Contacto con piel, ojos, inhalacion o derrame o incendio consulte la lista de contingencia</u></i></p>
                            <a href="img/contingenciamezcla.PNG" target="popup" onclick="window.open('img/contingenciamezcla.PNG','popup','width=660,height=655'); return false;">Ver</a> <br />
                            <b>¿Cuenta con el equipo de seguridad adecuado para el manejo de ambos productos?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EquipoFDOSi" name="EquipoFDO" value="1" <?php echo $EquipoFDOSi . ' ' . $d_EquipoFDO; ?>></label></td>
                                    <td align="center"><label>No <input type="radio" id="EquipoFDONo" name="EquipoFDO" value="0" <?php echo $EquipoFDONo . ' ' . $d_EquipoFDO; ?>></label></td>
                                </tr>
                            </table>
                            <i>En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</i><br />
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="5">
                        <!-- Paso 8 -->
                        <div class="container" id="RevisoConexion" style="display: <?php echo $RevisoConexion; ?>;">
                            <!-- todos deben validarse para mostrar el paso 9 -->
                            <label> <b>Reviso la conexión de línea a tierra en compañía de mantenimiento.</b> 
                            <input type="checkbox" id="LineaTierraOk" name="LineaTierraOk" value="1" <?php echo $LineaTierraOk; ?> <?php echo $d_LineaTierraOk;?> /></label>
                            <label> <b>Para el bombeo del 710MYO000 Y 700FDO035 (Inflamables) cuenta con una bomba neumatica o en su defecto una previamente revisada.</b> 
                            <input type="checkbox" id="BombaNeumaticaOk" name="BombaNeumaticaOk" value="1" <?php echo $BombaNeumaticaOk; ?> <?php echo $d_BombaNeumaticaOk;?> /></label>
                            <label> <b>Las conexiones eléctricas y acoples de manguera y tubería estén bien hechas.</b> 
                            <input type="checkbox" id="ConexionOk" name="ConexionOk" value="1" <?php echo $ConexionOk; ?> <?php echo $d_ConexionOk;?> /></label>
                            <label> <b>El tramo de manguera a usar en la carga se encuentra sin uniones, en buen estado y abrazaderas resistentes al bombeo</b> 
                            <input type="checkbox" id="MangueraOk" name="MangueraOk" value="1" <?php echo $MangueraOk; ?> <?php echo $d_MangueraOk;?> /></label>
                            <label> <b>La línea de carga se encuentra sin escapes.</b> 
                            <input type="checkbox" id="LineaCargaOk" name="LineaCargaOk" value="1" <?php echo $LineaCargaOk; ?> <?php echo $d_LineaCargaOk;?> /></label>
                            <label> <b>Las válvulas del tanque de adición al reactor estan cerradas para realizar carga.</b> 
                            <input type="checkbox" id="ValvulasCerradas" name="ValvulasCerradas" value="1" <?php echo $ValvulasCerradas; ?> <?php echo $d_ValvulasCerradas;?> /></label>
                            <label> <b>Conoce la capacidad del tanque de adición para que no haya rebose al momento de la carga.</b> 
                            <input type="checkbox" id="CapacidadTanque" name="CapacidadTanque" value="1" <?php echo $CapacidadTanque; ?> <?php echo $d_CapacidadTanque;?> /></label>
                            <br />
                            <i>Capacidad del tanque de adición: 500 Kilos</i>
                        </div>
                    
                        <!-- Paso 9 -->
                        <div class="container" id="Carga700" style="display: <?php echo $Carga700; ?>">
                            <hr>
                            <h4>Inicio de la carga de 700FDO035 Y 710MYO000</h4><br />
                            <i><u>IMPORTANTE TENER EN CUENTA: En el cargue del FDO037 al tanque de adición, usar una barrera en el orificio de entrada al tambor o garrafa por donde entra la manguera o tubo, de manera que se evite la salida de los vapores del FDO037.  Así mismo se debe ubicar la persona que va a realizar el cargue en contra del viento para disminuir exposición.	</u></i>
                            <br />
                            <i><u>"SIN VAPOR y desde el tanque de adición, en 4 horas como tiempo mínimo (puede ser mayor según comportamiento de la reacción),  adicionar la mezcla (4) FDO037 y  (5) MYO000. Inicialmente sube la temperatura hasta T = 102°C y después baja lentamente hasta terminar la adición entre T = 98 - 100°C."</u></i><br />
                            <hr>

                            <H4>Seguimiento de la Adición</H4>
                            
                            <label for="horainicioadc">Hora de Inicio:</label>
                            <input type="hidden" name="carga7001" value="carga7001">
                            <input type="time" id="horainicioadc" name="horainicioadc" value="<?php echo $horainicioadc; ?>" <?php echo $d_horainicioadc;?>  /><br />
                            <!-- Seguimiento por horas y que cuando 1 hora muestre la segunda -->
                            <b>Hora 1</b><br />
                            <label for="tempadc1">Temperatura: </label>
                            <input type="number" id="tempadc1" name="tempadc1" value="<?php echo $tempadc1; ?>" placeholder="°C" <?php echo $d_tempadc1;?>  />
                            <label for="presionadc1">Presión:</label>
                            <input type="number" id="presionadc1" name="presionadc1" value="<?php echo $presionadc1; ?>" <?php echo $d_presionadc1;?>  />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioadc1" value="<?php echo $comentarioadc1; ?>" <?php echo $d_comentarioadc1;?>  /><hr>
                            <b>Hora 2</b><br />
                            <input type="hidden" name="carga7002" value="carga7002">
                            <label for="tempadc2">Temperatura: </label>
                            <input type="number" id="tempadc2" name="tempadc2" value="<?php echo $tempadc2; ?>" placeholder="°C" <?php echo $d_tempadc2;?>  />
                            <label for="presionadc2">Presión:</label>
                            <input type="number" id="presionadc2" name="presionadc2" value="<?php echo $presionadc2; ?>" <?php echo $d_presionadc2;?>  />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioadc2" value="<?php echo $comentarioadc2; ?>" <?php echo $d_comentarioadc2;?>  /><hr>
                            <b>Hora 3</b><br />
                            <input type="hidden" name="carga7003" value="carga7003">
                            <label for="tempadc3">Temperatura: </label>
                            <input type="number" id="tempadc3" name="tempadc3" value="<?php echo $tempadc3; ?>" placeholder="°C" <?php echo $d_tempadc3;?>  />
                            <label for="presionadc3">Presión: </label>
                            <input type="number" id="presionadc3" name="presionadc3" value="<?php echo $presionadc3; ?>" <?php echo $d_presionadc3;?>  />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioadc3" value="<?php echo $comentarioadc3; ?>" <?php echo $d_comentarioadc3;?>  /><hr>
                            <b>Hora 4</b><br />
                            <input type="hidden" name="carga7004" value="carga7004">
                            <label for="tempadc4">Temperatura: </label>
                            <input type="number" id="tempadc4" name="tempadc4" value="<?php echo $tempadc4; ?>" placeholder="°C" <?php echo $d_tempadc4;?>  />
                            <label for="presionadc4">Presión:</label>
                            <input type="number" id="presionadc4" name="presionadc4" value="<?php echo $presionadc4; ?>" <?php echo $d_presionadc4;?>  />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioadc4" value="<?php echo $comentarioadc4; ?>" <?php echo $d_comentarioadc4;?>  /><hr>
                            <b>Hora 5</b><br />
                            <input type="hidden" name="carga7005" value="carga7005">
                            <label for="tempadc5">Temperatura: </label>
                            <input type="number" id="tempadc5" name="tempadc5" value="<?php echo $tempadc5; ?>" placeholder="°C" <?php echo $d_tempadc5;?>  />
                            <label for="presionadc5">Presión: </label>
                            <input type="number" id="presionadc5" name="presionadc5" value="<?php echo $presionadc5; ?>" <?php echo $d_presionadc5;?>  />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioadc5" value="<?php echo $comentarioadc5; ?>" <?php echo $d_comentarioadc5;?> />
                            <br />
                            <label for="horafinadc">Hora de Fin:</label>
                            <input type="time" id="horafinadc" name="horafinadc" value="<?php echo $horafinadc; ?>" <?php echo $d_horafinadc;?> /><hr>
                            <b>Sostener durante 7 horas a T = 98 - 102 °C.  Sin Vapor. Inicialmente sube la temperatura hasta T = 102°C y después baja lentamente hasta terminar la adición entre T = 95 - 100°C.  <i> <u>Si es necesario dar pase de vapor por poco tiempo para sostener la temperatura en el rango T = 98 - 102°C.</u></i></b>
                            <br /><b><u>IMPORTANTE:</u> Cargar parte de (6)STW000 al tanque de adicion, como precaucion en caso que se observe alta viscosidad durante la reaccion de condensacion y asi evitar polimerizacion rapida del producto.  Si se presenta este caso adicionar y continuar hasta completar el tiempo de reacción.</b>  <hr>
                            <h4>Seguimiento de Reacción de Adición</h4><br />
                            <b>Hora de Inicio</b><br />
                            <label for="horainicioreac">Hora de Inicio:</label>
                            <input type="hidden" name="reaccion1" value="reaccion1">
                            <input type="time" id="horainicioreac" name="horainicioreac" value="<?php echo $horainicioreac; ?>" <?php echo $d_horainicioreac; ?>/>
                            <br />
                            <b>Hora 1</b><br />
                            <!-- Seguimiento por horas y que cuando 1 hora muestre la segunda -->
                            <label for="tempreac1">Temperatura: </label>
                            <input type="number" id="tempreac1" name="tempreac1" value="<?php echo $tempreac1; ?>"placeholder="°C" <?php echo $d_tempreac1; ?> />
                            <label for="presionreac1">Presión:</label>
                            <input type="number" id="presionreac1" name="presionreac1" value="<?php echo $presionreac1; ?>" <?php echo $d_presionreac1; ?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac1" value="<?php echo $comentarioreac1; ?>" <?php echo $d_comentarioreac1; ?>/><hr>
                            <b>Hora 2</b><br />
                            <input type="hidden" name="reaccion2" value="reaccion2">
                            <label for="tempreac2">Temperatura: </label>
                            <input type="number" id="tempreact2" name="tempreact2" value="<?php echo $tempreact2; ?>"placeholder="°C" <?php echo $d_tempreact2; ?> />
                            <label for="presionreact2">Presión:</label>
                            <input type="number" id="presionreact2" name="presionreact2" value="<?php echo $presionreact2; ?>" <?php echo $d_presionreact2; ?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac2" value="<?php echo $comentarioreac2; ?>" <?php echo $d_comentarioreac2; ?>/><hr>
                            <b>Hora 3</b><br />
                            <input type="hidden" name="reaccion3" value="reaccion3">
                            <label for="tempreac3">Temperatura: </label>
                            <input type="number" id="tempreac3" name="tempreac3" value="<?php echo $tempreac3; ?>"placeholder="°C" <?php echo $d_tempreac3; ?> />
                            <label for="presionreac3">Presión: </label>
                            <input type="number" id="presionreac3" name="presionreac3" value="<?php echo $presionreac3; ?>" <?php echo $d_presionreac3; ?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac3" value="<?php echo $comentarioreac3; ?>" <?php echo $d_comentarioreac3; ?>/><hr>
                            <b>Hora 4</b><br />
                            <label for="tempreac4">Temperatura: </label>
                            <input type="hidden" name="reaccion4" value="reaccion4">
                            <input type="number" id="tempreac4" name="tempreac4" value="<?php echo $tempreac4; ?>" placeholder="°C" <?php echo $d_tempreac4; ?> />
                            <label for="presionreac4">Presión:</label>
                            <input type="number" id="presionreac4" name="presionreac4" value="<?php echo $presionreac4; ?>" <?php echo $d_presionreac4; ?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac4" value="<?php echo $comentarioreac4; ?>" <?php echo $d_comentarioreac4; ?>/><hr>
                            <b>Hora 5</b><br />
                            <label for="tempreac5">Temperatura: </label>
                            <input type="hidden" name="reaccion5" value="reaccion5">
                            <input type="number" id="tempreac5" name="tempreac5" value="<?php echo $tempreac5; ?>"placeholder="°C" <?php echo $d_tempreac5; ?> />
                            <label for="presionreac5">Presión: </label>
                            <input type="number" id="presionreac5" name="presionreac5" value="<?php echo $presionreac5; ?>" <?php echo $d_presionreac5; ?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac5" value="<?php echo $comentarioreac5; ?>" <?php echo $d_comentarioreac5; ?>/>
                            <br />
                            <b>Hora 6</b><br />
                            <input type="hidden" name="reaccion6" value="reaccion6">
                            <label for="tempreac6">Temperatura: </label>
                            <input type="number" id="tempreac6" name="tempreac6" value="<?php echo $tempreac6; ?>"placeholder="°C" <?php echo $d_tempreac6; ?> />
                            <label for="presionreac6">Presión:</label>
                            <input type="number" id="presionreac6" name="presionreac6" value="<?php echo $presionreac6; ?>" <?php echo $d_presionreac6; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac6" value="<?php echo $comentarioreac6; ?>" <?php echo $d_comentarioreac6; ?> /><hr>
                            <b>Hora 7</b><br />
                            <input type="hidden" name="reaccion7" value="reaccion7">
                            <label for="tempreac7">Temperatura: </label>
                            <input type="number" id="tempreac7" name="tempreac7" value="<?php echo $tempreac7; ?>" placeholder="°C" <?php echo $d_tempreac7;?>/>
                            <label for="presionreac7">Presión: </label>
                            <input type="number" id="presionreac7" name="presionreac7" value="<?php echo $presionreac7; ?>" <?php echo $d_presionreac7;?>/>
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioreac7" value="<?php echo $comentarioreac7; ?>" <?php echo $d_comentarioreac7;?>/><br />
                            <label for="horafinreac">Hora de Fin:</label>
                            <input type="time" id="horafinreac" name="horafinreac" value="<?php echo $horafinreac; ?>" <?php echo $d_horafinreac;?>/><hr>
                            <b>¿ Se presento algún problema en el equipo en este punto de reacción ?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ProblemaCondensacionSi" name="ProblemaCondensacion" value="1" <?php echo $ProblemaCondensacionSi . ' ' . $d_ProblemaCondensacion; ?>> </label></td>
                                    <td align="center"><label>No <input type="radio" id="ProblemaCondensacionNo" name="ProblemaCondensacion" value="0" <?php echo $ProblemaCondensacionNo . ' ' . $d_ProblemaCondensacion; ?>> </label></td>
                                </tr>
                            </table>
                            <div  class="container" id="TextoProblemaCondensacion" style="display: <?php echo $ShowTextoProblemaCondensacion; ?>">
                                <b>¿Cuál? (Si la respuesta es afirmativa)</b>
                                <input type="text" name="TextoProblemaCondensacion" value="<?php echo $TextoProblemaCondensacion; ?>" <?php echo $d_TextoProblemaCondensacion;?>><br />
                            </div>
                            <br />
                            <br />
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="6">
                        <!-- Paso 10 -->
                        <div class="container" id="AdicionarSTW" style="display: <?php echo $AdicionarSTW;?>;">
                            <b>Adicionar (6) STW000 a T = 85°C en 20 minutos como tiempo máximo.</b><br />
                            <input type="hidden" name="adicionarstw" value="adicionarstw" <?php echo $disabled; ?>>
                            <label for="horainicioadcstw2">Hora de Inicio:</label>
                            <input type="time" id="horainicioadcstw2" name="horainicioadcstw2" value="<?php echo $horainicioadcstw2; ?>" <?php echo $d_horainicioadcstw2; ?>/>
                            <label for="tempadcstw2">Temperatura: </label>
                            <input type="number" id="tempadcstw2" name="tempadcstw2" value="<?php echo $tempadcstw2; ?>" placeholder="°C" <?php echo $d_tempadcstw2; ?>/>
                            <label for="presionadcstw2">Presión:</label>
                            <input type="number" id="presionadcstw2" name="presionadcstw2" value="<?php echo $presionadcstw2; ?>" <?php echo $d_presionadcstw2; ?>/>
                            <label for="horafinadcstw2">Hora de Fin:</label>
                            <input type="time" id="horafinadcstw2" name="horafinadcstw2" value="<?php echo $horafinadcstw2; ?>" <?php echo $d_horafinadcstw2; ?>/><hr>
                            <h4>Adición de 710CSO050 Y 700STW000</h4><br />
                            <b>¿Leyó la ficha y hoja de seguridad (FS-01y FS-01-1) para estos productos?</b><br />
                            <a href="img/Sodaseguridad.PNG" target="popup" onclick="window.open('img/Sodaseguridad.PNG','popup','width=859,height=230'); return false;">Ver Ficha de Seguridad</a><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="SeguridadCSOSi" name="SeguridadCSO" value="1" <?php echo $SeguridadCSOSi . ' ' . $d_SeguridadCSO; ?> /> </label></td>
                                    <td align="center"><label>No <input type="radio" id="SeguridadCSONo" name="SeguridadCSO" value="0" <?php echo $SeguridadCSONo . ' ' . $d_SeguridadCSO; ?> /> </label></td>
                                </tr>
                            </table>
                            <p style="color: red;"><u><i>EN CASO DE INCIDENTE CON CSO050 (Contacto con piel, ojos, inhalacion o derrame o incendio consulte la lista de contingencia.</i></u></p>
                            <a href="img/Sodacontingencia.PNG" target="popup" onclick="window.open('img/Sodacontingencia.PNG','popup','width=883,height=409'); return false;">Ver</a> <br />
                            <b>¿Cuenta con el equipo de seguridad adecuado para el manejo del CSO050?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EquipoCSOSi" name="EquipoCSO" value="1" <?php echo $EquipoCSOSi . ' ' . $d_EquipoCSO; ?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="EquipoCSONo" name="EquipoCSO" value="0" <?php echo $EquipoCSONo . ' ' . $d_EquipoCSO; ?> /></label></td>
                                </tr>
                            </table>
                            <br />
                            <i>En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</i>
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="7">
                        <br />
                        <!-- Paso 11 -->
                        <div class="container" id="ReaccionNeutra" style="display: <?php echo $ReaccionNeutra;?>;">
                            <b>Adicionar (7) CSC050 en 4 horas como tiempo máximo conservando T = 94 - 95 °C.</b>
                            <h4>Seguimiento de Reacción de Neutralización</h4><br />
                            <b>Hora de Inicio</b><br />
                            <input type="hidden" name="ReaccionNeutra1" value="ReaccionNeutra1">
                            <label for="horainicioneut">Hora de Inicio:</label>
                            <input type="time" id="horainicioneut" name="horainicioneut" value="<?php echo $horainicioneut; ?>" <?php echo $d_horainicioneut; ?> /><br />
                            <!-- Validar horas para que aparezcan las siguientes cuando se llenen -->
                            <b>Hora 1</b><br />
                            <label for="tempneut1">Temperatura: </label>
                            <input type="number" id="tempneut1" name="tempneut1" value="<?php echo $tempneut1; ?>" placeholder="°C" <?php echo $d_tempneut1; ?> />
                            <label for="presionneut1">Presión:</label>
                            <input type="number" id="presionneut1" name="presionneut1" value="<?php echo $presionneut1; ?>" <?php echo $d_presionneut1; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioneut1" value="<?php echo $comentarioneut1; ?>" <?php echo $d_comentarioneut1; ?> />
                            <hr>
                            <b>Hora 2</b><br />
                            <input type="hidden" name="ReaccionNeutra2" value="ReaccionNeutra2">
                            <label for="tempneut2">Temperatura: </label>
                            <input type="number" id="tempneut2" name="tempneut2" value="<?php echo $tempneut2; ?>" placeholder="°C" <?php echo $d_tempneut2; ?> />
                            <label for="presionneut2">Presión:</label>
                            <input type="number" id="presionneut2" name="presionneut2" value="<?php echo $presionneut2; ?>" <?php echo $d_presionneut2; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioneut2" value="<?php echo $comentarioneut2; ?>" <?php echo $d_comentarioneut2; ?> />
                            <hr>
                            <b>Hora 3</b><br />
                            <label for="tempneut3">Temperatura: </label>
                            <input type="hidden" name="ReaccionNeutra3" value="ReaccionNeutra3">
                            <input type="number" id="tempneut3" name="tempneut3" value="<?php echo $tempneut3; ?>" placeholder="°C" <?php echo $d_tempneut3; ?> />
                            <label for="presionneut3">Presión: </label>
                            <input type="number" id="presionneut3" name="presionneut3" value="<?php echo $presionneut3; ?>" <?php echo $d_presionneut3; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioneut3" value="<?php echo $comentarioneut3; ?>" <?php echo $d_comentarioneut3; ?> />
                            <hr>
                            <b>Hora 4</b><br />
                            <input type="hidden" name="ReaccionNeutra4" value="ReaccionNeutra4">
                            <label for="tempneut4">Temperatura: </label>
                            <input type="number" id="tempneut4" name="tempneut4" value="<?php echo $tempneut4; ?>" placeholder="°C" <?php echo $d_tempneut4; ?> />
                            <label for="presionreac4">Presión:</label>
                            <input type="number" id="presionneut4" name="presionneut4" value="<?php echo $presionneut4; ?>" <?php echo $d_presionneut4; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentarioneut4" value="<?php echo $comentarioneut4; ?>" <?php echo $d_comentarioneut4; ?> />
                            <hr>
                            <label for="horafinneut">Hora de Fin:</label>
                            <input type="time" id="horafinneut" name="horafinneut" value="<?php echo $horafinneut; ?>" <?php echo $d_horafinneut; ?> />
                            <hr>
                            <b>Homogeneizar por 3 horas. Si es necesario dar pase de vapor por poco tiempo para mantener temperatura.</b><br />
                            <h4>Seguimiento Homegenización</h4><br />
                            <b>Hora de Inicio</b><br />
                            <label for="horainiciohomoge">Hora de Inicio:</label>
                            <input type="hidden" name="homogenizacion" value="homogenizacion">
                            <input type="time" id="horainiciohomoge" name="horainiciohomoge" value="<?php echo $horainiciohomoge; ?>" <?php echo $d_horainiciohomoge; ?> /><br />
                            <b>Hora 1</b><br />
                            <label for="temphomoge1">Temperatura: </label>
                            <input type="number" id="temphomoge1" name="temphomoge1" value="<?php echo $temphomoge1; ?>" placeholder="°C" <?php echo $d_temphomoge1; ?> />
                            <label for="presionhomoge1">Presión:</label>
                            <input type="number" id="presionhomoge1" name="presionhomoge1" value="<?php echo $presionhomoge1; ?>" <?php echo $d_presionhomoge1; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentariohomoge1" value="<?php echo $comentariohomoge1; ?>" <?php echo $d_comentariohomoge1; ?> >
                            <hr>
                            <b>Hora 2</b><br />
                            <input type="hidden" name="homogenizacion2" value="homogenizacion2">
                            <label for="temphomoge2">Temperatura: </label>
                            <input type="number" id="temphomoge2" name="temphomoge2" value="<?php echo $temphomoge2; ?>" placeholder="°C" <?php echo $d_temphomoge2; ?> />
                            <label for="presionhomoge2">Presión:</label>
                            <input type="number" id="presionhomoge2" name="presionhomoge2" value="<?php echo $presionhomoge2; ?>" <?php echo $d_presionhomoge2; ?> />
                            <b>Observaciones/Comentarios</b>
                            <input type="text" name="comentariohomoge2" value="<?php echo $comentariohomoge2; ?>" <?php echo $d_comentariohomoge2; ?> ><hr>
                            <b>Hora 3</b><br />
                            <input type="hidden" name="homogenizacion3" value="homogenizacion3">
                            <label for="temphomoge3">Temperatura: </label>
                            <input type="number" id="temphomoge3" name="temphomoge3" value="<?php echo $temphomoge3; ?>" placeholder="°C" <?php echo $d_temphomoge3; ?> />
                            <label for="presionhomoge3">Presión: </label>
                            <input type="number" id="presionhomoge3" name="presionhomoge3" value="<?php echo $presionhomoge3; ?>" <?php echo $d_presionhomoge3; ?> />
                            <br />
                            <label for="horafinhomoge">Hora de Fin:</label>
                            <input type="time" id="horafinhomoge" name="horafinhomoge" value="<?php echo $horafinhomoge; ?>" <?php echo $d_horafinhomoge; ?> />
                            <hr>
                            <b>Evaluar presencia de olor a formol, si hay presencia adicionar CSC050.</b><br />
                            <b>Hay presencia de olor a FDO035? </b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="OlorFormolSi" name="OlorFormol" value="1" <?php echo $OlorFormolSi . ' ' . $d_OlorFormol; ?>/></label></td>
                                    <td align="center"><label>No <input type="radio" id="OlorFormolNo" name="OlorFormol" value="0" <?php echo $OlorFormolNo . ' ' . $d_OlorFormol; ?>/></label></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="8">
                        <div class="container" id="Enfriet85" style="display: <?php echo $Enfriet85; ?>">
                            <b>Enfrie a T=85°C</b><br />
                            <input type="hidden" name="Enfriet85-" value="Enfriet85-">
                            <label for="temp85">Temperatura: </label>
                            <input type="number" id="temp85" name="temp85" value="<?php echo $temp85; ?>" placeholder="°C" <?php echo $d_temp85; ?> />
                            <b>Adicione (6)STW000 a 85°C</b>
                            <label for="horainciostw85">Hora de Inicio:</label>
                            <input type="time" id="horainiciostw85" name="horainiciostw85" value="<?php echo $horainiciostw85; ?>" <?php echo $d_horainiciostw85; ?> />
                            <br />
                            <label for="horafinstw85">Hora de Fin:</label>
                            <input type="time" id="horafinstw85" name="horafinstw85" value="<?php echo $horafinstw85; ?>" <?php echo $d_horafinstw85; ?> >
                            <br />
                            <b>Muestree y ajuste pH(10%) = 7.8 - 8.0.  (CSC050 / SWF098).</b>
                            <br />
                            <label for="ph10">pH(10%): </label>
                            <input type="number" id="ph10" name="ph10" value="<?php echo $ph10; ?>" placeholder="pH" <?php echo $d_ph10; ?> />
                            <br />
                            <b>Es necesario el ajuste? En caso se ser positiva la respuesta indique la cantidad total usada de CSO050 Y/O SWF098 en kilos:</b><br />
                            <label for="csc050aj">CSC050:</label>
                            <input type="number" id="Csc050Ajuste" name="Csc050Ajuste" value="<?php echo $Csc050Ajuste; ?>" placeholder="Kg" <?php echo $d_Csc050Ajuste; ?> />
                            <label for="stw000aj">STW000: </label>
                            <input type="number" id="Stw00Ajuste" name="Stw00Ajuste" value="<?php echo $Stw00Ajuste; ?>" placeholder="Kg" <?php echo $d_Stw00Ajuste; ?> />
                            <label for="ph10fin">pH(10%) Final: </label>
                            <input type="number" id="ph10fin" name="ph10fin" value="<?php echo $ph10fin; ?>" placeholder="pH" <?php echo $d_ph10fin; ?> />
                            <br />
                            <b>El aspecto final del producto es brillante, sin sedimento y sin turbidez?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ProductoBrillanteSi" name="ProductoBrillante" value="1" <?php echo $ProductoBrillanteSi . ' ' . $d_ProductoBrillante;?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="ProductoBrillanteNo" name="ProductoBrillante" value="0" <?php echo $ProductoBrillanteNo . ' ' . $d_ProductoBrillante;?> /></label></td>
                                </tr>
                            </table>
                            <br />
                            <!-- Validar con el no -->
                            Falta filtrado con el no.
                            <i>Si la respuesta es negativa, filtre por el Filtro lukas directamente desde el reactor</i><br />
                            <label for="HoraInicioLukas">Hora de Inicio:</label>
                            <input type="time" id="HoraInicioLukas" name="HoraInicioLukas" value="<?php echo $HoraInicioLukas; ?>" <?php echo $d_HoraInicioLukas; ?> />
                            <label for="HoraFinLukas">Hora de Fin:</label>
                            <input type="time" id="HoraFinLukas" name="HoraFinLukas" value="<?php echo $HoraFinLukas; ?>" <?php echo $d_HoraFinLukas; ?> /><br />
                            <b>El aspecto final del producto despues de la filtracion es brillante, sin sedimento y sin turbidez?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ProductoBrillante2Si" name="ProductoBrillante2" value="1" <?php echo $ProductoBrillante2Si . ' ' . $d_ProductoBrillante2;?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="ProductoBrillante2No" name="ProductoBrillante2" value="0" <?php echo $ProductoBrillante2No . ' ' . $d_ProductoBrillante2;?> /></label></td>
                                </tr>
                            </table>
                            Campo de texto cuando es no. "Notificar al laboratorio".
                            <br />
                            <i>Si la respuesta es afirmativa, se da por terminado el proceso de produccion y se continua con la descarga del producto</i>
                            <br />
                            <!-- Validar con el SI -->
                            <div>
                                <label for="HoraFinal">Hora de Fin:</label>
                                <input type="time" id="HoraFinal" name="HoraFinal" value="<?php echo $HoraFinal; ?>" <?php echo $d_HoraFinal; ?> />
                            </div>
                            <br />
                            <hr>
                        </div>
                    </form>
                    <form id="formNfo" name="formNfo" method="POST" action="guardarFormulario.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pasos" value="9">
                        <!-- Paso 12 -->
                        <div class="container" id="ProcesoDescarga" style="display: <?php echo $ProcesoDescarga; ?>;">
                            <h4>Proceso de descarga</h4>
                            <label> <b>¿Leyó la ficha y hoja de seguridad ( FS-01y FS-01-1) para eL 720NFO000?</b> 
                            <input type="checkbox" id="SegNFO" name="SegNFO" value="1" <?php echo $SegNFO;?> <?php echo $d_SegNFO;?> /></label>
                            <br />
                            <a href="img/SeguridadFiltradoDescarga.PNG" target="popup" onclick="window.open('img/SeguridadFiltradoDescarga.PNG','popup','width=886,height=260'); return false;">Ver Ficha de Seguridad</a>
                            <br />
                            <p style="color: red;"><u><i>EN CASO DE INCIDENTE CON 720NFO000 (Contacto con piel, ojos, inhalacion o derrame o incendio consulte la lista de contingencia.</i></u></p>
                            <a href="img/ContingenciaFiltradoDescarga.PNG" target="popup" onclick="window.open('img/ContingenciaFiltradoDescarga.PNG','popup','width=886,height=377'); return false;">Ver</a> <br />
                            <b>¿Cuenta con el equipo de seguridad adecuado para el manejo del 720NFO000?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="EquipoNFOSi" name="EquipoNFO" value="1" <?php echo $EquipoNFOSi . ' ' . $d_EquipoNFOSi; ?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="EquipoNFONo" name="EquipoNFO" value="0" <?php echo $EquipoNFONo . ' ' . $d_EquipoNFOSi; ?> /></label></td>
                                </tr>
                            </table>
                            <br />
                            <i>En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</i>
                            <br />
                        </div>

                        <!-- Paso 13 -->
                        <div class="container" id="SuspendioAgitacion" style="display: <?php echo $SuspendioAgitacion; ?> ">
                        <!-- Validar los dos check que no continuen sino estan checkeados -->
                            <label> <b>¿Suspendió la agitación del equipo?</b> 
                            <input type="checkbox" id="AgitacionOff" name="AgitacionOff" value="1" <?php echo $AgitacionOff;?> <?php echo $d_AgitacionOff; ?>/></label>
                            
                            <label> <b>¿Instalo talego de nylon para la descarga?</b> 
                            <input type="checkbox" id="TalegoDescarga" value="1" name="TalegoDescarga" <?php echo $TalegoDescarga;?> <?php echo $d_TalegoDescarga; ?>/></label>
                            <br />
                            <b>Realice la descarga a IBC (contenedores) para posterior proceso de secado</b>
                            <br />
                            <input type="hidden" name="DescargaIbc" value="DescargaIbc">
                            <label for="horainiciodescarga">Hora de Inicio:</label>
                            <input type="time" id="horainiciodescarga" name="horainiciodescarga" value="<?php echo $horainiciodescarga; ?>" <?php echo $d_horainiciodescarga; ?>/>
                            <br />
                            <label for="horafindescarga">Hora de Fin:</label>
                            <input type="time" id="horafindescarga" name="horafindescarga" value="<?php echo $horafindescarga; ?>" <?php echo $d_horafindescarga; ?>/>
                            <br />
                            <b>¿El talego de nylon quedo con mucho residuo?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ResiduoTalegoSi" name="ResiduoTalego" value="1" <?php echo $ResiduoTalegoSi . ' ' . $d_ResiduoTalego; ?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="ResiduoTalegoNo" name="ResiduoTalego" value="0" <?php echo $ResiduoTalegoNo . ' ' . $d_ResiduoTalego; ?> /></label></td>
                                </tr>
                            </table>
                            <label> <b>Enviar muestra final al laboratorio</b> 
                            <input type="checkbox" id="EnviarMuestraFinal" value="1" name="EnviarMuestraFinal" <?php echo $EnviarMuestraFinal; ?> <?php echo $d_EnviarMuestraFinal; ?>/></label>
                            <hr>
                            <h4>Resultados</h4>
                            <b>Aspecto:</b>
                            <input type="text" name="Aspecto" value="<?php echo $Aspecto; ?>" <?php echo $d_Aspecto; ?>/>
                            <label for="PorcentajeSolidos">% Solidos </label>
                            <input type="number" id="PorcentajeSolidos" name="PorcentajeSolidos" placeholder="%" value="<?php echo $PorcentajeSolidos; ?>" <?php echo $d_PorcentajeSolidos; ?>/>
                            <label for="pH10Final">pH(10%): </label>
                            <input type="number" id="pH10Final" name="pH10Final" placeholder="pH" value="<?php echo $pH10Final; ?>" <?php echo $d_pH10Final; ?>/>
                            <label for="Solubilidad10">Solubilidad (10%): </label>
                            <input type="number" id="Solubilidad10" name="Solubilidad10" placeholder="%" value="<?php echo $Solubilidad10; ?>" <?php echo $d_Solubilidad10; ?>/>
                            <label for="Solubilidad40">Solubilidad (40%): </label>
                            <input type="number" id="Solubilidad40" name="Solubilidad40" placeholder="%" value="<?php echo $Solubilidad40; ?>" <?php echo $d_Solubilidad40; ?>/>
                            <label for="Rendimiento">Rendimiento: </label>
                            <input type="text" id="Rendimiento" name="Rendimiento" value="<?php echo $Rendimiento; ?>" <?php echo $d_Rendimiento; ?>/>

                            <hr>
                            <h4>Proceso de Lavado</h4>
                            <b>¿El proceso a realizar en el reactor es diferente al 720NFO000, 720NFOB00, 180NFOCON?</b><br />
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" id="ProcesoDifSi" name="ProcesoDif" value="1" <?php echo $ProcesoDifSi . ' ' . $d_ProcesoDif; ?> /></label></td>
                                    <td align="center"><label>No <input type="radio" id="ProcesoDifNo" name="ProcesoDif" value="0" <?php echo $ProcesoDifNo . ' ' . $d_ProcesoDif; ?> /></label></td>
                                </tr>
                            </table>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="PasoFinal" value="PasoFinal">
                            <!-- Validar con el si. No se muestra con el si -->
                            <div class="container" id="relavarReactor" style="display: <?php echo $relavarReactor; ?>">
                                <i><u>Si la respuesta es negativa lavar el reactor y sistema como sigue:</u></i><br />
                                <label for="horainiciolavado">Hora de Inicio:</label>
                                <input type="time" id="horainiciolavado" name="horainiciolavado" value="<?php echo $horainiciolavado; ?>" <?php echo $d_horainiciolavado; ?>/><br />
                                <b>Enjuagar el vaso con agua, recoger en garrafa x 200 (Derivados del NFO) e identificar para ser usado este en el próximo proceso.</b>
                                <br />
                                <label for="KgEnjuague">Kilos generados en el enjuague: </label>
                                <input type="number" id="KgEnjuague" name="KgEnjuague" placeholder="Kg" value="<?php echo $KgEnjuague; ?>" <?php echo $d_KgEnjuague; ?>/>
                                <b>Cargar 300 kilos de agua aprox., agregar jabón, calentar hasta ebullición y abrir todas la válvulas, para que el vapor lave las tuberías.</b><br />
                                <label for="KgLavado">Kilos generados en de agua de lavado: </label>
                                <input type="number" id="KgLavado" name="KgLavado" placeholder="Kg" value="<?php echo $KgLavado; ?>" <?php echo $d_KgLavado; ?>/>
                                <label for="horafinlavado">Hora de Fin:</label>
                                <input type="time" id="horafinlavado" name="horafinlavado" value="<?php echo $horafinlavado; ?>" <?php echo $d_horafinlavado; ?>/>
                            </div>
                            <br />
                            <br />
                        </div>
                    </form>
                    </center>
                </fieldset>
            </form>
        </section>
    </main>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Paso 1
        $("#MatPriSeparadaSi").click(function() {
            if($("#MatPriFP04Si").is(':checked')){
                $("#CheckEquipo").show();
            }
            else{
                $("#CheckEquipo").hide();
            }
        });
        $("#MatPriSeparadaNo").click(function() {
            $("#CheckEquipo").hide();
        });

        // Paso 2
        $("#ReactorLimpioSi").click(function() {
                $("#limpiezaEquipo").show();
        });
        $("#ReactorLimpioNo").click(function() {
            $("#limpiezaEquipo").hide();
        });

        $("#EmisionesFuncionaSi").click(function() {
            if($("#HermeticidadReactorSi").is(':checked')){
                if($("#HermeticidadReactorSi").is(':checked')){
                    if($("#ReactorFuncionaSi").is(':checked')){
                        if($("#VacioFuncionaSi").is(':checked')){
                            if($("#VaporFuncionaSi").is(':checked')){
                                if($("#EnfriamientoFuncionaSi").is(':checked')){
                                    if($("#EmisionesFuncionaSi").is(':checked')){
                                        $("#phsodatanque").show();
                                    }else{$("#phsodatanque").hide();}
                                }else{$("#phsodatanque").hide();}
                            }else{$("#phsodatanque").hide();}
                        }else{$("#phsodatanque").hide();}
                    }else{$("#phsodatanque").hide();}
                }else{$("#phsodatanque").hide();}
            }else{$("#phsodatanque").hide();}
        });
        
        $("#EmisionesFuncionaNo").click(function() {
            $("#phsodatanque").hide();
        });

        $("#phsodatanqueSi").click(function() {
            $("#CondensadorFunciona").show();
        });
        $("#phsodatanqueNo").click(function() {
            $("#CondensadorFunciona").hide();
        });

        $("#CondensadorFuncionaSi").click(function() {
            $("#checkEquipo2").show();
        });
        $("#CondensadorFuncionaNo").click(function() {
            $("#checkEquipo2").hide();
        });

        // Paso 3
        $("#ApruebaInicioNo").click(function() {
            $("#RazonesNoAprob").show();
        });
        $("#ApruebaInicioSi").click(function() {
            $("#RazonesNoAprob").hide();
        });

        // Paso 4
        $("#ApruebaInicioSi").click(function() {
            $("#InicioProceso").show();
        });
        $("#ApruebaInicioNo").click(function() {
            $("#InicioProceso").hide();
        });

        $("#SeguridadNaftalenoSi").click(function() {
            $("#EquipoSeguridad").show();
        });
        $("#SeguridadNaftalenoNo").click(function() {
            $("#EquipoSeguridad").hide();
        });

        // Paso 5
        $("#EquipoNaftalenoSi").click(function() {
            $("#TrituradoSaco").show();
        });
        $("#EquipoNaftalenoNo").click(function() {
            $("#TrituradoSaco").hide();
        });

        $("#EnfriamientoCerrado").click(function() {
            $("#TrituradoSaco2").toggle();
        });

        // Paso 6
        $("#ProblemaFundSi").click(function() {
            $("#AfirmativaRespuesta").show();
            $("#Carga710").hide();
        });
        $("#ProblemaFundNo").click(function() {
            $("#AfirmativaRespuesta").hide();
            $("#Carga710").show();
        });

        // Paso 7
        $("#EquipoSulfuricoSi").click(function() {
            $("#CargueSWF098").show();
        });
        $("#EquipoSulfuricoNo").click(function() {
            $("#CargueSWF098").hide();
        });

        $("#ProblemaSWFOSi").click(function() {
            $("#TextoProblemaSWFO").show();
        });
        $("#ProblemaSWFONo").click(function() {
            $("#TextoProblemaSWFO").hide();
        });

        // Paso 8
        $("#EquipoFDOSi").click(function() {
            $("#RevisoConexion").show();
        });
        $("#EquipoFDONo").click(function() {
            $("#RevisoConexion").hide();
        });

        // Paso 9
        $("#CapacidadTanque").click(function() {
            $("#Carga700").toggle();
        });

        // Paso 10
        $("#ProblemaCondensacionSi").click(function() {
            $("#TextoProblemaCondensacion").show();
            $("#AdicionarSTW").hide();
        });
        $("#ProblemaCondensacionNo").click(function() {
            $("#TextoProblemaCondensacion").hide();
            $("#AdicionarSTW").show();
        });

        // Paso 11
        $("#EquipoCSOSi").click(function() {
            $("#ReaccionNeutra").show();
        });
        $("#EquipoCSONo").click(function() {
            $("#ReaccionNeutra").hide();
        });
        
        $("#OlorFormolSi").click(function() {
            $("#PositivaCSO050").show();
            $("#Enfriet85").show();
        });
        $("#OlorFormolNo").click(function() {
            $("#PositivaCSO050").hide();
            $("#Enfriet85").show();
        });
        
        // Paso 12
        $("#ProductoBrillante2Si").click(function() {
            $("#ProcesoDescarga").show();
        });
        $("#ProductoBrillante2No").click(function() {
            $("#ProcesoDescarga").hide();
        });
        
        // Paso 13
        $("#EquipoNFOSi").click(function() {
            $("#SuspendioAgitacion").show();
        });
        $("#EquipoNFONo").click(function() {
            $("#SuspendioAgitacion").hide();
        });

        // Paso 14
        $("#ProcesoDifSi").click(function() {
            $("#relavarReactor").show();
        });
        $("#ProcesoDifNo").click(function() {
            $("#relavarReactor").hide();
        });
    });
</script>
</body>
</html>