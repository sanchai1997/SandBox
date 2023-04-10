<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดวุฒิการศึกษา
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
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-education?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ระดับการศึกษา</th>
                            <th scope="col">กลุ่มวิชาเอก</th>
                            <th scope="col">สาขาวิชา</th>
                            <th scope="col">วุฒิการศึกษา</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * 
                       FROM PERSONNEL_EDUCATION_DEGREE 
                       INNER JOIN CLS_EDUCATION_LEVEL ON PERSONNEL_EDUCATION_DEGREE.EducationLevelCode  = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE 
                       INNER JOIN CLS_MAJOR ON PERSONNEL_EDUCATION_DEGREE.EducationMajorCode  = CLS_MAJOR.MAJOR_CODE 
                       INNER JOIN CLS_DEGREE ON PERSONNEL_EDUCATION_DEGREE.EducationDegreeCode  = CLS_DEGREE.DEGREE_CODE 
                       WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"
                       ');
                        $Count = 0;
                        foreach ($result->result() as $PERSONNEL_EDUCATION_DEGREE) {
                            $Count++;
                        ?>
                            <tr>
                                <td><?= $PERSONNEL_EDUCATION_DEGREE->EDUCATION_LEVEL_NAME; ?></td>
                                <td><?= $PERSONNEL_EDUCATION_DEGREE->MAJOR_NAME; ?></td>
                                <td><?php if ($PERSONNEL_EDUCATION_DEGREE->EducationProgramCode != NULL) {
                                        $result_fix = $this->db->query('SELECT *FROM CLS_PROGRAM 
                                        WHERE PROGRAM_CODE = ' . $PERSONNEL_EDUCATION_DEGREE->EducationProgramCode . '
                                        ');
                                        foreach ($result_fix->result() as $PROGRAM) {
                                            echo $PROGRAM->PROGRAM_NAME;
                                        }
                                    } else echo '-'; ?></td>
                                <td><?= $PERSONNEL_EDUCATION_DEGREE->DEGREE_NAME; ?></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-personnel-education?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&EducationLevelCode=<?= $PERSONNEL_EDUCATION_DEGREE->EducationLevelCode ?>&&EducationMajorCode=<?= $PERSONNEL_EDUCATION_DEGREE->EducationMajorCode ?>&&EducationDegreeCode=<?= $PERSONNEL_EDUCATION_DEGREE->EducationDegreeCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
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
  FROM PERSONNEL_EDUCATION_DEGREE 
  WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"
  ');
$CountI = 0;
foreach ($result->result() as $PERSONNEL_EDUCATION_DEGREE) {
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
                    <a href="<?php echo base_url('delete-personnel-education/'  . $_GET['PersonnelID'] . '/' .  $_GET['JurisdictionCode'] . '/' .  $_GET['PersonnelTypeCode'] . '/' .  $_GET['PositionCode'] . '/' . $PERSONNEL_EDUCATION_DEGREE->EducationLevelCode . '/' . $PERSONNEL_EDUCATION_DEGREE->EducationMajorCode . '/' . $PERSONNEL_EDUCATION_DEGREE->EducationDegreeCode);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>