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
        <h1>เพิ่มข้อมูลระดับการศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add-Education</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-education/' . $_GET['PersonnelID']); ?>" method="POST">
                            <h5 class="card-title">ข้อมูลการศึกษา</h5>
                            <div class="row mb-3">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับการศึกษาที่จบ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationLevelCode">
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
                                    <label class="col-sm-2 col-form-label">กลุ่มวิชาเอก</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationMajorCode">
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
                                    <label for="inputText" class="col-sm-2 col-form-label">สาขาวิชา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationProgramCode">
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
                                    <label for="inputText" class="col-sm-2 col-form-label">วุฒิการศึกษา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="EducationDegreeCode">
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
                                <input type="hidden" name="PersonnelID" value="<?= $_GET['PersonnelID']; ?>">
                                <div class="text-center">
                                    <a href="personnel-education?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
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

                        </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->