<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดวิทยฐานะ
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
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-academic?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">วิทยาฐานะและตำแหน่ง</th>
                            <th scope="col">สาขาที่ยื่นขอ</th>
                            <th scope="col">วันที่ได้รับ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM PERSONNEL_ACADEMIC 
                                    INNER JOIN CLS_ACADEMIC_STANDING ON PERSONNEL_ACADEMIC.AcademicStandingCode = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE
                                    WHERE PERSONNEL_ACADEMIC.DeleteStatus = 0 AND PERSONNEL_ACADEMIC.JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' AND PERSONNEL_ACADEMIC.PersonnelID = "' . $_GET['PersonnelID'] . '"
                                    ');
                        $Count = 0;
                        foreach ($result->result() as $PERSONNEL_ACADEMIC) {
                            $Count++;

                        ?>

                            <tr>
                                <td><?= $PERSONNEL_ACADEMIC->ACADEMIC_STANDING_NAME; ?></td>
                                <td>
                                    <?php if ($PERSONNEL_ACADEMIC->AcademicProgramCode != NULL) {

                                        $result_fix = $this->db->query('SELECT *FROM CLS_PROGRAM 
                                        WHERE PROGRAM_CODE = ' . $PERSONNEL_ACADEMIC->AcademicProgramCode . '
                                        ');

                                        foreach ($result_fix->result() as $PROGRAM) {
                                            echo $PROGRAM->PROGRAM_NAME;
                                        }
                                    } else echo '-'; ?>
                                </td>
                                <td><?php if ($PERSONNEL_ACADEMIC->AcademicDate != "0000-00-00") {
                                        echo DateThai($PERSONNEL_ACADEMIC->AcademicDate);
                                    } else echo '-'; ?></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-personnel-academic?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&AcademicStandingCode=<?= $PERSONNEL_ACADEMIC->AcademicStandingCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $Count ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->


<?php
$result = $this->db->query('SELECT *
 FROM PERSONNEL_ACADEMIC 
 INNER JOIN CLS_ACADEMIC_STANDING ON PERSONNEL_ACADEMIC.AcademicStandingCode = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE
 WHERE PERSONNEL_ACADEMIC.DeleteStatus = 0 AND PERSONNEL_ACADEMIC.JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' AND PERSONNEL_ACADEMIC.PersonnelID = "' . $_GET['PersonnelID'] . '"
 ');
$CountI = 0;
foreach ($result->result() as $PERSONNEL_ACADEMIC) {
    $CountI++;
?>
    <div class="modal fade" id="Delete<?= $CountI ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-personnel-academic/'  . $_GET['PersonnelID'] . '/' .  $_GET['JurisdictionCode'] . '/' .  $_GET['PersonnelTypeCode'] . '/' .  $_GET['PositionCode'] . '/' . $PERSONNEL_ACADEMIC->AcademicStandingCode);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>