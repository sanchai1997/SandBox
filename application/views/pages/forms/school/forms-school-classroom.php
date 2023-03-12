<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลสถานศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="main">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
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
                                        <?php foreach ($this->db->get("CLS_CLASS_GRADE_LEVEL")->result() as $GRADE_LEVEL) { ?>
                                            <option value="<?= $GRADE_LEVEL->CLS_CLASS_GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->CLS_CLASS_GRADE_LEVEL_NAME; ?></option>
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
                                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>


        </div>
    </section>

</main><!-- End #main -->