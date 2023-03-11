<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($CurriculumSubject as $cs) { ?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลหลักสูตรรายวิชา</h1>
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


              <h5 class="card-title">ข้อมูลหลักสูตรรายวิชา</h5>

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
              <form action="<?php echo base_url('edit_curriculum_subject');?>" method="POST" name="CurriculumSubject" id="CurriculumSubject" enctype="multipart/form-data"> 
              <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $cs->CurriculumID; ?>">
              <input type="hidden" name="Old_SubjectCode" id="Old_SubjectCode" value="<?php echo $cs->SubjectCode; ?>">

              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อรายวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="SubjectName" id="SubjectName" placeholder="ชื่อรายวิชา"  maxlength="100" value="<?php echo $cs->SubjectName; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >รหัสวิชา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="SubjectCode" id="SubjectCode" placeholder="รหัสวิชา" maxlength="10" value="<?php echo $cs->SubjectCode; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="SubjectGroupCode" id="SubjectGroupCode" >
                      <option  value="-1">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
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
                      <option  value="-1">เลือกประเภทวิชา</option>
                      <?php foreach($listSubjectType as $ls) { ?>
                        <option value="<?php echo $ls->SubjectTypeCode; ?>"><?php echo $ls->SubjectTypeName ; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">หน่วยกิต/หน่วยน้ำหนัก</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Credit"id="Credit" placeholder="หน่วยกิต/หน่วยน้ำหนัก" value="<?php echo $cs->Credit; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จำนวนชั่วโมงเรียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LearningHour"id="LearningHour" value="<?php echo $cs->LearningHour; ?>">
                  </div>
                </div>

              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->

                <button type="submit" class="btn btn-primary" onclick="return check(CurriculumSubject)">ยืนยัน</button>
             </form>
<!-- End Form ข้อมูลหลักสูตรรายวิชา -->

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
  function onloadpage(){
   
   ///SubjectGroupCode
   var my_SubjectGroupCode = "<?php echo $cs->SubjectGroupCode; ?>";
   var selectoption_SubjectGroupCode = document.querySelector('#SubjectGroupCode');
   var size_my_SubjectGroupCode =  document.getElementById("SubjectGroupCode").options.length;
   for (let i = 0; i < size_my_SubjectGroupCode; i++) {
     if(selectoption_SubjectGroupCode[i].value==my_SubjectGroupCode){
      selectoption_SubjectGroupCode[i].selected = true;
     }
   }

   ///SubjectTypeCode
   var my_SubjectTypeCode = "<?php echo $cs->SubjectTypeCode; ?>";
   var selectoption_SubjectTypeCode = document.querySelector('#SubjectTypeCode');
   var size_my_SubjectTypeCode =  document.getElementById("SubjectTypeCode").options.length;
   for (let i = 0; i < size_my_SubjectTypeCode; i++) {
     if(selectoption_SubjectTypeCode[i].value==my_SubjectTypeCode){
      selectoption_SubjectTypeCode[i].selected = true;
     }
   }


  }


    function check(frm2){
    
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
    
  }
</script>
<?php } ?>
  </main><!-- End #main -->
