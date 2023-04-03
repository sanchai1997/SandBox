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
                <h1>ข้อมูลผู้สำเร็จการศึกษา

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
                                        &nbsp;<a href="?" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
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
                            $result = $this->db->query('SELECT * FROM GRADUATED 
                            INNER JOIN CLS_GRADE_LEVEL  ON GRADUATED.GraduatedGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            WHERE DeleteStatus = 0 AND GraduatedSchoolID = ' . $_GET['SchoolID'] . '
                            GROUP BY EducationYear, Semester, GraduatedGradeLevelCode
                            ');
                            foreach ($result->result() as $GRADUATED) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $GRADUATED->EducationYear; ?></td>
                                    <td><?= $GRADUATED->Semester; ?></td>
                                    <td><?= $GRADUATED->GRADE_LEVEL_NAME; ?></td>
                                    <td style="text-align: center;"><a href="?SchoolID=<?= $GRADUATED->GraduatedSchoolID; ?>&&EducationYear=<?= $GRADUATED->EducationYear; ?>&&Semester=<?= $GRADUATED->Semester; ?>&&GradeLevelCode=<?= $GRADUATED->GraduatedGradeLevelCode; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                <?php } else if (!empty($_GET['SchoolID']) && !empty($_GET['EducationYear']) && !empty($_GET['Semester'])  && !empty($_GET['GradeLevelCode']) && !isset($_GET['ShowDetail'])) {
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
                                <th style="text-align: center;" scope="col">ใบแสดงผลการศึกษา</th>
                                <th style="text-align: center;" scope="col">ใบประกาศนียบัตร</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM GRADUATED WHERE DeleteStatus = 0');
                            foreach ($result->result() as $GRADUATED) {
                                $result = $this->db->query('SELECT * FROM STUDENT
                                    INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                    INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                                    INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                                    AND SchoolID = ' . $GRADUATED->GraduatedSchoolID . ' 
                                    AND StudentReferenceID = "' .  $GRADUATED->StudentReferenceID . '" 
                                    AND EducationYear = ' . $GRADUATED->EducationYear . ' 
                                    AND Semester = ' . $GRADUATED->Semester . ' 
                                    AND GradeLevelCode = ' . $GRADUATED->GraduatedGradeLevelCode . '
                                    ');
                                foreach ($result->result() as $STUDENT) {
                            ?>
                                    <tr>
                                        <td class="page-content" style="text-align: center;"><img src="assets/student/img/<?= $STUDENT->ImageStudent; ?>" alt="" width="100%" height="100%"></td>
                                        <td style="padding-top: 40px;"><?= $STUDENT->StudentID; ?></td>
                                        <td style="padding-top: 40px;"><?= $STUDENT->PREFIX_NAME; ?></td>
                                        <td style="padding-top: 40px;"><?= $STUDENT->StudentNameThai; ?></td>
                                        <td style="padding-top: 40px;"><?= $STUDENT->StudentLastNameThai; ?></td>
                                        <td style="padding-top: 40px;"><?= $STUDENT->STUDENT_STATUS_NAME; ?></td>
                                        <td style="padding-top: 35px; text-align: center;"><a class="btn btn-success"><i class="bi bi-download"></td>
                                        <td style="padding-top: 35px; text-align: center;"><a class="btn btn-success"><i class="bi bi-download"></td>
                                        <td style="padding-top: 35px; text-align: center;">
                                            <a href="?SchoolID=<?= $GRADUATED->GraduatedSchoolID; ?>&&StudentReferenceID=<?= $GRADUATED->StudentReferenceID ?>&&EducationYear=<?= $GRADUATED->EducationYear; ?>&&Semester=<?= $GRADUATED->Semester; ?>&&GradeLevelCode=<?= $GRADUATED->GraduatedGradeLevelCode; ?>&&ShowDetail=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                        </td>
                                        <td style="padding-top: 35px; text-align: center;">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $GRADUATED->StudentReferenceID; ?>"><i class=" bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>

                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title" style="padding-left: 25px;">
                                        <i class="bi bi-card-list"></i> รายละเอียดข้อมูล &nbsp;&nbsp;
                                        <?php if (isset($_GET['SchoolID'])) { ?>
                                            <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                        <?php } ?>
                                    </h3>
                                </div>
                                <?php
                                $result = $this->db->query('SELECT * FROM STUDENT
                            INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            INNER JOIN CLS_EDUCATION_LEVEL ON STUDENT.EducationLevelCode =  CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                            INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                            INNER JOIN CLS_GENDER ON STUDENT.StudentGenderCode = CLS_GENDER.GENDER_CODE
                            INNER JOIN CLS_PROVINCE ON STUDENT.StudentBirthProvinceCode = CLS_PROVINCE.PROVINCE_CODE
                            INNER JOIN CLS_NATIONALITY ON STUDENT.StudentNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                            INNER JOIN CLS_RACE ON STUDENT.StudentRaceCode = CLS_RACE.RACE_CODE
                            INNER JOIN CLS_RELIGION ON STUDENT.StudentReligionCode = CLS_RELIGION.RELIGION_CODE
                            INNER JOIN CLS_BLOOD ON STUDENT.StudentBloodCode = CLS_BLOOD.BLOOD_CODE
                            WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                                foreach ($result->result() as $STUDENT_DETAIL) {
                                ?>
                                    <div class="col">
                                        <h5 style="float: left; padding: 15px;" class="card-title">
                                        </h5>
                                    </div>
                            </div>
                            <div class="row">
                                <?php if ($STUDENT_DETAIL->ImageStudent != '') { ?>
                                    <div class="col-2" style="padding-bottom: 8px; padding-left: 70px; padding-top: 0px;">
                                        <div class="card page-detail">
                                            <img style=" text-align: center; padding: 15px;" src="assets/student/img/<?= $STUDENT_DETAIL->ImageStudent; ?>" alt="" width="100%" height="100%" style="padding-top: 20px;">
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-2" style="padding-bottom: 8px; padding-left: 60px; padding-top: 60px;">
                                        <div class="card">
                                            <h6 style="text-align: center; padding: 15px;">
                                                - ไม่พบรูปภาพ -
                                            </h6>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class=" col-10" style="padding-top: 0px; padding-left: 40px; padding-right: 60px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                ชื่อ-นามสกุล : <?= $STUDENT_DETAIL->PREFIX_NAME . $STUDENT_DETAIL->StudentNameThai . ' ' . $STUDENT_DETAIL->StudentLastNameThai ?> <?php if ($STUDENT_DETAIL->StudentNameEnglish != NULL && $STUDENT_DETAIL->StudentLastNameEnglish != NULL) {
                                                                                                                                                                                        echo ' (' . $STUDENT_DETAIL->StudentNameEnglish . ' ' . $STUDENT_DETAIL->StudentLastNameEnglish . ')';
                                                                                                                                                                                    } ?>
                                                <a style="float: right;" href="edit-forms-transcript-evaluation?" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            </h5>

                                            <div class="row">
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> รหัสประจำตัวนักเรียน: &nbsp;<?= $STUDENT_DETAIL->StudentID ?></label><br>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM GRADUATED
                                                        INNER JOIN CLS_GRADE_LEVEL ON GRADUATED.GraduatedGradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                                                        INNER JOIN CLS_EDUCATION_LEVEL ON GRADUATED.GraduatedEducationLevelCode =  CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                                                        WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $STUDENT_DETAIL->StudentReferenceID . '"');
                                                    foreach ($result->result() as $GRADUATED) {
                                                    ?>


                                                        <label style="padding-left: 25px;"> ปีการศึกษาที่สำเร็จการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedEducationYear == NULL) {
                                                                                                                                    echo '-';
                                                                                                                                } else echo $GRADUATED->GraduatedEducationYear; ?></label><br>
                                                        <label style="padding-left: 25px;"> วันที่สำเร็จการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedDate == NULL) {
                                                                                                                            echo '-';
                                                                                                                        } else echo DateThai($GRADUATED->GraduatedDate); ?></label><br>
                                                        <label style="padding-left: 25px;"> ระดับการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedEducationLevelCode == NULL) {
                                                                                                                        echo '-';
                                                                                                                    } else echo $GRADUATED->EDUCATION_LEVEL_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> ชั้นเรียน: &nbsp;<?php if ($GRADUATED->GraduatedGradeLevelCode == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $GRADUATED->GRADE_LEVEL_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> ลำดับการสำเร็จการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedOrderNumber == NULL) {
                                                                                                                                echo '-';
                                                                                                                            } else echo $GRADUATED->GraduatedOrderNumber; ?></label><br>
                                                </div>
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL
                                                        WHERE SchoolID = ' . $GRADUATED->GraduatedSchoolID . '');
                                                        foreach ($result->result() as $SCHOOL) {
                                                            $GraduatedSchool = $SCHOOL->SchoolNameThai;
                                                        }

                                                ?>
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> สถานศึกษา : &nbsp;<?= $GraduatedSchool ?></label><br>
                                                    <label style="padding-left: 25px;"> ปีการศึกษา: &nbsp;<?= $GRADUATED->EducationYear ?></label> &nbsp; &nbsp;
                                                    <label style="padding-left: 25px;"> ภาคเรียน: &nbsp;<?= $GRADUATED->Semester ?></label><br>
                                                    <label style="padding-left: 25px;"> ชุดที่ใบแสดงผลการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedTranscriptSeriesNumber == NULL) {
                                                                                                                            echo '-';
                                                                                                                        } else echo $GRADUATED->GraduatedTranscriptSeriesNumber; ?></label><br>
                                                    <label style="padding-left: 25px;"> เลขที่ใบแสดงผลการศึกษา: &nbsp;<?php if ($GRADUATED->GraduatedTranscriptNumber == NULL) {
                                                                                                                            echo '-';
                                                                                                                        } else echo $GRADUATED->GraduatedTranscriptNumber; ?></label><br>
                                                    <label style="padding-left: 25px;"> ใบประกาศนียบัตร: &nbsp;<?php if ($GRADUATED->CertificationNumber == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $GRADUATED->CertificationNumber; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class=" col-12" style="padding-top: 0px; padding-left: 60px; padding-right: 40px;">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลผู้อนุมัติสำเร็จการศึกษา
                                                            <a style="float: right;" href="edit-forms-transcript-evaluation?" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <label style="padding-left: 40px;"> ชื่อ-นามสกุล:&nbsp; <?php if ($GRADUATED->EndorserNameThai != NULL && $GRADUATED->EndorserLastNameThai != NULL) {
                                                                                                                    echo  $GRADUATED->EndorserNameThai . ' ' . $GRADUATED->EndorserLastNameThai;
                                                                                                                } else echo '-'; ?></label><br>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_POSITION
                                                         WHERE POSITION_CODE = "' . $GRADUATED->EndorserPositionCode . '"');
                                                        foreach ($result->result() as $POSITION) {
                                                            $EndorserPosition = $POSITION->POSITION_NAME;
                                                        }


                                                        ?>
                                                        <label style="padding-left: 40px;"> ตำแหน่ง: &nbsp;
                                                            <?php if ($GRADUATED->EndorserPositionCode == NULL) {
                                                                echo '-';
                                                            } else echo $EndorserPosition; ?>
                                                        </label><br>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            </div>
                        </div>


                    </div>
            </div>
    <?php
                                }
                            }
    ?>
        </div>



    </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
$result = $this->db->query('SELECT * FROM GRADUATED WHERE DeleteStatus = 0');
foreach ($result->result() as $GRADUATED) {
?>
    <div class="modal fade" id="Delete<?= $GRADUATED->StudentReferenceID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-graduated/' . $GRADUATED->StudentReferenceID  . '/' . $GRADUATED->GraduatedSchoolID  . '/' . $GRADUATED->EducationYear . '/' . $GRADUATED->Semester . '/' . $GRADUATED->GraduatedGradeLevelCode); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>