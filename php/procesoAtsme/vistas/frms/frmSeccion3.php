<section id="seccion3">
    <form id="frmSeccion3" name="frmSeccion3" method="POST" action="./../controladores/registroFrm.php">
        <fieldset>
            <center>

                <!-- container cargaTOO000 -->
                <div class="container">
                    <h2>Carga del 710SWF098 e inicio de reaccion</h2>

                    <!-- ficha seguridad -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-danger">¿Leyó la ficha y hoja de seguridad ( FS-01y FS-01-1) para el
                            710SWF098?</p>

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
                            <label>Si <input type="radio" class="inpSwf" id="fichaLeidaFrm3" name="fichaLeida" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="fichaLeida" value="0" required>
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
                            <label>Si <input type="radio" class="inpSwf" name="equipoSeguridad" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="equipoSeguridad" value="0" required>
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
                            <label>Si <input type="radio" class="inpSwf" name="swf098Transparente" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="swf098Transparente" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- reactor en enfriamiento  -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Puso enfriemiento al reactor?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" class="inpSwf" name="reactorEnEnfriamiento" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="reactorEnEnfriamiento" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- carga reactor -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Cargo directamente al reactor (2) SWF098 (garrafas) mediante vacío
                            desde el 3 nivel del módulo?</p>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Inicio carga:<input type="datetime-local" class="inpSwf" name="inicioCargaSWF098">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Fin carga:<input type="datetime-local" class="inpSwf" name="finCargaSWF098">
                        </div>
                    </div>

                    <hr>

                    <!-- inicioVapor -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Inicio vapor a la camisa con una P = 20-25 psi?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" class="inpSwf" name="inicioVapor" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="inicioVapor" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- problema solucion acido -->

                    <div id="problemaCargaSwf098" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿ Se presento algún problema al adicionar el ácido sulfúrico?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta es
                            afirmativa, mencione lo ocurrido y notifique al area encargada para dar
                            solucion.</p>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Si <input type="radio" class="inpSwf" value="1" id="siProblemaCargaSwf098" name="problemaAdicionAcido">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>No<input type="radio" class="inpSwf" value="0" name="problemaAdicionAcido">
                        </div>
                    </div>

                    <!-- comentario problema -->

                    <div id="comentarioProblemaCargaSwf098" class="row mt-3 pt-3 d-none">
                        <p class="fs-4 text-center">Indica el problema:</p>
                        <div class="col-3 mt-5 mx-auto">
                            <input type="textarea" class="inpSwf" placeholder="Problema" name="comentarioProblema">
                        </div>
                    </div>

                    <hr>

                    <!-- equipoEnReflujo -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Puso a reflujo el equipo para retornar TOO000 a la reacción?
                        </p>
                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" class="inpSwf" name="equipoEnReflujo" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="equipoEnReflujo" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- inicio reflujo -->

                    <div id="divInicioReflujo" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Se dio inicio al reflujo?</p>

                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" class="inpSwf" id="confirmInicioReflujo" name="inicioCarga" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" class="inpSwf" name="inicioCarga" value="0" required>
                        </div>
                    </div>

                    <!-- seccion reflujo (inicio fin y seguimientos) -->

                    <div id="containerReflujo" class="d-none">

                        <div id="containerInicioReflujo" class="row">
                            <div class="col-3 mx-auto">
                                <label>Inicio reflujo:<input type="datetime-local" class="inpSwf" name="inicioReflujo">
                            </div>
                        </div>

                        <hr>

                        <h2>Seguimiento de la reaccion</h2>
                        <p class="fs-4 fw-bold">Con vapor sostener temperatura y reflujo T = 105 - 110°C </p>
                        <p class="fs-4 text-danger">***IMPORTANTE: En caso de notarse alguna novedad, coloracion o que el destialdo tenga un aspecto diferente a liquido transparente incoloro indicar en la casilla de observaciones.</p>

                        <!-- segumientos -->

                        <div id="containerSeguimientosSWF098">
                            <div>
                                <div class="row text-center">
                                    <p class="fs-2 col-4">Hora 1:</p>
                                </div>

                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label class="fs4" for="swf098">Temperatura: </label>
                                        <input required type="number" id="temperaturaCargaHora1"
                                            placeholder="°C" name="temperaturaCargaHora1" />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label class="fs4" for="swf098">Presion: </label>
                                        <input required type="number" id="presionCargaHora1" placeholder="DPI"
                                            name="presionCargaHora1" />
                                    </div>
                                </div>
                                <div class="row">
                                    <textarea class="col-4 mx-auto h-50" id="observacionesCargaHora1"
                                        name="observacionesCargaHora1" placeholder="Observaciones:"></textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <button id="btnAgregarSeguimientoSwf" class="boton boton-opcion rounded-3 p-3 mb-5"
                            type="button">Agregar hora</button>

                    </div>

                    <!-- fin reflujo -->
                    <div id="containerFinReflujo" class="row mt-3 pt-3">
                        <div class="col-3 mx-auto">
                            <label>Fin reflujo:<input id="finReflujo" type="datetime-local" name="finReflujo">
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Agua Destilada (Kg):</label>
                            <input id="totalAguaDestilada" type="number" step="0.01" placeholder="" name="totalAguaDestilada" />
                        </div>
                    </div>
                    <hr>

                    <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar
                        y Continuar</button>
                    <hr>
                </div>
            </center>
        </fieldset>
    </form>
</section>