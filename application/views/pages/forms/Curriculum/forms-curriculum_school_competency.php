
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลสมรรถนะของหลักสูตร </h1>
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

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
              <form class="row g-3" action="<?php echo base_url('add_curriculum_school_competency');?>" method="POST" name="addCurriculumCompetency" id="addCurriculumCompetency" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
                <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">
               
                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="CompetencyCode" id="CompetencyCode">
                      <option selected value="-1">เลือกสมรรถนะ</option>
                      <?php foreach($listCompetency as $ls) { ?>
                        <option value="<?php echo $ls->COMPETENCY_CODE; ?>"><?php echo $ls->COMPETENCY_NAME; ?></option>
                      <?php } ?> 
                    </select>    
                    <label>สมรรถนะ<font color="red"> *</font></label>
                  </div>
                </div>

              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->
                <div class="d-flex justify-content-between">
                <a href="list-curriculum_school_competency?cid=<?php echo $CurriculumID; ?>&&sid=<?php echo $SubjectCode; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(addCurriculumCompetency)">บันทึกข้อมูล</button>
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
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
  function check(frm2){

     //Check_CompetencyCode(สมรรถนะ)
     if(frm2.CompetencyCode.value==-1){
      alert("กรุณาเลือกสมรรถนะ");
      return false;
    }   
    $('#Modal').modal('show');
  }
</script>

  </main><!-- End #main -->
