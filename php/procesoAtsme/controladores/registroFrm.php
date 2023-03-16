<?php

require_once './../modelos/RegistroFrm.php';

if (isset($_POST)) {
    // El array $_POST existe, procesa los datos del formulario

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
            $objRegistro->registrarSeccion3($_POST);
            http_response_code(200);
            break;
        case 4:
            // var_dump($_POST);
            $objRegistro->registrarSeccion4($_POST);
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
  
    // Envía una respuesta con código de estado 200 (OK)
  } else {
    // El array $_POST no existe, envía una respuesta con código de estado 400 (solicitud incorrecta)
    http_response_code(400);
    echo "Error: No se recibieron datos del formulario.";
  }
?>