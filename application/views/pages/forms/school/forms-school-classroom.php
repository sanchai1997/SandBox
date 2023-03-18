<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลสถานศึกษา</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลจำนวนห้องเรียนของสถานศึกษา</h5>

                        <!-- General Form Elements -->
                        <form action="<?php echo base_url('add-classroom'); ?>" method="POST">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="SchoolID" aria-label="Default select example" required>
                                        <option selected>เลือก</option>
                                        <?php foreach ($this->db->get("SCHOOL")->result() as $school) { ?>
                                            <option value="<?= $school->SchoolID; ?>"><?= $school->SchoolNameThai; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับชั้นปี</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="ClassroomGradeLevelCode" required>
                                        <option selected>เลือก</option>
                                        <?php foreach ($this->db->get("CLS_GRADE_LEVEL")->result() as $GRADE_LEVEL) { ?>
                                            <option value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องเรียน</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="ClassroomAmount" required>
                                </div>
                            </div>


                            <div class="text-center">
                                <a href="school-classroom" style="float: left;" class="btn btn-light">ยกเลิก</a>
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
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>


        </div>
    </section>

</main><!-- End #main -->