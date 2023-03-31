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
                    <h1>นวัตกรรมการศึกษา</h1>
                    <?php break;
                case 'sh1.1':
                    ?>
                    <h1>ผู้จัดทำนวัตกรรมการศึกษา -
                        <?php echo $name; ?>
                    </h1>
                    <?php
                    break;

                default:
                    ?>
                    <h1>ข้อมูลนวัตกรรมการศึกษา -
                        <?php echo $name; ?>
                    </h1>
                    <?php
                    break;
            } ?>

            <!-- <div class="col-3">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">ข้อมูลนวัตกรรมการศึกษา</li>
                    </ol>
                </nav>
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
                            <h5 class="card-title">
                                <!-- <div class="dropdown">
                            <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ประเภทข้อมูล
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"
                                        href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>">นวัตกรรมการศึกษา</a>
                                </li>
                            </ul>
                        </div> -->
                            </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a
                                    href="<?php echo site_url('forms_p1?page=sh1') ?>" class="btn btn-success">เพิ่มข้อมูล
                                </a></h5>
                        </div>
                    </div>



                    <table class="table table-borderless datatable col-12">
                        <thead>

                            <tr>
                                <!-- <th style="text-align: center;" scope="col">รหัสนวัตกรรมการศึกษาศึกษา</th> -->
                                <th style="" scope="col" class="col-1">ปีการศึกษา</th>
                                <th style="" scope="col" class="col-1">ภาคเรียน</th>
                                <th style="" scope="col" class="col-5">ชื่อนวัตกรรม</th>
                                <th style="" scope="col" class="col-2">ผู้จัดทำ</th>
                                <th style="text-align: center;" scope="col"class="col-1">ดูรายละเอียด</th>
                                <th style="text-align: center;" scope="col"class="col-1">ปฏิบัติ</th>

                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM INNOVATION where DeleteStatus = 0');
                            foreach ($result->result() as $show) {
                                ?>

                                <tr>
                                    <!-- <th scope="row " style="text-align: center;"><?php echo $InnovationID = $show->InnovationID; ?></th> -->
                                    <td scope="row " style="">
                                        <?php echo $show->EducationYear; ?>
                                    </td>
                                    <td scope="row " style="">
                                        <?php echo $show->Semester; ?>
                                    </td>
                                    <td scope="row " style="">
                                        <?php echo $show->InnovationName; ?>
                                    </td>
                                    <td scope="row " style="text-align: left;">
                                        <?php $resultc = $this->db->query("SELECT * FROM INNOVATION_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON INNOVATION_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                            JOIN CLS_PREFIX ON INNOVATION_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                            WHERE InnovationID='" . $InnovationID . "' AND DeleteStatus = 0"); ?>

                                        <?php foreach ($resultc->result() as $showc) { ?>
                                            <div class="row">
                                                <div class="col">
                                                    <p>

                                                        <a href="<?php echo site_url('forms_p1?page=sh22') ?>&&key=<?php echo $showc->Id; ?>&&name=<?php echo $show->InnovationName; ?>" class="my-link">
                                                            <?php echo $showc->PREFIX_NAME; ?>            <?php echo nbs(2); ?>
                                                            <?php echo $showc->CreatorNameThai; ?>-
                                                            <?php echo $showc->CreatorLastNameThai; ?></a>
                                                    </p>
                                                </div>

                                            </div>
                                        <?php } ?>
                                       
                                            <a href="<?php echo site_url('forms_p2?page=sh2') ?>&&name=<?php echo $show->InnovationName; ?>&&key=<?php echo $show->InnovationID; ?>" class="fw-bold my-link">
                                            >>เพิ่มผู้จัดทำ>>
                                            </a>
                                       
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#das<?php echo $show->InnovationID; ?>"><i
                                                class="bi bi-card-list"></i></button>

                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo site_url('forms_p1?page=sh11') ?>&&key=<?php echo $show->InnovationID; ?>&&name=<?php echo $show->InnovationName; ?>"
                                            class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                        <?php echo nbs(1); ?> <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#del_ass_ria<?php echo $show->InnovationID; ?>">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del_ass_ria<?php echo $show->InnovationID; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ยืนยันการลบข้อมูลรหัส
                                                            <?php echo nbs(2); ?>
                                                            <?php echo $show->InnovationName; ?>
                                                        </h5>

                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">คุณต้องการลบข้อมูลใช่หรือไหม</p>

                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ยกเลิก</button>
                                                        <form method="post" action="<?php echo site_url('del_p1'); ?>">
                                                            <input type="hidden" name="InnovationID"
                                                                value="<?php echo $show->InnovationID; ?>">
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
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } ?>

                <script>
                    setTimeout(function () {
                        document.getElementById('myAlert').remove();
                    }, 5000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
                </script>
</main><!-- End #main -->
<!-- Modal das -->
<!-- **************************************************ดู********************************************************************** -->
<?php if ($page == 'sh1') { ?>


    <?php
    $result = $this->db->query('SELECT * FROM INNOVATION 
                      ');
    foreach ($result->result() as $show) {
        ?>
        <div class="modal fade" id="das<?php echo $show->InnovationID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">นวัตกรรมการศึกษา</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $InnovationID = $show->InnovationID;
                        $results = $this->db->query("SELECT * FROM INNOVATION 
                            INNER JOIN CLS_INNOVATION_TYPE 
                            ON INNOVATION.InnovationTypeCode = CLS_INNOVATION_TYPE.INNOVATION_TYPE_CODE 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON INNOVATION.TargetEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE 
                            -- INNER JOIN INNOVATION_CREATOR 
                            -- ON INNOVATION_CREATOR.InnovationID = INNOVATION.InnovationID 
                            WHERE InnovationID = $InnovationID
                            ");

                        foreach ($results->result() as $shows) {
                            ?>
                            <div class="row">
                                <div class="col">
                                    <!-- <h5 class="fw-bold">รหัสนวัตกรรมการศึกษา</h5>
                        <p><?php echo $show->InnovationID; ?></p> -->
                                    <h5 class="fw-bold">ปีการศึกษา</h5>
                                    <p>
                                        <?php echo $show->EducationYear; ?>
                                    </p>
                                    <h5 class="fw-bold">ภาคเรียน</h5>
                                    <p>
                                        <?php echo $show->Semester; ?>
                                    </p>
                                    <h5 class="fw-bold">ชื่อนวัตกรรม</h5>
                                    <p>
                                        <?php echo $name = $show->InnovationName; ?>
                                    </p>

                                    <h5 class="fw-bold">ประเภทนวัตกรรม</h5>
                                    <p>
                                        <?php echo $shows->INNOVATION_TYPE_NAME; ?>
                                    </p>

                                    <h5 class="fw-bold">ระดับการศึกษาที่นำไปใช้</h5>
                                    <p>
                                        <?php echo $shows->EDUCATION_LEVEL_NAME; ?>
                                    </p>
                                    <h5 class="fw-bold">คำค้นหา</h5>
                                    <p>
                                        <?php echo $show->SearchKeyword; ?>
                                    </p>
                                </div>


                                <div class="col">
                                    <h5 class="fw-bold">ประโยชน์ของนวัตกรรม</h5>
                                    <p>
                                        <?php echo $show->InnovationBenefit; ?>
                                    </p>
                                    <h5 class="fw-bold">บทคัดย่อ</h5>
                                    <p>
                                        <?php echo $show->Abstract; ?>
                                    </p>
                                    <h5 class="fw-bold">เอกสารแนบ</h5>
                                    <p><a href="<?php echo base_url('assets/EII/INNOVATION') ?>/<?php echo $show->AttachmentURL; ?>"
                                            target="_blank">รายละเอียดเอกสาร</i></a></p>
                                    <h5 class="fw-bold">แหล่งนวัตกรรม</h5>
                                    <p>
                                        <?php echo $show->Source; ?>
                                    </p>
                                    <h5 class="fw-bold">วันที่เผยแพร่</h5>
                                    <p>
                                        <?php echo $show->PublishDate; ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <h5 class="fw-bold">รายชื่อผู้จัดทำ</h5>
                                    <?php $resultc = $this->db->query("SELECT * FROM INNOVATION_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON INNOVATION_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
JOIN CLS_PREFIX ON INNOVATION_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
WHERE InnovationID='" . $InnovationID . "'"); ?>

                                    <table class="m-2 col-12">
                                        <tr>
                                            <th style="">ประเภทบัตร</th>
                                            <th style="" class="col-3">เลขบัตร ปชช.</th>
                                            <th style="" class="col-4">ชื่อ-นามสกุล</th>
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
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <!-- <a href="<?php echo site_url('forms_p1?page=sh11') ?>&&key=<?php echo $show->Id; ?>&&name=<?php echo $show->InnovationName; ?>"
                    class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    </tbody>
    </table>
<?php } ?>

<!-- **************************************************แก้ไข********************************************************************** -->