
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลแฟ้มสะสมผลงาน</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <!-- Alert -->
      <?php if (!empty($_SESSION['errors'])) { ?>
      <div class="row">
        <div class="col-lg-9">
          <script>
                setTimeout(function() {
                    document.getElementById('myAlert').remove();
                }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            </script>
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
              <form class="row g-3 " action="<?php echo base_url('add_eportfolio/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" name="eportfolio" id="eportfolio" enctype="multipart/form-data" > 
              <input type="hidden" class="form-control" name="STUDENT_NO" id="STUDENT_NO" value="<?php echo $StudentReferenceID; ?>">

                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" name="STUDENT_LIKE" id="STUDENT_LIKE" placeholder="ความชอบ" ></textarea>
                    <label >ความชอบ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <textarea type="text" class="form-control" name="STUDENT_DREAM" id="STUDENT_DREAM" placeholder="ความฝัน" ></textarea>
                    <label >ความฝัน<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" name="STUDENT_HOPE" id="STUDENT_HOPE" placeholder="ความหวัง" ></textarea>
                    <label >ความหวัง<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" name="STUDENT_TARGET" id="STUDENT_TARGET" placeholder="เป้าหมาย" ></textarea>
                    <label >เป้าหมาย<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" name="STUDENT_LEARNING" id="STUDENT_LEARNING" placeholder="สิ่งที่ได้เรียนรู้"></textarea>
                    <label >สิ่งที่ได้เรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">ผลงาน <font color="red"> *</font></label>
                        <input type="file" class="form-control" name="STUDENT_PROJECT" id="STUDENT_PROJECT" placeholder="ผลงาน" >
                    </div>
                </div>

                <div  class=" div_PROJECT"></div>

                <input type="hidden" value="1" id="total_PROJECT">

                <div style="text-align: right; padding: 0px; ">
                  <input type="button" onclick="add()" value="เพิ่มผลงาน" class="btn btn-success" >
                  <input type="button" onclick="remove(eportfolio)" value="ลบผลงาน" class="btn btn-danger" >
                </div> 

                <div class="col-md-16">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">ความดี <font color="red"> *</font></label>
                        <input type="file" class="form-control" name="STUDENT_GOODNESS" id="STUDENT_GOODNESS" placeholder="ความดี">
                    </div>
                </div>


                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" name="STUDENT_USEFULNESS" id="STUDENT_USEFULNESS" placeholder="คุณประโยชน์" ></textarea>
                    <label >คุณประโยชน์<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <textarea  type="text" class="form-control" name="STUDENT_PRIDE" id="STUDENT_PRIDE" placeholder="ความภาคภูมิใจ"></textarea>
                    <label >ความภาคภูมิใจ<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="STUDENT_SUMMARY" id="STUDENT_SUMMARY" placeholder="สรุป" ></textarea>
                    <label >สรุป<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="student?SchoolID=<?= $SchoolID; ?>&&StudentReferenceID=<?= $StudentReferenceID ?>&&EducationYear=<?= $EducationYear; ?>&&Semester=<?= $Semester; ?>&&GradeLevelCode=<?= $GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger" >ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(eportfolio)">บันทึกข้อมูล</button>
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
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary" >ยืนยัน</button> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
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

  function add(){
    var new_PROJECT_no = parseInt($('#total_PROJECT').val())+1;
    var new_input= //"<input type='file' id='new_PROJECT"+new_PROJECT_no+"'>";
    "<div  class='col-md-16 div_PROJECT"+new_PROJECT_no+"'"+" style='padding-bottom: 1rem;'>" +
    "<div class='input-group div_PROJECT"+new_PROJECT_no+"'>"+
                      "  <label class='input-group-text' >ผลงาน <font color='red'> *</font></label> " +
                      "  <input type='file' class='form-control' id='new_PROJECT"+new_PROJECT_no+"'"+" name='new_PROJECT"+new_PROJECT_no+"'"+  "placeholder='ผลงาน' > " +
                  "  </div> " +
                  "  </div> " ;
                
    
    $('.div_PROJECT').append(new_input);
    $('#total_PROJECT').val(new_PROJECT_no)
    return false;
  }

  function remove(){
    var last_PROJECT_no = $('#total_PROJECT').val();
    if(last_PROJECT_no>1){
      $('.div_PROJECT'+last_PROJECT_no).remove();
      $('#total_PROJECT').val(last_PROJECT_no-1);
    }
    return false;
  }

  function check(frm){
   if(frm.STUDENT_LIKE.value==""){
      alert("กรุณากรอกความชอบ")
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
   ///////////////
   if(frm.STUDENT_PROJECT.value==""){
      alert("กรุณากรอกผลงาน")
      return false;
   }
   if(frm.STUDENT_GOODNESS.value==""){
      alert("กรุณาความดี ")
      return false;
   }
   /////
   if(frm.STUDENT_USEFULNESS.value==""){
      alert("กรุณากรอกคุณประโยชน์")
      return false;
   }
   if(frm.STUDENT_PRIDE.value==""){
      alert("กรุณากรอกความภาคภูมิใจ")
      return false;
   }
   if(frm.STUDENT_SUMMARY.value==""){
      alert("กรุณากรอกสรุป")
      return false;
   }

    $('#Modal').modal('show');
    
  }

</script>    
</main><!-- End #main -->
