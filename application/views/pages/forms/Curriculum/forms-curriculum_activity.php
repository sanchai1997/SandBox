@@ -1,95 +0,0 @@
<body onload="onloadpage()">
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
                

              <input type="hidden" name="PLAN_ID" id="PLAN_ID"value="<?php echo $PLAN_ID?>">
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
                      <select class="form-select" aria-label="Default select example" name="ASSESSMENT_TOOL_CODE" id="ASSESSMENT_TOOL_CODE" >
                        <option selected value="-1">เลือกเครื่องมือการประเมิน</option>
                          <option value="0">แบบสังเกตพฤติกรรม</option>
                          <option value="1">แบบประเมิน</option>
                      </select>    
                      <label>เครื่องมือการประเมิน<font color="red"> *</font></label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <legend class="col-form-label col-sm-3 pt-0">ผู้ประเมิน<font color="red"> *</font></legend>
                    <div class="col-sm-9">
                        <div style="padding-left: 50px;" class="form-check">
                            <input class="form-check-input" value="SCORE_TEACHER" type="checkbox" id="gridCheck1"  name="ASSESSMENT_PEOPLE_ID">
                            <label class="form-check-label" for="gridCheck1">
                                ครู
                            </label>
                        </div>

                        <div style="padding-left: 50px;" class="form-check">
                            <input class="form-check-input" value="SCORE_PARENT" type="checkbox" id="gridCheck1"  name="ASSESSMENT_PEOPLE_ID">
                            <label class="form-check-label" for="gridCheck1">
                                ผู้ปกครอง
                            </label>
                        </div>

                        <div style="padding-left: 50px;" class="form-check">
                            <input class="form-check-input" value="SCORE_OTHER" type="checkbox" id="gridCheck1"  name="ASSESSMENT_PEOPLE_ID">
                            <label class="form-check-label" for="gridCheck1">
                                บุคลากรอื่น
                            </label>
                        </div>

                    </div>
                  </div>

                <div class="pagetitle">
                  <h5 class="card-title">การวัดผลมาตรฐานกลาง</h5>
                </div>

                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control score" name="SCORE_TEACHER" id="SCORE_TEACHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" ">
                      <label >สัดส่วนการประเมินโดยผู้สอน<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control score" name="SCORE_PARENT" id="SCORE_PARENT" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" ">
                      <label >สัดส่วนการประเมินโดยผู้ปกครอง<font color="red"> *</font></label>
                    </div>
                  </div>
                  <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control score" name="SCORE_OTHER" id="SCORE_OTHER" placeholder="ชื่อการวัดและประเมินผล" maxlength="255" ">
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
  $(document).ready(function () {
    $('.form-check-input').change(function () {
        $('input[name=' + this.value + ']')[0].disabled = !this.checked;
        if( $('input[name=' + this.value + ']')[0].disabled == true){
          document.getElementById(this.value).value = "";
          let totalScore = 0;
          $(document).find("input.score").each(function(){
            if($(this).prop('disabled')==false){
                num= $(this).val();
              if(num=='') num=0;
              totalScore += parseFloat(num);
            }
          
          })
          document.getElementById("SCORE_SUM_TOTAL").value = totalScore;
        }
   
    }).change();

  });

  $('.score').on('keyup', function () {
   let totalScore = 0;
    $(document).find("input.score").each(function(){
      if($(this).prop('disabled')==false){
          num= $(this).val();
        if(num=='') num=0;
        totalScore += parseFloat(num);
      }
    
   })
   document.getElementById("SCORE_SUM_TOTAL").value = totalScore;
});


  function check(frm){
   if(frm.ACTIVITY_NAME.value==""){
      alert("กรุณากรอกชื่อกิจกรรม")
      return false;
   }

   if(frm.ASSESSMENT_NAME.value==""){
      alert("กรุณากรอกชื่อการวัดและประเมินผลม")
      return false;
   }
    if(frm.ASSESSMENT_TOOL_CODE.value==-1){
      alert("กรุณาเลือกเครื่องมือการประเมิน");
      return false;
    }
    if(frm.ASSESSMENT_PEOPLE_ID.value==-1){
      alert("กรุณาเลือกผู้ประเมิน");
      return false;
    }

    var checkboxs=document.getElementsByName("ASSESSMENT_PEOPLE_ID");
    var okay=false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=true;
            break;
        }
    }
    if(okay==false){
      alert("กรุณาเลือกผู้ประเมินอย่างน้อย 1 คน");
      return false;
    }

    var SCORE = /^[0-9]*[.]?[0-9]$/;

    const SCORE_TEACHER = document.getElementById('SCORE_TEACHER');
    if ( (SCORE_TEACHER.disabled == false) && (!frm.SCORE_TEACHER.value.match(SCORE)) ) {
      alert("กรุณากรอกสัดส่วนการประเมินโดยผู้สอนให้ถูกต้อง");
      return false;
    }

    const SCORE_PARENT = document.getElementById('SCORE_PARENT');
    if ( (SCORE_PARENT.disabled == false) && (!frm.SCORE_PARENT.value.match(SCORE)) ) {
      alert("กรุณากรอกสัดส่วนการประเมินโดยผู้ปกครองให้ถูกต้อง");
      return false;
    }

    const SCORE_OTHER = document.getElementById('SCORE_OTHER');
    if ( (SCORE_OTHER.disabled == false) && (!frm.SCORE_OTHER.value.match(SCORE)) ) {
      alert("กรุณากรอกสัดส่วนการประเมินโดยบุคลากรอื่นให้ถูกต้อง");
      return false;
    }

    if(frm.SCORE_SUM_TOTAL.value>100){
      alert("คะแนนรวมต้องไม่เกิน 100");
      return false;
    }

    
      

    $('#Modal').modal('show');
    
  }

</script>    
</main><!-- End #main -->