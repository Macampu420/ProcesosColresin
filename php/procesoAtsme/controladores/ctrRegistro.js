const objRegistro = Object.create(RegistroForm);;

const frmPartarte1 = document.getElementById('frmSeccion1');

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

document.getElementById('cargaConVacio').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "cargaConVacioToo000", "bloqueoAjusteVacio");

});

document.getElementById('problemaCargaToo100').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "siProblemaCargaToo100", "comentarioProblemaCargaToo");

});

document.getElementById('problemaCargaSwf098').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "siProblemaCargaSwf098", "comentarioProblemaCargaSwf098");

})

document.getElementById('divInicioReflujo').addEventListener('input', event => {

    objRegistro.renderSegumientosReflujo();
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerReflujo");
    objRegistro.mostrarOcultarElemento(event, "confirmInicioReflujo", "containerMuestra");

})

document.getElementById('containerMuestra').addEventListener('input', event => {

    objRegistro.mostrarOcultarElemento(event, "confirmMuestraNecesaria", "divMuestraNecesaria");

})