<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลรหัสนักเรียน
            <?php if (isset($_GET['StudentReferenceID'])) { ?>
                -
                <?php
                $result = $this->db->query('SELECT *  FROM STUDENT WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                foreach ($result->result() as $STUDENT) {
                    echo $STUDENT->StudentID;
                }
                ?>
            <?php } ?>
        </h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-student-journey/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลการเดินทางไปสถานศึกษา</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="JourneyTypeCode" id="JourneyTypeCode" aria-label="JourneyTypeCode">
                                        <?php if ($STUDENT->JourneyTypeCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE');
                                        foreach ($result->result() as $JOURNEY_TYPE) {
                                        ?>
                                            <option <?php if ($STUDENT->JourneyTypeCode == $JOURNEY_TYPE->JOURNEY_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $JOURNEY_TYPE->JOURNEY_TYPE_CODE; ?>"><?= $JOURNEY_TYPE->JOURNEY_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">ประเภทการเดินทาง</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.1" class="form-control" name="JourneyTime" id="JourneyTime" value="<?= $STUDENT->JourneyTime ?>">
                                    <label for="JourneyTime">ระยะเวลาในการเดินทาง (หน่วยชั่วโมง)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.1" class="form-control" name="RockJourneyDistance" id="RockJourneyDistance" value="<?= $STUDENT->RockJourneyDistance ?>">
                                    <label for="RockJourneyDistance">ระยะทางที่ผ่านถนนลูกรัง (หน่วยกิโลเมคร)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.1" class="form-control" name="RubberJourneyDistance" id="RubberJourneyDistance" value="<?= $STUDENT->RubberJourneyDistance ?>">
                                    <label for="RubberJourneyDistance">ระยะทางที่ผ่านถนนลาดยาง (หน่วยกิโลเมคร)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.1" class="form-control" name="WaterJourneyDistance" id="WaterJourneyDistance" value="<?= $STUDENT->WaterJourneyDistance ?>">
                                    <label for="WaterJourneyDistance">ระยะทางที่ผ่านทางน้ำ (หน่วยกิโลเมคร)</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลความพิการ</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="DisabilityCode" id="DisabilityCode" aria-label="DisabilityCode">
                                        <?php if ($STUDENT->DisabilityCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISABILITY');
                                        foreach ($result->result() as $DISABILITY) {
                                        ?>
                                            <option <?php if ($STUDENT->DisabilityCode == $DISABILITY->DISABILITY_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $DISABILITY->DISABILITY_CODE; ?>"><?= $DISABILITY->DISABILITY_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">ประเภทความพิการ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="DisabilityDetail" id="DisabilityDetail" value="<?= $STUDENT->DisabilityDetail ?>">
                                    <label for="DisabilityDetail">รายละเอียดความพิการ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="DisabilityLevelCode" id="DisabilityLevelCode" aria-label="DisabilityLevelCode">
                                        <?php if ($STUDENT->DisabilityLevelCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL');
                                        foreach ($result->result() as $DISABILITY_LEVEL) {
                                        ?>
                                            <option <?php if ($STUDENT->DisabilityLevelCode == $DISABILITY_LEVEL->DISABILITY_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $DISABILITY_LEVEL->DISABILITY_LEVEL_CODE; ?>"><?= $DISABILITY_LEVEL->DISABILITY_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">ระดับความพิการ</label>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="student?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Student)">บันทึกข้อมูล</button>
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