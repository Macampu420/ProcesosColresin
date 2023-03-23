<section id="seccion2">
    <form id="frmSeccion2" name="frmSeccion2" method="POST" action="./../controladores/registroFrm.php">
        <fieldset>
            <center>

                <hr>
                <!-- container cargaTOO000 -->
                <div class="container">
                    <h2 id="tituloSeccion2">Carga TOO000 / TOREC0:</h2>

                    <!-- ficha seguridad -->

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
                                        <p class="text-decoration-underline fw-bold">Ver hoja de seguridad
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mx-auto">
                            <label>Si <input id="fichaLeidaToo" type="radio" name="fichaLeída" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="fichaLeidaToo" type="radio" name="fichaLeída" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- equipo adecuado -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Cuenta con el equipo de seguridad adecuado para el
                            manejo?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                            negativa, contactar a Salud Ocupacional para reemplazo o entrega del EPP
                            apropiado.</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="equipoSeguridadToo" type="radio" name="equipoSeguridad" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="equipoSeguridadToo" type="radio" name="equipoSeguridad" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- cargaBomba -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Realizara la carga con bomba a prueba de explosión o en
                            su defecto una bomba de vacio o neumatica? </p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="cargaBomba" type="radio" name="cargaBomba" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="cargaBomba" type="radio" name="cargaBomba" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- conexionesAcoplesTuberiasOk -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Verificó que las conexiones electricas, acoples de
                            manguera y tubería estén correctamente?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                            negativa, contactar a natentenimiento para hacer las correcciones necesarias.
                        </p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="conexionesAcoplesTuberiasOk" type="radio" name="conexionesAcoplesTuberiasOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="conexionesAcoplesTuberiasOk" type="radio" name="conexionesAcoplesTuberiasOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- coloracionTorec -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿El TOO000 / TORECO presenta alguna coloracion?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                            negativa, contactar a control calidad / I+D para su correspondiente revision.
                        </p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="coloracionTOO" type="radio" name="coloracionTOO" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="coloracionTOO" type="radio" name="coloracionTOO" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <!-- cargaConVacio -->

                    <div id="cargaConVacio" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Cargará el TOO000 con vacio?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="cargaConVacioToo000" type="radio" name="cargaConVacio" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="cargaBomba" type="radio" name="cargaConVacio" value="0" required>
                        </div>
                    </div>

                    <!-- bloqueoAjusteVacio -->

                    <div id="bloqueoAjusteVacio" class="row mt-3 pt-3 d-none">

                        <hr>

                        <p class="fs-4 text-center">Bloquee el equipo y ajuste el vacio para que la carga se
                            realice por el condensador y el colector</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" name="bloqueoAjusteVacio" value="1">
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" name="bloqueoAjusteVacio" value="0">
                        </div>

                    </div>

                    <hr>

                    <!-- carga TOO000 TOREC0 -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">Cargue el (1)700TOO00 / TORECO (reserve aproximadamente
                            500 kilos para lavar la linea despues de la carga del SWF098)</p>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Inicio carga:<input id="cargaBomba" type="datetime-local" placeholder="inicioCarga" required name="inicioCargaTOO000">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Fin carga:<input id="cargaBomba" type="datetime-local" placeholder="finCarga" required name="finCargaTOO000">
                        </div>
                    </div>

                    <hr>

                    <!-- problemaCarga -->

                    <div id="problemaCargaToo100" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Se presento algún problema en la carga del TOO000 /
                            TORECO?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta es
                            afirmativa, mencione lo ocurrido y notifique al area encargada para dar
                            solucion.</p>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Si <input id="cargaBomba" type="radio" value="1" id="siProblemaCargaToo100" required name="problemaCarga">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>No<input id="cargaBomba" type="radio" value="0" required name="problemaCarga">
                        </div>
                    </div>

                    <hr>

                    <!-- comentarioProblema -->

                    <div id="comentarioProblemaCargaToo" class="row mt-3 pt-3 d-none">
                        <p class="fs-4 text-center">Indica el problema:</p>
                        <div class="col-3 mt-5 mx-auto">
                            <input id="cargaBomba" type="textarea" placeholder="Problema" name="comentarioProblema">
                        </div>
                    </div>

                    <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar
                        y Continuar</button>
                    <hr>
                </div>
            </center>
        </fieldset>
    </form>
</section>