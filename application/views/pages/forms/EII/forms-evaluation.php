<?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
<?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
<?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<main id="main" class="main">
    <style>
    label[for="Y"]:after {
        content: " *";
        color: red;
    }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <div class="pagetitle">
        <div class="pagetitle">
            <div class="row ">
                <?php switch (
                    $page
                ) {
                    case 'sh1': ?> <h1>ตัวชี้วัด</h1>
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
                    case 'sh11': ?> <h1>ตัวชี้วัด</h1>
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
                                            <!-- <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div> -->

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="ชื่อเกณฑ์" name="CriteriaName">
                                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อเกณฑ์ </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" style="height: 100px"
                                                    name="CriteriaDescription"></textarea>
                                                <label for="floatingTextarea2"><?php echo nbs(2); ?>คำฮธิบายเกณฑ์ </label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaLevelAmount">
                                                    <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> จำนวนระดับของตัวชี้วัด</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="จำนวนระดับของตัวชี้วัด"
                                                        name="CriteriaCompositionAmount">
                                                    <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> จำนวนองค์ประกอบของตัวชี้วัด</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="จำนวนระดับของตัวชี้วัด"
                                                        name="CriteriaPassingScorePercentage">
                                                    <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> คะแนนการผ่านเกณฑ์(%)</label>
                                                </div>
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
                                                <!-- <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="รหัสตัวชี้วัด" name="CriteriaID" value="<?php echo $show->CriteriaID ?>">

                                                <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                            </div>
                                        </div> -->
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
                                <?php if ($page == 'sh2') { ?>
                                    <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                    <form action="<?php echo site_url(
                                        'ass_ria_lvl_forms_up_p2'
                                    ); ?>" method="post" onsubmit="return checkSelectedOption()">
                                        <?php echo br(2); ?>


                                        <div class="row mb-3">
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
                                                    <label for="Y"><?php echo nbs(
                                                        2
                                                    ); ?>รหัสตัวชี้วัด</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex">
                                                    <label for="Y"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัด
                                                    </label>
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

                                    $result = $this->db->query("SELECT * FROM ASSESSMENT_CRITERIA_LEVEL 
                            WHERE Id = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                        <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                        <form action="<?php echo site_url(
                                            'ass_ria_lvl_forms_up_p2'
                                        ); ?>" method="post">
                                            <h5 class="card-title">ฟอร์มข้อมูลระดับตัวชี้วัด</h5>
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
                                                            placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex"
                                                            value="<?php echo $show->LevelIndex ?>">
                                                        <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัด
                                                        </label>
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
                                    <?php }
                                } ?>
                                <?php if ($page == 'sh3') { ?>
                                    <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                    <form action="<?php echo site_url(
                                        'ass_ria_com_forms_up_p3'
                                    ); ?>" method="post">
                                        <h5 class="card-title">ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h5>


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
                                            'ass_ria_com_forms_up_p3'
                                        ); ?>" method="post">
                                            <h5 class="card-title">ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h5>

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
                                    <?php }
                                } ?>
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
                                <?php if ($page == 'sh5') { ?>
                                    <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                    <form action="<?php echo site_url(
                                        'sc_ass_forms_up_p5'
                                    ); ?>" method="post">
                                        <h5 class="card-title">ฟอร์มข้อมูลการประเมินผลสถานศึกษา</h5>

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
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="ภาคเรียนที่ทำการประเมิน"
                                                        name="SchoolAssessmentSemester">
                                                    <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> ภาคเรียนที่ทำการประเมิน </label>
                                                </div>
                                            </div>

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
                                            'sc_ass_forms_up_p5'
                                        ); ?>" method="post">
                                            <h5 class="card-title">ฟอร์มข้อมูลการประเมินผลสถานศึกษา</h5>
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
                                                        <input type="text" class="form-control" id="floatingName"
                                                            placeholder="ภาคเรียนที่ทำการประเมิน"
                                                            name="SchoolAssessmentSemester"
                                                            value="<?php echo $show->SchoolAssessmentSemester ?>">
                                                        <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?> ภาคเรียนที่ทำการประเมิน </label>
                                                    </div>
                                                </div>

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
                                    <?php }
                                } ?>
                                <?php if ($page == 'sh6') { ?>
                                    <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                    <form action="<?php echo site_url(
                                        'sc_ass_ria_forms_up_p6'
                                    ); ?>" method="post" enctype="multipart/form-data">
                                        <h5 class="card-title">ฟอร์มข้อมูลการประเมินตามตัวชี้วัด</h5>

                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                    name="SchoolAssessmentEducationYear">
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
                                                        name="SchoolAssessmentSemester">
                                                    <label for="floatingName"><?php echo nbs(
                                                        2
                                                    ); ?> ภาคเรียนที่ทำการประเมิน
                                                    </label>
                                                </div>
                                            </div>



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
                                        <div class="row mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text"
                                                    for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมิน</label>
                                                <input type="file" class="form-control" id="inputGroupFile01"
                                                    name="SchoolAssessmentAttachmentURL">
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
                                <?php if ($page == 'sh66') { ?>
                                    <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
                                    <?php

                                    $result = $this->db->query("SELECT * FROM SCHOOL_ASSESSMENT_CRITERIA 
                            WHERE Id = '" . $key . "' 
                            ");

                                    foreach ($result->result() as $show) {
                                        ?>
                                        <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                        <form action="<?php echo site_url(
                                            'sc_ass_ria_forms_up_p6'
                                        ); ?>" method="post" enctype="multipart/form-data">
                                            <h5 class="card-title">ฟอร์มข้อมูลการประเมินตามตัวชี้วัด</h5>
                                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                        name="SchoolAssessmentEducationYear"
                                                        value="<?php echo $show->SchoolAssessmentEducationYear ?>">
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
                                                            name="SchoolAssessmentSemester"
                                                            value="<?php echo $show->SchoolAssessmentSemester ?>">
                                                        <label for="floatingName"><?php echo nbs(
                                                            2
                                                        ); ?> ภาคเรียนที่ทำการประเมิน
                                                        </label>
                                                    </div>
                                                </div>

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
                                    <?php }
                                } ?>
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
                                <?php }
                            } ?>
                            <?php if ($page == 'sh8') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('achie_ass_forms_up_p8'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินสถานศึกษา</h5>
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
                                    <form action="<?php echo site_url('achie_ass_forms_up_p8'); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <h5 class="card-title">ฟอร์มข้อมูลการประเมินสถานศึกษา</h5>
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
                                        <?php if ($show->CriteriaID == '0') { ?>
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-2 pt-0">ผลการประเมินผลสัมฤทธิ์การศึกษา
                                                </legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="AchievementAssessmentPassingFlag" id="gridRadios1" value="0"
                                                            checked>
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
                                        <?php } else {
                                            ?>
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
                                                            name="AchievementAssessmentPassingFlag" id="gridRadios2" value="1"
                                                            checked>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            ผ่าน
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <?php
                                        } ?>
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
                        </div>
                    </div>

                </div>


        </div>
        </section>

</main><!-- End #main -->