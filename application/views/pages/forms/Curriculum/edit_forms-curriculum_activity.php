
<main id="main" class="main">

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลกิจกรรม</h1>
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
        <?php foreach ($curriculum_activity as $ac) {?>


              <!-- start Form ข้อมูลกิจกรรม  -->
              <form class="row g-3" action="<?php echo base_url('edit_curriculum_activity');?>" method="POST" name="ACTIVITY" id="ACTIVITY" enctype="multipart/form-data"> 
                

              <input type="hidden" class="form-control" name="PLAN_ID" id="PLAN_ID"value="<?php echo $PLAN_ID?>">
              <input type="hidden" class="form-control" name="ACTIVITY_ID" id="ACTIVITY_ID" value="<?php echo $ac->ACTIVITY_ID ?>">
              <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
              <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">
              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ACTIVITY_NAME" id="ACTIVITY_NAME" placeholder="ชื่อกิจกรรม" maxlength="100" value="<?php echo$ac->ACTIVITY_NAME ?>">
                    <label >ชื่อกิจกรรม</label>
                  </div>
                </div>


                

                <div class="d-flex justify-content-between">
                  <a href="list-curriculum_activity?pid=<?php echo $PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(ACTIVITY)">แก้ไขข้อมูล</button>
                </div> 
               <!-- Modal -->
               <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h6>
                                  <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                              </h6>
                          </div>
                          <div class="modal-footer">
                          <div class="text-center">
                            <button type="submit" class="btn btn-warning" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>  
             </form>
             <?php } ?>
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
