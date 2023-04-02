<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($Budget as $b) { ?>
<?php foreach($expense as $e) { ?>
    <div class="pagetitle">
      <h1>แก้ไขข้อมูลงบประมาณ</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลงบประมาณ</h5>

              <!-- start Form ข้อมูลงบประมาณ -->
              <form class="row g-3" action="<?php echo base_url('add-budget');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">
              
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
                  <select class="form-select" aria-label="Default select example" name="BudgetSchoolID" id="BudgetSchoolID">
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
                   <!-- start Form ข้อมูลรายจ่าย -->
                  <h5 class="card-title">ข้อมูลรายจ่าย</h5>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseEducationYear"id="ExpenseEducationYear" placeholder="ปีการศึกษาที่เบิกจ่าย" maxlength="4" value="<?php echo $e->ExpenseEducationYear ; ?>">
                    <label >ปีการศึกษาที่เบิกจ่าย</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="ExpenseSemester" id="ExpenseSemester">
                      <option selected value="-1">เลือกภาคเรียน</option>
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                    <label>ภาคเรียนที่เบิกจ่าย</label>
                  </div>
                </div>

               

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="ExpenseSchoolID" id="ExpenseSchoolID">
                      <option selected value="-1">เลือกสถานศึกษา</option>
                      <?php foreach($listSchool as $ls) { ?>
                        <option value="<?php echo $ls->SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></option>
                      <?php } ?>
                    </select>
                    <label>สถานศึกษาที่เบิกจ่าย</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="ExpenseTypeCode" id="ExpenseTypeCode">
                      <option selected value="-1">เลือกประเภทการเบิกจ่าย</option>
                      <?php foreach($listBudget_type as $lb_t) { ?>
                        <option value="<?php echo $lb_t->BUDGET_TYPE_CODE; ?>"><?php echo $lb_t->BUDGET_TYPE_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>รหัสประเภทการเบิกจ่าย</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseAmount"id="ExpenseAmount" placeholder="ปีการศึกษาที่เบิกจ่าย" maxlength="4" value="<?php echo $e->ExpenseAmount ; ?>">
                    <label >จำนวนวันที่เบิกจ่าย</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="ExpenseDate"id="ExpenseDate" value="<?php echo $e->ExpenseDate ; ?>">
                    <label >วันที่เบิกจ่าย</label>
                  </div>
                </div>

           <!-- End Form ข้อมูลรายจ่าย -->
              
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
                              <button type="submit" class="btn btn-primary click" >บันทึกข้อมูล</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>   

                <div class="d-flex justify-content-between">
                  <a href="list-budget" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(BUDGET)">บันทึกข้อมูล</button>
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
   //BudgetSchoolID
   var my_BudgetSchoolID = "<?php echo $b->BudgetSchoolID; ?>";
   var selectoption_BudgetSchoolID = document.querySelector('#BudgetSchoolID');
   var size_my_BudgetSchoolID =  document.getElementById("BudgetSchoolID").options.length;
   for (let i = 0; i < size_my_BudgetSchoolID; i++) {
     if(selectoption_BudgetSchoolID[i].value==my_BudgetSchoolID){
      selectoption_BudgetSchoolID[i].selected = true;
        break;
     }
   }

     ///ExpenseSemester
   var my_ExpenseSemester = "<?php echo $e->ExpenseSemester; ?>";
   var selectoption_ExpenseSemester = document.querySelector('#ExpenseSemester');
   var size_my_ExpenseSemester =  document.getElementById("ExpenseSemester").options.length;
   for (let i = 0; i < size_my_ExpenseSemester; i++) {
     if(selectoption_ExpenseSemester[i].value==my_ExpenseSemester){
      selectoption_ExpenseSemester[i].selected = true;
        break;
     }
   }

   
    //ExpenseSchoolID
   var my_ExpenseSchoolID = "<?php echo $e->ExpenseSchoolID ; ?>";
   var selectoption_ExpenseSchoolID = document.querySelector('#ExpenseSchoolID');
   var size_my_ExpenseSchoolID =  document.getElementById("ExpenseSchoolID").options.length;
   for (let i = 0; i < size_my_ExpenseSchoolID; i++) {
     if(selectoption_ExpenseSchoolID[i].value==my_ExpenseSchoolID){
      selectoption_ExpenseSchoolID[i].selected = true;
        break;
     }
   }

       //ExpenseSchoolID
    var my_ExpenseTypeCode = "<?php echo $e->ExpenseTypeCode ; ?>";
   var selectoption_ExpenseTypeCode = document.querySelector('#ExpenseTypeCode');
   var size_my_ExpenseTypeCode =  document.getElementById("ExpenseTypeCode").options.length;
   for (let i = 0; i < size_my_ExpenseTypeCode; i++) {
     if(selectoption_ExpenseTypeCode[i].value==my_ExpenseTypeCode){
      selectoption_ExpenseTypeCode[i].selected = true;
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
    
    var Check_BudgetAmount = /^[0-9]{1,12}$/;
    if(frm.BudgetAmount.value ==""){
        alert("กรุณากรอกจำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetAmount.value = "";
        return false;
    }else if (!frm.BudgetAmount.value.match(Check_BudgetAmount)){
        alert("กรุณากรอกจำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษาให้ถูกต้อง");
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

    //Check_ExpenseEducationYear(ปีการศึกษาที่เบิกจ่าย)
    var EDUCATION = /^[0-9]{4}$/;
    if(frm.ExpenseEducationYear.value ==""){
        alert("กรุณากรอกปีการศึกษาที่เบิกจ่าย");
        frm.ExpenseEducationYear.value = "";
        return false;
    }else if (!frm.ExpenseEducationYear.value.match(EDUCATION)){
        alert("กรุณากรอกปีการศึกษาที่เบิกจ่าย");
        frm.ExpenseEducationYear.value = "";
        return false;
    }
     //Check_ExpenseSemester (ภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
     if(frm.ExpenseSemester.value==-1){
      alert("กรุณาเลือกภาคเรียนที่เบิกจ่าย");
      return false;
    }
    //Check_ExpenseSchoolID(เลือกสถานศึกษา)
    if(frm.ExpenseSchoolID.value==-1){
      alert("กรุณาเลือกสถานศึกษา");
      return false;
    }
    //Check_ExpenseTypeCode(ประเภทการเบิกจ่าย)
    if(frm.ExpenseTypeCode.value==-1){
      alert("กรุณากรอกประเภทการเบิกจ่าย");
      return false;
    }
    var Check_ExpenseAmount = /^[0-9]{1,12}$/;
    if(frm.ExpenseAmount.value ==""){
        alert("กรุณากรอกจำนวนเงินการเบิก");
        frm.ExpenseAmount.value = "";
        return false;
    }else if (!frm.ExpenseAmount.value.match(Check_ExpenseAmount)){
        alert("กรุณากรอกจำนวนเงินการเบิกให้ถูกต้อง");
        frm.ExpenseAmount.value = "";
        return false;
    }
    //Cehck_BudgetReceivedDate (วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา)
    if(frm.ExpenseDate.value==""){
      alert("กรุณากรอกข้อมูลวันที่เบิกจ่าย");
      return false;
    }

    $('#Modal').modal('show');
  }
</script>
<?php } ?> 
<?php } ?> 

  </main><!-- End #main -->
