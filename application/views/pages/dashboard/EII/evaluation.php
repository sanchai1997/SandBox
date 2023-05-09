<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
<?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
<?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<?php $txt = isset($_GET['txt']) ? $_GET['txt'] : ''; ?>

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
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } elseif (isset($_SESSION['success_up'])) {
        unset($_SESSION['success_up']);
    ?>

        <script>
            $(document).ready(function() {
                $('#more').modal('show');
            });
        </script>
        <!-- Modal -->
        <div class="modal fade" id="more" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> <i class="bi bi-file-earmark-arrow-up-fill"></i>ได้ทำการอับโหลดข้อมูลตัวชี้วัดทั้งหมด
                            <?php
                            echo $_SESSION['count'];
                            unset($_SESSION['count']);
                            ?>รายการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <center>
                            <p>  สำเร็จ <?php
                                            echo $_SESSION['done'];
                                            unset($_SESSION['done']);
                                            ?> รายการ</p>
                            <p> ไม่สำเร็จ <?php
                                            echo $_SESSION['cancel'];
                                            unset($_SESSION['cancel']);
                                            ?> รายการ</p>
                            <p> ข้อมูลซ้ำ <?php
                                            echo $_SESSION['loop'];
                                            unset($_SESSION['loop']);
                                            ?> รายการ</p>
                       </center>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#look_txt">รายละเอียดเพิ่มเติม</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">รับทราบ</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="look_txt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดเพิ่มเติม</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php $data_get =  $_SESSION['txt']; ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสตัวชี้วัด</th>
                                    <th>ชื่อเกณฑ์</th>

                                    <th>สถานะ</th>
                                    <th>หมายเหต</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_get as $row) : ?>
                                    <tr>
                                        <td><?= $row['CriteriaID'] ?></td>
                                        <td><?= $row['CriteriaName'] ?></td>

                                        <td><?php if ($row['status'] == '1') { ?>
                                               <button class="btn btn-success">สำเร็จ</button>
                                         <?php   } else {  ?>
                                            <button class="btn btn-danger">ไม่สำเร็จ</button>
                                            <?php }  ?></td>
                                        <td><?= $row['note'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                       
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
    <!-- ตัวชี้วัด -->

    <div class="pagetitle">
        <div class="row ">

            <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่นวัตกรรมการศึกษา</h1>


            <div class="col-3">


            </div>
            <div class="col-lg-9" style="padding-right: 25px;">

            </div>
        </div>
    </div>

    </div><!-- End Page Title -->

    <?php if ($page == 'sh1') { ?>

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if ($page == 'sh1') {
                                            echo 'ตัวชี้วัด';
                                        } ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">ตัวชี้วัด</a>
                                            <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4'); ?>">การประเมินสถานศึกษา</a>
                                            <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">การประเมินตามตัวชี้วัด</a>
                                            <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ผลการประเมินสถานศึกษา</a>
                                        </li>

                                    </ul>
                                </div>
                            </h5>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5 style="float: right; padding: 15px;" class="card-title"> <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-file-earmark-plus"></i>
                                            อัปโหลดตัวชี้วัด</a></h5>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-file-earmark-arrow-up"></i> อัปโหลดตัวชี้วัด</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo site_url('uplod_criteria'); ?>" method="POST" id="UploadSchool" enctype="multipart/form-data">
                                                        <div class="col-md-12" style="padding-bottom: 15px;">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label>คู่มือขั้นตอนการอัปโหลด : &nbsp;</label>
                                                                    <a href="assets/EII/ASSESSMENT_CRITERIA/Guide.pdf" class="btn btn-info" target="_blank"><i class="bi bi-file-earmark-text"></i>
                                                                        รายละเอียด</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label>ฟอร์มกรอกข้อมูล : &nbsp;</label>
                                                                    <a href="<?php echo site_url('down_csv_criteria'); ?>" class="btn btn-success" download target="_blank"><i class="bi bi-file-earmark-arrow-down"></i>
                                                                        ดาวน์โหลด</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <label class="input-group-text" for="inputGroupFile01">แนบไฟล์ .CSV</label>
                                                                <input type="file" class="form-control" name="document_criteria" id="FileSchoolUpload" placeholder="เอกสารแนบไฟล์" required>
                                                            </div>
                                                        </div>
                                                        <script type="text/javascript">
                                                            function check(frm) {
                                                                if (!frm.FileSchoolUpload.value == "") {
                                                                    var fty = new Array(
                                                                        ".csv"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
                                                                    var a = frm.FileSchoolUpload
                                                                        .value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
                                                                    var permiss = 0; // เงื่อนไขไฟล์อนุญาต
                                                                    a = a.toLowerCase();
                                                                    if (a != "") {
                                                                        for (i = 0; i < fty
                                                                            .length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
                                                                            if (a.lastIndexOf(fty[i]) >=
                                                                                0) { // เงื่อนไขไฟล์ที่อนุญาต   
                                                                                permiss = 1;
                                                                                break;
                                                                            } else {
                                                                                continue;
                                                                            }
                                                                        }
                                                                        if (permiss == 0) {
                                                                            alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ csv");
                                                                            return false;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        </script>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" onclick="return check(UploadSchool)">อัปโหลด</button>
                                                    </form>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                                                                                                    'ass_ria_forms_p1?page=sh1'
                                                                                                                ); ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i>
                                                เพิ่มข้อมูล</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-borderless datatable">
                            <thead>

                                <tr>
                                    <th style="" scope="col">รหัสตัวชี้วัด</th>
                                    <th style="" scope="col">ชื่อเกณฑ์</th>
                                    <th style="" scope="col">ระดับตัวชี้วัด</th>
                                    <th style="" scope="col">องค์ประกอบ</th>
                                    <!-- <th style="" scope="col">คำอธิบาย</th> -->
                                    <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                                    <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                                </tr>

                            </thead>
                            <tbody>

                                <?php foreach ($query as $show) {
                                    # code...

                                ?>
                                    <tr>
                                        <td scope="row " class="">
                                            <p class="mt-2"> <?php echo $CriteriaID = $show->CriteriaID; ?></p>
                                        </td>
                                        <td scope="row" class="">
                                            <p class="mt-2"> <?php echo $CriteriaName = $show->CriteriaName; ?></p>
                                        </td>
                                        <td style=";">
                                            <?php
                                            $Id = $show->Id;
                                            $this->db->where('DeleteStatus', 0);
                                            $this->db->where('CriteriaID', $Id); // เพิ่มเงื่อนไข WHERE ในคำสั่ง SQL
                                            $result = $this->db->get('ASSESSMENT_CRITERIA_LEVEL ');
                                            foreach ($result->result() as $cls) {
                                            ?>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#LevelName<?php echo $cls->Id_acl; ?>">
                                                    <?php echo $cls->LevelName; ?>
                                                </button>
                                                <br>
                                                <!-- Modal -->
                                                <div class="modal fade" id="LevelName<?php echo $cls->Id_acl; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">ระดับตัวชี้วัด
                                                                    <?php echo $cls->LevelName; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold">รหัสตัวชี้วัด</h6>
                                                                        <p> <?php echo $show->CriteriaID; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> ลำดับของระดับตัวชี้วัด</h6>
                                                                        <p> <?php echo $cls->LevelIndex; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> หัวข้อระดับตัวชี้วัด</h6>
                                                                        <p> <?php echo $cls->LevelName; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> คะแนนระดับตัวชี้วัด</h6>
                                                                        <p> <?php echo $cls->LevelScore; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="<?php echo site_url('ass_ria_lvl_forms_p2?page=sh22') ?>&&lvl=<?php echo $show->CriteriaLevelAmount ?>&&CriteriaID=<?php echo $show->Id ?>&&CriteriaLevelAmount=<?php echo $show->CriteriaLevelAmount ?>&&key=<?php echo $cls->Id_acl; ?>&&name=<?php echo $show->CriteriaName; ?>" class="my-link btn btn-warning"><i class="bi bi-pencil-square"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <a href="<?php echo site_url('ass_ria_lvl_forms_p2?page=sh2') ?>&&name=<?php echo $show->CriteriaName; ?>&&Id=<?php echo $show->Id; ?>&&key=<?php echo $show->CriteriaID; ?>&&lvl=<?php echo $show->CriteriaLevelAmount ?>" class="my-link fw-bold">>>เพิ่มระดับตัวชี้วัด>>
                                            </a>

                                        </td>

                                        <td style="">
                                            <?php
                                            $this->db->where('DeleteStatus', 0);
                                            $this->db->where('CriteriaID', $Id); // เพิ่มเงื่อนไข WHERE ในคำสั่ง SQL
                                            $resultA3 = $this->db->get('ASSESSMENT_CRITERIA_COMPOSITION ');

                                            foreach ($resultA3->result() as $showA3) { ?>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#CompositionName<?php echo $showA3->Id_acc; ?>">
                                                    <?php echo $showA3->CompositionName; ?>
                                                </button>
                                                <br>
                                                <!-- Modal -->
                                                <div class="modal fade" id="CompositionName<?php echo $showA3->Id_acc; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    องค์ประกอบเกณฑ์การประเมิน
                                                                    <?php echo $showA3->CompositionName; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold">รหัสตัวชี้วัด</h6>
                                                                        <p> <?php echo $show->CriteriaID; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> ลำดับองค์ประกอบตัวชี้วัด</h6>
                                                                        <p> <?php echo $showA3->CompositionIndex; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> หัวข้อองค์ประกอบตัวชี้วัด</h6>
                                                                        <p> <?php echo $showA3->CompositionName; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> ค่าน้ำหนักการประเมิน</h6>
                                                                        <p> <?php echo $showA3->CompositionWeightScore; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="fw-bold"> หลักฐานประกอบการประเมิน</h6>
                                                                        <p> <?php echo $showA3->CompositionGuideline; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="<?php echo site_url('ass_ria_com_forms_p3?page=sh33') ?>&&lvl=<?php echo $show->CriteriaCompositionAmount ?>&&Id_acc=<?php echo $showA3->Id_acc; ?>&&Id=<?php echo $show->Id; ?>&&name=<?php echo $show->CriteriaName; ?>&&CriteriaID=<?php echo $show->CriteriaID; ?>" class="my-link btn btn-warning"><i class="bi bi-pencil-square">
                                                                    </i></a>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <a href="<?php echo site_url('ass_ria_com_forms_p3?page=sh3') ?>&&Id=<?php echo $show->Id; ?>&&name=<?php echo $show->CriteriaName; ?>&&key=<?php echo $show->CriteriaID; ?>&&lvl=<?php echo $show->CriteriaCompositionAmount ?>" class="my-link fw-bold">>>เพิ่มองค์ประกอบ>>
                                            </a>

                                        </td>
                                        <!-- </td>
                                    <td style="text-align: center;">
                                 <a
                                    href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4') ?>&&key=<?php echo $show->CriteriaID ?>&&name=<?php echo $show->CriteriaName ?>"
                                    class="btn btn-info"><i class="bi bi-eye"></i></a></td> -->
                                        <td style="text-align: center;">

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#look1<?php echo $show->Id; ?>"><i class="bi bi-card-list"></i></button>


                                        </td>
                                        <!-- แก้ไขลบ -->
                                        <td style="text-align: center;">
                                            <a href="<?php echo site_url('ass_ria_forms_p1?page=sh11') ?>&&key=<?php echo $show->CriteriaID; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del_ass_ria<?php echo $show->Id; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="del_ass_ria<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ยืนยันการลบข้อมูลรหัส
                                                                <?php echo nbs(2); ?>
                                                                <?php echo $show->CriteriaID; ?>
                                                            </h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            คุณต้องการลบข้อมูลใช่หรือไหม

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <form method="post" action="<?php echo site_url('ass_ria_del_p1'); ?>">
                                                                <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                                <div class="d-flex justify-content-center">
                                                                    <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
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
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if ($page == 'sh4') {
                                                echo 'การประเมินสถานศึกษา';
                                            } ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">ตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4'); ?>">การประเมินสถานศึกษา</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">การประเมินตามตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ผลการประเมินสถานศึกษา</a>
                                            </li>

                                        </ul>
                                    </div>

                                </h5>
                            </div>
                            <div class="col">
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                                                                                            'sc_ass_forms_p5?page=sh5'
                                                                                                        ); ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                            </div>
                        </div>

                        <table class="table table-borderless datatable">
                            <thead>

                                <tr>

                                    <th style="" scope="col" class="col-1">ปีการศึกษา</th>
                                    <th style="" scope="col" class="col-1">ภาคเรียน</th>
                                    <th style="" scope="col" class="col-2">รหัสสถานศึกษา</th>
                                    <th style="" scope="col" class="col-2">ชื่อการประเมิน</th>
                                    <th style="" scope="col" class="col-">คำอธิบายการประเมิน</th>
                                    <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                                    <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                                </tr>

                            </thead>
                            <tbody>





                                <?php
                                $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT 
                INNER JOIN SCHOOL
                ON SCHOOL_ASSESSMENT.SchoolID = SCHOOL.SchoolID where SCHOOL_ASSESSMENT.DeleteStatus = 0 AND SCHOOL.DeleteStatus = 0");
                                foreach ($result->result() as $show) { ?>
                                    <tr>
                                        <td scope="row " style="">
                                            <?php echo $show->SchoolAssessmentEducationYear; ?>
                                        </td>
                                        <td scope="row">
                                            <?php $sum = $show->SchoolAssessmentSemester; ?>
                                            <?php
                                            if ($sum == 1) {
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
                                        <td style="">
                                            <?php echo $show->SchoolNameThai; ?>
                                        </td>
                                        <td style="">
                                            <?php echo $show->SchoolAssessmentName; ?>
                                        </td>
                                        <td style="">
                                            <p style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?php echo $show->SchoolAssessmentDescription; ?></p>
                                        </td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SchoolAssessmentDescription<?php echo $show->Id_sa; ?>">
                                                <i class="bi bi-card-list"></i>
                                            </button>
                                        </td>
                                        <!-- แก้ไข -->
                                        <td style="text-align: center;">
                                            <a href="<?php echo site_url('sc_ass_forms_p5?page=sh55') ?>&&key=<?php echo $show->Id_sa; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del_ass_ria_com_lvl<?php echo $show->Id_sa; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="del_ass_ria_com_lvl<?php echo $show->Id_sa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ยืนยันการลบข้อมูลการประเมิน
                                                                <?php echo nbs(2); ?>
                                                                <?php echo $show->SchoolAssessmentName; ?>
                                                            </h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <form method="post" action="<?php echo site_url('sc_ass_del_p5'); ?>">
                                                                <input type="hidden" name="Id_sa" value="<?php echo $show->Id_sa; ?>">
                                                                <div class="d-flex justify-content-center">
                                                                    <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Modal -->
                                        </td>
                                        <div class="modal fade" id="SchoolAssessmentDescription<?php echo $show->Id_sa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">การประเมินโรงเรียน</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold">ปีการศึกษาที่ทำการประเมิน</h6>
                                                                <p> <?php echo $show->SchoolAssessmentEducationYear; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="fw-bold"> ภาคเรียนที่ทำการประเมิน</h6>
                                                                <p> <?php $sum = $show->SchoolAssessmentSemester; ?>
                                                                    <?php
                                                                    if ($sum == 1) {
                                                                        echo "ภาคเรียนที่ 1";
                                                                    } elseif ($sum == 2) {
                                                                        echo "ภาคเรียนที่ 2";
                                                                    } elseif ($sum == 0) {
                                                                        echo "ตลอดปีการศึกษา";
                                                                    } elseif ($sum == 3) {
                                                                        echo "ภาคเรียนฤดูร้อน";
                                                                    }
                                                                    ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold"> สถานศึกษา</h6>
                                                                <p> <?php echo $show->SchoolNameThai; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="fw-bold"> ชื่อการประเมิน</h6>
                                                                <p> <?php echo $show->SchoolAssessmentName; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold"> คำอธิบายการประเมิน</h6>
                                                                <p> <?php echo $show->SchoolAssessmentDescription; ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if ($page == 'sh5') {
                                                echo 'การประเมินตามตัวชี้วัด';
                                            } ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">ตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4'); ?>">การประเมินสถานศึกษา</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">การประเมินตามตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ผลการประเมินสถานศึกษา</a>
                                            </li>

                                        </ul>
                                    </div>
                                </h5>
                            </div>
                            <div class="col">
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                                                                                            'sc_ass_ria_forms_p6?page=sh6'
                                                                                                        ); ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                            </div>
                        </div>

                        <table class="table table-borderless datatable">
                            <thead>

                                <tr>

                                    <th style="" scope="col">ปีการศึกษาที่</th>
                                    <th style="" scope="col">ภาคเรียนที่</th>
                                    <th style="" scope="col">สถานศึกษา</th>
                                    <th style="" scope="col">รหัสตัวชี้วัด</th>
                                    <th style="" scope="col">ผู้ประเมิน</th>
                                    <th style="" scope="col">ลำดับองค์ประกอบ</th>
                                    <th style="" scope="col">ลำดับของระดับที่ได้</th>
                                    <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                                    <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                                </tr>

                            </thead>
                            <tbody>



                                <?php

                                $result_top = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                            INNER JOIN SCHOOL
                            ON SCHOOL_ASSESSMENT_CRITERIA.SchoolID = SCHOOL.SchoolID
                            INNER JOIN SEMESTER
                            ON  SEMESTER.SEMESTER_CODE = SCHOOL_ASSESSMENT_CRITERIA.SchoolAssessmentSemester
                            INNER JOIN ASSESSMENT_CRITERIA
                            ON  SCHOOL_ASSESSMENT_CRITERIA.CriteriaID = ASSESSMENT_CRITERIA.Id 
                            INNER JOIN CLS_EVALUATION
                            ON CLS_EVALUATION.EVALUATION_CODE = SCHOOL_ASSESSMENT_CRITERIA.SchoolAssessmentCode
                            
                     
                 where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0 AND SCHOOL.DeleteStatus = 0 AND ASSESSMENT_CRITERIA.DeleteStatus = 0
             
                
                ");
                                foreach ($result_top->result() as $show_top) { ?>
                                    <tr>
                                        <td scope="row " style="">
                                            <!-- ปีการศึกษาที่ -->
                                            <p class="mt-2"><?php echo $show_top->SchoolAssessmentEducationYear; ?></p>
                                        </td>
                                        <td scope="row">
                                            <!-- ภาคเรียนที่ -->
                                            <?php $sum = $show_top->SchoolAssessmentSemester; ?>
                                            <p class="mt-2">
                                                <?php
                                                if ($sum == 1) {
                                                    echo "ภาคเรียนที่ 1";
                                                } elseif ($sum == 2) {
                                                    echo "ภาคเรียนที่ 2";
                                                } elseif ($sum == 0) {
                                                    echo "ตลอดปีการศึกษา";
                                                } elseif ($sum == 3) {
                                                    echo "ภาคเรียนฤดูร้อน";
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td style="">
                                            <p class="mt-2"> <?php echo $show_top->SchoolNameThai; ?></p>
                                        </td><!-- สถานศึกษา -->
                                        <td style="">
                                            <p class="mt-2"> <?php echo $show_top->CriteriaID; ?></p>
                                        </td><!-- ตัวชี้วัด -->
                                        <td style="">
                                            <p class="mt-2"><?php echo $show_top->AssessmentorName; ?></p>
                                        </td><!-- ผู้ประเมิน -->



                                        <td style="">
                                            <!-- ลำดับองค์ประกอบตัวชี้วัด -->
                                            <?php
                                            $SchoolAssessmentEducationYear = $show_top->SchoolAssessmentEducationYear;
                                            $SchoolAssessmentSemester = $show_top->SchoolAssessmentSemester;
                                            $SchoolID = $show_top->SchoolID;
                                            $CriteriaID = $show_top->Id;
                                            $resultR = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                        INNER JOIN ASSESSMENT_CRITERIA_COMPOSITION
                                        ON SCHOOL_ASSESSMENT_RESULT.CompositionIndex =ASSESSMENT_CRITERIA_COMPOSITION.CompositionIndex
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID =ASSESSMENT_CRITERIA_COMPOSITION.CriteriaID
                                        
                                        where SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        AND SCHOOL_ASSESSMENT_RESULT.DeleteStatus = 0
                                        AND ASSESSMENT_CRITERIA_COMPOSITION.DeleteStatus = 0
                                        AND SCHOOL_ASSESSMENT_RESULT.SchoolAssessmentEducationYear = $SchoolAssessmentEducationYear
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        ORDER BY SCHOOL_ASSESSMENT_RESULT.CompositionIndex ASC;
                                        
                                        ");



                                            ?>
                                            <!-- Button trigger modal -->

                                            <?php
                                            foreach ($resultR->result() as $showR) { ?>
                                                <p class="mt-2">
                                                    <?php echo $showR->CompositionIndex; ?>.<?php echo $showR->CompositionName; ?>
                                                </p>
                                                <br> <?php
                                                    }
                                                        ?>
                                            <br>
                                            <!-- Modal -->




                                        </td>
                                        <td style="">
                                            <!-- ลำดับของระดับตัวชี้วัดที่ได้ -->
                                            <?php
                                            $SchoolAssessmentEducationYear = $show_top->SchoolAssessmentEducationYear;
                                            $SchoolAssessmentSemester = $show_top->SchoolAssessmentSemester;
                                            $SchoolID = $show_top->SchoolID;
                                            $CriteriaID = $show_top->Id;
                                            $resultR = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                       
                                        INNER JOIN ASSESSMENT_CRITERIA_LEVEL
                                        ON SCHOOL_ASSESSMENT_RESULT.LevelIndex =ASSESSMENT_CRITERIA_LEVEL.LevelIndex
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID =ASSESSMENT_CRITERIA_LEVEL.CriteriaID
                                        where SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        AND SCHOOL_ASSESSMENT_RESULT.DeleteStatus = 0
                                        AND ASSESSMENT_CRITERIA_LEVEL.DeleteStatus = 0
                                        AND SCHOOL_ASSESSMENT_RESULT.SchoolAssessmentEducationYear = $SchoolAssessmentEducationYear
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        ORDER BY SCHOOL_ASSESSMENT_RESULT.LevelIndex ASC;
                                        
                                        ");



                                            ?>
                                            <!-- Button trigger modal -->

                                            <?php
                                            foreach ($resultR->result() as $showR) { ?>
                                                <p class="mt-2"> <?php echo $showR->LevelIndex; ?>.<?php echo $showR->LevelName; ?>
                                                </p>
                                                <br> <?php
                                                    }
                                                        ?>

                                            <!-- Modal -->





                                        </td>

                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#look5<?php echo $show_top->Id; ?>"><i class="bi bi-card-list"></i></button>
                                        </td>
                                        <!-- แก้ไข -->
                                        <td style="text-align: center;">
                                            <a href="<?php echo site_url('sc_ass_ria_forms_p6?page=sh66') ?>&&key=<?php echo $show_top->Id_sac; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del_sc_ass<?php echo $show_top->Id_sac; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="del_sc_ass<?php echo $show_top->Id_sac; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ยืนยันการลบข้อมูล


                                                                <?php echo nbs(2); ?>
                                                            </h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p> คุณต้องการลบข้อมูลใช่หรือไหม </p>
                                                            <p> ปีการศึกษา:
                                                                <?php echo $show_top->SchoolAssessmentEducationYear; ?>
                                                            </p>
                                                            <p> ภาคเรียน:<?php echo $show_top->SEMESTER_NAME; ?></p>
                                                            <p> สถานศึกษา: <?php echo $show_top->SchoolNameThai; ?></p>

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <form method="post" action="<?php echo site_url('sc_ass_ria_del_p6'); ?>">
                                                                <input type="hidden" name="Id_sac" value="<?php echo $show_top->Id_sac; ?>">
                                                                <input type="hidden" name="SchoolAssessmentEducationYear" value="<?php echo $show_top->SchoolAssessmentEducationYear; ?>">
                                                                <input type="hidden" name="SchoolAssessmentSemester" value="<?php echo $show_top->SchoolAssessmentSemester; ?>">
                                                                <input type="hidden" name="SchoolID" value="<?php echo $show_top->SchoolID; ?>">
                                                                <div class="d-flex justify-content-center">
                                                                    <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
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
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if ($page == 'sh8') {
                                                echo 'ผลการประเมินสถานศึกษา';
                                            } ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1'); ?>">ตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p4?page=sh4'); ?>">การประเมินสถานศึกษา</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p5?page=sh5'); ?>">การประเมินตามตัวชี้วัด</a>
                                                <a class="dropdown-item" href="<?php echo site_url('Fm_evaluation_das_p8?page=sh8'); ?>">ผลการประเมินสถานศึกษา</a>
                                            </li>

                                        </ul>
                                    </div>
                                </h5>
                            </div>
                            <div class="col">
                                <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                                                                                            'achie_ass_forms_p8?page=sh8'
                                                                                                        ); ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                            </div>
                        </div>

                        <table class="table table-borderless datatable">
                            <thead>

                                <tr>

                                    <th style="" scope="col" class="col-2">ปีการศึกษา</th>
                                    <th style="" scope="col">ภาคเรียน</th>
                                    <th style="" scope="col">สถานศึกษา</th>
                                    <th style="" scope="col">ชื่อการประเมิน</th>
                                    <th style="" scope="col">ผลการประเมิน</th>
                                    <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                                    <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                                </tr>

                            </thead>
                            <tbody>



                                <?php
                                $result = $this->db->query("SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                            INNER JOIN SEMESTER
                            ON SEMESTER.SEMESTER_CODE = ACHIEVEMENT_ASSESSMENT.SchoolAssessmentSemester
                
                WHERE  ACHIEVEMENT_ASSESSMENT.DeleteStatus = '0'
                AND  DeleteStatus = '0' 
                ");
                                foreach ($result->result() as $show) {
                                    $Id = $show->Id
                                ?>
                                    <tr>
                                        <td scope="row " style="">
                                            <?php echo $show->AchievementAssessmentYear; ?>
                                        </td>
                                        <td scope="row " style="">
                                            <?php echo $show->SEMESTER_NAME; ?>
                                        </td>

                                        <td scope="row">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                      INNER JOIN SCHOOL
                      ON ACHIEVEMENT_ASSESSMENT.SchoolID = SCHOOL.SchoolID
                       where id = ' . "$Id" .'    AND    SCHOOL.DeleteStatus = 0 AND    ACHIEVEMENT_ASSESSMENT.DeleteStatus = 0      ');
                                            foreach ($result->result() as $show) {
                                            ?>

                                                <?php echo $show->SchoolNameThai; ?><br>
                                            <?php } ?>
                                        </td>
                                        <td style="">
                                            <?php echo $show->SchoolAssessmentName; ?></td>
                                        <td style="">
                                            <?php
                                            $sc = $show->AchievementAssessmentPassingFlag;
                                            if ($sc == 0) {
                                                $tol = 'ไม่ผ่าน';
                                            } elseif ($sc == 1) {
                                                $tol = 'ผ่าน';
                                            }

                                            echo $tol;
                                            ?></td>
                                        <td style="text-align: center;">

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#look8<?php echo $show->Id; ?>"><i class="bi bi-card-list"></i></button>

                                        </td>
                                        <!-- แก้ไข -->
                                        <td style="text-align: center;">
                                            <a href="<?php echo site_url('achie_ass_forms_p8?page=sh88') ?>&&key=<?php echo $show->Id; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del_achie_ass<?php echo $show->Id; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="del_achie_ass<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ยืนยันการลบข้อมูลรหัส
                                                                <?php echo nbs(2); ?>
                                                                <?php echo $show->AchievementAssessmentYear; ?>
                                                            </h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            คุณต้องการลบข้อมูลใช่หรือไหม

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <form method="post" action="<?php echo site_url('achie_ass_del_p8'); ?>">
                                                                <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                                <div class="d-flex justify-content-center">
                                                                    <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
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
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            setTimeout(function() {
                document.getElementById('myAlert-time').remove();
            }, 10000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
</main><!-- End #main -->
<!-- **************************************************ดู********************************************************************** -->
<?php if ($page == 'sh1') { ?>


    <?php $this->db->where('DeleteStatus = 0');
    $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA 
                      ');
    foreach ($result->result() as $show) {
    ?>
        <div class="modal fade" id="look1<?php echo $Id = $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ตัวชี้วัด</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">

                                <!-- <h5 class="fw-bold">รหัสตัวชี้วัด</h5>
                        <p><?php echo $CriteriaID = $show->CriteriaID; ?></p> -->
                                <h5 class="fw-bold">ชื่อเกณฑ์</h5>
                                <p>
                                    <?php echo $show->CriteriaName; ?>
                                </p>
                                <h5 class="fw-bold">คำอธิบายเกณฑ์</h5>
                                <p>
                                    <?php echo $show->CriteriaDescription; ?>
                                </p>

                            </div>
                            <div class="col">
                                <h5 class="fw-bold">จำนวนระดับของตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CriteriaLevelAmount; ?>
                                </p>
                                <h5 class="fw-bold">จำนวนองค์ประกอบของตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CriteriaCompositionAmount; ?>
                                </p>
                                <h5 class="fw-bold">คะแนนการผ่านเกณฑ์(%)</h5>
                                <p>
                                    <?php echo $show->CriteriaPassingScorePercentage; ?>
                                </p>

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
                                                <td class="col-1">ลำดับ</td>
                                                <td>หัวข้อ</td>
                                                <td>คะแนน</td>
                                            </tr>
                                        </thead>
                                        <?php

                                        $resultc = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_LEVEL
                                where CriteriaID = $Id AND DeleteStatus = 0 ORDER BY LevelIndex ASC");
                                        foreach ($resultc->result() as $showc) { ?>
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
                                            <td class="col-1">ลำดับ</td>
                                            <td>หัวข้อ</td>
                                            <td>ค่าน้ำหนัก</td>
                                            <td>หลักฐาน</td>
                                            <!-- <td>คำอธิบายองค์ประกอบของตัวชี้วัด</td> -->

                                        </tr>
                                        <?php $resultc = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION
                                where CriteriaID = $Id AND DeleteStatus = 0 ORDER BY CompositionIndex ASC");
                                        foreach ($resultc->result() as $showc) { ?>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <?php echo $CompositionIndex = $showc->CompositionIndex; ?>
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
                                                <!-- <td>
                                        <table>
                                        <?php $resultT = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL
                                  where CriteriaID = $Id  AND DeleteStatus = 0 AND CompositionIndex = $CompositionIndex");
                                            foreach ($resultT->result() as $showT) { ?>
                                       <tr>
                                               <td>
                                                    <p>
                                                        <?php echo $showT->CompositionLevelDescription; ?>
                                                    </p>
                                               </td>
                                       </tr>
                                       <?php } ?>

                                        </table>
                                    </td> -->
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('ass_ria_com_lvl_forms_p4?page=sh4') ?>" class="my-link fw-bold">>>เพิ่มคำอธิบาย>>
                                    </a></td>
                            </tr>
                            <tr>
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="col-2">ลำดับองค์ประกอบตัวชี้วัด</th>
                                        <th class="col-2">ลำดับของระดับตัวชี้วัด</th>
                                        <th>คำอธิบายระดับของแต่ละองค์ประกอบ</th>
                                    </tr>

                                    <?php $resultT = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL
                                        INNER  JOIN ASSESSMENT_CRITERIA_LEVEL
                                        ON ASSESSMENT_CRITERIA_LEVEL.LevelIndex = ASSESSMENT_CRITERIA_COMPOSITION_LEVEL.LevelIndex
                                        INNER  JOIN ASSESSMENT_CRITERIA_COMPOSITION
                                        ON ASSESSMENT_CRITERIA_COMPOSITION.CompositionIndex =ASSESSMENT_CRITERIA_COMPOSITION_LEVEL.CompositionIndex 
                                        where ASSESSMENT_CRITERIA_COMPOSITION_LEVEL.CriteriaID = $Id  
                                        AND ASSESSMENT_CRITERIA_LEVEL.CriteriaID = $Id  
                                        AND ASSESSMENT_CRITERIA_COMPOSITION.CriteriaID = $Id  
                                        AND ASSESSMENT_CRITERIA_COMPOSITION_LEVEL.DeleteStatus = 0
                                        AND ASSESSMENT_CRITERIA_LEVEL.DeleteStatus = 0
                                        AND ASSESSMENT_CRITERIA_COMPOSITION.DeleteStatus = 0
                                --   AND CompositionIndex = $CompositionIndex
                                  ");
                                    foreach ($resultT->result() as $showT) { ?>
                                        <tr>
                                            <td>
                                                <p>
                                                    <?php echo $showT->CompositionIndex; ?>.<?php echo $showT->CompositionName; ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <?php echo $showT->LevelIndex; ?>.<?php echo $showT->LevelName; ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <a href="<?php echo site_url('ass_ria_com_lvl_forms_p4?page=sh44'); ?>&&Id_accl=<?php echo $showT->Id_accl; ?>" class="my-link"><?php echo $showT->CompositionLevelDescription; ?></a>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } ?>
<?php if ($page == 'sh2') { ?>


    <?php
    $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL 
                      ');
    foreach ($result->result() as $show) {
    ?>
        <div class="modal fade" id="look2<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <p>
                                    <?php echo $show->CriteriaID; ?>
                                </p>
                                <h5 class="fw-bold">ลำดับของระดับตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->LevelIndex; ?>
                                </p>
                                <h5 class="fw-bold">หัวข้อระดับตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->LevelName; ?>
                                </p>
                                <h5 class="fw-bold">คะแนนระดับตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->LevelScore; ?>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } ?>
<?php if ($page == 'sh3') { ?>


    <?php
    $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE  DeleteStatus = 0
                      ');
    foreach ($result->result() as $show) {
    ?>
        <div class="modal fade" id="look3<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <p>
                                    <?php echo $show->CriteriaName; ?>
                                </p>
                                <h5 class="fw-bold">ลำดับองค์ประกอบตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CompositionIndex; ?>
                                </p>
                                <h5 class="fw-bold">หัวข้อองค์ประกอบตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CompositionName; ?>
                                </p>

                            </div>
                            <div class="col">
                                <h5 class="fw-bold">ค่าน้ำหนักการประเมินตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CompositionWeightScore; ?>
                                </p>
                                <h5 class="fw-bold">หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด</h5>
                                <p>
                                    <?php echo $show->CompositionGuideline; ?>
                                </p>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } ?>

<?php if ($page == 'sh5') { ?>


    <?php
    $result_top = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                     INNER JOIN SCHOOL
                            ON SCHOOL_ASSESSMENT_CRITERIA.SchoolID = SCHOOL.SchoolID
                            INNER JOIN ASSESSMENT_CRITERIA
                            ON ASSESSMENT_CRITERIA.Id = SCHOOL_ASSESSMENT_CRITERIA.CriteriaID
                            INNER JOIN CLS_EVALUATION
                            ON CLS_EVALUATION.EVALUATION_CODE = SCHOOL_ASSESSMENT_CRITERIA.SchoolAssessmentCode
                     
                 where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0 
                 AND SCHOOL.DeleteStatus = 0 
                 AND ASSESSMENT_CRITERIA.DeleteStatus = 0 
                      ");
    foreach ($result_top->result() as $show) {
    ?>
        <div class="modal fade" id="look5<?php echo $Id = $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">การประเมินตามตัวชี้วัด</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <h6 class="fw-bold">ปีการศึกษาที่ทำกระประเมิน</h6>
                                <p>
                                    <?php echo $show->SchoolAssessmentEducationYear; ?>
                                </p>
                                <h6 class="fw-bold">ภาคเรียนที่ทำการประเมิน</h6>
                                <p>
                                    <?php $sum = $show->SchoolAssessmentSemester; ?>
                                </p>
                                <?php
                                if ($sum == 1) {
                                    echo "<p>ภาคเรียนที่ 1</p>";
                                } elseif ($sum == 2) {
                                    echo "<p>ภาคเรียนที่ 2</p>";
                                } elseif ($sum == 0) {
                                    echo "<p>ตลอดปีการศึกษา</p>";
                                } elseif ($sum == 3) {
                                    echo "<p>ภาคเรียนฤดูร้อน</p>";
                                }
                                ?>
                                <h6 class="fw-bold">สถานศึกษา</h6>
                                <p>
                                    <?php echo $show->SchoolNameThai; ?>
                                </p>

                            </div>
                            <div class="col">
                                <h6 class="fw-bold">ชื่อผู้ประเมิน</h6>
                                <p>
                                    <?php echo $show->AssessmentorName; ?>
                                </p>
                                <h6 class="fw-bold">คะแนน</h6>
                                <p>
                                    <?php echo $show->SchoolAssessmentScore; ?>
                                </p>
                                <h6 class="fw-bold">ผลการประเมิน</h6>
                                <p>
                                    <?php echo $show->EVALUATION_NAME; ?>
                                </p>


                            </div>
                            <div class="col">
                                <h6 class="fw-bold">ลิงก์เอกสารแนบรายละเอียดการประเมิน</h6>
                                <p><a href="<?php echo base_url('assets/EII/SCHOOL_ASSESSMENT_CRITERIA/') ?>/<?php echo $show->SchoolAssessmentAttachmentURL; ?>" target="_blank"><i class="bi bi-file-earmark-text-fill"></i>เอกสารการประเมิน</i></a></p>



                            </div>
                        </div>
                        <!-- <a href="<?php echo site_url('sc_ass_res_forms_p7?page=sh7') ?>&&year=<?php echo $show_top->SchoolAssessmentEducationYear; ?>&&summer=<?php echo $show_top->SchoolAssessmentSemester; ?>&&SchoolID=<?php echo $show_top->SchoolID; ?>&&CriteriaID=<?php echo $show_top->Id; ?>"
                    class="my-link fw-bold">>>เพิ่มอเกณฑ์การประเมินโรงเรียน>>
                </a> -->
                        <table class="table table-borderless">
                            <tr>
                                <th>ตัวชี้วัด</th>

                            </tr>
                            <tr>
                                <td>
                                    <a class="my-link" href="<?php echo site_url('sc_ass_res_forms_p7?page=sh7') ?>&&summer=<?php echo $SchoolAssessmentSemester; ?>&&SchoolID=<?php echo $SchoolID; ?>&&CriteriaID=<?php echo $CriteriaID; ?>&&year=<?php echo $SchoolAssessmentEducationYear; ?>">>>เพิ่มลำดับองค์ประกอบและลำดับตัวชี้วัด>></a>

                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="col-1">ตัวชี้วัด</td>
                                            <td class="col-2">ลำดับองค์ประกอบตัวชี้วัด</td>
                                            <td class="col-1">ลำดับของระดับตัวชี้วัดที่ได้</td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <p>
                                                    <?php echo $show->CriteriaID; ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <!-- ลำดับองค์ประกอบตัวชี้วัด -->
                                                    <?php
                                                    $SchoolAssessmentEducationYear = $show->SchoolAssessmentEducationYear;
                                                    $SchoolAssessmentSemester = $show->SchoolAssessmentSemester;
                                                    $SchoolID = $show->SchoolID;
                                                    $CriteriaID = $show->Id;
                                                    $resultR = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                        INNER JOIN ASSESSMENT_CRITERIA_COMPOSITION
                                        ON SCHOOL_ASSESSMENT_RESULT.CompositionIndex =ASSESSMENT_CRITERIA_COMPOSITION.CompositionIndex
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID =ASSESSMENT_CRITERIA_COMPOSITION.CriteriaID
                                        
                                        where SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        AND SCHOOL_ASSESSMENT_RESULT.DeleteStatus = 0
                                        AND SCHOOL_ASSESSMENT_RESULT.SchoolAssessmentEducationYear = $SchoolAssessmentEducationYear
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        ORDER BY SCHOOL_ASSESSMENT_RESULT.CompositionIndex ASC;
                                        ");
                                                    foreach ($resultR->result() as $showR) {
                                                    ?>
                                                        <a href="<?php echo site_url('sc_ass_res_forms_p7?page=sh77') ?>&&key=<?php echo $showR->Id_sar; ?>&&year=<?php echo $showR->SchoolAssessmentEducationYear; ?>&&summer=<?php echo $showR->SchoolAssessmentSemester; ?>&&SchoolID=<?php echo $showR->SchoolID; ?>&&CriteriaID=<?php echo $show_top->Id; ?>" class="my-link">
                                                            <?php echo $showR->CompositionIndex; ?>.
                                                            <?php echo $showR->CompositionName; ?><br>
                                                        </a>
                                                    <?php } ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <!-- ลำดับของระดับตัวชี้วัดที่ได้ -->
                                                    <?php
                                                    $resultR = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                       INNER JOIN ASSESSMENT_CRITERIA_LEVEL
                                        ON SCHOOL_ASSESSMENT_RESULT.LevelIndex =ASSESSMENT_CRITERIA_LEVEL.LevelIndex
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID =ASSESSMENT_CRITERIA_LEVEL.CriteriaID
                                        where SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        AND SCHOOL_ASSESSMENT_RESULT.SchoolAssessmentEducationYear = $SchoolAssessmentEducationYear
                                        AND SCHOOL_ASSESSMENT_RESULT.DeleteStatus = 0
                                        AND SCHOOL_ASSESSMENT_RESULT.CriteriaID = $CriteriaID
                                        ORDER BY SCHOOL_ASSESSMENT_RESULT.LevelIndex ASC;
                                        ");
                                                    foreach ($resultR->result() as $showR) {
                                                    ?>
                                                        <a href="<?php echo site_url('sc_ass_res_forms_p7?page=sh77') ?>&&key=<?php echo $showR->Id_sar; ?>&&year=<?php echo $showR->SchoolAssessmentEducationYear; ?>&&summer=<?php echo $showR->SchoolAssessmentSemester; ?>&&SchoolID=<?php echo $showR->SchoolID; ?>&&CriteriaID=<?php echo $show_top->Id; ?>" class="my-link">
                                                            <?php echo $showR->LevelIndex; ?>.<?php echo $showR->LevelName; ?><br>
                                                        </a>
                                                    <?php } ?>
                                                </p>
                                            </td>


                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>


                    </div>
                    <div class="modal-footer">
                        <!-- <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } ?>


<?php if ($page == 'sh8') { ?>


    <?php
    $result = $this->db->query('SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                      INNER JOIN SCHOOL
                      ON ACHIEVEMENT_ASSESSMENT.SchoolID = SCHOOL.SchoolID 
                      ');
    foreach ($result->result() as $show) {
    ?>
        <div class="modal fade" id="look8<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ผลการประเมินสถานศึกษา</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="fw-bold">ปีการศึกษาที่ทำการประเมิน</h6>
                                <p>
                                    <?php echo $show->AchievementAssessmentYear; ?>
                                </p>

                                <h6 class="fw-bold">สถานศึกษา</h6>
                                <p>
                                    <?php echo $show->SchoolNameThai; ?>
                                </p>

                                <h6 class="fw-bold">ชื่อการประเมิน</h6>
                                <p>
                                    <?php echo $show->SchoolAssessmentName; ?>
                                </p>

                            </div>
                            <div class="col">
                                <h6 class="fw-bold">คำอธิบายการประเมิน</h6>
                                <p>
                                    <?php echo $show->SchoolAssessmentDescription; ?>
                                </p>
                                <h6 class="fw-bold">ชื่อผู้ประเมิน</h6>
                                <p>
                                    <?php echo $show->AssessmentorName; ?>
                                </p>
                                <h6 class="fw-bold">ผลการประเมินผลสัมฤทธิ์การศึกษา</h6>
                                <p>
                                    <?php if ($show->AchievementAssessmentPassingFlag == 0) { ?>
                                        ไม่ผ่าน
                                    <?php } elseif ($show->AchievementAssessmentPassingFlag == 1) { ?>
                                        ผ่าน
                                    <?php } ?>
                                </p>
                                <h6 class="fw-bold">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</h6>
                                <p>
                                    <th scope="row " style="text-align: center;">
                                        <a href="<?php echo base_url('assets/EII/ACHIEVEMENT_ASSESSMENT/') ?>/<?php echo $show->AchievementAssessmentAttachmentURL; ?>" target="_blank"><i class="bi bi-file-earmark-text-fill"></i>รายละเอียดเอกสาร</i></a>

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

    <?php } ?>

<?php } ?>