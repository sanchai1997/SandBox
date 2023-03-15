<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลงบประมาณ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Budget</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ข้อมูลงบประมาณ</h5>

              <!-- start Form ข้อมูลงบประมาณ -->
              <form class="row g-3" action="<?php echo base_url('');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">
              
              <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetEducationYear"id="BudgetEducationYear" placeholder="ปีการศึกษา" maxlength="4">
                    <label >ปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
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
                    <input type="text" class="form-control"name="BudgetYear"id="BudgetYear" placeholder="ปีงบการศึกษา" maxlength="4">
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
                    <input type="text" class="form-control"name="BudgetProgram"id="BudgetProgram" placeholder="ชื่อ แผนงาน/โครงการ/กิจกรรม/รายการ">
                    <label >แผนงาน/โครงการ/กิจกรรม/รายการ</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetAmount"id="BudgetAmount" placeholder="จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา" maxlength="12">
                    <label >จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetDate"id="BudgetDate">
                    <label >วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetReceivedDate"id="BudgetReceivedDate">
                    <label >วันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา</label>
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary" onclick="return check(BUDGET)">ยืนยัน</button>
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


              <!-- start Form ข้อมูลรายจ่าย -->
              <form class="row g-3" action="<?php echo base_url('');?>" method="POST" name="EXPENSE" id="EXPENSE" enctype="multipart/form-data">
                <h5 class="card-title">ข้อมูลรายจ่าย</h5>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseEducationYear"id="ExpenseEducationYear" placeholder="ปีการศึกษาที่เบิกจ่าย" maxlength="4">
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
                  <select class="form-select" aria-label="Default select example" name="BudgetSchoolID" id="BudgetSchoolID">
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
                      <?php foreach($listEXPENSE_TYPE as $ls) { ?>
                        <option value="<?php echo $ls->EXPENSE_TYPE_NAME; ?>"><?php echo $ls->EXPENSE_TYPE_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>รหัสประเภทการเบิกจ่าย</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseAmount"id="ExpenseAmount" placeholder="ปีการศึกษาที่เบิกจ่าย" maxlength="4">
                    <label >จำนวนวันที่เบิกจ่าย</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="ExpenseDate"id="ExpenseDate">
                    <label >วันที่เบิกจ่าย</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary" onclick="return check2(EXPENSE)">ยืนยัน</button>
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
                
              </form><!-- End Form ข้อมูลรายจ่าย -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
    <script>
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

    $('#Modal').modal('show');
  }
  function check2(frm){
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
    //Check_BudgetSchoolID(เลือกสถานศึกษา)
    if(frm.BudgetSchoolID.value==-1){
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

  </main><!-- End #main -->
