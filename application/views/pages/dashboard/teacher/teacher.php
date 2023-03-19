<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลครูและบุคลากรทางการศึกษา</h1>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span></span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อสถานศึกษา</th>
                            <th scope="col">คำนำหน้าชื่อ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ชื่อตำแหน่ง</th>
                            <th scope="col">กลุ่มสาระวิชาที่สอน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT  TEACHER.TeacherID ,TEACHER.SchoolID, TEACHER.TeacherNameThai, SCHOOL.SchoolNameThai ,TEACHER.TeacherLastNameThai, CLS_PREFIX.PREFIX_NAME, CLS_POSITION.POSITION_NAME, CLS_MAJOR.MAJOR_NAME
                                    FROM TEACHER
                                    INNER JOIN SCHOOL ON TEACHER.SchoolID = SCHOOL.SchoolID
                                    INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                                    INNER JOIN CLS_POSITION ON TEACHER.PositionCode = CLS_POSITION.POSITION_CODE
                                    INNER JOIN CLS_MAJOR ON TEACHER.EntryMajorCode = CLS_MAJOR.MAJOR_CODE
                                    WHERE TEACHER.DeleteStatus = 0
                                  ');

                        foreach ($result->result() as $TEACHER) {
                        ?>
                            <tr>

                                <td><?= $TEACHER->SchoolNameThai; ?></td>
                                <td><?= $TEACHER->PREFIX_NAME; ?></td>
                                <td><?= $TEACHER->TeacherNameThai; ?></td>
                                <td><?= $TEACHER->TeacherLastNameThai; ?></td>
                                <td><?= $TEACHER->POSITION_NAME; ?></td>
                                <td><?= $TEACHER->MAJOR_NAME; ?></td>
                                <td style="text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $TEACHER->TeacherID; ?>"><i class="bi bi-card-list"></i></button></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-teacher?TeacherID=<?= $TEACHER->TeacherID; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp;<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $TEACHER->TeacherID; ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
$result = $this->db->query('SELECT * 
                FROM TEACHER
                INNER JOIN SCHOOL ON TEACHER.SchoolID = SCHOOL.SchoolID
                INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                INNER JOIN CLS_POSITION ON TEACHER.PositionCode = CLS_POSITION.POSITION_CODE
                INNER JOIN CLS_MAJOR ON TEACHER.EntryMajorCode = CLS_MAJOR.MAJOR_CODE
                INNER JOIN CLS_NATIONALITY ON TEACHER.TeacherNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                INNER JOIN CLS_RACE ON TEACHER.TeacherRaceCode = CLS_RACE.RACE_CODE
                INNER JOIN CLS_RELIGION ON TEACHER.TeacherReligionCode = CLS_RELIGION.RELIGION_CODE
                INNER JOIN CLS_MARRIAGE_STATUS ON TEACHER.MarriageStatusCode = CLS_MARRIAGE_STATUS.MARRIAGE_STATUS_CODE
                INNER JOIN CLS_PERSONNEL_STATUS ON TEACHER.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                INNER JOIN CLS_EDUCATION_LEVEL ON TEACHER.EntryEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                INNER JOIN CLS_DEGREE ON TEACHER.EntryDegreeCode = CLS_DEGREE.DEGREE_CODE
                INNER JOIN CLS_PROGRAM ON TEACHER.EntryProgramCode = CLS_PROGRAM.PROGRAM_CODE
                INNER JOIN CLS_POSITION_LEVEL ON TEACHER.PositionLevelCode = CLS_POSITION_LEVEL.POSITION_LEVEL_CODE
                INNER JOIN CLS_TEACHER_QUALIFICATION ON TEACHER.TeacherQualificationCode = CLS_TEACHER_QUALIFICATION.TEACHER_QUALIFICATION_CODE
                INNER JOIN CLS_TALENT ON TEACHER.TeacherTalentCode = CLS_TALENT.TALENT_CODE
                INNER JOIN CLS_SALARY_TYPE ON TEACHER.SalaryTypeCode = CLS_SALARY_TYPE.SALARY_TYPE_CODE
                INNER JOIN CLS_CONTRACT_TYPE ON TEACHER.ContractTypeCode = CLS_CONTRACT_TYPE.CONTRACT_TYPE_CODE
                INNER JOIN CLS_PERSONNEL_TYPE ON TEACHER.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                INNER JOIN CLS_BLOOD ON TEACHER.TeacherBloodCode = CLS_BLOOD.BLOOD_CODE
                INNER JOIN CLS_GENDER ON TEACHER.TeacherGenderCode = CLS_GENDER.GENDER_CODE
                INNER JOIN CLS_CITIZEN_ID_TYPE ON TEACHER.TeacherPersonalIDTypeCode = CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                WHERE TEACHER.DeleteStatus = 0
                ');
foreach ($result->result() as $TEACHER) {
?>

    <div class="modal fade" id="Modal<?= $TEACHER->TeacherID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">

                <!---------------------   --------------------->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียด </h5>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    <hr>
                </div>
                <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px; ">
                            ชื่อสถานศึกษา -
                            <?php
                            $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID = ' . $TEACHER->SchoolID . '');
                            foreach ($result->result() as $SCHOOL_NAME) {
                                echo $SCHOOL_NAME->SchoolNameThai . ' (' . $SCHOOL_NAME->SchoolNameEnglish . ')';
                            }
                            ?>

                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px; ">
                            ปีการศึกษา <?= $TEACHER->EducationYear; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px; ">
                            ภาคเรียน <?= $TEACHER->Semester; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลครูและบุคลากรทางการศึกษา</b></h6>

                    <div class="row">

                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px; ">
                            รหัสประจำตัวครูและบุลากร <?= $TEACHER->TeacherID; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลบุคคล</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            ชื่อ-นามสกุล - <?= $TEACHER->PREFIX_NAME; ?><?= $TEACHER->TeacherNameThai; ?> <?= $TEACHER->TeacherLastNameThai; ?> (<?= $TEACHER->TeacherNameEnglish; ?> <?= $TEACHER->TeacherLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $TEACHER->TeacherPersonalID; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $TEACHER->TeacherPassportNumber; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            วันเกิด - <?= DateThai($TEACHER->TeacherBirthDate); ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            เพศ - <?= $TEACHER->GENDER_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            กลุ่มเลือด - <?= $TEACHER->BLOOD_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            สัญชาติ - <?= $TEACHER->NATIONALITY_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            เชื้อชาติ - <?= $TEACHER->RACE_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            ศาสนา - <?= $TEACHER->RELIGION_NAME; ?>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $TEACHER->TeacherOfficialAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $TEACHER->TeacherOfficialAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $TEACHER->TeacherOfficialAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $TEACHER->TeacherOfficialAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $TEACHER->TeacherOfficialAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $TEACHER->TeacherOfficialAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $TEACHER->TeacherOfficialAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $TEACHER->TeacherOfficialAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $TEACHER->TeacherOfficialAddressPostcode; ?></label>
                            <label style="padding-left: 10px;">หมายเลขโทรศัพท์ <?= $TEACHER->TeacherOfficialAddressPhoneNumber; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <h6><b>ข้อมูลที่อยู่ (ปัจจุบัน)</b></h6>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $TEACHER->TeacherCurrentAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $TEACHER->TeacherCurrentAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $TEACHER->TeacherCurrentAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $TEACHER->TeacherCurrentAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $TEACHER->TeacherCurrentAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $TEACHER->TeacherCurrentAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $TEACHER->TeacherCurrentAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $TEACHER->TeacherCurrentAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $TEACHER->TeacherCurrentAddressPostcode; ?></label><br>
                            <label>หมายเลขโทรศัพท์ <?= $TEACHER->TeacherCurrentAddressPhoneNumber; ?></label><br>
                            <label>อีเมลล์ <?= $TEACHER->TeacherEmail; ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลคู่สมรส</b></h6>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            สถานภาพการสมรส - <?= $TEACHER->MarriageStatusCode; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = ' . $TEACHER->SpousePrefixCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                ชื่อ-นามสกุลคู่สมรส - <?= $SELECT->PREFIX_NAME; ?>
                            <?php } ?>
                            <?= $TEACHER->SpouseNameThai; ?> <?= $TEACHER->SpouseLastNameThai; ?> (<?= $TEACHER->SpouseNameEnglish; ?> <?= $TEACHER->SpouseLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $TEACHER->SpousePersonalID; ?>
                        </div>

                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลตำแหน่งและการปฏิบัตรราชการ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>สถานะปฎิบัติราชการ - <?= $TEACHER->PERSONNEL_STATUS_NAME; ?></label>
                            <label>ระดับการศึกษาที่บรรจุ - <?= $TEACHER->EDUCATION_LEVEL_NAME; ?></label><br>
                            <label>สาขาวิชาที่บรรจุ - <?= $TEACHER->PROGRAM_NAME; ?></label>

                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>วุฒิการศึกษาที่บรรจุ - <?= $TEACHER->DEGREE_NAME; ?></label>
                            <label>กลุ่มวิชาเอกที่บรรจุ - <?= $TEACHER->MAJOR_NAME; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>วันที่บรรจุ - <?= DateThai($TEACHER->PersonnelStartDate); ?></label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>วันที่เกษียณ - <?= DateThai($TEACHER->PersonnelRetireDate); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ประเภทบุคลากร - <?= $TEACHER->PERSONNEL_TYPE_NAME; ?></label><br>
                            <label>ตำแหน่ง - <?= $TEACHER->POSITION_NAME; ?></label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ระดับตำแหน่ง - <?= $TEACHER->POSITION_LEVEL_NAME; ?></label><br>
                            <label>วันที่ดำรงตำแหน่ง - <?= DateThai($TEACHER->PositionStartDate); ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลการว่าจ้าง</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>เลขที่สัญญา - <?= $TEACHER->ContractNumber; ?></label>
                            <label>จำนวนครั้งที่ทำสัญญา - <?= $TEACHER->ContractTimes; ?></label><br>
                            <label>ลักษณะการจ้าง - <?= $TEACHER->CONTRACT_TYPE_NAME; ?></label>

                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>จ้างมาแล้วกี่ปี - <?= $TEACHER->ContractYear; ?> ปี</label><br>
                            <label>วันที่เริ่มต้นสัญญา - <?= DateThai($TEACHER->ContractStartDate); ?></label><br>
                            <label>วันที่สิ้นสุดสัญญา - <?= DateThai($TEACHER->ContractEndDate); ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลเงินเดือน และเงินอื่นๆ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ประเภทเงินงบประมาณ - <?= $TEACHER->SALARY_TYPE_NAME; ?></label><br>
                            <label>เงินเดือนปัจจุบัน - <?= $TEACHER->CurrentSalary; ?></label><br>
                            <label>เงินวิทยฐานะ - <?= $TEACHER->AcademicSalary; ?></label><br>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label></label><br>
                            <label>เงินค่าตอบแทน - <?= $TEACHER->CompensationSalary; ?></label><br>
                            <label>เงินประจำตำแหน่ง - <?= $TEACHER->EmolumentsSalary; ?></label><br>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลวุฒิทางครู</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>การมีวุฒิทางครู - <?= $TEACHER->TEACHER_QUALIFICATION_NAME; ?></label><br>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลความสามารถพิเศษ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ความสามารถพิเศษ - <?= $TEACHER->TALENT_NAME; ?></label><br>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i></button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$result = $this->db->query('SELECT * FROM TEACHER ');
foreach ($result->result() as $TEACHER) {
?>
    <div class="modal fade" id="Delete<?= $TEACHER->TeacherID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('delete-teacher/' . $TEACHER->TeacherID); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>