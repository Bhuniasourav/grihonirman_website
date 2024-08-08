<?php

function split_pdf($filename, $dir, $pageTo)
{
    require_once('../../../backend_assets/pdf/fpdf/fpdf.php');
    require_once('../../../backend_assets/pdf/fpdi/src/autoload.php');

    // $filename = "sample.pdf";
    // $dir = "split";

    $pdf = new \setasign\Fpdi\Fpdi();
    $pageCount = $pdf->setSourceFile($dir . '/' . $filename);

    $pageFrom = 1;
    // $pageTo = 3;
    $existCounter = 0;

    for ($i = $pageFrom; $i <= $pageTo; $i++) {
        $tpl = $pdf->importPage($i);
        $pdf->getTemplateSize($tpl);
        $pdf->AddPage();

        $pdf->useTemplate($tpl, ['adjustPageSize' => true]);
        $existCounter++;
    }

    $split_filename = $dir . '/' . basename($filename, '.pdf') . '.pdf';
    $pdf->Output($split_filename, "F");
}

function showWaterMarkPdf($filename, $waterMarkText)
{
    require_once('../../../backend_assets/pdf/fpdf/fpdf.php');
    require_once('../../../backend_assets/pdf/fpdi/src/autoload.php');

    // Source file and watermark config 
    $file = $filename;
    $text = $waterMarkText;

    // Text font settings 
    $name = uniqid();
    $font_size = 5;
    $opacity = 30;
    $ts = explode("\n", $text);
    $width = 0;
    foreach ($ts as $k => $string) {
        $width = max($width, strlen($string));
    }
    $width  = imagefontwidth($font_size) * $width;
    $height = imagefontheight($font_size) * count($ts);
    $el = imagefontheight($font_size);
    $em = imagefontwidth($font_size);
    $img = imagecreatetruecolor($width, $height);

    // Background color 
    $bg = imagecolorallocate($img, 255, 255, 255);
    imagefilledrectangle($img, 0, 0, $width, $height, $bg);

    // Font color settings 
    $color = imagecolorallocate($img, 0, 0, 0);
    foreach ($ts as $k => $string) {
        $len = strlen($string);
        $ypos = 0;
        for ($i = 0; $i < $len; $i++) {
            $xpos = $i * $em;
            $ypos = $k * $el;
            imagechar($img, $font_size, $xpos, $ypos, $string, $color);
            $string = substr($string, 1);
        }
    }
    imagecolortransparent($img, $bg);
    $blank = imagecreatetruecolor($width, $height);
    $tbg = imagecolorallocate($blank, 255, 255, 255);
    imagefilledrectangle($blank, 0, 0, $width, $height, $tbg);
    imagecolortransparent($blank, $tbg);
    $op = !empty($opacity) ? $opacity : 100;
    if (($op < 0) or ($op > 100)) {
        $op = 100;
    }

    // Create watermark image 
    imagecopymerge($blank, $img, 0, 0, 0, 0, $width, $height, $op);
    imagepng($blank, $name . ".png");

    // Set source PDF file 
    // $pdf = new \setasign\Fpdi\FPDI();
    $pdf = new \setasign\Fpdi\Fpdi();
    if (file_exists("./" . $file)) {
        $pagecount = $pdf->setSourceFile($file);
    } else {
        die('Source PDF not found!');
    }

    // Add watermark to PDF pages 
    for ($i = 1; $i <= $pagecount; $i++) {
        $tpl = $pdf->importPage($i);
        $size = $pdf->getTemplateSize($tpl);
        $pdf->addPage();
        $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE);

        //Put the watermark 
        $xxx_final = ($size['width'] - 200);
        $yyy_final = ($size['height'] - 10);
        // $pdf->Image($name . '.png', $xxx_final, $yyy_final, 0, 0, 'png');
    }
    @unlink("../manage_product/".$name . '.png');

    // Output PDF with watermark 
    $pdf->Output();
}
