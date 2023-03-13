<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
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
    <?php  } ?>
    <div class="pagetitle">
        <div class="row ">

            <?php switch (
                $page
            ) { case 'sh1': ?> <h1>ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</h1>
            <?php break;case 'sh2': ?> <h1>ข้อมูลรายชื่อคณะกรรมการ</h1>
            <?php break;default: ?><h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่างๆ</h1>
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
                    'Fm_committee/committee?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_committee/member?page=sh2'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลรายชื่อคณะกรรมการ</a>
                    <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_committee'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">หน้าหลัก</a>
            </div>
        </div>
    </div>

    </div><!-- End Page Title -->
    <?php if ($page == '') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                       
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสจังหวัด</th>
                            <th style="text-align: center;" scope="col">ปีที่ออกคำสั่ง</th>
                            <th style="text-align: center;" scope="col">เลขที่คำสั่ง</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) { ?>
                        <tr>

                            <th scope="row" style="text-align: center;"><?php echo $show->CommitteeProvinceCode; ?></th>
                            <td style="text-align: center;"><?php echo $show->CommitteeYear; ?>
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentNumber; ?>

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#Modal<?php echo $show->CommitteeAppointmentNumber; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if ($page == 'sh1') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                    'Fm_committee/form_page?page=sh1'
                                ); ?>" class="btn btn-success">เพิ่มข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</a>
                        </h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสจังหวัด</th>
                            <th style="text-align: center;" scope="col">ปีที่ออกคำสั่ง</th>
                            <th style="text-align: center;" scope="col">เลขที่คำสั่ง</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทการแต่งตั้ง</th>
                            <th style="text-align: center;" scope="col">ลิง์เอกสารคำสั่ง</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) { ?>

                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->CommitteeProvinceCode; ?>
                            </th>
                            <th scope="row"><?php echo $show->CommitteeYear; ?></th>
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentNumber; ?>
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentTypeCode; ?>
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentAttachmentURL; ?>



                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
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
                                    'Fm_committee/form_page?page=sh2'
                                ); ?>" class="btn btn-success">เพิ่มข้อมูลรายชื่อคณะกรรมการ</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสจังหวัด</th>
                            <th style="text-align: center;" scope="col">ปีที่ออกคำสั่ง</th>
                            <th style="text-align: center;" scope="col">เลขที่คำสั่ง</th>
                            <th style="text-align: center;" scope="col">คำนำหน้าชื่อ</th>
                            <th style="text-align: center;" scope="col">ชื่อ (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">ชื่อ (ภาษาอังกฤษ)</th>
                            <th style="text-align: center;" scope="col">ชื่อกลาง (ภาษาอังกฤษ)</th>
                            <th style="text-align: center;" scope="col">ชื่อกลาง (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">นามสกุล (ภาษาอังกฤษ)</th>
                            <th style="text-align: center;" scope="col">นามสกุล (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">ตำแหน่ง (กรรมการ)</th>
                            <th style="text-align: center;" scope="col">เริ่มวาระการดำรงตำแหน่ง</th>
                            <th style="text-align: center;" scope="col">สิ้นสุดวาระการดำรงตำแหน่ง</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show_member) { ?>
                        <tr>
                        <th scope="row"><?php echo $show_member->CommitteeProvinceCode; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeYear; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeAppointmentNumber; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberPrefixCode; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberNameThai; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberNameEnglish; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberMiddleNameThai; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberMiddleNameEnglish; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberLastNameThai; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberLastNameEnglish; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberPositionCode; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberTermStartDate; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberTermEndDate; ?></th>

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
    </script>
</main><!-- End #main -->