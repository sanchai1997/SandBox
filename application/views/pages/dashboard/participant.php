<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
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
    <?php  } ?>
    <div class="pagetitle">
        <div class="row ">

            <?php switch ($page) {
                case 'sh1':
            ?> <h1>ผู้เข้ามามีส่วนร่วม</h1>
            <?php break;
                case 'sh2':
                ?> <h1>การติดต่อของผู้มีส่วนร่วม</h1>
            <?php
                    break;
                case 'sh3':
                ?> <h1>การมีส่วนร่วม</h1>
            <?php
                    break;
                case 'sh4':
                ?> <h1>ข้อมูลบันทึกเพิ่มเติม</h1>
            <?php
                    break;
                default:
                ?>
           <h1>ผู้เข้ามามีส่วนร่วม</h1>
            <?php
                    break;
            }  ?>


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
                <a href="<?php echo site_url('Fm_participant/sh1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ผู้เข้ามามีส่วนร่วม</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_participant/sh2?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">การติดต่อของผู้มีส่วนร่วม
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_participant/sh3?page=sh3') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">การมีส่วนร่วม
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_participant/sh4?page=sh4') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลบันทึกเพิ่มเติม
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_participant') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">หน้าหลัก
                </a>
                


            </div>
        </div>
    </div>

    </div><!-- End Page Title -->
  

    <?php if($page==''){ ?>

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
                        <th style="text-align: center;" scope="col">
                            รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</th>
                        <th style="text-align: center;" scope="col">
                            ชื่อของผู้ติดต่อ</th>
                        <th style="text-align: center;" scope="col">กิจกรรมที่มีส่วนร่วม</th>
                        <th style="text-align: center;" scope="col">ชื่อผู้บันทึกเพิ่มเติม</th>

                    </tr>

                </thead>
                <tbody>

                    <?php foreach ($query as $show ) {
                        # code...
                    ?>
                    <tr>
                        <th scope="row " style="text-align: center;"><?php echo $show->ParticipantID; ?></th>
                        <th scope="row"><?php echo $show->ContactName; ?></th>
                        <td style="text-align: center;"><?php echo $show->CooperationActivity; ?>
                        <td style="text-align: center;"><?php echo $show->NoteReporterName; ?>

                    </tr>
                    <?php  } ?>


                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Recent Sales -->
<?php } ?>
    <?php if($page=='sh1'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('Fm_participant/forms?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูลผู้เข้ามามีส่วนร่วม</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">
                                รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</th>
                            <th style="text-align: center;" scope="col">
                                ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทผู้เข้ามามีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->ParticipantID; ?></th>
                            <th scope="row"><?php echo $show->ParticipantName; ?></th>
                            <td style="text-align: center;"><?php echo $show->ParticipantTypeCode; ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_par<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('Fm_participant/del_sh1'); ?>">
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
    <?php if( $page=='sh2'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('Fm_participant/forms?page=sh2') ?>"
                                class="btn btn-success">เพิ่มข้อมูลการติดต่อของผู้มีส่วนร่วม</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อของผูhติดต่อ</th>
                            <th style="text-align: center;" scope="col">หมายเลขโทรศัพท์ของผู้ติดต่อ</th>
                            <th style="text-align: center;" scope="col">หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</th>
                            <th style="text-align: center;" scope="col">อีเมลติดต่อ</th>
                            <th style="text-align: center;" scope="col">ตำแหน่งในองค์กรของผู้ติดต่อ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>

                        <tr>

                        </tr> <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->ContactName; ?></th>
                            <th scope="row"><?php echo $show->ContactPhone; ?></th>
                            <td style="text-align: center;"><?php echo $show->ContactMobilePhone; ?>
                            <td style="text-align: center;"><?php echo $show->ContactEmail; ?>
                            <td style="text-align: center;"><?php echo $show->ContactOrganizationPosition; ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_par_com<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_com<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_com<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('Fm_participant/del_sh2'); ?>">
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
    <?php if($page=='sh3'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('Fm_participant/forms?page=sh3') ?>"
                                class="btn btn-success">เพิ่มข้อมูลการมีส่วนร่วม</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">วันที่เริ่มการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">วันที่สิ้นสุดการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">รหัสสถานะการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">กิจกรรมที่มีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">รหัสระดับการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">ลิงก์เอกสารแนบ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->CooperationStartDate; ?></th>
                            <th scope="row"><?php echo $show->CooperationEndDate; ?></th>
                            <td style="text-align: center;"><?php echo $show->CooperationStatusCode; ?>
                            <td style="text-align: center;"><?php echo $show->CooperationActivity; ?>
                            <th scope="row " style="text-align: center;"><?php echo $show->CooperationLevelCode; ?></th>
                            <th scope="row"><?php echo $show->CooperationSchoolID; ?></th>
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->CooperationAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_par_coop<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_coop<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_coop<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('Fm_participant/del_sh3'); ?>">
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
    <?php if($page=='sh4'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('Fm_participant/forms?page=sh4') ?>"
                                class="btn btn-success">เพิ่มข้อมูลบันทึกเพิ่มเติม</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">ชื่อผู้บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">อีเมลของผู้บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->Note; ?></th>
                            <th scope="row"><?php echo $show->NoteReporterName; ?></th>
                            <td style="text-align: center;"><?php echo $show->NoteReporterPhone; ?>
                            <td style="text-align: center;"><?php echo $show->NoteReporterMobilePhone; ?>
                            <td style="text-align: center;"><?php echo $show->NoteReporterEmail; ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_par_note<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_note<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_note<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('Fm_participant/del_sh4'); ?>">
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

                        <tr>

                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>


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
    <!-- edit_BP -->
    <div class="modal fade" id="edit_par<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                            'Fm_participant/edit_sh1'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantName" value="<?php echo $show->ParticipantName ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="ParticipantTypeCode">
                                        <option value="<?php echo $show->ParticipantTypeCode ?>"><?php echo $show->ParticipantTypeCode ?>||เดิม</option>
                                        <option value="01">บุคคล</option>
                                        <option value="02">หน่วยงานรัฐ/รัฐวิสาหกิจ</option>
                                        <option value="03">บริษัทเอกชน</option>
                                        <option value="04">มูลนิธิ</option>
                                        <option value="05">สมาคม</option>
                                        <option value="06">องค์กรต่างประเทศ</option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                             <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
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
    <!-- edit_par_com -->
    <div class="modal fade" id="edit_par_com<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การติดต่อของผู้มีส่วนร่วม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                            'Fm_participant/edit_sh2'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                            
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อของผู้ติดต่อ" name="ContactName" value="<?php echo $show->ContactName ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        ชื่อของผู้ติดต่อ </label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้ติดต่อ" name="ContactPhone" value="<?php echo $show->ContactPhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้ติดต่อ </label>
                                    </div>
                                </div>
                           
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้ติดต่อ" name="ContactMobilePhone" value="<?php echo $show->ContactMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้ติดต่อ" name="ContactEmail" value="<?php echo $show->ContactEmail ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้ติดต่อ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองคnกร (ของผู้ติดต่อ)" name="ContactOrganizationPosition" value="<?php echo $show->ContactOrganizationPosition ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ตำแหน่งในองคnกร (ของผู้ติดต่อ)
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
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
    <!-- edit_par_coop -->
    <div class="modal fade" id="edit_par_coop<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การมีส่วนร่วม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                            'Fm_participant/edit_sh3'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $show->id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CooperationStartDate" value="<?php echo $show->CooperationStartDate ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>วันที่เริ่มการมีส่วนร่วม</label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CooperationEndDate" value="<?php echo $show->CooperationEndDate ?>">
                                            <label for="Share">วันที่สิ้นสุดการมีส่วนร่วม</label>
                                        </div>
                                    </div>
                               </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationStatusCode" >
                                        <option value="<?php echo $show->CooperationStatusCode ?>"><?php echo $show->CooperationStatusCode ?>||เดิม</option>
                                        <option value="01">ยังมีส่วนร่วม</option>
                                        <option value="02">สิ้นสุดการมีส่วนร่วม</option>
                                        <option value="03">ไม่มีการเข้ามามีส่วนร่วม</option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="CooperationActivity"><?php echo $show->CooperationActivity ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>กิจกรรมที่มีส่วนร่วม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationLevelCode">
                                        <option value="<?php echo $show->CooperationLevelCode ?>"><?php echo $show->CooperationLevelCode ?></option>
                                        <option value="01">ให้ข้อมูล</option>
                                        <option value="02">ให้คำปรึกษา</option>
                                        <option value="03">มีส่วนร่วมบางส่วน</option>
                                        <option value="04">ทำงานร่วมกัน</option>
                                        <option value="05">สนับสนุนงบประมาณ</option>
                                        <option value="06">สนับสนุนสื่อ/อุปกรณ์</option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา" name="CooperationSchoolID" value="<?php echo $show->CooperationSchoolID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="CooperationAttachmentURL">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
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
    <!-- edit_par_note -->
    <div class="modal fade" id="edit_par_note<?php echo $show->id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลบันทึกเพิ่มเติม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo site_url(
                            'Fm_participant/edit_sh4'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo $show->id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Note"><?php echo $show->Note ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>บันทึกเพิ่มเติม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้บันทึกเพิ่มเติม" name="NoteReporterName" value="<?php echo $show->NoteReporterName ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ชื่อผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม" name="NoteReporterPhone" value="<?php echo $show->NoteReporterPhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                              </div>
                            
                               <div  class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม"
                                            name="NoteReporterMobilePhone" value="<?php echo $show->NoteReporterMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                               </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้บันทึกเพิ่มเติม" name="NoteReporterEmail" value="<?php echo $show->NoteReporterEmail ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>
                             <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>
