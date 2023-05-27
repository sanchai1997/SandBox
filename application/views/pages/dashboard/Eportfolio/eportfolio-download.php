<?php
define('FPDF_FONTPATH', 'font/');
require('assets/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php'); //ธรรมดา
$pdf->AddFont('THSarabunPSK-Bold', '', 'THSarabun Bold.php'); //หนา
$pdf->SetTextColor(0, 0, 0);


$pdf->SetFont('THSarabunPSK-Bold', '', 60);
$pdf->Cell(0, 35, iconv('UTF-8', 'cp874', 'PORTFOLIO'), 0, 1, 'C');

foreach ($EPORTFOLIO as $ls) {    
    //$pdf->Image('assets/school/img/' . $SCHOOL->ImageSchool, 80, 90, 100);
}

$pdf->SetFont('THSarabunPSK', '', 30);

$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', '- แฟ้มสะสมผลงาน -'), 0, 1, 'C');

$result = $this->db->query('SELECT * FROM STUDENT
        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
        WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $StudentReferenceID . '"');

$pdf->Cell(60, 150, "", 0, 1, 'C');

foreach ($result->result() as $STUDENT) {
    $pdf->Image('assets/student/img/' . $STUDENT->ImageStudent, 60, 90, 90, 0);

    $pdf->Cell(60, 20, "", 0, 1, 'C');

    $pdf->SetFont('THSarabunPSK-Bold', '', 30);
    $pdf->Cell(0, 35, iconv('UTF-8', 'cp874',  $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . '  ' . $STUDENT->StudentLastNameThai), 0, 1, 'C');

    $SCHOOL = $this->db->query('SELECT * FROM SCHOOL
    WHERE SchoolID = "' . $STUDENT->SchoolID . '"');
    foreach ($SCHOOL->result() as $sc) {
        $pdf->SetFont('THSarabunPSK', '', 30);
        $pdf->Cell(0, 0, iconv('UTF-8', 'cp874', 'โรงเรียน' . $sc->SchoolNameThai), 0, 1, 'C');
    }

    
$pdf->Ln();

$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('THSarabunPSK', '', 30);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


/* --- Profile --- */
$pdf->SetFont('THSarabunPSK-Bold', '', 60);
$pdf->Cell(0, 35, iconv('UTF-8', 'cp874', 'Profile'), 0, 1, 'C');

$pdf->SetFont('THSarabunPSK', '', 30);
$pdf->Cell(0, 0, iconv('UTF-8', 'cp874', '- ประวัติส่วนตัว -'), 0, 1, 'C');


$pdf->SetFont('THSarabunPSK-Bold', '', 25);
$pdf->Cell(0, 20, iconv('UTF-8', 'cp874', ''), 0, 1, );
$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'ข้อมูลส่วนตัว'), 0, 1 );
$pdf->Line(9, 83, 200, 83);
$pdf->SetFont('THSarabunPSK', '', 25);
$pdf->SetLeftMargin(20); 
$pdf->Cell(0,5, iconv('UTF-8', 'cp874', ''), 0, 1, );
$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'ชื่อ-สกุล : ' .  $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . '  ' . $STUDENT->StudentLastNameThai), 0, 1);
$pdf->Cell(0, 5, iconv('UTF-8', 'cp874', 'วันเกิด : ' .  $STUDENT->StudentBirthDate ), 0, 1);

$result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
    foreach ($result->result() as $NATIONALITY) {
        if ($STUDENT->StudentNationalityCode == $NATIONALITY->NATIONALITY_CODE) {
            $pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'สัญชาติ : ' .  $NATIONALITY->NATIONALITY_NAME ), 0, 1);
        } 
}

$result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
    foreach ($result->result() as $RELIGION) {
        if ($STUDENT->StudentReligionCode == $RELIGION->RELIGION_CODE) {
            $pdf->Cell(0, 5, iconv('UTF-8', 'cp874', 'ศาสนา : ' .  $RELIGION->RELIGION_NAME ), 0, 1);
        } 
}

$result = $this->db->query('SELECT * FROM CLS_BLOOD');
    foreach ($result->result() as $BLOOD) {
        if ($STUDENT->StudentBloodCode == $BLOOD->BLOOD_CODE) {
            $pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'กรุ๊ปเลือด : ' .  $BLOOD->BLOOD_NAME ), 0, 1);
        } 
}


