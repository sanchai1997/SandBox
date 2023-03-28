<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($EPORTFOLIO as $ep){?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลรายงานผลการเรียนรู้รายบุคคล</h1>
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

              <!-- start Form ข้อมูลกิจกรรม  -->
              <form class="row g-3" action="<?php echo base_url('edit_eportfolio');?>" method="POST" name="ACTIVITY" id="ACTIVITY" enctype="multipart/form-data"> 

              <input type="hidden" class="form-control" name="EPORTFOLIO_ID" id="EPORTFOLIO_ID"  value="<?php echo $ep->EPORTFOLIO_ID  ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_LIKE" id="STUDENT_LIKE" placeholder="ความชอบ" maxlength="100" value="<?php echo $ep->STUDENT_LIKE ?>">
                    <label >ความชอบ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="STUDENT_NO" id="STUDENT_NO" >
                     
                      <?php foreach($STUDENT as $stu) { ?>
                        <option value="<?php echo $stu->StudentReferenceID ; ?>"><?php echo $stu->StudentReferenceID ; ?></option>
                      <?php } ?>
                    </select>
                    <label >หมายเลขประจำตัวนักเรียน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_DREAM" id="STUDENT_DREAM" placeholder="ความฝัน" maxlength="100" value="<?php echo $ep->STUDENT_DREAM ?>">
                    <label >ความฝัน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_HOPE" id="STUDENT_HOPE" placeholder="ความหวัง" maxlength="100" value="<?php echo $ep->STUDENT_HOPE ?>">
                    <label >ความหวัง<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_TARGET" id="STUDENT_TARGET" placeholder="เป้าหมาย" maxlength="100" value="<?php echo $ep->STUDENT_TARGET ?>">
                    <label >เป้าหมาย<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_LEARNING" id="STUDENT_LEARNING" placeholder="สิ่งที่ได้เรียนรู้" maxlength="100" value="<?php echo $ep->STUDENT_LEARNING ?>">
                    <label >สิ่งที่ได้เรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_PROJECT" id="STUDENT_PROJECT" placeholder="ผลงาน" maxlength="100" value="<?php echo $ep->STUDENT_PROJECT ?>">
                    <label >ผลงาน <font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_GOODNESS" id="STUDENT_GOODNESS" placeholder="ความดี" maxlength="100" value="<?php echo $ep->STUDENT_GOODNESS ?>">
                    <label >ความดี<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_USEFULNESS" id="STUDENT_USEFULNESS" placeholder="คุณประโยชน์" maxlength="100" value="<?php echo $ep->STUDENT_USEFULNESS ?>">
                    <label >คุณประโยชน์<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_PRIDE" id="STUDENT_PRIDE" placeholder="ความภาคภูมิใจ" maxlength="100" value="<?php echo $ep->STUDENT_PRIDE ?>">
                    <label >ความภาคภูมิใจ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_SUMMARY" id="STUDENT_SUMMARY" placeholder="ความฝัน" maxlength="100" value="<?php echo $ep->STUDENT_SUMMARY ?>">
                    <label >สรุป<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(ACTIVITY)">แก้ไขข้อมูล</button>
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
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary" >ยืนยัน</button> 
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                          </div>
                      </div>
                  </div>
               </div>  
             </form>
              <!-- End Form ข้อมูลกิจกรรม  -->
            </div>
          </div>

        </div>

      </div>
    </section>

<script type="text/javascript">
   function onloadpage(){
   ///Semester
   var my_STUDENT_NO= "<?php echo $ep->STUDENT_NO; ?>";
   var selectoption_STUDENT_NO = document.querySelector('#STUDENT_NO');
   var size_my_STUDENT_NO =  document.getElementById("STUDENT_NO").options.length;
   for (let i = 0; i < size_my_STUDENT_NO; i++) {
     if(selectoption_STUDENT_NO[i].value==my_STUDENT_NO){
      selectoption_STUDENT_NO[i].selected = true;
        break;
     }
   }

 }
  function check(frm){
   if(frm.STUDENT_LIKE.value==""){
      alert("กรุณากรอกความชอบ")
      return false;
   }
   if(frm.STUDENT_NO.value==-1){
      alert("กรุณาเลือกหมายเลขประจำตัวนักเรียน")
      return false;
   }
   if(frm.STUDENT_DREAM.value==""){
      alert("กรุณากรอกความฝัน")
      return false;
   }
  
   if(frm.STUDENT_HOPE.value==""){
      alert("กรุณากรอกความหวัง")
      return false;
   }
   if(frm.STUDENT_TARGET.value==""){
      alert("กรุณากรอกเป้าหมาย")
      return false;
   }
   if(frm.STUDENT_LEARNING.value==""){
      alert("กรุณากรอกสิ่งที่ได้เรียนรู้")
      return false;
   }
   if(frm.STUDENT_PROJECT.value==""){
      alert("กรุณากรอกผลงาน")
      return false;
   }

    $('#Modal').modal('show');
    
  }

</script> 
<?php } ?>   
</main><!-- End #main -->
