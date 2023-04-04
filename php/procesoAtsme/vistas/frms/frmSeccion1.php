<section id="seccion1">
    <form id="frmSeccion1" name="frmSeccion1" method="POST" action="./../controladores/registroFrm.php">
        <fieldset>
            <center>
                <!-- Paso 1 -->
                <div class="container" id="seleccioneProceso">
                    <H1 class="my-3">Proceso fabricación 800ATSME0</H1>

                    <div class="row">
                        <div class="col-6">
                            <label class="mt-5 fs-3" for="NumeroLote">Número de lote:</label>
                            <input type="text" size="2" id="NumLote" placeholder="Número de Lote" name="lote" required />
                        </div>
                        <div class="col-6">
                            <label class="mt-5 fs-3" for="NumeroLote">Nombre proceso:</label>
                            <input type="text" id="NombreProceso" value="800ATSME0" disabled />
                        </div>
                    </div>

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
                            <input id="too00" type="number" step="0.01" id="TOO00" placeholder="Kg" name="TOO00" required />
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="swf098">TOREC0: </label>
                            <input id="torec0" type="number" step="0.01" id="TORECO" placeholder="Kg" name="TORECO" required />
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="swf098">SWF098: </label>
                            <input id="swf098" type="number" step="0.01" id="SWF098" placeholder="Kg" name="SWF098" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label for="swf098">STW000: </label>
                            <input id="stw000" type="number" step="0.01" id="STW000" placeholder="Kg" name="STW000" required />
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="swf098">SSO000: </label>
                            <input id="sso000" type="number" step="0.01" id="SSO000" placeholder="Kg" name="SSO000" required />
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="swf098">GLG000: </label>
                            <input id="glg000" type="number" step="0.01" id="GLG000" placeholder="Kg" name="GLG000" required />
                        </div>
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
                            <td align="center"><label>Si <input id="separacionFp04" type="radio" name="separacionFp04" value="1" required></label>
                            </td>
                            <td align="center"><label>No <input id="separacionFp04" type="radio" name="separacionFp04" value="0" required></label><br /></td>
                        </tr>
                    </table>

                    <p class="fs-4">¿ Todas las materias primas están correctamente marcadas y ubicadas en
                        la zona de separacion?</p>
                    <table class="table" style="width:50%;">
                        <tr>
                            <td align="center"><label>Si <input id="materiaPrimaSeparada" type="radio" name="materiaPrimaSeparada"
                                        value="1"></label></td>
                            <td align="center"><label>No <input id="materiaPrimaSeparada" type="radio" name="materiaPrimaSeparada"
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
                            <label>Si <input id="reactorLimpio" type="radio" name="reactorLimpio" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="reactorLimpio" type="radio" name="reactorLimpio" value="0" required>
                        </div>
                    </div>

                    <hr>
                    

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿La bomba, mangueras y las lineas de carga esta
                            completamente limpias?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">Si la respuesta en
                            negativa, realizar limpieza nuevamente.</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="bombaMangueraLineasLimpias" type="radio" name="bombaMangueraLineasLimpias" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="bombaMangueraLineasLimpias" type="radio" name="bombaMangueraLineasLimpias" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Revisó la hermeticidad del reactor y líneas de traslado
                            para evitar fugas de TOO000/TORECO y SWF098?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="hermeticidadReactorOk" type="radio" name="hermeticidadReactorOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="hermeticidadReactorOk" type="radio" name="hermeticidadReactorOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Revisó que el reactor funcione correctamente?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="reactorFuncionaOk" type="radio" name="reactorFuncionaOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="reactorFuncionaOk" type="radio" name="reactorFuncionaOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Funciona bien el sistema de vacío?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="sistemaVacioOk" type="radio" name="sistemaVacioOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="sistemaVacioOk" type="radio" name="sistemaVacioOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Funciona bien el sistema de vapor?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="sistemaVaporOk" type="radio" name="sistemaVaporOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="sistemaVaporOk" type="radio" name="sistemaVaporOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Funciona bien el sistema de enfriamiento?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="sistemaEnfiramientoOk" type="radio" name="sistemaEnfiramientoOk" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="sistemaEnfiramientoOk" type="radio" name="sistemaEnfiramientoOk" value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿El condensador no presenta escapes y funciona
                            correctamente?</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="condensadorSinFugas" type="radio" name="condensadorSinFugas" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="condensadorSinFugas" type="radio" name="condensadorSinFugas" value="0" required>
                        </div>
                    </div>

                    <hr>
                </div>

                <!-- container aprobacion inicio -->
                <div class="container">
                    <h2>Aprobacion final del inicio del proceso:</h2>

                    <div id="aprobacionInicio" class="row mt-5 pt-3">
                        <p class="fs-4 text-center">¿Aprueba el inicio del proceso?</p>
                        <p class="fs-5 text-decoration-underline text-center fw-bold">En caso de respuesta
                            negativa, indique las razones (contacte a mantenimiento y deje el proceso en
                            espera hasta dar solución)</p>
                        <div class="col-6 mx-auto">
                            <label>Si <input id="confirmAprobacionInicio" id="reactorLimpio" type="radio" id="aprobacionInicio" name="aprobacionInicio" value="1" required>
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input id="noAprobacionInicio" id="reactorLimpio" type="radio" name="aprobacionInicio" value="0" required>
                        </div>
                    </div>

                    <!-- comentarioProblema -->

                    <div id="comentarioDesaprueboInicio" class="row mt-3 pt-3 d-none">
                        <p class="fs-4 text-center">Indica el problema:</p>
                        <div class="col-3 mt-5 mx-auto">
                            <input id="inpComentarioDesaprueboInicio" type="textarea" placeholder="Problema" name="comentarioDesaprueboInicio">
                        </div>
                    </div>


                    <button type="submit" id="btnPrimeraParteForm" class="boton boton-opcion rounded-3 p-3 mb-5">Guardar
                        y Continuar</button>

                </div>

            </center>
        </fieldset>
    </form>
</section>