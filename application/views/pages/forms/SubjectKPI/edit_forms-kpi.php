<body onload="onloadpage()">

<main id="main" class="main">
<?php foreach($KPI as $k) { ?>
    <div class="pagetitle">
        <h1>แก้ไขตัวชี้วัดชั้นปี
            - ชั้นปี<?php echo $GRADE_LEVEL_NAME; ?> 
            - กลุ่มสาระ<?php echo $SUBJECT_GROUP_NAME; ?> 
            - สาระ <?php echo $LC_NAME; ?> 
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
              <form class="row g-3" action="<?php echo base_url('edit_kpi');?>" method="POST" name=editKPI" id="editKPI" enctype="multipart/form-data"> 
                <input type="hidden" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE" value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                <input type="hidden" name="SUBJECT_KPI_YEAR"id="SUBJECT_KPI_YEAR" value="<?php echo $SUBJECT_KPI_YEAR; ?>">
                <input type="hidden" name="OLD_SUBJECT_KPI_ID"id="OLD_SUBJECT_KPI_ID" value="<?php echo $k -> SUBJECT_KPI_ID; ?>">
                <input type="hidden" name="LC_ID"id="LC_ID" value="<?php echo $LC_ID; ?>">

                
                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="SUBJECT_KPI_ID"id="SUBJECT_KPI_ID" placeholder="รหัสตัวชี้วัดรายวิชา" value="<?php echo $k ->SUBJECT_KPI_ID; ?>">
                    <label >รหัสตัวชี้วัดรายวิชา<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <textarea  class="form-control" name="SUBJECT_KPI_DETAIL"id="SUBJECT_KPI_DETAIL" placeholder="รายละเอียดตัวชี้วัด" ><?php echo $k ->SUBJECT_KPI_DETAIL; ?></textarea>                  
                    <label >รายละเอียดตัวชี้วัด<font color="red"> *</font></label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="SUBJECT_STD_ID" id="SUBJECT_STD_ID" >
                      <option selected value="-1">เลือกมาตรฐานการเรียนรู้</option>
                      <?php   $listLC  =     $this->db->select('*')
                                            ->from('SUBJECT_STD ')
                                            ->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
                                            ->where('LC_ID', $LC_ID)
                                            ->where('DeleteStatus', 0)
                                            ->get()
                                            ->result()
                                            ;
                        foreach($listLC as $ls) { ?>
                        <option value="<?php echo $ls->SUBJECT_STD_ID; ?>" ><?php  echo $ls->SUBJECT_STD_ID; ?> <?php  echo $ls->SUBJECT_STD_DETAILS; ?></option>
                      <?php } ?>
                    </select>
                    <label >มาตรฐานการเรียนรู้<font color="red"> *</font></label>
                  </div>
                </div>
<!--
                <div class="col-md-16">
                  <div class="form-floating">
                  <textarea type="text" class="form-control" name="SUBJECT_LC_STD"id="SUBJECT_LC_STD" placeholder="สาระการเรียนรู้แกนกลาง" ><?php echo $k ->SUBJECT_LC_STD; ?></textarea>
                    <label >สาระการเรียนรู้แกนกลาง<font color="red"> </font></label>
                  </div>
                </div>
-->      

              <!-- End Form -->
                    <p></p>
                <div class="d-flex justify-content-between">
                  <a href="list-kpi?gid=<?php echo $SUBJECT_GROUP_CODE; ?>&&y=<?php echo $SUBJECT_KPI_YEAR; ?>&&lc=<?php echo $LC_ID; ?>" class="btn btn-danger">ยกเลิก</a>
                  <button type="button" class="btn btn-warning" onclick="return check(editKPI)">แก้ไขข้อมูล</button>
                </div> 
               <!-- Modal -->
               <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการเแก้ไขข้อมูล</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h6>
                                  <center>คุณต้องการเแก้ไขข้อมูลใช่หรือไหม ?</center>
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
  function onloadpage(){
   
   ///SUBJECT_STD_ID
   var my_SUBJECT_STD_ID = "<?php echo $k->SUBJECT_STD_ID; ?>"; 
   var selectoption_SUBJECT_STD_ID = document.querySelector('#SUBJECT_STD_ID'); 
   var size_my_SUBJECT_STD_ID =  document.getElementById("SUBJECT_STD_ID").options.length;
   for (let i = 0; i < size_my_SUBJECT_STD_ID; i++) {  
     if(selectoption_SUBJECT_STD_ID[i].value==my_SUBJECT_STD_ID){  
      selectoption_SUBJECT_STD_ID[i].selected = true;       
     }
   }

  }
  
  function check(frm){
    var Check_KPI_ID = /^.{1,20}$/;

    if(frm.SUBJECT_KPI_ID.value==""){
        alert("กรุณากรอกรหัสตัวชี้วัด");
        return false;
    }else if(!frm.SUBJECT_KPI_ID.value.match(Check_KPI_ID)){
        alert("กรุณากรอกรหัสตัวชี้วัดให้ถูกต้อง");
    return false;
    }


    var Check_text = /^.{1,2048}$/;

    if(frm.SUBJECT_KPI_DETAIL.value==""){
        alert("กรุณากรอกรายละเอียดตัวชี้วัด");
        return false;
    }else if(!frm.SUBJECT_KPI_DETAIL.value.match(Check_text)){
        alert("กรุณากรอกรายละเอียดตัวชี้วัดให้ถูกต้อง");
    return false;
    }
    
    if(frm.SUBJECT_STD_ID.value==-1){
      alert("กรุณาเลือกมตรฐานการเรียนรู้");
      return false;
    }

    $('#Modal').modal('show');
  }
</script>
<?php } ?>  
  </main><!-- End #main -->
