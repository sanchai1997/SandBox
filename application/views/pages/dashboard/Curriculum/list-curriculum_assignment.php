<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลการวัดผลมาตรฐานกลาง</h1>
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
                    <h5 class="card-title"><a href="list-curriculum_activity?pid=<?php echo$PLAN_ID ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>  
                    <?php if($assignment==null) {?>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_assessment?aid=<?php echo$ACTIVITY_ID ?>&&pid=<?php echo $PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>

                    <?php } ?> 
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อการวัดและประเมินผล</th>
                            <th style="text-align: center;" scope="col">ผู้ประเมิน</th>
                            <th style="text-align: center;" scope="col">เครื่องมือการประเมิน</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                        
                    </thead>
                        
                    <tbody>
                    
                        <?php if($assignment!=null) {?> 
                            <?php foreach ($assignment as $as) {?>
                            <th style="text-align: center;" scope="col"><?php echo $as->ASSESSMENT_NAME ?></th>
                            <th style="text-align: center;" scope="col"><?php echo $as->ASSESSMENT_PEOPLE_ID ?></th>
                            <th style="text-align: center;" scope="col"><?php echo $as->ASSESSMENT_TOOL_CODE ?></th>
                            <td style="text-align: center;">        
                                <a href='edit_forms-curriculum_assessment?aid=<?php echo$ACTIVITY_ID ?>&&pid=<?php echo $PLAN_ID; ?>&&sid=<?php echo $SubjectCode; ?>&&cid=<?php echo $CurriculumID; ?>&&asid=<?php echo $as->ASSESSMENT_ID ; ?>' class="btn btn-warning">
                                     <i class="bi bi-pencil-square"></i>
                                </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                     <i class=" bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                          <!-- Modal delete -->
                          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="" class="btn btn-danger">ลบ</a>
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


</main><!-- End #main -->