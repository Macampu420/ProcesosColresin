<?php

class Formulario{

    function __construct(){
        $nfo        = isset($_POST["nfo"])          ? $_POST["nfo"]         :'';
        $numeroLote = isset($_POST["numeroLote"])   ? $_POST["numeroLote"]  :'';
        $dietrich2  = isset($_POST["Dietrich2"])    ? $_POST["Dietrich2"]   :'';
        $fLukas     = isset($_POST["fLukas"])       ? $_POST["fLukas"]      :'';
        $contOlor   = isset($_POST["contOlor"])     ? $_POST["contOlor"]    :'';
        
        $nan000   = isset($_POST["nan000"])     ? $_POST["nan000"]    :'';
        $swf098   = isset($_POST["swf098"])     ? $_POST["swf098"]    :'';
        $stw000   = isset($_POST["stw000"])     ? $_POST["stw000"]    :'';
        $fdo037   = isset($_POST["fdo037"])     ? $_POST["fdo037"]    :'';
        $myo000   = isset($_POST["myo000"])     ? $_POST["myo000"]    :'';
        $stw0002  = isset($_POST["stw0002"])    ? $_POST["stw0002"]   :'';
        $csc050   = isset($_POST["csc050"])     ? $_POST["csc050"]    :'';
        $stw0003  = isset($_POST["stw0003"])    ? $_POST["stw0003"]   :'';

        $matprifp04     = isset($_POST["matprifp04"])    ? $_POST["matprifp04"]      :'';
        $matprizonasep  = isset($_POST["matprizonasep"]) ? $_POST["matprizonasep"]   :'';
        
        $ReactorLimpio          = isset($_POST["ReactorLimpio"])        ? $_POST["ReactorLimpio"]       :'';
        $HermeticidadReactor    = isset($_POST["HermeticidadReactor"])  ? $_POST["HermeticidadReactor"] :'';
        $ReactorFunciona        = isset($_POST["ReactorFunciona"])      ? $_POST["ReactorFunciona"]     :'';
        $VacioFunciona          = isset($_POST["VacioFunciona"])        ? $_POST["VacioFunciona"]       :'';
        $EnfriamientoFunciona   = isset($_POST["EnfriamientoFunciona"]) ? $_POST["EnfriamientoFunciona"]:'';
        $EmisionesFunciona      = isset($_POST["EmisionesFunciona"])    ? $_POST["EmisionesFunciona"]   :'';
        $phsodatanque           = isset($_POST["phsodatanque"])         ? $_POST["phsodatanque"]        :'';
        $CondensadorFunciona    = isset($_POST["CondensadorFunciona"])  ? $_POST["CondensadorFunciona"] :'';
        
        $ApruebaInicio      = isset($_POST["ApruebaInicio"])    ? $_POST["ApruebaInicio"]  :'';
        $RazonesNoAprob     = isset($_POST["RazonesNoAprob"])   ? $_POST["RazonesNoAprob"] :'';
        
        $SeguridadNaftaleno     = isset($_POST["SeguridadNaftaleno"])   ? $_POST["SeguridadNaftaleno"]  :'';
        $EquipoNaftaleno        = isset($_POST["EquipoNaftaleno"])      ? $_POST["EquipoNaftaleno"]     :'';
        $enfcerrado             = isset($_POST["enfcerrado"])           ? $_POST["enfcerrado"]          :'';
        
        // Paso 5   28
        $horainiciocarganaf  = isset($_POST["horainiciocarganaf"])  ? $_POST["horainiciocarganaf"] :'';
        $horafincarganaf     = isset($_POST["horafincarganaf"])     ? $_POST["horafincarganaf"]    :'';
        $valvbloqueo         = isset($_POST["valvbloqueo"])         ? $_POST["valvbloqueo"]        :'';
        $abrircontrololores  = isset($_POST["abrircontrololores"])  ? $_POST["abrircontrololores"] :'';
        $horainiciofusionnaf = isset($_POST["horainiciofusionnaf"]) ? $_POST["horainiciofusionnaf"]:'';
        $temp1               = isset($_POST["temp1"])               ? $_POST["temp1"]              :'';
        $presion1            = isset($_POST["presion1"])            ? $_POST["presion1"]           :'';
        $horafinfusionnaf    = isset($_POST["horafinfusionnaf"])    ? $_POST["horafinfusionnaf"]   :'';
        $agitadorok          = isset($_POST["agitadorok"])          ? $_POST["agitadorok"]   :'';
        $problemafund        = isset($_POST["problemafund"])        ? $_POST["problemafund"]   :'';
        $problemafundirnaf   = isset($_POST["problemafundirnaf"])   ? $_POST["problemafundirnaf"]   :'';
        
        // Paso 6
        $SeguridadSulfurico   = isset($_POST["SeguridadSulfurico"]) ? $_POST["SeguridadSulfurico"]  :'';
        $EquipoSulfurico      = isset($_POST["EquipoSulfurico"])    ? $_POST["EquipoSulfurico"]     :'';
        
        // Paso 7     41
        $horainiciocargaswfo   = isset($_POST["horainiciocargaswfo"])    ? $_POST["horainiciocargaswfo"]    :'';
        $horafincargaswfo      = isset($_POST["horafincargaswfo"])       ? $_POST["horafincargaswfo"]       :'';
        $cierrecontrololores   = isset($_POST["cierrecontrololores"])    ? $_POST["cierrecontrololores"]    :'';
        $horainiciocargaswfo2  = isset($_POST["horainiciocargaswfo2"])   ? $_POST["horainiciocargaswfo2"]   :'';
        $horafincargaswfo2     = isset($_POST["horafincargaswfo2"])      ? $_POST["horafincargaswfo2"]      :'';
        $tempswfo1             = isset($_POST["tempswfo1"])              ? $_POST["tempswfo1"]              :'';
        $presionswfo1          = isset($_POST["presionswfo1"])           ? $_POST["presionswfo1"]           :'';
        $vapor                 = isset($_POST["vapor"])                  ? $_POST["vapor"]                  :'';
        $horainiciosostenertemp= isset($_POST["horainiciosostenertemp"]) ? $_POST["horainiciosostenertemp"] :'';
        $temphr1               = isset($_POST["temphr1"])                ? $_POST["temphr1"]                :'';
        $presionhr1            = isset($_POST["presionhr1"])             ? $_POST["presionhr1"]             :'';
        $temphr2               = isset($_POST["temphr2"])                ? $_POST["temphr2"]                :'';
        $presionhr2            = isset($_POST["presionhr2"])             ? $_POST["presionhr2"]             :'';
        $temphr3               = isset($_POST["temphr3"])                ? $_POST["temphr3"]                :'';
        $presionhr3            = isset($_POST["presionhr3"])             ? $_POST["presionhr3"]             :'';
        $horafinsostenertemp   = isset($_POST["horafinsostenertemp"])    ? $_POST["horafinsostenertemp"]    :'';
        
        $problemaswfo          = isset($_POST["problemaswfo"])           ? $_POST["problemaswfo"]           :'';
        $enfriarok             = isset($_POST["enfriarok"])              ? $_POST["enfriarok"]              :'';
        $tempenfriado          = isset($_POST["tempenfriado"])           ? $_POST["tempenfriado"]           :'';
        $presionenfriado       = isset($_POST["presionenfriado"])        ? $_POST["presionenfriado"]        :'';
        $tempadicionstw        = isset($_POST["tempadicionstw"])         ? $_POST["tempadicionstw"]         :'';
        $presionadicionstw     = isset($_POST["presionadicionstw"])      ? $_POST["presionadicionstw"]      :'';
        $evacuarcamisa         = isset($_POST["evacuarcamisa"])          ? $_POST["evacuarcamisa"]          :'';
        $suministrovapor       = isset($_POST["suministrovapor"])        ? $_POST["suministrovapor"]        :'';
        $segformolmetanol      = isset($_POST["segformolmetanol"])       ? $_POST["segformolmetanol"]       :'';
        $equipoformolmetanol   = isset($_POST["equipoformolmetanol"])    ? $_POST["equipoformolmetanol"]    :'';
        
        //  Paso 8      67
        $lineatierraok   = isset($_POST["lineatierraok"])    ? $_POST["lineatierraok"]    :'';
        $bombaneumatica  = isset($_POST["bombaneumatica"])   ? $_POST["bombaneumatica"]   :'';
        $conexionok      = isset($_POST["conexionok"])       ? $_POST["conexionok"]       :'';
        $mangueraok      = isset($_POST["mangueraok"])       ? $_POST["mangueraok"]       :'';
        $lineacargaok    = isset($_POST["lineacargaok"])     ? $_POST["lineacargaok"]     :'';
        $valvulascerradas= isset($_POST["valvulascerradas"]) ? $_POST["valvulascerradas"] :'';
        $capacidadtanque = isset($_POST["capacidadtanque"])  ? $_POST["capacidadtanque"]  :'';
        
        // Paso 9
        $horainicioadc   = isset($_POST["horainicioadc"])   ? $_POST["horainicioadc"]   :'';
        $tempadc1        = isset($_POST["tempadc1"])        ? $_POST["tempadc1"]        :'';
        $presionadc1     = isset($_POST["presionadc1"])     ? $_POST["presionadc1"]     :'';
        $tempadc2        = isset($_POST["tempadc2"])        ? $_POST["tempadc2"]        :'';
        $presionadc2     = isset($_POST["presionadc2"])     ? $_POST["presionadc2"]     :'';
        $comentarioadc2  = isset($_POST["comentarioadc2"])  ? $_POST["comentarioadc2"]  :'';
        $tempadc3        = isset($_POST["tempadc3"])        ? $_POST["tempadc3"]        :'';
        $presionadc3     = isset($_POST["presionadc3"])     ? $_POST["presionadc3"]     :'';
        $comentarioadc3  = isset($_POST["comentarioadc3"])  ? $_POST["comentarioadc3"]  :'';
        $tempadc4        = isset($_POST["tempadc4"])        ? $_POST["tempadc4"]        :'';
        $presionadc4     = isset($_POST["presionadc4"])     ? $_POST["presionadc4"]     :'';
        $comentarioadc4  = isset($_POST["comentarioadc4"])  ? $_POST["comentarioadc4"]  :'';
        $tempadc5        = isset($_POST["tempadc5"])        ? $_POST["tempadc5"]        :'';
        $presionadc5     = isset($_POST["presionadc5"])     ? $_POST["presionadc5"]     :'';
        $comentarioadc5  = isset($_POST["comentarioadc5"])  ? $_POST["comentarioadc5"]  :'';
        $horafinadc      = isset($_POST["horafinadc"])      ? $_POST["horafinadc"]      :'';
        $horainicioreac  = isset($_POST["horainicioreac"])  ? $_POST["horainicioreac"]  :'';
        $tempreac1       = isset($_POST["tempreac1"])       ? $_POST["tempreac1"]       :'';
        $presionreac1    = isset($_POST["presionreac1"])    ? $_POST["presionreac1"]    :'';
        $comentarioreac1 = isset($_POST["comentarioreac1"]) ? $_POST["comentarioreac1"] :'';
        $tempreact2      = isset($_POST["tempreact2"])      ? $_POST["tempreact2"]      :'';
        $presionreact2   = isset($_POST["presionreact2"])   ? $_POST["presionreact2"]   :'';
        $comentarioreac2 = isset($_POST["comentarioreac2"]) ? $_POST["comentarioreac2"] :'';
        $tempreac3       = isset($_POST["tempreac3"])       ? $_POST["tempreac3"]       :'';
        $presionreac3    = isset($_POST["presionreac3"])    ? $_POST["presionreac3"]    :'';
        $comentarioreac3 = isset($_POST["comentarioreac3"]) ? $_POST["comentarioreac3"] :'';
        $tempreac4       = isset($_POST["tempreac4"])       ? $_POST["tempreac4"]       :'';
        $presionreac4    = isset($_POST["presionreac4"])    ? $_POST["presionreac4"]    :'';
        $comentarioreac4 = isset($_POST["comentarioreac4"]) ? $_POST["comentarioreac4"] :'';
        $tempreac5       = isset($_POST["tempreac5"])       ? $_POST["tempreac5"]       :'';
        $presionreac5    = isset($_POST["presionreac5"])    ? $_POST["presionreac5"]    :'';
        $comentarioreac5 = isset($_POST["comentarioreac5"]) ? $_POST["comentarioreac5"] :'';
        $tempreac6       = isset($_POST["tempreac6"])       ? $_POST["tempreac6"]       :'';
        $presionreac6    = isset($_POST["presionreac6"])    ? $_POST["presionreac6"]    :'';
        $comentarioreac6 = isset($_POST["comentarioreac6"]) ? $_POST["comentarioreac6"] :'';
        $tempreac7       = isset($_POST["tempreac7"])       ? $_POST["tempreac7"]       :'';
        $presionreac7    = isset($_POST["presionreac7"])    ? $_POST["presionreac7"]    :'';
        $comentarioreac7 = isset($_POST["comentarioreac7"]) ? $_POST["comentarioreac7"] :'';
        $horafinreac     = isset($_POST["horafinreac"])     ? $_POST["horafinreac"]     :'';
        $problemareac    = isset($_POST["problemareac"])    ? $_POST["problemareac"]    :'';
        
        // Paso 10      114
        $horainicioadcstw2  = isset($_POST["horainicioadcstw2"])    ? $_POST["horainicioadcstw2"]   :'';
        $tempadcstw2        = isset($_POST["tempadcstw2"])          ? $_POST["tempadcstw2"]         :'';
        $presionadcstw2     = isset($_POST["presionadcstw2"])       ? $_POST["presionadcstw2"]      :'';
        $horafinadcstw2     = isset($_POST["horafinadcstw2"])       ? $_POST["horafinadcstw2"]      :'';
        $SeguridadSoda      = isset($_POST["SeguridadSoda"])        ? $_POST["SeguridadSoda"]       :'';
        $EquipoSoda         = isset($_POST["EquipoSoda"])           ? $_POST["EquipoSoda"]          :'';
        
        // Paso 11
        $horainicioneut     = isset($_POST["horainicioneut"])       ? $_POST["horainicioneut"]      :'';
        $tempneut1          = isset($_POST["tempneut1"])            ? $_POST["tempneut1"]           :'';
        $presionneut1       = isset($_POST["presionneut1"])         ? $_POST["presionneut1"]        :'';
        $comentarioneut1    = isset($_POST["comentarioneut1"])      ? $_POST["comentarioneut1"]     :'';
        $tempneut2          = isset($_POST["tempneut2"])            ? $_POST["tempneut2"]           :'';
        $presionneut2       = isset($_POST["presionneut2"])         ? $_POST["presionneut2"]        :'';
        $comentarioneut2    = isset($_POST["comentarioneut2"])      ? $_POST["comentarioneut2"]     :'';
        $tempneut3          = isset($_POST["tempneut3"])            ? $_POST["tempneut3"]           :'';
        $presionneut3       = isset($_POST["presionneut3"])         ? $_POST["presionneut3"]        :'';
        $comentarioneut3    = isset($_POST["comentarioneut3"])      ? $_POST["comentarioneut3"]     :'';
        $tempneut4          = isset($_POST["tempneut4"])            ? $_POST["tempneut4"]           :'';
        $presionneut4       = isset($_POST["presionneut4"])         ? $_POST["presionneut4"]        :'';
        $comentarioneut4    = isset($_POST["comentarioneut4"])      ? $_POST["comentarioneut4"]     :'';
        $horafinneut        = isset($_POST["horafinneut"])          ? $_POST["horafinneut"]         :'';
        $horainiciohomoge   = isset($_POST["horainiciohomoge"])     ? $_POST["horainiciohomoge"]    :'';
        $temphomoge1        = isset($_POST["temphomoge1"])          ? $_POST["temphomoge1"]         :'';
        $presionhomoge1     = isset($_POST["presionhomoge1"])       ? $_POST["presionhomoge1"]      :'';
        $comentariohomoge1  = isset($_POST["comentariohomoge1"])    ? $_POST["comentariohomoge1"]   :'';
        $temphomoge2        = isset($_POST["temphomoge2"])          ? $_POST["temphomoge2"]         :'';
        $presionhomoge2     = isset($_POST["presionhomoge2"])       ? $_POST["presionhomoge2"]      :'';
        $comentariohomoge2  = isset($_POST["comentariohomoge2"])    ? $_POST["comentariohomoge2"]   :'';
        $temphomoge3        = isset($_POST["temphomoge3"])          ? $_POST["temphomoge3"]         :'';
        $presionhomoge3     = isset($_POST["presionhomoge3"])       ? $_POST["presionhomoge3"]      :'';
        $horafinhomoge      = isset($_POST["horafinhomoge"])        ? $_POST["horafinhomoge"]       :'';
        
        $olorformol      = isset($_POST["olorformol"])          ? $_POST["olorformol"]          :'';
        $csc050adicional = isset($_POST["csc050adicional"])     ? $_POST["csc050adicional"]     :'';
        
        $temp85             = isset($_POST["temp85"])               ? $_POST["temp85"]              :'';
        $horainiciostw85    = isset($_POST["horainiciostw85"])      ? $_POST["horainiciostw85"]     :'';
        $horafinstw85       = isset($_POST["horafinstw85"])         ? $_POST["horafinstw85"]        :'';
        $ph10               = isset($_POST["ph10"])                 ? $_POST["ph10"]                :'';
        $csc050ajuste       = isset($_POST["csc050ajuste"])         ? $_POST["csc050ajuste"]        :'';
        $stw00ajuste        = isset($_POST["stw00ajuste"])          ? $_POST["stw00ajuste"]         :'';
        $ph10fin            = isset($_POST["ph10fin"])              ? $_POST["ph10fin"]             :'';
        $productobrillante  = isset($_POST["productobrillante"])    ? $_POST["productobrillante"]   :'';
        $horainiciolukas    = isset($_POST["horainiciolukas"])      ? $_POST["horainiciolukas"]     :'';
        $horafinlukas       = isset($_POST["horafinlukas"])         ? $_POST["horafinlukas"]        :'';
        $productobrillante2 = isset($_POST["productobrillante2"])   ? $_POST["productobrillante2"]  :'';
        $horafinproceso     = isset($_POST["horafinproceso"])       ? $_POST["horafinproceso"]      :'';
        
        // Paso 12
        $hojasegNFO     = isset($_POST["hojasegNFO"])      ? $_POST["hojasegNFO"]     :'';
        $EquipoNFO      = isset($_POST["EquipoNFO"])       ? $_POST["EquipoNFO"]      :'';
        
        // Paso 13     160
        $agitacionoff       = isset($_POST["agitacionoff"])         ? $_POST["agitacionoff"]        :'';
        $talegodescarga     = isset($_POST["talegodescarga"])       ? $_POST["talegodescarga"]      :'';
        $horainiciodescarga = isset($_POST["horainiciodescarga"])   ? $_POST["horainiciodescarga"]  :'';
        $horafindescarga    = isset($_POST["horafindescarga"])      ? $_POST["horafindescarga"]     :'';
        $residuostalego     = isset($_POST["residuostalego"])       ? $_POST["residuostalego"]      :'';
        $enviarmuestrafinal = isset($_POST["enviarmuestrafinal"])   ? $_POST["enviarmuestrafinal"]  :'';
        $solidosporcentaje  = isset($_POST["solidosporcentaje"])    ? $_POST["solidosporcentaje"]   :'';
        $pH10fin2           = isset($_POST["pH10fin2"])             ? $_POST["pH10fin2"]            :'';
        $solubilidad10      = isset($_POST["solubilidad10"])        ? $_POST["solubilidad10"]       :'';
        $solubilidad40      = isset($_POST["solubilidad40"])        ? $_POST["solubilidad40"]       :'';
        $rendimiento        = isset($_POST["rendimiento"])          ? $_POST["rendimiento"]         :'';
        $procesodif         = isset($_POST["procesodif"])           ? $_POST["procesodif"]          :'';
        $horainiciolavado   = isset($_POST["horainiciolavado"])     ? $_POST["horainiciolavado"]    :'';
        $kgenjuague         = isset($_POST["kgenjuague"])           ? $_POST["kgenjuague"]          :'';
        $kglavado           = isset($_POST["kglavado"])             ? $_POST["kglavado"]            :'';
        $horafinlavado      = isset($_POST["horafinlavado"])        ? $_POST["horafinlavado"]       :'';
        //  176 Campos
    }

