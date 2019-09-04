<?php
/*::::::::::::::  FACTURA MATRICULA :::::::::::::::::*/
require_once '../../../controladores/cobromatricula.controlador.php';
require_once '../../../modelos/cobromatricula.modelo.php';

class imprimirReporte
{
public $cuerpotabla;
public $idalumno;

public function traerImpresionFacturaMat(){
$this->cuerpotabla = '';
$contador = 1;   
$ct = $this->cuerpotabla;
$ida = $this->idAlumno;	

$respuesta = ControladorCobroMatricula::ctrPagosMatricula($ida);
if(isset($respuesta))
{
foreach($respuesta as $ida)
{
$ct .= '<tr><td>'.$contador.'</td><td>'.$respuesta[$contador-1]['nombre'].'</td><td>'.$respuesta[$contador-1]['TM'].'</td></tr>';
$contador++;
}
}
else
{
$ct = '<tr><td>'.$contador.'</td><td>aa</td><td>bb</td><td>cc</td></tr>';
}

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>
		<tr>
            <td style="width:150px;"><img src="images/logo-negro-bloque.png" height="80px"></td>
            <td style="width:390px;">
                <div style="font-size:9px; text-align: right; line-height: 15px;">
                    <label style="font-style: bold; color: #33470a;">Acdemia de música CEAD</label>
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
   <table>
        <tr>
            <td> - - - - - - - - - - - - - - - - - - - - - - - - </td>
            <td> - - - - - - - - - - - - - - - - - - - - - - - - </td>
            <td> - - - - - - - - - - - - - - - - - - - - - - - - </td>
        </tr>
    </table><br>
    <h2>Recibo de Matricula</h2><br>
    
    <table style="font-size: 10px; padding: 5px 10px;" border="0.25">
        <thead>
            <tr style="text-align: center; font-size: 12px; color: #4409d5;">
                <th>Codigo Alumno</th>
                <th>Nombre Alumno</th>
                <th>Valor Pagado</th>
            </tr>
        </thead>
        <tbody>
            $ct
            <tr>
            	<td> </td><td> </td><td> </td>
            </tr>
        </tbody>
    </table>
    
EOF;

error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ob_end_clean();

$pdf->writeHTML($bloque2, false, false, false, false, '');

//::::::::::::::::::::::::::SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf','I');

///Aqui se pegan aquellas dos llaves
}
}

$facturamatri = new imprimirReporte();
$facturamatri->idAlumno = $_GET["idAlumno"];
$facturamatri->traerImpresionFacturaMat();



 ?>
 