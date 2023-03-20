<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>แก้ไขข้อมูลผู้สำเร็จการศึกษา</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลการสำเร็จการศึกษา</h5>
                        <?php
                        $result = $this->db->query('SELECT * FROM GRADUATED
                        WHERE DeleteStatus = 0 
                        ');
                        foreach ($result->result() as $GRADUATED) {
                        ?>
                            <!-- start Form GRADUATED -->
                            <form class="row g-3" action="<?php echo base_url('update-graduated/' . $GRADUATED->StudentReferenceID); ?>" method="POST">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="Semester" value="<?= $GRADUATED->Semester ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่จบ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="GraduatedEducationYear" value="<?= $GRADUATED->GraduatedEducationYear ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่สำเร็จการศึกษา</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="GraduatedDate" value="<?= $GRADUATED->GraduatedDate ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="GraduatedEducationLevelCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                            foreach ($result->result() as $EDUCATION_LEVEL) {
                                            ?>
                                                <option <?php if ($GRADUATED->GraduatedEducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ลำดับการสำเร็จการศึกษา</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="GraduatedOrderNumber" value="<?= $GRADUATED->GraduatedOrderNumber ?>">
                                        </div>
                                    </div>
                                    <h5 class="card-title">ข้อมูลผลการศึกษา</h5>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">เลขที่ใบแสดงผลการศึกษา</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="GraduatedTranscriptNumber" value="<?= $GRADUATED->GraduatedTranscriptNumber ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชุดที่ใบแสดงผลการศึกษา</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="GraduatedTranscriptSeriesNumber" value="<?= $GRADUATED->GraduatedTranscriptSeriesNumber ?>">
                                        </div>
                                    </div>

                                    <h5 class="card-title">ข้อมูลใบประกาศนียบัตร</h5>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">หมายเลขใบประกาศนียบัตร</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="CertificationNumber" value="<?= $GRADUATED->CertificationNumber ?>">
                                        </div>
                                    </div>
                                    <h5 class="card-title">ข้อมูลผู้อนุมัติจบ</h5>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อผู้อนุมัติจบ (ภาษาไทย)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="EndorserNameThai" value="<?= $GRADUATED->EndorserNameThai ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">ชื่อกลางผู้อนุมัติจบ (ภาษาไทย)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="EndorserMiddleNameThai" value="<?= $GRADUATED->EndorserMiddleNameThai ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">นามสกุลผู้อนุมัติจบ (ภาษาไทย)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="EndorserLastNameThai" value="<?= $GRADUATED->EndorserLastNameThai ?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                        <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT">บันทึกข้อมูล</button>
                                    </div>
                                    <div class="modal fade" id="EDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                                                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
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

                            </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->
<?php } ?>