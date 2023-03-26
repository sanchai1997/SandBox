<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลตำแหน่งเพิ่มเติม
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
                        <form class="row g-3" action="<?php echo base_url('update-teacher-position/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['AdditionalDepartmentCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <?php
                            $result = $this->db->query('SELECT *
                                            FROM TEACHER_ADDITIONAL_POSITION 
                                            INNER JOIN CLS_DEPARTMENT ON TEACHER_ADDITIONAL_POSITION.AdditionalDepartmentCode = CLS_DEPARTMENT.DEPARTMENT_CODE
                                            WHERE TEACHER_ADDITIONAL_POSITION.DeleteStatus = 0
                                            AND TEACHER_ADDITIONAL_POSITION.SchoolID = ' . $_GET['SchoolID'] . ' 
                                            AND TEACHER_ADDITIONAL_POSITION.TeacherID = "' . $_GET['TeacherID'] . '"
                                            AND TEACHER_ADDITIONAL_POSITION.AdditionalDepartmentCode = ' . $_GET['AdditionalDepartmentCode'] . '
                                            ');

                            foreach ($result->result() as $TEACHER_ADDITIONAL_POSITION) {
                            ?>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" maxlength="255" name="AdditionalPosition" id="AdditionalPosition" value="<?= $TEACHER_ADDITIONAL_POSITION->AdditionalPosition ?>">
                                        <label for="AdditionalPosition">ตำแหน่ง</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AdditionalDepartmentCode" id="AdditionalDepartmentCode" aria-label="AdditionalDepartmentCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DEPARTMENT');
                                            foreach ($result->result() as $DEPARTMENT) {
                                            ?>
                                                <option <?php if ($TEACHER_ADDITIONAL_POSITION->AdditionalDepartmentCode == $DEPARTMENT->DEPARTMENT_CODE) {
                                                            echo 'selected';
                                                        } ?>value="<?= $DEPARTMENT->DEPARTMENT_CODE; ?>"><?= $DEPARTMENT->DEPARTMENT_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AdditionalDepartmentCode">กลุ่ม/หมวดตำแหน่ง<font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AdditionalDutyDate" id="AdditionalDutyDate" value="<?= $TEACHER_ADDITIONAL_POSITION->AdditionalDutyDate ?>">
                                        <label for="AdditionalDutyDate">วันที่ปฎิบัติหน้าที่</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AdditionalCommand" id="AdditionalCommand" value="<?= $TEACHER_ADDITIONAL_POSITION->AdditionalCommand ?>">
                                        <label for="AdditionalCommand">รายละเอียดคำสั่ง</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AdditionalComment" id="AdditionalComment" value="<?= $TEACHER_ADDITIONAL_POSITION->AdditionalComment ?>">
                                        <label for="AdditionalComment">หมายเหตุ</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบไฟล์</label>
                                        <input type="file" class="form-control" name="AdditionalDocumentURL" id="AdditionalDocumentURL" placeholder="เอกสารแนบไฟล์">
                                    </div>
                                </div>

                    <?php }
                        }
                    } ?>

                    <div class="d-flex justify-content-between">
                        <a href="teacher-position?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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