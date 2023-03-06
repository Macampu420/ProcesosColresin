<?php   

session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../inicio/session.html");
	exit();
	
}

if (isset($_SESSION['cedula'])){

	$cedula = $_SESSION['cedula'];
}

require_once "../conexion/conexion.php";

$conex = new conection();
$result = $conex->conex();
date_default_timezone_set('America/Bogota');

$nfo            = $_POST["nfo"] != ''               ? $_POST["nfo"]             :'';
$numeroLote     = isset($_POST["numeroLote"])       ? $_POST["numeroLote"]      :'';
$MatPriFP04     = isset($_POST["MatPriFP04"])       ? $_POST["MatPriFP04"]      :'';
$MatPriSeparada = isset($_POST["MatPriSeparada"])   ? $_POST["MatPriSeparada"]  :'';

$queryInicio = "INSERT INTO NFO (nfo, numeroLote, MatPriFP04, MatPriSeparada) VALUES ('$nfo', '$numeroLote', '$MatPriFP04', '$MatPriSeparada');";
$query  = mysqli_query($result,$queryInicio);
$id     = mysqli_insert_id($result);

// Equipos
$dietrich2  = isset($_POST["dietrich2"])    ?   isset($_POST["dietrich2"])   : '';
$fLukas     = isset($_POST["fLukas"])       ?   isset($_POST["fLukas"])      : '';
$contOlor   = isset($_POST["contOlor"])     ?   isset($_POST["contOlor"])    : '';

$queryEquipos = "INSERT INTO Equipos (IdProceso, dietrich2, fLukas, contOlor) VALUES ('$id', '$dietrich2', '$fLukas', '$contOlor');";

$query = mysqli_query($result,$queryEquipos);

// Materia Prima
$nan000  = isset($_POST["nan000"])     ? $_POST["nan000"]    :'';
$swf098  = isset($_POST["swf098"])     ? $_POST["swf098"]    :'';
$stw000  = isset($_POST["stw000"])     ? $_POST["stw000"]    :'';
$fdo037  = isset($_POST["fdo037"])     ? $_POST["fdo037"]    :'';
$myo000  = isset($_POST["myo000"])     ? $_POST["myo000"]    :'';
$stw0002 = isset($_POST["stw0002"])    ? $_POST["stw0002"]   :'';
$csc050  = isset($_POST["csc050"])     ? $_POST["csc050"]    :'';
$stw0003 = isset($_POST["stw0003"])    ? $_POST["stw0003"]   :'';

$queryMateria = "INSERT INTO MateriaPrima (IdProceso, nan000, swf098, stw000, fdo037, myo000, stw0002, csc050, stw0003) VALUES ('$id', '$nan000','$swf098','$stw000','$fdo037','$myo000','$stw0002','$csc050','$stw0003');";
$query = mysqli_query($result,$queryMateria);

// IdProceso, NombreMP, Cantidad
$fechaInicial = date("Y-m-d"); 
$horaInicial = date("H:i:s"); 
$qp = "INSERT INTO Procesos (IdProceso, NumLote, FechaInicial, HoraInicial, Estado, Cedula) VALUES ('$id', '$numeroLote', '$fechaInicial', '$horaInicial', '1', '$cedula');";

$query2 = mysqli_query($result,$qp);

if($query > 0){
    $msg    = "El formulario fue agregado";
    $route  = "editarFormulario.php?id=".$id."";
}else{
    $msg = 'Error al agregar el formulario. Intente nuevamente';
    $route  = "formulario.php";
}
    
$html = "<script>
    window.alert('$msg');
    self.location='".$route."';
</script>";
	
echo $html;	
