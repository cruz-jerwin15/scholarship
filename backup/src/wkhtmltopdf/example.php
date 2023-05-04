<?php
require __DIR__ . '/../vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;

// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('wkhtmltopdf/test.html');

// On some systems you may have to set the path to the wkhtmltopdf executable
$pdf->binary = 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf';

if (!$pdf->saveAs('test.pdf')) {
    echo $pdf->getError();
}
?>