const objConsulta = Object.create(ConsultarFrm);;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const NumLote = urlParams.get('NumLote');
lote = NumLote;

fetchDatos = async () => {
    try {
        const responseProceso = await fetch(`./../controladores/registroFrm.php?NumLote=${NumLote}`);
        const jsonProceso = await responseProceso.json();

        const responseSegs = await fetch(`./../controladores/registroFrm.php?muestras=${NumLote}`);
        const jsonSegs = await responseSegs.json();

        for (let clave in jsonProceso[0]) {
            // verifica que el input y su valor existan
            if (jsonProceso[0][clave] != null) {
                objConsulta.prepararFrm(jsonProceso[0]);
                objConsulta.llenarSeccion1(clave, jsonProceso[0]);
                objConsulta.llenarSeccion2(clave, jsonProceso[0]);
                objConsulta.llenarSeccion3(clave, jsonProceso[0]);
                objConsulta.llenarSeccion4(clave, jsonProceso[0]);
                objConsulta.llenarSeccion5(clave, jsonProceso[0]);
                objConsulta.llenarSeccion6(clave, jsonProceso[0]);
                objConsulta.llenarSeccion7(clave, jsonProceso[0]);
            }
        }
        objConsulta.renderSegsSwf(jsonSegs.seguimientos.segsSwf, jsonSegs.seguimientos.muestrasSwf);
        objConsulta.renderSegsDest(jsonSegs.seguimientos.segsDest);
        objConsulta.focoFrm(jsonProceso[0]);

    } catch (error) {
        console.error(error);
    }
}

fetchDatos();
