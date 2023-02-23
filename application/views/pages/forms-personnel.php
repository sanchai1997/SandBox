   <main id="main" class="main">

        <div class="pagetitle">
            <h1>ข้อมูลบุคลากรอื่น</h1>
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
                            <h5 class="card-title">ข้อมูลทั่วไปข้อมูลบุคลากรอื่น</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="State">
                                            <option selected>เลือก</option>
                                            <option value="3">นาย</option>
                                            <option value="4">นางสาว</option>
                                            <option value="5">นาง</option>
                                        </select>
                                        <label for="floatingSelect">คำนำหน้าชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="Your Name">
                                        <label for="floatingName">ชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleName"
                                            placeholder="Middle Name">
                                        <label for="floatingMiddleName">ชื่อกลาง</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastName"
                                            placeholder="Last Name">
                                        <label for="floatingLastName">นามสกุล</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingNameEN"
                                            placeholder="Your Name EN">
                                        <label for="floatingNameEN">ชื่อ (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingMiddleNameEN"
                                            placeholder="Middle Name EN">
                                        <label for="floatingMiddleNameEN">ชื่อกลาง (อังกฤษ)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingLastNameEN"
                                            placeholder="Last Name EN">
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
                                            <input type="date" class="form-control" id="BIRTH_DAT"
                                                placeholder="BIRTH_DAT">
                                            <label for="BIRTH_DAT">วันเกิด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="NATIONALITY_CODE"
                                                placeholder="NATIONALITY_CODE">
                                            <label for="NATIONALITY_CODE">สัญชาติ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="RACE_CODE"
                                                placeholder="RACE_CODE">
                                            <label for="RACE_CODE">เชื้อชาติ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
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
                                <div class="col-md-5">
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
                                <div class="col-8">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="OFFICIAL_ADDRESS_HOUSE_NO"
                                            id="OFFICIAL_ADDRESS_HOUSE_NO" style="height: 60px;"></textarea>
                                        <label for="OFFICIAL_ADDRESS_HOUSE_NO">บ้านเลขที่(ตามทะเบียนบ้าน)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="OFFICIAL_ADDRESS_MOO"
                                                placeholder="OFFICIAL_ADDRESS_MOO">
                                            <label for="OFFICIAL_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_STREET"
                                            placeholder="OFFICIAL_ADDRESS_STREET">
                                        <label for="OFFICIAL_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SOI"
                                            placeholder="OFFICIAL_ADDRESS_SOI">
                                        <label for="OFFICIAL_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_TROK"
                                            placeholder="OFFICIAL_ADDRESS_TROK">
                                        <label for="OFFICIAL_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_SUBDISTRICT_CODE"
                                            placeholder="OFFICIAL_ADDRESS_SUBDISTRICT_CODE">
                                        <label for="OFFICIAL_ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_DISTRICT_CODE"
                                            placeholder="OFFICIAL_ADDRESS_DISTRICT_CODE">
                                        <label for="OFFICIAL_ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="OFFICIAL_ADDRESS_PROVINCE_CODE"
                                            aria-label="OFFICIAL_ADDRESS_PROVINCE_CODE">
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
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_POSTCODE"
                                            placeholder="OFFICIAL_ADDRESS_POSTCODE">
                                        <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="OFFICIAL_ADDRESS_PHONE_NUMBER"
                                            placeholder="OFFICIAL_ADDRESS_PHONE_NUMBER">
                                        <label for="OFFICIAL_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <hr>
                                <!-- end OFFICIAL_ADDRESS_HOUSE -->
                                <div class="col-8">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="CURRENT_ADDRESS_HOUSE_NO"
                                            id="CURRENT_ADDRESS_HOUSE_NO" style="height: 60px;"></textarea>
                                        <label for="CURRENT_ADDRESS_HOUSE_NO">บ้านเลขที่(ปัจจุบัน)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CURRENT_ADDRESS_MOO"
                                                placeholder="CURRENT_ADDRESS_MOO">
                                            <label for="CURRENT_ADDRESS_MOO">หมู่ที่</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_STREET"
                                            placeholder="CURRENT_ADDRESS_STREET">
                                        <label for="CURRENT_ADDRESS_STREET">ถนน</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_SOI"
                                            placeholder="CURRENT_ADDRESS_SOI">
                                        <label for="CURRENT_ADDRESS_SOI">ซอย</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_TROK"
                                            placeholder="CURRENT_ADDRESS_TROK">
                                        <label for="CURRENT_ADDRESS_TROK">ตรอก</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_SUBDISTRICT_CODE"
                                            placeholder="CURRENT_ADDRESS_SUBDISTRICT_CODE">
                                        <label for="CURRENT_ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_DISTRICT_CODE"
                                            placeholder="CURRENTL_ADDRESS_DISTRICT_CODE">
                                        <label for="CURRENT_ADDRESS_DISTRICT_CODE">อำเภอ</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="CURRENT_ADDRESS_PROVINCE_CODE"
                                            aria-label="CURRENT_ADDRESS_PROVINCE_CODE">
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
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_POSTCODE"
                                            placeholder="CURRENT_ADDRESS_POSTCODE">
                                        <label for="CURRENT_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="CURRENT_ADDRESS_PHONE_NUMBER"
                                            placeholder="CURRENT_ADDRESS_PHONE_NUMBER">
                                        <label for="CURRENT_ADDRESS_PHONE_NUMBER">หมายเลขโทรศัพท์</label>
                                    </div>
                                </div>
                                <div class="col-md-16">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="EMAIL" placeholder="EMAIL">
                                        <label for="EMAIL">อีเมล</label>
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
                                    <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
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

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">สถานะปฏิบัติราชการ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="0">ไม่ได้ปฏิบัติราชการ</option>
                                            <option value="1">ยังคงปฏิบัติรายการ</option>
                                            <option value="2">ช่วยราชการ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่บรรจุ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันเกษียณ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทบุคลากร</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="10">ข้าราชการครู</option>
                                            <option value="11">ข้าราชการพลเรือนสามัญ</option>
                                            <option value="12">ข้าราชการพลเรือนในสถาบันอุดมศึกษา</option>
                                            <option value="13">พนักงานของรัฐ</option>
                                            <option value="14">พนักงานเจ้าหน้าที่</option>
                                            <option value="15">ลูกจ้างประจำ</option>
                                            <option value="16">อัตราจ้าง</option>
                                            <option value="17">ลูกจ้างชั่วคราว</option>
                                            <option value="18">ข้าราชการทหาร</option>
                                            <option value="19">ข้าราชการตำรวจ</option>
                                            <option value="20">ประเภทภูมิปัญญา</option>
                                            <option value="21">เจ้าหน้าที่</option>
                                            <option value="22">พนักงานในสถาบันอุดมศึกษา</option>
                                            <option value="23">พนักงานราชการ</option>
                                            <option value="24">ลูกจ้างเหมาบริการ</option>
                                            <option value="25">บุคลากรโรงเรียนเอกชน</option>
                                            <option value="26">บุคลากรทางการศึกษา</option>
                                            <option value="27">บุคลากรทางการศึกษา 38(ค)</option>
                                            <option value="30">พนักงานจ้างตามภารกิจ</option>
                                            <option value="31">พนักงานจ้างทั่วไป</option>
                                            <option value="32">พนักงานครูเมืองพัทยา</option>
                                            <option value="33">พนักงานองค์กรของรัฐ</option>
                                            <option value="36">ผู้ปฎิบัติงานสอนพระปริยัติธรรม</option>
                                            <option value="37">ผู้สนับสนุนการศึกษาพระปริยัติธรรม</option>
                                            <option value="99">พนักงานองค์การของรัฐ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ชื่อตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="10000">ครูผู้ช่วย</option>
                                            <option value="10001">ครู</option>
                                            <option value="10002">อาจารย์</option>
                                            <option value="10003">ผู้ช่วยศาสตราจารย์</option>
                                            <option value="10004">รองศาสตราจารย์</option>
                                            <option value="10005">ศาสตราจารย์</option>
                                            <option value="10006">รองผู้อำนวยการสถานศึกษา</option>
                                            <option value="10007">ผู้อำนวยการสถานศึกษา</option>
                                            <option value="10008">รองผู้อำนวยการเขตพื้นที่การศึกษา</option>
                                            <option value="10009">ผู้อำนวยการเขตพื้นที่การศึกษา</option>
                                            <option value="10017">บุคลากรทางการศึกษา</option>
                                            <option value="10018">บุคลากรทั่วไป</option>
                                            <option value="10019">ครูพิเศษ</option>
                                            <option value="10020">ครูพี่เลี้ยง</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่ดำรงตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เลขที่สัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">จำนวนครั้งที่ทำสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ลักษณะการจ้าง</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="1">จ้างใหม่</option>
                                            <option value="2">ต่อเนื่อง</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">จ้างมาแล้วกี่ปี</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มต้นสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดสัญญา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ประเภทเงินงบประมาณ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="1">เงินงบประมาณ</option>
                                            <option value="2">เงินรายได้สถานศึกษา</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินเดือนปัจจุบัน</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินวิทยฐานะ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินค่าตอบแทน</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">เงินประจำตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                            <!-- start Form ข้อมูลหน้าที่เพิ่มเติมของบุคลากรอื่น -->
                            <form>
                                <h5 class="card-title">ข้อมูลหน้าที่เพิ่มเติมของบุคลากรอื่น</h5>

                                <div class="row mb-3">
                                    <label for="inputText"
                                        class="col-sm-2 col-form-label">คีย์อ้างอิงข้อมูลบุคลากรอื่น</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText"
                                        class="col-sm-2 col-form-label">ตำแหน่งหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่ม/หมวด ที่ปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="01">กลุ่มอำนวยการ</option>
                                            <option value="02">กลุ่มนโยบายและแผน</option>
                                            <option value="03">กลุ่มส่งเสริมการจัดการศึกษา</option>
                                            <option value="04">กลุ่มบริหารงานบุคคล (เขตพื้นที่)</option>
                                            <option value="05">กลุ่มนิเทศ ติดตาม และประเมินผลฯ</option>
                                            <option value="06">กลุ่มบริหารการเงิน และสินทรัพย์</option>
                                            <option value="07">กลุ่มส่งเสริมการศึกษาทางไกล
                                                เทคโนโลยีสารสนเทศและการสื่อสาร</option>
                                            <option value="08">กลุ่มพัฒนาครู และบุคลากรทางการศึกษา</option>
                                            <option value="09">กลุ่มกฏหมาย และคดี</option>
                                            <option value="10">หน่วยตรวจสอบภายใน</option>
                                            <option value="11">กลุ่มบริหารงานทั่วไป</option>
                                            <option value="12">กลุ่มบริหารงานวิชาการ</option>
                                            <option value="13">กลุ่มบริหารงานบุคคล (สถานศึกษา)</option>
                                            <option value="14">กลุ่มบริหารงานแผนงาน และงบประมาณ</option>
                                            <option value="15">กลุ่มบริหานงานกิจการนักเรียน</option>
                                            <option value="16">อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate"
                                        class="col-sm-2 col-form-label">วันที่เริ่มปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText"
                                        class="col-sm-2 col-form-label">คำสั่งให้ปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">เอกสารแนบ</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>

                            </form><!-- end Form ข้อมูลหน้าที่เพิ่มเติมของบุคลากรอื่น -->

                            <!-- start Form ข้อมูลวิทยฐานะของบุคลากรอื่น -->
                            <form>
                                <h5 class="card-title">ข้อมูลวิทยฐานะของบุคลากรอื่น</h5>

                                <div class="row mb-3">
                                    <label for="inputText"
                                        class="col-sm-2 col-form-label">คีย์อ้างอิงข้อมูลบุคลากรอื่น</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">วิทยฐานะ และตำแหน่งวิชาการ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="99">ไม่มีวิทยฐานะ/ไม่มีตำแหน่งทางวิชาการ</option>
                                            <option value="10">ปฏิบัติงาน</option>
                                            <option value="11">ชำนาญงาน</option>
                                            <option value="12">อวุโส</option>
                                            <option value="13">ทักษะพิเศษ</option>
                                            <option value="14">ปฏิบัติงาน</option>
                                            <option value="15">ชำนาญการ</option>
                                            <option value="16">ชำนาญการพิเศษ</option>
                                            <option value="17">เชี่ยวชาญ</option>
                                            <option value="18">เชี่ยวชาญพิเศษ</option>
                                            <option value="19">ทรงคุณวุฒิ</option>
                                            <option value="20">อำนวยการระดับต้น</option>
                                            <option value="21">อำนวยการระดับสูง</option>
                                            <option value="22">บริหารระดับต้น</option>
                                            <option value="23">บริหารระดับสูง</option>
                                            <option value="24">อาจารย์</option>
                                            <option value="25">ผู้ช่วยศาสตราจารย์</option>
                                            <option value="26">รองศาสตราจารย์</option>
                                            <option value="27">ศาสตราจารย์</option>
                                            <option value="28">ศาสตราจารย์พิเศษ</option>
                                            <option value="29">ปฏิบัติงาน</option>
                                            <option value="30">เจ้าหน้าที่</option>
                                            <option value="31">เจ้าหน้าที่อาวุโส</option>
                                            <option value="32">ผู้ชำนาญ</option>
                                            <option value="33">ผู้เชี่ยวชาญ</option>
                                            <option value="34">นักวิชาการ</option>
                                            <option value="35">นักวิชาการอาวุโส</option>
                                            <option value="36">ผู้เชี่ยวชาญพิเศษ</option>
                                            <option value="37">ผู้เชี่ยวชาญพิเศษอาวุโส</option>
                                            <option value="38">หัวหน้าส่วน</option>
                                            <option value="39">ผู้อำนวยการฝ่าย/สาขา</option>
                                            <option value="40">ผู้ช่วยผู้อำนวยการ</option>
                                            <option value="40">รองผู้อำนวยการ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">สาขาที่ยื่นขอวิทยฐานะ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>


                            </form><!-- end Form ข้อมูลวิทยฐานะของบุคลากรอื่น -->

                            <!-- start Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->
                            <form>
                                <h5 class="card-title">ข้อมูลวุฒิการศึกษาของบุคลากรอื่น</h5>

                                <div class="row mb-3">
                                    <label for="inputText"
                                        class="col-sm-2 col-form-label">คีย์อ้างอิงข้อมูลบุคลากรอื่น</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับการศึกษาที่จบ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="14">อนุปริญญา</option>
                                            <option value="16">ปริญญาตรี</option>
                                            <option value="17">ประกาศนียบัตรบัณฑิต / เนติบัณฑิต</option>
                                            <option value="18">ปริญญาโท</option>
                                            <option value="19">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                            <option value="20">ปริญญาเอก</option>
                                            <option value="21">ประกาศนียบัตร</option>
                                            <option value="22">ประกาศนียบัตรวิชาชีพ (ปวช.)</option>
                                            <option value="23">ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)</option>
                                            <option value="24">ปริญญาตรีสายเทคโนโลยีหรือสายปฏิบัติการ (ทล.บ.)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่มวิชาเอก</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>เลือก</option>
                                            <option value="1301">คหกรรม</option>
                                            <option value="1302">ประมง</option>
                                            <option value="1303">พณิชยกรรม/บริหารธุรกิจ</option>
                                            <option value="1304">ศิลปกรรม</option>
                                            <option value="1305">อุตสาหกรรม</option>
                                            <option value="1306">อุตสาหกรรมท่องเทียว</option>
                                            <option value="1307">อุตสาหกรรมสิ่งทอ</option>
                                            <option value="1308">เกษตรกรรม</option>
                                            <option value="1309">เทคโนโลยีสารสนเทศและการสื่อสาร</option>
                                            <option value="1310">เทคโนโลยีและนวัตกรรมเกษตรอุตสาหกรรม</option>
                                            <option value="1311">พาณิชยนาวี</option>
                                            <option value="1312">อุตสาหกรรมบันเทิงและดนตรี</option>
                                            <option value="1401">Generic programmes and qualifications</option>
                                            <option value="1402">Education</option>
                                            <option value="1403">Humanities and Arts</option>
                                            <option value="1404">Business, administration and law </option>
                                            <option value="1405">Science, Mathematics and Computing</option>
                                            <option value="1406">Information and Communication Technologies</option>
                                            <option value="1407">Engineering, manufacturing and construction </option>
                                            <option value="1408">Agriculture, forestry, fisheries and veterinary
                                            </option>
                                            <option value="1409">Health and welfare</option>
                                            <option value="1420">Services</option>
                                            <option value="9901">เทคโนโลยีสารสนเทศ</option>
                                            <option value="9902">บริหารรัฐกิจ</option>
                                            <option value="9903">คอมพิวเตอร์ธุรกิจ</option>
                                            <option value="9904">วิจัย วัดผล และสถิติการศึกษา</option>
                                            <option value="9905">คอมพิวเตอร์</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">สาขาวิชา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">วุฒิการศึกษา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

                        </div>
                    </div>

                </div>

                
            </div>
        </section>

    </main><!-- End #main -->
    