<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
<?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
<?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<?php $lvl = isset($_GET['lvl']) ? $_GET['lvl'] : ''; ?>
<?php $Id_ac = isset($_GET['Id_ac']) ? $_GET['Id_ac'] : ''; ?>
<?php $year = isset($_GET['year']) ? $_GET['year'] : ''; ?>
<?php $summer = isset($_GET['summer']) ? $_GET['summer'] : ''; ?>
<?php $SchoolNameThai = isset($_GET['SchoolNameThai']) ? $_GET['SchoolNameThai'] : ''; ?>
<?php $SchoolID = isset($_GET['SchoolID']) ? $_GET['SchoolID'] : ''; ?>
<main id="main" class="main">
    <style>
    label[for="Y"]:after {
        content: " *";
        color: red;
    }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <div class="pagetitle">
        <?php session_start();
        if (isset($_SESSION['false'])) { ?>
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
        <?php } ?>
        <div class="pagetitle">
            <div class="row ">
                <?php switch (
                    $page
                ) {
                    case 'sh1': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
                <?php break;
                    case 'sh2': ?> <h1>ระดับตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh3': ?> <h1>องค์ประกอบตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh4': ?> <h1>คำอธิบายระดับของแต่ละองค์ประกอบ - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh5': ?> <h1>การประเมินผลสถานศึกษา</h1>
                <?php break;
                    case 'sh6': ?> <h1>การประเมินตามตัวชี้วัด</h1>
                <?php break;
                    case 'sh7': ?> <h1>ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
                <?php break;
                    case 'sh8': ?> <h1>การประเมินสถานศึกษา</h1>
                <?php break;
                    case 'sh11': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
                <?php break;
                    case 'sh22': ?> <h1>ระดับตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh33': ?> <h1>องค์ประกอบตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh44': ?> <h1>คำอธิบายระดับของแต่ละองค์ประกอบ - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh55': ?> <h1>การประเมินผลสถานศึกษา</h1>
                <?php break;
                    case 'sh66': ?> <h1>การประเมินตามตัวชี้วัด</h1>
                <?php break;
                    case 'sh77': ?> <h1>ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
                <?php break;
                    case 'sh88': ?> <h1>การประเมินสถานศึกษา</h1>
                <?php break;
                    default: ?>
                <?php break;
                } ?>
                <?php echo br(2); ?>
                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">การประกันคุณภาพด้วยตัวชี้วัด</li>
                    </ol>
                </nav> -->
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="card">
                            <div class="card-body">

                                <?php if ($page == 'sh1') { ?>


                                <!-- start Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <form action="<?php echo site_url(
                                        'ass_ria_forms_up_p1'
                                    ); ?>" method="post">
                                    <h5 class="card-title"></h5>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ชื่อเกณฑ์" name="CriteriaName">
                                                <label for="Y"><?php echo nbs(2); ?> ชื่อเกณฑ์ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="CriteriaDescription"></textarea>
                                            <label for="Y"><?php echo nbs(5); ?>คำฮธิบายเกณฑ์ </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaLevelAmount">
                                                <label for="Y"><?php echo nbs(
                                                        2
                                                    ); ?> จำนวนระดับของตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด"
                                                    name="CriteriaCompositionAmount">
                                                <label for="Y"><?php echo nbs(
                                                        2
                                                    ); ?> จำนวนองค์ประกอบของตัวชี้วัด</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด"
                                                    name="CriteriaPassingScorePercentage">
                                                <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> คะแนนการผ่านเกณฑ์(%)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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
                                </form><!-- end Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <?php } ?>
                                <?php if ($page == 'sh11') { ?>

                                <?php

                                    $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA 
                            WHERE CriteriaID = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>

                                <!-- start Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <form action="<?php echo site_url('ass_ria_edit_p1'); ?>" method="post">

                                    <!-- <h5 class="card-title">ฟอร์มการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h5> -->
                                    <?php echo br(2); ?>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID"
                                                    value="<?php echo $show->CriteriaID ?>">

                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" id="floatingName"
                                            placeholder="รหัสตัวชี้วัด" name="CriteriaID"
                                            value="<?php echo $show->CriteriaID ?>">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ชื่อเกณฑ์" name="CriteriaName"
                                                    value="<?php echo $show->CriteriaName ?>">
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
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaLevelAmount"
                                                    value="<?php echo $show->CriteriaLevelAmount ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    จำนวนระดับของตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด"
                                                    name="CriteriaCompositionAmount"
                                                    value="<?php echo $show->CriteriaCompositionAmount ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    จำนวนองค์ประกอบของตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="จำนวนระดับของตัวชี้วัด"
                                                    name="CriteriaPassingScorePercentage"
                                                    value="<?php echo $show->CriteriaPassingScorePercentage ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    คะแนนการผ่านเกณฑ์(%)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <?php }
                                } ?>
                                <!-- ***************************************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh2') { ?>
                                <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                        'ass_ria_lvl_forms_up_p2'
                                    ); ?>" method="post" onsubmit="return checkSelectedOption()">
                                    <?php echo br(2); ?>


                                    <div class="row mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="" value="<?php echo $name ?>"
                                                    disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="CriteriaID"
                                                    value="<?php echo $key ?>">
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="" name="Id_ac" value="<?php echo $Id_ac ?>">
                                                <label for="Y"><?php echo nbs(1); ?> ตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <?php $columnValues = array();
                                                        $result = $this->db->query("SELECT LevelIndex FROM ASSESSMENT_CRITERIA_LEVEL WHERE Id_ac = $Id_ac AND DeleteStatus = 0");
                                                        foreach ($result->result() as $show) {
                                                            $columnValues[] = $show->LevelIndex;
                                                        }

                                                        $skipNumbers = $columnValues;
                                                        $min = 1;
                                                        $max = $lvl;
                                                        for ($i = $min; $i <= $max; $i++) {
                                                            if (in_array($i, $skipNumbers)) {
                                                                continue;
                                                            }
                                                            ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php

                                                        }
                                                        ?>

                                                </select>
                                                <label
                                                    for="floatingSelect"><?php echo nbs(2); ?>ลำดับของระดับตัวชี้วัด</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อระดับตัวชี้วัด" name="LevelName">
                                            <label for="Y"><?php echo nbs(
                                                    2
                                                ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore">
                                            <label for="Y"><?php echo nbs(
                                                    2
                                                ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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
                                </form><!-- end Form ข้อมูลระดับตัวชี้วัด -->
                                <script>
                                function checkSelectedOption() {
                                    const selectElement = document.querySelector('#CriteriaID');
                                    const selectedValue = selectElement.value;

                                    if (selectedValue === '-1') {
                                        alert('กรุณาเลือกตัวชี้วัด');
                                        return false;
                                    }
                                }
                                </script>
                                <?php } ?>
                                <?php if ($page == 'sh22') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php


                                    $resh2 = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL where Id = ' . "$key" . ' AND DeleteStatus = 0');
                                    foreach ($resh2->result() as $show) {
                                        $CriteriaID = $show->CriteriaID
                                            ?>




                                <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                            'ass_ria_lvl_edit_p2'
                                        ); ?>" method="post">
                                    <?php echo br(2); ?>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CriteriaID"
                                                    aria-label="Floating label select example" name="CriteriaID">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                            foreach ($result->result() as $cls) {
                                                                ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                            2
                                                        ); ?>รหัสตัวชี้วัด</label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="" name="Id" value="<?php echo $show->Id ?>">
                                        <input type="hidden" id="Id_ac" name="Id_ac" value="<?php echo $show->Id_ac ?>">

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <option value="<?php echo $show->LevelIndex ?>">
                                                        <?php echo $show->LevelIndex ?></option>
                                                    <?php $columnValues = array();
                                                            $result = $this->db->query("SELECT LevelIndex FROM ASSESSMENT_CRITERIA_LEVEL WHERE Id_ac = $Id_ac AND DeleteStatus = 0");
                                                            foreach ($result->result() as $shows) {
                                                                $columnValues[] = $shows->LevelIndex;
                                                            }

                                                            $skipNumbers = $columnValues;
                                                            $min = 1;
                                                            $max = $lvl;
                                                            for ($i = $min; $i <= $max; $i++) {
                                                                if (in_array($i, $skipNumbers)) {
                                                                    continue;
                                                                }
                                                                ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="floatingSelect"><?php echo nbs(2); ?>ลำดับของระดับตัวชี้วัด</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อระดับตัวชี้วัด" name="LevelName"
                                                value="<?php echo $show->LevelName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore"
                                                value="<?php echo $show->LevelScore ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form ข้อมูลระดับตัวชี้วัด -->

                                <script>
                                var select1 = document.getElementById("CriteriaID");
                                select1.addEventListener("change", function() {
                                    <?php

                                            $result_name = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA
                                ");

                                            foreach ($result_name->result() as $show_name) {
                                                ?>
                                    if (select1.value == "<?php echo $show_name->CriteriaID; ?>") {
                                        var x = document.getElementById("CriteriaID").value;
                                        document.getElementById("Id_ac").value = "<?php echo $show_name->Id; ?>"
                                    }
                                    <?php } ?>

                                });
                                ///ASSESSMENT_CRITERIA
                                var my_ASSESSMENT_CRITERIA = "<?php echo $show->CriteriaID; ?>";
                                var selectoption_ASSESSMENT_CRITERIA = document.querySelector('#CriteriaID');
                                var size_my_ASSESSMENT_CRITERIA = document.getElementById("CriteriaID").options
                                    .length;
                                for (let i = 0; i < size_my_ASSESSMENT_CRITERIA; i++) {
                                    if (selectoption_ASSESSMENT_CRITERIA[i].value ==
                                        my_ASSESSMENT_CRITERIA) {
                                        selectoption_ASSESSMENT_CRITERIA[i].selected = true;
                                    }
                                }
                                ///ASSESSMENT_CRITERIA_LEVEL
                                var my_ASSESSMENT_CRITERIA_LEVEL = "<?php echo $show->LevelIndex; ?>";
                                var selectoption_ASSESSMENT_CRITERIA_LEVEL = document.querySelector('#LevelIndex');
                                var size_my_ASSESSMENT_CRITERIA_LEVEL = document.getElementById("LevelIndex").options
                                    .length;
                                for (let i = 0; i < size_my_ASSESSMENT_CRITERIA_LEVEL; i++) {
                                    if (selectoption_ASSESSMENT_CRITERIA_LEVEL[i].value ==
                                        my_ASSESSMENT_CRITERIA_LEVEL) {
                                        selectoption_ASSESSMENT_CRITERIA_LEVEL[i].selected = true;
                                    }
                                }
                                </script>
                                <?php }
                                } ?>
                                <!-- *********************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh3') { ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                        'ass_ria_com_forms_up_p3'
                                    ); ?>" method="post">
                                    <!-- <h5 class="card-title">ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h5> -->
                                    <?php echo br(2); ?>


                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="" value="<?php echo $name ?>"
                                                    disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="CriteriaID"
                                                    value="<?php echo $key ?>">
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="" name="Id_ac" value="<?php echo $Id_ac ?>">
                                                <label for="Y"><?php echo nbs(1); ?> ตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CompositionIndex">

                                                    <?php $columnValues = array();
                                                        $result3 = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE Id_ac='" . $Id_ac . "' AND DeleteStatus = '0'");
                                                        foreach ($result3->result() as $shows3) {
                                                            $columnValues[] = $shows3->CompositionIndex;
                                                        }

                                                        $skipNumbers = $columnValues;
                                                        $min = 1;
                                                        $max = $lvl;
                                                        for ($i = $min; $i <= $max; $i++) {
                                                            if (in_array($i, $skipNumbers)) {
                                                                continue;
                                                            }
                                                            ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="floatingSelect"><?php echo nbs(2); ?>ลำดับองค์ประกอบตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="หัวข้อองค์ประกอบตัวชี้วัด" name="CompositionName">
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
                                                name="CompositionWeightScore">
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
                                                name="CompositionGuideline">
                                            <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <?php } ?>
                                <?php if ($page == 'sh33') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION 
                            WHERE Id = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                            'ass_ria_com_edit_p3'
                                        ); ?>" method="post">
                                    <h5 class="card-title"></h5>

                                    <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                    <input type="hidden" class="form-control" id="Id_ac" placeholder="" name="Id_ac"
                                        value="<?php echo $Id_ac ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CriteriaID"
                                                    aria-label="Floating label select example" name="CriteriaID">
                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                            foreach ($result->result() as $cls) {
                                                                ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                            2
                                                        ); ?>รหัสตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CompositionIndex">
                                                    <option value="<?php echo $show->CompositionIndex ?>">
                                                        <?php echo $show->CompositionIndex ?></option>
                                                    <?php $columnValues = array();
                                                            $result3 = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE Id_ac='" . $Id_ac . "' AND DeleteStatus = '0'");
                                                            foreach ($result3->result() as $shows3) {
                                                                $columnValues[] = $shows3->CompositionIndex;
                                                            }

                                                            $skipNumbers = $columnValues;
                                                            $min = 1;
                                                            $max = $lvl;
                                                            for ($i = $min; $i <= $max; $i++) {
                                                                if (in_array($i, $skipNumbers)) {
                                                                    continue;
                                                                }
                                                                ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="floatingSelect"><?php echo nbs(2); ?>ลำดับองค์ประกอบตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="หัวข้อองค์ประกอบตัวชี้วัด" name="CompositionName"
                                                    value="<?php echo $show->CompositionName ?>">
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
                                                name="CompositionWeightScore"
                                                value="<?php echo $show->CompositionWeightScore ?>">
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
                                                name="CompositionGuideline"
                                                value="<?php echo $show->CompositionGuideline ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <script>
                                var select1 = document.getElementById("CriteriaID");
                                select1.addEventListener("change", function() {
                                    <?php

                                            $result_name = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA
                                ");

                                            foreach ($result_name->result() as $show_name) {
                                                ?>
                                    if (select1.value == "<?php echo $show_name->CriteriaID; ?>") {
                                        var x = document.getElementById("CriteriaID").value;
                                        document.getElementById("Id_ac").value = "<?php echo $show_name->Id; ?>"
                                    }
                                    <?php } ?>

                                });
                                ///ASSESSMENT_CRITERIA
                                var my_ASSESSMENT_CRITERIA = "<?php echo $show->CriteriaID; ?>";
                                var selectoption_ASSESSMENT_CRITERIA = document.querySelector('#CriteriaID');
                                var size_my_ASSESSMENT_CRITERIA = document.getElementById("CriteriaID").options.length;
                                for (let i = 0; i < size_my_ASSESSMENT_CRITERIA; i++) {
                                    if (selectoption_ASSESSMENT_CRITERIA[i].value == my_ASSESSMENT_CRITERIA) {
                                        selectoption_ASSESSMENT_CRITERIA[i].selected = true;
                                    }
                                }
                                </script>
                                <?php }
                                } ?>
                                <!-- ***************************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh4') { ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <form action="<?php echo site_url(
                                        'ass_ria_com_lvl_forms_up_p4'
                                    ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h5>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CriteriaID">
                                                    <option selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex">
                                                <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex">
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
                                                name="CompositionLevelDescription">
                                            <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <?php } ?>
                                <?php if ($page == 'sh44') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL 
                            WHERE Id = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <form action="<?php echo site_url(
                                            'ass_ria_com_lvl_forms_up_p4'
                                        ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h5>
                                    <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CriteriaID">
                                                    <option selected>เลือก</option>
                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                            foreach ($result->result() as $cls) {
                                                                ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                            2
                                                        ); ?>รหัสตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex"
                                                    value="<?php echo $show->CompositionIndex ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex"
                                                    value="<?php echo $show->LevelIndex ?>">
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
                                                name="CompositionLevelDescription"
                                                value="<?php echo $show->CompositionLevelDescription ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <?php }
                                } ?>
                                <!-- ****************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh5') { ?>
                                <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                <form action="<?php echo site_url(
                                        'sc_ass_forms_up_p5'
                                    ); ?>" method="post">
                                    <h5 class="card-title"></h5>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำกระประเมิน"
                                                    name="SchoolAssessmentEducationYear">
                                                <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> ปีการศึกษาที่ทำกระประเมิน </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-control" id="SchoolAssessmentSemester"
                                                    name="SchoolAssessmentSemester">
                                                    <option value="">กรุณาเลือกภาคเรียนที่ทำการประเมิน</option>
                                                    <option value="0">ตลอดปีการศึกษา</option>
                                                    <option value="1">ภาคเรียนที่ 1</option>
                                                    <option value="2">ภาคเรียนที่ 2</option>
                                                    <option value="3">ภาคเรียนฤดูร้อน</option>
                                                </select>
                                                <label for="SchoolAssessmentSemester">ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-control" id="floatingSelect"
                                                    aria-label="Floating label select example" name="SchoolID">
                                                    <option selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->SchoolID; ?>">
                                                        <?= $cls->SchoolNameThai; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>สถานศึกษา</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
                                            <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="SchoolAssessmentDescription"></textarea>
                                            <label
                                                for="floatingTextarea2"><?php echo nbs(2); ?>คำอธิบายการประเมิน</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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
                                </form><!-- end Form ข้อมูลผลการประเมินโรงเรียน -->
                                <?php } ?>
                                <?php if ($page == 'sh55') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT 
                            WHERE Id = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                <form action="<?php echo site_url(
                                            'sc_ass_edit_p5'
                                        ); ?>" method="post">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำกระประเมิน"
                                                    name="SchoolAssessmentEducationYear"
                                                    value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?> ปีการศึกษาที่ทำกระประเมิน </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-control" id="SchoolAssessmentSemester"
                                                    name="SchoolAssessmentSemester">
                                                    <option value="">กรุณาเลือกภาคเรียนที่ทำการประเมิน</option>
                                                    <option value="0">ตลอดปีการศึกษา</option>
                                                    <option value="1">ภาคเรียนที่ 1</option>
                                                    <option value="2">ภาคเรียนที่ 2</option>
                                                    <option value="3">ภาคเรียนฤดูร้อน</option>
                                                </select>
                                                <label for="SchoolAssessmentSemester">ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="SchoolID"
                                                    aria-label="Floating label select example" name="SchoolID">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM SCHOOL');
                                                            foreach ($result->result() as $cls) {
                                                                ?>
                                                    <option value="<?= $cls->SchoolID; ?>">
                                                        <?= $cls->SchoolNameThai; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                            2
                                                        ); ?>รหัสสถานศึกษา</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName"
                                                value="<?php echo $show->SchoolAssessmentName ?>">
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
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form ข้อมูลผลการประเมินโรงเรียน -->
                                <script>
                                ///SchoolAs
                                var my_SchoolAs = "<?php echo $show->SchoolAssessmentSemester ?>";
                                var selectoption_SchoolAs = document.querySelector('#SchoolAssessmentSemester');
                                var size_my_SchoolAs = document.getElementById("SchoolAssessmentSemester").options
                                    .length;
                                for (let i = 0; i < size_my_SchoolAs; i++) {
                                    if (selectoption_SchoolAs[i].value == my_SchoolAs) {
                                        selectoption_SchoolAs[i].selected = true;
                                    }
                                }
                                ///SCHOOL
                                var my_SCHOOL = "<?php echo $show->SchoolID ?>";
                                var selectoption_SCHOOL = document.querySelector('#SchoolID');
                                var size_my_SCHOOL = document.getElementById("SchoolID").options.length;
                                for (let i = 0; i < size_my_SCHOOL; i++) {
                                    if (selectoption_SCHOOL[i].value == my_SCHOOL) {
                                        selectoption_SCHOOL[i].selected = true;
                                    }
                                }
                                </script>
                                </script>
                                <?php }
                                } ?>
                                <!-- ***************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh6') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                        'sc_ass_ria_forms_up_p6'
                                    ); ?>" method="post" enctype="multipart/form-data"
                                    onsubmit="return checkSelectedOption()">
                                    <h5 class="card-title"></h5>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                value="<?php echo $year ?>" disabled>
                                            <input type="hidden" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear" value="<?php echo $year; ?>">

                                            <input type="hidden" class="form-control" id="Id_sa" placeholder=""
                                                name="Id_sa" value="<?php echo $Id_ac ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?>
                                                ปีการศึกษาที่ทำการประเมิน </label>
                                        </div>
                                    </div>
                                    <?php
                                        if ($summer == 1) {
                                            $sum_name = "ภาคเรียนที่ 1";
                                        } elseif ($summer == 2) {
                                            $sum_name = "ภาคเรียนที่ 2";
                                        } elseif ($summer == 0) {
                                            $sum_name = "ตลอดปีการศึกษา";
                                        } elseif ($summer == 3) {
                                            $sum_name = "ภาคเรียนฤดูร้อน";
                                        }
                                        ?>
                                    <div class="row mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id=""
                                                    placeholder="ภาคเรียนที่ทำการประเมิน" name=""
                                                    value="<?php echo $sum_name; ?>" disabled>
                                                <input type="hidden" class="form-control" id="SchoolAssessmentSemester"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน"
                                                    name="SchoolAssessmentSemester" value="<?php echo $summer; ?>">

                                                <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?>
                                                    ปีการศึกษาที่ทำการประเมิน </label>
                                            </div>
                                            <!-- <div class="form-floating">
                                                <select class="form-select" id="SchoolAssessmentSemester"
                                                    name="SchoolAssessmentSemester">

                                                    <option value="0">ตลอดปีการศึกษา</option>
                                                    <option value="1">ภาคเรียนที่ 1</option>
                                                    <option value="2">ภาคเรียนที่ 2</option>
                                                    <option value="3">ภาคเรียนฤดูร้อน</option>
                                                </select>
                                                <label for="SchoolAssessmentSemester">ภาคเรียนที่ทำการประเมิน</label>
                                            </div> -->
                                        </div>



                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id=""
                                                    placeholder="ภาคเรียนที่ทำการประเมิน" name=""
                                                    value="<?php echo $SchoolNameThai; ?>" disabled>
                                                <input type="hidden" class="form-control" id="SchoolID"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolID"
                                                    value="<?php echo $SchoolID; ?>">

                                                <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?>
                                                    สถานศึกษา </label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="Id_ac" name="Id_ac">

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CriteriaID"
                                                    aria-label="Floating label select example" name="CriteriaID">
                                                    <option value="-1" selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>ตัวชี้วัด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนน" name="SchoolAssessmentScore">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="SchoolAssessmentCode"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">
                                                <option value="-1" selected>เลือก</option>
                                                <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_EVALUATION');
                                                    foreach ($result->result() as $cls) {
                                                        ?>
                                                <option value="<?= $cls->EVALUATION_CODE; ?>">
                                                    <?= $cls->EVALUATION_NAME; ?></option>
                                                <?php } ?>
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
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                    </h5>
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

                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->

                                <script>
                                ///ออโต้เทอม
                                // const input1 = document.getElementById('SchoolAssessmentSemester');
                                // const input2 = document.getElementById('SchoolAssessmentSemester2');

                                // input1.addEventListener('input', function() {
                                //     if (input1.value === '0') {
                                //         input2.value = 'ตลอดปีการศึกษา';
                                //     } else if (input1.value === '1'){
                                //         input2.value = 'ภาคเรียนที่ 1';
                                //     }else if (input1.value === '2'){
                                //         input2.value = 'ภาคเรียนที่ 2';
                                //     }else if (input1.value === '3'){
                                //         input2.value = 'ภาคเรียนฤดูร้อน';
                                //     }
                                // });
                                ///SUMMER
                                var select1 = document.getElementById("CriteriaID");
                                select1.addEventListener("change", function() {
                                    <?php

                                            $result_name1 = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA");

                                            foreach ($result_name1->result() as $show_name1) {
                                                ?>
                                    if (select1.value == "<?php echo $show_name1->CriteriaID; ?>") {
                                        var x = document.getElementById("CriteriaID").value;
                                        document.getElementById("Id_ac").value =
                                            "<?php echo $show_name1->Id; ?>"
                                    }
                                    <?php } ?>

                                });
                                var my_SUMMER = "<?php echo $summer; ?>";
                                var selectoption_SUMMER = document.querySelector('#SchoolAssessmentSemester');
                                var size_my_SUMMER = document.getElementById("SchoolAssessmentSemester").options.length;
                                for (let i = 0; i < size_my_SUMMER; i++) {
                                    if (selectoption_SUMMER[i].value == my_SUMMER) {
                                        selectoption_SUMMER[i].selected = true;
                                    }
                                }

                                function checkSelectedOption() {
                                    const CriteriaID = document.querySelector('#CriteriaID');
                                    const CriteriaID_Value = CriteriaID.value;

                                    if (CriteriaID_Value === '-1') {
                                        alert('กรุณาเลือกตัวชี้วัด');
                                        return false;
                                    }
                                    const EVALUATION_NAME = document.querySelector('#SchoolAssessmentCode');
                                    const EVALUATION_NAME_Value = EVALUATION_NAME.value;

                                    if (EVALUATION_NAME_Value === '-1') {
                                        alert('กรุณาเลือกผลการประเมิน');
                                        return false;
                                    }

                                }
                                </script>



                                </script>
                                <?php } ?>
                                <!-- ********************************************************************************************************************************************* -->
                                <?php if ($page == 'sh66') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                                    INNER JOIN SCHOOL
                ON SCHOOL_ASSESSMENT_CRITERIA.SchoolID = SCHOOL.SchoolID
                
                            WHERE Id = '" . $key . "' AND SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                            'sc_ass_ria_edit_p6'
                                        ); ?>" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                value="<?php echo $show->SchoolAssessmentEducationYear ?>" disabled>
                                            <input type="hidden" class="form-control" id="floatingName" placeholder=""
                                                name="SchoolAssessmentEducationYear"
                                                value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?>
                                                ปีการศึกษาที่ทำการประเมิน </label>
                                        </div>
                                    </div>
                                    <?php $summer = $show->SchoolAssessmentSemester;
                                            if ($summer == 1) {
                                                $sum_name = "ภาคเรียนที่ 1";
                                            } elseif ($summer == 2) {
                                                $sum_name = "ภาคเรียนที่ 2";
                                            } elseif ($summer == 0) {
                                                $sum_name = "ตลอดปีการศึกษา";
                                            } elseif ($summer == 3) {
                                                $sum_name = "ภาคเรียนฤดูร้อน";
                                            }
                                            ?>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน" name=""
                                                    value="<?php echo $sum_name ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียนที่ทำการประเมิน"
                                                    name="SchoolAssessmentSemester" value="<?php echo $summer ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?> ภาคเรียนที่ทำการประเมิน
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                    value="<?php echo $show->SchoolNameThai ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="" name="SchoolID"
                                                    value="<?php echo $show->SchoolID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?>
                                                    สถานศึกษา </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CriteriaID"
                                                    aria-label="Floating label select example" name="CriteriaID">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                            foreach ($result->result() as $cls) {
                                                                ?>
                                                    <option value="<?= $cls->CriteriaID; ?>">
                                                        <?= $cls->CriteriaName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                            2
                                                        ); ?>ตัวชี้วัด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName"
                                                value="<?php echo $show->AssessmentorName ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนน" name="SchoolAssessmentScore"
                                                value="<?php echo $show->SchoolAssessmentScore ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_EVALUATION');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                <option value="<?= $cls->EVALUATION_CODE; ?>">
                                                    <?= $cls->EVALUATION_NAME; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>ผลการประเมิน</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="oil_file" value="<?php echo $show->SchoolAssessmentAttachmentURL ?>">

                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมิน</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="SchoolAssessmentAttachmentURL"
                                                value="<?php echo $show->SchoolAssessmentAttachmentURL ?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล</h5>
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
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <script>
                                ///ASSESSMENT_CRITERIA
                                var my_ASSESSMENT_CRITERIA = "<?php echo $show->CriteriaID; ?>";
                                var selectoption_ASSESSMENT_CRITERIA = document.querySelector('#CriteriaID');
                                var size_my_ASSESSMENT_CRITERIA = document.getElementById("CriteriaID").options.length;
                                for (let i = 0; i < size_my_ASSESSMENT_CRITERIA; i++) {
                                    if (selectoption_ASSESSMENT_CRITERIA[i].value == my_ASSESSMENT_CRITERIA) {
                                        selectoption_ASSESSMENT_CRITERIA[i].selected = true;
                                    }
                                }

                                var select1 = document.getElementById("CriteriaID");
                                select1.addEventListener("change", function() {
                                    <?php

                                            $result_name = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA
                                ");

                                            foreach ($result_name->result() as $show_name) {
                                                ?>
                                    if (select1.value == "<?php echo $show_name->CriteriaID; ?>") {
                                        var x = document.getElementById("CriteriaID").value;
                                        document.getElementById("Id_ac").value = "<?php echo $show_name->Id; ?>"
                                    }
                                    <?php } ?>

                                });
                                </script>
                                <?php }
                                } ?>
                                <!-- *************************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh7') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('sc_ass_res_forms_up_p7'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <h5 class="card-title">ฟอร์มระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h5>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear">
                                            <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester">
                                            <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียนที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="SchoolID">
                                                    <option selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->SchoolID; ?>">
                                                        <?= $cls->SchoolNameThai; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสสถานศึกษา</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="CriteriaID">
                                                <option selected>เลือก</option>
                                                <?php
                                                    $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                    foreach ($result->result() as $cls) {
                                                        ?>
                                                <option value="<?= $cls->CriteriaID; ?>">
                                                    <?= $cls->CriteriaName; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                    2
                                                ); ?>รหัสตัวชี้วัด</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex">
                                    <label for="floatingName"><?php echo nbs(2); ?> ลำดับองค์ประกอบตัวชี้วัด
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ลำดับของระดับตัวชี้วัดที่ได้" name="LevelIndex">
                                    <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัดที่ได้
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                            </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <?php } ?>
                            <?php if ($page == 'sh77') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                            <?php

                                $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                            WHERE Id = '" . $key . "' 
                            ");

                                foreach ($result->result() as $show) {
                                    ?>
                            <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <form action="<?php echo site_url('sc_ass_res_forms_up_p7'); ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                <h5 class="card-title">ฟอร์มระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h5>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษาที่ทำการประเมิน" name="SchoolAssessmentEducationYear"
                                            value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester"
                                            value="<?php echo $show->SchoolAssessmentSemester ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียนที่ทำการประเมิน
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="SchoolID">
                                                <option selected>เลือก</option>
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                <option value="<?= $cls->SchoolID; ?>">
                                                    <?= $cls->SchoolNameThai; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสสถานศึกษา</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="CriteriaID">
                                                <option selected>เลือก</option>
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                <option value="<?= $cls->CriteriaID; ?>">
                                                    <?= $cls->CriteriaName; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสตัวชี้วัด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex"
                                            value="<?php echo $show->CompositionIndex ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ลำดับองค์ประกอบตัวชี้วัด
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ลำดับของระดับตัวชี้วัดที่ได้" name="LevelIndex"
                                            value="<?php echo $show->LevelIndex ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัดที่ได้
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล
                                                </h5>
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
                            </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <?php }
                            } ?>
                            <!-- *********************************************************************************************************************************************** -->
                            <?php if ($page == 'sh8') { ?>
                            <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <form action="<?php echo site_url('achie_ass_forms_up_p8'); ?>" method="post"
                                enctype="multipart/form-data">
                                <!-- <h5 class="card-title">ฟอร์มข้อมูลการประเมินสถานศึกษา</h5> -->
                                <?php echo br(2); ?>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษาที่ทำการประเมิน" name="AchievementAssessmentYear">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="SchoolID">
                                                <option selected>เลือก</option>
                                                <?php
                                                    $result = $this->db->query('SELECT * FROM SCHOOL');
                                                    foreach ($result->result() as $cls) {
                                                        ?>
                                                <option value="<?= $cls->SchoolID; ?>">
                                                    <?= $cls->SchoolNameThai; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                    2
                                                ); ?>รหัสสถานศึกษา</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
                                            <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription">
                                        <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คำอธิบายการประเมิน </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้ประเมิน" name="AssessmentorName">
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
                                            <input class="form-check-input" type="radio"
                                                name="AchievementAssessmentPassingFlag" id="gridRadios1" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ผ่าน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="AchievementAssessmentPassingFlag" id="gridRadios2" value="1">
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
                                <div class="text-center">
                                    <a href="list-teacher_development_activity" class="btn btn-danger"
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
                            </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <?php } ?>
                            <?php if ($page == 'sh88') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                            <?php

                                $result = $this->db->query("SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                            WHERE Id = '" . $key . "' 
                            ");

                                foreach ($result->result() as $show) {
                                    ?>
                            <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <form action="<?php echo site_url('achie_ass_edit_p8'); ?>" method="post"
                                enctype="multipart/form-data">
                                <h5 class="card-title"></h5>
                                <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษาที่ทำการประเมิน" name="AchievementAssessmentYear"
                                            value="<?php echo $show->AchievementAssessmentYear ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="SchoolID"
                                                aria-label="Floating label select example" name="SchoolID">
                                                <option selected>เลือก</option>
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL');
                                                        foreach ($result->result() as $cls) {
                                                            ?>
                                                <option value="<?= $cls->SchoolID; ?>">
                                                    <?= $cls->SchoolNameThai; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสสถานศึกษา</label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName"
                                                value="<?php echo $show->SchoolAssessmentName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription"
                                            value="<?php echo $show->SchoolAssessmentDescription ?>">
                                        <label for="floatingName"><?php echo nbs(
                                                    2
                                                ); ?> คำอธิบายการประเมิน </label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้ประเมิน" name="AssessmentorName"
                                            value="<?php echo $show->AssessmentorName ?>">
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
                                            <input class="form-check-input" type="radio"
                                                name="AchievementAssessmentPassingFlag" id="gridRadios1" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                ไม่ผ่าน
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="AchievementAssessmentPassingFlag" id="gridRadios2" value="1">
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
                                <input type="hidden" name="oil_file" value="<?php echo $show->AchievementAssessmentAttachmentURL ?>">
                                <div class="text-center">
                                    <a href="list-teacher_development_activity" class="btn btn-danger"
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล
                                                </h5>
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
                            </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                            <script>
                            let semester =<?php echo $show->AchievementAssessmentPassingFlag ?>
                            // รับค่าภาคเรียนที่เลือกจากฟอร์ม
                            let radioBtn1 = document.getElementById("gridRadios1");
                            let radioBtn2 = document.getElementById("gridRadios2");

                            if (semester == 1) {
                                radioBtn1.checked = false;
                                radioBtn2.checked = true;
                            } else if (semester == 0) {
                                radioBtn1.checked = true;
                                radioBtn2.checked = false;
                            }
                           

                            ///SCHOOL
                            var my_SCHOOL = "<?php echo $show->SchoolID; ?>";
                            var selectoption_SCHOOL = document.querySelector('#SchoolID');
                            var size_my_SCHOOL = document.getElementById("SchoolID").options.length;
                            for (let i = 0; i < size_my_SCHOOL; i++) {
                                if (selectoption_SCHOOL[i].value == my_SCHOOL) {
                                    selectoption_SCHOOL[i].selected = true;
                                }
                            }
                            
                        
                        </script>
                            </script>
                            <?php }
                            } ?>
                        </div>
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