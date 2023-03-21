<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลทางสถิติ
            -
            <?php
            $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
            foreach ($result->result() as $SCHOOL) {
                echo $SCHOOL->SchoolNameThai;
            ?>
        </h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-school-statistical/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์เชื่อมต่อเครือข่าย</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerOnlineNumber" class="form-control" value="<?= $SCHOOL->ComputerOnlineNumber ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์ Stand alone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerStandaloneNumber" class="form-control" value="<?= $SCHOOL->ComputerStandaloneNumber ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerTeachNumber" class="form-control" value="<?= $SCHOOL->ComputerTeachNumber ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ComputerManageNumber" class="form-control" value="<?= $SCHOOL->ComputerManageNumber ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนชาย</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ToiletMaleStudentNumber" class="form-control" value="<?= $SCHOOL->ToiletMaleStudentNumber ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">จำนวนห้องน้ำสำหรับนักเรียนหญิง</label>
                                <div class="col-sm-9">
                                    <input type="number" name="ToiletFemaleStudentNumber" class="form-control" value="<?= $SCHOOL->ToiletFemaleStudentNumber ?>">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="school?SchoolID=<?= $SCHOOL->SchoolID ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-warning" onclick="return check(School)">แก้ไขข้อมูล</button>
                            </div>
                        <?php } ?>

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


                        </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

                    </div>
                </div>

            </div>

        </div>
    </section>

    <script type="text/javascript">
        function check(frm) {
            $('#Modal').modal('show');
        }
    </script>
</main><!-- End #main -->