
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลรายงานผลการเรียนรู้รายบุคคล</h1>
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
              
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_LIKE" id="STUDENT_LIKE" placeholder="ความชอบ" maxlength="100">
                    <label >ความชอบ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_DREAM" id="STUDENT_DREAM" placeholder="ความฝัน" maxlength="100">
                    <label >ความฝัน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_HOPE" id="STUDENT_HOPE" placeholder="ความฝัน" maxlength="100">
                    <label >ความหวัง<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_TARGET" id="STUDENT_TARGET" placeholder="ความฝัน" maxlength="100">
                    <label >เป้าหมาย<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_LEARNING" id="STUDENT_LEARNING" placeholder="ความฝัน" maxlength="100">
                    <label >สิ่งที่ได้เรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_PROJECT" id="STUDENT_PROJECT" placeholder="ความฝัน" maxlength="100">
                    <label >ผลงาน <font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_GOODNESS" id="STUDENT_GOODNESS" placeholder="ความฝัน" maxlength="100">
                    <label >ความดี<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_USEFULNESS" id="STUDENT_USEFULNESS" placeholder="ความฝัน" maxlength="100">
                    <label >คุณประโยชน์<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_PRIDE" id="STUDENT_PRIDE" placeholder="ความฝัน" maxlength="100">
                    <label >ความภาคภูมิใจ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_SUMMARY" id="STUDENT_SUMMARY" placeholder="ความฝัน" maxlength="100">
                    <label >สรุป<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="" class="btn btn-danger" >ยกเลิก</a>
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
   if(frm.STUDENT_LIKE.value==""){
      alert("กรุณากรอกความชอบ")
      return false;
   }
   if(frm.STUDENT_DREAM.value==""){
      alert("กรุณากรอกความฝัน")
      return false;
   }
   if(frm.STUDENT_HOPE.value==""){
      alert("กรุณากรอกความหวัง")
      return false;
   }
   if(frm.STUDENT_TARGET.value==""){
      alert("กรุณากรอกเป้าหมาย")
      return false;
   }
   if(frm.STUDENT_LEARNING.value==""){
      alert("กรุณากรอกสิ่งที่ได้เรียนรู้")
      return false;
   }
   if(frm.STUDENT_PROJECT.value==""){
      alert("กรุณากรอกผลงาน")
      return false;
   }

    $('#Modal').modal('show');
    
  }

</script>    
</main><!-- End #main -->
