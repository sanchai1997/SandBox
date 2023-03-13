<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลสถานศึกษา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">School</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="school-award" style="float: right;" class="btn btn-sm btn-light" active data-mdb-ripple-color="dark">ข้อมูลรางวัลสถานศึกษา</a>
                <a href="school-classroom" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลห้องเรียนสถานศึกษา</a>
                <a href="school" style="float: right; " class="btn btn-sm btn-outline-secondary" data-mdb-ripple-color="dark">ข้อมูลสถานศึกษา</a>
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
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school" class="btn btn-success">เพิ่มข้อมูลสถานศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">พื้นที่นวัตกรรม</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
                        foreach ($result->result() as $SCHOOL) {
                        ?>
                            <tr>
                                <td><?= $SCHOOL->SchoolNameThai; ?></td>
                                <td>
                                    <?= $SCHOOL->INNOVATION_AREA_NAME; ?>
                                </td>
                                <td style="text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $SCHOOL->SchoolID; ?>"><i class="bi bi-card-list"></i></button></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-school?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp;<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $SCHOOL->SchoolID; ?>"><i class=" bi bi-trash"></i></button>
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
$result = $this->db->query(
    'SELECT * FROM SCHOOL 
INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE
INNER JOIN CLS_JURISDICTION ON SCHOOL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
INNER JOIN CLS_SCHOOL_TYPE ON SCHOOL.SchoolTypeCode = CLS_SCHOOL_TYPE.SCHOOL_TYPE_CODE
INNER JOIN CLS_SCHOOL_STATUS ON SCHOOL.SchoolStatusCode = CLS_SCHOOL_STATUS.SCHOOL_STATUS_CODE
INNER JOIN CLS_MUNICIPAL ON SCHOOL.MunicipalCode = CLS_MUNICIPAL.MUNICIPAL_CODE
INNER JOIN CLS_SUBDISTRICT ON SCHOOL.SchoolAddressSubdistrictCode = CLS_SUBDISTRICT.SUBDISTRICT_CODE
INNER JOIN CLS_DISTRICT ON SCHOOL.SchoolAddressDistrictCode = CLS_DISTRICT.DISTRICT_CODE
INNER JOIN CLS_PROVINCE ON SCHOOL.SchoolAddressProvinceCode = CLS_PROVINCE.PROVINCE_CODE
INNER JOIN CLS_PREFIX ON SCHOOL.AdministratorPrefixCode = CLS_PREFIX.PREFIX_CODE
INNER JOIN CLS_EDUCATION_LEVEL ON SCHOOL.EducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
INNER JOIN CLS_ELECTRIC_TYPE ON SCHOOL.ElectricTypeCode = CLS_ELECTRIC_TYPE.ELECTRIC_TYPE_CODE
INNER JOIN CLS_INTERNET_TYPE ON SCHOOL.InternetTypeCode = CLS_INTERNET_TYPE.INTERNET_TYPE_CODE
INNER JOIN CLS_WATER_TYPE ON SCHOOL.WaterTypeCode = CLS_WATER_TYPE.WATER_TYPE_CODE
INNER JOIN CLS_EDUCATION_CONTENT ON SCHOOL.EducationContentCode = CLS_EDUCATION_CONTENT.EDUCATION_CONTENT_CODE'
);
foreach ($result->result() as $SCHOOL_DETAIL) {
?>

    <!-- Modal -->
    <div class="modal fade" id="Modal<?= $SCHOOL_DETAIL->SchoolID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">

                <!---------------------  ข้อมูลทั่วไปสถานศึกษา --------------------->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียดสถานศึกษา</h5>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    <hr>
                </div>
                <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px; ">
                            รหัสสถานศึกษา <?= $SCHOOL_DETAIL->SchoolID; ?>
                        </div>
                        <div class=" col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            ปีการศึกษา <?= $SCHOOL_DETAIL->EducationYear; ?>
                            ภาคเรียน <?= $SCHOOL_DETAIL->Semester; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            หน่วยงานต้นสังกัด - <?= $SCHOOL_DETAIL->JURISDICTION_NAME; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px; padding-left: 40px;">
                            พื้นที่นวัตกรรม - <?= $SCHOOL_DETAIL->INNOVATION_AREA_NAME; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลรายละเอียดสถานศึกษา</b></h6>
                        <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                            ชื่อสถานศึกษา - <?= $SCHOOL_DETAIL->SchoolNameThai; ?> (<?= $SCHOOL_DETAIL->SchoolNameEnglish; ?> )
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            วันก่อตั้ง - <?= DateThai($SCHOOL_DETAIL->SchoolEstablishedDate); ?>
                        </div>
                        <div class="col-8" style="padding-bottom: 8px; padding-left: 40px;">
                            ประเภทสถานศึกษา - <?= $SCHOOL_DETAIL->SCHOOL_TYPE_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="padding-bottom: 8px; padding-left: 40px;">
                            สถานะของสถานศึกษา - <?= $SCHOOL_DETAIL->SCHOOL_STATUS_NAME; ?>
                        </div>
                        <div class="col-8" style="padding-bottom: 8px; padding-left: 40px;">
                            เขตปกครอง - <?= $SCHOOL_DETAIL->MUNICIPAL_NAME; ?>
                        </div>
                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลที่ตั้ง</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>บ้านเลขที่ <?= $SCHOOL_DETAIL->SchoolAddressHouseNumber; ?> </label>
                            <label style="padding-left: 10px;">หมู่ที่ <?= $SCHOOL_DETAIL->SchoolAddressHouseNumber; ?></label>
                            <label style="padding-left: 10px;">ถนน - <?= $SCHOOL_DETAIL->SchoolAddressStreet; ?></label>
                            <label style="padding-left: 10px;">ซอย - <?= $SCHOOL_DETAIL->SchoolAddressSoi; ?></label>
                            <label style="padding-left: 10px;">ตรอก - <?= $SCHOOL_DETAIL->SchoolAddressTrok; ?></label>
                            <br>
                            <label>ตำบล<?= $SCHOOL_DETAIL->SUBDISTRICT_NAME; ?></label>
                            <label style="padding-left: 10px;">อำเภอ<?= $SCHOOL_DETAIL->DISTRICT_NAME; ?></label>
                            <label style="padding-left: 10px;">จังหวัด<?= $SCHOOL_DETAIL->PROVINCE_NAME; ?></label>
                            <label style="padding-left: 10px;">รหัสไปรษณีย์ <?= $SCHOOL_DETAIL->SchoolAddressPostcode; ?></label>
                            <br>
                            <label>ค่าตำแหน่งพิกัดทาง - <?= $SCHOOL_DETAIL->SchoolLatitude; ?>, <?= $SCHOOL_DETAIL->SchoolLongitude; ?></label>
                            <br>
                            <label>ลิ้งแผนที่ - <?= $SCHOOL_DETAIL->SchoolMapURL; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลติดต่อ</b></h6>
                        <div class="col-12" style="padding-bottom: 8px; padding-left: 40px;">
                            <label>หมายเลขโทรศัพท์ <?= $SCHOOL_DETAIL->SchoolPhoneNumber; ?> </label>
                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์สำรอง <?= $SCHOOL_DETAIL->SchoolSecondPhoneNumber; ?></label>
                            <br>
                            <label>หมายเลขโทรสาร <?= $SCHOOL_DETAIL->SchoolFaxNumber; ?> </label>
                            <label style="padding-left: 20px;">หมายเลขโทรสารสำรอง <?= $SCHOOL_DETAIL->SchoolSecondFaxNumber; ?></label>
                            <br>
                            <label>อีเมลล์ - <?= $SCHOOL_DETAIL->SchoolEmail; ?> </label>
                            <label style="padding-left: 20px;">เว็บไซต์ - <?= $SCHOOL_DETAIL->SchoolWebsiteURL; ?> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px;">
                            <h6 style="padding-top: 10px;"><b>ข้อมูลผู้บริหาร</b></h6>
                            <label style="padding-left: 30px;">ชื่อผู้บริหาร - <?= $SCHOOL_DETAIL->PREFIX_NAME; ?><?= $SCHOOL_DETAIL->AdministratorNameThai; ?> <?= $SCHOOL_DETAIL->AdministratorMiddleNameThai; ?> <?= $SCHOOL_DETAIL->AdministratorLastNameThai; ?></label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px;">
                            <h6 style="padding-top: 10px;"><b>ข้อมูลระดับศึกษาที่เปิดสอน</b></h6>
                            <label style="padding-left: 30px;">ระดับการศึกษา - <?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 8px;">
                            <h6 style="padding-top: 10px;"><b>ข้อมูลสาธารณูปโภค</b></h6>
                            <label style="padding-left: 30px;">ประเภทแหล่งกำเนิดไฟฟ้า - <?= $SCHOOL_DETAIL->ELECTRIC_TYPE_NAME; ?></label><br>
                            <label style="padding-left: 30px;">การใช้งานอินเทอร์เน็ต - <?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></label><br>
                            <label style="padding-left: 30px;">แหล่งน้ำที่โรงเรียน - <?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></label>
                        </div>
                        <div class=" col-6" style="padding-bottom: 8px; ">
                            <h6 style="padding-top: 10px;"><b>สื่อการเรียนการสอน</b></h6>
                            <label style="padding-left: 30px;">การใช้สื่อการเรียนการสอน - <?= $SCHOOL_DETAIL->EDUCATION_CONTENT_NAME; ?></label><br>
                            <label style="padding-left: 30px;">โครงการการศึกษาทางไกลผ่านดาวเทียม (DLTV) - <?php if ($SCHOOL_DETAIL->DLTVFlag = 0) {
                                                                                                                echo 'ไม่อยู่ในโครงการ';
                                                                                                            } else echo 'อยู่ในโครงการ'; ?></label><br>
                        </div>
                    </div>
                    <div class="row">
                        <h6 style="padding-top: 10px;"><b>ข้อมูลทางสถิติ</b></h6>
                        <div class="col-6" style="padding-bottom: 8px;">
                            <label style="padding-left: 30px;">จำนวนเครื่องคอมพิวเตอร์ที่เชื่อมต่อเครือข่าย - <?= $SCHOOL_DETAIL->ComputerOnlineNumber; ?> เครื่อง</label>
                            <label style="padding-left: 30px;">จำนวนเครื่องคอมพิวเตอร์ - <?= $SCHOOL_DETAIL->ComputerStandaloneNumber; ?> เครื่อง</label>
                            <label style="padding-left: 30px;">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน - <?= $SCHOOL_DETAIL->ComputerTeachNumber; ?> เครื่อง</label>
                            <label style="padding-left: 30px;">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารจัดการ - <?= $SCHOOL_DETAIL->ComputerManageNumber; ?> เครื่อง</label>
                        </div>
                        <div class="col-6" style="padding-bottom: 8px;">
                            <label style="padding-left: 30px;">จำนวนห้องน้ำสำหรับนักเรียนชาย - <?= $SCHOOL_DETAIL->ToiletMaleStudentNumber; ?> ห้อง</label>
                            <label style="padding-left: 30px;">จำนวนห้องน้ำสำหรับนักเรียนหญิง - <?= $SCHOOL_DETAIL->ToiletFemaleStudentNumber; ?> ห้อง</label>
                            <label style="padding-left: 30px;">จำนวนห้องน้ำทั้งหมด - <?= $SCHOOL_DETAIL->ToiletCombinationNumber; ?> ห้อง</label>
                        </div>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------  END --------------------------------->
<?php } ?>

<?php
$result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
foreach ($result->result() as $SCHOOL) {
?>
    <div class="modal fade" id="Delete<?= $SCHOOL->SchoolID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-school/' . $SCHOOL->SchoolID); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>