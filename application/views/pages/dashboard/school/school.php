<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลสถานศึกษา</h1>
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
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">
                        </h4>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ตราสัญลักษณ์</th>
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
                                <td style="text-align: center;"><img src="image/school/<?= $SCHOOL->ImageSchool; ?>" alt="" width="70px" height="70px"></td>
                                <td style="padding-top: 30px;"><?= $SCHOOL->SchoolNameThai; ?></td>
                                <td style="padding-top: 30px;"><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                <td style="padding-top: 30px; text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $SCHOOL->SchoolID; ?>"><i class="bi bi-card-list"></i></button>
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

INNER JOIN CLS_SUBDISTRICT ON SCHOOL.SchoolAddressSubdistrictCode = CLS_SUBDISTRICT.SUBDISTRICT_CODE
INNER JOIN CLS_DISTRICT ON SCHOOL.SchoolAddressDistrictCode = CLS_DISTRICT.DISTRICT_CODE
INNER JOIN CLS_PROVINCE ON SCHOOL.SchoolAddressProvinceCode = CLS_PROVINCE.PROVINCE_CODE

INNER JOIN CLS_EDUCATION_LEVEL ON SCHOOL.EducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
INNER JOIN CLS_MUNICIPAL ON SCHOOL.MunicipalCode = CLS_MUNICIPAL.MUNICIPAL_CODE

