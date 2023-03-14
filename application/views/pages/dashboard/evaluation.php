<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
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
            ) { case 'sh1': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
            <?php break;case 'sh2': ?> <h1>ข้อมูลระดับตัวชี้วัด</h1>
            <?php break;case 'sh3': ?> <h1>ข้อมูลองค์ประกอบตัวชี้วัด</h1>
            <?php break;case 'sh4': ?> <h1>ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h1>
            <?php break;case 'sh5': ?> <h1>ข้อมูลการประเมินผลสถานศึกษา</h1>
            <?php break;case 'sh6': ?> <h1>ข้อมูลการประเมินตามตัวชี้วัด</h1>
            <?php break;case 'sh7': ?> <h1>ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
            <?php break;case 'sh8': ?> <h1>ข้อมูลการประเมินสถานศึกษา</h1>
            <?php break;default: ?><h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่นวัตกรรมการศึกษา</h1>
            <?php break;} ?>

            <div class="col-3">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">การประกันคุณภาพด้วยตัวชี้วัด</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p1?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p2?page=sh2'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลระดับตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p3?page=sh3'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลองค์ประกอบตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p4?page=sh4'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p5?page=sh5'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินผลสถานศึกษา
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p6?page=sh6'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินตามตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p7?page=sh7'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation_das_p8?page=sh8'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินสถานศึกษา
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation'
                ); ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">หน้าหลัก
                </a>
            </div>
        </div>
    </div>

    </div><!-- End Page Title -->
    <?php if ($page == '' ) { ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่นวัตกรรมการศึกษา</span></h5>
                    </div>

                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">ชื่อเกณฑ์</th>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->SchoolAssessmentEducationYear; ?></th>
                            <th scope="row"><?php echo $show->CriteriaName; ?></th>
                            <td style="text-align: center;"><?php echo $show->CriteriaID; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolID; ?>

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#Modal<?php echo $show->CommitteeAppointmentNumber; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

                        </tr>
                        <?php  } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if ( $page == 'sh1') { ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_forms_p1?page=sh1'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ชื่อเกณฑ์</th>
                            <th style="text-align: center;" scope="col">คำอธิบายเกณฑ์</th>
                            <th style="text-align: center;" scope="col">จำนวนระดับของตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->CriteriaID; ?></th>
                            <th scope="row"><?php echo $show->CriteriaName; ?></th>
                            <td style="text-align: center;"><?php echo $show->CriteriaDescription; ?>
                            <td style="text-align: center;"><?php echo $show->CriteriaLevelAmount; ?>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_ass_ria<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_ass_ria<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria<?php echo $show->id; ?>" tabindex="-1"
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
                                                    action="<?php echo site_url('ass_ria_del_p1'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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

    </div><!-- End Page Title -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh2') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| ข้อมูลระดับตัวชี้วัด</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_lvl_forms_p2?page=sh2'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลระดับตัวชี้วัด</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับของระดับตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">หัวข้อระดับตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">คะแนนระดับตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->CriteriaID; ?></th>
                            <th scope="row"><?php echo $show->LevelIndex; ?></th>
                            <td style="text-align: center;"><?php echo $show->LevelName; ?>
                            <td style="text-align: center;"><?php echo $show->LevelScore; ?>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_ass_ria_lvl<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_ass_ria_lvl<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria_lvl<?php echo $show->id; ?>" tabindex="-1"
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
                                                    action="<?php echo site_url('ass_ria_lvl_del_p2'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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
    <!-- ข้อมูลองค์ประกอบตัวชี้วัด -->

    </div><!-- End Page Title -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($page == 'sh3') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| องค์ประกอบตัวชี้วัด</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_com_forms_p3?page=sh3'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลข้อมูลองค์ประกอบตัวชี้วัด</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ลำดับองค์ประกอบตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">หัวข้อองค์ประกอบตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ค่าน้ำหนักการประเมินองค์ประกอบตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                            </th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>


                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->CriteriaID; ?></th>
                            <th scope="row"><?php echo $show->CompositionIndex; ?></th>
                            <td style="text-align: center;"><?php echo $show->CompositionName; ?>
                            <td style="text-align: center;"><?php echo $show->CompositionWeightScore; ?>
                            <td style="text-align: center;"><?php echo $show->CompositionGuideline; ?>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_ass_ria_com<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_ass_ria_com<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria_com<?php echo $show->id; ?>" tabindex="-1"
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
                                                    action="<?php echo site_url('ass_ria_com_del_p3'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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
    if ($page == 'sh4') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| คำอธิบายระดับของแต่ละองค์ประกอบ</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'ass_ria_com_lvl_forms_p4?page=sh4'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลองค์ประกอบตัวชี้วัดพื้นที่</a></h5>
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



                        <?php foreach ($query as $show) { ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->CriteriaID; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show->CompositionIndex; ?></th>
                            <td style="text-align: center;"><?php echo $show->LevelIndex; ?></td>
                            <td style="text-align: center;"><?php echo $show->CompositionLevelDescription; ?></td>


                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_ass_ria_com_lvl<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_ass_ria_com_lvl<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_ass_ria_com_lvl<?php echo $show->id; ?>" tabindex="-1"
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
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| การประเมินผลสถานศึกษา</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_forms_p5?page=sh5'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลการประเมินสถานศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">ภาคเรียนที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">ชื่อการประเมิน</th>
                            <th style="text-align: center;" scope="col">คำอธิบายการประเมิน</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->SchoolAssessmentEducationYear; ?></th>
                            <th scope="row"><?php echo $show->SchoolAssessmentSemester; ?></th>
                            <td style="text-align: center;"><?php echo $show->SchoolID; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentName; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentDescription; ?>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_sc_ass<?php echo $show->ID; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass<?php echo $show->ID; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass<?php echo $show->ID; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->SchoolAssessmentEducationYear; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('sc_ass_del_p5'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show->ID; ?>">
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| การประเมินตามตัวชี้วัด</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_ria_forms_p6?page=sh6'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลผลการประเมินตามตัวชี้วัด</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">ภาคเรียนที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center;" scope="col">ชื่อผู้ประเมิน</th>
                            <th style="text-align: center;" scope="col">คะแนน</th>
                            <th style="text-align: center;" scope="col">รหัสผลการประเมิน</th>
                            <th style="text-align: center;" scope="col">ลิงก์เอกสารแนบรายละเอียดการประเมิน</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>



                        <?php foreach ($query as $s) { ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $s->SchoolAssessmentEducationYear; ?></th>
                            <th scope="row " style="text-align: center;"><?php echo $s->SchoolAssessmentSemester; ?>
                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $s->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $s->CriteriaID; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $s->AssessmentorName; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $s->SchoolAssessmentScore; ?></th>
                            <td style="text-align: center;"><?php echo $s->SchoolAssessmentCode; ?></td>
                            <th scope="row " style="text-align: center;">
                                <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $s->SchoolAssessmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $s->SchoolAssessmentEducationYear; ?>
                            </th>



                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_sc_ass_ria<?php echo $s->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass_ria<?php echo $s->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass_ria<?php echo $s->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $s->CriteriaID; ?>
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
                                                    <input type="hidden" name="id" value="<?php echo $s->id; ?>">
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'sc_ass_res_forms_p7?page=sh7'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</a></h5>
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



                        <?php foreach ($query as $show) { ?>
                        <tr>

                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentEducationYear; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $show->SchoolAssessmentSemester; ?>
                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $show->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $show->CriteriaID; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $show->CompositionIndex; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show->LevelIndex; ?></th>



                            <<td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_sc_ass_res<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_sc_ass_res<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_sc_ass_res<?php echo $show->id; ?>" tabindex="-1"
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
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| การประเมินสถานศึกษา</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'achie_ass_forms_p8?page=sh8'
                            ); ?>" class="btn btn-success">เพิ่มข้อมูลการประเมินสถานศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">ปีการศึกษาที่ทำการประเมิน</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">ชื่อการประเมิน</th>
                            <th style="text-align: center;" scope="col">คำอธิบายการประเมิน</th>
                            <th style="text-align: center;" scope="col">ชื่อผู้ประเมิน</th>
                            <th style="text-align: center;" scope="col">ผลการประเมินผลสัมฤทธิ์การศึกษา</th>
                            <th style="text-align: center;" scope="col">
                                ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>


                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->AchievementAssessmentYear; ?></th>
                            <th scope="row"><?php echo $show->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentName; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentDescription; ?>
                            <th scope="row"><?php echo $show->AssessmentorName; ?></th>
                            <td style="text-align: center;"><?php echo $show->AchievementAssessmentPassingFlag; ?>
<th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->AchievementAssessmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_achie_ass<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_achie_ass<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_achie_ass<?php echo $show->id; ?>" tabindex="-1"
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
                                                    <input type="hidden" name="id" value="<?php echo $show->id; ?>">
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
<?php 
if ($page == 'sh1') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_ass_ria -->
    <div class="modal fade" id="edit_ass_ria<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                    'ass_ria_edit_p1'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h5>
                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $show->id ?>">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ชื่อเกณฑ์" name="CriteriaName" value="<?php echo $show->CriteriaName ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> ชื่อเกณฑ์ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="CriteriaDescription"><?php echo $show->CriteriaDescription ?></textarea>
                                            <label for="floatingTextarea2"><?php echo nbs(2); ?>คำฮธิบายเกณฑ์ </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaLevelAmount" value="<?php echo $show->CriteriaLevelAmount ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> จำนวนระดับของตัวชี้วัด</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaCompositionAmount" value="<?php echo $show->CriteriaCompositionAmount ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> จำนวนองค์ประกอบของตัวชี้วัด</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด"
                                                name="CriteriaPassingScorePercentage" value="<?php echo $show->CriteriaPassingScorePercentage ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คะแนนการผ่านเกณฑ์(%)</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button name="Submit" type="submit"
                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form><!-- end Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh2') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_ass_ria_lvl -->
    <div class="modal fade" id="edit_ass_ria_lvl<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                    'ass_ria_lvl_edit_p2'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลระดับตัวชี้วัด</h5>
<input type="hidden" name="id" value="<?php echo $show->id ?>">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex" value="<?php echo $show->LevelIndex ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อระดับตัวชี้วัด" name="LevelName" value="<?php echo $show->LevelName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore" value="<?php echo $show->LevelScore ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                    </div>
                                </form><!-- end Form ข้อมูลระดับตัวชี้วัด -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh3') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_ass_ria_com -->
    <div class="modal fade" id="edit_ass_ria_com<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                        'ass_ria_com_edit_p3'
                                    ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h5>

<input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex" value="<?php echo $show->CompositionIndex ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="หัวข้อองค์ประกอบตัวชี้วัด" name="CompositionName" value="<?php echo $show->CompositionName ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> หัวข้อองค์ประกอบตัวชี้วัด </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ค่าน้ำหนักการประเมินตัวชี้วัด"
                                                name="CompositionWeightScore" value="<?php echo $show->CompositionWeightScore ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ค่าน้ำหนักการประเมินตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด"
                                                name="CompositionGuideline" value="<?php echo $show->CompositionGuideline ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                    </div>
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh4') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_ass_ria_com_lvl -->
    <div class="modal fade" id="edit_ass_ria_com_lvl<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                        'ass_ria_com_lvl_edit_p4'
                                    ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h5>
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex" value="<?php echo $show->CompositionIndex ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex" value="<?php echo $show->LevelIndex ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ลำดับของระดับตัวชี้วัด </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คำอธิบายระดับของแต่ละองค์ประกอบ"
                                                name="CompositionLevelDescription" value="<?php echo $show->CompositionLevelDescription ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                    </div>
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh5') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_sc_ass -->
    <div class="modal fade" id="edit_sc_ass<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                    'sc_ass_edit_p5'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินผลสถานศึกษา</h5>
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำกระประเมิน"
                                                    name="SchoolAssessmentEducationYear" value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ปีการศึกษาที่ทำกระประเมิน </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน"
                                                    name="SchoolAssessmentSemester" value="<?php echo $show->SchoolAssessmentSemester ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ภาคเรียนที่ทำการประเมิน </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสสถานศึกษา" name="SchoolID" value="<?php echo $show->SchoolID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> รหัสสถานศึกษา </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName" value="<?php echo $show->SchoolAssessmentName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="SchoolAssessmentDescription"><?php echo $show->SchoolAssessmentDescription ?></textarea>
                                            <label
                                                for="floatingTextarea2"><?php echo nbs(2); ?>คำอธิบายการประเมิน</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                    </div>
                                </form><!-- end Form ข้อมูลผลการประเมินโรงเรียน -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh6') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_sc_ass_ria -->
    <div class="modal fade" id="edit_sc_ass_ria<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                                    'sc_ass_ria_edit_p6'
                                ); ?>" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินตามตัวชี้วัด</h5>
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear" value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?>
                                                ปีการศึกษาที่ทำการประเมิน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน"
                                                    name="SchoolAssessmentSemester" value="<?php echo $show->SchoolAssessmentSemester ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ภาคเรียนที่ทำการประเมิน
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสสถานศึกษา" name="SchoolID" value="<?php echo $show->SchoolID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> รหัสสถานศึกษา </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName" value="<?php echo $show->AssessmentorName ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนน" name="SchoolAssessmentScore" value="<?php echo $show->SchoolAssessmentScore ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">
                                                <option   value="<?php echo $show->SchoolAssessmentCode ?>"><?php echo $show->SchoolAssessmentCode ?></option>
                                              
                                                <option value="1">ต้องปรับปรุง</option>
                                                <option value="2">พอใช้</option>
                                                <option value="3">ดี</option>
                                                <option value="4">ดีมาก</option>
                                                <option value="5">ดีเด่น</option>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                2
                                            ); ?>ผลการประเมิน</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมิน</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="SchoolAssessmentAttachmentURL">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh7') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_sc_ass_res -->
    <div class="modal fade" id="edit_sc_ass_res<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url('sc_ass_res_edit_p7'); ?>" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title">ฟอร์มระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h5>
                                    <input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear" value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester" value="<?php echo $show->SchoolAssessmentSemester ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียนที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสสถานศึกษา" name="SchoolID" value="<?php echo $show->SchoolID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> รหัสสถานศึกษา </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex" value="<?php echo $show->CompositionIndex ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ลำดับองค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับของระดับตัวชี้วัดที่ได้" name="LevelIndex" value="<?php echo $show->LevelIndex ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัดที่ได้
                                            </label>
                                        </div>
                                    </div>
                                <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
<?php 
if ($page == 'sh8') { 
foreach ($query as $show) {
    # code...
    ?>
<tr>
    <!-- edit_achie_ass -->
    <div class="modal fade" id="edit_achie_ass<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url('achie_ass_edit_p8'); ?>" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินสถานศึกษา</h5>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="AchievementAssessmentYear" value="<?php echo $show->AchievementAssessmentYear ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสสถานศึกษา" name="SchoolID" value="<?php echo $show->SchoolID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> รหัสสถานศึกษา </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ชื่อการประเมิน" name="SchoolAssessmentName" value="<?php echo $show->SchoolAssessmentName ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ชื่อการประเมิน </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription" value="<?php echo $show->SchoolAssessmentDescription ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คำอธิบายการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName" value="<?php echo $show->AssessmentorName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">ผลการประเมินผลสัมฤทธิ์การศึกษา
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="AchievementAssessmentPassingFlag"
                                                    id="gridRadios1" value="0">
                                                <label class="form-check-label" for="gridRadios1">
                                                    ไม่ผ่าน
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="AchievementAssessmentPassingFlag"
                                                    id="gridRadios2" value="1">
                                                <label class="form-check-label" for="gridRadios2">
                                                    ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="AchievementAssessmentAttachmentURL">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button name="Submit" type="submit"
                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>