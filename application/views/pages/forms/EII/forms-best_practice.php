<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
    <div class="pagetitle">
        <h1>ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h1>
        <!-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</li>
            </ol>
        </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <?php switch ($page) {
                            case 'sh1': ?> <h5 class="card-title">ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจักดการศึกษา</h5>
                        <?php break;
                            case 'sh2': ?> <h5 class="card-title">ข้อมูลผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา
                        </h5>
                        <?php break;
                            case 'sh11': ?> <h5 class="card-title">ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจักดการศึกษา</h5>
                        <?php break;
                            case 'sh22': ?> <h5 class="card-title">ข้อมูลผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา
                        </h5>
                        <?php break;
                            default: ?>
                        <?php break;
                        } ?>
                        <?php if ($page == 'sh1') { ?>

                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                                                'BP_forms_up_p1'
                                            ); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา" name="BestPracticeID">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษา" name="EducationYear">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                            name="Semester">
                                        <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียน </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อวิธีปฏิบัติ" name="BestPracticeName">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อวิธีปฏิบัติ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="BestPracticeTypeCode">
                                            <option selected>เลือก</option>
                                            <?php
                                                $result = $this->db->query('SELECT * FROM CLS_BEST_PRACTICE_TYPE');
                                                foreach ($result->result() as $cls) {
                                                ?>
                                            <option value="<?= $cls->BEST_PRACTICE_TYPE_CODE; ?>">
                                                <?= $cls->BEST_PRACTICE_TYPE_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทวิธีปฏิบัติ</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode"
                                            require>

                                            <option selected>เลือก</option>
                                            <?php
                                                $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                                foreach ($result->result() as $cls) {
                                                ?>
                                            <option value="<?= $cls->EDUCATION_LEVEL_CODE; ?>">
                                                <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="RecognizedCode" require>
                                            <option selected>เลือก</option>
                                            <?php
                                                $result = $this->db->query('SELECT * FROM CLS_RECOGNIZED_BY');
                                                foreach ($result->result() as $cls) {
                                                ?>
                                            <option value="<?= $cls->RECOGNIZED_BY_CODE; ?>">
                                                <?= $cls->RECOGNIZED_BY_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสการเผยแพร่ที่ได้รับการยอมรับ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 60px" name="Benefit"></textarea>
                                        <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ที่ได้รับ</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="Abstract"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา"
                                            name="SearchKeyword">
                                        <label for="floatingName"><?php echo nbs(2); ?> คำค้นหา </label>
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
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="PracticeProcess"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>วิธีการปฏิบัติ</label>
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
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate">
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

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


                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php } ?>
                        <?php if ($page == 'sh11') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php

                            $result = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            WHERE Id = '" . $key . "' 
                            ");

                            foreach ($result->result() as $show) {
                            ?>
                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                                                    'BP_edit_p1'
                                                ); ?>" method="post" enctype="multipart/form-data" id="BP11"
                            name="BP11">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา" name="BestPracticeID"
                                        value="<?php echo $show->BestPracticeID ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษา" name="EducationYear"
                                            value="<?php echo $show->EducationYear ?>">
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
                                        placeholder="ชื่อวิธีปฏิบัติ" name="BestPracticeName"
                                        value="<?php echo $show->BestPracticeName ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อวิธีปฏิบัติ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="BestPracticeTypeCode">
                                            <option value="<?php echo $show->BestPracticeTypeCode ?>">
                                                "<?php echo $show->BestPracticeTypeCode ?></option>
                                            <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_BEST_PRACTICE_TYPE');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                            <option value="<?= $cls->BEST_PRACTICE_TYPE_CODE; ?>">
                                                <?= $cls->BEST_PRACTICE_TYPE_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทวิธีปฏิบัติ</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode"
                                            require value="<?php echo $show->TargetEducationLevelCode ?>">

                                            <option selected>เลือก</option>
                                            <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                            <option value="<?= $cls->EDUCATION_LEVEL_CODE; ?>">
                                                <?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="RecognizedCode" require
                                            value="<?php echo $show->RecognizedCode ?>">
                                            <option selected>เลือก</option>
                                            <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_RECOGNIZED_BY');
                                                    foreach ($result->result() as $cls) {
                                                    ?>
                                            <option value="<?= $cls->RECOGNIZED_BY_CODE; ?>">
                                                <?= $cls->RECOGNIZED_BY_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสการเผยแพร่ที่ได้รับการยอมรับ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 60px"
                                            name="Benefit"><?php echo $show->Benefit ?></textarea>
                                        <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ที่ได้รับ</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px"
                                        name="Abstract"><?php echo $show->Abstract ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา"
                                            name="SearchKeyword" value="<?php echo $show->SearchKeyword ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> คำค้นหา </label>
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
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px"
                                        name="PracticeProcess"><?php echo $show->PracticeProcess ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>วิธีการปฏิบัติ</label>
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
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate" value="<?php echo $show->PublishDate ?>">
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>
                                 <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
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

                           



                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php }
                        } ?>
                        <?php if ($page == 'sh2') { ?>

                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                                                'BPC_forms_up_p2'
                                            ); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา"
                                            name="BestPracticeID" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="CreatorPersonalID" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->PERSONAL_ID_TYPE_CODE; ?>">
                                            <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPrefixCode">
                                        <option selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder=" สัดส่วนการมีส่วนร่วม" name="ParticipantRatio" value="">
                                    <label for="floatingName">
                                        <?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม
                                    </label>
                                </div>
                            </div>
                           <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;" >บันทึกข้อมูล</button>  
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

                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php } ?>
                        <?php if ($page == 'sh22') { ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php

                            $result = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR 
                            WHERE Id = '" . $key . "' 
                            ");

                            foreach ($result->result() as $show) {
                            ?>
                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                                                    'BPC_edit_p2'
                                                ); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา"
                                            name="BestPracticeID" value="<?php echo $show->BestPracticeID ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="CreatorPersonalID"
                                            value="<?php echo $show->CreatorPersonalID ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPersonalIDTypeCode"
                                        value="<?php echo $show->CreatorPersonalIDTypeCode ?>">
                                        <option selected>เลือก</option>
                                        <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                                foreach ($result->result() as $cls) {
                                                ?>
                                        <option value="<?= $cls->PERSONAL_ID_TYPE_CODE; ?>">
                                            <?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPrefixCode"
                                        value="<?php echo $show->CreatorPrefixCode ?>">
                                        <option selected>เลือก</option>
                                        <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                                foreach ($result->result() as $cls) {
                                                ?>
                                        <option value="<?= $cls->PREFIX_CODE; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai"
                                            value="<?php echo $show->CreatorNameThai ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish"
                                            value="<?php echo $show->CreatorNameEnglish ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ)
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
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish"
                                            value="<?php echo $show->CreatorMiddleNameEnglish ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai"
                                            value="<?php echo $show->CreatorLastNameThai ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish"
                                            value="<?php echo $show->CreatorLastNameEnglish ?>">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder=" สัดส่วนการมีส่วนร่วม" name="ParticipantRatio"
                                        value="<?php echo $show->ParticipantRatio ?>">
                                    <label for="floatingName">
                                        <?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม
                                    </label>
                                </div>
                            </div>
                               <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
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
                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php }
                        } ?>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->