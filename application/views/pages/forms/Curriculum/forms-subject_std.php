
<main id="main" class="main">

    <div class="pagetitle">
      <h1>มาตรฐานการเรียนรู้ </h1>
      </nav>
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

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
              <form class="row g-3" action="<?php echo base_url('add_subject_std');?>" method="POST" name="subjectStd" id="subjectStd" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
                <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">

                
                <div class="col-md-16" >
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="SubjectGroupCode" id="SubjectGroupCode" >
                      <option selected value="-1" >เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
                      <option value="09" >09 : กิจกรรมพัฒนาผู้เรียน</option>
                      <option value="10" >10 : การศึกษาค้นคว้าด้วยตนเอง (IS)</option>
                    </select>
                    <label>มาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16" >
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SUBJECT_STD_ID"id="SUBJECT_STD_ID" placeholder="รหัสมาตรฐานการเรียนรู้">
                    <label>รหัสมาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SUBJECT_STD_DETAILS"id="SUBJECT_STD_DETAILS" placeholder="มาตรฐานการเรียนรู้">
                    <label>มาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>


              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->
                <div class="d-flex justify-content-between">
                  <?php if( $SubjectCode == null){ ?>
                    <a href="forms-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-danger">ยกเลิก</a>
                  <?php }else{ ?>
                    <a href='edit_forms-curriculum_subject?sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>'  class="btn btn-danger">ยกเลิก</a>
                    <?php } ?>
                    <button type="button" class="btn btn-primary" onclick="return check(subjectStd)">บันทึกข้อมูล</button>
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
                              <button type="submit" class="btn btn-primary click" >ยืนยัน</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>
             </form>
<!-- End Form ข้อมูลหลักสูตรรายวิชา -->

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
      
    function check(frm2){

    //Check_SubjectGroupCode(กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง)
    if(frm2.SubjectGroupCode.value==-1){
      alert("กรุณาเลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง");
      return false;
    }
    
    var Check_STD_ID = /^.{1,10}$/;

    if(frm2.SUBJECT_STD_ID.value==""){
        alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm2.SUBJECT_STD_ID.value.match(Check_text)){
      alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้ให้ถูกต้อง");
      return false;
    }

    var Check_text = /^.{1,2048}$/;
    if(frm2.SUBJECT_STD_DETAILS.value==""){
        alert("กรุณากรอกมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm2.SUBJECT_STD_DETAILS.value.match(Check_text)){
      alert("กรุณากรอกมาตรฐานการเรียนรู้ให้ถูกต้อง");
      return false;
    }


    $('#Modal').modal('show');
    
  }
</script>

  </main><!-- End #main -->
