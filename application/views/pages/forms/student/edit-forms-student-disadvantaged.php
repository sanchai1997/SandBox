<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลรหัสนักเรียน
            <?php if (isset($_GET['StudentReferenceID'])) { ?>
                <?php
                $result = $this->db->query('SELECT *  FROM STUDENT 
                INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" AND SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $STUDENT) {


                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        $SchoolName = $SCHOOL->SchoolNameThai;
                    }
                ?>

        </h1>
        <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $STUDENT->PREFIX_NAME . $STUDENT->StudentNameThai . ' ' . $STUDENT->StudentLastNameThai ?></b></a>
<?php }
            } ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-student-disadvantaged/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลความด้อยโอกาศ</h6>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="DisadvantagedCode" id="DisadvantagedCode" aria-label="DisadvantagedCode">
                                        <?php if ($STUDENT->DisadvantagedCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED');
                                        foreach ($result->result() as $DISAVANTAGED) {
                                        ?>
                                            <option <?php if ($STUDENT->DisadvantagedCode == $DISAVANTAGED->DISAVANTAGED_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $DISAVANTAGED->DISAVANTAGED_CODE; ?>"><?= $DISAVANTAGED->DISAVANTAGED_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">ความด้อยโอกาศ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend class="col-form-label col-sm-3 pt-0">ขาดแคลนแบบเรียน</legend>
                                <div class="col-sm-9">
                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck1" <?php if ($STUDENT->LackingBookFlag != '' && $STUDENT->LackingBookFlag == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingBookFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ขาดแคลน
                                        </label>
                                    </div>

                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck1" <?php if ($STUDENT->LackingBookFlag != '' && $STUDENT->LackingBookFlag == 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingBookFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ไม่ขาดแคลน
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend class="col-form-label col-sm-3 pt-0">ขาดแคลนอาหารกลางวัน</legend>
                                <div class="col-sm-9">
                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck2" <?php if ($STUDENT->LackingFoodFlag != '' && $STUDENT->LackingFoodFlag == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingFoodFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ขาดแคลน
                                        </label>
                                    </div>

                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck2" <?php if ($STUDENT->LackingFoodFlag != '' && $STUDENT->LackingFoodFlag == 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingFoodFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ไม่ขาดแคลน
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend class="col-form-label col-sm-3 pt-0">ขาดแคลนเครื่องเขียน</legend>
                                <div class="col-sm-9">
                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck3" <?php if ($STUDENT->LackingStationeryFlag != '' && $STUDENT->LackingStationeryFlag == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingStationeryFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ขาดแคลน
                                        </label>
                                    </div>

                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck3" <?php if ($STUDENT->LackingStationeryFlag != '' && $STUDENT->LackingStationeryFlag == 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingStationeryFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ไม่ขาดแคลน
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend class="col-form-label col-sm-3 pt-0">ขาดแคลนเครื่องแบบ</legend>
                                <div class="col-sm-9">
                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck4" <?php if ($STUDENT->LackingUniformFlag != '' && $STUDENT->LackingUniformFlag == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingUniformFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ขาดแคลน
                                        </label>
                                    </div>

                                    <div style="padding-left: 50px;" class="form-check">
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck4" <?php if ($STUDENT->LackingUniformFlag != '' && $STUDENT->LackingUniformFlag == 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="LackingUniformFlag">
                                        <label class="form-check-label" for="gridCheck1">
                                            ไม่ขาดแคลน
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลเกณฑ์ความยากจน</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="1" class="form-control" name="FamilyMonthlyIncome" id="FamilyMonthlyIncome" value="<?= $STUDENT->FamilyMonthlyIncome ?>">
                                    <label for="FamilyMonthlyIncome">รายได้ครอบครัวต่อเดือน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="FamilyStatusCode" id="FamilyStatusCode" aria-label="FamilyStatusCode">
                                        <?php if ($STUDENT->FamilyStatusCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS');
                                        foreach ($result->result() as $FAMILY_STATUS) {
                                        ?>
                                            <option <?php if ($STUDENT->FamilyStatusCode == $FAMILY_STATUS->FAMILY_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $FAMILY_STATUS->FAMILY_STATUS_CODE; ?>"><?= $FAMILY_STATUS->FAMILY_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">สถานภาพครอบครัว</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentLiveWithCode" id="StudentLiveWithCode" aria-label="StudentLiveWithCode">
                                        <?php if ($STUDENT->StudentLiveWithCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH');
                                        foreach ($result->result() as $STUDENT_LIVE_WITH) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentLiveWithCode == $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_CODE; ?>"><?= $STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">นักเรียนอาศัยอยู่กับ</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <legend class="col-form-label col-sm-4 pt-0">ได้รับสวัสดิการแห่งรัฐ</legend>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div style="padding-left: 50px;" class="form-check">
                                                <input class="form-check-input" value="1" type="radio" id="gridCheck5" <?php if ($STUDENT->StateWelfareFlag != '' && $STUDENT->StateWelfareFlag == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> name="StateWelfareFlag">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ได้รับ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div style="padding-left: 30px;" class="form-check">
                                                <input class="form-check-input" value="0" type="radio" id="gridCheck5" <?php if ($STUDENT->StateWelfareFlag != '' && $STUDENT->StateWelfareFlag == 0) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> name="StateWelfareFlag">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ไม่ได้รับ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="d-flex justify-content-between">
                                <a href="student?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-warning" onclick="return check(Student)">แก้ไขข้อมูล</button>
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