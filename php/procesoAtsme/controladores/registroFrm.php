<?php

    require_once './../modelos/RegistroFrm.php';
    require_once './../modelos/Consultarfrm.php';

    // El array $_POST existe y tiene la posicion seccion, procesa los datos del formulario
    if (isset($_POST['seccion'])) {

        $objRegistro = new RegistroFrm('localhost', 'root', '', 'altmannc_procesos');

        switch ($_POST['seccion']) {
            case 1:
                $resultadoRegistroSeccion1 = $objRegistro -> registroSeccion1($_POST);
                if ($resultadoRegistroSeccion1 == true) {
                    echo "Registro seccion 1 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro encabezado erroneo 500 ";
                    http_response_code(500);
                }
                break;
            case 2:
                if($objRegistro->registroSeccion2($_POST)){
                    echo "Registro seccion 2 realizado con exito";
                http_response_code(200);
                } else {
                    echo "Registro seccion 2erroneo 500 ";
                    http_response_code(500); 
                }
                break;
            case 3:
                if($objRegistro->registrarSeccion3($_POST)){
                    echo "Registro seccion 3 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro seccion 3 erroneo 500 ";
                    http_response_code(500);
                }
                break;
            case 4:
                if($objRegistro->registrarSeccion4($_POST)){
                    echo "Registro seccion 4 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro seccion 4 erroneo 500 ";
                    http_response_code(500);
                }
                break;
            case 5:
                if($objRegistro->registroSeccion5($_POST)){
                    echo "Registro seccion 5 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro seccion 5 erroneo 500 ";
                    http_response_code(500);
                }
                break;
            case 6:
                if($objRegistro->registrarSeccion6($_POST)){
                    echo "Registro seccion 6 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro seccion 6 erroneo 500 ";
                    http_response_code(500);
                }
                break;
            case 7:
                if($objRegistro->registrarSeccion7($_POST)){
                    echo "Registro seccion 7 realizado con exito";
                    http_response_code(200);
                } else {
                    echo "Registro seccion 7 erroneo 500 ";
                    http_response_code(500);
                }
        }
    }

    //El array $_GET recibio el parametro numLote entonces se abre sirve la info del frm iniciado
    if(isset($_GET['NumLote'])){
        $objConsultar = new ConsultarFrm('localhost', 'root', '', 'altmannc_procesos');

        $objConsultar->consultarProceso($_GET['NumLote']);
    }

    if(isset($_GET['muestras'])){
        $objConsultar = new ConsultarFrm('localhost', 'root', '', 'altmannc_procesos');
        $segs = $objConsultar->consultarSeguimientos($_GET['muestras']);
        if($segs != null){
            echo $segs;
            http_response_code(200);
        } else {
            echo json_encode(array('error' => 'error en la consulta'));
            http_response_code(500);
        }
    }

    //El array $_GET recibio el parametro eliminarNumLote entonces se actualiza el estado a eliminado
    if(isset($_GET['eliminarNumLote'])){
        $objRegistro = new RegistroFrm('localhost', 'root', '', 'altmannc_procesos');

        var_dump($objRegistro->eliminarProceso($_GET['eliminarNumLote']));
    }

?>