    function guardarNuevo(){

        $query = mysqli_query($result,"INSERT INTO NFO (nfo, numeroLote, Dietrich2, fLukas, contOlor, nan000, swf098, stw000, fdo037, myo000, stw0002, csc050, stw0003, matprifp04, matprizonasep, ReactorLimpio, HermeticidadReactor, ReactorFunciona, VacioFunciona, EnfriamientoFunciona, EmisionesFunciona, phsodatanque, CondensadorFunciona, ApruebaInicio, RazonesNoAprob, SeguridadNaftaleno, EquipoNaftaleno, enfcerrado, horainiciocarganaf, horafincarganaf, valvbloqueo, abrircontrololores, horainiciofusionnaf, temp1, presion1, horafinfusionnaf, agitadorok, problemafund, problemafundirnaf, SeguridadSulfurico, EquipoSulfurico, horainiciocargaswfo, horafincargaswfo, cierrecontrololores, horainiciocargaswfo2, horafincargaswfo2, tempswfo1, presionswfo1, vapor, horainiciosostenertemp, temphr1, presionhr1, temphr2, presionhr2, temphr3, presionhr3, horafinsostenertemp, problemaswfo, enfriarok, tempenfriado, presionenfriado, tempadicionstw, presionadicionstw, evacuarcamisa, suministrovapor, segformolmetanol, equipoformolmetanol, lineatierraok, bombaneumatica, conexionok, mangueraok, lineacargaok, valvulascerradas, capacidadtanque, horainicioadc, tempadc1, presionadc1, tempadc2, presionadc2, comentarioadc2, tempadc3, presionadc3, comentarioadc3, tempadc4, presionadc4, comentarioadc4, tempadc5, presionadc5, comentarioadc5, horafinadc, horainicioreac, tempreac1, presionreac1, comentarioreac1, tempreact2, presionreact2, comentarioreac2, tempreac3, presionreac3, comentarioreac3, tempreac4, presionreac4, comentarioreac4, tempreac5, presionreac5, comentarioreac5, tempreac6, presionreac6, comentarioreac6, tempreac7, presionreac7, comentarioreac7, horafinreac, problemareac, horainicioadcstw2, tempadcstw2, presionadcstw2, horafinadcstw2, SeguridadSoda, EquipoSoda, horainicioneut, tempneut1, presionneut1, comentarioneut1, tempneut2, presionneut2, comentarioneut2, tempneut3, presionneut3, comentarioneut3, tempneut4, presionneut4, comentarioneut4, horafinneut, horainiciohomoge, temphomoge1, presionhomoge1, comentariohomoge1, temphomoge2, presionhomoge2, comentariohomoge2, temphomoge3, presionhomoge3, horafinhomoge, olorformol, csc050adicional, temp85, horainiciostw85, horafinstw85, ph10, csc050ajuste, stw00ajuste, ph10fin, productobrillante, horainiciolukas, horafinlukas, productobrillante2, horafinproceso, hojasegNFO, EquipoNFO, agitacionoff, talegodescarga, horainiciodescarga, horafindescarga, residuostalego, enviarmuestrafinal, solidosporcentaje, pH10fin2, solubilidad10, solubilidad40, rendimiento, procesodif, horainiciolavado, kgenjuague, kglavado, horafinlavado) VALUES ('$nfo', '$numeroLote', '$Dietrich2', '$fLukas', '$contOlor', '$nan000', '$swf098', '$stw000', '$fdo037', '$myo000', '$stw0002', '$csc050', '$stw0003', '$matprifp04', '$matprizonasep', '$ReactorLimpio', '$HermeticidadReactor', '$ReactorFunciona', '$VacioFunciona', '$EnfriamientoFunciona', '$EmisionesFunciona', '$phsodatanque', '$CondensadorFunciona', '$ApruebaInicio', '$RazonesNoAprob', '$SeguridadNaftaleno', '$EquipoNaftaleno', '$enfcerrado', '$horainiciocarganaf', '$horafincarganaf', '$valvbloqueo', '$abrircontrololores', '$horainiciofusionnaf', '$temp1', '$presion1', '$horafinfusionnaf', '$agitadorok', '$problemafund', '$problemafundirnaf', '$SeguridadSulfurico', '$EquipoSulfurico', '$horainiciocargaswfo', '$horafincargaswfo', '$cierrecontrololores', '$horainiciocargaswfo2', '$horafincargaswfo2', '$tempswfo1', '$presionswfo1', '$vapor', '$horainiciosostenertemp', '$temphr1', '$presionhr1', '$temphr2', '$presionhr2', '$temphr3', '$presionhr3', '$horafinsostenertemp', '$problemaswfo', '$enfriarok', '$tempenfriado', '$presionenfriado', '$tempadicionstw', '$presionadicionstw', '$evacuarcamisa', '$suministrovapor', '$segformolmetanol', '$equipoformolmetanol', '$lineatierraok', '$bombaneumatica', '$conexionok', '$mangueraok', '$lineacargaok', '$valvulascerradas', '$capacidadtanque', '$horainicioadc', '$tempadc1', '$presionadc1', '$tempadc2', '$presionadc2', '$comentarioadc2', '$tempadc3', '$presionadc3', '$comentarioadc3', '$tempadc4', '$presionadc4', '$comentarioadc4', '$tempadc5', '$presionadc5', '$comentarioadc5', '$horafinadc', '$horainicioreac', '$tempreac1', '$presionreac1', '$comentarioreac1', '$tempreact2', '$presionreact2', '$comentarioreac2', '$tempreac3', '$presionreac3', '$comentarioreac3', '$tempreac4', '$presionreac4', '$comentarioreac4', '$tempreac5', '$presionreac5', '$comentarioreac5', '$tempreac6', '$presionreac6', '$comentarioreac6', '$tempreac7', '$presionreac7', '$comentarioreac7', '$horafinreac', '$problemareac', '$horainicioadcstw2', '$tempadcstw2', '$presionadcstw2', '$horafinadcstw2', '$SeguridadSoda', '$EquipoSoda', '$horainicioneut', '$tempneut1', '$presionneut1', '$comentarioneut1', '$tempneut2', '$presionneut2', '$comentarioneut2', '$tempneut3', '$presionneut3', '$comentarioneut3', '$tempneut4', '$presionneut4', '$comentarioneut4', '$horafinneut', '$horainiciohomoge', '$temphomoge1', '$presionhomoge1', '$comentariohomoge1', '$temphomoge2', '$presionhomoge2', '$comentariohomoge2', '$temphomoge3', '$presionhomoge3', '$horafinhomoge', '$olorformol', '$csc050adicional', '$temp85', '$horainiciostw85', '$horafinstw85', '$ph10', '$csc050ajuste', '$stw00ajuste', '$ph10fin', '$productobrillante', '$horainiciolukas', '$horafinlukas', '$productobrillante2', '$horafinproceso', '$hojasegNFO', '$EquipoNFO', '$agitacionoff', '$talegodescarga', '$horainiciodescarga', '$horafindescarga', '$residuostalego', '$enviarmuestrafinal', '$solidosporcentaje', '$pH10fin2', '$solubilidad10', '$solubilidad40', '$rendimiento', '$procesodif', '$horainiciolavado', '$kgenjuague', '$kglavado', '$horafinlavado');");

    }

