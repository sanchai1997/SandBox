<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($Curriculum as $c) { ?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
      </nav>
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
              <h5 class="card-title">ข้อมูลหลักสูตร</h5>

              <!-- start Form ข้อมูลหลักสูตร -->
              <form class="row g-3" action="<?php echo base_url('edit_curriculum');?>" method="POST" name="Curriculum" id="Curriculum" enctype="multipart/form-data"> 
                
                <input type="hidden" name="Old_CurriculumID" id="Old_CurriculumID" value="<?php echo $c->CurriculumID; ?>">

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="EducationYear" id="EducationYear" placeholder="ปีการศึกษา (พ.ศ.)" maxlength="4" value="<?php echo $c->EducationYear; ?>">
                    <label >ปีการศึกษา</label>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-floating">
                      <select class="form-select" aria-label="Default select example" name="Semester" id="Semester" >
                        <option value="0">ตลอดปีการศึกษา</option>
                        <option value="1">ภาคเรียนที่ 1</option>
                        <option value="2">ภาคเรียนที่ 2</option>
                      </select>
                    <label >ภาคเรียน</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SchoolID" id="SchoolID">
                      <?php foreach($listSchool as $ls) { ?>
                        <option value="<?php echo $ls->SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></option>
                      <?php } ?>
                    </select>
                    <label >สถานศึกษา</label>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="CurriculumName" id="CurriculumName" placeholder="ชื่อหลักสูตร"  value="<?php echo $c->CurriculumName; ?>">
                    <label >ชื่อหลักสูตร</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="CurriculumCode" id="CurriculumCode">
                      <?php foreach($listCurriculumType as $ls) { ?>
                        <option value="<?php echo $ls->CurriculumCode; ?>"><?php echo $ls->CurriculumTypeName; ?></option>
                      <?php } ?>
                    </select>
                    <label >ประเภทหลักสูตร</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="EducationLevelCode" id="EducationLevelCode">
                      <?php foreach($listEducationLevel as $ls) { ?>
                        <option value="<?php echo $ls->EducationLevelCode; ?>"><?php echo $ls->EducationLevelName; ?></option>
                      <?php } ?>
                    </select>
                    <label >ระดับการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="GradeLevelCode" id="GradeLevelCode">
                      <?php foreach($listGradeLevel as $ls) { ?>
                        <option value="<?php echo $ls->GradeLevelCode; ?>"><?php echo $ls->GradeLevelName; ?></option>
                      <?php } ?>
                    </select>
                    <label >ชั้นปี</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="number" class="form-control"  name="ClassroomNumber" id="ClassroomNumber" min="1" max="999" placeholder="จำนวนห้องที่สอนด้วยหลักสูตร"  value="<?php echo $c->ClassroomNumber; ?>">                  
                    <label>จำนวนห้องที่สอนด้วยหลักสูตร</label>
                  </div>
                </div>

                <div class="col-md-16">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">เอกสารหลักสูตร</label>
                        <input type="file" class="form-control"  name="CurriculumDocumentURL" id="CurriculumDocumentURL">
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="LocalCurriculumFlag" id="LocalCurriculumFlag">
                      <option value="0">อ้างอิง</option>
                      <option value="1">ไม่อ้างอิง</option>
                    </select>
                    <label >อ้างอิงหลักสูตรท้องถิ่น</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="LocalCurriculumName" id="LocalCurriculumName" placeholder="ชื่อหลักสูตรท้องถิ่นที่อ้างอิง" value="<?php echo $c->LocalCurriculumName; ?>">
                    <label >ชื่อหลักสูตรท้องถิ่นที่อ้างอิง</label>
                  </div>
                </div>

                <div class="col-md-16">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบหลักสูตรอ้างอิง</label>
                        <input type="file" class="form-control" name="LocalCurriculumDocumentURL" id="LocalCurriculumDocumentURL" placeholder="เอกสารแนบหลักสูตรอ้างอิง" >
                    </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" onclick="return check(Curriculum)">ยืนยัน</button>
                </div> 

             </form>
<!-- End Form ข้อมูลหลักสูตร -->

              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
 function onloadpage(){
   ///Semester
   var my_Semester = "<?php echo $c->Semester; ?>";
   var selectoption_Semester = document.querySelector('#Semester');
   var size_my_Semester =  document.getElementById("Semester").options.length;
   for (let i = 0; i < size_my_Semester; i++) {
     if(selectoption_Semester[i].value==my_Semester){
      selectoption_Semester[i].selected = true;
        break;
     }
   }

  
   ///SchoolID
   var my_SchoolID = "<?php echo $c->SchoolID; ?>";
   var selectoption_my_SchoolID = document.querySelector('#SchoolID');
   var size_my_SchoolID =  document.getElementById("SchoolID").options.length;
   for (let i = 0; i < size_my_SchoolID; i++) {
     if(selectoption_my_SchoolID[i].value==my_SchoolID){
        selectoption_my_SchoolID[i].selected = true;
        break;
     }
   }

  ///CurriculumCode
   var my_CurriculumCode = "<?php echo $c->CurriculumCode; ?>";
   var selectoption_my_CurriculumCode = document.querySelector('#CurriculumCode');
   var size_my_CurriculumCode =  document.getElementById("CurriculumCode").options.length;
   for (let i = 0; i < size_my_CurriculumCode; i++) {
     if(selectoption_my_CurriculumCode[i].value==my_CurriculumCode){
        selectoption_my_CurriculumCode[i].selected = true;
        break;
     }
   }

   ///EducationLevelCode
   var my_EducationLevelCode = "<?php echo $c->EducationLevelCode; ?>";
   var selectoption_my_EducationLevelCode = document.querySelector('#EducationLevelCode');
   var size_my_EducationLevelCode =  document.getElementById("EducationLevelCode").options.length;
   for (let i = 0; i < size_my_EducationLevelCode; i++) {
     if(selectoption_my_EducationLevelCode[i].value==my_EducationLevelCode){
        selectoption_my_EducationLevelCode[i].selected = true;
        break;
     }
   }

   ///GradeLevelCode
   var my_GradeLevelCode = "<?php echo $c->GradeLevelCode; ?>";
   var selectoption_my_GradeLevelCode = document.querySelector('#GradeLevelCode');
   var size_my_GradeLevelCode =  document.getElementById("GradeLevelCode").options.length;
   for (let i = 0; i < size_my_GradeLevelCode; i++) {
     if(selectoption_my_GradeLevelCode[i].value==my_GradeLevelCode){
        selectoption_my_GradeLevelCode[i].selected = true;
        break;
     }
   }   

   ///LocalCurriculumFlag
   var my_LocalCurriculumFlag = "<?php echo $c->LocalCurriculumFlag; ?>";
   var selectoption_LocalCurriculumFlag = document.querySelector('#LocalCurriculumFlag');
   selectoption_Semester[my_LocalCurriculumFlag].selected = true;

 }

  function check(frm){
  
  //Check_EducationYear (ปีการศึกษา)
  var EDUCATION = /^[0-9]{4}$/;
    if(frm.EducationYear.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.EducationYear.value = "";
        return false;
    }else if (!frm.EducationYear.value.match(EDUCATION)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.EducationYear.value = "";
        return false;
    }

    //Check_Semester (ภาคเรียน)
    if(frm.Semester.value==-1){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }

    //check_school(สถานศึกษา) 
    if(frm.SchoolID.value==-1){
        alert("กรุณาเลือกสถานศึกษา");
        return false;
    }
  
    //Check_CURRICULUM_NAME(ชื่อหลักสูตร)
    var CHECK_CURRICULUM_NAME = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.CurriculumName.value==""){
        alert("กรุณากรอกชื่อหลักสูตร");
        frm.CurriculumName.value = "";
        return false;
    }
    else if(!frm.CurriculumName.value.match(CHECK_CURRICULUM_NAME)){
        alert("กรุณากรอกชื่อหลักสูตรให้ถูกต้อง");
        frm.CurriculumName.value = "";
        return false;
    }
  
    //Check_CurriculumCode(ประเภทหลักสูตร)
    if(frm.CurriculumCode.value==-1){
      alert("กรุณาเลือกประเภทหลักสูตร");
      return false;
    }

    //Check_EducationLevelCode(ระดับการศึกษา)
    if(frm.EducationLevelCode.value==-1){
      alert("กรุณาเลือกรหัสระดับการศึกษา");
      return false;
    }

    //Check_GradeLevelCode (ชั้นปี)
    if(frm.GradeLevelCode.value==-1){
      alert("กรุณาเลือกชั้นปี");
      return false;
    }

    //Check_ClassroomNumber(จำนวนห้องที่สอนด้วยหลักสูตร)
    var check_ClassroomNumber = /^[0-9]{1,3}$/;
    if(frm.ClassroomNumber.value ==""){
        alert("กรุณากรอกข้อมูลจำนวนห้องที่สอนด้วยหลักสูตร");
        frm.ClassroomNumber.value = "";
        return false;
    }else if (!frm.ClassroomNumber.value.match(check_ClassroomNumber)){
        alert("กรุณากรอกข้อมูลจำนวนห้องที่สอนด้วยหลักสูตรตัวเลขเท่านั้น");
        frm.ClassroomNumber.value = "";
        return false;
    }
    
    //Check_CurriculumDocumentURL1(เอกสารหลักสูตร)
    if(frm.CurriculumDocumentURL1.value==""){
        alert("กรุณาแนบไฟล์เอกสารหลักสูตร");
        return false;
    }
    
    //Check_LocalCurriculumFlag(ชื่อหลักสูตรท้องถิ่นที่อ้างอิง)
    if(frm.LocalCurriculumFlag.value==-1){
      alert("กรุณาเลือกอ้างอิงหลักสูตรท้องถิ่น");
      return false;
    }

    //Check_LocalCurriculumName(ชื่อหลักสูตรท้องถิ่นที่อ้างอิง)
    var CHECK_LOCAL_CURRICULUM_NAME = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.LocalCurriculumName.value==""){
        alert("กรุณากรอกชื่อหลักสูตรท้องถิ่นที่อ้างอิง");
        frm.LocalCurriculumName.value = "";
        return false;
    }
    else if(!frm.LocalCurriculumName.value.match(CHECK_LOCAL_CURRICULUM_NAME)){
        alert("กรุณากรอกชื่อหลักสูตรท้องถิ่นที่อ้างอิงให้ถูกต้อง");
        frm.LocalCurriculumName.value = "";
        return false;
    }

    //Check_LocalCurriculumDocumentURL(เอกสารแนบหลักสูตรอ้างอิง)
    if(frm.LocalCurriculumDocumentURL.value==""){
        alert("กรุณาแนบไฟล์เอกสารแนบหลักสูตรอ้างอิง");
        return false;
    }
  }

</script>   
<?php } ?> 
</main><!-- End #main -->
