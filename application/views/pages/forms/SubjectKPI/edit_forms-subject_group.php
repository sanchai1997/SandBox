
<main id="main" class="main">
<?php foreach($SubjectGroup as $sg) { ?>
    <div class="pagetitle">
      <h1>แก้ไขกลุ่มสาระการเรียนรู้</h1>
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

              <h5 class="card-title"> </h5>

              <!-- start Form  -->
              <form class="row g-3" action="<?php echo base_url('edit_subject_group');?>" method="POST" name="editSubjectGroup" id="editSubjectGroup" enctype="multipart/form-data"> 
              <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $sg->SUBJECT_GROUP_CODE; ?>">

              <!-- 
                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="SUBJECT_GROUP_CODE"id="SUBJECT_GROUP_CODE"placeholder="รหัสกลุ่มสาระการเรียนรู้">
                    <label >รหัสกลุ่มสาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>
          -->
                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="SUBJECT_GROUP_NAME"id="SUBJECT_GROUP_NAME"placeholder="ชื่อกลุ่มสาระการเรียนรู้" value="<?php echo $sg->SUBJECT_GROUP_NAME; ?>">
                    <label >ชื่อกลุ่มสาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

              <!-- End Form -->
                <div class="d-flex justify-content-between">
                  <a href="list-subject_group" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(editSubjectGroup)">แก้ไขข้อมูล</button>
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
                                  <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                              </h6>
                          </div>
                          <div class="modal-footer">
                          <button type="submit" class="btn btn-warning" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>            
              </form>
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
  function check(frm){
/*
    //Check_SUBJECT_GROUP_CODE
    var check_text = /^[A-Z,a-z,ก-์,0-9]{1,11}$/;
    if(frm.SUBJECT_GROUP_CODE.value ==""){
        alert("กรุณากรอกรหัสกลุ่มสาระการเรียนรู้");
        frm.SUBJECT_GROUP_CODE.value = "";
        return false;
    }else if (!frm.SUBJECT_GROUP_CODE.value.match(SUBJECT_GROUP_CODE)){
        alert("กรุณากรอกรหัสกลุ่มสาระการเรียนรู้ให้ถูกต้อง");
        frm.SUBJECT_GROUP_CODE.value = "";
        return false;
    } 
*/
    //Check_SUBJECT_GROUP_NAME
    var check_text = /^[A-Z,a-z,ก-์,0-9]{1,100}$/;
    if(frm.SUBJECT_GROUP_NAME.value ==""){
        alert("กรุณากรอกชื่อกลุ่มสาระการเรียนรู้");
        frm.SUBJECT_GROUP_NAME.value = "";
        return false;
    }else if (!frm.SUBJECT_GROUP_NAME.value.match(check_text)){
        alert("กรุณากรอกชื่อกลุ่มสาระการเรียนรู้ให้ถูกต้อง");
        frm.SUBJECT_GROUP_NAME.value = "";
        return false;
    }

    $('#Modal').modal('show');
  }
</script>
<?php } ?>  
  </main><!-- End #main -->
