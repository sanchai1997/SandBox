<main id="main" class="main">
    <div class="pagetitle">
        <?php
        $result_fix = $this->db->query('SELECT *  FROM CLS_TEACHER_CERTIFICATE WHERE TEACHER_CERTIFICATE_CODE = ' . $_GET['CertificateCode'] . '');
        foreach ($result_fix->result() as $CLS_TEACHER_CERTIFICATE) {
            $CertificateName = $CLS_TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_NAME;
        }
        ?>
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูล - <?= $CertificateName ?>
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
<?php }
            } ?>
<a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $TEACHER->PREFIX_NAME . $TEACHER->TeacherNameThai . ' ' . $TEACHER->TeacherLastNameThai ?></b></a>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-teacher-certificate/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['CertificateCode'] . '/' . $_GET['CertificateLicenseNumber']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="CertificateCode" id="CertificateCode" aria-label="CertificateCode" disabled>
                                        <?php
                                        $result_refix = $this->db->query('SELECT * FROM TEACHER_CERTIFICATE WHERE SchoolID = ' . $_GET['SchoolID'] . ' 
                                        AND TeacherID = "' . $_GET['TeacherID'] . '"
                                        AND CertificateCode = ' . $_GET['CertificateCode'] . '
                                        AND CertificateLicenseNumber = ' . $_GET['CertificateLicenseNumber'] . '

                                        ');
                                        foreach ($result_refix->result() as $TEACHER) {

                                            $result = $this->db->query('SELECT * FROM CLS_TEACHER_CERTIFICATE');
                                            foreach ($result->result() as $TEACHER_CERTIFICATE) {
                                                if ($TEACHER->CertificateCode == $TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_CODE) {
                                        ?>

                                                    <option value="<?= $TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_CODE; ?>"><?= $TEACHER_CERTIFICATE->TEACHER_CERTIFICATE_NAME; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                    <label for="CertificateCode">ประเภทใบอนุญาติ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="14" name="CertificateLicenseNumber" id="CertificateLicenseNumber" value="<?= $TEACHER->CertificateLicenseNumber ?>">
                                    <label for="CertificateLicenseNumber">เลขที่<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="CertificateLicenseIssuedDate" id="CertificateLicenseIssuedDate" value="<?= $TEACHER->CertificateLicenseIssuedDate ?>">
                                    <label for="CertificateLicenseIssuedDate">วันที่ออก<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="CertificateLicenseExpiredDate" id="CertificateLicenseExpiredDate" value="<?= $TEACHER->CertificateLicenseExpiredDate ?>">
                                    <label for="CertificateLicenseExpiredDate">วันที่หมดอายุ<font color="red"> *</font></label>
                                </div>
                            </div>


                        <?php }
                        ?>

                        <div class="d-flex justify-content-between">
                            <a href="teacher-certificate?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                            <button type="button" class="btn btn-warning" onclick="return check(Teacher)">แก้ไขข้อมูล</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>
                                            <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                        </h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">ยืนยัน</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

                    </div>
                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript">
        function check(frm) {

            if (frm.CertificateCode.value == "") {
                alert("กรุณาเลือกประเภทใบอนุญาติ");
                return false;
            }
            if (frm.CertificateLicenseNumber.value == "") {
                alert("กรุณากรอกเลขที่ใบอนุญาติ");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->