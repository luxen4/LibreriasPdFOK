<?php
  ob_start();
?>
  <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
		integrity=
"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
		crossorigin="anonymous" rel="stylesheet">
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
 <h1>Estamos creando un PDF</h1>       <br>

<table>
  <thead>
    <tr><th>Nombre</th></tr>
  </thead>
  <tbody>
    <tr><td>Adrian</td></tr>
  </tbody>
</table>


  <b>Ingresa a Codigo Facilito, aprenderás muchas cosas</b><br>
  <a href='http://codigofacilito.com'>Click</a>.<br>

  

</page>



<?php

  $content = ob_get_clean();
  require_once(dirname(__FILE__).'/../vendor/autoload.php');
  try
  {
      $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
      $html2pdf->pdf->SetDisplayMode('fullpage');
      $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
      $html2pdf->Output('PDF-CF.pdf');
  }
  catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
  }