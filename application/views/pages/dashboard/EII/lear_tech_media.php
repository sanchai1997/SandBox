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
    } // เริ่มต้น session
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
    <?php  } ?>
    <div class="pagetitle">
        <div class="row ">

            <?php switch ($page) {
                case 'sh1':
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้ </h1>
            <?php break;
                case 'sh1.1':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้ - <?php echo $name; ?></h1>
            <?php

                    break;
                default:
                ?> <h1>ข้อมูลเทคโนโลยีและสื่อการเรียนรู้ - <?php echo $name; ?></h1>
            <?php
                    break;
            }  ?>


            <div class="col-3">

                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</li>
                    </ol>
                </nav> -->
            </div>
            <!-- <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">เทคโนโลยีและสื่อการเรียนรู้</a> -->
            <!-- <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p2?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้
                </a> -->


        </div>

    </div>
    </div>

    </div><!-- End Page Title -->



    <?php if ($page == 'sh1') {
    ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <!-- <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            ประเภทข้อมูล
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1') ?>">เทคโนโลยีและสื่อการเรียนรู้</a>
                            </li>

                        </ul>
                    </div>         -->
                        </h5>
                    </div>
                    <div class="col">
                        <?php   if($R_503000 <> NULL && $R_503000['UR_Add']== "1"){ ?>
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTM_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล
                            </a></h5>
                        <?php } ?>
                    </div>
                </div>

                <table class="table  <?php if ($R_503000 <> NULL && $R_503000['UR_Add'] == "1") {
                                                                echo 'table-borderless datatable';
                                                            }else {
                                                                echo 'table-bordered';
                                                            } ?>  col-12">
                    <thead>

                        <tr>
                            <!-- <th style="text-align: center;" scope="col">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</th> -->
                            <th style="" scope="col-1">ปีการศึกษา</th>
                            <th style="" scope="col-1">ภาคเรียน</th>
                            <th style="" scope="col-1">รหัสเทคโนโลยี</th>
                            <th style="" scope="col-2">ชื่อเทคโนโลยี</th>
                            <th style="" scope="col">ประเภทเทคโนโลยี</th>
                            <th style="" scope="col-1">วันที่เผยแพร่</th>
                            <th style="" scope="col-2">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col-1">ดูรายละเอียด</th>
                            <?php   if($R_503000 <> NULL && $R_503000['UR_Add']== "1"){ ?>
                            <th style="text-align: center;" scope="col-1" class="col-1">ปฏิบัติ</th>
                            <?php } ?>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                            ?>
                        <?php
                                $Id_ltm  = $show->Id_ltm;
                                $results = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                            INNER JOIN CLS_MEDIA_TYPE 
                            ON CLS_MEDIA_TYPE.MEDIA_TYPE_CODE = LEARNING_TECHNOLOGY_MEDIA.MediaTypeCode 
                            -- MediaTypeCode
                            -- MEDIA_TYPE_NAME
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = LEARNING_TECHNOLOGY_MEDIA.TargetEducationLevelCode 
                            -- TargetEducationLevelCode
                            -- EDUCATION_LEVEL_NAME
                            WHERE Id_ltm  = $Id_ltm 
                            ");

                                foreach ($results->result() as $shows) {
                                ?>
                        <tr>
                            <!-- <th scope="row " style="text-align: center;"><?php echo $show->MediaID; ?></th> -->
                            <td style=""><?php echo $show->EducationYear; ?></td>
                            <td style=""> <?php $sum = $show->Semester;
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
                                <?php echo $sun_name; ?></td>
                            <td style=""><?php echo $show->MediaID; ?></td>
                            <td style="">
                                <p
                                    style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo $show->MediaName; ?></p>
                            </td>
                            <td style="">
                                <p
                                    style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo $shows->MEDIA_TYPE_NAME; ?></p>
                            </td>
                            <td style=""><?php echo DateThai($shows->PublishDate); ?></td>
                            <td scope="row " style="text-align: left;">
                                <?php $resultc = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
                                        JOIN CLS_PERSONAL_ID_TYPE 
                                        ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                                        JOIN CLS_PREFIX 
                                        ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                                        WHERE MediaID='" . $Id_ltm  . "' AND DeleteStatus = 0"); ?>

                                <?php foreach ($resultc->result() as $showc) { 
                                     $CreatorPersonalID = base64_decode($showc->CreatorPersonalID);
                                     ?>
                                <div class="row">
                                    <div class="col">


                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                            data-bs-target="#lear<?php echo $showc->Id_ltmc  ?>">
                                            <?php echo $showc->PREFIX_NAME; ?>
                                            <?php echo $showc->CreatorNameThai; ?>
                                            <?php echo $showc->CreatorLastNameThai; ?>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="lear<?php echo $showc->Id_ltmc  ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h5>
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
                                                                <h6 class="fw-bold">หมายเลขบัตรประจำตัวผู้จัดทำ</h6>
                                                                <p> <?php echo  $CreatorPersonalID; ?></p>

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
                                                    <?php   if($R_503000 <> NULL && $R_503000['UR_Add']== "1"){ ?>
                                                        <a href="<?php echo site_url('LTMC_forms_p2?page=sh22') ?>&&key=<?php echo $showc->Id_ltmc ; ?>&&name=<?php echo $show->MediaName; ?>"
                                                            class="my-link btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i> </a>
                                                            <?php } ?>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ปิด</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <?php } ?>
                                <?php   if($R_503000 <> NULL && $R_503000['UR_Add']== "1"){ ?>
                                <a href="<?php echo site_url('LTMC_forms_p2?page=sh2') ?>&&name=<?php echo $show->MediaName; ?>&&key=<?php echo $show->Id_ltm; ?>&&MediaID=<?php echo $show->MediaID; ?>"
                                    class="my-link fw-bold">>>เพิ่มผู้จัดทำ>>
                                </a>
                                <?php } ?>
                            </td>
                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#look<?php echo $show->Id_ltm ; ?>"><i
                                        class="bi bi-card-list"></i></button></td>
                                        <?php   if($R_503000 <> NULL && $R_503000['UR_Add']== "1"){ ?>
                                        <td style="text-align: center;">
                                <a href="<?php echo site_url('LTM_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id_ltm; ?>&&name=<?php echo $show->MediaName; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTM<?php echo $show->Id_ltm; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_LTM<?php echo $show->Id_ltm; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->MediaName; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"> คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('LTM_del_p1'); ?>">
                                                    <input type="hidden" name="Id_ltm"
                                                        value="<?php echo $show->Id_ltm; ?>">
                                                        <input type="hidden" name="MediaID"
                                                        value="<?php echo $show->MediaID; ?>">
                                                        <input type="hidden" name="MediaName"
                                                        value="<?php echo $show->MediaName; ?>">
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
                            <?php } ?>
                        </tr>
                        <?php  }
                            } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

    <?php
    } ?>

    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->

