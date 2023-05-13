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
    <?php $key = isset($_GET['key']) ? $_GET['key'] : ''; ?>
    <?php $name = isset($_GET['name']) ? $_GET['name'] : ''; ?>
    <?php $year = isset($_GET['year']) ? $_GET['year'] : ''; ?>
    <?php $province = isset($_GET['province']) ? $_GET['province'] : ''; ?>
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
                case 'sh1': ?> <h1>อำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่างๆ </h1>
            <?php break;
                case 'sh2': ?> <h1>ข้อมูลรายชื่อคณะกรรมการ - เลขที่คำสั่ง<?php echo $key ?></h1>
            <?php break;
                default: ?><h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่างๆ</h1>
            <?php break;
            } ?>

            <div class="col-3">

                <!-- <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">อำนาจและหน้าที่ของคณะกรรมการ</li>
                    </ol>
                </nav> -->
            </div>
            <!-- <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url(
                                'Fm_committee_das_p1?page=sh1'
                            ); ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>

            </div> -->
        </div>
    </div>

    </div><!-- End Page Title -->

    <?php if ($page == 'sh1') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">
                            <!-- <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url('Fm_committee_das_p1?page=sh1'); ?>">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>
                                    </li>

                                </ul>
                            </div> -->
                        </h6>
                    </div>
                    <div class="col">
                        <h6 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('c_forms_p1?page=sh1'); ?>"
                                class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a>
                        </h6>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                        <th style="" scope="col">จังหวัด</th>
                        <th style="" scope="col">ปีที่ออกคำสั่ง</th>
                        <th style="" scope="col">เลขที่คำสั่ง</th>
                            <th style="" scope="col">คณะกรรมการ</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) { ?>

                        <tr>
                            <?php
                                    $Id = $show->Id;
                                    $results = $this->db->query("SELECT * FROM COMMITTEE 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_APPOINTMENT_TYPE 
                            ON CLS_APPOINTMENT_TYPE.APPOINTMENT_TYPE_CODE = COMMITTEE.CommitteeAppointmentTypeCode 
                            -- TargetEducationLevelCode
                            WHERE Id = $Id
                            ");

                                    foreach ($results->result() as $shows) {
                                    ?>
                                    <td style=""><?php echo $shows->PROVINCE_NAME; ?></td>
                                    <td scope="row" style=""><?php echo $show->CommitteeYear; ?></td>
                            <td style=""><?php echo $show->CommitteeAppointmentNumber; ?></td>
                            <td scope="row " style="">
                                <?php 
                             $CommitteeAppointmentNumber = $show->CommitteeAppointmentNumber;
                            $resultc = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE_MEMBER.CommitteeProvinceCode 
                            INNER JOIN CLS_PREFIX
                            ON CLS_PREFIX.PREFIX_CODE = COMMITTEE_MEMBER.CommitteeMemberPrefixCode
                            JOIN CLS_COMMITEE_POSITION 
                            ON COMMITTEE_MEMBER.CommitteeMemberPositionCode = CLS_COMMITEE_POSITION.COMMITEE_POSITION_CODE 
                            WHERE COMMITTEE_MEMBER.CommitteeAppointmentNumber='" . $CommitteeAppointmentNumber . "' AND COMMITTEE_MEMBER.DeleteStatus = 0"); ?>

                                <?php foreach ($resultc->result() as $showc) { ?>
                                <div class="row">
                                    <div class="col">
                                        <p>

                                           
                                                 <!-- Button trigger modal -->
                                            <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#commi<?php echo $showc->Id; ?>">
                                                <?php echo $showc->PREFIX_NAME; ?>                                                                                      
                                                <?php echo $showc->CommitteeMemberNameThai; ?>
                                                <?php echo $showc->CommitteeMemberLastNameThai; ?>
                                            </button><!-- Modal -->
                                        <div class="modal fade" id="commi<?php echo $showc->Id; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">คณะกรรมการ</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row"><!-- p1 -->
                                                            
                                                            <div class="col"><!-- p1 -->
<div class="row">
    <div class="col ">
        <h6 class="fw-bold">จังหวัด</h6>
        <p><?php echo $showc->PROVINCE_NAME; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">ปีที่ออกคำสั่ง</h6>
        <p><?php echo $showc->CommitteeYear; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">เลขที่คำสั่ง</h6>
        <p><?php echo $showc->CommitteeAppointmentNumber; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">เริ่มดำรงตำแหน่ง -> สิ้นสุด</h6>
        <p><?php echo DateThai($showc->CommitteeMemberTermStartDate); ?> > <?php echo DateThai($showc->CommitteeMemberTermEndDate); ?></p>
    </div>
</div>
                                                            </div><!-- p1 -->
                                                            <div class="col"><!-- p1 -->
                                                            <div class="row">
    <div class="col">
        <h6 class="fw-bold">ชื่อ-นามสกุล(ภาษาไทย)</h6>
        <p><?php echo $showc->PREFIX_NAME; ?> 
                                                <?php echo $showc->CommitteeMemberNameThai; ?>
                                                <?php echo $showc->CommitteeMemberMiddleNameThai; ?>
                                                <?php echo $showc->CommitteeMemberLastNameThai; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">ชื่อ-นามสกุล(อังกฤษ)</h6>
        <p><?php echo $showc->CommitteeMemberNameEnglish; ?> <?php echo $showc->CommitteeMemberMiddleNameEnglish; ?> <?php echo $showc->CommitteeMemberLastNameEnglish; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">ตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</h6>
        <p><?php echo $showc->COMMITEE_POSITION_NAME; ?></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h6 class="fw-bold">ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</h6>
        <p><?php echo $showc->CommitteeMemberOrganizationPosition; ?></p>
    </div>
</div>
                                                            </div><!-- p1 -->
                                                        </div><!-- p1 -->
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo site_url('cm_forms_p2?page=sh22') ?>&&key=<?php echo $showc->Id; ?>&&name=<?php echo $show->CommitteeAppointmentNumber; ?>"
                                                    class="my-link btn btn-warning"> <i
                                                                class="bi bi-pencil-square"></i>
                                               </a>
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
                                <a href="<?php echo site_url('cm_forms_p2?page=sh2') ?>&&name=<?php echo $show->CommitteeAppointmentNumber; ?>&&key=<?php echo $show->Id; ?>&&year=<?php echo $show->CommitteeYear; ?>&&Province=<?php echo  $show->CommitteeProvinceCode; ?>"
                                    class="my-link fw-bold">>>เพิ่มคณะกรรมการ>>
                                </a>
                            </td>
                            <td style="text-align: center;">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>

                            </td>
                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('c_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $show->CommitteeAppointmentNumber; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_committee<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_committee<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->CommitteeAppointmentNumber; ?>
                                                </h6>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('c_del_p1'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
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
    $result = $this->db->query('SELECT * FROM COMMITTEE 
                      ');
    foreach ($result->result() as $show) {
    ?>
<div class="modal fade" id="look1<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $Id = $show->Id;
                        $results = $this->db->query("SELECT * FROM COMMITTEE 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_APPOINTMENT_TYPE 
                            ON CLS_APPOINTMENT_TYPE.APPOINTMENT_TYPE_CODE = COMMITTEE.CommitteeAppointmentTypeCode 
                            -- TargetEducationLevelCode
                            WHERE Id = $Id
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">จังหวัด</h6>
                        <p><?php echo $shows->PROVINCE_NAME; ?></p>
                        <h6 class="fw-bold">ปีที่ออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeYear; ?></p>
                        <h6 class="fw-bold">เลขออกคำสั่ง</h6>
                        <p><?php echo $CommitteeAppointmentNumber = $show->CommitteeAppointmentNumber; ?></p>

                    </div>
                    <div class="col">
                        <h6 class="fw-bold">ประเภทการแต่งตั้ง</h6>
                        <p><?php echo $shows->APPOINTMENT_TYPE_NAME; ?></p>
                        <h6 class="fw-bold">ลิงก์เอกสารคำสั่ง</h6>
                        <p>
                            <td scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('assets/EII/COMMITTEE') ?>/<?php echo $show->CommitteeAppointmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-earmark-text-fill"></i>รายละเอียดเอกสาร</a>

                            </td>
                        </p>

                    </div>



                </div>
                <div class="row">
                    <h5 class="fw-bold">รายชื่อคณะกรรมการ</h5>
                    <?php $resultc = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                                    JOIN CLS_PROVINCE 
                                    ON COMMITTEE_MEMBER.CommitteeProvinceCode = CLS_PROVINCE.PROVINCE_CODE  
                                    JOIN CLS_PREFIX 
                                    ON COMMITTEE_MEMBER.CommitteeMemberPrefixCode = CLS_PREFIX.PREFIX_CODE 
                                    JOIN CLS_COMMITEE_POSITION 
                                    ON COMMITTEE_MEMBER.CommitteeMemberPositionCode = CLS_COMMITEE_POSITION.COMMITEE_POSITION_CODE   
                                    WHERE CommitteeAppointmentNumber='" . $CommitteeAppointmentNumber . "' AND COMMITTEE_MEMBER.DeleteStatus = 0"); ?>

                    <table class="m-3 col-11">
                        <tr>
                            
                            <th style="" class="col-2">ชื่อ-นามสกุล</th>
                            <th style="" class="col-3">ตำแหน่งกรรมการ</th>
                            <th style="" class="col-2">ตำแหน่งในองค์กร</th>
                            <th style="" class="col-2">เริ่มตำแหน่ง-สิ้นสุด</th>
                            
                        </tr>
                        <?php
                       
                         foreach ($resultc->result() as $showc) { ?>
                            
                        <tr>
                            
                            <td>
                                <p>
                                    <?php echo $showc->PREFIX_NAME; ?>
                                    <?php echo nbs(2); ?>
                                    <?php echo $showc->CommitteeMemberNameThai; ?>-
                                    <?php echo $showc->CommitteeMemberLastNameThai; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                  <?php echo $showc->COMMITEE_POSITION_NAME; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $showc->CommitteeMemberOrganizationPosition; ?>
                                </p>
                            </td>
                            <td style="">
                            <p><?php echo DateThai($showc->CommitteeMemberTermStartDate); ?> - <?php echo DateThai($showc->CommitteeMemberTermEndDate); ?></p>
                            </td>


                             
                            
                          
                        </tr>
                            <?php } ?>
                    </table>

                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('c_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $show->CommitteeAppointmentNumber; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>