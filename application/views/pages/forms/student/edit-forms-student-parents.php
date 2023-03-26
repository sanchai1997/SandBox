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
                        <form class="row g-3" action="<?php echo base_url('update-student-parents/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบิดา</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherPersonalID" minlength="13" maxlength="13" id="FatherPersonalID" value="<?= $STUDENT->FatherPersonalID ?>">
                                    <label for="FatherPersonalID">หมายเลขบัตรประจำตัวประชาชน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherPassportNumber" id="FatherPassportNumber" value="<?= $STUDENT->FatherPassportNumber ?>">
                                    <label for="FatherPassportNumber">เลขที่หนังสือเดินทาง</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="FatherPrefixCode" id="FatherPrefixCode" aria-label="FatherPrefixCode">
                                        <?php if ($STUDENT->FatherPrefixCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($STUDENT->FatherPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="FatherPrefixCode">คำนำหน้า</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherNameThai" id="FatherNameThai" value="<?= $STUDENT->FatherNameThai ?>">
                                    <label for="FatherNameThai">ชื่อ (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherLastNameThai" id="FatherLastNameThai" value="<?= $STUDENT->FatherLastNameThai ?>">
                                    <label for="FatherLastNameThai">นามสกุล (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherNameEnglish" id="FatherNameEnglish" value="<?= $STUDENT->FatherNameEnglish ?>">
                                    <label for="FatherNameEnglish">ชื่อ (ภาษาอังกฤษ)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherLastNameEnglish" id="FatherLastNameEnglish" value="<?= $STUDENT->FatherLastNameEnglish ?>">
                                    <label for="FatherLastNameEnglish">นามสกุล (ภาษาอังกฤษ)</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="FatherPersonStatusCode" id="FatherPersonStatusCode" aria-label="FatherPersonStatusCode">
                                        <?php
                                        if ($STUDENT->FatherPersonStatusCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS ORDER BY PERSON_STATUS_NAME ASC');
                                        foreach ($result->result() as $PERSON_STATUS) {
                                        ?>
                                            <option <?php if ($STUDENT->FatherPersonStatusCode == $PERSON_STATUS->PERSON_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSON_STATUS->PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->PERSON_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">สถานภาพ </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="FatherPhoneNumber" id="FatherPhoneNumber" minlength="10" maxlength="10" value="<?= $STUDENT->FatherPhoneNumber ?>">
                                    <label for="FatherPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="FatherOccupationCode" id="FatherOccupationCode" aria-label="FatherOccupationCode">
                                        <?php
                                        if ($STUDENT->FatherOccupationCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION ORDER BY OCCUPATION_NAME ASC');
                                        foreach ($result->result() as $OCCUPATION) {
                                        ?>
                                            <option <?php if ($STUDENT->FatherOccupationCode == $OCCUPATION->OCCUPATION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">กลุ่มอาชีพ </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="FatherSalary" id="FatherSalary" value="<?= $STUDENT->FatherSalary ?>">
                                    <label for="FatherSalary">รายได้ต่อเดือน</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลมารดา</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherPersonalID" id="MotherPersonalID" minlength="13" maxlength="13" value="<?= $STUDENT->MotherPersonalID ?>">
                                    <label for="MotherPersonalID">หมายเลขบัตรประจำตัวประชาชน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="MotherPassportNumber" id="MotherPassportNumber" value="<?= $STUDENT->MotherPassportNumber ?>">
                                    <label for="MotherPassportNumber">เลขที่หนังสือเดินทาง</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="MotherPrefixCode" id="MotherPrefixCode" aria-label="MotherPrefixCode">
                                        <?php if ($STUDENT->MotherPrefixCode == '') { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($STUDENT->MotherPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="MotherPrefixCode">คำนำหน้า</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherNameThai" id="MotherNameThai" value="<?= $STUDENT->MotherNameThai ?>">
                                    <label for="MotherNameThai">ชื่อ (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherLastNameThai" id="MotherLastNameThai" value="<?= $STUDENT->MotherLastNameThai ?>">
                                    <label for="MotherLastNameThai">นามสกุล (ภาษาไทย)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherNameEnglish" id="MotherNameEnglish" value="<?= $STUDENT->MotherNameEnglish ?>">
                                    <label for="MotherNameEnglish">ชื่อ (ภาษาอังกฤษ)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherLastNameEnglish" id="MotherLastNameEnglish" value="<?= $STUDENT->MotherLastNameEnglish ?>">
                                    <label for="MotherLastNameEnglish">นามสกุล (ภาษาอังกฤษ)</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="MotherPersonStatusCode" id="MotherPersonStatusCode" aria-label="MotherPersonStatusCode">
                                        <?php
                                        if ($STUDENT->MotherPersonStatusCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS ORDER BY PERSON_STATUS_NAME ASC');
                                        foreach ($result->result() as $PERSON_STATUS) {
                                        ?>
                                            <option <?php if ($STUDENT->MotherPersonStatusCode == $PERSON_STATUS->PERSON_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSON_STATUS->PERSON_STATUS_CODE; ?>"><?= $PERSON_STATUS->PERSON_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">สถานภาพ </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="MotherPhoneNumber" id="MotherPhoneNumber" minlength="10" maxlength="10" value="<?= $STUDENT->MotherPhoneNumber ?>">
                                    <label for="MotherPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="MotherOccupationCode" id="MotherOccupationCode" aria-label="MotherOccupationCode">
                                        <?php
                                        if ($STUDENT->MotherOccupationCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION ORDER BY OCCUPATION_NAME ASC');
                                        foreach ($result->result() as $OCCUPATION) {
                                        ?>
                                            <option <?php if ($STUDENT->MotherOccupationCode == $OCCUPATION->OCCUPATION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $OCCUPATION->OCCUPATION_CODE; ?>"><?= $OCCUPATION->OCCUPATION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">กลุ่มอาชีพ </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="MotherSalary" id="MotherSalary" value="<?= $STUDENT->MotherSalary ?>">
                                    <label for="MotherSalary">รายได้ต่อเดือน</label>
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