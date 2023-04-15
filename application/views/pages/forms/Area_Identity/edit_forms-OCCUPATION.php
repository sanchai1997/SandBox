<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($OCCUPATION as $o) { ?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลการประกอบอาชีพในพื้นที่</h1>
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
              <form class="row g-3" action="<?php echo base_url('edit-OCCUPATION');?>" method="POST" name="AREA_IDENTITY_OCCUPATION" id="AREA_IDENTITY_OCCUPATION" enctype="multipart/form-data">

              <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $o->SchoolID ?>">
              <input type="hidden" class="form-control"name="EducationYear"id="EducationYear" value="<?php echo $o->EducationYear; ?>">
              <input type="hidden" class="form-control"name="Semester"id="Semester" value="<?php echo $o->Semester; ?>">
              <input type="hidden" class="form-control"name="OLDAreaOccupationCode"id="OLDAreaOccupationCode" value="<?php echo $o->AreaOccupationCode; ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="AreaOccupationCode" id="AreaOccupationCode">
                  <option selected value="-1">เลือกกลุ่มอาชีพ</option>
                      <?php foreach($listOCCUPATION as $lo) { ?>
                        <option value="<?php echo $lo->OCCUPATION_CODE; ?>"><?php echo $lo->OCCUPATION_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>กลุ่มอาชีพ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaOccupationPercentage"id="AreaOccupationPercentage" placeholder="ร้อยละของแต่ละกลุ่มอาชีพ" value="<?php echo $o->AreaOccupationPercentage; ?>">
                    <label >ร้อยละของแต่ละกลุ่มอาชีพ<font color="red"> *  <?php if ($limit_AreaOccupationPercentage>0) { ?>ต้องไม่เกิน <?php echo $limit_AreaOccupationPercentage; }  ?></font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="list-area_identity_by_school?sid=<?php echo $o->SchoolID?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <i class=" bi bi-trash"></i>
                  <button type="button" class="btn btn-warning" onclick="return check(AREA_IDENTITY_OCCUPATION)">แก้ไขข้อมูล</button>
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
                              <button type="submit" class="btn btn-warning click" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>  

               <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>
                                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                    <a href="delete_OCCUPATION?y=<?php echo $o->EducationYear; ?>&&s=<?php echo $o->Semester; ?>&&sid=<?php echo $o->SchoolID; ?>&&rid=<?php echo $o->AreaOccupationCode; ?>" class="btn btn-danger">ลบ</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                </div>


               

              </form><!-- End Form ข้อมูลการนับถือกลุ่มอาชีพในพื้นที่ -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
<script>
     function onloadpage(){

      ///region
      var my_AreaOccupationCode = "<?php echo $o->AreaOccupationCode; ?>";
      var selectoption_AreaOccupationCode = document.querySelector('#AreaOccupationCode');
      var size_my_AreaOccupationCode =  document.getElementById("AreaOccupationCode").options.length;
      for (let i = 0; i < size_my_AreaOccupationCode; i++) {
          if(selectoption_AreaOccupationCode[i].value==my_AreaOccupationCode){
          selectoption_AreaOccupationCode[i].selected = true;
              break;
          }
      }
    }
  function check(frm){

    if(frm.AreaOccupationCode.value==-1){
      alert("กรุณาเลือกกลุ่มอาชีพ");
      return false;
    }
    var Percentag = /^(?:\d{1,3}(?:\.\d{0,2})?|\d{1,3})$/; 
    if(frm.AreaOccupationPercentage.value ==""){
        alert("กรุณากรอกร้อยละของแต่ละกลุ่มอาชีพ");
        frm.AreaOccupationPercentage.value = "";
        return false;
    }else if (!frm.AreaOccupationPercentage.value.match(Percentag) || frm.AreaOccupationPercentage.value>100 ){
        alert("กรุณากรอกร้อยละของแต่ละกลุ่มอาชีพห้ถูกต้อง");
        frm.AreaOccupationPercentage.value = "";
        return false;
    }
    if (frm.AreaOccupationPercentage.value><?php echo $limit_AreaOccupationPercentage; ?>){
        alert("ร้อยละของแต่ละกลุ่มอาชีพต้องไม่เกิน<?php echo $limit_AreaOccupationPercentage; ?>");
        frm.AreaOccupationPercentage.value = "";
        return false;
    }

    $('#Modal').modal('show');  
  }
     
</script>
<?php } ?> 
  </main><!-- End #main -->