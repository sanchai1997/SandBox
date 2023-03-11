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

    <form class="row g-3" action="<?php echo base_url('forms-student-P4'); ?>" method="POST">
        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลด้านศึกษา</h5>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษา</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="CurrentEducationLevelAdmissionYear" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียน</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="SchoolAdmissionYear" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="EducationLevelCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                        foreach ($result->result() as $EDUCATION) {
                                        ?>
                                            <option value="<?= $EDUCATION->CLS_EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION->CLS_EDUCATION_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ชั้นเรียน</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="GradeLevelCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CLASS_GRADE_LEVEL');
                                        foreach ($result->result() as $GRADE_LEVEL) {
                                        ?>
                                            <option value="<?= $GRADE_LEVEL->CLS_CLASS_GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->CLS_CLASS_GRADE_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ห้องเรียนที่</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Classroom" aria-label="Default select example" required>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">เรียนหลักสูตรทวิศึกษา</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="gridRadios1" value="1" checked name="PartSchoolFlag">
                                        <label class="form-check-label" for="gridRadios1">
                                            เรียน
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="gridRadios2" value="0" name="PartSchoolFlag">
                                        <label class="form-check-label" for="gridRadios2">
                                            ไม่ได้เรียน
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <h6 class="card-title">ข้อมูลหลักสูตร</h6>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">หลักสูตร</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="CurriculumID">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CURRICULUM');
                                        foreach ($result->result() as $CURRICULUM) {
                                        ?>
                                            <option value="<?= $CURRICULUM->CLS_CURRICULUM_CODE; ?>"><?= $CURRICULUM->CLS_CURRICULUM_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h6 class="card-title">ข้อมูลการเดินทางไปสถานศึกษา</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">ประเภทการเดินทางมาโรงเรียน</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="JourneyTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE');
                                        foreach ($result->result() as $JOURNEY) {
                                        ?>
                                            <option value="<?= $JOURNEY->CLS_JOURNEY_TYPE_CODE; ?>"><?= $JOURNEY->CLS_JOURNEY_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-5 col-form-label">ระยะเวลาการเดินทางจากบ้านมาโรงเรียน (ชม.)</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="JourneyTime">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลูกรัง (กม.)</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="RockJourneyDistance">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลาดยาง (กม.)</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="RubberJourneyDistance">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านทางน้ำ (กม.)</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="WaterJourneyDistance">
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">หน้าถัดไป</button>
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



    </form><!-- End floating Labels Form -->
    <br>

    </div>
    </div>

    </div>

    </div>
    </section>

</main><!-- End #main -->