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
        <h1>เพิ่มข้อมูลวิทยฐานะและตำแหน่งวิชาการ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add-Academic</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-academic/' . $_GET['PersonnelID']); ?>" method="POST">
                            <h5 class="card-title">ข้อมูลวิทยฐานะและตำแหน่งวิชาการ</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">หน่วยงานต้นสกัด</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="JurisdictionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                                        foreach ($result->result() as $JURISDICTION) {
                                        ?>
                                            <option value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">วิทยฐานะ และตำแหน่งวิชาการ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AcademicStandingCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_ACADEMIC_STANDING');
                                        foreach ($result->result() as $ACADEMIC_STANDING) {
                                        ?>
                                            <option value="<?= $ACADEMIC_STANDING->ACADEMIC_STANDING_CODE; ?>"><?= $ACADEMIC_STANDING->ACADEMIC_STANDING_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">วันที่ที่ได้วิทยฐานะหรือเข้าสู่รดับตำแหน่ง</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="AcademicDate">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">สาขาที่ยื่นขอวิทยฐานะ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AcademicProgramCode">
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
                            <input type="hidden" name="PersonnelID" value="<?= $_GET['PersonnelID']; ?>">
                            <div class="text-center">
                                <a href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
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