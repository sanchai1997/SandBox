<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลการพัฒนาบุคลากร</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลการพัฒนาบุคลากร</h5>

              <!-- start Form ข้อมูลการพัฒนาบุคลากรครู -->
              <form class="row g-3"action="<?php echo base_url('add_teacher_development_activity');?>" method="POST"name="teacher_developmant_activity"id="teacher_developmant_activity">
                  
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityEducationYear"id="DevelopmentActivityEducationYear" placeholder="ปีการศึกษา" maxlength="4">
                    <label >ปีการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="DevelopmentActivitySemester" id="DevelopmentActivitySemester">
                      <option selected value="-1">เลือกภาคเรียน</option>
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
                      <option selected value="-1">เลือกครูและบุคลากรทางการศึกษา</option>
                        <?php foreach($listTeacher as $lt) { ?>
                          <option value="<?php echo $lt->TEACHER_ID; ?>"><?php echo " (" . $lt->TEACHER_ID . ")" . $lt->NAME_TH; ?></option>
                        <?php } ?>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ครูและบุคลากรทางการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example"  name="DevelopmentActivityTypeCode"id="DevelopmentActivityTypeCode">
                      <option selected value="-1">เลือกประเภทกิจกรรม</option>
                      <?php foreach($listDevelopmentActivityType as $lAT) { ?>
                          <option value="<?php echo $lAT->ActivityTypeID; ?>"><?php echo $lAT->Name_TH; ?></option>
                        <?php } ?>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ประเภทกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityName"id="DevelopmentActivityName" placeholder="ชื่อกิจกรรม">
                    <label >ชื่อกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityHour"id="DevelopmentActivityHour" placeholder="จำนวนชั่วโมง" maxlength="3">
                    <label >จำนวนชั่วโมง</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"id="DevelopmentActivityPlace" name="DevelopmentActivityPlace" placeholder="สถานที่จัดกิจกรรม">
                    <label >สถานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="Organizer"id="Organizer"placeholder="หน่วยงานที่จัดกิจกรรม">
                    <label >หน่วยงานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="DevelopmentActivityStartDate"id="DevelopmentActivityStartDate">
                    <label >วันที่เริ่มกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control"name="DevelopmentActivityEndDate"id="DevelopmentActivityEndDate">
                    <label >วันที่สิ้นสุดกิจกรรม</label>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary" onclick="return check(teacher_developmant_activity)">ยืนยัน</button>
              </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

            </div>
          </div>

        </div>

      </div>
    </section>
    <script type="text/javascript">
  function check(frm){
    /*
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
    if(frm.Check_DevelopmentActivityTypeCode.value==-1){
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
    var ActivityHour = /^[0-9]{3}$/;
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

     //Check_DevelopmentActivityStartDate and Check_DevelopmentActivityEndDate
    if(frm.DevelopmentActivityStartDate.value ==""){
      alert("กรุณากรอกข้อมูลวันที่เริ่มต้น");
      return false;
    }else if(frm.DevelopmentActivityEndDate.value ==""){
      alert("กรุณากรอกข้อมูลวันที่สิ้นสุด");
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
*/
    



    


    



    

    
  }
</script>  
  </main><!-- End #main -->
