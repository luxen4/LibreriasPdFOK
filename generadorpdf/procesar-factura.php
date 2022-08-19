<?php
if(isset($_POST['id'])){
define('FPDF_FONTPATH','/fonts/font/');
require('fpdf.php');
 
/*********** Clase PDF_JAVASCRIPT basandose en FPDF ***********/
class PDF_JavaScript extends FPDF {
var $javascript;
var $n_js;
function IncludeJS($script) {
$this->javascript=$script;
}
function _putjavascript() {
$this->_newobj();
$this->n_js=$this->n;
$this->_out('<<');
$this->_out('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
$this->_out('>>');
$this->_out('endobj');
$this->_newobj();
$this->_out('<<');
$this->_out('/S /JavaScript');
$this->_out('/JS '.$this->_textstring($this->javascript));
$this->_out('>>');
$this->_out('endobj');
}
function _putresources() {
parent::_putresources();
if (!empty($this->javascript)) {
$this->_putjavascript();
}
}
function _putcatalog() {
parent::_putcatalog();
if (!empty($this->javascript)) {
$this->_out('/Names <</JavaScript '.($this->n_js).' 0 R>>');
}
}
}
/****************************************************************/
 
/*************** Clase PDF_AutoPrint basandose en PDF_JavaScript *************/
class PDF_AutoPrint extends PDF_JavaScript{
function AutoPrint($dialog=false){
$param = ($dialog ? 'true' : 'false');
$script = "print($param);";
$this->IncludeJS($script);
}
 
function AutoPrintToPrinter($server,$printer,$dialog=false){
$script = "var pp = getPrintParams();";
if($dialog)
$script .= "pp.interactive = pp.constants.interactionLevel.full;";
else
$script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
$script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
$script .= "print(pp);";
$this->IncludeJS($script);
}
}
/****************************************************************************/
 
/* Creamos un nuevo objeto PDFAutoPrint que nos da la funcionalidad de imprimir y tambien las basicas de FPDF */
/*************** Construimos la factura ************************/
$pdf = new PDF_AutoPrint();
$pdf->SetFont('courier','',32);
$pdf->AddPage();
$pdf->Image('ImagenesSitio/algunaimagendecabecera.png' , 160 ,12, 30 , 9,'PNG', 'https://jonathanmelgoza.com');
$pdf->Cell(40,10,"Factura Empresa",15);
/****************************************************************/
 
/*********** Segun la accion elegida presentamos en formato vista, descarga o impresion *******************/
$action = $_POST['accion'];
switch($action){
case "ver":
$pdf->Output("factura-empresa.pdf","I");
break;
case "descargar":
$pdf->Output("factura-empresa.pdf","D");
break;
case "imprimir":
$pdf->AutoPrint(true);
$pdf->Output();
break;
}
/****************************************************/
 
}
?>