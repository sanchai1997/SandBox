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
            <form class="row g-3" action="<?php echo base_url('forms-student-school'); ?>" method="POST">
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
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control">
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
                  <textarea class="form-control" placeholder="OFFICIAL_ADDRESS_HOUSE_NO" id="OFFICIAL_ADDRESS_HOUSE_NO" style="height: 60px;"></textarea>
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
              </div>
              <hr>
              <!-- end OFFICIAL_ADDRESS_HOUSE -->
              <div class="col-8">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="CURRENT_ADDRESS_HOUSE_NO" id="CURRENT_ADDRESS_HOUSE_NO" style="height: 60px;"></textarea>
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
                <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                <button style="float: right;" type="submit" class="btn btn-primary">หน้าถัดไป</button>
              </div>
            </form><!-- End floating Labels Form -->
            <br>

          </div>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->