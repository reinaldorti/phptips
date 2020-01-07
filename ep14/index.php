<?php

use Dompdf\Dompdf;

require __DIR__ . "/vendor/autoload.php";

$dompdf = new Dompdf();
$dompdf->loadHtml("<h1> Primeiro PDF</h1>");

ob_start();
require __DIR__ . "/contents/users.php";
$dompdf->loadHtml(ob_get_clean());

//$dompdf->setPaper("A4", "landscape");
$dompdf->setPaper("A4");

$dompdf->render();

//$dompdf->stream("file.pdf");
$dompdf->stream("file.pdf", ["Attachment" => false]);