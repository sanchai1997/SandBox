<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
<?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
<?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<?php $lvl = isset($_GET['lvl']) ? $_GET['lvl'] : ''; ?>
<?php $Id = isset($_GET['Id']) ? $_GET['Id'] : ''; ?>
<?php $Id_acc = isset($_GET['Id_acc']) ? $_GET['Id_acc'] : ''; ?>
<?php $year = isset($_GET['year']) ? $_GET['year'] : ''; ?>
<?php $summer = isset($_GET['summer']) ? $_GET['summer'] : ''; ?>
<?php $SchoolNameThai = isset($_GET['SchoolNameThai']) ? $_GET['SchoolNameThai'] : ''; ?>
<?php $SchoolID = isset($_GET['SchoolID']) ? $_GET['SchoolID'] : ''; ?>
<?php $CriteriaID = isset($_GET['CriteriaID']) ? $_GET['CriteriaID'] : ''; ?>
<?php $Id_accl = isset($_GET['Id_accl']) ? $_GET['Id_accl'] : ''; ?>
<main id="main" class="main">
    <style>
    label[for="Y"]:after {
        content: " *";
        color: red;
    }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <div class="pagetitle">
        <?php if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
                <?php switch ($page) {
                    case 'sh1': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
                <?php break;
                    case 'sh2': ?> <h1>ระดับตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh3': ?> <h1>องค์ประกอบตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh4': ?> <h1>คำอธิบายแต่ละองค์ประกอบและลำดับตัวชี้วัด </h1>
                <?php break;
                    case 'sh5': ?> <h1>การประเมินสถานศึกษา</h1>
                <?php break;
                    case 'sh6': ?> <h1>การประเมินตามตัวชี้วัด</h1>
                <?php break;
                    case 'sh7': ?> <h1>เกณฑ์การประเมินโรงเรียน</h1>
                <?php break;
                    case 'sh8': ?> <h1>ผลการประเมินสถานศึกษา</h1>
                <?php break;
                    case 'sh11': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
                <?php break;
                    case 'sh22': ?> <h1>ระดับตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh33': ?> <h1>องค์ประกอบตัวชี้วัด - <?php echo $name; ?></h1>
                <?php break;
                    case 'sh44': ?> <h1>คำอธิบายแต่ละองค์ประกอบและลำดับตัวชี้วัด </h1>
                <?php break;
                    case 'sh55': ?> <h1>การประเมินสถานศึกษา</h1>
                <?php break;
                    case 'sh66': ?> <h1>การประเมินตามตัวชี้วัด</h1>
                <?php break;
                    case 'sh77': ?> <h1>เกณฑ์การประเมินโรงเรียน</h1>
                <?php break;
                    case 'sh88': ?> <h1>ผลการประเมินสถานศึกษา</h1>
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
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
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
                                            <label for="Y"><?php echo nbs(5); ?>คำอธิบายเกณฑ์ </label>
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
                            AND DeleteStatus = '0'
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>

                                <!-- start Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <form action="<?php echo site_url('ass_ria_edit_p1'); ?>" method="post">
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <!-- <h5 class="card-title">ฟอร์มการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h5> -->
                                    <?php echo br(2); ?>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name=""
                                                    value="<?php echo $show->CriteriaID ?>" disabled>

                                                    <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID"
                                                    value="<?php echo $show->CriteriaID ?>">

                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="Id"
                                                    value="<?php echo $show->Id ?>">

                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ชื่อเกณฑ์" name="CriteriaName"
                                                    value="<?php echo $show->CriteriaName ?>">
                                                <label for="Y"><?php echo nbs(2); ?> ชื่อเกณฑ์ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="CriteriaDescription"><?php echo $show->CriteriaDescription ?></textarea>
                                            <label for="floatingTextarea2"><?php echo nbs(2); ?>คำอธิบายเกณฑ์ </label>
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
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <?php echo br(2); ?>


                                    <div class="row mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="" value="<?php echo $key ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="index" value="<?php echo $key ?>">
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="" name="CriteriaID" value="<?php echo $Id ?>">
                                                <label for="Y"><?php echo nbs(1); ?> ตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <?php $columnValues = array();
                                                        // รับค่า id จาก AJAX

                                                        ?>



                                                    <?php $k = 0;
                                                        $result = $this->db->query("SELECT LevelIndex FROM ASSESSMENT_CRITERIA_LEVEL WHERE CriteriaID = $Id AND DeleteStatus = 0");
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
                                                    <?php $k++; } ?>

                                                </select>
                                                <label
                                                    for="Y"><?php echo nbs(2); ?>ลำดับของระดับตัวชี้วัด</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อระดับตัวชี้วัด" name="LevelName" required>
                                            <label for="Y"><?php echo nbs(
                                                                    2
                                                                ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore" required>
                                            <label for="Y"><?php echo nbs(
                                                                    2
                                                                ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                            <?php if($k !='0'){ ?>  
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>  <?php } ?>
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


                                    $resh2 = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL where Id_acl = ' . "$key" . ' AND DeleteStatus = 0');
                                    foreach ($resh2->result() as $show) {
                                        $CriteriaID = $show->CriteriaID
                                    ?>




                                <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                                            'ass_ria_lvl_edit_p2'
                                                        ); ?>" method="post">
                                    <?php echo br(2); ?>
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                        $resultC = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where Id = ' . "$CriteriaID" . ' AND DeleteStatus = 0');
                                                        foreach ($resultC->result() as $clsC) {
                                                        ?>
                                                <input type="text" class="form-control" id=""
                                                    placeholder="รหัสตัวชี้วัด" name=""
                                                    value="<?php echo $clsC->CriteriaID; ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="index"
                                                    value="<?php echo $clsC->CriteriaID; ?>">
                                                <input type="hidden" class="form-control" placeholder="รหัสตัวชี้วัด"
                                                    name="CriteriaID" value="<?php echo $CriteriaID; ?>">
                                                <?php } ?>
                                                <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                    รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="" name="Id_acl" value="<?php echo $show->Id_acl ?>">


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <option value="<?php echo $show->LevelIndex ?>">
                                                        <?php echo $show->LevelIndex ?></option>
                                                    <?php
                                                     $columnValues = array();
                                                            $result = $this->db->query("SELECT LevelIndex FROM ASSESSMENT_CRITERIA_LEVEL WHERE CriteriaID = $CriteriaID AND DeleteStatus = 0");
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
                                                value="<?php echo $show->LevelName ?>" required>
                                            <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore"
                                                value="<?php echo $show->LevelScore ?>" required>
                                            <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                        <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#del_com<?php echo $show->Id_acl; ?>"><i
                                                class="bi bi-trash"></i>
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
                                <!-- Modal -->
                                <div class="modal fade" id="del_com<?php echo $show->Id_acl; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล
                                                    <?php echo nbs(2); ?>
                                                    <?php echo $show->LevelName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('ass_ria_lvl_del_p2'); ?>">
                                                    <input type="hidden" name="UserName"
                                                        value="<?php echo $UserName; ?>">
                                                    <input type="hidden" name="Id_acl"
                                                        value="<?php echo $show->Id_acl; ?>">
                                                    <input type="hidden" name="index"
                                                        value="<?php echo $clsC->CriteriaID; ?>">
                                                    <input type="hidden" name="LevelIndex"
                                                        value="<?php echo $show->LevelIndex; ?>">
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

                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="" value="<?php echo $key ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="index" value="<?php echo $key ?>">
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="CriteriaID" value="<?php echo $Id ?>">

                                                <label for="Y"><?php echo nbs(1); ?> รหัสตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CompositionIndex">

                                                    <?php
                                                    $k = 0;
                                                    $columnValues = array();
                                                        $result3 = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE CriteriaID='" . $Id . "' AND DeleteStatus = '0'");
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
                                                    <?php $k++; } ?>

                                                </select>
                                                <label
                                                    for="Y"><?php echo nbs(2); ?>ลำดับองค์ประกอบตัวชี้วัด</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="หัวข้อองค์ประกอบตัวชี้วัด" name="CompositionName" required>
                                                <label for="Y"><?php echo nbs(
                                                                                    2
                                                                                ); ?> หัวข้อองค์ประกอบตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName"
                                                placeholder="ค่าน้ำหนักการประเมินตัวชี้วัด"
                                                name="CompositionWeightScore" step="0.01" required>
                                            <label for="Y"><?php echo nbs(
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
                                                                            ); ?>
                                                หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                          <?php if($k !='0'){ ?>                                      
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>
                                            <?php } ?>
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
                            WHERE Id_acc = '" . $Id_acc . "' AND DeleteStatus = 0
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                                            'ass_ria_com_edit_p3'
                                                        ); ?>" method="post">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">

                                    <input type="hidden" class="form-control" id="Id_acc" placeholder="" name="Id_acc"
                                        value="<?php echo $Id_acc ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                        $resultC = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where Id = ' . "$Id" . ' AND DeleteStatus = 0');
                                                        foreach ($resultC->result() as $clsC) {
                                                        ?>
                                                <input type="text" class="form-control" id=""
                                                    placeholder="รหัสตัวชี้วัด" name=""
                                                    value="<?php echo $clsC->CriteriaID; ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ตัวชี้วัด" name="index"
                                                    value="<?php echo $clsC->CriteriaID; ?>">
                                                <input type="hidden" class="form-control" placeholder="รหัสตัวชี้วัด"
                                                    name="CriteriaID" value="<?php echo $Id; ?>">
                                                <?php } ?>
                                                <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                    รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="CompositionIndex">
                                                    <option value="<?php echo $show->CompositionIndex ?>">
                                                        <?php echo $show->CompositionIndex ?></option>
                                                    <?php $columnValues = array();
                                                            $result3 = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE CriteriaID='" . $Id . "' AND DeleteStatus = '0'");
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
                                                    value="<?php echo $show->CompositionName ?>" required>
                                                <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?> หัวข้อองค์ประกอบตัวชี้วัด
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName"
                                                placeholder="ค่าน้ำหนักการประเมินตัวชี้วัด"
                                                name="CompositionWeightScore"
                                                value="<?php echo $show->CompositionWeightScore ?>" step="0.01" required>
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
                                                                                ); ?>
                                                หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                        <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#del_com<?php echo $show->Id_acc; ?>"><i
                                                class="bi bi-trash"></i>
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
                                <!-- Modal -->
                                <div class="modal fade" id="del_com<?php echo $show->Id_acc; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล
                                                    <?php echo nbs(2); ?>
                                                    <?php echo $show->CompositionName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('ass_ria_com_del_p3'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id_acc; ?>">
                                                    <input type="hidden" name="UserName"
                                                        value="<?php echo $UserName; ?>">
                                                    <input type="hidden" name="CompositionIndex"
                                                        value="<?php echo $show->CompositionIndex; ?>">
                                                    <input type="hidden" name="index"
                                                        value="<?php echo $clsC->CriteriaID; ?>">
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
                                                    ); ?>" method="post" onsubmit="return checkSelectedOption()">
                                        <h5 class="card-title"></h5>
                                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="CriteriaID" aria-label="Floating label select example" name="CriteriaID" onchange="updateInput(this)">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where DeleteStatus = 0
                                                        ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <option value="<?php echo $cls->Id; ?>">
                                                                <?= $cls->CriteriaID; ?> </option>
                                                          
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>รหัสตัวชี้วัด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="myInput" name="CriteriaID_index">
                                    <script>
                                        function updateInput(selectElement) {
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var selectedText = selectedOption.text;
  var inputElement = document.getElementById('myInput');
  inputElement.value = selectedText;
}
                                    </script>
                                    <div class="row mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="LevelIndex"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <option value="-1" selected>เลือก</option>

                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL 
                                                      where DeleteStatus = 0
                                                        
                                                        ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->CriteriaID; ?>"
                                                        value="<?= $cls->LevelIndex; ?>">
                                                        <?= $cls->LevelIndex; ?>. <?= $cls->LevelName; ?></option>
                                                    <?php } ?>
                                                    <option value="0">เลือก</option>
                                                </select>
                                                <label for="Y"><?php echo nbs(
                                                                                2
                                                                            ); ?>ลำดับของระดับตัวชี้วัด</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CompositionIndex"
                                                    aria-label="Floating label select example" name="CompositionIndex">
                                                    <option value="-1" selected>เลือก</option>

                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->CriteriaID; ?>"
                                                        value="<?= $cls->CompositionIndex; ?>">
                                                        <?= $cls->CompositionIndex; ?>. <?= $cls->CompositionName; ?>
                                                    </option>
                                                    <?php } ?>
                                                    <option value="0">เลือก</option>
                                                </select>
                                                <label
                                                    for="CompositionIndex"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>ลำดับองค์ประกอบตัวชี้วัด</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คำอธิบายระดับของแต่ละองค์ประกอบ"
                                                name="CompositionLevelDescription" required>
                                            <label for="floatingName"><?php echo nbs(
                                                                                2
                                                                            ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ
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
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                <script>
                                function checkSelectedOption() {
                                    const CriteriaID = document.querySelector('#CriteriaID');
                                    const CriteriaID_Value = CriteriaID.value;

                                    if (CriteriaID_Value === '-1') {
                                        alert('กรุณาเลือกตัวชี้วัด');
                                        return false;
                                    }
                                    const LevelIndex = document.querySelector('#LevelIndex');
                                    const LevelIndex_Value = LevelIndex.value;

                                    if (LevelIndex_Value === '-1') {
                                        alert('กรุณาเลือกระดับตัวชี้วัด');
                                        return false;
                                    }
                                    const CompositionIndex = document.querySelector('#CompositionIndex');
                                    const CompositionIndex_Value = CompositionIndex.value;

                                    if (CompositionIndex_Value === '-1') {
                                        alert('กรุณาเลือกองค์ประกอบ');
                                        return false;
                                    }
                                }
                                </script>
                                </script>
                                <!-- <script>
                                $(document).ready(function() {
                                    // ซ่อน select ทั้งสองตั้งแต่เริ่มต้น
                                    $("#LevelIndex, #CompositionIndex").hide();
                                    // ซ่อน label ของ select ทั้งสองตั้งแต่เริ่มต้น
                                    $("label[for='LevelIndex'], label[for='CompositionIndex']").hide();

                                    // เมื่อเลือก radio จะเลือก select ที่เกี่ยวข้อง
                                    $("input[name='selectOption']").change(function() {
                                        // ถ้าเลือก radio 1 ให้แสดง select 1 และซ่อน select 2
                                        if ($(this).val() == "1") {
                                            $("#LevelIndex").show();
                                            $("#CompositionIndex").hide();
                                            // เลือก option ที่ 3 ของ select 1
                                            // $("#CompositionIndex").val(0);
                                            // แสดง label ของ select 1 และซ่อน label ของ select 2
                                            $("label[for='LevelIndex']").show();
                                            $("label[for='CompositionIndex']").hide();
                                        }
                                        // ถ้าเลือก radio 2 ให้แสดง select 2 และซ่อน select 1
                                        else if ($(this).val() == "2") {
                                            $("#CompositionIndex").show();
                                            $("#LevelIndex").hide();
                                            // เลือก option ที่ 3 ของ select 2
                                            // $("#LevelIndex").val(0);
                                            // แสดง label ของ select 2 และซ่อน label ของ select 1
                                            $("label[for='CompositionIndex']").show();
                                            $("label[for='LevelIndex']").hide();
                                        }
                                    });

                                    // ตั้งค่า selected เป็น 0 เมื่อไม่ได้เลือกใช้ select
                                    $("input[name='selectOption']:not(:checked)").each(function() {
                                        if ($(this).val() == "1") {
                                            $("#LevelIndex").val(0);
                                        } else if ($(this).val() == "2") {
                                            $("#CompositionIndex").val(0);
                                        }
                                    });
                                });
                                </script> -->
                                <script>
                                $(document).ready(function() {
                                    $("#CompositionIndex").children('option').hide();
                                    $("#LevelIndex").children('option').hide();

                                    $("#CriteriaID").change(function() {
                                        var selectedCriteriaID = $(this).val();
                                        $("#CompositionIndex option").hide();
                                        $("#CompositionIndex option[id='" + selectedCriteriaID + "']")
                                            .show();
                                        $("#LevelIndex option").hide();
                                        $("#LevelIndex option[id='" + selectedCriteriaID + "']").show();
                                    });
                                });


                                function checkSelectedOption() {
                                    const ASSESSMENT_CRITERIA = document.querySelector('#CriteriaID');
                                    const ASSESSMENT_CRITERIA_Value = ASSESSMENT_CRITERIA.value;

                                    if (ASSESSMENT_CRITERIA_Value === '-1') {
                                        alert('กรุณาเลือกรหัสชี้วัด');
                                        return false;
                                    }
                                    const ASSESSMENT_CRITERIA_LEVEL = document.querySelector('#CompositionIndex');
                                    const ASSESSMENT_CRITERIA_LEVEL_Value = ASSESSMENT_CRITERIA_LEVEL.value;

                                    if (ASSESSMENT_CRITERIA_LEVEL_Value === '-1') {
                                        alert('กรุณาเลือกลำดับองค์ประกอบตัวชี้วัด');
                                        return false;
                                    }
                                    const ASSESSMENT_CRITERIA_COMPOSITION = document.querySelector('#LevelIndex');
                                    const ASSESSMENT_CRITERIA_COMPOSITION_Value = ASSESSMENT_CRITERIA_COMPOSITION.value;

                                    if (ASSESSMENT_CRITERIA_COMPOSITION_Value === '-1') {
                                        alert('กรุณาเลือกลำดับของระดับตัวชี้วัด');
                                        return false;
                                    }

                                }
                                </script>
                                </script>
                                <?php } ?>

                                <?php if ($page == 'sh44') {

                                ?>

                                <?php


                                    $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION_LEVEL 
                            WHERE Id_accl  = '" . $Id_accl . "' AND DeleteStatus = 0
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <form action="<?php echo site_url(
                                                            'ass_ria_com_lvl_edit_p4'
                                                        ); ?>" method="post">
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="Id_accl" value="<?php echo $show->Id_accl ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                        $resultC = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where Id = ' . "$show->CriteriaID" . ' AND DeleteStatus = 0');
                                                        foreach ($resultC->result() as $clsC) {
                                                        ?>
                                                            <input type="text" class="form-control" id="" placeholder="รหัสตัวชี้วัด" name="" value="<?php echo $clsC->CriteriaID; ?>" disabled>
                                                            <input type="hidden" class="form-control" placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $clsC->Id; ?>">
                                                        <?php } ?>
                                                        <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                            รหัสตัวชี้วัด </label>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row mb-3">
                                                <!-- <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="gridRadios1" name="selectOption"
                                                    value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    ลำดับของระดับตัวชี้วัด
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="gridRadios2" type="radio" name="selectOption"
                                                    value="2" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    ลำดับองค์ประกอบตัวชี้วัด
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="LevelIndex"
                                                    aria-label="Floating label select example" name="LevelIndex">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option id="<?= $cls->CriteriaID; ?>"
                                                        value="<?= $cls->LevelIndex; ?>">
                                                        <?= $cls->LevelName; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="LevelIndex"><?php echo nbs(
                                                                                    2
                                                                                ); ?>ลำดับของระดับตัวชี้วัด</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CompositionIndex"
                                                    aria-label="Floating label select example" name="CompositionIndex">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option id="<?= $cls->CriteriaID; ?>"
                                                        value="<?= $cls->CompositionIndex; ?>">
                                                        <?= $cls->CompositionName; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="CompositionIndex"><?php echo nbs(
                                                                                            2
                                                                                        ); ?>ลำดับองค์ประกอบตัวชี้วัด</label>
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
                                                                                ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p1?page=sh1" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                        <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#ass_ria_com_lvl_del_p4<?php echo $show->Id_accl; ?>"><i
                                                class="bi bi-trash"></i>
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
                                <!-- Modal -->
                                <div class="modal fade" id="ass_ria_com_lvl_del_p4<?php echo $show->Id_accl; ?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <p
                                                        style="width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        ยืนยันการลบข้อมูล
                                                        <?php echo nbs(2); ?>
                                                        <?php echo $show->CompositionLevelDescription; ?></p>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <form method="post" action="<?php echo site_url('ass_ria_com_lvl_del_p4'); ?>">
                                                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                                            <input type="hidden" name="Id_accl" value="<?php echo $show->Id_accl; ?>">
                                                            <input type="hidden" name="LevelIndex" value="<?php echo $show->LevelIndex; ?>">
                                                            <input type="hidden" name="CompositionIndex" value="<?php echo $show->CompositionIndex; ?>">
                                                            <div class="d-flex justify-content-center">
                                                                <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Modal -->
                                        <script>
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
                                            ///ASSESSMENT_CRITERIA_COMPOSITION
                                            var my_ASSESSMENT_CRITERIA_COMPOSITION = "<?php echo $show->CompositionIndex; ?>";
                                            var selectoption_ASSESSMENT_CRITERIA_COMPOSITION = document.querySelector(
                                                '#CompositionIndex');
                                            var size_my_ASSESSMENT_CRITERIA_COMPOSITION = document.getElementById(
                                                    "CompositionIndex")
                                                .options.length;
                                            for (let i = 0; i < size_my_ASSESSMENT_CRITERIA_COMPOSITION; i++) {
                                                if (selectoption_ASSESSMENT_CRITERIA_COMPOSITION[i].value ==
                                                    my_ASSESSMENT_CRITERIA_COMPOSITION) {
                                                    selectoption_ASSESSMENT_CRITERIA_COMPOSITION[i].selected = true;
                                                }
                                            }
                                        </script>
                                        </script>
                                        <!-- <script>
                                $(document).ready(function() {
                                    // ซ่อน select ทั้งสองตั้งแต่เริ่มต้น
                                    $("#LevelIndex, #CompositionIndex").hide();
                                    // ซ่อน label ของ select ทั้งสองตั้งแต่เริ่มต้น
                                    $("label[for='LevelIndex'], label[for='CompositionIndex']").hide();

                                    // เมื่อเลือก radio จะเลือก select ที่เกี่ยวข้อง
                                    $("input[name='selectOption']").change(function() {
                                        // ถ้าเลือก radio 1 ให้แสดง select 1 และซ่อน select 2
                                        if ($(this).val() == "1") {
                                            $("#LevelIndex").show();
                                            $("#CompositionIndex").hide();
                                            // เลือก option ที่ 3 ของ select 1
                                            // $("#CompositionIndex").val(0);
                                            // แสดง label ของ select 1 และซ่อน label ของ select 2
                                            $("label[for='LevelIndex']").show();
                                            $("label[for='CompositionIndex']").hide();
                                        }
                                        // ถ้าเลือก radio 2 ให้แสดง select 2 และซ่อน select 1
                                        else if ($(this).val() == "2") {
                                            $("#CompositionIndex").show();
                                            $("#LevelIndex").hide();
                                            // เลือก option ที่ 3 ของ select 2
                                            // $("#LevelIndex").val(0);
                                            // แสดง label ของ select 2 และซ่อน label ของ select 1
                                            $("label[for='CompositionIndex']").show();
                                            $("label[for='LevelIndex']").hide();
                                        }
                                    });

                                    // ตั้งค่า selected เป็น 0 เมื่อไม่ได้เลือกใช้ select
                                    // $("input[name='selectOption']:not(:checked)").each(function() {
                                    //     if ($(this).val() == "1") {
                                    //         $("#LevelIndex").val(0);
                                    //     } else if ($(this).val() == "2") {
                                    //         $("#CompositionIndex").val(0);
                                    //     }
                                    // });
                                });
                                </script> -->
                                <!-- <script>
                                   // ดึงค่า Select Elements โดยใช้ ID
