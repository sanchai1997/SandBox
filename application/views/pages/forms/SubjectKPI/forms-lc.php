
<main id="main" class="main">

    <div class="pagetitle">
        <h1>สาระและมาตรฐานการเรียนรู้ - <?php echo $SUBJECT_GROUP_NAME; ?> </h1>
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

              <h5 class="card-title"> </h5>

              <!-- start Form  -->
              <form class="row g-3" action="<?php echo base_url('add_lc');?>" method="POST" name="addLC" id="addLC" enctype="multipart/form-data"> 
                <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                
                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="number" class="form-control" name="LC_ID"id="LC_ID" placeholder="หมายเลขสาระการเรียนรู้" min="1" max="99">
                    <label >หมายเลขสาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="LC_NAME" id="LC_NAME "placeholder="ชื่อสาระการเรียนรู้">
                    <label >ชื่อสาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <h5 class="card-title" style ="padding: 10px 0 0px 0;">มาตรฐานการเรียนรู้</h5>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="SUBJECT_STD_ID1" id="SUBJECT_STD_ID1 "placeholder="รหัสมาตรฐานการเรียนรู้" required>
                    <label >รหัสมาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <textarea type="text" class="form-control" name="SUBJECT_STD_DETAILS1" id="SUBJECT_STD_DETAILS1"placeholder="มาตรฐานการเรียนรู้" required></textarea>
                    <label >มาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div  class=" div_STD"></div>

                <input type="hidden" value="1" id="total_STD" name="total_STD">
                <div style="text-align: right; padding: 0px; ">
                  <input type="button" onclick="add_STD()" value="เพิ่มมาตรฐานการเรียนรู้" class="btn btn-success" id="btn_add_STD">
                  <input type="button" onclick="remove_STD(addLC)" value="ลบมาตรฐานการเรียนรู้" class="btn btn-danger"  id="btn_remove_STD" disabled>
                </div> 

              <!-- End Form -->
                    <p></p>
                <div class="d-flex justify-content-between">
                  <a href="list-lc?gid=<?php echo $SUBJECT_GROUP_CODE; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-primary" onclick="return check(addLC)">บันทึกข้อมูล</button>
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
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
      function add_STD(){
    var new_STD_no = parseInt($('#total_STD').val())+1;
      $('#btn_remove_STD').prop('disabled', false);
      var new_input= 
      "<div  class='col-md-16 div_STD"+new_STD_no+"'"+" style='padding-bottom: 1rem;'>" +
        "<hr>" + 
        "<div class='col-md-16' style='padding-bottom: 1rem;'>" +
                    "<div class='form-floating'>"+
                    " <input type='text' class='form-control' name='SUBJECT_STD_ID"+new_STD_no+"' id='SUBJECT_STD_ID"+new_STD_no+"' placeholder='รหัสมาตรฐานการเรียนรู้' required> " +
                    " <label >รหัสมาตรฐานการเรียนรู้<font color='red'> *</font></label> " +
                      "  </div> " +
        "  </div> " +

        "<div class='col-md-16'>"+
                    "<div class='form-floating'>"+
                    " <textarea type='text' class='form-control' name='SUBJECT_STD_DETAILS"+new_STD_no+"' id='SUBJECT_STD_DETAILS"+new_STD_no+"' placeholder='มาตรฐานการเรียนรู้' required></textarea> " +
                    " <label >มาตรฐานการเรียนรู้<font color='red'> *</font></label> " +
                      "  </div> " +
        "  </div> " +

      "  </div> " ;

      if(new_STD_no==1){
      $('#btn_remove_STD').prop('disabled', true);
      }

      $('.div_STD').append(new_input);
      $('#total_STD').val(new_STD_no)

    return false;
  }

  function remove_STD(){
    var last_STD_no = $('#total_STD').val();
    if(last_STD_no>1){
      $('.div_STD'+last_STD_no).remove();
      $('#total_STD').val(last_STD_no-1);
    }

    if(last_STD_no<=2){
      $('#btn_remove_STD').prop('disabled', true);
    }


    return false;
  }

  function check(frm){
    var check_LC_ID = /^[0-9]{1,2}$/;

    if(frm.LC_ID.value==""){
        alert("กรุณากรอกหมายเลขสาระการเรียนรู้");
        return false;
    }else if(!frm.LC_ID.value.match(check_LC_ID)){
        alert("กรุณากรอกหมายเลขสาระการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    var Check_text = /^.{1,2048}$/;

    if(frm.LC_NAME.value==""){
        alert("กรุณากรอกสาระการเรียนรู้");
        return false;
    }else if(!frm.LC_NAME.value.match(Check_text)){
        alert("กรุณากรอกสาระการเรียนรู้ให้ถูกต้อง");
    return false;
    }
    
    var Check_STD_ID = /^.{1,20}$/;

    if(frm.SUBJECT_STD_ID1.value==""){
        alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm.SUBJECT_STD_ID1.value.match(Check_STD_ID)){
        alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    if(frm.SUBJECT_STD_DETAILS1.value==""){
        alert("กรุณากรอกมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm.SUBJECT_STD_DETAILS1.value.match(Check_text)){
        alert("กรุณากรอกมาตรฐานการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    $('#Modal').modal('show');
  }
</script>

  </main><!-- End #main -->
