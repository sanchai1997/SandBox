<?php
$result = $this->db->query('SELECT *  FROM SCHOOL_CLASSROOM 
    INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID
    INNER JOIN CLS_GRADE_LEVEL ON SCHOOL_CLASSROOM.ClassroomGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
    WHERE SCHOOL_CLASSROOM.SchoolID = ' . $_GET['SchoolID'] . ' AND SCHOOL_CLASSROOM.ClassroomGradeLevelCode = ' . $_GET['ClassroomGradeLevelCode'] . '');
foreach ($result->result() as $CLASSROOM) {
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>แก้ไขข้อมูลห้องเรียน - <?= $CLASSROOM->SchoolNameThai; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="main">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active">Edit ClassRoom</li>
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
                            <form action="<?php echo base_url('update-classroom/' . $_GET['SchoolID'] . '/' . $_GET['ClassroomGradeLevelCode']); ?>" method="POST">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับชั้นปี</label>
                                    <div class="col-sm-10">
                                        <label for="inputText" class="col-sm-8 col-form-label"><?= $CLASSROOM->GRADE_LEVEL_NAME; ?></label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องเรียน</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="ClassroomAmount" value="<?= $CLASSROOM->ClassroomAmount; ?>" required>
                                        <input type="hidden" class="form-control" name="ClassroomGradeLevelCode" value="<?= $CLASSROOM->ClassroomGradeLevelCode; ?>" required>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <a href="school-classroom-P2?SchoolID=<?= $CLASSROOM->SchoolID; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT<?= $CLASSROOM->SchoolID; ?><?= $CLASSROOM->ClassroomGradeLevelCode; ?>">ยืนยัน</button>
                                </div>

                                <div class="modal fade" id="EDIT<?= $CLASSROOM->SchoolID; ?><?= $CLASSROOM->ClassroomGradeLevelCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->
<?php } ?>