<style>
  label.col-form-label {
    padding-left: 30px;
  }

  h5.card-title {
    padding-left: 20px;
  }
</style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>ข้อมูลครูและบุคลากรทางการศึกษา</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Add Teacher</li>
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
            <form class="row g-3" action="<?php echo base_url('forms-teacher-P2'); ?>" method="POST">
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherPrefixCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                    foreach ($result->result() as $PREFIX) {
                    ?>
                      <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="floatingSelect">คำนำหน้าชื่อ</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="TeacherNameThai" required>
                  <label for="floatingName">ชื่อ</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingMiddleName" placeholder="Middle Name" name="TeacherMiddleNameThai">
                  <label for="floatingMiddleName">ชื่อกลาง</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingLastName" placeholder="Last Name" name="TeacherLastNameThai" required>
                  <label for="floatingLastName">นามสกุล</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingNameEN" placeholder="Your Name EN" name="TeacherNameEnglish">
                  <label for="floatingNameEN">ชื่อ (อังกฤษ)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingMiddleNameEN" placeholder="Middle Name EN" name="TeacherMiddleNameEnglish">
                  <label for="floatingMiddleNameEN">ชื่อกลาง (อังกฤษ)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingLastNameEN" placeholder="Last Name EN" name="TeacherLastNameEnglish">
                  <label for="floatingLastNameEN">นามสกุล (อังกฤษ)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherPersonalIDTypeCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                    foreach ($result->result() as $CITIZEN_ID_TYPE) {
                    ?>
                      <option value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
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
                    <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherPersonalID">
                    <label for="BIRTH_DAT">หมายเลขประจำตัวประชาชน</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherPassportNumber">
                    <label for="BIRTH_DAT">เลขที่หนังสือเดินทาง</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherGenderCode">
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
                    <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT" name="TeacherBirthDate">
                    <label for="BIRTH_DAT">วันเกิด</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherNationalityCode">
                      <option selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM CLS_NATIONALITY');
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
              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="State" name="TeacherRaceCode">
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
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" id="RELIGION_CODE" aria-label="RELIGION_CODE" name="TeacherReligionCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_RELIGION');
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
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" id="BLOOD_CODE" aria-label="BLOOD_CODE" name="TeacherBloodCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_BLOOD');
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
              <h5 class="card-title" style="padding-left: 10px;">ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</h5>
              <div class="col-8">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherOfficialAddressHouseNumber" required>
                  <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherOfficialAddressMoo">
                    <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET" name="TeacherOfficialAddressStreet">
                  <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI" name="TeacherOfficialAddressSoi">
                  <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK" name="TeacherOfficialAddressTrok">
                  <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="TeacherOfficialAddressProvinceCode" required>
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
                  <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="TeacherOfficialAddressDistrictCode" required>
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
                  <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="TeacherOfficialAddressSubdistrictCode" required>
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
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" name="TeacherOfficialAddressPostcode">
                  <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER" name="TeacherOfficialAddressPhoneNumber">
                  <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                </div>
              </div>
              <h5 class="card-title" style="padding-left: 10px;">ข้อมูลที่อยู่ (ปัจจุบัน)</h5>
              <div class="col-8">
                <div class="form-floating">
                  <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO" name="TeacherCurrentAddressHouseNumber" required>
                  <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO" name="TeacherCurrentAddressMoo">
                    <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET" name="TeacherCurrentAddressStreet">
                  <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI" name="TeacherCurrentAddressSoi">
                  <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK" name="TeacherCurrentAddressTrok">
                  <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="PROVINCE_SUB" aria-label="PROVINCE_SUB" name="TeacherCurrentAddressProvinceCode" required>
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
                  <select class="form-select" id="DISTRICT_SUB" aria-label="DISTRICT_SUB" name="TeacherCurrentAddressDistrictCode" required>
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
                  <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="TeacherCurrentAddressSubdistrictCode" required>
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
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE" name="TeacherCurrentAddressPostcode">
                  <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="CURRENT_ADDRESS_PHONE_NUMBER" placeholder="CURRENT_ADDRESS_PHONE_NUMBER" name="TeacherCurrentAddressPhoneNumber">
                  <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                </div>
              </div>
              <div class="col-md-16">
                <div class="form-floating">
                  <input type="email" class="form-control" id="EMAIL" placeholder="EMAIL" name="TeacherEmail">
                  <label for="EMAIL">อีเมลล์</label>
                </div>
              </div>
              <div class="text-center">
                <a href="teacher" style="float: left;" class="btn btn-light">ยกเลิก</a>
                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">หน้าถัดไป</button>
              </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>


    </div>
  </section>

</main><!-- End #main -->