let RegistroForm = {
    //metodo que envia la primera parte del formulario al servidor
    enviarPrimeraParte: (event, datosPrimeraParte) => {
        fetch('./registroFrm.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
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

    renderSegumientosReflujo: () => {
        
        let divSeguimientos = document.getElementById('containerSeguimientosSWF098');

        if(divSeguimientos.childElementCount == 0){
            for (let i = 1; i < 31; i++) {
            
                if((i == 10) || (i == 20) || (i == 30)){
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                    <div>
                        <div class="row text-center">
                            <p class="fs-2 col-4">Hora ${i}:</p>
                        </div>
                    
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Temperatura: </label>
                                <input required type="number" id="TOO00DestilacionHora${i}" placeholder="°C" name="temperaturaDestilacionHora${i}" required />
                            </div>
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Presion: </label>
                                <input required type="number" id="TORECODestilacionHora${i}" placeholder="DPI" name="presionDestilacionHora${i}" required />
                            </div>
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Agua Destilada: </label>
                                <input required type="number" id="SWF098DestilacionHora${i}" placeholder="Kg" name="kgAguaDestiladaDestilacionHora${i}" required />
                            </div>
                        </div>
                        <div class="row">
                            <textarea class="col-4 mx-auto h-50" name="observacionesDestilacionHora${i}" placeholder="Observaciones:"></textarea>
                        </div>
                    </div>
                    <hr>
                    `)
                } else {
                    divSeguimientos.insertAdjacentHTML('beforeend', `
                    <div>
                        <div class="row text-center">
                            <p class="fs-2 col-4">Hora ${i}:</p>
                        </div>
                    
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Temperatura: </label>
                                <input required type="number" id="TOO00DestilacionHora${i}" placeholder="°C" name="temperaturaDestilacionHora${i}" required />
                            </div>
                            <div class="col-4 mx-auto">
                                <label class="fs4" for="swf098">Presion: </label>
                                <input required type="number" id="TORECODestilacionHora${i}" placeholder="DPI" name="presionDestilacionHora${i}" required />
                            </div>
                        </div>
                        <div class="row">
                            <textarea class="col-4 mx-auto h-50" name="observacionesDestilacionHora${i}" placeholder="Observaciones:"></textarea>
                        </div>
                    </div>
                    <hr>
                `)
                }
                
            }
        }

    }
}