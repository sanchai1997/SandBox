
<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขสาระการเรียนรู้ - <?php echo $SUBJECT_GROUP_NAME; ?> 
                            - <?php echo $LC_NAME; ?>
        </h1>
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
              <form class="row g-3" action="<?php echo base_url('edit_lc');?>" method="POST" name="editLC" id="editLC" enctype="multipart/form-data"> 
                <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                <input type="hidden" name="LC_ID"id="LC_ID" placeholder="หมายเลขสาระการเรียนรู้" value="<?php echo $lc[0] -> LC_ID; ?>">


                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="LC_NAME" id="LC_NAME "placeholder="ชื่อสาระการเรียนรู้"  value="<?php echo $lc[0]  -> LC_NAME; ?>">
                    <label >ชื่อสาระการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>


              <!-- End Form -->
                    <p></p>
                <div class="d-flex justify-content-between">
                  <a href="list-lc?gid=<?php echo $SUBJECT_GROUP_CODE; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(editLC)">แก้ไขข้อมูล</button>
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
                                  <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                              </h6>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-warning click" >แก้ไขข้อมูล</button> 
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


  function check(frm){

    var Check_text = /^.{1,2048}$/;

    if(frm.LC_NAME.value==""){
        alert("กรุณากรอกสาระการเรียนรู้");
        return false;
    }else if(!frm.LC_NAME.value.match(Check_text)){
        alert("กรุณากรอกสาระการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    $('#Modal').modal('show');
  }
</script>
  </main><!-- End #main -->
