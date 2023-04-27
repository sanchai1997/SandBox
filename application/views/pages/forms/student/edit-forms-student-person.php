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
                        <form class="row g-3" action="<?php echo base_url('update-student-person/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentPersonalIDTypeCode" id="StudentPersonalIDTypeCode" aria-label="StudentPersonalIDTypeCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                        foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentPersonalIDTypeCode == $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentPersonalIDTypeCode">ประเภทบัตรประจำตัว<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="StudentPersonalID" id="StudentPersonalID" value="<?= base64_decode($STUDENT->StudentPersonalID) ?>">
                                    <label for="StudentPersonalID">หมายเลขบัตร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentPassportNumber" id="StudentPassportNumber" value="<?= $STUDENT->StudentPassportNumber ?>">
                                    <label for="StudentPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentGenderCode" id="StudentGenderCode" aria-label="StudentGenderCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                        foreach ($result->result() as $GENDER) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentGenderCode == $GENDER->GENDER_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
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
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
                                        foreach ($result->result() as $NATIONALITY) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentNationalityCode == $NATIONALITY->NATIONALITY_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
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
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RACE ORDER BY RACE_NAME ASC');
                                        foreach ($result->result() as $RACE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentRaceCode == $RACE->RACE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
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
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
                                        foreach ($result->result() as $RELIGION) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentReligionCode == $RELIGION->RELIGION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentBloodCode" id="StudentBloodCode" aria-label="StudentBloodCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                        foreach ($result->result() as $BLOOD) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentBloodCode == $BLOOD->BLOOD_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="3" name="StudentWeight" id="StudentWeight" value="<?= $STUDENT->StudentWeight ?>">
                                    <label for="StudentWeight">น้ำหนัก <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="3" name="StudentHeight" id="StudentHeight" value="<?= $STUDENT->StudentHeight ?>">
                                    <label for="StudentHeight">ส่วนสูง <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="StudentBirthDate" id="StudentBirthDate" value="<?= $STUDENT->StudentBirthDate ?>">
                                    <label for="StudentBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentBirthProvinceCode" id="StudentBirthProvinceCode" aria-label="StudentBirthProvinceCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentBirthProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentBirthProvinceCode">จังหวัดที่เกิด<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentLanguageCode" id="StudentLanguageCode" aria-label="StudentLanguageCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE ORDER BY LANGUAGE_NAME ASC');
                                        foreach ($result->result() as $LANGUAGE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentLanguageCode == $LANGUAGE->LANGUAGE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentLanguageCode">ภาษาหลัก<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentOtherLanguageCode" id="StudentOtherLanguageCode" aria-label="StudentOtherLanguageCode">
                                        <?php if ($STUDENT->StudentOtherLanguageCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE ORDER BY LANGUAGE_NAME ASC');
                                        foreach ($result->result() as $LANGUAGE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentOtherLanguageCode == $LANGUAGE->LANGUAGE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $LANGUAGE->LANGUAGE_CODE; ?>"><?= $LANGUAGE->LANGUAGE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentLanguageCode">ภาษาอื่น<font color="red"> *</font></label>
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

            var Year = /^[0-9]{13,13}$/;
            if (frm.StudentPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตร");
                return false;
            } else if (!frm.StudentPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรให้ครบ 13 หลัก");
                frm.StudentPersonalID.value = "";
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