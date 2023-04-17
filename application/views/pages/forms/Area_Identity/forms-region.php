<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลการนับถือศาสนาในพื้นที่</h1>
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
              <form class="row g-3" action="<?php echo base_url('add-Region');?>" method="POST" name="AREA_IDENTITY_RELIGION" id="AREA_IDENTITY_RELIGION" enctype="multipart/form-data">

              <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $SchoolID ?>">
              <input type="hidden" class="form-control"name="EducationYear"id="EducationYear" value="<?php echo $EducationYear; ?>">
              <input type="hidden" class="form-control"name="Semester"id="Semester" value="<?php echo $Semester; ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="AreaReligionCode" id="AreaReligionCode">
                      <option selected value="-1">เลือกศาสนา</option>
                      <?php foreach($listReligion as $lr) { ?>
                        <option value="<?php echo $lr->RELIGION_CODE; ?>"><?php echo $lr->RELIGION_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>ศาสนา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaReligionPercentage"id="AreaReligionPercentage" placeholder="ร้อยละของแต่ละศาสนา">
                    <label >ร้อยละของแต่ละศาสนา<font color="red"> *  <?php if ($limit_AreaReligionPercentage>0) { ?>ต้องไม่เกิน <?php echo $limit_AreaReligionPercentage; }  ?></font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="list-area_identity_by_school?sid=<?php echo $SchoolID?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(AREA_IDENTITY_RELIGION)">บันทึกข้อมูล</button>
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


               

              </form><!-- End Form ข้อมูลการนับถือศาสนาในพื้นที่ -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
<script>
  function check(frm){

    if(frm.AreaReligionCode.value==-1){
      alert("กรุณาเลือกศาสนา");
      return false;
    }
    var Percentag = /^(?:\d{1,3}(?:\.\d{0,2})?|\d{1,3})$/; 
    if(frm.AreaReligionPercentage.value ==""){
        alert("กรุณากรอกร้อยละของแต่ละศาสนา");
        frm.AreaReligionPercentage.value = "";
        return false;
    }else if (!frm.AreaReligionPercentage.value.match(Percentag) || frm.AreaReligionPercentage.value>100 ){
        alert("กรุณากรอกร้อยละของแต่ละศาสนาให้ถูกต้อง");
        frm.AreaReligionPercentage.value = "";
        return false;
    }
    <?php if ($limit_AreaReligionPercentage>0) { ?>
      if (frm.AreaReligionPercentage.value><?php echo $limit_AreaReligionPercentage; ?>){
          alert("ร้อยละของแต่ละศาสนาต้องไม่เกิน<?php echo $limit_AreaReligionPercentage; ?>");
          frm.AreaReligionPercentage.value = "";
          return false;
      }
    <?php } ?>

    $('#Modal').modal('show');  
  }
     
</script>

  </main><!-- End #main -->