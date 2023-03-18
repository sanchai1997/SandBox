<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($TeacherDevelopmentActivity as $TD) { ?>
    <div class="pagetitle">
    <h1>
    แก้ไขข้อมูลการพัฒนาบุคลากร
      </h1>
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
              <h5 class="card-title">ข้อมูลการพัฒนาบุคลากร</h5>

              <!-- start Form ข้อมูลการพัฒนาบุคลากรครู -->
              <form class="row g-3" action="<?php echo base_url('edit_teacher_development_activity');?>" method="POST" name="teacher_developmant_activity" id="teacher_developmant_activity" enctype="multipart/form-data">
                <input type="hidden" name="Old_TeacherID" id="Old_TeacherID" value="<?php echo $TD->TeacherID; ?>">
                <input type="hidden" name="Old_DevelopmentActivityName" id="Old_DevelopmentActivityName" value="<?php echo $TD->DevelopmentActivityName ; ?>">
                <input type="hidden" name="Old_DevelopmentActivityStartDate" id="Old_DevelopmentActivityStartDate " value="<?php echo $TD->DevelopmentActivityStartDate; ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityEducationYear"id="DevelopmentActivityEducationYear" placeholder="ปีการศึกษา" maxlength="4" value="<?php echo $TD->DevelopmentActivityEducationYear; ?>">
                    <label >ปีการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="DevelopmentActivitySemester" id="DevelopmentActivitySemester">       
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ภาคเรียนที่ทำกิจกรรม</label>
                  </div>
                </div>
                
       
                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example"  name="TeacherID"id="TeacherID">
                        <?php foreach($listTeacher as $lt) { ?>
                          <option value="<?php echo $lt->TeacherID; ?>"><?php echo " (" . $lt->TeacherID . ") " . $lt->TeacherNameThai; ?></option>
                        <?php } ?>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ครูและบุคลากรทางการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example"  name="DevelopmentActivityTypeCode"id="DevelopmentActivityTypeCode">
                      <?php foreach($listDevelopmentActivityType as $lAT) { ?>
                          <option value="<?php echo $lAT->TEACHER_DEVELOPMENT_ACTIVITY_TYPE_CODE; ?>"><?php echo $lAT->TEACHER_DEVELOPMENT_ACTIVITY_TYPE_NAME; ?></option>
                        <?php } ?>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ประเภทกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text"  class="form-control"name="DevelopmentActivityName"id="DevelopmentActivityName" placeholder="ชื่อกิจกรรม" value="<?php echo $TD->DevelopmentActivityName; ?>">
                    <label >ชื่อกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityHour"id="DevelopmentActivityHour" placeholder="จำนวนชั่วโมง" maxlength="3" value="<?php echo $TD->DevelopmentActivityHour; ?>">
                    <label >จำนวนชั่วโมง</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"id="DevelopmentActivityPlace" name="DevelopmentActivityPlace" placeholder="สถานที่จัดกิจกรรม" value="<?php echo $TD->DevelopmentActivityPlace; ?>">
                    <label >สถานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="Organizer"id="Organizer"placeholder="หน่วยงานที่จัดกิจกรรม" value="<?php echo $TD->Organizer; ?>">
                    <label >หน่วยงานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="DevelopmentActivityStartDate"id="DevelopmentActivityStartDate" value="<?php echo $TD->DevelopmentActivityStartDate; ?>">
                    <label >วันที่เริ่มกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control"name="DevelopmentActivityEndDate"id="DevelopmentActivityEndDate" value="<?php echo $TD->DevelopmentActivityEndDate; ?>">
                    <label >วันที่สิ้นสุดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                    <div class="input-group mb-3">
                    <a href="load_file?file=<?php echo $TD->DevelopmentDocument; ?>">
                      <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-file-earmark-arrow-down-fill"></i>  เอกสารแนบ/เกียรติบัตร</label>
                    </a>  
                        <input type="file" class="form-control" name="DevelopmentDocument" id="DevelopmentDocument" placeholder="เอกสารแนบ/เกียรติบัตร" >
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="list-teacher_development_activity" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(teacher_developmant_activity)">แก้ไขข้อมูล</button>
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
                              <button type="submit" class="btn btn-warning" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>  
                
              </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

            </div>
          </div>

        </div>

      </div>
    </section>

<script type="text/javascript">

  function onloadpage(){
   
    ///DevelopmentActivitySemester
    var my_DevelopmentActivitySemester = "<?php echo $TD->DevelopmentActivitySemester; ?>";

    var selectoption_DevelopmentActivitySemester = document.querySelector('#DevelopmentActivitySemester');
    selectoption_DevelopmentActivitySemester[my_DevelopmentActivitySemester].selected = true;
   

    ///TeacherID
    var my_TeacherID = "<?php echo $TD->TeacherID; ?>";
    var selectoption_my_TeacherID = document.querySelector('#TeacherID');
    var size_my_TeacherID =  document.getElementById("TeacherID").options.length;
    for (let i = 0; i < size_my_TeacherID; i++) {
      if(selectoption_my_TeacherID[i].value==my_TeacherID){
        selectoption_my_TeacherID[i].selected = true;
        break;
      }
    }

    ///DevelopmentActivityTypeCode
    var my_DevelopmentActivityTypeCode = "<?php echo $TD->DevelopmentActivityTypeCode; ?>";
    var selectoption_DevelopmentActivityTypeCode = document.querySelector('#DevelopmentActivityTypeCode');
    var size_my_DevelopmentActivityTypeCode =  document.getElementById("DevelopmentActivityTypeCode").options.length;
     
    for (let i = 0; i < size_my_DevelopmentActivityTypeCode; i++) {
      
      if(selectoption_DevelopmentActivityTypeCode[i].value==my_DevelopmentActivityTypeCode){
        selectoption_DevelopmentActivityTypeCode[i].selected = true;
        break;
      }
    }

 
  }
           
  function check(frm){
    
  //Check_EDUCATION_YEAR
  var EducationYear = /^[0-9]{4}$/;
    if(frm.DevelopmentActivityEducationYear.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.DevelopmentActivityEducationYear.value = "";
        return false;
    }else if (!frm.DevelopmentActivityEducationYear.value.match(EducationYear)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.DevelopmentActivityEducationYear.value = "";
        return false;
    }
    //Check_SEMESTER
    if(frm.DevelopmentActivitySemester.value==-1){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
    //Check_TeacherID
    if(frm.TeacherID.value==-1){
      alert("กรุณาเลือกครูและบุคลากรทางการศึกษา");
      return false;
    }
    //Check_DevelopmentActivityTypeCode
    if(frm.DevelopmentActivityTypeCode.value==-1){
      alert("กรุณาเลือกประเภทกิจกรรม");
      return false;
    }
    //Cehck_ActivityName
    var ActivityName = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.DevelopmentActivityName.value ==""){
        alert("กรุณากรอกข้อมูลชื่อกิจกรรม");
        frm.DevelopmentActivityName.value = "";
        return false;
    }else if (!frm.DevelopmentActivityName.value.match(ActivityName)){
        alert("กรุณากรอกข้อมูลชื่อกิจกรรม");
        frm.DevelopmentActivityName.value = "";
        return false;
    }
    //Cehck_ActivityHour
    var ActivityHour = /^[0-9]{1,3}$/;
    if(frm.DevelopmentActivityHour.value ==""){
        alert("กรุณากรอกข้อมูลจำนวนชั่วโมง");
        frm.DevelopmentActivityHour.value = "";
        return false;
    }else if (!frm.DevelopmentActivityHour.value.match(ActivityHour)){
        alert("กรุณากรอกข้อมูลจำนวนชั่วโมงตัวเลขเท่านั้น");
        frm.DevelopmentActivityHour.value = "";
        return false;
    }

    //Check_ActivityPlace
    var ActivityPlace = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.DevelopmentActivityPlace.value ==""){
        alert("กรุณากรอกข้อมูลสถานที่จัดกิจกรรม");
        frm.DevelopmentActivityPlace.value = "";
        return false;
    }else if (!frm.DevelopmentActivityPlace.value.match(ActivityPlace)){
        alert("กรุณากรอกข้อมูลสถานที่จัดกิจกรรมให้น้อกยว่า 255 ตัว");
        frm.DevelopmentActivityPlace.value = "";
        return false;
    }

    //Check_Organizer
    var Organizer = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.Organizer.value ==""){
        alert("กรุณากรอกข้อมูลหน่วยงานที่จัดกิจกรรม");
        frm.Organizer.value = "";
        return false;
    }else if (!frm.Organizer.value.match(Organizer)){
        alert("กรุณากรอกข้อมูลหน่วยงานที่จัดกิจกรรมให้น้อกยว่า 255 ตัว");
        frm.Organizer.value = "";
        return false;
    }

     //Check_DevelopmentActivityStartDate  
    if(frm.DevelopmentActivityStartDate.value == ""){
      alert("กรุณากรอกข้อมูลวันที่เริ่มต้น");
      return false;

      
    }else if(frm.DevelopmentActivityStartDate.value =="" && frm.DevelopmentActivityEndDate.value !="" ){
      alert("กรุณากรอกข้อมูลวันที่เริ่มต้นก่อน");
      return false;
    }else if(frm.DevelopmentActivityStartDate.value !="" && frm.DevelopmentActivityEndDate.value =="" ){
      alert("กรุณากรอกข้อมูลวันที่สิ้นสุดก่อน");
      return false;
    }else if(frm.DevelopmentActivityEndDate.value <  frm.DevelopmentActivityStartDate.value ){
      alert("กรุณากรอกข้อมูลวันที่เริ่มต้นใหน้อยกว่าวันที่สิ้นสุด");
      return false;
    }
    //Check_DevelopmentActivityEndDate
    if(frm.DevelopmentActivityEndDate.value ==""){
      alert("กรุณากรอกข้อมูลวันที่สิ้นสุด");
      return false;
    }
    //Check_DevelopmentDocument(เอกสารแนบ/เกียรติบัตร)
    /*
    if(frm.DevelopmentDocument.value ==""){
      alert("กรุณาแนบไฟล์เอกสารเกียรติบัตร");
      frm.DevelopmentDocument.value = "";
      return false;
    } 
    */
    $('#Modal').modal('show');
  }
</script>  
<?php } ?>
  </main><!-- End #main -->
  </body>