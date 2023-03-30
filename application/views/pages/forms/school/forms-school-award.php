<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลรางวัล -
            <?php
            $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
            foreach ($result->result() as $SCHOOL) {
                echo $SCHOOL->SchoolNameThai;
            }
            ?>
        </h1>
    </div><!-- End Page Title -->
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- General Form Elements -->
                        <form action="<?php echo base_url('add-award/' . $_GET['SchoolID']); ?>" method="POST" id="Award">
                            <!-- ID สถานศึกษา -->
                            <input type="hidden" value="<?= $_GET['SchoolID']; ?>" name="SchoolID">
                            <!-- END -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ปีที่ได้รับรางวัล <font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AwardYear" id="AwardYear">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ชื่อรางวัล <font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AwardName" id="AwardName">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">แหล่งที่มาของรางวัล </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AwardSource" id="AwardSource" value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับของรางวัลที่ได้รับ </label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AwardLevelCode" id="AwardLevelCode">
                                        <option value="" selected>เลือก</option>
                                        <?php foreach ($this->db->get("CLS_AWARD_LEVEL")->result() as $AWARD_LEVEL) { ?>
                                            <option value="<?= $AWARD_LEVEL->AWARD_LEVEL_CODE; ?>"><?= $AWARD_LEVEL->AWARD_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="school-award?SchoolID=<?= $_GET['SchoolID']; ?>" style="float: left;" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" style="float: right;" onclick="return check(Award)">บันทึกข้อมูล</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันบันทึกข้อมูล</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>
                                                <center>คุณต้องการบันทึกข้อมูลใช่หรือไหม ?</center>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
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

            $('#Modal').modal('show');

        }
    </script>
</main><!-- End #main -->