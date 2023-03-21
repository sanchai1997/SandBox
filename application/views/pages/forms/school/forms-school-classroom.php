<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลห้องเรียน -
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
                        <form action="<?php echo base_url('add-classroom/' . $_GET['SchoolID']); ?>" method="POST" id="ClassRoom">

                            <!-- ID สถานศึกษา -->
                            <input type="hidden" value="<?= $_GET['SchoolID']; ?>" name="SchoolID">
                            <!-- END -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับชั้นปี <font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="ClassroomGradeLevelCode" id="ClassroomGradeLevelCode">
                                        <option value="" selected>เลือก</option>
                                        <?php foreach ($this->db->get("CLS_GRADE_LEVEL")->result() as $GRADE_LEVEL) { ?>
                                            <option value="<?= $GRADE_LEVEL->GRADE_LEVEL_CODE; ?>"><?= $GRADE_LEVEL->GRADE_LEVEL_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องเรียน <font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="ClassroomAmount" id="ClassroomAmount">
                                </div>
                            </div>


                            <div class="text-center">
                                <a href="school-classroom?SchoolID=<?= $_GET['SchoolID']; ?>" style="float: left;" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" style="float: right;" onclick="return check(ClassRoom)">บันทึกข้อมูล</button>
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

            if (frm.ClassroomGradeLevelCode.value == "") {
                alert("กรุณาเลือกระดับชั้นปี");
                return false;
            }

            var Amount = /^[1-9]{1,4}$/;
            if (frm.ClassroomAmount.value == "") {
                alert("กรุณากรอกจำนวนห้องเรียน");
                return false;
            } else if (!frm.ClassroomAmount.value.match(Amount)) {
                alert("กรุณากรอกจำนวนห้องเป็น(ตัวเลข) และไม่เกิน 4 หลัก");
                frm.ClassroomAmount.value = "";
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->