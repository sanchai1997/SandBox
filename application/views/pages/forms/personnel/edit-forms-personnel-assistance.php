<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลการช่วยราชการ
            <?php
            $result = $this->db->query('SELECT *  FROM PERSONNEL 
                        INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                        WHERE PersonnelID = "' . $_GET['PersonnelID'] . '" 
                        AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . '
                        AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . '
                        AND PositionCode = ' . $_GET['PositionCode'] . '
                        ');
            foreach ($result->result() as $PERSONNEL) {

            ?>
        </h1>
        <a class="btn btn-light text-dark"><b><?= ' : ' . $PERSONNEL->PREFIX_NAME . $PERSONNEL->PersonnelNameThai . ' ' . $PERSONNEL->PersonnelLastNameThai ?></b></a>
    <?php }
    ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM PERSONNEL_ASSISTANCE 
                                    INNER JOIN CLS_ASSISTANCE_TYPE ON PERSONNEL_ASSISTANCE.AssistanceTypeCode = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE
                                    WHERE DeleteStatus = 0
                                    AND PersonnelID = "' . $_GET['PersonnelID'] . '"
                                    AND JurisdictionCode = "' . $_GET['JurisdictionCode'] . '"
                                    AND AssistanceTypeCode = ' . $_GET['AssistanceTypeCode'] . '
                                    AND AssistanceStartDate = "' . $_GET['AssistanceStartDate'] . '"
                                    ');

                        foreach ($result->result() as $PERSONNEL_ASSISTANCE) {
                        ?>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-personnel-assistance/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['AssistanceTypeCode'] . '/' . $_GET['AssistanceStartDate']  . '/' . $PERSONNEL_ASSISTANCE->AssistanceDocumentURL); ?>" method="POST" id="Personnel" enctype="multipart/form-data">

                                <h6 style="padding-left: 15px;" class="card-title"></h6>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AssistanceTypeCode" id="AssistanceTypeCode" aria-label="AssistanceTypeCode" disabled>
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_ASSISTANCE_TYPE');
                                            foreach ($result->result() as $ASSISTANCE_TYPE) {
                                            ?>
                                                <option <?php if ($PERSONNEL_ASSISTANCE->AssistanceTypeCode == $ASSISTANCE_TYPE->ASSISTANCE_TYPE_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $ASSISTANCE_TYPE->ASSISTANCE_TYPE_CODE; ?>"><?= $ASSISTANCE_TYPE->ASSISTANCE_TYPE_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AssistanceTypeCode">ประเภท <font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceOrganizationName" id="AssistanceOrganizationName" value="<?= $PERSONNEL_ASSISTANCE->AssistanceOrganizationName ?>">
                                        <label for="AssistanceOrganizationName">หน่วยงาน</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AssistanceStartDate" id="AssistanceStartDate" value="<?= $PERSONNEL_ASSISTANCE->AssistanceStartDate ?>" disabled>
                                        <label for="AssistanceStartDate">วันที่เริ่ม <font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AssistanceEndDate" id="AssistanceEndDate" value="<?= $PERSONNEL_ASSISTANCE->AssistanceEndDate ?>">
                                        <label for="AssistanceEndDate">วันที่สิ้นสุด</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceCommand" id="AssistanceCommand" value="<?= $PERSONNEL_ASSISTANCE->AssistanceCommand ?>">
                                        <label for="AssistanceCommand">รายละเอียดคำสั่ง</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="AssistanceReason" id="AssistanceReason" value="<?= $PERSONNEL_ASSISTANCE->AssistanceReason ?>">
                                        <label for="AssistanceReason">หมายเหตุ</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบไฟล์</label>
                                        <input type="file" class="form-control" name="AssistanceDocumentURL" id="AssistanceDocumentURL" placeholder="เอกสารแนบไฟล์">
                                    </div>
                                </div>

                            <?php }
                            ?>

                            <div class="d-flex justify-content-between">
                                <a href="personnel-assistance?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Personnel)">บันทึกข้อมูล</button>
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