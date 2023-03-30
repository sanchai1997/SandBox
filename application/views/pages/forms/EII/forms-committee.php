<main id="main" class="main">
    <style>
        label[for="Y"]:after {
            content: " *";
            color: red;
        }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
    <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
    <?php $year = isset($_GET['year']) ? $_GET['year'] : ''; ?>
    <?php $Province = isset($_GET['Province']) ? $_GET['Province'] : ''; ?>
    <?php 
session_start(); // เริ่มต้น session
if (isset( $_SESSION['success'])) { ?>
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
        <?php  }
        if (isset( $_SESSION['false'])) { ?>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert"
                style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                        echo $_SESSION['false'];
                        unset($_SESSION['false']);
                        ?>
                </strong>

            </div>
        </div>
        <?php  } ?>
    <div class="pagetitle">
        <div class="row ">
            <?php switch ($page) {
                case 'sh1':
                    ?>
                    <h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง</h1>
                    <?php break;
                case 'sh2':
                    ?>
                    <h1>ข้อมูลรายชื่อคณะกรรมการ - เลขคำสั่ง:
                        <?php echo $name; ?>
                    </h1>
                    <?php
                    break;
                case 'sh11':
                    ?>
                    <h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง -
                        เลขคำสั่ง:
                        <?php echo $key; ?>
                    </h1>
                    <?php break;
                case 'sh22':
                    ?>
                    <h1>ข้อมูลรายชื่อคณะกรรมการ - เลขคำสั่ง:
                        <?php echo $name; ?>
                    </h1>
                    <?php
                    break;
                default:
                    ?>
                    <?php
                    break;
            } ?>

            <div class="col-3">

                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">อำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</li>
                    </ol>
                </nav> -->
            </div>

        </div>
    </div>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body ">

                        <?php

                        $page = isset($_GET['page']) ? $_GET['page'] : '';

                        if ($page == 'sh1') {

                            ?>

                            <!-- <h5 class="card-title fs-5">
                            ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ</h5> -->
                            <?php echo br(2); ?>

                            <!-- start Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                            <form action="<?php echo site_url('c_forms_up_p1'); ?>" method="post"
                                enctype="multipart/form-data" onsubmit="return checkSelectedOption()">
                                <div class="row mb-3">

                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="เลขออกคำสั่ง" name="CommitteeAppointmentNumber" required>
                                            <label for="Y">
                                                <?php echo nbs(2); ?> เลขออกคำสั่ง
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="CommitteeProvinceCode"
                                                aria-label="Floating label select example" name="CommitteeProvinceCode">
                                                <option value="-1">เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                                foreach ($result->result() as $cls) {
                                                    ?>
                                                    <option value="<?= $cls->PROVINCE_CODE; ?>"><?= $cls->PROVINCE_NAME; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <label for="Y">
                                                <?php echo nbs(2); ?>จังหวัด
                                            </label>
                                        </div>
                                    </div>



                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear" required>
                                            <label for="Y">
                                                <?php echo nbs(2); ?> ปีที่ออกคำสั่ง
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="CommitteeAppointmentTypeCode"
                                                aria-label="Floating label select example"
                                                name="CommitteeAppointmentTypeCode">
                                                <option value="-1">เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_APPOINTMENT_TYPE');
                                                foreach ($result->result() as $cls) {
                                                    ?>
                                                    <option value="<?= $cls->APPOINTMENT_TYPE_CODE; ?>">
                                                        <?= $cls->APPOINTMENT_TYPE_NAME; ?></option>
                                                <?php } ?>

                                            </select>
                                            <label for="Y">
                                                <?php echo nbs(2); ?>ประเภทการแต่งตั้ง
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="input-group mb-2">
                                        <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                                        <input type="file" class="form-control" id="inputGroupFile01"
                                            name="CommitteeAppointmentAttachmentURL">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="Fm_committee_das_p1?page=sh1" class="btn btn-danger"
                                        style="float: left;">ยกเลิก</a>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- end Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                            <script>
                                function checkSelectedOption() {
                                    const PROVINCE_Element = document.querySelector('#CommitteeProvinceCode');
                                    const PROVINCE_Value = PROVINCE_Element.value;

                                    if (PROVINCE_Value === '-1') {
                                        alert('กรุณาเลือกจังหวัด');
                                        return false;
                                    }
                                    const AP_Element = document.querySelector('#CommitteeAppointmentTypeCode');
                                    const AP_Value = AP_Element.value;

                                    if (AP_Value === '-1') {
                                        alert('กรุณาเลือกประเภทการแต่งตั้ง');
                                        return false;
                                    }
                                }
                            </script>
                        <?php } ?>
                        <?php $page = isset($_GET['page']) ? $_GET['page'] : '';

                        if ($page == 'sh11') {

                            ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                            <?php

                            $result = $this->db->query("SELECT * FROM COMMITTEE 
                            WHERE Id = '" . $key . "'  
                            ");

                            foreach ($result->result() as $show) {
                                ?>

                                <!-- <h5 class="card-title fs-5">
                            ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ</h5> -->
                                <?php echo br(2); ?>

                                <!-- start Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                                <form action="<?php echo site_url('c_edit_p1'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="CommitteeAppointmentNumber"
                                        value="<?php echo $show->CommitteeAppointmentNumber ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="เลขออกคำสั่ง" name="CommitteeAppointmentNumber"
                                                    value="<?php echo $show->CommitteeAppointmentNumber ?>" required>
                                                <label for="Y">
                                                    <?php echo nbs(2); ?> เลขออกคำสั่ง
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CommitteeProvinceCode"
                                                    aria-label="Floating label select example" name="CommitteeProvinceCode">

                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                                    foreach ($result->result() as $cls) {
                                                        ?>
                                                        <option value="<?= $cls->PROVINCE_CODE; ?>"><?= $cls->PROVINCE_NAME; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <label for="Y">
                                                    <?php echo nbs(2); ?>จังหวัด
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                                    value="<?php echo $show->CommitteeYear ?>" required>
                                                <label for="Y">
                                                    <?php echo nbs(2); ?> ปีที่ออกคำสั่ง
                                                </label>
                                            </div>
                                        </div>



                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CommitteeAppointmentTypeCode"
                                                    aria-label="Floating label select example"
                                                    name="CommitteeAppointmentTypeCode">

                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_APPOINTMENT_TYPE');
                                                    foreach ($result->result() as $cls) {
                                                        ?>
                                                        <option value="<?= $cls->APPOINTMENT_TYPE_CODE; ?>">
                                                            <?= $cls->APPOINTMENT_TYPE_NAME; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="Y">
                                                    <?php echo nbs(2); ?>ประเภทการแต่งตั้ง
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group mb-2">
                                            <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="CommitteeAppointmentAttachmentURL">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_committee_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>
                                                        <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    ///CLS_PROVINCE
                                    var my_CLS_PROVINCE = "<?php echo $show->CommitteeProvinceCode ?>";
                                    var selectoption_CLS_PROVINCE = document.querySelector('#CommitteeProvinceCode');
                                    var size_my_CLS_PROVINCE = document.getElementById("CommitteeProvinceCode").options.length;
                                    for (let i = 0; i < size_my_CLS_PROVINCE; i++) {
                                        if (selectoption_CLS_PROVINCE[i].value == my_CLS_PROVINCE) {
                                            selectoption_CLS_PROVINCE[i].selected = true;
                                        }
                                    }
                                    ///CLS_APPOINTMENT_TYPE
                                    var my_CLS_APPOINTMENT_TYPE = "<?php echo $show->CommitteeAppointmentTypeCode ?>";
                                    var selectoption_CLS_APPOINTMENT_TYPE = document.querySelector(
                                        '#CommitteeAppointmentTypeCode');
                                    var size_my_CLS_APPOINTMENT_TYPE = document.getElementById("CommitteeAppointmentTypeCode")
                                        .options.length;
                                    for (let i = 0; i < size_my_CLS_APPOINTMENT_TYPE; i++) {
                                        if (selectoption_CLS_APPOINTMENT_TYPE[i].value == my_CLS_APPOINTMENT_TYPE) {
                                            selectoption_CLS_APPOINTMENT_TYPE[i].selected = true;
                                        }
                                    }
                                </script>
                                <!-- end Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                                <?php
                            }
                        } ?>

                        <?php

                        if ($page == 'sh2') { ?>
                            <!-- start Form ข้อมูลรายชื่อคณะกรรมการ -->
                            <form action="<?php echo site_url('cm_forms_up_p2'); ?>" method="post"
                                onsubmit="return checkSelectedOption()">
                                <?php echo br(2); ?>

                                <div class="row mb-3">
                                <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="เลขที่คำสั่ง" name="" value="<?php echo $name; ?>" disabled>
                                            <input type="hidden" class="form-control" id="floatingName"
                                                placeholder="เลขที่คำสั่ง" name="CommitteeAppointmentNumber"
                                                value="<?php echo $name; ?>">
                                            <label for="Y">
                                                <?php echo nbs(2); ?> เลขที่คำสั่ง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีที่ออกคำสั่ง" name="" value="<?php echo $year; ?>" disabled>
                                            <label for="Y">
                                                <?php echo nbs(2); ?> ปีที่ออกคำสั่ง
                                            </label>
                                            <input type="hidden" class="form-control" id="floatingName"
                                                placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                                value="<?php echo $year; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                    <?php
                                                $result = $this->db->query("SELECT * FROM CLS_PROVINCE where PROVINCE_CODE = {$Province}");
                                                foreach ($result->result() as $cls) {
                                                    ?>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จังหวัด" name="" value="<?php echo $cls->PROVINCE_NAME;; ?>" disabled>
                                            <label for="Y">
                                                <?php echo nbs(2); ?> จังหวัด
                                            </label>
                                            <input type="hidden" class="form-control" id="floatingName"
                                                placeholder="จังหวัด" name="CommitteeProvinceCode"
                                                value="<?php echo $cls->PROVINCE_CODE;; ?>">
                                        </div>
                                        <?php } ?>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="CommitteeMemberPrefixCode"
                                            aria-label="Floating label select example" name="CommitteeMemberPrefixCode">
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                                ?>
                                                <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="Y">
                                            <?php echo nbs(2); ?>คำนำหน้าชื่อ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกรรมการและอนุกรรมการ (ภาษาไทย)"
                                                name="CommitteeMemberNameThai">
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                ชื่อกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชือกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberNameEnglish">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                ชือกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกลางกรรมการและอนุกรรมการ (ภาษาไทย)"
                                                name="CommitteeMemberMiddleNameThai" value="">
                                            <label for="">
                                                <?php echo nbs(2); ?>
                                                ชื่อกลางกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกลางกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberMiddleNameEnglish" value="">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                ชื่อกลางกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="นามสกุลกรรมการและอนุกรรมการ (ภาษาไทย)"
                                                name="CommitteeMemberLastNameThai" value="">
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                นามสกุลกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="นามสกุลกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberLastNameEnglish" value="">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                นามสกุลกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="CommitteeMemberPositionCode"
                                            aria-label="Floating label select example" name="CommitteeMemberPositionCode">
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COMMITEE_POSITION');
                                            foreach ($result->result() as $cls) {
                                                ?>
                                                <option value="<?= $cls->COMMITEE_POSITION_CODE; ?>">
                                                    <?= $cls->COMMITEE_POSITION_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="Y">
                                            <?php echo nbs(2); ?>ตำแหน่งกรรมการและอนุกรรมการ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการ"
                                            name="CommitteeMemberOrganizationPosition" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?>
                                            ตำแหน่งในองค์กรของกรรมการและอนุกรรมการ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="Share" placeholder="Share"
                                                    name="CommitteeMemberTermStartDate" value="">
                                                <label for="Y">เริ่มวาระการดำรงตำแหน่ง</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="Share" placeholder="Share"
                                                    name="CommitteeMemberTermEndDate" value="">
                                                <label for="Y">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="Fm_committee_das_p1?page=sh1" class="btn btn-danger"
                                        style="float: left;">ยกเลิก</a>


                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>
                                            <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
                                        </h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form><!-- end Form ข้อมูลรายชื่อคณะกรรมการ -->

                        <script>
                            function checkSelectedOption() {
                                const CLS_PROVINCE = document.querySelector('#CommitteeProvinceCode');
                                const CLS_PROVINCEValue = CLS_PROVINCE.value;

                                if (CLS_PROVINCEValue === '-1') {
                                    alert('กรุณาเลือกจังหวัด');
                                    return false;
                                }
                                const CLS_PREFIX = document.querySelector('#CommitteeMemberPrefixCode');
                                const CLS_PREFIXValue = CLS_PREFIX.value;

                                if (CLS_PREFIXValue === '-1') {
                                    alert('กรุณาเลือกคำนำหน้าชื่อ');
                                    return false;
                                }
                                const CLS_COMMITEE_POSITION = document.querySelector('#CommitteeMemberPositionCode');
                                const CLS_COMMITEE_POSITIONValue = CLS_COMMITEE_POSITION.value;

                                if (CLS_COMMITEE_POSITIONValue === '-1') {
                                    alert(
                                        'กรุณาเลือกตำแหน่งกรรมการและอนุกรรมการ'
                                    );
                                    return false;
                                }
                            }
                            ///CLS_PROVINCE
                            var my_CLS_PROVINCE = "<?php echo $province; ?>";
                            var selectoption_CLS_PROVINCE = document.querySelector('#CommitteeProvinceCode');
                            var size_my_CLS_PROVINCE = document.getElementById("CommitteeProvinceCode").options.length;
                            for (let i = 0; i < size_my_CLS_PROVINCE; i++) {
                                if (selectoption_CLS_PROVINCE[i].value == my_CLS_PROVINCE) {
                                    selectoption_CLS_PROVINCE[i].selected = true;
                                }
                            }
                        ///select_to_select
                        </script>



                        <?php
                        } ?>
                    <?php

                    if ($page == 'sh22') { ?>
                        <!-- start Form ข้อมูลรายชื่อคณะกรรมการ -->
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                        <?php

                        $result = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                            WHERE Id = '" . $key . "' 
                            ");

                        foreach ($result->result() as $show) {
                            ?>
                            <form action="<?php echo site_url('cm_edit_p2'); ?>" method="post">
                                <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                <!-- <h5 class="card-title ">ข้อมูลรายชื่อคณะกรรมการ</h5> -->
                                <?php echo br(2); ?>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="CommitteeAppointmentNumber"
                                                name="CommitteeAppointmentNumber" aria-label="Floating label select example">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM COMMITTEE WHERE DeleteStatus = 0');
                                                foreach ($result->result() as $cls) {
                                                    ?>
                                                    <option value="<?= $cls->CommitteeAppointmentNumber; ?>">
                                                        <?= $cls->CommitteeAppointmentNumber; ?></option>
                                                <?php } ?>

                                            </select>
                                            <label for="Y">
                                                <?php echo nbs(2); ?>เลขที่คำสั่ง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                        <?php
$CommitteeProvinceCode = $show->CommitteeProvinceCode;
$resulta = $this->db->query("SELECT * FROM COMMITTEE 
INNER JOIN CLS_PROVINCE
ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode
where COMMITTEE.CommitteeProvinceCode = $CommitteeProvinceCode;
"); 
foreach ($resulta->result() as $showa) { ?>
                                            <input type="text" class="form-control" id="CommitteeProvinceCode"
                                                placeholder="จังหวัด" name=""
                                                value="<?php echo $showa->PROVINCE_NAME ?>" disabled>
                                                <input type="hidden" class="form-control" id="CommitteeProvinceCode1"
                                                placeholder="จังหวัด" name="CommitteeProvinceCode"
                                                value="<?php echo $showa->CommitteeProvinceCode ?>">
<?php } ?>
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                จังหวัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="CommitteeYear"
                                                placeholder="ปีที่ออกคำสั่ง" name=""
                                                value="<?php echo $show->CommitteeYear ?>" disabled>

                                                <input type="hidden" class="form-control" id="CommitteeYear1"
                                                placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                                value="<?php echo $show->CommitteeYear ?>">
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                ปีที่ออกคำสั่ง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="CommitteeMemberPrefixCode"
                                            aria-label="Floating label select example" name="CommitteeMemberPrefixCode">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                                ?>
                                                <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="Y">
                                            <?php echo nbs(2); ?>คำนำหน้าชื่อ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกรรมการและอนุกรรมการ (ภาษาไทย)" name="CommitteeMemberNameThai"
                                                value="<?php echo $show->CommitteeMemberNameThai ?>">
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                ชื่อกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชือกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberNameEnglish"
                                                value="<?php echo $show->CommitteeMemberNameEnglish ?>">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                ชือกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกลางกรรมการและอนุกรรมการ (ภาษาไทย)"
                                                name="CommitteeMemberMiddleNameThai"
                                                value="<?php echo $show->CommitteeMemberMiddleNameThai ?>">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                ชื่อกลางกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อกลางกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberMiddleNameEnglish"
                                                value="<?php echo $show->CommitteeMemberMiddleNameEnglish ?>">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                ชื่อกลางกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="นามสกุลกรรมการและอนุกรรมการ (ภาษาไทย)"
                                                name="CommitteeMemberLastNameThai"
                                                value="<?php echo $show->CommitteeMemberLastNameThai ?>">
                                            <label for="Y">
                                                <?php echo nbs(2); ?>
                                                นามสกุลกรรมการและอนุกรรมการ
                                                (ภาษาไทย)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="นามสกุลกรรมการและอนุกรรมการ(ภาษาอังกฤษ)"
                                                name="CommitteeMemberLastNameEnglish"
                                                value="<?php echo $show->CommitteeMemberLastNameEnglish ?>">
                                            <label for="floatingName">
                                                <?php echo nbs(2); ?>
                                                นามสกุลกรรมการและอนุกรรมการ(ภาษาอังกฤษ)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="CommitteeMemberPositionCode"
                                            aria-label="Floating label select example" name="CommitteeMemberPositionCode">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COMMITEE_POSITION');
                                            foreach ($result->result() as $cls) {
                                                ?>
                                                <option value="<?= $cls->COMMITEE_POSITION_CODE; ?>">
                                                    <?= $cls->COMMITEE_POSITION_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingSelect">
                                            <?php echo nbs(2); ?>ตำแหน่งกรรมการและอนุกรรมการ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการ"
                                            name="CommitteeMemberOrganizationPosition"
                                            value="<?php echo $show->CommitteeMemberOrganizationPosition ?>">
                                        <label for="Y">
                                            <?php echo nbs(2); ?>
                                            ตำแหน่งในองค์กรของกรรมการและอนุกรรมการ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="Share" placeholder="Share"
                                                    name="CommitteeMemberTermStartDate"
                                                    value="<?php echo $show->CommitteeMemberTermStartDate ?>">
                                                <label for="Y">เริ่มวาระการดำรงตำแหน่ง</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="Share" placeholder="Share"
                                                    name="CommitteeMemberTermEndDate"
                                                    value="<?php echo $show->CommitteeMemberTermEndDate ?>">
                                                <label for="Y">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="Fm_committee_das_p1?page=sh1" class="btn btn-danger"
                                        style="float: left;">ยกเลิก</a>
                                    <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#del_com<?php echo $show->Id; ?>"><i class="bi bi-trash"></i>
                                    </button> <!-- ปุ่มลบ -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- end Form ข้อมูลรายชื่อคณะกรรมการ -->
                            <!-- Modal -->
                            <div class="modal fade" id="del_com<?php echo $show->Id; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ยืนยันการลบข้อมูล
                                                <?php echo nbs(2); ?>
                                                <?php echo $show->CommitteeAppointmentNumber; ?>
                                            </h5>

                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <form method="post" action="<?php echo site_url('cm_del_p2'); ?>">
                                                <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                <div class="d-flex justify-content-center">
                                                    <button name="Submit" type="submit"
                                                        class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Modal -->

                            <script>
                                // ///COMMITTEE
                                // var my_COMMITTEE = "<?php echo $show->CommitteeAppointmentNumber ?>";
                                // var selectoption_COMMITTEE = document.querySelector('#CommitteeAppointmentNumber');
                                // var size_my_COMMITTEE = document.getElementById("CommitteeAppointmentNumber").options.length;
                                // for (let i = 0; i < size_my_COMMITTEE; i++) {
                                //     if (selectoption_COMMITTEE[i].value == my_COMMITTEE) {
                                //         selectoption_COMMITTEE[i].selected = true;
                                //     }
                                // }
                                // ///CLS_PROVINCE
                                // var my_CLS_PROVINCE = "<?php echo $show->CommitteeProvinceCode ?>";
                                // var selectoption_CLS_PROVINCE = document.querySelector('#CommitteeProvinceCode');
                                // var size_my_CLS_PROVINCE = document.getElementById("CommitteeProvinceCode").options.length;
                                // for (let i = 0; i < size_my_CLS_PROVINCE; i++) {
                                //     if (selectoption_CLS_PROVINCE[i].value == my_CLS_PROVINCE) {
                                //         selectoption_CLS_PROVINCE[i].selected = true;
                                //     }
                                // }
                                // ///CLS_PREFIX
                                // var my_CLS_PREFIX = "<?php echo $show->CommitteeMemberPrefixCode ?>";
                                // var selectoption_CLS_PREFIX = document.querySelector('#CommitteeMemberPrefixCode');
                                // var size_my_CLS_PREFIX = document.getElementById("CommitteeMemberPrefixCode").options.length;
                                // for (let i = 0; i < size_my_CLS_PREFIX; i++) {
                                //     if (selectoption_CLS_PREFIX[i].value == my_CLS_PREFIX) {
                                //         selectoption_CLS_PREFIX[i].selected = true;
                                //     }
                                // }
                                // ///CLS_COMMITEE_POSITION
                                // var my_CLS_COMMITEE_POSITION = "<?= $cls->COMMITEE_POSITION_CODE; ?>";
                                // var selectoption_CLS_COMMITEE_POSITION = document.querySelector('#CommitteeMemberPositionCode');
                                // var size_my_CLS_COMMITEE_POSITION = document.getElementById("CommitteeMemberPositionCode")
                                //     .options.length;
                                // for (let i = 0; i < size_my_CLS_COMMITEE_POSITION; i++) {
                                //     if (selectoption_CLS_COMMITEE_POSITION[i].value == my_CLS_COMMITEE_POSITION) {
                                //         selectoption_CLS_COMMITEE_POSITION[i].selected = true;
                                //     }
                                // }
                                var select1 = document.getElementById("CommitteeAppointmentNumber");
                                select1.addEventListener("change", function () {
                                    <?php

                                    $resulta = $this->db->query("SELECT * FROM COMMITTEE 
                                    INNER JOIN CLS_PROVINCE
                                    ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode
                                    ");

                                    foreach ($resulta->result() as $showa) {
                                        ?>
                                        if (select1.value == "<?php echo $showa->CommitteeAppointmentNumber; ?>") {
                                            var x = document.getElementById("CommitteeAppointmentNumber").value;
                                            document.getElementById("CommitteeProvinceCode").value = "<?php echo $showa->PROVINCE_NAME ?>"
                                            var x = document.getElementById("CommitteeAppointmentNumber").value;
                                            document.getElementById("CommitteeProvinceCode1").value = "<?php echo $showa->CommitteeProvinceCode ?>"
                                            var x = document.getElementById("CommitteeAppointmentNumber").value;
                                            document.getElementById("CommitteeYear").value = "<?php echo $showa->CommitteeYear ?>"
                                            var x = document.getElementById("CommitteeAppointmentNumber").value;
                                            document.getElementById("CommitteeYear1").value = "<?php echo $showa->CommitteeYear ?>"
                                        }
                                    <?php } ?>

                                });
                            </script>

                            <?php
                        }
                    } ?>


                </div>
                <!--สุดขอบการ์ด -->
            </div>

        </div>


        </div>
    </section>
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->