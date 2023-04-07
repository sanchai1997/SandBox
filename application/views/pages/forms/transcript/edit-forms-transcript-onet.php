<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลผลทดสอบ ONET: ใบแสดงผลการศึกษาชุดที่
            <?php if (isset($_GET['TranscriptSeriesNumber'])) {
                echo $_GET['TranscriptSeriesNumber'] . ' - ' . $_GET['TranscriptNumber'];
            }
            $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
            foreach ($result->result() as $GRADE_LEVEL) {
                $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
            }
            ?>
        </h1>
        <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?> &nbsp;รหัสนักเรียน: <?= $_GET['StudentID'] ?></b></a>
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
                        <form class="row g-3" action="<?php echo base_url('update-transcript-onet/' . $_GET['SchoolID'] . '/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID'] . '/' . $_GET['TranscriptSeriesNumber'] . '/' . $_GET['TranscriptNumber'] . '/' . $_GET['ONETEducationYear'] . '/' . $_GET['ONETGradeLevelCode'] . '/' . $_GET['ONETSubjectGroupCode']); ?>" method="POST" id="Transcript" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <?php
                            $result = $this->db->query('SELECT * FROM TRANSCRIPT_ONET
                            WHERE DeleteStatus = 0
                            AND TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
                            AND TranscriptNumber = ' . $_GET['TranscriptNumber'] . '
                            AND ONETEducationYear = ' . $_GET['ONETEducationYear'] . '
                            AND ONETGradeLevelCode = ' . $_GET['ONETGradeLevelCode'] . '
                            AND ONETSubjectGroupCode = ' . $_GET['ONETSubjectGroupCode'] . '
                            ');
                            $CountI = 0;
                            foreach ($result->result() as $TRANSCRIPT_ONET) {
                                $CountI++;
                            ?>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" maxlength="4" name="ONETEducationYear" id="ONETEducationYear" value="<?= $TRANSCRIPT_ONET->ONETEducationYear ?>" disabled>
                                        <label for="ONETEducationYear">ปีการศึกษา<font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="ONETGradeLevelCode" id="ONETGradeLevelCode" aria-label="ONETGradeLevelCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL');
                                            foreach ($result->result() as $GRADE_LEVEL) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT_ONET->ONETGradeLevelCode ==  $GRADE_LEVEL->GRADE_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="ONETGradeLevelCode">ชั้นปีการทดสอบ<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="ONETSubjectGroupCode" id="ONETSubjectGroupCode" aria-label="ONETSubjectGroupCode" disabled>
                                            <option value="" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_SUBJECT_GROUP');
                                            foreach ($result->result() as $SUBJECT_GROUP) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT_ONET->ONETSubjectGroupCode ==  $SUBJECT_GROUP->SUBJECT_GROUP_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $SUBJECT_GROUP->SUBJECT_GROUP_CODE; ?>"><?= $SUBJECT_GROUP->SUBJECT_GROUP_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="ONETSubjectGroupCode">กลุ่มสาระวิชา<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="ONETSubjectGradeCode" id="ONETSubjectGradeCode" aria-label="ONETSubjectGradeCode">
                                            <option value="" selected>เลือก</option>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_GRADE');
                                            foreach ($result->result() as $GRADE) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT_ONET->ONETSubjectGradeCode ==  $GRADE->GRADE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $GRADE->GRADE_CODE; ?>"><?= $GRADE->GRADE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="ONETSubjectGradeCode">ผลการทดสอบ<font color="red"> *</font> </label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="d-flex justify-content-between">
                                <a href="transcript-onet?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>&&TranscriptEducationYear=<?= $_GET['TranscriptEducationYear']; ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Transcript)">บันทึกข้อมูล</button>
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
            if (frm.ONETEducationYear.value == "") {
                alert("กรุณากรอกข้อมูลปีการศึกษา");
                return false;
            } else if (!frm.ONETEducationYear.value.match(Year)) {
                alert("กรุณากรอกข้อมูลปีการศึกษาให้ครบ 4 หลัก");
                frm.ONETEducationYear.value = "";
                return false;
            }

            if (frm.ONETGradeLevelCode.value == "") {
                alert("กรุณาเลือกชั้นปีที่ทดสอบ");
                return false;
            }

            if (frm.ONETSubjectGroupCode.value == "") {
                alert("กรุณาเลือกกลุ่มสาระวิชาที่ทดสอบ");
                return false;
            }

            if (frm.ONETSubjectGradeCode.value == "") {
                alert("กรุณาเลือกผลการทดสอบ");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->