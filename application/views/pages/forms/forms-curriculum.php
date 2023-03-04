
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Curriculum</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลหลักสูตร</h5>

              <!-- start Form ข้อมูลหลักสูตร -->
              <form action="<?php echo base_url('add_curriculum');?>" method="POST" name="addCurriculum" id="addCurriculum">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="EDUCATION_YEAR" id="EDUCATION_YEAR" placeholder="ปีการศึกษา (พ.ศ.)" maxlength="4">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SEMESTER" id="SEMESTER">
                      <option selected value="0">เลือกภาคเรียน</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="SCHOOL_ID" id="SCHOOL_ID" placeholder="selection ดึงข้อมูลมาโชว์จากตาราง SCHOOL">
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">รหัสหลักสูตร</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CURRICULUM_CODE" id="CURRICULUM_CODE">
                      <option selected value="0">เลือกรหัสหลักสูตร</option>
                      <option value="1001:หลักสูตรแกนกลางการศึกษาขั้นพื้นฐาน">หลักสูตรแกนกลางการศึกษาขั้นพื้นฐาน</option>
                      <option value="1101:หลักสูตรโรงเรียนนานาชาติ">หลักสูตรโรงเรียนนานาชาติ</option>
                      <option value="1201:หลักสูตรการศึกษานอกระบบ ระดับการศึกษาขั้นพื้นฐาน พ.ศ. 2551">หลักสูตรการศึกษานอกระบบ ระดับการศึกษาขั้นพื้นฐาน พ.ศ. 2551</option>
                      <option value="1301:หลักสูตร ปวช. ปี 2551 (ฐานวิทย์)">หลักสูตร ปวช. ปี 2551 (ฐานวิทย์)</option>
                      <option value="1302:หลักสูตร ปวช. ปี 2556">หลักสูตร ปวช. ปี 2556</option>
                      <option value="1303:หลักสูตร ปวส. ปี 2557">หลักสูตร ปวส. ปี 2557</option>
                      <option value="1304:หลักสูตร ปวส. ปี 2562">หลักสูตร ปวส. ปี 2562</option>
                      <option value="1305:หลักสูตร ปวส. ปี 2545">หลักสูตร ปวส. ปี 2545</option>
                      <option value="1306:หลักสูตร ปวส. ปี 2546">หลักสูตร ปวส. ปี 2546</option>
                      <option value="1307:หลักสูตร ปวส. ปี 2563">หลักสูตร ปวส. ปี 2563</option>
                      <option value="1308:หลักสูตร ปวส. ปี 2561 (KOSEN)">หลักสูตร ปวส. ปี 2561 (KOSEN)</option>
                      <option value="1401:หลักสูตรอนุปริญญา">หลักสูตรอนุปริญญา</option>
                      <option value="1402:หลักสูตรปริญญาตรี">หลักสูตรปริญญาตรี</option>
                      <option value="1403:หลักสูตรประกาศนียบัตรบัณฑิต">หลักสูตรประกาศนียบัตรบัณฑิต</option>
                      <option value="1404:หลักสูตรปริญญาโท">หลักสูตรปริญญาโท</option>
                      <option value="1405:หลักสูตรประกาศนียบัตรบัณฑิตชั้นสูง">หลักสูตรประกาศนียบัตรบัณฑิตชั้นสูง</option>
                      <option value="1406:หลักสูตรปริญญาเอก">หลักสูตรปริญญาเอก</option>
                      <option value="1407:หลักสูตรนานาชาติ ปริญญาตรี">หลักสูตรนานาชาติ ปริญญาตรี</option>
                      <option value="1408:หลักสูตรนานาชาติ ปริญญาโท">หลักสูตรนานาชาติ ปริญญาโท</option>
                      <option value="1409:หลักสูตรเทคโนโลยีบัณฑิต (ทล.บ)">หลักสูตรเทคโนโลยีบัณฑิต (ทล.บ)</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">รหัสระดับการศึกษา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="EDUCATION_LEVEL_CODE" id="EDUCATION_LEVEL_CODE">
                      <option selected value="0">เลือกรหัสระดับการศึกษา</option>
                      <option value="00">เตรียมอนุบาล</option>
                      <option value="10">ก่อนประถมศึกษา</option>
                      <option value="11">ประถมศึกษา</option>
                      <option value="12">มัธยมศึกษาตอนต้น</option>
                      <option value="13">มัธยมศึกษาตอนปลาย</option>
                      <option value="14">ประกาศนียบัตรวิชาชีพเทคนิค (ปวท.)</option>
                      <option value="15">อนุปริญญา</option>
                      <option value="16">ปริญญาตรี</option>
                      <option value="17">ประกาศนียบัตรบัณฑิต / เนติบัณฑิต</option>
                      <option value="18">ปริญญาโท</option>
                      <option value="19">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                      <option value="20">ปริญญาเอก</option>
                      <option value="21">ประกาศนียบัตร</option>
                      <option value="22">ประกาศนียบัตรวิชาชีพ (ปวช.)</option>
                      <option value="23">ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)</option>
                      <option value="24">	ปริญญาตรีสายเทคโนโลยีหรือสายปฏิบัติการ (ทล.บ.)</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">รหัสชั้นเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="GRADE_LEVEL_CODE" id="GRADE_LEVEL_CODE">>
                      <option selected>เลือกรหัสชั้นเรียน</option>
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
                      <option value="241">นักธรรมตรี</option>
                      <option value="242">นักธรรมโท</option>
                      <option value="243">นักธรรมเอก</option>
                      <option value="311">มัธยมศึกษาปีที่ 1 /เกรด 7/ นาฎศิลป์ชั้นที่ 1</option>
                      <option value="312">มัธยมศึกษาปีที่ 2 /เกรด 8/ นาฎศิลป์ชั้นที่ 2</option>
                      <option value="313">มัธยมศึกษาปีที่ 3 /เกรด 9/ นาฎศิลป์ชั้นที่ 3</option>
                      <option value="314">กศน.มัธยมศึกษาตอนปลาย (ม.6)</option>
                      <option value="321">ดุริยางค์ทหารบก/ดุริยางค์ทหารเรือชั้นปีที่ 1</option>
                      <option value="322">ดุริยางค์ทหารบก/ดุริยางค์ทหารเรือชั้นปีที่ 2</option>
                      <option value="323">ดุริยางค์ทหารบก/ดุริยางค์ทหารเรือชั้นปีที่ 3</option>
                      <option value="341">ประโยค ป.ธ. 1-2</option>
                      <option value="342">ประโยค ป.ธ. 3</option>
                      <option value="411">มัธยมศึกษาปีที่ 4/เกรด10/เตรียมทหารชั้นปีที่ 1</option>
                      <option value="412">มัธยมศึกษาปีที่ 5/เกรด11/เตรียมทหารชั้นปีที่ 2</option>
                      <option value="413">มัธยมศึกษาปีที่ 6/เกรด12/เตรียมทหารชั้นปีที่ 3</option>
                      <option value="414">กศน.มัธยมศึกษาตอนต้น (ม.3)</option>
                      <option value="421">ประกาศนียบัตรวิชาชีพปีที่ 1</option>
                      <option value="422">ประกาศนียบัตรวิชาชีพปีที่ 2</option>
                      <option value="423">ประกาศนียบัตรวิชาชีพปีที่ 3</option>
                      <option value="441">ประโยค ป.ธ. 4</option>
                      <option value="442">ประโยค ป.ธ. 5</option>
                      <option value="443">ประโยค ป.ธ. 6</option>
                      <option value="463">ระดับสูงกว่ามัธยมศึกษาตอนปลาย</option>
                      <option value="511">อนุปริญญาชั้นที่ 1</option>
                      <option value="512">อนุปริญญาชั้นที่ 2</option>
                      <option value="521">ประกาศนียบัตรวิชาชีพชั้นสูงชั้นปีที่ 1/ ปวท. ชั้นปีที่ 1 - ปกศ. สูง </option>
                      <option value="522">ประกาศนียบัตรวิชาชีพชั้นสูงชั้นปีที่ 2/ ปวท. ชั้นปีที่ 1 - ปกศ. สูง </option>
                      <option value="523">ประกาศนียบัตรวิชาชีพชั้นสูงชั้นปีที่ 3/ ปวท. ชั้นปีที่ 3</option>
                      <option value="601">ปริญญาตรีชั้นปีที่ 1 (สามัญ)</option>
                      <option value="602">ปริญญาตรีชั้นปีที่ 2 (สามัญ)</option>
                      <option value="603">ปริญญาตรีชั้นปีที่ 3 (สามัญ)</option>
                      <option value="604">ปริญญาตรีชั้นปีที่ 4 (สามัญ)</option>
                      <option value="605">ปริญญาตรีชั้นปีที่ 5 (สามัญ)</option>
                      <option value="606">ปริญญาตรีชั้นปีที่ 6 (สามัญ)</option>
                      <option value="607">ปริญญาตรีชั้นปีที่ 7 (สามัญ)</option>
                      <option value="608">ปริญญาตรีชั้นปีที่ 8 (สามัญ)</option>
                      <option value="611">ปริญญาตรีชั้นปีที่ 1 (อาชีวศึกษา)</option>
                      <option value="612">ปริญญาตรีชั้นปีที่ 2 (อาชีวศึกษา)</option>
                      <option value="621">ปริญญาตรีชั้นปีที่ 1 (ประเภทการศึกษา)</option>
                      <option value="622">ปริญญาตรีชั้นปีที่ 2 (ประเภทการศึกษา)</option>
                      <option value="623">ปริญญาตรีชั้นปีที่ 3 (ประเภทการศึกษา)</option>
                      <option value="624">ปริญญาตรีชั้นปีที่ 4 (ประเภทการศึกษา)</option>
                      <option value="625">ปริญญาตรีชั้นปีที่ 5 (ประเภทการศึกษา)</option>
                      <option value="626">ปริญญาตรีชั้นปีที่ 6 (ประเภทการศึกษา)</option>
                      <option value="627">ปริญญาตรีชั้นปีที่ 7 (ประเภทการศึกษา)</option>
                      <option value="628">ปริญญาตรีชั้นปีที่ 8 (ประเภทการศึกษา)</option>
                      <option value="631">ปริญญาตรีชั้นปีที่ 1 (พุทธศึกษา)</option>
                      <option value="632">ปริญญาตรีชั้นปีที่ 2 (พุทธศึกษา)</option>
                      <option value="633">ปริญญาตรีชั้นปีที่ 3 (พุทธศึกษา)</option>
                      <option value="634">ปริญญาตรีชั้นปีที่ 4 (พุทธศึกษา)</option>
                      <option value="635">ปริญญาตรีชั้นปีที่ 5 (พุทธศึกษา)</option>
                      <option value="636">ปริญญาตรีชั้นปีที่ 6 (พุทธศึกษา)</option>
                      <option value="637">ปริญญาตรีชั้นปีที่ 1</option>
                      <option value="638">ปริญญาตรีชั้นปีที่ 2</option>
                      <option value="639">ปริญญาตรีชั้นปีที่ 3</option>
                      <option value="640">ปริญญาตรีชั้นปีที่ 4</option>
                      <option value="641">เปรียญธรรมประโยค 7</option>
                      <option value="642">เปรียญธรรมประโยค 8</option>
                      <option value="643">เปรียญธรรมประโยค 9</option>
                      <option value="651">ปริญญาตรีชั้นปีที่ 1 (อิสลามศึกษา)</option>
                      <option value="652">ปริญญาตรีชั้นปีที่ 2 (อิสลามศึกษา)</option>
                      <option value="653">ปริญญาตรีชั้นปีที่ 3 (อิสลามศึกษา)</option>
                      <option value="654">ปริญญาตรีชั้นปีที่ 4 (อิสลามศึกษา)</option>
                      <option value="661">ประกาศนียบัตรบัณฑิตชั้นที่ 1</option>
                      <option value="711">ปริญญาโทชั้นปีที่ 1</option>
                      <option value="712">ปริญญาโทชั้นปีที่ 2</option>
                      <option value="713">ปริญญาโทชั้นปีที่ 3</option>
                      <option value="714">ปริญญาโทชั้นปีที่ 4</option>
                      <option value="715">ปริญญาโทชั้นปีที่ 5</option>
                      <option value="751">ปริญญาโทชั้นปีที่ 1 (อิสลามศึกษา)</option>
                      <option value="752">ปริญญาโทชั้นปีที่ 2 (อิสลามศึกษา)</option>
                      <option value="753">ปริญญาโทชั้นปีที่ 3 (อิสลามศึกษา)</option>
                      <option value="754">ปริญญาโทชั้นปีที่ 4 (อิสลามศึกษา)</option>
                      <option value="755">ปริญญาโทชั้นปีที่ 5 (อิสลามศึกษา)</option>
                      <option value="761">ประกาศนียบัตรชั้นสูงชั้นปีที่ 1</option>
                      <option value="762">ประกาศนียบัตรชั้นสูงชั้นปีที่ 2</option>
                      <option value="811">ปริญญาเอกชั้นปีที่ 1</option>
                      <option value="812">ปริญญาเอกชั้นปีที่ 2</option>
                      <option value="813">ปริญญาเอกชั้นปีที่ 3</option>
                      <option value="814">ปริญญาเอกชั้นปีที่ 4</option>
                      <option value="815">ปริญญาเอกชั้นปีที่ 5</option>
                      <option value="851">ปริญญาเอกชั้นปีที่ 1 (อิสลามศึกษา)</option>
                      <option value="852">ปริญญาเอกชั้นปีที่ 2 (อิสลามศึกษา)</option>
                      <option value="853">ปริญญาเอกชั้นปีที่ 3 (อิสลามศึกษา)</option>
                      <option value="854">ปริญญาเอกชั้นปีที่ 4 (อิสลามศึกษา)</option>
                      <option value="855">ปริญญาเอกชั้นปีที่ 5 (อิสลามศึกษา)</option>
                      <option value="861">ประกาศนียบัตรบัณฑิตชั้นสูงกว่าปริญญาเอกสูงกว่าชั้นปีที่ 1</option>
                      <option value="871">แพทย์เฉพาะทางชั้นปีที่ 1</option>
                      <option value="872">แพทย์เฉพาะทางชั้นปีที่ 2</option>
                      <option value="873">แพทย์เฉพาะทางชั้นปีที่ 3</option>
                      <option value="874">แพทย์เฉพาะทางชั้นปีที่ 4</option>
                      <option value="875">แพทย์เฉพาะทางชั้นปีที่ 5</option>
                      <option value="911">หลักสูตรวิชาชีพระยะสั้น</option>
                      <option value="912">การศึกษาปอเนาะ</option>
                      <option value="913">เตรียมความพร้อม</option>
                      <option value="919">หลักสูตรอื่นๆ ที่ไม่ได้วุฒิการศึกษา</option>
                      <option value="920">ประกาศนียบัตรวิชาชีพชั้นสูงชั้นปีที่ 4/ ปวท. ชั้นปีที่ 4</option>
                      <option value="921">ประกาศนียบัตรวิชาชีพชั้นสูงชั้นปีที่ 4/ ปวท. ชั้นปีที่ 4</option>
                      <option value="922">อนุบาล (ตาดีกา)</option>
                      <option value="923">1 (ตาดีกา)</option>
                      <option value="924">2 (ตาดีกา)</option>
                      <option value="925">3 (ตาดีกา)</option>
                      <option value="926">4 (ตาดีกา)</option>
                      <option value="927">5 (ตาดีกา)</option>
                      <option value="928">6 (ตาดีกา)</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">เอกสารหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="CURRICULUM_DOCUMENT" id="CURRICULUM_DOCUMENT">
                  </div>
                </div>

 <!--               <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">เอกสารหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control"  name="CURRICULUM_DOCUMENT" id="CURRICULUM_DOCUMENT" placeholder="CURRICULUM_DOCUMENT">
                  </div>
                </div>
