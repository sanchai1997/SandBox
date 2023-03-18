a<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>แก้ไขข้อมูลการช่วยราชการ</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <?php
                        $result = $this->db->query('SELECT *  FROM PERSONNEL_ASSISTANCE 
                        INNER JOIN CLS_ASSISTANCE_TYPE ON PERSONNEL_ASSISTANCE.AssistanceTypeCode = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE
                        WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $ASSISTANCE) {
                        ?>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-assistance/' . $ASSISTANCE->PersonnelID . '/' . $ASSISTANCE->JurisdictionCode . '/' . $ASSISTANCE->AssistanceTypeCode); ?>" method="POST" enctype="multipart/form-data">
                                <h5 class="card-title">ข้อมูลการช่วยราชการ</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หน่วยงานที่ไปช่วยราชการ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AssistanceOrganizationName" value="<?= $ASSISTANCE->AssistanceOrganizationName; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มการช่วยราชการ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="AssistanceStartDate" value="<?= $ASSISTANCE->AssistanceStartDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดการช่วยราชการ</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="AssistanceEndDate" value="<?= $ASSISTANCE->AssistanceEndDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">คำสั่งหรือหนังสือ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AssistanceCommand" value="<?= $ASSISTANCE->AssistanceCommand; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AssistanceReason" value="<?= $ASSISTANCE->AssistanceReason; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">เอกสารแนบ</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="AssistanceDocumentURL">
                                    </div>
                                </div>
                                <input type="hidden" name="PersonnelID" value="<?= $_GET['PersonnelID']; ?>">
                                <div class="text-center">
                                    <a href="personnel-assistance?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
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