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

        if (numeroHoraSeguimSwf == 2) {
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number"value="${numeroHoraSeguimSwf}" id="temperaturaDestilacionHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" value="${numeroHoraSeguimSwf}"id="presionDestilacionHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50" value="${numeroHoraSeguimSwf}" id="observacionesDestilacionHora${numeroHoraSeguimSwf}" name="observacionesDestilacionHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            <hr>`);
            return numeroHoraSeguimSwf + 1;
        } else if ((numeroHoraSeguimSwf == 3) || (numeroHoraSeguimSwf == 5) || (numeroHoraSeguimSwf == 9)) {
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number"value="${numeroHoraSeguimSwf}" id="temperaturaDestilacionHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" value="${numeroHoraSeguimSwf}"id="presionDestilacionHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Agua Destilada: </label>
                        <input required type="number" value="${numeroHoraSeguimSwf}"id="kgAguaDestiladaDestilacionHora${numeroHoraSeguimSwf}" placeholder="Kg" name="kgAguaDestiladaDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50" value="${numeroHoraSeguimSwf}" id="observacionesDestilacionHora${numeroHoraSeguimSwf}" name="observacionesDestilacionHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            <hr>`);
            return numeroHoraSeguimSwf + 1;
        } else if (numeroHoraSeguimSwf >= 11) {
            alert('El limite de horas (10) ha sido alcanzado');
            return 11
        } else {
            divSeguimientos.insertAdjacentHTML('beforeend', `
            <div>
                <div class="row text-center">
                    <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                </div>
            
                <div class="row">
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Temperatura: </label>
                        <input required type="number"value="${numeroHoraSeguimSwf}" id="temperaturaDestilacionHora${numeroHoraSeguimSwf}" placeholder="°C" name="temperaturaDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                    <div class="col-4 mx-auto">
                        <label class="fs4" for="swf098">Presion: </label>
                        <input required type="number" value="${numeroHoraSeguimSwf}"id="presionDestilacionHora${numeroHoraSeguimSwf}" placeholder="DPI" name="presionDestilacionHora${numeroHoraSeguimSwf}"  />
                    </div>
                </div>
                <div class="row">
                    <textarea class="col-4 mx-auto h-50" value="${numeroHoraSeguimSwf}" id="observacionesDestilacionHora${numeroHoraSeguimSwf}" name="observacionesDestilacionHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                </div>
            </div>
            <hr>`);
            return numeroHoraSeguimSwf + 1;
        };
    },

    renderSeguimientosDestilacion: () => {
        let divSeguimientos = document.getElementById('containerSeguimientosDestilacionTod3');

        if (divSeguimientos.childElementCount == 0) {
            for (let i = 1; i < 9; i++) {

                if ((i == 5) || (i == 8)) {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                        <div>
                            <div class="row text-center">
                                <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                            </div>
                        
                            <div class="row">
                                <div class="col-4 mx-auto">
                                    <label class="fs4">Temperatura: </label>
                                    <input type="number" placeholder="°C" name="temperaturaDestilacionHora${numeroHoraSeguimSwf}"  />
                                </div>
                                <div class="col-4 mx-auto">
                                    <label class="fs4" for="swf098">Presion: </label>
                                    <input type="number" placeholder="DPI" name="presionDestilacionHora${numeroHoraSeguimSwf}"  />
                                </div>
                                <div class="col-4 mx-auto">
                                    <label class="fs4" for="swf098">TOD100: </label>
                                    <input type="number" placeholder="Kg" name="kgTOD100DestilacionHora${numeroHoraSeguimSwf}"  />
                                </div>
                            </div>
                        
                            <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                                <p class="fs-4 text-center">¿Vacio?</p>
                                <div class="col-2">
                                    <label>Si <input type="radio" name="vacioDestilacionHora${numeroHoraSeguimSwf}" value="1" >
                                </div>
                                <div class="col-2">
                                    <label>No<input type="radio" name="vacioDestilacionHora${numeroHoraSeguimSwf}" value="0" >
                                </div>
                            </div>
                        
                            <div class="row">
                                <textarea class="col-4 mx-auto h-50" name="observacionesDestilacionHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                            </div>
                        </div>

                        <hr>
                `)
                } else {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                
                <div>
                    <div class="row text-center">
                        <p class="fs-2 col-4">Hora ${numeroHoraSeguimSwf}:</p>
                    </div>
                
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <label class="fs4">Temperatura: </label>
                            <input type="number" placeholder="°C" name="temperaturaDestilacionHora${numeroHoraSeguimSwf}"  />
                        </div>
                        <div class="col-4 mx-auto">
                            <label class="fs4" for="swf098">Presion: </label>
                            <input type="number" placeholder="DPI" name="presionDestilacionHora${numeroHoraSeguimSwf}"  />
                        </div>
                    </div>
                
                    <div class="row mt-3 pt-3 d-flex justify-content-center mb-3">
                        <p class="fs-4 text-center">¿Vacio?</p>
                        <div class="col-2">
                            <label>Si <input type="radio" name="vacioDestilacionHora${numeroHoraSeguimSwf}" value="1" >
                        </div>
                        <div class="col-2">
                            <label>No<input type="radio" name="vacioDestilacionHora${numeroHoraSeguimSwf}" value="0" >
                        </div>
                    </div>
                
                    <div class="row">
                        <textarea class="col-4 mx-auto h-50" name="observacionesDestilacionHora${numeroHoraSeguimSwf}" placeholder="Observaciones:"></textarea>
                    </div>
                </div>

                <hr>

                `)
                }
            }
        }

    },

    deshabilitarForm: form => {
        let camposFrm = form.querySelectorAll('input, textarea, button');

        camposFrm.forEach((campo) => {
            campo.disabled = true;
        });
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