-->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">อ้างอิงหลักสูตรท้องถิ่น</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="LOCAL_CURRICULUM_FLAG" id="LOCAL_CURRICULUM_FLAG">
                      <option selected value="2">เลือกอ้างอิงหลักสูตรท้องถิ่น</option>
                      <option value="0">อ้างอิง</option>
                      <option value="1">ไม่อ้างอิง</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อหลักสูตรท้องถิ่นที่อ้างอิง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LOCAL_CURRICULUM_NAME" id="LOCAL_CURRICULUM_NAME" placeholder="ชื่อหลักสูตรท้องถิ่นที่อ้างอิง">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เอกสารแนบหลักสูตรอ้างอิง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LOCAL_CURRICULUM_DOCUMENT" id="LOCAL_CURRICULUM_DOCUMENT" placeholder="เอกสารแนบหลักสูตรอ้างอิง">
                  </div>
                </div>
<!--
                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">เอกสารแนบหลักสูตรอ้างอิง</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="LOCAL_CURRICULUM_DOCUMENT" id="LOCAL_CURRICULUM_DOCUMENT" placeholder="เอกสารแนบหลักสูตรอ%างอิง">
                  </div>
                </div>
-->
<!-- End Form ข้อมูลหลักสูตร -->

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
             
                <h5 class="card-title">ข้อมูลหลักสูตรรายวิชา</h5>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อรายวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="SUBJECT_NAME"id="SUBJECT_NAME"placeholder="ชื่อรายวิชา">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >รหัสวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="SUBJECT_CODE"id="SUBJECT_CODE"placeholder="รหัสวิชา">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE">
                      <option selected value="0">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
                      <option value="01">ภาษาไทย</option>
                      <option value="02">คณิตศาสตร์</option>
                      <option value="03">วิทยาศาสตร์ และเทคโนโลยี</option>
                      <option value="04">สังคมศึกษา ศาสนาและวัฒนธรรม</option>
                      <option value="05">สุขศึกษา และ พละศึกษา</option>
                      <option value="06">ศิลปะ</option>
                      <option value="07">การงานอาชีพ</option>
                      <option value="08">ภาษาต่างประเทศ</option>
                      <option value="09">กิจกรรมพัฒนาผู้เรียน</option>
                      <option value="10">IS</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทวิชา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SUBJECT_TYPE_CODE" id="SUBJECT_TYPE_CODE">
                      <option selected value="0">เลือกประเภทวิชา</option>
                      <option value="01">พื้นฐาน</option>
                      <option value="02">เพิ่มเติม</option>
                      <option value="03">กลุ่มทักษะวิชาชีพพื้นฐาน</option>
                      <option value="04">กลุ่มทักษะวิชาชีพเฉพาะ</option>
                      <option value="05">กลุ่มทักษะวิชาชีพเลือก</option>
                      <option value="06">ฝึกประสบการณ์ทักษะวิชาชีพ</option>
                      <option value="07">โครงการพัฒนาทักษะวิชาชีพ</option>
                      <option value="08">กิจกรรมพัฒนาผู้เรียน</option> 
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หน่วยกิต/หน่วยน้ำหนัก</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="CREDIT"id="CREDIT" placeholder="หน่วยกิต/หน่วยน้ำหนัก">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนชั่วโมงเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LEARNING_HOUR"id="LEARNING_HOUR">
                  </div>
                </div>


              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->

              <!-- start Form ข้อมูลสมรรถนะของหลักสูตร -->
                <h5 class="card-title">ข้อมูลสมรรถนะของหลักสูตร</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สมรรถนะ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CURRICULUM_COMPETENCY_CODE" id="CURRICULUM_COMPETENCY_CODE">
                      <option selected value="0">เลือกสมรรถนะ</option>
                      <option value="101">ความสามารถในการสื่อสาร</option>
                      <option value="102">ความสามารถในการคิด</option>
                      <option value="103">ความสามารถในการแก้ปัญหา</option>
                      <option value="104">ความสามารถในการใช้ทักษะชีวิต</option>
                      <option value="105">ความสามารถในการใช้เทคโนโลยี</option>
                      <option value="201">สมรรถนะการจัดการตนเอง</option>
                      <option value="202">สมรรถนะการคิดขั้นสูง</option>  
                      <option value="203">สมรรถนะการสื่อสาร</option>  
                      <option value="204">สมรรถนะการรวมพลังทำงานเป็นทีม</option>  
                      <option value="205">สมรรถนะการเป็นพลเมืองที่เข้มแข็ง</option>  
                      <option value="206">สมรรถนะการอยู่ร่วมกับธรรมชาติและวิทยาการอย่างยั่งยืน</option>
                      <option value="301">ภาษาไทย</option>  
                      <option value="302">ภาษาอังกฤษ</option>  
                      <option value="303">คณิตศาสตร์</option>  
                      <option value="304">วิทยาศาสตร์</option>
                      <option value="401">การสื่อสาร</option>  
                      <!--
                      <option value="">การคิด</option>  
                      <option value="">การทำงานเป็นทีม</option>  
                      <option value="">การเป็นพลเมือง</option>
                      -->

                    </select>                   
                  </div>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return check(addCurriculum)">ยืนยัน</button>
              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->
            </form>

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
  
  //Check_EDUCATION_YEAR
  var EDUCATION = /^[0-9]{4}$/;
    /*
    if(EDUCATION.test(frm.EDUCATION_YEAR.value) == false){
      alert("กรุณากรอกข้อมูลปีการศึกษา");
      return false;
    }
    */
    if(frm.EDUCATION_YEAR.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }else if (!frm.EDUCATION_YEAR.value.match(EDUCATION)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }
  //Check_SEMESTER
    if(frm.SEMESTER.value==0){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
  //Check_CURRICULUM_NAME
    var CHECK_CURRICULUM_NAME = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.CURRICULUM_NAME.value==""){
        alert("กรุณากรอกชื่อหลักสูตร");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }
    else if(!frm.CURRICULUM_NAME.value.match(CHECK_CURRICULUM_NAME)){
        alert("กรุณากรอกชื่อหลักสูตรให้ถูกต้อง");
        frm.CURRICULUM_NAME.value = "";
        return false;
    }
    //Check_CURRICULUM_CODE
    if(frm.CURRICULUM_CODE.value==0){
      alert("กรุณาเลือกรหัสหลักสูตร");
      return false;
    }
    //Check_EDUCATION_LEVEL_CODE
    if(frm.EDUCATION_LEVEL_CODE.value==0){
      alert("กรุณาเลือกรหัสระดับการศึกษา");
      return false;
    }
    //Check_LOCAL_CURRICULUM_FLAG
    if(frm.LOCAL_CURRICULUM_FLAG.value==2){
      alert("กรุณาเลือกอ้างอิงหลักสูตรท้องถิ่น");
      return false;
    }
   //Check_LOCAL_CURRICULUM_NAME
   var CHECK_LOCAL_CURRICULUM_NAME = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.LOCAL_CURRICULUM_NAME.value==""){
        alert("กรุณากรอกชื่อหลักสูตรท้องถิ่นที่อ้างอิง");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }
    else if(!frm.LOCAL_CURRICULUM_NAME.value.match(CHECK_LOCAL_CURRICULUM_NAME)){
        alert("กรุณากรอกชื่อหลักสูตรท้องถิ่นที่อ้างอิงให้ถูกต้อง");
        frm.LOCAL_CURRICULUM_NAME.value = "";
        return false;
    }


    //Check_CURRICULUM_COMPETENCY_CODE
    if(frm.CURRICULUM_COMPETENCY_CODE.value==0){
      alert("กรุณาเลือกสมรรถนะ");
      return false;
    }

    

    


  
  }
</script>    

  </main><!-- End #main -->
