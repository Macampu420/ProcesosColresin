<section id="seccion4">
    <form id="frmSeccion4" name="frmSeccion4" method="POST" action="./../controladores/registroFrm.php">
        <fieldset>
            <center>

                <!-- container destilacionTod100 -->
                <div class="container">
                    <h2>Destilacion del TOD100</h2>

                    <!-- inicio destilacion -->

                    <div class="row mt-3 pt-3">
                        <p class="fs-4 text-center">Inicio destilación de TOD100 sin vacio, conservando presión y
                            temperatura maxima T=133°C.</p>

                        <div class="col-6 mx-auto">
                            <label>Si <input type="radio" name="confirmInicioDestilacion" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" name="confirmInicioDestilacion" value="0" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 mx-auto">
                            <label>Inicio destilado:<input type="datetime-local" name="inicioDestilacion">
                        </div>
                    </div>

                    <hr>

                    <!-- seguimientos -->

                    <div id="containerSeguimientosDestilacionTod100">
                        <div class="row text-center">
                            <p class="fs-2 col-4">Hora 1:</p>
                        </div>

                        <div class="row">
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Temperatura: </label>
                                <input type="number" id="TOO00" placeholder="°C" name="temperatura" required />
                            </div>
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Presion: </label>
                                <input type="number" id="TORECO" placeholder="DPI" name="presion" required />
                            </div>
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">TOD100: </label>
                                <input type="number" id="SWF098" placeholder="Kg" name="kgTOD100" required />
                            </div>
                        </div>

                        <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                            <p class="fs-4 text-center">¿Vacio?</p>
                            <div class="col-2">
                                <label>Si <input type="radio" name="vacio" value="1" required>
                            </div>
                            <div class="col-2">
                                <label>No<input type="radio" name="vacio" value="0" required>
                            </div>
                        </div>

                        <div class="row">
                            <textarea class="col-4 mx-auto h-50" name="observaciones"
                                placeholder="Observaciones:"></textarea>
                        </div>
                    </div>

                    <div class="row mt-4 pt-2">
                        <div class="col-3 mx-auto">
                            <label>Fin destilado:<input type="datetime-local" name="finDestilacion">
                        </div>
                    </div>

                    <hr>

                    <!-- enfriamiento  -->

                    <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                        <p class="fs-4 text-center">¿Puso enfriamento para bajar temperatura a 70°C?</p>
                        <div class="col-2 mt-3">
                            <label>Si <input type="radio" name="reactorEnEnfriamiento" value="1" required>
                        </div>
                        <div class="col-2 mt-3">
                            <label>No<input type="radio" name="reactorEnEnfriamiento" value="0" required>
                        </div>
                    </div>

                    <div class="row">
                        <p class="text-center fs-4">Sin cerrar enfriamiento y alcanzada la T = 80°C, adicione (3)
                            STW000.</p>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Inicio enfriamiento:<input type="datetime-local" name="inicioEnfriamiento">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Fin enfriamiento:<input type="datetime-local" name="finEnfriamiento">
                        </div>
                    </div>

                    <hr>

                    <!-- enfriamiento  -->

                    <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                        <p class="fs-4 text-center">Sostenga por XXX horas:</p>

                        <div class="col-3 mt-5 mx-auto">
                            <label>Inicio sostenimiento:<input type="datetime-local" name="inicioSostener">
                        </div>
                        <div class="col-3 mt-5 mx-auto">
                            <label>Fin sostenimiento:<input type="datetime-local" name="finSostener">
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