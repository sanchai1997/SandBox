<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
    <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
    <?php $name = isset($_GET['name']) ? $_GET['name'] : '';  ?>
    <style>
    .my-link {
        color: black;
    }

    .my-link:hover {
        color: blue;
    }
    </style>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
     // เริ่มต้น session
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
            <h1>แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา - <?php echo $name; ?></h1>
            <?php break;
                case 'sh2':
                ?>
            <h1>ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา - <?php echo $name; ?></h1>
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
                <!-- <a href="<?php echo site_url('Fm_best_practice_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</a> -->
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
                            <h5 class="card-title">
                            
                            </h5>
                        </div>
                    <div class="col">
                        <?php 
                     
                        if($R_504000 <> NULL && $R_504000['UR_Add']== "1"){ ?>

                       
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('BP_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                                <?php  } ?>
                    </div>
                </div>

                <table class="table  <?php if ($R_504000 <> NULL && $R_504000['UR_Add'] == "1") {
                                                                echo 'table-borderless datatable';
                                                            }else {
                                                                echo 'table-bordered';
                                                            } ?>  col-12">
                    <thead>

                        <tr>
                            <!-- <th style="text-align: center;" scope="col">วิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</th> -->
                            <th style="" scope="col" class="1">ปีการศึกษา</th>
                            <th style="" scope="col" class="1">ภาคเรียน</th>
                            <th style="" scope="col" class="1">รหัสวิธีปฏิบัติ</th>
                            <th style="" scope="col" class="col-2">ชื่อวิธีปฏิบัติ</th>
                            <!-- <th style="" scope="col"class="col-2">ประเภทวิธีปฏิบัติ</th> -->
                            <th style="" scope="col" class="col-1">ระดับการศึกษา</th>
                            <th style="" scope="col" class="col-2">วันที่เผยแพร่</th>
                            <th style="" scope="col" class="col-2">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col" class="col-1">ดูรายละเอียด</th>
                            <?php 
                          
                            if($R_504000 <> NULL && $R_504000['UR_Add']== "1"){ ?>
                            <th style="text-align: center;" scope="col" class="col-1">ปฎิบัติ</th>
                            <?php  } ?>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                            ?>
                        <?php
                                $Id_best = $show->Id_best;
                                $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            WHERE Id_best = $Id_best
                            ");

                                foreach ($results->result() as $shows) {
                                ?>
                        <tr>
                            <!-- <th scope="row " style="text-align: center;">
                                <?php echo $show->BestPracticeID; ?>
                            </th> -->
                            <td style="">
                                <?php echo $show->EducationYear; ?>
                            </td>
                            <td style="">
                                <?php $sum = $show->Semester;
                         if ($sum== 1) {
                           $sun_name = "ภาคเรียนที่ 1";
                          } elseif ($sum == 2) {
                           $sun_name = "ภาคเรียนที่ 2";
                          } elseif ($sum == 0) {
                           $sun_name = "ตลอดปีการศึกษา";
                          } elseif ($sum == 3) {
                           $sun_name = "ภาคเรียนฤดูร้อน";
                          } 
                        ?>
                                <?php echo $sun_name; ?>
                            </td>
                            <td style="">
                                <?php echo $show->BestPracticeID; ?>
                            </td>
                            <td style="">
                                <p
                                    style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo $show->BestPracticeName; ?></p>
                            </td>
                            <!-- <td style="">
                                <?php 
                                // echo $shows->BEST_PRACTICE_TYPE_NAME; 
                                ?>
                            </td> -->
                            <td style="">
                                <?php echo $shows->EDUCATION_LEVEL_NAME; ?>
                            </td>
                            <td style="">
                                <?php echo DateThai($shows->PublishDate); ?>
                            </td>
                            <td scope="row " style=""> <?php $resultc = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                            JOIN CLS_PREFIX ON BEST_PRACTICE_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                            WHERE BestPracticeID='" . $Id_best . "' AND DeleteStatus = 0"); ?>

                                <?php foreach ($resultc->result() as $showc) { ?>
                                <div class="row">
                                    <div class="col">



                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                            data-bs-target="#best<?php echo $showc->Id_bestc ?>">
                                            <?php echo $showc->PREFIX_NAME; ?>
                                            <?php echo $showc->CreatorNameThai; ?>
                                            <?php echo $showc->CreatorLastNameThai; ?>
                                        </button><!-- Modal -->
                                        <div class="modal fade" id="best<?php echo $showc->Id_bestc ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold">ประเภทบัตรประจำตัวผู้จัดทำ</h6>
                                                                <p> <?php echo $showc->PERSONAL_ID_TYPE_NAME; ?></p>

                                                            </div>
                                                            <div class="col">
                                                                <h6 class="fw-bold">หมายเลขบัตรประจำตัวผู้จัดการ</h6>
                                                                <p> <?php echo base64_decode($showc->CreatorPersonalID); ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold">ชื่อ-นามสกุล(ไทย)</h6>
                                                                <p><?php echo $showc->PREFIX_NAME; ?>
                                                                    <?php echo $showc->CreatorNameThai; ?>
                                                                    <?php echo $showc->CreatorMiddleNameThai; ?>
                                                                    <?php echo $showc->CreatorLastNameThai; ?></p>

                                                            </div>
                                                            <div class="col">
                                                                <h6 class="fw-bold">ชื่อ-นามสกุล(อังกฤษ)</h6>
                                                                <p> <?php echo $showc->CreatorNameEnglish; ?>
                                                                    <?php echo $showc->CreatorMiddleNameEnglish; ?>
                                                                    <?php echo $showc->CreatorLastNameEnglish; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 class="fw-bold">สัดส่วนการมีส่วนร่วม</h6>
                                                                <p> <?php echo $showc->ParticipantRatio ; ?></p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <?php 
                     
                     if($R_504000 <> NULL && $R_504000['UR_Add']== "1"){ ?>
                                                        <a href="<?php echo site_url('BPC_forms_p2?page=sh22') ?>&&key=<?php echo $showc->Id_bestc; ?>&&name=<?php echo $show->BestPracticeName; ?>"
                                                            class="my-link btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i> </a>
                                                            <?php  } ?>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ปิด</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <?php } ?>
                                <?php 
                     
                     if($R_504000 <> NULL && $R_504000['UR_Add']== "1"){ ?>
                                <a href="<?php echo site_url('BPC_forms_p2?page=sh2') ?>&&name=<?php echo $show->BestPracticeID; ?>&&key=<?php echo $show->Id_best; ?>"
                                    class="my-link fw-bold">>>เพิ่มผู้จัดทำ>>
                                </a>
                                <?php  } ?>
                            </td>
                            <td style="text-align: center;">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look<?php echo $show->Id_best; ?>"><i
                                        class="bi bi-card-list"></i></button>
                            </td>
                            <?php  if($R_504000 <> NULL && $R_504000['UR_Add']== "1"){ ?>
                           
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('BP_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id_best; ?>&&name=<?php echo $show->BestPracticeName; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_BP<?php echo $show->Id_best; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_BP<?php echo $show->Id_best; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->BestPracticeName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('BP_del_p1'); ?>">
                                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                                <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                                    <input type="hidden" name="Id_best"
                                                        value="<?php echo $show->Id_best; ?>">
                                                        <input type="hidden" name="BestPracticeID"
                                                        value="<?php echo $show->BestPracticeID; ?>">
                                                        <input type="hidden" name="BestPracticeName"
                                                        value="<?php echo $show->BestPracticeName; ?>">
                                                    <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-danger">ยืนยันก่อนลบ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal -->
                            </td>
                            <?php  } ?>


                        </tr>
                        <?php }
                            } ?>
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
<?php if ($page == 'sh1') {  ?>


<?php
    $result = $this->db->query('SELECT * FROM BEST_PRACTICE 
                      ');
    foreach ($result->result() as $show) {
    ?>
<div class="modal fade" id="look<?php echo $show->Id_best; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $Id_best = $show->Id_best;
                        $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            INNER JOIN CLS_RECOGNIZED_BY 
                            ON CLS_RECOGNIZED_BY.RECOGNIZED_BY_CODE = BEST_PRACTICE.RecognizedCode 
                            WHERE Id_best = $Id_best
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">ปีการศึกษา</h6>
                        <p><?php echo $show->EducationYear; ?></p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">ภาคเรียน</h6>
                        <?php $sum = $show->Semester;
                         if ($sum== 1) {
                           $sun_name = "ภาคเรียนที่ 1";
                          } elseif ($sum == 2) {
                           $sun_name = "ภาคเรียนที่ 2";
                          } elseif ($sum == 0) {
                           $sun_name = "ตลอดปีการศึกษา";
                          } elseif ($sum == 3) {
                           $sun_name = "ภาคเรียนฤดูร้อน";
                          } 
                        ?>
                        <p>
                            <?php echo  $sun_name; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="fw-bold">ชื่อวิธีปฏิบัติ</h6>
                        <p><?php echo $show->BestPracticeName; ?></p>
                    </div>
                    <div class="col">
                    <h6 class="fw-bold">ประเภทวิธีปฏิบัติ</h6>
                        <p><?php echo $shows->BEST_PRACTICE_TYPE_NAME; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="fw-bold">รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h6>
                    <?php  $Id_best  = $show->Id_best ; ?>
                        <p><?php echo $BestPracticeID = $show->BestPracticeID; ?></p>
                    </div>
                    <div class="col">
                    <h6 class="fw-bold">ระดับการศึกษาที่นำไปใช้</h6>
                        <p><?php echo $shows->EDUCATION_LEVEL_NAME; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="fw-bold">คำค้นหา</h6>
                        <p><?php echo $show->SearchKeyword; ?></p>
                    </div>
                    <div class="col">
                    <h6 class="fw-bold">แหล่งที่มา</h6>
                        <p><?php echo $show->Source; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="fw-bold">การเผยแพร่ที่ได้รับการยอมรับ</h6>
                        <p><?php echo $shows->RECOGNIZED_BY_NAME; ?></p>
                    </div>
                    <div class="col">
                    <h6 class="fw-bold">เอกสารแนบ</h6>
                        <p><a href="<?php echo base_url('assets/EII/BEST_PRACTICE') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-earmark-text-fill"></i>รายละเอียดเอกสาร</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="fw-bold">วันที่เผยแพร่</h6>
                        <p><?php echo DateThai($show->PublishDate); ?></p>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <!-- *** -->
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <h5 class="fw-bold">วิธีการปฏิบัติ</h5>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled
                                style="width: 100%; background-color: #fff; border: 0px solid #ced4da; border-radius: 0.25rem;"><?php echo $show->PracticeProcess; ?></textarea>
                        </div>
                    </div>
                </div>
                 <!-- *** -->
                 <div class="row">
                    <div class="col">
                    <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <h5 class="fw-bold">บทคัดย่อ</h5>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled
                                style="width: 100%; background-color: #fff; border: 0px solid #ced4da; border-radius: 0.25rem;"><?php echo $show->Abstract; ?></textarea>
                        </div>
                    </div>
                </div>
                 <!-- *** -->
                 <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <h5 class="fw-bold">ประโยชน์ที่ได้รับ</h5>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled
                                style="width: 100%; background-color: #fff; border: 0px solid #ced4da; border-radius: 0.25rem;"><?php echo $show->Benefit; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h5 class="fw-bold">รายชื่อผู้จัดทำ</h5>
                    <?php $resultc = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                    JOIN CLS_PREFIX ON BEST_PRACTICE_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                    WHERE BestPracticeID='" . $Id_best . "'"); ?>

                    <table class="m-3 col-11 table table-bordered">
                        <tr>
                            <th style="" class="col-2">ประเภทบัตร</th>
                            <th style="" class="col-2">เลขบัตร ปชช.</th>
                            <th style="" class="col-3">ชื่อ-นามสกุล</th>
                            <th style="" class="col-2">สัดส่วนการมีส่วนร่วม</th>
                        </tr>
                        <?php foreach ($resultc->result() as $showc) { ?>
                        <tr>
                            <td>
                                <p>
                                    <?php echo $showc->PERSONAL_ID_TYPE_NAME; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo base64_decode($showc->CreatorPersonalID); ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $showc->PREFIX_NAME; ?> <?php echo $showc->CreatorNameThai; ?>
                                    <?php echo $showc->CreatorMiddleNameThai; ?>
                                    <?php echo $showc->CreatorLastNameThai; ?>
                                    <br>
                                    (<?php echo $showc->CreatorNameEnglish; ?>
                                    <?php echo $showc->CreatorMiddleNameEnglish; ?>
                                    <?php echo $showc->CreatorLastNameEnglish; ?>)
                                </p>
                            </td>
                            <td style="">
                                <p>
                                    <?php echo $showc->ParticipantRatio; ?>
                                </p>
                            </td>




                            <?php } ?>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('BP_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $show->BestPracticeName; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  }
                    } ?>
</tbody>
</table>
<?php } ?>