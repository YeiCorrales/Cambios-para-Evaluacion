<?php

//============================================================+
// File name   : seccionesgene.php
// Begin       : 2019-04-14
// Last Update : 2019-04-14
//
// Description : REcibe los valores del JS a traves de ajax y JQUERY
//
// Author: Irma Alonzo
//
//============================================================+

require_once '../../../controladores/seccion.controlador.php';
require_once '../../../modelos/seccion.modelo.php';

class imprimirSeccion{

public $idseccion;
public $descseccion;
public $cuerpotabla;

public function traerImpresionReporte(){

 $this->cuerpotabla = '';
 $contador = 1;
$d = $this->idseccion;
$descseccion = $this->descseccion;
$ct = $this->cuerpotabla;
$respuestaReporte = ControladorSecciones::ctrImprimirSeccion($d);

if(isset($respuestaReporte)){

foreach($respuestaReporte as $item){

  $name = $respuestaReporte[$contador-1]["IDSEC"];

$ct .= '<tr>
<td>'.$contador.'</td>
<td>'.$respuestaReporte[$contador-1]['DSEC'].'</td>
<td>'.$respuestaReporte[$contador-1]['MAE'].'</td>
<td>'.$respuestaReporte[$contador-1]['AU'].'</td>
<td>'.$respuestaReporte[$contador-1]['DPER'].'</td>

</tr>';
$contador++;
}
}else{
$ct = '<tr><td>'.$contador.'</td><td>aa</td><td>bb</td><td>cc</td></tr>';
}

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
      <table>
        <tr>
            <td style="width:150px;"><img src="images/acead_logo.jpg" height="80px"></td>
            <td style="width:390px;">
                <div style="font-size:9px; text-align: right; line-height: 15px;">
                    <label style="font-style: bold; color: #33470a;">Academia de música CEAD</label>
                    <br>Dirección: Col. Col. San Ignacio, 5ta calle, cotiguo a Gasolinera TEXACO
                    <br>Telefono: 2239-2330
                    <br>e-mail: sistemas@adcead.org
                </div>
            </td>
        </tr>
      </table>
EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

$bloque2 = <<<EOF
   <br>
   <br>
   <table>
        <tr>
            <td>- - - - - - - - - - - - - - - - - - - - - - - -</td>
            <td>- - - - - - - - - - - - - - - - - - - - - - - -</td>
            <td>- - - - - - - - - - - - - - - - - - - - - - - -</td>
        </tr>
    </table><br>
    <h2>Secciones</h2><br>

    <table style="font-size: 10px; padding: 5px 10px;" border="1">
        <thead>
            <tr style="text-align: center; font-size: 12px; color: #4409d5;">
                <th>Codigo Seccion</th>
                <th>Seccion</th>
                <th>Maestro</th>
                <th>Hora Clase</th>
                <th>Aula Clase</th>
                <th>Periodo Academico</th>
                

            </tr>
        </thead>
        <tbody>
            $ct
        </tbody>
    </table>

EOF;
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ob_end_clean();

$pdf->writeHTML($bloque2, false, false, false, false, '');

//----SALIDA DEL PDF
$pdf->Output('seccionestotal.pdf', 'I');

}

}

$reporte = new imprimirSecciones();
$reporte->idseccion = $_GET['Id_Seccion'];
$reporte->traerImpresionReporte();
?>