    function editar($id){

        $query = mysqli_query($result,"UPDATE NFO SET nfo = '$nfo', numeroLote = '$numeroLote', Dietrich2 = '$Dietrich2', fLukas = '$fLukas', contOlor = '$contOlor', nan000 = '$nan000', swf098 = '$swf098', stw000 = '$stw000', fdo037 = '$fdo037', myo000 = '$myo000', stw0002 = '$stw0002', csc050 = '$csc050', stw0003 = '$stw0003', matprifp04 = '$matprifp04', matprizonasep = '$matprizonasep', ReactorLimpio = '$ReactorLimpio', HermeticidadReactor = '$HermeticidadReactor', ReactorFunciona = '$ReactorFunciona', VacioFunciona = '$VacioFunciona', EnfriamientoFunciona = '$EnfriamientoFunciona', EmisionesFunciona = '$EmisionesFunciona', phsodatanque = '$phsodatanque', CondensadorFunciona = '$CondensadorFunciona', ApruebaInicio = '$ApruebaInicio', RazonesNoAprob = '$RazonesNoAprob', SeguridadNaftaleno = '$SeguridadNaftaleno', EquipoNaftaleno = '$EquipoNaftaleno', enfcerrado = '$enfcerrado', horainiciocarganaf = '$horainiciocarganaf', horafincarganaf = '$horafincarganaf', valvbloqueo = '$valvbloqueo', abrircontrololores = '$abrircontrololores', horainiciofusionnaf = '$horainiciofusionnaf', temp1 = '$temp1', presion1 = '$presion1', horafinfusionnaf = '$horafinfusionnaf', agitadorok = '$agitadorok', problemafund = '$problemafund', problemafundirnaf = '$problemafundirnaf', SeguridadSulfurico = '$SeguridadSulfurico', EquipoSulfurico = '$EquipoSulfurico', horainiciocargaswfo = '$horainiciocargaswfo', horafincargaswfo = '$horafincargaswfo', cierrecontrololores = '$cierrecontrololores', horainiciocargaswfo2 = '$horainiciocargaswfo2', horafincargaswfo2 = '$horafincargaswfo2', tempswfo1 = '$tempswfo1', presionswfo1 = '$presionswfo1', vapor = '$vapor', horainiciosostenertemp = '$horainiciosostenertemp', temphr1 = '$temphr1', presionhr1 = '$presionhr1', temphr2 = '$temphr2', presionhr2 = '$presionhr2', temphr3 = '$temphr3', presionhr3 = '$presionhr3', horafinsostenertemp = '$horafinsostenertemp', problemaswfo = '$problemaswfo', enfriarok = '$enfriarok', tempenfriado = '$tempenfriado', presionenfriado = '$presionenfriado', tempadicionstw = '$tempadicionstw', presionadicionstw = '$presionadicionstw', evacuarcamisa = '$evacuarcamisa', suministrovapor = '$suministrovapor', segformolmetanol = '$segformolmetanol', equipoformolmetanol = '$equipoformolmetanol', lineatierraok = '$lineatierraok', bombaneumatica = '$bombaneumatica', conexionok = '$conexionok', mangueraok = '$mangueraok', lineacargaok = '$lineacargaok', valvulascerradas = '$valvulascerradas', capacidadtanque = '$capacidadtanque', horainicioadc = '$horainicioadc', tempadc1 = '$tempadc1', presionadc1 = '$presionadc1', tempadc2 = '$tempadc2', presionadc2 = '$presionadc2', comentarioadc2 = '$comentarioadc2', tempadc3 = '$tempadc3', presionadc3 = '$presionadc3', comentarioadc3 = '$comentarioadc3', tempadc4 = '$tempadc4', presionadc4 = '$presionadc4', comentarioadc4 = '$comentarioadc4', tempadc5 = '$tempadc5', presionadc5 = '$presionadc5', comentarioadc5 = '$comentarioadc5', horafinadc = '$horafinadc', horainicioreac = '$horainicioreac', tempreac1 = '$tempreac1', presionreac1 = '$presionreac1', comentarioreac1 = '$comentarioreac1', tempreact2 = '$tempreact2', presionreact2 = '$presionreact2', comentarioreac2 = '$comentarioreac2', tempreac3 = '$tempreac3', presionreac3 = '$presionreac3', comentarioreac3 = '$comentarioreac3', tempreac4 = '$tempreac4', presionreac4 = '$presionreac4', comentarioreac4 = '$comentarioreac4', tempreac5 = '$tempreac5', presionreac5 = '$presionreac5', comentarioreac5 = '$comentarioreac5', tempreac6 = '$tempreac6', presionreac6 = '$presionreac6', comentarioreac6 = '$comentarioreac6', tempreac7 = '$tempreac7', presionreac7 = '$presionreac7', comentarioreac7 = '$comentarioreac7', horafinreac = '$horafinreac', problemareac = '$problemareac', horainicioadcstw2 = '$horainicioadcstw2', tempadcstw2 = '$tempadcstw2', presionadcstw2 = '$presionadcstw2', horafinadcstw2 = '$horafinadcstw2', SeguridadSoda = '$SeguridadSoda', EquipoSoda = '$EquipoSoda', horainicioneut = '$horainicioneut', tempneut1 = '$tempneut1', presionneut1 = '$presionneut1', comentarioneut1 = '$comentarioneut1', tempneut2 = '$tempneut2', presionneut2 = '$presionneut2', comentarioneut2 = '$comentarioneut2', tempneut3 = '$tempneut3', presionneut3 = '$presionneut3', comentarioneut3 = '$comentarioneut3', tempneut4 = '$tempneut4', presionneut4 = '$presionneut4', comentarioneut4 = '$comentarioneut4', horafinneut = '$horafinneut', horainiciohomoge = '$horainiciohomoge', temphomoge1 = '$temphomoge1', presionhomoge1 = '$presionhomoge1', comentariohomoge1 = '$comentariohomoge1', temphomoge2 = '$temphomoge2', presionhomoge2 = '$presionhomoge2', comentariohomoge2 = '$comentariohomoge2', temphomoge3 = '$temphomoge3', presionhomoge3 = '$presionhomoge3', horafinhomoge = '$horafinhomoge', olorformol = '$olorformol', csc050adicional = '$csc050adicional', temp85 = '$temp85', horainiciostw85 = '$horainiciostw85', horafinstw85 = '$horafinstw85', ph10 = '$ph10', csc050ajuste = '$csc050ajuste', stw00ajuste = '$stw00ajuste', ph10fin = '$ph10fin', productobrillante = '$productobrillante', horainiciolukas = '$horainiciolukas', horafinlukas = '$horafinlukas', productobrillante2 = '$productobrillante2', horafinproceso = '$horafinproceso', hojasegNFO = '$hojasegNFO', EquipoNFO = '$EquipoNFO', agitacionoff = '$agitacionoff', talegodescarga = '$talegodescarga', horainiciodescarga = '$horainiciodescarga', horafindescarga = '$horafindescarga', residuostalego = '$residuostalego', enviarmuestrafinal = '$enviarmuestrafinal', solidosporcentaje = '$solidosporcentaje', pH10fin2 = '$pH10fin2', solubilidad10 = '$solubilidad10', solubilidad40 = '$solubilidad40', rendimiento = '$rendimiento', procesodif = '$procesodif', horainiciolavado = '$horainiciolavado', kgenjuague = '$kgenjuague', kglavado = '$kglavado', horafinlavado ='$horafinlavado' WHERE IdProceso = $id ;");

    }

    function eliminar($id){

        $query = mysqli_query($result,"DELETE FROM NFO WHERE IdProceso = $id;");
    }

    function editarEstado($id){
        $query = mysqli_query($result,"UPDATE NFO SET status = $status WHERE IdProceso = $id;");
    }

}

?>