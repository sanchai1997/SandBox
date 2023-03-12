<style>
    label.col-form-label {
        padding-left: 30px;
    }
</style>
<?php
$result = $this->db->query('SELECT * FROM STUDENT
                        WHERE STUDENT.DeleteStatus = 0 AND STUDENT.StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
foreach ($result->result() as $STUDENT) {
?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>แก้ไขข้อมูลนักเรียน</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active">Edit Student</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    <form class="row g-3" action="<?php echo base_url('update-student/' . $STUDENT->StudentReferenceID . '/' . $STUDENT->SchoolID . '/' . $STUDENT->EducationYear . '/' . $STUDENT->Semester . '/' . $STUDENT->EducationLevelCode . '/' . $STUDENT->GradeLevelCode); ?>" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ข้อมูลปีการศึกษา</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="EducationYear" required value="<?= $STUDENT->EducationYear; ?>">
                                    </div>
                                    <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" max="2" name="Semester" required value="<?= $STUDENT->Semester; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลสถานศึกษา</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อสถานศึกษา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="SchoolID" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM SCHOOL');
                                            foreach ($result->result() as $SCHOOL) {
                                            ?>
                                                <option <?php if ($STUDENT->SchoolID == $SCHOOL->SchoolID) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลนักเรียน</h5>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">หมายเลขประจำตัวนักเรียน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="StudentID" required value="<?= $STUDENT->StudentID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">สถานะภาพนักเรียน</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="StudentStatusCode" required>

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_STUDENT_STATUS ');
                                            foreach ($result->result() as $STUDENT_STATUS) {
                                            ?>
                                                <option <?php if ($STUDENT->StudentStatusCode == $STUDENT_STATUS->STUDENT_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $STUDENT_STATUS->STUDENT_STATUS_CODE; ?>"><?= $STUDENT_STATUS->STUDENT_STATUS_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลบุคคล</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">หมายเลขประจำตัวประชาชน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="StudentPersonalID" required value="<?= $STUDENT->StudentPersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="StudentPersonalIDTypeCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE ');
                                            foreach ($result->result() as $PERSONAL) {
                                            ?>
                                                <option <?php if ($STUDENT->StudentPersonalIDTypeCode == $PERSONAL->CITIZEN_ID_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONAL->CITIZEN_ID_TYPE_CODE; ?>"><?= $PERSONAL->CITIZEN_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทาง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentPassportNumber" value="<?= $STUDENT->StudentPassportNumber; ?>">
                                    </div>
                                </div>
                                <!-- Floating Labels Form -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="StudentPrefixCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX ');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($STUDENT->StudentPrefixCode == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อ (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentNameThai" required value="<?= $STUDENT->StudentNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลาง (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentMiddleNameThai" value="<?= $STUDENT->StudentMiddleNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุล (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentLastNameThai" required value="<?= $STUDENT->StudentLastNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อ (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentNameEnglish" value="<?= $STUDENT->StudentNameEnglish; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลาง (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentMiddleEnglish" value="<?= $STUDENT->StudentMiddleEnglish; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุล (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="StudentLastNameEnglish" value="<?= $STUDENT->StudentLastNameEnglish; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="StudentGenderCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_GENDER ');
                                                foreach ($result->result() as $GENDER) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentGenderCode == $GENDER->GENDER_CODE) {
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
                                                <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="StudentBirthDate" required value="<?= $STUDENT->StudentBirthDate; ?>">
                                                <label for="BIRTH_DAT">วันเกิด</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="BIRTH_PROVINCE_CODE" aria-label="BIRTH_PROVINCE_CODE" name="StudentBirthProvinceCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE GROUP BY PROVINCE_NAME');
                                                foreach ($result->result() as $PROVINCE) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentBirthProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="BIRTH_PROVINCE_CODE">จังหวัดที่เกิด</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="NATIONALITY_CODE" aria-label="NATIONALITY_CODE" name="StudentNationalityCode" required>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_NATIONALITY GROUP BY NATIONALITY_NAME ASC');
                                                    foreach ($result->result() as $NATIONALITY) {
                                                    ?>
                                                        <option <?php if ($STUDENT->StudentNationalityCode == $NATIONALITY->NATIONALITY_CODE) {
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
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="RACE_CODE" aria-label="RACE_CODE" name="StudentRaceCode" required>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_RACE GROUP BY RACE_NAME ASC');
                                                    foreach ($result->result() as $RACE) {
                                                    ?>
                                                        <option <?php if ($STUDENT->StudentRaceCode == $RACE->RACE_CODE) {
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
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="RELIGION_CODE" aria-label="RELIGION_CODE" name="StudentReligionCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_RELIGION ');
                                                foreach ($result->result() as $RELIGION) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentReligionCode == $RELIGION->RELIGION_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="RELIGION_CODE">ศาสนา</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="LANGUAGE_CODE" aria-label="LANGUAGE_CODE" name="StudentLanguageCode" required>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_LANGUAGE GROUP BY LANGUAGE_NAME ASC');
                                                    foreach ($result->result() as $LANGUAGE) {
                                                    ?>
                                                        <option <?php if ($STUDENT->StudentLanguageCode == $LANGUAGE->LANGUAGE_CODE) {
                                                                    echo 'selected';
                                                                } ?> value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="LANGUAGE_CODE">ภาษาหลัก</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" id="OTHER_LANGUAGE_CODE" aria-label="OTHER_LANGUAGE_CODE" name="StudentOtherLanguageCode">
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_LANGUAGE GROUP BY LANGUAGE_NAME ASC');
                                                    foreach ($result->result() as $LANGUAGE) {
                                                    ?>
                                                        <option <?php if ($STUDENT->StudentLanguageCode == $LANGUAGE->LANGUAGE_CODE) {
                                                                    echo 'selected';
                                                                } ?> value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="OTHER_LANGUAGE_CODE">ภาษาอื่น</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="BLOOD_CODE" aria-label="BLOOD_CODE" name="StudentBloodCode" required>
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_BLOOD ');
                                                foreach ($result->result() as $BLOOD) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentBloodCode == $BLOOD->BLOOD_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="BLOOD_CODE">กลุ่มเลือด</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="WEIGHT" placeholder="WEIGHT" name="StudentWeight" required value="<?= $STUDENT->StudentWeight; ?>">
                                                <label for="WEIGHT">น้ำหนัก</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="HEIGHT" placeholder="HEIGHT" name="StudentHeight" required value="<?= $STUDENT->StudentHeight; ?>">
                                                <label for="HEIGHT">ส่วนสูง</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลที่อยู่ของนักเรียน (ตามทะเบียนบ้าน)</h5>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="StudentOfficialAddressHouseRegisterID" value="<?= $STUDENT->StudentOfficialAddressHouseRegisterID; ?>">
                                            <label for="OFFICIAL_ADDRESS_HOUSE_NO">รหัสประจำบ้าน</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="StudentOfficialAddressHouseNumber" value="<?= $STUDENT->StudentOfficialAddressHouseNumber; ?>">
                                            <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="StudentOfficialAddressMoo" value="<?= $STUDENT->StudentOfficialAddressMoo; ?>">
                                                <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET" name="StudentOfficialAddressStreet" value="<?= $STUDENT->StudentOfficialAddressStreet; ?>">
                                            <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI" name="StudentOfficialAddressSoi" value="<?= $STUDENT->StudentOfficialAddressSoi; ?>">
                                            <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK" name="StudentOfficialAddressTrok" value="<?= $STUDENT->StudentOfficialAddressTrok; ?>">
                                            <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="StudentOfficialAddressProvinceCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE GROUP BY PROVINCE_NAME ASC');
                                                foreach ($result->result() as $PROVINCE) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
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
                                            <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="StudentOfficialAddressDistrictCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_DISTRICT GROUP BY DISTRICT_NAME ASC');
                                                foreach ($result->result() as $DISTRICT) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                                echo 'selected';
                                                            } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="StudentOfficialAddressSubdistrictCode" required>
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT GROUP BY SUBDISTRICT_NAME ASC');
                                                foreach ($result->result() as $SUBDISTRICT) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                                echo 'selected';
                                                            } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" name="StudentOfficialAddressPostcode" required value="<?= $STUDENT->StudentOfficialAddressPostcode; ?>">
                                            <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER" name="StudentOfficialAddressPhoneNumber" required value="<?= $STUDENT->StudentOfficialAddressPhoneNumber; ?>">
                                            <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">เบอร์ติดต่อโทรศัพท์</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลที่อยู่ของนักเรียน (ปัจจุบัน)</h5>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="StudentCurrentAddressHouseRegisterID" value="<?= $STUDENT->StudentCurrentAddressHouseRegisterID; ?>">
                                            <label for="OFFICIAL_ADDRESS_HOUSE_NO">รหัสประจำบ้าน</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="StudentCurrentAddressHouseNumber" required value="<?= $STUDENT->StudentCurrentAddressHouseNumber; ?>">
                                            <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่(ปัจจุบัน)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO" name="StudentCurrentAddressMoo" required value="<?= $STUDENT->StudentCurrentAddressMoo; ?>">
                                                <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET" name="StudentCurrentAddressStreet" required value="<?= $STUDENT->StudentCurrentAddressStreet; ?>">
                                            <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI" name="StudentCurrentAddressSoi" required value="<?= $STUDENT->StudentCurrentAddressSoi; ?>">
                                            <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK" name="StudentCurrentAddressTrok" required value="<?= $STUDENT->StudentCurrentAddressTrok; ?>">
                                            <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="PROVINCE_SUB" name="StudentCurrentAddressProvinceCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                                                foreach ($result->result() as $PROVINCE) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
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
                                            <select class="form-select" aria-label="DISTRICT_SUB" name="StudentCurrentAddressDistrictCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91 GROUP BY DISTRICT_NAME ASC');
                                                foreach ($result->result() as $DISTRICT) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                                echo 'selected';
                                                            } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="SUBDISTRICT_SUB" name="StudentCurrentAddressSubdistrictCode" required>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91 GROUP BY SUBDISTRICT_NAME ASC');
                                                foreach ($result->result() as $SUBDISTRICT) {
                                                ?>
                                                    <option <?php if ($STUDENT->StudentCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                                echo 'selected';
                                                            } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE" name="StudentCurrentAddressPostcode" required value="<?= $STUDENT->StudentCurrentAddressPostcode; ?>">
                                            <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_PHONE_NUMBER" placeholder="CURRENT_PHONE_NUMBER" name="StudentCurrentAddressPhoneNumber" required value="<?= $STUDENT->StudentCurrentAddressPhoneNumber; ?>">
                                            <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลบิดา</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวบิดา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherPersonalID" required value="<?= $STUDENT->FatherPersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="FatherPersonalIDTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                            foreach ($result->result() as $PERSONAL) {
                                            ?>
                                                <option <?php if ($STUDENT->FatherPersonalIDTypeCode == $PERSONAL->CLS_CITIZEN_ID_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONAL->CLS_CITIZEN_ID_TYPE_CODE; ?>"><?= $PERSONAL->CLS_CITIZEN_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางบิดา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherPassportNumber" value="<?= $STUDENT->FatherPassportNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">คำนำหน้าชื่อบิดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="FatherPrefixCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($STUDENT->FatherPrefixCode == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherNameThai" required value="<?= $STUDENT->FatherNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherMiddleNameThai" value="<?= $STUDENT->FatherMiddleNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherLastNameThai" required value="<?= $STUDENT->FatherLastNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherNameEnglish" value="<?= $STUDENT->FatherNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherMiddleNameEnglish" value="<?= $STUDENT->FatherMiddleNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="FatherLastNameEnglish" value="<?= $STUDENT->FatherLastNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานภาพของบิดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="FatherPersonStatusCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS');
                                            foreach ($result->result() as $PERSON_STATUS) {
                                            ?>
                                                <option <?php if ($STUDENT->FatherPersonStatusCode == $PERSON_STATUS->PERSON_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSON_STATUS->PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->PERSON_STATUS_NAME; ?></option>
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
                                        <input type="number" class="form-control" name="FatherPhoneNumber" value="<?= $STUDENT->FatherPhoneNumber; ?>">
                                    </div>
                                </div>
                                <h6 class="card-title">รายได้ของบิดา</h6>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่มอาชีพของบิดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="FatherOccupationCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                                            foreach ($result->result() as $OCCUPATION) {
                                            ?>
                                                <option <?php if ($STUDENT->FatherPersonStatusCode == $PERSON_STATUS->PERSON_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของบิดา</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="FatherSalary" value="<?= $STUDENT->FatherSalary; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลมารดา</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวมารดา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherPersonalID" required value="<?= $STUDENT->MotherPersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวมารดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="MotherPersonalIDTypeCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                            foreach ($result->result() as $PERSONAL) {
                                            ?>
                                                <option <?php if ($STUDENT->MotherPersonalIDTypeCode == $PERSONAL->CLS_CITIZEN_ID_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONAL->CLS_CITIZEN_ID_TYPE_CODE; ?>"><?= $PERSONAL->CLS_CITIZEN_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางมารดา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherPassportNumber" required value="<?= $STUDENT->MotherPassportNumber; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">คำนำหน้าชื่อมารดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="MotherPrefixCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($STUDENT->MotherPrefixCode == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherNameThai" required value="<?= $STUDENT->MotherNameThai; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherMiddleNameThai" value="<?= $STUDENT->MotherMiddleNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherLastNameThai" required value="<?= $STUDENT->MotherLastNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherNameEnglish" value="<?= $STUDENT->MotherNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherMiddleNameEnglish" value="<?= $STUDENT->MotherMiddleNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา(อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="MotherLastNameEnglish" value="<?= $STUDENT->MotherLastNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานภาพของมารดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="MotherPersonStatusCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS');
                                            foreach ($result->result() as $PERSON_STATUS) {
                                            ?>
                                                <option <?php if ($STUDENT->MotherPersonStatusCode == $PERSON_STATUS->PERSON_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSON_STATUS->PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->PERSON_STATUS_NAME; ?></option>
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
                                        <input type="text" class="form-control" name="MotherPhoneNumber" required value="<?= $STUDENT->MotherPhoneNumber; ?>">
                                    </div>
                                </div>
                                <h6 class="card-title">รายได้ของมารดา</h6>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่มอาชีพของมารดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="MotherOccupationCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                                            foreach ($result->result() as $OCCUPATION) {
                                            ?>
                                                <option <?php if ($STUDENT->MotherOccupationCode == $OCCUPATION->OCCUPATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของมารดา</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="MotherSalary" required value="<?= $STUDENT->MotherSalary; ?>">
                                    </div>
                                </div>

                                <h5 class="card-title">ข้อมูลผู้ปกครอง</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianPersonalID" required value="<?= $STUDENT->GuardianPersonalID; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GuardianPersonalIDTypeCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                            foreach ($result->result() as $PERSONAL) {
                                            ?>
                                                <option <?php if ($STUDENT->GuardianPersonalIDTypeCode == $PERSONAL->CITIZEN_ID_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONAL->CITIZEN_ID_TYPE_CODE; ?>"><?= $PERSONAL->CITIZEN_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianPassportNumber" value="<?= $STUDENT->GuardianPassportNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">คำนำหน้าชื่อผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GuardianPrefixCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($STUDENT->GuardianPrefixCode == $PREFIX->PREFIX_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianNameThai" required value="<?= $STUDENT->GuardianNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางผู้ปกครอง (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianMiddleNameThai" value="<?= $STUDENT->GuardianMiddleNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง (ไทย)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianLastNameThai" required value="<?= $STUDENT->GuardianLastNameThai; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianNameEnglish" value="<?= $STUDENT->GuardianNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางผู้ปกครอง (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianMiddleNameEnglish" value="<?= $STUDENT->GuardianMiddleNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง (อังกฤษ)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GuardianLastNameEnglish" value="<?= $STUDENT->GuardianLastNameEnglish; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ความสัมพันธ์ของผู้ปกครองกับนักเรียน</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GuardianRelationCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION');
                                            foreach ($result->result() as $FAMILY_RELATION) {
                                            ?>
                                                <option <?php if ($STUDENT->GuardianRelationCode == $FAMILY_RELATION->FAMILY_RELATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $FAMILY_RELATION->FAMILY_RELATION_CODE; ?>"><?= $FAMILY_RELATION->FAMILY_RELATION_NAME; ?></option>
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
                                        <input type="text" class="form-control" name="GuardianPhoneNumber" required value="<?= $STUDENT->GuardianPhoneNumber; ?>">
                                    </div>
                                </div>
                                <h6 class="card-title">รายได้ของผู้ปกครอง</h6>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่มอาชีพของผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GuardianOccupationCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_OCCUPATION');
                                            foreach ($result->result() as $OCCUPATION) {
                                            ?>
                                                <option <?php if ($STUDENT->GuardianOccupationCode == $OCCUPATION->OCCUPATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของผู้ปกครอง</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="GuardianSalary" required value="<?= $STUDENT->GuardianSalary; ?>">
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลครอบครัว</h6>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานะการสมรสระหว่างบิดามารดา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="ParentMarriageStatusCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                                            foreach ($result->result() as $MARRIAGE) {
                                            ?>
                                                <option <?php if ($STUDENT->ParentMarriageStatusCode == $MARRIAGE->MARRIAGE_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $MARRIAGE->MARRIAGE_STATUS_CODE; ?>"><?= $MARRIAGE->MARRIAGE_STATUS_NAME; ?></option>
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
                                        <input type="number" class="form-control" name="StudentBirthOrder" required value="<?= $STUDENT->StudentBirthOrder; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนพี่ชาย</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="StudentElderBrotherAmount" required value="<?= $STUDENT->StudentElderBrotherAmount; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนพี่สาว</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="StudentElderSisterAmount" required value="<?= $STUDENT->StudentElderSisterAmount; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนน้องชาย</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="StudentYoungerBrotherAmount" required value="<?= $STUDENT->StudentYoungerBrotherAmount; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputhidden" class="col-sm-2 col-form-label">จำนวนน้องสาว</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="StudentYoungerSisterAmount" required value="<?= $STUDENT->StudentYoungerSisterAmount; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลด้านศึกษา</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษา</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="CurrentEducationLevelAdmissionYear" required value="<?= $STUDENT->CurrentEducationLevelAdmissionYear; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียน</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="SchoolAdmissionYear" required value="<?= $STUDENT->SchoolAdmissionYear; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION) {
                                            ?>
                                                <option <?php if ($STUDENT->EducationLevelCode == $EDUCATION->EDUCATION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EDUCATION->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ชั้นเรียน</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GradeLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL');
                                            foreach ($result->result() as $GRADE_LEVEL) {
                                            ?>
                                                <option <?php if ($STUDENT->GradeLevelCode == $GRADE_LEVEL->GRADE_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ห้องเรียนที่</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Classroom" aria-label="Default select example" required value="<?= $STUDENT->Classroom; ?>">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">เรียนหลักสูตรทวิศึกษา</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="1" <?php if ($STUDENT->PartSchoolFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="PartSchoolFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                เรียน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="0" <?php if ($STUDENT->PartSchoolFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="PartSchoolFlag">
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
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CURRICULUM');
                                            foreach ($result->result() as $CURRICULUM) {
                                            ?>
                                                <option <?php if ($STUDENT->CurriculumID == $CURRICULUM->CURRICULUM_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $CURRICULUM->CURRICULUM_CODE; ?>"><?= $CURRICULUM->CURRICULUM_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h6 class="card-title">ข้อมูลการเดินทางไปสถานศึกษา</h6>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ประเภทการเดินทางมาโรงเรียน</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="JourneyTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE');
                                            foreach ($result->result() as $JOURNEY) {
                                            ?>
                                                <option <?php if ($STUDENT->JourneyTypeCode == $JOURNEY->JOURNEY_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $JOURNEY->JOURNEY_TYPE_CODE; ?>"><?= $JOURNEY->JOURNEY_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">ระยะเวลาการเดินทางจากบ้านมาโรงเรียน (ชม.)</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="JourneyTime" value="<?= $STUDENT->JourneyTime; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลูกรัง (กม.)</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="RockJourneyDistance" value="<?= $STUDENT->RockJourneyDistance; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลาดยาง (กม.)</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="RubberJourneyDistance" value="<?= $STUDENT->RubberJourneyDistance; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">ระยะทางไปโรงเรียนที่ผ่านทางน้ำ (กม.)</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="WaterJourneyDistance" value="<?= $STUDENT->WaterJourneyDistance; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลความพิการ</h5>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ความพิการ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="DisabilityCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                                            foreach ($result->result() as $DISABILITY) {
                                            ?>
                                                <option <?php if ($STUDENT->DisabilityCode == $DISABILITY->DISABILITY_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $DISABILITY->DISABILITY_CODE; ?>"><?= $DISABILITY->DISABILITY_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputhidden" class="col-sm-2 col-form-label">รายละเอียดความพิการ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="DisabilityDetail" value="<?= $STUDENT->DisabilityDetail; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับความพิการ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="DisabilityLevelCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL');
                                            foreach ($result->result() as $DISABILITY_LEVEL) {
                                            ?>
                                                <option <?php if ($STUDENT->DisabilityLevelCode == $DISABILITY_LEVEL->DISABILITY_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $DISABILITY_LEVEL->DISABILITY_LEVEL_CODE; ?>"><?= $DISABILITY_LEVEL->DISABILITY_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลความด้อยโอกาศ</h5>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ความด้อยโอกาส</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="DisadvantagedCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED');
                                            foreach ($result->result() as $DISAVANTAGED) {
                                            ?>
                                                <option <?php if ($STUDENT->DisadvantagedCode == $DISAVANTAGED->DISAVANTAGED_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $DISAVANTAGED->DISAVANTAGED_CODE; ?>"><?= $DISAVANTAGED->DISAVANTAGED_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนแบบเรียน</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="0" <?php if ($STUDENT->LackingBookFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingBookFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ขาดแคลน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="1" <?php if ($STUDENT->LackingBookFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingBookFlag">
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
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="0" <?php if ($STUDENT->LackingFoodFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingFoodFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ขาดแคลน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="1" <?php if ($STUDENT->LackingFoodFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingFoodFlag">
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
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="0" <?php if ($STUDENT->LackingStationeryFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingStationeryFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ขาดแคลน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="1" <?php if ($STUDENT->LackingStationeryFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingStationeryFlag">
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
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="0" <?php if ($STUDENT->LackingUniformFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingUniformFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ขาดแคลน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="1" <?php if ($STUDENT->LackingUniformFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="LackingUniformFlag">
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
                                        <input type="number" class="form-control" name="FamilyMonthlyIncome" value="<?= $STUDENT->FamilyMonthlyIncome; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานภาพครอบครัว</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="FamilyStatusCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS');
                                            foreach ($result->result() as $FAMILY_STATUS) {
                                            ?>
                                                <option <?php if ($STUDENT->FamilyStatusCode == $FAMILY_STATUS->FAMILY_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $FAMILY_STATUS->FAMILY_STATUS_CODE; ?>"><?= $FAMILY_STATUS->FAMILY_STATUS_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">นักเรียนอาศัยอยู่กับ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="StudentLiveWithCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH');
                                            foreach ($result->result() as $STUDENT_LIVE_WITH) {
                                            ?>
                                                <option <?php if ($STUDENT->StudentLiveWithCode == $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_CODE; ?>"><?= $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">ได้สวัสดิการแห่งรัฐ</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios1" value="0" <?php if ($STUDENT->StateWelfareFlag == 0) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="StateWelfareFlag">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ได้
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridRadios2" value="1" <?php if ($STUDENT->StateWelfareFlag == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> name="StateWelfareFlag">
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
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_TALENT GROUP BY TALENT_NAME ASC');
                                            foreach ($result->result() as $TALENT) {
                                            ?>
                                                <option <?php if ($STUDENT->TalentCode == $TALENT->TALENT_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="student-P2?SchoolID=<?= $STUDENT->SchoolID; ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&EducationLevelCode=<?= $STUDENT->EducationLevelCode; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT<?= $STUDENT->StudentReferenceID; ?>">ยืนยัน</button>
                                </div>
                                <div class="modal fade" id="EDIT<?= $STUDENT->StudentReferenceID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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

                    <br>

                </div>
            </div>

            </div>

            </div>
        </section>

    </main><!-- End #main -->
<?php } ?>