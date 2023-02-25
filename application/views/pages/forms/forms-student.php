<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลนักเรียน</h1>
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
              <h5 class="card-title">ข้อมูลทั่วไปนักเรียน</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3">
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">ชื่อ</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingMiddleName" placeholder="Middle Name">
                    <label for="floatingMiddleName">ชื่อกลาง</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingLastName" placeholder="Last Name">
                    <label for="floatingLastName">นามสกุล</label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingNameEN" placeholder="Your Name EN">
                    <label for="floatingNameEN">ชื่อ (อังกฤษ)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingMiddleNameEN" placeholder="Middle Name EN">
                    <label for="floatingMiddleNameEN">ชื่อกลาง (อังกฤษ)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingLastNameEN" placeholder="Last Name EN">
                    <label for="floatingLastNameEN">นามสกุล (อังกฤษ)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="State">
                      <option selected>เลือก</option>
                      <option value="1">ชาย</option>
                      <option value="2">หญิง</option>
                    </select>
                    <label for="floatingSelect">เพศ</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="BIRTH_DAT" placeholder="BIRTH_DAT">
                      <label for="BIRTH_DAT">วันเกิด</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="BIRTH_PROVINCE_CODE" aria-label="BIRTH_PROVINCE_CODE">
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
                    <label for="BIRTH_PROVINCE_CODE">จังหวัดที่เกิด</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="NATIONALITY_CODE" placeholder="NATIONALITY_CODE">
                      <label for="NATIONALITY_CODE">สัญชาติ</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="RACE_CODE" placeholder="RACE_CODE">
                      <label for="RACE_CODE">เชื้อชาติ</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="RELIGION_CODE" aria-label="RELIGION_CODE">
                      <option selected>ไม่ระบุ</option>
                      <option value="01">พุทธ</option>
                      <option value="02">คริสต์</option>
                      <option value="03">อิสลาม</option>
                      <option value="04">ฮินดู</option>
                      <option value="05">ซิกข์</option>
                      <option value="06">ยิว หรือ ยูดาห์ หรือยูดาย</option>
                      <option value="07">ชินโต</option>
                      <option value="08">บาไฮ</option>
                      <option value="09">เชน</option>
                    </select>
                    <label for="RELIGION_CODE">ศาสนา</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="LANGUAGE_CODE" placeholder="LANGUAGE_CODE">
                      <label for="LANGUAGE_CODE">ภาษาหลัก</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="OTHER_LANGUAGE_CODE" placeholder="OTHER_LANGUAGE_CODE">
                      <label for="OTHER_LANGUAGE_CODE">ภาษาอื่น</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="BLOOD_CODE" aria-label="BLOOD_CODE">
                      <option selected>ไม่ระบุ</option>
                      <option value="A">กลุ่มเลือด A</option>
                      <option value="B">กลุ่มเลือด B</option>
                      <option value="AB">กลุ่มเลือด AB</option>
                      <option value="O">กลุ่มเลือด O</option>
                      <option value="AB Rh-">กลุ่มเลือด AB Rh-</option>
                    </select>
                    <label for="BLOOD_CODE">กลุ่มเลือด</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="WEIGHT" placeholder="WEIGHT">
                      <label for="WEIGHT">น้ำหนัก</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="HEIGHT" placeholder="HEIGHT">
                      <label for="HEIGHT">ส่วนสูง</label>
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="OFFICIAL_ADDRESS_HOUSE_NO" id="OFFICIAL_ADDRESS_HOUSE_NO"
                      style="height: 60px;"></textarea>
                    <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่(ตามทะเบียนบ้าน)</label>
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
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE" placeholder="OFFICIAL_ADDRESS_POSTCODE">
                    <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER" placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER">
                    <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                  </div>
                </div> <hr>
                <!-- end OFFICIAL_ADDRESS_HOUSE -->
                <div class="col-8">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="CURRENT_ADDRESS_HOUSE_NO" id="CURRENT_ADDRESS_HOUSE_NO"
                      style="height: 60px;"></textarea>
                    <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่(ปัจจุบัน)</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO" placeholder="CURRENT_ADDRESS_MOO">
                      <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET" placeholder="CURRENT_ADDRESS_STREET">
                    <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI" placeholder="CURRENT_ADDRESS_SOI">
                    <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK" placeholder="CURRENT_ADDRESS_TROK">
                    <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_SUBDISTRICT_CODE" placeholder="CURRENT_ADDRESS_SUBDISTRICT_CODE">
                    <label for="CURRENT_ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_DISTRICT_CODE" placeholder="CURRENTL_ADDRESS_DISTRICT_CODE">
                    <label for="CURRENT_ADDRESS_DISTRICT_CODE">อำเภอ</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="CURRENT_ADDRESS_PROVINCE_CODE" aria-label="CURRENT_ADDRESS_PROVINCE_CODE">
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
                    <label for="CURRENT_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE" placeholder="CURRENT_ADDRESS_POSTCODE">
                    <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="CURRENT_ADDRESS_PHONE_NUMBER" placeholder="CURRENT_ADDRESS_PHONE_NUMBER">
                    <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
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
                  <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>คำนำหน้าชื่อ</option>
                      <option value="1">เด็กชาย</option>
                      <option value="2">เด็กหญิง</option>
                      <option value="3">นาย</option>
                      <option value="4">นางสาว</option>
                      <option value="5">นาง</option>
                      <option value="5">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">หมายเลขประจำตัวนักเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
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
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวนักเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สถานะภาพนักเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>สถานะภาพ</option>
                      <option value="1">กำลังเรียน</option>
                      <option value="2">พักการเรียน</option>
                      <option value="3">เสียชีวิต</option>
                      <option value="4">อยู่ระหว่างดำเนินการติดตาม</option>
                      <option value="5">ลาออก</option>
                      <option value="6">พ้นสภาพ</option>
                      <option value="7">สำเร็จการศึกษา</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>ประเภทบัตรประจำตัว</option>
                      <option value="1">บัตรประจำตัวประชาชน</option>
                      <option value="2">บัตรอื่นๆ</option>
                      <option value="3">ไม่มีบัตรอะไรเลย</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัว</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทาง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div> 

                <h5 class="card-title">ข้อมูลบิดา</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>ประเภทบัตรประจำตัว</option>
                      <option value="1">บัตรประจำตัวประชาชน</option>
                      <option value="2">บัตรอื่นๆ</option>
                      <option value="3">ไม่มีบัตรอะไรเลย</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">คำนำหน้าชื่อบิดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>คำนำหน้าชื่อ</option>
                      <option value="3">นาย</option>
                      <option value="4">นางสาว</option>
                      <option value="5">นาง</option>
                      <option value="5">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อบิดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางบิดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลบิดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สถานภาพของบิดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>สถานะภาพ</option>
                      <option value="14">สาปสูญ</option>
                      <option value="15">เสียชีวิต</option>
                      <option value="16">ยังมีชีวิตอยู่</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มอาชีพของบิดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="0">ไม่ได้ประกอบอาชีพ</option>
                      <option value="1">รับราชการ</option>
                      <option value="2">พนักงานรัฐวิสาหกิจ</option>
                      <option value="3">นักธุรกิจ-ค้าขาย</option>
                      <option value="4">เกษตรกรรม</option>
                      <option value="5">รับจ้าง</option>
                      <option value="6">พนักงาน/เจ้าหน้าที่รัฐ/ลูกจ้างประจำ/ลูกจ้างชั่วคราว</option>
                      <option value="7">ข้าราชการ/พนักงานของรัฐเกษียณ</option>
                      <option value="8">พระ/นักบวช</option>
                      <option value="99">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของบิดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                 <!-- end ข้อมูลบิดา ---------->

                <h5 class="card-title">ข้อมูลมารดา</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวมารดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>ประเภทบัตรประจำตัว</option>
                      <option value="1">บัตรประจำตัวประชาชน</option>
                      <option value="2">บัตรอื่นๆ</option>
                      <option value="3">ไม่มีบัตรอะไรเลย</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">คำนำหน้าชื่อมารดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>คำนำหน้าชื่อ</option>
                      <option value="3">นาย</option>
                      <option value="4">นางสาว</option>
                      <option value="5">นาง</option>
                      <option value="5">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อมารดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางมารดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลมารดา(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สถานภาพของมารดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>สถานะภาพ</option>
                      <option value="14">สาปสูญ</option>
                      <option value="15">เสียชีวิต</option>
                      <option value="16">ยังมีชีวิตอยู่</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มอาชีพของมารดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="0">ไม่ได้ประกอบอาชีพ</option>
                      <option value="1">รับราชการ</option>
                      <option value="2">พนักงานรัฐวิสาหกิจ</option>
                      <option value="3">นักธุรกิจ-ค้าขาย</option>
                      <option value="4">เกษตรกรรม</option>
                      <option value="5">รับจ้าง</option>
                      <option value="6">พนักงาน/เจ้าหน้าที่รัฐ/ลูกจ้างประจำ/ลูกจ้างชั่วคราว</option>
                      <option value="7">ข้าราชการ/พนักงานของรัฐเกษียณ</option>
                      <option value="8">พระ/นักบวช</option>
                      <option value="99">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของมารดา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <!-- end ข้อมูลมารดา -->

                <h5 class="card-title">ข้อมูลผู้ปกครอง</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัวผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>ประเภทบัตรประจำตัว</option>
                      <option value="1">บัตรประจำตัวประชาชน</option>
                      <option value="2">บัตรอื่นๆ</option>
                      <option value="3">ไม่มีบัตรอะไรเลย</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัวผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทางผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">คำนำหน้าชื่อผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>คำนำหน้าชื่อ</option>
                      <option value="3">นาย</option>
                      <option value="4">นางสาว</option>
                      <option value="5">นาง</option>
                      <option value="5">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลางผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อผู้ปกครอง(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">นามสกุลผู้ปกครอง(ภาษาอังกฤษ)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ความสัมพันธ์ของผู้ปกครองกับนักเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">พ่อ</option>
                      <option value="02">แม่</option>
                      <option value="03">ปู่</option>
                      <option value="04">ย่า</option>
                      <option value="05">ตา</option>
                      <option value="06">ยาย</option>
                      <option value="07">ลุง</option>
                      <option value="08">ป้า</option>
                      <option value="09">น้า</option>
                      <option value="10">อา</option>
                      <option value="11">ญาติ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์ของผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มอาชีพของผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="0">ไม่ได้ประกอบอาชีพ</option>
                      <option value="1">รับราชการ</option>
                      <option value="2">พนักงานรัฐวิสาหกิจ</option>
                      <option value="3">นักธุรกิจ-ค้าขาย</option>
                      <option value="4">เกษตรกรรม</option>
                      <option value="5">รับจ้าง</option>
                      <option value="6">พนักงาน/เจ้าหน้าที่รัฐ/ลูกจ้างประจำ/ลูกจ้างชั่วคราว</option>
                      <option value="7">ข้าราชการ/พนักงานของรัฐเกษียณ</option>
                      <option value="8">พระ/นักบวช</option>
                      <option value="99">อื่นๆ</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายได้ต่อเดือนของผู้ปกครอง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สถานการณ์สมรสระหว่างบิดามารดา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">โสด</option>
                      <option value="02">สมรส</option>
                      <option value="03">หย่า</option>
                      <option value="04">หม้าย</option>
                      <option value="05">สมรสไม่จดทะเบีย</option>
                      <option value="06">ไม่ระบุ</option>>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เป็นบุตรลำดับที่</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนพี่ชาย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนพี่สาว</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนน้องชาย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนน้องสาว</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">เตรียมอนุบาล</option>
                      <option value="02">ก่อนประถมศึกษา</option>
                      <option value="03">ประถมศึกษา</option>
                      <option value="04">มัธยมศึกษาตอนต้น</option>
                      <option value="05">มัธยมศึกษาตอนปลาย</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ชั้นเรียน</label>
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
                  <label for="inputText" class="col-sm-2 col-form-label">ห้องเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">เรียนหลักสูตรทวิศึกษา</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0"
                        checked>
                      <label class="form-check-label" for="gridRadios1">
                        ไม่ได้เรียน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                      <label class="form-check-label" for="gridRadios2">
                        เรียน
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทการเดินทางมาโรงเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">เดินเท้า</option>
                      <option value="02">พาหนะไม่เสียค่าโดยสาร</option>
                      <option value="03">พาหนะเสียค่าโดยสาร</option>
                      <option value="04">จักรยานยืมเรียน</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ระยะเวลาการเดินทางจากบ้านมาโรงเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลูกรัง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลาดยาง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านทางน้ำ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ความพิการ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="99">ไม่พิการ</option>
                      <option value="10">ความพิการทางการมองเห็น</option>
                      <option value="11">ความพิการทางการได้ยิน</option>
                      <option value="12">ความพิการทางสติปัญญ</option>
                      <option value="13">ความพิการร่างกาย,สุขภาพ</option>
                      <option value="14">ความพิการทางการเรียนรู้</option>
                      <option value="15">ความพิการทางการพูด,ภาษา</option>
                      <option value="16">ความพิการทางพฤติกรรมและอารมณ์</option>
                      <option value="17">ความพิการทางออทิสติก</option>
                      <option value="18">ความพิการซ้ำซ้อน</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายละเอียดความพิการ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ระดับความพิการ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">บกพร่องทางการมองเห็น (บอด)</option>
                      <option value="02">บกพร่องทางการได้ยิน (หูหนวก)</option>
                      <option value="03">บกพร่องทางสิตปัญญา</option>
                      <option value="04">บกพร่องทางร่างกายหรือสุขภาพ</option>
                      <option value="05">บกพร่องทางการเรียนรู้</option>
                      <option value="06">บกพร่องทางการพูดและภาษา</option>
                      <option value="07">บกพร่องทางพฤติกรรมหรืออารมณ์</option>
                      <option value="08">ออทิสติก</option>
                      <option value="09">ความพิการซ้ำซ้อน</option>
                      <option value="10">บกพร่องทางการได้ยิน (หูตึง)</option>
                      <option value="11">บกพร่องทางการเห็นฯ (เลือนลาง)</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ความพิการ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="99">ไม่ด้อยโอกาส</option>
                      <option value="10">เด็กถูกบังคับให้ขายแรงงาน</option>
                      <option value="11">เด็กที่อยู่ในธุรกิจทางเพศ</option>
                      <option value="12">เด็กถูกทอดทิ้ง</option>
                      <option value="13">เด็กในสถานพินิจและคุ้มครองเด็กเยาวชน</option>
                      <option value="14">เด็กเร่ร่อน</option>
                      <option value="15">ผลกระทบจากเอดส์</option>
                      <option value="16">ชนกลุ่มน้อย</option>
                      <option value="17">เด็กที่ถูกทำร้ายทารุณ</option>
                      <option value="18">เด็กยากจน</option>
                      <option value="18">เด็กมีปัญหาเกี่ยวกับยาเสพติด</option>
                    </select>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนแบบเรียน</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0"
                        checked>
                      <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
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
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0"
                        checked>
                      <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
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
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0"
                        checked>
                      <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
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
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0"
                        checked>
                      <label class="form-check-label" for="gridRadios1">
                        ไม่ขาดแคลน
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                      <label class="form-check-label" for="gridRadios2">
                        ขาดแคลน
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายครอบครัวต่อเดือน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สถานภาพครอบครัว</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">พ่อแม่อยู่ด้วยกัน</option>
                      <option value="02">พ่อแม่แยกกันอยู่</option>
                      <option value="03">พ่อแม่หย่าร้าง</option>
                      <option value="04">พ่อเสียชีวิต/สาบสูญ</option>
                      <option value="05">แม่เสียชีวิต/สาบสูญ</option>
                      <option value="06">เสียชีวิตทั้งคู่/สาปสูญ</option>
                      <option value="07">พ่อ/แม่ทอดทิ้ง</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">นักเรียนอาศัยอยู่กับ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>เลือก</option>
                      <option value="01">พ่อ/แม่</option>
                      <option value="02">ญาติ</option>
                      <option value="03">อยู่ลำพัง</option>
                      <option value="04">ผู้อุปการะ/นายจ้าง</option>
                      <option value="05">ครัวเรือนสถาบัน</option>
                    </select>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">ได้สวัสดิการแห่งรัฐ</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0">
                      <label class="form-check-label" for="gridRadios1">
                        ไม่มี
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                      <label class="form-check-label" for="gridRadios2">
                        มี
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
