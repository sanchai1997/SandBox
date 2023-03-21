<style>
  label.col-form-label {
    padding-left: 30px;
  }
</style>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>เพิ่มข้อมูลนักเรียน</h1>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-9">
        <form class="row g-3" action="<?php echo base_url('forms-student-P2'); ?>" method="POST">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลปีการศึกษา</h5>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                  <input type="text" class="form-control" name="EducationYear" required>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" max="2" name="Semester" required>
                </div>
              </div>
              <h5 class="card-title">ข้อมูลสถานศึกษา</h5>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ชื่อสถานศึกษา</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="SchoolID" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM SCHOOL');
                    foreach ($result->result() as $SCHOOL) {
                    ?>
                      <option value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <h5 class="card-title">ข้อมูลนักเรียน</h5>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-3 col-form-label">หมายเลขประจำตัวนักเรียน</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="StudentID" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">สถานะภาพนักเรียน</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="StudentStatusCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_STUDENT_STATUS');
                    foreach ($result->result() as $STUDENT_STATUS) {
                    ?>
                      <option value="<?= $STUDENT_STATUS->STUDENT_STATUS_CODE; ?>"><?= $STUDENT_STATUS->STUDENT_STATUS_NAME; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <h5 class="card-title">ข้อมูลบุคคล</h5>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">หมายเลขประจำตัวประชาชน</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="StudentPersonalID" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="StudentPersonalIDTypeCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                    foreach ($result->result() as $PERSONAL) {
                    ?>
                      <option value="<?= $PERSONAL->CITIZEN_ID_TYPE_CODE; ?>"><?= $PERSONAL->CITIZEN_ID_TYPE_NAME; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทาง</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentPassportNumber">
                </div>
              </div>
              <!-- Floating Labels Form -->
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="StudentPrefixCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX LIMIT 5');
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
                <label for="inputText" class="col-sm-2 col-form-label">ชื่อ (ไทย)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentNameThai" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลาง (ไทย)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentMiddleNameThai">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">นามสกุล (ไทย)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentLastNameThai" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ชื่อ (อังกฤษ)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentNameEnglish">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลาง (อังกฤษ)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentMiddleEnglish">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">นามสกุล (อังกฤษ)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="StudentLastNameEnglish">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="State" name="StudentGenderCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_GENDER');
                      foreach ($result->result() as $GENDER) {
                      ?>
                        <option value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
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
                      <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="StudentBirthDate" required>
                      <label for="BIRTH_DAT">วันเกิด</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="BIRTH_PROVINCE_CODE" aria-label="BIRTH_PROVINCE_CODE" name="StudentBirthProvinceCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                      foreach ($result->result() as $PROVINCE) {
                      ?>
                        <option value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
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
                        <option selected>เลือก</option>
                        <?php
                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ');
                        foreach ($result->result() as $NATIONALITY) {
                        ?>
                          <option value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
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
                        <option selected>เลือก</option>
                        <?php
                        $result = $this->db->query('SELECT * FROM CLS_RACE');
                        foreach ($result->result() as $RACE) {
                        ?>
                          <option value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
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
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_RELIGION ');
                      foreach ($result->result() as $RELIGION) {
                      ?>
                        <option value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
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
                        <option selected>เลือก</option>
                        <?php
                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE');
                        foreach ($result->result() as $LANGUAGE) {
                        ?>
                          <option value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
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
                        <option selected>เลือก</option>
                        <?php
                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE');
                        foreach ($result->result() as $LANGUAGE) {
                        ?>
                          <option value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
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
                        <option value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
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
                      <input type="number" class="form-control" id="WEIGHT" placeholder="WEIGHT" name="StudentWeight" required>
                      <label for="WEIGHT">น้ำหนัก</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="HEIGHT" placeholder="HEIGHT" name="StudentHeight" required>
                      <label for="HEIGHT">ส่วนสูง</label>
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="card-title">ข้อมูลที่อยู่ของนักเรียน (ตามทะเบียนบ้าน)</h5>
              <div class="row mb-3">
                <div class="col-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="StudentOfficialAddressHouseRegisterID">
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">รหัสประจำบ้าน</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="StudentOfficialAddressHouseNumber">
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="StudentOfficialAddressMoo">
                      <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET" name="StudentOfficialAddressStreet">
                    <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI" name="StudentOfficialAddressSoi">
                    <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK" name="StudentOfficialAddressTrok">
                    <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="StudentOfficialAddressProvinceCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                      foreach ($result->result() as $PROVINCE) {
                      ?>
                        <option value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
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
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_DISTRICT');
                      foreach ($result->result() as $DISTRICT) {
                      ?>
                        <option id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
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
                      $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT');
                      foreach ($result->result() as $SUBDISTRICT) {
                      ?>
                        <option id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" name="StudentOfficialAddressPostcode" required>
                    <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER" name="StudentOfficialAddressPhoneNumber" required>
                    <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">เบอร์ติดต่อโทรศัพท์</label>
                  </div>
                </div>
              </div>
              <h5 class="card-title">ข้อมูลที่อยู่ของนักเรียน (ปัจจุบัน)</h5>
              <div class="row mb-3">
                <div class="col-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="StudentCurrentAddressHouseRegisterID">
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">รหัสประจำบ้าน</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="StudentCurrentAddressHouseNumber" required>
                    <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่(ปัจจุบัน)</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO" name="StudentCurrentAddressMoo" required>
                      <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET" name="StudentCurrentAddressStreet" required>
                    <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI" name="StudentCurrentAddressSoi" required>
                    <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK" name="StudentCurrentAddressTrok" required>
                    <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="PROVINCE_SUB" aria-label="PROVINCE_SUB" name="StudentCurrentAddressProvinceCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                      foreach ($result->result() as $PROVINCE) {
                      ?>
                        <option value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <label for="OFFICIAL_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="DISTRICT_SUB" aria-label="DISTRICT_SUB" name="StudentCurrentAddressDistrictCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91');
                      foreach ($result->result() as $DISTRICT) {
                      ?>
                        <option id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="StudentCurrentAddressSubdistrictCode" required>
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91');
                      foreach ($result->result() as $SUBDISTRICT) {
                      ?>
                        <option id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE" name="StudentCurrentAddressPostcode" required>
                    <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_PHONE_NUMBER" placeholder="CURRENT_PHONE_NUMBER" name="StudentCurrentAddressPhoneNumber" required>
                    <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
                <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">หน้าถัดไป</button>
              </div>
        </form><!-- End floating Labels Form -->

        <br>

      </div>
    </div>

    </div>

    </div>
  </section>

</main><!-- End #main -->