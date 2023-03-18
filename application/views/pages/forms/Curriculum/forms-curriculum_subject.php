
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลหลักสูตรรายวิชา</h1>
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
              <form class="row g-3" action="<?php echo base_url('add_curriculum_subject');?>" method="POST" name="addCurriculumSubject" id="addCurriculumSubject" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
                
                <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="SubjectName" id="SubjectName" placeholder="ชื่อรายวิชา"  maxlength="100">
                      <label >ชื่อรายวิชา</label>
                    </div>
                </div>

                <div class="col-md-16">
                    <div class="form-floating">
                      <input type="text" class="form-control"name="SubjectCode" id="SubjectCode" placeholder="รหัสวิชา" maxlength="10">
                      <label >รหัสวิชา</label>
                    </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SubjectGroupCode" id="SubjectGroupCode">
                      <option selected value="0">เลือกกลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</option>
                      <?php foreach($listSubjectGroup as $ls) { ?>
                        <option value="<?php echo $ls->SUBJECT_GROUP_CODE; ?>"><?php echo $ls->SUBJECT_GROUP_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>กลุ่มสาระการเรียนรู้ / การศึกษาค้นคว้าด้วยตนเอง</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SubjectTypeCode" id="SubjectTypeCode">
                      <option selected value="-1">เลือกประเภทวิชา</option>
                      <?php foreach($listSubjectType as $ls) { ?>
                        <option value="<?php echo $ls->SUBJECT_TYPE_CODE; ?>"><?php echo $ls->SUBJECT_TYPE_NAME ; ?></option>
                      <?php } ?>
                    </select>
                    <label>ประเภทวิชา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="Credit"id="Credit" placeholder="หน่วยกิต/หน่วยน้ำหนัก">
                    <label>หน่วยกิต/หน่วยน้ำหนัก</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="LearningHour"id="LearningHour" placeholder="จำนวนชั่วโมงเรียน">
                    <label>จำนวนชั่วโมงเรียน</label>
                  </div>
                </div>

              <!-- End Form ข้อมูลหลักสูตรรายวิชา -->
                <div class="d-flex justify-content-between">
                  <a href="list-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(addCurriculumSubject)">บันทึกข้อมูล</button>
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
                              <button type="submit" class="btn btn-primary click" >ยืนยัน</button> 
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
    $('#Modal').modal('show');
    
  }
</script>

  </main><!-- End #main -->
