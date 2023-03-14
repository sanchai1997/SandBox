<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลบุคลากรอื่น</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Presonnel</li>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Presonnel</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel" class="btn btn-success ">เพิ่มข้อมูลบุคลากรอื่น</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีที่เก็บข้อมูล</th>
                            <th scope="col">รอบที่เก็บข้อมูล</th>
                            <th scope="col">หมายเลขบัตรประจำตัวประชาชนน</th>
                            <th scope="col">เลขที่หนังสือเดินทาง</th>
                            <th scope="col">คำนำหน้าชื่อ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">หมายเลขโทรศัพท์</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                                    WHERE PERSONNEL.DeleteStatus = 0
                                   ');

                        foreach ($result->result() as $PERSONNEL) {
                        ?>
                            <tr>

                                <td><?= $PERSONNEL->EntryYear; ?></td>
                                <td><?= $PERSONNEL->EntryTimes; ?></td>
                                <td><?= $PERSONNEL->PersonnelPersonalID; ?></td>
                                <td><?= $PERSONNEL->PersonnelPassportNumber; ?></td>
                                <td><?= $PERSONNEL->PREFIX_NAME; ?></td>
                                <td><?= $PERSONNEL->PersonnelNameThai; ?></td>
                                <td><?= $PERSONNEL->PersonnelLastNameThai; ?></td>
                                <td><?= $PERSONNEL->PersonnelCurrentPhoneNumber; ?></td>
                                <td style="text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $PERSONNEL->PersonnelID; ?>"><i class="bi bi-card-list"></i></button></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-personnel?PersonnelID=<?= $PERSONNEL->PersonnelID; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp;<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $PERSONNEL->PersonnelID; ?>"><i class=" bi bi-trash"></i></button>
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
                FROM PERSONNEL
                INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                INNER JOIN CLS_GENDER ON PERSONNEL.PersonnelGenderCode = CLS_GENDER.GENDER_CODE
                INNER JOIN CLS_NATIONALITY ON PERSONNEL.PersonnelNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                INNER JOIN CLS_RACE ON PERSONNEL.PersonnelRaceCode = CLS_RACE.RACE_CODE
                INNER JOIN CLS_RELIGION ON PERSONNEL.PersonnelReligionCode = CLS_RELIGION.RELIGION_CODE
                INNER JOIN CLS_BLOOD ON PERSONNEL.PersonnelBloodCode = CLS_BLOOD.BLOOD_CODE
                INNER JOIN CLS_PERSONNEL_STATUS ON PERSONNEL.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                INNER JOIN CLS_PERSONNEL_TYPE ON PERSONNEL.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                INNER JOIN CLS_POSITION ON PERSONNEL.PositionCode = CLS_POSITION.POSITION_CODE
                INNER JOIN CLS_POSITION_LEVEL ON PERSONNEL.PositionLevelCode = CLS_POSITION_LEVEL.POSITION_LEVEL_CODE
                INNER JOIN CLS_CONTRACT_TYPE ON PERSONNEL.ContractTypeCode = CLS_CONTRACT_TYPE.CONTRACT_TYPE_CODE
                INNER JOIN CLS_SALARY_TYPE ON PERSONNEL.SalaryTypeCode = CLS_SALARY_TYPE.SALARY_TYPE_CODE
                INNER JOIN CLS_TALENT ON PERSONNEL.PersonnelTalentCode = CLS_TALENT.TALENT_CODE
                WHERE PERSONNEL.DeleteStatus = 0 
                ');
foreach ($result->result() as $PERSONNEL) {
?>

    <div class="modal fade" id="Modal<?= $PERSONNEL->PersonnelID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">

                <!---------------------   --------------------->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียด
                    </h5>
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 300px; padding-top: 15px;">
                        <a href="personnel-additional-position?PersonnelID=<?= $PERSONNEL->PersonnelID; ?>" class="btn btn-primary btn-sm">ตำแหน่งหน้าที่เพิ่มเติม</a>
                        <a href="" class="btn btn-primary btn-sm">วิทยฐานและตำแหน่งวิชาการ</a>
                        <a href="" class="btn btn-primary btn-sm">ระดับการศึกษา</a>
                        <a href="" class="btn btn-primary btn-sm">การช่วยราชการ</a>
                    </h5>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    <hr>
                </div>
                <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                    <div class="row">
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px; ">
                            ปีที่เก็บข้อมูล <?= $PERSONNEL->EntryYear; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px; ">
                            รอบเก็บข้อมูลที่ <?= $PERSONNEL->EntryTimes; ?> <?php if ($PERSONNEL->EntryTimes == 1) {
                                                                                echo ' (ข้อมูล ณ วันที่ 10 มิถุนายน)';
                                                                            } else echo ' (ข้อมูล ณ วันที่ 10 พฤศจิกายน)'; ?>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลบุคคล</b></h6>
                    <div class="row">

                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px; ">
                            หน่วยสังต้นสังกัด <?= $PERSONNEL->JURISDICTION_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px; ">
                            ชื่อ-นามสกุล - <?= $PERSONNEL->PREFIX_NAME; ?><?= $PERSONNEL->PersonnelNameThai; ?> <?= $PERSONNEL->PersonnelLastNameThai; ?> (<?= $PERSONNEL->PersonnelNameEnglish; ?> <?= $PERSONNEL->PersonnelLastNameEnglish; ?>)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            หมายเลขบัตรประจำตัวประชาชนน - <?= $PERSONNEL->PersonnelPersonalID; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            เลขที่หนังสือเดินทาง - <?= $PERSONNEL->PersonnelPassportNumber; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            วันเกิด - <?= DateThai($PERSONNEL->PersonnelBirthDate); ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            เพศ - <?= $PERSONNEL->GENDER_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            กลุ่มเลือด - <?= $PERSONNEL->BLOOD_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            สัญชาติ - <?= $PERSONNEL->NATIONALITY_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            เชื้อชาติ - <?= $PERSONNEL->RACE_NAME; ?>
                        </div>
                        <div class="col-3" style="padding-bottom: 8px; padding-left: 40px;">
                            ศาสนา - <?= $PERSONNEL->RELIGION_NAME; ?>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $PERSONNEL->PersonnelOfficialAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $PERSONNEL->PersonnelOfficialAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $PERSONNEL->PersonnelOfficialAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $PERSONNEL->PersonnelOfficialAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $PERSONNEL->PersonnelOfficialAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $PERSONNEL->PersonnelOfficialAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $PERSONNEL->PersonnelOfficialAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $PERSONNEL->PersonnelOfficialAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $PERSONNEL->PersonnelOfficialAddressPostcode; ?></label>
                            <label style="padding-left: 10px;">หมายเลขโทรศัพท์ <?= $PERSONNEL->PersonnelOfficialAddressPhoneNumber; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <h6><b>ข้อมูลที่อยู่ (ปัจจุบัน)</b></h6>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $PERSONNEL->PersonnelCurrentAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $PERSONNEL->PersonnelCurrentAddressMoo; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $PERSONNEL->PersonnelCurrentAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $PERSONNEL->PersonnelCurrentAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $PERSONNEL->PersonnelCurrentAddressTrok; ?></label>
                            <br>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = ' . $PERSONNEL->PersonnelCurrentAddressSubdistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label>ตำบล<?= $SELECT->SUBDISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = ' . $PERSONNEL->PersonnelCurrentAddressDistrictCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">อำเภอ<?= $SELECT->DISTRICT_NAME; ?></label>
                            <?php } ?>
                            <?php
                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = ' . $PERSONNEL->PersonnelCurrentAddressProvinceCode . '');
                            foreach ($result->result() as $SELECT) {
                            ?>
                                <label style="padding-left: 10px;">จังหวัด<?= $SELECT->PROVINCE_NAME; ?></label>
                            <?php } ?>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $PERSONNEL->PersonnelCurrentAddressPostcode; ?></label><br>
                            <label>หมายเลขโทรศัพท์ <?= $PERSONNEL->PersonnelCurrentPhoneNumber; ?></label><br>
                            <label>อีเมลล์ <?= $PERSONNEL->PersonnelEmail; ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลตำแหน่งและการปฏิบัตรราชการ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>สถานะปฎิบัติราชการ - <?= $PERSONNEL->PERSONNEL_STATUS_NAME; ?></label><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>วันที่บรรจุ - <?= DateThai($PERSONNEL->PersonnelStartDate); ?></label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>วันที่เกษียณ - <?= DateThai($PERSONNEL->PersonnelRetireDate); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ประเภทบุคลากร - <?= $PERSONNEL->PERSONNEL_TYPE_NAME; ?></label><br>
                            <label>ตำแหน่ง - <?= $PERSONNEL->POSITION_NAME; ?></label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ระดับตำแหน่ง - <?= $PERSONNEL->POSITION_LEVEL_NAME; ?></label><br>
                            <label>วันที่ดำรงตำแหน่ง - <?= DateThai($PERSONNEL->PositionStartDate); ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลการว่าจ้าง</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>เลขที่สัญญา - <?= $PERSONNEL->ContractNumber; ?></label>
                            <label>จำนวนครั้งที่ทำสัญญา - <?= $PERSONNEL->ContractTimes; ?></label><br>
                            <label>ลักษณะการจ้าง - <?= $PERSONNEL->CONTRACT_TYPE_NAME; ?></label>

                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>จ้างมาแล้วกี่ปี - <?= $PERSONNEL->ContractYear; ?> ปี</label><br>
                            <label>วันที่เริ่มต้นสัญญา - <?= DateThai($PERSONNEL->ContractStartDate); ?></label><br>
                            <label>วันที่สิ้นสุดสัญญา - <?= DateThai($PERSONNEL->ContractEndDate); ?></label>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลเงินเดือน และเงินอื่นๆ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ประเภทเงินงบประมาณ - <?= $PERSONNEL->SALARY_TYPE_NAME; ?></label><br>
                            <label>เงินเดือนปัจจุบัน - <?= $PERSONNEL->CurrentSalary; ?></label><br>
                            <label>เงินวิทยฐานะ - <?= $PERSONNEL->AcademicSalary; ?></label><br>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label></label><br>
                            <label>เงินค่าตอบแทน - <?= $PERSONNEL->CompensationSalary; ?></label><br>
                            <label>เงินประจำตำแหน่ง - <?= $PERSONNEL->EmolumentsSalary; ?></label><br>
                        </div>
                    </div>
                    <h6 style="padding-top: 10px;"><b>ข้อมูลความสามารถพิเศษ</b></h6>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>ความสามารถพิเศษ - <?= $PERSONNEL->TALENT_NAME; ?></label><br>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a style="padding-left: 130px;"></a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$result = $this->db->query('SELECT * FROM PERSONNEL ');
foreach ($result->result() as $PERSONNEL) {
?>
    <div class="modal fade" id="Delete<?= $PERSONNEL->PersonnelID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-personnel/' . $PERSONNEL->PersonnelID); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>