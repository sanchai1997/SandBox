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
                            <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทข้อมูล
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"
                                            href="<?php echo site_url('Fm_best_practice_das_p1?page=sh1') ?>">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</a>
                                    </li>

                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a
                                href="<?php echo site_url('BP_forms_p1?page=sh1') ?>"
                                class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>

                        <tr>
                            <!-- <th style="text-align: center;" scope="col">วิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</th> -->
                            <th style="" scope="col" class="1">ปีการศึกษา</th>
                            <th style="" scope="col"class="1">ภาคเรียน</th>
                            <th style="" scope="col" class="col-3">ชื่อวิธีปฏิบัติ</th>
                            <!-- <th style="" scope="col"class="col-2">ประเภทวิธีปฏิบัติ</th> -->
                            <th style="" scope="col"class="col-2">ระดับการศึกษาที่นำไปใช้</th>
                            <th style="" scope="col"class="col-2">ผู้จัดทำ</th>
                            <th style="text-align: center;" scope="col"class="col-1">ดูรายละเอียด</th>
                            <th style="text-align: center;" scope="col"class="col-1">ปฎิบัติ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($query as $show) {
                                # code...
                            ?>
                        <?php
                                $BestPracticeID = $show->BestPracticeID;
                                $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            WHERE BestPracticeID = $BestPracticeID
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
                                <?php echo $show->Semester; ?>
                            </td>
                            <td style="">
                                <?php echo $show->BestPracticeName; ?>
                            </td>
                            <!-- <td style="">
                                <?php 
                                // echo $shows->BEST_PRACTICE_TYPE_NAME; 
                                ?>
                            </td> -->
                            <td style="">
                                <?php echo $shows->EDUCATION_LEVEL_NAME; ?>
                            </td>
                            <td scope="row " style=""> <?php $resultc = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
                            JOIN CLS_PREFIX ON BEST_PRACTICE_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
                            WHERE BestPracticeID='" . $BestPracticeID . "' AND DeleteStatus = 0"); ?>

                                        <?php foreach ($resultc->result() as $showc) { ?>
                                            <div class="row">
                                                <div class="col">
                                                    <p>

                                                        <a href="<?php echo site_url('BPC_forms_p2?page=sh22') ?>&&key=<?php echo $showc->Id; ?>&&name=<?php echo $show->BestPracticeName; ?>" class="my-link">
                                                            <?php echo $showc->PREFIX_NAME; ?>            <?php echo nbs(2); ?>
                                                            <?php echo $showc->CreatorNameThai; ?>-
                                                            <?php echo $showc->CreatorLastNameThai; ?></a>
                                                    </p>
                                                </div>

                                            </div>
                                        <?php } ?>
                                        <a href="<?php echo site_url('BPC_forms_p2?page=sh2') ?>&&name=<?php echo $show->BestPracticeName; ?>&&key=<?php echo $show->BestPracticeID; ?>" class="my-link fw-bold"
                                            >>>เพิ่มผู้จัดทำ>>
                                        </a> </td>

                                    <td style="text-align: center;">
                                        
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#look<?php echo $show->BestPracticeID; ?>"><i
                                    class="bi bi-card-list"></i></button>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?php echo site_url('BP_forms_p1?page=sh11') ?>&&key=<?php echo $show->BestPracticeID; ?>&&name=<?php echo $show->BestPracticeName; ?>"
                                        class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del_BP<?php echo $show->BestPracticeID; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="del_BP<?php echo $show->BestPracticeID; ?>" tabindex="-1"
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
                                                    <input type="hidden" name="BestPracticeID"
                                                        value="<?php echo $show->BestPracticeID; ?>">
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
    $result = $this->db->query('SELECT * FROM BEST_PRACTICE 
                      ');
    foreach ($result->result() as $show) {
    ?>
<div class="modal fade" id="look<?php echo $show->BestPracticeID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                        $BestPracticeID = $show->BestPracticeID;
                        $results = $this->db->query("SELECT * FROM BEST_PRACTICE 
                            INNER JOIN CLS_BEST_PRACTICE_TYPE 
                            ON CLS_BEST_PRACTICE_TYPE.BEST_PRACTICE_TYPE_CODE = BEST_PRACTICE.BestPracticeTypeCode 
                            INNER JOIN CLS_EDUCATION_LEVEL 
                            ON CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE = BEST_PRACTICE.TargetEducationLevelCode 
                            INNER JOIN CLS_RECOGNIZED_BY 
                            ON CLS_RECOGNIZED_BY.RECOGNIZED_BY_CODE = BEST_PRACTICE.RecognizedCode 
                            WHERE BestPracticeID = $BestPracticeID
                            ");

                        foreach ($results->result() as $shows) {
                        ?>
                <div class="row">
                    <div class="col">
                        <!-- <h5 class="fw-bold">วิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                        <p><?php echo $BestPracticeID = $show->BestPracticeID; ?></p> -->
                        <h5 class="fw-bold">ปีการศึกษา</h5>
                        <p><?php echo $show->EducationYear; ?></p>
                        <h5 class="fw-bold">ภาคเรียน</h5>
                        <p><?php echo $show->Semester; ?></p>
                        <h5 class="fw-bold">ชื่อวิธีปฏิบัติ</h5>
                        <p><?php echo $show->BestPracticeName; ?></p>
                        <h5 class="fw-bold">ประเภทวิธีปฏิบัติ</h5>
                        <p><?php echo $shows->BEST_PRACTICE_TYPE_NAME; ?></p>
                        <h5 class="fw-bold">ระดับการศึกษาที่นำไปใช้</h5>
                        <p><?php echo $shows->EDUCATION_LEVEL_NAME; ?></p>
                        <h5 class="fw-bold">คำค้นหา</h5>
                        <p><?php echo $show->SearchKeyword; ?></p>
                    </div>


                    <div class="col">
                        <h5 class="fw-bold">การเผยแพร่ที่ได้รับการยอมรับ</h5>
                        <p><?php echo $shows->RECOGNIZED_BY_NAME; ?></p>
                        <h5 class="fw-bold">ประโยชน์ที่ได้รับ</h5>
                        <p><?php echo $show->Benefit; ?></p>
                        <h5 class="fw-bold">บทคัดย่อ</h5>
                        <p><?php echo $show->Abstract; ?></p>
                        <h5 class="fw-bold">เอกสารแนบ</h5>
                        <p><a href="<?php echo base_url('document') ?>/<?php echo $show->AttachmentURL; ?>"
                                target="_blank">รายละเอียดเอกสาร</i></a></p>
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">วิธีการปฏิบัติ</h5>
                        <p><?php echo $show->PracticeProcess; ?></p>
                        <h5 class="fw-bold">แหล่งที่มา</h5>
                        <p><?php echo $show->Source; ?></p>
                        <h5 class="fw-bold">วันที่เผยแพร่</h5>
                        <p><?php echo $show->PublishDate; ?></p>
                    </div>
                </div>
                <div class="row">
                                    <h5 class="fw-bold">รายชื่อผู้จัดทำ</h5>
                                    <?php $resultc = $this->db->query("SELECT * FROM BEST_PRACTICE_CREATOR JOIN CLS_PERSONAL_ID_TYPE ON BEST_PRACTICE_CREATOR.CreatorPersonalIDTypeCode = CLS_PERSONAL_ID_TYPE.PERSONAL_ID_TYPE_CODE 
JOIN CLS_PREFIX ON BEST_PRACTICE_CREATOR.CreatorPrefixCode = CLS_PREFIX.PREFIX_CODE  
WHERE BestPracticeID='" . $BestPracticeID . "'"); ?>

                                    <table class="m-3 col-11">
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
