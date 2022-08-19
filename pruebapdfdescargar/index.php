
<?php
$file = 'recordatorioCita1.pdf';
    if (is_file($file)) {
      $filename = "cv0descargado.pdf"; // el nombre con el que se descargará, puede ser diferente al original
      /*header("Content-Type: application/octet-stream");*/
      header("Content-Type: application/force-download");
      header("Content-Disposition: attachment; filename=recordatorioCita1.pdf");
      readfile($file);
    } else {
      die("Error: no se encontró el archivo recordatorioCita1.pdf");
    }
?>