
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
                      <option selected value="-1">เลือกประเภทหลักสูตร</option>
                      <?php foreach($listCurriculumType as $ls) { ?>
                        <option value="<?php echo $ls->CurriculumCode; ?>"><?php echo $ls->CurriculumTypeName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="EducationLevelCode" id="EducationLevelCode">
                      <option selected value="-1">เลือกะดับการศึกษา</option>
                      <?php foreach($listEducationLevel as $ls) { ?>
                        <option value="<?php echo $ls->EducationLevelCode; ?>"><?php echo $ls->EducationLevelName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ชั้นปี</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="GradeLevelCode" id="GradeLevelCode">
                      <option selected value="-1">เลือกชั้นปี</option>
                      <?php foreach($listGradeLevel as $ls) { ?>
                        <option value="<?php echo $ls->GradeLevelCode; ?>"><?php echo $ls->GradeLevelName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">จำนวนห้องที่สอนด้วยหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  name="ClassroomNumber" id="ClassroomNumber" min="1" max="999" placeholder="จำนวนห้องที่สอนด้วยหลักสูตร">                  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">เอกสารหลักสูตร</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control"  name="CurriculumDocumentURL1" id="CurriculumDocumentURL1">
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
             <form name="ttttt" id="tttt">
                <h5 class="card-title">ข้อมูลหลักสูตรรายวิชา   ** สามารถมีได&หลายรายการ และไม่จำเป็นต&องกรอก **</h5>

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
                      <option selected value="-1">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
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
                      <option selected value="-1">เลือกประเภทวิชา</option>
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
                    <input type="text" class="form-control" name="LearningHour"id="LearningHour" placeholder="จำนวนชั่วโมงเรียน">
                  </div>
                </div>
               
                    
              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->

              <!-- start Form ข้อมูลสมรรถนะของหลักสูตร -->
                <h5 class="card-title">ข้อมูลสมรรถนะของหลักสูตร   ** สามารถมีได้หลายรายการ และไม่จำเป็นต้องกรอก **</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สมรรถนะ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CompetencyCode" id="CompetencyCode">
                      <option selected value="-1">เลือกสมรรถนะ</option>
                      <?php foreach($listCompetency as $ls) { ?>
                        <option value="<?php echo $ls->CompetencyCode; ?>"><?php echo $ls->CompetencyName; ?></option>
                      <?php } ?> 
                    </select>                   
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return check_2(ttttt)">ยืนยัน2</button>
                </form>
              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script type="text/javascript">
  function check(frm){
  
  //Check_EducationYear (ปีการศึกษา)
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
  function check_2(frm2){
    
    //Check_CHECK_SubjectName(ชื่อรายวิชา)
    var CHECK_SubjectName = /^[A-Z,a-z,ก-์,0-9]{1,100}$/;
    if(frm2.SubjectName.value==""){
        alert("กรุณากรอกชื่อรายวิชา");
        return false;
    }else if(!frm2.SubjectName.value.match(CHECK_SubjectName)){
      alert("กรุณากรอกชื่อรายวิชาให้ถูกต้อง");
      return false;
    }
    //Check_CHECK_SubjectCode(รหัสวิชา)
    var CHECK_SubjectCode = /^[A-Z,a-z,ก-์,0-9]{1,10}$/;
    if(frm2.SubjectCode.value==""){
        alert("กรุณากรอกรหัสวิชา");
        return false;
    }else if(!frm2.SubjectCode.value.match(CHECK_SubjectCode)){
      alert("กรุณากรอกรหัสวิชาให้ถูกต้อง");
      return false;
    }
    //Check_SubjectGroupCode(กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง)
    if(frm2.SubjectGroupCode.value==-1){
      alert("กรุณาเลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง");
      return false;
    }
     //Check_SubjectTypeCode(รหัสประเภทรายวิชา)
     if(frm2.SubjectTypeCode.value==-1){
      alert("กรุณาเลือกประเภทรายวิชา");
      return false;
    }
     //Check_CompetencyCode(สมรรถนะ)
     if(frm2.CompetencyCode.value==-1){
      alert("กรุณาเลือกสมรรถนะ");
      return false;
    }

    

    

    
  }
</script>    
</main><!-- End #main -->
