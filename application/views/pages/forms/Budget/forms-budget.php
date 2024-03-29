<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลงบประมาณ</h1>
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
              <h5 class="card-title"></h5>

              <!-- start Form ข้อมูลงบประมาณ -->
              <form class="row g-3" action="<?php echo base_url('add-budget');?>" method="POST" name="BUDGET" id="BUDGET" enctype="multipart/form-data">
              
              <input type="hidden" class="form-control"name="SchoolID"id="SchoolID" value="<?php echo $SchoolID ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetID"id="BudgetID" placeholder="ปีการศึกษา" maxlength="16" require>
                    <label >รหัสเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetEducationYear"id="BudgetEducationYear" placeholder="ปีการศึกษา" maxlength="4">
                    <label >ปีการศึกษาที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
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
                    <label>ภาคเรียนที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetYear"id="BudgetYear" placeholder="ปีงบการศึกษา" maxlength="4">
                    <label >ปีงบประมาณ<font color="red"> *</font></label>
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
                    <input type="text" class="form-control"name="BudgetProgram"id="BudgetProgram" placeholder="ชื่อ แผนงาน/โครงการ/กิจกรรม/รายการ">
                    <label >แผนงาน/โครงการ/กิจกรรม/รายการ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="BudgetAmount"id="BudgetAmount" placeholder="จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา">
                    <label >จำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetDate"id="BudgetDate">
                    <label >วันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="BudgetReceivedDate"id="BudgetReceivedDate">
                    <label >วันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="list_budget_by_school?sid=<?php echo $SchoolID?>" class="btn btn-danger" >ยกเลิก</a>
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
  function check(frm){
    //BudgetID
    if(frm.BudgetID.value ==""){
        alert("รหัสเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetID.value = "";
        return false;
    }

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
      if(frm.AREA_NO.value==-1){
      alert("กรุณาเลือกชื่อเขตพื้นที่");
      return false;
    }
     
      if(frm.BUDGET_TYPE_CODE.value==-1){
      alert("กรุณาเลือกประเภทงบประมาณ");
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
    
    var Check_BudgetAmount =  /^(?:\d{1,12}(?:\.\d{0,2})?|\d{1,12})$/;  
    if(frm.BudgetAmount.value ==""){
        alert("กรุณากรอกจำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
        frm.BudgetAmount.value = "";
        return false;
    }else if (!frm.BudgetAmount.value.match(Check_BudgetAmount)){
        alert("กรุณากรอกจำนวนเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษาให้ถูกต้อง");
        frm.BudgetAmount.value = "";
        return false;
    }

     //Check_BudgetDate
     if(frm.BudgetDate.value == ""){
      alert("กรุณากรอกข้อมูลวันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
      return false;
    }else if(frm.BudgetDate.value =="" && frm.BudgetReceivedDate.value !="" ){
      alert("กรุณากรอกข้อมูลวันที่อนุมัติเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษาก่อน");
      return false;
    }else if(frm.BudgetDate.value !="" && frm.BudgetReceivedDate.value =="" ){
      alert("กรุณากรอกข้อมูลวันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
      return false;
    }else if(frm.BudgetReceivedDate.value <  frm.BudgetDate.value ){
      alert("กรุณากรอกข้อมูลวันที่อนุมัติเงินอุดหนุนให้น้อยกว่าวันที่ได้รับเงินอุดหนุน");
      return false;
    }
    //Check_BudgetReceivedDate
    if(frm.BudgetReceivedDate.value ==""){
      alert("กรุณากรอกข้อมูลวันที่ได้รับเงินอุดหนุนทั่วไปเพื่อพัฒนานวัตกรรมการศึกษา");
      return false;
    }

    $('#Modal').modal('show');
  }

  </script>

  </main><!-- End #main -->
