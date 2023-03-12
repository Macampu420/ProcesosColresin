<?php

require_once './../modelos/RegistroFrm.php';

if (isset($_POST)) {
    // El array $_POST existe, procesa los datos del formulario

    $objRegistro = new RegistroFrm('localhost', 'root', '', 'altmannc_procesos');

    switch ($_POST['seccion']) {
        case 1:
            $idRegistro = $objRegistro -> registroSeccion1($_POST);
            if (isset($idRegistro)) {
                echo $idRegistro;
                http_response_code(200);
            } else {
                echo "-1 seccion 1";
                http_response_code(500);
            }
            break;
        case 2:
            if($objRegistro->registroSeccion2($_POST)){
              echo 1;
              http_response_code(200);
            } else {
                echo "-1 seccion 2";
                http_response_code(500); 
            }
            break;
        case 5:
            if($objRegistro->registroSeccion5($_POST)){
                echo 1;
                http_response_code(200);
            } else {
                echo "-1 seccion 5";
                http_response_code(500);
            }
            break;
        case 6:
            if($objRegistro->registrarSeccion6($_POST)){
                echo 1;
                http_response_code(200);
            } else {
                echo "-1 seccion 6";
                http_response_code(500);
            }
            break;
        case 7:
            if($objRegistro->registrarSeccion7($_POST)){
                echo 1;
                http_response_code(200);
            } else {
                echo "-1 seccion 7";
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