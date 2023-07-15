
<main id="main" class="main">

    <div class="pagetitle">
        <h1>แก้ไขมาตรฐานการเรียนรู้ - <?php echo $SUBJECT_GROUP_NAME; ?> 
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
              <form class="row g-3" action="<?php echo base_url('edit_std');?>" method="POST" name="editSTD" id="editSTD" enctype="multipart/form-data"> 
                <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                <input type="hidden"  name="LC_ID"id="LC_ID"  value="<?php echo $LC_ID; ?>">
                <input type="hidden" name="LC_NAME"id="LC_NAME"  value="<?php echo $LC_NAME; ?>">
                <input type="hidden"  name="OLD_SUBJECT_STD_ID"id="OLD_SUBJECT_STD_ID"  value="<?php echo $SUBJECT_STD_ID; ?>">
               
                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="SUBJECT_STD_ID" id="SUBJECT_STD_ID "placeholder="รหัสมาตรฐานการเรียนรู้" required value="<?php echo $std[0]->SUBJECT_STD_ID ; ?>">
                    <label >รหัสมาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <textarea type="text" class="form-control" name="SUBJECT_STD_DETAILS" id="SUBJECT_STD_DETAILS"placeholder="มาตรฐานการเรียนรู้" required><?php echo $std[0]->SUBJECT_STD_DETAILS ; ?></textarea>
                    <label >มาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>

              <!-- End Form -->
                    <p></p>
                <div class="d-flex justify-content-between">
                  <a href="list-lc?gid=<?php echo $SUBJECT_GROUP_CODE; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete"><i class=" bi bi-trash"></i></button>

                  <button type="button" class="btn btn-warning" onclick="return check(editSTD)">แก้ไขข้อมูล</button>
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

                <!-- Modal delete  -->
               <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
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
                                  
                                <form action="<?php echo base_url('delete-std');?>" method="POST" name="delSTD" id="delSTD" enctype="multipart/form-data">
                                        <input type="hidden" name="SUBJECT_STD_ID" id="SUBJECT_STD_ID " value="<?php echo $SUBJECT_STD_ID; ?>">
                                        <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">ลบ</button>
                                </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                </div>
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>


  function check(frm){
    var Check_STD_ID = /^.{1,20}$/;
    var Check_text = /^.{1,2048}$/;

    if(frm.SUBJECT_STD_ID.value==""){
        alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm.SUBJECT_STD_ID.value.match(Check_STD_ID)){
        alert("กรุณากรอกรหัสมาตรฐานการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    if(frm.SUBJECT_STD_DETAILS.value==""){
        alert("กรุณากรอกมาตรฐานการเรียนรู้");
        return false;
    }else if(!frm.SUBJECT_STD_DETAILS.value.match(Check_text)){
        alert("กรุณากรอกมาตรฐานการเรียนรู้ให้ถูกต้อง");
    return false;
    }

    $('#Modal').modal('show');
  }
</script>

  </main><!-- End #main -->
