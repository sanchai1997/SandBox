<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div>
                <h1>ข้อมูลสมรรถนะของหลักสูตร - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                        ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                        <?php $Semester_code = $Curriculum[0]->Semester;
                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?></h1>
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
                        <h5 class="card-title"><a href="list-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_school_competency?sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">รหัสสมรรถนะ</th>
                            <th style="text-align: center;" scope="col">ชื่อสมรรถนะ</th></th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php foreach ($listCurriculumCompetency as $ls) { ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $ls-> COMPETENCY_CODE; ?></td>
                                <td style="text-align: center;"><?php echo $ls->COMPETENCY_NAME ; ?></td>

                                <td style="text-align: center;">
                                    <a href='edit_forms-curriculum_school_competency?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>&&cpid=<?php echo $ls->CompetencyCode ; ?>'>
                                        <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> 
                                    </a>
                                    <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#delete<?= $ls->CompetencyCode; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>  
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="delete<?= $ls->CompetencyCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-curriculum_school_competency/' .$ls->CurriculumID .'/'.$ls->SubjectCode .'/'.$ls->CompetencyCode)  ?>"  class="btn btn-danger">ลบ</a>
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