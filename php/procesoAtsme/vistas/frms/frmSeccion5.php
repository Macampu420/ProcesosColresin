<section id="seccion5">
                <form id="frmSeccion5" name="frmSeccion5" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>

                            <!-- container formulacion proceso -->

                            <div class="container">
                                <h2>Descarga:</h2>

                                <!-- ficha seguridad -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-danger">¿Leyó la ficha y hoja de seguridad ( FS-01y FS-01-1) para el 800ATSME0?</p>

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

                                <!-- equipo de seguridad apropiado -->

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

                                <!-- inicio calentamiento -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">IMPORTANTE: A la par de inciar el calentaminendo realice la instalacion del Escamador para proceder con la decarga con las siguientes condiciones de operacion:</p>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>RPM (cilindro):<input class="w-75" type="number" placeholder="RPM cilindro:"
                                                name="RPMCilindro">
                                    </div>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>Frecuencia Variador: <input class="w-100" type="number" placeholder="Frecuencia variador:"
                                                name="frecuenciaVariador">
                                    </div>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>Temperatura agua(°C)<input class="w-100" type="number" placeholder="Temperatura agua:"
                                                name="temperaturaAgua">
                                    </div>
                                </div>

                                <hr>

                                <!-- tela filtrante -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Instalo la tela filtrante en la tuberia de descarga</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Si <input type="radio" name="telaFiltrante">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>No<input type="radio" name="telaFiltrante">
                                    </div>
                                </div>

                                <hr>

                                <!-- vapor camisa -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Ponga vapor a la camisa para subir  T=133°c</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Inicio vapor:<input type="datetime-local" name="inicioVapor">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Fin vapor:<input type="datetime-local" name="finVapor">
                                    </div>
                                </div>

                                <hr>

                                <!-- descarga -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Sin agitacion y una vez alcanzada la temperatura de T = 135°C, inicie la descarga mediante escamador</p>
                                    <p class="fs-4 text-danger">En caso que la temperatura baje al punto de cristliazacion, poner pase de vapor para no interferir el proceso de descarga por el escamador</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Inicio descarga:<input type="datetime-local" name="inicioDescarga">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Fin descarga:<input type="datetime-local" name="finDescarga">
                                    </div>
                                </div>

                                <hr>

                                <!-- reporte rendimiento -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-3 text-center text-danger">Reporte el rendimiento final del producto, asi como si se genero algun residuo de ATSME0</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>ATSME0(kg):<input type="number" class="w-75" name="kgAtsme0" placeholder="Kg Atsme0:">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>ATSXXX(kg):<input type="number" class="w-75" name="kgAtsxxx" placeholder="Kg Atsxxx:">
                                    </div>
                                </div>

                                <hr>

                                <!-- problema escamado -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿ Se presento algún problema en el proceso de escamado ?</p>
                                    <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta es afirmativa, mencione lo ocurrido y notifique al area encargada para dar solucion.</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Si <input type="radio" name="problemaEscamado">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>No<input type="radio" name="problemaEscamado">
                                    </div>
                                </div>

                                <hr>

                                <!-- problema escamado -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Indica el problema:</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <input type="textarea" placeholder="Problema" name="comentarioProblema">
                                    </div>
                                </div>

                                <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>
                                <hr>
                            </div>
                            
                        </center>
                    </fieldset>
                </form>
            </section>
