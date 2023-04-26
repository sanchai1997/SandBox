<style>
    .page-content img {
        max-width: 100%;
        height: 100%;
    }

    .page-detail img {
        max-width: 100%;
        height: 100%;
    }
</style>
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
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="120px" hight="120px">ตราสัญลักษณ์</th>
                                <th scope="col">รหัสสถานศึกษา</th>
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
                                    <?php if ($SCHOOL->ImageSchool != NULL) { ?>
                                        <td class="page-content" style="text-align: center;">

                                            <img src="assets/school/img/<?= $SCHOOL->ImageSchool; ?>" width="100%" height="100%" alt="">
                                        </td>

                                    <?php } else { ?>
                                        <td style="padding-top: 40px; text-align: center;">-ไม่มีรูปภาพ- </td>
                                    <?php  } ?>
                                    <td <?php if ($SCHOOL->ImageSchool == NULL) { ?> style="padding-top: 30px;" <?php
                                                                                                            } else { ?> style="padding-top: 40px;" <?php } ?>><?= $SCHOOL->SchoolID; ?></td>
                                    <td <?php if ($SCHOOL->ImageSchool == NULL) { ?> style="padding-top: 30px;" <?php
                                                                                                            } else { ?> style="padding-top: 40px;" <?php } ?>><?= $SCHOOL->SchoolNameThai; ?></td>
                                    <td <?php if ($SCHOOL->ImageSchool == NULL) { ?> style="padding-top: 30px;" <?php
                                                                                                            } else { ?> style="padding-top: 40px;" <?php } ?>><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                    <td <?php if ($SCHOOL->ImageSchool == NULL) { ?> style="padding-top: 25px; text-align: center;" <?php
                                                                                                                                } else { ?> style="padding-top: 35px; text-align: center;" <?php } ?>>
                                        <a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
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
                                        <?php if (!isset($_GET['SchoolID'])) { ?>
                                            เลือกสถานศึกษา
                                        <?php } else {
                                            $result = $this->db->query('SELECT * FROM SCHOOL WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . '');
                                            foreach ($result->result() as $SHOW_SCHOOL) {
                                                echo $SHOW_SCHOOL->SchoolNameThai;
                                            }
                                        } ?>
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ระดับชั้นเรียน</th>
                                <th style="text-align: center;" scope="col">จำนวน</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM STUDENT 
                            INNER JOIN CLS_GRADE_LEVEL  ON STUDENT.GradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . '
                            GROUP BY EducationYear, Semester, GradeLevelCode
                            ');
                            $CountStudent = 0;
                            foreach ($result->result() as $STUDENT) {
                                $CountStudent++;
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $STUDENT->EducationYear; ?></td>
                                    <td><?= $STUDENT->Semester; ?></td>
                                    <td><?= $STUDENT->GRADE_LEVEL_NAME; ?></td>
                                    <td style="text-align: center;"><?= $CountStudent; ?></td>
                                    <td style="text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $CountStudent = 0;
                            } ?>

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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student-select?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="100px">รูปภาพ</th>
                                <th scope="col">รหัสประจำตัวนักเรียน</th>
                                <th scope="col">คำนำหน้า</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">สถานภาพ</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
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
                                    <td class="page-content" style="text-align: center;">
                                        <?php if ($STUDENT->ImageStudent != NULL) { ?>
                                            <img src="assets/student/img/<?= $STUDENT->ImageStudent; ?>" alt="" width="100%" height="100%">
                                        <?php } else { ?><img src="assets/img/ImgDefault.jpg" alt="" width="100%" height="100%"> <?php  } ?>
                                    </td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentID; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->PREFIX_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->StudentLastNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $STUDENT->STUDENT_STATUS_NAME; ?></td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <a href="?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $STUDENT->StudentReferenceID; ?>"><i class=" bi bi-trash"></i></button>
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
                                        <i class="bi bi-card-list"></i> รายละเอียดข้อมูล &nbsp;&nbsp;
                                        <?php if (isset($_GET['SchoolID'])) { ?>
                                            <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                        <?php } ?>
                                    </h3>
                                </div>
                                <?php
                                $result = $this->db->query('SELECT * FROM STUDENT
                            INNER JOIN CLS_CITIZEN_ID_TYPE ON STUDENT.StudentPersonalIDTypeCode =  CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
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
                                <?php if ($STUDENT_DETAIL->ImageStudent != '') { ?>
                                    <div class="col-2" style="padding-bottom: 8px; padding-left: 70px; padding-top: 0px;">
                                        <div class="card page-detail" style="width: 170px;">
                                            <img style=" text-align: center; padding: 15px;" src="assets/student/img/<?= $STUDENT_DETAIL->ImageStudent; ?>" alt="" width="100%" style="padding-top: 20px;">
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-2" style="padding-bottom: 8px; padding-left: 60px; padding-top: 0px;">
                                        <div class="card">
                                            <h6 style="text-align: center; padding: 15px;">
                                                <img style=" text-align: center; padding: 15px;" src="assets/img/ImgDefault.jpg" alt="" width="100%" style="padding-top: 20px;">
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
                                                <a style="float: right;" href="edit-forms-student-main?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            </h5>

                                            <div class="row">
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> รหัสประจำตัวนักเรียน: &nbsp;<?= $STUDENT_DETAIL->StudentID ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับการศึกษา: &nbsp;<?= $STUDENT_DETAIL->EDUCATION_LEVEL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับชั้นเรียน: &nbsp;<?= $STUDENT_DETAIL->GRADE_LEVEL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> หลักสูตร: &nbsp; <?php if ($STUDENT_DETAIL->CurriculumID == '') {
                                                                                                                echo '-';
                                                                                                            } else {
                                                                                                                $result = $this->db->query('SELECT * FROM CURRICULUM WHERE CurriculumID = ' . $STUDENT_DETAIL->CurriculumID . '');
                                                                                                                foreach ($result->result() as $CURRICULUM) {
                                                                                                                    echo $CURRICULUM->CurriculumName;
                                                                                                                }
                                                                                                            } ?></label><br>
                                                    <label style="padding-left: 25px;"> ห้องเรียน: &nbsp;<?php if ($STUDENT_DETAIL->Classroom == '') {
                                                                                                                echo '-';
                                                                                                            } else {
                                                                                                                echo $STUDENT_DETAIL->Classroom;
                                                                                                            } ?></label><br>
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
                                                    <label style="padding-left: 25px;"> สถานศึกษา: &nbsp;<?= $SCHOOL_NAME ?></label><br>
                                                    <label style="padding-left: 25px;"> สถานภาพ: &nbsp;<?= $STUDENT_DETAIL->STUDENT_STATUS_NAME ?></label>
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
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลบุคคล
                                                    <a style="float: right;" href="edit-forms-student-person?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="row">
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> ประเภทบัตรประจำตัว: &nbsp;<?= $STUDENT_DETAIL->CITIZEN_ID_TYPE_NAME ?></label><br>
                                                        <label style="padding-left: 25px;"> หมายเลขบัตร: &nbsp;<?php echo base64_decode($STUDENT_DETAIL->StudentPersonalID); ?></label><br>
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

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <label style="padding-left: 20px;">บ้านเลขที่
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressHouseNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressHouseNumber;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">หมู่ที่
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressMoo == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressMoo;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ถนน
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressStreet == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressStreet;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ซอย
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressSoi == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressSoi;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ตรอก
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressTrok == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressTrok;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $STUDENT_DETAIL->StudentOfficialAddressSubdistrictCode . '"');
                                                            foreach ($result->result() as $SUBDISTRICT) {
                                                                $SUBDISTRICT_NAME_2 = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $STUDENT_DETAIL->StudentOfficialAddressDistrictCode . '"');
                                                            foreach ($result->result() as $DISTRICT) {
                                                                $DISTRICT_NAME_2 = $DISTRICT->DISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $STUDENT_DETAIL->StudentOfficialAddressProvinceCode . '"');
                                                            foreach ($result->result() as $PROVINCE) {
                                                                $PROVINCE_NAME_2 = $PROVINCE->PROVINCE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ตำบล
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressSubdistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $SUBDISTRICT_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">อำเภอ
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressDistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISTRICT_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">จังหวัด
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressProvinceCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PROVINCE_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressPostcode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressPostcode;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                                <?php if ($STUDENT_DETAIL->StudentOfficialAddressPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentOfficialAddressPhoneNumber;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลที่อยู่ (ปัจจุบัน)
                                                            <a style="float: right;" href="edit-forms-student-address?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <label style="padding-left: 20px;">บ้านเลขที่
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressHouseNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressHouseNumber;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">หมู่ที่
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressMoo == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressMoo;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ถนน
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressStreet == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressStreet;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ซอย
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressSoi == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressSoi;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ตรอก
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressTrok == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressTrok;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $STUDENT_DETAIL->StudentCurrentAddressSubdistrictCode . '"');
                                                            foreach ($result->result() as $SUBDISTRICT) {
                                                                $SUBDISTRICT_NAME = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $STUDENT_DETAIL->StudentCurrentAddressDistrictCode . '"');
                                                            foreach ($result->result() as $DISTRICT) {
                                                                $DISTRICT_NAME = $DISTRICT->DISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $STUDENT_DETAIL->StudentCurrentAddressProvinceCode . '"');
                                                            foreach ($result->result() as $PROVINCE) {
                                                                $PROVINCE_NAME = $PROVINCE->PROVINCE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ตำบล
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressSubdistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $SUBDISTRICT_NAME;
                                                                } ?>
                                                            </label>

                                                            <label style="padding-left: 10px;">อำเภอ
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressDistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISTRICT_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">จังหวัด
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressProvinceCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PROVINCE_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressPostcode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressPostcode;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                                <?php if ($STUDENT_DETAIL->StudentCurrentAddressPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentCurrentAddressPhoneNumber;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลบิดา
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = "' . $STUDENT_DETAIL->FatherPrefixCode . '"');
                                                            foreach ($result->result() as $PREFIX) {
                                                                $PREFIX_NAME = $PREFIX->PREFIX_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ชื่อ-นามสกุล:
                                                                <?php if ($STUDENT_DETAIL->FatherNameThai == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PREFIX_NAME . $STUDENT_DETAIL->FatherNameThai . ' ';
                                                                }

                                                                if ($STUDENT_DETAIL->FatherLastNameThai != "") {
                                                                    echo $STUDENT_DETAIL->FatherLastNameThai;
                                                                }

                                                                if ($STUDENT_DETAIL->FatherNameEnglish != "" && $STUDENT_DETAIL->FatherLastNameEnglish != "") {
                                                                    echo ' (' . $STUDENT_DETAIL->FatherNameEnglish . ' ' . $STUDENT_DETAIL->FatherLastNameEnglish . ')';
                                                                } ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขบัตรประจำตัวประชาชน:
                                                                <?php if ($STUDENT_DETAIL->FatherPersonalID == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->FatherPersonalID;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">เลขที่หนังสือเดินทาง:
                                                                <?php if ($STUDENT_DETAIL->FatherPassportNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->FatherPassportNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_CODE = "' . $STUDENT_DETAIL->FatherPersonStatusCode . '"');
                                                            foreach ($result->result() as $PERSON_STATUS) {
                                                                $PERSON_STATUS_NAME = $PERSON_STATUS->PERSON_STATUS_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">สถานภาพ:
                                                                <?php if ($STUDENT_DETAIL->FatherPersonStatusCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PERSON_STATUS_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์:
                                                                <?php if ($STUDENT_DETAIL->FatherPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->FatherPhoneNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = "' . $STUDENT_DETAIL->FatherOccupationCode . '"');
                                                            foreach ($result->result() as $OCCUPATION) {
                                                                $OCCUPATION_NAME = $OCCUPATION->OCCUPATION_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">กลุ่มอาชีพ:
                                                                <?php if ($STUDENT_DETAIL->FatherOccupationCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $OCCUPATION_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 20px;">รายได้ต่อเดือน:
                                                                <?php if ($STUDENT_DETAIL->FatherSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->FatherSalary;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลมารดา
                                                            <a style="float: right;" href="edit-forms-student-parents?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = "' . $STUDENT_DETAIL->MotherPrefixCode . '"');
                                                            foreach ($result->result() as $PREFIX) {
                                                                $PREFIX_NAME = $PREFIX->PREFIX_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ชื่อ-นามสกุล:
                                                                <?php if ($STUDENT_DETAIL->MotherNameThai == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PREFIX_NAME . $STUDENT_DETAIL->MotherNameThai . ' ';
                                                                }

                                                                if ($STUDENT_DETAIL->MotherLastNameThai != "") {
                                                                    echo $STUDENT_DETAIL->MotherLastNameThai;
                                                                }

                                                                if ($STUDENT_DETAIL->MotherNameEnglish != "" && $STUDENT_DETAIL->MotherLastNameEnglish != "") {
                                                                    echo ' (' . $STUDENT_DETAIL->MotherNameEnglish . ' ' . $STUDENT_DETAIL->MotherLastNameEnglish . ')';
                                                                } ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขบัตรประจำตัวประชาชน:
                                                                <?php if ($STUDENT_DETAIL->MotherPersonalID == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->MotherPersonalID;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">เลขที่หนังสือเดินทาง:
                                                                <?php if ($STUDENT_DETAIL->MotherPassportNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->MotherPassportNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_CODE = "' . $STUDENT_DETAIL->MotherPersonStatusCode . '"');
                                                            foreach ($result->result() as $PERSON_STATUS) {
                                                                $PERSON_STATUS_NAME = $PERSON_STATUS->PERSON_STATUS_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">สถานภาพ:
                                                                <?php if ($STUDENT_DETAIL->MotherPersonStatusCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PERSON_STATUS_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์:
                                                                <?php if ($STUDENT_DETAIL->MotherPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->MotherPhoneNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = "' . $STUDENT_DETAIL->MotherOccupationCode . '"');
                                                            foreach ($result->result() as $OCCUPATION) {
                                                                $OCCUPATION_NAME = $OCCUPATION->OCCUPATION_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">กลุ่มอาชีพ:
                                                                <?php if ($STUDENT_DETAIL->MotherOccupationCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $OCCUPATION_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 20px;">รายได้ต่อเดือน:
                                                                <?php if ($STUDENT_DETAIL->MotherSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->MotherSalary;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลผู้ปกครอง
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = "' . $STUDENT_DETAIL->GuardianPrefixCode . '"');
                                                            foreach ($result->result() as $PREFIX) {
                                                                $PREFIX_NAME = $PREFIX->PREFIX_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ชื่อ-นามสกุล:
                                                                <?php if ($STUDENT_DETAIL->GuardianNameThai == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PREFIX_NAME . $STUDENT_DETAIL->GuardianNameThai . ' ';
                                                                }

                                                                if ($STUDENT_DETAIL->FatherLastNameThai != "") {
                                                                    echo $STUDENT_DETAIL->GuardianLastNameThai;
                                                                }

                                                                if ($STUDENT_DETAIL->GuardianNameEnglish != "" && $STUDENT_DETAIL->GuardianLastNameEnglish != "") {
                                                                    echo '(' . $STUDENT_DETAIL->GuardianNameEnglish . ' ' . $STUDENT_DETAIL->GuardianLastNameEnglish . ')';
                                                                } ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขบัตรประจำตัวประชาชน:
                                                                <?php if ($STUDENT_DETAIL->GuardianPersonalID == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->GuardianPersonalID;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">เลขที่หนังสือเดินทาง:
                                                                <?php if ($STUDENT_DETAIL->GuardianPassportNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->GuardianPassportNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION WHERE FAMILY_RELATION_CODE = "' . $STUDENT_DETAIL->GuardianRelationCode . '"');
                                                            foreach ($result->result() as $FAMILY_RELATION) {
                                                                $FAMILY_RELATION_NAME = $FAMILY_RELATION->FAMILY_RELATION_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ความสัมพันธ์กับนักเรียน:
                                                                <?php if ($STUDENT_DETAIL->GuardianRelationCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $FAMILY_RELATION_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์:
                                                                <?php if ($STUDENT_DETAIL->GuardianPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->GuardianPhoneNumber;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = "' . $STUDENT_DETAIL->GuardianOccupationCode . '"');
                                                            foreach ($result->result() as $OCCUPATION) {
                                                                $OCCUPATION_NAME = $OCCUPATION->OCCUPATION_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">กลุ่มอาชีพ:
                                                                <?php if ($STUDENT_DETAIL->GuardianOccupationCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $OCCUPATION_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 20px;">รายได้ต่อเดือน:
                                                                <?php if ($STUDENT_DETAIL->GuardianSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->GuardianSalary;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลครอบครัว
                                                            <a style="float: right;" href="edit-forms-student-family?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS WHERE MARRIAGE_STATUS_CODE = "' . $STUDENT_DETAIL->ParentMarriageStatusCode . '"');
                                                            foreach ($result->result() as $MARRIAGE_STATUS) {
                                                                $MARRIAGE_STATUS_NAME = $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">สถานะการสมรมระหว่างบิดามารดา:
                                                                <?php if ($STUDENT_DETAIL->ParentMarriageStatusCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $MARRIAGE_STATUS_NAME;
                                                                }
                                                                ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">นักเรียนเป็นบุตรลำดับที่:
                                                                <?php if ($STUDENT_DETAIL->StudentBirthOrder == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentBirthOrder;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">จำนวนพี่ชาย:
                                                                <?php if ($STUDENT_DETAIL->StudentBirthOrder == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentBirthOrder;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">จำนวนพี่สาว:
                                                                <?php if ($STUDENT_DETAIL->StudentElderSisterAmount == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentElderSisterAmount;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">จำนวนน้องชาย:
                                                                <?php if ($STUDENT_DETAIL->StudentYoungerBrotherAmount == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentYoungerBrotherAmount;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">จำนวนน้องสาว:
                                                                <?php if ($STUDENT_DETAIL->StudentYoungerSisterAmount == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->StudentYoungerSisterAmount;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลการเดินทางไปสถานศึกษา
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE WHERE JOURNEY_TYPE_CODE = "' . $STUDENT_DETAIL->JourneyTypeCode . '"');
                                                            foreach ($result->result() as $JOURNEY_TYPE) {
                                                                $JOURNEY_TYPE_NAME = $JOURNEY_TYPE->JOURNEY_TYPE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ประเภทการเดินทาง:
                                                                <?php if ($STUDENT_DETAIL->JourneyTypeCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $JOURNEY_TYPE_NAME;
                                                                }
                                                                ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">ระยะเวลาการเดินทาง:
                                                                <?php if ($STUDENT_DETAIL->JourneyTime == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->JourneyTime . ' ชม.';
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ระยะทางที่ผ่านถนนลูกรัง:
                                                                <?php if ($STUDENT_DETAIL->RockJourneyDistance == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->RockJourneyDistance . ' กม.';
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ระยะทางที่ผ่านถนนลาดยาง:
                                                                <?php if ($STUDENT_DETAIL->RubberJourneyDistance == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->RubberJourneyDistance . ' กม.';
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ระยะทางที่ผ่านทางน้ำ:
                                                                <?php if ($STUDENT_DETAIL->WaterJourneyDistance == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->WaterJourneyDistance . ' กม.';
                                                                } ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลความพิการ
                                                            <a style="float: right;" href="edit-forms-student-journey?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY WHERE DISABILITY_CODE = "' . $STUDENT_DETAIL->DisabilityCode . '"');
                                                            foreach ($result->result() as $DISABILITY) {
                                                                $DISABILITY_NAME = $DISABILITY->DISABILITY_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ความพิการ:
                                                                <?php if ($STUDENT_DETAIL->DisabilityCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISABILITY_NAME;
                                                                }
                                                                ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">รายละเอียด:
                                                                <?php if ($STUDENT_DETAIL->DisabilityDetail == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->DisabilityDetail;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL WHERE DISABILITY_LEVEL_CODE = "' . $STUDENT_DETAIL->DisabilityLevelCode . '"');
                                                            foreach ($result->result() as $DISABILITY_LEVEL) {
                                                                $DISABILITY_LEVEL_NAME = $DISABILITY_LEVEL->DISABILITY_LEVEL_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ระดับความพิการ:
                                                                <?php if ($STUDENT_DETAIL->DisabilityLevelCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISABILITY_LEVEL_NAME;
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลความด้อยโอกาส
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED WHERE DISAVANTAGED_CODE = "' . $STUDENT_DETAIL->DisadvantagedCode . '"');
                                                            foreach ($result->result() as $DISAVANTAGED) {
                                                                $DISAVANTAGED_NAME = $DISAVANTAGED->DISAVANTAGED_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ความด้อยโอกาส:
                                                                <?php if ($STUDENT_DETAIL->DisadvantagedCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISAVANTAGED_NAME;
                                                                }
                                                                ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">ขาดแคลนแบบเรียน:
                                                                <?php if ($STUDENT_DETAIL->LackingBookFlag == "") {
                                                                    echo '-';
                                                                } else {
                                                                    if ($STUDENT_DETAIL->LackingBookFlag == 0) {
                                                                        echo 'ไม่ขาดแคลน';
                                                                    } else {
                                                                        echo 'ขาดแคลน';
                                                                    }
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ขาดแคลนอาหารกลางวัน:
                                                                <?php if ($STUDENT_DETAIL->LackingFoodFlag == "") {
                                                                    echo '-';
                                                                } else {
                                                                    if ($STUDENT_DETAIL->LackingFoodFlag == 0) {
                                                                        echo 'ไม่ขาดแคลน';
                                                                    } else {
                                                                        echo 'ขาดแคลน';
                                                                    }
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ขาดแคลนเครื่องเขียน:
                                                                <?php if ($STUDENT_DETAIL->LackingStationeryFlag == "") {
                                                                    echo '-';
                                                                } else {
                                                                    if ($STUDENT_DETAIL->LackingStationeryFlag == 0) {
                                                                        echo 'ไม่ขาดแคลน';
                                                                    } else {
                                                                        echo 'ขาดแคลน';
                                                                    }
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ขาดแคลนเครื่องแบบ:
                                                                <?php if ($STUDENT_DETAIL->LackingUniformFlag == "") {
                                                                    echo '-';
                                                                } else {
                                                                    if ($STUDENT_DETAIL->LackingUniformFlag == 0) {
                                                                        echo 'ไม่ขาดแคลน';
                                                                    } else {
                                                                        echo 'ขาดแคลน';
                                                                    }
                                                                } ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลเกณฑ์ความยากจน
                                                            <a style="float: right;" href="edit-forms-student-disadvantaged?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">

                                                            <label style="padding-left: 20px;">รายได้ครอบครัวต่อเดือน:
                                                                <?php if ($STUDENT_DETAIL->FamilyMonthlyIncome == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_DETAIL->FamilyMonthlyIncome;
                                                                }
                                                                ?>

                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS WHERE FAMILY_STATUS_CODE = "' . $STUDENT_DETAIL->FamilyStatusCode . '"');
                                                            foreach ($result->result() as $FAMILY_STATUS) {
                                                                $FAMILY_STATUS_NAME = $FAMILY_STATUS->FAMILY_STATUS_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">สถานภาพครอบครัว:
                                                                <?php if ($STUDENT_DETAIL->FamilyStatusCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $FAMILY_STATUS_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH WHERE STUDENT_LIVE_WITH_CODE = "' . $STUDENT_DETAIL->StudentLiveWithCode . '"');
                                                            foreach ($result->result() as $STUDENT_LIVE_WITH) {
                                                                $STUDENT_LIVE_WITH_NAME = $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">นักเรียนอาศัยอยู่กับ:
                                                                <?php if ($STUDENT_DETAIL->StudentLiveWithCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $STUDENT_LIVE_WITH_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ได้สวัสดิการแห่งรัฐ:
                                                                <?php if ($STUDENT_DETAIL->StateWelfareFlag == "") {
                                                                    echo '-';
                                                                } else {
                                                                    if ($STUDENT_DETAIL->StateWelfareFlag == 0) {
                                                                        echo 'ไม่ได้';
                                                                    } else {
                                                                        echo 'ได้';
                                                                    }
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลความสามาถพิเศษ
                                                            <a style="float: right;" href="edit-forms-student-talent?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_TALENT WHERE TALENT_CODE = "' . $STUDENT_DETAIL->TalentCode . '"');
                                                            foreach ($result->result() as $TALENT) {
                                                                $TALENT_NAME = $TALENT->TALENT_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ความสามารถพิเศษ :
                                                                <?php if ($STUDENT_DETAIL->TalentCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TALENT_NAME;
                                                                } ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
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