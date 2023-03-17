<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลอัตลักษณ์ของแต่ละพื้นที่</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลอัตลักษณ์ของแต่ละพื้นที่</h5>

              <!-- start Form ข้อมูลอัตลักษณ์ของแต่ละพื้นที่ -->
              <form class="row g-3" action="<?php echo base_url('');?>" method="POST" name="AREA_IDENTITY" id="AREA_IDENTITY" enctype="multipart/form-data">

              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="EducationYear"id="EducationYear" placeholder="ปีการศึกษา" maxlength="4">
                    <label >ปีการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="Semester" id="Semester">
                      <option selected value="-1">เลือกภาคเรียน</option>
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                    <label>ภาคเรียน</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="SchoolID" id="SchoolID">
                      <option selected value="-1">เลือกสถานศึกษา</option>
                      <?php foreach($listSchool as $ls) { ?>
                        <option value="<?php echo $ls->SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></option>
                      <?php } ?>
                    </select>
                    <label>รหัสสถานศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaProduct"id="AreaProduct" placeholder="ข้อมูลผลิตภัณฑ์ชุมชน">
                    <label >ข้อมูลผลิตภัณฑ์ชุมชน</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaEnvironment"id="AreaEnvironment" placeholder="ข้อมูลสภาพพื้นที่/สภาพแวดล้อม">
                    <label >ข้อมูลสภาพพื้นที่/สภาพแวดล้อม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaLanguage"id="AreaLanguage" placeholder="ภาษาท้องถิ่น">
                    <label >ภาษาท้องถิ่น</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaValues"id="AreaValues" placeholder="ค่านิยม/ความเชื่อ">
                    <label >ค่านิยม/ความเชื่อ</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaCulture"id="AreaCulture" placeholder="ข้อมูลศิลปะ/วัฒนธรรม/ภูมิปัญญา">
                    <label >ข้อมูลศิลปะ/วัฒนธรรม/ภูมิปัญญา</label>
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary" onclick="return check(AREA_IDENTITY)">ยืนยัน</button>
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

              </form><!-- End Form ข้อมูลอัตลักษณ์ของแต่ละพื้นที่ -->

              <!-- start Form ข้อมูลการนับถือศาสนาในพื้นที่ -->
              <form class="row g-3" action="<?php echo base_url('');?>" method="POST" name="AREA_IDENTITY_RELIGION" id="AREA_IDENTITY_RELIGION" enctype="multipart/form-data">
                <h5 class="card-title">ข้อมูลการนับถือศาสนาในพื้นที่</h5>


                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="AreaReligionCode" id="AreaReligionCode">
                      <option selected value="-1">เลือกศาสนา</option>
                      <?php foreach($listReligion as $lr) { ?>
                        <option value="<?php echo $lr->RELIGION_CODE; ?>"><?php echo $lr->RELIGION_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>ศาสนา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaReligionPercentage"id="AreaReligionPercentage" placeholder="ร้อยละของแต่ละศาสนา">
                    <label >ร้อยละของแต่ละศาสนา</label>
                  </div>
                </div>

               

              </form><!-- End Form ข้อมูลการนับถือศาสนาในพื้นที่ -->

              <!-- start Form ข้อมูลการประกอบอาชีพในพื้นที่ -->
              <form class="row g-3" action="<?php echo base_url('');?>" method="POST" name="AREA_IDENTITY_OCCUPATION" id="AREA_IDENTITY_OCCUPATION" enctype="multipart/form-data">
                <h5 class="card-title">ข้อมูลการประกอบอาชีพในพื้นที่</h5>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="AreaReligionCode" id="AreaReligionCode">
                      <option selected value="-1">เลือกกลุ่มอาชีพ</option>
                      <?php foreach($listOccupation as $lo) { ?>
                        <option value="<?php echo $lo->OCCUPATION_CODE; ?>"><?php echo $lo->OCCUPATION_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>กลุ่มอาชีพ</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="AreaReligionPercentage"id="AreaReligionPercentage" placeholder="ร้อยละของแต่ละศาสนา">
                    <label >ร้อยละของแต่ละกลุ่มอาชีพ</label>
                  </div>
                </div>
                

              </form><!-- End Form ข้อมูลการประกอบอาชีพในพื้นที่ -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
<script>
  function check(AREA_IDENTITY){
    var EDUCATION = /^[0-9]{4}$/;
    if(AREA_IDENTITY.EducationYear.value ==""){
        alert("กรุณากรอกปีการศึกษา");
        AREA_IDENTITY.EducationYear.value = "";
        return false;
    }else if (!AREA_IDENTITY.EducationYear.value.match(EDUCATION)){
        alert("กรุณากรอกปีการศึกษา");
        AREA_IDENTITY.Semester.value = "";
        return false;
    }
     if(AREA_IDENTITY.Semester.value==-1){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
    if(AREA_IDENTITY.SchoolID.value==-1){
      alert("กรุณาเลือกสถานศึกษา");
      return false;
    }
    var Check_text = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(AREA_IDENTITY.AreaProduct.value==""){
        alert("กรุณากรอกข้อมูลผลิตภัณฑ์ชุมชน");
        frm.AreaProduct.value = "";
        return false;
    }
    else if(!AREA_IDENTITY.AreaProduct.value.match(Check_text)){
        alert("กรุณากรอกข้อมูลผลิตภัณฑ์ชุมชน");
        frm.AreaProduct.value = "";
        return false;
    }

    if(AREA_IDENTITY.AreaEnvironment.value==""){
        alert("กรุณากรอกข้อมูลสภาพพื้นที่/สภาพแวดล้อม");
        frm.AreaEnvironment.value = "";
        return false;
    }
    else if(!AREA_IDENTITY.AreaEnvironment.value.match(Check_text)){
        alert("กรุณากรอกข้อมูลสภาพพื้นที่/สภาพแวดล้อม");
        frm.AreaEnvironment.value = "";
        return false;
    }
    
    if(AREA_IDENTITY.AreaLanguage.value==""){
        alert("กรุณากรอกภาษาท้องถิ่น");
        frm.AreaLanguage.value = "";
        return false;
    }
    else if(!AREA_IDENTITY.AreaLanguage.value.match(Check_text)){
        alert("กรุณากรอกภาษาท้องถิ่น");
        frm.AreaLanguage.value = "";
        return false;
    }
    
    if(AREA_IDENTITY.AreaCulture.value==""){
        alert("กรุณากรอกข้อมูลค่านิยมความเชื่อ");
        frm.AreaCulture.value = "";
        return false;
    }
    else if(!AREA_IDENTITY.AreaCulture.value.match(Check_text)){
        alert("กรุณากรอกข้อมูลค่านิยมความเชื่อ");
        frm.AreaCulture.value = "";
        return false;
    }

    if(AREA_IDENTITY.AreaValues.value==""){
        alert("กรุณากรอกค่านิยม/ความเชื่อ");
        frm.AreaValues.value = "";
        return false;
    }
    else if(!AREA_IDENTITY.AreaValues.value.match(Check_text)){
        alert("กรุณากรอกค่านิยม/ความเชื่อ");
        frm.AreaValues.value = "";
        return false;
    }

    $('#Modal').modal('show');  
  }
     
</script>

  </main><!-- End #main -->