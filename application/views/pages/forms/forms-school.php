<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลสถานศึกษา</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Student</li>
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
              <form class="row g-3">
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="NAME_TH" placeholder="NAME_TH">
                    <label for="NAME_TH">ชื่อสถานศึกษา (ไทย)</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="NAME_EN" placeholder="NAME_EN">
                    <label for="NAME_EN">ชื่อสถานศึกษา (อังกฤษ)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="ESTABLISHED_DAT" placeholder="ESTABLISHED_DAT">
                      <label for="ESTABLISHED_DAT">วันที่ก่อตั้ง</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="SCHOOL_TYPE_CODE" aria-label="SCHOOL_TYPE_CODE">
                      <option selected>เลือก</option>
                      <option value="1">โรงเรียน ประเภทสามัญศึกษา</option>
                      <option value="2">โรงเรียนเอกชนสามัญ (สามัญปกติ)</option>
                    </select>
                    <label for="SCHOOL_TYPE_CODE">ประเภทสถานศึกษา</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="SCHOOL_STATUS_CODE" aria-label="SCHOOL_STATUS_CODE">
                      <option selected>เลือก</option>
                      <option value="1">ปกติ</option>
                      <option value="2">ยุบ/เลิก</option>
                      <option value="3">ถ่ายโอน</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">สถานะของสถานศึกษา</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="SCHOOL_STATUS_CODE" aria-label="SCHOOL_STATUS_CODE">
                      <option selected>เลือก</option>
                      <option value="10">กรุงเทพมหานคร</option>
                      <option value="11">เมืองพัทยา</option>
                      <option value="12">เทศบาลนคร</option>
                      <option value="13">เทศบาลเมือง</option>
                      <option value="14">เทศบาลตำบล</option>
                      <option value="15">องค์การบริหารส่วนตำบล</option>
                      <option value="16">องค์การบริหารส่วนจังหวัด</option>
                      <option value="99">ไม่อยู่ในเขตเทศบาล</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">สถานะของสถานศึกษา</label>
                  </div>
                </div>
                <div class="col-8">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="OFFICIAL_ADDRESS_HOUSE_NO" id="OFFICIAL_ADDRESS_HOUSE_NO"
                      style="height: 60px;"></textarea>
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO" placeholder="OFFICIAL_ADDRESS_MOO">
                      <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET" placeholder="OFFICIAL_ADDRESS_STREET">
                    <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI" placeholder="OFFICIAL_ADDRESS_SOI">
                    <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK" placeholder="OFFICIAL_ADDRESS_TROK">
                    <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SUBDISTRICT_CODE" placeholder="OFFICIAL_ADDRESS_SUBDISTRICT_CODE">
                    <label for="OFFICIAL_ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_DISTRICT_CODE" placeholder="OFFICIAL_ADDRESS_DISTRICT_CODE">
                    <label for="OFFICIAL_ADDRESS_DISTRICT_CODE">อำเภอ</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="OFFICIAL_ADDRESS_PROVINCE_CODE" aria-label="OFFICIAL_ADDRESS_PROVINCE_CODE">
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
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE">
                    <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="LATITUDE" placeholder="LATITUDE">
                    <label for="LATITUDE">ค่าตำแหน่งพิกัดทาง Latitude</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="LONGITUDE" placeholder="LONGITUDE">
                    <label for="LONGITUDE">ค่าตำแหน่งพิกัดทาง Longitude</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="MAP_URL" placeholder="MAP_URL">
                    <label for="MAP_URL">ลิงค์แผนที่</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="PHONE_NUMBER" placeholder="PHONE_NUMBER">
                    <label for="PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="SECOND_PHONE_NUMBER" placeholder="SECOND_PHONE_NUMBER">
                    <label for="SECOND_PHONE_NUMBER">หมายเลขโทรศัพท์ (สำรอง)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="FAX_NUMBER" placeholder="FAX_NUMBER">
                    <label for="FAX_NUMBER">หมายเลขโทรสาร</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="EMAIL" placeholder="EMAIL">
                    <label for="EMAIL">อีเมล</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="WEBSITE_URL" placeholder="WEBSITE_URL">
                    <label for="WEBSITE_URL">เว็บไซต์</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
              <br>
              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
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

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
