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

            <!-- formulario seccion 3 (cargaTOO000) -->
            <section id="seccion2">
                <form id="frmSeccion2" name="frmSeccion2" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>

                            <!-- container cargaTOO000 -->
                            <div class="container">
                                <h2>Carga del 710SWF098 e inicio de reaccion</h2>

                                <!-- ficha seguridad -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-danger">¿Leyó la ficha y hoja de seguridad ( FS-01y FS-01-1) para el 710SWF098?</p>

                                    <div class="row text-center">
                                        <div class="col-4 mx-auto">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-decoration-underline fw-bold">Ver ficha</p>
                                                </div>
                                                <div class="col">
                                                    <p class="text-decoration-underline fw-bold">Ver hoja de seguridad
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="fichaLeída" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="fichaLeída" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- equipo seguirdad -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Cuenta con el equipo de seguridad adecuado para el
                                        manejo?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                                        negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP
                                        apropiado.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="equipoSeguridad" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="equipoSeguridad" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- swf translucido -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿El SWF098 se encuentra totalmente transparente y traslucido</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                                        negativa, contactar a control calidad / I+D para su correspondiente revision.
                                    </p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="swf098Transparente" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="swf098Transparente" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- reactor en enfriamiento  -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Puso enfriemiento al reactor?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="reactorEnEnfriamiento" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="reactorEnEnfriamiento" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- carga reactor -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Cargo directamente al reactor (2) SWF098  (garrafas) mediante vacío desde el 3 nivel del módulo?</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Inicio carga:<input type="datetime-local" name="inicioCargaSWF098">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Fin carga:<input type="datetime-local"  name="finCargaSWF098">
                                    </div>
                                </div>

                                <hr>

                                <!-- inicioVapor -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Inicio vapor a la camisa con una P = 20-25 psi?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="inicioVapor" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="inicioVapor" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- problema solucion acido -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿ Se presento algún problema al adicionar el ácido sulfúrico?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta es
                                        afirmativa, mencione lo ocurrido y notifique al area encargada para dar
                                        solucion.</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Si <input type="radio" name="problemaAdicionAcido">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>No<input type="radio" name="problemaAdicionAcido">
                                    </div>
                                </div>

                                <hr>

                                <!-- comentario problema -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Indica el problema:</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <input type="textarea" placeholder="Problema" name="comentarioProblema">
                                    </div>
                                </div>

                                <hr>

                                <!-- equipoEnReflujo -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Puso a reflujo el equipo para retornar TOO000 a la reacción?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="equipoEnReflujo" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="equipoEnReflujo" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- inicio reflujo -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Se dio inicio al reflujo?</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Inicio reflujo:<input type="datetime-local" name="inicioReflujo">
                                    </div>
                                </div>

                                <hr>

                                <h2>Seguimiento de la reaccion</h2>
                                <p class="fs-4 fw-bold">Con vapor sostener temperatura y reflujo T = 105 - 110°C </p>
                                <p class="fs-4 text-danger">***IMPORTANTE: En caso de notarse alguna novedad,  coloracion o que el destialdo tenga un aspecto diferente a liquido transparente incoloro indicar en la casilla de observaciones.</p>

                                <button type="submit" id="btnPrimeraParteForm"
                                    class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>
                                <hr>
                            </div>
                        </center>
                    </fieldset>
                </form>
            </section>

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
    <script src="./../controladores/ctrRegistro.js"></script>
</body>

</html>