/* --- Profile --- */
$pdf->SetLeftMargin(10);
$pdf->SetFont('THSarabunPSK-Bold', '', 25);
$pdf->Cell(0, 20, iconv('UTF-8', 'cp874', ''), 0, 1, );
$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'ประวัติทางการศึกษา'), 0, 1 );
$pdf->Line(9, 178, 200, 178);
$pdf->SetFont('THSarabunPSK', '', 25);
$pdf->SetLeftMargin(20); 
$pdf->Cell(0,5, iconv('UTF-8', 'cp874', ''), 0, 1, );
$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', 'มัธยม 1-3 => เกรดเฉลี่ย : ' ), 0, 1);
$pdf->SetLeftMargin(46);
    $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID = ' . $STUDENT->SchoolID . '');
    foreach ($result->result() as $SCHOOL) {
        $SCHOOL_NAME = $SCHOOL->SchoolNameThai;
        $pdf->Cell(0, 5, iconv('UTF-8', 'cp874', '=> ' .  $SCHOOL_NAME ), 0, 1);  
    }
$pdf->Cell(0, 15, iconv('UTF-8', 'cp874', '=> ปีการศึกษาที่เริ่มเข้าเรียน ' .$STUDENT->SchoolAdmissionYear ), 0, 1);

$pdf->SetLeftMargin(0);

////////////////////////////////////////////////
$pdf->Ln();

$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('THSarabunPSK', '', 30);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

/* --- Profile --- */
$pdf->SetFont('THSarabunPSK-Bold', '', 60);
$pdf->Cell(0, 35, iconv('UTF-8', 'cp874', '- ผลงาน -'), 0, 1, 'C');

$result =   $this->db->select('*')
        ->where('DeleteStatus ', 0  ) 
        ->where('EPORTFOLIO_ID ',$ls->EPORTFOLIO_ID   ) 
        ->from('STUDENT_PROJECT')
        ->get();
$STUDENT_PROJECT =   $result->result();     

$pdf->SetFont('THSarabunPSK', '', 25);
foreach ($STUDENT_PROJECT as $pj) { 
    $pdf->Image('assets/Eportfolio/document/' . $pj->STUDENT_PROJECT_DOCUMENT, 60, 90, 90, 0);
    $pdf->Cell(60, 20,   $pj->STUDENT_PROJECT_DESCRIPTION , 0, 1, 'C');
}


////////////////////////////////////////////////
$pdf->Ln();

$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('THSarabunPSK', '', 30);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

/* --- Profile --- */
$pdf->SetFont('THSarabunPSK-Bold', '', 60);
$pdf->Cell(0, 35, iconv('UTF-8', 'cp874', '- กิจกรรม -'), 0, 1, 'C');

$result =   $this->db->select('*')
        ->where('DeleteStatus ', 0  ) 
        ->where('EPORTFOLIO_ID ',$ls->EPORTFOLIO_ID   ) 
        ->from('STUDENT_GOODNESS')
        ->get();
$STUDENT_GOODNESS =   $result->result();      

$pdf->SetFont('THSarabunPSK', '', 25);
foreach ($STUDENT_GOODNESS as $gn) { 
    $pdf->Image('assets/Eportfolio/document/' . $gn->STUDENT_GOODNESS_DOCUMENT, 60, 90, 90, 0);
    $pdf->Cell(60, 20,   $gn->STUDENT_GOODNESS_DESCRIPTION , 0, 1, 'C');
}

 
}



$pdf->Output();

