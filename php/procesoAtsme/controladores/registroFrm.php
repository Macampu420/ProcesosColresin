<?php

require_once './../modelos/RegistroFrm.php';

$objRegistro = new RegistroFrm('localhost', 'root', '', 'altmannc_procesos');

$idRegistro = $objRegistro->registroSeccion1($_POST);

echo $idRegistro;

?>