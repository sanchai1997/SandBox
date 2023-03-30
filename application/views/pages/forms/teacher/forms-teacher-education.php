<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลวุฒิการศึกษา
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
                        <form class="row g-3" action="<?php echo base_url('add-teacher-education/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <div class="col-md-6">
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
                                    <label for="EducationLevelCode">ระดับการศึกษา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EducationMajorCode" id="EducationMajorCode" aria-label="EducationMajorCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_MAJOR');
                                        foreach ($result->result() as $MAJOR) {
                                        ?>

                                            <option value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
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
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                        foreach ($result->result() as $PROGRAM) {
                                        ?>

                                            <option value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationProgramCode">สาขาวิชา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EducationDegreeCode" id="EducationDegreeCode" aria-label="EducationDegreeCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_DEGREE');
                                        foreach ($result->result() as $DEGREE) {
                                        ?>

                                            <option value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationDegreeCode">วุฒิการศึกษา</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="teacher-education?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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

            if (frm.EducationLevelCode.value == "") {
                alert("กรุณาเลือกระดับการศึกษา");
                return false;
            }

            if (frm.EducationMajorCode.value == "") {
                alert("กรุณาเลือกกลุ่มวิชาเอกที่สำเร็จ");
                return false;
            }

            if (frm.EducationDegreeCode.value == "") {
                alert("กรุณาเลือกวุฒิการศึกษาที่สำเร็จ");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->