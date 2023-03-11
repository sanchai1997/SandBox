<main id="main" class="main">
  <div class="pagetitle">
    <h1>เพิ่มข้อมูลสถานศึกษา</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">School</li>
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
            <form class="row g-3" action="<?php echo base_url('forms-school-P2'); ?>" method="POST">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control " name="EducationYear" required>
                  <label for="EducationYear">ปีการศึกษา</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" max="2" name="Semester" required>
                  <label for="Semester">ภาคเรียน</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_JURISDICTION ');
                    foreach ($result->result() as $JURISDICTION) {
                    ?>
                      <option value="<?= $JURISDICTION->CLS_JURISDICTION_CODE; ?>"><?= $JURISDICTION->CLS_JURISDICTION_NAME; ?></option>
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
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_INNOVATION_AREA ');
                    foreach ($result->result() as $INNOVATION_AREA) {
                    ?>
                      <option value="<?= $INNOVATION_AREA->CLS_INNOVATION_AREA_CODE; ?>"><?= $INNOVATION_AREA->CLS_INNOVATION_AREA_NAME; ?></option>
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
                  <input type="text" class="form-control " name="SchoolNameThai" required>
                  <label for="SchoolNameThai">ชื่อสถานศึกษา (ไทย)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control " name="SchoolNameEnglish" required>
                  <label for="SchoolNameEnglish">ชื่อสถานศึกษา (อังกฤษ)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="date" class="form-control " name="SchoolEstablishedDate" required>
                  <label for="SchoolEstablishedDate">วันที่ก่อตั้ง</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="SchoolTypeCode" id="SchoolTypeCode" aria-label="SchoolTypeCode" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_TYPE');
                    foreach ($result->result() as $SCHOOL_TYPE) {
                    ?>
                      <option value="<?= $SCHOOL_TYPE->CLS_SCHOOL_TYPE_CODE; ?>"><?= $SCHOOL_TYPE->CLS_SCHOOL_TYPE_NAME; ?></option>
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
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_STATUS');
                    foreach ($result->result() as $SCHOOL_STATUS) {
                    ?>
                      <option value="<?= $SCHOOL_STATUS->CLS_SCHOOL_STATUS_CODE; ?>"><?= $SCHOOL_STATUS->CLS_SCHOOL_STATUS_NAME; ?></option>
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
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_MUNICIPAL');
                    foreach ($result->result() as $MUNICIPAL) {
                    ?>
                      <option value="<?= $MUNICIPAL->CLS_MUNICIPAL_CODE; ?>"><?= $MUNICIPAL->CLS_MUNICIPAL_NAME; ?></option>
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
                  <textarea class="form-control" name="SchoolAddressHouseRegisterID" style="height: 60px;"></textarea>
                  <label for="SchoolAddressHouseRegisterID">รหัสประจำบ้าน</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating">
                  <textarea class="form-control" name="SchoolAddressHouseNumber" style="height: 60px;" required></textarea>
                  <label for="SchoolAddressHouseNumber">บ้านเลขที่</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SchoolAddressMoo">
                    <label for="OFFICIAL_SchoolAddressMoo">หมู่ที่</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolAddressStreet">
                  <label for="SchoolAddressStreet">ถนน</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolAddressSoi">
                  <label for="SchoolAddressSoi">ซอย</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolAddressTrok">
                  <label for="SchoolAddressTrok">ตรอก</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="SchoolAddressProvinceCode" required>
                    <option selected>เลือก</option>
                    <?php
                    foreach ($ShowProvince as $PROVINCE) {
                    ?>
                      <option value="<?= $PROVINCE->CLS_PROVINCE_CODE; ?>"><?= $PROVINCE->CLS_PROVINCE_NAME; ?></option>
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
                    <option selected>เลือก</option>
                    <?php
                    foreach ($ShowDistrict as $DISTRICT) {
                    ?>
                      <option id="<?= $DISTRICT->CLS_PROVINCE_CODE; ?>" value="<?= $DISTRICT->CLS_DISTRICT_CODE; ?>"><?= $DISTRICT->CLS_DISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="SchoolAddressDistrictCode">อำเภอ</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="SchoolAddressSubdistrictCode">
                    <option selected>เลือก</option>
                    <?php
                    foreach ($ShowSubdistrict as $SUBDISTRICT) {
                    ?>
                      <option id="<?= $SUBDISTRICT->CLS_DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->CLS_SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->CLS_SUBDISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="SchoolAddressSubdistrictCode">ตำบล</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolAddressPostcode">
                  <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolLatitude">
                  <label for="SchoolLatitude">ค่าตำแหน่งพิกัดทาง Latitude</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolLongitude">
                  <label for="SchoolLongitude">ค่าตำแหน่งพิกัดทาง Longitude</label>
                </div>
              </div>
              <div class="col-md-16">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolMapURL">
                  <label for="SchoolMapURL">ลิงค์แผนที่</label>
                </div>
              </div>
              <h6 class="card-title">ข้อมูลติดต่อ</h6>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolPhoneNumber">
                  <label for="SchoolPhoneNumber">หมายเลขโทรศัพท์</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolSecondPhoneNumber">
                  <label for="SchoolSecondPhoneNumber">หมายเลขโทรศัพท์ (สำรอง)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolFaxNumber">
                  <label for="SchoolFaxNumber">หมายเลขโทรสาร</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolSecondFaxNumber">
                  <label for="SchoolSecondFaxNumber">หมายเลขโทรสาร (สำรอง)</label>
                </div>
              </div>
              <div class="col-md-16">
                <div class="form-floating">
                  <input type="email" class="form-control" name="SchoolEmail">
                  <label for="SchoolEmail">อีเมล</label>
                </div>
              </div>
              <div class="col-md-16">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolWebsiteURL">
                  <label for="SchoolWebsiteURL">เว็บไซต์</label>
                </div>
              </div>
              <div class="text-center">
                <a href="school" style="float: left;" class="btn btn-light">ยกเลิก</a>
                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                <button style="float: right;" type="submit" class="btn btn-primary">หน้าถัดไป</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>

      </div>


    </div>
  </section>

</main><!-- End #main -->