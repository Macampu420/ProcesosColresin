const objRegistro = Object.create(RegistroForm);;

const btnParte1 = document.getElementById('btnPrimeraParteForm');

btnParte1.addEventListener('click', event => {

    event.preventDefault();

    let aprobacionInicio = document.querySelector('input[name="aprobacionInicio"]:checked');

    if (aprobacionInicio == null || aprobacionInicio.value == false) {
        alert('Debes aprobar el inicio del proceso para continuar');
    } else {

        let swContinuar = true;
        let separacionFp04 = document.querySelector('input[name="separacionFp04"]:checked'),
            materiaPrimaSeparada = document.querySelector('input[name="materiaPrimaSeparada"]:checked'),
            reactorLimpio = document.querySelector('input[name="reactorLimpio"]:checked'),
            bombaMangueraLineasLimpias = document.querySelector('input[name="bombaMangueraLineasLimpias"]:checked'),
            hermeticidadReactorOk = document.querySelector('input[name="hermeticidadReactorOk"]:checked'),
            reactorFuncionaOk = document.querySelector('input[name="reactorFuncionaOk"]:checked'),
            sistemaVacioOk = document.querySelector('input[name="sistemaVacioOk"]:checked'),
            sistemaVaporOk = document.querySelector('input[name="sistemaVaporOk"]:checked'),
            sistemaEnfiramientoOk = document.querySelector('input[name="sistemaEnfiramientoOk"]:checked'),
            condensadorSinFugas = document.querySelector('input[name="condensadorSinFugas"]:checked');


        let datosPrimeraParte = {
            proceso: {
                lote: document.getElementById('lote').value,
                dietrich1: document.getElementById('dietrich1').checked == true ? 1 : 0,
                escamador: document.getElementById('escamador').checked == true ? 1 : 0,
            },
            materiaPrima: {
                TOO00: document.getElementById('TOO00').value,
                TORECO: document.getElementById('TORECO').value,
                SWF098: document.getElementById('SWF098').value,
                STW000: document.getElementById('STW000').value,
                SSO000: document.getElementById('SSO000').value,
                GLG000: document.getElementById('GLG000').value,
            },
            formulacionBodega: {
                separacionFp04: separacionFp04 != null ? separacionFp04.value : '',
                materiaPrimaSeparada: materiaPrimaSeparada != null ? materiaPrimaSeparada.value : '',
            },
            estadoEquipo: {
                reactorLimpio: reactorLimpio != null ? reactorLimpio.value : '',
                bombaMangueraLineasLimpias: bombaMangueraLineasLimpias != null ? bombaMangueraLineasLimpias.value : '',
                hermeticidadReactorOk: hermeticidadReactorOk != null ? hermeticidadReactorOk.value : '',
                reactorFuncionaOk: reactorFuncionaOk != null ? reactorFuncionaOk.value : '',
                sistemaVacioOk: sistemaVacioOk != null ? sistemaVacioOk.value : '',
                sistemaVaporOk: sistemaVaporOk != null ? sistemaVaporOk.value : '',
                sistemaEnfiramientoOk: sistemaEnfiramientoOk != null ? sistemaEnfiramientoOk.value : '',
                condensadorSinFugas: condensadorSinFugas != null ? condensadorSinFugas.value : '',
            },
            aprobacionInicio: document.querySelector('input[name="aprobacionInicio"]:checked').value
        }

        //valida que se hayan checkeado los inp de formulacionBodega para prender o apagar el sw
        for (let propiedad in datosPrimeraParte.formulacionBodega) {
            if (datosPrimeraParte.formulacionBodega[propiedad] == '') {
                swContinuar = false;
                break
            } else {
                swContinuar = true;
            }
        }

        //valida que se hayan checkeado los inp de estadoEquipo para prender o apagar el sw
        for (let propiedad in datosPrimeraParte.estadoEquipo) {
            if (datosPrimeraParte.estadoEquipo[propiedad] == '') {
                swContinuar = false;
                break
            } else {
                swContinuar = true;
            }
        }

        //envia la primera parte del registro si todos los inp están chequeados, sino pide que se registren
        swContinuar ? objRegistro.enviarPrimeraParte(event, datosPrimeraParte) : alert("No puedes dejar campos vacios");

    }
});