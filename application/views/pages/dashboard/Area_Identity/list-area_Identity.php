<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลอัตลักษณ์ของแต่ละพื้นที่</h1>
                
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
                    <div class="col card-title">
                      <?php

                            if (!empty($School)) {

                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $SchoolNameThai; ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php foreach ($School as $ls) { ?>
                                            <li>
                                                <a class="dropdown-item" href="list-area_identity_by_school?sid=<?php echo $ls->SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            <?php } ?>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="" class="btn btn-success">อัพโหลดไฟล์</a>&nbsp;&nbsp;<a href="forms-area_identity?sid=<?php echo $SchoolID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ศาสนา</th>
                            <th style="text-align: center;" scope="col">กลุ่มอาชีพ</th>
                            <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฏิบัติ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php   $i =1;
                        foreach ($listAreaIdentity as $ls) { ?>

                            <tr>
                                
                                <td style="text-align: center;"><?php echo $ls->EducationYear  ; ?></td>
                                <td style="text-align: center;">
                                        <?php
                                        $Semester_code = $ls->Semester;
                                        if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                        else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                        else if ($Semester_code == 2) echo "ภาคเรียนที่ 2";
                                        ?>
                                </td>

                                 <td style="text-align: center;"> 
                                <?php $list_RELIGION = $this->Area_identitty_model->get_RELIGION($ls->SchoolID, $ls->EducationYear, $ls->Semester ); ?>
                                    <?php foreach($list_RELIGION as $lr) { ?>
                                        <div class="row">
                                                <div class="col">
                                                    <p>
                                                    <button type="button" class="my-link btn btn-link " data-bs-toggle="modal" data-bs-target="#viewRegion<?php echo $lr->AreaReligionCode ?>"><?php echo $lr->RELIGION_NAME ; ?></button>
                                                    </p>
                                                </div>

                                            </div>
                                                                   
                                <div class="modal fade" id="viewRegion<?php echo $lr->AreaReligionCode ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                                    ข้อมูลศาสนา - 
                                                    <?php echo $SchoolNameThai; ?> 
                                                    ปีการศึกษา <?= $ls->EducationYear; ?> 
                                                    <?php $Semester_code = $ls->Semester;
                                                                if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                                else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                                else if ($Semester_code == 2) echo "ภาคเรียนที่ 2";  ?>
                                                </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <hr>
                                            </div>
                                            <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ศาสนา</b></h6>
                                                        <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                            <?php echo $lr->RELIGION_NAME  ?> 
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <h6 style="padding-top: 10px;"><b>ร้อยละของแต่ละศาสนา</b></h6>
                                                        <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                           <?php echo $lr->AreaReligionPercentage;   ?>
                                                        </div>
                                                    
                                                </div>
                                        </div>
                                            <div class="modal-footer">
                                                <a href='edit_forms_Region?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>&&rid=<?php echo $lr->AreaReligionCode; ?>' class="btn btn-warning">
                                                    <i class="bi bi-pencil-square"></i> 
                                                </a> 

                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <!----------------------------  END Modal view Region--------------------------------->

                                    <?php  } ?>
                                    <?php $limit_AreaReligionPercentage = $this->Area_identitty_model-> limit_AreaReligionPercentage($ls->EducationYear, $ls->Semester, $ls->SchoolID);    
                                        if((count($list_RELIGION)==0 ) || ($limit_AreaReligionPercentage[0]->limit_Percentage>0 && count($list_RELIGION)>0 )) {
                                    ?>
                                        <a href='forms-Region?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>' class="fw-bold my-link">>>เพิ่มข้อมูลศาสนา<<</a>                                                            
                                    <?php  }  ?>
                                 </td>

                                <!----------------------------  OCCUPATION--------------------------------->

                                 <td style="text-align: center;"> 
                                <?php $list_OCCUPATION = $this->Area_identitty_model->get_OCCUPATION($ls->SchoolID, $ls->EducationYear, $ls->Semester ); ?>
                                    <?php foreach($list_OCCUPATION as $lc) { ?>
                                        <div class="row">
                                                <div class="col">
                                                    <p>
                                                    <button type="button" class="my-link btn btn-link " data-bs-toggle="modal" data-bs-target="#viewOCCUPATION<?php echo $lc->AreaOccupationCode ?>"><?php echo $lc->OCCUPATION_NAME ; ?></button>
                                                    </p>
                                                </div>

                                            </div>
                                                                    <!-- Modal view  -->
                                <div class="modal fade" id="viewOCCUPATION<?php echo $lc->AreaOccupationCode ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                                    ข้อมูลศาสนา - 
                                                    <?php echo $SchoolNameThai; ?> 
                                                    ปีการศึกษา <?= $ls->EducationYear; ?> 
                                                    <?php $Semester_code = $ls->Semester;
                                                                if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                                else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                                else if ($Semester_code == 2) echo "ภาคเรียนที่ 2";  ?>
                                                </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <hr>
                                            </div>
                                            <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                                <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>กลุ่มอาชีพ</b></h6>
                                                        <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                            <?php echo $lc->OCCUPATION_NAME  ?> 
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <h6 style="padding-top: 10px;"><b>ร้อยละของแต่ละกลุ่มอาชีพ</b></h6>
                                                        <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                           <?php echo $lc->AreaOccupationPercentage;   ?>
                                                        </div>
                                                    
                                                </div>
                                        </div>
                                            <div class="modal-footer">
                                                <a href='edit_forms_OCCUPATION?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>&&rid=<?php echo $lc->AreaOccupationCode; ?>' class="btn btn-warning">
                                                    <i class="bi bi-pencil-square"></i> 
                                                </a> 

                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <!----------------------------  END Modal view Expense --------------------------------->

                                    <?php  } ?>
                                    <?php $limit_AreaOccupationPercentage = $this->Area_identitty_model-> limit_AreaOccupationPercentage($ls->EducationYear, $ls->Semester, $ls->SchoolID);    
                                        if((count($list_OCCUPATION)==0 ) || ($limit_AreaOccupationPercentage[0]->limit_Percentage>0 && count($list_OCCUPATION)>0 )) {
                                    ?>
                                        <a href='forms-OCCUPATION?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>' class="fw-bold my-link">>>เพิ่มข้อมูลกลุ่มอาชีพ<<</a>                                                            
                                    <?php  }else  ?>
                                 </td>
                                
                             
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $i ;?>"><i class="bi bi-card-list"></i></button>
                                </td>
                            
                                <td style="text-align: center;">
                                    <a href='edit_forms_area_identity?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>' class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a> 
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $i ;?>">
                                        <i class=" bi bi-trash"></i>
                                    </button>                           
                                </td>
                                
                            </tr>

                            <!-- Modal view -->
                            <div class="modal fade" id="view<?php echo $i ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                            ข้อมูลอัตลักษณ์ของแต่ละพื้นที่ - <?php echo $SchoolNameThai; ?> 
                                                ปีการศึกษา <?= $ls->EducationYear; ?> 
                                                <?php $Semester_code = $ls->Semester;
                                                            if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                            else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                            else if ($Semester_code == 2) echo "ภาคเรียนที่ 2";  ?>
                                            </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                           
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>ปีการศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีการศึกษา : <?php echo $ls->EducationYear   ?>
                                                    </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาคเรียน : <?php $Semester_code = $ls->Semester;
                                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>ข้อมูลอัตลักษณ์</b></h6>                                                    
                                                    
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ข้อมูลผลิตภัณฑ์ชุมชน : <?= $ls->AreaProduct ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ข้อมูลสภาพพื้นที่/สภาพแวดล้อม : <?= $ls->AreaEnvironment ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาษาท้องถิ่น : <?= $ls->AreaLanguage;   ?> 
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ค่านิยมความเชื่อ" : <?= $ls->AreaValues ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ข้อมูลศิลปะ/วัฒนธรรม/ภูมิปัญญา" : <?= $ls->AreaCulture ?>
                                                    </div>
                                                  
                                                   
                                            </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!----------------------------  END Modal view --------------------------------->
                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="delete_area_identity?y=<?php echo $ls->EducationYear; ?>&&s=<?php echo $ls->Semester; ?>&&sid=<?php echo $SchoolID; ?>" class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <?php  $i++; } ?>
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



