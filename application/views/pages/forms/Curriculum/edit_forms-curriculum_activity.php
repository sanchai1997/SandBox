<body onload="onloadpage()">
<main id="main" class="main">

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลกิจกรรม</h1>
    </div><!-- End Page Title -->
    <?php if($assignment !=  null) {?>
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
              <form class="row g-3" action="<?php echo base_url('edit_curriculum_activity');?>" method="POST" name="ACTIVITY" id="ACTIVITY" enctype="multipart/form-data"> 
                
              <?php foreach ($curriculum_activity as $ac) {?>
              <input type="hidden" class="form-control" name="PLAN_ID" id="PLAN_ID"value="<?php echo $PLAN_ID?>">
              <input type="hidden" class="form-control" name="ACTIVITY_ID" id="ACTIVITY_ID" value="<?php echo $ac->ACTIVITY_ID ?>">
              <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
              <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">
              <input type="hidden" name="checkstatus" id="checkstatus" value="1">
             
              
             
              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ACTIVITY_NAME" id="ACTIVITY_NAME" placeholder="ชื่อกิจกรรม" maxlength="100" value="<?php echo$ac->ACTIVITY_NAME ?>">
                    <label >ชื่อกิจกรรม<font color="red"> *</font></label>
                  </div>
                </div>
                <?php } ?>
                
               
                <?php foreach ($assignment as $as) {?>

                <input type="hidden" class="form-control" name="ASSESSMENT_ID" id="ASSESSMENT_ID"  value="<?php echo $as->ASSESSMENT_ID  ?>">
                <div class="pagetitle">
                  <h5 class="card-title">การวัดและประเมินผล</h5>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ASSESSMENT_NAME" id="ASSESSMENT_NAME" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" value="<?php echo $as->ASSESSMENT_NAME  ?>">
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
                    <select class="form-select" aria-label="Default select example" name="ASSESSMENT_TOOL_CODE" id="ASSESSMENT_TOOL_CODE">
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
              <?php foreach ($score as $s) {?>
                <input type="hidden" class="form-control" name="SCORE_ID" id="SCORE_ID" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" value="<?php echo $s->SCORE_ID  ?>">
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SCORE_TEACHER" id="SCORE_TEACHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" value="<?php echo $s->SCORE_TEACHER  ?>">
                    <label >สัดส่วนการประเมินโดยผู้สอน<font color="red"> *</font></label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SCORE_PARENT" id="SCORE_PARENT" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" value="<?php echo $s->SCORE_PARENT ?>">
                    <label >สัดส่วนการประเมินโดยผู้ปกครอง<font color="red"> *</font></label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SCORE_OTHER" id="SCORE_OTHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255"  value="<?php echo $s->SCORE_OTHER ?>">
                    <label >สัดส่วนการประเมินโดยบุคลากรอื่น<font color="red"> *</font></label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                      <select class="form-select" aria-label="Default select example" name="FUNDAMENTAL_SUBJECT_PASSING_CODE" id="FUNDAMENTAL_SUBJECT_PASSING_CODE"  value="<?php echo $s->SCORE_SUM_TOTAL?>">
                        <option selected value="-1">เลือกผลการตัดสินรายวิชาพื้นฐาน</option>
                        <?php foreach($CLS_FUNDAMENTAL_SUBJECT_PASSING as $sjp) { ?> 
                          <option value="<?php echo $sjp->FUNDAMENTAL_SUBJECT_PASSING_CODE;?>"> <?php echo $sjp->FUNDAMENTAL_SUBJECT_PASSING_NAME;?></option>  
                          <?php } ?>
                      </select>
                    <label >ผลการตัดสินรายวิชาพื้นฐาน<font color="red"> *</font></label>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <a href="list-curriculum_activity?pid=<?php echo $PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="submit" class="btn btn-warning" onclick="return check(ACTIVITY)">แก้ไขข้อมูล</button>
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

function onloadpage(){
   ///ASSESSMENT_PEOPLE_ID
   var my_ASSESSMENT_PEOPLE_ID = "<?php echo $as->ASSESSMENT_PEOPLE_ID; ?>";
   var selectoption_ASSESSMENT_PEOPLE_ID = document.querySelector('#ASSESSMENT_PEOPLE_ID');
   var size_my_ASSESSMENT_PEOPLE_ID =  document.getElementById("ASSESSMENT_PEOPLE_ID").options.length;
   for (let i = 0; i < size_my_ASSESSMENT_PEOPLE_ID; i++) {
     if(selectoption_ASSESSMENT_PEOPLE_ID[i].value==my_ASSESSMENT_PEOPLE_ID){
      selectoption_ASSESSMENT_PEOPLE_ID[i].selected = true;
        break;
     }
   }
  ///ASSESSMENT_TOOL_CODE
   var my_ASSESSMENT_TOOL_CODE = "<?php echo $as->ASSESSMENT_TOOL_CODE; ?>";
   var selectoption_ASSESSMENT_TOOL_CODE = document.querySelector('#ASSESSMENT_TOOL_CODE');
   var size_my_ASSESSMENT_TOOL_CODE =  document.getElementById("ASSESSMENT_TOOL_CODE").options.length;
   for (let i = 0; i < size_my_ASSESSMENT_TOOL_CODE; i++) {
     if(selectoption_ASSESSMENT_TOOL_CODE[i].value==my_ASSESSMENT_TOOL_CODE){
      selectoption_ASSESSMENT_TOOL_CODE[i].selected = true;
        break;
     }
   }
  ///FUNDAMENTAL_SUBJECT_PASSING_CODE
   var my_FUNDAMENTAL_SUBJECT_PASSING_CODE = "<?php echo $s->FUNDAMENTAL_SUBJECT_PASSING_CODE; ?>";
   var selectoption_FUNDAMENTAL_SUBJECT_PASSING_CODE = document.querySelector('#FUNDAMENTAL_SUBJECT_PASSING_CODE');
   var size_my_FUNDAMENTAL_SUBJECT_PASSING_CODE =  document.getElementById("FUNDAMENTAL_SUBJECT_PASSING_CODE").options.length;
   for (let i = 0; i < size_my_FUNDAMENTAL_SUBJECT_PASSING_CODE; i++) {
     if(selectoption_FUNDAMENTAL_SUBJECT_PASSING_CODE[i].value==my_FUNDAMENTAL_SUBJECT_PASSING_CODE){
      selectoption_FUNDAMENTAL_SUBJECT_PASSING_CODE[i].selected = true;
        break;
     }
   }
   
  }


  function check(frm){
    if(frm.ACTIVITY_NAME.value==""){
      alert("กรุณากรอกชื่อกิจกรรม")
      return false;
   }
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
    if(frm.SCORE_TEACHER.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยผู้สอน");
      return false;
    }
    if(frm.SCORE_PARENT.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยผู้ปกครอง");
      return false;
    }
    if(frm.SCORE_OTHER.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยบุคลากรอื่น");
      return false;
    }
    if(frm.FUNDAMENTAL_SUBJECT_PASSING_CODE.value==-1){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยบุคลากรอื่น");
      return false;
    }

    $('#Modal').modal('show');
    

    $('#Modal').modal('show');
    
  }

</script>  

<?php } ?> 
<?php }else{ ?>  
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
              <form class="row g-3" action="<?php echo base_url('edit_curriculum_activity');?>" method="POST" name="ACTIVITY" id="ACTIVITY" enctype="multipart/form-data"> 
                
              <?php foreach ($curriculum_activity as $ac) {?>
              <input type="hidden" class="form-control" name="PLAN_ID" id="PLAN_ID"value="<?php echo $PLAN_ID?>">
              <input type="hidden" class="form-control" name="ACTIVITY_ID" id="ACTIVITY_ID" value="<?php echo $ac->ACTIVITY_ID ?>">
              <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
              <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">
              <input type="hidden" name="checkstatus" id="checkstatus" value="0">
              
             
              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ACTIVITY_NAME" id="ACTIVITY_NAME" placeholder="ชื่อกิจกรรม" maxlength="100" value="<?php echo$ac->ACTIVITY_NAME ?>">
                    <label >ชื่อกิจกรรม<font color="red"> *</font></label>
                  </div>
                </div>
                <?php } ?>
                
               
                
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
                    <select class="form-select" aria-label="Default select example" name="ASSESSMENT_TOOL_CODE" id="ASSESSMENT_TOOL_CODE">
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
                    <input type="text" class="form-control" name="SCORE_TEACHER" id="SCORE_TEACHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" >
                    <label >สัดส่วนการประเมินโดยผู้สอน<font color="red"> *</font></label>
                  </div>
                </div>
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="SCORE_PARENT" id="SCORE_PARENT" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" >
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
                      <select class="form-select" aria-label="Default select example" name="FUNDAMENTAL_SUBJECT_PASSING_CODE" id="FUNDAMENTAL_SUBJECT_PASSING_CODE" >
                        <option selected value="-1">เลือกผลการตัดสินรายวิชาพื้นฐาน</option>
                        <?php foreach($CLS_FUNDAMENTAL_SUBJECT_PASSING as $sjp) { ?> 
                          <option value="<?php echo $sjp->FUNDAMENTAL_SUBJECT_PASSING_CODE;?>"> <?php echo $sjp->FUNDAMENTAL_SUBJECT_PASSING_NAME;?></option>  
                          <?php } ?>
                      </select>
                    <label >ผลการตัดสินรายวิชาพื้นฐาน<font color="red"> *</font></label>
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
    if(frm.SCORE_TEACHER.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยผู้สอน");
      return false;
    }
    if(frm.SCORE_PARENT.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยผู้ปกครอง");
      return false;
    }
    if(frm.SCORE_OTHER.value==""){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยบุคลากรอื่น");
      return false;
    }
    if(frm.FUNDAMENTAL_SUBJECT_PASSING_CODE.value==-1){
      alert("กรุณาเลือกสัดส่วนการประเมินโดยบุคลากรอื่น");
      return false;
    }

    $('#Modal').modal('show');
    
  }

</script>  

<?php } ?> 
</main><!-- End #main -->
