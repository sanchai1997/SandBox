<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลการพัฒนาบุคลากร</h1>
            </div>

        </div>
    </div>
    <!-- End Page Title --> 

    <!-- Alert -->
    <?php if (!empty($_SESSION['success'])) { ?>
    <div class="col-12">
            <script>
                setTimeout(function() {
                    document.getElementById('myAlert').remove();
                }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            </script>
        
            <div class="alert alert-success" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-check-circle-fill"></i> '. $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
                </strong>
            </div> 
        
    </div>
    <?php } ?>  

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


    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">


                <div class="row">
                    <?php if($R_300000 <> NULL && $R_300000['UR_Add']== "1"){ ?>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title">
                        <a href="forms-teacher_development_activity" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                    <?php } ?>  
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ประเภทกิจกรรม</th>
                            <th style="text-align: center;" scope="col">ชื่อกิจกรรม</th>
                            <th style="text-align: center;" scope="col">จำนวนชั่วโมง</th>
                            <th style="text-align: center;" scope="col">วันที่เริ่มกิจกรรม</th>
                            <th style="text-align: center;" scope="col">เอกสารแนบ</th>
                            <?php if($R_300000 <> NULL && $R_300000['UR_Read']== "1"){ ?>
                            <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <?php } ?>  
                            <?php if($R_300000 <> NULL && ( $R_300000['UR_Edit']== "1" || $R_300000['UR_Delete']== "1") ){ ?>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            <?php } ?>  

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listTeacherDevelopmentActivity as $ls) { ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityEducationYear ; ?></th>
                                <td style="text-align: center;">
                                    <?php 
                                        $Semester_code = $ls->DevelopmentActivitySemester ;
                                        if($Semester_code==0) echo "ตลอดปีการศึกษา"; 
                                        else if($Semester_code==1) echo "ภาคเรียนที่ 1"; 
                                        else if($Semester_code==2) echo "ภาคเรียนที่ 2"; 
                                    ?>
                                </td>
                                <td style="text-align: center;"><?php echo $ls->TEACHER_DEVELOPMENT_ACTIVITY_TYPE_NAME; ?></td>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityName; ?></td>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityHour; ?></td>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityStartDate; ?></td>
                                <td style="text-align: center;"><a href="<?php echo base_url('assets/teacher_development/document/') ?><?php echo $ls->DevelopmentDocument; ?>" ><i class="bi bi-file-earmark-text-fill"></i></a> </td>
                                
                                <?php if($R_300000 <> NULL && $R_300000['UR_Read']== "1"){ ?>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $ls->TeacherID; echo $ls->DevelopmentActivityName; echo $ls->DevelopmentActivityStartDate; ?>"><i class="bi bi-card-list"></i></button>
                                </td>
                                <?php } ?>  

                                <?php if($R_300000 <> NULL && ( $R_300000['UR_Edit']== "1" || $R_300000['UR_Delete']== "1") ){ ?>
                                <td style="text-align: center;">
                                    <?php if( $R_300000 <> NULL &&  $R_300000['UR_Edit']== "1"  ){ ?>
                                    <a href='edit_forms-teacher_development_activity?tid=<?php echo $ls->TeacherID;?>&&name=<?php echo $ls->DevelopmentActivityName;?>&&sdate=<?php echo $ls->DevelopmentActivityStartDate;?>' class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a> 
                                    <?php } ?>  

                                    <?php if( $R_300000 <> NULL &&  $R_300000['UR_Delete']== "1"  ){ ?>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $ls->TeacherID . $ls->DevelopmentActivityName . $ls->DevelopmentActivityStartDate ; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>    
                                    <?php } ?>                         
                                </td>
                                <?php } ?>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="view<?php echo $ls->TeacherID; echo $ls->DevelopmentActivityName; echo $ls->DevelopmentActivityStartDate; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลการพัฒนาบุคลากร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <hr>
                                            </div>
                                            <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ปีการศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีการศึกษา - <?= $ls->DevelopmentActivityEducationYear; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาคเรียน -  <?php $Semester_code = $ls->DevelopmentActivitySemester ;
                                                                        if($Semester_code==0) echo "ตลอดปีการศึกษา"; 
                                                                        else if($Semester_code==1) echo "ภาคเรียนที่ 1"; 
                                                                        else if($Semester_code==2) echo "ภาคเรียนที่ 2"; ?>                                                        
                                                    </div>
                                                </div>
                                           

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ข้อมูลการพัฒนาบุคลากร</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ครูและบุคลากรทางการศึกษา - <?= " (" . $ls->TeacherID . ") " . $ls->TeacherNameThai . " " . $ls->	TeacherLastNameThai;  ?> 
                                                    </div>                                       
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ประเภทกิจกรรม - <?= $ls->TEACHER_DEVELOPMENT_ACTIVITY_TYPE_NAME ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อกิจกรรม - <?= $ls->DevelopmentActivityName ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        จำนวนชั่วโมง - <?= $ls->DevelopmentActivityHour ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สถานที่จัดกิจกรรม - <?= $ls->DevelopmentActivityPlace ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        หน่วยงานที่จัดกิจกรรม - <?= $ls->Organizer ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        วันที่เริ่มจัดกิจกรรม - <?= $ls->DevelopmentActivityStartDate ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        วันที่สิ้นสุดกิจกรรม - <?= $ls->DevelopmentActivityStartDate ; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เอกสารแนบ/เกียรติบัตร -  <a href="<?php echo base_url('assets/teacher_development/document/') ?><?php echo $ls->DevelopmentDocument; ?>" ><i class="bi bi-file-earmark-text-fill"></i> เอกสารแนบ/เกียรติบัตร </a>   
                                                    </div> 
                                                </div>                                              

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!----------------------------  END --------------------------------->
                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $ls->TeacherID . $ls->DevelopmentActivityName . $ls->DevelopmentActivityStartDate ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="delete-teacher_development_activity?tid=<?php echo $ls->TeacherID;?>&&name=<?php echo $ls->DevelopmentActivityName;?>&&sdate=<?php echo $ls->DevelopmentActivityStartDate;?>" class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>                            
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->