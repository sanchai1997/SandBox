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
                        <form class="row g-3" action="<?php echo base_url('update-teacher-main/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลตำแหน่งและปฎิบัติราชการ</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="EducationYear" id="EducationYear" value="<?= $TEACHER->EducationYear ?>">
                                    <label for="EducationYear">ปีการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="2" maxlength="2" name="Semester" id="Semester" value="<?= $TEACHER->Semester ?>">
                                    <label for="Semester">ภาคเรียน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelStatusCode" id="PersonnelStatusCode" aria-label="PersonnelStatusCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS ORDER BY PERSONNEL_STATUS_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_STATUS) {
                                        ?>
                                            <option <?php if ($TEACHER->PersonnelStatusCode == $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
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

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL ORDER BY EDUCATION_LEVEL_NAME ASC ');

                                        foreach ($result->result() as $EDUCATION_LEVEL) {
                                        ?>
                                            <option <?php if ($TEACHER->EntryEducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
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
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_DEGREE ORDER BY DEGREE_NAME ASC');

                                        foreach ($result->result() as $DEGREE) {
                                        ?>
                                            <option <?php if ($TEACHER->EntryDegreeCode == $DEGREE->DEGREE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
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
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_MAJOR ORDER BY MAJOR_NAME ASC');

                                        foreach ($result->result() as $MAJOR) {
                                        ?>
                                            <option <?php if ($TEACHER->EntryMajorCode == $MAJOR->MAJOR_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
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

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROGRAM ORDER BY PROGRAM_NAME ASC');

                                        foreach ($result->result() as $PROGRAM) {
                                        ?>
                                            <option <?php if ($TEACHER->EntryProgramCode == $PROGRAM->PROGRAM_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">สาขาวิชาที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelStartDate" id="PersonnelStartDate" value="<?= $TEACHER->PersonnelStartDate ?>">
                                    <label for="PersonnelStartDate">วันที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelRetireDate" id="PersonnelRetireDate" value="<?= $TEACHER->PersonnelRetireDate ?>">
                                    <label for="PersonnelRetireDate">วันที่เกษียณ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelTypeCode" id="PersonnelTypeCode" aria-label="PersonnelTypeCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE ORDER BY PERSONNEL_TYPE_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_TYPE) {
                                        ?>
                                            <option <?php if ($TEACHER->PersonnelTypeCode == $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ประเภทบุคลากร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionCode" id="PositionCode" aria-label="PositionCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION ORDER BY POSITION_NAME ASC');

                                        foreach ($result->result() as $POSITION) {
                                        ?>
                                            <option <?php if ($TEACHER->PositionCode == $POSITION->POSITION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionLevelCode" id="PositionLevelCode" aria-label="PositionLevelCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL ORDER BY POSITION_LEVEL_NAME ASC');

                                        foreach ($result->result() as $POSITION_LEVEL) {
                                        ?>
                                            <option <?php if ($TEACHER->PositionLevelCode == $POSITION_LEVEL->POSITION_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PositionStartDate" id="PositionStartDate" value="<?= $TEACHER->PositionStartDate ?>">
                                    <label for="PositionStartDate">วันที่ดำรงตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">รูปภาพครูและบุคลากร </label>
                                    <input type="file" class="form-control" name="ImageTeacher" id="ImageTeacher" placeholder="รูปภาพครู">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherPrefixCode" id="TeacherPrefixCode" aria-label="TeacherPrefixCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX ORDER BY PREFIX_NAME ASC');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherNameThai" id="TeacherNameThai" value="<?= $TEACHER->TeacherNameThai ?>">
                                    <label for="TeacherNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherLastNameThai" id="TeacherLastNameThai" value="<?= $TEACHER->TeacherLastNameThai ?>">
                                    <label for="TeacherLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherNameEnglish" id="TeacherNameEnglish" value="<?= $TEACHER->TeacherNameEnglish ?>">
                                    <label for="TeacherNameThai">ชื่อ (ภาษาอังกฤษ) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherLastNameEnglish" id="TeacherLastNameEnglish" value="<?= $TEACHER->TeacherLastNameEnglish ?>">
                                    <label for="TeacherLastNameThai">นามสกุล (ภาษาอังกฤษ) <font color="red"> *</font></label>
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

            var Year = /^[0-9]{4,4}$/;
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

            if (frm.PersonnelTypeCode.value == "") {
                alert("กรุณาเลือกประเภทบุคลากร");
                return false;
            }

            if (frm.PositionCode.value == "") {
                alert("กรุณาเลือกตำแหน่ง");
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

            if (frm.TeacherPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้า");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.TeacherNameThai.value == "") {
                alert("กรุณากรอกชื่อ(ภาษาไทย)");
                return false;
            } else if (!frm.TeacherNameThai.value.match(NameThai)) {
                alert("กรุณากรอกชื่อเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.TeacherNameThai.value = "";
                return false;
            }

            if (frm.TeacherLastNameThai.value == "") {
                alert("กรุณากรอกนามสกุล(ภาษาไทย)");
                return false;
            } else if (!frm.TeacherLastNameThai.value.match(NameThai)) {
                alert("กรุณากรอกนามสกุลเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.TeacherLastNameThai.value = "";
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->