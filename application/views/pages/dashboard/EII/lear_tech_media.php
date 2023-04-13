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
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTM_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล
                            </a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <!-- <th style="text-align: center;" scope="col">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</th> -->
                            <th style="" scope="col">ปีการศึกษา</th>
                            <th style="" scope="col">ภาคเรียน</th>
                            <th style="" scope="col">ชื่อเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="" scope="col">ประเภทเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="" scope="col">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col" class="col-1">ปฏิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                            ?>
                        <?php
                                $MediaID = $show->MediaID;
                                $results = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                            INNER JOIN CLS_MEDIA_TYPE 
                            ON CLS_MEDIA_TYPE.MEDIA_TYPE_CODE = LEARNING_TECHNOLOGY_MEDIA.MediaTypeCode 
                            -- MediaTypeCode
                            -- MEDIA_TYPE_NAME
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = LEARNING_TECHNOLOGY_MEDIA.TargetEducationLevelCode 
                            -- TargetEducationLevelCode
                            -- EDUCATION_LEVEL_NAME
                            WHERE MediaID = $MediaID
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
                            <td style=""><?php echo $show->MediaName; ?></td>
                            <td style=""><?php echo $shows->MEDIA_TYPE_NAME; ?></td>
                            <td scope="row " style="text-align: left;">
                                <?php $resultc = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
                                        JOIN CLS_PERSONAL_ID_TYPE 
                                        ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                                        JOIN CLS_PREFIX 
                                        ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                                        WHERE MediaID='" . $MediaID . "' AND DeleteStatus = 0"); ?>

                                <?php foreach ($resultc->result() as $showc) { ?>
                                <div class="row">
                                    <div class="col">
                                        <p>


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#lear<?php echo $showc->Id ?>">
                                                <?php echo $showc->PREFIX_NAME; ?><?php echo nbs(2); ?>
                                                <?php echo $showc->CreatorNameThai; ?>-
                                                <?php echo $showc->CreatorLastNameThai; ?>
                                            </button>
                                            <!-- Modal -->
                                        <div class="modal fade" id="lear<?php echo $showc->Id ?>" tabindex="-1"
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
                                                                <h6>ประเภทบัตรประจำตัวผู้จัดทำ</h6>
                                                                <p> <?php echo $showc->PERSONAL_ID_TYPE_NAME; ?></p>

                                                            </div>
                                                            <div class="col">
                                                                <h6>หมายเลขบัตรประจำตัวผู้จัดการ</h6>
                                                                <p> <?php echo $showc->CreatorPersonalID; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>ชื่อ-นามสกุล(ไทย)</h6>
                                                                <p> <?php echo $showc->PREFIX_NAME; ?>
                                                                    <?php echo $showc->CreatorNameThai; ?> -
                                                                    <?php echo $showc->CreatorLastNameThai; ?></p>

                                                            </div>
                                                            <div class="col">
                                                                <h6>ชื่อ-นามสกุล(อังกฤษ)</h6>
                                                                <p> <?php echo $showc->CreatorNameEnglish; ?> -
                                                                    <?php echo $showc->CreatorLastNameEnglish; ?></p>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>สัดส่วนการมีส่วนร่วม</h6>
                                                                <p> <?php echo $showc->ParticipantRatio ; ?></p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="<?php echo site_url('LTMC_forms_p2?page=sh22') ?>&&key=<?php echo $showc->Id; ?>&&name=<?php echo $show->MediaName; ?>"
                                                            class="my-link btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i> </a>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ปิด</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>

                                </div>
                                <?php } ?>

                                <a href="<?php echo site_url('LTMC_forms_p2?page=sh2') ?>&&name=<?php echo $show->MediaName; ?>&&key=<?php echo $show->MediaID; ?>"
                                    class="my-link fw-bold">>>เพิ่มผู้จัดทำ>>
                                </a>
                            </td>
                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#look<?php echo $show->MediaID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('LTM_forms_p1?page=sh11') ?>&&key=<?php echo $show->MediaID; ?>&&name=<?php echo $show->MediaName; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTM<?php echo $show->MediaID; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_LTM<?php echo $show->MediaID; ?>" tabindex="-1"
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
                                                <form method="post" action="<?php echo site_url('del_p2'); ?>">
                                                    <input type="hidden" name="MediaID"
                                                        value="<?php echo $show->MediaID; ?>">
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
<div class="modal fade" id="look<?php echo $show->MediaID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">นวัตกรรมการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $MediaID = $show->MediaID;
                        $results = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                            INNER JOIN CLS_MEDIA_TYPE 
                            ON CLS_MEDIA_TYPE.MEDIA_TYPE_CODE = LEARNING_TECHNOLOGY_MEDIA.MediaTypeCode 
                            -- MediaTypeCode
                            -- MEDIA_TYPE_NAME
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = LEARNING_TECHNOLOGY_MEDIA.TargetEducationLevelCode 
                            -- TargetEducationLevelCode
                            -- EDUCATION_LEVEL_NAME
                            WHERE MediaID = $MediaID
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <!-- <h5 class="fw-bold">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h5>
                                    <p><?php echo $show->MediaID; ?></p> -->
                        <h5 class="fw-bold">ปีการศึกษา</h5>
                        <p><?php echo $show->EducationYear; ?></p>
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
                        <h5 class="fw-bold">ชื่อเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaName; ?></p>
                        <h5 class="fw-bold">ประเภทเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $shows->MEDIA_TYPE_NAME; ?></p>
                        <h5 class="fw-bold">ระดับการศึกษาที่นำไปใช้</h5>
                        <p><?php echo $shows->EDUCATION_LEVEL_NAME; ?></p>
                        <h5 class="fw-bold">คำค้นหา</h5>
                        <p><?php echo $show->SearchKeyword; ?></p>
                    </div>


                    <div class="col">
                        <h5 class="fw-bold">ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaBenefit; ?></p>
                        <h5 class="fw-bold">บทคัดย่อ</h5>
                        <p><?php echo $show->Abstract; ?></p>
                        <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('assets/EII/LEARNING_TECHNOLOGY_MEDIA') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-earmark-text-fill"></i>รายละเอียดเอกสาร</a></p>
                        <h5 class="fw-bold">แหล่งที่มา</h5>
                        <p><?php echo $show->Source; ?></p>
                        <h5 class="fw-bold">วันที่เผยแพร่</h5>
                        <p><?php echo dateThai($show->PublishDate); ?></p>
                    </div>
                </div>

                <div class="row">
                    <h5 class="fw-bold">รายชื่อผู้จัดทำ</h5>
                    <?php $resultc = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
JOIN CLS_PREFIX ON LEARNING_TECHNOLOGY_MEDIA_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
WHERE MediaID='" . $MediaID . "'"); ?>

                    <table class="m-1 col-12">
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
                                    <?php echo $showc->CreatorPersonalID; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $showc->PREFIX_NAME; ?>
                                    <?php echo nbs(2); ?>
                                    <?php echo $showc->CreatorNameThai; ?>-
                                    <?php echo $showc->CreatorLastNameThai; ?>
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