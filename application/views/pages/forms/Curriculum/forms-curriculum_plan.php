
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลแผนการเรียนรู้ - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                        ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                        <?php $Semester_code = $Curriculum[0]->Semester;
                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?> 
                                    - <?php echo $Subject[0]->SubjectName; ?> </h1></h1>
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

              <!-- start Form ข้อมูลแผนการเรียนรู้  -->
              <form class="row g-3" action="add_curriculum_plan?cid=<?php echo $CurriculumID; ?>&&sid=<?php echo $SubjectCode; ?>" method="POST" name="addCurriculum" id="addCurriculum" enctype="multipart/form-data"> 
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_NAME" id="PLAN_NAME" placeholder="ชื่อเรื่องของแผนการจัดการเรียนรู้/กิจกรรม" maxlength="100" >
                    <label >ชื่อเรื่องของแผนการจัดการเรียนรู้/กิจกรรม<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="EDUCATION_YEAR" id="EDUCATION_YEAR" placeholder="ปีการศึกษา (พ.ศ.)" maxlength="4">
                    <label >ปีการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>
            
                <div class="col-md-6">
                  <div class="form-floating">
                      <select class="form-select" aria-label="Default select example" name="SEMESTER" id="SEMESTER">
                        <option selected value="-1">เลือกภาคเรียน</option>
                        <option value="0">ตลอดปีการศึกษา</option>
                        <option value="1">ภาคเรียนที่ 1</option>
                        <option value="2">ภาคเรียนที่ 2</option>
                      </select>
                    <label >ภาคเรียน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_KEY" id="PLAN_KEY" placeholder="สาระสำคัญ" maxlength="100">
                    <label >สาระสำคัญของแผนการจัดการเรียนรู้/กิจกรรม<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_OBJECTIVE" id="PLAN_OBJECTIVE" placeholder="จุดประสงค์" maxlength="100">
                    <label >จุดประสงค์การเรียนรู้ของแผน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_CHARACTER" id="PLAN_CHARACTER" placeholder="คุณลักษณะอันพึงประสงค์" maxlength="100">
                    <label >คุณลักษณะอันพึงประสงค์<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_DETAILS" id="PLAN_DETAILS" placeholder="สาระการเรียนรู้" maxlength="100">
                    <label >สาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_PROCESS" id="PLAN_PROCESS" placeholder="กระบวนการจัดการเรียนรู้" maxlength="100">
                    <label >กระบวนการจัดการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_RECOMMEND" id="PLAN_RECOMMEND" placeholder="กิจกรรมเสนอแนะ" maxlength="100">
                    <label >กิจกรรมเสนอแนะ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_MEMO_TA" id="PLAN_MEMO_TA" placeholder="บันทึกข้อเสนอแนะจากผู้สอน" maxlength="100">
                    <label >บันทึกข้อเสนอแนะจากผู้สอน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="PLAN_MEMO_SV" id="PLAN_MEMO_SV" placeholder="บันทึกข้อเสนอแนะจากศึกษานิเทศก์" maxlength="100">
                    <label >บันทึกข้อเสนอแนะจากศึกษานิเทศก์<font color="red"> *</font></label>
                  </div>
                </div>

                

                <div class="d-flex justify-content-between">
                  <a href="list-curriculum_plan?cid=<?php echo $CurriculumID; ?>&&sid=<?php echo $SubjectCode; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(addCurriculum)">บันทึกข้อมูล</button>
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
              <!-- End Form ข้อมูลแผนการเรียนรู้  -->
            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
    //ชื่อเรื่องของแผนการจัดการเรียนรู้/กิจกรรม
    if(frm.PLAN_NAME.value==""){
      alert("กรุณากรอกชื่อเรื่องของแผนการจัดการเรียนรู้/กิจกรรม");
      return false;
    }
  //Check_EDUCATION_YEAR (ปีการศึกษา)
  var EDUCATION = /^[0-9]{4}$/;
    if(frm.EDUCATION_YEAR.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }else if (!frm.EDUCATION_YEAR.value.match(EDUCATION)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.EDUCATION_YEAR.value = "";
        return false;
    }

    //Check_SEMESTER (ภาคเรียน)
    if(frm.SEMESTER.value==-1){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
    //สาระสำคัญของแผนการจัดการเรียนรู้/กิจกรรม
    if(frm.PLAN_KEY.value==""){
      alert("กรุณากรอกสาระสำคัญ");
      return false;
    }
    //จุดประสงค์การเรียนรู้ของแผน
    if(frm.PLAN_OBJECTIVE.value==""){
      alert("กรุณากรอกจุดประสงค์การเรียนรู้ของแผน");
      return false;
    }
    //คุณลักษณะอันพึงประสงค์
    if(frm.PLAN_CHARACTER.value==""){
      alert("กรุณากรอกคุณลักษณะอันพึงประสงค์");
      return false;
    }
    //สาระการเรียนรู้
     if(frm.PLAN_DETAILS.value==""){
      alert("กรุณากรอกสาระการเรียนรู้");
      return false;
    }
    //กระบวนการจัดการเรียนรู้
     if(frm.PLAN_PROCESS.value==""){
      alert("กรุณากรอกกระบวนการจัดการเรียนรู้");
      return false;
    }
    //กิจกรรมเสนอแนะ
    if(frm.PLAN_RECOMMEND.value==""){
      alert("กรุณากรอกกิจกรรมเสนอแนะ");
      return false;
    }
    //บันทึกข้อเสนอแนะจากผู้สอน
    if(frm.PLAN_MEMO_TA.value==""){
      alert("กรุณากรอกบันทึกข้อเสนอแนะจากผู้สอน");
      return false;
    }
    //บันทึกข้อเสนอแนะจากศึกษานิเทศก์
    if(frm.PLAN_MEMO_SV.value==""){
      alert("กรุณากรอกบันทึกข้อเสนอแนะจากศึกษานิเทศก์");
      return false;
    }
    
    $('#Modal').modal('show');
    
   
  }

</script>    
</main><!-- End #main -->