'
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
                <div class="modal-body" style="padding-left: 35px; padding-top: 10px;">
                    <div class="row">
                        <div class="col-2" style="padding-bottom: 8px; padding-left: 40px; padding-top: 10px;">
                            <img src=" image/school/<?= $SCHOOL->ImageSchool; ?>" alt="" width="100%" height="80%" style="padding-top: 20px;">
                        </div>
                        <div class=" col-10" style="padding-top: 8px; padding-left: 40px; padding-right: 60px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ชื่อสถานศึกษา : <?= $SCHOOL_DETAIL->SchoolNameThai; ?> (<?= $SCHOOL_DETAIL->SchoolNameEnglish; ?> )
                                        <a style="float: right;" href="edit-school-main?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <lable style="padding-left: 20px;">วันก่อตั้ง : <?= DateThai($SCHOOL_DETAIL->SchoolEstablishedDate); ?></lable><br>
                                            <lable style="padding-left: 20px;">ประเภทสถานศึกษา : <?= $SCHOOL_DETAIL->SCHOOL_TYPE_NAME; ?></lable><br>
                                            <lable style="padding-left: 20px;">ระดับศึกษาที่เปิดสอน : <?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></lable><br>
                                            <lable style="padding-left: 20px;">สถานะของสถานศึกษา : <?= $SCHOOL_DETAIL->SCHOOL_STATUS_NAME; ?></lable>
                                        </div>
                                        <div class="col-6">
                                            <lable style="padding-left: 20px;">พื้นที่นวัตกรรม : <?= $SCHOOL_DETAIL->INNOVATION_AREA_NAME; ?></lable><br>
                                            <lable style="padding-left: 20px;">หน่วยงานต้นสังกัด : <?= $SCHOOL_DETAIL->JURISDICTION_NAME; ?></lable><br>
                                            <lable style="padding-left: 20px;">เขตปกครอง : <?= $SCHOOL_DETAIL->MUNICIPAL_NAME; ?></lable>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลที่ตั้ง
                                        <a style="float: right;" href="edit-forms-school-address?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>

                                    <label style="padding-left: 20px;">บ้านเลขที่
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressHouseNumber == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressHouseNumber;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">หมู่ที่
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressMoo == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressMoo;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">ถนน
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressStreet == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressStreet;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">ซอย
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressSoi == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressSoi;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">ตรอก
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressTrok == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressTrok;
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">ตำบล
                                        <?php if ($SCHOOL_DETAIL->SUBDISTRICT_NAME == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SUBDISTRICT_NAME;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">อำเภอ
                                        <?php if ($SCHOOL_DETAIL->DISTRICT_NAME == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->DISTRICT_NAME;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">จังหวัด
                                        <?php if ($SCHOOL_DETAIL->PROVINCE_NAME == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->PROVINCE_NAME;
                                        } ?>
                                    </label>
                                    <label style="padding-left: 10px;">รหัสไปรษณีย์
                                        <?php if ($SCHOOL_DETAIL->SchoolAddressPostcode == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolAddressPostcode;
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">ค่าตำแหน่งพิกัดทาง :
                                        <?php if ($SCHOOL_DETAIL->SchoolLatitude == "" && $SCHOOL_DETAIL->SchoolLongitude == "") {
                                            echo '-';
                                        } else {
                                            echo $SCHOOL_DETAIL->SchoolLatitude . ',' . $SCHOOL_DETAIL->SchoolLongitude;
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">ลิ้งแผนที่ :
                                        <?php if ($SCHOOL_DETAIL->SchoolMapURL == "") {
                                            echo '-';
                                        } else {
                                        ?>
                                            <a href="<?= $SCHOOL_DETAIL->SchoolMapURL ?>" class="btn btn-sm btn-light"><?= $SCHOOL_DETAIL->SchoolMapURL ?></a>
                                        <?php
                                        } ?>
                                    </label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลติดต่อ
                                        <a style="float: right;" href="edit-forms-school-contact?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <div class="row">
                                        <div class=" col-6">
                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์ :
                                                <?php if ($SCHOOL_DETAIL->SchoolPhoneNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo $SCHOOL_DETAIL->SchoolPhoneNumber;
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">หมายเลขโทรศัพท์สำรอง :
                                                <?php if ($SCHOOL_DETAIL->SchoolSecondPhoneNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo $SCHOOL_DETAIL->SchoolSecondPhoneNumber;
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">หมายเลขโทรสาร :
                                                <?php if ($SCHOOL_DETAIL->SchoolFaxNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo $SCHOOL_DETAIL->SchoolFaxNumber;
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">หมายเลขโทรสารสำรอง :
                                                <?php if ($SCHOOL_DETAIL->SchoolSecondFaxNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo $SCHOOL_DETAIL->SchoolSecondFaxNumber;
                                                } ?>
                                            </label>
                                        </div>
                                        <div class=" col-6">
                                            <label style="padding-left: 20px;">อีเมลล์ :
                                                <?php if ($SCHOOL_DETAIL->SchoolEmail == "") {
                                                    echo '-';
                                                } else {
                                                    echo $SCHOOL_DETAIL->SchoolEmail;
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">เว็บไซต์ :
                                                <?php if ($SCHOOL_DETAIL->SchoolWebsiteURL == "") {
                                                    echo '-';
                                                } else {
                                                ?>
                                                    <a href="<?= $SCHOOL_DETAIL->SchoolWebsiteURL ?>" class="btn btn-sm btn-light"><?= $SCHOOL_DETAIL->SchoolWebsiteURL ?></a>
                                                <?php
                                                } ?>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลผู้บริหาร
                                        <a style="float: right;" href="edit-forms-school-administrator?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>

                                    <label style="padding-left: 20px;">ชื่อผู้บริหาร :
                                        <?php if ($SCHOOL_DETAIL->AdministratorNameThai == "" &&  $SCHOOL_DETAIL->AdministratorLastNameThai == "") {
                                            echo '-';
                                        } else {
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_CODE = ' . $SCHOOL_DETAIL->AdministratorPrefixCode . '');
                                            foreach ($result->result() as $PREFIX) {
                                                echo $PREFIX->PREFIX_NAME . $SCHOOL_DETAIL->AdministratorNameThai . ' ' . $SCHOOL_DETAIL->AdministratorLastNameThai;
                                            }
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลสาธารณูปโภค
                                        <a style="float: right;" href="edit-forms-school-utilities?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <label style="padding-left: 20px;">ประเภทแหล่งกำเนิดไฟฟ้า :
                                        <?php if ($SCHOOL_DETAIL->ElectricTypeCode == "") {
                                            echo '-';
                                        } else {
                                            $result = $this->db->query('SELECT * FROM CLS_ELECTRIC_TYPE WHERE ELECTRIC_TYPE_CODE = ' . $SCHOOL_DETAIL->ElectricTypeCode . '');
                                            foreach ($result->result() as $ELECTRIC_TYPE) {
                                                echo $ELECTRIC_TYPE->ELECTRIC_TYPE_NAME;
                                            }
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">การใช้งานอินเทอร์เน็ต :
                                        <?php if ($SCHOOL_DETAIL->InternetTypeCode == "") {
                                            echo '-';
                                        } else {
                                            $result = $this->db->query('SELECT * FROM CLS_INTERNET_TYPE WHERE INTERNET_TYPE_CODE = ' . $SCHOOL_DETAIL->InternetTypeCode . '');
                                            foreach ($result->result() as $INTERNET_TYPE) {
                                                echo $INTERNET_TYPE->INTERNET_TYPE_NAME;
                                            }
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">แหล่งน้ำที่โรงเรียน :
                                        <?php if ($SCHOOL_DETAIL->WaterTypeCode == "") {
                                            echo '-';
                                        } else {
                                            $result = $this->db->query('SELECT * FROM CLS_WATER_TYPE WHERE WATER_TYPE_CODE = ' . $SCHOOL_DETAIL->WaterTypeCode . '');
                                            foreach ($result->result() as $WATER_TYPE) {
                                                echo $WATER_TYPE->WATER_TYPE_NAME;
                                            }
                                        } ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลสื่อการเรียนการสอน
                                        <a style="float: right;" href="edit-forms-school-teaching?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <label style="padding-left: 20px;">การใช้สื่อการเรียนการสอน :
                                        <?php if ($SCHOOL_DETAIL->EducationContentCode == "") {
                                            echo '-';
                                        } else {
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_CONTENT WHERE EDUCATION_CONTENT_CODE = ' . $SCHOOL_DETAIL->EducationContentCode . '');
                                            foreach ($result->result() as $EDUCATION_CONTENT) {
                                                echo $EDUCATION_CONTENT->EDUCATION_CONTENT_NAME;
                                            }
                                        } ?>
                                    </label><br>
                                    <label style="padding-left: 20px;">อยู่ในโครงการการศึกษาทางไกลผ่านดาวเทียม :
                                        <?php if ($SCHOOL_DETAIL->DLTVFlag == "") {
                                            echo '-';
                                        } else {
                                            if ($SCHOOL_DETAIL->DLTVFlag == '0') {
                                                echo 'ไม่อยู่ในโครงการ';
                                            } else echo 'อยู่ในโครงการ';
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลทางสถิติ
                                        <a style="float: right;" href="edit-forms-school-statistical?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <label style="padding-left: 20px;">เครื่องคอมพิวเตอร์ที่เชื่อมต่อเครือข่าย :
                                                <?php if ($SCHOOL_DETAIL->ComputerOnlineNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ComputerOnlineNumber . ' เครื่อง';
                                                } ?>
                                            </label>
                                            <label style="padding-left: 20px;">เครื่องคอมพิวเตอร์ Stand alone :
                                                <?php if ($SCHOOL_DETAIL->ComputerStandaloneNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ComputerStandaloneNumber . ' เครื่อง';
                                                } ?>
                                            </label>
                                            <label style="padding-left: 20px;">เครื่องคอมพิวเตอร์สำหรับการเรียนการสอน :
                                                <?php if ($SCHOOL_DETAIL->ComputerTeachNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ComputerTeachNumber . ' เครื่อง';
                                                } ?>
                                            </label>
                                            <label style="padding-left: 20px;">เครื่องคอมพิวเตอร์สำหรับการบริหารจัดการ :
                                                <?php if ($SCHOOL_DETAIL->ComputerManageNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ComputerManageNumber . ' เครื่อง';
                                                } ?>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label style="padding-left: 20px;">ห้องน้ำสำหรับนักเรียนชาย :
                                                <?php if ($SCHOOL_DETAIL->ToiletMaleStudentNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ToiletMaleStudentNumber . ' ห้อง';
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">ห้องน้ำสำหรับนักเรียนหญิง :
                                                <?php if ($SCHOOL_DETAIL->ToiletFemaleStudentNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ToiletFemaleStudentNumber . ' ห้อง';
                                                } ?>
                                            </label><br>
                                            <label style="padding-left: 20px;">ห้องน้ำทั้งหมด :
                                                <?php if ($SCHOOL_DETAIL->ToiletCombinationNumber == "") {
                                                    echo '-';
                                                } else {
                                                    echo ' ' . $SCHOOL_DETAIL->ToiletCombinationNumber  . ' ห้อง';
                                                } ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลรางวัล
                                        <a style="float: right;" href="school-award?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <table class="table">

                                        <?php
                                        $result = $this->db->query('SELECT * , COUNT(AwardName) As CountAward
                                        FROM SCHOOL_AWARD 
                                        INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
                                        INNER JOIN CLS_AWARD_LEVEL ON SCHOOL_AWARD.AwardLevelCode = CLS_AWARD_LEVEL.AWARD_LEVEL_CODE
                                        WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');

                                        foreach ($result->result() as $AWARD) {
                                            if ($AWARD->CountAward == 0) {
                                                echo '- ไม่พบข้อมูล -';
                                            } else {
                                        ?>
                                                <label style="padding-left: 20px;">ปีที่ได้รับรางวัล : <?= $AWARD->AwardYear; ?></label>
                                                <label style="padding-left: 10px;">ชื่อ : <?= $AWARD->AwardName; ?></label>
                                                <label style="padding-left: 10px;">แหล่งที่มา : <?= $AWARD->AwardSource; ?></label>
                                                <label style="padding-left: 10px;"><?= $AWARD->AWARD_LEVEL_NAME; ?></label><br>
                                        <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลห้องเรียน
                                        <a style="float: right;" href="school-classroom?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <table class="table">

                                        <?php
                                        $result = $this->db->query('SELECT * , COUNT(ClassroomGradeLevelCode) As CountRoom
                                        FROM SCHOOL_CLASSROOM 
                                        INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID 
                                        INNER JOIN CLS_GRADE_LEVEL ON SCHOOL_CLASSROOM.ClassroomGradeLevelCode  = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE 
                                        WHERE SCHOOL_CLASSROOM.DeleteStatus = 0 AND SCHOOL_CLASSROOM.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');

                                        foreach ($result->result() as $CLASSROOM) {
                                            if ($CLASSROOM->CountRoom == 0) {
                                                echo '- ไม่พบข้อมูล -';
                                            } else {
                                        ?>
                                                <label style="padding-left: 20px;">ชื่อระดับชั้น : <?= $CLASSROOM->GRADE_LEVEL_NAME; ?></label>
                                                <label style="padding-left: 10px;">จำนวน <?= $CLASSROOM->ClassroomAmount; ?> ห้อง</label><br>
                                        <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-12" style="padding-left: 40px; padding-right: 60px;">
                            <div class=" card">
                                <div class="card-body">
                                    <h5 class="card-title">ข้อมูลอาคาร
                                        <a style="float: right;" href="school-building?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>
                                    <table class="table">

                                        <?php
                                        $result = $this->db->query('SELECT * , COUNT(BuildingName) As CountBuilding
                                        FROM SCHOOL_BUILDING 
                                        INNER JOIN SCHOOL ON SCHOOL_BUILDING.SchoolID = SCHOOL.SchoolID 
                                        INNER JOIN CLS_BUILDING_TYPE ON SCHOOL_BUILDING.BuildingTypeCode  = CLS_BUILDING_TYPE.BUILDING_TYPE_CODE 
                                        INNER JOIN CLS_BUILDING_DESIGN ON SCHOOL_BUILDING.BuildingDesignCode  = CLS_BUILDING_DESIGN.BUILDING_DESIGN_CODE 
                                        WHERE SCHOOL_BUILDING.DeleteStatus = 0 AND SCHOOL_BUILDING.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');

                                        foreach ($result->result() as $SCHOOL_BUILDING) {
                                            if ($SCHOOL_BUILDING->CountBuilding == 0) {
                                                echo '- ไม่พบข้อมูล -';
                                            } else {
                                        ?>
                                                <label style="padding-left: 20px;">ชื่ออาคาร : <?= $SCHOOL_BUILDING->BuildingName; ?></label>
                                                <label style="padding-left: 10px;">ประเภท : <?= $SCHOOL_BUILDING->BUILDING_TYPE_NAME; ?></label>
                                                <label style="padding-left: 10px;">แบบ : <?= $SCHOOL_BUILDING->BUILDING_DESIGN_NAME; ?></label>
                                                <label style="padding-left: 10px;">มีจำนวนห้อง : <?= $SCHOOL_BUILDING->BuildingRoom; ?> ห้อง</label>
                                                <label style="padding-left: 10px;">วันที่เริ่มก่อสร้าง : <?= DateThai($SCHOOL_BUILDING->BuildingConstructionDate); ?></label>

                                        <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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