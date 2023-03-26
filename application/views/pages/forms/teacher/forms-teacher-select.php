<main id="main" class="main">
    <div class="pagetitle">
        <h1>เพิ่มข้อมูลครูและบุคลากรทางการศึกษา
            <?php if (isset($_GET['SchoolID'])) { ?>
                -
                <?php
                $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $SCHOOL) {
                    echo $SCHOOL->SchoolNameThai;
                }
                $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE WHERE PERSONNEL_TYPE_CODE = ' . $_GET['PersonnelTypeCode'] . '');
                foreach ($result->result() as $PERSONNEL_TYPE) {
                    $PERSONNEL_TYPE_NAME = $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME;
                }
                $result = $this->db->query('SELECT * FROM CLS_POSITION WHERE POSITION_CODE = ' . $_GET['PositionCode'] . '');
                foreach ($result->result() as $POSITION) {
                    $POSITION_NAME = $POSITION->POSITION_NAME;
                }
                ?>
            <?php } ?>
        </h1>
        <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ประเภทบุคลากร: <?= $PERSONNEL_TYPE_NAME ?> &nbsp;ตำแหน่ง: <?= $POSITION_NAME ?></b></a>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-teacher-select/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลตำแหน่งและปฎิบัติราชการ</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelStatusCode" id="PersonnelStatusCode" aria-label="PersonnelStatusCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS ORDER BY PERSONNEL_STATUS_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_STATUS) {
                                        ?>
                                            <option value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">สถานะปฎิบัติราชการ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryEducationLevelCode" id="EntryEducationLevelCode" aria-label="EntryEducationLevelCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL ORDER BY EDUCATION_LEVEL_NAME ASC ');

                                        foreach ($result->result() as $EDUCATION_LEVEL) {
                                        ?>
                                            <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับการศึกษาที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryDegreeCode" id="EntryDegreeCode" aria-label="EntryDegreeCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_DEGREE ORDER BY DEGREE_NAME ASC');

                                        foreach ($result->result() as $DEGREE) {
                                        ?>
                                            <option value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">วุฒิการศึกษาที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryMajorCode" id="EntryMajorCode" aria-label="EntryMajorCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_MAJOR ORDER BY MAJOR_NAME ASC');

                                        foreach ($result->result() as $MAJOR) {
                                        ?>
                                            <option value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EntryMajorCode">วิชาเอกที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryProgramCode" id="EntryProgramCode" aria-label="EntryProgramCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROGRAM ORDER BY PROGRAM_NAME ASC');

                                        foreach ($result->result() as $PROGRAM) {
                                        ?>
                                            <option value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">สาขาวิชาที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelStartDate" id="PersonnelStartDate">
                                    <label for="PersonnelStartDate">วันที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelRetireDate" id="PersonnelRetireDate" value="">
                                    <label for="PersonnelRetireDate">วันที่เกษียณ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelTypeCode" id="PersonnelTypeCode" aria-label="PersonnelTypeCode" disabled>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE ORDER BY PERSONNEL_TYPE_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_TYPE) {
                                        ?>
                                            <option <?php if ($PERSONNEL_TYPE->PERSONNEL_TYPE_CODE == $_GET['PersonnelTypeCode']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ประเภทบุคลากร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionCode" id="PositionCode" aria-label="PositionCode" disabled>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION ORDER BY POSITION_NAME ASC');

                                        foreach ($result->result() as $POSITION) {
                                        ?>
                                            <option <?php if ($POSITION->POSITION_CODE == $_GET['PositionCode']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionLevelCode" id="PositionLevelCode" aria-label="PositionLevelCode">
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL ORDER BY POSITION_LEVEL_NAME ASC');

                                        foreach ($result->result() as $POSITION_LEVEL) {
                                        ?>
                                            <option value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PositionStartDate" id="PositionStartDate">
                                    <label for="PositionStartDate">วันที่ดำรงตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">รูปภาพครูและบุคลากร <font color="red"> *</font></label>
                                    <input type="file" class="form-control" name="ImageTeacher" id="ImageTeacher" placeholder="รูปภาพครู">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherPersonalIDTypeCode" id="TeacherPersonalIDTypeCode" aria-label="TeacherPersonalIDTypeCode">
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
                                    <label for="TeacherPersonalIDTypeCode">ประเภทบัตรประจำตัว<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="TeacherPersonalID" id="TeacherPersonalID">
                                    <label for="TeacherPersonalID">หมายเลขบัตรประจำตัวประชาชน<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherPassportNumber" id="TeacherPassportNumber">
                                    <label for="TeacherPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherPrefixCode" id="TeacherPrefixCode" aria-label="TeacherPrefixCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX ORDER BY PREFIX_NAME ASC');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherNameThai" id="TeacherNameThai">
                                    <label for="TeacherNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherLastNameThai" id="TeacherLastNameThai">
                                    <label for="TeacherLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherGenderCode" id="TeacherGenderCode" aria-label="TeacherGenderCode">
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
                                    <label for="TeacherGenderCode">เพศ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherNationalityCode" id="TeacherNationalityCode" aria-label="TeacherNationalityCode">
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
                                    <label for="TeacherNationalityCode">สัญชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherRaceCode" id="TeacherRaceCode" aria-label="TeacherRaceCode">
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
                                    <label for="TeacherRaceCode">เชื้อชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherReligionCode" id="TeacherReligionCode" aria-label="TeacherReligionCode">
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
                                    <label for="TeacherReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="TeacherBirthDate" id="TeacherBirthDate">
                                    <label for="TeacherBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherBloodCode" id="TeacherBloodCode" aria-label="TeacherBloodCode">
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
                                    <label for="TeacherBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
                                </div>
                            </div>



                            <div class="d-flex justify-content-between">
                                <a href="teacher?SchoolID=<?= $_GET['SchoolID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Teacher)">บันทึกข้อมูล</button>
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

            if (frm.PersonnelStatusCode.value == "") {
                alert("กรุณาเลือกสถานะปฏิบัติราชการ");
                return false;
            }

            if (frm.EntryEducationLevelCode.value == "") {
                alert("กรุณาเลือกระดับการศึกษาที่บรรจุ");
                return false;
            }

            if (frm.EntryDegreeCode.value == "") {
                alert("กรุณาเลือกวุฒิการศึกษาที่บรรจุ");
                return false;
            }

            if (frm.EntryMajorCode.value == "") {
                alert("กรุณาเลือกวิชาเอกที่บรรจุ");
                return false;
            }

            if (frm.EntryProgramCode.value == "") {
                alert("กรุณาเลือกสาขาวิชาที่บรรจุ");
                return false;
            }

            if (frm.PersonnelStartDate.value == "") {
                alert("กรุณากรอกวันที่บรรจุ");
                return false;
            }

            if (frm.PositionLevelCode.value == "") {
                alert("กรุณาเลือกระดับตำแหน่ง");
                return false;
            }

            if (frm.PositionStartDate.value == "") {
                alert("กรุณากรอกวันที่ดำรงตำแหน่ง");
                return false;
            }

            if (frm.ImageTeacher.value == "") {
                alert("กรุณาใส่รูปครูและบุคลากร");
                return false;
            }

            if (frm.TeacherPersonalIDTypeCode.value == "") {
                alert("กรุณาเลือกประเภทบัตร");
                return false;
            }

            var Year = /^[0-9]{13,13}$/;
            if (frm.TeacherPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตรประจำตัวประชาชน");
                return false;
            } else if (!frm.TeacherPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรประจำตัวประชาชนให้ครบ 13 หลัก");
                frm.TeacherPersonalID.value = "";
                return false;
            }

            if (frm.TeacherPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้า");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.TeacherNameThai.value == "") {
                alert("กรุณาเลือกชื่อ(ภาษาไทย)");
                return false;
            } else if (!frm.TeacherNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกชื่อเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.TeacherNameThai.value = "";
                return false;
            }

            if (frm.TeacherLastNameThai.value == "") {
                alert("กรุณาเลือกนามสกุล(ภาษาไทย)");
                return false;
            } else if (!frm.TeacherLastNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกนามสกุลเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.TeacherLastNameThai.value = "";
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