<?php
session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../../login.html");
	exit();
	
}
if (isset($_SESSION['rol'])){

	$idrol 	= $_SESSION['rol'];
}

require_once "acciones.php";

$_user = new usuarios();

$query = $_user->get_users();

$tr = '';

while ($row = $query->fetch_array(MYSQLI_BOTH)){
if($row['Rol'] == 0){
    $rol = "Administrador";
}elseif($row['Rol'] == 1){
    $rol = "Operador";
}elseif($row['Rol'] == 2){
    $rol = "Supervisor";
}elseif($row['Rol'] == 3){
    $rol = "Coordinador";
}

if($idrol == 2){
    $eliminar   = "";
    $editar   = "<a href='../formulario/verUsuario.php?id=" . $row['IdUsuario'] . "'>
                <i class='fas fa-eye'></i>
            </a>";
}else{
    $eliminar   = "<a href='accion.php?action=eliminar&id=" . $row['IdUsuario'] . "'>
                    <i class='fas fa-trash'></i>
                </a>";
    $editar   = "<a href='editarUsuario.php?id=" . $row['IdUsuario'] . "' rel='modal:open'>
                    <i class='fas fa-pen'></i>
                </a>";
}

$estado = ($row['Estado'] == 0) ?   "Inactivo"      :   "Activo";

$tr .=	"<tr class='rows' id='rows'>
            <td>" . $row['Cedula'] 	. "</td>
            <td>" . $row['Nombre'] . " " . $row['Apellido'] ."</td>
            <td>" . $row['CorreoElectronico'] 	. "</td>
            <td>" . $rol 	. "</td>
            <td>" . $estado 	. "</td>
            <td>
                
                ".$editar."
                &nbsp;&nbsp;
                ".$eliminar."
            </td>
        </tr>";
}
$btn        = "<button type='button' id='btnModalAdd' class='boton-add' data-toggle='modal' data-target='#ModalAdd'><i class='fa fa-plus-circle' aria-hidden='true'></i> Usuario</button>";
if($idrol == 2){
    $btn        = "<br />";
}
// $_user->get_user(1);

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
                    <a href="usuarios.php">Usuarios</a>
                    <a href="../procesos/procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="centrar-texto">Usuarios</h1>
        <div class="container">
            <?php echo $btn; ?>
        </div>
        <div class="container">
            <table class="table table-over">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
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

    <!-- Modal Agregar Usuario -->

    <div class="modal" tabindex="-1" role="dialog" id="ModalAdd">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <form action='nuevoUsuario.php' method="post"> 
                            <div class="form-group"> 
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre"> 
                            </div> 
                            <div class="form-group">
                                <label>Apellido</label> 
                                <input type="text" name="apellido" class="form-control" placeholder="Apellido"> 
                            </div> 
                            <div class="form-group">
                                <label>CC</label> 
                                <input type="text" name="cedula" class="form-control" placeholder="Cedula"> 
                            </div>
                            <div class="form-group">
                                <label>Correo</label> 
                                <input type="text" name="correo" class="form-control" placeholder="Correo"> 
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label> 
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña"> 
                            </div> 
                            <div class="form-group"> 
                                <label>Estado</label>
                                <select name='estado' class='form-control'>
                                    <option value='1'>Activo</option>
                                    <option value='0'>Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label>Rol</label> 
                                <select name='rol' class='form-control'>
                                    <option value='1'>Operador</option>
                                    <option value='0'>Administrador</option>
                                    <option value='2'>Supervisor</option>
                                    <option value='3'>Coordinador</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button> 
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </form> 
                    </div>
                </div>
            <!-- <div class="modal-footer">
                
            </div> -->
            </div>
        </div>
    </div>

    
    <!-- Fin Modal Agregar Usuario -->

    <!-- Sección Pie de página-->
    <footer class="site-footer seccion"> 
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="../inicio/index.php">Inicio</a>
                <a href="usuarios.php">Usuarios</a>
                <a href="../formulario/formularios.html">Formularios</a>
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