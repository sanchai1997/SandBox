<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลครูและบุคลากรทางการศึกษา
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
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-teacher-marriage/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลคู่สมรส</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="MarriageStatusCode" id="MarriageStatusCode" aria-label="MarriageStatusCode">
                                        <?php if ($TEACHER->MarriageStatusCode == NULL) { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                                        foreach ($result->result() as $MARRIAGE_STATUS) {
                                        ?>
                                            <option <?php if ($TEACHER->MarriageStatusCode == $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE; ?>"><?= $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">สถานภาพการสมรส </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="SpousePersonalID" id="SpousePersonalID" value="<?= $TEACHER->SpousePersonalID ?>">
                                    <label for="SpousePersonalID">หมายเลขบัตรประจำตัวประชาชน</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="SpousePrefixCode" id="SpousePrefixCode" aria-label="SpousePrefixCode">
                                        <?php if ($TEACHER->SpousePrefixCode == NULL) { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX ORDER BY PREFIX_NAME ASC');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($TEACHER->SpousePrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SpousePrefixCode">คำนำหน้า</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SpouseNameThai" id="SpouseNameThai" value="<?= $TEACHER->SpouseNameThai ?>">
                                    <label for="SpouseNameThai">ชื่อ (ภาษาไทย) </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SpouseLastNameThai" id="SpouseLastNameThai" value="<?= $TEACHER->SpouseLastNameThai ?>">
                                    <label for="SpouseLastNameThai">นามสกุล (ภาษาไทย) </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SpouseNameEnglish" id="SpouseNameEnglish" value="<?= $TEACHER->SpouseNameEnglish ?>">
                                    <label for="SpouseNameEnglish">ชื่อ (ภาษาอังกฤษ) </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SpouseLastNameEnglish" id="SpouseLastNameEnglish" value="<?= $TEACHER->SpouseLastNameEnglish ?>">
                                    <label for="SpouseLastNameEnglish">นามสกุล (ภาษาอังกฤษ) </label>
                                </div>
                            </div>


                    <?php }
            } ?>

                    <div class="d-flex justify-content-between">
                        <a href="teacher?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.SpouseNameThai.value != "" && !frm.SpouseNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกชื่อเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.SpouseNameThai.value = "";
                return false;
            }

            if (frm.SpouseLastNameThai.value != "" && !frm.SpouseLastNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกนามสกุลเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.SpouseLastNameThai.value = "";
                return false;
            }
            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->