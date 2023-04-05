<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลกิจกรรมพัฒนาผู้เรียน: ใบแสดงผลการศึกษาชุดที่
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
                        <form class="row g-3" action="<?php echo base_url('add-transcript-activity/' . $_GET['SchoolID'] . '/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID'] . '/' . $_GET['TranscriptSeriesNumber'] . '/' . $_GET['TranscriptNumber'] . '/' . $_GET['TranscriptEducationYear'] . '/' . $_GET['TranscriptSemester']); ?>" method="POST" id="Transcript" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="4" name="ActivityEducationYear" id="ActivityEducationYear" value="<?= $_GET['TranscriptEducationYear']; ?>" disabled>
                                    <label for="ActivityEducationYear">ปีการศึกษา<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="1" name="ActivitySemester" id="ActivitySemester" value="<?= $_GET['TranscriptSemester'] ?>" disabled>
                                    <label for="ActivitySemester">ภาคเรียน<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="ActivityName" id="ActivityName">
                                    <label for="ActivityName">ชื่อกิจกรรม<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="ActivityHour" id="ActivityHour">
                                    <label for="ActivityHour">จำนวนชั่วโมงที่ทำกิจกรรม<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="ActivityPassingCode" id="ActivityPassingCode" aria-label="ActivityPassingCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_ACTIVITY_PASSING');
                                        foreach ($result->result() as $ACTIVITY_PASSING) {
                                        ?>
                                            <option value="<?= $ACTIVITY_PASSING->ACTIVITY_PASSING_CODE; ?>"><?= $ACTIVITY_PASSING->ACTIVITY_PASSING_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="ActivityPassingCode">ผลการประเมินกิจกรรม<font color="red"> *</font> </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="transcript-activity?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>&&TranscriptEducationYear=<?= $_GET['TranscriptEducationYear']; ?>&&TranscriptSemester=<?= $_GET['TranscriptSemester']; ?>" class="btn btn-danger">ยกเลิก</a>
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
            var Semester = /^[0-9]{1,1}$/;
            if (frm.ActivityEducationYear.value == "") {
                alert("กรุณากรอกข้อมูลปีการศึกษา");
                return false;
            } else if (!frm.ActivityEducationYear.value.match(Year)) {
                alert("กรุณากรอกข้อมูลปีการศึกษาให้ครบ 4 หลัก");
                frm.ActivityEducationYear.value = "";
                return false;
            }

            if (frm.ActivitySemester.value == "") {
                alert("กรุณากรอกข้อมูลภาคเรียน");
                return false;
            } else if (!frm.ActivitySemester.value.match(Semester)) {
                alert("กรุณากรอกข้อมูลภาคเรียนไม่เกิน 1 หลัก");
                frm.ActivitySemester.value = "";
                return false;
            }

            if (frm.ActivityName.value == "") {
                alert("กรุณากรอกข้อมูลชื่อกิจกรรม");
                return false;
            }

            if (frm.ActivityHour.value == "") {
                alert("กรุณากรอกจำนวนชั่วโมงกิจกรรม");
                return false;
            }

            if (frm.ActivityPassingCode.value == "") {
                alert("กรุณาเลือกผลประเมินกิจกรรม");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->