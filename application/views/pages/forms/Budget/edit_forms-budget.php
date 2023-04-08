<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($Budget as $b) { ?>
    <div class="pagetitle">
      <h1>แก้ไขข้อมูลงบประมาณ</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- start Form ข้อมูลงบประมาณ -->
              <form class="row g-3" action="<?php echo base_url('edit-budget');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">
              
              
            
              <input type="hidden" class="form-control"name="BudgetID"id="BudgetID" value="<?php echo $b->BudgetID ; ?>">
              <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $SchoolID ; ?>">

              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetEducationYear"id="BudgetEducationYear" placeholder="ปีการศึกษา" maxlength="4" value="<?php echo $b->BudgetEducationYear; ?>">
                    <label >ปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา </label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="BudgetSemester" id="BudgetSemester">
                      <option selected value="-1">เลือกภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</option>
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                    <label>ภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetYear"id="BudgetYear" placeholder="ปีงบการศึกษา" maxlength="4" value="<?php echo $b->BudgetYear;?>">
                    <label >ปีงบประมาณ</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="AREA_NO" id="AREA_NO">
                      <option selected value="-1">เลือกชื่อเขตพื้นที่</option>
                      <?php foreach($innovation_area as $ina) { ?>
                        <option value="<?php echo $ina->INNOVATION_AREA_CODE ; ?>"><?php echo $ina->INNOVATION_AREA_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>ชื่อเขตพื้นที่<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="BUDGET_TYPE_CODE" id="BUDGET_TYPE_CODE">
                      <option selected value="-1">เลือกประเภทงบประมาณ</option>
                      <?php foreach($listBudget_type as $ept) { ?>
                        <option value="<?php echo $ept->BUDGET_TYPE_CODE  ; ?>"><?php echo $ept->BUDGET_TYPE_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>ประเภทงบประมาณ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <?php foreach($listSchool as $ls) { 
                        if($ls->SchoolID == $SchoolID) {?>
                         <input type="text" class="form-control"  placeholder="สถานศึกษา" value="<?php echo $ls->SchoolNameThai; ?>" disabled>
                         <input type="text" class="form-control" name="BudgetSchoolID" id="BudgetSchoolID" placeholder="สถานศึกษา" value="<?php echo $ls->SchoolID; ?>" hidden>
                  <?php } } ?>
                    <label >สถานศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetProgram"id="BudgetProgram" placeholder="ชื่อ แผนงาน/โครงการ/กิจกรรม/รายการ" value="<?php echo $b->BudgetProgram;?>">
                    <label >แผนงาน/โครงการ/กิจกรรม/รายการ</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetAmount"id="BudgetAmount" placeholder="จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา" maxlength="12" value="<?php echo $b->BudgetAmount;?>">
                    <label >จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetDate"id="BudgetDate" value="<?php echo $b->BudgetDate;?>">
                    <label >วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetReceivedDate"id="BudgetReceivedDate" value="<?php echo $b->BudgetReceivedDate;?>">
                    <label >วันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
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
                              <button type="submit" class="btn btn-primary click" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>   

                <div class="d-flex justify-content-between">
                  <a href="list_budget_by_school?sid=<?php echo $SchoolID?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(BUDGET)">แก้ไขข้อมูล</button>
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
                

              </form><!-- End Form ข้อมูลงบประมาณ -->


           

            </div>
          </div>

        </div>

        
      </div>
    </section>
    <script>
  function onloadpage(){

  ///Semester
   var my_Semester = "<?php echo $b->BudgetSemester; ?>";
   var selectoption_Semester = document.querySelector('#BudgetSemester');
   var size_my_Semester =  document.getElementById("BudgetSemester").options.length;
   for (let i = 0; i < size_my_Semester; i++) {
     if(selectoption_Semester[i].value==my_Semester){
      selectoption_Semester[i].selected = true;
        break;
     }
   }

      //AREA_NO
      var my_AREA_NO = "<?php echo $b->AREA_NO; ?>";
   var selectoption_AREA_NO = document.querySelector('#AREA_NO');
   var size_my_AREA_NO =  document.getElementById("AREA_NO").options.length;
   for (let i = 0; i < size_my_AREA_NO; i++) {
     if(selectoption_AREA_NO[i].value==my_AREA_NO){
      selectoption_AREA_NO[i].selected = true;
        break;
     }
   }
  //BUDGET_TYPE_CODE
  var my_BUDGET_TYPE_CODE= "<?php echo $b->BUDGET_TYPE_CODE; ?>";
   var selectoption_BUDGET_TYPE_CODE = document.querySelector('#BUDGET_TYPE_CODE');
   var size_my_BUDGET_TYPE_CODE =  document.getElementById("BUDGET_TYPE_CODE").options.length;
   for (let i = 0; i < size_my_BUDGET_TYPE_CODE; i++) {
     if(selectoption_BUDGET_TYPE_CODE[i].value==my_BUDGET_TYPE_CODE){
      selectoption_BUDGET_TYPE_CODE[i].selected = true;
        break;
     }
   }

   
  }
  function check(frm){

    //Check_BudgetEducationYear(ปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
    var EDUCATION = /^[0-9]{4}$/;
    if(frm.BudgetEducationYear.value ==""){
        alert("กรุณากรอกปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetEducationYear.value = "";
        return false;
    }else if (!frm.BudgetEducationYear.value.match(EDUCATION)){
        alert("กรุณากรอกปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetEducationYear.value = "";
        return false;
    }
     //Check_BudgetSemester (ภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
     if(frm.BudgetSemester.value==-1){
      alert("กรุณาเลือกภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
      return false;
    }
    //Check_BudgetYear (ปีงบประมาณ)
    if(frm.BudgetYear.value ==""){
        alert("กรุณากรอกปีงบประมาณ");
        frm.BudgetYear.value = "";
        return false;
    }else if (!frm.BudgetYear.value.match(EDUCATION)){
        alert("กรุณากรอกปีงบประมาณ");
        frm.BudgetYear.value = "";
        return false;
    }

    //Check_BudgetSchoolID(เลือกสถานศึกษา)
    if(frm.BudgetSchoolID.value==-1){
      alert("กรุณาเลือกสถานศึกษา");
      return false;
    }
    //Check_BudgetProgram(แผนงาน/โครงการ/กิจกรรม/รายการ)
    var CHECK_BudgetProgram = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
    if(frm.BudgetProgram.value==""){
        alert("กรุณากรอกแผนงาน/โครงการ/กิจกรรม/รายการ");
        frm.BudgetProgram.value = "";
        return false;
    }else if(!frm.BudgetProgram.value.match(CHECK_BudgetProgram)){
        alert("กรุณากรอกชื่อหลักสูตรให้ถูกต้อง");
        frm.BudgetProgram.value = "";
        return false;
    }
    

    if(frm.BudgetAmount.value ==""){
        alert("กรุณากรอกจำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetAmount.value = "";
        return false;
    }
    //Check_BudgetDate  (วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
    if(frm.BudgetDate.value ==""){
      alert("กรุณากรอกข้อมูลวันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษาย");
      return false;
    }
    //Cehck_BudgetReceivedDate (วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
    if(frm.BudgetReceivedDate.value==""){
      alert("กรุณากรอกข้อมูลวันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
      return false;
    }


    $('#Modal').modal('show');
  }
</script>
<?php } ?> 


  </main><!-- End #main -->
