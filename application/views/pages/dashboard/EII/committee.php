<main id="main" class="main">
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
                case 'sh1': ?> <h1>ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ </h1>
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
                            <div class="dropdown">
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
                            </div>
                        </h6>
                    </div>
                    <div class="col">
                        <h6 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                                                                                        'c_forms_p1?page=sh1'
                                                                                                    ); ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a>
                        </h6>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>

                            <th style="text-align: center;" scope="col">เลขที่คำสั่ง</th>
                            <th style="text-align: center;" scope="col">ปีที่ออกคำสั่ง</th>
                            <th style="text-align: center;" scope="col">คณะกรรมการ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) { ?>

                        <tr>
                            <?php
                                    $CommitteeAppointmentNumber = $show->CommitteeAppointmentNumber;
                                    $results = $this->db->query("SELECT * FROM COMMITTEE 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_APPOINTMENT_TYPE 
                            ON CLS_APPOINTMENT_TYPE.APPOINTMENT_TYPE_CODE = COMMITTEE.CommitteeAppointmentTypeCode 
                            -- TargetEducationLevelCode
                            WHERE CommitteeAppointmentNumber = $CommitteeAppointmentNumber
                            ");

                                    foreach ($results->result() as $shows) {
                                    ?>
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentNumber; ?>
                            <th scope="row" style="text-align: center;"><?php echo $show->CommitteeYear; ?></th>
                            <td style="text-align: center;"><a
                                    href="<?php echo site_url('Fm_committee_das_p2?page=sh2') ?>&&key=<?php echo $show->CommitteeAppointmentNumber ?>&&year=<?php echo $show->CommitteeYear ?>&&province=<?php echo $show->CommitteeProvinceCode ?>"
                                    class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                            <a href="<?php echo site_url('c_forms_p1?page=sh11') ?>&&key=<?php echo $show->CommitteeAppointmentNumber; ?>&&name=<?php echo $show->CommitteeAppointmentNumber; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->CommitteeAppointmentNumber; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_committee<?php echo $show->CommitteeAppointmentNumber; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_committee<?php echo $show->CommitteeAppointmentNumber; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $show->CommitteeProvinceCode; ?>
                                                </h6>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('c_del_p1'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show->CommitteeAppointmentNumber; ?>">
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
                        <?php }
                                } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php } ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if ($page == 'sh2') { ?>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">
                            <div class="dropdown">
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
                            </div>
                        </h6>
                    </div>
                    <div class="col">
                        <h6 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('cm_forms_p2?page=sh2'); ?>&&key=<?php echo $key; ?>&&year=<?php echo $year; ?>&&province=<?php echo $province; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h6>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>


                            <th style="text-align: center;" scope="col">เลขที่คำสั่ง</th>
                            <th style="text-align: center;" scope="col">ชื่อ </th>
                            <th style="text-align: center;" scope="col">ตำแหน่ง (กรรมการ)</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                        </tr>

                    </thead>
                    <tbody>
                       
                        <?php
                               
                                $results = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE_MEMBER.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_PREFIX 
                            ON CLS_PREFIX.PREFIX_CODE = COMMITTEE_MEMBER.CommitteeMemberPrefixCode 
                            -- -- TargetEducationLevelCode
                            INNER JOIN CLS_COMMITEE_POSITION 
                            ON CLS_COMMITEE_POSITION.COMMITEE_POSITION_CODE  = COMMITTEE_MEMBER.CommitteeMemberPositionCode 
                            -- -- RecognizedCode
                            WHERE CommitteeAppointmentNumber = $key
                            ");

                                foreach ($results->result() as $shows) {
                                ?>
                        <tr>
                            <th scope="row" style="text-align: center;">
                                <?php echo $shows->CommitteeAppointmentNumber; ?></th>
                            <th scope="row" style="text-align: center;">
                                <?php echo $shows->CommitteeMemberNameThai; ?><?php echo nbs(2); ?><?php echo $shows->CommitteeMemberLastNameThai; ?>
                            </th>
                            <th scope="row" style="text-align: center;">
                                <?php echo $shows->CommitteeMemberOrganizationPosition; ?></th>

                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('cm_forms_p2?page=sh22') ?>&&key=<?php echo $shows->Id; ?>&&name= <?php echo $shows->CommitteeAppointmentNumber; ?>"
                                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look2<?php echo $shows->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_comm_member<?php echo $shows->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_comm_member<?php echo $shows->Id; ?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูล<?php echo nbs(2); ?><?php echo $shows->CommitteeProvinceCode; ?>
                                                </h6>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post" action="<?php echo site_url('cm_del_p2'); ?>">
                                                    <input type="hidden" name="Id"
                                                        value="<?php echo $shows->Id; ?>">
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
                        <?php 
                            } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <?php }
    ?>
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
<div class="modal fade" id="look1<?php echo $show->CommitteeAppointmentNumber; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $CommitteeAppointmentNumber = $show->CommitteeAppointmentNumber;
                        $results = $this->db->query("SELECT * FROM COMMITTEE 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_APPOINTMENT_TYPE 
                            ON CLS_APPOINTMENT_TYPE.APPOINTMENT_TYPE_CODE = COMMITTEE.CommitteeAppointmentTypeCode 
                            -- TargetEducationLevelCode
                            WHERE CommitteeAppointmentNumber = $CommitteeAppointmentNumber
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">จังหวัด</h6>
                        <p><?php echo $shows->PROVINCE_NAME; ?></p>
                        <h6 class="fw-bold">ปีที่ออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeYear; ?></p>
                        <!-- <h6 class="fw-bold">เลขออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeAppointmentNumber; ?></p> -->
                        
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">ประเภทการแต่งตั้ง</h6>
                        <p><?php echo $shows->APPOINTMENT_TYPE_NAME; ?></p>
                        <h6 class="fw-bold">ลิงก์เอกสารคำสั่ง</h6>
                        <p>
                            <th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->CommitteeAppointmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>
    
                            </th>
                        </p>

                    </div>



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
<?php if ($page == 'sh2') {  ?>


<?php
    $result = $this->db->query('SELECT * FROM COMMITTEE_MEMBER 
                      ');
    foreach ($result->result() as $show) {
    ?>
<div class="modal fade" id="look2<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">ข้อมูลรายชื่อคณะกรรมการ</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $Id = $show->Id;
                        $results = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                            INNER JOIN CLS_PROVINCE 
                            ON CLS_PROVINCE.PROVINCE_CODE = COMMITTEE_MEMBER.CommitteeProvinceCode 
                            -- BestPracticeTypeCode
                            INNER JOIN CLS_PREFIX 
                            ON CLS_PREFIX.PREFIX_CODE = COMMITTEE_MEMBER.CommitteeMemberPrefixCode 
                            -- -- TargetEducationLevelCode
                            INNER JOIN CLS_COMMITEE_POSITION 
                            ON CLS_COMMITEE_POSITION.COMMITEE_POSITION_CODE  = COMMITTEE_MEMBER.CommitteeMemberPositionCode 
                            -- -- RecognizedCode
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
                        <h6 class="fw-bold">เลขที่คำสั่ง</h6>
                        <p><?php echo $show->CommitteeAppointmentNumber; ?></p>
                        <h6 class="fw-bold">คำนำหน้าชื่อ</h6>
                        <p><?php echo $shows->PREFIX_NAME; ?></p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">
                            ชื่อ-นามสกุล(ภาษาไทย)</h6>
                        <p><?php echo $show->CommitteeMemberNameThai; ?>-<?php echo $show->CommitteeMemberLastNameThai; ?>
                        </p>
                        <h6 class="fw-bold">
                            ชื่อ-นามสกุล(ภาษาอังกฤษ)
                        </h6>
                        <p><?php echo $show->CommitteeMemberNameEnglish; ?>-<?php echo $show->CommitteeMemberLastNameEnglish; ?>
                        </p>

                    </div>


                    <div class="col">
                        <h6 class="fw-bold">
                            ตำแหน่งกรรมการและอนุกรรมการ</h6>
                        <p><?php echo $shows->COMMITEE_POSITION_NAME; ?></p>
                        <h6 class="fw-bold">
                            ตำแหน่งในองค์กรของกรรมการและอนุกรรมการ
                        </h6>
                        <p><?php echo $show->CommitteeMemberOrganizationPosition; ?></p>

                        <h6 class="fw-bold">เริ่มวาระการดำรงตำแหน่ง</h6>
                        <p><?php echo $show->CommitteeMemberTermStartDate; ?></p>
                        <h6 class="fw-bold">สิ้นสุดวาระการดำรงตำแหน่ง</h6>
                        <p><?php echo $show->CommitteeMemberTermEndDate; ?></p>

                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <!-- <a href="<?php echo site_url('cm_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>&&name=<?php $name; ?>" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>