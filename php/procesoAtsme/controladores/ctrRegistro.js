const objRegistro = Object.create(RegistroForm);;

const frmPartarte1 = document.getElementById('frmSeccion1');
const frmPartarte2 = document.getElementById('frmSeccion2');
const frmPartarte3 = document.getElementById('frmSeccion3');
const frmPartarte4 = document.getElementById('frmSeccion4');
const frmPartarte5 = document.getElementById('frmSeccion5');
const frmPartarte6 = document.getElementById('frmSeccion6');
const frmPartarte7 = document.getElementById('frmSeccion7');

// objRegistro.construirNuevoFormulario();

frmPartarte1.addEventListener('submit', event => {

    event.preventDefault();

    if (!document.getElementById('aprobacionInicio').checked) {
        alert("Debes aprobar el inicio del proceso para continuar");
        return
    };

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion2').classList.remove('d-none');

    document.getElementById('fichaLeidaFrm2').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('fichaLeidaFrm2').focus();
    }, 1000);
});

frmPartarte2.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion3').classList.remove('d-none');

    document.getElementById('fichaLeidaFrm3').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('fichaLeidaFrm3').focus();
    }, 1000);
});

frmPartarte3.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion4').classList.remove('d-none');

    document.getElementById('confirmInicioDestilacion').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('confirmInicioDestilacion').focus();
    }, 1000);
});

frmPartarte4.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion5').classList.remove('d-none');

    document.getElementById('fichaLeidaFrm5').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('fichaLeidaFrm5').focus();
    }, 1000);
});

frmPartarte5.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion6').classList.remove('d-none');

    document.getElementById('cargoTod100').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('cargoTod100').focus();
    }, 1000);
});

frmPartarte6.addEventListener('submit', event => {

    event.preventDefault();

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion7').classList.remove('d-none');

    document.getElementById('inicioEnjuague').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
    setTimeout(() => {
        document.getElementById('inicioEnjuague').focus();
    }, 1000);
});

frmPartarte7.addEventListener('submit', event => {

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

document.getElementById('divInicioReflujo').addEventListener('input', event => {

    objRegistro.renderSegumientosReflujo();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerReflujo");
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerMuestra");

})

document.getElementById('containerMuestra').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "confirmMuestraNecesaria", "divMuestraNecesaria");

})

document.getElementById('containerDestilacion').addEventListener('input', event => {

    objRegistro.renderSeguimientosDestilacion();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioDestilacion", "containerSeguimientoDestilado");

})