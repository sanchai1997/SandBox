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
                        <h5 class="card-title">รายละเอียดข้อมูล</h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher_development_activity" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ประเภทกิจกรรม</th>
                            <th style="text-align: center;" scope="col">ชื่อกิจกรรม</th>
                            <th style="text-align: center;" scope="col">จำนวนชั่วโมง</th>
                            <th style="text-align: center;" scope="col">สถานที่จัดกิจกรรม</th>
                            <th style="text-align: center;" scope="col">หน่วยงานที่จัดกิจกรรม</th>
                            <th style="text-align: center;" scope="col">วันที่เริ่มจัดกิจกรรม</th>
                            <th style="text-align: center;" scope="col">วันที่สิ้นสุดกิจกรรม</th>
                            <th style="text-align: center;" scope="col">เอกสารแนบ/เกียรติบัตร*</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

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
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityPlace; ?></td>
                                <td style="text-align: center;"><?php echo $ls->Organizer; ?></td>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityStartDate ; ?></td>
                                <td style="text-align: center;"><?php echo $ls->DevelopmentActivityEndDate; ?></td>
                                <td style="text-align: center;">
                                    <a href="load_file?file=<?php echo $ls->DevelopmentDocument; ?>" class="btn btn-info">
                                        <i class="bi bi-file-earmark-text-fill"></i>
                                    </a>   
                                </td>
                                <td style="text-align: center;">
                                    <a href='edit_forms-teacher_development_activity?tid=<?php echo $ls->TeacherID;?>&&name=<?php echo $ls->DevelopmentActivityName;?>&&sdate=<?php echo $ls->DevelopmentActivityStartDate;?>' class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a> 
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $ls->TeacherID . $ls->DevelopmentActivityName . $ls->DevelopmentActivityStartDate ; ?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>                           
                                </td>
                            </tr>

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