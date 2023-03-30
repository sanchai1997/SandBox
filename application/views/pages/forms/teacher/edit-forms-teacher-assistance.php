<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลการช่วยราชการ
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
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM TEACHER_ASSISTANCE 
                                    INNER JOIN CLS_ASSISTANCE_TYPE ON TEACHER_ASSISTANCE.AssistanceTypeCode = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE
                                    WHERE TEACHER_ASSISTANCE.DeleteStatus = 0
                                    AND TEACHER_ASSISTANCE.SchoolID = ' . $_GET['SchoolID'] . ' 
                                    AND TEACHER_ASSISTANCE.TeacherID = "' . $_GET['TeacherID'] . '"
                                    AND TEACHER_ASSISTANCE.AssistanceTypeCode = ' . $_GET['AssistanceTypeCode'] . '
                                    AND TEACHER_ASSISTANCE.AssistanceStartDate = "' . $_GET['AssistanceStartDate'] . '"
                                    ');

                        foreach ($result->result() as $TEACHER_ASSISTANCE) {
                            if ($TEACHER_ASSISTANCE->AssistanceDocumentURL == NULL) {
                                $AddOrUpdate = 0;
                            } else {
                                $AddOrUpdate = $TEACHER_ASSISTANCE->AssistanceDocumentURL;
                            }
                        ?>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-teacher-assistance/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['AssistanceTypeCode'] . '/' . $_GET['AssistanceStartDate'] . '/' . $AddOrUpdate); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                                <h6 style="padding-left: 15px;" class="card-title"></h6>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AssistanceTypeCode" id="AssistanceTypeCode" aria-label="AssistanceTypeCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_ASSISTANCE_TYPE');
                                            foreach ($result->result() as $ASSISTANCE_TYPE) {
                                            ?>
                                                <option <?php if ($TEACHER_ASSISTANCE->AssistanceTypeCode == $ASSISTANCE_TYPE->ASSISTANCE_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $ASSISTANCE_TYPE->ASSISTANCE_TYPE_CODE; ?>"><?= $ASSISTANCE_TYPE->ASSISTANCE_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AssistanceTypeCode">ประเภท <font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceOrganizationName" id="AssistanceOrganizationName" value="<?= $TEACHER_ASSISTANCE->AssistanceOrganizationName ?>">
                                        <label for="AssistanceOrganizationName">หน่วยงาน</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AssistanceStartDate" id="AssistanceStartDate" value="<?= $TEACHER_ASSISTANCE->AssistanceStartDate ?>" disabled>
                                        <label for="AssistanceStartDate">วันที่เริ่ม <font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AssistanceEndDate" id="AssistanceEndDate" value="<?= $TEACHER_ASSISTANCE->AssistanceEndDate ?>">
                                        <label for="AssistanceEndDate">วันที่สิ้นสุด</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceCommand" id="AssistanceCommand" value="<?= $TEACHER_ASSISTANCE->AssistanceCommand ?>">
                                        <label for="AssistanceCommand">รายละเอียดคำสั่ง</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceReason" id="AssistanceReason" value="<?= $TEACHER_ASSISTANCE->AssistanceReason ?>">
                                        <label for="AssistanceReason">หมายเหตุ</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบไฟล์</label>
                                        <input type="file" class="form-control" name="AssistanceDocumentURL" id="AssistanceDocumentURL" placeholder="เอกสารแนบไฟล์">
                                    </div>
                                </div>

                            <?php }
                            ?>

                            <div class="d-flex justify-content-between">
                                <a href="teacher-assistance?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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