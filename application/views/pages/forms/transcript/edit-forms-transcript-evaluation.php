<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลผลประเมินและผลตัดสิน : ใบแสดงผลการศึกษาชุดที่
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
                <?php
                $result = $this->db->query('SELECT * FROM TRANSCRIPT 
                WHERE TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
                AND TranscriptNumber = ' . $_GET['TranscriptNumber'] . '
                AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"
                ');
                foreach ($result->result() as $TRANSCRIPT) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-transcript-evaluation/' . $_GET['SchoolID'] . '/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID'] . '/' . $_GET['TranscriptSeriesNumber'] . '/' . $_GET['TranscriptNumber']); ?>" method="POST" id="Transcript" enctype="multipart/form-data">
                                <h6 style="padding-left: 15px;" class="card-title">ข้อมูลผลประเมิน</h6>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="FundamentalEvaluationCode" id="FundamentalEvaluationCode" aria-label="FundamentalEvaluationCode">
                                            <?php if ($TRANSCRIPT->FundamentalEvaluationCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_FUNDAMENTAL_SUBJECT_EVALUATION');
                                            foreach ($result->result() as $FUNDAMENTAL_SUBJECT_EVALUATION) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->FundamentalEvaluationCode == $FUNDAMENTAL_SUBJECT_EVALUATION->FUNDAMENTAL_SUBJECT_EVALUATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $FUNDAMENTAL_SUBJECT_EVALUATION->FUNDAMENTAL_SUBJECT_EVALUATION_CODE; ?>"><?= $FUNDAMENTAL_SUBJECT_EVALUATION->FUNDAMENTAL_SUBJECT_EVALUATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="FundamentalEvaluationCode">รายวิชาพื้นฐาน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="LiteracyEvaluationCode" id="LiteracyEvaluationCode" aria-label="LiteracyEvaluationCode">
                                            <?php if ($TRANSCRIPT->LiteracyEvaluationCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_LITERACY_EVALUATION');
                                            foreach ($result->result() as $LITERACY_EVALUATION) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->LiteracyEvaluationCode == $LITERACY_EVALUATION->LITERACY_EVALUATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $LITERACY_EVALUATION->LITERACY_EVALUATION_CODE; ?>"><?= $LITERACY_EVALUATION->LITERACY_EVALUATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="LiteracyEvaluationCode">การอ่าน วิเคราะห์ และเขียน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AttributeEvaluationCode" id="AttributeEvaluationCode" aria-label="AttributeEvaluationCode">
                                            <?php if ($TRANSCRIPT->AttributeEvaluationCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_ATTRIBUTE_EVALUATION');
                                            foreach ($result->result() as $ATTRIBUTE_EVALUATION) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->AttributeEvaluationCode == $ATTRIBUTE_EVALUATION->ATTRIBUTE_EVALUATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $ATTRIBUTE_EVALUATION->ATTRIBUTE_EVALUATION_CODE; ?>"><?= $ATTRIBUTE_EVALUATION->ATTRIBUTE_EVALUATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AttributeEvaluationCode">คุณลักษณะอันพึงประสงค์<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="ExtracurricularEvaluationCode" id="ExtracurricularEvaluationCode" aria-label="ExtracurricularEvaluationCode">
                                            <?php if ($TRANSCRIPT->ExtracurricularEvaluationCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_EXTRACURRICULAR_EVALUATION');
                                            foreach ($result->result() as $EXTRACURRICULAR_EVALUATION) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->ExtracurricularEvaluationCode == $EXTRACURRICULAR_EVALUATION->EXTRACURRICULAR_EVALUATION_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EXTRACURRICULAR_EVALUATION->EXTRACURRICULAR_EVALUATION_CODE; ?>"><?= $EXTRACURRICULAR_EVALUATION->EXTRACURRICULAR_EVALUATION_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="ExtracurricularEvaluationCode">กิจกรรมพัฒนาผู้เรียน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <h6 style="padding-left: 15px;" class="card-title">ข้อมูลผลการตัดสิน</h6>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="FundamentalSubjectPassingCode" id="FundamentalSubjectPassingCode" aria-label="FundamentalSubjectPassingCode">
                                            <?php if ($TRANSCRIPT->FundamentalSubjectPassingCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_FUNDAMENTAL_SUBJECT_PASSING');
                                            foreach ($result->result() as $FUNDAMENTAL_SUBJECT_PASSING) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->FundamentalSubjectPassingCode == $FUNDAMENTAL_SUBJECT_PASSING->FUNDAMENTAL_SUBJECT_PASSING_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $FUNDAMENTAL_SUBJECT_PASSING->FUNDAMENTAL_SUBJECT_PASSING_CODE; ?>"><?= $FUNDAMENTAL_SUBJECT_PASSING->FUNDAMENTAL_SUBJECT_PASSING_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="FundamentalSubjectPassingCode">รายวิชาพื้นฐาน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="LiteracyPassingCode" id="LiteracyPassingCode" aria-label="LiteracyPassingCode">
                                            <?php if ($TRANSCRIPT->LiteracyEvaluationCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_LITERACY_PASSING');
                                            foreach ($result->result() as $LITERACY_PASSING) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->LiteracyEvaluationCode == $LITERACY_PASSING->LITERACY_PASSING_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $LITERACY_PASSING->LITERACY_PASSING_CODE; ?>"><?= $LITERACY_PASSING->LITERACY_PASSING_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="LiteracyPassingCode">การอ่าน วิเคราะห์ และเขียน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AttributePassingCode" id="AttributePassingCode" aria-label="AttributePassingCode">
                                            <?php if ($TRANSCRIPT->AttributePassingCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_ATTRIBUTE_PASSING');
                                            foreach ($result->result() as $ATTRIBUTE_PASSING) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->AttributePassingCode == $ATTRIBUTE_PASSING->ATTRIBUTE_PASSING_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $ATTRIBUTE_PASSING->ATTRIBUTE_PASSING_CODE; ?>"><?= $ATTRIBUTE_PASSING->ATTRIBUTE_PASSING_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AttributePassingCode">คุณลักษณะอันพึงประสงค์<font color="red"> *</font> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="ExtracurricularPassingCode" id="ExtracurricularPassingCode" aria-label="ExtracurricularPassingCode">
                                            <?php if ($TRANSCRIPT->ExtracurricularPassingCode == NULL) { ?>
                                                <option value="" selected>เลือก</option>
                                            <?php }
                                            $result = $this->db->query('SELECT * FROM CLS_EXTRACURRICULAR_PASSING');
                                            foreach ($result->result() as $EXTRACURRICULAR_PASSING) {
                                            ?>
                                                <option <?php if ($TRANSCRIPT->ExtracurricularPassingCode == $EXTRACURRICULAR_PASSING->EXTRACURRICULAR_PASSING_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EXTRACURRICULAR_PASSING->EXTRACURRICULAR_PASSING_CODE; ?>"><?= $EXTRACURRICULAR_PASSING->EXTRACURRICULAR_PASSING_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="ExtracurricularPassingCode">กิจกรรมพัฒนาผู้เรียน<font color="red"> *</font> </label>
                                    </div>
                                </div>
                            <?php }
                            ?>

                            <div class="d-flex justify-content-between">
                                <a href="transcript?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>" class="btn btn-danger">ยกเลิก</a>
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

            if (frm.FundamentalEvaluationCode.value == "") {
                alert("กรุณาเลือกผลประเมินรายวิชาพื้นฐาน");
                return false;
            }

            if (frm.LiteracyEvaluationCode.value == "") {
                alert("กรุณาเลือกผลประเมินการอ่าน วิเคราะห์ และเขียน");
                return false;
            }

            if (frm.AttributeEvaluationCode.value == "") {
                alert("กรุณาเลือกผลประเมินคุณลักษณะอันพึงประสงค์");
                return false;
            }

            if (frm.ExtracurricularEvaluationCode.value == "") {
                alert("กรุณาเลือกผลประเมินกิจกรรมพัฒนาผู้เรียน");
                return false;
            }

            if (frm.FundamentalSubjectPassingCode.value == "") {
                alert("กรุณาเลือกผลการตัดสินรายวิชาพื้นฐาน");
                return false;
            }

            if (frm.LiteracyPassingCode.value == "") {
                alert("กรุณาเลือกผลการตัดสินการอ่าน วิเคราะห์ และเขียน");
                return false;
            }

            if (frm.AttributePassingCode.value == "") {
                alert("กรุณาเลือกผลการตัดสินคุณลักษณะอันพึงประสงค์");
                return false;
            }

            if (frm.ExtracurricularPassingCode.value == "") {
                alert("กรุณาเลือกผลการตัดสินกิจกรรมพัฒนาผู้เรียน");
                return false;
            }


            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->