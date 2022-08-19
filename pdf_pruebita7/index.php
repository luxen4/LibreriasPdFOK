<?php
use Dompdf\Dompdf;
USE Dompdf\Options;


require_once 'dompdf/autoload.inc.php';
$Options=new Options();
$Options->set('chroot',realpath(''));

$dompdf= new Dompdf($Options);





$content = '<html>';

$cabecera = "<head><span><b></b></span></head>";


$cuerpo = '<html>
<body>
<br/>
<h1>¡Hola Adrián!</h1>
<h2>Gracias por utilizar la App Playas-2022, ahora le deseamos que disfrute de su estancia en Laredo, ahora disfrute del descuento que le ofrece
 el Restaurante Manoli por ser usuario de nuestra aplicación!</h2>

<br/>


<div>
<p>A continuación mostramos algunos <u>datos</u></p>
<table style="width:200px;text-align:center;">
<thead>
<tr>
<th>A</th>
<th>B</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>2</td>                      
</tr>
<tr>
<td>3</td>
<td>4</td>                      
</tr>
</tbody>
</table>
</div>
<div>
<p>Aquí podemos introducir datos dinámicos desde PHP</p>







</div>
</body>
</html>';




$pie = "<span>
<a href=\"http://www.imaginanet.com\">Diseño y Programación Web: Imaginanet</a>
 - <i>Creado ".date("d/m/Y")."</i>
</span>";


$content=$content.$cabecera.$cuerpo.$pie;






$dompdf->loadHtml('
<style>
@font-face{font-family: "Ubuntu";
src: url("Ubuntu-Regular.ttf");
}
body{
    font:normal 15 px/20px Ubuntu;

}

</style>
<p>Hello</p>
<img src="imgs.jpg">




' . $content );

$dompdf->setPaper('A4','landscape');


/*
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("re");
*/

$dompdf->render();
$dompdf->stream("a.pdf", ['Attachment' => false]);
exit(0);


?>


