
<?php
require('assets/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php'); //ธรรมดา
$pdf->AddFont('THSarabunPSK-Bold', '', 'THSarabun Bold.php'); //หนา
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0);

$result = $this->db->query('SELECT * FROM SCHOOL
 INNER JOIN CLS_SUBDISTRICT ON SCHOOL.SchoolAddressSubdistrictCode = CLS_SUBDISTRICT.SUBDISTRICT_CODE
 INNER JOIN CLS_DISTRICT ON SCHOOL.SchoolAddressDistrictCode = CLS_DISTRICT.DISTRICT_CODE
 INNER JOIN CLS_PROVINCE ON SCHOOL.SchoolAddressProvinceCode = CLS_PROVINCE.PROVINCE_CODE
 INNER JOIN CLS_JURISDICTION ON SCHOOL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
 WHERE SchoolID = ' . $_GET['SchoolID'] . '
 ');
foreach ($result->result() as $SCHOOL) {
    $SchoolName = $SCHOOL->SchoolNameThai;
    $SchoolAddressSubdistrictCode = $SCHOOL->SUBDISTRICT_NAME;
    $SchoolAddressDistrictCode = $SCHOOL->DISTRICT_NAME;
    $SchoolAddressProvinceCode = $SCHOOL->PROVINCE_NAME;
    $JurisdictionCode = $SCHOOL->JURISDICTION_NAME;
    $pdf->Image('assets/school/img/' . $SCHOOL->ImageSchool, 90, 15, -850);
}

$pdf->SetFont('THSarabunPSK-Bold', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
$pdf->SetFont('THSarabunPSK-Bold', '', 25);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'สมุดรายงาน'), 0, 1, 'C');
$pdf->SetFont('THSarabunPSK-Bold', '', 18);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'ผลการพัฒนาคุณภาพผู้เรียนรายบุคคล'), 0, 1, 'C');

$result = $this->db->query('SELECT * FROM TRANSCRIPT
    INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT.OldSchoolLastGradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
    INNER JOIN CLS_PREFIX ON TRANSCRIPT.GraduatedPrefixCode = CLS_PREFIX.PREFIX_CODE
    WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"
    GROUP BY EducationYear, OldSchoolLastGradeLevelCode ASC
    ');
foreach ($result->result() as $TRANSCRIPT) {
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'ชั้น' . $TRANSCRIPT->GRADE_LEVEL_NAME), 0, 1, 'C',);
    $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', 'โรงเรียน   '), 0, 0, 'R');
    $pdf->SetFont('THSarabunPSK', '', 18);
    $pdf->Cell(65, 10, iconv('UTF-8', 'cp874', $SchoolName), 0, 0, 'L');
    $pdf->SetFont('THSarabunPSK-Bold', '', 18);
    $pdf->Cell(25, 10, iconv('UTF-8', 'cp874', '      ตำบล'), 0, 0, 'L');
    $pdf->SetFont('THSarabunPSK', '', 18);
    $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', ' ' . $SchoolAddressSubdistrictCode), 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('THSarabunPSK-Bold', '', 18);
    $pdf->Cell(47, 10, iconv('UTF-8', 'cp874', 'อำเภอ   '), 0, 0, 'R');
    $pdf->SetFont('THSarabunPSK', '', 18);
    $pdf->Cell(68, 10, iconv('UTF-8', 'cp874', '  ' . $SchoolAddressDistrictCode), 0, 0, 'L');
    $pdf->SetFont('THSarabunPSK-Bold', '', 18);
    $pdf->Cell(25, 10, iconv('UTF-8', 'cp874', '      จังหวัด'), 0, 0, 'L');
    $pdf->SetFont('THSarabunPSK', '', 18);
    $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', ' ' . $SchoolAddressProvinceCode), 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('THSarabunPSK-Bold', '', 18);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C',);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874',  $JurisdictionCode), 0, 1, 'C',);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874',  'ปีการศึกษา   ' . $_GET['EducationYear']), 0, 1, 'C');
    $pdf->Cell(0, -6, iconv('UTF-8', 'cp874',  '                 _______'), 0, 1, 'C');
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', ''), 0, 1, 'C',);
    $pdf->Ln();
    $pdf->SetFont('THSarabunPSK', '', 14);
    $pdf->Cell(83, 35, iconv('UTF-8', 'cp874',  ''), 0, 0);
    $pdf->Cell(25, 32, iconv('UTF-8', 'cp874',  'ติดรูปถ่าย'), 1, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('THSarabunPSK-Bold', '', 18);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'ชื่อ-นามสกุล : ' . $TRANSCRIPT->PREFIX_NAME . $TRANSCRIPT->GraduatedNameThai . '   ' . $TRANSCRIPT->GraduatedLastNameThai), 0, 1, 'C',);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'รหัสประจำตัวนักเรียน : ' . $TRANSCRIPT->GraduatedStudentID), 0, 1, 'C');
    $pdf->Ln();
    $pdf->Cell(0, 25, iconv('UTF-8', 'cp874', ''), 0, 1, 'C',);
    $pdf->Cell(80, 10, iconv('UTF-8', 'cp874', 'ครูประจำชั้นคนที่ 1 : '), 0, 0, 'R');
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', '____________________________'), 0, 0);
    $pdf->Ln();
    $pdf->Cell(80, 10, iconv('UTF-8', 'cp874', 'ครูประจำชั้นคนที่ 2 : '), 0, 0, 'R');
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', '____________________________'), 0, 0);
    $pdf->Ln();
}


$pdf->AddPage();

$result = $this->db->query('SELECT * FROM STUDENT
    INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
    INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
    WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
foreach ($result->result() as $STUDENT) {
    $pdf->SetFont('THSarabunPSK', '', 16);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874',  '1'), 0, 0, 'R');
    $pdf->Ln();
    $pdf->SetFont('THSarabunPSK-Bold', '', 22);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'ข้อมูลส่วนตัวผู้เรียน'), 0, 1, 'C');
}
//$pdf->Output('D', 'Transcript_' . $_GET['TranscriptSeriesNumber'] . $_GET['TranscriptNumber'] . '.pdf'); 
$pdf->Output();
