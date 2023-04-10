<main id="main" class="main">
    <style>
    label[for="Y"]:after {
        content: " *";
        color: red;
    }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
    <?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
    <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
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
        <?php switch ($page) {
                case 'sh1':
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้ <?php echo  $name ; ?></h1>
        <?php break;
                case 'sh2':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้ - <?php echo  $name ; ?></h1>
        <?php
                    break;
                    case 'sh11':
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้ - <?php echo  $name ; ?></h1>
        <?php break;
                case 'sh22':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้ - <?php echo  $name ; ?></h1>
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
                <li class="breadcrumb-item active">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</li>
            </ol>
        </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- 
                    <?php switch ($page) {
                case 'sh1':
            ?> <h5 class="card-title">ข้อมูลเทคโนโลยี และสื่อการเรียนรู้</h5>
                        <?php break;
                case 'sh2':
                ?> <h5 class="card-title">ข้อมูลผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <?php
                    break;
                    case 'sh22':
                    ?> <h5 class="card-title">ข้อมูลผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h5>
                            <?php
                        break;
                        case 'sh11':
                        ?> <h5 class="card-title">ข้อมูลเทคโนโลยี และสื่อการเรียนรู้</h5>
                                <?php
                            break;
                                
                               default:
                ?>
                        <?php
                    break;
            }  ?> -->
                        <?php  echo br(2); ?>
                        <?php if($page=='sh1'){  ?>
                        <!-- start Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <form action="<?php echo site_url('LTM_forms_up_p1'); ?>" method="post"
                            enctype="multipart/form-data" onsubmit="return checkSelectedOption()">
                            <!-- <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID">
                                    <label for="Y"><?php echo nbs(2); ?>
                                        รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษา" name="EducationYear">
                                        <label for="Y"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                                </div>

                                <!-- <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                            name="Semester">
                                        <label for="Y"><?php echo nbs(2); ?> ภาคเรียน </label>
                                    </div>
                                </div> -->
                                <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="Semester"
                                                    name="Semester">
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
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อเทคโนโลยีและสื่อการเรียนรู้" name="MediaName">
                                    <label for="Y"><?php echo nbs(2); ?> ชื่อเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="MediaTypeCode"
                                            aria-label="Floating label select example" name="MediaTypeCode">
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MEDIA_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->MEDIA_TYPE_CODE ; ?>"><?= $cls->MEDIA_TYPE_NAME; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label for="Y"><?php echo nbs(2); ?>ประเภทเทคโนโลยีและสื่อการเรียนรู้</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="TargetEducationLevelCode"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode"
                                            require>
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->EDUCATION_LEVEL_CODE ; ?>">
                                                <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้" name="MediaBenefit">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Abstract"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นห้า"
                                            name="SearchKeyword">
                                        <label for="Y"><?php echo nbs(2); ?> คำค้นห้า </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                        <input type="file" class="form-control" id="inputGroupFile01"
                                            name="AttachmentURL">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="แหล่งที่มา" name="Source">
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งที่มา </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="PublishDate">
                                            <label for="Y">วันที่เผยแพร่</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_lear_tech_media_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <script>
                        function checkSelectedOption() {
                            const CLS_MEDIA_TYPE = document.querySelector('#MediaTypeCode');
                            const CLS_MEDIA_TYPE_Value = CLS_MEDIA_TYPE.value;

                            if (CLS_MEDIA_TYPE_Value === '-1') {
                                alert('กรุณาเลือกประเภทเทคโนโลยีและสื่อการเรียนรู้');
                                return false;
                            }
                            const CLS_EDUCATION_LEVEL = document.querySelector('#TargetEducationLevelCode');
                            const CLS_EDUCATION_LEVEL_Value = CLS_EDUCATION_LEVEL.value;

                            if (CLS_EDUCATION_LEVEL_Value === '-1') {
                                alert('กรุณาเลือกระดับการศึกษาที่นำไปใช้');
                                return false;
                            }
                            const Semester = document.querySelector('#Semester');
                            const Semester_Value = Semester.value;

                            if (Semester_Value === '-1') {
                                alert('กรุณาเลือกภาคเรียน');
                                return false;
                            }
                            
                        }
                        </script>
                        <?php  } ?>
                        <?php if($page=='sh11'){  ?>


                        <?php
                            
                            $result = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                            WHERE MediaID = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <form action="<?php echo site_url('LTM_edit_p1'); ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="MediaID" value="<?php echo $show->MediaID ?>">
                            <!-- <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID"
                                        value="<?php echo $show->MediaID ?>">
                                    <label for="Y"><?php echo nbs(2); ?>
                                        รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div> -->

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษา" name="EducationYear"
                                            value="<?php echo $show->EducationYear ?>">
                                        <label for="Y"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                                </div>

                                  <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="Semester"
                                                    name="Semester">
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
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อเทคโนโลยีและสื่อการเรียนรู้" name="MediaName"
                                        value="<?php echo $show->MediaName ?>">
                                    <label for="Y"><?php echo nbs(2); ?> ชื่อเทคโนโลยีและสื่อการเรียนรู้
                                    </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="MediaTypeCode"
                                            aria-label="Floating label select example" name="MediaTypeCode"
                                            value="<?php echo $show->MediaTypeCode ?>">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MEDIA_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->MEDIA_TYPE_CODE ; ?>"><?= $cls->MEDIA_TYPE_NAME; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label
                                            for="Y"><?php echo nbs(2); ?>รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="TargetEducationLevelCode"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode"
                                            require value="<?php echo $show->TargetEducationLevelCode ?>">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->EDUCATION_LEVEL_CODE ; ?>">
                                                <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้" name="MediaBenefit"
                                        value="<?php echo $show->MediaBenefit ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="Abstract"><?php echo $show->Abstract ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นห้า"
                                            name="SearchKeyword" value="<?php echo $show->SearchKeyword ?>">
                                        <label for="Y"><?php echo nbs(2); ?> คำค้นห้า </label>
                                    </div>
                                </div>
                                <input name="oil_file" type="hidden" value="<?php echo $show->AttachmentURL ?>">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                        <input type="file" class="form-control" id="inputGroupFile01"
                                            name="AttachmentURL">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="แหล่งที่มา" name="Source" value="<?php echo $show->Source ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งที่มา </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="PublishDate" value="<?php echo $show->PublishDate ?>">
                                            <label for="Y">วันที่เผยแพร่</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="Fm_lear_tech_media_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <script>
                            ///Semester
                        var my_Semester = '<?php echo $show->Semester; ?>';
                        var selectoption_Semester = document.querySelector('#Semester');
                        var size_my_Semester = document.getElementById("Semester").options.length;
                        for (let i = 0; i < size_my_Semester; i++) {
                            if (selectoption_Semester[i].value == my_Semester) {
                                selectoption_Semester[i].selected = true;
                            }
                        }
                        ///CLS_MEDIA_TYPE
                        var my_CLS_MEDIA_TYPE = '<?php echo $show->MediaTypeCode; ?>';
                        var selectoption_CLS_MEDIA_TYPE = document.querySelector('#MediaTypeCode');
                        var size_my_CLS_MEDIA_TYPE = document.getElementById("MediaTypeCode").options.length;
                        for (let i = 0; i < size_my_CLS_MEDIA_TYPE; i++) {
                            if (selectoption_CLS_MEDIA_TYPE[i].value == my_CLS_MEDIA_TYPE) {
                                selectoption_CLS_MEDIA_TYPE[i].selected = true;
                            }
                        }
                        ///CLS_EDUCATION_LEVEL
                        var my_CLS_EDUCATION_LEVEL = '<?php echo $show->TargetEducationLevelCode; ?>';
                        var selectoption_CLS_EDUCATION_LEVEL = document.querySelector('#TargetEducationLevelCode');
                        var size_my_CLS_EDUCATION_LEVEL = document.getElementById("TargetEducationLevelCode").options
                            .length;
                        for (let i = 0; i < size_my_CLS_EDUCATION_LEVEL; i++) {
                            if (selectoption_CLS_EDUCATION_LEVEL[i].value == my_CLS_EDUCATION_LEVEL) {
                                selectoption_CLS_EDUCATION_LEVEL[i].selected = true;
                            }
                        }
                        </script>
                        <?php  }
                        } ?>
                        <?php if($page=='sh2'){ ?>
                        <form action="<?php echo site_url('LTMC_forms_up_p2'); ?>" method="post"
                            enctype="multipart/form-data" onsubmit="return checkSelectedOption()">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="hidden" class="form-control" id="floatingName"
                                        placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID"
                                        value="<?php echo $key; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="CreatorPersonalIDTypeCode"
                                            aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->PERSONAL_ID_TYPE_CODE ; ?>">
                                                <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                        <div class="form-floating" id="CreatorPersonalID">
                                            <input type="text" class="form-control" id="my-auto"
                                                placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name=""
                                                disabled>
                                                <input type="hidden" class="form-control" id="my-autoo"
                                                placeholder="" name="CreatorPersonalID"
                                                >
                                            <label for=""><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                        </div>
                                    </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="CreatorPrefixCode"
                                            aria-label="Floating label select example" name="CreatorPrefixCode">
                                            <option value="-1" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?>
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
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai">
                                        <label for="Y"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai">
                                        <label for=""><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai">
                                        <label for="Y"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="สัดส่วนการมีส่วนร่วม" name="ParticipantRatio">
                                    <label for="Y"><?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="Fm_lear_tech_media_das_p1?page=sh1" class="btn btn-danger"
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
                        </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <script>
                           const select = document.getElementById("CreatorPersonalIDTypeCode");
                            const input = document.getElementById("my-auto");
                            const input1 = document.getElementById("my-autoo");

                            select.addEventListener("change", function() {
                                if (select.value === "N" || select.value === "-1") {
                                    input.disabled = true;

                                    input.value = '0';
                                    input1.value = '0';

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
                        <?php }  ?>
                        <?php if($page=='sh22'){ ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <form action="<?php echo site_url('LTMC_edit_p2'); ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <!-- <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID"
                                            value="<?php echo $show->MediaID ?>">
                                        <label for="Y"><?php echo nbs(2); ?>
                                            รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                                    </div> -->
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="MediaID"
                                            aria-label="Floating label select example" name="MediaID">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM LEARNING_TECHNOLOGY_MEDIA WHERE DeleteStatus = 0');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->MediaID ; ?>">
                                                <?= $cls->MediaName; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="CreatorPersonalIDTypeCode"
                                            aria-label="Floating label select example" name="CreatorPersonalIDTypeCode"
                                            value="<?php echo $show->CreatorPersonalIDTypeCode ?>">

                                            <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                        foreach ($result->result() as $cls) {
                                        ?>
                                            <option value="<?= $cls->PERSONAL_ID_TYPE_CODE ; ?>">
                                                <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>ประเภทบัตรประจำตัวผู้จัดทำ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                        <div class="form-floating" id="CreatorPersonalID">
                                            <input type="text" class="form-control" id="my-auto"
                                                placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name=""value="<?php echo $show->CreatorPersonalID; ?>"
                                                >
                                                <input type="hidden" class="form-control" id="my-autoo"
                                                placeholder="" name="CreatorPersonalID"
                                                >
                                            <label for=""><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                        </div>
                                    </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="CreatorPrefixCode"
                                            aria-label="Floating label select example" name="CreatorPrefixCode"
                                            value="<?php echo $show->CreatorPrefixCode ?>">

                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                            <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?>
                                            </option>
                                            <?php } ?>

                                        </select>
                                        <label for="Y"><?php echo nbs(2); ?>นำหน้าชื่อผู้จัดทำ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai"
                                            value="<?php echo $show->CreatorNameThai ?>">
                                        <label for="Y"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish"
                                            value="<?php echo $show->CreatorNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai"
                                            value="<?php echo $show->CreatorMiddleNameThai ?>">
                                        <label for=""><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย)
                                        </label>
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
                                        <label for="Y"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish"
                                            value="<?php echo $show->CreatorLastNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="สัดส่วนการมีส่วนร่วม" name="ParticipantRatio"
                                        value="<?php echo $show->ParticipantRatio ?>">
                                    <label for="Y"><?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="Fm_lear_tech_media_das_p1?page=sh1" class="btn btn-danger"
                                    style="float: left;">ยกเลิก</a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit_lean2<?php echo $show->Id; ?>" style="float: right;">แก้ไขข้อมูล</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTM">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="edit_lean2<?php echo $show->Id; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล <?php echo $show->CreatorNameThai; ?>-<?php echo $show->CreatorLastNameThai; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>
                                            <p class="text-center">คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</p >
                                        </h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                        <form method="post" action="<?php echo site_url('LTMC_edit_p2'); ?>">
                                            <input type="hidden" name="Id"
                                            value="<?php echo $show->Id; ?>">
                                            <div class="d-flex justify-content-center">
                                                <button name="Submit" type="submit"
                                                class="btn btn-warning">ยืนยันแก้ไขข้อมูล</button>
                                            </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                            <!-- Modal -->
                            <div class="modal fade" id="del_LTM" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->CreatorNameThai; ?>-<?php echo $show->CreatorLastNameThai; ?>
                                            </h5>

                                        </div>
                                        <div class="modal-body">
                                           <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม ?</p>

                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <form method="post" action="<?php echo site_url('LTMC_del_p2'); ?>">
                                                <input type="hidden" name="Id"
                                                    value="<?php echo $show->Id; ?>">
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
                           const select = document.getElementById("CreatorPersonalIDTypeCode");
                            const input = document.getElementById("my-auto");
                            const input1 = document.getElementById("my-autoo");

                            select.addEventListener("change", function() {
                                if (select.value === "N" || select.value === "-1") {
                                    input.disabled = true;

                                    input.value = '0';
                                    input1.value = '0';

                                } else {
                                    input.disabled = false;

                                    input.value = '<?php echo $show->CreatorPersonalID; ?>';
                                    input1.value = '<?php echo $show->CreatorPersonalID; ?>';
                                }
                            });
                            input.addEventListener("input", function() {
                                input1.value = input.value;
                            });
                        ///CLS_PERSONAL_ID_TYPE
                        var my_CLS_PERSONAL_ID_TYPE = '<?php echo $show->CreatorPersonalIDTypeCode; ?>';
                        var selectoption_CLS_PERSONAL_ID_TYPE = document.querySelector('#CreatorPersonalIDTypeCode');
                        var size_my_CLS_PERSONAL_ID_TYPE = document.getElementById("CreatorPersonalIDTypeCode").options
                            .length;
                        for (let i = 0; i < size_my_CLS_PERSONAL_ID_TYPE; i++) {
                            if (selectoption_CLS_PERSONAL_ID_TYPE[i].value == my_CLS_PERSONAL_ID_TYPE) {
                                selectoption_CLS_PERSONAL_ID_TYPE[i].selected = true;
                            }
                        }
                        ///CLS_PREFIX
                        var my_CLS_PREFIX = '<?php echo $show->CreatorPrefixCode; ?>';
                        var selectoption_CLS_PREFIX = document.querySelector('#CreatorPrefixCode');
                        var size_my_CLS_PREFIX = document.getElementById("CreatorPrefixCode").options.length;
                        for (let i = 0; i < size_my_CLS_PREFIX; i++) {
                            if (selectoption_CLS_PREFIX[i].value == my_CLS_PREFIX) {
                                selectoption_CLS_PREFIX[i].selected = true;
                            }
                        }
                        ///LEARNING_TECHNOLOGY_MEDIA
                        var my_LEARNING_TECHNOLOGY_MEDIA = '<?php echo $show->MediaID; ?>';
                        var selectoption_LEARNING_TECHNOLOGY_MEDIA = document.querySelector('#MediaID');
                        var size_my_LEARNING_TECHNOLOGY_MEDIA = document.getElementById("MediaID").options.length;
                        for (let i = 0; i < size_my_LEARNING_TECHNOLOGY_MEDIA; i++) {
                            if (selectoption_LEARNING_TECHNOLOGY_MEDIA[i].value == my_LEARNING_TECHNOLOGY_MEDIA) {
                                selectoption_LEARNING_TECHNOLOGY_MEDIA[i].selected = true;
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
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->