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
                    <input type="text" name="EDUCATION_YEAR" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รหัสเขตพื้นที่</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อเขตพื้นที่</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หน่วยงานต้นสังกัด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">พื้นที่นวัตกรรม</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
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

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        เตรียมอนุบาล
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        ก่อนประถมศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        ประถมศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        มัธยมศึกษาตอนต้น
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
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
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีไฟฟ้า
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        มีไฟฟ้าจากหน่วยงานรัฐ-รัฐวิสาหกิจ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        มีไฟฟ้าจากหน่วยงานรัฐ และเครื่องกำเนิดไฟฟ้า
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        มีไฟฟ้าจากเครื่องกำเนิดไฟฟ้าแสงอาทิตย์
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
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
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีแหล่งน้ำ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        น้ำฝน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        น้ำประปา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        น้ำบาดาล
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        บ่อน้ำตื้น
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck5">
                      <label class="form-check-label" for="gridCheck5">
                        สระน้ำแม่น้ำ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck6">
                      <label class="form-check-label" for="gridCheck6">
                        น้ำบรรจุเสร็จ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck7">
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
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        ไม่มีการเชื่อมต่ออินเทอร์เน็ต
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วยวงจรเช่า Leased Line
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย ADSL (Broadband)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วยจานดาวเทียม
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย 3G 4G 5G WiMAX
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck5">
                      <label class="form-check-label" for="gridCheck5">
                        มีการเชื่อมต่ออินเทอร์เน็ตด้วย Dial Line
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck6">
                      <label class="form-check-label" for="gridCheck6">
                        มีการเชื่อมต่ออินเทอร์เน็ตประเภทอื่นๆ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck7">
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
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        มีวิทยุเพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        มีโทรทัศน์เพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        มีคอมพิวเตอร์เพื่อการศึกษา
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3">
                      <label class="form-check-label" for="gridCheck3">
                        มีระบบคอมพิวเตอร์ช่วยสอน (CAI)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck4">
                      <label class="form-check-label" for="gridCheck4">
                        ไม่ใช้สื่อการเรียนการสอน 
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนเครื่องคอมพิวเตอรnที่เชื่อมต่อเครือข่าย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนเครื่องคอมพิวเตอร์ Stan alone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนชาย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนหญิง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องน้ำทั้งหมด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <h5 class="card-title">ข้อมูลจำนวนห้องเรียนของสถานศึกษา</h5>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ระดับชั้นปี</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="100">เตรียมอนุบาล</option>
                      <option value="111">อนุบาล 1(หลักสูตร 3 ปีของ สช.)/อนุบาล 3 ขวบ</option>
                      <option value="112">อนุบาล 2(หลักสูตร 3 ปีของ สช.)/อนุบาล 1</option>
                      <option value="113">อนุบาล 3(หลักสูตร 3 ปีของ สช.)/อนุบาล 2</option>
                      <option value="114">เด็กเล็ก</option>
                      <option value="211">ประถมศึกษาปีที่ 1/เกรด 1</option>
                      <option value="212">ประถมศึกษาปีที่ 2/เกรด 2</option>
                      <option value="213">ประถมศึกษาปีที่ 3/เกรด 3</option>
                      <option value="214">ประถมศึกษาปีที่ 4/เกรด 4</option>
                      <option value="215">ประถมศึกษาปีที่ 5/เกรด 5</option>
                      <option value="216">ประถมศึกษาปีที่ 6/เกรด 6</option>
                      <option value="217">กศน.ประถมศึกษา (ป.6)</option>
                      <option value="311">มัธยมศึกษาปีที่ 1 /เกรด 7/ นาฎศิลป์ชั้นที่ 1</option>
                      <option value="312">มัธยมศึกษาปีที่ 2 /เกรด 8/ นาฎศิลป์ชั้นที่ 2</option>
                      <option value="313">มัธยมศึกษาปีที่ 3 /เกรด 9/ นาฎศิลป์ชั้นที่ 3</option>
                      <option value="414">กศน.มัธยมศึกษาตอนต้น (ม.3)</option>
                      <option value="411">มัธยมศึกษาปีที่ 4/เกรด10/เตรียมทหารชั้นปีที่ 1</option>
                      <option value="412">มัธยมศึกษาปีที่ 5/เกรด11/เตรียมทหารชั้นปีที่ 2</option>
                      <option value="413">มัธยมศึกษาปีที่ 6/เกรด12/เตรียมทหารชั้นปีที่ 3</option>
                      <option value="314">กศน.มัธยมศึกษาตอนปลาย (ม.6)</option>
                    </select>
                  </div>
                </div>
                 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <h5 class="card-title">ข้อมูลผู้รางวัลที่โรงเรียนได้รับ</h5>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีที่ได้รับรางวัล</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อรางวัล</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">แหล่งที่มาของรางวัล</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ระดับของรางวัลที่ได้รับ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">ระดับประเทศ</option>
                      <option value="02">ระดับภาค</option>
                      <option value="03">ระดับจังหวัด</option>
                      <option value="04">ระดับอำเภอ</option>
                      <option value="05">ระดับตำบล</option>
                      <option value="06">ระดับเขตพื้นที่การศึกษา</option>
                    </select>
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
