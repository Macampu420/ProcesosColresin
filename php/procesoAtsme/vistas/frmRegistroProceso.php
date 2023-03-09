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
            <section id="seccion1">
                <form id="frmSeccion1" name="frmSeccion1" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>
                            <!-- Paso 1 -->
                            <div class="container" id="seleccioneProceso">
                                <H1 class="my-3">Proceso fabricación 800ATSME0</H1>

                                <label class="mt-5 fs-3" for="NumeroLote">Número de lote:</label>
                                <input type="text" size="2" id="lote" placeholder="Número de Lote" name="lote"
                                    required />

                                <h3 class="mt-5 pt-5">Equipos a Utilizar:</h3>

                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label>Dietrich 1</label>
                                        <input type="checkbox" id="dietrich1" name="dietrich1" value="1">
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label>Escamador</label>
                                        <input type="checkbox" id="escamador" name="escamador" value="1">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- container formulacion proceso -->

                            <div class="container">
                                <h2>Formulación del proceso:</h2>
                                <b class="fs-4"> (Llenar con cantidades en Kilos, consignadas en el FP-04) </b><br />

                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">TOO000: </label>
                                        <input type="number" id="TOO00" placeholder="Kg" name="TOO00" required />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">TORECO: </label>
                                        <input type="number" id="TORECO" placeholder="Kg" name="TORECO" required />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">SWF098: </label>
                                        <input type="number" id="SWF098" placeholder="Kg" name="SWF098" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">STW000: </label>
                                        <input type="number" id="STW000" placeholder="Kg" name="STW000" required />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">SSO000: </label>
                                        <input type="number" id="SSO000" placeholder="Kg" name="SSO000" required />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label for="swf098">GLG000: </label>
                                        <input type="number" id="GLG000" placeholder="Kg" name="GLG000" required />
                                    </div>
                                    <p id="pTotal" class="fs-4 text-center">Total:</p>
                                </div>
                            </div>

                            <hr>

                            <!-- container formulacion entregada por bodega -->
                            <div class="container">
                                <h2>Formulación entregada por Bodega:</h2>
                                <p class="fs-4">¿Todas las materias primas están correctamente separadas en cantidad
                                    (Kg) segun el FP-04 ?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si <input type="radio" name="separacionFp04"
                                                    value="1"></label></td>
                                        <td align="center"><label>No <input type="radio" name="separacionFp04"
                                                    value="0"></label><br /></td>
                                    </tr>
                                </table>

                                <p class="fs-4">¿ Todas las materias primas están correctamente marcadas y ubicadas en
                                    la zona de separacion?</p>
                                <table class="table" style="width:50%;">
                                    <tr>
                                        <td align="center"><label>Si <input type="radio" name="materiaPrimaSeparada"
                                                    value="1"></label></td>
                                        <td align="center"><label>No <input type="radio" name="materiaPrimaSeparada"
                                                    value="0"></label></td>
                                    </tr>
                                </table>
                                <i>
                                    <u>
                                        Si la respuesta es negativa a cualquiera de las preguntas anteriores,
                                        notifiquelo al area de Bodega para hacer la correccion correspondiente.
                                    </u>
                                </i>
                            </div>
                            <hr>

                            <!-- container equipo -->
                            <div class="container">
                                <h2 class="mt-5">Equipo:</h2>

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿El reactor esta completamente limpio?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta en
                                        negativa, realizar limpieza nuevamente.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="reactorLimpio" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="reactorLimpio" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿La bomba, mangueras y las lineas de carga esta
                                        completamente limpias?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta en
                                        negativa, realizar limpieza nuevamente.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="bombaMangueraLineasLimpias" value="1"
                                                required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="bombaMangueraLineasLimpias" value="0"
                                                required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Revisó la hermeticidad del reactor y líneas de traslado
                                        para evitar fugas de TOO000/TORECO y SWF098?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="hermeticidadReactorOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="hermeticidadReactorOk" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Revisó que el reactor funcione correctamente?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="reactorFuncionaOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="reactorFuncionaOk" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Funciona bien el sistema de vacío?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="sistemaVacioOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="sistemaVacioOk" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Funciona bien el sistema de vapor?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="sistemaVaporOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="sistemaVaporOk" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Funciona bien el sistema de enfriamiento?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="sistemaEnfiramientoOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="sistemaEnfiramientoOk" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿El condensador no presenta escapes y funciona
                                        correctamente?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="condensadorSinFugas" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="condensadorSinFugas" value="0" required>
                                    </div>
                                </div>

                                <hr>
                            </div>

                            <!-- container aprobacion inicio -->
                            <div class="container">
                                <h2>Aprobacion final del inicio del proceso:</h2>

                                <div class="row mt-5 pt-3">
                                    <p class="fs-4 text-center">¿Aprueba el inicio del proceso?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                                        negativa, indique las razones (contacte a mantenimiento y deje el proceso en
                                        espera hasta dar solución)</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="aprobacionInicio" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="aprobacionInicio" value="0" required>
                                    </div>
                                </div>

                                <button type="submit" id="btnPrimeraParteForm"
                                    class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>

                            </div>

                        </center>
                    </fieldset>
                </form>
            </section>

            <!-- formulario seccion 2 (cargaTOO000) -->
            <section id="seccion2">
                <form id="frmSeccion2" name="frmSeccion2" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>

                            <hr>

                            <!-- container cargaTOO000 -->
                            <div class="container">
                                <h2>Carga TOO000 / TOREC0:</h2>

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-danger">¿Leyó la ficha y hoja de seguridad ( FS-01 y FS-01-1)
                                        para el 700TOO000 / 720TOREC0?</p>

                                    <div class="row text-center">
                                        <div class="col-4 mx-auto">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-decoration-underline fw-bold">Ver ficha</p>
                                                </div>
                                                <div class="col">
                                                    <p class="text-decoration-underline fw-bold">Ver hoja de seguridad</p>
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
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Cuenta con el equipo de seguridad adecuado para el manejo?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP apropiado.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="equipoSeguridad" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="equipoSeguridad" value="0" required>
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Realizara la carga con  bomba a prueba de explosión o en su defecto una bomba de vacio o neumatica? </p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="cargaBomba" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="cargaBomba" value="0" required>
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Verifico que las conexiones electricas, acoples de manguera y tubería estén correctamente?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta negativa, contactar a Mnatentenimiento para hacer las correcciones necesarias.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="conexionesAcoplesTuberiasOk" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="conexionesAcoplesTuberiasOk" value="0" required>
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿El TOO000 / TORECO presenta alguna coloracion?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta negativa, contactar a control calidad / I+D  para su correspondiente revision.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="coloracionTOO" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="coloracionTOO" value="0" required>
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Cargara  el TOO000 con vacio?</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="cargaConVacio" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="cargaConVacio" value="0" required>
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Bloquee el equipo y ajuste el vacio para que la carga se realice por el condensador y el colector</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="bloqueoAjusteVacio" value="1">
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="bloqueoAjusteVacio" value="0">
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Cargue el  (1)700TOO00 / TORECO (reserve aproximadamente 500 kilos para lavar la linea despues de la carga del SWF098)</p>
                                    <div class="col-3 mt-5 mx-auto">
                                    <label>Inicio carga:<input type="datetime-local" placeholder="inicioCarga" name="inicioCargaTOO000">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                    <label>Fin carga:<input type="datetime-local" placeholder="finCarga" name="finCargaTOO000">
                                    </div>
                            </div>

                            <hr>

                            <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Se presento algún problema en la carga del TOO000 / TORECO?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta es afirmativa, mencione lo ocurrido y notifique al area encargada para dar solucion.</p>
                                    <div class="col-3 mt-5 mx-auto">
                                    <label>Si <input type="radio" placeholder="inicioCarga" name="problemaCarga">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                    <label>No<input type="radio" placeholder="finCarga" name="problemaCarga">
                                    </div>
                            </div>

                            <hr>

                             <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Indica el problema:</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <input type="textarea" placeholder="Problema" name="comentarioProblema">
                                    </div>
                            </div>

                            <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>
                            <hr>
                        </center>
                    </fieldset>
                </form>
            </section>

            
        </main>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="./../modelos/Registro.js"></script>
<script src="./../controladores/ctrRegistro.js"></script>
</body>
</html>