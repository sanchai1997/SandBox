<style>
    .page-content img {
        max-width: 90px;
        height: 100px;
    }

    .page-detail img {
        max-width: 170px;
        height: 190px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <?php if (!isset($_GET['SchoolID'])) { ?>
                    <h1>ข้อมูลสถานศึกษา</h1>
                <?php } ?>
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
            <?php if (!isset($_GET['SchoolID'])) {
            ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
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
                                    </button>&nbsp;
                                    <a href="" class="btn btn-success">อัปโหลดสถานศึกษา</a>&nbsp;
                                    <a href="" class="btn btn-success">อัปโหลดนักเรียน</a>&nbsp;
                                    <a href="" class="btn btn-success">อัปโหลดครูและบุคลากร</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM SCHOOL WHERE DeleteStatus = 0');
                                        foreach ($result->result() as $SHOW_SCHOOL) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="school?SchoolID=<?= $SHOW_SCHOOL->SchoolID  ?>"><?= $SHOW_SCHOOL->SchoolNameThai  ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </h1>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title">
                                <a href="forms-school" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มสถานศึกษา</a>
                            </h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="160px">ตราสัญลักษณ์</th>
                                <th scope="col">ชื่อสถานศึกษา</th>
                                <th scope="col">พื้นที่นวัตกรรม</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
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
                                    <td style="padding-top: 35px; text-align: center;">
                                        <a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                    <td style="padding-top: 35px; text-align: center;">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $SCHOOL->SchoolID; ?>"><i class=" bi bi-trash"></i></button>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            <?php } else { ?>


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
WHERE SCHOOL.SchoolID = ' . $_GET['SchoolID'] . '
'
                );
                foreach ($result->result() as $SCHOOL_DETAIL) {
                ?>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title" style="padding-left: 25px;">
                                    <i class="bi bi-card-list"></i> รายละเอียดข้อมูลสถานศึกษา &nbsp;&nbsp;<a href="school" class="btn btn-secondary btn-sm">ย้อนกลับ</a>
                                </h3>
                            </div>
                            <div class="col">
                                <h5 style="float: left; padding: 15px;" class="card-title">
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($SCHOOL_DETAIL->ImageSchool != '') { ?>
                                <div class="col-2" style="padding-bottom: 8px; padding-left: 70px; padding-top: 0px; ">
                                    <div class="card page-detail" style="width: 180px;">
                                        <img style=" text-align: center; padding: 15px;" src="assets/school/img/<?= $SCHOOL_DETAIL->ImageSchool; ?>" alt="" width="100%" style="padding-top: 20px;">
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
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 30px;" class="card-title">ชื่อสถานศึกษา : <?= $SCHOOL_DETAIL->SchoolNameThai; ?> (<?= $SCHOOL_DETAIL->SchoolNameEnglish; ?>)
                                            <a style="float: right;" href="edit-school-main?SchoolID=<?= $SCHOOL_DETAIL->SchoolID; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <div class="row">
                                            <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                <lable style="padding-left: 20px;">วันก่อตั้ง : <?= DateThai($SCHOOL_DETAIL->SchoolEstablishedDate); ?></lable><br>
                                                <lable style="padding-left: 20px;">ประเภทสถานศึกษา : <?= $SCHOOL_DETAIL->SCHOOL_TYPE_NAME; ?></lable><br>
                                                <lable style="padding-left: 20px;">ระดับศึกษาที่เปิดสอน : <?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></lable><br>
                                                <lable style="padding-left: 20px;">สถานะของสถานศึกษา : <?= $SCHOOL_DETAIL->SCHOOL_STATUS_NAME; ?></lable>
                                            </div>
                                            <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
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
                            <div class=" col-6" style="padding-left: 40px;">
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
                                                <a href="<?= $SCHOOL_DETAIL->SchoolMapURL ?>" target="_blank" class="btn btn-sm btn-light"><?= $SCHOOL_DETAIL->SchoolMapURL ?></a>
                                            <?php
                                            } ?>
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-6" style="padding-right: 60px;">
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
                                                        <a href="<?= $SCHOOL_DETAIL->SchoolWebsiteURL ?>" target="_blank" class="btn btn-sm btn-light"><?= $SCHOOL_DETAIL->SchoolWebsiteURL ?></a>
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
                                            <thead>
                                                <tr>
                                                    <td class="col-2" scope="col">ปีที่ได้รับรางวัล</td>
                                                    <td class="col-4" scope="col">ชื่อ</td>
                                                    <td class="col-4" scope="col">แหล่งที่มา</td>
                                                    <td scope="col">ระดับ</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $result = $this->db->query('SELECT * 
                                        FROM SCHOOL_AWARD 
                                        INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
                                        INNER JOIN CLS_AWARD_LEVEL ON SCHOOL_AWARD.AwardLevelCode = CLS_AWARD_LEVEL.AWARD_LEVEL_CODE
                                        WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');
                                                $Count = 0;
                                                foreach ($result->result() as $AWARD) {
                                                    $Count += 1;
                                                    if ($Count == 0) {
                                                        echo '- ไม่พบข้อมูล -';
                                                    } else {
                                                ?>
                                                        <tr>
                                                            <td><?= $AWARD->AwardYear; ?></td>
                                                            <td><?= $AWARD->AwardName; ?></td>
                                                            <td><?= $AWARD->AwardSource; ?></td>
                                                            <td><?= $AWARD->AWARD_LEVEL_NAME; ?></td>
                                                        </tr>
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
                                            <thead>
                                                <tr>
                                                    <td scope="col">ชื่อระดับชั้น</td>
                                                    <td scope="col">จำนวนห้อง</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $result = $this->db->query('SELECT * 
                                        FROM SCHOOL_CLASSROOM 
                                        INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID 
                                        INNER JOIN CLS_GRADE_LEVEL ON SCHOOL_CLASSROOM.ClassroomGradeLevelCode  = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE 
                                        WHERE SCHOOL_CLASSROOM.DeleteStatus = 0 AND SCHOOL_CLASSROOM.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');
                                                $Count = 0;
                                                foreach ($result->result() as $CLASSROOM) {
                                                    $Count += 1;
                                                    if ($Count == 0) {
                                                        echo '- ไม่พบข้อมูล -';
                                                    } else {
                                                ?>
                                                        <tr>
                                                            <td><?= $CLASSROOM->GRADE_LEVEL_NAME; ?></td>
                                                            <td><?= $CLASSROOM->ClassroomAmount; ?></td>
                                                        </tr>
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
                                            <thead>
                                                <tr>
                                                    <td class="col-4" scope="col">ชื่ออาคาร</td>
                                                    <td class="col-4" scope="col">ประเภท</td>
                                                    <td class="col-4" scope="col">วันที่เริ่มก่อสร้าง</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = $this->db->query('SELECT * 
                                        FROM SCHOOL_BUILDING 
                                        INNER JOIN SCHOOL ON SCHOOL_BUILDING.SchoolID = SCHOOL.SchoolID 
                                        INNER JOIN CLS_BUILDING_TYPE ON SCHOOL_BUILDING.BuildingTypeCode  = CLS_BUILDING_TYPE.BUILDING_TYPE_CODE 
                                        INNER JOIN CLS_BUILDING_DESIGN ON SCHOOL_BUILDING.BuildingDesignCode  = CLS_BUILDING_DESIGN.BUILDING_DESIGN_CODE 
                                        WHERE SCHOOL_BUILDING.DeleteStatus = 0 AND SCHOOL_BUILDING.SchoolID = ' . $SCHOOL_DETAIL->SchoolID . '
                                        ');
                                                $Count = 0;
                                                foreach ($result->result() as $SCHOOL_BUILDING) {
                                                    $Count += 1;
                                                    if ($Count == 0) {
                                                        echo '- ไม่พบข้อมูล -';
                                                    } else {
                                                ?>
                                                        <tr>
                                                            <td><?= $SCHOOL_BUILDING->BuildingName; ?></td>
                                                            <td><?= $SCHOOL_BUILDING->BUILDING_TYPE_NAME; ?></td>
                                                            <td><?= DateThai($SCHOOL_BUILDING->BuildingConstructionDate); ?></td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!----------------------------  END --------------------------------->
            <?php }
            } ?>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

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