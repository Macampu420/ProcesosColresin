const objRegistro = Object.create(RegistroForm);;

const frmParte1 = document.getElementById('frmSeccion1');
const frmParte2 = document.getElementById('frmSeccion2');
const frmParte3 = document.getElementById('frmSeccion3');
const frmParte4 = document.getElementById('frmSeccion4');
const frmParte5 = document.getElementById('frmSeccion5');
const frmParte6 = document.getElementById('frmSeccion6');
const frmParte7 = document.getElementById('frmSeccion7');
let idProceso;

objRegistro.construirNuevoFormulario();

frmParte1.addEventListener('submit', event => {

    event.preventDefault();

    if (!document.getElementById('aprobacionInicio').checked) {
        alert("Debes aprobar el inicio del proceso para continuar");
        return
    };

    let datosParte1 = new FormData(frmParte1);
    datosParte1.append('seccion', 1);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte1
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(data => {
            idProceso = data;

            document.getElementById('seccion2').classList.remove('d-none');

            objRegistro.focoSiguienteSeccion('fichaLeidaFrm2');

            // objRegistro.deshabilitarForm(frmParte1);

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));

});

frmParte2.addEventListener('submit', event => {

    event.preventDefault();

    frmParte2.idProceso = idProceso;
    let datosParte2 = new FormData(frmParte2);
    datosParte2.append('idProceso', idProceso);
    datosParte2.append('seccion', 2);

    console.log(datosParte2);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte2
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {
            document.getElementById('seccion3').classList.remove('d-none');

            objRegistro.focoSiguienteSeccion('fichaLeidaFrm3');

            objRegistro.deshabilitarForm(frmParte2);

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte3.addEventListener('submit', event => {

    event.preventDefault();

    console.log("parte 4 sigue");

    let datosParte3 = new FormData(frmParte3);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte3
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {

            document.getElementById('seccion4').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte3);
            objRegistro.focoSiguienteSeccion('confirmInicioDestilacion');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));

});

frmParte4.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte4 = new FormData(frmParte4);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte4
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {

            document.getElementById('seccion5').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte4);
            objRegistro.focoSiguienteSeccion('fichaLeidaFrm5');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte5.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte5 = new FormData(frmParte5);
    datosParte5.append('idProceso', idProceso);
    datosParte5.append('seccion', 5);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte5
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {
            console.log(response);

            document.getElementById('seccion6').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte5);
            objRegistro.focoSiguienteSeccion('cargoTod100');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte6.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte6 = new FormData(frmParte6);
    datosParte6.append('idProceso', idProceso);
    datosParte6.append('seccion', 6);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte6
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {
            console.log(response);

            document.getElementById('seccion7').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte6);
            objRegistro.focoSiguienteSeccion('inicioEnjuague');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte7.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte7 = new FormData(frmParte7);
    datosParte7.append('idProceso', idProceso);
    datosParte7.append('seccion', 7);

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte7
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('La respuesta de la API no fue exitosa');
            }
        })
        .then(response => {

            objRegistro.deshabilitarForm(frmParte7);
            alert("creo que todo bn jaja")
            
        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

document.getElementById('cargaConVacio').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "cargaConVacioToo000", "bloqueoAjusteVacio");

});

document.getElementById('problemaCargaToo100').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "siProblemaCargaToo100", "comentarioProblemaCargaToo");

});

document.getElementById('problemaCargaSwf098').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "siProblemaCargaSwf098", "comentarioProblemaCargaSwf098");

})

document.getElementById('containerProblemaEscamado').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "confirmProblemaEscamado", "problemaEscamado");

})

document.getElementById('divInicioReflujo').addEventListener('input', event => {

    objRegistro.renderSegumientosReflujo();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerReflujo");
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerMuestra");

})

document.getElementById('confirmContainerMuestra').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "confirmMuestraNecesaria", "divMuestraNecesaria");
})

document.getElementById('containerDestilacion').addEventListener('input', event => {

    objRegistro.renderSeguimientosDestilacion();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioDestilacion", "containerSeguimientoDestilado");

})