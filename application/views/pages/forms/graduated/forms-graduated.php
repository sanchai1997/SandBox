<style>
  label.col-form-label {
    padding-left: 30px;
  }

  h5.card-title {
    padding-left: 20px;
  }
</style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>เพิ่มข้อมูลผู้สำเร็จการศึกษา</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">ข้อมูลการสำเร็จการศึกษา</h5>

            <!-- start Form GRADUATED -->
            <form class="row g-3" action="<?php echo base_url('add-graduated'); ?>" method="POST">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="EducationYear">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="Semester">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                <div class="col-sm-10">
                  <select class="form-select" id="School" aria-label="Default select example" name="GraduatedSchoolID">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM SCHOOL');
                    foreach ($result->result() as $SCHOOL) {
                    ?>
                      <option value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">นักเรียน</label>
                <div class="col-sm-10">
                  <select class="form-select" id="Student" aria-label="Default select example" name="StudentReferenceID">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM STUDENT ORDER BY StudentID ASC');
                    foreach ($result->result() as $STUDENT) {
                    ?>
                      <option id="<?= $STUDENT->SchoolID; ?>" value="<?= $STUDENT->StudentReferenceID; ?>"><?= $STUDENT->StudentNameThai; ?> <?= $STUDENT->StudentLastNameThai; ?> <?= $STUDENT->StudentID; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่จบ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="GraduatedEducationYear">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">วันที่สำเร็จการศึกษา</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="GraduatedDate">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="GraduatedEducationLevelCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                    foreach ($result->result() as $EDUCATION_LEVEL) {
                    ?>
                      <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ชั้นเรียน</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="GraduatedGradeLevelCode">
                    <option selected>เลือก</option>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL');
                    foreach ($result->result() as $GRADE_LEVEL) {
                    ?>
                      <option value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">ลำดับการสำเร็จการศึกษา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="GraduatedOrderNumber">
                </div>
              </div>
              <h5 class="card-title">ข้อมูลผลการศึกษา</h5>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">เลขที่ใบแสดงผลการศึกษา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="GraduatedTranscriptNumber">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">ชุดที่ใบแสดงผลการศึกษา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="GraduatedTranscriptSeriesNumber">
                </div>
              </div>

              <h5 class="card-title">ข้อมูลใบประกาศนียบัตร</h5>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">หมายเลขใบประกาศนียบัตร</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="CertificationNumber">
                </div>
              </div>

              <h5 class="card-title">ข้อมูลผู้อนุมัติจบ</h5>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">คำนำหน้าชื่อผู้อนุมัติจบ</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="EndorserPrefixCode">
                    <option selected>คำนำหน้าชื่อ</option>
                    <option value="003">นาย</option>
                    <option value="004">นางสาว</option>
                    <option value="005">นาง</option>
                    <option value="140">ดอกเตอร์</option>
                    <option value="165">ศาสตราจารย์ดอกเตอร์</option>
                    <option value="141">ผู้ช่วยศาสตราจารย์</option>
                    <option value="143">รองศาสตราจารย์</option>
                    <option value="143">ศาสตราจารย์</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">ชื่อผู้อนุมัติจบ (ภาษาไทย)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="EndorserNameThai">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางผู้อนุมัติจบ (ภาษาไทย)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="EndorserMiddleNameThai">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">นามสกุลผู้อนุมัติจบ (ภาษาไทย)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="EndorserLastNameThai">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ตำแหน่งผู้อนุมัติจบ</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="EndorserPositionCode">
                    <option selected>ตำแหน่ง</option>
                    <option value="10003">ผู้ช่วยศาสตราจารย์</option>
                    <option value="10004">รองศาสตราจารย์</option>
                    <option value="10005">ศาสตราจารย์</option>
                    <option value="10006">รองผู้อำนวยการสถานศึกษา</option>
                    <option value="10007">ผู้อำนวยการสถานศึกษา</option>
                  </select>
                </div>
              </div>
              <div class="text-center">
                <a href="graduated" style="float: left;" class="btn btn-light">ยกเลิก</a>
                <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADD">บันทึกข้อมูล</button>
              </div>
              <div class="modal fade" id="ADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันเพิ่มข้อมูล</h5>
                      <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                      <h6>
                        <center>คุณต้องการเพิ่มข้อมูลใช่หรือไหม ?</center>
                      </h6>
                    </div>
                    <div class="modal-footer">
                      <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                  </div>
                </div>
              </div>

            </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

          </div>
        </div>

      </div>


    </div>
  </section>

</main><!-- End #main -->