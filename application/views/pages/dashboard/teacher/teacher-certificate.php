<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดใบประกอบวิชาชีพ
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
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher-certificate?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ประเภทใบอนุญาต</th>
                            <th scope="col">เลขที่</th>
                            <th scope="col">วันที่ออก</th>
                            <th scope="col">วันหมดอายุ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM TEACHER_CERTIFICATE 
                                    INNER JOIN CLS_TEACHER_CERTIFICATE ON TEACHER_CERTIFICATE.CertificateCode = CLS_TEACHER_CERTIFICATE.TEACHER_CERTIFICATE_CODE
                                    WHERE TEACHER_CERTIFICATE.DeleteStatus = 0 AND TEACHER_CERTIFICATE.SchoolID = ' . $_GET['SchoolID'] . ' AND TEACHER_CERTIFICATE.TeacherID = "' . $_GET['TeacherID'] . '"
                                    ');

                        foreach ($result->result() as $TEACHER_CERTIFICATE) {
                        ?>
                            <tr>
                                <td><?= $TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_NAME; ?></td>
                                <td><?= $TEACHER_CERTIFICATE->CertificateLicenseNumber; ?></td>
                                <td><?php if ($TEACHER_CERTIFICATE->CertificateLicenseIssuedDate != "0000-00-00") {
                                        echo DateThai($TEACHER_CERTIFICATE->CertificateLicenseIssuedDate);
                                    } else echo '-'; ?></td>
                                <td><?php if ($TEACHER_CERTIFICATE->CertificateLicenseExpiredDate != "0000-00-00") {
                                        echo DateThai($TEACHER_CERTIFICATE->CertificateLicenseExpiredDate);
                                    } else echo '-'; ?></td>
                                <td style="text-align: center;"><a href="edit-forms-teacher-certificate?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&CertificateCode=<?= $TEACHER_CERTIFICATE->CertificateCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $TEACHER_CERTIFICATE->TeacherID . $TEACHER_CERTIFICATE->CertificateCode; ?>"><i class=" bi bi-trash"></i></button>
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
        FROM TEACHER_CERTIFICATE 
        INNER JOIN CLS_TEACHER_CERTIFICATE ON TEACHER_CERTIFICATE.CertificateCode = CLS_TEACHER_CERTIFICATE.TEACHER_CERTIFICATE_CODE
        WHERE TEACHER_CERTIFICATE.DeleteStatus = 0 AND TEACHER_CERTIFICATE.SchoolID = ' . $_GET['SchoolID'] . ' AND TEACHER_CERTIFICATE.TeacherID = "' . $_GET['TeacherID'] . '"
        ');
foreach ($result->result() as $TEACHER_CERTIFICATE) {
?>
    <div class="modal fade" id="Delete<?= $TEACHER_CERTIFICATE->TeacherID . $TEACHER_CERTIFICATE->CertificateCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-teacher-certificate/'  . $_GET['TeacherID'] . '/' .  $_GET['SchoolID'] . '/' .  $_GET['EducationYear'] . '/' .  $_GET['Semester'] . '/' .  $_GET['PersonnelTypeCode'] . '/' .  $_GET['PositionCode'] . '/' . $TEACHER_CERTIFICATE->CertificateCode);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>