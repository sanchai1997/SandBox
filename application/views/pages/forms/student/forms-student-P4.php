<style>
    label.col-form-label {
        padding-left: 30px;
    }
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>เพิ่มข้อมูลนักเรียน</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add Student</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <form class="row g-3" action="<?php echo base_url('add-student'); ?>" method="POST">
        <h5 class="card-title">ข้อมูลความพิการ</h5>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ความพิการ</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="DisabilityCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                    foreach ($result->result() as $DISABILITY) {
                    ?>
                        <option value="<?= $DISABILITY->CLS_DISABILITY_CODE; ?>"><?= $DISABILITY->CLS_DISABILITY_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">รายละเอียดความพิการ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="DisabilityDetail">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ระดับความพิการ</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="DisabilityLevelCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL');
                    foreach ($result->result() as $DISABILITY_LEVEL) {
                    ?>
                        <option value="<?= $DISABILITY_LEVEL->CLS_DISABILITY_LEVEL_CODE; ?>"><?= $DISABILITY_LEVEL->CLS_DISABILITY_LEVEL_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <h5 class="card-title">ข้อมูลความด้อยโอกาศ</h5>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ความด้อยโอกาส</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="DisadvantagedCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED');
                    foreach ($result->result() as $DISAVANTAGED) {
                    ?>
                        <option value="<?= $DISAVANTAGED->CLS_DISAVANTAGED_CODE; ?>"><?= $DISAVANTAGED->CLS_DISAVANTAGED_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนแบบเรียน</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1" value="0" checked name="LackingBookFlag">
                    <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2" value="1" name="LackingBookFlag">
                    <label class="form-check-label" for="gridRadios2">
                        ขาดแคลน
                    </label>
                </div>
            </div>
        </fieldset>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนอาหารกลางวัน</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1" value="0" checked name="LackingFoodFlag">
                    <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2" value="1" name="LackingFoodFlag">
                    <label class="form-check-label" for="gridRadios2">
                        ขาดแคลน
                    </label>
                </div>
            </div>
        </fieldset>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนเครื่องเขียน</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1" value="0" checked name="LackingStationeryFlag">
                    <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2" value="1" name="LackingStationeryFlag">
                    <label class="form-check-label" for="gridRadios2">
                        ขาดแคลน
                    </label>
                </div>
            </div>
        </fieldset>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนเครื่องแบบ</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1" value="0" checked name="LackingUniformFlag">
                    <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2" value="1" name="LackingUniformFlag">
                    <label class="form-check-label" for="gridRadios2">
                        ขาดแคลน
                    </label>
                </div>
            </div>
        </fieldset>
        <h5 class="card-title">ข้อมูลเกณฑ์ความยากจน</h5>
        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">รายครอบครัวต่อเดือน</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="FamilyMonthlyIncome">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">สถานภาพครอบครัว</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="FamilyStatusCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS');
                    foreach ($result->result() as $FAMILY_STATUS) {
                    ?>
                        <option value="<?= $FAMILY_STATUS->CLS_FAMILY_STATUS_CODE; ?>"><?= $FAMILY_STATUS->CLS_FAMILY_STATUS_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">นักเรียนอาศัยอยู่กับ</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="StudentLiveWithCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH');
                    foreach ($result->result() as $STUDENT_LIVE_WITH) {
                    ?>
                        <option value="<?= $STUDENT_LIVE_WITH->CLS_STUDENT_LIVE_WITH_CODE; ?>"><?= $STUDENT_LIVE_WITH->CLS_STUDENT_LIVE_WITH_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">ได้สวัสดิการแห่งรัฐ</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1" value="0" checked name="StateWelfareFlag">
                    <label class="form-check-label" for="gridRadios1">
                        ไม่ได้
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2" value="1" name="StateWelfareFlag">
                    <label class="form-check-label" for="gridRadios2">
                        ได้
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="inputText" id="TALENT_CODES" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
            <div class="col-sm-10">
                <select class="form-select" id="TALENT_CODES" aria-label="TALENT_CODES" name="TalentCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_TALENT GROUP BY CLS_TALENT_NAME ASC');
                    foreach ($result->result() as $TALENT) {
                    ?>
                        <option value="<?= $TALENT->CLS_TALENT_CODE; ?>"><?= $TALENT->CLS_TALENT_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="text-center">
            <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
            <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
            <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </div>

        <!---------------------------------- Forms Student P1 ------------------------------------->
        <input type="hidden" name="StudentReferenceID" value="<?= $_POST['StudentReferenceID']; ?>">
        <input type="hidden" name="EducationYear" value="<?= $_POST['EducationYear']; ?>">
        <input type="hidden" name="Semester" value="<?= $_POST['Semester']; ?>">
        <input type="hidden" name="SchoolID" value="<?= $_POST['SchoolID']; ?>">
        <input type="hidden" name="StudentID" value="<?= $_POST['StudentID']; ?>">
        <input type="hidden" name="StudentStatusCode" value="<?= $_POST['StudentStatusCode']; ?>">
        <input type="hidden" name="StudentPersonalID" value="<?= $_POST['StudentPersonalID']; ?>">
        <input type="hidden" name="StudentPersonalIDTypeCode" value="<?= $_POST['StudentPersonalIDTypeCode']; ?>">
        <input type="hidden" name="StudentPassportNumber" value="<?= $_POST['StudentPassportNumber']; ?>">
        <input type="hidden" name="StudentPrefixCode" value="<?= $_POST['StudentPrefixCode']; ?>">
        <input type="hidden" name="StudentNameThai" value="<?= $_POST['StudentNameThai']; ?>">
        <input type="hidden" name="StudentMiddleNameThai" value="<?= $_POST['StudentMiddleNameThai']; ?>">
        <input type="hidden" name="StudentLastNameThai" value="<?= $_POST['StudentLastNameThai']; ?>">
        <input type="hidden" name="StudentNameEnglish" value="<?= $_POST['StudentNameEnglish']; ?>">
        <input type="hidden" name="StudentMiddleEnglish" value="<?= $_POST['StudentMiddleEnglish']; ?>">
        <input type="hidden" name="StudentLastNameEnglish" value="<?= $_POST['StudentLastNameEnglish']; ?>">
        <input type="hidden" name="StudentGenderCode" value="<?= $_POST['StudentGenderCode']; ?>">
        <input type="hidden" name="StudentBirthDate" value="<?= $_POST['StudentBirthDate']; ?>">
        <input type="hidden" name="StudentBirthProvinceCode" value="<?= $_POST['StudentBirthProvinceCode']; ?>">
        <input type="hidden" name="StudentNationalityCode" value="<?= $_POST['StudentNationalityCode']; ?>">
        <input type="hidden" name="StudentRaceCode" value="<?= $_POST['StudentRaceCode']; ?>">
        <input type="hidden" name="StudentReligionCode" value="<?= $_POST['StudentReligionCode']; ?>">
        <input type="hidden" name="StudentLanguageCode" value="<?= $_POST['StudentLanguageCode']; ?>">
        <input type="hidden" name="StudentOtherLanguageCode" value="<?= $_POST['StudentOtherLanguageCode']; ?>">
        <input type="hidden" name="StudentBloodCode" value="<?= $_POST['StudentBloodCode']; ?>">
        <input type="hidden" name="StudentWeight" value="<?= $_POST['StudentWeight']; ?>">
        <input type="hidden" name="StudentHeight" value="<?= $_POST['StudentHeight']; ?>">
        <input type="hidden" name="StudentOfficialAddressHouseRegisterID" value="<?= $_POST['StudentOfficialAddressHouseRegisterID']; ?>">
        <input type="hidden" name="StudentOfficialAddressHouseNumber" value="<?= $_POST['StudentOfficialAddressHouseNumber']; ?>">
        <input type="hidden" name="StudentOfficialAddressMoo" value="<?= $_POST['StudentOfficialAddressMoo']; ?>">
        <input type="hidden" name="StudentOfficialAddressStreet" value="<?= $_POST['StudentOfficialAddressStreet']; ?>">
        <input type="hidden" name="StudentOfficialAddressSoi" value="<?= $_POST['StudentOfficialAddressSoi']; ?>">
        <input type="hidden" name="StudentOfficialAddressTrok" value="<?= $_POST['StudentOfficialAddressTrok']; ?>">
        <input type="hidden" name="StudentOfficialAddressProvinceCode" value="<?= $_POST['StudentOfficialAddressProvinceCode']; ?>">
        <input type="hidden" name="StudentOfficialAddressDistrictCode" value="<?= $_POST['StudentOfficialAddressDistrictCode']; ?>">
        <input type="hidden" name="StudentOfficialAddressSubdistrictCode" value="<?= $_POST['StudentOfficialAddressSubdistrictCode']; ?>">
        <input type="hidden" name="StudentOfficialAddressPostcode" value="<?= $_POST['StudentOfficialAddressPostcode']; ?>">
        <input type="hidden" name="StudentOfficialAddressPhoneNumber" value="<?= $_POST['StudentOfficialAddressPhoneNumber']; ?>">
        <input type="hidden" name="StudentCurrentAddressHouseRegisterID" value="<?= $_POST['StudentCurrentAddressHouseRegisterID']; ?>">
        <input type="hidden" name="StudentCurrentAddressHouseNumber" value="<?= $_POST['StudentCurrentAddressHouseNumber']; ?>">
        <input type="hidden" name="StudentCurrentAddressMoo" value="<?= $_POST['StudentCurrentAddressMoo']; ?>">
        <input type="hidden" name="StudentCurrentAddressStreet" value="<?= $_POST['StudentCurrentAddressStreet']; ?>">
        <input type="hidden" name="StudentCurrentAddressSoi" value="<?= $_POST['StudentCurrentAddressSoi']; ?>">
        <input type="hidden" name="StudentCurrentAddressTrok" value="<?= $_POST['StudentCurrentAddressTrok']; ?>">
        <input type="hidden" name="StudentCurrentAddressSubdistrictCode" value="<?= $_POST['StudentCurrentAddressSubdistrictCode']; ?>">
        <input type="hidden" name="StudentCurrentAddressDistrictCode" value="<?= $_POST['StudentCurrentAddressDistrictCode']; ?>">
        <input type="hidden" name="StudentCurrentAddressProvinceCode" value="<?= $_POST['StudentCurrentAddressProvinceCode']; ?>">
        <input type="hidden" name="StudentCurrentAddressPostcode" value="<?= $_POST['StudentCurrentAddressPostcode']; ?>">
        <input type="hidden" name="StudentCurrentAddressPhoneNumber" value="<?= $_POST['StudentCurrentAddressPhoneNumber']; ?>">

        <!---------------------------------- Forms Student P2 ------------------------------------->
        <input type="hidden" name="FatherPersonalID" value="<?= $_POST['FatherPersonalID']; ?>">
        <input type="hidden" name="FatherPersonalIDTypeCode" value="<?= $_POST['FatherPersonalIDTypeCode']; ?>">
        <input type="hidden" name="FatherPassportNumber" value="<?= $_POST['FatherPassportNumber']; ?>">
        <input type="hidden" name="FatherPrefixCode" value="<?= $_POST['FatherPrefixCode']; ?>">
        <input type="hidden" name="FatherNameThai" value="<?= $_POST['FatherNameThai']; ?>">
        <input type="hidden" name="FatherMiddleNameThai" value="<?= $_POST['FatherMiddleNameThai']; ?>">
        <input type="hidden" name="FatherLastNameThai" value="<?= $_POST['FatherLastNameThai']; ?>">
        <input type="hidden" name="FatherNameEnglish" value="<?= $_POST['FatherNameEnglish']; ?>">
        <input type="hidden" name="FatherMiddleNameEnglish" value="<?= $_POST['FatherMiddleNameEnglish']; ?>">
        <input type="hidden" name="FatherLastNameEnglish" value="<?= $_POST['FatherLastNameEnglish']; ?>">
        <input type="hidden" name="FatherPersonStatusCode" value="<?= $_POST['FatherPersonStatusCode']; ?>">
        <input type="hidden" name="FatherPhoneNumber" value="<?= $_POST['FatherPhoneNumber']; ?>">
        <input type="hidden" name="FatherOccupationCode" value="<?= $_POST['FatherOccupationCode']; ?>">
        <input type="hidden" name="FatherSalary" value="<?= $_POST['FatherSalary']; ?>">
        <input type="hidden" name="MotherPersonalID" value="<?= $_POST['MotherPersonalID']; ?>">
        <input type="hidden" name="MotherPersonalIDTypeCode" value="<?= $_POST['MotherPersonalIDTypeCode']; ?>">
        <input type="hidden" name="MotherPassportNumber" value="<?= $_POST['MotherPassportNumber']; ?>">
        <input type="hidden" name="MotherPrefixCode" value="<?= $_POST['MotherPrefixCode']; ?>">
        <input type="hidden" name="MotherNameThai" value="<?= $_POST['MotherNameThai']; ?>">
        <input type="hidden" name="MotherMiddleNameThai" value="<?= $_POST['MotherMiddleNameThai']; ?>">
        <input type="hidden" name="MotherLastNameThai" value="<?= $_POST['MotherLastNameThai']; ?>">
        <input type="hidden" name="MotherNameEnglish" value="<?= $_POST['MotherNameEnglish']; ?>">
        <input type="hidden" name="MotherMiddleNameEnglish" value="<?= $_POST['MotherMiddleNameEnglish']; ?>">
        <input type="hidden" name="MotherLastNameEnglish" value="<?= $_POST['MotherLastNameEnglish']; ?>">
        <input type="hidden" name="MotherPersonStatusCode" value="<?= $_POST['MotherPersonStatusCode']; ?>">
        <input type="hidden" name="MotherPhoneNumber" value="<?= $_POST['MotherPhoneNumber']; ?>">
        <input type="hidden" name="MotherOccupationCode" value="<?= $_POST['MotherOccupationCode']; ?>">
        <input type="hidden" name="MotherSalary" value="<?= $_POST['MotherSalary']; ?>">
        <input type="hidden" name="GuardianPersonalID" value="<?= $_POST['GuardianPersonalID']; ?>">
        <input type="hidden" name="GuardianPersonalIDTypeCode" value="<?= $_POST['GuardianPersonalIDTypeCode']; ?>">
        <input type="hidden" name="GuardianPassportNumber" value="<?= $_POST['GuardianPassportNumber']; ?>">
        <input type="hidden" name="GuardianPrefixCode" value="<?= $_POST['GuardianPrefixCode']; ?>">
        <input type="hidden" name="GuardianNameThai" value="<?= $_POST['GuardianNameThai']; ?>">
        <input type="hidden" name="GuardianMiddleNameThai" value="<?= $_POST['GuardianMiddleNameThai']; ?>">
        <input type="hidden" name="GuardianLastNameThai" value="<?= $_POST['GuardianLastNameThai']; ?>">
        <input type="hidden" name="GuardianNameEnglish" value="<?= $_POST['GuardianNameEnglish']; ?>">
        <input type="hidden" name="GuardianMiddleNameEnglish" value="<?= $_POST['GuardianMiddleNameEnglish']; ?>">
        <input type="hidden" name="GuardianLastNameEnglish" value="<?= $_POST['GuardianLastNameEnglish']; ?>">
        <input type="hidden" name="GuardianRelationCode" value="<?= $_POST['GuardianRelationCode']; ?>">
        <input type="hidden" name="GuardianPhoneNumber" value="<?= $_POST['GuardianPhoneNumber']; ?>">
        <input type="hidden" name="GuardianOccupationCode" value="<?= $_POST['GuardianOccupationCode']; ?>">
        <input type="hidden" name="GuardianSalary" value="<?= $_POST['GuardianSalary']; ?>">
        <input type="hidden" name="ParentMarriageStatusCode" value="<?= $_POST['ParentMarriageStatusCode']; ?>">
        <input type="hidden" name="StudentBirthOrder" value="<?= $_POST['StudentBirthOrder']; ?>">
        <input type="hidden" name="StudentElderBrotherAmount" value="<?= $_POST['StudentElderBrotherAmount']; ?>">
        <input type="hidden" name="StudentElderSisterAmount" value="<?= $_POST['StudentElderSisterAmount']; ?>">
        <input type="hidden" name="StudentYoungerBrotherAmount" value="<?= $_POST['StudentYoungerBrotherAmount']; ?>">
        <input type="hidden" name="StudentYoungerSisterAmount" value="<?= $_POST['StudentYoungerSisterAmount']; ?>">

        <!---------------------------------- Forms Student P3 ------------------------------------->
        <input type="hidden" name="CurrentEducationLevelAdmissionYear" value="<?= $_POST['CurrentEducationLevelAdmissionYear']; ?>">
        <input type="hidden" name="SchoolAdmissionYear" value="<?= $_POST['SchoolAdmissionYear']; ?>">
        <input type="hidden" name="EducationLevelCode" value="<?= $_POST['EducationLevelCode']; ?>">
        <input type="hidden" name="GradeLevelCode" value="<?= $_POST['GradeLevelCode']; ?>">
        <input type="hidden" name="Classroom" value="<?= $_POST['Classroom']; ?>">
        <input type="hidden" name="PartSchoolFlag" value="<?= $_POST['PartSchoolFlag']; ?>">
        <input type="hidden" name="CurriculumID" value="<?= $_POST['CurriculumID']; ?>">
        <input type="hidden" name="JourneyTypeCode" value="<?= $_POST['JourneyTypeCode']; ?>">
        <input type="hidden" name="JourneyTime" value="<?= $_POST['JourneyTime']; ?>">
        <input type="hidden" name="RockJourneyDistance" value="<?= $_POST['RockJourneyDistance']; ?>">
        <input type="hidden" name="RubberJourneyDistance" value="<?= $_POST['RubberJourneyDistance']; ?>">
        <input type="hidden" name="WaterJourneyDistance" value="<?= $_POST['WaterJourneyDistance']; ?>">

    </form><!-- End floating Labels Form -->
    <br>

    </div>
    </div>
    </div>
    </div>
    </section>
</main><!-- End #main -->