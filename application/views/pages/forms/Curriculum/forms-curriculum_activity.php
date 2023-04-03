@@ -1,95 +0,0 @@

<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลกิจกรรม</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <!-- Alert -->
      <?php if (!empty($_SESSION['errors'])) { ?>
      <div class="row">
        <div class="col-lg-9">
          <div class="alert alert-danger" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
              <strong>
                  <?php
                  echo '<i class="bi bi-exclamation-circle-fill"></i> '. $_SESSION['errors'];
                  unset($_SESSION['errors']);
                  ?>
              </strong>
          </div> 
        </div>
      </div>
      <?php } ?>  

      <div class="row">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- start Form ข้อมูลกิจกรรม  -->
              <form class="row g-3" action="<?php echo base_url('add_curriculum_activity');?>" method="POST" name="ACTIVITY" id="ACTIVITY" enctype="multipart/form-data"> 
                

              <input type="hidden" class="form-control" name="PLAN_ID" id="PLAN_ID"value="<?php echo $PLAN_ID?>">
              <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
              <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ACTIVITY_NAME" id="ACTIVITY_NAME" placeholder="ชื่อกิจกรรม" maxlength="100">
                    <label >ชื่อกิจกรรม<font color="red"> *</font></label>
                  </div>
                  </div>

                    <div class="pagetitle">
                    <h5 class="card-title">การวัดและประเมินผล</h5>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="ASSESSMENT_NAME" id="ASSESSMENT_NAME" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" >
                      <label >ชื่อการวัดและประเมินผล<font color="red"> *</font></label>
                    </div>
                  </div>

                  <div class="col-md-16">
                    <div class="form-floating">
                      <select class="form-select" aria-label="Default select example" name="ASSESSMENT_PEOPLE_ID" id="ASSESSMENT_PEOPLE_ID">
                          <option value="-1" selected  >กรุณาเลือกผู้ประเมิน</option>    
                          <option value="0">ครู</option>
                          <option value="1">นักเรียน</option>
                          <option value="2">ผู้ปกครอง</option>
                          <option value="3">อื่นๆ</option>
                      </select>    
                      <label>ผู้ประเมิน<font color="red"> *</font></label>
                    </div>
                  </div>

                  <div class="col-md-16">
                    <div class="form-floating">
                      <select class="form-select" aria-label="Default select example" name="ASSESSMENT_TOOL_CODE" id="ASSESSMENT_TOOL_CODE" >
                        <option selected value="-1">เลือกเครื่องมือการประเมิน</option>
                          <option value="0">แบบสังเกตพฤติกรรม</option>
                          <option value="1">แบบประเมิน</option>
                      </select>    
                      <label>เครื่องมือการประเมิน<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="pagetitle">
                  <h5 class="card-title">การวัดผลมาตรฐานกลาง</h5>
                </div>

                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SCORE_TEACHER" id="SCORE_TEACHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255">
                      <label >สัดส่วนการประเมินโดยผู้สอน<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SCORE_PARENT" id="SCORE_PARENT" placeholder="ชื่อการวัดและประเมินผล" maxlength="255">
                      <label >สัดส่วนการประเมินโดยผู้ปกครอง<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SCORE_OTHER" id="SCORE_OTHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" >
                      <label >สัดส่วนการประเมินโดยบุคลากรอื่น<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SCORE_SUM_TOTAL" id="SCORE_SUM_TOTAL" placeholder="คะแนนรวม (เต็ม 100)" maxlength="255" disabled>
                      <label >คะแนนรวม</label>
                    </div>
                  </div>
                  
                

                

                <div class="d-flex justify-content-between">
                <a href="list-curriculum_plan?cid=<?php echo $CurriculumID; ?>&&sid=<?php echo $SubjectCode; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(ACTIVITY)">บันทึกข้อมูล</button>
                </div> 
               <!-- Modal -->
               <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการเพิ่มข้อมูล</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h6>
                                  <center>คุณต้องการเพิ่มข้อมูลใช่หรือไหม ?</center>
                              </h6>
                          </div>
                          <div class="modal-footer">
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary" >ยืนยัน</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>  
             </form>
              <!-- End Form ข้อมูลกิจกรรม  -->
            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
   if(frm.ACTIVITY_NAME.value==""){
      alert("กรุณากรอกชื่อกิจกรรม")
      return false;
   }

    $('#Modal').modal('show');
    
  }

</script>    
</main><!-- End #main -->