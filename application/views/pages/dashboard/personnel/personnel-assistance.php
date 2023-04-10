<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดการช่วยราชการ
                    <?php
                    $result = $this->db->query('SELECT *  FROM PERSONNEL 
                       INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                       WHERE PersonnelID = "' . $_GET['PersonnelID'] . '" 
                       AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . '
                       AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . '
                       AND PositionCode = ' . $_GET['PositionCode'] . '
                       ');
                    foreach ($result->result() as $PERSONNEL) {
                    ?>
                </h1>
                <a class="btn btn-light text-dark"><b><?= ' : ' . $PERSONNEL->PREFIX_NAME . $PERSONNEL->PersonnelNameThai . ' ' . $PERSONNEL->PersonnelLastNameThai ?></b></a>
            <?php } ?>
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
                        <h5 class="card-title"><span></span> <a href="personnel?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-assistance?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ประเภท</th>
                            <th scope="col">หน่วยงาน</th>
                            <th scope="col">วันที่เริ่ม</th>
                            <th scope="col">วันที่สิ้นสุด</th>
                            <th style="text-align: center;" scope="col">เอกสารแนบ</th>
                            <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM PERSONNEL_ASSISTANCE 
                                    INNER JOIN CLS_ASSISTANCE_TYPE ON PERSONNEL_ASSISTANCE.AssistanceTypeCode = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE
                                    WHERE PERSONNEL_ASSISTANCE.DeleteStatus = 0 AND PERSONNEL_ASSISTANCE    .PersonnelID = "' . $_GET['PersonnelID'] . '" AND PERSONNEL_ASSISTANCE.JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' 
                                    ');
                        $CountI = 0;
                        foreach ($result->result() as $PERSONNEL_ASSISTANCE) {
                            $CountI++;
                        ?>
                            <tr>
                                <td><?= $PERSONNEL_ASSISTANCE->ASSISTANCE_TYPE_NAME; ?></td>
                                <td><?= $PERSONNEL_ASSISTANCE->AssistanceOrganizationName; ?></td>
                                <td><?php if ($PERSONNEL_ASSISTANCE->AssistanceStartDate != "0000-00-00") {
                                        echo DateThai($PERSONNEL_ASSISTANCE->AssistanceStartDate);
                                    } else echo '-'; ?>
                                </td>
                                <td><?php if ($PERSONNEL_ASSISTANCE->AssistanceEndDate != "0000-00-00") {
                                        echo DateThai($PERSONNEL_ASSISTANCE->AssistanceEndDate);
                                    } else echo '-'; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($PERSONNEL_ASSISTANCE->AssistanceDocumentURL != NULL) { ?>
                                        <a class="btn btn-info" href="assets/personnel/document/<?= $PERSONNEL_ASSISTANCE->AssistanceDocumentURL; ?>" target="_blank"><i class="bi bi-file-earmark-pdf"></i></a>
                                    <?php } else echo '-'; ?>
                                </td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Model<?= $CountI; ?>"><i class=" bi bi-card-list"></i></button>
                                </td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-personnel-assistance?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&AssistanceTypeCode=<?= $PERSONNEL_ASSISTANCE->AssistanceTypeCode ?>&&AssistanceStartDate=<?= $PERSONNEL_ASSISTANCE->AssistanceStartDate ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $CountI; ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="Model<?= $CountI; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><i class=" bi bi-card-list"></i> รายละเอียดข้อมูล</h5>
                                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                        </div>
                                        <div class="modal-body">
                                            <h6 style="text-align: center;">
                                                <h6>คำสั่ง :

                                                    <?php if ($PERSONNEL_ASSISTANCE->AssistanceCommand != NULL) {
                                                        echo $PERSONNEL_ASSISTANCE->AssistanceCommand;
                                                    } else
                                                        echo '-' ?>
                                                </h6>

                                                หมายเหตุ : <?php if ($PERSONNEL_ASSISTANCE->AssistanceReason != NULL) {
                                                                echo $PERSONNEL_ASSISTANCE->AssistanceReason;
                                                            } else echo '-' ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
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


<?php
$result = $this->db->query('SELECT *
FROM PERSONNEL_ASSISTANCE 
WHERE DeleteStatus = 0 AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' AND PersonnelID = "' . $_GET['PersonnelID'] . '"
');
$Count = 0;
foreach ($result->result() as $PERSONNEL_ASSISTANCE) {
    $Count++;
?>
    <div class="modal fade" id="Delete<?= $Count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-personnel-assistance/'  . $_GET['PersonnelID'] . '/' .  $_GET['JurisdictionCode'] . '/' .  $_GET['PersonnelTypeCode'] . '/' .  $_GET['PositionCode'] . '/' . $PERSONNEL_ASSISTANCE->AssistanceTypeCode . '/' . $PERSONNEL_ASSISTANCE->AssistanceStartDate);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>