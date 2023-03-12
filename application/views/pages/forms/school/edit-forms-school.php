<?php
$GetSchool = $this->db->query(
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
    INNER JOIN CLS_EDUCATION_CONTENT ON SCHOOL.EducationContentCode = CLS_EDUCATION_CONTENT.EDUCATION_CONTENT_CODE
    WHERE SchoolID = ' . $_GET['SchoolID'] . ''
)->result();

foreach ($GetSchool as $SCHOOL_DETAIL) {
?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>แก้ไขข้อมูลสถานศึกษา</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="main">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active">Edit School</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">ข้อมูลปีการศึกษาและหน่วยงาน</h6>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-school/' . $_GET['SchoolID']); ?>" method="POST">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control " name="EducationYear" required value="<?= $SCHOOL_DETAIL->EducationYear; ?>">
                                        <label for="EducationYear">ปีการศึกษา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" max="2" name="Semester" required value="<?= $SCHOOL_DETAIL->Semester; ?>">
                                        <label for="Semester">ภาคเรียน</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->JurisdictionCode; ?>" selected><?= $SCHOOL_DETAIL->JURISDICTION_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_JURISDICTION ');
                                            foreach ($result->result() as $JURISDICTION) {
                                            ?>
                                                <option value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SCHOOL_TYPE_CODE">หน่วยงานต้นสังกัด</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="InnovationAreaCode" id="InnovationAreaCode" aria-label="InnovationAreaCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->InnovationAreaCode; ?>" selected><?= $SCHOOL_DETAIL->INNOVATION_AREA_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_INNOVATION_AREA ');
                                            foreach ($result->result() as $INNOVATION_AREA) {
                                            ?>
                                                <option value="<?= $INNOVATION_AREA->INNOVATION_AREA_CODE; ?>"><?= $INNOVATION_AREA->INNOVATION_AREA_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SCHOOL_STATUS_CODE">พื้นที่นวัฒกรรมการศึกษา</label>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลสถานศึกษา</h6>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control " name="SchoolNameThai" required value="<?= $SCHOOL_DETAIL->SchoolNameThai; ?>">
                                        <label for="SchoolNameThai">ชื่อสถานศึกษา (ไทย)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control " name="SchoolNameEnglish" required value="<?= $SCHOOL_DETAIL->SchoolNameEnglish; ?>">
                                        <label for="SchoolNameEnglish">ชื่อสถานศึกษา (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control " name="SchoolEstablishedDate" required value="<?= $SCHOOL_DETAIL->SchoolEstablishedDate; ?>">
                                        <label for="SchoolEstablishedDate">วันที่ก่อตั้ง</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="SchoolTypeCode" id="SchoolTypeCode" aria-label="SchoolTypeCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->SchoolTypeCode; ?>" selected><?= $SCHOOL_DETAIL->SCHOOL_TYPE_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SCHOOL_TYPE');
                                            foreach ($result->result() as $SCHOOL_TYPE) {
                                            ?>
                                                <option value="<?= $SCHOOL_TYPE->SCHOOL_TYPE_CODE; ?>"><?= $SCHOOL_TYPE->SCHOOL_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SchoolTypeCode">ประเภทสถานศึกษา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="SchoolStatusCode" id="SchoolStatusCode" aria-label="SchoolStatusCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->SchoolStatusCode; ?>" selected><?= $SCHOOL_DETAIL->SCHOOL_STATUS_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SCHOOL_STATUS');
                                            foreach ($result->result() as $SCHOOL_STATUS) {
                                            ?>
                                                <option value="<?= $SCHOOL_STATUS->SCHOOL_STATUS_CODE; ?>"><?= $SCHOOL_STATUS->SCHOOL_STATUS_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SchoolStatusCode">สถานะของสถานศึกษา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="MunicipalCode" id="MunicipalCode" aria-label="MunicipalCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->MunicipalCode; ?>" selected><?= $SCHOOL_DETAIL->MUNICIPAL_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MUNICIPAL');
                                            foreach ($result->result() as $MUNICIPAL) {
                                            ?>
                                                <option value="<?= $MUNICIPAL->MUNICIPAL_CODE; ?>"><?= $MUNICIPAL->MUNICIPAL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SCHOOL_STATUS_CODE">ประเภทเขตการปกครอง</label>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลที่ตั้ง</h6>
                                <div class="col-4">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="SchoolAddressHouseRegisterID" style="height: 60px;"><?= $SCHOOL_DETAIL->SchoolAddressHouseRegisterID; ?></textarea>
                                        <label for="SchoolAddressHouseRegisterID">รหัสประจำบ้าน</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="SchoolAddressHouseNumber" style="height: 60px;" required><?= $SCHOOL_DETAIL->SchoolAddressHouseNumber; ?></textarea>
                                        <label for="SchoolAddressHouseNumber">บ้านเลขที่</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="SchoolAddressMoo" value="<?= $SCHOOL_DETAIL->SchoolAddressMoo; ?>">
                                            <label for="OFFICIAL_SchoolAddressMoo">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolAddressStreet" value="<?= $SCHOOL_DETAIL->SchoolAddressStreet; ?>">
                                        <label for="SchoolAddressStreet">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolAddressSoi" value="<?= $SCHOOL_DETAIL->SchoolAddressSoi; ?>">
                                        <label for="SchoolAddressSoi">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolAddressTrok" value="<?= $SCHOOL_DETAIL->SchoolAddressTrok; ?>">
                                        <label for="SchoolAddressTrok">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="SchoolAddressProvinceCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->SchoolAddressProvinceCode; ?>" selected><?= $SCHOOL_DETAIL->PROVINCE_NAME; ?></option>
                                            <?php
                                            foreach ($ShowProvince as $PROVINCE) {
                                            ?>
                                                <option value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="SchoolAddressProvinceCode">จังหวัด</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="SchoolAddressDistrictCode">
                                            <option value="<?= $SCHOOL_DETAIL->SchoolAddressDistrictCode; ?>" selected><?= $SCHOOL_DETAIL->DISTRICT_NAME; ?></option>
                                            <?php
                                            foreach ($ShowDistrict as $DISTRICT) {
                                            ?>
                                                <option id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="SchoolAddressDistrictCode">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="SchoolAddressSubdistrictCode">
                                            <option value="<?= $SCHOOL_DETAIL->SchoolAddressSubdistrictCode; ?>" selected><?= $SCHOOL_DETAIL->SUBDISTRICT_NAME; ?></option>
                                            <?php
                                            foreach ($ShowSubdistrict as $SUBDISTRICT) {
                                            ?>
                                                <option id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="SchoolAddressSubdistrictCode">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolAddressPostcode" value="<?= $SCHOOL_DETAIL->SchoolAddressPostcode; ?>">
                                        <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolLatitude" value="<?= $SCHOOL_DETAIL->SchoolLatitude; ?>">
                                        <label for="SchoolLatitude">ค่าตำแหน่งพิกัดทาง Latitude</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolLongitude" value="<?= $SCHOOL_DETAIL->SchoolLongitude; ?>">
                                        <label for="SchoolLongitude">ค่าตำแหน่งพิกัดทาง Longitude</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolMapURL" value="<?= $SCHOOL_DETAIL->SchoolMapURL; ?>">
                                        <label for="SchoolMapURL">ลิงค์แผนที่</label>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลติดต่อ</h6>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolPhoneNumber" value="<?= $SCHOOL_DETAIL->SchoolPhoneNumber; ?>">
                                        <label for="SchoolPhoneNumber">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolSecondPhoneNumber" value="<?= $SCHOOL_DETAIL->SchoolSecondPhoneNumber; ?>">
                                        <label for="SchoolSecondPhoneNumber">หมายเลขโทรศัพท์ (สำรอง)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolFaxNumber" value="<?= $SCHOOL_DETAIL->SchoolFaxNumber; ?>">
                                        <label for="SchoolFaxNumber">หมายเลขโทรสาร</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolSecondFaxNumber" value="<?= $SCHOOL_DETAIL->SchoolSecondFaxNumber; ?>">
                                        <label for="SchoolSecondFaxNumber">หมายเลขโทรสาร (สำรอง)</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="SchoolEmail" value="<?= $SCHOOL_DETAIL->SchoolEmail; ?>">
                                        <label for="SchoolEmail">อีเมล</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolWebsiteURL" value="<?= $SCHOOL_DETAIL->SchoolWebsiteURL; ?>">
                                        <label for="SchoolWebsiteURL">เว็บไซต์</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">หมายเลขบัตรประจำตัวของผู้บริาหาร</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="AdministratorPersonalID" class="form-control" value="<?= $SCHOOL_DETAIL->AdministratorPersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="AdministratorPrefixCode" required>
                                            <option value="<?= $SCHOOL_DETAIL->AdministratorPrefixCode; ?>" selected><?= $SCHOOL_DETAIL->PREFIX_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อของผู้บริหาร (ภาษาไทย)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="AdministratorNameThai" class="form-control" required value="<?= $SCHOOL_DETAIL->AdministratorNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางของผู้บริหาร (ภาษาไทย)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="AdministratorMiddleNameThai" class="form-control" value="<?= $SCHOOL_DETAIL->AdministratorMiddleNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">นามสกุลของผู้บริหาร (ภาษาไทย)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="AdministratorLastNameThai" class="form-control" required value="<?= $SCHOOL_DETAIL->AdministratorLastNameThai; ?>">
                                    </div>
                                </div>
                                <h6 class="card-title">ระดับการศึกษาที่เปิดสอน</h6>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationLevelCode" require>
                                            <option value="<?= $SCHOOL_DETAIL->EducationLevelCode; ?>" selected><?= $SCHOOL_DETAIL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION_LEVEL) {
                                            ?>
                                                <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลสาธารณูปโภค</h6>

                                <div class="row mb-4">
                                    <legend class="col-form-label col-sm-3 pt-0">ประเภทแหล่งกำเนิดไฟฟ้า</legend>
                                    <div class="col-sm-9">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_ELECTRIC_TYPE WHERE ELECTRIC_TYPE_CODE');
                                        foreach ($result->result() as $ELECTRIC) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" value="<?= $ELECTRIC->ELECTRIC_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="ElectricTypeCode" <?php if ($SCHOOL_DETAIL->ElectricTypeCode = $ELECTRIC->ELECTRIC_TYPE_CODE) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="gridCheck1">
                                                    <?= $ELECTRIC->ELECTRIC_TYPE_NAME; ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <legend class="col-form-label col-sm-3 pt-0">การใช้งานอินเทอร์เน็ต</legend>
                                    <div class="col-sm-9">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_INTERNET_TYPE WHERE INTERNET_TYPE_CODE');
                                        foreach ($result->result() as $INTERNET) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" value="<?= $INTERNET->INTERNET_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="InternetTypeCode" <?php if ($SCHOOL_DETAIL->InternetTypeCode = $INTERNET->INTERNET_TYPE_CODE) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="gridCheck1">
                                                    <?= $INTERNET->INTERNET_TYPE_NAME; ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <legend class="col-form-label col-sm-3 pt-0">แหล่งน้ำที่โรงเรียนใช้</legend>
                                    <div class="col-sm-9">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_WATER_TYPE ');
                                        foreach ($result->result() as $WATER) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" value="<?= $WATER->WATER_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="WaterTypeCode" <?php if ($SCHOOL_DETAIL->WaterTypeCode = $WATER->WATER_TYPE_CODE) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="gridCheck1">
                                                    <?= $WATER->WATER_TYPE_NAME; ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <legend class="col-form-label col-sm-3 pt-0">การใช้สื่อการเรียนการสอน</legend>
                                    <div class="col-sm-9">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_CONTENT ');
                                        foreach ($result->result() as $EDUCATION_CONTENT) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" value="<?= $EDUCATION_CONTENT->EDUCATION_CONTENT_CODE; ?>" type="radio" id="gridCheck1" name="EducationContentCode" <?php if ($SCHOOL_DETAIL->EducationContentCode = $EDUCATION_CONTENT->EDUCATION_CONTENT_CODE) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="gridCheck1">
                                                    <?= $EDUCATION_CONTENT->EDUCATION_CONTENT_NAME; ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <legend class="col-form-label col-sm-3 pt-0">อยู่ในโครงการการศึกษาทางไกลผ่านดาวเทียม (DLTV)</legend>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" value="0" type="radio" id="gridCheck1" name="DLTVFlag" <?php if ($SCHOOL_DETAIL->DLTVFlag = 0) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                            <label class="form-check-label" for="gridCheck1">ไม่อยู่ในโครงการ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="1" type="radio" id="gridCheck1" name="DLTVFlag" <?php if ($SCHOOL_DETAIL->DLTVFlag = 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                            <label class="form-check-label" for="gridCheck1">อยู่ในโครงการ</label>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลทางสถิติ</h6>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">จำนวนเครื่องคอมพิวเตอร์เชื่อมต่อเครือข่าย</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="ComputerOnlineNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ComputerOnlineNumber; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">จำนวนเครื่องคอมพิวเตอร์ Stand alone</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="ComputerStandaloneNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ComputerStandaloneNumber; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="ComputerTeachNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ComputerTeachNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="ComputerManageNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ComputerManageNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนชาย</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="ToiletMaleStudentNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ToiletMaleStudentNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนหญิง</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="ToiletFemaleStudentNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ToiletFemaleStudentNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำทั้งหมด</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="ToiletCombinationNumber" class="form-control" value="<?= $SCHOOL_DETAIL->ToiletCombinationNumber; ?>">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="school" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT<?= $SCHOOL_DETAIL->SchoolID; ?>">ยืนยัน</button>
                                </div>

                                <div class="modal fade" id="EDIT<?= $SCHOOL_DETAIL->SchoolID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
<?php } ?>