<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($expense as $e) { ?>
    <div class="pagetitle">
      <h1>แก้ไขข้อมูลเบิกจ่าย</h1>
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
          

              <!-- start Form ข้อมูลงบประมาณ -->
              <form class="row g-3" action="<?php echo base_url('edit-Expense');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">
              
              
              <input type="hidden" class="form-control"name="OLD_ExpenseID"id="OLD_ExpenseID" value="<?php echo $ExpenseID ; ?>">
              <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $SchoolID ; ?>">

                   <!-- start Form ข้อมูลรายจ่าย -->
                  <h5 class="card-title"></h5>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseID"id="ExpenseID" placeholder="ปีการศึกษา" maxlength="16" require value="<?php echo $e->ExpenseID ; ?>"> 
                    <label >รหัสการเบิกจ่าย<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseEducationYear"id="ExpenseEducationYear" placeholder="ปีการศึกษาที่เบิกจ่าย" maxlength="4" value="<?php echo $e->ExpenseEducationYear ; ?>">
                    <label >ปีการศึกษาที่เบิกจ่าย<font color="red"> *</font></label>
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
                    <label>ภาคเรียนที่เบิกจ่าย<font color="red"> *</font></label>
                  </div>
                </div>

    

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="ExpenseTypeCode" id="ExpenseTypeCode">
                      <option selected value="-1">เลือกประเภทการเบิกจ่าย</option>
                      <?php foreach($listExpense_type as $lb_t) { ?>
                        <option value="<?php echo $lb_t->EXPENSE_TYPE_CODE; ?>"><?php echo $lb_t->EXPENSE_TYPE_NAME; ?></option>
                      <?php } ?>
                    </select>
                    <label>ประเภทการเบิกจ่าย<font color="red"> *</font></label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="ExpenseAmount"id="ExpenseAmount" placeholder="จำนวนเงินการเบิกจ่าย" value="<?php echo $e->ExpenseAmount ; ?>">
                    <label >จำนวนเงินการเบิกจ่าย<font color="red"> * ต้องไม่เกิน<?php echo number_format($limit_amount);   ?>  บาท</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="ExpenseDate"id="ExpenseDate" value="<?php echo $e->ExpenseDate ; ?>">
                    <label >วันที่เบิกจ่าย<font color="red"> * ต้องมากกว่าหรือเท่ากับวันที่ <?php if ($limit_amount!=0) {echo $BudgetReceivedDate; }  ?></font></label> 
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="list_budget_by_school?sid=<?php echo $SchoolID?>" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $e->ExpenseID ; ?>">
                                        <i class=" bi bi-trash"></i>
                  <button type="button" class="btn btn-warning" onclick="return check(BUDGET)">แก้ไขข้อมูล</button>
                </div> 

           <!-- End Form ข้อมูลรายจ่าย -->
              
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
                                  <center>คุณต้องการเพิ่มข้อมูลใช่หรือไม่ ?</center>
                              </h6>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-warning click" >แก้ไขข้อมูล</button> 
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>   



               
               <div class="modal fade" id="delete<?php echo $e->ExpenseID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>
                                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                    <a href="delete_Expense?eid=<?php echo $e->ExpenseID; ?>&&sid=<?php echo $SchoolID; ?>" class="btn btn-danger">ลบ</a>
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

       //ExpenseSTypeCode
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
    if(frm.ExpenseID.value ==""){
        alert("รหัสการเบิกจ่าย");
        frm.ExpenseID.value = "";
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
    //Check_ExpenseTypeCode(ประเภทการเบิกจ่าย)
    if(frm.ExpenseTypeCode.value==-1){
      alert("กรุณากรอกประเภทการเบิกจ่าย");
      return false;
    }

    var Check_ExpenseAmount =/^(?:\d{1,12}(?:\.\d{0,2})?|\d{1,12})$/;  
    
    if(frm.ExpenseAmount.value ==""){
        alert("กรุณากรอกจำนวนเงินการเบิกจ่าย");
        frm.ExpenseAmount.value = "";
        return false;
    }else if (!frm.ExpenseAmount.value.match(Check_ExpenseAmount)){
        alert("กรุณากรอกจำนวนเงินการเบิกให้ถูกต้อง");
        frm.ExpenseAmount.value = "";
        return false;
    }
    if (frm.ExpenseAmount.value><?php echo $limit_amount; ?>){
        alert("จำนวนเงินการเบิกจ่ายต้องไม่เกิน<?php echo number_format($limit_amount); ?>");
        frm.ExpenseAmount.value = "";
        return false;
    }


    //Cehck_ExpenseDate
    if(frm.ExpenseDate.value==""){
      alert("กรุณากรอกข้อมูลวันที่เบิกจ่าย");
      return false;
    }else if(frm.ExpenseDate.value < '<?php echo $BudgetReceivedDate; ?>'){
        alert("วันที่เบิกจ่ายต้องมากกว่าหรือเท่ากับวันที่<?php echo $BudgetReceivedDate; ?>");
        frm.ExpenseDate.value = "";
        return false;
    }

    $('#Modal').modal('show');
  }
</script>
<?php } ?> 


  </main><!-- End #main -->
