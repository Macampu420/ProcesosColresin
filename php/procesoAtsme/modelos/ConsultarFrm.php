<?php
class ConsultarFrm{

    private $conexion; // objeto mysqli que representa la conexión a la base de datos
    private $stmtTraerProceso;

    public function __construct($host, $usuario, $contraseña, $bd) {
        // Crear objeto mysqli para conectar con la base de datos
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);
    }

    function consultarProceso($numLote){

        $this->stmtTraerProceso = $this->conexion->prepare("SELECT * FROM `vistaprocesoatsme` WHERE NumLote = ?");
        $this->stmtTraerProceso->bind_param('s', $numLote);
        $this->stmtTraerProceso->execute();

        $resultado = $this->stmtTraerProceso->get_result();

        if($resultado->num_rows > 0){
            $arrayAsoccResultados = $resultado->fetch_all(MYSQLI_ASSOC);

            $jsonResultados = json_encode($arrayAsoccResultados);
    
            $this->stmtTraerProceso->close();
    
            echo $jsonResultados;    
        } else{
            echo json_encode(array('mensaje' => 'No hay procesos con ese lote'));
        }

    }

}
?>