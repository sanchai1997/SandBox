<main id="main" class="main">
  <div class="pagetitle">
    <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลผลสัมฤทธิ์ทางการศึกษา
      <?php if (isset($_GET['SchoolID'])) {
        $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
        foreach ($result->result() as $SCHOOL) {
          $SchoolName = $SCHOOL->SchoolNameThai;
        }
        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
        foreach ($result->result() as $GRADE_LEVEL) {
          $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
        }
      ?>

    </h1>
    <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?> &nbsp;รหัสนักเรียน: <?= $_GET['StudentID'] ?></b></a>
  </div><!-- End Page Title -->
  <?php if (!empty($_SESSION['danger'])) { ?>
    <script>
      setTimeout(function() {
        document.getElementById('myAlert').remove();
      }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
    <div style="position: relative;">
      <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
        <strong>
          <?php
          echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
          unset($_SESSION['danger']);
          ?>
        </strong>

      </div>
    </div>
  <?php } ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <!-- Floating Labels Form -->
            <form class="row g-3" action="<?php echo base_url('add-transcript/' . $_GET['SchoolID'] . '/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID']); ?>" method="POST" id="Transcript" enctype="multipart/form-data">
              <h6 style="padding-left: 15px;" class="card-title">ข้อมูลใบแสดงผลการศึกษา</h6>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="hidden" name="EducationYear" value="<?= $_GET['EducationYear'] ?>">
                  <input type="number" class="form-control" maxlength="4" name="EducationYear" id="EducationYear" value="<?= $_GET['EducationYear'] ?>" disabled>
                  <label for="EducationYear">ปีการศึกษา<font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="hidden" name="Semester" value="<?= $_GET['Semester'] ?>">
                  <input type="number" class="form-control" maxlength="1" name="Semester" id="Semester" value="<?= $_GET['Semester'] ?>" disabled>
                  <label for="Semester">ภาคเรียน<font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="OldSchoolID" id="OldSchoolID" aria-label="OldSchoolID" disabled>
                    <?php
                    $result = $this->db->query('SELECT * FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                    ?>

                      <option value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="OldSchoolID">สถานศึกษา<font color="red"> *</font> </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="OldSchoolLastGradeLevelCode" id="OldSchoolLastGradeLevelCode" aria-label="OldSchoolLastGradeLevelCode" disabled>
                    <?php
                    $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
                    foreach ($result->result() as $GRADE_LEVEL) {
                    ?>
                      <option value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="OldSchoolLastGradeLevelCode">ชั้นปีการศึกษา<font color="red"> *</font> </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" maxlength="5" name="TranscriptSeriesNumber" id="TranscriptSeriesNumber">
                  <label for="TranscriptSeriesNumber">ชุดที่<font color="red"> *</font></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" maxlength="6" name="TranscriptNumber" id="TranscriptNumber">
                  <label for="TranscriptNumber">เลขที่<font color="red"> *</font></label>
                </div>
              </div>

            <?php }
            ?>

            <div class="d-flex justify-content-between">
              <a href="transcript?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>" class="btn btn-danger">ยกเลิก</a>
              <button type="button" class="btn btn-primary" onclick="return check(Transcript)">บันทึกข้อมูล</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันบันทึกข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h6>
                      <center>คุณต้องการบันทึกข้อมูลใช่หรือไหม ?</center>
                    </h6>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
              </div>
            </div>


            </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

          </div>
        </div>

      </div>

    </div>
  </section>
  <script type="text/javascript">
    function check(frm) {

      if (frm.OldSchoolLastGradeLevelCode.value == "") {
        alert("กรุณาเลือกชั้นปีการศึกษา");
        return false;
      }
      var Series = /^[0-9]{1,5}$/;
      var Number = /^[0-9]{1,6}$/;

      if (frm.TranscriptSeriesNumber.value == "") {
        alert("กรุณากรอกข้อมูลใบแสดงผลการศึกษาชุดที่");
        return false;
      } else if (!frm.TranscriptSeriesNumber.value.match(Series)) {
        alert("กรุณากรอกข้อมูลใบแสดงผลการศึกษาชุดที่ไม่เกิน 5 หลัก");
        frm.TranscriptSeriesNumber.value = "";
        return false;
      }

      if (frm.TranscriptNumber.value == "") {
        alert("กรุณากรอกข้อมูลใบแสดงผลการศึกษาเลขที่");
        return false;
      } else if (!frm.TranscriptNumber.value.match(Number)) {
        alert("กรุณากรอกข้อมูลใบแสดงผลการศึกษาเลขที่ไม่เกิน 6 หลัก");
        frm.TranscriptNumber.value = "";
        return false;
      }


      $('#Modal').modal('show');
    }
  </script>

</main><!-- End #main -->