<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลสถานศึกษา</h1>
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
              <h5 class="card-title">ข้อมูลละเอียดสถานศึกษา</h5>
              
              <!-- General Form Elements -->
              <form action="<?php echo base_url('add-school');?>" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" name="EDUCATION_YEAR" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                  <div class="col-sm-10">
                    <input type="number" name="SEMESTER" class="form-control" min="1" max="2" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">รหัสเขตพื้นที่</label>
                  <div class="col-sm-10">
                    <input type="text" name="AREA_NO" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">ชื่อเขตพื้นที่</label>
                  <div class="col-sm-10">
                    <input type="text" name="AREA_NAME" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หน่วยงานต้นสังกัด</label>
                  <div class="col-sm-10">
                    <input type="text" name="JURISDICTION_CODE" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เขตการปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" name="MUNICIPAL_CODE" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">พื้นที่นวัตกรรม</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="INNOVATION_AREA_CODE" required>
                      <option selected>เลือก</option>
                      <option value="21">ระยอง</option>
                      <option value="33">ศรีสะเกษ</option>
                      <option value="50">เชียงใหม่</option>
                      <option value="71">กาญจนบุรี</option>
                      <option value="91">สตูล</option>
                      <option value="94">ปัตตานี</option>>
                      <option value="95">ยะลา</option>>
                      <option value="96">นราธิวาส</option>>
                    </select>
                  </div>
                </div>

                <div class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0">ระดับการศึกษา</legend>
                  <div class="col-sm-10">

                    <div class="form-check" >
                      <input class="form-check-input" type="radio" id="gridCheck1" name="EDUCATION_LEVEL_CODES">
                      <label class="form-check-label" for="gridCheck1">
                        เตรียมอนุบาล
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck2" name="EDUCATION_LEVEL_CODES">
                      <label class="form-check-label" for="gridCheck2">
                        ก่อนประถมศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="EDUCATION_LEVEL_CODES">
                      <label class="form-check-label" for="gridCheck3">
                        ประถมศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="EDUCATION_LEVEL_CODES">
                      <label class="form-check-label" for="gridCheck3">
                        มัธยมศึกษาตอนต้น
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="EDUCATION_LEVEL_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        มัธยมศึกษาตอนปลาย 
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0">ประเภทแหล่งกำเนิดไฟฟ้า</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck1" name="ELECTRIC_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีไฟฟ้า
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck2" name="ELECTRIC_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck2">
                        มีไฟฟ้าจากหน่วยงานรัฐ-รัฐวิสาหกิจ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="ELECTRIC_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck3">
                        มีไฟฟ้าจากหน่วยงานรัฐ และเครื่องกำเนิดไฟฟ้า
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="ELECTRIC_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        มีไฟฟ้าจากเครื่องกำเนิดไฟฟ้าแสงอาทิตย์
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="ELECTRIC_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        มีไฟฟ้าจากเครื่องกำเนิดไฟฟ้าประเภทอื่น 
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0">แหล่งน้ำที่โรงเรียนใช้</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck1" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีแหล่งน้ำ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck2" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck2">
                        น้ำฝน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck3">
                        น้ำประปา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        น้ำบาดาล
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        บ่อน้ำตื้น
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck5" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck5">
                        สระน้ำแม่น้ำ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck6" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck6">
                        น้ำบรรจุเสร็จ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck7" name="WATER_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck7">
                        น้ำตู้หยอดเหรียญ
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0">การมีอินเทอร์เน็ต</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck1" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีการเชื่อมต่ออินเทอร์เน็ต
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck2" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck2">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วยวงจรเช่า Leased Line
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck3">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย ADSL (Broadband)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วยจานดาวเทียม
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck4">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย 3G 4G 5G WiMAX
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck5" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck5">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย Dial Line
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck6" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck6">
                        มีการเชื่อมต่ออินเทอร์เน็ตประเภทอื่นๆ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck7" name="INTERNET_TYPE_CODES">
                      <label class="form-check-label" for="gridCheck7">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย Fiber Optic
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0">การใช้สื่อการเรียนการสอน</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck1" name="EDUCATION_CONTENTS">
                      <label class="form-check-label" for="gridCheck1">
                        มีวิทยุเพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck2" name="EDUCATION_CONTENTS">
                      <label class="form-check-label" for="gridCheck2">
                        มีโทรทัศน์เพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="EDUCATION_CONTENTS">
                      <label class="form-check-label" for="gridCheck3">
                        มีคอมพิวเตอร์เพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck3" name="EDUCATION_CONTENTS">
                      <label class="form-check-label" for="gridCheck3">
                        มีระบบคอมพิวเตอร์ช่วยสอน (CAI)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="gridCheck4" name="EDUCATION_CONTENTS">
                      <label class="form-check-label" for="gridCheck4">
                        ไม่ใช้สื่อการเรียนการสอน 
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์ที่เชื่อมต่อเครือข่าย</label>
                  <div class="col-sm-9">
                    <input type=number" name="COMPUTER_ONLINE_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์ Stan alone</label>
                  <div class="col-sm-9">
                    <input type="number" name="COMPUTER_STANDALONE_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน</label>
                  <div class="col-sm-9">
                    <input type="number" name="COMPUTER_TEACH_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ</label>
                  <div class="col-sm-9">
                    <input type="number" name="COMPUTER_MANAGE_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนชาย</label>
                  <div class="col-sm-9">
                    <input type="number" name="TOILET_STUDENT_MALE_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนหญิง</label>
                  <div class="col-sm-9">
                    <input type="number" name="TOILET_STUDENT_FEMALE_NUMBER" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำทั้งหมด</label>
                  <div class="col-sm-9">
                    <input type="number" name="TOILET_COMBINATION" class="form-control">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">ยืนยัน</button>
                  <button type="reset" class="btn btn-secondary">รีเซ็ต</button>
                </div>

                <!--------------------------- input forms-school ---------------------------->
                    <input type="hidden" value="<?= $_POST['NAME_TH']; ?>" name="NAME_TH">
                    <input type="hidden" value="<?= $_POST['NAME_EN']; ?>" name="NAME_EN">
                    <input type="hidden" value="<?= $_POST['ESTABLISHED_DATE']; ?>" name="ESTABLISHED_DATE">
                    <input type="hidden" value="<?= $_POST['SCHOOL_TYPE_CODE']; ?>" name="SCHOOL_TYPE_CODE">
                    <input type="hidden" value="<?= $_POST['SCHOOL_STATUS_CODE']; ?>" name="SCHOOL_STATUS_CODE">
                    <input type="hidden" value="<?= $_POST['ADDRESS_PROVINCE_CODE']; ?>" name="ADDRESS_PROVINCE_CODE">
                    <input type="hidden" value="<?= $_POST['ADDRESS_HOUSE_NO']; ?>" name="ADDRESS_HOUSE_NO">
                    <input type="hidden" value="<?= $_POST['ADDRESS_MOO']; ?>" name="ADDRESS_MOO">
                    <input type="hidden" value="<?= $_POST['ADDRESS_STREET']; ?>" name="ADDRESS_STREET">
                    <input type="hidden" value="<?= $_POST['ADDRESS_SOI']; ?>" name="ADDRESS_SOI">
                    <input type="hidden" value="<?= $_POST['ADDRESS_TROK']; ?>" name="ADDRESS_TROK">
                    <input type="hidden" value="<?= $_POST['ADDRESS_SUBDISTRICT_CODE']; ?>" name="ADDRESS_SUBDISTRICT_CODE">
                    <input type="hidden" value="<?= $_POST['ADDRESS_DISTRICT_CODE']; ?>" name="ADDRESS_DISTRICT_CODE">
                    <input type="hidden" value="<?= $_POST['ADDRESS_PROVINCE_CODE']; ?>" name="ADDRESS_PROVINCE_CODE">
                    <input type="hidden" value="<?= $_POST['ADDRESS_POSTCODE']; ?>" name="ADDRESS_POSTCODE">
                    <input type="hidden" value="<?= $_POST['LATTITUDE']; ?>" name="LATTITUDE">
                    <input type="hidden" value="<?= $_POST['LONGITUDE']; ?>" name="LONGITUDE">
                    <input type="hidden" value="<?= $_POST['MAP_URL']; ?>" name="MAP_URL">
                    <input type="hidden" value="<?= $_POST['PHONE_NUMBER']; ?>" name="PHONE_NUMBER">
                    <input type="hidden" value="<?= $_POST['SECOND_PHONE_NUMBER']; ?>" name="SECOND_PHONE_NUMBER">
                    <input type="hidden" value="<?= $_POST['FAX_NUMBER']; ?>" name="FAX_NUMBER">
                    <input type="hidden" value="<?= $_POST['EMAIL']; ?>" name="EMAIL">
                    <input type="hidden" value="<?= $_POST['WEBSITE_URL']; ?>" name="WEBSITE_URL">
                <!------------------------ input forms-school - END  ------------------------>

              
                
            </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
