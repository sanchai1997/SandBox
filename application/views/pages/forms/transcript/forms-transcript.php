<style>
  label.col-form-label,
  legend.col-form-label {
    padding-left: 40px;
  }
</style>
<?php
$result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" 
                        ');
foreach ($result->result() as $STUDENT) {
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>เพิ่มข้อมูล</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <!-- start Form ข้อมูลผลสัมฤทธิ์ทางการศึกษา -->
              <form action="<?php echo base_url('add-transcript/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear']); ?>" method="POST">
                <h5 class="card-title">ข้อมูล ปพ. 1
                </h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชุดที่ <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="TranscriptSeriesNumber">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่ <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="TranscriptNumber">
                  </div>
                </div>
                <h5 class="card-title">ข้อมูลนักเรียน</h5>
                <input type="hidden" class="form-control" name="StudentReferenceID" value="<?= $STUDENT->StudentReferenceID ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">หมายเลขบัตรประจำตัวประชาชนนักเรียน <font color="red">*</font></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="GraduatedPersonalID" value="<?= $STUDENT->StudentPersonalID ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">รหัสประจำตัวนักเรียน <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="GraduatedStudentID" value="<?= $STUDENT->StudentID ?>" disabled>
                  </div>
                </div>
                <h5 class="card-title">ข้อมูลสถานศึกษา</h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา : <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="GraduatedSchoolID" required disabled>
                      <option value="<?= $STUDENT->SchoolID ?>" selected><?= $STUDENT->SchoolNameThai ?></option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มเข้าเรียน <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="GraduatedSchoolAdmissionDate">
                  </div>
                </div>
                <h5 class="card-title">ข้อมูลสถานศึกษาเดิม</h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษาเดิม</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="SUBDISTRICT_SUB" aria-label="SUBDISTRICT_SUB" name="GraduatedSchoolID" required>
                      <option value="" selected>เลือก</option>
                      <?php
                      $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID != ' . $STUDENT->SchoolID . '');
                      foreach ($result->result() as $SCHOOL) {
                      ?>
                        <option value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">ชั้นปีสุดท้ายจากสถานศึกษาเดิม</label>
                  <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example">
                      <option value="" selected>เลือก</option>
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

                <div class="text-center">
                  <a href="transcript-P3?StudentReferenceID=<?= $STUDENT->StudentReferenceID; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>" style="float: left;" class="btn btn-danger">ยกเลิก</a>
                  <button style="float: right;" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->
<?php } ?>