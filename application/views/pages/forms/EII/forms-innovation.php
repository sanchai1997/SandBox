<body>
    <style>
        label[for="Y"]:after {
            content: " *";
            color: red;
        }
    </style>
    <main id="main" class="main">
        <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
        <?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
        <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
        <?php $InnovationID = isset($_GET['InnovationID']) ? $_GET['InnovationID'] : ''; ?>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } // เริ่มต้น session
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
        <?php  }
        if (isset($_SESSION['false'])) { ?>
            <div style="position: relative;">
                <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
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
            <?php switch ($page) {
                case 'sh1':
            ?> <h1>นวัตกรรมการศึกษา </h1>
                <?php break;
                case 'sh2':
                ?> <h1>ผู้จัดทำนวัตกรรมการศึกษา-<?php echo  $name; ?></h1>
                <?php
                    break;
                case 'sh11':
                ?> <h1>นวัตกรรมการศึกษา - <?php echo  $name; ?></h1>
                <?php break;
                case 'sh22':
                ?> <h1>ผู้จัดทำนวัตกรรมการศึกษา - <?php echo  $name; ?></h1>
                <?php
                    break;

                default:
                ?>
            <?php
                    break;
            }  ?>
            <!-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">นวัตกรรมการศึกษา</li>
            </ol>
        </nav> -->
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">

                            <?php if ($page == 'sh1') {  ?>
                                <!-- <h5 class="card-title">ข้อมูลนวัตกรรมการศึกษา</h5> -->
                                <?php echo br(2); ?>
                                <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->

                                <body>
                                    <form action="<?php echo site_url('forms_up_p1'); ?>" method="POST" enctype="multipart/form-data" onsubmit="return checkSelectedOption()">

                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID" required aria-label="รหัสนวัตกรรมการศึกษา">
                                                <label for="Y"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingName" placeholder="ปีการศึกษา" name="EducationYear" required pattern="\d{1,4}">
                                                    <label for="Y"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                                </div>
                                            </div>

                                            <!-- <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียน" name="Semester" required max="2">
                                                <label for="Y"><?php echo nbs(2); ?> ภาคเรียน </label>
                                            </div>
                                        </div> -->
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="Semester" name="Semester">
                                                        <option value="-1">กรุณาเลือกภาคเรียนที่ทำการประเมิน</option>
                                                        <option value="0">ตลอดปีการศึกษา</option>
                                                        <option value="1">ภาคเรียนที่ 1</option>
                                                        <option value="2">ภาคเรียนที่ 2</option>
                                                        <option value="3">ภาคเรียนฤดูร้อน</option>
                                                    </select>
                                                    <label for="Semester">ภาคเรียน</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อนวัตกรรม" name="InnovationName" required>
                                                <label for="Y"><?php echo nbs(2); ?> ชื่อนวัตกรรม </label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="InnovationTypeCode" aria-label="Floating label select example" name="InnovationTypeCode" required>
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_INNOVATION_TYPE');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <option value="<?= $cls->INNOVATION_TYPE_CODE; ?>">
                                                                <?= $cls->INNOVATION_TYPE_NAME; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="Y"><?php echo nbs(2); ?>รหัสประเภทนวัตกรรม</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="TargetEducationLevelCode" aria-label="Floating label select example" name="TargetEducationLevelCode" required>
                                                        <option value="-1" selected>เลือก</option>
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                                        foreach ($result->result() as $cls) {
                                                        ?>
                                                            <option value="<?= $cls->EDUCATION_LEVEL_CODE; ?>">
                                                                <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 60px" name="InnovationBenefit"></textarea>
                                                <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ของนวัตกรรม</label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 60px" name="Abstract" required></textarea>
                                                <label for="Y"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="Y">เอกสารแนบ</label>
                                                <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" placeholder="แหล่งนวัตกรรม" name="Source" required>
                                                    <label for="Y"><?php echo nbs(2); ?> แหล่งนวัตกรรม </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="Share" placeholder="Share" name="PublishDate" required>
                                                    <label for="Y">วันที่เผยแพร่</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา" name="SearchKeyword">
                                                <label for=""><?php echo nbs(2); ?> คำค้นหา </label>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <a href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>" class="btn btn-danger" style="float: left;">ยกเลิก</a>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>
                                                            <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
                                                        </h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                                    <script>
                                        function checkSelectedOption() {
                                            ///CLS_INNOVATION_TYPE
                                            const CLS_INNOVATION_TYPE = document.querySelector('#InnovationTypeCode');
                                            const CLS_INNOVATION_TYPE_Value = CLS_INNOVATION_TYPE.value;

                                            if (CLS_INNOVATION_TYPE_Value === '-1') {
                                                alert('กรุณาเลือกประเภทนวัตกรรม');
                                                return false;
                                            }
                                            ///CLS_EDUCATION_LEVEL
                                            const CLS_EDUCATION_LEVEL = document.querySelector('#TargetEducationLevelCode');
                                            const CLS_EDUCATION_LEVEL_Value = CLS_EDUCATION_LEVEL.value;

                                            if (CLS_EDUCATION_LEVEL_Value === '-1') {
                                                alert('กรุณาเลือกระดับการศึกษาที่นำไปใช้');
                                                return false;
                                            }
                                            ///semmer
                                            const semmer = document.querySelector('#Semester');
                                            const semmer_Value = semmer.value;

                                            if (semmer_Value === '-1') {
                                                alert('กรุณาเลือกภาคเรียน');
                                                return false;
                                            }
                                        }
                                    </script>
                                </body>


                            <?php } ?>
                            <?php if ($page == 'sh11') {  ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                                <?php

                                $result = $this->db->query("SELECT * FROM INNOVATION 
                            WHERE Id_in = '" . $key . "' 
                            ");

                                foreach ($result->result() as $show) {
                                ?>
                                    <!-- <h5 class="card-title">ข้อมูลนวัตกรรมการศึกษา</h5> -->
                                    <?php echo br(2); ?>
                                    <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->

                                    <body>
                                        <form action="<?php echo site_url('edit_p1'); ?>" method="post" enctype="multipart/form-data">


                                            <input type="hidden" class="form-control" id="floatingName" placeholder="รหัสนวัตกรรมการศึกษา" name="Id_in" required max="16" value="<?php echo $show->Id_in; ?>">


                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="รหัสนวัตกรรมการศึกษา" name="" value="<?php echo $show->InnovationID; ?>" disabled>
                                                        <input type="hidden" class="form-control" id="floatingName" placeholder="" name="InnovationID" value="<?php echo $show->InnovationID; ?>">
                                                        <label for="Y"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="floatingName" placeholder="ปีการศึกษา" name="EducationYear" required value="<?php echo $show->EducationYear; ?>">
                                                        <label for="Y"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                                    </div>
                                                </div>

                                                <!-- <div class="col">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingName"
                                                    placeholder="ภาคเรียน" name="Semester" required max="1"
                                                    value="<?php echo $show->Semester; ?>">
                                                <label for="Y"><?php echo nbs(2); ?> ภาคเรียน </label>
                                            </div>
                                        </div> -->
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <select class="form-control" id="Semester" name="Semester">
                                                            <option value="-1">กรุณาเลือกภาคเรียนที่ทำการประเมิน</option>
                                                            <option value="0">ตลอดปีการศึกษา</option>
                                                            <option value="1">ภาคเรียนที่ 1</option>
                                                            <option value="2">ภาคเรียนที่ 2</option>
                                                            <option value="3">ภาคเรียนฤดูร้อน</option>
                                                        </select>
                                                        <label for="Semester">ภาคเรียน</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" placeholder="ชื่อนวัตกรรม" name="InnovationName" required value="<?php echo $show->InnovationName; ?>">
                                                    <label for="Y"><?php echo nbs(2); ?> ชื่อนวัตกรรม </label>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="InnovationTypeCode" aria-label="Floating label select example" name="InnovationTypeCode" required>

                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_INNOVATION_TYPE');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option value="<?= $cls->INNOVATION_TYPE_CODE; ?>">
                                                                    <?= $cls->INNOVATION_TYPE_NAME; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="Y"><?php echo nbs(2); ?>ประเภทนวัตกรรม</label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">

                                                        <select class="form-select" id="TargetEducationLevelCode" aria-label="Floating label select example" name="TargetEducationLevelCode" required>

                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option value="<?= $cls->EDUCATION_LEVEL_CODE; ?>">
                                                                    <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 60px" name="InnovationBenefit" required><?php echo $show->InnovationBenefit; ?></textarea>
                                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ของนวัตกรรม</label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 60px" name="Abstract" required><?php echo $show->Abstract; ?></textarea>
                                                    <label for="Y"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                                </div>
                                            </div>

                                            <input name="oil_file" value="<?php echo $show->AttachmentURL; ?>" type="hidden">

                                            <div class="row mb-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                                    <input type="file" for="Y" class="form-control" id="inputGroupFile01" name="AttachmentURL">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="แหล่งนวัตกรรม" name="Source" required value="<?php echo $show->Source; ?>">
                                                        <label for="Y"><?php echo nbs(2); ?> แหล่งนวัตกรรม </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="Share" placeholder="Share" name="PublishDate" required value="<?php echo $show->PublishDate; ?>">
                                                        <label for="Y">วันที่เผยแพร่</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา" name="SearchKeyword" required value="<?php echo $show->SearchKeyword; ?>">
                                                    <label for="Y"><?php echo nbs(2); ?> คำค้นหา </label>
                                                </div>

                                            </div>
                                            <div class="text-center">
                                                <a href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>" class="btn btn-danger" style="float: left;">ยกเลิก</a>

                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                ยืนยันการแก้ไขข้อมูล</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>
                                                                <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                            </h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                ///CLS_INNOVATION_TYPE
                                                var my_CLS_INNOVATION_TYPE = <?php echo $show->InnovationTypeCode; ?>;
                                                var selectoption_CLS_INNOVATION_TYPE = document.querySelector(
                                                    '#InnovationTypeCode');
                                                var size_my_CLS_INNOVATION_TYPE = document.getElementById("InnovationTypeCode")
                                                    .options.length;
                                                for (let i = 0; i < size_my_CLS_INNOVATION_TYPE; i++) {
                                                    if (selectoption_CLS_INNOVATION_TYPE[i].value == my_CLS_INNOVATION_TYPE) {
                                                        selectoption_CLS_INNOVATION_TYPE[i].selected = true;
                                                    }
                                                }
                                                ///CLS_EDUCATION_LEVEL
                                                var my_CLS_EDUCATION_LEVEL = <?php echo $show->TargetEducationLevelCode; ?>;
                                                var selectoption_CLS_EDUCATION_LEVEL = document.querySelector(
                                                    '#TargetEducationLevelCode');
                                                var size_my_CLS_EDUCATION_LEVEL = document.getElementById(
                                                    "TargetEducationLevelCode").options.length;
                                                for (let i = 0; i < size_my_CLS_EDUCATION_LEVEL; i++) {
                                                    if (selectoption_CLS_EDUCATION_LEVEL[i].value == my_CLS_EDUCATION_LEVEL) {
                                                        selectoption_CLS_EDUCATION_LEVEL[i].selected = true;
                                                    }
                                                }
                                                ///Semester
                                                var my_Semester = <?php echo $show->Semester; ?>;
                                                var selectoption_Semester = document.querySelector('#Semester');
                                                var size_my_Semester = document.getElementById("Semester").options.length;
                                                for (let i = 0; i < size_my_Semester; i++) {
                                                    if (selectoption_Semester[i].value == my_Semester) {
                                                        selectoption_Semester[i].selected = true;
                                                    }
                                                }
                                            </script>
                                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                                    </body>
                            <?php }
                            } ?>
                            <?php if ($page == 'sh2') {  ?>
                                <!-- <h5 class="card-title">ข้อมูลผู้จัดทำนวัตกรรมการศึกษา</h5> -->
                                <?php echo br(2); ?>
                                <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->
                                <form action="<?php echo site_url('forms_up_p2'); ?>" method="post" onsubmit="return checkSelectedOption()">



                                    <input type="hidden" class="form-control" id="floatingName" placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID" value="<?php echo $key; ?>" required>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating" id="InnovationID">
                                                <input type="text" class="form-control" placeholder="รหัสนวัตกรรมการศึกษา" name="" value="<?php echo $InnovationID ?>" disabled>
                                                <input type="hidden" class="form-control" placeholder="" name="InnovationID" value="<?php echo $key ?>">
                                                <label for=""><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating" id="CreatorPersonalID">
                                                <input type="text" class="form-control" placeholder="นวัตกรรมการศึกษา" name="" value="<?php echo $name ?>" disabled>

                                                <label for=""><?php echo nbs(2); ?> นวัตกรรมการศึกษา </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CreatorPersonalIDTypeCode" aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                                    <option value="-1" selected>เลือก</option>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                                        <option value="<?= $cls->PERSONAL_ID_TYPE_CODE; ?>">
                                                            <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="floatingSelect"><?php echo nbs(2); ?>ประเภทบัตรประจำตัวผู้จัดทำ</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating" id="CreatorPersonalID">
                                                <input type="number" class="form-control" id="my-auto" placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="" disabled>
                                                <input type="hidden" class="form-control" id="my-autoo" placeholder="" name="CreatorPersonalID">
                                                <label for=""><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="CreatorPrefixCode" aria-label="Floating label select example" name="CreatorPrefixCode" required>
                                                    <option value="-1" selected>เลือก</option>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                                        <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?>
                                                        </option>
                                                    <?php } ?>

                                                </select>
                                                <label for="Y"><?php echo nbs(2); ?>คำนำหน้าชื่อผู้จัดทำ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai" required>
                                                <label for="Y"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish">
                                                <label for="floatingName"><?php echo nbs(2); ?>ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai">
                                                <label for=""><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish">
                                                <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai" required>
                                                <label for="Y"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish">
                                                <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" placeholder="สัดส่วนการมีส่วนร่วม" name="ParticipantRatio" required>
                                            <label for="Y"><?php echo nbs(2); ?>สัดส่วนการมีส่วนร่วม </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>" class="btn btn-danger" style="float: left;">ยกเลิก</a>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>
                                                        <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                                <script>
                                    const select = document.getElementById("CreatorPersonalIDTypeCode");
                                    const input = document.getElementById("my-auto");
                                    const input1 = document.getElementById("my-autoo");

                                    select.addEventListener("change", function() {
                                        if (select.value === "N" || select.value === "-1") {
                                            input.disabled = true;


                                            input.value = '';
                                            input1.value = '';

                                        } else {
                                            input.disabled = false;


                                            input.value = '';
                                            input1.value = '';
                                        }
                                    });
                                    input.addEventListener("input", function() {
                                        input1.value = input.value;
                                    });

                                    function checkSelectedOption() {

                                        if (select.value === "I" || select.value === "O") {
                                            const CreatorPersonalID = document.querySelector('#my-auto');
                                            const CreatorPersonalID_Value = CreatorPersonalID.value;

                                            if (CreatorPersonalID_Value.trim().length < 13 || CreatorPersonalID_Value.trim()
                                                .length >
                                                13) {
                                                alert('กรุณาใส่เลข13หลักให้ถูกต้อง');
                                                return false;
                                            }
                                        }
                                        const CLS_PERSONAL_ID_TYPE = document.querySelector('#CreatorPersonalIDTypeCode');
                                        const CLS_PERSONAL_ID_TYPE_Value = CLS_PERSONAL_ID_TYPE.value;

                                        if (CLS_PERSONAL_ID_TYPE_Value === '-1') {
                                            alert('กรุณาเลือกประเภทบัตรประจำตัวผู้จัดทำ');
                                            return false;
                                        }
                                        const PREFIX_NAME = document.querySelector('#CreatorPrefixCode');
                                        const PREFIX_NAME_Value = PREFIX_NAME.value;

                                        if (PREFIX_NAME_Value === '-1') {
                                            alert('กรุณาเลือกคำนำหน้าชื่อผู้จัดทำ');
                                            return false;
                                        }
                                    }
                                </script>
                            <?php } ?>
                            <?php if ($page == 'sh22') {  ?>
                                <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                                <?php

                                $result = $this->db->query("SELECT * FROM INNOVATION_CREATOR 
                            INNER JOIN INNOVATION
                            ON INNOVATION_CREATOR.InnovationID = INNOVATION.Id_in
                            WHERE Id_inc = '" . $key . "' 
                            ");

                                foreach ($result->result() as $show) {
                                    $CreatorPersonalID = base64_decode($show->CreatorPersonalID);
                                ?>
                                    <?php echo br(2); ?>
                                    <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->

                                    <body>

                                        <form action="<?php echo site_url('edit_p2'); ?>" method="post" onsubmit="return checkSelectedOption()">
                                            <input type="hidden" name="Id_inc" value="<?php echo $show->Id_inc ?>">
                                            <div class="row mb-3">




                                                <div class="col">
                                                    <div class="form-floating" id="InnovationID">
                                                        <input type="text" class="form-control" placeholder="รหัสนวัตกรรมการศึกษา" name="" value="<?php echo $show->InnovationID ?>" disabled>
                                                        <input type="hidden" class="form-control" placeholder="" name="InnovationID" value="<?php echo $show->Id_in ?>">
                                                        <label for=""><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating" id="CreatorPersonalID">
                                                        <input type="text" class="form-control" placeholder="นวัตกรรมการศึกษา" name="" value="<?php echo $name ?>" disabled>

                                                        <label for=""><?php echo nbs(2); ?> นวัตกรรมการศึกษา </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col">

                                                    <div class="form-floating">
                                                        <select class="form-select" id="CreatorPersonalIDTypeCode" aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">

                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option value="<?= $cls->PERSONAL_ID_TYPE_CODE; ?>">
                                                                    <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                        <label for="floatingSelect"><?php echo nbs(2); ?>ประเภทบัตรประจำตัวผู้จัดทำ</label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating" id="CreatorPersonalID">
                                                        <input type="number" class="form-control" id="my-auto" placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="" value="<?php echo  $CreatorPersonalID ?>" disabled>
                                                        <input type="hidden" class="form-control" id="my-autoo" placeholder="" name="CreatorPersonalID" value="<?php echo  $CreatorPersonalID ?>">
                                                        <label for=""><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="CreatorPrefixCode" aria-label="Floating label select example" name="CreatorPrefixCode" required value="<?php echo $show->CreatorPrefixCode ?>">

                                                            <?php
                                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                                            foreach ($result->result() as $cls) {
                                                            ?>
                                                                <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                        <label for="Y"><?php echo nbs(2); ?>คำนำหน้าชื่อผู้จัดทำ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai" required value="<?php echo $show->CreatorNameThai ?>">
                                                        <label for="Y"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish" value="<?php echo $show->CreatorNameEnglish ?>">
                                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai" value="<?php echo $show->CreatorMiddleNameThai ?>">
                                                        <label for=""><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish" value="<?php echo $show->CreatorMiddleNameEnglish ?>">
                                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai" required value="<?php echo $show->CreatorLastNameThai ?>">
                                                        <label for="Y"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish" value="<?php echo $show->CreatorLastNameEnglish ?>">
                                                        <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" placeholder="สัดส่วนการมีส่วนร่วม" name="ParticipantRatio" required value="<?php echo $show->ParticipantRatio ?>">
                                                    <label for="Y"><?php echo nbs(2); ?>สัดส่วนการมีส่วนร่วม </label>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <!-- ปุ่มยกเลิก --> <a href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>" class="btn btn-danger" style="float: left;">ยกเลิก</a> <!-- ปุ่มยกเลิก -->

                                                <!-- ปุ่มลบ --> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del_inno<?php echo $show->Id_inc; ?>"><i class="bi bi-trash"></i> </button> <!-- ปุ่มลบ -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                ยืนยันการแก้ไขข้อมูล</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>
                                                                <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                            </h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="del_inno<?php echo $show->Id_inc; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ยืนยันการลบข้อมูล
                                                        </h5>

                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <form method="post" action="<?php echo site_url('del_p2'); ?>">
                                                            <input type="hidden" name="Id_inc" value="<?php echo $show->Id_inc; ?>">
                                                            <input type="hidden" name="InnovationID" value="<?php echo $show->InnovationID; ?>">
                                                            <input type="hidden" name="CreatorNameThai" value="<?php echo $show->CreatorNameThai; ?>">

                                                            <div class="d-flex justify-content-center">
                                                                <button name="Submit" type="submit" class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Modal -->
                                        <script>
                                            const select = document.getElementById("CreatorPersonalIDTypeCode");
                                            const input = document.getElementById("my-auto");
                                            const input1 = document.getElementById("my-autoo");

                                            select.addEventListener("change", function() {
                                                if (select.value === "N" || select.value === "-1") {
                                                    input.disabled = true;


                                                    input.value = '';
                                                    input1.value = '';

                                                } else {
                                                    input.disabled = false;


                                                    input.value = '<?php echo  $CreatorPersonalID; ?>';
                                                    input1.value = '<?php echo  $CreatorPersonalID; ?>';
                                                }
                                            });
                                            input.addEventListener("input", function() {
                                                input1.value = input.value;
                                            });
                                            ///CLS_PERSONAL_ID_TYPE
                                            var my_CLS_PERSONAL_ID_TYPE = "<?php echo $show->CreatorPersonalIDTypeCode ?>";
                                            var selectoption_CLS_PERSONAL_ID_TYPE = document.querySelector(
                                                '#CreatorPersonalIDTypeCode');
                                            var size_my_CLS_PERSONAL_ID_TYPE = document.getElementById("CreatorPersonalIDTypeCode")
                                                .options
                                                .length;
                                            for (let i = 0; i < size_my_CLS_PERSONAL_ID_TYPE; i++) {
                                                if (selectoption_CLS_PERSONAL_ID_TYPE[i].value == my_CLS_PERSONAL_ID_TYPE) {
                                                    selectoption_CLS_PERSONAL_ID_TYPE[i].selected = true;
                                                }
                                            }
                                            ///CLS_PREFIX
                                            var my_CLS_PREFIX = "<?php echo $show->CreatorPrefixCode ?>";
                                            var selectoption_CLS_PREFIX = document.querySelector('#CreatorPrefixCode');
                                            var size_my_CLS_PREFIX = document.getElementById("CreatorPrefixCode").options
                                                .length;
                                            for (let i = 0; i < size_my_CLS_PREFIX; i++) {
                                                if (selectoption_CLS_PREFIX[i].value == my_CLS_PREFIX) {
                                                    selectoption_CLS_PREFIX[i].selected = true;
                                                }
                                            }

                                            function checkSelectedOption() {
                                                if (select.value === "I" || select.value === "O") {
                                                    const CreatorPersonalID = document.querySelector('#my-auto');
                                                    const CreatorPersonalID_Value = CreatorPersonalID.value;

                                                    if (CreatorPersonalID_Value.trim().length < 13 || CreatorPersonalID_Value.trim()
                                                        .length >
                                                        13) {
                                                        alert('กรุณาใส่เลข13หลักให้ถูกต้อง');
                                                        return false;
                                                    }
                                                }

                                                const CLS_PERSONAL_ID_TYPE = document.querySelector('#CreatorPersonalIDTypeCode');
                                                const CLS_PERSONAL_ID_TYPE_Value = CLS_PERSONAL_ID_TYPE.value;

                                                if (CLS_PERSONAL_ID_TYPE_Value === '-1') {
                                                    alert('กรุณาเลือกประเภทบัตรประจำตัวผู้จัดทำ');
                                                    return false;
                                                }
                                                const CLS_PREFIX = document.querySelector('#CreatorPrefixCode');
                                                const CLS_PREFIX_Value = CLS_PREFIX.value;

                                                if (CLS_PREFIX_Value === '-1') {
                                                    alert('กรุณาเลือกคำนำหน้าชื่อผู้จัดทำ');
                                                    return false;
                                                }
                                            }
                                        </script>
                                    </body>
                            <?php }
                            } ?>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
    </bady>
    <script>
        setTimeout(function() {
            document.getElementById('myAlert').remove();
        }, 2000); // นับถอยหลังให้แสดง 2 วินาที (2000 มิลลิวินาที)
    </script>