<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลเบิกจ่าย</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
        

              <!-- start Form  ข้อมูลรายจ่าย  -->
              <form class="row g-3" action="<?php echo base_url('add-Expense');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">

                <h5 class="card-title"></h5>

                <input type="hidden" class="form-control"name="BudgetID"id="BudgetID" value="<?php echo $BudgetID ?>">
                
                <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $SchoolID ?>">
                <div class="col-md-16 ">
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
                  <select class="form-select" aria-label="Default select example" name="ExpenseBudgetSchoolID" id="ExpenseBudgetSchoolID">
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
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
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
      if(frm.ExpenseBudgetSchoolID.value==-1){
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