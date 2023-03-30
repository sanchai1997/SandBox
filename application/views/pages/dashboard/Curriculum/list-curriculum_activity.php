<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลกิจกรรม</h1>
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
                        <h5 class="card-title"><a href="list-curriculum_plan?sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>   
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_activity?pid=<?php echo $PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="list-eportfolio" class="btn btn-success">เพิ่มข้อมูล post</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อกิจกรรม</th>
                           
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($list_curriculum_activity as $lca) { ?>
                            <tr>
                                <th style="text-align: center;" scope="col"><?php echo$lca->ACTIVITY_NAME ?></th>
                                
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $lca->ACTIVITY_ID; ?><?php echo $lca->PLAN_ID; ?>"><i class="bi bi-card-list"></i></button>
                                    <a href='edit_forms-curriculum_activity?pid=<?php echo$lca->PLAN_ID ?>&&ACTIVITY_ID=<?php echo$lca->ACTIVITY_ID ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>' class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $lca->ACTIVITY_ID; ?><?php echo $lca->PLAN_ID; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal view -->
                            <div class="modal fade" id="view<?php echo $lca->ACTIVITY_ID; ?><?php echo $lca->PLAN_ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>ข้อมูลกิจกรรม </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>กิจกรรม</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อกิจกรรม : <?php echo $lca->ACTIVITY_NAME  ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>การวัดและประเมินผล</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อการวัดและประเมินผล : <?= $lca->ASSESSMENT_NAME; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        รหัสผู้ประเมิน : <?php $PEOPLE_code = $lca->ASSESSMENT_PEOPLE_ID;
                                                                    if ($PEOPLE_code == 0) echo "ครู";
                                                                    else if ($PEOPLE_code == 1) echo "นักเรียน";
                                                                    else if ($PEOPLE_code == 2) echo "ผู้ปกครอง";
                                                                    else if ($PEOPLE_code == 3) echo "อื่นๆ"; ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        เครื่องมือการประเมิน :  <?php 
                                                                    if ($lca->ASSESSMENT_TOOL_CODE == 0) echo "แบบสังเกตพฤติกรรม";
                                                                    else  echo "แบบประเมิน";?>
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
                                                        ผลการตัดสินรายวิชาพื้นฐาน : <?php $PEOPLE_code = $lca->FUNDAMENTAL_SUBJECT_PASSING_NAME;?>
                                                    </div>
            

                                            </div>
                                    </div>
                                        <div class="modal-footer">
                                        <a href='edit_forms-curriculum_activity?pid=<?php echo$lca->PLAN_ID ?>&&ACTIVITY_ID=<?php echo$lca->ACTIVITY_ID ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>' class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!----------------------------  END Modal view --------------------------------->


                          <!-- Modal delete -->
                          <div class="modal fade" id="delete<?php echo $lca->ACTIVITY_ID; ?><?php echo $lca->PLAN_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-curriculum_activity/' . $lca->PLAN_ID.'/'.$lca->ACTIVITY_ID ) ?>" class="btn btn-danger">ลบ</a>
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