<style>
    .page-content img {
        max-width: 90px;
        height: 100px;
    }

    .page-detail img {
        max-width: 170px;
        height: 200px;
    }
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลผลสัมฤทธิ์ทางการศึกษา
                    <?php if (isset($_GET['SchoolID'])) { ?>
                        -
                        <?php
                        $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                        foreach ($result->result() as $SCHOOL) {
                            echo $SCHOOL->SchoolNameThai;
                        }
                        ?>
                    <?php } ?>
                </h1>
            </div>
            <div class="col-6" style="padding-right: 25px;">
            </div>
        </div>
    </div>

    <!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-check"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">

                <?php if (!isset($_GET['SchoolID'])) { ?>
                    <div class="row">
                        <div class="col">
                            <h1 class="card-title">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        เลือกสถานศึกษา
                                    </button>
                                    <?php if (isset($_GET['SchoolID'])) { ?>
                                        &nbsp;<a href="student" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
                                    <?php } ?>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM SCHOOL WHERE DeleteStatus = 0');
                                        foreach ($result->result() as $SHOW_SCHOOL) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="?SchoolID=<?= $SHOW_SCHOOL->SchoolID  ?>"><?= $SHOW_SCHOOL->SchoolNameThai  ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </h1>
                        </div>
                        <div class="col">
                            <?php if (isset($_GET['SchoolID'])) {
                            ?>
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i>เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ตราสัญลักษณ์</th>
                                <th scope="col">ชื่อสถานศึกษา</th>
                                <th scope="col">พื้นที่นวัตกรรม</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
                            foreach ($result->result() as $SCHOOL) {
                            ?>
                                <tr>
                                    <td class="page-content" style="text-align: center;"><img src="assets/school/img/<?= $SCHOOL->ImageSchool; ?>" alt="" width="90px" height="80px"></td>
                                    <td style="padding-top: 40px;"><?= $SCHOOL->SchoolNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                    <td style="padding-top: 35px; text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else if (isset($_GET['SchoolID']) && empty($_GET['EducationYear']) && empty($_GET['Semester']) && empty($_GET['GradeLevelCode']) && !isset($_GET['ShowDetail'])) { ?>
                    <div class="row">
                        <div class="col">
                            <h1 class="card-title">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        เลือกสถานศึกษา
                                    </button>
                                    <?php if (isset($_GET['SchoolID'])) { ?>
                                        &nbsp;<a href="transcript" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
                                    <?php } ?>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM SCHOOL WHERE DeleteStatus = 0');
                                        foreach ($result->result() as $SHOW_SCHOOL) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="?SchoolID=<?= $SHOW_SCHOOL->SchoolID  ?>"><?= $SHOW_SCHOOL->SchoolNameThai  ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </h1>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ระดับชั้นเรียน</th>
                                <th style="text-align: center;" scope="col">รายชื่อนักเรียน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM STUDENT 
                            INNER JOIN CLS_GRADE_LEVEL  ON STUDENT.GradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . '
                            GROUP BY EducationYear, Semester, GradeLevelCode
                            ');
                            foreach ($result->result() as $STUDENT) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $STUDENT->EducationYear; ?></td>
                                    <td><?= $STUDENT->Semester; ?></td>
                                    <td><?= $STUDENT->GRADE_LEVEL_NAME; ?></td>
                                    <td style="text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                <?php } else if (!empty($_GET['SchoolID']) && !empty($_GET['EducationYear']) && !empty($_GET['Semester'])  && !empty($_GET['GradeLevelCode']) && !isset($_GET['StudentID'])) {
                    $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
                    foreach ($result->result() as $GRADE_LEVEL) {
                        $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
                    }
                ?>
                    <div class="row">
                        <div class="col">
                            <h1 class="card-title">
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    <a href="?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <?php } ?>
                                <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?></b></a>
                            </h1>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">รูปภาพ</th>
                                <th scope="col">รหัสประจำตัวนักเรียน</th>
                                <th scope="col">คำนำหน้า</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">สถานภาพ</th>
                                <th style="text-align: center;" scope="col">สมุดพก</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM STUDENT
                            INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                            INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                            WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . ' AND EducationYear = ' . $_GET['EducationYear'] . ' AND Semester = ' . $_GET['Semester'] . ' AND GradeLevelCode = ' . $_GET['GradeLevelCode'] . '');
                            foreach ($result->result() as $STUDENT) {
                            ?>
                                <tr>
                                    <td class="page-content" style="text-align: center;"><img src="assets/student/img/<?= $STUDENT->ImageStudent; ?>" alt="" width="100%" height="100%"></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentID; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->PREFIX_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentLastNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->STUDENT_STATUS_NAME; ?></td>
                                    <td style="padding-top: 40px; text-align: center;">
                                        <a target="_blank" href="" class="btn btn-info"><i class="bi bi-printer"></i> พิมพ์</a>
                                    </td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <a href="?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&StudentID=<?= $STUDENT->StudentID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                <?php
                } else if (!empty($_GET['StudentReferenceID']) && !isset($_GET['TranscriptSeriesNumber']) && !isset($_GET['TranscriptNumber'])) {
                    $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
                    foreach ($result->result() as $GRADE_LEVEL) {
                        $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
                    }
                ?>
                    <div class="row">
                        <div class="col-9">
                            <h1 class="card-title">
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <?php } ?>
                                <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?> &nbsp;รหัสนักเรียน: <?= $_GET['StudentID'] ?></b></a>
                            </h1>
                        </div>
                        <div class="col-3">
                            <?php if (isset($_GET['SchoolID'])) {
                            ?>
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>

                                <th style="text-align: center;" scope="col">ใบแสดงผลการศึกษาชุดที่</th>
                                <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                                <th style="text-align: center;" scope="col">ภาคเรียน</th>
                                <th scope="col">ชั้นเรียน</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM TRANSCRIPT
                            INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT.OldSchoolLastGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"
                            ');
                            $Count = 0;
                            foreach ($result->result() as $TRANSCRIPT) {
                                $Count++;
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $TRANSCRIPT->TranscriptSeriesNumber . ' - ' . $TRANSCRIPT->TranscriptNumber; ?></td>
                                    <td style="text-align: center;"><?= $TRANSCRIPT->EducationYear; ?></td>
                                    <td style="text-align: center;"><?= $TRANSCRIPT->Semester; ?></td>
                                    <td><?= $TRANSCRIPT->GRADE_LEVEL_NAME; ?></td>
                                    <td style="text-align: center;">
                                        <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $Count ?>"><i class=" bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php
                } else  if (!empty($_GET['StudentReferenceID']) && !empty($_GET['TranscriptSeriesNumber']) && !empty($_GET['TranscriptNumber'])) {
                ?>
                    <div class="row">
                        <div class="col-9">
                            <h1 class="card-title">
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <?php } ?>
                            </h1>
                        </div>
                        <div class="col-3">
                            <h5 style="float: right; padding: 15px;" class="card-title"></h5>
                        </div>
                    </div>
                    <?php
                    $result = $this->db->query('SELECT * FROM TRANSCRIPT 
                     WHERE TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
                     AND TranscriptNumber = ' . $_GET['TranscriptNumber'] . '
                     AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"
                     ');
                    foreach ($result->result() as $TRANSCRIPT) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 20px;" class="card-title">
                                            <b>ใบแสดงผลการศึกษาชุดที่: <?= $_GET['TranscriptSeriesNumber']; ?> - <?= $_GET['TranscriptNumber']; ?></b>
                                            <?php if ($TRANSCRIPT->FundamentalSubjectPassingCode == 1 && $TRANSCRIPT->LiteracyPassingCode == 1 && $TRANSCRIPT->AttributePassingCode == 1 && $TRANSCRIPT->ExtracurricularPassingCode == 1) { ?>
                                                <a style="float: right;" target="_blank" href="transcript-download?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber'] ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber'] ?>&&EducationYear=<?= $TRANSCRIPT->EducationYear ?>&&Semester=<?= $TRANSCRIPT->Semester ?>" class="btn btn-success"><i class="bi bi-download"></i> ดาวน์โหลด</a>

                                            <?php } ?>
                                        </h5>
                                        <div class="row">
                                            <div class="col-4" style="text-align: left;  padding-bottom: 5px;">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM STUDENT
                                                        INNER JOIN CLS_CITIZEN_ID_TYPE ON STUDENT.StudentPersonalIDTypeCode =  CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                                                        INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                                        INNER JOIN CLS_EDUCATION_LEVEL ON STUDENT.EducationLevelCode =  CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                                                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                                                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                                                        WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                                                foreach ($result->result() as $STUDENT_DETAIL) {
                                                ?>
                                                    <label style="padding-left: 25px;"> รหัสประจำตัวนักเรียน: &nbsp;<?= $STUDENT_DETAIL->StudentID ?></label><br>
                                                    <label style="padding-left: 25px;"> ชื่อ-นามสกุล: &nbsp;<?= $STUDENT_DETAIL->PREFIX_NAME ?><?= $STUDENT_DETAIL->StudentNameThai ?> <?= $STUDENT_DETAIL->StudentLastNameThai ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับการศึกษา: &nbsp;<?= $STUDENT_DETAIL->EDUCATION_LEVEL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> ห้องเรียน: &nbsp;<?php if ($STUDENT_DETAIL->Classroom == '') {
                                                                                                                echo '-';
                                                                                                            } else {
                                                                                                                echo $STUDENT_DETAIL->Classroom;
                                                                                                            } ?></label><br>
                                                <?php } ?>
                                            </div>
                                            <div class="col-4" style="text-align: left;  padding-bottom: 5px;">
                                                <label style="padding-left: 40px;"><b>ข้อมูลสถานศึกษา</b></label><br>
                                                <label style="padding-left: 60px; padding-top: 10px;">สถานศึกษา :&nbsp;
                                                    <?php if ($TRANSCRIPT->OldSchoolID != '') {
                                                        $result = $this->db->query('SELECT * FROM SCHOOL 
                                                        WHERE SchoolID = ' . $TRANSCRIPT->OldSchoolID . '
                                                        ');
                                                        foreach ($result->result() as $SCHOOL) {
                                                            echo $SCHOOL->SchoolNameThai;
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                                <label style="padding-left: 60px; padding-top: 10px;">ชั้นเรียน :&nbsp;
                                                    <?php if ($TRANSCRIPT->OldSchoolLastGradeLevelCode != '') {
                                                        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL 
                                                         WHERE GRADE_LEVEL_CODE = ' . $TRANSCRIPT->OldSchoolLastGradeLevelCode . '
                                                         ');
                                                        foreach ($result->result() as $GRADE_LEVEL) {
                                                            echo $GRADE_LEVEL->GRADE_LEVEL_NAME;
                                                            $GANDENAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                            </div>
                                            <div class="col-4" style="text-align: left;  padding-bottom: 5px;">
                                                <label style="padding-left: 40px;"><b>ข้อมูลปีการศึกษา</b></label><br>
                                                <label style="padding-left: 60px; padding-top: 10px;">ปีการศึกษา :&nbsp;
                                                    <?php if ($TRANSCRIPT->EducationYear != '') {
                                                        echo $TRANSCRIPT->EducationYear;
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                                <label style="padding-left: 60px; padding-top: 10px;">ภาคเรียน :&nbsp;
                                                    <?php if ($TRANSCRIPT->Semester != '') {
                                                        echo $TRANSCRIPT->Semester;
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 20px;" class="card-title">
                                            <a style="float: right;" href="edit-forms-transcript-evaluation?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <div class="row">
                                            <div class="col-7">

                                                <label><b>ข้อมูลผลการประเมิน</b>
                                                </label><br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label style="padding-top: 10px;">รายวิชาพื้นฐาน :&nbsp;
                                                            <?php if ($TRANSCRIPT->FundamentalEvaluationCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_FUNDAMENTAL_SUBJECT_EVALUATION 
                                                         WHERE FUNDAMENTAL_SUBJECT_EVALUATION_CODE = ' . $TRANSCRIPT->FundamentalEvaluationCode . '
                                                         ');
                                                                foreach ($result->result() as $FUNDAMENTAL_SUBJECT_EVALUATION) {
                                                                    echo $FUNDAMENTAL_SUBJECT_EVALUATION->FUNDAMENTAL_SUBJECT_EVALUATION_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                        <label style="padding-top: 10px;">การอ่าน วิเคราะห์ และเขียน :&nbsp;
                                                            <?php if ($TRANSCRIPT->LiteracyEvaluationCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_LITERACY_EVALUATION 
                                                         WHERE LITERACY_EVALUATION_CODE = ' . $TRANSCRIPT->LiteracyEvaluationCode . '
                                                         ');
                                                                foreach ($result->result() as $LITERACY_EVALUATION) {
                                                                    echo $LITERACY_EVALUATION->LITERACY_EVALUATION_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                    </div>
                                                    <div class="col-6">
                                                        <label style="padding-top: 10px;">คุณลักษณะอันพึงประสงค์ :&nbsp;
                                                            <?php if ($TRANSCRIPT->AttributeEvaluationCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_ATTRIBUTE_EVALUATION 
                                                         WHERE ATTRIBUTE_EVALUATION_CODE = ' . $TRANSCRIPT->AttributeEvaluationCode . '
                                                         ');
                                                                foreach ($result->result() as $ATTRIBUTE_EVALUATION) {
                                                                    echo $ATTRIBUTE_EVALUATION->ATTRIBUTE_EVALUATION_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                        <label style="padding-top: 10px;">กิจกรรมพัฒนาผู้เรียน :&nbsp;
                                                            <?php if ($TRANSCRIPT->AttributeEvaluationCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_EXTRACURRICULAR_EVALUATION 
                                                         WHERE EXTRACURRICULAR_EVALUATION_CODE = ' . $TRANSCRIPT->AttributeEvaluationCode . '
                                                         ');
                                                                foreach ($result->result() as $EXTRACURRICULAR_EVALUATION) {
                                                                    echo $EXTRACURRICULAR_EVALUATION->EXTRACURRICULAR_EVALUATION_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5" style="text-align: left; padding-bottom: 5px;">
                                                <label><b>ข้อมูลผลการตัดสิน</b></label><br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label style="padding-top: 10px;">รายวิชาพื้นฐาน:&nbsp;
                                                            <?php if ($TRANSCRIPT->FundamentalSubjectPassingCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_FUNDAMENTAL_SUBJECT_PASSING 
                                                         WHERE FUNDAMENTAL_SUBJECT_PASSING_CODE = ' . $TRANSCRIPT->FundamentalSubjectPassingCode . '
                                                         ');
                                                                foreach ($result->result() as $FUNDAMENTAL_SUBJECT_PASSING) {
                                                                    echo $FUNDAMENTAL_SUBJECT_PASSING->FUNDAMENTAL_SUBJECT_PASSING_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                        <label style="padding-top: 10px;">การอ่าน วิเคราะห์ และเขียน :&nbsp;
                                                            <?php if ($TRANSCRIPT->LiteracyPassingCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_LITERACY_PASSING 
                                                         WHERE LITERACY_PASSING_CODE = ' . $TRANSCRIPT->LiteracyPassingCode . '
                                                         ');
                                                                foreach ($result->result() as $LITERACY_PASSING) {
                                                                    echo $LITERACY_PASSING->LITERACY_PASSING_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                    </div>
                                                    <div class="col-6">
                                                        <label style="padding-top: 10px;">คุณลักษณะอันพึงประสงค์ :&nbsp;
                                                            <?php if ($TRANSCRIPT->AttributePassingCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_ATTRIBUTE_PASSING 
                                                         WHERE ATTRIBUTE_PASSING_CODE = ' . $TRANSCRIPT->AttributePassingCode . '
                                                         ');
                                                                foreach ($result->result() as $ATTRIBUTE_PASSING) {
                                                                    echo $ATTRIBUTE_PASSING->ATTRIBUTE_PASSING_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                        <label style="padding-top: 10px;">กิจกรรมพัฒนาผู้เรียน :&nbsp;
                                                            <?php if ($TRANSCRIPT->ExtracurricularPassingCode != '') {
                                                                $result = $this->db->query('SELECT * FROM CLS_EXTRACURRICULAR_PASSING 
                                                         WHERE EXTRACURRICULAR_PASSING_CODE = ' . $TRANSCRIPT->ExtracurricularPassingCode . '
                                                         ');
                                                                foreach ($result->result() as $EXTRACURRICULAR_PASSING) {
                                                                    echo $EXTRACURRICULAR_PASSING->EXTRACURRICULAR_PASSING_NAME;
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }  ?>
                                                        </label><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการเรียนรายวิชา</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>&&TranscriptSemester=<?= $TRANSCRIPT->Semester; ?>&&OldSchoolLastGradeLevelCode=<?= $TRANSCRIPT->OldSchoolLastGradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td scope="col">รหัสวิชา</td>
                                                    <td scope="col">ชื่อวิชา</td>
                                                    <td scope="col">ประเภทรายวิชา</td>
                                                    <td scope="col">กลุ่มสาระการเรียนรู้</td>
                                                    <td style="text-align: center;" scope="col">หน่วยกิต</td>
                                                    <td style="text-align: center;" scope="col">ผลการเรียน</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_SUBJECT 
                                                    INNER JOIN CLS_SUBJECT_TYPE ON TRANSCRIPT_SUBJECT.SubjectTypeCode = CLS_SUBJECT_TYPE.SUBJECT_TYPE_CODE
                                                    INNER JOIN CLS_SUBJECT_GROUP ON TRANSCRIPT_SUBJECT.SubjectGroupCode = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                    ORDER BY SubjectTypeCode,SubjectGroupCode ASC
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_SUBJECT) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SubjectCode ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SubjectName ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SUBJECT_TYPE_NAME ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SUBJECT_GROUP_NAME ?></td>
                                                            <td style="text-align: center;">
                                                                <?php if ($TRANSCRIPT_SUBJECT->SubjectCredit == 0) {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TRANSCRIPT_SUBJECT->SubjectCredit;
                                                                } ?>
                                                            </td>
                                                            <td style="text-align: center;"><?php if ($TRANSCRIPT_SUBJECT->SubjectGradeCode == NULL) {
                                                                                                echo '-';
                                                                                            } else {
                                                                                                $result = $this->db->query('SELECT * FROM CLS_GRADE WHERE GRADE_CODE = ' . $TRANSCRIPT_SUBJECT->SubjectGradeCode . '');
                                                                                                foreach ($result->result() as $GRADE) {
                                                                                                    echo $GRADE->GRADE_NAME;
                                                                                                }
                                                                                            } ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="8"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>กิจกรรมพัฒนาผู้เรียน</b>
                                            <a style="float: right;" href="transcript-activity?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>&&TranscriptSemester=<?= $TRANSCRIPT->Semester; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td scope="col">ชื่อกิจกรรม</td>
                                                    <td style="text-align: center;" scope="col">จำนวนชั่วโมง</td>
                                                    <td style="text-align: center;" scope="col">ผลการประเมิน</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT *  FROM TRANSCRIPT_EXTRACURRICULAR_ACTIVITY 
                                                    INNER JOIN CLS_ACTIVITY_PASSING ON TRANSCRIPT_EXTRACURRICULAR_ACTIVITY.ActivityPassingCode = CLS_ACTIVITY_PASSING.ACTIVITY_PASSING_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_EXTRACURRICULAR_ACTIVITY) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_EXTRACURRICULAR_ACTIVITY->ActivityName ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_EXTRACURRICULAR_ACTIVITY->ActivityHour ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_EXTRACURRICULAR_ACTIVITY->ACTIVITY_PASSING_NAME ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการการทดสอบระดับขั้นพื้นฐาน O-NET</b>
                                            <a style="float: right;" href="transcript-onet?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td scope="col">ชั้นปีการทดสอบ</td>
                                                    <td scope="col">กลุ่มสาระวิชา</td>
                                                    <td style="text-align: center;" scope="col">ผลการทดสอบ</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_ONET 
                                                    INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT_ONET.ONETGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                                    INNER JOIN CLS_SUBJECT_GROUP ON TRANSCRIPT_ONET.ONETSubjectGroupCode = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE
                                                    INNER JOIN CLS_GRADE ON TRANSCRIPT_ONET.ONETSubjectGradeCode = CLS_GRADE.GRADE_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_ONET) {

                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_ONET->GRADE_LEVEL_NAME ?></td>
                                                            <td><?= $TRANSCRIPT_ONET->SUBJECT_GROUP_NAME ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_ONET->GRADE_NAME ?></td>
                                                        </tr>

                                                    <?php }
                                                } else { ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="3"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลประเมินคุณภาพผู้เรียน</b>
                                            <a style="float: right;" href="transcript-nt?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>&&TranscriptSemester=<?= $TRANSCRIPT->Semester; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td scope="col">ชั้นปีการประเมิน</td>
                                                    <td style="text-align: center;" scope="col">คณิตศาสตร์</td>
                                                    <td style="text-align: center;" scope="col">ภาษาไทย</td>
                                                    <td style="text-align: center;" scope="col">คะแนนเฉลี่ย</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_NT 
                                                    INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT_NT.NTGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_NT) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_NT->GRADE_LEVEL_NAME ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_NT->NTMathScore ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_NT->NTThaiLanguageScore ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_NT->NTMeanScore ?></td>
                                                        </tr>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการประเมินความสามารถด้านการอ่าน</b>
                                            <a style="float: right;" href="transcript-rt?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>&&TranscriptSemester=<?= $TRANSCRIPT->Semester; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered table-fixed">
                                            <thead>
                                                <tr>
                                                    <td scope="col">ระดับการศึกษา</td>
                                                    <td scope="col">ระดับชั้นปี</td>
                                                    <td style="text-align: center;" scope="col">อ่านออกเสียง</td>
                                                    <td style="text-align: center;" scope="col">อ่านรู้เรื่อง</td>
                                                    <td style="text-align: center;" scope="col">คะแนนเฉลี่ย</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_RT 
                                                    INNER JOIN CLS_EDUCATION_LEVEL ON TRANSCRIPT_RT.RTEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                                                    INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT_RT.RTGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_RT) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_RT->EDUCATION_LEVEL_NAME ?></td>
                                                            <td><?= $TRANSCRIPT_RT->GRADE_LEVEL_NAME ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTPronounceScore ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTUnderstandingScore ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTMeanScore ?></td>
                                                        </tr>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="5"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>คุณภาพผู้เรียนตามสมรรถนะ</b>
                                            <a style="float: right;" href="transcript-competency?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>&&TranscriptEducationYear=<?= $TRANSCRIPT->EducationYear; ?>&&TranscriptSemester=<?= $TRANSCRIPT->Semester; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td scope="col">สมรรถนะ</td>
                                                    <td style="text-align: center;" scope="col">คะแนน</td>
                                                    <td style="text-align: center;" scope="col">ผลการประเมิณ</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_COMPETENCY 
                                                    INNER JOIN CLS_COMPETENCY ON TRANSCRIPT_COMPETENCY.CompetencyCode = CLS_COMPETENCY.COMPETENCY_CODE
                                                    INNER JOIN CLS_COMPETENCY_EVAULATION ON TRANSCRIPT_COMPETENCY.CompetencyEvaluationCode = CLS_COMPETENCY_EVAULATION.COMPETENCY_EVAULATION_CODE
                                                    WHERE DeleteStatus = 0
                                                    AND TranscriptSeriesNumber = ' . $TRANSCRIPT->TranscriptSeriesNumber . '
                                                    AND TranscriptNumber = ' . $TRANSCRIPT->TranscriptNumber . '
                                                     ');
                                                if ($result->result() == True) {
                                                    foreach ($result->result() as $TRANSCRIPT_COMPETENCY) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_COMPETENCY->COMPETENCY_NAME ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_COMPETENCY->CompetencyScore ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_COMPETENCY->COMPETENCY_EVAULATION_NAME ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="7"> - ไม่พบข้อมูล - </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
if (!empty($_GET['SchoolID']) && !empty($_GET['EducationYear']) && !empty($_GET['Semester'])  && !empty($_GET['GradeLevelCode']) && isset($_GET['StudentID'])) {
    $result = $this->db->query('SELECT * FROM TRANSCRIPT
        WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
    $CountI = 0;
    foreach ($result->result() as $TRANSCRIPT) {
        $CountI++;
?>
        <div class="modal fade" id="Delete<?= $CountI; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                        <h6>
                            <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url('delete-transcript/'  . $_GET['SchoolID'] . '/' . $TRANSCRIPT->StudentReferenceID . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID'] . '/' . $TRANSCRIPT->TranscriptSeriesNumber  . '/' . $TRANSCRIPT->TranscriptNumber); ?>" class="btn btn-danger">ลบ</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>