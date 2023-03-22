<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">

                <h1>ข้อมูลนักเรียน
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
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ตราสัญลักษณ์</th>
                                <th scope="col">ชื่อสถานศึกษา</th>
                                <th scope="col">พื้นที่นวัตกรรม</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
                            foreach ($result->result() as $SCHOOL) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><img src="./assets/img/school/<?= $SCHOOL->ImageSchool; ?>" alt="" width="90px" height="80px"></td>
                                    <td style="padding-top: 30px;"><?= $SCHOOL->SchoolNameThai; ?></td>
                                    <td style="padding-top: 30px;"><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                    <td style="padding-top: 30px; text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
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
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                            <?php } ?>
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
                            WHERE DeleteStatus = 0
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
                            <?php if (isset($_GET['SchoolID'])) {
                            ?>
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student-select?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                            <?php } ?>
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
                                    <td style="text-align: center;"><img src="./assets/img/student/<?= $STUDENT->ImageStudent; ?>" alt="" width="80" height="90"></td>
                                    <td style="padding-top: 35px;"><?= $STUDENT->StudentID; ?></td>
                                    <td style="padding-top: 35px;"><?= $STUDENT->PREFIX_NAME; ?></td>
                                    <td style="padding-top: 35px;"><?= $STUDENT->StudentNameThai; ?></td>
                                    <td style="padding-top: 35px;"><?= $STUDENT->StudentLastNameThai; ?></td>
                                    <td style="padding-top: 35px;"><?= $STUDENT->STUDENT_STATUS_NAME; ?></td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <a href="?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                        &nbsp;&nbsp;<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $STUDENT->StudentReferenceID; ?>"><i class=" bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

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
                                        <i class="bi bi-card-list"></i> รายละเอียดข้อมูลนักเรียน &nbsp;&nbsp;
                                        <?php if (isset($_GET['SchoolID'])) { ?>
                                            <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                        <?php } ?>
                                    </h3>
                                </div>
                                <?php
                                $result = $this->db->query('SELECT * FROM STUDENT
                            INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            INNER JOIN CLS_EDUCATION_LEVEL ON STUDENT.EducationLevelCode =  CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                            INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
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
                                <div class="col-2" style="padding-bottom: 8px; padding-left: 60px; padding-top: 0px; ">
                                    <div class="card">
                                        <img style="text-align: center; padding-bottom: 15px; padding-left: 20px; padding-top: 15px;" src="./assets/img/student/<?= $STUDENT_DETAIL->ImageStudent ?>" alt="" width="90%" height="90%">
                                    </div>
                                </div>
                                <div class=" col-10" style="padding-top: 0px; padding-left: 40px; padding-right: 60px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 style="text-align: left; padding-left: 25px; padding-top: 30px;" class="card-title">
                                                ชื่อ-นามสกุล : <?= $STUDENT_DETAIL->PREFIX_NAME . $STUDENT_DETAIL->StudentNameThai . ' ' . $STUDENT_DETAIL->StudentLastNameThai ?> <?php if ($STUDENT_DETAIL->StudentNameEnglish != NULL && $STUDENT_DETAIL->StudentLastNameEnglish != NULL) {
                                                                                                                                                                                        echo ' (' . $STUDENT_DETAIL->StudentNameEnglish . ' ' . $STUDENT_DETAIL->StudentLastNameEnglish . ')';
                                                                                                                                                                                    } ?>
                                                <a style="float: right;" href="" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            </h5>

                                            <div class="row">
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> รหัสประจำตัวนักเรียน: &nbsp;<?= $STUDENT_DETAIL->StudentID ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับการศึกษา: &nbsp;<?= $STUDENT_DETAIL->EDUCATION_LEVEL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับชั้นเรียน: &nbsp;<?= $STUDENT_DETAIL->GRADE_LEVEL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> ห้องเรียน: &nbsp;<?= $STUDENT_DETAIL->Classroom ?></label><br>
                                                    <label style="padding-left: 25px;"> สถานภาพ: &nbsp;<?= $STUDENT_DETAIL->STUDENT_STATUS_NAME ?></label>
                                                </div>
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> ปีการศึกษา: &nbsp;<?= $STUDENT_DETAIL->EducationYear ?></label>
                                                    <label style="padding-left: 25px;"> ภาคเรียน: &nbsp;<?= $STUDENT_DETAIL->Semester ?></label><br>
                                                    <?php $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                                                    foreach ($result->result() as $SCHOOL) {
                                                        $SCHOOL_NAME = $SCHOOL->SchoolNameThai;
                                                    } ?>
                                                    <label style="padding-left: 25px;"> ปีการศึกษาที่เริ่มเข้าเรียน: &nbsp;<?= $STUDENT_DETAIL->SchoolAdmissionYear ?></label><br>
                                                    <label style="padding-left: 25px;"> ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษาปัจจุบัน: &nbsp;<?= $STUDENT_DETAIL->CurrentEducationLevelAdmissionYear ?></label><br>
                                                    <label style="padding-left: 25px;"> สถานศึกษา: &nbsp;<?= $SCHOOL_NAME ?></label>
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
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 30px;" class="card-title">
                                                    ข้อมูลบุคคล
                                                    <a style="float: right;" href="" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="row">
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> หมายเลขบัตรประจำตัวประชาชน: &nbsp;<?= $STUDENT_DETAIL->StudentPersonalID ?></label><br>
                                                        <label style="padding-left: 25px;"> เลขที่หนังสือเดินทาง: &nbsp;<?php if ($STUDENT_DETAIL->StudentPassportNumber == NULL) {
                                                                                                                            echo '-';
                                                                                                                        } else echo $STUDENT_DETAIL->StudentPassportNumber; ?></label><br>
                                                        <label style="padding-left: 25px;"> เพศ: &nbsp;<?php if ($STUDENT_DETAIL->StudentGenderCode == NULL) {
                                                                                                            echo '-';
                                                                                                        } else echo $STUDENT_DETAIL->GENDER_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> น้ำหนัก: &nbsp;<?php if ($STUDENT_DETAIL->StudentWeight == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $STUDENT_DETAIL->StudentWeight; ?></label>
                                                        <label style="padding-left: 25px;"> ส่วนสูง: &nbsp;<?php if ($STUDENT_DETAIL->StudentHeight == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $STUDENT_DETAIL->StudentHeight; ?></label><br>

                                                    </div>
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> วันที่เกิด: &nbsp;<?php if ($STUDENT_DETAIL->StudentBirthDate == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo DateThai($STUDENT_DETAIL->StudentBirthDate); ?></label><br>
                                                        <label style="padding-left: 25px;"> สัญชาติ: &nbsp;<?php if ($STUDENT_DETAIL->StudentNationalityCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $STUDENT_DETAIL->NATIONALITY_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> กลุ่มเลือด: &nbsp;<?php if ($STUDENT_DETAIL->StudentBloodCode == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $STUDENT_DETAIL->BLOOD_NAME; ?></label><br>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE WHERE LANGUAGE_CODE = "' . $STUDENT_DETAIL->StudentLanguageCode . '"');
                                                        foreach ($result->result() as $LANGUAGE) {
                                                            $MAIN = $LANGUAGE->LANGUAGE_NAME;
                                                        }
                                                        ?>
                                                        <label style="padding-left: 25px;"> ภาษาหลัก: &nbsp;<?php if ($STUDENT_DETAIL->StudentLanguageCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $MAIN; ?></label><br>


                                                    </div>
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">

                                                        <label style="padding-left: 25px;"> จังหวัดที่เกิด: &nbsp;<?php if ($STUDENT_DETAIL->StudentBirthProvinceCode == NULL) {
                                                                                                                        echo '-';
                                                                                                                    } else echo $STUDENT_DETAIL->PROVINCE_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> เชื้อชาติ: &nbsp;<?php if ($STUDENT_DETAIL->StudentRaceCode == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $STUDENT_DETAIL->RACE_NAME; ?></label><br>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE WHERE LANGUAGE_CODE = "' . $STUDENT_DETAIL->StudentOtherLanguageCode . '"');
                                                        foreach ($result->result() as $LANGUAGE) {
                                                            $SUB = $LANGUAGE->LANGUAGE_NAME;
                                                        }
                                                        ?>
                                                        <label style="padding-left: 25px;"> ศาสนา: &nbsp;<?php if ($STUDENT_DETAIL->StudentReligionCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $STUDENT_DETAIL->RELIGION_NAME; ?></label><br>

                                                        <label style="padding-left: 25px;"> ภาษาอื่น: &nbsp;<?php if ($STUDENT_DETAIL->StudentOtherLanguageCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $SUB; ?></label>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
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
$result = $this->db->query('SELECT * FROM STUDENT WHERE DeleteStatus = 0');
foreach ($result->result() as $STUDENT) {
?>
    <div class="modal fade" id="Delete<?= $STUDENT->StudentReferenceID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-student/' . $STUDENT->StudentReferenceID  . '/' . $STUDENT->SchoolID  . '/' . $STUDENT->EducationYear . '/' . $STUDENT->Semester . '/' . $STUDENT->GradeLevelCode); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>