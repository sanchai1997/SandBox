<main id="main" class="main">
    <div class="pagetitle">
        <h1>เพิ่มข้อมูลบุคลากรอื่น
        </h1>
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
                        <form class="row g-3" action="<?php echo base_url('add-personnel'); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลตำแหน่งและปฎิบัติราชการ</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" minlength="4" maxlength="4" name="EntryYear" id="EntryYear" value="<?= date('Y') + 543; ?>" required>
                                    <label for="EntryYear">ปีที่เก็บข้อมูล <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EntryTimes" id="EntryTimes" aria-label="EntryTimes" required>
                                        <option value="" selected>เลือก</option>
                                        <option value="1">รอบที่ 1 วันที่ 10 มิถุนายน</option>
                                        <option value="2">รอบที่ 2 วันที่ 10 พฤศจิกายน</option>
                                    </select>
                                    <label for="EntryTimes">รอบที่เก็บข้อมูล<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="hidden" name="JurisdictionCode" value="<?= $_GET['JurisdictionCode'] ?>">
                                    <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode" disabled>
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
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS ORDER BY PERSONNEL_STATUS_NAME ASC ');

                                        foreach ($result->result() as $PERSONNEL_STATUS) {
                                        ?>
                                            <option value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelStatusCode">สถานะปฏิบัตรราชการ<font color="red"> *</font></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelStartDate" id="PersonnelStartDate" required>
                                    <label for="PersonnelStartDate">วันที่บรรจุ<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PersonnelRetireDate" id="PersonnelRetireDate" value="">
                                    <label for="PersonnelRetireDate">วันที่เกษียณ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelTypeCode" id="PersonnelTypeCode" aria-label="PersonnelTypeCode" required>
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE ORDER BY PERSONNEL_TYPE_NAME ASC');

                                        foreach ($result->result() as $PERSONNEL_TYPE) {
                                        ?>
                                            <option value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
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
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION ORDER BY POSITION_NAME ASC');

                                        foreach ($result->result() as $POSITION) {
                                        ?>
                                            <option value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
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
                                        <option value="" selected>เลือก</option>

                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL ORDER BY POSITION_LEVEL_NAME ASC');

                                        foreach ($result->result() as $POSITION_LEVEL) {
                                        ?>
                                            <option value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="PositionStartDate" id="PositionStartDate" required>
                                    <label for="PositionStartDate">วันที่ดำรงตำแหน่ง<font color="red"> *</font></label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">รูปภาพบุคลากร <font color="red"> *</font></label>
                                    <input type="file" class="form-control" name="ImagePersonnel" id="ImagePersonnel" placeholder="รูปภาพบุคลากร" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelPersonalIDTypeCode" id="PersonnelPersonalIDTypeCode" aria-label="PersonnelPersonalIDTypeCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                        foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                        ?>
                                            <option value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelPersonalIDTypeCode">ประเภทบัตรประจำตัว<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="PersonnelPersonalID" id="PersonnelPersonalID" required>
                                    <label for="PersonnelPersonalID">หมายเลขบัตร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelPassportNumber" id="PersonnelPassportNumber">
                                    <label for="PersonnelPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelPrefixCode" id="PersonnelPrefixCode" aria-label="PersonnelPrefixCode"> required
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX ORDER BY PREFIX_NAME ASC');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelPrefixCode">คำนำหน้า<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelNameThai" id="PersonnelNameThai" required>
                                    <label for="PersonnelNameThai">ชื่อ (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelLastNameThai" id="PersonnelLastNameThai" required>
                                    <label for="PersonnelLastNameThai">นามสกุล (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelGenderCode" id="PersonnelGenderCode" aria-label="PersonnelGenderCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                        foreach ($result->result() as $GENDER) {
                                        ?>
                                            <option value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">เพศ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelNationalityCode" id="PersonnelNationalityCode" aria-label="PersonnelNationalityCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
                                        foreach ($result->result() as $NATIONALITY) {
                                        ?>
                                            <option value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelNationalityCode">สัญชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelRaceCode" id="PersonnelRaceCode" aria-label="PersonnelRaceCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RACE ORDER BY RACE_NAME ASC');
                                        foreach ($result->result() as $RACE) {
                                        ?>
                                            <option value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelRaceCode">เชื้อชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelReligionCode" id="PersonnelReligionCode" aria-label="PersonnelReligionCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
                                        foreach ($result->result() as $RELIGION) {
                                        ?>
                                            <option value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="PersonnelBirthDate" id="PersonnelBirthDate" required>
                                    <label for="PersonnelBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelBloodCode" id="PersonnelBloodCode" aria-label="PersonnelBloodCode" required>
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                        foreach ($result->result() as $BLOOD) {
                                        ?>
                                            <option value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
                                </div>
                            </div>



                            <div class="d-flex justify-content-between">
                                <a href="personnel?JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>" class="btn btn-danger">ยกเลิก</a>
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

            if (frm.ImagePersonnel.value == "") {
                alert("กรุณาใส่รูปครูและบุคลากร");
                return false;
            } else if (frm.ImagePersonnel.value != "") {
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


            if (frm.PersonnelPersonalIDTypeCode.value == "") {
                alert("กรุณาเลือกประเภทบัตร");
                return false;
            }

            var Year = /^[0-9]{13,13}$/;
            if (frm.PersonnelPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตร");
                return false;
            } else if (!frm.PersonnelPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรให้ครบ 13 หลัก");
                frm.PersonnelPersonalID.value = "";
                return false;
            }

            if (frm.PersonnelPrefixCode.value == "") {
                alert("กรุณาเลือกคำนำหน้า");
                return false;
            }

            var NameThai = /^[ก-๙]{1,100}$/;
            if (frm.PersonnelNameThai.value == "") {
                alert("กรุณาเลือกชื่อ(ภาษาไทย)");
                return false;
            } else if (!frm.PersonnelNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกชื่อเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.PersonnelNameThai.value = "";
                return false;
            }

            if (frm.PersonnelLastNameThai.value == "") {
                alert("กรุณาเลือกนามสกุล(ภาษาไทย)");
                return false;
            } else if (!frm.PersonnelLastNameThai.value.match(NameThai)) {
                alert("กรุณาเลือกนามสกุลเป็น(ภาษาไทย)และไม่เกิน 100 ตัวอักษร");
                frm.PersonnelLastNameThai.value = "";
                return false;
            }

            if (frm.PersonnelGenderCode.value == "") {
                alert("กรุณาเลือกเพศ");
                return false;
            }

            if (frm.PersonnelNationalityCode.value == "") {
                alert("กรุณาเลือกสัญชาติ");
                return false;
            }

            if (frm.PersonnelRaceCode.value == "") {
                alert("กรุณาเลือกเชื้อชาติ");
                return false;
            }

            if (frm.PersonnelReligionCode.value == "") {
                alert("กรุณาเลือกศาสนา");
                return false;
            }

            if (frm.PersonnelBirthDate.value == "") {
                alert("กรุณากรอกวันเกิด");
                return false;
            }

            if (frm.PersonnelBloodCode.value == "") {
                alert("กรุณาเลือกกลุ่มเลือด");
                return false;
            }


            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->