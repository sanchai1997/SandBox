<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h1>
            </div>

        </div>
    </div>
    <!-- End Page Title --> 

    <!-- Alert -->
    <?php if (!empty($_SESSION['success'])) { ?>
    <div class="col-12">
        
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

    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col card-title">
                    <?php 
                    
                        if(!empty($School)) {
                    
                    ?>
                        <select class="form-select" aria-label="Default select example" name="listSchool" id="listSchool" onchange="javascript:handleSelect(this)">                
                            <?php foreach($School as $ls) { ?>
                                <option value="list_curriculum_by_school?sid=<?php echo $ls-> SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></option>
                            <?php } ?>
                        </select>
                            <?php }?>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">สถานศึกษา</th>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ชื่อหลักสูตร</th>
                            <th style="text-align: center;" scope="col">รายวิชา</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                  <?php if($listCurriculum!=null){?> 
                    
                    
                 
                    <?php foreach ($listCurriculum as $ls) { ?>
                            
                            <tr>
                                <td style="text-align: center;"><?php echo $ls->SchoolNameThai ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->EducationYear; ?></td>
                                <td style="text-align: center;">
                                    <?php 
                                        $Semester_code = $ls->Semester ;
                                        if($Semester_code==0) echo "ตลอดปีการศึกษา"; 
                                        else if($Semester_code==1) echo "ภาคเรียนที่ 1"; 
                                        else if($Semester_code==2) echo "ภาคเรียนที่ 2"; 
                                    ?>
                                </td>
                                <td style="text-align: center;"><?php echo $ls->CurriculumName; ?></td>
                                <td style="text-align: center;">
                                    <a href='list-curriculum_subject?cid=<?php echo $ls->CurriculumID; ?>' class="btn btn-primary">
                                        <i class="bi bi-eye-fill"></i>
                                     </a>
                                </td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $ls->CurriculumID; ?>"><i class="bi bi-card-list"></i></button>
                                    <a href='edit_forms-curriculum?cid=<?php echo $ls->CurriculumID; ?>'  class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $ls->CurriculumID; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>  
                                </td>
                                
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="view<?php echo $ls->CurriculumID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <hr>
                                            </div>
                                            <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>รหัสหลักสูตร</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        รหัสหลักสูตร : <?= $ls->CurriculumID ; ?> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ปีการศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีการศึกษา : <?= $ls->EducationYear; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาคเรียน :  <?php $Semester_code = $ls->Semester ;
                                                                        if($Semester_code==0) echo "ตลอดปีการศึกษา"; 
                                                                        else if($Semester_code==1) echo "ภาคเรียนที่ 1"; 
                                                                        else if($Semester_code==2) echo "ภาคเรียนที่ 2"; ?>                                                        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>สถานศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                    สถานศึกษา : <?= $ls->SchoolNameThai ; ?> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ข้อมูลหลักสูตร</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อหลักสูตร : <?= $ls->CurriculumName ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ประเภทหลักสูตร : <?= $ls->CURRICULUM_NAME ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ระดับการศึกษา : <?= $ls->EDUCATION_LEVEL_NAME ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชั้นปี : <?= $ls->GRADE_LEVEL_NAME ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        จำนวนห้องที่สอนด้วยหลักสูตร : <?= $ls->ClassroomNumber ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เอกสารแนบหลักสูตร :  <a href="load_file?file=<?php echo $ls->CurriculumDocumentURL; ?>" ><i class="bi bi-file-earmark-text-fill"></i> เอกสารแนบหลักสูตร</a>   
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ข้อมูลหลักสูตรท้องถิ่น</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        อ้างอิงหลักสูตรท้องถิ่น : <?php $LocalCurriculumFlag_code = $ls->LocalCurriculumFlag ;
                                                                        if($Semester_code==0) echo "อ้างอิง"; 
                                                                        else if($Semester_code==1) echo "ไม่อ้างอิง"; ?>   
                                                        
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                    ชื่อหลักสูตรท้องถิ่นที่อ้างอิง : <?= $ls->LocalCurriculumName ; ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เอกสารแนบหลักสูตรท้องถิ่นที่อ้างอิง :  <a href="load_file?file=<?php echo $ls->LocalCurriculumDocumentURL; ?>" ><i class="bi bi-file-earmark-text-fill"></i> เอกสารแนบหลักสูตร</a>   
                                                    </div>
                                                </div>

                                               

                                            </div>

                                            <div class="modal-footer">
                                                <a href='edit_forms-curriculum?cid=<?php echo $ls->CurriculumID; ?>' class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square" data-bs-toggle="modal" data-bs-target=""></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!----------------------------  END --------------------------------->
                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $ls->CurriculumID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-curriculum/' .$ls->CurriculumID) ?>" class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        <?php } ?>
                        <?php }?>      
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  $(this).data("isopen", !open);
});
</script>
</main><!-- End #main -->



