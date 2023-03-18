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
    <?php } ?>
    <div class="pagetitle">
        <div class="row ">

            <?php switch ($page) {
                case 'sh1':
                    ?>
            <h1>แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h1>
            <?php break;
            case 'sh1.1':
            ?>
    <h1>แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h1>
    <?php break;
                case 'sh2':
                    ?>
            <h1>ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h1>
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
                        <li class="breadcrumb-item active">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</li>
                    </ol>
                </nav> -->
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url('Fm_best_practice_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</a>
                <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_best_practice_das_p2?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</a> -->
                
            </div>

        </div>
    </div>

    </div><!-- End Page Title -->
    
    <?php if ($page == 'sh1') { ?>


    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('BP_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</th>
                            <th style="text-align: center;" scope="col">ชื่อวิธีปฏิบัติ</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทวิธีปฏิบัติ</th>
                            <th style="text-align: center;" scope="col">รหัสระดับการศึกษาที่นำไปใช้</th>
                            <th style="text-align: center;" scope="col">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                                ?>
                              <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?> 
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->BestPracticeID; ?>
                            </th>
                           
                            <td style="text-align: center;">
                                <?php echo $show->BestPracticeName; ?>
                        </td>
                            <th style="text-align: center;">
                                <?php echo $shows->BEST_PRACTICE_TYPE_NAME; ?>
                            </th>
                            <td style="text-align: center;">
                                <?php echo $shows->EDUCATION_LEVEL_NAME; ?>
                                </td>
                                <th scope="row " style="text-align: center;"> <a
                                    href="<?php echo site_url('Fm_best_practice_das_p1?page=sh1.1') ?>&&key=<?php echo $show->BestPracticeID ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a> </th>
                            
                            
                            <td style="text-align: center;" >
                            <button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#look<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_BP<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_BP<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->BestPracticeID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('BP_del_p1'); ?>">
                                                    <input type="hidden" name="Id"
                                                        value="<?php echo $show->Id; ?>">
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
                        <?php } }?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if ($page == 'sh1.1') { ?>


<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">รายละเอียดข้อมูล </h5>
                </div>
                <div class="col">
                    <h5 style="float: right; padding: 15px;" class="card-title"><a
                            href="<?php echo site_url('BPC_forms_p2?page=sh2') ?>"
                            class="btn btn-success">เพิ่มข้อมูล</a>
                    </h5>
                </div>
            </div>
            <table class="table table-borderless datatable">
                <thead>

                    <tr>
                        <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ประเภทบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ชื่อผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                    </tr>

                </thead>
                <tbody>
                <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                    <?php 
                $result = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR 
                INNER JOIN CLS_PERSONAL_ID_TYPE 
                ON CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE = BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode 
                INNER JOIN CLS_PREFIX 
                ON CLS_PREFIX.PREFIX_CODE = BEST_PRACTICE_CREATOR.CreatorPrefixCode 

                WHERE BestPracticeID ='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                    <tr>
                        
                        <th style="text-align: center;">
                            <?php echo $show->CreatorPersonalID; ?>
                        </th>
                        <td style="text-align: center;">
                            <?php echo $show->PERSONAL_ID_TYPE_NAME; ?></td>
                        <th style="text-align: center;">
                            <?php echo $show->CreatorNameThai; ?><?php echo nbs(2); ?><?php echo $show->CreatorLastNameThai; ?>
                        </th>

                        

                       
                        <td style="text-align: center;" scope="row">
                        <button type="button" class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#las2<?php echo $show->Id; ?>"><i
                                    class="bi bi-card-list"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#del_BPC<?php echo $show->Id; ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="del_BPC<?php echo $show->Id; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->BestPracticeID; ?>
                                            </h5>

                                        </div>
                                        <div class="modal-body">
                                            คุณต้องการลบข้อมูลใช่หรือไหม

                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <form method="post"
                                                action="<?php echo site_url('BPC_del_p2'); ?>">
                                                <input type="hidden" name="Id"
                                                    value="<?php echo $show->Id; ?>">
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
    <?php if ($page == 'sh2') { ?>


    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('BPC_forms_p2?page=sh2') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a>
                        </h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                    <tr>
                        <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">รหัสประเภทบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ชื่อผู้จัดทำ (ภาษาไทย)</th>
                        <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                    </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                                ?>
                        <tr>
                        
                        <th style="text-align: center;">
                            <?php echo $show->CreatorPersonalID; ?>
                        </th>
                        <td style="text-align: center;">
                            <?php echo $show->CreatorPersonalIDTypeCode; ?></td>
                        <th style="text-align: center;">
                            <?php echo $show->CreatorNameThai; ?><?php echo nbs(2); ?><?php echo $show->CreatorLastNameThai; ?>
                        </th>

                        

                       
                        <td style="text-align: center;" scope="row">
                        <button type="button" class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#las3<?php echo $show->Id; ?>"><i
                                    class="bi bi-card-list"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#del_BPC<?php echo $show->Id; ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="del_BPC<?php echo $show->Id; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->BestPracticeID; ?>
                                            </h5>

                                        </div>
                                        <div class="modal-body">
                                            คุณต้องการลบข้อมูลใช่หรือไหม

                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <form method="post"
                                                action="<?php echo site_url('BPC_del_p2'); ?>">
                                                <input type="hidden" name="Id"
                                                    value="<?php echo $show->Id; ?>">
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


    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->
<?php  if ($page=='sh1') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM BEST_PRACTICE 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            INNER JOIN CLS_RECOGNIZED_BY 
                            ON CLS_RECOGNIZED_BY.RECOGNIZED_BY_CODE = BEST_PRACTICE.RecognizedCode 
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?> 
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                        <p><?php echo $show->BestPracticeID; ?></p>
                        <h5 class="fw-bold">ปีการศึกษา</h5>
                        <p><?php echo $show->EducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียน</h5>
                        <p><?php echo $show->Semester; ?></p>
                        <h5 class="fw-bold">ชื่อวิธีปฏิบัติ</h5>
                        <p><?php echo $show->BestPracticeName; ?></p>
                        <h5 class="fw-bold">รหัสประเภทวิธีปฏิบัติ</h5>
                        <p><?php echo $shows->BEST_PRACTICE_TYPE_NAME; ?></p>
                        <h5 class="fw-bold">รหัสระดับการศึกษาที่นำไปใช้</h5>
                        <p><?php echo $shows->EDUCATION_LEVEL_NAME; ?></p>
                    </div>


                    <div class="col">
                        <h5 class="fw-bold">รหัสการเผยแพร่ที่ได้รับการยอมรับ</h5>
                        <p><?php echo $shows->RECOGNIZED_BY_NAME; ?></p>
                        <h5 class="fw-bold">ประโยชน์ที่ได้รับ</h5>
                        <p><?php echo $show->Benefit; ?></p>
                        <h5 class="fw-bold">บทคัดย่อ</h5>
                        <p><?php echo $show->Abstract; ?></p>
                        <h5 class="fw-bold">คำค้นหา</h5>
                        <p><?php echo $show->SearchKeyword; ?></p>
                        <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('document') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-text"></i></a></p>
                        <h5 class="fw-bold">วิธีการปฏิบัติ</h5>
                        <p><?php echo $show->PracticeProcess; ?></p>
                        <h5 class="fw-bold">แหล่งที่มา</h5>
                        <p><?php echo $show->Source; ?></p>
                        <h5 class="fw-bold">วันที่เผยแพร่</h5>
                        <p><?php echo $show->PublishDate; ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('BP_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } }?>
</tbody>
</table>
<?php } ?>
<?php  if ($page=='sh1.1') {  ?>


    <?php 
                
                 $result = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR 
                INNER JOIN CLS_PERSONAL_ID_TYPE 
                ON CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE = BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode 
                INNER JOIN CLS_PREFIX 
                ON CLS_PREFIX.PREFIX_CODE = BEST_PRACTICE_CREATOR.CreatorPrefixCode 

                WHERE  DeleteStatus = '0'");
                
                
                foreach ($result->result() as $show) {  ?>
<div class="modal fade" id="las2<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                        <p><?php echo $show->BestPracticeID; ?></p>
                        <h5 class="fw-bold">หมายเลขบัตรประจำตัวผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPersonalID; ?></p>
                        <h5 class="fw-bold">รหัสประเภทบัตรประจำตัวผู้จัดทำ</h5>
                        <p><?php echo $show->PERSONAL_ID_TYPE_NAME; ?></p>
                        <h5 class="fw-bold">รหัสคำนำหน้าชื่อผู้จัดทำ</h5>
                        <p><?php echo $show->PREFIX_NAME; ?></p>
                        <h5 class="fw-bold">สัดส่วนการมีส่วนร่วม</h5>
                        <p><?php echo $show->ParticipantRatio; ?></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">รหัสคำนำหน้าชื่อผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPrefixCode; ?></p>
                        <h5 class="fw-bold"> ชื่อผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorNameThai; ?></p>
                        <h5 class="fw-bold">ชื่อผู้จัดทำ (ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorNameEnglish; ?></p>
                        <h5 class="fw-bold">ชื่อกลางผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorMiddleNameThai; ?></p>
                        <h5 class="fw-bold">ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorMiddleNameEnglish; ?></p>
                        <h5 class="fw-bold">นามสกุลผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorLastNameThai; ?></p>
                        <h5 class="fw-bold">นามสกุลผู้จัดทำ(ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorLastNameEnglish; ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('BPC_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              
            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh2') {  ?>


<?php 
            $result = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR 
            
            WHERE DeleteStatus = '0'");
            foreach ($result->result() as $show) {  ?>
<div class="modal fade" id="las3<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                        <p><?php echo $show->BestPracticeID; ?></p>
                        <h5 class="fw-bold">หมายเลขบัตรประจำตัวผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPersonalID; ?></p>
                        <h5 class="fw-bold">รหัสประเภทบัตรประจำตัวผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPersonalIDTypeCode; ?></p>
                        <h5 class="fw-bold">รหัสคำนำหน้าชื่อผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPrefixCode; ?></p>
                        <h5 class="fw-bold">สัดส่วนการมีส่วนร่วม</h5>
                        <p><?php echo $show->ParticipantRatio; ?></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">รหัสคำนำหน้าชื่อผู้จัดทำ</h5>
                        <p><?php echo $show->CreatorPrefixCode; ?></p>
                        <h5 class="fw-bold"> ชื่อผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorNameThai; ?></p>
                        <h5 class="fw-bold">ชื่อผู้จัดทำ (ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorNameEnglish; ?></p>
                        <h5 class="fw-bold">ชื่อกลางผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorMiddleNameThai; ?></p>
                        <h5 class="fw-bold">ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorMiddleNameEnglish; ?></p>
                        <h5 class="fw-bold">นามสกุลผู้จัดทำ (ภาษาไทย)</h5>
                        <p><?php echo $show->CreatorLastNameThai; ?></p>
                        <h5 class="fw-bold">นามสกุลผู้จัดทำ(ภาษาอังกฤษ)</h5>
                        <p><?php echo $show->CreatorLastNameEnglish; ?></p>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
        <a href="<?php echo site_url('BPC_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          
        </div>
    </div>
</div>
</div>
<!-- **************************************************แก้ไข********************************************************************** -->
<?php  } ?>

<?php } ?>