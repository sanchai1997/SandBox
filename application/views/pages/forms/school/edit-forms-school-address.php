<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลที่ตั้ง
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
                        <form class="row g-3" action="<?php echo base_url('update-school-address/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolPhoneNumber" id="SchoolPhoneNumber" value="<?= $SCHOOL->SchoolPhoneNumber ?>">
                                    <label for="SchoolPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolSecondPhoneNumber" id="SchoolSecondPhoneNumber" value="<?= $SCHOOL->SchoolSecondPhoneNumber ?>">
                                    <label for="SchoolSecondPhoneNumber">หมายเลขโทรศัพท์ (สำรอง)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolFaxNumber" id="SchoolFaxNumber" value="<?= $SCHOOL->SchoolFaxNumber ?>">
                                    <label for="SchoolFaxNumber">หมายเลขโทรสาร</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolSecondFaxNumber" id="SchoolSecondFaxNumber" value="<?= $SCHOOL->SchoolSecondFaxNumber ?>">
                                    <label for="SchoolSecondFaxNumber">หมายเลขโทรสาร (สำรอง)</label>
                                </div>
                            </div>
                            <div class="col-md-16">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="SchoolEmail" value="<?= $SCHOOL->SchoolEmail ?>">
                                    <label for="SchoolEmail">อีเมล</label>
                                </div>
                            </div>
                            <div class="col-md-16">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolWebsiteURL" value="<?= $SCHOOL->SchoolWebsiteURL ?>">
                                    <label for="SchoolWebsiteURL">เว็บไซต์</label>
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