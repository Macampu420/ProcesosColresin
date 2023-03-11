const objRegistro = Object.create(RegistroForm);;

const frmParte1 = document.getElementById('frmSeccion1');
const frmParte2 = document.getElementById('frmSeccion2');
const frmParte3 = document.getElementById('frmSeccion3');
const frmParte4 = document.getElementById('frmSeccion4');
const frmParte5 = document.getElementById('frmSeccion5');
const frmParte6 = document.getElementById('frmSeccion6');
const frmParte7 = document.getElementById('frmSeccion7');

// objRegistro.construirNuevoFormulario();

frmParte1.addEventListener('submit', event => {

    event.preventDefault();

    if (!document.getElementById('aprobacionInicio').checked) {
        alert("Debes aprobar el inicio del proceso para continuar");
        return
    };

    let datosParte1 = new FormData(frmParte1);

    // aca iria la peticion

    document.getElementById('seccion2').classList.remove('d-none');

    objRegistro.focoSiguienteSeccion('fichaLeidaFrm2');   

    objRegistro.deshabilitarForm(frmParte1);
});

frmParte2.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmParte1);

    // aca iria la peticion

    document.getElementById('seccion3').classList.remove('d-none');

    objRegistro.focoSiguienteSeccion('fichaLeidaFrm3');   
    
    objRegistro.deshabilitarForm(frmParte2);
});

// frmParte3.addEventListener('submit', event => {

//     event.preventDefault();

//     console.log("parte 4 sigue");

//     let datosParte1 = new FormData(frmParte1);

//     // aca iria la peticion

//     document.getElementById('seccion4').classList.remove('d-none');

//     objRegistro.deshabilitarForm(frmParte1);

//     objRegistro.focoSiguienteSeccion('confirmInicioDestilacion');   
// });

frmParte4.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmParte1);

    // aca iria la peticion

    document.getElementById('seccion5').classList.remove('d-none');

    objRegistro.deshabilitarForm(frmParte4);
    objRegistro.focoSiguienteSeccion('fichaLeidaFrm5');   
});

frmParte5.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmParte1);

    // aca iria la peticion

    document.getElementById('seccion6').classList.remove('d-none');

    objRegistro.deshabilitarForm(frmParte);

    objRegistro.focoSiguienteSeccion('cargoTod100');  
});

frmParte6.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmParte1);

    // aca iria la peticion

    document.getElementById('seccion7').classList.remove('d-none');

    objRegistro.deshabilitarForm(frmParte6);
    objRegistro.focoSiguienteSeccion('inicioEnjuague');   

});

frmParte7.addEventListener('submit', event => {

    event.preventDefault();

    alert("creo que todo bn jaja")
    
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

// document.getElementById('divInicioReflujo').addEventListener('input', event => {

//     objRegistro.renderSegumientosReflujo();
//     objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerReflujo");
//     objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerSeguimientosSWF098");
//     objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerInicioReflujo");
//     objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerFinReflujo");
//     objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerMuestra");

// })

document.getElementById('confirmContainerMuestra').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "confirmMuestraNecesaria", "divMuestraNecesaria");
})

document.getElementById('containerDestilacion').addEventListener('input', event => {

    objRegistro.renderSeguimientosDestilacion();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioDestilacion", "containerSeguimientoDestilado");

})