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
                        <form class="row g-3" action="<?php echo base_url('update-teacher-person/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="TeacherPersonalID" id="TeacherPersonalID" value="<?= $TEACHER->TeacherPersonalID ?>">
                                    <label for="TeacherPersonalID">หมายเลขบัตรประจำตัวประชาชน<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherPassportNumber" id="TeacherPassportNumber" value="<?= $TEACHER->TeacherPassportNumber ?>">
                                    <label for="TeacherPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherGenderCode" id="TeacherGenderCode" aria-label="TeacherGenderCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                        foreach ($result->result() as $GENDER) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherGenderCode == $GENDER->GENDER_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">เพศ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherNationalityCode" id="TeacherNationalityCode" aria-label="TeacherNationalityCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
                                        foreach ($result->result() as $NATIONALITY) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherNationalityCode == $NATIONALITY->NATIONALITY_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherNationalityCode">สัญชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherRaceCode" id="TeacherRaceCode" aria-label="TeacherRaceCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RACE ORDER BY RACE_NAME ASC');
                                        foreach ($result->result() as $RACE) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherRaceCode == $RACE->RACE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherRaceCode">เชื้อชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherReligionCode" id="TeacherReligionCode" aria-label="TeacherReligionCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
                                        foreach ($result->result() as $RELIGION) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherReligionCode == $RELIGION->RELIGION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="TeacherBirthDate" id="TeacherBirthDate" value="<?= $TEACHER->TeacherBirthDate ?>">
                                    <label for="TeacherBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherBloodCode" id="TeacherBloodCode" aria-label="TeacherBloodCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                        foreach ($result->result() as $BLOOD) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherBloodCode == $BLOOD->BLOOD_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
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

            var Year = /^[0-9]{13,13}$/;
            if (frm.TeacherPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตรประจำตัวประชาชน");
                return false;
            } else if (!frm.TeacherPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรประจำตัวประชาชนให้ครบ 13 หลัก");
                frm.TeacherPersonalID.value = "";
                return false;
            }

            if (frm.TeacherGenderCode.value == "") {
                alert("กรุณาเลือกเพศ");
                return false;
            }

            if (frm.TeacherNationalityCode.value == "") {
                alert("กรุณาเลือกสัญชาติ");
                return false;
            }

            if (frm.TeacherRaceCode.value == "") {
                alert("กรุณาเลือกเชื้อชาติ");
                return false;
            }

            if (frm.TeacherReligionCode.value == "") {
                alert("กรุณาเลือกศาสนา");
                return false;
            }

            if (frm.TeacherBirthDate.value == "") {
                alert("กรุณากรอกวันเกิด");
                return false;
            }

            if (frm.TeacherBloodCode.value == "") {
                alert("กรุณาเลือกกลุ่มเลือด");
                return false;
            }


            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->