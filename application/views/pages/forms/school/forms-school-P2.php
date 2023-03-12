<style>
    label.col-form-label,
    legend.col-form-label {
        padding-left: 40px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลสถานศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="main">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Shool</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ข้อมูลผู้บริหาร</h6>

                        <!-- General Form Elements -->
                        <form action="<?php echo base_url('add-school'); ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">หมายเลขบัตรประจำตัวของผู้บริาหาร</label>
                                <div class="col-sm-8">
                                    <input type="text" name="AdministratorPersonalID" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AdministratorPrefixCode" required>
                                        <option selected>คำนำหน้าชื่อ</option>
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
                                    <input type="text" name="AdministratorNameThai" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางของผู้บริหาร (ภาษาไทย)</label>
                                <div class="col-sm-9">
                                    <input type="text" name="AdministratorMiddleNameThai" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">นามสกุลของผู้บริหาร (ภาษาไทย)</label>
                                <div class="col-sm-9">
                                    <input type="text" name="AdministratorLastNameThai" class="form-control" required>
                                </div>
                            </div>
                            <h6 class="card-title">ระดับการศึกษาที่เปิดสอน</h6>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="EducationLevelCode" required>
                                        <option selected>เลือก</option>
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
                                    $result = $this->db->query('SELECT * FROM CLS_ELECTRIC_TYPE ');
                                    foreach ($result->result() as $ELECTRIC) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $ELECTRIC->ELECTRIC_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="ElectricTypeCode">
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
                                    $result = $this->db->query('SELECT * FROM CLS_INTERNET_TYPE ');
                                    foreach ($result->result() as $INTERNET) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $INTERNET->INTERNET_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="InternetTypeCode">
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
                                            <input class="form-check-input" value="<?= $WATER->WATER_TYPE_CODE; ?>" type="radio" id="gridCheck1" name="WaterTypeCode">
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
                                            <input class="form-check-input" value=" <?= $EDUCATION_CONTENT->EDUCATION_CONTENT_CODE; ?>" type="radio" id="gridCheck1" name="EducationContentCode">
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
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck1" name="DLTVFlag">
                                        <label class="form-check-label" for="gridCheck1">ไม่อยู่ในโครงการ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck1" name="DLTVFlag">
                                        <label class="form-check-label" for="gridCheck1">อยู่ในโครงการ</label>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-title">ข้อมูลทางสถิติ</h6>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์เชื่อมต่อเครือข่าย</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerOnlineNumber" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์ Stand alone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerStandaloneNumber" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerTeachNumber" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerManageNumber" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนชาย</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ToiletMaleStudentNumber" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนหญิง</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ToiletFemaleStudentNumber" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำทั้งหมด</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ToiletCombinationNumber" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="school" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                            </div>

                            <!--------------------------- input forms-P1 ---------------------------->
                            <input type="hidden" name="SchoolID" value="<?= $_POST['JurisdictionCode']; ?><?= $_POST['SchoolAddressProvinceCode']; ?>">
                            <input type="hidden" name="EducationYear" value="<?= $_POST['EducationYear']; ?>">
                            <input type="hidden" name="Semester" value="<?= $_POST['Semester']; ?>">
                            <input type="hidden" name="JurisdictionCode" value="<?= $_POST['JurisdictionCode']; ?>">
                            <input type="hidden" name="InnovationAreaCode" value="<?= $_POST['InnovationAreaCode']; ?>">
                            <input type="hidden" name="SchoolNameThai" value="<?= $_POST['SchoolNameThai']; ?>">
                            <input type="hidden" name="SchoolNameEnglish" value="<?= $_POST['SchoolNameEnglish']; ?>">
                            <input type="hidden" name="SchoolEstablishedDate" value="<?= $_POST['SchoolEstablishedDate']; ?>">
                            <input type="hidden" name="SchoolTypeCode" value="<?= $_POST['SchoolTypeCode']; ?>">
                            <input type="hidden" name="SchoolStatusCode" value="<?= $_POST['SchoolStatusCode']; ?>">
                            <input type="hidden" name="MunicipalCode" value="<?= $_POST['MunicipalCode']; ?>">
                            <input type="hidden" name="SchoolAddressHouseRegisterID" value="<?= $_POST['SchoolAddressHouseRegisterID']; ?>">
                            <input type="hidden" name="SchoolAddressHouseNumber" value="<?= $_POST['SchoolAddressHouseNumber']; ?>">
                            <input type="hidden" name="SchoolAddressMoo" value="<?= $_POST['SchoolAddressMoo']; ?>">
                            <input type="hidden" name="SchoolAddressStreet" value="<?= $_POST['SchoolAddressStreet']; ?>">
                            <input type="hidden" name="SchoolAddressSoi" value="<?= $_POST['SchoolAddressSoi']; ?>">
                            <input type="hidden" name="SchoolAddressTrok" value="<?= $_POST['SchoolAddressTrok']; ?>">
                            <input type="hidden" name="SchoolAddressSubdistrictCode" value="<?= $_POST['SchoolAddressSubdistrictCode']; ?>">
                            <input type="hidden" name="SchoolAddressDistrictCode" value="<?= $_POST['SchoolAddressDistrictCode']; ?>">
                            <input type="hidden" name="SchoolAddressProvinceCode" value="<?= $_POST['SchoolAddressProvinceCode']; ?>">
                            <input type="hidden" name="SchoolAddressPostcode" value="<?= $_POST['SchoolAddressPostcode']; ?>">
                            <input type="hidden" name="SchoolLatitude" value="<?= $_POST['SchoolLatitude']; ?>">
                            <input type="hidden" name="SchoolLongitude" value="<?= $_POST['SchoolLongitude']; ?>">
                            <input type="hidden" name="SchoolMapURL" value="<?= $_POST['SchoolMapURL']; ?>">
                            <input type="hidden" name="SchoolPhoneNumber" value="<?= $_POST['SchoolPhoneNumber']; ?>">
                            <input type="hidden" name="SchoolSecondPhoneNumber" value="<?= $_POST['SchoolSecondPhoneNumber']; ?>">
                            <input type="hidden" name="SchoolFaxNumber" value="<?= $_POST['SchoolFaxNumber']; ?>">
                            <input type="hidden" name="SchoolSecondFaxNumber" value="<?= $_POST['SchoolSecondFaxNumber']; ?>">
                            <input type="hidden" name="SchoolEmail" value="<?= $_POST['SchoolEmail']; ?>">
                            <input type="hidden" name="SchoolWebsiteURL" value="<?= $_POST['SchoolWebsiteURL']; ?>">
                            <!------------------------ input forms-P1 - END  ------------------------>



                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->