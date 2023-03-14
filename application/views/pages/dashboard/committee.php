<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
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
                        <li class="breadcrumb-item active">อำนาจและหน้าที่ของคณะกรรมการ</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url(
                    'Fm_committee_das_p1?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_committee_das_p2?page=sh2'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลรายชื่อคณะกรรมการ</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url(
                    'Fm_committee'
                ); ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">หน้าหลัก</a>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| อำนาจและหน้าที่ของคณะกรรมการ</span></h5>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                    'c_forms_p1?page=sh1'
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
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
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
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->CommitteeAppointmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_committee<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_committee<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_committee<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CommitteeProvinceCode; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('c_del_p1'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show->Id; ?>">
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
    <?php } ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if ($page == 'sh2') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| รายชื่อคณะกรรมการ</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                    'cm_forms_p2?page=sh2'
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
                            <th style="text-align: center;" scope="col">ชื่อ </th>
                            <th style="text-align: center;" scope="col">ชื่อกลาง </th>
                            <th style="text-align: center;" scope="col">นามสกุล </th>
                            <th style="text-align: center;" scope="col">ตำแหน่ง (กรรมการ)</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

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
                            <th scope="row"><?php echo $show_member->CommitteeMemberMiddleNameThai; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberLastNameThai; ?></th>
                            <th scope="row"><?php echo $show_member->CommitteeMemberPositionCode; ?></th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit_comm_member<?php echo $show_member->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_comm_member<?php echo $show_member->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_comm_member<?php echo $show_member->Id; ?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show_member->CommitteeProvinceCode; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('cm_del_p2'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $show_member->Id; ?>">
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
    <div class="modal fade" id="edit_committee<?php echo $show->Id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">sh2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('c_edit_p1'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $show->Id ?>">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="CommitteeProvinceCode">

                                    <option value="<?php echo $show->CommitteeProvinceCode ?>">
                                        <?php echo $show->CommitteeProvinceCode ?>||เดิม</option>
                                    <option value="10">กรุงเทพมหานคร</option>
                                    <option value="11">สมุทรปราการ</option>
                                    <option value="12">นนทบุรี</option>
                                    <option value="13">ปทุมธานี</option>
                                    <option value="14">พระนครศรีอยุธยา</option>
                                    <option value="15">อ่างทอง</option>
                                    <option value="16">ลพบุรี</option>
                                    <option value="17">สิงห์บุรี</option>
                                    <option value="18">ชัยนาท</option>
                                    <option value="19">สระบุรี</option>
                                    <option value="20">ชลบุรี</option>
                                    <option value="21">ระยอง</option>
                                    <option value="22">จันทบุรี</option>
                                    <option value="23">ตราด</option>
                                    <option value="24">ฉะเชิงเทรา</option>
                                    <option value="25">ปราจีนบุรี</option>
                                    <option value="26">นครนายก</option>
                                    <option value="27">สระแก้ว</option>
                                    <option value="30">นครราชสีมา</option>
                                    <option value="31">บุรีรัมย์</option>
                                    <option value="32">สุรินทร์</option>
                                    <option value="33">ศรีสะเกษ</option>
                                    <option value="34">อุบลราชธานี</option>
                                    <option value="35">ยโสธร</option>
                                    <option value="36">ชัยภูมิ</option>
                                    <option value="37">อำนาจเจริญ</option>
                                    <option value="38">บึงกาฬ</option>
                                    <option value="39">หนองบัวลำภู</option>
                                    <option value="40">ขอนแก่น</option>
                                    <option value="41">อุดรธานี</option>
                                    <option value="42">เลย</option>
                                    <option value="43">หนองคาย</option>
                                    <option value="44">มหาสารคาม</option>
                                    <option value="45">ร้อยเอ็ด</option>
                                    <option value="46">กาฬสินธุ์</option>
                                    <option value="47">สกลนคร</option>
                                    <option value="48">นครพนม</option>
                                    <option value="49">มุกดาหาร</option>
                                    <option value="50">เชียงใหม่</option>
                                    <option value="51">ลำพูน</option>
                                    <option value="52">ลำปาง</option>
                                    <option value="53">อุตรดิตถ์</option>
                                    <option value="54">แพร่</option>
                                    <option value="55">น่าน</option>
                                    <option value="56">พะเยา</option>
                                    <option value="57">เชียงราย</option>
                                    <option value="58">แม่ฮ่องสอน</option>
                                    <option value="60">นครสวรรค์</option>
                                    <option value="61">อุทัยธานี</option>
                                    <option value="62">กำแพงเพชร</option>
                                    <option value="63">ตาก</option>
                                    <option value="64">สุโขทัย</option>
                                    <option value="65">พิษณุโลก</option>
                                    <option value="66">พิจิตร</option>
                                    <option value="67">เพชรบูรณ์</option>
                                    <option value="70">ราชบุรี</option>
                                    <option value="71">กาญจนบุรี</option>
                                    <option value="72">สุพรรณบุรี</option>
                                    <option value="73">นครปฐม</option>
                                    <option value="74">สมุทรสาคร</option>
                                    <option value="75">สมุทรสงคราม</option>
                                    <option value="76">เพชรบุรี</option>
                                    <option value="77">ประจวบคีรีขันธ์</option>
                                    <option value="80">นครศรีธรรมราช</option>
                                    <option value="81">กระบี่</option>
                                    <option value="82">พังงา</option>
                                    <option value="83">ภูเก็ต</option>
                                    <option value="84">สุราษฎร์ธานี</option>
                                    <option value="85">ระนอง</option>
                                    <option value="86">ชุมพร</option>
                                    <option value="90">สงขลา</option>
                                    <option value="91">สตูล</option>
                                    <option value="92">ตรัง</option>
                                    <option value="93">พัทลุง</option>
                                    <option value="94">ปัตตานี</option>
                                    <option value="95">ยะลา</option>
                                    <option value="96">นราธิวาส</option>
                                </select>
                                <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                        value="<?php echo $show->CommitteeYear ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="เลขออกคำสั่ง"
                                        name="CommitteeAppointmentNumber"
                                        value="<?php echo $show->CommitteeAppointmentNumber ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> เลขออกคำสั่ง </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="CommitteeAppointmentTypeCode">


                                    <option value="<?php echo $show->CommitteeAppointmentTypeCode ?>">
                                        <?php echo $show->CommitteeAppointmentTypeCode ?>||เดิม</option>

                                    <option value="01">แต่งตั้งคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</option>
                                    <option value="02">
                                        แต่งตั้งคณะอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</option>

                                </select>
                                <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทการแต่งตั้ง</label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="input-group mb-2">
                                <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                                <input type="file" class="form-control" id="inputGroupFile01"
                                    name="CommitteeAppointmentAttachmentURL"
                                    value="<?php echo $show->CommitteeAppointmentAttachmentURL ?>">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form>
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
    <div class="modal fade" id="edit_comm_member<?php echo $show->Id; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('cm_edit_p2'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $show->Id ?>">
                        <h5 class="card-title ">ข้อมูลรายชื่อคณะกรรมการ</h5>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="CommitteeProvinceCode">


                                    <option value="<?php echo $show->CommitteeProvinceCode ?>">
                                        <?php echo $show->CommitteeProvinceCode ?>||เดิม</option>
                                    <option value="10">กรุงเทพมหานคร</option>
                                    <option value="11">สมุทรปราการ</option>
                                    <option value="12">นนทบุรี</option>
                                    <option value="13">ปทุมธานี</option>
                                    <option value="14">พระนครศรีอยุธยา</option>
                                    <option value="15">อ่างทอง</option>
                                    <option value="16">ลพบุรี</option>
                                    <option value="17">สิงห์บุรี</option>
                                    <option value="18">ชัยนาท</option>
                                    <option value="19">สระบุรี</option>
                                    <option value="20">ชลบุรี</option>
                                    <option value="21">ระยอง</option>
                                    <option value="22">จันทบุรี</option>
                                    <option value="23">ตราด</option>
                                    <option value="24">ฉะเชิงเทรา</option>
                                    <option value="25">ปราจีนบุรี</option>
                                    <option value="26">นครนายก</option>
                                    <option value="27">สระแก้ว</option>
                                    <option value="30">นครราชสีมา</option>
                                    <option value="31">บุรีรัมย์</option>
                                    <option value="32">สุรินทร์</option>
                                    <option value="33">ศรีสะเกษ</option>
                                    <option value="34">อุบลราชธานี</option>
                                    <option value="35">ยโสธร</option>
                                    <option value="36">ชัยภูมิ</option>
                                    <option value="37">อำนาจเจริญ</option>
                                    <option value="38">บึงกาฬ</option>
                                    <option value="39">หนองบัวลำภู</option>
                                    <option value="40">ขอนแก่น</option>
                                    <option value="41">อุดรธานี</option>
                                    <option value="42">เลย</option>
                                    <option value="43">หนองคาย</option>
                                    <option value="44">มหาสารคาม</option>
                                    <option value="45">ร้อยเอ็ด</option>
                                    <option value="46">กาฬสินธุ์</option>
                                    <option value="47">สกลนคร</option>
                                    <option value="48">นครพนม</option>
                                    <option value="49">มุกดาหาร</option>
                                    <option value="50">เชียงใหม่</option>
                                    <option value="51">ลำพูน</option>
                                    <option value="52">ลำปาง</option>
                                    <option value="53">อุตรดิตถ์</option>
                                    <option value="54">แพร่</option>
                                    <option value="55">น่าน</option>
                                    <option value="56">พะเยา</option>
                                    <option value="57">เชียงราย</option>
                                    <option value="58">แม่ฮ่องสอน</option>
                                    <option value="60">นครสวรรค์</option>
                                    <option value="61">อุทัยธานี</option>
                                    <option value="62">กำแพงเพชร</option>
                                    <option value="63">ตาก</option>
                                    <option value="64">สุโขทัย</option>
                                    <option value="65">พิษณุโลก</option>
                                    <option value="66">พิจิตร</option>
                                    <option value="67">เพชรบูรณ์</option>
                                    <option value="70">ราชบุรี</option>
                                    <option value="71">กาญจนบุรี</option>
                                    <option value="72">สุพรรณบุรี</option>
                                    <option value="73">นครปฐม</option>
                                    <option value="74">สมุทรสาคร</option>
                                    <option value="75">สมุทรสงคราม</option>
                                    <option value="76">เพชรบุรี</option>
                                    <option value="77">ประจวบคีรีขันธ์</option>
                                    <option value="80">นครศรีธรรมราช</option>
                                    <option value="81">กระบี่</option>
                                    <option value="82">พังงา</option>
                                    <option value="83">ภูเก็ต</option>
                                    <option value="84">สุราษฎร์ธานี</option>
                                    <option value="85">ระนอง</option>
                                    <option value="86">ชุมพร</option>
                                    <option value="90">สงขลา</option>
                                    <option value="91">สตูล</option>
                                    <option value="92">ตรัง</option>
                                    <option value="93">พัทลุง</option>
                                    <option value="94">ปัตตานี</option>
                                    <option value="95">ยะลา</option>
                                    <option value="96">นราธิวาส</option>
                                </select>
                                <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                        value="<?php echo $show->CommitteeYear ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="เลขที่คำสั่ง"
                                        name="CommitteeAppointmentNumber"
                                        value="<?php echo $show->CommitteeAppointmentNumber ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> เลขที่คำสั่ง </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="CommitteeMemberPrefixCode">
                                    <option value="<?php echo $show->CommitteeMemberPrefixCode ?>">
                                        <?php echo $show->CommitteeMemberPrefixCode ?>||เดิม</option>
                                    <option value="003">นาย</option>
                                    <option value="004">นางสาว</option>
                                    <option value="005">นาง</option>
                                </select>
                                <label for="floatingSelect"><?php echo nbs(2); ?>คำนำหน้าชื่อ</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                        name="CommitteeMemberNameThai" value="<?php echo $show->CommitteeMemberNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                        (ภาษาไทย) </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                        name="CommitteeMemberNameEnglish" value="<?php echo $show->CommitteeMemberNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                        name="CommitteeMemberMiddleNameThai" value="<?php echo $show->CommitteeMemberMiddleNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                        (ภาษาไทย)</label>
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                        name="CommitteeMemberMiddleNameEnglish" value="<?php echo $show->CommitteeMemberMiddleNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                        name="CommitteeMemberLastNameThai" value="<?php echo $show->CommitteeMemberLastNameThai ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                        (ภาษาไทย)</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                        name="CommitteeMemberLastNameEnglish" value="<?php echo $show->CommitteeMemberLastNameEnglish ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="CommitteeMemberPositionCode">
                                
                                    <option value="<?php echo $show->CommitteeMemberPositionCode ?>"><?php echo $show->CommitteeMemberPositionCode ?></option>
                                    <option value="01">ประธาน</option>
                                    <option value="23">อนุกรรมการ</option>
                                    <option value="24">อนุกรรมการและเลขานุการ</option>
                                    <option value="25">อนุกรรมการและผู้ช่วยเลขานุการ</option>
                                </select>
                                <label
                                    for="floatingSelect"><?php echo nbs(2); ?>รหัสตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง"
                                    name="CommitteeMemberOrganizationPosition" value="<?php echo $show->CommitteeMemberOrganizationPosition ?>">
                                <label for="floatingName"><?php echo nbs(2); ?>
                                    ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CommitteeMemberTermStartDate" value="<?php echo $show->CommitteeMemberTermStartDate ?>">
                                        <label for="Share">เริ่มวาระการดำรงตำแหน่ง</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CommitteeMemberTermEndDate" value="<?php echo $show->CommitteeMemberTermEndDate ?>">
                                        <label for="Share">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


</tr>
<?php }
} ?>