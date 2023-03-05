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
            <form class="row g-3" action="<?php echo base_url('forms-school-detail'); ?>" method="POST">
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
                    <option value="1001">โรงเรียน ประเภทสามัญศึกษา</option>
                    <option value="1002">โรงเรียน ประเภทการศึกษาพิเศษ</option>
                    <option value="1003">โรงเรียน ประเภทการศึกษาสงเคราะห์</option>
                    <option value="1005">ศูนย์การศึกษาพิเศษ</option>
                    <option value="1101">โรงเรียนเอกชนสามัญ (สามัญปกติ)</option>
                    <option value="1102">โรงเรียนเอกชนสามัญ (การกุศลของวัด)</option>
                    <option value="1103">โรงเรียนเอกชนสามัญ (การศึกษาพิเศษ)</option>
                    <option value="1106">โรงเรียนเอกชนนานาชาติ</option>
                    <option value="1109">โรงเรียนเอกชนควบคู่ สอนศาสนา-สามัญ</option>
                    <option value="1110">โรงเรียนเอกชนสามัญ (การศึกษาสงเคราะห์)</option>
                    <option value="1111">โรงเรียนเอกชนสามัญ (ในพระราชูปถัมภ์)</option>
                    <option value="1112">อาชีวศึกษาภาคเอกชน (การศึกษาพิเศษ)</option>
                    <option value="1113">โรงเรียนเอกชนสามัญ (อิสลามควบคู่สามัญ)</option>
                    <option value="1121">กวดวิชา</option>
                    <option value="1122">สอนศาสนา</option>
                    <option value="1123">สถาบันศึกษาปอเนาะ</option>
                    <option value="1124">ศูนย์การศึกษาอิสลามประจำมัสยิด (ตาดีกา)</option>
                    <option value="1125">วิชาชีพ</option>
                    <option value="1126">ศิลปะและกีฬา</option>
                    <option value="1127">สร้างเสริมทักษะชีวิต</option>
                    <option value="1141">วิทยาลัยชุมชน</option>
                    <option value="1201">สถานศึกษาในสังกัด กศน. ประเภทสามัญ</option>
                    <option value="1202">สถานศึกษาในสังกัด กศน. ประเภทสายอาชีพ</option>
                    <option value="1203">สถานศึกษาในสังกัด กศน. (ศูนย์วิทยาศาสตร์)</option>
                    <option value="1301">วิทยาลัยเทคนิค</option>
                    <option value="1302">วิทยาลัยอาชีวศึกษา</option>
                    <option value="1303">วิทยาลัยเกษตรและเทคโนโลยี</option>
                    <option value="1304">วิทยาลัยสารพัดช่าง</option>
                    <option value="1305">วิทยาลัยการอาชีพ</option>
                    <option value="1306">วิทยาพาณิชยการ</option>
                    <option value="1307">วิทยาลัยเทคโนโลยีและอุตสาหกรรมต่อเรือ</option>
                    <option value="1308">วิทยาศิลปหัตถกรรม</option>
                    <option value="1309">วิทยาลัยบริหารธุรกิจและการท่องเที่ยว</option>
                    <option value="1310">วิทยาลัยประมง</option>
                    <option value="1311">กาญจนาภิเษกวิทยาลัยช่างทองหลวง</option>
                    <option value="1312">วิทยาลัยเทคโนโลยีและการจัดการ</option>
                    <option value="1313">วิทยาลัยอาชีวศึกษาเทคโนโลยีฐานวิทยาศาสตร์</option>
                    <option value="1314">วิทยาลัยการอาชีวศึกษา</option>
                    <option value="1315">วิทยาลัยเทคโนโลยีการเกษตรและประมง</option>
                    <option value="1316">วิทยาลัยเสริมทักษะพระภิกษุ สามเณร</option>
                    <option value="1317">เทคโนโลยีและการบริหารจัดการ</option>
                    <option value="1401">โรงเรียนสาธิต</option>
                    <option value="1402">มหาวิทยาลัยของรัฐ</option>
                    <option value="1403">มหาวิทยาลัยรัฐไม่จำกัดรับ</option>
                    <option value="1404">มหาวิทยาลัยในกำกับรัฐ</option>
                    <option value="1405">มหาวิทยาลัยราชภัฏ</option>
                    <option value="1406">มหาวิทยาลัยเทคโนโลยีราชมงคล</option>
                    <option value="1407">มหาวิทยาลัยเอกชน</option>
                    <option value="1408">วิทยาลัยเอกชน</option>
                    <option value="1409">สถาบันวิทยาลัยชุมชน</option>
                    <option value="1501">โรงเรียนมหิดลวิทยานุสรณ์</option>
                    <option value="3001">สถานศึกษาในสังกัดองค์กรปกครองท้องถิ่น</option>
                    <option value="3101">โรงเรียนสังกัด สำนักการศึกษา กรุงเทพมหานคร</option>
                    <option value="3301">โรงเรียนในสังกัดสำนักพัฒนาสังคม กรุงเทพมหานคร</option>
                    <option value="4001">ศูนย์ฝึกพาณิชย์นาวี</option>
                    <option value="4101">สถาบันการบินพลเรือน</option>
                    <option value="4501">โรงเรียนในสังกัดกรม พัฒนาสังคมและสวัสดิการ</option>
                    <option value="5001">สถาบันพระบรมราชชนก</option>
                    <option value="5501">โรงเรียนช่างฝีมือทหาร</option>
                    <option value="5502">โรงเรียนช่างกรมอู่ทหารเรือ</option>
                    <option value="5503">โรงเรียนดุริยางค์ทหารเรือ</option>
                    <option value="5504">โรงเรียนดุริยางค์ทหารบก</option>
                    <option value="5505">โรงเรียนดุริยางค์ทหารอากาศ</option>
                    <option value="5506">โรงเรียนเตรียมทหาร</option>
                    <option value="5507">โรงเรียนจ่าอากาศ</option>
                    <option value="5508">โรงเรียนแผนที่กรมแผนที่ทหาร</option>
                    <option value="5601">โรงเรียนนายร้อยพระจุลจอมเกล้า</option>
                    <option value="5602">วิทยาลัยพยาบาลกองทัพบก</option>
                    <option value="5603">วิทยาลัยแพทยศาสตร์พระมงกุฎเกล้า</option>
                    <option value="5604">โรงเรียนเสนาธิการทหารบก</option>
                    <option value="5605">โรงเรียนการบินทหารบก</option>
                    <option value="5701">โรงเรียนนายเรือ</option>
                    <option value="5702">วิทยาลัยพยาบาลกองทัพเรือ</option>
                    <option value="5801">โรงเรียนนายเรืออากาศ</option>
                    <option value="5802">วิทยาลัยพยาบาลทหารอากาศ</option>
                    <option value="6002">วิทยาลัยพลศึกษา</option>
                    <option value="6501">สถาบันบัณฑิตพัฒนศิลป์</option>
                    <option value="6502">วิทยาลัยนาฎศิลป</option>
                    <option value="6503">วิทยาลัยช่างศิลป</option>
                    <option value="7001">โรงเรียนพระปริยัติธรรม แผนกสามัญศึกษา</option>
                    <option value="7101">โรงเรียนนายร้อยตำรวจ</option>
                    <option value="7201">โรงเรียนตำรวจตระเวนชายแดน</option>
                    <option value="7777">โรงเรียนสังกัด สำนักการศึกษา เมืองพัทยา</option>
                    <option value="8888">โรงเรียนหอวัง</option>
                    <option value="9999">หน่วยงานทางการศึกษา</option>
                    <option value="a">โรงเรียนในสังกัดมหาวิทยาลัยกีฬาแห่งชาติ</option>
                    <option value="c">มหาวิทยาลัยนวมินทราธิราช</option>
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
                  <select class="form-select" id="PROVINCE" aria-label="PROVINCE" name="ADDRESS_PROVINCE_CODE" required>
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE GROUP BY CLS_PROVINCE_NAME ASC');
                    foreach ($result->result() as $PROVINCE) {
                    ?>
                      <option value="<?= $PROVINCE->CLS_PROVINCE_CODE; ?>"><?= $PROVINCE->CLS_PROVINCE_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="OFFICIAL_ADDRESS_PROVINCE_CODE">จังหวัด</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="DISTRICT" aria-label="DISTRICT" name="ADDRESS_DISTRICT_CODE">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT GROUP BY CLS_DISTRICT_NAME ASC');
                    foreach ($result->result() as $DISTRICT) {
                    ?>
                      <option id="<?= $DISTRICT->CLS_PROVINCE_CODE; ?>" value="<?= $DISTRICT->CLS_DISTRICT_CODE; ?>"><?= $DISTRICT->CLS_DISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="ADDRESS_DISTRICT_CODE">อำเภอ</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="ADDRESS_SUBDISTRICT_CODE">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT GROUP BY CLS_SUBDISTRICT_NAME ASC');
                    foreach ($result->result() as $SUBDISTRICT) {
                    ?>
                      <option id="<?= $SUBDISTRICT->CLS_DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->CLS_SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->CLS_SUBDISTRICT_NAME; ?></option>
                    <?php } ?>
                  </select>
                  <label for="ADDRESS_SUBDISTRICT_CODE">ตำบล</label>
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
                <button style="float: right;" type="submit" class="btn btn-primary">หน้าถัดไป</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>

      </div>


    </div>
  </section>

</main><!-- End #main -->