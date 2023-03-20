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
                        <form class="row g-3" action="<?php echo base_url('update-school-teaching/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>


                            <div class="row mb-4">
                                <legend class="col-form-label col-sm-3 pt-0">การใช้สื่อการเรียนการสอน</legend>
                                <div class="col-sm-9">
                                    <?php
                                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_CONTENT ');
                                    foreach ($result->result() as $EDUCATION_CONTENT) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" value=" <?= $EDUCATION_CONTENT->EDUCATION_CONTENT_CODE; ?>" type="radio" id="gridCheck1" <?php if ($SCHOOL->EducationContentCode == $EDUCATION_CONTENT->EDUCATION_CONTENT_CODE) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> name="EducationContentCode">
                                            <label class="form-check-label" for="gridCheck1">
                                                <?= $EDUCATION_CONTENT->EDUCATION_CONTENT_NAME; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <legend class="col-form-label col-sm-3 pt-0">อยู่ในโครงการการศึกษาทางไกลผ่านดาวเทียม (DLTV)</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" value="0" type="radio" id="gridCheck2" <?php if ($SCHOOL->DLTVFlag == '0') {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="DLTVFlag">
                                        <label class="form-check-label" for="gridCheck1">ไม่อยู่ในโครงการ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="radio" id="gridCheck2" <?php if ($SCHOOL->DLTVFlag == '1') {
                                                                                                                    echo 'checked';
                                                                                                                } ?> name="DLTVFlag">
                                        <label class="form-check-label" for="gridCheck1">อยู่ในโครงการ</label>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
                        <div class="d-flex justify-content-between">
                            <a href="school" class="btn btn-danger">ยกเลิก</a>
                            <button type="button" class="btn btn-warning" onclick="return check(School)">แก้ไขข้อมูล</button>
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