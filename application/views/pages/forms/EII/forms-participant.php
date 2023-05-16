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
    <?php 
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
} // เริ่มต้น session
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

        <?php switch (
            $page
        ) { case 'sh1': ?> <h1>ผู้เข้ามามีส่วนร่วม</h1>
        <?php break;case 'sh2': ?> <h1>การติดต่อของผู้มีส่วนร่วม - <?php echo $name; ?></h1>
        <?php break;case 'sh22': ?> <h1>ข้อมูลการติดต่อของผู้มีส่วนร่วม - <?php echo $name; ?></h1>
        <?php break;case 'sh3': ?> <h1>การมีส่วนร่วม - <?php echo $name; ?></h1>
        <?php break;case 'sh33': ?> <h1>ข้อมูลการมีส่วนร่วม - <?php echo $name; ?></h1>
        <?php break;case 'sh4': ?> <h1>ข้อมูลบันทึกเพิ่มเติม - <?php echo $name; ?></h1>
        <?php break;case 'sh44': ?> <h1>ข้อมูลบันทึกเพิ่มเติม - <?php echo $name; ?></h1>
        <?php break;case 'sh11': ?> <h1>ข้อมูลผู้เข้ามามีส่วนร่วม - <?php echo $name; ?></h1>
        <?php break;default: ?>
        <?php break;} ?>

        <!-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">ผู้เข้ามามีส่วนร่วม</li>
            </ol>
        </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <!-- <?php switch (
                            $page
                        ) { case 'sh1': ?> <h5 class="card-title">ข้อมูลผู้เข้ามามีส่วนร่วม</h5>
                        <?php break;case 'sh2': ?> <h5 class="card-title">ข้อมูลการติดต่อของผู้มีส่วนร่วม</h5>
                        <?php break;case 'sh3': ?> <h5 class="card-title">ข้อมูลการมีส่วนร่วม</h5>
                        <?php break;case 'sh4': ?><h5 class="card-title">ข้อมูลบันทึกเพิ่มเติม</h5>
                        <?php break;case 'sh22': ?> <h5 class="card-title">ข้อมูลการติดต่อของผู้มีส่วนร่วม</h5>
                        <?php break;case 'sh33': ?> <h5 class="card-title">ข้อมูลการมีส่วนร่วม</h5>
                        <?php break;case 'sh44': ?><h5 class="card-title">ข้อมูลบันทึกเพิ่มเติม</h5>
                        <?php break;case 'sh11': ?><h5 class="card-title">ข้อมูลผู้เข้ามามีส่วนร่วม</h5>
                        <?php break;default: ?>
                        <?php break;} ?> -->
                        <?php  echo br(2); ?>

                        <!-- start Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <?php if ($page == 'sh1') { ?>
                        <form action="<?php echo site_url(
                            'par_forms_up_p1'
                        ); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkSelectedOption()">


                            <div class="row mb-3">
                                <!-- <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantID">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?>
                                            ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div> -->

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantName">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?>
                                            ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="ParticipantTypeCode"
                                        aria-label="Floating label select example" name="ParticipantTypeCode">
                                        <option value="-1" selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PARTICIPANT_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->PARTICIPANT_TYPE_CODE ; ?>">
                                            <?= $cls->PARTICIPANT_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <script>
                        function checkSelectedOption() {

                            const CLS_PARTICIPANT_TYPE = document.querySelector('#ParticipantTypeCode');
                            const CLS_PARTICIPANT_TYPE_Value = CLS_PARTICIPANT_TYPE.value;

                            if (CLS_PARTICIPANT_TYPE_Value === '-1') {
                                alert('กรุณาเลือกประเภทผู้เข้ามามีส่วนร่วม');
                                return false;
                            }
                        }
                        </script>
                        <?php } ?>
                        <?php if ($page == 'sh11') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT 
                            WHERE ParticipantID = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <form action="<?php echo site_url(
                            'par_edit_p1'
                        ); ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                            <div class="row mb-3">
                               
                                        <input type="hidden" class="form-control" id="floatingName"
                                            placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                        

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantName" value="<?php echo $show->ParticipantName ?>">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?>
                                            ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="ParticipantTypeCode"
                                        aria-label="Floating label select example" name="ParticipantTypeCode">

                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PARTICIPANT_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->PARTICIPANT_TYPE_CODE ; ?>">
                                            <?= $cls->PARTICIPANT_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <script>
                        ///CLS_PARTICIPANT_TYPE
                        var my_CLS_PARTICIPANT_TYPE = '<?php echo $show->ParticipantTypeCode ?>';
                        var selectoption_CLS_PARTICIPANT_TYPE = document.querySelector('#ParticipantTypeCode');
                        var size_my_CLS_PARTICIPANT_TYPE = document.getElementById("ParticipantTypeCode").options
                        .length;
                        for (let i = 0; i < size_my_CLS_PARTICIPANT_TYPE; i++) {
                            if (selectoption_CLS_PARTICIPANT_TYPE[i].value == my_CLS_PARTICIPANT_TYPE) {
                                selectoption_CLS_PARTICIPANT_TYPE[i].selected = true;
                            }
                        }
                        </script>
                        <?php } }?>
                        <?php if ($page == 'sh2') { ?>
                        <!-- start Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pc_forms_up_p2'
                        ); ?>" method="post" enctype="multipart/form-data">

                            <!-- 
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="" value="<?php echo $key ?>" disabled> -->
                            <input type="hidden" class="form-control" id="floatingName"
                                placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                name="ParticipantID" value="<?php echo $key ?>">
                            <!-- <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>
                                        ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อของผู้ติดต่อ" name="ContactName">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>
                                        ชื่อของผู้ติดต่อ </label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้ติดต่อ" name="ContactPhone">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้ติดต่อ </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้ติดต่อ" name="ContactMobilePhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้ติดต่อ" name="ContactEmail">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้ติดต่อ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองคnกร (ของผู้ติดต่อ)" name="ContactOrganizationPosition">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ตำแหน่งในองคnกร (ของผู้ติดต่อ)
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
                        <?php if ($page == 'sh22') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_CONTACT 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pc_edit_p2'
                        ); ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="ParticipantID"
                                            aria-label="Floating label select example" name="ParticipantID">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM PARTICIPANT WHERE DeleteStatus = 0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->ParticipantID ; ?>">
                                                <?= $cls->ParticipantName; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อของผู้ติดต่อ" name="ContactName"
                                        value="<?php echo $show->ContactName ?>">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>
                                        ชื่อของผู้ติดต่อ </label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้ติดต่อ" name="ContactPhone"
                                            value="<?php echo $show->ContactPhone ?>">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้ติดต่อ </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้ติดต่อ" name="ContactMobilePhone"
                                            value="<?php echo $show->ContactMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้ติดต่อ" name="ContactEmail"
                                        value="<?php echo $show->ContactEmail ?>">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้ติดต่อ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองคnกร (ของผู้ติดต่อ)" name="ContactOrganizationPosition"
                                        value="<?php echo $show->ContactOrganizationPosition ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ตำแหน่งในองคnกร (ของผู้ติดต่อ)
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
                                    style="float: left;">ยกเลิก</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_com<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <!-- Modal -->
                        <div class="modal fade" id="del_par_com<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->ContactName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center">  คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('pc_del_p2'); ?>">
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
                        ///PARTICIPANT
                        var my_PARTICIPANT = '<?php echo $show->ParticipantID; ?>';
                        var selectoption_PARTICIPANT = document.querySelector('#ParticipantID');
                        var size_my_PARTICIPANT = document.getElementById("ParticipantID").options.length;
                        for (let i = 0; i < size_my_PARTICIPANT; i++) {
                            if (selectoption_PARTICIPANT[i].value == my_PARTICIPANT) {
                                selectoption_PARTICIPANT[i].selected = true;
                            }
                        }
                        </script>
                        <?php } }?>
                        <?php if ($page == 'sh3') { ?>
                        <!-- start Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pcp_forms_up_p3'
                        ); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkSelectedOption()">

                            <!-- <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>
                                        ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div> -->
                            <input type="hidden" name="ParticipantID" value="<?php echo $key; ?>">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CooperationStartDate">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>วันที่เริ่มการมีส่วนร่วม</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CooperationEndDate">
                                            <label for="Share">วันที่สิ้นสุดการมีส่วนร่วม</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationStatusCode"
                                        aria-label="Floating label select example" name="CooperationStatusCode">
                                        <option value="-1" selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->COOPERATION_STATUS_CODE ; ?>">
                                            <?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>สถานะการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="CooperationActivity"></textarea>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>กิจกรรมที่มีส่วนร่วม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationLevelCode"
                                        aria-label="Floating label select example" name="CooperationLevelCode">
                                        <option value="-1" selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->COOPERATION_LEVEL_CODE ; ?>">
                                            <?= $cls->COOPERATION_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationSchoolID"
                                        aria-label="Floating label select example" name="CooperationSchoolID">
                                        <option value="-1" selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM SCHOOL where DeleteStatus=0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->SchoolID   ; ?>">
                                            <?= $cls->SchoolNameThai; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>สถานศึกษาที่เข้าไปมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01"
                                        name="CooperationAttachmentURL">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <script>
                        function checkSelectedOption() {

                            const CLS_COOPERATION_STATUS = document.querySelector('#CooperationStatusCode');
                            const CLS_COOPERATION_STATUS_Value = CLS_COOPERATION_STATUS.value;

                            if (CLS_COOPERATION_STATUS_Value === '-1') {
                                alert('กรุณาเลือกระดับการมีส่วนร่วม');
                                return false;
                            }
                            const CLS_COOPERATION_LEVEL = document.querySelector('#CooperationLevelCode');
                            const CLS_COOPERATION_LEVEL_Value = CLS_COOPERATION_LEVEL.value;

                            if (CLS_COOPERATION_LEVEL_Value === '-1') {
                                alert('กรุณาเลือกระดับการมีส่วนร่วม');
                                return false;
                            }
                            const SCHOOL = document.querySelector('#CooperationSchoolID');
                            const SCHOOL_Value = SCHOOL.value;

                            if (SCHOOL_Value === '-1') {
                                alert('กรุณาเลือกสถานศึกษาที่เข้าไปมีส่วนร่วม');
                                return false;
                            }
                        }
                        </script>
                        <?php } ?>
                        <?php if ($page == 'sh33') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pcp_edit_p3'
                        ); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="ParticipantID"
                                        aria-label="Floating label select example" name="ParticipantID">

                                        <?php
                                            $result = $this->db->query('SELECT * FROM PARTICIPANT WHERE DeleteStatus = 0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->ParticipantID ; ?>">
                                            <?= $cls->ParticipantName; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CooperationStartDate"
                                            value="<?php echo $show->CooperationStartDate ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>วันที่เริ่มการมีส่วนร่วม</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CooperationEndDate"
                                                value="<?php echo $show->CooperationEndDate ?>">
                                            <label for="Share">วันที่สิ้นสุดการมีส่วนร่วม</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationStatusCode"
                                        aria-label="Floating label select example" name="CooperationStatusCode">
                                        <option selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->COOPERATION_STATUS_CODE ; ?>">
                                            <?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>สถานะการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="CooperationActivity"><?php echo $show->CooperationActivity ?></textarea>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>กิจกรรมที่มีส่วนร่วม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationLevelCode"
                                        aria-label="Floating label select example" name="CooperationLevelCode">

                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->COOPERATION_LEVEL_CODE ; ?>">
                                            <?= $cls->COOPERATION_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="CooperationSchoolID"
                                        aria-label="Floating label select example" name="CooperationSchoolID">

                                        <?php
                                            $result = $this->db->query('SELECT * FROM SCHOOL where DeleteStatus=0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->SchoolID   ; ?>">
                                            <?= $cls->SchoolNameThai; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>สถานศึกษาที่เข้าไปมีส่วนร่วม</label>
                                </div>
                            </div>
                            <input name="oil_file" value="<?php echo $show->CooperationAttachmentURL ?>" type="hidden">
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01"
                                        name="CooperationAttachmentURL">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
                                    style="float: left;">ยกเลิก</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_coop<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <!-- Modal -->
                        <div class="modal fade" id="del_par_coop<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                               <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('pcp_del_p3'); ?>">
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
                        ///SubjectGroupCode
                        var my_SubjectGroupCode = '<?php echo $show->CooperationStatusCode; ?>';
                        var selectoption_SubjectGroupCode = document.querySelector('#CooperationStatusCode');
                        var size_my_SubjectGroupCode = document.getElementById("CooperationStatusCode").options.length;
                        for (let i = 0; i < size_my_SubjectGroupCode; i++) {
                            if (selectoption_SubjectGroupCode[i].value == my_SubjectGroupCode) {
                                selectoption_SubjectGroupCode[i].selected = true;
                            }
                        }
                        ///CLS_COOPERATION_LEVEL
                        var my_CLS_COOPERATION_LEVEL = '<?php echo $show->CooperationLevelCode; ?>';
                        var selectoption_CLS_COOPERATION_LEVEL = document.querySelector('#CooperationLevelCode');
                        var size_my_CLS_COOPERATION_LEVEL = document.getElementById("CooperationLevelCode").options
                            .length;
                        for (let i = 0; i < size_my_CLS_COOPERATION_LEVEL; i++) {
                            if (selectoption_CLS_COOPERATION_LEVEL[i].value == my_CLS_COOPERATION_LEVEL) {
                                selectoption_CLS_COOPERATION_LEVEL[i].selected = true;
                            }
                        }
                        ///SCHOOL
                        var my_SCHOOL = '<?php echo $show->CooperationSchoolID; ?>';
                        var selectoption_SCHOOL = document.querySelector('#CooperationSchoolID');
                        var size_my_SCHOOL = document.getElementById("CooperationSchoolID").options.length;
                        for (let i = 0; i < size_my_SCHOOL; i++) {
                            if (selectoption_SCHOOL[i].value == my_SCHOOL) {
                                selectoption_SCHOOL[i].selected = true;
                            }
                        }
                        ///PARTICIPANT_COOPERATION
                        var my_PARTICIPANT_COOPERATION = '<?php echo $show->ParticipantID; ?>';
                        var selectoption_PARTICIPANT_COOPERATION = document.querySelector('#ParticipantID');
                        var size_my_PARTICIPANT_COOPERATION = document.getElementById("ParticipantID").options.length;
                        for (let i = 0; i < size_my_PARTICIPANT_COOPERATION; i++) {
                            if (selectoption_PARTICIPANT_COOPERATION[i].value == my_PARTICIPANT_COOPERATION) {
                                selectoption_PARTICIPANT_COOPERATION[i].selected = true;
                            }
                        }
                        </script>

                        <?php } } ?>
                        <?php if ($page == 'sh4') { ?>
                        <!-- start Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pn_forms_up_p4'
                        ); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="ParticipantID" value="<?php echo $key ?>">
                            <!-- <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="" value="<?php echo $key; ?>" disabled>
                                    <input type="hidden" class="form-control" id="floatingName"
                                        placeholder="ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $key; ?>">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>
                                        ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Note"></textarea>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>บันทึกเพิ่มเติม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้บันทึกเพิ่มเติม" name="NoteReporterName">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> ชื่อผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม" name="NoteReporterPhone">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม"
                                            name="NoteReporterMobilePhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้บันทึกเพิ่มเติม" name="NoteReporterEmail">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
                        <?php if ($page == 'sh44') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_NOTE 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pn_edit_p4'
                        ); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="ParticipantID"
                                        aria-label="Floating label select example" name="ParticipantID">

                                        <?php
                                            $result = $this->db->query('SELECT * FROM PARTICIPANT WHERE DeleteStatus = 0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->ParticipantID ; ?>">
                                            <?= $cls->ParticipantName; ?></option>
                                            
                                        <?php } ?>
                                    </select>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>ภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="Note"><?php echo $show->Note ?></textarea>
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?>บันทึกเพิ่มเติม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้บันทึกเพิ่มเติม" name="NoteReporterName"
                                        value="<?php echo $show->NoteReporterName ?>">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> ชื่อผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม" name="NoteReporterPhone"
                                            value="<?php echo $show->NoteReporterPhone ?>">
                                        <label for="Y"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม"
                                            name="NoteReporterMobilePhone"
                                            value="<?php echo $show->NoteReporterMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้บันทึกเพิ่มเติม" name="NoteReporterEmail"
                                        value="<?php echo $show->NoteReporterEmail ?>">
                                    <label for="Y"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_participant_das_p1?page=sh1" class="btn btn-danger"
                                    style="float: left;">ยกเลิก</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_note<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                          <!-- Modal -->
                          <div class="modal fade" id="del_par_note<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center">  คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('pn_del_p4'); ?>">
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
                         ///PARTICIPANT_COOPERATION
                         var my_PARTICIPANT_COOPERATION = '<?php echo $show->ParticipantID; ?>';
                        var selectoption_PARTICIPANT_COOPERATION = document.querySelector('#ParticipantID');
                        var size_my_PARTICIPANT_COOPERATION = document.getElementById("ParticipantID").options.length;
                        for (let i = 0; i < size_my_PARTICIPANT_COOPERATION; i++) {
                            if (selectoption_PARTICIPANT_COOPERATION[i].value == my_PARTICIPANT_COOPERATION) {
                                selectoption_PARTICIPANT_COOPERATION[i].selected = true;
                            }
                        }

                       </script>
                        <?php }
                        } ?>

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->