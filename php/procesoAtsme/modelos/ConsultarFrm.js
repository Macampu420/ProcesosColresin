let ConsultarFrm = {

    focoFrm: function (datosProceso) {
        for (const clave in datosProceso) {
            switch (clave) {
                case 'seccion1':
                case 'seccion2':
                case 'seccion3':
                case 'seccion4':
                case 'seccion5':
                case 'seccion6':
                case 'seccion7':
                    if(datosProceso[clave] == 0){
                        document.getElementById(clave).scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    break;
            }
        }
        
    },

    prepararFrm: function (datosProceso) {

        for (let clave in datosProceso) {
            switch (clave) {
                case 'seccion1':
                case 'seccion2':
                case 'seccion5':
                case 'seccion6':
                case 'seccion7':
                    if (datosProceso[clave] == 1) {
                        let form = document.getElementById(`frmSeccion${clave.slice(-1)}`);
                        let camposFrm = form.querySelectorAll('input, textarea, button');

                        camposFrm.forEach((campo) => {
                            campo.disabled = true;
                        });
                        document.getElementById(clave).classList.remove('d-none');
                        if (document.getElementById(clave).nextElementSibling) {
                            document.getElementById(clave).nextElementSibling.classList.remove('d-none');
                        };
                        continue; // Salta a la siguiente iteración
                    }
                    break;
                case 'seccion3':
                case 'seccion4':
                    if (datosProceso[clave] == 1) {
                        document.getElementById(clave).classList.remove('d-none');
                        if (document.getElementById(clave).nextElementSibling) document.getElementById(clave).nextElementSibling.classList.remove('d-none');
                        continue; // Salta a la siguiente iteración
                    }
                    break;
            }
        }
    },

    llenarSeccion1: function (clave, datosProceso) {
        switch (clave) {

            case 'NumLote':
                document.querySelector(`input[name='lote']`).value = datosProceso[clave];
                break;

            case 'torec0':
                document.querySelector(`input[name='TORECO']`).value = datosProceso[clave];
                break;

            case 'too00':
            case 'swf098':
            case 'stw000':
            case 'sso000':
            case 'glg000':
                document.querySelector(`input[name='${clave.toUpperCase()}']`).value = datosProceso[clave];
                break;

            // gestion equipo
            case 'dietrich1':
            case 'escamador':
                if (datosProceso[clave] == 1) document.getElementById(`${clave}`).checked = true;
                break;

            //gestion encabezado
            case 'separacionFp04':
            case 'materiaPrimaSeparada':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;
                        
            case 'problemaInicioProceso':
                document.querySelector(`input[name='problemaInicioProceso'][value='${datosProceso[clave]}']`).checked = true;
                if (datosProceso[clave] == 1) document.getElementById('comentarioDesaprueboInicio').classList.remove('d-none');
                break;
            
            case 'comentarioProblemaInicioProceso':    
                document.querySelector(`input[name='comentarioProblemaInicio']`).setAttribute('placeholder', datosProceso[clave]);
                break;

            // gestion estado equipo
            case 'reactorLimpio':
            case 'bombaMangueraLineasLimpias':
            case 'hermeticidadReactorOk':
            case 'reactorFuncionaOk':
            case 'sistemaVacioOk':
            case 'sistemaVaporOk':
            case 'sistemaEnfiramientoOk':
            case 'condensadorSinFugas':
            case 'aprobacionInicio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;
                
        }
    },

    llenarSeccion2: function (clave, datosProceso) {
        switch (clave) {
            case 'fichaLeidaToo':
                document.querySelector(`input[name='fichaLeída'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'equipoSeguridadToo':
                document.querySelector(`input[name='equipoSeguridad'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'cargaBomba':
            case 'conexionesAcoplesTuberiasOk':
            case 'coloracionTOO':
            case 'cargaConVacio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'bloqueoAjusteVacio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                if (datosProceso[clave] == 1) document.getElementById('bloqueoAjusteVacio').classList.remove('d-none');
                break;

            case 'inicioCargaTOO000':
            case 'finCargaTOO000':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;

            case 'problemaCarga':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                if (datosProceso[clave] == 1) document.getElementById('comentarioProblemaCargaToo').classList.remove('d-none');
                break;

            case 'comentarioProblemaCargaToo':
                document.getElementById('comentarioProblemaCargaToo').value = datosProceso[clave];
                break;

        }
    },

    //llena la seccion 3 sin segs
    llenarSeccion3: function (clave, datosProceso) {
        switch (clave) {
            case 'fichaLeidaSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='fichaLeida'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'equipoSeguridadToo':
                document.getElementById('frmSeccion3').querySelector(`input[name='equipoSeguridad'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'reactorEnfriamientoSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='reactorEnEnfriamiento'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'inicioVaporSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='inicioVapor'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'swf098Transparente':
            case 'equipoEnReflujo':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'inicioCargaSWF098':
            case 'finCargaSWF098':
            case 'inicioReflujo':
            case 'finReflujo':
            case 'totalAguaDestilada':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;

            case 'problemaAdicionAcido':
                document.querySelector(`input[name='problemaAdicionAcido'][value='${datosProceso[clave]}']`).checked = true;
                if (datosProceso[clave] == 1) document.getElementById('comentarioProblemaCargaSwf098').classList.remove('d-none');
                break;

            case 'comentarioProblema':
                document.getElementById('frmSeccion3').querySelector('input[name="comentarioProblema"]').value = datosProceso[clave];
                break;

            case 'inicioReflujo':
                document.querySelector(`#confirmInicioReflujo`).checked = true;
                break;


        }
    },

    //llena la seccion 4 sin segs
    llenarSeccion4: function (clave, datosProceso) {

        switch (clave) {
            case 'confirmInicioDestilacion':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'reactorEnfriamientoDestilacion':
                document.getElementById('frmSeccion4').querySelector(`input[name='reactorEnEnfriamiento'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'inicioEnfriamiento':
            case 'finEnfriamiento':
            case 'inicioSostener':
            case 'finSostener':
            case 'finDestilacion':
            case 'kgTOD100':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;

        }

    },

    llenarSeccion5: function (clave, datosProceso) {
        switch (clave) {
            case 'fichaLeidaDescarga':
                document.getElementById('frmSeccion5').querySelector(`input[name='fichaLeída'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'equipoSeguridadDescarga':
                document.getElementById('frmSeccion5').querySelector(`input[name='equipoSeguridad'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'RPMCilindro':
            case 'frecuenciaVariador':
            case 'temperaturaAgua':
            case 'kgAtsme0':
            case 'kgAtsxxx':
            case 'finVapor':
            case 'inicioDescarga':
            case 'finDescarga':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;

            case 'telaFiltrante':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'inicioVaporDescarga':
                document.getElementById('frmSeccion5').querySelector(`input[name='inicioVapor']`).value = datosProceso[clave];
                break;

            case 'problemaEscamado':
                document.querySelector(`input[name='problemaEscamado'][value='${datosProceso[clave]}']`).checked = true;
                if (datosProceso[clave] == 1) document.getElementById('problemaEscamado').classList.remove('d-none');
                break;

            case 'comentarioProblemaEscamado':
                document.getElementById('frmSeccion5').querySelector('input[name="comentarioProblema"]').value = datosProceso[clave];
                break;


        }
    },

    llenarSeccion6: function (clave, datosProceso) {
        switch (clave) {
            case 'cargoTod100':
            case 'adicionSso000yGlg000':
            case 'homogenizarSuspenderReposar':
            case 'torecoEtiquetado':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'kgStw000':
            case 'KgToreco':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;
        }
    },

    llenarSeccion7: function (clave, datosProceso) {
        switch (clave) {
            case 'inicioEnjuague':
            case 'finEnjuague':
            case 'kgAguaLavada':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;

            case 'tuberiasLimpias':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;
        }
    },

    renderSegsSwf: function (arraySeguimientosSwf, arrayMuestras) {

        let divSeguimientos = document.getElementById('containerSeguimientosSWF098');
        divSeguimientos.innerHTML = '';
        document.getElementById('containerReflujo').classList.remove('d-none');

        if(arraySeguimientosSwf.length > 0){
            swReflujo = 1;
        }

        arraySeguimientosSwf.forEach((seguimiento, indice) => {

            document.getElementById('containerReflujo').classList.remove('d-none');

            //renderiza el seguimiento con temperatura, presion y kg agua destilada
            if ((seguimiento.nroHoraSeguimiento == 10) || (seguimiento.nroHoraSeguimiento == 20)) {
                divSeguimientos.insertAdjacentHTML('beforeend', `
                <div>
                    <div class="row text-center">
                        <p class="fs-2 col-4">Hora ${seguimiento.nroHoraSeguimiento}:</p>
                    </div>
                
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Temperatura: </label>
                            <input disabled required type="number" id="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="°C" name="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.temperatura}"/>
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Presion: </label>
                            <input disabled required type="number" id="presionCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="DPI" name="presionCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.presion}"/>
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Agua Destilada: </label>
                            <input disabled required type="number" id="kgAguaDestiladaCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="Kg" name="kgAguaDestiladaCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.kgAguaDestilada}"/>
                        </div>
                    </div>
                    <div class="row">
                        <textarea disabled class="col-4 mx-auto h-50" id="observacionesCargaHora${seguimiento.nroHoraSeguimiento}" name="observacionesCargaHora${seguimiento.nroHoraSeguimiento}">${seguimiento.observaciones}</textarea>
                    </div>
                </div>
                <hr>`);
            }
            //renderiza el seguimiento con pregunta sobre la muestra
            else if (seguimiento.nroHoraSeguimiento > 20 && seguimiento.nroHoraSeguimiento <= 30) {

                let muestra = arrayMuestras.find(muestra => muestra.nroHora == seguimiento.nroHoraSeguimiento);

                if (muestra.muestraCumple == 1) document.getElementById('btnAgregarSeguimientoSwf').disabled = true;

                divSeguimientos.insertAdjacentHTML('beforeend', `
                <div>
                    <div class="row text-center">
                        <p class="fs-2 col-4">Hora ${seguimiento.nroHoraSeguimiento}:</p>
                    </div>
                
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Temperatura: </label>
                            <input disabled required type="number" id="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="°C" name="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.temperatura}"/>
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Presion: </label>
                            <input disabled required type="number" id="presionCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="DPI" name="presionCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.presion}"/>
                        </div>
                    </div>
                    <div class="row">
                        <textarea disabled class="col-4 mx-auto h-50"  id="observacionesCargaHora${seguimiento.nroHoraSeguimiento}" name="observacionesCargaHora${seguimiento.nroHoraSeguimiento}">${seguimiento.observaciones}</textarea>
                    </div>
                </div>
                
                <!-- muestra de acido sulfurico -->
    
                <div id="containerMuestra" class="">
    
                    <div id="confirmContainerMuestra" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">Segun la cantidad de agua destilada y el tiempo de reaccion
                            acumulado es necesario retirar muesta para previa de % acido sulfurico libre?</p>
    
                        <div class="col-6 mx-auto">
                            <label for="confirmMuestraNecesaria${seguimiento.nroHoraSeguimiento}">Si</label>
                            <input disabled type="radio" id="confirmMuestraNecesaria${seguimiento.nroHoraSeguimiento}" name="muestraNecesaria${seguimiento.nroHoraSeguimiento}" value="1">
                        </div>
                        <div class="col-6 mx-auto">
                            <label for="noMuestraNecesaria${seguimiento.nroHoraSeguimiento}">No</label>
                            <input disabled type="radio" id="noMuestraNecesaria${seguimiento.nroHoraSeguimiento}" name="muestraNecesaria${seguimiento.nroHoraSeguimiento}" value="0">
                        </div>
                          
                    </div>
    
                    <div id="divMuestraNecesaria" class="">
    
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098"> %sulfúrico libre (7 max): </label>
                                <input disabled value="${muestra.resultadoMuestra}" type="number" step="0.01" placeholder="" name="resultadoMuestra${seguimiento.nroHoraSeguimiento}" />
                            </div>
                        </div>
    
                        <div id="" class="row mt-3 pt-3">
                            <p class="fs-4 text-center">¿Cumple?</p>
                            <p class="text-danger">Si el valor está superior a 7%, continuar reacción y repetir
                                análisis hasta que se complete la reacción.</p>
    
                            <div class="col-6 mx-auto">
                                <label>Si<input disabled type="radio" name="muestraCumple${seguimiento.nroHoraSeguimiento}" value="1">
                            </div>
                            <div class="col-6 mx-auto">
                                <label>No<input disabled type="radio" name="muestraCumple${seguimiento.nroHoraSeguimiento}" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                `);
                document.querySelector(`input[name="muestraNecesaria${seguimiento.nroHoraSeguimiento}"][value="${muestra.muestraNecesaria}"]`).checked = true;
                document.querySelector(`input[name="muestraCumple${seguimiento.nroHoraSeguimiento}"][value="${muestra.muestraCumple}"]`).checked = true;
            }
            //renderiza el seguimiento "sencillo" (solo con temperatura y presion)
            else {
                divSeguimientos.insertAdjacentHTML('beforeend', `
                <div>
                    <div class="row text-center">
                        <p class="fs-2 col-4">Hora ${seguimiento.nroHoraSeguimiento}:</p>
                    </div>
                
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Temperatura: </label>
                            <input disabled required type="number" id="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="°C" name="temperaturaCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.temperatura}"/>
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Presion: </label>
                            <input disabled required type="number" id="presionCargaHora${seguimiento.nroHoraSeguimiento}" placeholder="DPI" name="presionCargaHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.presion}"/>
                        </div>
                    </div>
                    <div class="row">
                        <textarea disabled class="col-4 mx-auto h-50" id="observacionesCargaHora${seguimiento.nroHoraSeguimiento}" name="observacionesCargaHora${seguimiento.nroHoraSeguimiento}">${seguimiento.observaciones}</textarea>
                    </div>
                </div>
                <hr>`);
            };
        });

        numeroHoraSeguimSwf = arraySeguimientosSwf.length + 1;
    },

    renderSegsDest: function (arraySeguimientosDest) {

        let divSeguimientos = document.getElementById('containerSeguimientosDestilacionTod100');
        document.getElementById('containerSeguimientoDestilado').classList.remove('d-none');

        if (arraySeguimientosDest.length > 0) swDest = 0;

        arraySeguimientosDest.forEach((seguimiento, indice) => {

            if (seguimiento.nroHoraSeguimiento == 1) {
                divSeguimientos.innerHTML = '';
            }

            if (seguimiento.temperatura != 0 && seguimiento.presion != 0) {
                nroHoraDest = indice + 2;
                if ((seguimiento.nroHoraSeguimiento == 5) || (seguimiento.nroHoraSeguimiento == 8)) {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                            <div>
                                <div class="row text-center">
                                    <p class="fs-2 col-4">Hora ${seguimiento.nroHoraSeguimiento}:</p>
                                </div>
                            
                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label class="fs4">Temperatura: </label>
                                        <input disabled id="temperaturaDestilacionHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.temperatura}"type="number" placeholder="°C" name="temperaturaDestilacionHora${seguimiento.nroHoraSeguimiento}"  />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label class="fs4" for="swf098">Presion: </label>
                                        <input disabled id="presionDestilacionHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.presion}"type="number" placeholder="DPI" name="presionDestilacionHora${seguimiento.nroHoraSeguimiento}"  />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label class="fs4" for="swf098">TOD100: </label>
                                        <input disabled id="kgTOD100DestilacionHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.kgTOD100}"type="number" placeholder="Kg" name="kgTOD100DestilacionHora${seguimiento.nroHoraSeguimiento}"  />
                                    </div>
                                </div>
                            
                                <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                                    <p class="fs-4 text-center">¿Vacio?</p>
                                    <div class="col-2">
                                        <label>Si <input  disabled type="radio" name="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" value="1" >
                                    </div>
                                    <div class="col-2">
                                        <label>No<input  disabled type="radio" name="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" value="0" >
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <textarea disabled id="observacionesDestilacionHora${seguimiento.nroHoraSeguimiento}" class="col-4 mx-auto h-50" name="observacionesDestilacionHora${seguimiento.nroHoraSeguimiento}">${seguimiento.observaciones}</textarea>
                                </div>
                            </div>
        
                            <hr>
                    `)
                } else {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                            <div>
                                <div class="row text-center">
                                    <p class="fs-2 col-4">Hora ${seguimiento.nroHoraSeguimiento}:</p>
                                </div>
                            
                                <div class="row">
                                    <div class="col-4 mx-auto">
                                        <label class="fs4">Temperatura: </label>
                                        <input disabled id="temperaturaDestilacionHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.temperatura}"type="number" placeholder="°C" name="temperaturaDestilacionHora${seguimiento.nroHoraSeguimiento}"  />
                                    </div>
                                    <div class="col-4 mx-auto">
                                        <label class="fs4" for="swf098">Presion: </label>
                                        <input disabled id="presionDestilacionHora${seguimiento.nroHoraSeguimiento}" value="${seguimiento.presion}"type="number" placeholder="DPI" name="presionDestilacionHora${seguimiento.nroHoraSeguimiento}"  />
                                    </div>
                                </div>
                            
                                <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                                    <p class="fs-4 text-center">¿Vacio?</p>
                                    <div class="col-2">
                                        <label>Si <input disabled id="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" type="radio" name="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" value="1" >
                                    </div>
                                    <div class="col-2">
                                        <label>No<input disabled id="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" type="radio" name="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}" value="0" >
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <textarea disabled id="observacionesDestilacionHora${seguimiento.nroHoraSeguimiento}" class="col-4 mx-auto h-50" name="observacionesDestilacionHora${seguimiento.nroHoraSeguimiento}" placeholder="Observaciones:">${seguimiento.observaciones}</textarea>
                                </div>
                            </div>
        
                            <hr>
                        `)
                }
                document.querySelector(`input[name="vacioDestilacionHora${seguimiento.nroHoraSeguimiento}"][value="${seguimiento.vacio}"]`).checked = true;
            }
        });

    }
}