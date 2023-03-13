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
            ) { case 'sh1': ?> <h1>ฟอร์มการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
            <?php break;case 'sh2': ?> <h1>ฟอร์มข้อมูลระดับตัวชี้วัด</h1>
            <?php break;case 'sh3': ?> <h1>ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h1>
            <?php break;case 'sh4': ?> <h1>ฟอร์มข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h1>
            <?php break;case 'sh5': ?> <h1>ฟอร์มข้อมูลการประเมินผลสถานศึกษา</h1>
            <?php break;case 'sh6': ?> <h1>ฟอร์มข้อมูลการประเมินตามตัวชี้วัด</h1>
            <?php break;case 'sh7': ?> <h1>ฟอร์มระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
            <?php break;case 'sh8': ?> <h1>ฟอร์มข้อมูลการประเมินสถานศึกษา</h1>
            <?php break;default: ?><h1>การประกันคุณภาพด้วยตัวชี้สัดของพื้นที่นวัตกรรมการศึกษา</h1>
            <?php break;} ?>

            <div class="col-3">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh1?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh2?page=sh2'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลระดับตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh3?page=sh3'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลองค์ประกอบตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh4?page=sh4'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh5?page=sh5'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินผลสถานศึกษา
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh6?page=sh6'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินตามตัวชี้วัด
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh7?page=sh7'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation/sh8?page=sh8'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลการประเมินสถานศึกษา
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_evaluation'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">หน้าหลัก
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                        'Fm_evaluation/forms?page='
                    ); ?>" class="btn btn-success">เพิ่มข้อมูลการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</a></h5>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page='
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
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

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?php echo $show->CriteriaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh2'
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
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

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?php echo $show->CriteriaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh3'
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
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

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?php echo $show->CriteriaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh4'
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>



                        <?php foreach ($query as $s) { ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $s->CriteriaID; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $s->CompositionIndex; ?></th>
                            <td style="text-align: center;"><?php echo $s->LevelIndex; ?></td>
                            <td style="text-align: center;"><?php echo $s->CompositionLevelDescription; ?></td>


                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?php echo $s->CriteriaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh5'
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
                            <th scope="row"><?php echo $show->SchoolAssessmentSemester; ?></th>
                            <td style="text-align: center;"><?php echo $show->SchoolID; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentName; ?>
                            <td style="text-align: center;"><?php echo $show->SchoolAssessmentDescription; ?>

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#Modal<?php echo $show->SchoolAssessmentEducationYear; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh6'
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
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
                                <?php echo $s->SchoolAssessmentAttachmentURL; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $s->SchoolAssessmentEducationYear; ?>
                            </th>



                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh7'
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
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>



                        <?php foreach ($query as $s) { ?>
                        <tr>

                            <td style="text-align: center;"><?php echo $s->SchoolAssessmentEducationYear; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $s->SchoolAssessmentSemester; ?>
                            </th>
                            <th scope="row" style="text-align: center;"><?php echo $s->SchoolID; ?></th>
                            <td style="text-align: center;"><?php echo $s->CriteriaID; ?></td>
                            <th scope="row " style="text-align: center;"><?php echo $s->CompositionIndex; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $s->LevelIndex; ?></th>



                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal"><i
                                        class="bi bi-card-list"></i></button></td>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                'Fm_evaluation/forms?page=sh8'
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
                            <td style="text-align: center;"><?php echo $show->AchievementAssessmentAttachmentURL; ?>

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
    <?php }
    ?>
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->