var selectElement1 = document.getElementById("LevelIndex");
var selectElement2 = document.getElementById("CompositionIndex");

// เมื่อเลือกตัวเลือกใดๆใน Select Element จะเกิดการเรียกฟังก์ชันนี้
selectElement1.addEventListener("change", checkSelectValues);
selectElement2.addEventListener("change", checkSelectValues);

function checkSelectValues() {
  // ตรวจสอบว่าค่าที่ถูกเลือกในทั้ง 2 Select Elements เท่ากับ 0 หรือไม่
  if (selectElement1.value != "0" ) {
    // ถ้ามีอย่างน้อย 1 ตัวเลือกที่มีค่าเป็น 0 ให้เปลี่ยนค่า option ในทั้ง 2 Select Elements เป็นค่าเริ่มต้น (default value)
   
    selectElement2.value = "0";
    // แสดง Alert เมื่อมีตัวเลือกที่มีค่าเป็น 0
    alert("กรุณาเลือกอย่างเดียว");
   } else if ( selectElement2.value != "0") {
    // ถ้ามีอย่างน้อย 1 ตัวเลือกที่มีค่าเป็น 0 ให้เปลี่ยนค่า option ในทั้ง 2 Select Elements เป็นค่าเริ่มต้น (default value)
    selectElement1.value = "0";
   
    // แสดง Alert เมื่อมีตัวเลือกที่มีค่าเป็น 0
    alert("กรุณาเลือกอย่างเดียว");
  } else {
    // ถ้าไม่มีตัวเลือกใดๆที่มีค่าเป็น 0 ให้ทำงานอื่นๆต่อไปตามต้องการ
    // เช่น ส่งข้อมูลไปยังเซิร์ฟเวอร์
    // หรือแสดงผลลัพธ์ในหน้าเว็บ
    console.log("เลือกตัวเลือกสำเร็จ");
  }
}

                        </script> -->
                                </script>
                                <?php }
                                } ?>
                                <!-- ****************************************************************************************************************************************************** -->
                                <?php if ($page == 'sh5') { ?>
                                <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                <form action="<?php echo site_url(
                                                        'sc_ass_forms_up_p5'
                                                    ); ?>" method="post">
                                    <h5 class="card-title"></h5> <input type="hidden" name="UserName"
                                        value="<?php echo $UserName; ?>">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำกระประเมิน"
                                                    name="SchoolAssessmentEducationYear">
                                                <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> ปีการศึกษาที่ทำกระประเมิน
                                                </label>
                                            </div>
                                        </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-control" id="SchoolAssessmentSemester" name="SchoolAssessmentSemester">
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
                                                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example" name="SchoolID">
                                                        <option selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL where DeleteStatus = 0 ');
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
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
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
                                        <a href="Fm_evaluation_das_p4?page=sh4" class="btn btn-danger"
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
                                    INNER JOIN SEMESTER 
                                    ON SEMESTER.SEMESTER_CODE  = SCHOOL_ASSESSMENT.SchoolAssessmentSemester
                            WHERE Id_sa = '" . $key . "' AND  DeleteStatus = 0 
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                <form action="<?php echo site_url(
                                                            'sc_ass_edit_p5'
                                                        ); ?>" method="post">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="Id_sa" value="<?php echo $show->Id_sa ?>">
                                    <div class="row mb-3">
                                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                    value="<?php echo $show->SchoolAssessmentEducationYear ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                    name="SchoolAssessmentEducationYear"
                                                    value="<?php echo $show->SchoolAssessmentEducationYear ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    ปีการศึกษาที่ทำการประเมิน
                                                </label>
                                            </div>
                                        </div>


                                                <?php
                                                $summer = $show->SchoolAssessmentSemester;
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
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="" placeholder="ภาคเรียนที่ทำการประเมิน" name="" value="<?php echo $sum_name; ?>" disabled>
                                                        <input type="hidden" class="form-control" id="SchoolAssessmentSemester" placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester" value="<?php echo $summer; ?>">

                                                        <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                            ภาคเรียนที่ทำการประเมิน </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <?php
                                                        $SchoolID = $show->SchoolID;
                                                        $result = $this->db->query('SELECT * FROM SCHOOL where SchoolID = ' . "$SchoolID" . '');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <input type="text" class="form-control" id="" placeholder="ภาคเรียนที่ทำการประเมิน" name="" value="<?php echo $cls->SchoolNameThai; ?>" disabled>
                                                            <input type="hidden" class="form-control" placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolID" value="<?php echo $SchoolID; ?>">
                                                        <?php } ?>
                                                        <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                            สถานศึกษา </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" placeholder="ชื่อการประเมิน" name="SchoolAssessmentName" value="<?php echo $show->SchoolAssessmentName ?>">
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
                                        <a href="Fm_evaluation_das_p4?page=sh4" class="btn btn-danger"
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
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <div class="row mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="SchoolAssessmentEducationYear"
                                                    aria-label="Floating label select example"
                                                    name="SchoolAssessmentEducationYear">
                                                    <option value="-1" selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT where DeleteStatus = 0 GROUP BY SchoolAssessmentEducationYear');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option value="<?= $cls->SchoolAssessmentEducationYear; ?>">
                                                        <?= $cls->SchoolAssessmentEducationYear; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>ปีการศึกษาที่ทำการประเมิน</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <!-- <div class="col">
                                            
                                            <div class="form-floating">
                                                <select class="form-select" id="SchoolAssessmentSemester"
                                                    name="SchoolAssessmentSemester">
                                                    <option value="-1">เลือก</option>
                                                    <option value="0">ตลอดปีการศึกษา</option>
                                                    <option value="1">ภาคเรียนที่ 1</option>
                                                    <option value="2">ภาคเรียนที่ 2</option>
                                                    <option value="3">ภาคเรียนฤดูร้อน</option>
                                                </select>
                                                <label for="SchoolAssessmentSemester">ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>
