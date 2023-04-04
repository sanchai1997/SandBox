<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลงบประมาณ</h1>
                
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

                            if (!empty($School)) {

                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $SchoolNameThai; ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php foreach ($School as $ls) { ?>
                                            <li>
                                                <a class="dropdown-item" href="list_budget_by_school?sid=<?php echo $ls->SchoolID; ?>"><?php echo $ls->SchoolNameThai; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            <?php } ?>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-budget?sid=<?php echo $SchoolID; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ข้อมูลเบิกจ่าย</th>
                            <th style="text-align: center;" scope="col">ปฏิบัติ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($listBudget != null) { ?>
                
                    <?php foreach ($listBudget as $lb) { ?>

                            <tr>
                                
                                <td style="text-align: center;"><?php echo $lb->BudgetEducationYear ; ?></td>
                                
                                <td style="text-align: center;"> 
                                <?php $list_Expense = $this->Expense_model->get_expense_all($lb->BudgetID ); ?>
                                    <?php foreach($list_Expense as $le) { ?>
                                        <div class="row">
                                                <div class="col">
                                                    <p>
                                                        <a href='edit_forms_Expense?eid=<?php echo $le->ExpenseID;?>&&sid=<?php echo $SchoolID; ?>' class="my-link">
                                                            <?php echo $le->ExpenseID  ; ?> 
                                                        </a>
                                                    
                                                    </p>
                                                </div>

                                            </div>
                                    <?php } ?>
                                    <a href='forms_Expense?bid=<?php echo $lb->BudgetID ;?>&&sid=<?php echo $SchoolID; ?>' class="fw-bold my-link">>>เพิ่มข้อมูลเบิกจ่าย<<</a>
                                
                            
                            </td>
                            
                                <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view"><i class="bi bi-card-list"></i></button>
                                    <a href='edit_forms_budget?bid=<?php echo $lb->BudgetID ;?>&&sid=<?php echo $SchoolID; ?>' class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a> 
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <i class=" bi bi-trash"></i>
                                    </button>                           
                                </td>
                                
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลหลักสูตร / หลักสูตรของพื้นที่นวัตกรรม</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <hr>
                                            </div>
   
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <a href='' class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> </a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square" data-bs-toggle="modal" data-bs-target="#delete"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!----------------------------  END --------------------------------->
                            <!-- Modal view -->
                            <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>ข้อมูลงบประมาณ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                           
                                            <div class="row">
                                                <h6 style="padding-top: 10px;"><b>ปีการศึกษา</b></h6>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีการศึกษา : <?php echo $lb->BudgetEducationYear   ?>
                                                    </div>
                                                <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ภาคเรียน : <?php $Semester_code = $lb->BudgetSemester;
                                                                    if ($Semester_code == 0) echo "ตลอดปีการศึกษา";
                                                                    else if ($Semester_code == 1) echo "ภาคเรียนที่ 1";
                                                                    else if ($Semester_code == 2) echo "ภาคเรียนที่ 2"; ?>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <h6 style="padding-top: 10px;"><b>รายละเอียดงบประมาณ</b></h6>
                                                    
                                                    
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ปีงบประมาณ : <?= $lb->BudgetYear ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        ชื่อเขตพื้นที่ : <?= $lb->AREA_NAME ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        แผนงาน/โครงการ/กิจกรรม : <?= $lb->BudgetProgram ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        จำนวนงบประมาณ : <?=$lb->BudgetAmount ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        วันที่อนุมัติงบประมาณ : <?= $lb->BudgetDate ?>
                                                    </div>
                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                        วันที่ได้รับงบประมาณ : <?= $lb->BudgetReceivedDate ?>
                                                    </div>
                                                   
                                            </div>
                                    </div>
                                        <div class="modal-footer">
                                            <a href='edit_forms_budget?bid=<?php echo $lb->BudgetID ;?>&&sid=<?php echo $SchoolID; ?>' class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!----------------------------  END Modal view --------------------------------->
                            <!-- Modal -->
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
                                                <a href="<?php echo base_url('delete_budget/' . $lb->BudgetID . '/' .$SchoolID) ?>  " class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <?php } ?>
                            <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->



