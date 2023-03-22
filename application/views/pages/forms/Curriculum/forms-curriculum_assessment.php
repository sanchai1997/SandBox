
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลการวัดและประเมินผล</h1>
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

              <!-- start Form การวัดและประเมินผล  -->
              <form class="row g-3" action="<?php echo base_url('add_curriculum_assessment');?>" method="POST" name="assessment" id="assessment" enctype="multipart/form-data"> 
                

              <input type="hidden" class="form-control" name="ACTIVITY_ID" id="ACTIVITY_ID"value="<?php echo $ACTIVITY_ID?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ASSESSMENT_NAME" id="ASSESSMENT_NAME" placeholder="ชื่อการวัดและประเมินผล" maxlength="255">
                    <label >ชื่อการวัดและประเมินผล</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="ASSESSMENT_PEOPLE_ID" id="ASSESSMENT_PEOPLE_ID">
                      <option selected value="-1">เลือกผู้ประเมิน</option>
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
                    <select class="form-select" aria-label="Default select example" name="ASSESSMENT_TOOL_CODE" id="ASSESSMENT_TOOL_CODE">
                      <option selected value="-1">เลือกเครื่องมือการประเมิน</option>
                        <option value="0">แบบสังเกตพฤติกรรม</option>
                        <option value="1">แบบประเมิน</option>
                    </select>    
                    <label>เครื่องมือการประเมิน<font color="red"> *</font></label>
                  </div>
                </div>

                

                <div class="d-flex justify-content-between">
                  <a href="" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(assessment)">บันทึกข้อมูล</button>
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
              <!-- End Form การวัดและประเมินผล  -->
            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
   if(frm.ASSESSMENT_NAME.value==""){
      alert("กรุณากรอกชื่อการวัดและประเมินผลม")
      return false;
   }
   if(frm.ASSESSMENT_PEOPLE_ID.value==-1){
      alert("กรุณาเลือกผู้ประเมิน");
      return false;
    }
    if(frm.ASSESSMENT_TOOL_CODE.value==-1){
      alert("กรุณาเลือกเครื่องมือการประเมิน");
      return false;
    }

    $('#Modal').modal('show');
    
  }

</script>    
</main><!-- End #main -->
