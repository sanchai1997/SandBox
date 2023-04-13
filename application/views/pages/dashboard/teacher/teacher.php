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

                <h1>ข้อมูลครูและบุคลากรทางการศึกษา
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
                                        &nbsp;<a href="Teacher" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-Teacher?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="160px">ตราสัญลักษณ์</th>
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
                                    <td class="page-content" style="text-align: center;"><img src="assets/school/img/<?= $SCHOOL->ImageSchool; ?>" alt="" width="100%" height="100%"></td>
                                    <td style="padding-top: 40px;"><?= $SCHOOL->SchoolNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                    <td style="padding-top: 35px; text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else if (isset($_GET['SchoolID']) && empty($_GET['EducationYear']) && empty($_GET['Semester']) && empty($_GET['PersonnelTypeCode'])  && empty($_GET['PositionCode']) && !isset($_GET['ShowDetail'])) { ?>
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
                                        &nbsp;<a href="teacher" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
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
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ประเภทบุคลากร</th>
                                <th scope="col">ตำแหน่ง</th>
                                <th style="text-align: center;" scope="col">จำนวน</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM TEACHER 
                            INNER JOIN CLS_PERSONNEL_TYPE  ON TEACHER.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                            INNER JOIN CLS_POSITION  ON TEACHER.PositionCode = CLS_POSITION.POSITION_CODE
                            WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . '
                            GROUP BY EducationYear, Semester, PersonnelTypeCode , PositionCode
                            ');
                            $CountTeacher = 0;
                            foreach ($result->result() as $TEACHER) {
                                $CountTeacher++;
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?= $TEACHER->EducationYear; ?></td>
                                    <td><?= $TEACHER->Semester; ?></td>
                                    <td><?= $TEACHER->PERSONNEL_TYPE_NAME; ?></td>
                                    <td><?= $TEACHER->POSITION_NAME; ?></td>
                                    <td style="text-align: center;"><?= $CountTeacher; ?></td>
                                    <td style="text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>&&EducationYear=<?= $TEACHER->EducationYear; ?>&&Semester=<?= $TEACHER->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER->PositionCode; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $CountTeacher = 0;
                            } ?>

                        </tbody>
                    </table>

                <?php } else if (!empty($_GET['SchoolID']) && !empty($_GET['EducationYear']) && !empty($_GET['Semester'])  && !empty($_GET['PersonnelTypeCode']) && !empty($_GET['PositionCode']) && !isset($_GET['ShowDetail'])) {
                    $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE WHERE PERSONNEL_TYPE_CODE = ' . $_GET['PersonnelTypeCode'] . '');
                    foreach ($result->result() as $PERSONNEL_TYPE) {
                        $PERSONNEL_TYPE_NAME = $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_POSITION WHERE POSITION_CODE = ' . $_GET['PositionCode'] . '');
                    foreach ($result->result() as $POSITION) {
                        $POSITION_NAME = $POSITION->POSITION_NAME;
                    }
                ?>
                    <div class="row">
                        <div class="col">
                            <h1 class="card-title">
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    <a href="?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <?php } ?>
                                <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ประเภทบุคลากร: <?= $PERSONNEL_TYPE_NAME ?> &nbsp;ตำแหน่ง: <?= $POSITION_NAME ?></b></a>
                            </h1>
                        </div>
                        <div class="col">
                            <?php if (isset($_GET['SchoolID'])) {
                            ?>
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher-select?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-success"><i class="bi bi-person-plus"></i> เพิ่มข้อมูล</a></h5>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="100px">รูปภาพ</th>
                                <th scope="col">คำนำหน้า</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">กลุ่มวิชาเอก</th>
                                <th scope="col">สาขาวิชา</th>
                                <th scope="col">สถานะปฎิบัติราชการ</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM TEACHER
                            INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                            INNER JOIN CLS_MAJOR ON TEACHER.EntryMajorCode = CLS_MAJOR.MAJOR_CODE
                            INNER JOIN CLS_PROGRAM ON TEACHER.EntryProgramCode = CLS_PROGRAM.PROGRAM_CODE
                            INNER JOIN CLS_PERSONNEL_STATUS ON TEACHER.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                            WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . ' AND EducationYear = ' . $_GET['EducationYear'] . ' AND Semester = ' . $_GET['Semester'] . ' AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . ' AND PositionCode = ' . $_GET['PositionCode'] . '');
                            foreach ($result->result() as $TEACHER) {
                            ?>
                                <tr>
                                    <td class="page-content" style="text-align: center;"><img src="assets/teacher/img/<?= $TEACHER->ImageTeacher; ?>" alt="" width="100%" height="100%"></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->PREFIX_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->TeacherNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->TeacherLastNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->MAJOR_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->PROGRAM_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $TEACHER->PERSONNEL_STATUS_NAME; ?></td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <a href="?SchoolID=<?= $TEACHER->SchoolID; ?>&&TeacherID=<?= $TEACHER->TeacherID ?>&&EducationYear=<?= $TEACHER->EducationYear; ?>&&Semester=<?= $TEACHER->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER->PositionCode; ?>&&ShowDetail=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $TEACHER->TeacherID; ?>"><i class=" bi bi-trash"></i></button>
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
                                            <a href="?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                        <?php } ?>
                                    </h3>
                                </div>
                                <?php
                                $result = $this->db->query('SELECT * FROM TEACHER
                            INNER JOIN CLS_CITIZEN_ID_TYPE ON TEACHER.TeacherPersonalIDTypeCode =  CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                            INNER JOIN CLS_PERSONNEL_STATUS ON TEACHER.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                            INNER JOIN CLS_EDUCATION_LEVEL ON TEACHER.EntryEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                            INNER JOIN CLS_DEGREE ON TEACHER.EntryDegreeCode = CLS_DEGREE.DEGREE_CODE
                            INNER JOIN CLS_MAJOR ON TEACHER.EntryMajorCode = CLS_MAJOR.MAJOR_CODE
                            INNER JOIN CLS_PROGRAM ON TEACHER.EntryProgramCode = CLS_PROGRAM.PROGRAM_CODE
                            INNER JOIN CLS_PERSONNEL_TYPE ON TEACHER.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                            INNER JOIN CLS_POSITION ON TEACHER.PositionCode = CLS_POSITION.POSITION_CODE
                            INNER JOIN CLS_POSITION_LEVEL ON TEACHER.PositionLevelCode = CLS_POSITION_LEVEL.POSITION_LEVEL_CODE
                            INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                            INNER JOIN CLS_GENDER ON TEACHER.TeacherGenderCode = CLS_GENDER.GENDER_CODE
                            INNER JOIN CLS_NATIONALITY ON TEACHER.TeacherNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                            INNER JOIN CLS_RACE ON TEACHER.TeacherRaceCode = CLS_RACE.RACE_CODE
                            INNER JOIN CLS_RELIGION ON TEACHER.TeacherReligionCode = CLS_RELIGION.RELIGION_CODE
                            INNER JOIN CLS_BLOOD ON TEACHER.TeacherBloodCode = CLS_BLOOD.BLOOD_CODE
                            WHERE DeleteStatus = 0 AND TeacherID = "' . $_GET['TeacherID'] . '"');
                                foreach ($result->result() as $TEACHER_DETAIL) {
                                ?>
                                    <div class="col">
                                        <h5 style="float: left; padding: 15px;" class="card-title">
                                        </h5>
                                    </div>
                            </div>
                            <div class="row">
                                <?php if ($TEACHER_DETAIL->ImageTeacher != '') { ?>
                                    <div class="col-2" style="padding-bottom: 8px; padding-left: 70px; padding-top: 15px;">
                                        <div class="card page-detail" style="width: 170px;">
                                            <img style=" text-align: center; padding: 15px;" src="assets/teacher/img/<?= $TEACHER_DETAIL->ImageTeacher; ?>" alt="" width="100%" style="padding-top: 20px;">
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
                                                ชื่อ-นามสกุล : <?= $TEACHER_DETAIL->PREFIX_NAME . $TEACHER_DETAIL->TeacherNameThai . ' ' . $TEACHER_DETAIL->TeacherLastNameThai ?> <?php if ($TEACHER_DETAIL->TeacherNameEnglish != NULL && $TEACHER_DETAIL->TeacherLastNameEnglish != NULL) {
                                                                                                                                                                                        echo ' (' . $TEACHER_DETAIL->TeacherNameEnglish . ' ' . $TEACHER_DETAIL->TeacherLastNameEnglish . ')';
                                                                                                                                                                                    } ?>
                                                <a style="float: right;" href="edit-forms-teacher-main?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            </h5>

                                            <div class="row">
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> ประเภทบุคลากร: &nbsp;<?= $TEACHER_DETAIL->PERSONNEL_TYPE_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> ตำแหน่ง: &nbsp;<?= $TEACHER_DETAIL->POSITION_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับตำแหน่ง: &nbsp;<?= $TEACHER_DETAIL->POSITION_LEVEL_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> กลุ่มวิชาเอกที่บรรจุ: &nbsp;<?= $TEACHER_DETAIL->MAJOR_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> ระดับการศึกษาที่บรรจุ: &nbsp;<?= $TEACHER_DETAIL->EDUCATION_LEVEL_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> วันที่บรรจุ: &nbsp;<?= DateThai($TEACHER_DETAIL->PersonnelStartDate); ?></label><br>
                                                </div>
                                                <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 25px;"> ปีการศึกษา: &nbsp;<?= $TEACHER_DETAIL->EducationYear; ?></label>
                                                    <label style="padding-left: 25px;"> ภาคเรียน: &nbsp;<?= $TEACHER_DETAIL->Semester; ?></label><br>

                                                    <label style="padding-left: 25px;"> วันที่ดำรงตำแหน่ง: &nbsp;<?= DateThai($TEACHER_DETAIL->PositionStartDate); ?></label><br>
                                                    <label style="padding-left: 25px;"> วุฒิการศึกษาที่บรรจุ: &nbsp;<?= $TEACHER_DETAIL->DEGREE_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> สาขาวิชาที่บรรจุ: &nbsp;<?= $TEACHER_DETAIL->PROGRAM_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> สถานนะปฎิบัติราชการ: &nbsp;<?= $TEACHER_DETAIL->PERSONNEL_STATUS_NAME; ?></label><br>
                                                    <label style="padding-left: 25px;"> วันเกษียณ: &nbsp;<?php if ($TEACHER_DETAIL->PersonnelRetireDate == '0000-00-00') {
                                                                                                                echo '-';
                                                                                                            } else {
                                                                                                                echo DateThai($TEACHER_DETAIL->PersonnelRetireDate);
                                                                                                            } ?></label><br>
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
                                                    <a style="float: right;" href="edit-forms-teacher-person?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="row">
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> ประเภทบัตรประจำตัว: &nbsp;<?= $TEACHER_DETAIL->CITIZEN_ID_TYPE_NAME ?></label><br>
                                                        <label style="padding-left: 25px;"> หมายเลขบัตร: &nbsp;<?= $TEACHER_DETAIL->TeacherPersonalID ?></label><br>
                                                        <label style="padding-left: 25px;"> เลขที่หนังสือเดินทาง: &nbsp;<?php if ($TEACHER_DETAIL->TeacherPassportNumber == NULL) {
                                                                                                                            echo '-';
                                                                                                                        } else echo $TEACHER_DETAIL->TeacherPassportNumber; ?></label><br>

                                                    </div>
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> สัญชาติ: &nbsp;<?php if ($TEACHER_DETAIL->TeacherNationalityCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $TEACHER_DETAIL->NATIONALITY_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> วันที่เกิด: &nbsp;<?php if ($TEACHER_DETAIL->TeacherBirthDate == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo DateThai($TEACHER_DETAIL->TeacherBirthDate); ?></label><br>
                                                        <label style="padding-left: 25px;"> เพศ: &nbsp;<?php if ($TEACHER_DETAIL->TeacherGenderCode == NULL) {
                                                                                                            echo '-';
                                                                                                        } else echo $TEACHER_DETAIL->GENDER_NAME; ?></label><br>

                                                    </div>
                                                    <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">

                                                        <label style="padding-left: 25px;"> เชื้อชาติ: &nbsp;<?php if ($TEACHER_DETAIL->TeacherRaceCode == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $TEACHER_DETAIL->RACE_NAME; ?></label><br>

                                                        <label style="padding-left: 25px;"> ศาสนา: &nbsp;<?php if ($TEACHER_DETAIL->TeacherReligionCode == NULL) {
                                                                                                                echo '-';
                                                                                                            } else echo $TEACHER_DETAIL->RELIGION_NAME; ?></label><br>
                                                        <label style="padding-left: 25px;"> กลุ่มเลือด: &nbsp;<?php if ($TEACHER_DETAIL->TeacherBloodCode == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $TEACHER_DETAIL->BLOOD_NAME; ?></label><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลคู่สมรส
                                                    <a style="float: right;" href="edit-forms-teacher-marriage?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS WHERE MARRIAGE_STATUS_CODE = "' . $TEACHER_DETAIL->MarriageStatusCode . '"');
                                                foreach ($result->result() as $MARRIAGE_STATUS) {
                                                    $MARRIAGE_STATUS_NAME = $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME;
                                                }
                                                $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = "' . $TEACHER_DETAIL->SpousePrefixCode . '"');
                                                foreach ($result->result() as $PREFIX) {
                                                    $PREFIX_NAME = $PREFIX->PREFIX_NAME;
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                        <label style="padding-left: 25px;"> สถานภาพการสมรส: &nbsp;<?php if ($TEACHER_DETAIL->MarriageStatusCode == NULL) {
                                                                                                                        echo '-';
                                                                                                                    } else echo $MARRIAGE_STATUS_NAME; ?></label>
                                                        <label style="padding-left: 25px;"> หมายเลขบัตรประจำตัวประชาชน: &nbsp;<?php if ($TEACHER_DETAIL->SpousePersonalID == NULL) {
                                                                                                                                    echo '-';
                                                                                                                                } else echo $TEACHER_DETAIL->SpousePersonalID; ?></label>
                                                        <label style="padding-left: 25px;"> ชื่อ-นามสกุล: &nbsp;<?php if ($TEACHER_DETAIL->SpouseNameThai == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $PREFIX_NAME . $TEACHER_DETAIL->SpouseNameThai . ' ' . $TEACHER_DETAIL->SpouseLastNameThai; ?>
                                                            <?php if ($TEACHER_DETAIL->SpouseNameEnglish != NULL && $TEACHER_DETAIL->SpouseLastNameEnglish != NULL) {
                                                                echo ' (' . $TEACHER_DETAIL->SpouseNameEnglish . ' ' . $TEACHER_DETAIL->SpouseLastNameEnglish . ')';
                                                            } ?>
                                                        </label>
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
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressHouseNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressHouseNumber;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">หมู่ที่
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressMoo == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressMoo;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ถนน
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressStreet == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressStreet;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ซอย
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressSoi == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressSoi;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ตรอก
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressTrok == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressTrok;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $TEACHER_DETAIL->TeacherOfficialAddressSubdistrictCode . '"');
                                                            foreach ($result->result() as $SUBDISTRICT) {
                                                                $SUBDISTRICT_NAME_2 = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $TEACHER_DETAIL->TeacherOfficialAddressDistrictCode . '"');
                                                            foreach ($result->result() as $DISTRICT) {
                                                                $DISTRICT_NAME_2 = $DISTRICT->DISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $TEACHER_DETAIL->TeacherOfficialAddressProvinceCode . '"');
                                                            foreach ($result->result() as $PROVINCE) {
                                                                $PROVINCE_NAME_2 = $PROVINCE->PROVINCE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ตำบล
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressSubdistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $SUBDISTRICT_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">อำเภอ
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressDistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISTRICT_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">จังหวัด
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressProvinceCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PROVINCE_NAME_2;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressPostcode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressPostcode;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                                <?php if ($TEACHER_DETAIL->TeacherOfficialAddressPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherOfficialAddressPhoneNumber;
                                                                } ?>
                                                            </label><br>

                                                            <label style="padding-left: 20px;">อีเมลล์
                                                                <?php if ($TEACHER_DETAIL->TeacherEmail == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherEmail;
                                                                } ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลที่อยู่ (ปัจจุบัน)
                                                            <a style="float: right;" href="edit-forms-teacher-address?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <label style="padding-left: 20px;">บ้านเลขที่
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressHouseNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressHouseNumber;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">หมู่ที่
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressMoo == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressMoo;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ถนน
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressStreet == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressStreet;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ซอย
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressSoi == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressSoi;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">ตรอก
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressTrok == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressTrok;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $TEACHER_DETAIL->TeacherCurrentAddressSubdistrictCode . '"');
                                                            foreach ($result->result() as $SUBDISTRICT) {
                                                                $SUBDISTRICT_NAME = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $TEACHER_DETAIL->TeacherCurrentAddressDistrictCode . '"');
                                                            foreach ($result->result() as $DISTRICT) {
                                                                $DISTRICT_NAME = $DISTRICT->DISTRICT_NAME;
                                                            }
                                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $TEACHER_DETAIL->TeacherCurrentAddressProvinceCode . '"');
                                                            foreach ($result->result() as $PROVINCE) {
                                                                $PROVINCE_NAME = $PROVINCE->PROVINCE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ตำบล
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressSubdistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $SUBDISTRICT_NAME;
                                                                } ?>
                                                            </label>

                                                            <label style="padding-left: 10px;">อำเภอ
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressDistrictCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $DISTRICT_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">จังหวัด
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressProvinceCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $PROVINCE_NAME;
                                                                } ?>
                                                            </label>
                                                            <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressPostcode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressPostcode;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                                <?php if ($TEACHER_DETAIL->TeacherCurrentAddressPhoneNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->TeacherCurrentAddressPhoneNumber;
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
                                                            ข้อมูลการว่าจ้าง
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <label style="padding-left: 20px;">เลขที่สัญญา:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractNumber == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->ContractNumber;
                                                                } ?>
                                                            </label>&nbsp;&nbsp;
                                                            <label style="padding-left: 20px;">จำนวนครั้งที่ทำสัญญา:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractTimes == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->ContractTimes;
                                                                } ?>
                                                            </label><br>
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE WHERE CONTRACT_TYPE_CODE = "' . $TEACHER_DETAIL->ContractTypeCode . '"');
                                                            foreach ($result->result() as $CONTRACT_TYPE) {
                                                                $CONTRACT_TYPE_NAME = $CONTRACT_TYPE->CONTRACT_TYPE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ลักษณะการจ้าง:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractTypeCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $CONTRACT_TYPE_NAME;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">ผ่านการจ้างมาแล้ว:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractYear == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->ContractYear . ' ปี';
                                                                } ?>

                                                            </label><br>
                                                            <label style="padding-left: 20px;">วันที่เริ่มต้นสัญญา:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractStartDate == "" || $TEACHER_DETAIL->ContractStartDate == "0000-00-00") {
                                                                    echo '-';
                                                                } else {
                                                                    echo DateThai($TEACHER_DETAIL->ContractStartDate);
                                                                } ?>
                                                            </label>&nbsp;&nbsp;
                                                            <label style="padding-left: 20px;">วันที่สิ้นสุดสัญญา:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->ContractEndDate == "" || $TEACHER_DETAIL->ContractEndDate == "0000-00-00") {
                                                                    echo '-';
                                                                } else {
                                                                    echo DateThai($TEACHER_DETAIL->ContractEndDate);
                                                                } ?>
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            เงินเดือนและเงินอื่นๆ
                                                            <a style="float: right;" href="edit-forms-teacher-contract?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE WHERE SALARY_TYPE_CODE = "' . $TEACHER_DETAIL->SalaryTypeCode . '"');
                                                            foreach ($result->result() as $SALARY_TYPE) {
                                                                $SALARY_TYPE_NAME = $SALARY_TYPE->SALARY_TYPE_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">ประเภทเงินงบประมาณ:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->SalaryTypeCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $SALARY_TYPE_NAME;
                                                                } ?>
                                                            </label>&nbsp;&nbsp;
                                                            <label style="padding-left: 20px;">เงินเดือนปัจุบัน:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->CurrentSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->CurrentSalary;
                                                                } ?>
                                                            </label>
                                                            <br>
                                                            <label style="padding-left: 20px;">เงินวิทยฐานะ:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->AcademicSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->AcademicSalary;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">เงินค่าตอบแทน:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->CompensationSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->CompensationSalary;
                                                                } ?>
                                                            </label><br>
                                                            <label style="padding-left: 20px;">เงินประจำตำแหน่ง:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->EmolumentsSalary == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_DETAIL->EmolumentsSalary;
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
                                                            ข้อมูลวุฒิทางครู
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_TEACHER_QUALIFICATION WHERE TEACHER_QUALIFICATION_CODE = "' . $TEACHER_DETAIL->TeacherQualificationCode . '"');
                                                            foreach ($result->result() as $TEACHER_QUALIFICATION) {
                                                                $TEACHER_QUALIFICATION_NAME = $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_NAME;
                                                            }
                                                            ?>
                                                            <label style="padding-left: 20px;">วุฒิทางครู:&nbsp;
                                                                <?php if ($TEACHER_DETAIL->TeacherQualificationCode == "") {
                                                                    echo '-';
                                                                } else {
                                                                    echo $TEACHER_QUALIFICATION_NAME;
                                                                } ?>
                                                            </label>&nbsp;&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลความสามารถพิเศษ
                                                            <a style="float: right;" href="edit-forms-teacher-talent?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <label style="padding-left: 20px;">ความสามารถพิเศษ:&nbsp;
                                                                <?php
                                                                $result = $this->db->query('SELECT * FROM CLS_TALENT WHERE TALENT_CODE = "' . $TEACHER_DETAIL->TeacherTalentCode . '"');
                                                                foreach ($result->result() as $TALENT) {
                                                                    $TALENT_NAME = $TALENT->TALENT_NAME;
                                                                }
                                                                ?>
                                                                <?php if ($TEACHER_DETAIL->TeacherTalentCode == "") {
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

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ข้อมูลการสอน
                                                            <a style="float: right;" href="teacher-teaching?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-2" scope="col">ปีการศึกษา</td>
                                                                        <td class="col-2" scope="col">ภาคเรียน</td>
                                                                        <td scope="col">ระดับการศึกษา</td>
                                                                        <td scope="col">กลุ่มสาระวิชา</td>
                                                                        <td scope="col">วิชา</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT * 
                                                                FROM TEACHER_TEACHING 
                                                                INNER JOIN CLS_EDUCATION_LEVEL ON TEACHER_TEACHING.TeachingEducationLevelCode  = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE 
                                                                INNER JOIN CLS_SUBJECT_TYPE ON TEACHER_TEACHING.TeachingSubjectGroupCode  = CLS_SUBJECT_TYPE.SUBJECT_TYPE_CODE 
                                                                INNER JOIN CLS_SUBJECT_GROUP ON TEACHER_TEACHING.TeachingSubjectCode  = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($result->result() as $TEACHER_TEACHING) {

                                                                        ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_TEACHING->TeachingEducationYear == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_TEACHING->TeachingEducationYear;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_TEACHING->TeachingSemester == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_TEACHING->TeachingSemester;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_TEACHING->TeachingEducationLevelCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_TEACHING->EDUCATION_LEVEL_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_TEACHING->TeachingSubjectGroupCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_TEACHING->SUBJECT_TYPE_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_TEACHING->TeachingSubjectCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_TEACHING->SUBJECT_GROUP_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                                                            ข้อมูลวุฒิการศึกษา
                                                            <a style="float: right;" href="teacher-education?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-4" scope="col">ระดับการศึกษา</td>
                                                                        <td class="col-4" scope="col">กลุ่มวิชาเอก</td>
                                                                        <td class="col-4" scope="col">วุฒิการศึกษา</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT * 
                                                                FROM TEACHER_EDUCATION_DEGREE 
                                                                INNER JOIN CLS_EDUCATION_LEVEL ON TEACHER_EDUCATION_DEGREE.EducationLevelCode  = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE 
                                                                INNER JOIN CLS_MAJOR ON TEACHER_EDUCATION_DEGREE.EducationMajorCode  = CLS_MAJOR.MAJOR_CODE 
                                                                INNER JOIN CLS_DEGREE ON TEACHER_EDUCATION_DEGREE.EducationDegreeCode  = CLS_DEGREE.DEGREE_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {

                                                                        foreach ($result->result() as $TEACHER_EDUCATION_DEGREE) {

                                                                        ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_EDUCATION_DEGREE->EducationLevelCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_EDUCATION_DEGREE->EDUCATION_LEVEL_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_EDUCATION_DEGREE->EducationMajorCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_EDUCATION_DEGREE->MAJOR_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_EDUCATION_DEGREE->EducationDegreeCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_EDUCATION_DEGREE->DEGREE_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                                                            ข้อมูลใบประกอบวิชาชีพ
                                                            <a style="float: right;" href="teacher-certificate?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-4" scope="col">ประเภท</td>
                                                                        <td class="col-4" scope="col">เลขที่</td>
                                                                        <td class="col-2" scope="col">วันที่ใบอนุญาติหมดอายุ</td>
                                                                        <td class="col-2" scope="col">วันที่ใบอนุญาติหมดอายุ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT *
                                                                FROM TEACHER_CERTIFICATE 
                                                                INNER JOIN CLS_TEACHER_CERTIFICATE ON TEACHER_CERTIFICATE.CertificateCode  = CLS_TEACHER_CERTIFICATE.TEACHER_CERTIFICATE_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($result->result() as $TEACHER_CERTIFICATE) {
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_CERTIFICATE->CertificateCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_CERTIFICATE->CertificateLicenseNumber == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_CERTIFICATE->CertificateLicenseNumber;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_CERTIFICATE->CertificateLicenseIssuedDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_CERTIFICATE->CertificateLicenseIssuedDate);
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_CERTIFICATE->CertificateLicenseExpiredDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_CERTIFICATE->CertificateLicenseExpiredDate);
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                                                            ข้อมูลหน้าที่เพิ่มเติม
                                                            <a style="float: right;" href="teacher-position?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-4" scope="col">ตำแหน่งเพิ่มเติม</td>
                                                                        <td class="col-3" scope="col">กลุ่ม/หมวดหน้าที่เพิ่มเติม</td>
                                                                        <td class="col-3" scope="col">วันที่เริ่มปฎิบัติหน้าที่</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT *
                                                                FROM TEACHER_ADDITIONAL_POSITION 
                                                                INNER JOIN CLS_DEPARTMENT ON TEACHER_ADDITIONAL_POSITION.AdditionalDepartmentCode  = CLS_DEPARTMENT.DEPARTMENT_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($result->result() as $TEACHER_ADDITIONAL_POSITION) {

                                                                        ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalPosition == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ADDITIONAL_POSITION->AdditionalPosition;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ADDITIONAL_POSITION->DEPARTMENT_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate);
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                    ?>
                                                                                    <?php
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                                                            ข้อมูลการช่วยราชการ
                                                            <a style="float: right;" href="teacher-assistance?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-4" scope="col">ประเภทการช่วยราชการ</td>
                                                                        <td class="col-4" scope="col">หน่วยงาน</td>
                                                                        <td class="col-2" scope="col">วันที่เริ่ม</td>
                                                                        <td class="col-2" scope="col">วันที่สิ้นสุด</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT *
                                                                FROM TEACHER_ASSISTANCE 
                                                                INNER JOIN CLS_ASSISTANCE_TYPE ON TEACHER_ASSISTANCE.AssistanceTypeCode  = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="4">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($result->result() as $TEACHER_ASSISTANCE) {

                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ASSISTANCE->AssistanceTypeCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ASSISTANCE->ASSISTANCE_TYPE_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ASSISTANCE->AssistanceOrganizationName == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ASSISTANCE->AssistanceOrganizationName;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ASSISTANCE->AssistanceStartDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_ASSISTANCE->AssistanceStartDate);
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ASSISTANCE->AssistanceEndDate == "0000-00-00") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_ASSISTANCE->AssistanceEndDate);
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                                                            ข้อมูลวิทยฐานะ
                                                            <a style="float: right;" href="teacher-academic?SchoolID=<?= $TEACHER_DETAIL->SchoolID; ?>&&TeacherID=<?= $TEACHER_DETAIL->TeacherID ?>&&EducationYear=<?= $TEACHER_DETAIL->EducationYear; ?>&&Semester=<?= $TEACHER_DETAIL->Semester; ?>&&PersonnelTypeCode=<?= $TEACHER_DETAIL->PersonnelTypeCode; ?>&&PositionCode=<?= $TEACHER_DETAIL->PositionCode; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <table class="table ">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="col-4" scope="col">วิทยาฐานะและตำแหน่งวิชาการ</td>
                                                                        <td class="col-4" scope="col">สาขาที่ยื่นขอ</td>
                                                                        <td class="col-4" scope="col">วันที่ได้วิทยฐานะ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $result = $this->db->query('SELECT *
                                                                FROM TEACHER_ACADEMIC 
                                                                INNER JOIN CLS_ACADEMIC_STANDING ON TEACHER_ACADEMIC.AcademicStandingCode  = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE 
                                                                INNER JOIN CLS_PROGRAM ON TEACHER_ACADEMIC.AcademicProgramCode  = CLS_PROGRAM.PROGRAM_CODE 
                                                                WHERE DeleteStatus = 0 AND SchoolID = ' . $TEACHER_DETAIL->SchoolID . ' AND TeacherID = "' . $TEACHER_DETAIL->TeacherID . '"
                                                                ');
                                                                    if ($result->result() != TRUE) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($result->result() as $TEACHER_ACADEMIC) {

                                                                        ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ACADEMIC->AcademicStandingCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ACADEMIC->ACADEMIC_STANDING_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ACADEMIC->AcademicProgramCode == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo $TEACHER_ACADEMIC->PROGRAM_NAME;
                                                                                    } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($TEACHER_ACADEMIC->AcademicDate == "") {
                                                                                        echo '-';
                                                                                    } else {
                                                                                        echo DateThai($TEACHER_ACADEMIC->AcademicDate);
                                                                                    } ?>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
$result = $this->db->query('SELECT * FROM TEACHER WHERE DeleteStatus = 0');
foreach ($result->result() as $TEACHER) {
?>
    <div class=" modal fade" id="Delete<?= $TEACHER->TeacherID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-teacher/' . $TEACHER->TeacherID  . '/' . $TEACHER->SchoolID  . '/' . $TEACHER->EducationYear . '/' . $TEACHER->Semester . '/' . $TEACHER->PersonnelTypeCode . '/' . $TEACHER->PositionCode); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>