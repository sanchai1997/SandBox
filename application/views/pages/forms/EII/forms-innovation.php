<main id="main" class="main">
<?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
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
    <?php  } ?>
    <div class="pagetitle">
    <?php switch ($page) {
                    case 'sh1':
                ?> <h1>นวัตกรรมการศึกษา</h1>
                    <?php break;
                    case 'sh2':
                    ?> <h1>ผู้จัดทำนวัตกรรมการศึกษา</h1>
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
                    <?php  if ($page=='sh1') {  ?>
                        <h5 class="card-title">ข้อมูลนวัตกรรมการศึกษา</h5>
                        <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->
                        <form action="<?php echo site_url('forms_up_p1'); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID"  required aria-label="รหัสนวัตกรรมการศึกษา">
                                    <label for="floatingName"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา"
                                            name="EducationYear"  required max="4">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                               </div>
                          
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                            name="Semester"  required max="2">
                                        <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียน </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ชื่อนวัตกรรม"
                                        name="InnovationName" required>
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อนวัตกรรม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                             <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="InnovationTypeCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_INNOVATION_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->INNOVATION_TYPE_CODE; ?>"><?= $cls->INNOVATION_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทนวัตกรรม</label>
                                    </div>
                             </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->EDUCATION_LEVEL_CODE ; ?>"><?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                               </div>
                            </div>
                          
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="InnovationBenefit" required></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ของนวัตกรรม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="Abstract" required></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL">
                                </div>
                            </div>

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="แหล่งนวัตกรรม"
                                            name="Source" required>
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งนวัตกรรม </label>
                                    </div>
                               </div>
                          
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate" required>
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา"
                                        name="SearchKeyword" required>
                                    <label for="floatingName"><?php echo nbs(2); ?> คำค้นหา </label>
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
                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                        <?php } ?>
                        <?php  if ($page=='sh11') {  ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM INNOVATION 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <h5 class="card-title">ข้อมูลนวัตกรรมการศึกษา</h5>
                        <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->
                        <form action="<?php echo site_url('edit_p1'); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID" required max="16" value="<?php echo $show->InnovationID; ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา"
                                            name="EducationYear"  required max="4" value="<?php echo $show->EducationYear; ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                               </div>
                          
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                            name="Semester"  required max="1" value="<?php echo $show->Semester; ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียน </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ชื่อนวัตกรรม"
                                        name="InnovationName" required value="<?php echo $show->InnovationName; ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อนวัตกรรม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                             <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="InnovationTypeCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_INNOVATION_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->INNOVATION_TYPE_CODE; ?>"><?= $cls->INNOVATION_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทนวัตกรรม</label>
                                    </div>
                             </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->EDUCATION_LEVEL_CODE ; ?>"><?= $cls->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                               </div>
                            </div>
                          
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="InnovationBenefit" required><?php echo $show->InnovationBenefit; ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ของนวัตกรรม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="Abstract" required><?php echo $show->Abstract; ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL"  >
                                </div>
                            </div>

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="แหล่งนวัตกรรม"
                                            name="Source" required value="<?php echo $show->Source; ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งนวัตกรรม </label>
                                    </div>
                               </div>
                          
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate" required value="<?php echo $show->PublishDate; ?>">
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา"
                                        name="SearchKeyword" required value="<?php echo $show->SearchKeyword; ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> คำค้นหา </label>
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
                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                        <?php } 
                        }?>
                        <?php  if ($page=='sh2') {  ?>
                        <h5 class="card-title">ข้อมูลผู้จัดทำนวัตกรรมการศึกษา</h5>
                        <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->
                        <form action="<?php echo site_url('forms_up_p2'); ?>" method="post">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID" required>
                                    <label for="floatingName"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ"
                                        name="CreatorPersonalID" required>
                                    <label for="floatingName"><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPersonalIDTypeCode" required>
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PERSONAL_ID_TYPE_CODE ; ?>"><?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ</label>
                                    </div>
                               </div>
                           
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPrefixCode" required >
                                            <option selected  >เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ</label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorNameThai" required>
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)"
                                            name="CreatorNameEnglish" required>
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อผู้จัดทำ (ภาษาอังกฤษ) </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorMiddleNameThai" required>
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorMiddleNameEnglish" required>
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorLastNameThai" required>
                                        <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorLastNameEnglish" required>
                                        <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="สัดส่วนการมีส่วนร่วม"
                                        name="ParticipantRatio" required>
                                    <label for="floatingName"><?php echo nbs(2); ?>สัดส่วนการมีส่วนร่วม </label>
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
                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                        <?php } ?>
                        <?php  if ($page=='sh22') {  ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM INNOVATION_CREATOR 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <h5 class="card-title">ข้อมูลผู้จัดทำนวัตกรรมการศึกษา</h5>
                        <!-- start Form ข้อมูลนวัตกรรมการศึกษา -->
                        <form action="<?php echo site_url('edit_p2'); ?>" method="post">
<input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสนวัตกรรมการศึกษา" name="InnovationID" required value="<?php echo $show->InnovationID ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> รหัสนวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ"
                                        name="CreatorPersonalID" required value="<?php echo $show->CreatorPersonalID ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPersonalIDTypeCode" required value="<?php echo $show->CreatorPersonalIDTypeCode ?>">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PERSONAL_ID_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PERSONAL_ID_TYPE_CODE ; ?>"><?= $cls->PERSONAL_ID_TYPE_NAME; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ</label>
                                    </div>
                               </div>
                           
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPrefixCode" required value="<?php echo $show->CreatorPrefixCode ?>">
                                            <option selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ</label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorNameThai" required value="<?php echo $show->CreatorNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)"
                                            name="CreatorNameEnglish" required value="<?php echo $show->CreatorNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อผู้จัดทำ (ภาษาอังกฤษ) </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorMiddleNameThai" required value="<?php echo $show->CreatorMiddleNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorMiddleNameEnglish" required value="<?php echo $show->CreatorMiddleNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorLastNameThai" required value="<?php echo $show->CreatorLastNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorLastNameEnglish" required value="<?php echo $show->CreatorLastNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>นามสกุลผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                               </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="สัดส่วนการมีส่วนร่วม"
                                        name="ParticipantRatio" required value="<?php echo $show->ParticipantRatio ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>สัดส่วนการมีส่วนร่วม </label>
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
                        </form><!-- End Form ข้อมูลนวัตกรรมการศึกษา -->
                        <?php } 
                        }?>
                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->