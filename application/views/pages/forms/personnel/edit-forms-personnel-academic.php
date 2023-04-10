-<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">แก้ไขข้อมูลวิทยฐานะ
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
    <?php } ?>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-personnel-academic/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $_GET['AcademicStandingCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <?php
                            $result = $this->db->query('SELECT *
                                    FROM PERSONNEL_ACADEMIC 
                                    INNER JOIN CLS_ACADEMIC_STANDING ON PERSONNEL_ACADEMIC.AcademicStandingCode = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE
                                    INNER JOIN CLS_PROGRAM ON PERSONNEL_ACADEMIC.AcademicProgramCode = CLS_PROGRAM.PROGRAM_CODE
                                    WHERE PERSONNEL_ACADEMIC.DeleteStatus = 0 
                                    AND PERSONNEL_ACADEMIC.JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' 
                                    AND PERSONNEL_ACADEMIC.PersonnelID = "' . $_GET['PersonnelID'] . '" 
                                    AND PERSONNEL_ACADEMIC.AcademicStandingCode = ' . $_GET['AcademicStandingCode'] . '
                                    ');

                            foreach ($result->result() as $PERSONNEL_ACADEMIC) {
                            ?>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="AcademicStandingCode" id="AcademicStandingCode" aria-label="AcademicStandingCode" disabled>
                                            <?php

                                            $result = $this->db->query('SELECT * FROM CLS_ACADEMIC_STANDING');
                                            foreach ($result->result() as $ACADEMIC_STANDING) {
                                            ?>
                                                <option <?php if ($PERSONNEL_ACADEMIC->AcademicStandingCode == $ACADEMIC_STANDING->ACADEMIC_STANDING_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $ACADEMIC_STANDING->ACADEMIC_STANDING_CODE; ?>"><?= $ACADEMIC_STANDING->ACADEMIC_STANDING_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AcademicStandingCode">วิทยฐานะและตำแหน่งวิชาการ<font color="red"> *</font></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="AcademicDate" id="AcademicDate" value="<?= $PERSONNEL_ACADEMIC->AcademicDate ?>">
                                        <label for="AcademicDate">วันที่ได้รับ</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select" name="AcademicProgramCode" id="AcademicProgramCode" aria-label="AcademicProgramCode">
                                            <option value="" selected>เลือก</option>
                                            <?php

                                            $result = $this->db->query('SELECT * FROM CLS_PROGRAM');
                                            foreach ($result->result() as $PROGRAM) {
                                            ?>
                                                <option <?php if ($PERSONNEL_ACADEMIC->AcademicProgramCode == $PROGRAM->PROGRAM_CODE) {
                                                            echo 'selected';
                                                        } ?> value="<?= $PROGRAM->PROGRAM_CODE; ?>"><?= $PROGRAM->PROGRAM_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="AcademicProgramCode">สาขาที่ยื่นขอ<font color="red"> *</font></label>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="d-flex justify-content-between">
                                <a href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-warning" onclick="return check(Personnel)">แก้ไขข้อมูล</button>
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
                                            <button type="submit" class="btn btn-warning">ยืนยัน</button>
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