<main id="main" class="main">
    <div class="pagetitle">
        <h1 style="padding-bottom: 5px;">เพิ่มข้อมูลตำแหน่งเพิ่มเติม
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
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-personnel-position/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="255" name="AdditionalPosition" id="AdditionalPosition">
                                    <label for="AdditionalPosition">ชื่อตำแหน่ง</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="AdditionalDepartmentCode" id="AdditionalDepartmentCode" aria-label="AdditionalDepartmentCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_DEPARTMENT');
                                        foreach ($result->result() as $DEPARTMENT) {
                                        ?>
                                            <option value="<?= $DEPARTMENT->DEPARTMENT_CODE; ?>"><?= $DEPARTMENT->DEPARTMENT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="AdditionalDepartmentCode">กลุ่ม/หมวดตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="AdditionalDutyDate" id="AdditionalDutyDate">
                                    <label for="AdditionalDutyDate">วันที่ปฎิบัติหน้าที่<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="AdditionalCommand" id="AdditionalCommand">
                                    <label for="AdditionalCommand">รายละเอียดคำสั่ง</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="AdditionalComment" id="AdditionalComment">
                                    <label for="AdditionalComment">หมายเหตุ</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">เอกสารแนบไฟล์</label>
                                    <input type="file" class="form-control" name="AdditionalDocumentURL" id="AdditionalDocumentURL" placeholder="เอกสารแนบไฟล์">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="personnel-position?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-danger">ยกเลิก</a>
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

            if (frm.AdditionalDepartmentCode.value == "") {
                alert("กรุณาเลือกกลุ่มหรือหมวด");
                return false;
            }
            if (frm.AdditionalDutyDate.value == "") {
                alert("กรุณากรอกวันที่ปฎิบัตหน้าที่");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>

</main><!-- End #main -->