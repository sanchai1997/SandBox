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
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้</h1>
            <?php break;
                case 'sh2':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h1>
            <?php
                
                    break;
                default:
                ?> <h1>ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h1>
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
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">เทคโนโลยีและสื่อการเรียนรู้</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p2?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้
                </a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_lear_tech_media') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">หน้าหลัก
                </a>

            </div>

        </div>
    </div>

    </div><!-- End Page Title -->


    <?php if ($page=='') {
   ?>

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
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ชื่อเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->EducationYear; ?></th>
                            <th scope="row"><?php echo $show->Semester; ?></th>
                            <td style="text-align: center;"><?php echo $show->MediaTypeCode; ?>
                            <th scope="row " style="text-align: center;"><?php echo $show->MediaName; ?></th>
                            <th scope="row " style="text-align: center;"><?php echo $show->CreatorPersonalID; ?></th>

                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?php echo $show->MediaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

    <?php
} ?>
    <?php if ($page=='sh1') {
   ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTM_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้
                            </a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ชื่อเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">รหัสระดับการศึกษาที่นำไปใช้</th>
                            <th style="text-align: center;" scope="col">ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">บทคัดย่อ</th>
                            <th style="text-align: center;" scope="col">คำค้นห้า</th>
                            <th style="text-align: center;" scope="col">ลิงก์เอกสารแนบ</th>
                            <th style="text-align: center;" scope="col">แหล่งที่มา</th>
                            <th style="text-align: center;" scope="col">วันที่เผยแพร่</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->MediaID; ?></th>
                            <th scope="row"><?php echo $show->EducationYear; ?></th>
                            <td style="text-align: center;"><?php echo $show->Semester; ?>
                            <td style="text-align: center;"><?php echo $show->MediaName; ?>
                            <th scope="row"><?php echo $show->MediaTypeCode; ?></th>
                            <td style="text-align: center;"><?php echo $show->TargetEducationLevelCode; ?>
                            <td style="text-align: center;"><?php echo $show->MediaBenefit; ?>
                            <th scope="row"><?php echo $show->Abstract; ?></th>
                            <td style="text-align: center;"><?php echo $show->SearchKeyword; ?>
 
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->AttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                            <th scope="row " style="text-align: center;"><?php echo $show->Source; ?></th>
                            <th scope="row"><?php echo $show->PublishDate; ?></th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_LTM<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTM<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_LTM<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->MediaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('LTM_del_p1'); ?>">
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

    <?php
} ?>
    <?php if ($page=='sh2') {
   ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTMC_forms_p2?page=sh2') ?>"
                                class="btn btn-success">เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้
                            </a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทบัตรประจำตัวผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">รหัสคำนำหน้าชื่อผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">ชื่อผู้จัดทำ (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">ชื่อกลางผู้จัดทำ (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">นามสกุลผู้จัดทำ (ภาษาไทย)</th>
                            <th style="text-align: center;" scope="col">สัดส่วนการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->MediaID; ?></th>
                            <th scope="row"><?php echo $show->CreatorPersonalID; ?></th>
                            <td style="text-align: center;"><?php echo $show->CreatorPersonalIDTypeCode; ?>
                            <td style="text-align: center;"><?php echo $show->CreatorPrefixCode; ?>
                            <th scope="row"><?php echo $show->CreatorNameThai; ?></th>
                            <td style="text-align: center;"><?php echo $show->CreatorMiddleNameThai; ?>
                            <td style="text-align: center;"><?php echo $show->CreatorLastNameThai; ?>
                            <th scope="row " style="text-align: center;"><?php echo $show->ParticipantRatio; ?></th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_LTMC<?php echo $show->id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTMC<?php echo $show->id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_LTMC<?php echo $show->id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->id; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('LTMC_del_p2'); ?>">
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

    <?php
} ?>



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
    <!-- edit_LTM -->
    <div class="modal fade" id="edit_LTM<?php echo $show->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">sh2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('LTM_edit_p1'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID" value="<?php echo $show->MediaID ?>">
                                <label for="floatingName"><?php echo nbs(2); ?>
                                    รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $show->id ?>">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา"
                                        name="EducationYear" value="<?php echo $show->EducationYear ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                        name="Semester" value="<?php echo $show->Semester ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียน </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="ชื่อเทคโนโลยีและสื่อการเรียนรู้" name="MediaName" value="<?php echo $show->MediaName ?>">
                                <label for="floatingName"><?php echo nbs(2); ?> ชื่อเทคโนโลยีและสื่อการเรียนรู้ </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="MediaTypeCode">
                                        <option value="<?php echo $show->MediaTypeCode ?>"><?php echo $show->MediaTypeCode ?>||เดิม</option>
                                        <option value="01">สื่อประเภทวัสดุ</option>
                                        <option value="02">สื่อประเภทอุปกรณ์</option>
                                    </select>
                                    <label
                                        for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="TargetEducationLevelCode"
                                        require>
                                        <option value="<?php echo $show->TargetEducationLevelCode ?>"><?php echo $show->TargetEducationLevelCode ?>||เดิม</option>
                                        <option value="00">เตรียมอนุบาล</option>
                                        <option value="10">ก่อนประถมศึกษา </option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้" name="MediaBenefit" value="<?php echo $show->MediaBenefit ?>">
                                <label for="floatingName"><?php echo nbs(2); ?> ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px" name="Abstract"><?php echo $show->Abstract ?></textarea>
                                <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="คำค้นห้า"
                                        name="SearchKeyword" value="<?php echo $show->SearchKeyword ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> คำค้นห้า </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL"
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="แหล่งที่มา"
                                        name="Source" value="<?php echo $show->Source ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> แหล่งที่มา </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate" value="<?php echo $show->PublishDate ?>">
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
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
    <!-- edit_BP -->
    <div class="modal fade" id="edit_LTMC<?php echo $show->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">sh2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('LTMC_edit_p2'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID">
                                <label for="floatingName"><?php echo nbs(2); ?>
                                    รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $show->id ?>">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="CreatorPersonalID"
                                    value="<?php echo $show->CreatorPersonalID ?>">
                                <label for="floatingName"><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                        <option value="<?php echo $show->CreatorPersonalIDTypeCode ?>">
                                            <?php echo $show->CreatorPersonalIDTypeCode ?>||เดิม</option>
                                        <option value="I">บัตรประจำตัวประชาชน</option>
                                        <option value="O">บัตรอื่นๆ</option>
                                        <option value="N">ไม่มีบัตรอะไรเลย</option>

                                    </select>
                                    <label
                                        for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPrefixCode">
                                        <option value="<?php echo $show->CreatorPrefixCode ?>">
                                            <?php echo $show->CreatorPrefixCode ?>|| เดิม</option>
                                        <option value="003">นาย</option>
                                        <option value="004">นางสาว</option>
                                        <option value="005">นาง</option>

                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai"
                                        value="<?php echo $show->CreatorNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish"
                                        value="<?php echo $show->CreatorNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ) </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai"
                                        value="<?php echo $show->CreatorMiddleNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish"
                                        value="<?php echo $show->CreatorMiddleNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai"
                                        value="<?php echo $show->CreatorLastNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish"
                                        value="<?php echo $show->CreatorLastNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ) </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="สัดส่วนการมีส่วนร่วม" name="ParticipantRatio"
                                    value="<?php echo $show->ParticipantRatio ?>">
                                <label for="floatingName"><?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>