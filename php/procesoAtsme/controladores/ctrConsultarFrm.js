const objConsulta = Object.create(ConsultarFrm);;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const NumLote = urlParams.get('NumLote');

fetch(`./../controladores/registroFrm.php?NumLote=${NumLote}`)
.then(response => response.json())
.then((datosProceso) => {

    for(let clave in datosProceso[0]) {
        // verifica que el input y su valor existan
        if(datosProceso[0][clave] != null){
            
            // document.getElementById(`${clave}`).value = datosProceso[0][clave];
            objConsulta.prepararFrm(datosProceso[0]);
            objConsulta.llenarSeccion1(clave, datosProceso[0]);
            objConsulta.llenarSeccion2(clave, datosProceso[0]);
            objConsulta.llenarSeccion3(clave, datosProceso[0]);
            objConsulta.llenarSeccion4(clave, datosProceso[0]);
            objConsulta.llenarSeccion5(clave, datosProceso[0]);
            objConsulta.llenarSeccion6(clave, datosProceso[0]);
            objConsulta.llenarSeccion7(clave, datosProceso[0]);

        }
    }

    console.log(datosProceso);
})