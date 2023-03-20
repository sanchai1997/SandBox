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
            <h1>แก้ไขข้อมูลรางวัล
                -
                <?php
                $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $SCHOOL) {
                    echo $SCHOOL->SchoolNameThai;
                }
                ?>
            </h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- General Form Elements -->
                            <form action="<?php echo base_url('update-award/' . $AWARD->SchoolID . '/' . $AWARD->AwardYear); ?>" method="POST" id="Award">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีที่ได้รับรางวัล<font color="red"> *</font></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="AwardYear" value="<?= $AWARD->AwardYear; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ชื่อรางวัล<font color="red"> *</font></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AwardName" id="AwardName" value="<?= $AWARD->AwardName; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">แหล่งที่มาของรางวัล<font color="red"> *</font></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AwardSource" id="AwardSource" value="<?= $AWARD->AwardSource; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับของรางวัลที่ได้รับ<font color="red"> *</font></label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="AwardLevelCode" id="AwardLevelCode">
                                            <?php foreach ($this->db->query('SELECT *FROM CLS_AWARD_LEVEL')->result() as $AWARD_LEVEL) { ?>
                                                <option <?php if ($AWARD->AwardLevelCode == $AWARD_LEVEL->AWARD_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $AWARD_LEVEL->AWARD_LEVEL_CODE; ?>"><?= $AWARD_LEVEL->AWARD_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="school-award?SchoolID=<?= $_GET['SchoolID']; ?>" style="float: left;" class="btn btn-danger">ยกเลิก</a>
                                    <button type="button" class="btn btn-warning" style="float: right;" onclick="return check(Award)">แก้ไขข้อมูล</button>
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
                                                <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
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
        <script type="text/javascript">
            function check(frm) {

                var YearAward = /^[1-9]{4,4}$/;
                if (frm.AwardYear.value == "") {
                    alert("กรุณากรอกปีที่ได้รับรางวัล");
                    return false;
                } else if (!frm.AwardYear.value.match(YearAward)) {
                    alert("กรุณากรอกปีที่ได้รับรางวัลเป็น(ตัวเลข)และเป็น 4 หลัก");
                    frm.AwardYear.value = "";
                    return false;
                }

                var NameAward = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
                if (frm.AwardName.value == "") {
                    alert("กรุณากรอกชื่อรางวัล)");
                    frm.AwardName.value = "";
                    return false;
                } else if (!frm.AwardName.value.match(NameAward)) {
                    alert("กรุณากรอกชื่อรางวัลให้น้อยกว่า 255 อักษร");
                    frm.AwardName.value = "";
                    return false;
                }

                if (frm.AwardSource.value == "") {
                    alert("กรุณากรอกแหล่งที่มารางวัล)");
                    frm.AwardSource.value = "";
                    return false;
                } else if (!frm.AwardSource.value.match(NameAward)) {
                    alert("กรุณากรอกแหล่งที่มารางวัลให้น้อยกว่า 255 อักษร");
                    frm.AwardSource.value = "";
                    return false;
                }

                if (frm.AwardLevelCode.value == "") {
                    alert("กรุณาเลือกระดับรางวัลที่ได้รับ");
                    return false;
                }
                $('#Modal').modal('show');

            }
        </script>
    </main><!-- End #main -->
<?php } ?>