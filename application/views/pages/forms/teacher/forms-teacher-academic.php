-<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลวิทยฐานะ
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
                        <form class="row g-3" action="<?php echo base_url('add-teacher-academic/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="AcademicStandingCode" id="AcademicStandingCode" aria-label="AcademicStandingCode">
                                        <option value="" selected>เลือก</option>
                                        <?php

                                        $result = $this->db->query('SELECT * FROM CLS_ACADEMIC_STANDING');
                                        foreach ($result->result() as $ACADEMIC_STANDING) {
                                        ?>
                                            <option value="<?= $ACADEMIC_STANDING->ACADEMIC_STANDING_CODE; ?>"><?= $ACADEMIC_STANDING->ACADEMIC_STANDING_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="AcademicStandingCode">วิทยฐานะและตำแหน่งวิชาการ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="AcademicDate" id="AcademicDate">
                                    <label for="AcademicDate">วันที่ได้รับ</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="AcademicProgramCode" id="AcademicProgramCode" aria-label="AcademicProgramCode">
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
                                    <label for="AcademicProgramCode">สาขาที่ยื่นขอ<font color="red"> *</font></label>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="teacher-certificate?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->