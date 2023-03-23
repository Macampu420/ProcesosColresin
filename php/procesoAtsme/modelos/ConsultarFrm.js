let ConsultarFrm = {

    prepararFrm: function (datosProceso) {
        for (let clave in datosProceso) {
            switch (clave) {
                case 'seccion2':
                case 'seccion3':
                case 'seccion4':
                case 'seccion5':
                case 'seccion6':
                case 'seccion7':
                    if (datosProceso[clave] == 1) {
                        document.getElementById(clave).classList.remove('d-none');
                        if(document.getElementById(clave).nextElementSibling) document.getElementById(clave).nextElementSibling.classList.remove('d-none');
                        continue; // Salta a la siguiente iteración
                    }
                    break;
            }
        }
    },

    llenarSeccion1: function(clave, datosProceso) {
        switch (clave) {
            // gestion equipo
            case 'dietrich1':
            case 'escamador':
                if (datosProceso[clave] == 1) document.getElementById(`${clave}`).checked = true;
                break;

            //gestion encabezado
            case 'separacionFp04':
            case 'materiaPrimaSeparada':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            // gestion estado equipo
            case 'reactorLimpio':
            case 'bombaMangueraLineasLimpias':
            case 'hermeticidadReactorOk':
            case 'reactorFuncionaOk':
            case 'sistemaVacioOk':
            case 'sistemaVaporOk':
            case 'sistemaEnfiramientoOk':
            case 'condensadorSinFugas':
            case 'aprobacionInicio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;
        }
    },

    llenarSeccion2: function(clave, datosProceso) {
        switch (clave) {
            case 'fichaLeidaToo':
                document.querySelector(`input[name='fichaLeída'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'equipoSeguridadToo': 
                document.querySelector(`input[name='equipoSeguridad'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'cargaBomba':
            case 'conexionesAcoplesTuberiasOk':
            case 'coloracionTOO':
            case 'cargaConVacio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'bloqueoAjusteVacio':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                if(datosProceso[clave] == 1) document.getElementById('bloqueoAjusteVacio').classList.remove('d-none');
                break;

            case 'inicioCargaTOO000':
            case 'finCargaTOO000':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;
            
            case 'problemaCarga':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                if(datosProceso[clave] == 1) document.getElementById('comentarioProblemaCargaToo').classList.remove('d-none');
                break;

            case 'comentarioProblemaCargaToo':
                document.getElementById('comentarioProblemaCargaToo').value = datosProceso[clave];
                break;

        }
    },

    //llena la seccion 3 sin segs
    llenarSeccion3: function(clave, datosProceso) {
        switch (clave) {
            case 'fichaLeidaSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='fichaLeida'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'equipoSeguridadToo': 
                document.getElementById('frmSeccion3').querySelector(`input[name='equipoSeguridad'][value='${datosProceso[clave]}']`).checked = true;
                break;    
            
            case 'reactorEnfriamientoSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='reactorEnEnfriamiento'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'inicioVaporSwf':
                document.getElementById('frmSeccion3').querySelector(`input[name='inicioVapor'][value='${datosProceso[clave]}']`).checked = true;
                break;
            case 'swf098Transparente':
            case 'equipoEnReflujo':
                document.querySelector(`input[name='${clave}'][value='${datosProceso[clave]}']`).checked = true;
                break;

            case 'inicioCargaSWF098':
            case 'finCargaSWF098':
            case 'finReflujo':
            case 'totalAguaDestilada':
                document.querySelector(`input[name='${clave}']`).value = datosProceso[clave];
                break;
    
            case 'problemaAdicionAcido':
                document.querySelector(`input[name='problemaAdicionAcido'][value='${datosProceso[clave]}']`).checked = true;
                if(datosProceso[clave] == 1) document.getElementById('comentarioProblemaCargaSwf098').classList.remove('d-none');
                break;

            case 'comentarioProblema':
                document.getElementById('frmSeccion3').querySelector('input[name="comentarioProblema"]').value = datosProceso[clave];
                break;
            
            case 'inicioReflujo':    
                document.querySelector(`#confirmInicioReflujo`).checked = true;
                break;


        }
    }

}