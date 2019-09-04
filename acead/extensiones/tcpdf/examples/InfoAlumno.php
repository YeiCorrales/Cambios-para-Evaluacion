<?php
/*::::::::::::::  FACTURA MATRICULA :::::::::::::::::*/
require_once '../../../controladores/alumnos.controlador.php';
require_once '../../../modelos/alumnos.modelo.php';

class imprimirReporteInfoAlumno{
public $cuerpotabla;
public $idAlumnoInfo;

public function traerImpresionInfoAlumno(){
$this->cuerpotabla = '';
$contador = 1;
$ct = $this->cuerpotabla;
$idAlumnoInfo = $this->idAlumno;

$respuesta = ControladorAlumnos::ctrImprimirInfoAlumno($idAlumnoInfo);
if(isset($respuesta))
{
foreach($respuesta as $idAlumnoInfo)
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
                    <label style="font-style: bold; color: #33470a;">Acdemia de Música CEAD</label>
                    <br>Dirección: Col. Col. San Ignacio, 5ta calle, cotiguo a Gasolinera TEXACO
                    <br>Teléfono: 2239-2330/9592-4624
                    <br>e-mail: academiademusica@cead.org.hn
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
    <h2>Información del Alumno</h2><br>

    <table style="font-size: 10px; padding: 5px 10px;" border="0.25">
        <thead>
            <tr style="text-align: center; font-size: 12px; color: #4409d5;">
                <th>Id Alumno</th>
                <th>Nombre del Alumno</th>
                <th>Correo Electrónico</th>
                <th>Fecha de Nacimiento</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Estado Civil</th>
                <th>Tipo de Descuento</th>
                <th></th>
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
$pdf->Output('InfoAlumno.pdf','I');

///Aqui se pegan aquellas dos llaves
}
}

$infoAlumno = new imprimirReporteInfoAlumno();
$InfoAlumno->idAlumno = $_GET["idAlumno"];
$InfoAlumno->traerImpresionInfoAlumno();



 ?>
 
