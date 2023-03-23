<?php   

session_start();

if (!isset($_SESSION['login'])) {

	header("Location: ../inicio/session.html");
	exit();
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALTMANN - Modelando Conocimiento</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="shortcut icon" type="ico" href="favicon16x16.ico">
    <title>Proceso fabricación 800ATSME0</title>
</head>

<body>
    <header class="site-header p-5">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                    <img src="../../../img/colresin-altmann.PNG" alt="Logotipo Altmann">
                </a>

                <nav class="navegacion">
                    <a href="../inicio/index.php">Inicio</a>
                    <a href="../usuarios/usuarios.php">Usuarios</a>
                    <a href="../procesos/procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>
    <div class="container">
        <main>
            <!-- formulario seccion 1 (aprobacion inicio proceso) -->
            <?php include './frms/frmSeccion1.php'; ?>

            <!-- formulario seccion 2 (cargaTOO000) -->
            <?php include './frms/frmSeccion2.php'; ?>

            <!-- formulario seccion 3 (cargaSWF) -->
            <?php include './frms/frmSeccion3.php'; ?>

            <!-- formulario seccion 4 (destilacionTOD100) -->
            <?php include './frms/frmSeccion4.php'; ?>

            <!-- formulario seccion 5 (descarga) -->
            <?php include './frms/frmSeccion5.php'; ?>

            <!-- formulario seccion 6 (conversion TOD100 a TOREC0) -->
            <?php include './frms/frmSeccion6.php'; ?>

            <!-- formulario seccion 7 (lavado equipo) -->
            <?php include './frms/frmSeccion7.php'; ?>

        </main>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="./../modelos/Registro.js"></script>
    <script src="./../modelos/ConsultarFrm.js"></script>
    <script src="./../controladores/ctrRegistro.js"></script>
    <script src="./../controladores/ctrConsultarFrm.js"></script>
</body>

</html>