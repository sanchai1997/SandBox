<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($CurriculumSubject as $cs) { ?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลหลักสูตรรายวิชา - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                        ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                        <?php $Semester_code = $Curriculum[0]->Semester;
                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?></h1>
      <br>
      <h5>  ชั้นปี - <?php echo $Curriculum[0]->GRADE_LEVEL_NAME; ?> </h5>                                              
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

      <?php if (!empty($_SESSION['success'])) { ?>
    <div class="col-12">
            <script>
                setTimeout(function() {
                    document.getElementById('myAlert').remove();
                }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            </script>
            <div class="alert alert-success" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-check-circle-fill"></i> '. $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
                </strong>
            </div> 
        
    </div>
    <?php } ?> 

      <div class="row">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
              <form class="row g-3" action="<?php echo base_url('edit_curriculum_subject');?>" method="POST" name="CurriculumSubject" id="CurriculumSubject" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $cs->CurriculumID; ?>">
                <input type="hidden" name="Old_SubjectCode" id="Old_SubjectCode" value="<?php echo $cs->SubjectCode; ?>">

                <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SubjectName" id="SubjectName" placeholder="ชื่อรายวิชา"  maxlength="100" value="<?php echo $cs->SubjectName; ?>">
                      <label >ชื่อรายวิชา<font color="red"> *</font></label>
                    </div>
                </div>

                <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control"name="SubjectCode" id="SubjectCode" placeholder="รหัสวิชา" maxlength="10" value="<?php echo $cs->SubjectCode; ?>">
                      <label >รหัสวิชา<font color="red"> *</font></label>
                    </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SubjectGroupCode" id="SubjectGroupCode">
                      <option  value="0">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
                      <?php foreach($listSubjectGroup as $ls) { ?>
                        <option value="<?php echo $ls->SUBJECT_GROUP_CODE; ?>"><?php echo $ls->SUBJECT_GROUP_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SubjectTypeCode" id="SubjectTypeCode">
                      <?php foreach($listSubjectType as $ls) { ?>
                        <option value="<?php echo $ls-> SUBJECT_TYPE_CODE; ?>"><?php echo $ls->SUBJECT_TYPE_NAME ; ?></option>
                      <?php } ?>
                    </select>
                    <label>ประเภทวิชา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="Credit"id="Credit" placeholder="หน่วยกิต/หน่วยน้ำหนัก" value="<?php echo $cs->Credit; ?>">
                    <label>หน่วยกิต/หน่วยน้ำหนัก<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="LearningHour"id="LearningHour" value="<?php echo $cs->LearningHour; ?>">
                    <label>จำนวนชั่วโมงเรียน<font color="red"> *</font></label>
                  </div>
                </div>
<!--
                <div class="col-md-16" >
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SUBJECT_STD_ID" id="SUBJECT_STD_ID">
                      <option selected value="-1">เลือกมาตรฐานการเรียนรู้</option>
                      <?php 
                      foreach($listSTD as $ls) { ?>
                        <option value="<?php echo $ls->SUBJECT_STD_ID; ?>" class="<?php echo $ls->SUBJECT_GROUP_CODE; ?>" style="display: none;"><?php echo $ls->SUBJECT_STD_ID . ' : ' .$ls->SUBJECT_STD_DETAILS ; ?></option>
                      <?php } ?>
                    </select>
                    <label>มาตรฐานการเรียนรู้<font color="red"> *กรุณาเลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง ก่อน </font></label>
                  </div>
                </div>

                <div class="col-md-16 " id="add-SUBJECT_STD" style="display: none;">
                  <h5 style="float: right; padding: 15px;" class="card-title" >
                    <a href="forms-subject_std?cid=<?php echo $CurriculumID; ?>&&sid=<?php echo $SubjectCode; ?>" class="btn btn-success" id="text_add-SUBJECT_STD">
                      เพิ่มมาตรฐานการเรียนรู้
                    </a>
                  </h5>

                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SUBJECT_KPI_ID" id="SUBJECT_KPI_ID">
                      <option selected value="-1">เลือกตัวชี้วัด</option>
                      <?php foreach($listCriteria as $ls) { ?>
                        <option value="<?php echo $ls->Id; ?>"><?php echo $ls->CriteriaID ; ?></option>
                      <?php } ?>
                    </select>
                    <label>ตัวชี้วัด<font color="red"> *</font></label>
                  </div>
                </div>
-->

              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->
                <div class="d-flex justify-content-between">
                <a href="list-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(CurriculumSubject)">แก้ไขข้อมูล</button>
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
             </form>
<!-- End Form ข้อมูลหลักสูตรรายวิชา -->
            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
/*
    $(document).ready(function() {
      $("#SubjectGroupCode").change(function() {
        
      
        var SubjectGroupCode = document.getElementById("SubjectGroupCode").value;
        var selectoption_SUBJECT_STD_ID = document.querySelector('#SUBJECT_STD_ID'); 
        var size_SUBJECT_STD_ID =  document.getElementById("SUBJECT_STD_ID").options.length;


          for (let i = 1; i < size_SUBJECT_STD_ID; i++) {  

            if(selectoption_SUBJECT_STD_ID[i].className!=SubjectGroupCode){  
              selectoption_SUBJECT_STD_ID[i].style.display = 'none';   
              selectoption_SUBJECT_STD_ID[i].selected = false;       
   
            }else{
              selectoption_SUBJECT_STD_ID[i].style.display = 'block';   
            }
          }

          if(SubjectGroupCode=='09' || SubjectGroupCode=='10' ){
            document.getElementById("add-SUBJECT_STD").style.display = 'block';
           // document.getElementById("text_add-SUBJECT_STD").innerHTML = "เพิ่มมาตรฐานการเรียนรู้ - "+$( "#SubjectGroupCode option:selected" ).text() ;

          }else{
            document.getElementById("add-SUBJECT_STD").style.display = 'none';
          }
      });

   
    });
*/
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
/*
  ///SUBJECT_KPI_ID
   var my_SUBJECT_KPI_ID = "<?php echo $cs->SUBJECT_KPI_ID; ?>";
   var selectoption_SUBJECT_KPI_ID = document.querySelector('#SUBJECT_KPI_ID');
   var size_my_SUBJECT_KPI_ID =  document.getElementById("SUBJECT_KPI_ID").options.length;
   for (let i = 0; i < size_my_SUBJECT_KPI_ID; i++) {
     if(selectoption_SUBJECT_KPI_ID[i].value==my_SUBJECT_KPI_ID){
      selectoption_SUBJECT_KPI_ID[i].selected = true;
     }
   }

  ///SUBJECT_STD_ID
  var SubjectGroupCode = document.getElementById("SubjectGroupCode").value;

   var my_SUBJECT_STD_ID = "<?php echo $cs->SUBJECT_STD_ID; ?>";
   var selectoption_SUBJECT_STD_ID = document.querySelector('#SUBJECT_STD_ID');
   var size_my_SUBJECT_STD_ID =  document.getElementById("SUBJECT_STD_ID").options.length;
   for (let i = 0; i < size_my_SUBJECT_STD_ID; i++) {
     if(selectoption_SUBJECT_STD_ID[i].value==my_SUBJECT_STD_ID){
      selectoption_SUBJECT_STD_ID[i].selected = true;
     }
     if(selectoption_SUBJECT_STD_ID[i].className!=SubjectGroupCode){  
        selectoption_SUBJECT_STD_ID[i].style.display = 'none';   
        selectoption_SUBJECT_STD_ID[i].selected = false;       

      }else{
        selectoption_SUBJECT_STD_ID[i].style.display = 'block';   
      }     
   }

   if(SubjectGroupCode=='09' || SubjectGroupCode=='10' ){
      document.getElementById("add-SUBJECT_STD").style.display = 'block';
      // document.getElementById("text_add-SUBJECT_STD").innerHTML = "เพิ่มมาตรฐานการเรียนรู้ - "+$( "#SubjectGroupCode option:selected" ).text() ;

    }else{
      document.getElementById("add-SUBJECT_STD").style.display = 'none';
    }
*/

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

    //Check_Credit
    var CHECK_Credit = /^(?:\d{1,2}(?:\.\d)?|\d{1,2})$/;  
    if(frm2.Credit.value==""){
        alert("กรุณากรอกหน่วยกิต/หน่วยน้ำหนัก");
        return false;
    }else if(!frm2.Credit.value.match(CHECK_Credit)){
      alert("กรุณากรอกหน่วยกิต/หน่วยน้ำหนักให้ถูกต้อง");
      return false;
    }

    //Check_LearningHour
    var CHECK_LearningHour =  /^(?:\d{1,4}(?:\.\d)?|\d{1,4})$/;  
    if(frm2.LearningHour.value==""){
        alert("กรุณากรอกจำนวนชั่วโมงเรียน");
        return false;
    }else if(!frm2.LearningHour.value.match(CHECK_LearningHour)){
      alert("กรุณากรอกจำนวนชั่วโมงเรียนให้ถูกต้อง");
      return false;
    }

/*
    //Check_SUBJECT_STD_ID
    if(frm2.SUBJECT_STD_ID.value==-1){
      alert("กรุณาเลือกรหัสมาตรฐานการเรียนรู้");
      return false;
    }

    //Check_SUBJECT_KPI_ID
     if(frm2.SUBJECT_KPI_ID.value==-1){
      alert("กรุณาเลือกตัวชี้วัด");
      return false;
    }
*/
    $('#Modal').modal('show');
    
  }
</script>
<?php } ?>
  </main><!-- End #main -->
