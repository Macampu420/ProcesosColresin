<?php

require_once "acciones.php";
require_once "../conexion/conexion.php";

$conex = new conection();
$result = $conex->conex();
    
$id = $_GET['id'];

$_user = new usuarios();

$query = $_user->get_user($id);

$row = $query->fetch_assoc();

$iduser 			= $row['IdUsuario'];
$nombre 			= $row['Nombre'];
$apellido 			= $row['Apellido'];
$cedula 			= $row['Cedula'];
$correo 	        = $row['CorreoElectronico'];
$contrasena         = $row['Contrasena'];
$estado 		    = $row['Estado'];
$rol 		        = $row['Rol'];
    
?>
<!-- Se crea el HTML con la información del Usuario -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-title">
            <h4>Datos Básicos :</h4>
        </div>
        <div class="form-body">
            <form action='accion.php?action=actualizar&id=<?php echo $iduser ?>' method="post"> 
                <div class="form-group"> 
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre; ?>"> 
                </div> 
                <div class="form-group">
                    <label>Apellido</label> 
                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?php echo $apellido; ?>"> 
                </div> 
                <div class="form-group">
                    <label>CC</label> 
                    <input type="text" name="cedula" class="form-control" placeholder="Cedula" value="<?php echo $cedula; ?>"> 
                </div>
                <div class="form-group">
                    <label>Correo</label> 
                    <input type="text" name="correo" class="form-control" placeholder="Correo" value="<?php echo $correo; ?>"> 
                </div>
                <div class="form-group">
                    <label>Contraseña</label> 
                    <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" value=""> 
                </div> 
                <div class="form-group"> 
                    <label>Estado</label>
                    <select name='estado' class='form-control'>
                        <option value='<?php echo $estado; ?>'><?php if($estado == 1){echo "Activo";}else{echo "Inactivo";} ?></option>
                        <option value='1'>Activo</option>
                        <option value='0'>Inactivo</option>
                    </select>
                </div>
                <div class="form-group"> 
                    <label>Rol</label>
                    <select name='rol' class='form-control'>
                        <option value='<?php echo $rol; ?>'><?php if($rol == 1){echo "Operador";}elseif($rol == 0){echo "Administrativo";}else{echo "Supervisor";} ?></option>
                        <option value='1'>Operador</option>
                        <option value='0'>Administrador</option>
                        <option value='2'>Supervisor</option>
                        <option value='3'>Coordinador</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button> 
                <button type="button" class="btn btn-danger" rel='modal:close' data-dismiss="modal">Cancelar</button> 
            </form> 
        </div>
    </div>
</body>
</html>
                                
    