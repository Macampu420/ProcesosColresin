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
if($idrol == 1 || $idrol == 3){
    $display = "style='display:none;'";
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
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" type="ico" href="../favicon16x16.ico">
</head>
<body>

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                <img src="../../img/colresin-altmann.PNG" alt="Logotipo Altmann">
                </a>

                <nav class="navegacion">
                    <a href="index.php">Inicio</a>
                    <a href="../usuarios/usuarios.php" <?php echo $display; ?> >Usuarios</a>
                    <a href="../procesos/procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>

    <main class="contenedor seccion contenido-centrado contenedor-descargas">
        <h1 class="fw-300 centrar-texto">Productos</h1>

        <fieldset>
            <br>
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="../../img/gestordocumental.jpg" alt="Documental">
                </div>
                <div class="texto-entrada">
                    <a href="../procesos/procesos.php">
                        <h4>Gestión Documental</h4>
                    </a>
                
                </div>
            </article>

        </fieldset>
        <br>
        <br>
        
    </main>

        <!-- Sección Pie de página-->
    <footer class="site-footer seccion"> 
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="index.php">Inicio</a>
                <a href="../usuarios/usuarios.php" <?php echo $display; ?> >Usuarios</a>
                <a href="../procesos/procesos.php">Procesos</a>
                <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
            </nav>

            <p class="copyright">Todos los derechos reservados 2022 &copy; </p>
        </div>
    </footer>

       
</body>

</html>