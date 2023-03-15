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
    <?php  } ?>
    <div class="pagetitle">
        <div class="row ">

            <?php switch (
                $page
            ) { case 'sh1': ?> <h1>ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</h1>
            <?php break;case 'sh2': ?> <h1>ข้อมูลรายชื่อคณะกรรมการ</h1>
            <?php break;default: ?><h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่างๆ</h1>
            <?php break;} ?>

            <div class="col-3">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">อำนาจและหน้าที่ของคณะกรรมการ</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url(
                    'Fm_committee_das_p1?page=sh1'
                ); ?>" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>
                
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
                        <h6 class="card-title">รายละเอียดข้อมูล <span>| ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</span></h6>
                    </div>
                    <div class="col">
                        <h6 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                    'c_forms_p1?page=sh1'
                                ); ?>" class="btn btn-success">เพิ่มข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</a>
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
                            
                            <td style="text-align: center;"><?php echo $show->CommitteeAppointmentNumber; ?>
                            <th scope="row" style="text-align: center;"><?php echo $show->CommitteeYear; ?></th>
                            <td style="text-align: center;"><a
                                    href="<?php echo site_url('Fm_committee_das_p2?page=sh2') ?>&&key=<?php echo $show->CommitteeAppointmentNumber ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a></td>
                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look1<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_committee<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_committee<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CommitteeProvinceCode; ?>
                                                </h6>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('c_del_p1'); ?>">
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
                        <?php } ?>
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
                        <h6 class="card-title">รายละเอียดข้อมูล <span>| รายชื่อคณะกรรมการ</span></h6>
                    </div>
                    <div class="col">
                        <h6 style="float: right; padding: 15px;" class="card-title"><a href="<?php echo site_url(
                                    'cm_forms_p2?page=sh2'
                                ); ?>" class="btn btn-success">เพิ่มข้อมูลรายชื่อคณะกรรมการ</a></h6>
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
                        <?php foreach ($query as $show_member) { ?>
                        <tr>
                            <th scope="row" style="text-align: center;"><?php echo $show_member->CommitteeAppointmentNumber; ?></th>
                            <th scope="row" style="text-align: center;"><?php echo $show_member->CommitteeMemberNameThai; ?><?php echo nbs(2); ?><?php echo $show_member->CommitteeMemberLastNameThai; ?></th>
                            <th scope="row" style="text-align: center;" ><?php echo $show_member->CommitteeMemberOrganizationPosition; ?></th>

                            <!-- แก้ไขลบ -->
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look2<?php echo $show_member->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_comm_member<?php echo $show_member->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_comm_member<?php echo $show_member->Id; ?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show_member->CommitteeProvinceCode; ?>
                                                </h6>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('cm_del_p2'); ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $show_member->Id; ?>">
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
    <?php }
    ?>
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->
<?php  if ($page=='sh1') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM COMMITTEE 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look1<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">ข้อมูลคำสั่งแต่งตั้งคณะกรรมการ</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">จังหวัด</h6>
                        <p><?php echo $show->CommitteeProvinceCode; ?></p>
                        <h6 class="fw-bold">ปีที่ออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeYear; ?></p>
                        <h6 class="fw-bold">เลขออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeAppointmentNumber; ?></p>
                        <h6 class="fw-bold">รหัสประเภทการแต่งตั้ง</h6>
                        <p><?php echo $show->CommitteeAppointmentTypeCode; ?></p>
                        <h6 class="fw-bold">ลิงก์เอกสารคำสั่ง</h6>
                        <p><th scope="row " style="text-align: center;">
                                <a href="<?php echo base_url('document') ?>/<?php echo $show->CommitteeAppointmentAttachmentURL; ?>"
                                    target="_blank"><i class="bi bi-file-text"></i></a>

                            </th></p>
                        
                    </div>


                    
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('c_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>
<?php  if ($page=='sh2') {  ?>


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
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">จังหวัด</h6>
                        <p><?php echo $show->CommitteeProvinceCode; ?></p>
                        <h6 class="fw-bold">ปีที่ออกคำสั่ง</h6>
                        <p><?php echo $show->CommitteeYear; ?></p>
                        <h6 class="fw-bold">เลขที่คำสั่ง</h6>
                        <p><?php echo $show->CommitteeAppointmentNumber; ?></p>
                        <h6 class="fw-bold">คำนำหน้าชื่อ</h6>
                        <p><?php echo $show->CommitteeMemberPrefixCode; ?></p>
                    </div>
                 <div class="col">
                        <h6 class="fw-bold">ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาไทย)</h6>
                        <p><?php echo $show->CommitteeMemberNameThai; ?></p>
                        <h6 class="fw-bold">ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</h6>
                        <p><?php echo $show->CommitteeMemberNameEnglish; ?></p>
                        <h6 class="fw-bold">ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)</h6>
                        <p><?php echo $show->CommitteeMemberMiddleNameThai; ?></p>
                        <h6 class="fw-bold">ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</h6>
                        <p><?php echo $show->CommitteeMemberMiddleNameEnglish; ?></p>
                        <h6 class="fw-bold">นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)</h6>
                        <p><?php echo $show->CommitteeMemberLastNameThai; ?></p>
                        <h6 class="fw-bold">นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</h6>
                        <p><?php echo $show->CommitteeMemberLastNameEnglish; ?></p>
                 </div>


                    <div class="col">
                        <h6 class="fw-bold">รหัสตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</h6>
                        <p><?php echo $show->CommitteeMemberPositionCode; ?></p>
                        <h6 class="fw-bold">ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</h6>
                        <p><?php echo $show->CommitteeMemberOrganizationPosition; ?></p>
                        
                        <h6 class="fw-bold">เริ่มวาระการดำรงตำแหน่ง</h6>
                        <p><?php echo $show->CommitteeMemberTermStartDate; ?></p>
                        <h6 class="fw-bold">สิ้นสุดวาระการดำรงตำแหน่ง</h6>
                        <p><?php echo $show->CommitteeMemberTermEndDate; ?></p>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('cm_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>