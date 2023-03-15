const objRegistro = Object.create(RegistroForm);;

const frmParte1 = document.getElementById('frmSeccion1');
const frmParte2 = document.getElementById('frmSeccion2');
const frmParte3 = document.getElementById('frmSeccion3');
const frmParte4 = document.getElementById('frmSeccion4');
const frmParte5 = document.getElementById('frmSeccion5');
const frmParte6 = document.getElementById('frmSeccion6');
const frmParte7 = document.getElementById('frmSeccion7');
let lote;
let swReflujo = 1;

//objRegistro.construirNuevoFormulario();

frmParte1.addEventListener('submit', event => {

    event.preventDefault();

    if (!document.getElementById('aprobacionInicio').checked) {
        alert("Debes aprobar el inicio del proceso para continuar");
        return
    };

    let datosParte1 = new FormData(frmParte1);
    lote = document.getElementById("lote").value;
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

            document.getElementById('seccion2').classList.remove('d-none');

            objRegistro.focoSiguienteSeccion('fichaLeidaFrm2');

            // objRegistro.deshabilitarForm(frmParte1);

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));

});

frmParte2.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte2 = new FormData(frmParte2);
    datosParte2.append('lote', lote);
    datosParte2.append('seccion', 2);

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
        .then(data => {
            document.getElementById('seccion3').classList.remove('d-none');

            objRegistro.focoSiguienteSeccion('fichaLeidaFrm3');

            objRegistro.deshabilitarForm(frmParte2);

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte3.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte3 = new FormData(frmParte3);
    let arraySeguimientos = [];

    //se capturan los datos de los seguimientos y segun el numero del segumiento se empuja en el array
    for (let i = 1; i < 11; i++) {
        let auxTemp = document.getElementById(`temperaturaDestilacionHora${i}`).value;
        let auxPres = document.getElementById(`presionDestilacionHora${i}`).value;
        let auxObs = document.getElementById(`observacionesDestilacionHora${i}`).value;

        if ((i == 3) || (i == 5) || (i == 9)) {
            let auxAguaDest = document.getElementById(`kgAguaDestiladaDestilacionHora${i}`).value;
            arraySeguimientos.push({
                auxTemp,
                auxPres,
                auxObs,
                auxAguaDest
            })
        } else {
            arraySeguimientos.push({
                auxTemp,
                auxPres,
                auxObs,
            })
        }
    }

    //se agregan propiedades necesarias
    datosParte3.append('seccion', 3);
    datosParte3.append('lote', lote);
    datosParte3.append('swReflujo', swReflujo);

    //se agregan los valores de los inputs al formdata
    for (let i = 0; i < arraySeguimientos.length; i++) {
        datosParte3.append('arraySeguimientos[]', JSON.stringify(arraySeguimientos[i]));
    }

    fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte3
        }).then(response => {
            // if (response.status === 200) {
                return response.text();
            // } else {
            //     throw new Error('La respuesta de la API no fue exitosa');
            // }
        })
        .then(response => {

            console.log(response);

            // swReflujo = 0;
            document.getElementById('seccion4').classList.remove('d-none');
            // objRegistro.deshabilitarForm(frmParte3);
            objRegistro.focoSiguienteSeccion('confirmInicioDestilacion');

        }).catch(err => console.log(err), swReflujo = 1, alert("ocurrió un error en el registro, por favor intentalo mas tarde"));

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
    datosParte5.append('lote', lote);
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

            document.getElementById('seccion6').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte5);
            objRegistro.focoSiguienteSeccion('cargoTod100');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte6.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte6 = new FormData(frmParte6);
    datosParte6.append('lote', lote);
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

            document.getElementById('seccion7').classList.remove('d-none');
            objRegistro.deshabilitarForm(frmParte6);
            objRegistro.focoSiguienteSeccion('inicioEnjuague');

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
});

frmParte7.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte7 = new FormData(frmParte7);
    datosParte7.append('lote', lote);
    datosParte7.append('seccion', 7);

    let confirmFin = confirm("El enviar el formulario el proceso se dará por terminado");

    if(confirmFin){
        fetch('./../controladores/registroFrm.php', {
            method: 'POST',
            body: datosParte7
        }).then(response => {
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error('error servidor registro seccion 7');
            }
        })
        .then(response => {

            objRegistro.deshabilitarForm(frmParte7);

            alert("El proceso de registro de fabricacion de 800ATSME0 ha finalizado")

        }).catch(err => alert("ocurrió un error en el registro, por favor intentalo mas tarde"));
    }
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