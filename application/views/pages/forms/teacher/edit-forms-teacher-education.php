<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลวุฒิการศึกษา
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
                        <form class="row g-3" action="<?php echo base_url('update-teacher-education/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['EducationLevelCode'] . '/' . $_GET['EducationMajorCode'] . '/' . $_GET['EducationDegreeCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <?php
                            $result = $this->db->query('SELECT * 
                                    FROM TEACHER_EDUCATION_DEGREE 
                                    WHERE DeleteStatus = 0 AND SchoolID = ' . $_GET['SchoolID'] . ' AND TeacherID = "' . $_GET['TeacherID'] . '" 
                                    AND EducationLevelCode = ' . $_GET['EducationLevelCode'] . '
                                    AND EducationMajorCode = ' . $_GET['EducationMajorCode'] . '
                                    AND EducationDegreeCode = ' . $_GET['EducationDegreeCode'] . '
                                    ');
                            foreach ($result->result() as $TEACHER_EDUCATION_DEGREE) {
                            ?>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="EducationLevelCode" id="EducationLevelCode" aria-label="EducationLevelCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION_LEVEL) {
                                            ?>

                                                <option <?php if ($TEACHER_EDUCATION_DEGREE->EducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="EducationLevelCode">ระดับการศึกษา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="EducationMajorCode" id="EducationMajorCode" aria-label="EducationMajorCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_MAJOR');
                                            foreach ($result->result() as $MAJOR) {
                                            ?>

                                                <option <?php if ($TEACHER_EDUCATION_DEGREE->EducationMajorCode == $MAJOR->MAJOR_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="EducationMajorCode">กลุ่มวิชาเอก</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="EducationProgramCode" id="EducationProgramCode" aria-label="EducationProgramCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                            foreach ($result->result() as $PROGRAM) {
                                            ?>

                                                <option <?php if ($TEACHER_EDUCATION_DEGREE->EducationProgramCode == $PROGRAM->PROGRAM_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="EducationProgramCode">สาขาวิชา</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="EducationDegreeCode" id="EducationDegreeCode" aria-label="EducationDegreeCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DEGREE');
                                            foreach ($result->result() as $DEGREE) {
                                            ?>

                                                <option <?php if ($TEACHER_EDUCATION_DEGREE->EducationDegreeCode == $DEGREE->DEGREE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="EducationDegreeCode">วุฒิการศึกษา</label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="d-flex justify-content-between">
                                <a href="teacher-education?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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