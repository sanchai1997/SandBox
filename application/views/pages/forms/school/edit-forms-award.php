<?php
$result = $this->db->query('SELECT *
    FROM SCHOOL_AWARD 
    INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
    INNER JOIN CLS_AWARD_LEVEL ON SCHOOL_AWARD.AwardLevelCode = CLS_AWARD_LEVEL.AWARD_LEVEL_CODE
    WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $_GET['SchoolID'] . ' AND SCHOOL_AWARD.AwardYear = ' . $_GET['AwardYear'] . ' AND SCHOOL_AWARD.AwardName  = "' . $_GET['AwardName'] . '" 
    ');
foreach ($result->result() as $AWARD) {
?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>แก้ไขข้อมูลรางวัลสถานศึกษา</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลผู้รางวัลที่โรงเรียนได้รับ</h5>

                            <!-- General Form Elements -->
                            <form action="<?php echo base_url('update-award/' . $_GET['SchoolID'] . '/' . $_GET['AwardYear'] . '/' . $_GET['AwardName']); ?>" method="POST">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีที่ได้รับรางวัล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AwardYear" required value="<?= $AWARD->AwardYear; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อรางวัล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AwardName" required value="<?= $AWARD->AwardName; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">แหล่งที่มาของรางวัล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AwardSource" required value="<?= $AWARD->AwardSource; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับของรางวัลที่ได้รับ</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="AwardLevelCode" required>
                                            <?php foreach ($this->db->query('SELECT *FROM CLS_AWARD_LEVEL')->result() as $AWARD_LEVEL) { ?>
                                                <option <?php if ($AWARD->AwardLevelCode == $AWARD_LEVEL->AWARD_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $AWARD_LEVEL->AWARD_LEVEL_CODE; ?>"><?= $AWARD_LEVEL->AWARD_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="school-award-P2?SchoolID=<?= $AWARD->SchoolID; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT<?= $AWARD->SchoolID; ?><?= $AWARD->AwardYear; ?>">บันทึกข้อมูล</button>
                                </div>
                                <div class="modal fade" id="EDIT<?= $AWARD->SchoolID; ?><?= $AWARD->AwardYear; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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