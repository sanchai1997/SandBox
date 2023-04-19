
<?php
require('assets/fpdf/fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php'); //ธรรมดา
$pdf->AddFont('THSarabunPSK-Bold', '', 'THSarabun Bold.php'); //หนา
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('THSarabunPSK-Bold', '', 18);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'แบบบรายงานผลการพัฒนาผู้เรียนรายบุคคล'), 0, 1, 'C',);
$pdf->Ln();

//$pdf->Output('D', 'Transcript_' . $_GET['TranscriptSeriesNumber'] . $_GET['TranscriptNumber'] . '.pdf'); 
$pdf->Output();
