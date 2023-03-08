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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" type="ico" href="favicon16x16.ico">
    <title>Proceso fabricación 800ATSME0</title>
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
                    <a href="../usuarios/usuarios.php">Usuarios</a>
                    <a href="../procesos/procesos.php">Procesos</a>
                    <a href="../login/cerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </div> <!-- Contenedor -->
    </header>
    <div class="container">
        <main>       
            <section id="formulario">
                
                <form id="formNfo" name="formNfo" method="POST" >
                    <fieldset>
                        <center>
                        <!-- Paso 1 -->
                        <div class="container" id="seleccioneProceso">
                            <H1 class="my-3">Proceso fabricación 800ATSME0</H1>

                            <label class="mt-5 fs-3" for="NumeroLote">Número de lote:</label>
                            <input type="text" size="2" id="lote" placeholder="Número de Lote" name="lote" required />

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
                            <h3>Formulación del proceso:</h3>
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
                                <p id="pTotal"class="fs-4 text-center">Total:</p>
                            </div>
                        </div>
                        
                        <hr>

                        <!-- container formulacion entregada por bodega -->
                        <div class="container">
                            <h3>Formulación entregada por Bodega:</h3>
                            <p class="fs-4">¿Todas las materias primas están correctamente separadas en cantidad (Kg) segun el FP-04 ?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" name="separacionFp04" value="1"></label></td>
                                    <td align="center"><label>No <input type="radio" name="separacionFp04" value="0"></label><br /></td>
                                </tr>
                            </table>
                            
                            <p class="fs-4">¿ Todas las materias primas están correctamente marcadas y ubicadas en la zona de separacion?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" name="materiaPrimaSeparada" value="1"></label></td>
                                    <td align="center"><label>No <input type="radio" name="materiaPrimaSeparada" value="0"></label></td>
                                </tr>
                            </table>
                            <i>
                                <u>
                                    Si la respuesta es negativa a cualquiera de las preguntas anteriores,  notifiquelo al area de Bodega para hacer la correccion correspondiente.
                                </u>
                            </i>
                        </div>
                        <hr>

                        <!-- container equipo -->
                        <div class="container">
                            <h3>Equipo:</h3>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿El reactor esta completamente limpio?</p>
                                <p class="fs-5 underline text-center">Si la respuesta en negativa, realizar limpieza nuevamente.</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="reactorLimpio" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="reactorLimpio" value="0">
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿La bomba, mangueras y las lineas de carga esta completamente limpias?</p>
                                <p class="fs-5 underline text-center">Si la respuesta en negativa, realizar limpieza nuevamente.</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="bombaMangueraLineasLimpias" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="bombaMangueraLineasLimpias" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Revisó la hermeticidad del reactor y líneas de traslado para evitar fugas de TOO000/TORECO y SWF098?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="hermeticidadReactorOk" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="hermeticidadReactorOk" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Revisó que el reactor funcione correctamente?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="reactorFuncionaOk" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="reactorFuncionaOk" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Funciona bien el sistema de vacío?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="sistemaVacioOk" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="sistemaVacioOk" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Funciona bien el sistema de vapor?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="sistemaVaporOk" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="sistemaVaporOk" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Funciona bien el sistema de enfriamiento?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="sistemaEnfiramientoOk" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="sistemaEnfiramientoOk" value="0">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿El condensador no presenta escapes y funciona correctamente?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="condensadorSinFugas" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="condensadorSinFugas" value="0">
                                </div>
                            </div>

                            <hr>
                        </div>

                        <!-- container aprobacion inicio -->
                        <div class="container">
                            <h3>Aprobacion final del inicio proceso:</h3>

                            <div class="row mt-5 pt-3">
                                <p class="fs-4 text-center">¿Aprueba el inicio del proceso?</p>
                                <div class="col-6 mx-auto">
                                    <label>Si <input type="radio" name="aprobacionInicio" value="1">
                                </div>
                                <div class="col-6 mx-auto">
                                    <label>No<input type="radio" name="aprobacionInicio" value="0">
                                </div>
                            </div>
                            
                            <button id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>

                        </div>
                    </center>
                </fieldset>
            </form>
        </section>
    </main>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="./Registro.js"></script>
<script src="./ctrRegistro.js"></script>
</body>
</html>