<!-- **************************************************ดู********************************************************************** -->
<?php if ($page == 'sh1') {  ?>


<?php
    $result = $this->db->query('SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                      ');
    foreach ($result->result() as $show) {
    ?>
<div class="modal fade" id="look<?php echo $show->Id_ltm ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เทคโนโลยีและสื่อการเรียนรู้</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $Id_ltm  = $show->Id_ltm ;
                        $results = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                            INNER JOIN CLS_MEDIA_TYPE 
                            ON CLS_MEDIA_TYPE.MEDIA_TYPE_CODE = LEARNING_TECHNOLOGY_MEDIA.MediaTypeCode 
                            -- MediaTypeCode
                            -- MEDIA_TYPE_NAME
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = LEARNING_TECHNOLOGY_MEDIA.TargetEducationLevelCode 
                            -- TargetEducationLevelCode
                            -- EDUCATION_LEVEL_NAME
                            WHERE Id_ltm  = $Id_ltm 
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">ปีการศึกษา</h5>
                        <p><?php echo $show->EducationYear; ?></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ภาคเรียน</h5>
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

                        <h5 class="fw-bold">ชื่อเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaName; ?></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ประเภทเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $shows->MEDIA_TYPE_NAME; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaID; ?></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">ระดับการศึกษาที่นำไปใช้</h5>
                        <p><?php echo $shows->EDUCATION_LEVEL_NAME; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h5 class="fw-bold">คำค้นหา</h5>
                        <p><?php echo $show->SearchKeyword; ?></p>
                    </div>
                    <div class="col">
                    <h5 class="fw-bold">แหล่งที่มา</h5>
                        <p><?php echo $show->Source; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h5 class="fw-bold">วันที่เผยแพร่</h5>
                        <p><?php echo dateThai($show->PublishDate); ?></p>
                    </div>
                    <div class="col">
                    <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('assets/EII/LEARNING_TECHNOLOGY_MEDIA') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-earmark-text-fill"></i>รายละเอียดเอกสาร</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <h5 class="fw-bold">ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้</h5>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled
                                style="width:100%; background-color: #fff; border: 0px solid #ced4da; border-radius: 0.25rem;"><?php echo $show->MediaBenefit; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <h5 class="fw-bold">บทคัดย่อ</h5>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled
                                style="width:100%; background-color: #fff; border: 0px solid #ced4da; border-radius: 0.25rem;"><?php echo $show->Abstract; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h5 class="fw-bold">รายชื่อผู้จัดทำ</h5>
                    <?php $resultc = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
JOIN CLS_PREFIX ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
WHERE MediaID='" . $Id_ltm . "'"); ?>

                    <table class="table table-bordered">
                        <tr>
                            <th style="">ประเภทบัตร</th>
                            <th style="" class="col-3">เลขบัตร ปชช.</th>
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
                                    <?php echo  $CreatorPersonalID; ?>
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
                            <td style="text-align: center;">
                                <p>
                                    <?php echo $showc->ParticipantRatio; ?>
                                </p>
                            </td>




                            <?php } ?>
                        </tr>
                    </table>
                </div>

                <?php } ?>
            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('LTM_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $show->MediaName; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>