+ -->
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="SchoolAssessmentSemester" aria-label="Floating label select example" name="SchoolAssessmentSemester">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT
                                                        INNER JOIN SEMESTER
                                                        ON SEMESTER.SEMESTER_CODE = SCHOOL_ASSESSMENT.SchoolAssessmentSemester
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL.SchoolID = SCHOOL_ASSESSMENT.SchoolID
                                                         where SCHOOL_ASSESSMENT.DeleteStatus = 0
                                                        ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->SchoolAssessmentEducationYear; ?>"
                                                        value="<?= $cls->SchoolAssessmentSemester; ?>">
                                                        <?= $cls->SEMESTER_NAME; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="SchoolID" aria-label="Floating label select example" name="SchoolID">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT 
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL_ASSESSMENT.SchoolID = SCHOOL.SchoolID
                                                       
                                                        where SCHOOL_ASSESSMENT.DeleteStatus = 0
                                                       ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->SchoolAssessmentSemester; ?>"
                                                        value="<?= $cls->SchoolID; ?>">
                                                        <?= $cls->SchoolNameThai; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>สถานศึกษา</label>
                                            </div>
                                        </div>


                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="CriteriaID" aria-label="Floating label select example" name="CriteriaID">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where DeleteStatus = 0');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option value="<?= $cls->Id; ?>">
                                                        <?= $cls->CriteriaID; ?></option>
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
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="number" max="100" class="form-control"
                                                id="SchoolAssessmentScore" placeholder="คะแนน"
                                                name="SchoolAssessmentScore">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="SchoolAssessmentCode"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">
                                                <option value="-1">เลือก</option>
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
                                    <!-- <input type="text" value="" name="index" id="index">
                                    <input type="text" value="" name="SchoolAssessmentCode" id="SchoolAssessmentCode"> -->
                                    <script>
                                    $(document).ready(function() {
                                        $('#CriteriaID').change(function() {

                                            var option = $(this).val();
                                            if (option != '') {
                                                console.log(option)
                                                $.ajax({
                                                    url: "<?php echo base_url('call_select'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        option: option
                                                    },
                                                    success: function(data) {
                                                        $('#index').val(data);

                                                    }
                                                });
                                            }
                                        });
                                    });
                                    let input = document.getElementById("SchoolAssessmentScore");
                                    let selectOption = document.getElementById("SchoolAssessmentCode");

                                    input.addEventListener("input", function() {
                                        let score = input.value;

                                        // คำนวนคะแนน
                                        let rank;
                                        if (score <= 20) {
                                            rank = 1;
                                        } else if (score <= 40) {
                                            rank = 2;
                                        } else if (score <= 60) {
                                            rank = 3;
                                        } else if (score <= 80) {
                                            rank = 4;
                                        } else if (score <= 100) {
                                            rank = 5;
                                        } else {
                                            alert("กรุณาเขียนคะแนน 0 ถึง 100");
                                            return;
                                        }

                                        // เปลี่ยนค่าใน select 
                                        for (let i = 0; i < selectOption.options.length; i++) {
                                            if (selectOption.options[i].value == rank) {
                                                selectOption.selectedIndex = i;
                                            } else {
                                                selectOption.options[i].hidden = true;
                                            }
                                        }
                                    });

                                    selectOption.addEventListener("change", function() {
                                        let rank = selectOption.value;
                                        let score = input.value;
                                        if (rank == 1 && (score < 0 || score > 20)) {
                                            alert("กรุณาเขียนคะแนน 0-20");
                                            selectOption.selectedIndex = 0;
                                            input.value = "";
                                            return;
                                        } else if (rank == 2 && (score < 21 || score > 40)) {
                                            alert("กรุณาเขียนคะแนน 21-40");
                                            selectOption.selectedIndex = 0;
                                            input.value = "";
                                            return;
                                        } else if (rank == 3 && (score < 41 || score > 60)) {
                                            alert("กรุณาเขียนคะแนน 41-60");
                                            selectOption.selectedIndex = 0;
                                            input.value = "";
                                            return;
                                        } else if (rank == 4 && (score < 61 || score > 80)) {
                                            alert("กรุณาเขียนคะแนน 61-80");
                                            selectOption.selectedIndex = 0;
                                            input.value = "";
                                            return;
                                        } else if (rank == 5 && (score < 81 || score > 100)) {
                                            alert("กรุณาเขียนคะแนน 81-100");
                                            selectOption.selectedIndex = 0;
                                            input.value = "";
                                            return;
                                        }
                                    });
                                    </script>
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
                                <script src="https://code.jquery.com/jquery-3.5.1.min.js%22%3E"></script>
                                <script>
                                $(document).ready(function() {
                                    $("#SchoolAssessmentSemester").children('option:gt(0)').hide();
                                    $("#SchoolID").children('option:gt(0)').hide();
                                    $("#SchoolAssessmentEducationYear").change(function() {
                                        $("#SchoolAssessmentSemester").children('option').hide();
                                        $("#SchoolAssessmentSemester").children("option[ id^=" + $(this)
                                            .val() + "]").show();
                                    })
                                    $("#SchoolAssessmentSemester").change(function() {
                                        $("#SchoolID").children('option').hide();
                                        $("#SchoolID").children("option[ id^=" + $(this).val() + "]")
                                            .show();
                                    })
                                })
                                </script>
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

                                // var my_SUMMER = "<?php echo $summer; ?>";
                                // var selectoption_SUMMER = document.querySelector('#SchoolAssessmentSemester');
                                // var size_my_SUMMER = document.getElementById("SchoolAssessmentSemester").options.length;
                                // for (let i = 0; i < size_my_SUMMER; i++) {
                                //     if (selectoption_SUMMER[i].value == my_SUMMER) {
                                //         selectoption_SUMMER[i].selected = true;
                                //     }
                                // }

                                function checkSelectedOption() {
                                    const SchoolAssessmentEducationYear = document.querySelector(
                                        '#SchoolAssessmentEducationYear');
                                    const SchoolAssessmentEducationYear_Value = SchoolAssessmentEducationYear.value;

                                    if (SchoolAssessmentEducationYear_Value === '-1') {
                                        alert('กรุณาเลือกปีการศึกษา');
                                        return false;
                                    }
                                    const SchoolAssessmentSemester = document.querySelector(
                                        '#SchoolAssessmentSemester');
                                    const SchoolAssessmentSemester_Value = SchoolAssessmentSemester.value;

                                    if (SchoolAssessmentSemester_Value === '-1') {
                                        alert('กรุณาเลือกภาคเรียน');
                                        return false;
                                    }
                                    const SchoolID = document.querySelector('#SchoolID');
                                    const SchoolID_Value = SchoolID.value;

                                    if (SchoolID_Value === '-1') {
                                        alert('กรุณาเลือกสถานศึกษา');
                                        return false;
                                    }
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
                
                            WHERE Id_sac = '" . $key . "' 
                             AND SCHOOL.DeleteStatus = '0'
                             AND SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = '0'
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                                            'sc_ass_ria_edit_p6'
                                                        ); ?>" method="post" enctype="multipart/form-data"
                                    onsubmit="return checkSelectedOption()">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <input type="hidden" name="Id_sac" value="<?php echo $show->Id_sac ?>">
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName"
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
                                                        <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษาที่ทำการประเมิน" name="" value="<?php echo $show->SchoolNameThai; ?>" disabled>
                                                        <input type="hidden" class="form-control" id="floatingName" placeholder="" name="SchoolID" value="<?php echo $show->SchoolID ?>">
                                                        <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                            สถานศึกษา </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <?php
                                                        $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA where Id = $show->CriteriaID");
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                    value="<?php echo $cls->CriteriaID ?>" disabled>
                                                <?php } ?>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="" name="CriteriaID"
                                                    value="<?php echo $show->CriteriaID ?>">
                                                <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                    ตัวชี้วัด </label>
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
                                            <input type="text" class="form-control" id="SchoolAssessmentScore"
                                                placeholder="คะแนน" name="SchoolAssessmentScore"
                                                value="<?php echo $show->SchoolAssessmentScore ?>">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="SchoolAssessmentCode"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">

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
                                    <script>
                                    let inputs = document.getElementById("SchoolAssessmentScore");
                                    let selectOptions = document.getElementById("SchoolAssessmentCode");

                                    inputs.addEventListener("input", function() {
                                        let score = inputs.value;

                                        // คำนวนคะแนน
                                        let rank;
                                        if (score <= 20) {
                                            rank = 1;
                                        } else if (score <= 40) {
                                            rank = 2;
                                        } else if (score <= 60) {
                                            rank = 3;
                                        } else if (score <= 80) {
                                            rank = 4;
                                        } else if (score <= 100) {
                                            rank = 5;
                                        } else {
                                            alert("กรุณาเขียนคะแนน 0 ถึง 100");
                                            return;
                                        }

                                        // เปลี่ยนค่าใน select 
                                        for (let i = 0; i < selectOptions.options.length; i++) {
                                            if (selectOptions.options[i].value == rank) {
                                                selectOptions.selectedIndex = i;
                                            } else {
                                                selectOptions.options[i].hidden = true;
                                            }
                                        }
                                    });

                                    selectOptions.addEventListener("change", function() {
                                        let rank = selectOptions.value;
                                        let score = inputs.value;
                                        if (rank == 1 && (score < 0 || score > 20)) {
                                            alert("กรุณาเขียนคะแนน 0-20");
                                            selectOptions.selectedIndex =
                                                <?php echo $show->SchoolAssessmentCode; ?>;

                                            return;
                                        } else if (rank == 2 && (score < 21 || score > 40)) {
                                            alert("กรุณาเขียนคะแนน 21-40");
                                            selectOptions.selectedIndex =
                                                <?php echo $show->SchoolAssessmentCode; ?>;

                                            return;
                                        } else if (rank == 3 && (score < 41 || score > 60)) {
                                            alert("กรุณาเขียนคะแนน 41-60");
                                            selectOptions.selectedIndex =
                                                <?php echo $show->SchoolAssessmentCode; ?>;

                                            return;
                                        } else if (rank == 4 && (score < 61 || score > 80)) {
                                            alert("กรุณาเขียนคะแนน 61-80");
                                            selectOptions.selectedIndex =
                                                <?php echo $show->SchoolAssessmentCode; ?>;

                                            return;
                                        } else if (rank == 5 && (score < 81 || score > 100)) {
                                            alert("กรุณาเขียนคะแนน 81-100");
                                            selectOptions.selectedIndex =
                                                <?php echo $show->SchoolAssessmentCode; ?>;

                                            return;
                                        }
                                    });
                                    </script>

                                    <input type="hidden" name="oil_file"
                                        value="<?php echo $show->SchoolAssessmentAttachmentURL ?>">

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
                                        <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#del_com"><i class="bi bi-trash"></i>
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
                                <!-- Modal -->
                                <div class="modal fade" id="del_com" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล
                                                    <?php echo nbs(2); ?>
                                                    <?php echo $show->AssessmentorName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('sc_ass_ria_del_p6'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                                    <input type="hidden" name="UserName"
                                                        value="<?php echo $UserName; ?>">
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
                                ///CLS_EVALUATION
                                var my_CLS_EVALUATION = "<?php echo $show->SchoolAssessmentCode; ?>";
                                var selectoption_CLS_EVALUATION = document.querySelector('#SchoolAssessmentCode');
                                var size_my_CLS_EVALUATION = document.getElementById("SchoolAssessmentCode").options
                                    .length;
                                for (let i = 0; i < size_my_CLS_EVALUATION; i++) {
                                    if (selectoption_CLS_EVALUATION[i].value == my_CLS_EVALUATION) {
                                        selectoption_CLS_EVALUATION[i].selected = true;

                                    }
                                }
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
                                    enctype="multipart/form-data" onsubmit="return checkSelectedOption()">
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <h5 class="card-title"></h5>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                    value="<?php echo $year; ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                    name="SchoolAssessmentEducationYear" value="<?php echo $year; ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    ปีการศึกษาที่ทำการประเมิน
                                                </label>
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
                                                    ภาคเรียนที่ทำการประเมิน </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">


                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                    $result = $this->db->query('SELECT * FROM SCHOOL where SchoolID = ' . "$SchoolID" . '');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                                        <input type="text" class="form-control" id="" placeholder="ภาคเรียนที่ทำการประเมิน" name="" value="<?php echo $cls->SchoolNameThai; ?>" disabled>
                                                        <input type="hidden" class="form-control" placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolID" value="<?php echo $SchoolID; ?>">
                                                    <?php } ?>
                                                    <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?>
                                                    สถานศึกษา </label>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                    $resultC = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where Id = ' . "$CriteriaID" . ' AND DeleteStatus = 0');
                                                    foreach ($resultC->result() as $clsC) {
                                                    ?>
                                                <input type="text" class="form-control" id=""
                                                    placeholder="รหัสตัวชี้วัด" name=""
                                                    value="<?php echo $clsC->CriteriaID; ?>" disabled>
                                                <input type="hidden" class="form-control" placeholder="รหัสตัวชี้วัด"
                                                    name="CriteriaID" value="<?php echo $CriteriaID; ?>">
                                                <?php } ?>
                                                <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?>
                                                    รหัสตัวชี้วัด </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">

                                        <div class="col mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" id="CompositionIndex"
                                                    aria-label="Floating label select example" name="CompositionIndex">
                                                    <option value="0" selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE CriteriaID = ' . "$CriteriaID" . ' AND DeleteStatus = 0 ORDER BY CompositionIndex ASC');

                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option value="<?= $cls->CompositionIndex; ?>">
                                                        <?= $cls->CompositionIndex; ?>.
                                                        <?= $cls->CompositionName; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="CompositionIndex"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>ลำดับองค์ประกอบตัวชี้วัด(ถ้าไม่มีหมายความว่าถูกใช้ไปแล้ว)</label>
                                            </div>
                                        </div>
                                        <script>
                                        const select_CompositionIndex = document.getElementById("CompositionIndex");
                                        for (let i = 0; i < select_CompositionIndex.options.length; i++) {
                                            <?php $result_CompositionIndex = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                    WHERE CriteriaID = ' . "$CriteriaID" . ' 
                                    AND DeleteStatus = 0 
                                    AND SchoolID= ' . "$SchoolID" . ' 
                                    AND SchoolAssessmentEducationYear= ' . "$year" . ' 
                                    AND SchoolAssessmentSemester= ' . "$summer" . ' 
                                    ');

                                                    foreach ($result_CompositionIndex->result() as $cls_CompositionIndex) { ?>
                                            if (select_CompositionIndex.options[i].value ===
                                                "<?php echo $cls_CompositionIndex->CompositionIndex; ?>") {
                                                select_CompositionIndex.options[i].hidden = true;
                                            }
                                            <?php } ?>
                                        }
                                        </script>
                                        <div class="col mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" id="LevelIndex"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <option value="0" selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL where CriteriaID = ' . "$CriteriaID" . ' AND DeleteStatus = 0 ORDER BY LevelIndex ASC');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option value="<?= $cls->LevelIndex; ?>"><?= $cls->LevelIndex; ?>.
                                                        <?= $cls->LevelName; ?></option>
                                                    <?php } ?>

                                                    </select>
                                                    <label for="LevelIndex"><?php echo nbs(
                                                                                2
                                                                            ); ?>ลำดับของระดับตัวชี้วัด(ถ้าไม่มีหมายความว่าถูกใช้ไปแล้ว)</label>
                                            </div>
                                        </div>
                                        <script>
                                        const select_LevelIndex = document.getElementById("LevelIndex");
                                        for (let i = 0; i < select_LevelIndex.options.length; i++) {
                                            <?php $result_LevelIndex = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                    WHERE CriteriaID = ' . "$CriteriaID" . ' 
                                    AND DeleteStatus = 0 
                                    AND SchoolID= ' . "$SchoolID" . ' 
                                    AND SchoolAssessmentEducationYear= ' . "$year" . ' 
                                    AND SchoolAssessmentSemester= ' . "$summer" . ' 
                                    ');

                                                    foreach ($result_LevelIndex->result() as $cls_LevelIndex) { ?>
                                            if (select_LevelIndex.options[i].value ===
                                                "<?php echo $cls_LevelIndex->LevelIndex; ?>") {
                                                select_LevelIndex.options[i].hidden = true;
                                            }
                                            <?php } ?>
                                        }
                                        </script>


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
                                function checkSelectedOption() {
                                    const LevelIndex = document.querySelector('#LevelIndex');
                                    const LevelIndex_Value = LevelIndex.value;
                                    const CompositionIndex = document.querySelector('#CompositionIndex');
                                    const CompositionIndex_Value = CompositionIndex.value;

                                    if (LevelIndex_Value === '0' && CompositionIndex_Value === '0') {
                                        alert('กรุณาเลือกลำดับของระดับตัวชี้วัดและลำดับองค์ประกอบตัวชี้วัด');
                                        return false;
                                    }
                                    if (LevelIndex_Value === '-99' && CompositionIndex_Value === '-99') {
                                        alert('ไม่สามารถเพิ่มลำดับของระดับตัวชี้วัดและลำดับองค์ประกอบตัวชี้วัดได้แล้ว');
                                        return false;
                                    }

                                    return true;
                                }
                                </script>

                                <?php } ?>
                                <?php if ($page == 'sh77') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                            WHERE Id_sar = '" . $key . "'  AND DeleteStatus = '0' 
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('sc_ass_res_edit_p7'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="Id_sar" value="<?php echo $show->Id_sar ?>">
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <h5 class="card-title"></h5>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน" name=""
                                                    value="<?php echo $year; ?>" disabled>
                                                <input type="hidden" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                    name="SchoolAssessmentEducationYear" value="<?php echo $year; ?>">
                                                <label for="floatingName"><?php echo nbs(2); ?>
                                                    ปีการศึกษาที่ทำการประเมิน
                                                </label>
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
                                                    ภาคเรียนที่ทำการประเมิน </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL where SchoolID = ' . "$SchoolID" . '');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <input type="text" class="form-control" id="" placeholder="ภาคเรียนที่ทำการประเมิน" name="" value="<?php echo $cls->SchoolNameThai; ?>" disabled>
                                                            <input type="hidden" class="form-control" placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolID" value="<?php echo $SchoolID; ?>">
                                                        <?php } ?>
                                                        <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                    สถานศึกษา </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?php
                                                        $resultC = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA where Id = ' . "$CriteriaID" . ' AND DeleteStatus = 0');
                                                        foreach ($resultC->result() as $clsC) {
                                                        ?>
                                                <input type="text" class="form-control" id=""
                                                    placeholder="รหัสตัวชี้วัด" name=""
                                                    value="<?php echo $clsC->CriteriaID; ?>" disabled>
                                                <input type="hidden" class="form-control" placeholder="รหัสตัวชี้วัด"
                                                    name="CriteriaID" value="<?php echo $CriteriaID; ?>">
                                                <?php } ?>
                                                <label for="floatingName"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>
                                                            รหัสตัวชี้วัด </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col mb-3">

                                            <div class="form-floating">
                                                <select class="form-select" id="CompositionIndex"
                                                    aria-label="Floating label select example" name="CompositionIndex">
                                                    <option value="">นำออก</option>
                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_COMPOSITION WHERE CriteriaID = ' . "$CriteriaID" . ' AND DeleteStatus = 0 ORDER BY CompositionIndex ASC');

                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->CompositionIndex; ?>">
                                                        <?= $cls->CompositionIndex; ?>.
                                                        <?= $cls->CompositionName; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="CompositionIndex"><?php echo nbs(
                                                                                            2
                                                                                        ); ?>ลำดับองค์ประกอบตัวชี้วัด(ถ้าไม่มีหมายความว่าถูกใช้ไปแล้ว)</label>
                                            </div>
                                        </div>
                                        <script>
                                        const select_CompositionIndex1 = document.getElementById("CompositionIndex");
                                        for (let i = 0; i < select_CompositionIndex1.options.length; i++) {
                                            <?php $result_CompositionIndex = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                    WHERE CriteriaID = ' . "$CriteriaID" . ' 
                                    AND DeleteStatus = 0 
                                    AND SchoolID= ' . "$SchoolID" . ' 
                                    AND SchoolAssessmentEducationYear= ' . "$year" . ' 
                                    AND SchoolAssessmentSemester= ' . "$summer" . ' 
                                    ');

                                                        foreach ($result_CompositionIndex->result() as $cls_CompositionIndex) { ?>
                                            if (select_CompositionIndex1.options[i].value ===
                                                "<?php echo $cls_CompositionIndex->CompositionIndex; ?>") {
                                                select_CompositionIndex1.options[i].hidden = true;
                                            }
                                            <?php } ?>
                                        }
                                        </script>
                                        <div class="col mb-3">


                                            <div class="form-floating">
                                                <select class="form-select" id="LevelIndex"
                                                    aria-label="Floating label select example" name="LevelIndex">
                                                    <option value="">นำออก</option>
                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM ASSESSMENT_CRITERIA_LEVEL where CriteriaID = ' . "$CriteriaID" . ' AND DeleteStatus = 0 ORDER BY LevelIndex ASC');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                    <option value="<?= $cls->LevelIndex; ?>"><?= $cls->LevelIndex; ?>.
                                                        <?= $cls->LevelName; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label
                                                    for="Y"><?php echo nbs(
                                                                                    2
                                                                                ); ?>ลำดับของระดับตัวชี้วัด(ถ้าไม่มีหมายความว่าถูกใช้ไปแล้ว)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                    const select_LevelIndex1 = document.getElementById("LevelIndex");
                                    for (let i = 0; i < select_LevelIndex1.options.length; i++) {
                                        <?php $result_LevelIndex = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_RESULT 
                                    WHERE CriteriaID = ' . "$CriteriaID" . ' 
                                    AND DeleteStatus = 0 
                                    AND SchoolID= ' . "$SchoolID" . ' 
                                    AND SchoolAssessmentEducationYear= ' . "$year" . ' 
                                    AND SchoolAssessmentSemester= ' . "$summer" . ' 
                                    ');

                                                    foreach ($result_LevelIndex->result() as $cls_LevelIndex) { ?>
                                        if (select_LevelIndex1.options[i].value ===
                                            "<?php echo $cls_LevelIndex->LevelIndex; ?>") {
                                            select_LevelIndex1.options[i].hidden = true;
                                        }
                                        <?php } ?>
                                    }
                                    </script>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p5?page=sh5" class="btn btn-danger"
                                            style="float: left;">ยกเลิก</a>
                                        <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#del_sar"><i class="bi bi-trash"></i>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        ยืนยันการแก้ไขข้อมูล
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
                                <!-- Modal -->
                                <div class="modal fade" id="del_sar" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล
                                                    <?php echo nbs(2); ?>

                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <form method="post" action="<?php echo site_url('sc_ass_res_del_p7'); ?>">
                                                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                                            <input type="hidden" name="Id_sar" value="<?php echo $show->Id_sar; ?>">
                                                            <input type="hidden" name="SchoolAssessmentEducationYear" value="<?php echo $show->SchoolAssessmentEducationYear ; ?>">
                                                            <input type="hidden" name="SchoolAssessmentSemester" value="<?php echo $show->SchoolAssessmentSemester ; ?>">
                                                            <input type="hidden" name="SchoolID" value="<?php echo $show->SchoolID  ; ?>">
                                                            <div class="d-flex justify-content-center">
                                                                <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Modal -->


                                <script>
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
                                ///ASSESSMENT_CRITERIA_COMPOSITION
                                var my_ASSESSMENT_CRITERIA_COMPOSITION = "<?php echo $show->CompositionIndex; ?>";
                                var selectoption_ASSESSMENT_CRITERIA_COMPOSITION = document.querySelector(
                                    '#CompositionIndex');
                                var size_my_ASSESSMENT_CRITERIA_COMPOSITION = document.getElementById(
                                        "CompositionIndex")
                                    .options.length;
                                for (let i = 0; i < size_my_ASSESSMENT_CRITERIA_COMPOSITION; i++) {
                                    if (selectoption_ASSESSMENT_CRITERIA_COMPOSITION[i].value ==
                                        my_ASSESSMENT_CRITERIA_COMPOSITION) {
                                        selectoption_ASSESSMENT_CRITERIA_COMPOSITION[i].selected = true;
                                    }
                                }
                                </script>
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
                                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="AchievementAssessmentYear"
                                                    aria-label="Floating label select example"
                                                    name="AchievementAssessmentYear">
                                                    <option value="-1" selected>เลือก</option>
                                                    <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA where DeleteStatus = 0 GROUP BY SchoolAssessmentEducationYear');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <option value="<?= $cls->SchoolAssessmentEducationYear; ?>">
                                                                <?= $cls->SchoolAssessmentEducationYear; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">ปีการศึกษาที่ทำการประเมิน</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="SchoolAssessmentSemester" aria-label="Floating label select example" name="SchoolAssessmentSemester">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA
                                                        INNER JOIN SEMESTER
                                                        ON SEMESTER.SEMESTER_CODE = SCHOOL_ASSESSMENT_CRITERIA.SchoolAssessmentSemester
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL.SchoolID = SCHOOL_ASSESSMENT_CRITERIA.SchoolID
                                                         where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0
                                                         AND SCHOOL.DeleteStatus = 0
                                                         GROUP BY SchoolAssessmentSemester
                                                        ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->SchoolAssessmentEducationYear; ?>"
                                                        value="<?= $cls->SchoolAssessmentSemester; ?>">
                                                        <?= $cls->SEMESTER_NAME; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="SchoolID" aria-label="Floating label select example" name="SchoolID">
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL_ASSESSMENT_CRITERIA.SchoolID = SCHOOL.SchoolID
                                                       
                                                        where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0
                                                        AND SCHOOL.DeleteStatus = 0
                                                       
                                                       ');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                    <option id="<?= $cls->SchoolAssessmentSemester; ?>"
                                                        value="<?= $cls->SchoolID; ?>">
                                                        <?= $cls->SchoolNameThai; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(
                                                                                    2
                                                                                ); ?>สถานศึกษา</label>
                                                </div>
                                            </div>

                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.5.1.min.js%22%3E"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $("#SchoolAssessmentSemester").children('option:gt(0)').hide();
                                                $("#SchoolID").children('option:gt(0)').hide();
                                                $("#AchievementAssessmentYear").change(function() {
                                                    $("#SchoolAssessmentSemester").children('option').hide();
                                                    $("#SchoolAssessmentSemester").children("option[ id^=" + $(
                                                            this)
                                                        .val() + "]").show();
                                                })
                                                $("#SchoolAssessmentSemester").change(function() {
                                                    $("#SchoolID").children('option').hide();
                                                    $("#SchoolID").children("option[ id^=" + $(this).val() +
                                                            "]")
                                                        .show();
                                                })
                                            })
                                            $(document).ready(function() {
                                                $('#AchievementAssessmentYear,#SchoolAssessmentSemester,#SchoolID')
                                                    .change(function() {

                                                        var key1 = $('#AchievementAssessmentYear').val();
                                                        var key2 = $('#SchoolAssessmentSemester').val();
                                                        var key3 = $('#SchoolID').val();
                                                        if (key1 != '-1' && key2 != '-1' && key3 != '-1') {
                                                            console.log(key1, key2, key3)
                                                            $.ajax({
                                                                url: "<?php echo base_url('call_select_1'); ?>",
                                                                method: "POST",
                                                                dataType: "json",
                                                                data: {
                                                                    key1: key1,
                                                                    key2: key2,
                                                                    key3: key3
                                                                },
                                                                success: function(data) {
                                                                    console.log(data);
                                                                    $('#SchoolAssessmentName').val(data.SchoolAssessmentName);
                                                                    $('#SchoolAssessmentDescription').val(data.SchoolAssessmentDescription);
                                                                    $('#AssessmentorName').val(data.AssessmentorName);
                                                                }

                                                    });
                                                }
                                            });
                                    });
                                    </script>


                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="SchoolAssessmentName"
                                                    placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
                                                <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> ชื่อการประเมิน </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="SchoolAssessmentDescription"
                                                placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription">
                                            <label for="floatingName"><?php echo nbs(
                                                                                2
                                                                            ); ?> คำอธิบายการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="AssessmentorName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName">
                                            <label for="floatingName"><?php echo nbs(
                                                                                2
                                                                            ); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="">ผลการประเมินผลสัมฤทธิ์การศึกษา</p>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="AchievementAssessmentPassingFlag" id="gridRadios1" value="0">
                                                <label class="form-check-label" for="gridRadios1">
                                                    ไม่ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="AchievementAssessmentPassingFlag" id="gridRadios2" value="1">
                                                <label class="form-check-label" for="gridRadios2">
                                                    ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="AchievementAssessmentAttachmentURL">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p8?page=sh8" class="btn btn-danger"
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
                                <?php } ?>
                                <?php if ($page == 'sh88') { ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                <?php

                                    $result = $this->db->query("SELECT * FROM ACHIEVEMENT_ASSESSMENT 
                            WHERE Id = '" . $key . "'  AND DeleteStatus = '0'
                            ");

                                    foreach ($result->result() as $show) {
                                    ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('achie_ass_edit_p8'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <h5 class="card-title"></h5>
                                    <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                    <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="AchievementAssessmentYear"
                                                        aria-label="Floating label select example"
                                                        name="AchievementAssessmentYear">

                                                        <?php
                                                                $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA where DeleteStatus = 0 GROUP BY SchoolAssessmentEducationYear');
                                                                foreach ($result->result() as $cls) {
                                                                ?>
                                                        <option value="<?= $cls->SchoolAssessmentEducationYear; ?>">
                                                            <?= $cls->SchoolAssessmentEducationYear; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">ปีการศึกษาที่ทำการประเมิน</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="SchoolAssessmentSemester"
                                                    aria-label="Floating label select example"
                                                    name="SchoolAssessmentSemester">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA
                                                        INNER JOIN SEMESTER
                                                        ON SEMESTER.SEMESTER_CODE = SCHOOL_ASSESSMENT_CRITERIA.SchoolAssessmentSemester
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL.SchoolID = SCHOOL_ASSESSMENT_CRITERIA.SchoolID
                                                         where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0
                                                         AND SCHOOL.DeleteStatus = 0
                                                         GROUP BY SchoolAssessmentSemester
                                                        ');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option id="<?= $cls->SchoolAssessmentEducationYear; ?>" value="<?= $cls->SchoolAssessmentSemester; ?>">
                                                                    <?= $cls->SEMESTER_NAME; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingSelect"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>ภาคเรียนที่ทำการประเมิน</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="SchoolID"
                                                    aria-label="Floating label select example" name="SchoolID">

                                                    <?php
                                                            $result = $this->db->query('SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                                                        INNER JOIN SCHOOL
                                                        ON SCHOOL_ASSESSMENT_CRITERIA.SchoolID = SCHOOL.SchoolID
                                                       
                                                        where SCHOOL_ASSESSMENT_CRITERIA.DeleteStatus = 0
                                                        AND SCHOOL.DeleteStatus = 0
                                                       
                                                       ');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option id="<?= $cls->SchoolAssessmentSemester; ?>" value="<?= $cls->SchoolID; ?>">
                                                                    <?= $cls->SchoolNameThai; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingSelect"><?php echo nbs(
                                                                                        2
                                                                                    ); ?>สถานศึกษา</label>
                                            </div>
                                        </div>

                                            </div>
                                            <script>
                                                // $(document).ready(function() {
                                                //     $("#SchoolAssessmentSemester").children('option:gt(0)').hide();
                                                //     $("#SchoolID").children('option:gt(0)').hide();
                                                //     $("#AchievementAssessmentYear").change(function() {
                                                //         $("#SchoolAssessmentSemester").children('option').hide();
                                                //         $("#SchoolAssessmentSemester").children("option[ id^=" + $(
                                                //                 this)
                                                //             .val() + "]").show();
                                                //     })
                                                //     $("#SchoolAssessmentSemester").change(function() {
                                                //         $("#SchoolID").children('option').hide();
                                                //         $("#SchoolID").children("option[ id^=" + $(this).val() +
                                                //                 "]")
                                                //             .show();
                                                //     })
                                                // })
                                                $(document).ready(function() {
                                                    $('#AchievementAssessmentYear,#SchoolAssessmentSemester,#SchoolID')
                                                        .change(function() {

                                                            var key1 = $('#AchievementAssessmentYear').val();
                                                            var key2 = $('#SchoolAssessmentSemester').val();
                                                            var key3 = $('#SchoolID').val();
                                                            if (key1 != '-1' && key2 != '-1' && key3 != '-1') {
                                                                console.log(key1, key2, key3)
                                                                $.ajax({
                                                                    url: "<?php echo base_url('call_select_1'); ?>",
                                                                    method: "POST",
                                                                    dataType: "json",
                                                                    data: {
                                                                        key1: key1,
                                                                        key2: key2,
                                                                        key3: key3
                                                                    },
                                                                    success: function(data) {
                                                                        console.log(data);
                                                                        $('#SchoolAssessmentName').val(data.SchoolAssessmentName);
                                                                        $('#SchoolAssessmentDescription').val(data.SchoolAssessmentDescription);
                                                                        $('#AssessmentorName').val(data.AssessmentorName);
                                                                    }

                                                    });
                                                }
                                            });
                                    });
                                    </script>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="SchoolAssessmentName"
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
                                            <input type="text" class="form-control" id="SchoolAssessmentDescription"
                                                placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription"
                                                value="<?php echo $show->SchoolAssessmentDescription ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> คำอธิบายการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="AssessmentorName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName"
                                                value="<?php echo $show->AssessmentorName ?>">
                                            <label for="floatingName"><?php echo nbs(
                                                                                    2
                                                                                ); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">ผลการประเมินผลสัมฤทธิ์การศึกษา
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="AchievementAssessmentPassingFlag" id="gridRadios1" value="0">
                                                <label class="form-check-label" for="gridRadios1">
                                                    ไม่ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="AchievementAssessmentPassingFlag" id="gridRadios2" value="1">
                                                <label class="form-check-label" for="gridRadios2">
                                                    ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="AchievementAssessmentAttachmentURL">
                                        </div>
                                    </div>
                                    <input type="hidden" name="oil_file"
                                        value="<?php echo $show->AchievementAssessmentAttachmentURL ?>">
                                    <div class="text-center">
                                        <a href="Fm_evaluation_das_p8?page=sh8" class="btn btn-danger"
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
                                                        ยืนยันการแก้ไขข้อมูล
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
                                let semester = <?php echo $show->AchievementAssessmentPassingFlag ?>
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
                                ///SchoolAssessmentSemester
                                var my_SchoolAssessmentSemester = "<?php echo $show->SchoolAssessmentSemester; ?>";
                                var selectoption_SchoolAssessmentSemester = document.querySelector(
                                    '#SchoolAssessmentSemester');
                                var size_my_SchoolAssessmentSemester = document.getElementById(
                                    "SchoolAssessmentSemester").options.length;
                                for (let i = 0; i < size_my_SchoolAssessmentSemester; i++) {
                                    if (selectoption_SchoolAssessmentSemester[i].value == my_SchoolAssessmentSemester) {
                                        selectoption_SchoolAssessmentSemester[i].selected = true;
                                    }
                                }
                                ///AchievementAssessmentYear
                                var my_AchievementAssessmentYear = "<?php echo $show->AchievementAssessmentYear; ?>";
                                var selectoption_AchievementAssessmentYear = document.querySelector(
                                    '#AchievementAssessmentYear');
                                var size_my_AchievementAssessmentYear = document.getElementById(
                                    "AchievementAssessmentYear").options.length;
                                for (let i = 0; i < size_my_AchievementAssessmentYear; i++) {
                                    if (selectoption_AchievementAssessmentYear[i].value ==
                                        my_AchievementAssessmentYear) {
                                        selectoption_AchievementAssessmentYear[i].selected = true;
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
            }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            </script>
</main><!-- End #main -->