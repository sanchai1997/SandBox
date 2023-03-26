<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลรหัสนักเรียน
            <?php if (isset($_GET['StudentReferenceID'])) { ?>
                <?php
                $result = $this->db->query('SELECT *  FROM STUDENT 
                INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" AND SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $STUDENT) {


                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        $SchoolName = $SCHOOL->SchoolNameThai;
                    }
                ?>

        </h1>
        <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . ' ' . $STUDENT->StudentLastNameThai ?></b></a>
<?php }
            } ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-student-main/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลการศึกษา</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="SchoolAdmissionYear" id="SchoolAdmissionYear" value="<?= $STUDENT->SchoolAdmissionYear ?>">
                                    <label for="SchoolAdmissionYear">ปีการศึกษาที่เริ่มเข้าเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="CurrentEducationLevelAdmissionYear" id="CurrentEducationLevelAdmissionYear" value="<?= $STUDENT->CurrentEducationLevelAdmissionYear ?>">
                                    <label for="CurrentEducationLevelAdmissionYear">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษาปัจจุบัน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="EducationLevelCode" id="EducationLevelCode" aria-label="EducationLevelCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');

                                        foreach ($result->result() as $EDUCATION_LEVEL) {
                                        ?>
                                            <option <?php if ($STUDENT->EducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="EducationYear" id="EducationYear" value="<?= $STUDENT->EducationYear ?>">
                                    <label for="EducationYear">ปีการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="2" maxlength="2" name="Semester" id="Semester" value="<?= $STUDENT->Semester ?>">
                                    <label for="Semester">ภาคเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="GradeLevelCode" id="GradeLevelCode" aria-label="GradeLevelCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL ');

                                        foreach ($result->result() as $GRADE_LEVEL) {
                                        ?>
                                            <option <?php if ($STUDENT->GradeLevelCode == $GRADE_LEVEL->GRADE_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GradeLevelCode">ระดับชั้นเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="Classroom" id="Classroom" value="<?= $STUDENT->Classroom; ?>">
                                    <label for="Classroom">ห้องเรียน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="CurriculumID" id="CurriculumID" aria-label="CurriculumID">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CURRICULUM');
                                        foreach ($result->result() as $CURRICULUM) {
                                        ?>
                                            <option <?php if ($STUDENT->CurriculumID == $CURRICULUM->CurriculumID) {
                                                        echo 'selected';
                                                    } ?> value="<?= $CURRICULUM->CurriculumID; ?>"><?= $CURRICULUM->CurriculumName; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentStatusCode">หลักสูตร</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">รูปภาพนักเรียน <font color="red"> *</font></label>
                                    <input type="file" class="form-control" name="ImageStudent" id="ImageStudent" placeholder="รูปภาพนักเรียน">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="15" name="StudentID" id="StudentID" value="<?= $STUDENT->StudentID ?>">
                                    <label for="StudentID">รหัสประจำตัวนักเรียน<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentStatusCode" id="StudentStatusCode" aria-label="StudentStatusCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_STUDENT_STATUS');
                                        foreach ($result->result() as $STUDENT_STATUS) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentStatusCode == $STUDENT_STATUS->STUDENT_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $STUDENT_STATUS->STUDENT_STATUS_CODE; ?>"><?= $STUDENT_STATUS->STUDENT_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentStatusCode">สถานสภาพนักเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentPrefixCode" id="StudentPrefixCode" aria-label="StudentPrefixCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX LIMIT 5');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentNameThai" id="StudentNameThai" value="<?= $STUDENT->StudentNameThai ?>">
                                    <label for="SchoolNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentLastNameThai" id="StudentLastNameThai" value="<?= $STUDENT->StudentLastNameThai ?>">
                                    <label for="StudentLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentNameEnglish" id="StudentNameEnglish" value="<?= $STUDENT->StudentNameEnglish ?>">
                                    <label for="SchoolNameThai">ชื่อ (ภาษาอังกฤษ) </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentLastNameEnglish" id="StudentLastNameEnglish" value="<?= $STUDENT->StudentLastNameEnglish ?>">
                                    <label for="StudentLastNameThai">นามสกุล (ภาษาอังกฤษ) </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="student?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-warning" onclick="return check(Student)">แก้ไขข้อมูล</button>
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

            var Year = /^[0-9]{4,4}$/;
            //SchoolAdmissionYear
            if (frm.SchoolAdmissionYear.value == "") {
                alert("กรุณากรอกปีการศึกษาที่เริ่มเข้าเรียน");
                return false;
            } else if (!frm.SchoolAdmissionYear.value.match(Year)) {
                alert("กรุณากรอกปีการศึกษาที่เริ่มเข้าเรียนให้ครบ 4 หลัก");
                frm.SchoolAdmissionYear.value = "";
                return false;
            }
            //CurrentEducationLevelAdmissionYear
            if (frm.CurrentEducationLevelAdmissionYear.value == "") {
                alert("กรุณากรอกปีการศึกษาที่เริ่มเข้าเรียน");
                return false;
            } else if (!frm.CurrentEducationLevelAdmissionYear.value.match(Year)) {
                alert("กรุณากรอกปีการศึกษาที่เริ่มเข้าเรียนให้ครบ 4 หลัก");
                frm.CurrentEducationLevelAdmissionYear.value = "";
                return false;
            }

            if (frm.EducationLevelCode.value == "") {
                alert("กรุณาเลือกระดับการศึกษา");
                return false;
            }

            if (frm.EducationYear.value == "") {
                alert("กรุณากรอกปีการศึกษา");
                return false;
            } else if (!frm.EducationYear.value.match(Year)) {
                alert("กรุณากรอกปีการศึกษาให้ครบ 4 หลัก");
                frm.EducationYear.value = "";
                return false;
            }

            if (frm.Semester.value == "") {
                alert("กรุณากรอกภาคเรียน");
                return false;
            }

            if (frm.GradeLevelCode.value == "") {
                alert("กรุณาเลือกระดับชั้นเรียน");
                return false;
            }


            if (frm.StudentID.value == "") {
                alert("กรุณากรอกรหัสนักเรียน");
                return false;
            }

            if (frm.StudentStatusCode.value == "") {
                alert("กรุณาเลือกสถานภาพนักเรียน");
                return false;
            }


            if (frm.StudentPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้านักเรียน");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.StudentNameThai.value == "") {
                alert("กรุณากรอกชื่อนักเรียน(ภาษาไทย)");
                return false;
            } else if (!frm.StudentNameThai.value.match(NameThai)) {
                alert("กรุณากรอกชื่อนักเรียนเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.StudentNameThai.value = "";
                return false;
            }

            if (frm.StudentLastNameThai.value == "") {
                alert("กรุณากรอกนามสกุลนักเรียน(ภาษาไทย)");
                return false;
            } else if (!frm.StudentLastNameThai.value.match(NameThai)) {
                alert("กรุณากรอกนามสกุลนักเรียนเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.StudentLastNameThai.value = "";
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->