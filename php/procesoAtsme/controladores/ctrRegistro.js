const objRegistro = Object.create(RegistroForm);;

const frmPartarte1 = document.getElementById('frmSeccion1');

objRegistro.construirNuevoFormulario();

frmPartarte1.addEventListener('submit', event => {

    event.preventDefault();

    if(!document.getElementById('aprobacionInicio').checked){
        alert("Debes aprobar el inicio del proceso para continuar");
        return
    };

    let datosParte1 = new FormData(frmPartarte1);

    // aca iria la peticion

    document.getElementById('seccion2').classList.remove('d-none');

    document.getElementById('fichaLeidaFrm2').scrollIntoView({behavior: 'smooth', block:'center'});
    setTimeout(() => {
        document.getElementById('fichaLeidaFrm2').focus();
    }, 1000);
});

document.getElementById('cargaConVacioToo000').addEventListener('input', event => {

});