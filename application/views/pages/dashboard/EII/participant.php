<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
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
            ?> <h1>ผู้เข้ามามีส่วนร่วม</h1>
            <?php break;
                case 'sh2':
                ?> <h1>การติดต่อของผู้มีส่วนร่วม</h1>
            <?php
                    break;
                case 'sh3':
                ?> <h1>การมีส่วนร่วม</h1>
            <?php
                    break;
                case 'sh4':
                ?> <h1>ข้อมูลบันทึกเพิ่มเติม</h1>
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
                        <h5 class="card-title"> </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('par_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ประเภทข้อมูล
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                        </li>

                    </ul>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสหน่วยงาน</th>
                            <th style="text-align: center;" scope="col">ชื่อหน่วยงาน</th>
                            <th style="text-align: center;" scope="col">ติดต่อผู้มีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">การมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">ข้อมูลเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM PARTICIPANT 
                            INNER JOIN CLS_PARTICIPANT_TYPE 
                            ON CLS_PARTICIPANT_TYPE.PARTICIPANT_TYPE_CODE = PARTICIPANT.ParticipantTypeCode 
                            
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?> 
                            <td style="text-align: center;"><?php echo $show->ParticipantID; ?></td>
                            <td style="text-align: center;"><?php echo $show->ParticipantName; ?></td>
                            <td style="text-align: center;"><a
                                    href="<?php echo site_url('Fm_participant_das_p2?page=sh2') ?>&&key=<?php echo $show->ParticipantID ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a></td>
                            <td style="text-align: center;"><a
                                    href="<?php echo site_url('Fm_participant_das_p3?page=sh3') ?>&&key=<?php echo $show->ParticipantID ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a></td>
                            <td style="text-align: center;"><a
                                    href="<?php echo site_url('Fm_participant_das_p4?page=sh4') ?>&&key=<?php echo $show->ParticipantID ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a></td>
                            <!-- แก้ไข+ลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('par_del_p1'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
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
                        <?php }  } ?>


                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if( $page=='sh2'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title"> </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('pc_forms_p2?page=sh2') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ประเภทข้อมูล
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                        </li>

                    </ul>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อของผู้ติดต่อ</th>
                            
                            <th style="text-align: center;" scope="col">ตำแหน่งในองค์กรของผู้ติดต่อ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>

                    <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                    <?php 
                $result = $this->db->query("SELECT * FROM PARTICIPANT_CONTACT 
                
                WHERE ParticipantID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                        <tr>
                            <th scope="row " style="text-align: center;">
                                <?php echo $show->ContactName; ?></th>
                            
                            <td style="text-align: center;"><?php echo $show->ContactOrganizationPosition; ?>
                            <!-- แก้ไข+ลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look2<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_com<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_com<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('pc_del_p2'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
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
                        <?php  } ?>


                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if($page=='sh3'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title"> </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('pcp_forms_p3?page=sh3') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ประเภทข้อมูล
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                        </li>

                    </ul>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">วันที่เริ่มการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">วันที่สิ้นสุดการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">รหัสสถานะการมีส่วนร่วม</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>

                    <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                    <?php 
                $result = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                
                WHERE ParticipantID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                            INNER JOIN CLS_COOPERATION_STATUS 
                            ON CLS_COOPERATION_STATUS.COOPERATION_STATUS_CODE = PARTICIPANT_COOPERATION.CooperationStatusCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_COOPERATION_LEVEL 
                            ON CLS_COOPERATION_LEVEL.COOPERATION_LEVEL_CODE = PARTICIPANT_COOPERATION.CooperationLevelCode 
                            -- TargetEducationLevelCode
                           
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?> 
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->CooperationStartDate; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show->CooperationEndDate; ?></th>
                            <td scope="row" style="text-align: center;"><?php echo $shows->COOPERATION_STATUS_NAME; ?></td>
                            
                            
                            <!-- แก้ไข+ลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look3<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_coop<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_coop<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('pcp_del_p3'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
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
                        <?php } } ?>


                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php if($page=='sh4'){ ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title"> </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('pn_forms_p4?page=sh4') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ประเภทข้อมูล
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">ข้อมูลหม่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา</a>
                        </li>

                    </ul>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">บันทึกเพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">ชื่อผู้บันทึกเพิ่มเติม</th>
                           
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                    <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                    <?php 
                $result = $this->db->query("SELECT * FROM PARTICIPANT_NOTE 
                
                WHERE ParticipantID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->Note; ?></th>
                            <th scope="row"><?php echo $show->NoteReporterName; ?></th>
                            
                            <!-- แก้ไข+ลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look4<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_par_note<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_par_note<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->ParticipantID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('pn_del_p4'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
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
                        <?php  } ?>

                       

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
<div class="modal fade" id="look1<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้เข้ามามีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM PARTICIPANT 
                            INNER JOIN CLS_PARTICIPANT_TYPE 
                            ON CLS_PARTICIPANT_TYPE.PARTICIPANT_TYPE_CODE = PARTICIPANT.ParticipantTypeCode 
                            
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?>
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->ParticipantID; ?></p>
                        <h5 class="fw-bold">ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->ParticipantName; ?></p>
                        <h5 class="fw-bold">รหัสประเภทผู้เข้ามามีส่วนร่วม</h5>
                        <p><?php echo $shows->PARTICIPANT_TYPE_NAME; ?></p>
                        
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('par_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh2') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM PARTICIPANT_CONTACT 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look2<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">การติดต่อของผู้มีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->ParticipantID; ?></p>
                        <h5 class="fw-bold">ชื่อของผู้ติดต่อ</h5>
                        <p><?php echo $show->ContactName; ?></p>
                        <h5 class="fw-bold">หมายเลขโทรศัพท์ของผู้ติดต่อ</h5>
                        <p><?php echo $show->ContactPhone; ?></p>
                        <h5 class="fw-bold">หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</h5>
                        <p><?php echo $show->ContactMobilePhone; ?></p>
                        <h5 class="fw-bold">อีเมลของผู้ติดต่อ</h5>
                        <p><?php echo $show->ContactEmail; ?></p>
                        <h5 class="fw-bold">ตำแหน่งในองคnกร (ของผู้ติดต่อ)</h5>
                        <p><?php echo $show->ContactOrganizationPosition; ?></p>
                    </div>


                    
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('pc_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>
<?php  if ($page=='sh3') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM PARTICIPANT_COOPERATION 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look3<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">การมีส่วนร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                            $Id= $show->Id;
                            $results = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                            INNER JOIN CLS_COOPERATION_STATUS 
                            ON CLS_COOPERATION_STATUS.COOPERATION_STATUS_CODE = PARTICIPANT_COOPERATION.CooperationStatusCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_COOPERATION_LEVEL 
                            ON CLS_COOPERATION_LEVEL.COOPERATION_LEVEL_CODE = PARTICIPANT_COOPERATION.CooperationLevelCode 
                            -- TargetEducationLevelCode
                           
                            WHERE Id = $Id
                            ");

foreach ($results->result() as $shows) {
                     ?> 
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->ParticipantID; ?></p>
                        <h5 class="fw-bold">วันที่เริ่มการมีส่วนร่วม</h5>
                        <p><?php echo $show->CooperationStartDate; ?></p>
                        <h5 class="fw-bold">วันที่สิ้นสุดการมีส่วนร่วม</h5>
                        <p><?php echo $show->CooperationEndDate; ?></p>
                        <h5 class="fw-bold">รหัสระดับการมีส่วนร่วม</h5>
                        <p><?php echo $shows->COOPERATION_STATUS_NAME; ?></p>
                        <h5 class="fw-bold">กิจกรรมที่มีส่วนร่วม</h5>
                        <p><?php echo $show->CooperationActivity; ?></p>
                        <h5 class="fw-bold">รหัสระดับการมีส่วนร่วม</h5>
                        <p><?php echo $shows->COOPERATION_LEVEL_NAME; ?></p>
                    </div>


                    <div class="col">
                        <h5 class="fw-bold">รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม</h5>
                        <p><?php echo $show->CooperationSchoolID; ?></p>
                        
                        <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('document') ?>/<?php echo $show->CooperationAttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-text"></i></a></p>
                        
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('pcp_forms_p3?page=sh33') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>
<?php  if ($page=='sh4') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM PARTICIPANT_NOTE 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look4<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลบันทึกเพิ่มเติม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->ParticipantID; ?></p>
                        <h5 class="fw-bold">บันทึกเพิ่มเติม</h5>
                        <p><?php echo $show->Note; ?></p>
                        <h5 class="fw-bold">ชื่อผู้บันทึกเพิ่มเติม</h5>
                        <p><?php echo $show->NoteReporterName; ?></p>
                        <h5 class="fw-bold">หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม</h5>
                        <p><?php echo $show->NoteReporterPhone; ?></p>
                        <h5 class="fw-bold">หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม</h5>
                        <p><?php echo $show->NoteReporterMobilePhone; ?></p>
                        <h5 class="fw-bold">อีเมลของผู้บันทึกเพิ่มเติม</h5>
                        <p><?php echo $show->NoteReporterEmail; ?></p>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('pn_forms_p4?page=sh44') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>