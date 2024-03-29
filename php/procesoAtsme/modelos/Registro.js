let RegistroForm = {
    //metodo que envia la primera parte del formulario al servidor
    enviarPrimeraParte: (event, datosPrimeraParte) => {
        fetch('./registroFrm.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datosPrimeraParte)
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error al hacer la petición', error));
    },

    construirNuevoFormulario: () => {
        let secciones = document.querySelectorAll('[id*="seccion"]');
        secciones = Array.from(secciones);
        secciones.shift();

        secciones.forEach(seccion => seccion.classList.add('d-none'));
    },

    mostrarOcultarElemento: (event, idDisparador, idOcultar) => {
        event.target.id == idDisparador ?
            document.getElementById(idOcultar).classList.remove('d-none') :
            document.getElementById(idOcultar).classList.add('d-none');
    },

    renderSegumientoReflujo: (numeroHoraSeguimSwf) => {

        let divSeguimientos = document.getElementById('containerSeguimientosSWF098');

        //renderiza el seguimiento con temperatura, presion y kg agua destilada
        if ((numeroHoraSeguimSwf == 10) || (numeroHoraSeguimSwf == 20)) {
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number" id="temperaturaCargaHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" id="presionCargaHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Agua Destilada: </label>
                        <input required type="number" id="kgAguaDestiladaCargaHora${numeroHoraSeguimSwf}" placeholder="Kg" name="kgAguaDestiladaCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50"  id="observacionesCargaHora${numeroHoraSeguimSwf}" name="observacionesCargaHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            <hr>`);
            return numeroHoraSeguimSwf + 1;
        }
        //renderiza el seguimiento con pregunta sobre la muestra
        else if(numeroHoraSeguimSwf > 20 && numeroHoraSeguimSwf <=30){
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number" id="temperaturaCargaHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" id="presionCargaHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50"  id="observacionesCargaHora${numeroHoraSeguimSwf}" name="observacionesCargaHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            
            <!-- muestra de acido sulfurico -->

            <div id="containerMuestra" class="">

                <div id="confirmContainerMuestra" class="row mt-3 pt-3">
                    <p class="fs-4 text-center">Segun la cantidad de agua destilada y el tiempo de reaccion
                        acumulado es necesario retirar muesta para previa de % acido sulfurico libre?</p>

                    <div class="col-6 mx-auto">
                        <label for="confirmMuestraNecesaria${numeroHoraSeguimSwf}">Si</label>
                        <input type="radio" id="confirmMuestraNecesaria${numeroHoraSeguimSwf}" name="muestraNecesaria${numeroHoraSeguimSwf}" value="1">
                    </div>
                    <div class="col-6 mx-auto">
                        <label for="noMuestraNecesaria${numeroHoraSeguimSwf}">No</label>
                        <input type="radio" id="noMuestraNecesaria${numeroHoraSeguimSwf}" name="muestraNecesaria${numeroHoraSeguimSwf}" value="0">
                    </div>
                      
                </div>

                <div id="divMuestraNecesaria" class="d-none">

                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098"> %sulfúrico libre (7 max): </label>
                            <input type="number" step="0.01" placeholder="" name="resultadoMuestra${numeroHoraSeguimSwf}" />
                        </div>
                    </div>

                    <div id="" class="row mt-3 pt-3">
                        <p class="fs-4 text-center">¿Cumple?</p>
                        <p class="text-danger">Si el valor está superior a 7%, continuar reacción y repetir
                            análisis hasta que se complete la reacción.</p>

                        <div class="col-6 mx-auto">
                            <label>Si<input type="radio" name="muestraCumple${numeroHoraSeguimSwf}" value="1">
                        </div>
                        <div class="col-6 mx-auto">
                            <label>No<input type="radio" name="muestraCumple${numeroHoraSeguimSwf}" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            `);
            return numeroHoraSeguimSwf + 1;
        }
        //alerta sobre fin seguimientos
        else if (numeroHoraSeguimSwf >= 31) {
            alert('El limite de horas (30) ha sido alcanzado');
            return 31
        } 
        //renderiza el seguimiento "sencillo" (solo con temperatura y presion)
        else {
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number" id="temperaturaCargaHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" id="presionCargaHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionCargaHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50"  id="observacionesCargaHora${numeroHoraSeguimSwf}" name="observacionesCargaHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            <hr>`);
            return numeroHoraSeguimSwf + 1;
        };
    },

    renderSeguimientosDestilacion: (nroHoraSeguimDest) => {
        let divSeguimientos = document.getElementById('containerSeguimientosDestilacionTod100');

        if(nroHoraSeguimDest >= 9){
            alert("El limite de horas (8) ha sido alcanzado");
            return 9;
        } else {
            if ((nroHoraSeguimDest == 5) || (nroHoraSeguimDest == 8)) {
                divSeguimientos.insertAdjacentHTML('beforeend', `
                        <div>
                            <div class="row text-center">
                                <p class="fs-2 col-4">Hora ${nroHoraSeguimDest}:</p>
                            </div>
                        
                            <div class="row">
                                <div class="col-4 mx-auto">
                                    <label class="fs4">Temperatura: </label>
                                    <input id="temperaturaDestilacionHora${nroHoraSeguimDest}" type="number" placeholder="°C" name="temperaturaDestilacionHora${nroHoraSeguimDest}"  />
                                </div>
                                <div class="col-4 mx-auto">
                                    <label class="fs4" for="swf098">Presion: </label>
                                    <input id="presionDestilacionHora${nroHoraSeguimDest}" type="number" placeholder="DPI" name="presionDestilacionHora${nroHoraSeguimDest}"  />
                                </div>
                                <div class="col-4 mx-auto">
                                    <label class="fs4" for="swf098">TOD100: </label>
                                    <input id="kgTOD100DestilacionHora${nroHoraSeguimDest}" type="number" placeholder="Kg" name="kgTOD100DestilacionHora${nroHoraSeguimDest}"  />
                                </div>
                            </div>
                        
                            <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                                <p class="fs-4 text-center">¿Vacio?</p>
                                <div class="col-2">
                                    <label>Si <input  type="radio" name="vacioDestilacionHora${nroHoraSeguimDest}" value="1" >
                                </div>
                                <div class="col-2">
                                    <label>No<input  type="radio" name="vacioDestilacionHora${nroHoraSeguimDest}" value="0" >
                                </div>
                            </div>
                        
                            <div class="row">
                                <textarea id="observacionesDestilacionHora${nroHoraSeguimDest}" class="col-4 mx-auto h-50" name="observacionesDestilacionHora${nroHoraSeguimDest}" placeholder="Observaciones:"></textarea>
                            </div>
                        </div>
    
                        <hr>
                `)
                return nroHoraSeguimDest + 1;
            } else {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                        <div>
                            <div class="row text-center">
                                <p class="fs-2 col-4">Hora ${nroHoraSeguimDest}:</p>
                            </div>
                        
                            <div class="row">
                                <div class="col-4 mx-auto">
                                    <label class="fs4">Temperatura: </label>
                                    <input id="temperaturaDestilacionHora${nroHoraSeguimDest}" type="number" placeholder="°C" name="temperaturaDestilacionHora${nroHoraSeguimDest}"  />
                                </div>
                                <div class="col-4 mx-auto">
                                    <label class="fs4" for="swf098">Presion: </label>
                                    <input id="presionDestilacionHora${nroHoraSeguimDest}" type="number" placeholder="DPI" name="presionDestilacionHora${nroHoraSeguimDest}"  />
                                </div>
                            </div>
                        
                            <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                                <p class="fs-4 text-center">¿Vacio?</p>
                                <div class="col-2">
                                    <label>Si <input id="vacioDestilacionHora${nroHoraSeguimDest}" type="radio" name="vacioDestilacionHora${nroHoraSeguimDest}" value="1" >
                                </div>
                                <div class="col-2">
                                    <label>No<input id="vacioDestilacionHora${nroHoraSeguimDest}" type="radio" name="vacioDestilacionHora${nroHoraSeguimDest}" value="0" >
                                </div>
                            </div>
                        
                            <div class="row">
                                <textarea id="observacionesDestilacionHora${nroHoraSeguimDest}" class="col-4 mx-auto h-50" name="observacionesDestilacionHora${nroHoraSeguimDest}" placeholder="Observaciones:"></textarea>
                            </div>
                        </div>
    
                        <hr>
                    `)
                return nroHoraSeguimDest + 1;
            }
        }

    },

    deshabilitarInpPorClase: clase => {
        let inputs = document.querySelectorAll(`.${clase}`);

        inputs.forEach(input => input.disabled = true);
    },

    deshabilitarSegumientoSwf: (nroHora) => {
        let inputs = [
            document.getElementById(`temperaturaCargaHora${nroHora}`),
            document.getElementById(`presionCargaHora${nroHora}`),
            document.getElementById(`observacionesCargaHora${nroHora}`),
            document.getElementById(`kgAguaDestiladaCargaHora${nroHora}`)
        ];

        if(nroHora != 0) {
            inputs.forEach(input =>  {
                if(input != null)input.disabled = true
            });
        }
        
    },

    deshabilitarSegumientoDest: (nroHora) => {
        let inputs = [
            document.getElementById(`temperaturaDestilacionHora${nroHora}`),
            document.getElementById(`presionDestilacionHora${nroHora}`),
            document.getElementById(`kgTOD100DestilacionHora${nroHora}`),
            document.getElementById(`observacionesDestilacionHora${nroHora}`)
        ];

        let inputsVacio = document.querySelectorAll(`input[name="vacioDestilacionHora${nroHora}"]`);

        if(nroHora != 0) {
            inputs.forEach(input =>  {
                if(input != null)input.disabled = true
            });

            inputsVacio.forEach(input =>  input.disabled = true);
        }
    },

    deshabilitarForm: form => {
        let camposFrm = form.querySelectorAll('input, textarea, button');

        camposFrm.forEach((campo) => campo.disabled = true);
    },

    focoSiguienteSeccion: seccion => {
        document.getElementById(seccion).scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });

        setTimeout(() => {
            document.getElementById(seccion).focus();
        }, 1000);
    }
}