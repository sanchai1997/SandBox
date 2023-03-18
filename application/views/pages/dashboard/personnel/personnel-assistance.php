<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <?php
                $result = $this->db->query('SELECT *  FROM PERSONNEL WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                foreach ($result->result() as $PERSONNEL) {
                ?>
                    <h1>การช่วยราชการ - <?= $PERSONNEL->PersonnelNameThai; ?> <?= $PERSONNEL->PersonnelLastNameThai; ?>
                    <?php } ?>
                    </h1>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="personnel-assistance?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-outline-secondary" data-mdb-ripple-color="dark">การช่วยราชการ</a>
                <a href="personnel-education?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ระดับการศึกษา</a>
                <a href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">วิทยฐานะและตำแหน่งวิชาการ</a>
                <a href="personnel-additionalposition?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ตำแหน่งหน้าที่เพิ่มเติม</a>

            </div>

        </div>
    </div><!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-check"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span style="padding-right:10px">| Table Assistance</span> <a href="personnel" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-assistance?PersonnelID=<?= $_GET['PersonnelID']; ?>" class="btn btn-success ">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปรเภทการช่วยราชการ</th>
                            <th scope="col">หน่วยงานที่ไปช่วยราชการ</th>
                            <th style="text-align: center;" scope="col">วันที่เริ่ม</th>
                            <th style="text-align: center;" scope="col">วันที่สิ้นสุด</th>
                            <th style="text-align: center;" scope="col">คำสั่งหรือหนังสือ</th>
                            <th style="text-align: center;" scope="col">เหตุผล</th>
                            <th style="text-align: center;" scope="col">เอกสารแนบไฟล์</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *  FROM PERSONNEL_ASSISTANCE 
                        INNER JOIN CLS_ASSISTANCE_TYPE ON PERSONNEL_ASSISTANCE.AssistanceTypeCode = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE
                        WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $ASSISTANCE) {
                        ?>
                            <tr>
                                <td><?= $ASSISTANCE->ASSISTANCE_TYPE_NAME ?></td>
                                <td><?= $ASSISTANCE->AssistanceOrganizationName ?></td>
                                <td style="text-align: center;"><?= DateThai($ASSISTANCE->AssistanceStartDate); ?></td>
                                <td style="text-align: center;"><?= DateThai($ASSISTANCE->AssistanceEndDate); ?></td>
                                <td><?= $ASSISTANCE->AssistanceCommand ?></td>
                                <td><?= $ASSISTANCE->AssistanceReason ?></td>
                                <td style="text-align: center;"><?php if ($ASSISTANCE->AssistanceDocumentURL == NULL) {
                                                                    echo '-';
                                                                } else { ?>
                                        <a href="<?php echo base_url('../application/documents/personnel/assistance/' . $ASSISTANCE->AssistanceDocumentURL) ?>" class="btn btn-primary"><i class="bi bi-file-earmark-text"></i></a>
                                    <?php } ?>
                                </td>
                                <td style="text-align: center;"><a href="edit-forms-personnel-assistance?PersonnelID=<?= $ASSISTANCE->PersonnelID ?>&&JurisdictionCode=<?= $ASSISTANCE->JurisdictionCode ?>&&AssistanceTypeCode=<?= $ASSISTANCE->AssistanceTypeCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $ASSISTANCE->PersonnelID ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="Delete<?= $ASSISTANCE->PersonnelID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                        </div>
                                        <div class="modal-body">
                                            <h6>
                                                <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo base_url('delete-assistance/' . $ASSISTANCE->PersonnelID . '/' . $ASSISTANCE->JurisdictionCode . '/' . $ASSISTANCE->AssistanceTypeCode);
                                                        ?>" class="btn btn-danger">ลบ</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->