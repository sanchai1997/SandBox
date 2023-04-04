<main id="main" class="main">
  <div class="pagetitle">
    <h1>แก้ไขข้อมูลรหัสนักเรียน
      <?php if (isset($_GET['StudentReferenceID'])) { ?>
        <?php
        $result = $this->db->query('SELECT *  FROM STUDENT 
                INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" AND SchoolID = ' . $_GET['SchoolID'] . '');
        foreach ($result->result() as $STUDENT) {


          $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
          foreach ($result->result() as $SCHOOL) {
            $SchoolName = $SCHOOL->SchoolNameThai;
          }
        ?>

    </h1>
    <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . ' ' . $STUDENT->StudentLastNameThai ?></b></a>
<?php }
      } ?>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <!-- Floating Labels Form -->
            <form class="row g-3" action="<?php echo base_url('update-student-journey/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
              <h6 style="padding-left: 15px;" class="card-title"></h6>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                  <label for="JourneyTime">ปีการศึกษา</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                  <label for="JourneyTime">ภาคเรียน</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="DisabilityCode" id="DisabilityCode" aria-label="DisabilityCode">
                    <?php if ($STUDENT->DisabilityCode == '') { ?>
                      <option value="" selected>เลือก</option>
                    <?php }
                    $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                    foreach ($result->result() as $DISABILITY) {
                    ?>
                      <option <?php if ($STUDENT->DisabilityCode == $DISABILITY->DISABILITY_CODE) {
                                echo 'selected';
                              } ?> value="<?= $DISABILITY->DISABILITY_CODE; ?>"><?= $DISABILITY->DISABILITY_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="GuardianPrefixCode">สถานศึกษา</label>
                </div>
              </div>
              <h6 style="padding-left: 15px;" class="card-title">ข้อมูลการสำเร็จการศึกษา</h6>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                  <label for="JourneyTime">ปีการศึกษาที่สำเร็จการศึกษา</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="date" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                  <label for="JourneyTime">วันที่สำเร็จการศึกษา</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="DisabilityCode" id="DisabilityCode" aria-label="DisabilityCode">
                    <?php if ($STUDENT->DisabilityCode == '') { ?>
                      <option value="" selected>เลือก</option>
                    <?php }
                    $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                    foreach ($result->result() as $DISABILITY) {
                    ?>
                      <option <?php if ($STUDENT->DisabilityCode == $DISABILITY->DISABILITY_CODE) {
                                echo 'selected';
                              } ?> value="<?= $DISABILITY->DISABILITY_CODE; ?>"><?= $DISABILITY->DISABILITY_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="GuardianPrefixCode">ระดับการศึกษา</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="DisabilityCode" id="DisabilityCode" aria-label="DisabilityCode">
                    <?php if ($STUDENT->DisabilityCode == '') { ?>
                      <option value="" selected>เลือก</option>
                    <?php }
                    $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                    foreach ($result->result() as $DISABILITY) {
                    ?>
                      <option <?php if ($STUDENT->DisabilityCode == $DISABILITY->DISABILITY_CODE) {
                                echo 'selected';
                              } ?> value="<?= $DISABILITY->DISABILITY_CODE; ?>"><?= $DISABILITY->DISABILITY_NAME; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="GuardianPrefixCode">ชั้นเรียน</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="number" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                  <label for="JourneyTime">ลำดับการสำเร็จการศึกษา</label>
                </div>
              </div>



              <div class="d-flex justify-content-between">
                <a href="student?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                <button type="button" class="btn btn-warning" onclick="return check(Student)">แก้ไขข้อมูล</button>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h6>
                        <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
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
      $('#Modal').modal('show');
    }
  </script>

</main><!-- End #main -->