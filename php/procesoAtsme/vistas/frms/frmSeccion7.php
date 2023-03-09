<section id="seccion7">
                <form id="frmSeccion7" name="frmSeccion7" method="POST" action="./../controladores/registroFrm.php">
                    <fieldset>
                        <center>

                            <!-- container formulacion proceso -->

                            <div class="container">
                                <h2>Lavado equipo:</h2>

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Enjuague con agua a presión y guardar el enjuague en la caneca destinada para derivados de ATS. </p>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Inicio Enjuague:<input type="datetime-local" name="inicioEnjuague">
                                    </div>
                                    <div class="col-3 mt-5 mx-auto">
                                        <label>Fin Enjuague:<input type="datetime-local" name="finEnjuague">
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Dejo drenadas y limpias todas las tuberías involucradas en el proceso.</p>
                                    <div class="col-6 mx-auto">
                                        <label>Si <input type="radio" name="tuberiasLimpias" value="1" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label>No<input type="radio" name="tuberiasLimpias" value="0" required>
                                    </div>
                                </div>  

                                <hr>

                                <div class="row mt-3 pt-3">
                                    <p class="fs-4 text-center">Kilos generados de agua de lavado</p>
                                    <div class="col-4 mt-5 mx-auto">
                                        <label>Agua lavado(kg):<input class="w-75" type="number" placeholder="Kg agua:"
                                                name="kgAguaLavada">
                                    </div>
                                </div>

                                <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar y Continuar</button>

                            </div>

                            <hr>
                            
                        </center>
                    </fieldset>
                </form>
            </section>
