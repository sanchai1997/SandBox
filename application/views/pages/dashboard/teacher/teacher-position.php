<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดหน้าที่เพิ่มเติม
                    <?php if (isset($_GET['TeacherID'])) {
                        $result = $this->db->query('SELECT *  FROM TEACHER 
                INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE TeacherID = "' . $_GET['TeacherID'] . '" AND SchoolID = ' . $_GET['SchoolID'] . '');
                        foreach ($result->result() as $TEACHER) {

                            $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                            foreach ($result->result() as $SCHOOL) {
                                $SchoolName = $SCHOOL->SchoolNameThai;
                            }
                    ?>
                </h1>
                <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $TEACHER->PREFIX_NAME . $TEACHER->TeacherNameThai . ' ' . $TEACHER->TeacherLastNameThai ?></b></a>
        <?php }
                    } ?>
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
                        <h5 class="card-title"><span></span> <a href="teacher?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher-position?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ตำแหน่ง</th>
                            <th scope="col">กลุ่ม/หมวด</th>
                            <th scope="col">วันที่เริ่มปฏิบัติ</th>
                            <th style="text-align: center;" scope="col">เอกสารแนบ</th>
                            <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM TEACHER_ADDITIONAL_POSITION 
                                    INNER JOIN CLS_DEPARTMENT ON TEACHER_ADDITIONAL_POSITION.AdditionalDepartmentCode = CLS_DEPARTMENT.DEPARTMENT_CODE
                                    WHERE TEACHER_ADDITIONAL_POSITION.DeleteStatus = 0 AND TEACHER_ADDITIONAL_POSITION.SchoolID = ' . $_GET['SchoolID'] . ' AND TEACHER_ADDITIONAL_POSITION.TeacherID = "' . $_GET['TeacherID'] . '"
                                    ');

                        foreach ($result->result() as $TEACHER_ADDITIONAL_POSITION) {
                        ?>
                            <tr>
                                <td><?= $TEACHER_ADDITIONAL_POSITION->AdditionalPosition; ?></td>
                                <td><?= $TEACHER_ADDITIONAL_POSITION->DEPARTMENT_NAME; ?></td>
                                <td><?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate != "0000-00-00") {
                                        echo DateThai($TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate);
                                    } else echo '-'; ?></td>
                                <td style="text-align: center;">
                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDocumentURL != NULL) { ?>
                                        <a class="btn btn-primary" href="<?= $TEACHER_ADDITIONAL_POSITION->AdditionalDocumentURL; ?>"><i class="bi bi-file-earmark-pdf"></i></a>
                                    <?php } else echo '-'; ?>
                                </td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Model<?= $TEACHER_ADDITIONAL_POSITION->TeacherID . $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode; ?>"><i class=" bi bi-card-list"></i></button>
                                </td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-teacher-position?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&AdditionalDepartmentCode=<?= $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $TEACHER_ADDITIONAL_POSITION->TeacherID . $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode; ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="Model<?= $TEACHER_ADDITIONAL_POSITION->TeacherID . $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><i class=" bi bi-card-list"></i> รายละเอียดข้อมูล</h5>
                                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                        </div>
                                        <div class="modal-body">
                                            <h6 style="text-align: center;">
                                                <h6>คำสั่ง :

                                                    <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalCommand != NULL) {
                                                        echo $TEACHER_ADDITIONAL_POSITION->AdditionalCommand;
                                                    } else
                                                        echo '-' ?>
                                                </h6>

                                                หมายเหตุ : <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalComment != NULL) {
                                                                echo $TEACHER_ADDITIONAL_POSITION->AdditionalComment;
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
FROM TEACHER_ADDITIONAL_POSITION 
INNER JOIN CLS_DEPARTMENT ON TEACHER_ADDITIONAL_POSITION.AdditionalDepartmentCode = CLS_DEPARTMENT.DEPARTMENT_CODE
WHERE TEACHER_ADDITIONAL_POSITION.DeleteStatus = 0 AND TEACHER_ADDITIONAL_POSITION.SchoolID = ' . $_GET['SchoolID'] . ' AND TEACHER_ADDITIONAL_POSITION.TeacherID = "' . $_GET['TeacherID'] . '"
');
foreach ($result->result() as $TEACHER_ADDITIONAL_POSITION) {
?>
    <div class="modal fade" id="Delete<?= $TEACHER_ADDITIONAL_POSITION->TeacherID . $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-teacher-position/'  . $_GET['TeacherID'] . '/' .  $_GET['SchoolID'] . '/' .  $_GET['EducationYear'] . '/' .  $_GET['Semester'] . '/' .  $_GET['PersonnelTypeCode'] . '/' .  $_GET['PositionCode'] . '/' . $TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>