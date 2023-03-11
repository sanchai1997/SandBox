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



    <form class="row g-3" action="<?php echo base_url('forms-student-P3'); ?>" method="POST">
        <h5 class="card-title">ข้อมูลบิดา</h5>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวบิดา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherPersonalID" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="FatherPersonalIDTypeCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                    foreach ($result->result() as $PERSONAL) {
                    ?>
                        <option value="<?= $PERSONAL->CLS_PERSONAL_ID_TYPE_CODE; ?>"><?= $PERSONAL->CLS_PERSONAL_ID_TYPE_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางบิดา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherPassportNumber">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">คำนำหน้าชื่อบิดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="FatherPrefixCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                    foreach ($result->result() as $PREFIX) {
                    ?>
                        <option value="<?= $PREFIX->CLS_PREFIX_CODE; ?>"><?= $PREFIX->CLS_PREFIX_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherNameThai" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherMiddleNameThai">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherLastNameThai" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherMiddleNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FatherLastNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">สถานภาพของบิดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="FatherPersonStatusCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS');
                    foreach ($result->result() as $PERSON_STATUS) {
                    ?>
                        <option value="<?= $PERSON_STATUS->CLS_PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->CLS_PERSON_STATUS_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <h6 class="card-title">เบอร์ติดต่อของบิดา</h6>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของบิดา</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="FatherPhoneNumber">
            </div>
        </div>
        <h6 class="card-title">รายได้ของบิดา</h6>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">กลุ่มอาชีพของบิดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="FatherOccupationCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                    foreach ($result->result() as $OCCUPATION) {
                    ?>
                        <option value="<?= $OCCUPATION->CLS_OCCUPATION_CODE; ?>"><?= $OCCUPATION->CLS_OCCUPATION_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของบิดา</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="FatherSalary">
            </div>
        </div>
        <!-- end ข้อมูลบิดา ---------->

        <h5 class="card-title">ข้อมูลมารดา</h5>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวมารดา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherPersonalID" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวมารดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MotherPersonalIDTypeCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                    foreach ($result->result() as $PERSONAL) {
                    ?>
                        <option value="<?= $PERSONAL->CLS_PERSONAL_ID_TYPE_CODE; ?>"><?= $PERSONAL->CLS_PERSONAL_ID_TYPE_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางมารดา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherPassportNumber" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">คำนำหน้าชื่อมารดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MotherPrefixCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                    foreach ($result->result() as $PREFIX) {
                    ?>
                        <option value="<?= $PREFIX->CLS_PREFIX_CODE; ?>"><?= $PREFIX->CLS_PREFIX_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherNameThai" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherMiddleNameThai">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherLastNameThai" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherMiddleNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา(อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherLastNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">สถานภาพของมารดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MotherPersonStatusCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS');
                    foreach ($result->result() as $PERSON_STATUS) {
                    ?>
                        <option value="<?= $PERSON_STATUS->CLS_PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->CLS_PERSON_STATUS_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <h6 class="card-title">เบอร์ติดต่อของมารดา</h6>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของมารดา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="MotherPhoneNumber" required>
            </div>
        </div>
        <h6 class="card-title">รายได้ของมารดา</h6>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">กลุ่มอาชีพของมารดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MotherOccupationCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                    foreach ($result->result() as $OCCUPATION) {
                    ?>
                        <option value="<?= $OCCUPATION->CLS_OCCUPATION_CODE; ?>"><?= $OCCUPATION->CLS_OCCUPATION_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของมารดา</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="MotherSalary" required>
            </div>
        </div>

        <h5 class="card-title">ข้อมูลผู้ปกครอง</h5>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวผู้ปกครอง</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianPersonalID" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวผู้ปกครอง</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="GuardianPersonalIDTypeCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                    foreach ($result->result() as $PERSONAL) {
                    ?>
                        <option value="<?= $PERSONAL->CLS_PERSONAL_ID_TYPE_CODE; ?>"><?= $PERSONAL->CLS_PERSONAL_ID_TYPE_NAME; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางผู้ปกครอง</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianPassportNumber">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">คำนำหน้าชื่อผู้ปกครอง</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="GuardianPrefixCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                    foreach ($result->result() as $PREFIX) {
                    ?>
                        <option value="<?= $PREFIX->CLS_PREFIX_CODE; ?>"><?= $PREFIX->CLS_PREFIX_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianNameThai" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางผู้ปกครอง (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianMiddleNameThai">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง (ไทย)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianLastNameThai" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง (อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางผู้ปกครอง (อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianMiddleNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง (อังกฤษ)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianLastNameEnglish">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">ความสัมพันธ์ของผู้ปกครองกับนักเรียน</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="GuardianRelationCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION');
                    foreach ($result->result() as $FAMILY_RELATION) {
                    ?>
                        <option value="<?= $FAMILY_RELATION->CLS_FAMILY_RELATION_CODE; ?>"><?= $FAMILY_RELATION->CLS_FAMILY_RELATION_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <h6 class="card-title">เบอร์ติดต่อของผู้ปกครอง</h6>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของผู้ปกครอง</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="GuardianPhoneNumber" required>
            </div>
        </div>
        <h6 class="card-title">รายได้ของผู้ปกครอง</h6>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">กลุ่มอาชีพของผู้ปกครอง</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="GuardianOccupationCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                    foreach ($result->result() as $OCCUPATION) {
                    ?>
                        <option value="<?= $OCCUPATION->CLS_OCCUPATION_CODE; ?>"><?= $OCCUPATION->CLS_OCCUPATION_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของผู้ปกครอง</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="GuardianSalary" required>
            </div>
        </div>
        <h6 class="card-title">ข้อมูลครอบครัว</h6>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">สถานะการสมรสระหว่างบิดามารดา</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="ParentMarriageStatusCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                    foreach ($result->result() as $FAMILY_STATUS) {
                    ?>
                        <option value="<?= $FAMILY_STATUS->CLS_MARRIAGE_STATUS_CODE; ?>"><?= $FAMILY_STATUS->CLS_MARRIAGE_STATUS_NAME; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <h5 class="card-title">ข้อมูลครอบครัว</h5>
        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">เป็นบุตรลำดับที่</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="StudentBirthOrder" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนพี่ชาย</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="StudentElderBrotherAmount" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนพี่สาว</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="StudentElderSisterAmount" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนน้องชาย</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="StudentYoungerBrotherAmount" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนน้องสาว</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="StudentYoungerSisterAmount" required>
            </div>
        </div>

        <div class="text-center">
            <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
            <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
            <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">หน้าถัดไป</button>
        </div>

        <!---------------------------------- Forms Student P1 ------------------------------------->
        <input type="hidden" name="StudentReferenceID" value="<?= $_POST['StudentPersonalIDTypeCode']; ?><?= $_POST['StudentPersonalID']; ?>">
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

    </form><!-- End floating Labels Form -->
    <br>

    </div>
    </div>

    </div>

    </div>
    </section>

</main><!-- End #main -->