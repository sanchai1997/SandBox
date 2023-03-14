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
                WHERE TEACHER.DeleteStatus = 0 AND TEACHER.TeacherID = "' . $_GET['TeacherID'] . '"
                GROUP BY TEACHER.SchoolID');
foreach ($result->result() as $TEACHER) {
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>แก้ไขข้อมูลครูและบุคลากรทางการศึกษา</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active">Edit Teacher</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลบุคคล</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-teacher/' . $TEACHER->TeacherID); ?>" method="POST">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherPrefixCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($TEACHER->PREFIX_CODE == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">คำนำหน้าชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="TeacherNameThai" required value="<?= $TEACHER->TeacherNameThai; ?>">
                                        <label for="floatingName">ชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleName" placeholder="Middle Name" name="TeacherMiddleNameThai" value="<?= $TEACHER->TeacherMiddleNameThai; ?>">
                                        <label for="floatingMiddleName">ชื่อกลาง</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastName" placeholder="Last Name" name="TeacherLastNameThai" required value="<?= $TEACHER->TeacherLastNameThai; ?>">
                                        <label for="floatingLastName">นามสกุล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingNameEN" placeholder="Your Name EN" name="TeacherNameEnglish" value="<?= $TEACHER->TeacherNameEnglish; ?>">
                                        <label for="floatingNameEN">ชื่อ (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleNameEN" placeholder="Middle Name EN" name="TeacherMiddleNameEnglish" value="<?= $TEACHER->TeacherMiddleNameEnglish; ?>">
                                        <label for="floatingMiddleNameEN">ชื่อกลาง (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastNameEN" placeholder="Last Name EN" name="TeacherLastNameEnglish" value="<?= $TEACHER->TeacherLastNameEnglish; ?>">
                                        <label for="floatingLastNameEN">นามสกุล (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherPersonalIDTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                            foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                            ?>
                                                <option <?php if ($TEACHER->CITIZEN_ID_TYPE_CODE == $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">ประเภทบัตรประจำตัว</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherPersonalID" value="<?= $TEACHER->TeacherPersonalID; ?>">
                                            <label for="BIRTH_DAT">หมายเลขประจำตัวประชาชน</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherPassportNumber" value="<?= $TEACHER->TeacherPassportNumber; ?>">
                                            <label for="BIRTH_DAT">เลขที่หนังสือเดินทาง</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherGenderCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                            foreach ($result->result() as $GENDER) {
                                            ?>
                                                <option <?php if ($TEACHER->GENDER_CODE == $GENDER->GENDER_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">เพศ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherBirthDate" value="<?= $TEACHER->TeacherBirthDate; ?>">
                                            <label for="BIRTH_DAT">วันเกิด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherNationalityCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_NATIONALITY');
                                                foreach ($result->result() as $NATIONALITY) {
                                                ?>
                                                    <option <?php if ($TEACHER->NATIONALITY_CODE == $NATIONALITY->NATIONALITY_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="NATIONALITY_CODE">สัญชาติ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherRaceCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_RACE');
                                                foreach ($result->result() as $RACE) {
                                                ?>
                                                    <option <?php if ($TEACHER->RACE_CODE == $RACE->RACE_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="RACE_CODE">เชื้อชาติ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="RELIGION_CODE" aria-label="RELIGION_CODE" name="TeacherReligionCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_RELIGION');
                                            foreach ($result->result() as $RELIGION) {
                                            ?>
                                                <option <?php if ($TEACHER->RELIGION_CODE == $RELIGION->RELIGION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="RELIGION_CODE">ศาสนา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="BLOOD_CODE" aria-label="BLOOD_CODE" name="TeacherBloodCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                            foreach ($result->result() as $BLOOD) {
                                            ?>
                                                <option <?php if ($TEACHER->BLOOD_CODE == $BLOOD->BLOOD_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="BLOOD_CODE">กลุ่มเลือด</label>
                                    </div>
                                </div>
                                <h5 class="card-title" style="padding-left: 10px;">ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</h5>
                                <div class="col-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherOfficialAddressHouseNumber" required value="<?= $TEACHER->TeacherOfficialAddressHouseNumber; ?>">
                                        <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherOfficialAddressMoo" value="<?= $TEACHER->TeacherOfficialAddressMoo; ?>">
                                            <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET" name="TeacherOfficialAddressStreet" value="<?= $TEACHER->TeacherOfficialAddressStreet; ?>">
                                        <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI" name="TeacherOfficialAddressSoi" value="<?= $TEACHER->TeacherOfficialAddressSoi; ?>">
                                        <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK" name="TeacherOfficialAddressTrok" value="<?= $TEACHER->TeacherOfficialAddressTrok; ?>">
                                        <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="TeacherOfficialAddressProvinceCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                            foreach ($result->result() as $PROVINCE) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="OFFICIAL_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="TeacherOfficialAddressDistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT');
                                            foreach ($result->result() as $DISTRICT) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $DISTRICT->DISTRICT_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="TeacherOfficialAddressSubdistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT');
                                            foreach ($result->result() as $SUBDISTRICT) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" name="TeacherOfficialAddressPostcode" value="<?= $TEACHER->TeacherOfficialAddressPostcode; ?>">
                                        <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER" name="TeacherOfficialAddressPhoneNumber" value="<?= $TEACHER->TeacherOfficialAddressPhoneNumber; ?>">
                                        <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <h5 class="card-title" style="padding-left: 10px;">ข้อมูลที่อยู่ (ปัจจุบัน)</h5>
                                <div class="col-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherCurrentAddressHouseNumber" required value="<?= $TEACHER->TeacherCurrentAddressHouseNumber; ?>">
                                        <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO" name="TeacherCurrentAddressMoo" value="<?= $TEACHER->TeacherCurrentAddressMoo; ?>">
                                            <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET" name="TeacherCurrentAddressStreet" value="<?= $TEACHER->TeacherCurrentAddressStreet; ?>">
                                        <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI" name="TeacherCurrentAddressSoi" value="<?= $TEACHER->TeacherCurrentAddressSoi; ?>">
                                        <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK" name="TeacherCurrentAddressTrok" value="<?= $TEACHER->TeacherCurrentAddressTrok; ?>">
                                        <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="PROVINCE_SUB" aria-label="PROVINCE_SUB" name="TeacherCurrentAddressProvinceCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $PROVINCE) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="OFFICIAL_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="DISTRICT_SUB" aria-label="DISTRICT_SUB" name="TeacherCurrentAddressDistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $DISTRICT) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="TeacherCurrentAddressSubdistrictCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $SUBDISTRICT) {
                                            ?>
                                                <option <?php if ($TEACHER->TeacherCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE" name="TeacherCurrentAddressPostcode" value="<?= $TEACHER->TeacherCurrentAddressPostcode; ?>">
                                        <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_PHONE_NUMBER" placeholder="CURRENT_ADDRESS_PHONE_NUMBER" name="TeacherCurrentAddressPhoneNumber" value="<?= $TEACHER->TeacherCurrentAddressPhoneNumber; ?>">
                                        <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="EMAIL" placeholder="EMAIL" name="TeacherEmail" value="<?= $TEACHER->TeacherEmail; ?>">
                                        <label for="EMAIL">อีเมลล์</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="EducationYear" value="<?= $TEACHER->EducationYear; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="Semester" value="<?= $TEACHER->Semester; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="SchoolID">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM SCHOOL');
                                            foreach ($result->result() as $SCHOOL) {
                                            ?>
                                                <option <?php if ($TEACHER->SchoolID == $SCHOOL->SchoolID) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลคู่สมรส</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">หมายเลขประจำตัวประชาชน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpousePersonalID" value="<?= $TEACHER->SpousePersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">สถานภาพการสมรส</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="MarriageStatusCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                                            foreach ($result->result() as $MARRIAGE_STATUS) {
                                            ?>
                                                <option <?php if ($TEACHER->MarriageStatusCode == $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE; ?>"><?= $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">คำนำหน้าชื่อคู่สมรส</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="SpousePrefixCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($TEACHER->SpousePrefixCode == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อคู่สมรส</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseNameThai" value="<?= $TEACHER->TeacherBirthDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางคู่สมรส</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseMiddleNameThai" value="<?= $TEACHER->SpouseMiddleNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">นามสกุลคู่สมรส</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseLastNameThai" value="<?= $TEACHER->SpouseLastNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อคู่สมรส(ภาษาอังกฤษ)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseNameEnglish" value="<?= $TEACHER->SpouseNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางคู่สมรส(ภาษาอังกฤษ)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseMiddleNameEnglish" value="<?= $TEACHER->SpouseMiddleNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">นามสกุลคู่สมรส(ภาษาอังกฤษ)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SpouseLastNameEnglish" value="<?= $TEACHER->SpouseLastNameEnglish; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ตำแหน่งและการปฏิบัติราชการ</h5>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">สถานะปฏิบัติราชการ</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="PersonnelStatusCode">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS');
                                            foreach ($result->result() as $PERSONNEL_STATUS) {
                                            ?>
                                                <option <?php if ($TEACHER->PERSONNEL_STATUS_CODE == $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ระดับการศึกษาที่บรรจุ</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="EntryEducationLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION_LEVEL) {
                                            ?>
                                                <option <?php if ($TEACHER->EDUCATION_LEVEL_CODE == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">วุฒิการศึกษาที่บรรจุ</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="EntryDegreeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DEGREE');
                                            foreach ($result->result() as $DEGREE) {
                                            ?>
                                                <option <?php if ($TEACHER->DEGREE_CODE == $DEGREE->DEGREE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">กลุ่มวิชาเอกที่บรรจุ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EntryMajorCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MAJOR');
                                            foreach ($result->result() as $MAJOR) {
                                            ?>
                                                <option <?php if ($TEACHER->MAJOR_CODE == $MAJOR->MAJOR_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">สาขาวิชาที่บรรจุ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EntryProgramCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                            foreach ($result->result() as $PROGRAM) {
                                            ?>
                                                <option <?php if ($TEACHER->PROGRAM_CODE == $PROGRAM->PROGRAM_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่บรรจุ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="PersonnelStartDate" value="<?= $TEACHER->PersonnelStartDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันเกษียณ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="PersonnelRetireDate" value="<?= $TEACHER->PersonnelRetireDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบุคลากร</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="PersonnelTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE');
                                            foreach ($result->result() as $PERSONNEL_TYPE) {
                                            ?>
                                                <option <?php if ($TEACHER->PERSONNEL_TYPE_CODE == $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ชื่อตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="PositionCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_POSITION');
                                            foreach ($result->result() as $POSITION) {
                                            ?>
                                                <option <?php if ($TEACHER->POSITION_CODE == $POSITION->POSITION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="PositionLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL');
                                            foreach ($result->result() as $POSITION_LEVEL) {
                                            ?>
                                                <option <?php if ($TEACHER->POSITION_LEVEL_CODE == $POSITION_LEVEL->POSITION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่ดำรงตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="PositionStartDate" value="<?= $TEACHER->PositionStartDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่สัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ContractNumber" value="<?= $TEACHER->ContractNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">จำนวนครั้งที่ทำสัญญา</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="ContractTimes" value="<?= $TEACHER->ContractTimes; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ลักษณะการจ้าง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="ContractTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE');
                                            foreach ($result->result() as $CONTRACT_TYPE) {
                                            ?>
                                                <option <?php if ($TEACHER->CONTRACT_TYPE_CODE == $CONTRACT_TYPE->CONTRACT_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $CONTRACT_TYPE->CONTRACT_TYPE_CODE; ?>"><?= $CONTRACT_TYPE->CONTRACT_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">จ้างมาแล้วกี่ปี</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="ContractYear" value="<?= $TEACHER->ContractYear; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มต้นสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="ContractStartDate" value="<?= $TEACHER->ContractStartDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="ContractEndDate" value="<?= $TEACHER->ContractEndDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ประเภทเงินงบประมาณ</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="SalaryTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE');
                                            foreach ($result->result() as $SALARY_TYPE) {
                                            ?>
                                                <option <?php if ($TEACHER->SALARY_TYPE_CODE == $SALARY_TYPE->SALARY_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SALARY_TYPE->SALARY_TYPE_CODE; ?>"><?= $SALARY_TYPE->SALARY_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินเดือนปัจจุบัน</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="CurrentSalary" value="<?= $TEACHER->CurrentSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินวิทยฐานะ</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="AcademicSalary" value="<?= $TEACHER->AcademicSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินค่าตอบแทน</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="CompensationSalary" value="<?= $TEACHER->CompensationSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินประจำตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="EmolumentsSalary" value="<?= $TEACHER->EmolumentsSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">การมีวุฒิทางครู</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="TeacherQualificationCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_TEACHER_QUALIFICATION');
                                            foreach ($result->result() as $TEACHER_QUALIFICATION) {
                                            ?>
                                                <option <?php if ($TEACHER->TEACHER_QUALIFICATION_CODE == $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_CODE; ?>"><?= $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="TeacherTalentCode">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_TALENT');
                                            foreach ($result->result() as $TALENT) {
                                            ?>
                                                <option <?php if ($TEACHER->TALENT_CODE == $TALENT->TALENT_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="teacher" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT<?= $TEACHER->TeacherID; ?>">บันทึกข้อมูล</button>
                                </div>
                                <div class="modal fade" id="EDIT<?= $TEACHER->TeacherID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                                                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
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
                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
<?php } ?>