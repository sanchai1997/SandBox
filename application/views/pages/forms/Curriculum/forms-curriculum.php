
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h1>
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
              <form action="<?php echo base_url('add_curriculum');?>" method="POST" name="addCurriculum" id="addCurriculum" enctype="multipart/form-data"> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="EducationYear" id="EducationYear" placeholder="ปีการศึกษา (พ.ศ.)" maxlength="4">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="Semester" id="Semester">
                      <option selected value="-1">เลือกภาคเรียน</option>
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SchoolID" id="SchoolID">
                      <option selected value="-1">เลือกสถานศึกษา</option>
                      <?php foreach($listSchool as $ls) { ?>
                        <option value="<?php echo $ls->SCHOOL_ID; ?>"><?php echo $ls->NAME_TH; ?></option>
                      <?php } ?>
                      
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="CurriculumName" id="CurriculumName" placeholder="ชื่อหลักสูตร">
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทหลักสูตร</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CurriculumCode" id="CurriculumCode">
                      <option selected value="-1">เลือกรหัสหลักสูตร</option>
                      <?php foreach($listCurriculumType as $ls) { ?>
                        <option value="<?php echo $ls->CurriculumCode; ?>"><?php echo $ls->CurriculumTypeName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">รหัสระดับการศึกษา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="EducationLevelCode" id="EducationLevelCode">
                      <option selected value="-1">เลือกรหัสระดับการศึกษา</option>
                      <?php foreach($listEducationLevel as $ls) { ?>
                        <option value="<?php echo $ls->EducationLevelCode; ?>"><?php echo $ls->EducationLevelName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">รหัสชั้นปี</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="GradeLevelCode" id="GradeLevelCode">>
                      <option selected>เลือกรหัสชั้นปี</option>
                      <?php foreach($listGradeLevel as $ls) { ?>
                        <option value="<?php echo $ls->GradeLevelCode; ?>"><?php echo $ls->GradeLevelName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">จำนวนห้องที่สอนด้วยหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  name="ClassroomNumber" id="ClassroomNumber" min="1" max="999">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">เอกสารหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control"  name="CurriculumDocumentURL" id="CurriculumDocumentURL">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">อ้างอิงหลักสูตรท้องถิ่น</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="LocalCurriculumFlag" id="LocalCurriculumFlag">
                      <option selected value="-1">เลือกอ้างอิงหลักสูตรท้องถิ่น</option>
                      <option value="0">อ้างอิง</option>
                      <option value="1">ไม่อ้างอิง</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อหลักสูตรท้องถิ่นที่อ้างอิง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LocalCurriculumName" id="LocalCurriculumName" placeholder="ชื่อหลักสูตรท้องถิ่นที่อ้างอิง">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เอกสารแนบหลักสูตรอ้างอิง</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="LocalCurriculumDocumentURL" id="LocalCurriculumDocumentURL" placeholder="เอกสารแนบหลักสูตรอ้างอิง">
                  </div>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return check(addCurriculum)">ยืนยัน</button>
             </form>
<!-- End Form ข้อมูลหลักสูตร -->

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
             
                <h5 class="card-title">ข้อมูลหลักสูตรรายวิชา   ** สามารถมีได&หลายรายการ และไมfจำเปsนต&องกรอก **</h5>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อรายวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="SubjectName" id="SubjectName" placeholder="ชื่อรายวิชา"  maxlength="100">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >รหัสวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="SubjectCode" id="SubjectCode" placeholder="รหัสวิชา" maxlength="10">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SubjectGroupCode" id="SubjectGroupCode">
                      <option selected value="0">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
                      <?php foreach($listSubjectGroup as $ls) { ?>
                        <option value="<?php echo $ls->SubjectGroupCode; ?>"><?php echo $ls->SubjectGroupName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทวิชา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SubjectTypeCode" id="SubjectTypeCode">
                      <option selected value="0">เลือกประเภทวิชา</option>
                      <?php foreach($listSubjectType as $ls) { ?>
                        <option value="<?php echo $ls->SubjectTypeCode; ?>"><?php echo $ls->SubjectTypeName ; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หน่วยกิต/หน่วยน้ำหนัก</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Credit"id="Credit" placeholder="หน่วยกิต/หน่วยน้ำหนัก">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนชั่วโมงเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LearningHour"id="LearningHour">
                  </div>
                </div>

              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->

              <!-- start Form ข้อมูลสมรรถนะของหลักสูตร -->
                <h5 class="card-title">ข้อมูลสมรรถนะของหลักสูตร   ** สามารถมีได้หลายรายการ และไม่จำเป็นต้องกรอก **</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สมรรถนะ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CompetencyCode" id="CompetencyCode">
                      <option selected value="0">เลือกสมรรถนะ</option>
                      <?php foreach($listCompetency as $ls) { ?>
                        <option value="<?php echo $ls->CompetencyCode; ?>"><?php echo $ls->CompetencyName; ?></option>
                      <?php } ?> 
                    </select>                   
                  </div>
                </div>

              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
  
  //Check_EducationYear
  var EDUCATION = /^[0-9]{4}$/;
    /*
    if(EDUCATION.test(frm.EducationYear.value) == false){
      alert("กรุณากรอกข้อมูลปีการศึกษา");
      return false;
    }
    */
    if(frm.EducationYear.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.EducationYear.value = "";
        return false;
    }else if (!frm.EducationYear.value.match(EDUCATION)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.EducationYear.value = "";
        return false;
    }
  //Check_Semester
    if(frm.Semester.value==-1){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
  /*
  //Check_CURRICULUM_NAME
    var CHECK_CURRICULUM_NAME = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.CURRICULUM_NAME.value==""){
        alert("กรุณากรอกชื่อหลักสูตร");
        frm.CURRICULUM_NAME.value = "";
        return false;
    }
    else if(!frm.CURRICULUM_NAME.value.match(CHECK_CURRICULUM_NAME)){
        alert("กรุณากรอกชื่อหลักสูตรให้ถูกต้อง");
        frm.CURRICULUM_NAME.value = "";
        return false;
    }
  */
    //Check_CurriculumCode
    if(frm.CurriculumCode.value==-1){
      alert("กรุณาเลือกรหัสหลักสูตร");
      return false;
    }
    //Check_EducationLevelCode
    if(frm.EducationLevelCode.value==-1){
      alert("กรุณาเลือกรหัสระดับการศึกษา");
      return false;
    }
    //Check_LocalCurriculumFlag
    if(frm.LocalCurriculumFlag.value==-1){
      alert("กรุณาเลือกอ้างอิงหลักสูตรท้องถิ่น");
      return false;
    }
   //Check_LocalCurriculumName
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



    
  }
</script>    

  </main><!-- End #main -->
