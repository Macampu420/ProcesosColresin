<?php

require_once './../modelos/RegistroFrm.php';

if (isset($_POST)) {
    // El array $_POST existe, procesa los datos del formulario

    $objRegistro = new RegistroFrm('localhost', 'root', '', 'altmannc_procesos');

    switch ($_POST['seccion']) {
        case '1':
            $idRegistro = $objRegistro -> registroSeccion1($_POST);

            if (isset($idRegistro)) {
                echo $idRegistro;
                http_response_code(200);
            } else {
                http_response_code(500);
            }
            break;
        case '2':
    }
  
    // Envía una respuesta con código de estado 200 (OK)
  } else {
    // El array $_POST no existe, envía una respuesta con código de estado 400 (solicitud incorrecta)
    http_response_code(400);
    echo "Error: No se recibieron datos del formulario.";
  }


var_dump($_POST);

?>