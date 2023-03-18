<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <?php
                $result = $this->db->query('SELECT *  FROM PERSONNEL WHERE PersonnelID = "' . $_GET['PersonnelID'] . '"');
                foreach ($result->result() as $PERSONNEL) {
                ?>
                    <h1>วิทยฐานะและตำแหน่งวิชาการ - <?= $PERSONNEL->PersonnelNameThai; ?> <?= $PERSONNEL->PersonnelLastNameThai; ?>
                    <?php } ?>
                    </h1>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="personnel-assistance?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">การช่วยราชการ</a>
                <a href="personnel-education?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ระดับการศึกษา</a>
                <a href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: right;" class="btn btn-sm btn-outline-secondary" data-mdb-ripple-color="dark">วิทยฐานะและตำแหน่งวิชาการ</a>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span style="padding-right:10px">| Table Academic</span> <a href="personnel" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-academic?PersonnelID=<?= $_GET['PersonnelID']; ?>" class="btn btn-success ">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">วิทยฐานะ/ตำแหน่งวิชาการ</th>
                            <th style="text-align: center;" scope="col">วันที่ที่ได้วิทยฐานะ/เข้าสู่ระดับ</th>
                            <th style="text-align: center;" scope="col">สาขาที่ยื่นข้อวิทยฐานะ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *  FROM PERSONNEL_ACADEMIC 
                        INNER JOIN CLS_ACADEMIC_STANDING ON PERSONNEL_ACADEMIC.AcademicStandingCode = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE
                        INNER JOIN CLS_PROGRAM ON PERSONNEL_ACADEMIC.AcademicProgramCode = CLS_PROGRAM.PROGRAM_CODE
                        WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $ACADEMIC) {
                        ?>
                            <tr>
                                <td><?= $ACADEMIC->ACADEMIC_STANDING_NAME ?></td>
                                <td style="text-align: center;"><?= DateThai($ACADEMIC->AcademicDate); ?></td>
                                <td><?= $ACADEMIC->PROGRAM_NAME ?></td>
                                <td style="text-align: center;"><a href="edit-forms-personnel-academic?PersonnelID=<?= $ACADEMIC->PersonnelID ?>&&JurisdictionCode=<?= $ACADEMIC->JurisdictionCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                <a href="<?php echo base_url('delete-academic/' . $ACADEMIC->PersonnelID . '/' . $ACADEMIC->JurisdictionCode);
                            ?>" class="btn btn-danger">ลบ</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>