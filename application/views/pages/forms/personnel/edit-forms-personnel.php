<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<?php
$result = $this->db->query('SELECT * 
                FROM PERSONNEL
                INNER JOIN CLS_CITIZEN_ID_TYPE ON PERSONNEL.PersonnelPersonalIDTypeCode = CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                INNER JOIN CLS_GENDER ON PERSONNEL.PersonnelGenderCode = CLS_GENDER.GENDER_CODE
                INNER JOIN CLS_NATIONALITY ON PERSONNEL.PersonnelNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                INNER JOIN CLS_RACE ON PERSONNEL.PersonnelRaceCode = CLS_RACE.RACE_CODE
                INNER JOIN CLS_RELIGION ON PERSONNEL.PersonnelReligionCode = CLS_RELIGION.RELIGION_CODE
                INNER JOIN CLS_BLOOD ON PERSONNEL.PersonnelBloodCode = CLS_BLOOD.BLOOD_CODE
                INNER JOIN CLS_PERSONNEL_STATUS ON PERSONNEL.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                INNER JOIN CLS_PERSONNEL_TYPE ON PERSONNEL.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                INNER JOIN CLS_POSITION ON PERSONNEL.PositionCode = CLS_POSITION.POSITION_CODE
                INNER JOIN CLS_POSITION_LEVEL ON PERSONNEL.PositionLevelCode = CLS_POSITION_LEVEL.POSITION_LEVEL_CODE
                INNER JOIN CLS_CONTRACT_TYPE ON PERSONNEL.ContractTypeCode = CLS_CONTRACT_TYPE.CONTRACT_TYPE_CODE
                INNER JOIN CLS_SALARY_TYPE ON PERSONNEL.SalaryTypeCode = CLS_SALARY_TYPE.SALARY_TYPE_CODE
                INNER JOIN CLS_TALENT ON PERSONNEL.PersonnelTalentCode = CLS_TALENT.TALENT_CODE
                WHERE PERSONNEL.DeleteStatus = 0  AND PERSONNEL.PersonnelID = "' . $_GET['PersonnelID'] . '"
                ');
foreach ($result->result() as $PERSONNEL) {
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>แก้ไขข้อมูลบุคคลอื่น</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลบุคคล</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-personnel/' . $_GET['PersonnelID']); ?>" method="POST">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="PersonnelPrefixCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $PREFIX) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PREFIX_CODE == $PREFIX->PREFIX_CODE) {
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
                                        <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="PersonnelNameThai" required value="<?= $PERSONNEL->PersonnelNameThai; ?>">
                                        <label for="floatingName">ชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleName" placeholder="Middle Name" name="PersonnelMiddleNameThai" value="<?= $PERSONNEL->PersonnelMiddleNameThai; ?>">
                                        <label for="floatingMiddleName">ชื่อกลาง</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastName" placeholder="Last Name" name="PersonnelLastNameThai" required value="<?= $PERSONNEL->PersonnelLastNameThai; ?>">
                                        <label for="floatingLastName">นามสกุล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingNameEN" placeholder="Your Name EN" name="PersonnelNameEnglish" value="<?= $PERSONNEL->PersonnelNameEnglish; ?>">
                                        <label for="floatingNameEN">ชื่อ (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleNameEN" placeholder="Middle Name EN" name="PersonnelMiddleNameEnglish" value="<?= $PERSONNEL->PersonnelMiddleNameEnglish; ?>">
                                        <label for="floatingMiddleNameEN">ชื่อกลาง (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastNameEN" placeholder="Last Name EN" name="PersonnelLastNameEnglish" value="<?= $PERSONNEL->PersonnelLastNameEnglish; ?>">
                                        <label for="floatingLastNameEN">นามสกุล (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="PersonnelPersonalIDTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                            foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                            ?>
                                                <option <?php if ($PERSONNEL->CITIZEN_ID_TYPE_CODE == $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE) {
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
                                            <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="PersonnelPersonalID" value="<?= $PERSONNEL->PersonnelPersonalID; ?>">
                                            <label for="BIRTH_DAT">หมายเลขประจำตัวประชาชน</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="PersonnelPassportNumber" value="<?= $PERSONNEL->PersonnelPassportNumber; ?>">
                                            <label for="BIRTH_DAT">เลขที่หนังสือเดินทาง</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="PersonnelGenderCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                            foreach ($result->result() as $GENDER) {
                                            ?>
                                                <option <?php if ($PERSONNEL->GENDER_CODE == $GENDER->GENDER_CODE) {
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
                                            <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="PersonnelBirthDate" value="<?= $PERSONNEL->PersonnelBirthDate; ?>">
                                            <label for="BIRTH_DAT">วันเกิด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="PersonnelNationalityCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_NATIONALITY');
                                                foreach ($result->result() as $NATIONALITY) {
                                                ?>
                                                    <option <?php if ($PERSONNEL->NATIONALITY_CODE == $NATIONALITY->NATIONALITY_CODE) {
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
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="PersonnelRaceCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_RACE');
                                                foreach ($result->result() as $RACE) {
                                                ?>
                                                    <option <?php if ($PERSONNEL->RACE_CODE == $RACE->RACE_CODE) {
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
                                        <select class="form-select" id="RELIGION_CODE" aria-label="RELIGION_CODE" name="PersonnelReligionCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_RELIGION');
                                            foreach ($result->result() as $RELIGION) {
                                            ?>
                                                <option <?php if ($PERSONNEL->RELIGION_CODE == $RELIGION->RELIGION_CODE) {
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
                                        <select class="form-select" id="BLOOD_CODE" aria-label="BLOOD_CODE" name="PersonnelBloodCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                            foreach ($result->result() as $BLOOD) {
                                            ?>
                                                <option <?php if ($PERSONNEL->BLOOD_CODE == $BLOOD->BLOOD_CODE) {
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
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="PersonnelOfficialAddressHouseNumber" required value="<?= $PERSONNEL->PersonnelOfficialAddressHouseNumber; ?>">
                                        <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="PersonnelOfficialAddressMoo" value="<?= $PERSONNEL->PersonnelOfficialAddressMoo; ?>">
                                            <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET" name="PersonnelOfficialAddressStreet" value="<?= $PERSONNEL->PersonnelOfficialAddressStreet; ?>">
                                        <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI" name="PersonnelOfficialAddressSoi" value="<?= $PERSONNEL->PersonnelOfficialAddressSoi; ?>">
                                        <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK" name="PersonnelOfficialAddressTrok" value="<?= $PERSONNEL->PersonnelOfficialAddressTrok; ?>">
                                        <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="PersonnelOfficialAddressProvinceCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                            foreach ($result->result() as $PROVINCE) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
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
                                        <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="PersonnelOfficialAddressDistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT');
                                            foreach ($result->result() as $DISTRICT) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $DISTRICT->DISTRICT_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="PersonnelOfficialAddressSubdistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT');
                                            foreach ($result->result() as $SUBDISTRICT) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" name="PersonnelOfficialAddressPostcode" value="<?= $PERSONNEL->PersonnelOfficialAddressPostcode; ?>">
                                        <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER" name="PersonnelOfficialAddressPhoneNumber" value="<?= $PERSONNEL->PersonnelOfficialAddressPhoneNumber; ?>">
                                        <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <h5 class="card-title" style="padding-left: 10px;">ข้อมูลที่อยู่ (ปัจจุบัน)</h5>
                                <div class="col-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="PersonnelCurrentAddressHouseNumber" required value="<?= $PERSONNEL->PersonnelCurrentAddressHouseNumber; ?>">
                                        <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO" name="PersonnelCurrentAddressMoo" value="<?= $PERSONNEL->PersonnelCurrentAddressMoo; ?>">
                                            <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET" name="PersonnelCurrentAddressStreet" value="<?= $PERSONNEL->PersonnelCurrentAddressStreet; ?>">
                                        <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI" name="PersonnelCurrentAddressSoi" value="<?= $PERSONNEL->PersonnelCurrentAddressSoi; ?>">
                                        <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK" name="PersonnelCurrentAddressTrok" value="<?= $PERSONNEL->PersonnelCurrentAddressTrok; ?>">
                                        <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="PROVINCE_SUB" aria-label="PROVINCE_SUB" name="PersonnelCurrentAddressProvinceCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $PROVINCE) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
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
                                        <select class="form-select" id="DISTRICT_SUB" aria-label="DISTRICT_SUB" name="PersonnelCurrentAddressDistrictCode" required>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $DISTRICT) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="PersonnelCurrentAddressSubdistrictCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91');
                                            foreach ($result->result() as $SUBDISTRICT) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PersonnelCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                            echo 'selected';
                                                        } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE" name="PersonnelCurrentAddressPostcode" value="<?= $PERSONNEL->PersonnelCurrentAddressPostcode; ?>">
                                        <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_PHONE_NUMBER" placeholder="CURRENT_ADDRESS_PHONE_NUMBER" name="PersonnelCurrentPhoneNumber" value="<?= $PERSONNEL->PersonnelCurrentPhoneNumber; ?>">
                                        <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="EMAIL" placeholder="EMAIL" name="PersonnelEmail" value="<?= $PERSONNEL->PersonnelEmail; ?>">
                                        <label for="EMAIL">อีเมลล์</label>
                                    </div>
                                </div>
                                <Hr>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีที่เก็บข้อมูล</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="EntryYear" value="<?= $PERSONNEL->EntryYear; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">รอบที่เก็บข้อมูลที่</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="EntryTimes" value="<?= $PERSONNEL->EntryTimes; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">หน่วยงานต้นสกัด</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="JurisdictionCode">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                                            foreach ($result->result() as $JURISDICTION) {
                                            ?>
                                                <option <?php if ($PERSONNEL->JURISDICTION_CODE == $JURISDICTION->JURISDICTION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="card-title">ตำแหน่งและการปฏิบัติราชการ</h5>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานะปฏิบัติราชการ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="PersonnelStatusCode">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS');
                                            foreach ($result->result() as $PERSONNEL_STATUS) {
                                            ?>
                                                <option <?php if ($PERSONNEL->PERSONNEL_STATUS_CODE == $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่บรรจุ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="PersonnelStartDate" value="<?= $PERSONNEL->PersonnelStartDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันเกษียณ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="PersonnelRetireDate" value="<?= $PERSONNEL->PersonnelRetireDate; ?>">
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
                                                <option <?php if ($PERSONNEL->PERSONNEL_TYPE_CODE == $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE) {
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
                                                <option <?php if ($PERSONNEL->POSITION_CODE == $POSITION->POSITION_CODE) {
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
                                                <option <?php if ($PERSONNEL->POSITION_LEVEL_CODE == $POSITION_LEVEL->POSITION_LEVEL_CODE) {
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
                                        <input type="date" class="form-control" name="PositionStartDate" value="<?= $PERSONNEL->PositionStartDate; ?>">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลการว่าจ้าง</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่สัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ContractNumber" value="<?= $PERSONNEL->ContractNumber; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">จำนวนครั้งที่ทำสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="ContractTimes" value="<?= $PERSONNEL->ContractTimes; ?>">
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
                                                <option <?php if ($PERSONNEL->CONTRACT_TYPE_CODE == $CONTRACT_TYPE->CONTRACT_TYPE_CODE) {
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
                                        <input type="number" class="form-control" name="ContractYear" value="<?= $PERSONNEL->ContractYear; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มต้นสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="ContractStartDate" value="<?= $PERSONNEL->ContractStartDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="ContractEndDate" value="<?= $PERSONNEL->ContractEndDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทเงินงบประมาณ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="SalaryTypeCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE');
                                            foreach ($result->result() as $SALARY_TYPE) {
                                            ?>
                                                <option <?php if ($PERSONNEL->SALARY_TYPE_CODE == $SALARY_TYPE->SALARY_TYPE_CODE) {
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
                                        <input type="number" class="form-control" name="CurrentSalary" value="<?= $PERSONNEL->CurrentSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินวิทยฐานะ</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="AcademicSalary" value="<?= $PERSONNEL->AcademicSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินค่าตอบแทน</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="CompensationSalary" value="<?= $PERSONNEL->CompensationSalary; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินประจำตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="EmolumentsSalary" value="<?= $PERSONNEL->EmolumentsSalary; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="PersonnelTalentCode">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_TALENT');
                                            foreach ($result->result() as $TALENT) {
                                            ?>
                                                <option <?php if ($PERSONNEL->TALENT_CODE == $TALENT->TALENT_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="personnel" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT">บันทึกข้อมูล</button>
                                </div>
                                <div class="modal fade" id="EDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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