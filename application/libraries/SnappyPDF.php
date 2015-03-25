<?php
use Knp\Snappy\Pdf;

class SnappyPDF {

    public $em = null;


    public function createPDF($body,$filename)
    {
        $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        $snappy->generateFromHtml($body, '/tmp/'.$filename.'.pdf');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="file.pdf"');

    }


}