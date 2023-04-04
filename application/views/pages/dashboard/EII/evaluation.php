<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
<?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
<?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<style>
.my-link {
    color: black;
}

.my-link:hover {
    color: blue;
}
</style>
<main id="main" class="main">
    <?php
    session_start(); // เริ่มต้น session
    if (isset($_SESSION['success'])) { ?>
    <div style="position: relative;">
        <div class="alert alert-success" id="myAlert"
            style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
            <strong>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </strong>

        </div>
    </div>
    <?php }
    ?>
    <!-- การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->

    <div class="pagetitle">
        <div class="row ">
            <?php switch (
                $page
            ) { case 'sh1': ?> <h1>ตัวชี้วัด</h1>
            <?php break;case 'sh2': ?> <h1>ข้อมูลระดับตัวชี้วัด - <?php echo $name; ?></h1>
            <?php break;case 'sh3': ?> <h1>ข้อมูลองค์ประกอบตัวชี้วัด - <?php echo $name; ?></h1>
            <?php break;case 'sh4': ?> <h1>ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ - <?php echo $name; ?></h1>
            <?php break;case 'sh5': ?> <h1>การประเมินผลสถานศึกษา </h1>
            <?php break;case 'sh6': ?> <h1>ข้อมูลการประเมินตามตัวชี้วัด</h1>
            <?php break;case 'sh7': ?> <h1>ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
            <?php break;case 'sh8': ?> <h1>การประเมินสถานศึกษา</h1>
            <?php break;default: ?><h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่นวัตกรรมการศึกษา</h1>
            <?php break;} ?>

            <div class="col-3">

                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">การประกันคุณภาพด้วยตัวชี้วัด</li>
                    </ol>
                </nav> -->
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <!-- <a href="<?php echo site_url(
                    'Fm_evaluation_das_p1?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p2?page=sh2'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลระดับตัวชี้วัด
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p3?page=sh3'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลองค์ประกอบตัวชี้วัด
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p4?page=sh4'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p5?page=sh5'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินผลสถานศึกษา
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p6?page=sh6'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินตามตัวชี้วัด
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p7?page=sh7'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p8?page=sh8'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินสถานศึกษา
                </a> -->
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation'
                ); ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">หน้าหลัก
                </a> -->
            </div>
        </div>
    </div>

    </div><!-- End Page Title -->

    <?php if ( $page == 'sh1') { ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_forms_p1?page=sh1'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ชื่อเกณฑ์</th>
                            <th style="text-align: center;" scope="col">ระดับตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">องค์ประกอบ</th>
                            <!-- <th style="text-align: center;" scope="col">คำอธิบาย</th> -->
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                          
                        ?>
                        <tr>
                            <td scope="row " style="text-align: center;">
                                <?php echo $CriteriaID =  $show->CriteriaID; ?></td>
                            <td scope="row" style="text-align: center;">
                                <?php echo $CriteriaName = $show->CriteriaName; ?></td>
                            <td style="text-align: center;">
                                <?php
                                           $this->db->where('CriteriaID', $CriteriaID); // เพิ่มเงื่อนไข WHERE ในคำสั่ง SQL
                                           $result = $this->db->get('ASSESSMENT_CRITERIA_LEVEL '); 
                                            foreach ($result->result() as $cls) {
                                            ?>


                                <a href="<?php echo site_url('ass_ria_lvl_forms_p2?page=sh22') ?>&&lvl=<?php echo $show->CriteriaLevelAmount ?>&&Id_ac=<?php echo $show->Id; ?>&&CriteriaID=<?php echo $show->CriteriaID ?>&&CriteriaLevelAmount=<?php echo $show->CriteriaLevelAmount ?>&&key=<?php echo $cls->Id; ?>&&name=<?php echo $show->CriteriaName; ?>"
                                    class="my-link ">
                                    <?php echo $cls->LevelName; ?> </a><br>
                                <?php } ?>
                                <a href="<?php echo site_url('ass_ria_lvl_forms_p2?page=sh2') ?>&&name=<?php echo $show->CriteriaName; ?>&&Id_ac=<?php echo $show->Id; ?>&&key=<?php echo $show->CriteriaID; ?>&&lvl=<?php echo $show->CriteriaLevelAmount ?>"
                                    class="my-link fw-bold">>>เพิ่มระดับตัวชี้วัด>>
                                </a>
                            </td>

                            <td style="text-align: center;"><?php 
                             $this->db->where('CriteriaID', $CriteriaID); // เพิ่มเงื่อนไข WHERE ในคำสั่ง SQL
                             $resultA3 = $this->db->get('ASSESSMENT_CRITERIA_COMPOSITION '); 
                                                       
                                                        foreach ($resultA3->result() as $showA3) { ?>
                                <a href="<?php echo site_url('ass_ria_com_forms_p3?page=sh33') ?>&&Id_ac=<?php echo $show->Id; ?>&&lvl=<?php echo $show->CriteriaCompositionAmount ?>&&key=<?php echo $showA3->Id; ?>&&name=<?php echo $show->CriteriaName; ?>"
                                    class="my-link "><?php echo $showA3->CompositionName; ?> </a><br>
                                <?php } ?>
                                <a href="<?php echo site_url('ass_ria_com_forms_p3?page=sh3') ?>&&Id_ac=<?php echo $show->Id; ?>&&name=<?php echo $show->CriteriaName; ?>&&key=<?php echo $show->CriteriaID; ?>&&lvl=<?php echo $show->CriteriaCompositionAmount ?>"
                                    class="my-link fw-bold">>>เพิ่มองค์ประกอบ>>
                                </a></td>
                                <!-- </td>
                                    <td style="text-align: center;">
                                 <a
                                    href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4') ?>&&key=<?php echo $show->CriteriaID ?>&&name=<?php echo $show->CriteriaName ?>"
                                    class="btn btn-info"><i class="bi bi-eye"></i></a></td> -->
                            <td style="text-align: center;">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>


                            </td>
                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('ass_ria_forms_p1?page=sh11') ?>&&key=<?php echo $show->CriteriaID; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo $show->CriteriaID; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria<?php echo $show->CriteriaID; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CriteriaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('ass_ria_del_p1'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>

                        </tr>
                        <?php  } ?>


                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

    <?php } ?>
    <!-- ข้อมูลองค์ประกอบตัวชี้วัด -->

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh4') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_com_lvl_forms_p4?page=sh4'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับองค์ประกอบตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับของระดับตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">คำอธิบายระดับของแค่ละองค์ประกอบ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>




                        <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php 
                $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL 
                
                WHERE CriteriaID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->CriteriaID; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show->CompositionIndex; ?></th>
                            <td style="text-align: center;"><?php echo $show->LevelIndex; ?></td>
                            <td style="text-align: center;"><?php echo $show->CompositionLevelDescription; ?></td>

                            <!-- แก้ไข -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look4<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_ass_ria_com_lvl<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria_com_lvl<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CriteriaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('ass_ria_com_lvl_del_p4'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh5') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_forms_p5?page=sh5'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="" scope="col">ภาคเรียนที่ทำการประเมิน</th>
                            <th style="" scope="col">สถานศึกษา</th>
                            <th style="" scope="col">ชื่อการประเมิน</th>
                            <th style="" scope="col">ผู้ประเมิน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>



                        <?php 

                $result_top = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT 
                INNER JOIN SCHOOL
                ON SCHOOL_ASSESSMENT.SchoolID = SCHOOL.SchoolID where SCHOOL_ASSESSMENT.DeleteStatus = 0
             
                
                ");
                foreach ($result_top->result() as $show_top) {  ?>
                        <tr>
                            <td scope="row " style="">
                                <?php echo $show_top->SchoolAssessmentEducationYear; ?></td>
                            <td scope="row">
                            <?php  $sum = $show_top->SchoolAssessmentSemester; ?>
                            <?php 
                         if ($sum== 1) {
                            echo "ภาคเรียนที่ 1";
                          } elseif ($sum == 2) {
                            echo "ภาคเรียนที่ 2";
                          } elseif ($sum == 0) {
                            echo "ตลอดปีการศึกษา";
                          } elseif ($sum == 3) {
                            echo "ภาคเรียนฤดูร้อน";
                          } 
                        ?>
                          </td>
                            <td style=""><?php echo $show_top->SchoolNameThai; ?></td>
                            <td style=""><?php echo $show_top->SchoolAssessmentName; ?></td>

                            <td style="">
                            <?php $this->db->where('Id_sa', $show_top->Id); // เพิ่มเงื่อนไข WHERE ในคำสั่ง SQL
                             $resultA3 = $this->db->get('SCHOOL_ASSESSMENT_CRITERIA '); 
                                                       
                                                        foreach ($resultA3->result() as $showA3) { ?>
                                <a href="<?php echo site_url('sc_ass_ria_forms_p6?page=sh66') ?>&&name=<?php echo $showA3->AssessmentorName; ?>&&key=<?php echo $show_top->Id; ?>"
                                    class="my-link "><?php echo $showA3->AssessmentorName; ?> </a><br>
                                <?php } ?>
                           <a href="<?php echo site_url('sc_ass_ria_forms_p6?page=sh6') ?>&&Id_ac=<?php echo $show_top->Id; ?>&&name=<?php echo $show_top->SchoolAssessmentName; ?>&&year=<?php echo $show_top->SchoolAssessmentEducationYear; ?>&&summer=<?php echo $show_top->SchoolAssessmentSemester; ?>&&SchoolID=<?php echo $show_top->SchoolID; ?>&&SchoolNameThai=<?php echo $show_top->SchoolNameThai; ?>"
                                    class="my-link fw-bold">>>เพิ่มผู้ประเมิน>>
                                </a>
                        </td>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look5<?php echo $show_top->Id; ?>"><i
                                        class="bi bi-card-list"></i></button></td>
                                <!-- แก้ไข -->
                            <td style="text-align: center;">
                            <a href="<?php echo site_url('sc_ass_forms_p5?page=sh55') ?>&&key=<?php echo $show_top->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass<?php echo $show_top->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass<?php echo $show_top->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show_top->SchoolAssessmentName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('sc_ass_del_p5'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show_top->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>
                        </tr>
                        <?php  } ?>




                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh6') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_ria_forms_p6?page=sh6'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">ภาคเรียนที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>





                        <?php 
                $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                
                WHERE  DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->SchoolAssessmentEducationYear; ?></th>
                            <th scope="row " style="text-align: center;"><?php echo $show->SchoolAssessmentSemester; ?>
                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $show->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $show->CriteriaID; ?></td>


                            <!-- แก้ไข -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look6<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass_ria<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass_ria<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CriteriaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('sc_ass_ria_del_p6'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh7') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_res_forms_p7?page=sh7'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">ภาคเรียนที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับองค์ประกอบตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับของระดับตัวชี้วัดที่ได้</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>




                        <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php 
                $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                
                WHERE CriteriaID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                        <tr>

                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentEducationYear; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $show->SchoolAssessmentSemester; ?>
                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $show->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $show->CriteriaID; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $show->CompositionIndex; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show->LevelIndex; ?></th>


                            <!-- แก้ไข -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look7<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass_res<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass_res<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CriteriaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('sc_ass_res_del_p7'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh8') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">ข้อมูลการประเมินผลสถานศึกษา</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ข้อมูลการประเมินสถานศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'achie_ass_forms_p8?page=sh8'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="" scope="col">สถานศึกษา</th>
                            <th style="" scope="col">ชื่อการประเมิน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                        </tr>

                    </thead>
                    <tbody>



                        <?php 
                $result = $this->db->query("SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                
                WHERE  DeleteStatus = '0'");
                foreach ($result->result() as $show) {  
                    $Id = $show->Id
                    ?>
                        <tr>
                            <th scope="row " style="">
                                <?php echo $show->AchievementAssessmentYear; ?></th>

                                <th scope="row">
                            <?php
                      $result = $this->db->query('SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                      INNER JOIN SCHOOL
                      ON ACHIEVEMENT_ASSESSMENT.SchoolID = SCHOOL.SchoolID where id = '."$Id".
'                      ');
                     foreach ($result->result() as $show) {
                     ?>
                                
                            <?php echo $show->SchoolNameThai; ?><br>
                            <?php } ?>
                        </th>
                            <td style=""><?php echo $show->SchoolAssessmentName; ?>
                            <td style="text-align: center;">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look8<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>

                            </td>
                            <!-- แก้ไข -->
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('achie_ass_forms_p8?page=sh88') ?>&&key=<?php echo $show->Id; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_achie_ass<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_achie_ass<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->AchievementAssessmentYear; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('achie_ass_del_p8'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>

                        </tr>
                        <?php  } ?>




                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->
<!-- **************************************************ดู********************************************************************** -->
<?php  if ($page=='sh1') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look1<?php echo $Id = $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        
                        <!-- <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaID; ?></p> -->
                        <h5 class="fw-bold">ชื่อเกณฑ์</h5>
                        <p><?php echo $show->CriteriaName; ?></p>
                        <h5 class="fw-bold">คำฮธิบายเกณฑ์</h5>
                        <p><?php echo $show->CriteriaDescription; ?></p>

                    </div>
                    <div class="col">
                        <h5 class="fw-bold">จำนวนระดับของตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaLevelAmount; ?></p>
                        <h5 class="fw-bold">จำนวนองค์ประกอบของตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaCompositionAmount; ?></p>
                        <h5 class="fw-bold">คะแนนการผ่านเกณฑ์(%)</h5>
                        <p><?php echo $show->CriteriaPassingScorePercentage; ?></p>

                    </div>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th>ระดับของตัวชี้วัด</th>
                        <th>องค์ประกอบของตัวชี้วัด</th>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered">
                               <thead class="table-Ligth">
                                    <tr>
                                        <td>ลำดับ</td>
                                        <td>หัวข้อ</td>
                                        <td>คะแนน</td>
                                    </tr>
                               </thead>
                                <?php $resultc = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_LEVEL
                                where Id_ac = $Id ORDER BY LevelIndex ASC"); 
                                    foreach ($resultc->result() as $showc) {  ?>
                                <tr>
                                    <td>
                                        <p>
                                            <?php echo $showc->LevelIndex; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $showc->LevelName; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $showc->LevelScore; ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </td>


                        <td>
                        <table class="table table-bordered">
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>หัวข้อ</td>
                                    <td>ค่าน้ำหนัก</td>
                                    <td>หลักฐาน</td>
                                </tr>
                                <?php $resultc = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION
                                where Id_ac = $Id ORDER BY CompositionIndex ASC"); 
                                    foreach ($resultc->result() as $showc) {  ?>
                                <tr>
                                    <td>
                                        <p>
                                            <?php echo $showc->CompositionIndex; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $showc->CompositionName; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $showc->CompositionWeightScore; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $showc->CompositionGuideline; ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh2') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look2<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaID; ?></p>
                        <h5 class="fw-bold">ลำดับของระดับตัวชี้วัด</h5>
                        <p><?php echo $show->LevelIndex; ?></p>
                        <h5 class="fw-bold">หัวข้อระดับตัวชี้วัด</h5>
                        <p><?php echo $show->LevelName; ?></p>
                        <h5 class="fw-bold">คะแนนระดับตัวชี้วัด</h5>
                        <p><?php echo $show->LevelScore; ?></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh3') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look3<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaName; ?></p>
                        <h5 class="fw-bold">ลำดับองค์ประกอบตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionIndex; ?></p>
                        <h5 class="fw-bold">หัวข้อองค์ประกอบตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionName; ?></p>

                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ค่าน้ำหนักการประเมินตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionWeightScore; ?></p>
                        <h5 class="fw-bold">หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionGuideline; ?></p>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh4') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look4<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaID; ?></p>
                        <h5 class="fw-bold">ลำดับองค์ประกอบตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionIndex; ?></p>
                        <h5 class="fw-bold">ลำดับของระดับตัวชี้วัด</h5>
                        <p><?php echo $show->LevelIndex; ?></p>
                        <h5 class="fw-bold">คำอธิบายระดับของแต่ละองค์ประกอบ</h5>
                        <p><?php echo $show->CompositionLevelDescription; ?></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh5') {  ?>


<?php                   
                      
                      $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT 
                      INNER JOIN SCHOOL
                      ON SCHOOL_ASSESSMENT.SchoolID = SCHOOL.SchoolID 
                     ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look5<?php echo $Id = $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          <?php  $result_un = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT where Id = $Id
                     
                     ");
                     foreach ($result_un->result() as $show_un) { ?>
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">ปีการศึกษาที่ทำกระประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentEducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียนที่ทำการประเมิน</h5>
                        <p><?php $sum = $show->SchoolAssessmentSemester; ?></p>
                        <?php 
                         if ($sum== 1) {
                            echo "<p>ภาคเรียนที่ 1</p>";
                          } elseif ($sum == 2) {
                            echo "<p>ภาคเรียนที่ 2</p>";
                          } elseif ($sum == 0) {
                            echo "<p>ตลอดปีการศึกษา</p>";
                          } elseif ($sum == 3) {
                            echo "<p>ภาคเรียนฤดูร้อน</p>";
                          } 
                        ?>
                        <h5 class="fw-bold">รหัสสถานศึกษา</h5>
                        <p><?php echo $show->SchoolNameThai; ?></p>

                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ชื่อการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentName; ?></p>
                        <h5 class="fw-bold">คำอธิบายการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentDescription; ?></p>


                    </div>
                </div>
                <?php  } ?>
            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh6') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look6<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">ปีการศึกษาที่ทำการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentEducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียนที่ทำการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentSemester; ?></p>
                        <h5 class="fw-bold">รหัสสถานศึกษา</h5>
                        <p><?php echo $show->SchoolID; ?></p>
                        <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaID; ?></p>

                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ชื่อผู้ประเมิน</h5>
                        <p><?php echo $show->AssessmentorName; ?></p>
                        <h5 class="fw-bold">คะแนน</h5>
                        <p><?php echo $show->SchoolAssessmentScore; ?></p>
                        <h5 class="fw-bold">ผลการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentCode; ?></p>
                        <h5 class="fw-bold">ลิงก์เอกสารแนบรายละเอียดการประเมิน</h5>
                        <p>
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->SchoolAssessmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                        </p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh7') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look7<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">ปีการศึกษาที่ทำการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentEducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียนที่ทำการประเมิน</h5>
                        <p><?php echo $show->SchoolAssessmentSemester; ?></p>
                        <h5 class="fw-bold">รหัสสถานศึกษา</h5>
                        <p><?php echo $show->SchoolID; ?></p>

                    </div>
                    <div class="col">
                        <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $show->CriteriaID; ?></p>
                        <h5 class="fw-bold">ลำดับองค์ประกอบตัวชี้วัด</h5>
                        <p><?php echo $show->CompositionIndex; ?></p>
                        <h5 class="fw-bold">ลำดับของระดับตัวชี้วัดที่ได้</h5>
                        <p><?php echo $show->LevelIndex; ?></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh8') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                      INNER JOIN SCHOOL
                      ON ACHIEVEMENT_ASSESSMENT.SchoolID = SCHOOL.SchoolID 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look8<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">ปีการศึกษาที่ทำการประเมิน</h6>
                        <p><?php echo $show->AchievementAssessmentYear; ?></p>

                        <h6 class="fw-bold">รหัสสถานศึกษา</h6>
                        <p><?php echo $show->SchoolNameThai; ?></p>

                        <h6 class="fw-bold">ชื่อการประเมิน</h6>
                        <p><?php echo $show->SchoolAssessmentName; ?></p>

                    </div>
                    <div class="col">
                        <h6 class="fw-bold">คำอธิบายการประเมิน</h6>
                        <p><?php echo $show->SchoolAssessmentDescription; ?></p>
                        <h6 class="fw-bold">ชื่อผู้ประเมิน</h6>
                        <p><?php echo $show->AssessmentorName; ?></p>
                        <h6 class="fw-bold">ผลการประเมินผลสัมฤทธิ์การศึกษา</h6>
                        <p>
                            <?php if ($show->AchievementAssessmentPassingFlag == 0) { ?>
                            ไม่ผ่าน
                            <?php }elseif ($show->AchievementAssessmentPassingFlag == 1) {?>
                            ผ่าน
                            <?php  } ?>
                        </p>
                        <h6 class="fw-bold">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</h6>
                        <p>
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->AchievementAssessmentAttachmentURL; ?>"
                                    target="_blank">รายละเอียดเอกสาร</i></a>

                            </th>
                        </p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>