<main id="main" class="main">

    <div class="pagetitle">
      <h1>เพิ่มข้อมูลสถานศึกษา</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลทั่วไปสถานศึกษา</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="<?php echo base_url('forms-school-detail');?>" method="POST">
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="NAME_TH" id="NAME_TH" placeholder="NAME_TH" required>
                    <label for="NAME_TH">ชื่อสถานศึกษา (ไทย)</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="NAME_EN" id="NAME_EN" placeholder="NAME_EN" required>
                    <label for="NAME_EN">ชื่อสถานศึกษา (อังกฤษ)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="ESTABLISHED_DATE" id="ESTABLISHED_DATE" placeholder="ESTABLISHED_DATE" required>
                      <label for="ESTABLISHED_DATE">วันที่ก่อตั้ง</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" name="SCHOOL_TYPE_CODE" id="SCHOOL_TYPE_CODE" aria-label="SCHOOL_TYPE_CODE" required>
                      <option selected>เลือก</option>
                      <option value="1">โรงเรียน ประเภทสามัญศึกษา</option>
                      <option value="2">โรงเรียนเอกชนสามัญ (สามัญปกติ)</option>
                    </select>
                    <label for="SCHOOL_TYPE_CODE">ประเภทสถานศึกษา</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" name="SCHOOL_STATUS_CODE" id="SCHOOL_STATUS_CODE" aria-label="SCHOOL_STATUS_CODE" required>
                      <option selected>เลือก</option>
                      <option value="1">ปกติ</option>
                      <option value="2">ยุบ/เลิก</option>
                      <option value="3">ถ่ายโอน</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">สถานะของสถานศึกษา</label>
                  </div>
                </div>
                <div class="col-8">
                  <div class="form-floating">
                    <textarea class="form-control" name="ADDRESS_HOUSE_NO" placeholder="ADDRESS_HOUSE_NO" id="ADDRESS_HOUSE_NO" style="height: 60px;" required></textarea>
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="ADDRESS_MOO" id="ADDRESS_MOO" placeholder="ADDRESS_MOO" required>
                      <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_STREET" id="ADDRESS_STREET" placeholder="ADDRESS_STREET" required>
                    <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_SOI" id="ADDRESS_SOI" placeholder="ADDRESS_SOI" required>
                    <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_TROK" id="ADDRESS_TROK" placeholder="ADDRESS_TROK" required>
                    <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_SUBDISTRICT_CODE" id="ADDRESS_SUBDISTRICT_CODE" placeholder="ADDRESS_SUBDISTRICT_CODE" required>
                    <label for="OFFICIAL_ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_DISTRICT_CODE" id="ADDRESS_DISTRICT_CODE" placeholder="ADDRESS_DISTRICT_CODE" required>
                    <label for="OFFICIAL_ADDRESS_DISTRICT_CODE">อำเภอ</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" name="ADDRESS_PROVINCE_CODE" id="ADDRESS_PROVINCE_CODE" aria-label="ADDRESS_PROVINCE_CODE" required>
                      <option selected>เลือก</option>
                      <option value="10">กรุงเทพมหานคร</option>
                      <option value="11">สมุทรปราการ</option>
                      <option value="12">นนทบุรี</option>
                      <option value="13">ปทุมธานี</option>
                      <option value="14">พระนครศรีอยุธยา</option>
                      <option value="15">อ่างทอง</option>
                      <option value="16">ลพบุรี</option>
                      <option value="17">สิงห์บุรี</option>
                      <option value="18">ชัยนาท</option>
                      <option value="19">สระบุรี</option>
                      <option value="20">ชลบุรี</option>
                      <option value="21">ระยอง</option>
                      <option value="22">จันทบุรี</option>
                      <option value="23">ตราด</option>
                      <option value="24">ฉะเชิงเทรา</option>
                      <option value="25">ปราจีนบุรี</option>
                      <option value="26">นครนายก</option>
                      <option value="27">สระแก้ว</option>
                      <option value="30">นครราชสีมา</option>
                      <option value="31">บุรีรัมย์</option>
                      <option value="32">สุรินทร์</option>
                      <option value="33">ศรีสะเกษ</option>
                      <option value="34">อุบลราชธานี</option>
                      <option value="35">ยโสธร</option>
                      <option value="36">ชัยภูมิ</option>
                      <option value="37">อำนาจเจริญ</option>
                      <option value="38">บึงกาฬ</option>
                      <option value="39">หนองบัวลำภู</option>
                      <option value="40">ขอนแก่น</option>
                      <option value="41">อุดรธานี</option>
                      <option value="42">เลย</option>
                      <option value="43">หนองคาย</option>
                      <option value="44">มหาสารคาม</option>
                      <option value="45">ร้อยเอ็ด</option>
                      <option value="46">กาฬสินธุ์</option>
                      <option value="47">สกลนคร</option>
                      <option value="48">นครพนม</option>
                      <option value="49">มุกดาหาร</option>
                      <option value="50">เชียงใหม่</option>
                      <option value="51">ลำพูน</option>
                      <option value="52">ลำปาง</option>
                      <option value="53">อุตรดิตถ์</option>
                      <option value="54">แพร่</option>
                      <option value="55">น่าน</option>
                      <option value="56">พะเยา</option>
                      <option value="57">เชียงราย</option>
                      <option value="58">แม่ฮ่องสอน</option>
                      <option value="60">นครสวรรค์</option>
                      <option value="61">อุทัยธานี</option>
                      <option value="62">กำแพงเพชร</option>
                      <option value="63">ตาก</option>
                      <option value="64">สุโขทัย</option>
                      <option value="65">พิษณุโลก</option>
                      <option value="66">พิจิตร</option>
                      <option value="67">เพชรบูรณ์</option>
                      <option value="70">ราชบุรี</option>
                      <option value="71">กาญจนบุรี</option>
                      <option value="72">สุพรรณบุรี</option>
                      <option value="73">นครปฐม</option>
                      <option value="74">สมุทรสาคร</option>
                      <option value="75">สมุทรสงคราม</option>
                      <option value="76">เพชรบุรี</option>
                      <option value="77">ประจวบคีรีขันธ์</option>
                      <option value="80">นครศรีธรรมราช</option>
                      <option value="81">กระบี่</option>
                      <option value="82">พังงา</option>
                      <option value="83">ภูเก็ต</option>
                      <option value="84">สุราษฎร์ธานี</option>
                      <option value="85">ระนอง</option>
                      <option value="86">ชุมพร</option>
                      <option value="90">สงขลา</option>
                      <option value="91">สตูล</option>
                      <option value="92">ตรัง</option>
                      <option value="93">พัทลุง</option>
                      <option value="94">ปัตตานี</option>
                      <option value="95">ยะลา</option>
                      <option value="96">นราธิวาส</option>
                    </select>
                    <label for="OFFICIAL_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ADDRESS_POSTCODE" id="ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE" required>
                    <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="LATTITUDE" id="LATTITUDE" placeholder="LATTITUDE" required>
                    <label for="LATTITUDE">ค่าตำแหน่งพิกัดทาง Latitude</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="LONGITUDE" id="LONGITUDE" placeholder="LONGITUDE" required>
                    <label for="LONGITUDE">ค่าตำแหน่งพิกัดทาง Longitude</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="MAP_URL" id="MAP_URL" placeholder="MAP_URL" required>
                    <label for="MAP_URL">ลิงค์แผนที่</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PHONE_NUMBER" id="PHONE_NUMBER" placeholder="PHONE_NUMBER" required>
                    <label for="PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SECOND_PHONE_NUMBER" id="SECOND_PHONE_NUMBER" placeholder="SECOND_PHONE_NUMBER">
                    <label for="SECOND_PHONE_NUMBER">หมายเลขโทรศัพท์ (สำรอง)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="FAX_NUMBER" id="FAX_NUMBER" placeholder="FAX_NUMBER" required>
                    <label for="FAX_NUMBER">หมายเลขโทรสาร</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SECOND_FAX_NUMBER" id="SECOND_FAX_NUMBER" placeholder="SECOND_FAX_NUMBER">
                    <label for="FAX_NUMBER">หมายเลขโทรสาร (สำรอง)</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" required>
                    <label for="EMAIL">อีเมล</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="WEBSITE_URL" id="WEBSITE_URL" placeholder="WEBSITE_URL" required>
                    <label for="WEBSITE_URL">เว็บไซต์</label>
                  </div>
                </div>
                <div class="text-center">
                  <a href="school" style="float: left;" class="btn btn-light">ยกเลิก</a>
                  <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                  <button style="float: right;"type="submit" class="btn btn-primary">หน้าถัดไป</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
