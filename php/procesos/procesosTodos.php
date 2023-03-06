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

$_process = new procesos();

$query = $_process->get_process();


if(isset($_GET['id'])){
    $eliminarProceso = $_process->eliminarProceso($_GET['id']);
    if($eliminarProceso > 0){
        $msg    = "El formulario fue eliminado correctamente";
        $ruta   = "procesos.php";
    }else{
        $msg    = 'El formulario no pudo ser eliminado';
        $ruta   = "procesos.php";
    }
    
    $html = "<script>
        window.alert('$msg');
        self.location='".$ruta."';
    </script>";
}

$tr = '';

while ($row = $query->fetch_array(MYSQLI_BOTH)){
    $eliminar = "";
    $editar = "";
    if($row['Estado'] == 1){
        $estado = "<i class='fa fa-circle' style='color:orange;'> En proceso</i>";
        if($idrol == 0 ){
            $eliminar = "<i class='fas fa-trash'></i>";
        }
        $editar   = "<a href='../formulario/editarFormulario.php?id=" . $row['IdProceso'] . "'>
                    <i class='fas fa-pen'></i>
                </a>";
    }else if($row['Estado'] == 2){
        $estado = "<i class='fa fa-circle' style='color:green;'> Finalizado</i>";
        $editar   = "<a href='../formulario/verFormulario.php?id=" . $row['IdProceso'] . "'>
                    <i class='fas fa-eye'></i>
                </a>";
    }else if($row['Estado'] == 3){
        $estado = "<i class='fa fa-circle' style='color:red;'> Eliminado</i>";
        $editar   = "<a href='../formulario/verFormulario.php?id=" . $row['IdProceso'] . "'>
                    <i class='fas fa-eye'></i>
                </a>";
    }

    if($idrol == 2){
        $eliminar   = "";
        $editar     = "<a href='../formulario/verFormulario.php?id=" . $row['IdProceso'] . "'>
        <i class='fas fa-eye'></i>
        </a>";
    }

    $tr .=	"<tr class='rows' id='rows'>
                <td>" . $row['IdProceso'] 	. "</td>
                <td>" . $row['NumLote'] 	. "</td>
                <td>" . $row['nombreProceso'] . "</td>
                <td>" . $row['Nombre'] . " " . $row['Apellido'] ."</td>
                <td>" . $row['FechaInicial'] ."</td>
                <td>" . $row['FechaFinal'] . "</td>
                <td>" . $estado . "</td>
                <td>
                    ".$editar."
                    &nbsp;&nbsp;
                    <a href='procesos.php?id=" . $row['IdProceso'] . "'>
                    ".$eliminar."
                </a>
                </td>
            </tr>";
}

$btn        = "<button type='button' class='boton-add' onclick=\"window.location.href='../formulario/formulario.php'\"><i class='fa fa-plus-circle' aria-hidden='true'></i> Proceso</button>";
if($idrol == 2){
    $btn        = "";
}
// <button onclick='eliminarProceso(" . $row['IdProceso'] . ")'>
//         <i class='fas fa-trash'></i>
//     </button>
            

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALTMANN - Modelando Conocimiento</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../css/normalize.css"> -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link href='../../css/fontawesome.css' rel='stylesheet'>
    <link href='../../css/all.css' rel='stylesheet'>
    <link rel="shortcut icon" type="ico" href="../favicon16x16.ico">
    <!-- <script src="../../js/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
</head>
<body>

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                <img src="../../img/colresin-altmann.PNG" alt="Logotipo Altmann">
                </a>

                <nav class="navegacion">
                    <a href="../inicio/index.php">Inicio</a>
                    <a href="../usuarios/usuarios.php" <?php echo $display; ?> >Usuarios</a>
                    <a href="procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="centrar-texto">Procesos</h1>
        <div class="container">
            <?php echo $btn; ?>
            <button type="button" class="boton-add" onclick="window.location.href='procesos.php'"><i class="fa fa-eye" aria-hidden="true"></i> Ver en proceso</button>
            </div>
        <div class="container">
            <table class="table table-over">
                <thead>
                    <tr>
                        
                        <th scope="col">Lote</th>
                        <th scope="col">Proceso</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Iniciado</th>
                        <th scope="col">Finalizado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $tr; ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        
    </main>

    <!-- Sección Pie de página-->
    <footer class="site-footer seccion"> 
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="../inicio/index.php">Inicio</a>
                <a href="../usuarios/usuarios.php" <?php echo $display; ?> >Usuarios</a>
                <a href="procesos.php">Procesos</a>
                <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
            </nav>

            <p class="copyright">Todos los derechos reservados 2022 &copy; </p>
        </div>
    </footer>
    <script>
        $('#ModalAdd').on('shown.bs.modal', function () {
            $('#btnModalAdd').trigger('focus')
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>