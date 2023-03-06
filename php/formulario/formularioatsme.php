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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" type="ico" href="favicon16x16.ico">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Document</title>
    <script>
        function valueChanged()
        {
            if($('#enfcerrado').is(":checked"))   
                $("#TrituradoSaco2").show();
            else
                $("#TrituradoSaco2").hide();
        }
    </script>
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
                
                <form id="formNfo" name="formNfo" method="POST" action="nuevoFormulario.php">
                    <fieldset>
                        <center>
                        <!-- Paso 1 -->
                        <div class="container" id="seleccioneProceso">
                            <H4>Seleccione proceso</H4>
                            <label>Nombre Proceso</label>
                            <select name="nfo" id="nfo">
                                <option value="720NFOB00">720NFOB00</option>
                                <option value="190NFOCON">190NFOCON</option>
                                <option value="4433QWE">4433QWE</option>
                            </select>

                            <legend>Proceso NFO</legend><br />

                            <label for="NumeroLote">Número de lote:</label>
                            <input type="text" size="2" id="NumeroLote" placeholder="Número de Lote" name="numeroLote" required />

                            <h4>Equipos a Utilizar</h4>
                            <table class="table">
                                <tr>
                                    <td style='width:35%;' align="center" >
                                        <label>DeDietrich 2</label>
                                        <input type="checkbox" id="Dietrich2" name="dietrich2" value="dietrich2">
                                    </td>
                                    <td style='width:30%;' align="center" >
                                        <label>Filtro Lukas</label>
                                        <input type="checkbox" id="FLukas" name="fLukas" value="fLukas">
                                    </td>
                                    <td style='width:35%;' align="center" >
                                        <label>Sistema de Control de Olor</label>
                                        <input type="checkbox" id="ContOlor" name="contOlor" value="contOlor">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <hr> 

                        <div class="container">
                            <h4>Formulación</h4>
                            <b> Indique la cantidad utilizada de cada materia prima </b><br />

                            <label for="nan000">NAN000: </label>
                            <input type="number" id="nan000" placeholder="Kg"  name="nan000"  height="50" width="200" required />
                            <label for="swf098">SWF098: </label>
                            <input type="number" id="swf098" placeholder="Kg"  name="swf098" required />
                            <label for="stw000">STW000: </label>
                            <input type="number" id="stw000" placeholder="Kg"  name="stw000" required />
                            <label for="fdo037">FDO037: </label>
                            <input type="number" id="fdo037" placeholder="Kg"  name="fdo037" required />
                            <label for="myo000">MYO000: </label>
                            <input type="number" id="myo000" placeholder="Kg"  name="myo000" required />
                            <label for="fdo037">STW000: </label>
                            <input type="number" id="stw0002" placeholder="Kg"  name="stw0002" required />
                            <label for="csc050">CSC050: </label>
                            <input type="number" id="csc050" placeholder="Kg"  name="csc050" required />
                            <label for="fdo037">STW000: </label>
                            <input type="number" id="stw0003" placeholder="Kg"  name="stw0003" required />  
                        </div>
                        
                        <hr>
                        <div class="container">
                            <h4>Formulación entregada por Bodega</h4>
                            <p>¿ Todas las materias primas están correctamente separadas en cantidad (Kg) segun el FP-04 ?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" name="MatPriFP04" value="1"></label></td>
                                    <td align="center"><label>No <input type="radio" name="MatPriFP04" value="0"></label><br /></td>
                                </tr>
                            </table>
                            
                            <p>¿ Todas las materias primas están correctamente marcadas y ubicadas en la zona de separacion?</p>
                            <table class="table" style="width:50%;">
                                <tr>
                                    <td align="center"><label>Si <input type="radio" name="MatPriSeparada" value="1"></label></td>
                                    <td align="center"><label>No <input type="radio" name="MatPriSeparada" value="0"></label></td>
                                </tr>
                            </table>
                            <i>
                                <u>
                                    Si la respuesta es negativa a cualquiera de las preguntas anteriores,  notifiquelo al area de Bodega para hacer la correccion correspondiente.
                                </u>
                            </i>
                        </div>
                        <input type="submit" value="Guardar y Continuar" class="boton boton-opcion rounded-3">
                        <hr>
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
                $("#CheckEquipo").show();
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

        // $("#HermeticidadReactorSi").click(function() {
            // if($("#HermeticidadReactorSi").attr('checked', true)){
                // if($("#ReactorFuncionaSi").attr('checked', true)){
                    // if($("#VacioFuncionaSi").attr('checked', true)){
                        // if($("#VaporFuncionaSi").attr('checked', true)){
                            // if($("#EnfriamientoFuncionaSi").attr('checked', true)){
                                // if($("#EmisionesFuncionaSi").attr('checked', true)){
                                    $("#EmisionesFuncionaSi").click(function() {
                                        $("#phsodatanque").show();
                                    });
                                // }
                            // }
                        // }
                    // }
                // }
            // }
        // });
        
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

        // Paso 6
        $("#problemafundSi").click(function() {
            $("#Carga710").hide();
            $("#AfirmativaRespuesta").show();
        });
        $("#problemafundNo").click(function() {
            $("#Carga710").show();
            $("#AfirmativaRespuesta").hide();
        });

        // Paso 7
        $("#EquipoSulfuricoSi").click(function() {
            $("#CargueSWF098").show();
        });
        $("#EquipoSulfuricoNo").click(function() {
            $("#CargueSWF098").hide();
        });

        // Paso 8
        $("#equipoformolmetanolSi").click(function() {
            $("#RevisoConexion").show();
        });
        $("#equipoformolmetanolNo").click(function() {
            $("#RevisoConexion").hide();
        });

        // Paso 9
        $("#capacidadtanque").click(function() {
            $("#Carga700").toggle();
        });

        // Paso 10
        $("#problemareacSi").click(function() {
            $("#CualAfirmativa").show();
        });
        $("#problemareacNo").click(function() {
            $("#CualAfirmativa").hide();
            $("#AdicionarSTW").show();
        });

        // Paso 11
        $("#EquipoSodaSi").click(function() {
            $("#ReaccionNeutra").show();
        });
        $("#EquipoSodaNo").click(function() {
            $("#ReaccionNeutra").hide();
        });
        
        $("#olorformolSi").click(function() {
            $("#PositivaCSO050").show();
            $("#Enfriet85").show();
        });
        $("#olorformolNo").click(function() {
            $("#PositivaCSO050").hide();
            $("#Enfriet85").show();
        });
        
        // Paso 12
        $("#productobrillante2Si").click(function() {
            $("#ProcesoDescarga").show();
        });
        $("#productobrillante2No").click(function() {
            $("#ProcesoDescarga").hide();
        });
        
        // Paso 13
        $("#EquipoNFOSi").click(function() {
            $("#SuspendioAgitacion").show();
        });
        $("#EquipoNFONo").click(function() {
            $("#SuspendioAgitacion").hide();
        });
        $("#procesodifSi").click(function() {
            $("#relavarReactor").show();
        });
        $("#procesodifNo").click(function() {
            $("#relavarReactor").hide();
        });
    });
</script>
</body>
</html>