<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลการสอน
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
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-teacher-teaching/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['TeachingEducationYear'] . '/' . $_GET['TeachingSemester'] . '/' . $_GET['TeachingSubjectCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <?php
                            $result = $this->db->query('SELECT *
                                    FROM TEACHER_TEACHING 
                                    INNER JOIN CLS_EDUCATION_LEVEL ON TEACHER_TEACHING.TeachingEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                                    INNER JOIN CLS_SUBJECT_TYPE ON TEACHER_TEACHING.TeachingSubjectGroupCode = CLS_SUBJECT_TYPE.SUBJECT_TYPE_CODE
                                    INNER JOIN CLS_SUBJECT_GROUP ON TEACHER_TEACHING.TeachingSubjectCode = CLS_SUBJECT_GROUP.SUBJECT_GROUP_CODE
                                    WHERE TEACHER_TEACHING.DeleteStatus = 0 
                                    AND TEACHER_TEACHING.SchoolID = ' . $_GET['SchoolID'] . ' 
                                    AND TEACHER_TEACHING.TeacherID = "' . $_GET['TeacherID'] . '"
                                    AND TeachingEducationYear = ' . $_GET['TeachingEducationYear'] . '
                                    AND TeachingSemester = ' . $_GET['TeachingSemester'] . '
                                    AND TeachingSubjectCode = ' . $_GET['TeachingSubjectCode'] . '
                                    ');
                            foreach ($result->result() as $TEACHER_TEACHING) {
                            ?>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" minlength="4" maxlength="4" name="TeachingEducationYear" id="TeachingEducationYear" value="<?= $TEACHER_TEACHING->TeachingEducationYear ?>" disabled>
                                        <label for="TeachingEducationYear">ปีการศึกษา<font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" minlength="1" maxlength="1" name="TeachingSemester" id="TeachingSemester" value="<?= $TEACHER_TEACHING->TeachingSemester ?>" disabled>
                                        <label for="TeachingSemester">ภาคเรียน<font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="TeachingEducationLevelCode" id="TeachingEducationLevelCode" aria-label="TeachingEducationLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION_LEVEL) {
                                            ?>

                                                <option <?php if ($TEACHER_TEACHING->TeachingEducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="TeachingEducationLevelCode">ระดับการศึกษา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="TeachingSubjectGroupCode" id="TeachingSubjectGroupCode" aria-label="TeachingSubjectGroupCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBJECT_TYPE');
                                            foreach ($result->result() as $SUBJECT_TYPE) {
                                            ?>

                                                <option <?php if ($TEACHER_TEACHING->TeachingSubjectGroupCode == $SUBJECT_TYPE->SUBJECT_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SUBJECT_TYPE->SUBJECT_TYPE_CODE; ?>"><?= $SUBJECT_TYPE->SUBJECT_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="TeachingSubjectGroupCode">กลุ่มสาระวิชา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="TeachingSubjectCode" id="TeachingSubjectCode" aria-label="TeachingSubjectCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBJECT_GROUP');
                                            foreach ($result->result() as $SUBJECT_GROUP) {
                                            ?>

                                                <option <?php if ($TEACHER_TEACHING->TeachingSubjectCode == $SUBJECT_GROUP->SUBJECT_GROUP_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SUBJECT_GROUP->SUBJECT_GROUP_CODE; ?>"><?= $SUBJECT_GROUP->SUBJECT_GROUP_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="TeachingSubjectCode">วิชา</label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="d-flex justify-content-between">
                                <a href="teacher-teaching?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->