/*
$result = $this->db->query('SELECT * FROM TRANSCRIPT_SUBJECT
 INNER JOIN CLS_SUBJECT_TYPE ON TRANSCRIPT_SUBJECT.SubjectTypeCode = CLS_SUBJECT_TYPE.SUBJECT_TYPE_CODE
 INNER JOIN CLS_SUBJECT_GROUP ON TRANSCRIPT_SUBJECT.SubjectGroupCode = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE
 INNER JOIN CLS_GRADE ON TRANSCRIPT_SUBJECT.SubjectGradeCode = CLS_GRADE.GRADE_CODE
 WHERE TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
 AND TranscriptNumber = ' . $_GET['TranscriptNumber'] . '
 ORDER BY SubjectTypeCode,SubjectGroupCode ASC
 ');
$pdf->SetFont('THSarabunPSK', '', 14);
$i = 0;
$x = 0;
$CountThai = ['ก', 'ข', 'ค', 'ง', 'จ'];
$TotalCredit = 0;
$TotalCreditSub = 0;
$AgvGrade = 0;
foreach ($result->result() as $TRANSCRIPT_SUBJECT) {
    if ($TRANSCRIPT_SUBJECT->SubjectTypeCode == 01) {
        $TotalCredit += $TRANSCRIPT_SUBJECT->SubjectCredit;
    } elseif ($TRANSCRIPT_SUBJECT->SubjectTypeCode == 02) {
        $TotalCreditSub += $TRANSCRIPT_SUBJECT->SubjectCredit;
    }
    if ($TRANSCRIPT_SUBJECT->SubjectTypeCode == '08') {
        $pdf->Cell(13, 7, iconv('UTF-8', 'cp874', $CountThai[$x]), 1, 0, 'C');
        $x++;
    } else {
        $i++;
        $pdf->Cell(13, 7, iconv('UTF-8', 'cp874', $i), 1, 0, 'C');
        $AgvGrade += $TRANSCRIPT_SUBJECT->GRADE_NAME * $TRANSCRIPT_SUBJECT->SubjectCredit;
    }

    $pdf->Cell(17, 7, iconv('UTF-8', 'cp874', $TRANSCRIPT_SUBJECT->SubjectCode), 1, 0, 'C');
    $pdf->Cell(65, 7, iconv('UTF-8', 'cp874', '  ' . $TRANSCRIPT_SUBJECT->SubjectName), 1, 0);
    if ($TRANSCRIPT_SUBJECT->SubjectTypeCode != '08') {
        $pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $TRANSCRIPT_SUBJECT->SUBJECT_TYPE_NAME), 1, 0, 'C');
    } else {
        $pdf->Cell(30, 7, iconv('UTF-8', 'cp874', 'กิจกรรม'), 1, 0, 'C');
    }
    if ($TRANSCRIPT_SUBJECT->SubjectTypeCode != '08') {
        $pdf->Cell(20, 7, iconv('UTF-8', 'cp874', $TRANSCRIPT_SUBJECT->SubjectCredit), 1, 0, 'C');
    } else {
        $result = $this->db->query('SELECT * FROM CURRICULUM_SUBJECT
        WHERE CurriculumID = ' . $CURRICULUM_ID . '
        AND SubjectCode  = "' .  $TRANSCRIPT_SUBJECT->SubjectCode . '"
        ');
        foreach ($result->result() as $CURRICULUM_SUBJECT) {
            $pdf->Cell(20, 7, iconv('UTF-8', 'cp874', $CURRICULUM_SUBJECT->LearningHour), 1, 0, 'C');
        }
    }
    $pdf->Cell(20, 7, iconv('UTF-8', 'cp874', $TRANSCRIPT_SUBJECT->GRADE_NAME), 1, 0, 'C');
    $pdf->Cell(25, 7, iconv('UTF-8', 'cp874', ''), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Cell(90, 10, iconv('UTF-8', 'cp874', ''), 0, 1, 'C');
$pdf->SetFont('THSarabunPSK-Bold', '', 14);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', 'สรุปผลการประเมิน'), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '               ( _______________________________ )'), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  น้ำหนักวิชาพื้นฐาน'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $TotalCredit), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 15);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '               ครูประจำชั้น'), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  น้ำหนักวิชาเพิ่มเติม'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $TotalCreditSub), 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  ระดับผลการเรียนเฉลี่ย'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', number_format($AgvGrade / ($TotalCredit + $TotalCreditSub), 2)), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 15);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '              ( _______________________________ )'), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('THSarabunPSK-Bold', '', 14);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', 'ประเมินคุณลักษณะอันพึงประสงค์'), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 15);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '               ผู้อำนวยการโรงเรียน'), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  คุณลักษณะอันพึงประสงค์ของสถานศึกษา'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $ATTpassing), 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  การอ่าน คิดวิเคราะห์และเขียน'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $Litpassing), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 15);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '               ( _______________________________ )'), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(60, 7, iconv('UTF-8', 'cp874', '  กิจกรรมพัฒนาผู้เรียน'), 1, 0);
$pdf->Cell(30, 7, iconv('UTF-8', 'cp874', $Extrapassing), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 15);
$pdf->Cell(90, 7, iconv('UTF-8', 'cp874', '               ผู้ปกครอง'), 0, 0, 'C');

// $pdf->Output('D', 'Transcript_' . $_GET['TranscriptSeriesNumber'] . $_GET['TranscriptNumber'] . '.pdf');

*/
