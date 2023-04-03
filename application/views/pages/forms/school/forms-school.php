<main id="main" class="main">
  <div class="pagetitle">
    <h1>เพิ่มข้อมูลสถานศึกษา</h1>
  </div><!-- End Page Title -->
  <?php if (!empty($_SESSION['danger'])) { ?>
    <script>
      setTimeout(function() {
        document.getElementById('myAlert').remove();
      }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
    <div style="position: relative;">
      <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
        <strong>
          <?php
          echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
          unset($_SESSION['danger']);
          ?>
        </strong>

      </div>
    </div>
  <?php } ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <!-- Floating Labels Form -->
            <form class="row g-3" action="<?php echo base_url('add-school'); ?>" method="POST" id="School" enctype="multipart/form-data">
              <div class="col-md-12">
                <h6 class="card-title"></h6>
                <div class="form-floating">
                  <select class="form-select" name="InnovationAreaCode" id="InnovationAreaCode" aria-label="InnovationAreaCode">
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_INNOVATION_AREA ');
                    foreach ($result->result() as $INNOVATION_AREA) {
                    ?>
                      <option <?php if ($INNOVATION_AREA->INNOVATION_AREA_CODE == '91') {
                                echo 'selected';
                              } ?> value="<?= $INNOVATION_AREA->INNOVATION_AREA_CODE; ?>"><?= $INNOVATION_AREA->INNOVATION_AREA_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SCHOOL_STATUS_CODE">พื้นที่นวัฒกรรมการศึกษา <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupFile01">ตราสัญลักษณ์ <font color="red"> *</font></label>
                  <input type="file" class="form-control" name="ImageSchool" id="ImageSchool" placeholder="รูปตราโรงเรียน">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control " name="SchoolNameThai" id="SchoolNameThai">
                  <label for="SchoolNameThai">ชื่อสถานศึกษา (ภาษาไทย) <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control " name="SchoolNameEnglish" id="SchoolNameEnglish">
                  <label for="SchoolNameEnglish">ชื่อสถานศึกษา (ภาษาอังกฤษ) <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="date" class="form-control " name="SchoolEstablishedDate">
                  <label for="SchoolEstablishedDate">วันที่ก่อตั้ง <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="EducationLevelCode" id="EducationLevelCode" aria-label="EducationLevelCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                    foreach ($result->result() as $EDUCATION_LEVEL) {
                    ?>
                      <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="EducationLevelCode">ระดับศึกษาที่เปิดสอน <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="SchoolTypeCode" id="SchoolTypeCode" aria-label="SchoolTypeCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_TYPE');
                    foreach ($result->result() as $SCHOOL_TYPE) {
                    ?>
                      <option value="<?= $SCHOOL_TYPE->SCHOOL_TYPE_CODE; ?>"><?= $SCHOOL_TYPE->SCHOOL_TYPE_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SchoolTypeCode">ประเภทสถานศึกษา <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="SchoolStatusCode" id="SchoolStatusCode" aria-label="SchoolStatusCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_STATUS');
                    foreach ($result->result() as $SCHOOL_STATUS) {
                    ?>
                      <option value="<?= $SCHOOL_STATUS->SCHOOL_STATUS_CODE; ?>"><?= $SCHOOL_STATUS->SCHOOL_STATUS_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SchoolStatusCode">สถานะของสถานศึกษา <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="MunicipalCode" id="MunicipalCode" aria-label="MunicipalCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_MUNICIPAL');
                    foreach ($result->result() as $MUNICIPAL) {
                    ?>
                      <option value="<?= $MUNICIPAL->MUNICIPAL_CODE; ?>"><?= $MUNICIPAL->MUNICIPAL_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SCHOOL_STATUS_CODE">ประเภทเขตการปกครอง <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                    foreach ($result->result() as $JURISDICTION) {
                    ?>
                      <option value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SCHOOL_STATUS_CODE">หน่วยงานต้นสังกัด<font color="red"> *</font></label>
                </div>
              </div>
              <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่ตั้ง</h6>
              <div class="col-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolAddressHouseNumber">
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
                  <input type="text" class="form-control" name="SchoolAddressPostcode">
                  <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" aria-label="PROVINCE" name="SchoolAddressProvinceCode" id="SchoolAddressProvinceCode">
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                    foreach ($result->result() as $PROVINCE) {
                    ?>
                      <option value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="SchoolAddressProvinceCode">จังหวัด <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="DISTRICT" name="SchoolAddressDistrictCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91');
                    foreach ($result->result() as $DISTRICT) {
                    ?>
                      <option value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="SchoolAddressDistrictCode">อำเภอ <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="SchoolAddressSubdistrictCode">
                    <option value="" selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91');
                    foreach ($result->result() as $SUBDISTRICT) {
                    ?>
                      <option id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="SchoolAddressSubdistrictCode">ตำบล <font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolLatitude" id="SchoolLatitude">
                  <label for="SchoolLatitude">ค่าตำแหน่งพิกัดทาง Latitude</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolLongitude" id="SchoolLongitude">
                  <label for="SchoolLongitude">ค่าตำแหน่งพิกัดทาง Longitude</label>
                </div>
              </div>
              <div class="col-md-16">
                <div class="form-floating">
                  <input type="text" class="form-control" name="SchoolMapURL" id="SchoolMapURL">
                  <label for="SchoolMapURL">ลิงค์แผนที่</label>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <a href="school" class="btn btn-danger">ยกเลิก</a>
                <button type="button" class="btn btn-primary" onclick="return check(School)">บันทึกข้อมูล</button>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันบันทึกข้อมูล</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h6>
                        <center>คุณต้องการบันทึกข้อมูลใช่หรือไหม ?</center>
                      </h6>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">ยืนยัน</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                  </div>
                </div>
              </div>


            </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

          </div>
        </div>

      </div>

    </div>
  </section>
  <script type="text/javascript">
    function check(frm) {

      //Check_InnovationAreaCode
      if (frm.InnovationAreaCode.value == "") {
        <?php $_SESSION['warning'] = 'กรุณาเลือกพื้นที่นวัฒกรรมการศึกษา' ?>
      }

      if (frm.ImageSchool.value == "") {
        alert("กรุณาเพิ่มรูปตราโรงเรียน");
        return false;
      } else if (!frm.ImageSchool.value == "") {
        var fty = new Array(".jpg", ".jpeg", ".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
        var a = frm.ImageTeacher.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
        var permiss = 0; // เงื่อนไขไฟล์อนุญาต
        a = a.toLowerCase();
        if (a != "") {
          for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
            if (a.lastIndexOf(fty[i]) >= 0) { // เงื่อนไขไฟล์ที่อนุญาต   
              permiss = 1;
              break;
            } else {
              continue;
            }
          }
          if (permiss == 0) {
            alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ jpg jpeg png");
            return false;
          }
        }
      }

      var NameThai = /^[ก-์]{1,255}$/;
      if (frm.SchoolNameThai.value == "") {
        alert("กรุณากรอกชื่อโรงเรียน(ภาษาไทย)");
        frm.SchoolNameThai.value = "";
        return false;
      } else if (!frm.SchoolNameThai.value.match(NameThai)) {
        alert("กรุณากรอกชื่อโรงเรียนเป็น(ภาษาไทย)และให้น้อยกว่า 255 อักษร");
        frm.SchoolNameThai.value = "";
        return false;
      }

      var NameEnglish = /^[A-Z,a-z]{1,255}$/;
      if (frm.SchoolNameEnglish.value == "") {
        alert("กรุณากรอกชื่อโรงเรียน(ภาษาอังกฤษ)");
        frm.SchoolNameEnglish.value = "";
        return false;
      } else if (!frm.SchoolNameEnglish.value.match(NameEnglish)) {
        alert("กรุณากรอกชื่อโรงเรียนเป็น(ภาษาอังกฤษ)และให้น้อยกว่า 255 อักษร");
        frm.SchoolNameEnglish.value = "";
        return false;
      }

      //SchoolEstablishedDate
      if (frm.SchoolEstablishedDate.value == "") {
        alert("กรุณาเลือกวันที่ก่อตั้ง");
        return false;
      }

      //SchoolTypeCode
      if (frm.SchoolTypeCode.value == "") {
        alert("กรุณาเลือกประเภทสถานศึกษา");
        return false;
      }

      //SchoolStatusCode
      if (frm.SchoolStatusCode.value == "") {
        alert("กรุณาเลือกสถานะของสถานศึกษา");
        return false;
      }

      //EducationLevelCode
      if (frm.EducationLevelCode.value == "") {
        alert("กรุณาเลือกระดับการศึกษาที่เปิดสอน");
        return false;
      }

      //JurisdictionCode
      if (frm.JurisdictionCode.value == "") {
        alert("กรุณาเลือกหน่วยงานต้นสังกัด");
        return false;
      }

      //MunicipalCode
      if (frm.MunicipalCode.value == "") {
        alert("กรุณาเลือกประเภทเขตปกครอง");
        return false;
      }

      //SchoolAddressProvinceCode
      if (frm.SchoolAddressProvinceCode.value == "") {
        alert("กรุณาเลือกจังหวัด");
        return false;
      }
      //SchoolAddressDistrictCode
      if (frm.DISTRICT.value == "") {
        alert("กรุณาเลือกอำเภอ");
        return false;
      } //SchoolAddressSubdistrictCode
      if (frm.SUBDISTRICT.value == "") {
        alert("กรุณาเลือกตำบล");
        return false;
      }

      $('#Modal').modal('show');

    }
  </script>

  <!-- Multiple Dropdown PROVINCE DISTRICT SUBDISTRICT -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#SUBDISTRICT").children('option:gt(0)').hide();

      $("#DISTRICT").change(function() {
        $("#SUBDISTRICT").children('option').hide();
        $("#SUBDISTRICT").children("option[ id^=" + $(this).val() + "]").show()
      })

    })
  </script>
</main><!-- End #main -->