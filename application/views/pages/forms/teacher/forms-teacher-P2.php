<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>ข้อมูลครูและบุคลากรทางการศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลปีการศึกษา</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-teacher'); ?>" method="POST">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="EducationYear">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="Semester">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" id="floatingSelect" aria-label="State" name="SchoolID">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM SCHOOL');
                                                foreach ($result->result() as $SCHOOL) {
                                                ?>
                                                    <option value="<?= $SCHOOL->SchoolID; ?>"><?= $SCHOOL->SchoolNameThai; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="card-title">ข้อมูลคู่สมรส</h5>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">หมายเลขประจำตัวประชาชน</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpousePersonalID">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">สถานภาพการสมรส</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="MarriageStatusCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS');
                                                foreach ($result->result() as $MARRIAGE_STATUS) {
                                                ?>
                                                    <option value="<?= $MARRIAGE_STATUS->MARRIAGE_STATUS_CODE; ?>"><?= $MARRIAGE_STATUS->MARRIAGE_STATUS_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">คำนำหน้าชื่อคู่สมรส</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="SpousePrefixCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                                foreach ($result->result() as $PREFIX) {
                                                ?>
                                                    <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อคู่สมรส</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseNameThai">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางคู่สมรส</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseMiddleNameThai">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">นามสกุลคู่สมรส</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseLastNameThai">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อคู่สมรส(ภาษาอังกฤษ)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseNameEnglish">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางคู่สมรส(ภาษาอังกฤษ)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseMiddleNameEnglish">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">นามสกุลคู่สมรส(ภาษาอังกฤษ)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="SpouseLastNameEnglish">
                                        </div>
                                    </div>
                                    <h5 class="card-title">ตำแหน่งและการปฏิบัติราชการ</h5>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">สถานะปฏิบัติราชการ</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="PersonnelStatusCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS');
                                                foreach ($result->result() as $PERSONNEL_STATUS) {
                                                ?>
                                                    <option value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">ระดับการศึกษาที่บรรจุ</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="EntryEducationLevelCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                                foreach ($result->result() as $EDUCATION_LEVEL) {
                                                ?>
                                                    <option value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">วุฒิการศึกษาที่บรรจุ</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="EntryDegreeCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_DEGREE');
                                                foreach ($result->result() as $DEGREE) {
                                                ?>
                                                    <option value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">กลุ่มวิชาเอกที่บรรจุ</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="EntryMajorCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_MAJOR');
                                                foreach ($result->result() as $MAJOR) {
                                                ?>
                                                    <option value="<?= $MAJOR->MAJOR_CODE; ?>"><?= $MAJOR->MAJOR_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">สาขาวิชาที่บรรจุ</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="EntryProgramCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                                foreach ($result->result() as $PROGRAM) {
                                                ?>
                                                    <option value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">วันที่บรรจุ</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="PersonnelStartDate">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">วันเกษียณ</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="PersonnelRetireDate">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">ประเภทบุคลากร</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="PersonnelTypeCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE');
                                                foreach ($result->result() as $PERSONNEL_TYPE) {
                                                ?>
                                                    <option value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">ชื่อตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="PositionCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_POSITION');
                                                foreach ($result->result() as $POSITION) {
                                                ?>
                                                    <option value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">ระดับตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="PositionLevelCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL');
                                                foreach ($result->result() as $POSITION_LEVEL) {
                                                ?>
                                                    <option value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">วันที่ดำรงตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="PositionStartDate">
                                        </div>
                                    </div>
                                    <h5 class="card-title">ข้อมูลว่าจ้าง</h5>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">เลขที่สัญญา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ContractNumber">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">จำนวนครั้งที่ทำสัญญา</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="ContractTimes">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">ลักษณะการจ้าง</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="ContractTypeCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE');
                                                foreach ($result->result() as $CONTRACT_TYPE) {
                                                ?>
                                                    <option value="<?= $CONTRACT_TYPE->CONTRACT_TYPE_CODE; ?>"><?= $CONTRACT_TYPE->CONTRACT_TYPE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">จ้างมาแล้วกี่ปี</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="ContractYear">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มต้นสัญญา</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="ContractStartDate">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดสัญญา</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="ContractEndDate">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">ประเภทเงินงบประมาณ</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" name="SalaryTypeCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE');
                                                foreach ($result->result() as $SALARY_TYPE) {
                                                ?>
                                                    <option value="<?= $SALARY_TYPE->SALARY_TYPE_CODE; ?>"><?= $SALARY_TYPE->SALARY_TYPE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">เงินเดือนปัจจุบัน</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="CurrentSalary">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">เงินวิทยฐานะ</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="AcademicSalary">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">เงินค่าตอบแทน</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="CompensationSalary">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">เงินประจำตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="EmolumentsSalary">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">การมีวุฒิทางครู</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="TeacherQualificationCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_TEACHER_QUALIFICATION');
                                                foreach ($result->result() as $TEACHER_QUALIFICATION) {
                                                ?>
                                                    <option value="<?= $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_CODE; ?>"><?= $TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="TeacherTalentCode">
                                                <option selected>เลือก</option>
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_TALENT');
                                                foreach ($result->result() as $TALENT) {
                                                ?>
                                                    <option value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="teacher" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                        <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                        <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADD">บันทึกข้อมูล</button>
                                    </div>
                                    <div class="modal fade" id="ADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันเพิ่มข้อมูล</h5>
                                                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                                </div>
                                                <div class="modal-body">
                                                    <h6>
                                                        <center>คุณต้องการเพิ่มข้อมูลใช่หรือไหม ?</center>
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="TeacherID" value="<?= $_POST['TeacherPersonalIDTypeCode']; ?><?= $_POST['TeacherPersonalID']; ?>">
                                    <input type="hidden" name="TeacherPrefixCode" value="<?= $_POST['TeacherPrefixCode']; ?>">
                                    <input type="hidden" name="TeacherNameThai" value="<?= $_POST['TeacherNameThai']; ?>">
                                    <input type="hidden" name="TeacherMiddleNameThai" value="<?= $_POST['TeacherMiddleNameThai']; ?>">
                                    <input type="hidden" name="TeacherLastNameThai" value="<?= $_POST['TeacherLastNameThai']; ?>">
                                    <input type="hidden" name="TeacherNameEnglish" value="<?= $_POST['TeacherNameEnglish']; ?>">
                                    <input type="hidden" name="TeacherMiddleNameEnglish" value="<?= $_POST['TeacherMiddleNameEnglish']; ?>">
                                    <input type="hidden" name="TeacherLastNameEnglish" value="<?= $_POST['TeacherLastNameEnglish']; ?>">
                                    <input type="hidden" name="TeacherPersonalIDTypeCode" value="<?= $_POST['TeacherPersonalIDTypeCode']; ?>">
                                    <input type="hidden" name="TeacherPersonalID" value="<?= $_POST['TeacherPersonalID']; ?>">
                                    <input type="hidden" name="TeacherPassportNumber" value="<?= $_POST['TeacherPassportNumber']; ?>">
                                    <input type="hidden" name="TeacherGenderCode" value="<?= $_POST['TeacherGenderCode']; ?>">
                                    <input type="hidden" name="TeacherBirthDate" value="<?= $_POST['TeacherBirthDate']; ?>">
                                    <input type="hidden" name="TeacherNationalityCode" value="<?= $_POST['TeacherNationalityCode']; ?>">
                                    <input type="hidden" name="TeacherRaceCode" value="<?= $_POST['TeacherRaceCode']; ?>">
                                    <input type="hidden" name="TeacherReligionCode" value="<?= $_POST['TeacherReligionCode']; ?>">
                                    <input type="hidden" name="TeacherBloodCode" value="<?= $_POST['TeacherBloodCode']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressHouseNumber" value="<?= $_POST['TeacherOfficialAddressHouseNumber']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressMoo" value="<?= $_POST['TeacherOfficialAddressMoo']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressStreet" value="<?= $_POST['TeacherOfficialAddressStreet']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressSoi" value="<?= $_POST['TeacherOfficialAddressSoi']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressTrok" value="<?= $_POST['TeacherOfficialAddressTrok']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressProvinceCode" value="<?= $_POST['TeacherOfficialAddressProvinceCode']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressDistrictCode" value="<?= $_POST['TeacherOfficialAddressDistrictCode']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressSubdistrictCode" value="<?= $_POST['TeacherOfficialAddressSubdistrictCode']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressPostcode" value="<?= $_POST['TeacherOfficialAddressPostcode']; ?>">
                                    <input type="hidden" name="TeacherOfficialAddressPhoneNumber" value="<?= $_POST['TeacherOfficialAddressPhoneNumber']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressHouseNumber" value="<?= $_POST['TeacherCurrentAddressHouseNumber']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressMoo" value="<?= $_POST['TeacherCurrentAddressMoo']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressStreet" value="<?= $_POST['TeacherCurrentAddressStreet']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressSoi" value="<?= $_POST['TeacherCurrentAddressSoi']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressTrok" value="<?= $_POST['TeacherCurrentAddressTrok']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressProvinceCode" value="<?= $_POST['TeacherCurrentAddressProvinceCode']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressDistrictCode" value="<?= $_POST['TeacherCurrentAddressDistrictCode']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressSubdistrictCode" value="<?= $_POST['TeacherCurrentAddressSubdistrictCode']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressPostcode" value="<?= $_POST['TeacherCurrentAddressPostcode']; ?>">
                                    <input type="hidden" name="TeacherCurrentAddressPhoneNumber" value="<?= $_POST['TeacherCurrentAddressPhoneNumber']; ?>">
                                    <input type="hidden" name="TeacherEmail" value="<?= $_POST['TeacherEmail']; ?>">
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->