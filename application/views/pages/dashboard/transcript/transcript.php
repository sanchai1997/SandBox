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
                                <th>ใบแสดงผลการศึกษาชุดที่</th>
                                <th scope="col">ใบแสดงผลการศึกษาเลขที่</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM TRANSCRIPT
                            WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                            $Count = 0;
                            foreach ($result->result() as $TRANSCRIPT) {
                                $Count++;
                            ?>
                                <tr>
                                    <td><?= $TRANSCRIPT->TranscriptSeriesNumber; ?></td>
                                    <td><?= $TRANSCRIPT->TranscriptNumber; ?></td>
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
                    $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
                    foreach ($result->result() as $GRADE_LEVEL) {
                        $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
                    }
                ?>
                    <div class="row">
                        <div class="col-9">
                            <h1 class="card-title">
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <?php } ?>
                                <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?> &nbsp;รหัสนักเรียน: <?= $_GET['StudentID'] ?></b></a>
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
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 20px;" class="card-title">
                                            <b>ใบแสดงผลการศึกษาชุดที่: <?= $_GET['TranscriptSeriesNumber']; ?> &nbsp;เลขที่: <?= $_GET['TranscriptNumber']; ?></b>
                                            <a style="float: right;" href="edit-forms-transcript-main?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <div class="row">
                                            <div class="col-6" style="text-align: left; padding-left: 20px; padding-bottom: 5px;">
                                                <label style="padding-left: 30px;"><b>ข้อมูลสถานศึกษาที่สำเร็จการศึกษา</b></label><br>
                                                <label style="padding-left: 50px; padding-top: 10px;">สถานศึกษา :&nbsp;
                                                    <?php if ($TRANSCRIPT->GraduatedSchoolID != '') {
                                                        $result = $this->db->query('SELECT * FROM SCHOOL 
                                                        WHERE SchoolID = ' . $TRANSCRIPT->GraduatedSchoolID . '
                                                        ');
                                                        foreach ($result->result() as $SCHOOL) {
                                                            echo $SCHOOL->SchoolNameThai;
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                                <label style="padding-left: 50px; padding-top: 10px;">วันที่เริ่มเข้าเรียน :&nbsp;
                                                    <?php if ($TRANSCRIPT->GraduatedSchoolAdmissionDate != '') {
                                                        echo DateThai($TRANSCRIPT->GraduatedSchoolAdmissionDate);
                                                    } else {
                                                        echo '-';
                                                    }  ?>
                                                </label><br>
                                            </div>
                                            <div class="col-6" style="text-align: left; padding-left: 10px; padding-bottom: 5px;">
                                                <label style="padding-left: 40px;"><b>ข้อมูลสถานศึกษาเดิม</b></label><br>
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
                                                <label style="padding-left: 60px; padding-top: 10px;">ชั้นเรียนปีล่าสุด :&nbsp;
                                                    <?php if ($TRANSCRIPT->OldSchoolLastGradeLevelCode != '') {
                                                        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL 
                                                         WHERE GRADE_LEVEL_CODE = ' . $TRANSCRIPT->OldSchoolLastGradeLevelCode . '
                                                         ');
                                                        foreach ($result->result() as $GRADE_LEVEL) {
                                                            echo $GRADE_LEVEL->GRADE_LEVEL_NAME;
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 10px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 20px;" class="card-title">
                                            <a style="float: right;" href="edit-forms-transcript-evaluation?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <div class="row">
                                            <div class="col-6" style="text-align: left; padding-left: 40px; padding-bottom: 5px;">
                                                <label style="padding-left: 30px;"><b>ข้อมูลผลการประเมิน</b>
                                                </label><br>
                                                <label style="padding-left: 50px; padding-top: 10px;">รายวิชาพื้นฐาน :&nbsp;
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
                                                <label style="padding-left: 50px; padding-top: 10px;">การอ่าน วิเคราะห์ และเขียน :&nbsp;
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
                                                <label style="padding-left: 50px; padding-top: 10px;">คุณลักษณะอันพึงประสงค์ :&nbsp;
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
                                                <label style="padding-left: 50px; padding-top: 10px;">กิจกรรมพัฒนาผู้เรียน :&nbsp;
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
                                            <div class="col-6" style="text-align: left; padding-left: 40px; padding-bottom: 5px;">
                                                <label style="padding-left: 40px;"><b>ข้อมูลผลการตัดสิน</b></label><br>
                                                <label style="padding-left: 60px; padding-top: 10px;">รายวิชาพื้นฐาน:&nbsp;
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
                                                <label style="padding-left: 60px; padding-top: 10px;">การอ่าน วิเคราะห์ และเขียน :&nbsp;
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
                                                <label style="padding-left: 60px; padding-top: 10px;">คุณลักษณะอันพึงประสงค์ :&nbsp;
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
                                                <label style="padding-left: 60px; padding-top: 10px;">กิจกรรมพัฒนาผู้เรียน :&nbsp;
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการเรียนรายวิชา</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">รหัสวิชา</th>
                                                    <th scope="col">ชื่อวิชา</th>
                                                    <th scope="col">ประเภทรายวิชา</th>
                                                    <th scope="col">กลุ่มสาระการเรียนรู้</th>
                                                    <th style="text-align: center;" scope="col">หน่วยกิต</th>
                                                    <th style="text-align: center;" scope="col">ผลการเรียน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM TRANSCRIPT_SUBJECT 
                                                    INNER JOIN CLS_SUBJECT_TYPE ON TRANSCRIPT_SUBJECT.SubjectTypeCode = CLS_SUBJECT_TYPE.SUBJECT_TYPE_CODE
                                                    INNER JOIN CLS_SUBJECT_GROUP ON TRANSCRIPT_SUBJECT.SubjectGroupCode = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE
                                                    INNER JOIN CLS_GRADE ON TRANSCRIPT_SUBJECT.SubjectGradeCode = CLS_GRADE.GRADE_CODE
                                                    WHERE TranscriptSeriesNumber = "' . $TRANSCRIPT->TranscriptSeriesNumber . '"
                                                    AND TranscriptNumber = "' . $TRANSCRIPT->TranscriptNumber . '"
                                                     ');
                                                $CountSubject = 0;
                                                foreach ($result->result() as $TRANSCRIPT_SUBJECT) {
                                                    $CountSubject++;
                                                    if ($CountSubject != 0) {
                                                ?>
                                                        <tr>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SubjectCode ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SubjectName ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SUBJECT_TYPE_NAME ?></td>
                                                            <td><?= $TRANSCRIPT_SUBJECT->SUBJECT_GROUP_NAME ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_SUBJECT->SubjectCredit ?></td>
                                                            <td style="text-align: center;"><?= $TRANSCRIPT_SUBJECT->GRADE_NAME ?></td>
                                                        </tr>
                                                    <?php } else {
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                        </tr>
                                                <?php
                                                    }
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
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>กิจกรรมพัฒนาผู้เรียน</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ภาคเรียน</th>
                                                    <th scope="col">ชื่อกิจกรรม</th>
                                                    <th scope="col">จำนวนชั่วโมง</th>
                                                    <th scope="col">ผลการประเมิน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>กิจกรรมพัฒนาผู้เรียน</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ภาคเรียน</th>
                                                    <th scope="col">ชื่อกิจกรรม</th>
                                                    <th scope="col">จำนวนชั่วโมง</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการการทดสอบทางการศึกษาระดับขั้นพื้นฐาน O-NET</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ชั้นปีการทดสอบ</th>
                                                    <th scope="col">กลุ่มสาระวิชา</th>
                                                    <th scope="col">ผลการทดสอบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="4"> - ไม่พบข้อมูล - </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลประเมินคุณภาพผู้เรียน NT</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ภาคเรียน</th>
                                                    <th scope="col">ชั้นปี</th>
                                                    <th scope="col">คณิตศาสตร์</th>
                                                    <th scope="col">ภาษาไทย</th>
                                                    <th scope="col">คะแนนเฉลี่ย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="6"> - ไม่พบข้อมูล - </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>ผลการประเมินความสามารถด้านการอ่าน RT</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ภาคเรียน</th>
                                                    <th scope="col">ระดับการศึกษา</th>
                                                    <th scope="col">ชั้นปี</th>
                                                    <th scope="col">อ่านออกเสียง</th>
                                                    <th scope="col">อ่านรู้เรื่อง</th>
                                                    <th scope="col">คะแนนเฉลี่ย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="7"> - ไม่พบข้อมูล - </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="padding-left: 40px; padding-right: 40px;">
                                        <h5 style="text-align: left; padding-top: 25px;" class="card-title">
                                            <b>คุณภาพผู้เรียนตามสมรรถนะ</b>
                                            <a style="float: right;" href="transcript-subject?SchoolID=<?= $_GET['SchoolID'] ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>&&StudentID=<?= $_GET['StudentID'] ?>&&TranscriptSeriesNumber=<?= $TRANSCRIPT->TranscriptSeriesNumber; ?>&&TranscriptNumber=<?= $TRANSCRIPT->TranscriptNumber; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>
                                        </h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">ภาคเรียน</th>
                                                    <th scope="col">สมรรถนะ</th>
                                                    <th scope="col">คะแนน</th>
                                                    <th scope="col">ผลการประเมิณ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;" colspan="5"> - ไม่พบข้อมูล - </td>
                                                </tr>

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