<?php
require __DIR__ . '/../vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;

$pdf = new Pdf(array(
	'binary' => 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf',
    'no-outline',         // Make Chrome not complain
    'margin-top'    => 0,
    'margin-right'  => 0,
    'margin-bottom' => 0,
    'margin-left'   => 0,

    // Default page options
    'disable-smart-shrinking',
    'user-style-sheet' => 'custom.css'
));

// Add a page. To override above page defaults, you could add
// another $options array as second argument.
$pdf->addPage('wkhtmltopdf/test.html');

if (!$pdf->saveAs('test1234.pdf')) {
    echo $pdf->getError();
}
?>