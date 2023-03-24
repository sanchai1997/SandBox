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
                        <form class="row g-3" action="<?php echo base_url('update-student-family/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลผู้ปกครอง</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianPersonalID" minlength="13" maxlength="13" id="GuardianPersonalID" value="<?= $STUDENT->GuardianPersonalID ?>">
                                    <label for="GuardianPersonalID">หมายเลขบัตรประจำตัวประชาชน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianPassportNumber" id="GuardianPassportNumber" value="<?= $STUDENT->GuardianPassportNumber ?>">
                                    <label for="GuardianPassportNumber">เลขที่หนังสือเดินทาง</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="GuardianPrefixCode" id="GuardianPrefixCode" aria-label="GuardianPrefixCode">
                                        <?php if ($STUDENT->GuardianPrefixCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($STUDENT->GuardianPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianPrefixCode">คำนำหน้า</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianNameThai" id="GuardianNameThai" value="<?= $STUDENT->GuardianNameThai ?>">
                                    <label for="GuardianNameThai">ชื่อ (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianLastNameThai" id="GuardianLastNameThai" value="<?= $STUDENT->GuardianLastNameThai ?>">
                                    <label for="GuardianLastNameThai">นามสกุล (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianNameEnglish" id="GuardianNameEnglish" value="<?= $STUDENT->GuardianNameEnglish ?>">
                                    <label for="GuardianNameEnglish">ชื่อ (ภาษาอังกฤษ)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianLastNameEnglish" id="GuardianLastNameEnglish" value="<?= $STUDENT->GuardianLastNameEnglish ?>">
                                    <label for="GuardianLastNameEnglish">นามสกุล (ภาษาอังกฤษ)</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="GuardianRelationCode" id="GuardianRelationCode" aria-label="GuardianRelationCode">
                                        <?php
                                        if ($STUDENT->GuardianRelationCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION ORDER BY FAMILY_RELATION_NAME ASC');
                                        foreach ($result->result() as $FAMILY_RELATION) {
                                        ?>
                                            <option <?php if ($STUDENT->GuardianRelationCode == $FAMILY_RELATION->FAMILY_RELATION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $FAMILY_RELATION->FAMILY_RELATION_CODE; ?>"><?= $FAMILY_RELATION->FAMILY_RELATION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianRelationCode">ความสัมพันธ์กับนักเรียน </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GuardianPhoneNumber" id="GuardianPhoneNumber" minlength="10" maxlength="10" value="<?= $STUDENT->GuardianPhoneNumber ?>">
                                    <label for="GuardianPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="GuardianOccupationCode" id="GuardianOccupationCode" aria-label="GuardianOccupationCode">
                                        <?php
                                        if ($STUDENT->GuardianOccupationCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION ORDER BY OCCUPATION_NAME ASC');
                                        foreach ($result->result() as $OCCUPATION) {
                                        ?>
                                            <option <?php if ($STUDENT->GuardianOccupationCode == $OCCUPATION->OCCUPATION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="GuardianOccupationCode">กลุ่มอาชีพ </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="GuardianSalary" id="GuardianSalary" value="<?= $STUDENT->GuardianSalary ?>">
                                    <label for="GuardianSalary">รายได้ต่อเดือน</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลครอบครัว</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="ParentMarriageStatusCode" id="ParentMarriageStatusCode" aria-label="ParentMarriageStatusCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                                        foreach ($result->result() as $MARRIAGE_STATUS) {
                                        ?>
                                            <option <?php if ($STUDENT->ParentMarriageStatusCode == $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE; ?>"><?= $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="ParentMarriageStatusCode">สถานะการสมรสระหว่างบิดามารดา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentBirthOrder" id="StudentBirthOrder" value="<?= $STUDENT->StudentBirthOrder ?>">
                                    <label for="StudentBirthOrder">นักเรียนเป็นบุตรลำดับที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentElderBrotherAmount" id="StudentElderBrotherAmount" value="<?= $STUDENT->StudentElderBrotherAmount ?>">
                                    <label for="StudentElderBrotherAmount">จำนวนพี่ชาย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentElderSisterAmount" id="StudentElderSisterAmount" value="<?= $STUDENT->StudentElderSisterAmount ?>">
                                    <label for="StudentElderSisterAmount">จำนวนพี่สาว</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentYoungerBrotherAmount" id="StudentYoungerBrotherAmount" value="<?= $STUDENT->StudentYoungerBrotherAmount ?>">
                                    <label for="StudentYoungerBrotherAmount">จำนวนน้องชาย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentYoungerSisterAmount" id="StudentYoungerSisterAmount" value="<?= $STUDENT->StudentYoungerSisterAmount ?>">
                                    <label for="StudentYoungerSisterAmount">จำนวนน้องผู้หญิง</label>
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