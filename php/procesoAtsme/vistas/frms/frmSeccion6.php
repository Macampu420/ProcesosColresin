
<section id="seccion6">
                <form id="frmSeccion6" name="frmSeccion6" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>

                            <!-- container formulacion proceso -->

                            <div class="container">
                                <h2>Converision TOD100 a TOREC0:</h2>

                                <!-- carga tod100 -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Cargo TOD100 e iniciar agitación.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="cargoTod100" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="cargoTod100" value="0" required>
                                    </div>
                                </div>

                                <hr>

                                <!-- adicion quimicos -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Adicionar (4) SSO000 y (5) GLG000.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="adicionSso000yGlg000" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="adicionSso000yGlg000" value="0" required>
                                    </div>
                                </div>  

                                <hr>

                                <!-- homogenizacion... -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Homogenizo 15 minutos, suspendio agitación para dejar en reposo 12 horas para separar TOREC0 / STW000.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="homogenizarSuspenderReposar" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="homogenizarSuspenderReposar" value="0" required>
                                    </div>
                                </div>  

                                <hr>

                                <!-- decarga -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Pasadas las 12 horas, descargue el STW000 separada (**Note un cambio de fases):</p>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>STW000(kg):<input class="w-75" type="number" placeholder="Kg STW000:"
                                                name="kgStw000">
                                    </div>
                                </div>

                                <hr>

                                <!-- kgtorec0 -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Continue descargando el TOREC0 hasta finalizar.</p>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>TOREC0(kg):<input class="w-75" type="number" placeholder="Kg TOREC0:"
                                                name="KgToreco">
                                    </div>
                                </div>

                                <hr>

                                <!-- torec etiquetado -->

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">¿Identifico el TORECO con numero de lote y fecha mediante una etiqueta?</p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Si <input type="radio" name="torecoEtiquetado">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>No<input type="radio" name="torecoEtiquetado">
                                    </div>
                                </div>

                                <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>

                            </div>

                            <hr>
                            
                        </center>
                    </fieldset>
                </form>
            </section>
