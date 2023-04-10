<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div >
                <h1>ข้อมูลหลักสูตรรายวิชา - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                        ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                        <?php $Semester_code = $Curriculum[0]->Semester;
                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?>
                </h1>
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


    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">


                <div class="row">
                    <div class="col">
                        <h5 class="card-title"><a href="list_curriculum_by_school?sid=<?php echo  $Curriculum[0]->SchoolID; ?>" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">รหัสวิชา</th>
                            <th style="text-align: center;" scope="col">ชื่อรายวิชา</th>
                            <th style="text-align: center;" scope="col">กลุ่มสาระการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ประเภทรายวิชา</th>
                            <th style="text-align: center;" scope="col">หน่วยกิต/น้ำหนัก</th>
                            <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <th style="text-align: center;" scope="col">สมรรถนะ</th>
                            <th style="text-align: center;" scope="col">แผนการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php foreach ($listCurriculumSubject as $ls) { ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $ls->SubjectCode ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->SubjectName ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->SUBJECT_GROUP_NAME ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->SUBJECT_TYPE_NAME ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->Credit ; ?></td>
                                <td style="text-align: center;">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $ls->SubjectCode; ?>"><i class="bi bi-card-list"></i></button>
                                </td>
                                <td style="text-align: center;">
                                    <a href='list-curriculum_school_competency?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>'>
                                        <button type="button" class="btn btn-info"><i class="bi bi-eye-fill"></i></button> 
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href='list-curriculum_plan?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>'>
                                        <button type="button" class="btn btn-info"><i class="bi bi-eye-fill"></i></button> 
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href='edit_forms-curriculum_subject?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>'>
                                        <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> 
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $ls->SubjectCode; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>  
                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="view<?php echo $ls->SubjectCode; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> 
                                                ข้อมูลหลักสูตรรายวิชา - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                                ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                                <?php $Semester_code = $Curriculum[0]->Semester;
                                                            if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                            else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                            else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>รหัสหลักสูตร</b></h6>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                    รหัสหลักสูตร : <?= $ls->CurriculumID; ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>หลักสูตรรายวิชา</b></h6>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                 ชื่อรายวิชา : <?= $ls->SubjectName; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                กลุ่มสาระการเรียนรู้ : <?= $ls->SUBJECT_GROUP_NAME; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                ประเภทรายวิชา : <?= $ls->SUBJECT_TYPE_NAME ; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                หน่วยกิต/น้ำหนัก : <?= $ls->Credit; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                รหัสมาตรฐานการเรียนรู้ : <?= $ls->SUBJECT_STD_ID; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                มาตรฐานการเรียนรู้ : <?= $ls->SUBJECT_STD_DETAILS; ?>
                                                </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                ตัวชี้วัด : <?= $ls->CriteriaID ; ?>
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
                            <div class="modal fade" id="delete<?php echo $ls->SubjectCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-curriculum_subject/' .$ls->CurriculumID .'/'.$ls->SubjectCode)  ?>" class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete">ยกเลิก</button>
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