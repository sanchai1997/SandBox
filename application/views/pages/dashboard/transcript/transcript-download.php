<?php
define('FPDF_FONTPATH', 'font/');
require('assets/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php'); //ธรรมดา
$pdf->AddFont('THSarabunPSK-Bold', '', 'THSarabun Bold.php'); //หนา
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('THSarabunPSK-Bold', '', 18);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'แบบบรายงานผลการพัฒนาผู้เรียนรายบุคคล'), 0, 1, 'C');

$result = $this->db->query('SELECT * FROM SCHOOL
 WHERE SchoolID = "' . $_GET['SchoolID'] . '"
 ');
foreach ($result->result() as $SCHOOL) {
    
    $pdf->Image('assets/school/img/' . $SCHOOL->ImageSchool, 80, 90, 100);
}

$result = $this->db->query('SELECT * FROM TRANSCRIPT
 INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT.OldSchoolLastGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
 WHERE TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
 AND TranscriptNumber = ' . $_GET['TranscriptNumber'] . '
 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"
 ');

$pdf->SetFont('THSarabunPSK', '', 15);
foreach ($result->result() as $TRANSCRIPT) {

    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', '   ชั้น' . $TRANSCRIPT->GRADE_LEVEL_NAME . '   ปีการศึกษา ' . $TRANSCRIPT->EducationYear . '   ภาคเรียน ' . $TRANSCRIPT->Semester), 0, 0, 'C');
    $pdf->Ln();

    if ($TRANSCRIPT->AttributePassingCode != '') {
        $result = $this->db->query('SELECT * FROM CLS_ATTRIBUTE_PASSING 
    WHERE ATTRIBUTE_PASSING_CODE = ' . $TRANSCRIPT->AttributePassingCode . '
    ');
        foreach ($result->result() as $ATTRIBUTE_PASSING) {
            $ATTpassing = $ATTRIBUTE_PASSING->ATTRIBUTE_PASSING_NAME;
        }
    } else {
        $ATTpassing =  '-';
    }

    if ($TRANSCRIPT->LiteracyPassingCode != '') {
        $result = $this->db->query('SELECT * FROM CLS_LITERACY_PASSING 
        WHERE LITERACY_PASSING_CODE = ' . $TRANSCRIPT->LiteracyPassingCode . '
        ');
        foreach ($result->result() as $LITERACY_PASSING) {
            $Litpassing = $LITERACY_PASSING->LITERACY_PASSING_NAME;
        }
    } else {
        $Litpassing = '-';
    }

    if ($TRANSCRIPT->ExtracurricularPassingCode != '') {
        $result = $this->db->query('SELECT * FROM CLS_EXTRACURRICULAR_PASSING 
 WHERE EXTRACURRICULAR_PASSING_CODE = ' . $TRANSCRIPT->ExtracurricularPassingCode . '
 ');
        foreach ($result->result() as $EXTRACURRICULAR_PASSING) {
            $Extrapassing = $EXTRACURRICULAR_PASSING->EXTRACURRICULAR_PASSING_NAME;
        }
    } else {
        $Extrapassing =  '-';
    }


    $result = $this->db->query('SELECT * FROM CURRICULUM
    WHERE SchoolID = ' . $_GET['SchoolID'] . '
    AND EducationYear = ' . $_GET['EducationYear'] . '
    AND Semester = ' . $_GET['Semester'] . '
    AND GradeLevelCode = ' . $TRANSCRIPT->OldSchoolLastGradeLevelCode . '
    
    ');
    foreach ($result->result() as $CURRICULUM) {
        $CURRICULUM_ID = $CURRICULUM->CurriculumID;
    }
}

$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', 'แบบรายงานผลการพัฒนาผู้เรียนรายบุคคล'), 0, 1, 'C');

$result = $this->db->query('SELECT * FROM STUDENT
        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
        WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
foreach ($result->result() as $STUDENT) {
    $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', '  เลขประจำตัวนักเรียน  ' . $STUDENT->StudentID), 0, 0);
    $pdf->Cell(85, 10, iconv('UTF-8', 'cp874', 'ชื่อ-นามสกุล  ' . $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . '  ' . $STUDENT->StudentLastNameThai), 0, 0);
    $pdf->Cell(25, 10, iconv('UTF-8', 'cp874', 'ห้องที่  ' . $STUDENT->Classroom), 0, 0);
    $pdf->Cell(20, 10, iconv('UTF-8', 'cp874', 'เลขที่  '), 0, 0);
    $pdf->Ln();
    $pdf->Cell(60, -8, iconv('UTF-8', 'cp874', '                             ' . '___________'), 0, 0);
    $pdf->Cell(60, -8, iconv('UTF-8', 'cp874', '                ' . '_______________________________'), 0, 0);
    $pdf->Cell(25, -8, iconv('UTF-8', 'cp874', '                            ' . '______'), 0, 0);
    $pdf->Cell(25, -8, iconv('UTF-8', 'cp874', '                            ' . '_____'), 0, 0);
    $pdf->Ln();
}
$pdf->Cell(0, 10, "", 0, 1, 'C');
$pdf->SetFont('THSarabunPSK-Bold', '', 14);
$pdf->Cell(13, 10, iconv('UTF-8', 'cp874', 'ลำดับที่'), 1, 0, 'C');
$pdf->Cell(17, 10, iconv('UTF-8', 'cp874', 'รหัสวิชา'), 1, 0, 'C');
$pdf->Cell(65, 10, iconv('UTF-8', 'cp874', 'รายวิชา'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ประเภท'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'cp874', 'น้ำหนัก/เวลา'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'cp874', 'ผลการเรียน'), 1, 0, 'C');
$pdf->Cell(25, 10, iconv('UTF-8', 'cp874', 'หมายเหตุ'), 1, 0, 'C');
$pdf->Ln();

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
$pdf->Output();
