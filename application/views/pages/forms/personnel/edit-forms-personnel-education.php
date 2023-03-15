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
        <h1>แก้ไขข้อมูลระดับการศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Edit-Education</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <?php
                        $result = $this->db->query('SELECT *  FROM PERSONNEL_EDUCATION_DEGREE 
                        INNER JOIN CLS_EDUCATION_LEVEL ON PERSONNEL_EDUCATION_DEGREE.EducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                        INNER JOIN CLS_MAJOR ON PERSONNEL_EDUCATION_DEGREE.EducationMajorCode = CLS_MAJOR.MAJOR_CODE
                        INNER JOIN CLS_PROGRAM ON PERSONNEL_EDUCATION_DEGREE.EducationProgramCode = CLS_PROGRAM.PROGRAM_CODE
                        INNER JOIN CLS_DEGREE ON PERSONNEL_EDUCATION_DEGREE.EducationDegreeCode = CLS_DEGREE.DEGREE_CODE
                        WHERE DeleteStatus = 0
                        AND EducationLevelCode = ' . $_GET['EducationLevelCode'] . '
                        AND EducationMajorCode = ' . $_GET['EducationMajorCode'] . '
                        AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $EDUCATION) {
                        ?>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-education/' . $_GET['PersonnelID'] . '/' . $_GET['EducationLevelCode'] . '/' . $_GET['EducationMajorCode']); ?>" method="POST">
                                <h5 class="card-title">ข้อมูลการศึกษา</h5>
                                <div class="row mb-3">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">สาขาวิชา</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="EducationProgramCode">
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                                foreach ($result->result() as $PROGRAM) {
                                                ?>
                                                    <option <?php if ($EDUCATION->EducationProgramCode == $PROGRAM->PROGRAM_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
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
                                                <?php
                                                $result = $this->db->query('SELECT * FROM CLS_DEGREE');
                                                foreach ($result->result() as $DEGREE) {
                                                ?>
                                                    <option <?php if ($EDUCATION->EducationDegreeCode == $DEGREE->DEGREE_CODE) {
                                                                echo 'selected';
                                                            } ?> value="<?= $DEGREE->DEGREE_CODE; ?>"><?= $DEGREE->DEGREE_NAME; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="personnel-education?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                        <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                        <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT">บันทึกข้อมูล</button>
                                    </div>
                                    <div class="modal fade" id="EDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                                                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                                </div>
                                                <div class="modal-body">
                                                    <h6>
                                                        <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
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
<?php } ?>