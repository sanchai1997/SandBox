<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลครูและบุคลากรทางการศึกษา
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
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-personnel-talent/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลความสามารถพิเศษ</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelTalentCode" id="PersonnelTalentCode" aria-label="PersonnelTalentCode">
                                        <?php if ($PERSONNEL->PersonnelTalentCode == NULL) { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_TALENT');
                                        foreach ($result->result() as $TALENT) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelTalentCode == $TALENT->TALENT_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelTalentCode">ความสามารถพิเศษ </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="EntryYear" id="EntryYear" value="<?= $PERSONNEL->EntryYear; ?>" required>
                                    <label for="EntryYear">ปีที่เก็บข้อมูล <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryTimes" id="EntryTimes" aria-label="EntryTimes" required>
                                        <option <?php if ($PERSONNEL->EntryTimes == 1) {
                                                    echo 'selected';
                                                } ?> value="1">รอบที่ 1 วันที่ 10 มิถุนายน</option>
                                        <option <?php if ($PERSONNEL->EntryTimes == 2) {
                                                    echo 'selected';
                                                } ?> value="2">รอบที่ 2 วันที่ 10 พฤศจิกายน</option>
                                    </select>
                                    <label for="EntryTimes">รอบที่เก็บข้อมูล<font color="red"> *</font></label>
                                </div>
                            </div>


                        <?php }
                        ?>

                        <div class="d-flex justify-content-between">
                            <a href="personnel?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
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