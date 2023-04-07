<main id="main" class="main">
    <div class="pagetitle">
        <h1>เพิ่มข้อมูลนักเรียน
            <?php if (isset($_GET['SchoolID'])) { ?>
                -
                <?php
                $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $SCHOOL) {
                    echo $SCHOOL->SchoolNameThai;
                }
                ?>
            <?php } ?>
        </h1>
        <?php
        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
        foreach ($result->result() as $GRADE_LEVEL) {
            $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
        ?>
            <a class="btn btn-sm btn-light text-dark"><b>ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?></b></a>
        <?php } ?>
    </div><!-- End Page Title -->
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-student-select/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลการศึกษา</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="SchoolAdmissionYear" id="SchoolAdmissionYear">
                                    <label for="SchoolAdmissionYear">ปีการศึกษาที่เริ่มเข้าเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="CurrentEducationLevelAdmissionYear" id="CurrentEducationLevelAdmissionYear" value="<?= date('Y') + 543; ?>">
                                    <label for="CurrentEducationLevelAdmissionYear">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษาปัจจุบัน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="EducationLevelCode" id="EducationLevelCode" aria-label="EducationLevelCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');

                                        foreach ($result->result() as $EDUCATION_LEVEL) {
                                        ?>
                                            <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="EducationYear" id="EducationYear" value="<?= $_GET['EducationYear'] ?>" disabled>
                                    <label for="EducationYear">ปีการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="2" maxlength="2" name="Semester" id="Semester" value="<?= $_GET['Semester'] ?>" disabled>
                                    <label for="Semester">ภาคเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="GradeLevelCode" id="GradeLevelCode" aria-label="GradeLevelCode" disabled>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL ');

                                        foreach ($result->result() as $GRADE_LEVEL) {
                                        ?>
                                            <option <?php if ($GRADE_LEVEL->GRADE_LEVEL_CODE == $_GET['GradeLevelCode']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GradeLevelCode">ระดับชั้นเรียน <font color="red"> *</font></label>
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
                                    <input type="text" class="form-control" maxlength="15" name="StudentID" id="StudentID">
                                    <label for="StudentID">รหัสประจำตัวนักเรียน<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentStatusCode" id="StudentStatusCode" aria-label="StudentStatusCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_STUDENT_STATUS');
                                        foreach ($result->result() as $STUDENT_STATUS) {
                                        ?>
                                            <option value="<?= $STUDENT_STATUS->STUDENT_STATUS_CODE; ?>"><?= $STUDENT_STATUS->STUDENT_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentStatusCode">สถานสภาพนักเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentPersonalIDTypeCode" id="StudentPersonalIDTypeCode" aria-label="StudentPersonalIDTypeCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                        foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                        ?>
                                            <option value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentPersonalIDTypeCode">ประเภทบัตรประจำตัว<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="StudentPersonalID" id="StudentPersonalID">
                                    <label for="StudentPersonalID">หมายเลขบัตร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentPassportNumber" id="StudentPassportNumber">
                                    <label for="StudentPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentPrefixCode" id="StudentPrefixCode" aria-label="StudentPrefixCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX LIMIT 5');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentNameThai" id="StudentNameThai">
                                    <label for="SchoolNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentLastNameThai" id="StudentLastNameThai">
                                    <label for="StudentLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentGenderCode" id="StudentGenderCode" aria-label="StudentGenderCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                        foreach ($result->result() as $GENDER) {
                                        ?>
                                            <option value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">เพศ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentNationalityCode" id="StudentNationalityCode" aria-label="StudentNationalityCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
                                        foreach ($result->result() as $NATIONALITY) {
                                        ?>
                                            <option value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentNationalityCode">สัญชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentRaceCode" id="StudentRaceCode" aria-label="StudentRaceCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RACE ORDER BY RACE_NAME ASC');
                                        foreach ($result->result() as $RACE) {
                                        ?>
                                            <option value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentRaceCode">เชื้อชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentReligionCode" id="StudentReligionCode" aria-label="StudentReligionCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
                                        foreach ($result->result() as $RELIGION) {
                                        ?>
                                            <option value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentLanguageCode" id="StudentLanguageCode" aria-label="StudentLanguageCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE ORDER BY LANGUAGE_NAME ASC');
                                        foreach ($result->result() as $LANGUAGE) {
                                        ?>
                                            <option value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentLanguageCode">ภาษาหลัก<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="StudentBirthDate" id="StudentBirthDate">
                                    <label for="StudentBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentBirthProvinceCode" id="StudentBirthProvinceCode" aria-label="StudentBirthProvinceCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($PROVINCE->PROVINCE_CODE == 91) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentBirthProvinceCode">จังหวัดที่เกิด<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentBloodCode" id="StudentBloodCode" aria-label="StudentBloodCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                        foreach ($result->result() as $BLOOD) {
                                        ?>
                                            <option value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="3" name="StudentWeight" id="StudentWeight">
                                    <label for="StudentWeight">น้ำหนัก <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="3" name="StudentHeight" id="StudentHeight">
                                    <label for="StudentHeight">ส่วนสูง <font color="red"> *</font></label>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="student?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode'] ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Student)">บันทึกข้อมูล</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันบันทึกข้อมูล</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>
                                                <center>คุณต้องการบันทึกข้อมูลใช่หรือไหม ?</center>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
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

            if (frm.ImageStudent.value == "") {
                alert("กรุณาใส่รูปของนักเรียน");
                return false;
            } else if (frm.ImageStudent.value != "") {
                var fty = new Array(".jpg", ".jpeg", ".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
                var a = frm.ImageTeacher.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
                var permiss = 0; // เงื่อนไขไฟล์อนุญาต
                a = a.toLowerCase();
                if (a != "") {
                    for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
                        if (a.lastIndexOf(fty[i]) >= 0) { // เงื่อนไขไฟล์ที่อนุญาต   
                            permiss = 1;
                            break;
                        } else {
                            continue;
                        }
                    }
                    if (permiss == 0) {
                        alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ jpg jpeg png");
                        return false;
                    }
                }
            }

            if (frm.StudentID.value == "") {
                alert("กรุณากรอกรหัสนักเรียน");
                return false;
            }

            if (frm.StudentStatusCode.value == "") {
                alert("กรุณาเลือกสถานภาพนักเรียน");
                return false;
            }

            if (frm.StudentPersonalIDTypeCode.value == "") {
                alert("กรุณาเลือกประเภทบัตรประจำตัวนักเรียน");
                return false;
            }

            var Year = /^[0-9]{13,13}$/;
            if (frm.StudentPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตร");
                return false;
            } else if (!frm.StudentPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรให้ครบ 13 หลัก");
                frm.StudentPersonalID.value = "";
                return false;
            }

            if (frm.StudentPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้านักเรียน");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.StudentNameThai.value == "") {
                alert("กรุณาเลือกชื่อนักเรียน(ภาษาไทย)");
                return false;
            } else if (!frm.StudentNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกชื่อนักเรียนเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.StudentNameThai.value = "";
                return false;
            }

            if (frm.StudentLastNameThai.value == "") {
                alert("กรุณาเลือกนามสกุลนักเรียน(ภาษาไทย)");
                return false;
            } else if (!frm.StudentLastNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกนามสกุลนักเรียนเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.StudentLastNameThai.value = "";
                return false;
            }

            if (frm.StudentGenderCode.value == "") {
                alert("กรุณาเลือกเพศของนักเรียน");
                return false;
            }

            if (frm.StudentNationalityCode.value == "") {
                alert("กรุณาเลือกสัญชาติของนักเรียน");
                return false;
            }

            if (frm.StudentRaceCode.value == "") {
                alert("กรุณาเลือกเชื้อชาติของนักเรียน");
                return false;
            }

            if (frm.StudentReligionCode.value == "") {
                alert("กรุณาเลือกศาสนาของนักเรียน");
                return false;
            }

            if (frm.StudentLanguageCode.value == "") {
                alert("กรุณาเลือกภาษาหลัก");
                return false;
            }

            if (frm.StudentBirthDate.value == "") {
                alert("กรุณากรอกวันเกิดของนักเรียน");
                return false;
            }

            if (frm.StudentBirthProvinceCode.value == "") {
                alert("กรุณาเลือกจังหวัดที่เกิดของนักเรียน");
                return false;
            }

            if (frm.StudentBloodCode.value == "") {
                alert("กรุณาเลือกกลุ่มเลือดของนักเรียน");
                return false;
            }

            if (frm.StudentWeight.value == "") {
                alert("กรุณากรอกน้ำหนักนักเรียน");
                return false;
            }

            if (frm.StudentHeight.value == "") {
                alert("กรุณากรอกส่วนสูงนักเรียน");
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->