<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลสาธารณูปโภค
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
                        <form class="row g-3" action="<?php echo base_url('update-school-utilities/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>


                            <div class="row mb-4">
                                <legend class="col-form-label col-sm-3 pt-0">ประเภทแหล่งกำเนิดไฟฟ้า</legend>
                                <div class="col-sm-9">
                                    <?php
                                    $result = $this->db->query('SELECT * FROM CLS_ELECTRIC_TYPE ');
                                    foreach ($result->result() as $ELECTRIC) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $ELECTRIC->ELECTRIC_TYPE_CODE; ?>" type="radio" id="gridCheck1" <?php if ($SCHOOL->ElectricTypeCode == $ELECTRIC->ELECTRIC_TYPE_CODE) {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?> name="ElectricTypeCode">
                                            <label class="form-check-label" for="gridCheck1">
                                                <?= $ELECTRIC->ELECTRIC_TYPE_NAME; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <legend class="col-form-label col-sm-3 pt-0">การใช้งานอินเทอร์เน็ต</legend>
                                <div class="col-sm-9">
                                    <?php
                                    $result = $this->db->query('SELECT * FROM CLS_INTERNET_TYPE ');
                                    foreach ($result->result() as $INTERNET) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $INTERNET->INTERNET_TYPE_CODE; ?>" type="radio" id="gridCheck1" <?php if ($SCHOOL->InternetTypeCode == $INTERNET->INTERNET_TYPE_CODE) {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?> name="InternetTypeCode">
                                            <label class="form-check-label" for="gridCheck1">
                                                <?= $INTERNET->INTERNET_TYPE_NAME; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <legend class="col-form-label col-sm-3 pt-0">แหล่งน้ำที่โรงเรียนใช้</legend>
                                <div class="col-sm-9">
                                    <?php
                                    $result = $this->db->query('SELECT * FROM CLS_WATER_TYPE ');
                                    foreach ($result->result() as $WATER) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $WATER->WATER_TYPE_CODE; ?>" type="radio" id="gridCheck1" <?php if ($SCHOOL->WaterTypeCode == $WATER->WATER_TYPE_CODE) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?> name="WaterTypeCode">
                                            <label class="form-check-label" for="gridCheck1">
                                                <?= $WATER->WATER_TYPE_NAME; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
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