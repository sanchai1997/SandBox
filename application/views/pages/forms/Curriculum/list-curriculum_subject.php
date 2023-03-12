<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลหลักสูตรรายวิชา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">List</li>
                        <li class="breadcrumb-item active"><?php echo $title; ?></li>
                    </ol>
                </nav>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Curriculum_Subject</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-curriculum_subject?cid=<?php echo $CurriculumID; ?>" class="btn btn-success">เพิ่มข้อมูลหลักสูตรรายวิชา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">รหัสวิชา</th>
                            <th style="text-align: center;" scope="col">ชื่อรายวิชาหรือกิจกรรม</th>
                            <th style="text-align: center;" scope="col">กลุ่มสาระการเรียนรู้/การศึกษาค้นคว้าด้วยตนเอง</th>
                            <th style="text-align: center;" scope="col">ประเภทรายวิชา</th>
                            <th style="text-align: center;" scope="col">หน่วยกิต/น้ำหนัก</th>
                            <th style="text-align: center;" scope="col">จำนวนชั่วโมงเรียน</th>
                            <th style="text-align: center;" scope="col">สมรรถนะ</th>
                            <th style="text-align: center;" scope="col">แก้ไข</th>
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
                                <td style="text-align: center;"><?php echo $ls-> LearningHour; ?></td>
                                <td style="text-align: center;">
                                    <a href='list-curriculum_school_competency?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>'>
                                        <button type="button" class="btn btn-primary"><i class="bi bi-eye-fill"></i></button> 
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href='edit_forms-curriculum_subject?sid=<?php echo $ls->SubjectCode; ?>&&cid=<?php echo $ls->CurriculumID; ?>'>
                                        <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> 
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->


</main><!-- End #main -->