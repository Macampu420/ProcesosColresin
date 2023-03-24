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

        $resultadoProceso = $this->stmtTraerProceso->get_result();

        if($resultadoProceso->num_rows > 0){
            $arrayAsoccResultados = $resultadoProceso->fetch_all(MYSQLI_ASSOC);
            $seguimientos = array();

            $arrayAsoccResultados["seguimientos"] = $seguimientos;        

            $jsonResultados = json_encode($arrayAsoccResultados);
    
            $this->stmtTraerProceso->close();
            echo $jsonResultados;    
        } else{
            echo json_encode(array('mensaje' => 'No hay procesos con ese lote'));
        }

    }

    function consultarSeguimientos($numLote){
        $this->stmtTraerMuestrasSwf = $this->conexion->prepare("SELECT `nroHora`,`muestraNecesaria`,`resultadoMuestra`,`muestraCumple` FROM `tbl_muestra_segs_swf` WHERE `NumLote` = ?");
        $this->stmtTraerSegsSwf = $this->conexion->prepare("SELECT `nroHoraSeguimiento`,`temperatura`,`presion`,`kgAguaDestilada`,`observaciones` FROM `tbl_seguimiento_cargaswf098` WHERE `NumLote` = ?");
        $this->stmtTraerSegsDest = $this->conexion->prepare("SELECT `nroHoraSeguimiento`,`temperatura`,`presion`,`vacio`,`kgTOD100`,`observaciones` FROM `tbl_seguimiento_desttod100` WHERE `NumLote` =?");
            
        $this->stmtTraerSegsDest->bind_param('s', $numLote);
        $this->stmtTraerSegsSwf->bind_param('s', $numLote);  
        $this->stmtTraerMuestrasSwf->bind_param('s', $numLote);
    
        $this->stmtTraerMuestrasSwf->execute();
        $resultadoMuestras = $this->stmtTraerMuestrasSwf->get_result();
        $arrayMuestrasSwf = $resultadoMuestras->fetch_all(MYSQLI_ASSOC);
        $resultadoMuestras->free();
    
        $this->stmtTraerSegsDest->execute();
        $resultadoDest = $this->stmtTraerSegsDest->get_result();
        $arraySegsDest = $resultadoDest->fetch_all(MYSQLI_ASSOC);
        $resultadoDest->free();
    
        $this->stmtTraerSegsSwf->execute();
        $resultadoSwf = $this->stmtTraerSegsSwf->get_result();
        $arraySegsSwf = $resultadoSwf->fetch_all(MYSQLI_ASSOC);
        $resultadoSwf->free();

        if (!$resultadoMuestras || !$resultadoDest || !$resultadoSwf) {
            return null; // retornar null si falla alguna de las obtenciones de resultados
        }
    
        $arraySegs = array('seguimientos' => ['segsSwf' => $arraySegsSwf, 'muestrasSwf' => $arrayMuestrasSwf, 'segsDest' => $arraySegsDest]);
    
        return json_encode($arraySegs);
    }

}
?>