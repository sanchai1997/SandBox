<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div>
                <h1>ข้อมูลแผนการเรียนรู้ - <?php echo $Curriculum[0]->SchoolNameThai; ?> 
                                        ปีการศึกษา <?= $Curriculum[0]->EducationYear; ?> 
                                        <?php $Semester_code = $Curriculum[0]->Semester;
                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?> 
                                    - <?php echo $Subject[0]->SubjectName; ?> </h1>

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
                    <div class="col">
                        <h5 class="card-title"><a href="list-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>            
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_plan?sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">เรื่อง</th>
                            <th style="text-align: center;" scope="col">กิจกรรม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listcurriculum_plan as $lcp){ ?>
                            <tr>
                                <th style="text-align: center;" scope="col"><?php echo $lcp->EDUCATION_YEAR  ?></th>
                                <th style="text-align: center;" scope="col">
                                    <?php
                                        $Semester_code = $lcp->SEMESTER;
                                        if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                        else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                        else if ($Semester_code == 2) echo "ภาคเรียนที่ 2";
                                    ?>
                                </th>
                                <th style="text-align: center;" scope="col"><?php echo $lcp->PLAN_NAME?></th>
                                <td style="text-align: center;">
                                    <?php $list_curriculum_activity = $this->Curriculum_model->get_curriculum_activity_All($lcp->PLAN_ID); ?>
                                    <?php foreach($list_curriculum_activity as $lca) { ?>
                                        <div class="row">
                                                <div class="col">
                                                    <p>
                                                    <button type="button" class="my-link btn btn-link " data-bs-toggle="modal" data-bs-target="#viewACTIVITY<?php echo$lca->ACTIVITY_ID ?>">  <?php echo $lca->ACTIVITY_NAME; ?> </button>

    
                                                    </p>
                                                </div>

                                        </div>
                            <!-- Modal view Activity -->
                            <div class="modal fade" id="viewACTIVITY<?php echo$lca->ACTIVITY_ID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>ข้อมูลกิจกรรม - <?php echo $lca->ACTIVITY_NAME; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>ชื่อกิจกรรม</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                       <?php echo $lca->ACTIVITY_NAME  ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>การวัดและประเมินผล</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อการวัดและประเมินผล : <?php echo $lca->ASSESSMENT_NAME  ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ผู้ประเมิน : *** โชว์กี่คนนนน
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">

                                                        เครื่องมือการประเมิน : <?php  $code = $lca->ASSESSMENT_TOOL_CODE;
                                                                    if ($code == '' ) echo "";
                                                                    else if ($code == 0) echo "แบบสังเกตพฤติกรรม";
                                                                    else if ($code == 1) echo "แบบประเมิน";?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>การวัดผลมาตรฐานกลาง</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สัดส่วนการประเมินโดยผู้สอน : <?= $lca->SCORE_TEACHER; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สัดส่วนการประเมินโดยผู้ปกครอง : <?= $lca->SCORE_PARENT; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สัดส่วนการประเมินโดยบุคลากรอื่น : <?= $lca->SCORE_OTHER; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        คะแนนรวม : <?= $lca->SCORE_SUM_TOTAL; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ผลการตัดสินรายวิชาพื้นฐาน : <?= $lca->FUNDAMENTAL_SUBJECT_PASSING_NAME; ?>
                                                    </div>

                                            </div>
                                    </div>
                                        <div class="modal-footer">
                                            <a href='edit_forms-curriculum_activity?pid=<?php echo$lca->PLAN_ID ?>&&ACTIVITY_ID=<?php echo$lca->ACTIVITY_ID ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>' class="btn btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!----------------------------  END Modal view Activity --------------------------------->

                                    <?php } ?>
                                    <a href="forms-curriculum_activity?pid=<?php echo $lcp->PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="fw-bold my-link">
                                            >>เพิ่มกิจกรรม>>
                                     </a>
                                    
                                </td>


                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $lcp->PLAN_ID; ?>"><i class="bi bi-card-list"></i></button>
                                        <a href='edit_forms_curriculum_plan?pid=<?php echo $lcp->PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>' class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $lcp->PLAN_ID; ?>">
                                            <i class=" bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal view -->
                            <div class="modal fade" id="view<?php echo $lcp->PLAN_ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>ข้อมูลแผนการเรียนรู้ </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>ชื่อเรื่องของแผนการจัดการเรียนรู้/กิจกรรม</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เรื่อง : <?php echo $lcp->PLAN_NAME  ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>ปีการศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีการศึกษา : <?php echo $lcp->EDUCATION_YEAR  ?>
                                                    </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาคเรียน : <?php $Semester_code = $lcp->SEMESTER;
                                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ข้อมูลแผนการจัดการเรียนรู้</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เรื่อง : <?= $lcp->PLAN_NAME; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สาระสำคัญ : <?= $lcp->PLAN_KEY; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        จุดประสงค์ : <?= $lcp->PLAN_OBJECTIVE; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        คุณลักษณะอันพึงประสงค์ : <?= $lcp->PLAN_CHARACTER; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        สาระการเรียนรู้ : <?= $lcp->PLAN_DETAILS; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        กระบวนการจัดการเรียนรู้ : <?= $lcp->PLAN_PROCESS; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        กิจกรรมเสนอแนะ : <?= $lcp->PLAN_RECOMMEND; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        บันทึกข้อเสนอแนะจากผู้สอน : <?= $lcp->PLAN_MEMO_TA; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        บันทึกข้อเสนอแนะจากศึกษานิเทศก์ : <?= $lcp->PLAN_MEMO_SV; ?>
                                                    </div>
                                            </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!----------------------------  END Modal view --------------------------------->
                            <!-- Modal delete -->
                                <div class="modal fade" id="delete<?php echo $lcp->PLAN_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-curriculum_plan/' . $lcp->PLAN_ID.'/'.$lcp->SubjectCode. '/'.$lcp->CurriculumID ) ?>" class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <!----------------------------  END Modal delete--------------------------------->

                        <?php } ?>

                    </tbody>
                
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

<style>
    .my-link {
        color: black;
        text-decoration: none;
    }

    .my-link:hover {
        color: blue;
    }

</style>
</main><!-- End #main -->