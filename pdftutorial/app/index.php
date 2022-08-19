<?php
require_once ('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([]);

$mpdf->writeHtml("<p>Hola Isabel</p>", \Mpdf\HtmlParseMode::HTML_BODY);

$mpdf->output();
