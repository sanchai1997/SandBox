<main id="main" class="main">
    <style>
    .my-link {
        color: black;
    }

    .my-link:hover {
        color: blue;
    }
    </style>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
    <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
    <?php
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }// เริ่มต้น session
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
            ?> <h1>หน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</h1>
            <?php break;
                case 'sh2':
                ?> <h1>การติดต่อของผู้มีส่วนร่วม - <?php echo $name; ?></h1>
            <?php
                    break;
                case 'sh3':
                ?> <h1>การมีส่วนร่วม - <?php echo $name; ?></h1>
            <?php
                    break;
                case 'sh4':
                ?> <h1>ข้อมูลบันทึกเพิ่มเติม - <?php echo $name; ?></h1>
            <?php
                    break;
                default:
                ?>
            <h1>ผู้เข้ามามีส่วนร่วม</h1>
            <?php
                    break;
            }  ?>


            <div class="col-3">

                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">ผู้เข้ามามีส่วนร่วม</li>
                    </ol>
                </nav> -->
            </div>
            <!-- <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                
                


            </div> -->
        </div>
    </div>

    </div><!-- End Page Title -->



    <?php if($page=='sh1'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            <!-- <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"
                                            href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                                    </li>

                                </ul>
                            </div> -->
                        </h5>
                    </div>
                    <div class="col">
                        <?php    if($R_601000 <> NULL && $R_601000['UR_Add']== "1"){ ?>
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('par_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                                  <?php  } ?>
                    </div>
                </div>

               <table class="table  <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") {
                                                                echo 'table-borderless datatable';
                                                            }else {
                                                                echo 'table-bordered';
                                                            } ?>  col-12">
                    <thead>

                        <tr>
                            <!-- <th style="" scope="col">หน่วยงาน</th> -->
                            <th style="" scope="col" class="col-3">ชื่อหน่วยงาน</th>
                            <th style="" scope="col" class="col-2">ติดต่อผู้มีส่วนร่วม</th>
                            <th style="" scope="col" class="col-2">การมีส่วนร่วม</th>
                            <th style="" scope="col" class="col-3">บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                           <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                    <th style="text-align: center;" scope="col" class="col-1">ปฏิบัติ</th>
                                <?php } ?>
                        </tr>

                    </thead>
                    <tbody>


                        <tr>
                            <?php foreach ($query as $show) {
                                # code...
                            ?>


                            <!-- <td style=""><?php echo $show->ParticipantID; ?></td> -->
                            <td style=""><?php echo $show->ParticipantName; ?></td>
                            <td scope="row " style="text-align: left; ">
                                <?php
                          $ParticipantID = $show->ParticipantID;
                          $result = $this->db->query("SELECT * FROM PARTICIPANT_CONTACT 
                          WHERE  DeleteStatus = 0 AND ParticipantID = $ParticipantID
                         
                          ");

foreach ($result->result() as $shows) { ?>

                                <div class="row">
                                    <div class="col">
                                        <p class="">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#participant<?php echo $shows->Id ?>">
                                                <?php echo $shows->ContactName; ?>
                                            </button><!-- Modal -->
                                        <div class="modal fade" id="participant<?php echo $shows->Id ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ติดต่อผู้มีส่วนร่วม</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>ชื่อของผู้ติดต่อ</h6>
                                                                <p> <?php echo $shows->ContactName; ?></p>

                                                            </div>
                                                            <div class="col">
                                                                <h6>หมายเลขโทรศัพท์ของผู้ติดต่อ</h6>
                                                                <p> <?php echo $shows->ContactPhone; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>ตำแหน่งในองค์กร</h6>
                                                                <p> <?php echo $shows->ContactOrganizationPosition; ?>
                                                                </p>

                                                            </div>
                                                            <div class="col">
                                                                <h6>หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</h6>
                                                                <p> <?php echo $shows->ContactMobilePhone; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">

                                                            </div>
                                                            <div class="col">
                                                                <h6>อีเมลของผู้ติดต่อ</h6>
                                                                <p> <?php echo $shows->ContactEmail; ?></p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                  
                                                            <a href="<?php echo site_url('pc_forms_p2?page=sh22') ?>&&key=<?php echo $shows->Id; ?>&&name=<?php echo $show->ParticipantName; ?>"
                                                                class="my-link btn btn-warning"> <i
                                                                    class="bi bi-pencil-square"></i>
                                                            </a>
                                <?php } ?>
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
                                 <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                <a href="<?php echo site_url('pc_forms_p2?page=sh2') ?>&&name=<?php echo $show->ParticipantName; ?>&&key=<?php echo $show->ParticipantID; ?>"
                                    class="my-link fw-bold">>>เพิ่มติดต่อ>>
                                </a>
                                  <?php } ?>
                            </td>
                            <td scope="row " style="text-align: left; ">
                                <?php
                          $ParticipantID = $show->ParticipantID;
                          $result2 = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                          INNER JOIN CLS_COOPERATION_LEVEL
                          ON CLS_COOPERATION_LEVEL.COOPERATION_LEVEL_CODE = PARTICIPANT_COOPERATION.CooperationLevelCode
                          INNER JOIN CLS_COOPERATION_STATUS
                          ON CLS_COOPERATION_STATUS.COOPERATION_STATUS_CODE = PARTICIPANT_COOPERATION.CooperationStatusCode
                          INNER JOIN SCHOOL
                          ON SCHOOL.SchoolID  = PARTICIPANT_COOPERATION.CooperationSchoolID
                          WHERE SCHOOL.DeleteStatus = 0 AND PARTICIPANT_COOPERATION.DeleteStatus = 0 AND ParticipantID = $ParticipantID
                         
                          ");

foreach ($result2->result() as $show2) { ?>
                                <div class="row">
                                    <div class="col">
                                        <p class="">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <?php echo DateThai($show2->CooperationStartDate); ?>
                                            </button><!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">การมีส่วนร่วม
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>วันเริ่ม-สิ้นสุดการมีส่วนร่วม</h6>
                                                                <p>-<?php echo DateThai($show2->CooperationStartDate); ?>
                                                                    ->
                                                                    <?php echo DateThai($show2->CooperationEndDate); ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>สถานะการมีส่วนร่วม</h6>
                                                                <p>-<?php echo $show2->COOPERATION_STATUS_NAME; ?> </p>
                                                            </div>
                                                            <div class="col">
                                                                <h6>กิจกรรมที่มีส่วนร่วม</h6>
                                                                <p>-<?php echo $show2->CooperationActivity; ?> </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>ระดับการมีส่วนร่วม</h6>
                                                                <p>-<?php echo$show2->COOPERATION_LEVEL_NAME; ?> </p>
                                                            </div>
                                                            <div class="col">
                                                                <h6>สถานศึกษาที่เข้าไปมีส่วนร่วม</h6>
                                                                <p>-<?php echo$show2->SchoolNameThai; ?> </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6>ลิงก์เอกสารแนบ</h6>
                                                                <?php if($show->CooperationAttachmentURL != '') { ?>
                                                                <p><a href="<?php echo base_url('assets/EII/PARTICIPANT_COOPERATION') ?>/<?php echo $show2->CooperationAttachmentURL; ?>"
                                                                        target="_blank"><i class="bi bi-file-earmark-text-fill"></i>ลิงก์เอกสารแนบ</i></a></p>
                                                                        <?php } ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
 <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                                        <a href="<?php echo site_url('pcp_forms_p3?page=sh33') ?>&&key=<?php echo $show2->Id; ?>&&name=<?php echo $show->ParticipantName; ?>"
                                                            class="my-link btn btn-warning"> <i
                                                                class="bi bi-pencil-square"></i></a>
  <?php } ?>
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
                                 <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                <a href="<?php echo site_url('pcp_forms_p3?page=sh3') ?>&&name=<?php echo $show->ParticipantName; ?>&&key=<?php echo $show->ParticipantID; ?>"
                                    class="my-link fw-bold">>>เพิ่มการมีส่วนร่วม>>
                                </a>
                                  <?php } ?>
                            </td>
                            <td scope="row " style="">
                                <?php
                          
                          $result3 = $this->db->query("SELECT * FROM PARTICIPANT_NOTE 
                          WHERE  DeleteStatus = 0 AND ParticipantID = $ParticipantID
                         
                          ");

foreach ($result3->result() as $show3) { ?>
                                <div class="row">
                                    <div class="col">
                                        <p class="">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn text-start " data-bs-toggle="modal"
                                                data-bs-target="#note<?php echo $show3->Id; ?>" style="width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?php echo $show3->Note; ?>
                                            </button><!-- Modal -->
                                        <div class="modal fade" id="note<?php echo $show3->Id; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">บันทึกเพิ่มเติม
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row"><!-- p1 -->
                                                            
                                                            <div class="col"><!-- p2 -->
                                                            <h6 class="fw-bold">บันทึกเพิ่มเติม</h6>
                                                            <p><?php echo $show3->Note; ?></p>
                                                            </div><!-- p2 -->
                                                            <div class="col"><!-- p2 -->
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        <h6 class="fw-bold">ชื่อผู้บันทึกเพิ่มเติม</h6>
                                                                        <p>-<?php echo $show3->NoteReporterName; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        <h6 class="fw-bold">หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม</h6>
                                                                        <p>-<?php echo $show3->NoteReporterPhone; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        <h6 class="fw-bold">หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม</h6>
                                                                        <p>-<?php echo $show3->NoteReporterMobilePhone; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        <h6 class="fw-bold">อีเมลของผู้บันทึกเพิ่มเติม</h6>
                                                                        <p>-<?php echo $show3->NoteReporterEmail; ?></p>
                                                                        </div>
                                                                    </div>
                                                            </div><!-- p2 -->
                                                        </div><!-- p1 -->
                                                    </div>
                                                    <div class="modal-footer">
 <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                                        <a href="<?php echo site_url('pn_forms_p4?page=sh44') ?>&&key=<?php echo $show3->Id; ?>&&name=<?php echo $ParticipantName = $show->ParticipantName; ?>"
                                                            class="my-link btn btn-warning"><i
                                                                class="bi bi-pencil-square"></i></a>
  <?php } ?>
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
 <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                                <a href="<?php echo site_url('pn_forms_p4?page=sh4') ?>&&name=<?php echo $show->ParticipantName; ?>&&key=<?php echo $show->ParticipantID; ?>"
                                    class="my-link fw-bold">>>บันทึกเพิ่มเติม>>
                                </a>
                                  <?php } ?>
                            </td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->ParticipantID; ?>"><i
                                        class="bi bi-card-list"></i></button>
                            </td>
                             <?php if ($R_601000 <> NULL && $R_601000['UR_Add'] == "1") { ?>
                            <!-- แก้ไข+ลบ -->
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->ParticipantID; ?>&&name=<?php echo  $show->ParticipantName; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par<?php echo $show->ParticipantID; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par<?php echo $show->ParticipantID; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php 
                                                    // echo $show->ParticipantID; 
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('par_del_p1'); ?>">
                                                <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                                                    <input type="hidden" name="ParticipantID"
                                                        value="<?php echo $show->ParticipantID; ?>">
                                                        <input type="hidden" name="ParticipantName"
                                                        value="<?php echo $show->ParticipantName; ?>">
                                                        
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
                        <?php
                        //  }
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
<!-- **************************************************ดู********************************************************************** -->
<?php  if ($page=='sh1') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM PARTICIPANT 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look1<?php echo $show->ParticipantID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                           $ParticipantID= $show->ParticipantID;
                       
                       ?>

                <?php echo br(1); ?>

                <?php

                       $results = $this->db->query("SELECT * FROM PARTICIPANT 
                        INNER JOIN CLS_PARTICIPANT_TYPE 
                        ON CLS_PARTICIPANT_TYPE.PARTICIPANT_TYPE_CODE = PARTICIPANT.ParticipantTypeCode 
                        WHERE ParticipantID = $ParticipantID AND DeleteStatus = 0
                            ");

foreach ($results->result() as $shows) {
    ?>
                <div class="row">

                    <div class="col">

                        <h6 class="fw-bold ">ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h6>
                        <p class=" "></p><?php echo $show->ParticipantName; ?></p>

                    </div>
                    <div class="col ">
                        <h6 class="fw-bold">ประเภทผู้เข้ามามีส่วนร่วม</h6>
                        <p><?php echo $shows->PARTICIPANT_TYPE_NAME; ?></p>
                    </div>
                </div>
                <?php } ?>
                <div class="row fs-5 m-1">ติดต่อผู้มีส่วนร่วม</div>
                <?php echo br(1); ?>
                <table class=" table table-bordered">
                    <tr>
                        <th>ชื่อของผู้ติดต่อ</th>
                        <th>หมายเลขโทรศัพท์ของผู้ติดต่อ</th>
                        <th>หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</th>
                        <th>อีเมลของผู้ติดต่อ</th>
                        <th>ตำแหน่งในองค์กร (ของผู้ติดต่อ)</th>
                    </tr>

                    <?php

$results = $this->db->query("SELECT * FROM PARTICIPANT_CONTACT 
 WHERE ParticipantID = $ParticipantID AND DeleteStatus = 0 ");
foreach ($results->result() as $shows) {
    ?>
                    <tr>
                        <td>
                            <p><?php echo $shows->ContactName; ?></p>
                        </td>
                        <td>
                            <p><?php echo $shows->ContactPhone; ?></p>
                        </td>
                        <td>
                            <p><?php echo $shows->ContactMobilePhone; ?></p>
                        </td>
                        <td>
                            <p><?php echo $shows->ContactEmail; ?></p>
                        </td>
                        <td>
                            <p><?php echo $shows->ContactOrganizationPosition; ?></p>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <!-- // -->
                <div class="row fs-5 m-1">การมีส่วนร่วม</div>
                <?php echo br(1); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>วันที่เริ่ม</th>
                        <th>วันที่สิ้นสุด</th>
                        <th>สถานศึกษาที่เข้าไปมีส่วนร่วม</th>
                        <th>กิจกรรมที่มีส่วนร่วม</th>
                        <th>ระดับการมีส่วนร่วม</th>
                        <th>สถานะการมีส่วนร่วม</th>
                        <th>เอกสารแนบ</th>
                    </tr>

                    <?php

$results = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
INNER JOIN CLS_COOPERATION_STATUS 
ON CLS_COOPERATION_STATUS.COOPERATION_STATUS_CODE  = PARTICIPANT_COOPERATION.CooperationStatusCode 
INNER JOIN CLS_COOPERATION_LEVEL 
ON CLS_COOPERATION_LEVEL.COOPERATION_LEVEL_CODE  = PARTICIPANT_COOPERATION.CooperationLevelCode 
INNER JOIN SCHOOL 
ON SCHOOL.SchoolID  = PARTICIPANT_COOPERATION.CooperationSchoolID 
WHERE PARTICIPANT_COOPERATION.ParticipantID = $ParticipantID AND PARTICIPANT_COOPERATION.DeleteStatus = 0 ");
foreach ($results->result() as $showx) {
    ?>
                    <tr>
                        <td>
                            <p><?php echo DateThai($showx->CooperationStartDate); ?></p>
                        </td>
                        <td>
                            <p><?php echo DateThai($showx->CooperationEndDate); ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->SchoolNameThai; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->CooperationActivity; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->COOPERATION_LEVEL_NAME; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->COOPERATION_STATUS_NAME; ?></p>
                        </td>
                        <td>
                        <?php if($show->CooperationAttachmentURL != '') { ?>
                            <p><a href="<?php echo base_url('assets/EII/PARTICIPANT_COOPERATION') ?>/<?php echo $showx->CooperationAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-earmark-text-fill"></i>ลิงก์เอกสารแนบ</i></a></p>
                                    <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <!-- // -->
                <div class="row fs-5 m-1">บันทึกเพิ่มเติม</div>
                <?php echo br(1); ?>
                <table class="table table-bordered">
                    <tr>
                        <th >บันทึก</th>
                        <th class="col-2">ชื่อผู้บันทึก</th>
                        <th class="col-2">หมายเลขโทรศัพท์</th>
                        <th class="col-2">หมายเลขโทรศัพท์มือถือ</th>
                        <th class="col-2">อีเมล</th>

                    </tr>

                    <?php

$results = $this->db->query("SELECT * FROM PARTICIPANT_NOTE 
WHERE ParticipantID = $ParticipantID AND DeleteStatus = 0 ");
foreach ($results->result() as $showx) {
    ?>
                    <tr>
                        <td>
                            <p><?php echo $showx->Note; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->NoteReporterName; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->NoteReporterPhone; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->NoteReporterMobilePhone; ?></p>
                        </td>
                        <td>
                            <p><?php echo $showx->NoteReporterEmail; ?></p>
                        </td>
                    </tr>
                    <?php } ?>
                </table>







            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $name; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>