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
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้</h1>
            <?php break;
                case 'sh2':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h1>
            <?php
                
                    break;
                default:
                ?> <h1>ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h1>
            <?php
                    break;
            }  ?>


            <div class="col-3">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">เทคโนโลยีและสื่อการเรียนรู้</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_lear_tech_media_das_p2?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้
                </a>
               

            </div>

        </div>
    </div>

    </div><!-- End Page Title -->


    
    <?php if ($page=='sh1') {
   ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| เทคโนโลยีและสื่อการเรียนรู้</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTM_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้
                            </a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <th style="text-align: center;" scope="col">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ชื่อเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                        <tr>
                            <th scope="row " style="text-align: center;"><?php echo $show->MediaID; ?></th>
                            <th scope="row"><?php echo $show->EducationYear; ?></th>
                            <td style="text-align: center;"><?php echo $show->Semester; ?></td>
                            <td style="text-align: center;"><?php echo $show->MediaName; ?></td>
                            
                            <th scope="row " style="text-align: center;"> <a
                                    href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1.1') ?>&&key=<?php echo $show->MediaID ?>"
                                    class="btn btn-warning"><i class="bi bi-eye"></i></a> </th>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look<?php echo $show->Id; ?>"><i
                                        class="bi bi-card-list"></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_LTM<?php echo $show->Id; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_LTM<?php echo $show->Id; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->MediaID; ?>
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                คุณต้องการลบข้อมูลใช่หรือไหม

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก</button>
                                                <form method="post"
                                                    action="<?php echo site_url('LTM_del_p1'); ?>">
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

    <?php
} ?>
 <?php  if ($page=='sh1.1') {  ?>

<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">รายละเอียดข้อมูล <span>| นวัตกรรมการศึกษา</span></h5>
                </div>
                <div class="col">
                    <h5 style="float: right; padding: 15px;" class="card-title"><a
                            href="<?php echo site_url('LTM_forms_p1?page=sh2') ?>"
                            class="btn btn-success">เพิ่มข้อมูลผู้จัดทำเทคโนโลยี
                        </a></h5>
                </div>
            </div>


            <table class="table table-borderless datatable">
                <thead>

                    <tr>
                        <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">รหัสประเภทบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col"> ชื่อผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ดูรายละเอียด</th>


                    </tr>

                </thead>
                <tbody>
                    <?php  $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                    <?php 
                $result = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
                
                WHERE MediaID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
                    <tr>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorPersonalID; ?></th>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorPersonalIDTypeCode; ?></th>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorNameThai; ?><?php echo nbs(2); ?><?php echo $show->CreatorLastNameThai; ?>
                        </th>
                        <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#LTM<?php echo $show->Id; ?>"><i
                                    class="bi bi-card-list"></i></button> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#del_1st<?php echo $show->Id; ?>">
                    <i class="bi bi-trash"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="del_1st<?php echo $show->Id; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CreatorPersonalID; ?>
                                </h5>

                            </div>
                            <div class="modal-body">
                                คุณต้องการลบข้อมูลใช่หรือไหม

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">ยกเลิก</button>
                                <form method="post"
                                    action="<?php echo site_url('LTMC_del_p2'); ?>">
                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                    <div class="d-flex justify-content-center">
                                        <button name="Submit" type="submit"
                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Modal --></td>


                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <?php } ?>
    <?php if ($page=='sh2') {
   ?>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('LTMC_forms_p2?page=sh2') ?>"
                                class="btn btn-success">เพิ่มข้อมูลผู้จัดทำเทคโนโลยี
                            </a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>

                    <tr>
                        <th style="text-align: center;" scope="col">หมายเลขบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">รหัสประเภทบัตรประจำตัวผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col"> ชื่อผู้จัดทำ</th>
                        <th style="text-align: center;" scope="col">ดูรายละเอียด</th>


                    </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show ) {
                            # code...
                        ?>
                       <tr>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorPersonalID; ?></th>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorPersonalIDTypeCode; ?></th>
                        <th scope="row " style="text-align: center;">
                            <?php echo $show->CreatorNameThai; ?><?php echo nbs(2); ?><?php echo $show->CreatorLastNameThai; ?>
                        </th>
                        <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#las3<?php echo $show->Id; ?>"><i
                                    class="bi bi-card-list"></i></button> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#del_ass_ria<?php echo $show->Id; ?>">
                    <i class="bi bi-trash"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="del_ass_ria<?php echo $show->Id; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    ยืนยันการลบข้อมูลรหัส<?php echo nbs(2); ?><?php echo $show->CreatorPersonalID; ?>
                                </h5>

                            </div>
                            <div class="modal-body">
                                คุณต้องการลบข้อมูลใช่หรือไหม

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">ยกเลิก</button>
                                <form method="post"
                                    action="<?php echo site_url('LTMC_del_p2'); ?>">
                                    <input type="hidden" name="Id" value="<?php echo $show->Id; ?>">
                                    <div class="d-flex justify-content-center">
                                        <button name="Submit" type="submit"
                                            class="btn btn-primary">ยืนยันก่อนลบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Modal --></td>


                    </tr>
                        <?php  } ?>
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
<?php  if ($page=='sh1') {  ?>


<?php
                      $result = $this->db->query('SELECT * FROM LEARNING_TECHNOLOGY_MEDIA 
                      ');
                     foreach ($result->result() as $show) {
                     ?>
<div class="modal fade" id="look<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">นวัตกรรมการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaID; ?></p>
                        <h5 class="fw-bold">ปีการศึกษา</h5>
                        <p><?php echo $show->EducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียน</h5>
                        <p><?php echo $show->Semester; ?></p>
                        <h5 class="fw-bold">ชื่อเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaName; ?></p>
                        <h5 class="fw-bold">รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaTypeCode; ?></p>
                        <h5 class="fw-bold">รหัสระดับการศึกษาที่นำไปใช้</h5>
                        <p><?php echo $show->TargetEducationLevelCode; ?></p>
                    </div>


                    <div class="col">
                        <h5 class="fw-bold">ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaBenefit; ?></p>
                        <h5 class="fw-bold">บทคัดย่อ</h5>
                        <p><?php echo $show->Abstract; ?></p>
                        <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('document') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank"><i class="bi bi-file-text"></i></a></p>
                        <h5 class="fw-bold">แหล่งที่มา</h5>
                        <p><?php echo $show->Source; ?></p>
                        <h5 class="fw-bold">วันที่เผยแพร่</h5>
                        <p><?php echo $show->PublishDate; ?></p>
                        <h5 class="fw-bold">คำค้นหา</h5>
                        <p><?php echo $show->SearchKeyword; ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo site_url('LTM_forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>

<?php  } ?>
</tbody>
</table>
<?php } ?>
<?php  if ($page=='sh1.1') {  ?>


    <?php 
                $result = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
                
                WHERE MediaID='" . $key . "' AND DeleteStatus = '0'");
                foreach ($result->result() as $show) {  ?>
<div class="modal fade" id="LTM<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำนวัตกรรมการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <p><?php echo $show->MediaID; ?></p>
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
            <a href="<?php echo site_url('LTMC_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              
            </div>
        </div>
    </div>
</div>

<?php  } ?>

<?php } ?>
<?php  if ($page=='sh2') {  ?>


<?php 
            $result = $this->db->query("SELECT * FROM LEARNING_TECHNOLOGY_MEDIA_CREATOR 
            
            WHERE DeleteStatus = '0'");
            foreach ($result->result() as $show) {  ?>
<div class="modal fade" id="las3<?php echo $show->Id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำนวัตกรรมการศึกษา</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <h5 class="fw-bold">รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้</h5>
                    <p><?php echo $show->MediaID; ?></p>
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
        <a href="<?php echo site_url('LTMC_forms_p2?page=sh22') ?>&&key=<?php echo $show->Id; ?>"class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          
        </div>
    </div>
</div>
</div>
<!-- **************************************************แก้ไข********************************************************************** -->
<?php  } ?>

<?php } ?>
