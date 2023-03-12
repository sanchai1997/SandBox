<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรายชื่อนักเรียน
                </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->
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
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล<span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="student" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">หมายเลขประจำตัวนักเรียน</th>
                            <th scope="col">คำนำหน้าชื่อ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th style="text-align: center;" scope="col">สถานะภาพนักเรียน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ลบข้อมูล</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.SchoolID = ' . $_GET['SchoolID'] . ' AND STUDENT.EducationYear = ' . $_GET['EducationYear'] . ' AND STUDENT.Semester = ' . $_GET['Semester'] . ' AND STUDENT.EducationLevelCode = ' . $_GET['EducationLevelCode'] . ' AND STUDENT.GradeLevelCode = ' . $_GET['GradeLevelCode'] . '
                        ');
                        foreach ($result->result() as $STUDENT) {
                        ?>
                            <tr>
                                <?php
                                ?>
                                <td><?= $STUDENT->StudentID; ?></td>
                                <td><?= $STUDENT->PREFIX_NAME; ?></td>
                                <td><?= $STUDENT->StudentNameThai; ?></td>
                                <td><?= $STUDENT->StudentLastNameThai; ?></td>
                                <td>
                                    <center><?= $STUDENT->STUDENT_STATUS_NAME; ?></center>
                                </td>
                                <td style="text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $STUDENT->StudentReferenceID; ?>"><i class="bi bi-card-list"></i></button></td>
                                <td style="text-align: center;"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $STUDENT->StudentReferenceID; ?>"><i class=" bi bi-trash"></i></button></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->
<?php
$result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        INNER JOIN CLS_GENDER ON STUDENT.StudentGenderCode = CLS_GENDER.GENDER_CODE
                        INNER JOIN CLS_PROVINCE ON STUDENT.StudentBirthProvinceCode = CLS_PROVINCE.PROVINCE_CODE
                        INNER JOIN CLS_NATIONALITY ON STUDENT.StudentRaceCode = CLS_NATIONALITY.NATIONALITY_CODE
                        INNER JOIN CLS_RACE ON STUDENT.StudentNationalityCode = CLS_RACE.RACE_CODE
                        INNER JOIN CLS_RELIGION ON STUDENT.StudentReligionCode = CLS_RELIGION.RELIGION_CODE
                        INNER JOIN CLS_LANGUAGE ON STUDENT.StudentLanguageCode = CLS_LANGUAGE.LANGUAGE_CODE
                        INNER JOIN CLS_BLOOD ON STUDENT.StudentBloodCode = CLS_BLOOD.BLOOD_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.SchoolID = ' . $_GET['SchoolID'] . ' AND STUDENT.EducationYear = ' . $_GET['EducationYear'] . ' AND STUDENT.Semester = ' . $_GET['Semester'] . ' AND STUDENT.EducationLevelCode = ' . $_GET['EducationLevelCode'] . ' AND STUDENT.GradeLevelCode = ' . $_GET['GradeLevelCode'] . '
                        ');
foreach ($result->result() as $STUDENT) {
?> <!-- Modal -->


    <div class="modal fade" id="Modal<?= $STUDENT->StudentReferenceID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">

                <!---------------------   --------------------->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียดนักเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr>
                </div>
                <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px; ">
                            ชื่อสถานศึกษา -
                            <?php
                            $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID = ' . $STUDENT->SchoolID . '');
                            foreach ($result->result() as $SCHOOL_NAME) {
                                echo $SCHOOL_NAME->SchoolNameThai . ' (' . $SCHOOL_NAME->SchoolNameEnglish . ')';
                            }
                            ?>

                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px; ">
                            ปีการศึกษา <?= $STUDENT->EducationYear; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px; ">
                            ภาคเรียน <?= $STUDENT->Semester; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลนักเรียน</b></h6>

                    <div class="row">

                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px; ">
                            รหัสประจำตัวนักเรียน <?= $STUDENT->StudentID; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px; ">
                            สถานะภาพนักเรียน <?= $STUDENT->STUDENT_STATUS_NAME; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลบุคคล</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            ชื่อ-นามสกุล - <?= $STUDENT->PREFIX_NAME; ?><?= $STUDENT->StudentNameThai; ?> <?= $STUDENT->StudentLastNameThai; ?> (<?= $STUDENT->StudentNameEnglish; ?> <?= $STUDENT->StudentLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $STUDENT->StudentPersonalID; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $STUDENT->StudentPassportNumber; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            เพศ - <?= $STUDENT->GENDER_NAME; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            วันเกิด - <?= DateThai($STUDENT->StudentBirthDate); ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            จังหวัดที่เกิด - <?= $STUDENT->PROVINCE_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            สัญชาติ - <?= $STUDENT->NATIONALITY_NAME; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            เชื้อชาติ - <?= $STUDENT->RACE_NAME; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            ศาสนา - <?= $STUDENT->RELIGION_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            กลุ่มเลือด - <?= $STUDENT->BLOOD_NAME; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            น้ำหนัก - <?= $STUDENT->StudentWeight; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            ส่วนสูง - <?= $STUDENT->StudentHeight; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            ภาษาหลัก - <?= $STUDENT->LANGUAGE_NAME; ?>
                        </div>
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            ภาษาอื่น - <?= $STUDENT->LANGUAGE_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $STUDENT->StudentOfficialAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $STUDENT->StudentOfficialAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $STUDENT->StudentOfficialAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $STUDENT->StudentOfficialAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $STUDENT->StudentOfficialAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $STUDENT->StudentOfficialAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $STUDENT->StudentOfficialAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $STUDENT->StudentOfficialAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $STUDENT->StudentOfficialAddressPostcode; ?></label>
                            <label style="padding-left: 10px;">หมายเลขโทรศัพท์ <?= $STUDENT->StudentOfficialAddressPhoneNumber; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลที่อยู่ (ปัจจุบัน)</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $STUDENT->StudentCurrentAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $STUDENT->StudentCurrentAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $STUDENT->StudentCurrentAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $STUDENT->StudentCurrentAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $STUDENT->StudentCurrentAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $STUDENT->StudentCurrentAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $STUDENT->StudentCurrentAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $STUDENT->StudentCurrentAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $STUDENT->StudentCurrentAddressPostcode; ?></label>
                            <label style="padding-left: 10px;">หมายเลขโทรศัพท์ <?= $STUDENT->StudentCurrentAddressPhoneNumber; ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลบิดา</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = ' . $STUDENT->FatherPrefixCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ชื่อ-นามสกุล - <?= $SELECT->PREFIX_NAME; ?>
                            <?php } ?>
                            <?= $STUDENT->FatherNameThai; ?> <?= $STUDENT->FatherLastNameThai; ?> (<?= $STUDENT->FatherNameEnglish; ?> <?= $STUDENT->FatherLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $STUDENT->FatherPersonalID; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $STUDENT->FatherPassportNumber; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_CODE = ' . $STUDENT->FatherPersonStatusCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                สภานภาพ - <?= $SELECT->PERSON_STATUS_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขโทรศัพท์ - <?= $STUDENT->FatherPhoneNumber; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = ' . $STUDENT->FatherOccupationCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                อาชีพ - <?= $SELECT->OCCUPATION_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            รายได้ต่อเดือน - <?= $STUDENT->FatherSalary; ?>
                        </div>
                    </div>

                    <h6 style="padding-top: 10px;"><b>ข้อมูลมารดา</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = ' . $STUDENT->MotherPrefixCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ชื่อ-นามสกุล - <?= $SELECT->PREFIX_NAME; ?>
                            <?php } ?>
                            <?= $STUDENT->MotherNameThai; ?> <?= $STUDENT->MotherLastNameThai; ?> (<?= $STUDENT->MotherNameEnglish; ?> <?= $STUDENT->MotherLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $STUDENT->MotherPersonalID; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $STUDENT->MotherPassportNumber; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_CODE = ' . $STUDENT->MotherPersonStatusCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                สภานภาพ - <?= $SELECT->PERSON_STATUS_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขโทรศัพท์ - <?= $STUDENT->MotherPhoneNumber; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = ' . $STUDENT->MotherOccupationCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                อาชีพ - <?= $SELECT->OCCUPATION_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            รายได้ต่อเดือน - <?= $STUDENT->MotherSalary; ?>
                        </div>
                    </div>

                    <h6 style="padding-top: 10px;"><b>ผู้ปกครอง</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = ' . $STUDENT->GuardianPrefixCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ชื่อ-นามสกุล - <?= $SELECT->PREFIX_NAME; ?>
                            <?php } ?>
                            <?= $STUDENT->GuardianNameThai; ?> <?= $STUDENT->GuardianLastNameThai; ?> (<?= $STUDENT->GuardianNameEnglish; ?> <?= $STUDENT->GuardianLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $STUDENT->GuardianPersonalID; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $STUDENT->GuardianPassportNumber; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION WHERE FAMILY_RELATION_CODE = ' . $STUDENT->GuardianRelationCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ความสัมพันธ์ของผู้ปกครองกับนักเรียน - <?= $SELECT->FAMILY_RELATION_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขโทรศัพท์ - <?= $STUDENT->GuardianPhoneNumber; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_CODE = ' . $STUDENT->GuardianOccupationCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                อาชีพ - <?= $SELECT->OCCUPATION_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            รายได้ต่อเดือน - <?= $STUDENT->GuardianSalary; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลครอบครัว</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS WHERE FAMILY_STATUS_CODE = ' . $STUDENT->FamilyStatusCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                สถานะภาพครอบครัว - <?= $SELECT->FAMILY_STATUS_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH WHERE STUDENT_LIVE_WITH_CODE = ' . $STUDENT->StudentLiveWithCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                นักเรียนอาศัยอยู่กับ - <?= $SELECT->STUDENT_LIVE_WITH_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS WHERE MARRIAGE_STATUS_CODE = ' . $STUDENT->ParentMarriageStatusCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                สภานะการสมรสระหว่างบิดามารดา - <?= $SELECT->MARRIAGE_STATUS_NAME; ?><br>
                            <?php } ?>
                            เป้นบุตรลำดับที่ - <?= $STUDENT->StudentBirthOrder; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            จำนวนพี่ชาย - <?= $STUDENT->StudentElderBrotherAmount; ?><br>
                            จำนวนพี่สาว - <?= $STUDENT->StudentElderSisterAmount; ?><br>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            จำนวนน้องชาย - <?= $STUDENT->StudentYoungerBrotherAmount; ?><br>
                            จำนวนน้องสาว - <?= $STUDENT->StudentYoungerSisterAmount; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลด้านการศึกษา</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษา - <?= $STUDENT->CurrentEducationLevelAdmissionYear; ?><br>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ปีการศึกษาที่เริ่มเข้าเรียน - <?= $STUDENT->SchoolAdmissionYear; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL WHERE EDUCATION_LEVEL_CODE = ' . $STUDENT->EducationLevelCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ระดับการศึกษา - <?= $SELECT->EDUCATION_LEVEL_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $STUDENT->GradeLevelCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ชั้นเรียน - <?= $SELECT->GRADE_LEVEL_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ห้องเรียนที่ - <?= $STUDENT->Classroom; ?><br>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            เรียนหลักสูตรทวิศึกษา - <?php if ($STUDENT->PartSchoolFlag == 1) {
                                                        echo 'เรียน';
                                                    } else echo 'ไม่ได้เรียน'; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_CURRICULUM WHERE CURRICULUM_CODE = ' . $STUDENT->CurriculumID . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                หลักสูตร - <?= $SELECT->CURRICULUM_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลการเดินทางไปสถานศึกษา</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE WHERE JOURNEY_TYPE_CODE = ' . $STUDENT->JourneyTypeCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ประเภทการเดินทางมาโรงเรียน - <?= $SELECT->JOURNEY_TYPE_NAME; ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ระยะเวลาการเดินจากบ้านมาโรงเรียน - <?= $STUDENT->JourneyTime; ?> ชม.
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ระยะทางไปโรงเรียนที่ผ่านถนนลูกรัง - <?= $STUDENT->RockJourneyDistance; ?> กม.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ระยะทางไปโรงเรียนที่ผ่านถนนลาดยาง - <?= $STUDENT->RubberJourneyDistance; ?> กม.
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ระยะทางไปโรงเรียนที่ผ่านทางน้ำ - <?= $STUDENT->WaterJourneyDistance; ?> กม.
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลความพิการ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY WHERE DISABILITY_CODE = ' . $STUDENT->DisabilityCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ความพิการ - <?= $SELECT->DISABILITY_NAME; ?>
                            <?php } ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL WHERE DISABILITY_LEVEL_CODE = ' . $STUDENT->DisabilityLevelCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ระดับความพิการ - <?= $SELECT->DISABILITY_LEVEL_NAME; ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            รายละเอียดข้อมูลความพิการ - <?= $STUDENT->DisabilityDetail; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลความด้อยโอกาส</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED WHERE DISAVANTAGED_CODE = ' . $STUDENT->DisadvantagedCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ความด้อยโอกาส - <?= $SELECT->DISAVANTAGED_NAME; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ขาดแคลนแบบเรียน - <?php if ($STUDENT->LackingBookFlag == 1) {
                                                    echo 'ขาดแคลน';
                                                } else echo 'ไม่ขาดแคลน'; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ขาดแคลนอาหารกลางวัน - <?php if ($STUDENT->LackingFoodFlag == 1) {
                                                        echo 'ขาดแคลน';
                                                    } else echo 'ไม่ขาดแคลน'; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ขาดแคลนเครื่องเขียน - <?php if ($STUDENT->LackingStationeryFlag == 1) {
                                                        echo 'ขาดแคลน';
                                                    } else echo 'ไม่ขาดแคลน'; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            ขาดแคลนเครื่องแบบ - <?php if ($STUDENT->LackingUniformFlag == 1) {
                                                    echo 'ขาดแคลน';
                                                } else echo 'ไม่ขาดแคลน'; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลความเกณฑ์ความยากจน</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            รายได้ครอบครัวต่อเดือน - <?= $STUDENT->FamilyMonthlyIncome; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            สวัสดิการแห่งรัฐ - <?php if ($STUDENT->StateWelfareFlag == 1) {
                                                    echo 'ไม่ได้รับ';
                                                } else echo 'ได้รับ'; ?>
                        </div>
                    </div>

                </div>


                <div class="modal-footer">
                    <a href="edit-forms-student?StudentReferenceID=<?= $STUDENT->StudentReferenceID; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------  END --------------------------------->
<?php } ?>


<?php
$result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.SchoolID = ' . $_GET['SchoolID'] . ' AND STUDENT.EducationYear = ' . $_GET['EducationYear'] . ' AND STUDENT.Semester = ' . $_GET['Semester'] . ' AND STUDENT.GradeLevelCode = ' . $_GET['GradeLevelCode'] . ' AND STUDENT.EducationLevelCode = ' . $_GET['EducationLevelCode'] . ' 
                        ');
foreach ($result->result() as $STUDENT) {
?>
    <div class="modal fade" id="Delete<?= $STUDENT->StudentReferenceID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('delete-student/' . $STUDENT->StudentReferenceID . '/' . $STUDENT->SchoolID . '/' . $STUDENT->EducationYear . '/' . $STUDENT->Semester . '/' . $STUDENT->EducationLevelCode . '/' . $STUDENT->GradeLevelCode); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>