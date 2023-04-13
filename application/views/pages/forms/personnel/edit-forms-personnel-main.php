<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลบุคลากร
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
                        <form class="row g-3" action="<?php echo base_url('update-personnel-main/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $PERSONNEL->ImagePersonnel); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลตำแหน่งและปฎิบัติราชการ</h6>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JURISDICTION ORDER BY JURISDICTION_NAME ASC');

                                        foreach ($result->result() as $JURISDICTION) {
                                        ?>
                                            <option <?php if ($_GET['JurisdictionCode'] == $JURISDICTION->JURISDICTION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="JurisdictionCode">หน่วยงานต้นสังกัด<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelStatusCode" id="PersonnelStatusCode" aria-label="PersonnelStatusCode" required>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS ORDER BY PERSONNEL_STATUS_NAME ASC ');

                                        foreach ($result->result() as $PERSONNEL_STATUS) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelStatusCode == $JURISDICTION->JURISDICTION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelStatusCode">สถานะปฏิบัตรราชการ<font color="red"> *</font></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelStartDate" id="PersonnelStartDate" required value="<?= $PERSONNEL->PersonnelStartDate; ?>">
                                    <label for="PersonnelStartDate">วันที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelRetireDate" id="PersonnelRetireDate" value="<?= $PERSONNEL->PersonnelRetireDate; ?>">
                                    <label for="PersonnelRetireDate">วันที่เกษียณ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelTypeCode" id="PersonnelTypeCode" aria-label="PersonnelTypeCode" required>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE ORDER BY PERSONNEL_TYPE_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_TYPE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelTypeCode == $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ประเภทบุคลากร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionCode" id="PositionCode" aria-label="PositionCode" required>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION ORDER BY POSITION_NAME ASC');

                                        foreach ($result->result() as $POSITION) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PositionCode == $POSITION->POSITION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PositionLevelCode" id="PositionLevelCode" aria-label="PositionLevelCode" required>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL ORDER BY POSITION_LEVEL_NAME ASC');

                                        foreach ($result->result() as $POSITION_LEVEL) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PositionLevelCode == $POSITION_LEVEL->POSITION_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PositionStartDate" id="PositionStartDate" required value="<?= $PERSONNEL->PositionStartDate; ?>">
                                    <label for="PositionStartDate">วันที่ดำรงตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">รูปภาพบุคลากร <font color="red"> *</font></label>
                                    <input type="file" class="form-control" name="ImagePersonnel" id="ImagePersonnel" placeholder="รูปภาพบุคลากร">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelPrefixCode" id="PersonnelPrefixCode" aria-label="PersonnelPrefixCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX ORDER BY PREFIX_NAME ASC');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelPrefixCode == $PREFIX->PREFIX_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelNameThai" id="PersonnelNameThai" value="<?= $PERSONNEL->PersonnelNameThai ?>">
                                    <label for="PersonnelNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelLastNameThai" id="PersonnelLastNameThai" value="<?= $PERSONNEL->PersonnelLastNameThai ?>">
                                    <label for="PersonnelLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelNameEnglish" id="PersonnelNameEnglish" value="<?= $PERSONNEL->PersonnelNameEnglish ?>">
                                    <label for="PersonnelNameEnglish">ชื่อ (ภาษาอังกฤษ) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelLastNameEnglish" id="PersonnelLastNameEnglish" value="<?= $PERSONNEL->PersonnelLastNameEnglish ?>">
                                    <label for="PersonnelLastNameEnglish">นามสกุล (ภาษาอังกฤษ) <font color="red"> *</font></label>
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
            var Year = /^[0-9]{4,4}$/;
            if (frm.EntryYear.value == "") {
                alert("กรุณากรอกปีที่เก็บข้อมูล");
                return false;
            } else if (!frm.EntryYear.value.match(Year)) {
                alert("กรุณากรอกปีที่เก็บข้อมูลให้ครบ 4 หลัก");
                frm.EntryYear.value = "";
                return false;
            }

            if (frm.EntryTimes.value == "") {
                alert("กรุณาเลือกรอบที่เก็บข้อมูล");
                return false;
            }

            if (frm.PersonnelStatusCode.value == "") {
                alert("กรุณาเลือกสถานะปฏิบัติราชการ");
                return false;
            }

            if (frm.PersonnelStartDate.value == "") {
                alert("กรุณากรอกวันที่บรรจุ");
                return false;
            }

            if (frm.PersonnelTypeCode.value == "") {
                alert("กรุณาเลือกประเภทบุคลากร");
                return false;
            }

            if (frm.PositionCode.value == "") {
                alert("กรุณาเลือกตำแหน่ง");
                return false;
            }

            if (frm.PositionLevelCode.value == "") {
                alert("กรุณาเลือกระดับตำแหน่ง");
                return false;
            }

            if (frm.PositionStartDate.value == "") {
                alert("กรุณากรอกวันที่ดำรงตำแหน่ง");
                return false;
            }

            if (frm.ImagePersonnel.value != "") {
                var fty = new Array(".jpg", ".jpeg", ".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
                var a = frm.ImagePersonnel.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
                var permiss = 0; // เงื่อนไขไฟล์อนุญาต
                a = a.toLowerCase();
                if (a != "") {
                    for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
                        if (a.lastIndexOf(fty[i]) >= 0) { // เงื่อนไขไฟล์ที่อนุญาต   
                            permiss = 1;
                            break;
                        } else {
                            continue;
                        }
                    }
                    if (permiss == 0) {
                        alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ jpg jpeg png");
                        return false;
                    }
                }
            }

            if (frm.PersonnelPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้า");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.PersonnelNameThai.value == "") {
                alert("กรุณากรอกชื่อ(ภาษาไทย)");
                return false;
            } else if (!frm.PersonnelNameThai.value.match(NameThai)) {
                alert("กรุณากรอกชื่อเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.PersonnelNameThai.value = "";
                return false;
            }

            if (frm.PersonnelLastNameThai.value == "") {
                alert("กรุณากรอกนามสกุล(ภาษาไทย)");
                return false;
            } else if (!frm.PersonnelLastNameThai.value.match(NameThai)) {
                alert("กรุณากรอกนามสกุลเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.PersonnelLastNameThai.value = "";
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->