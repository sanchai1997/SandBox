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
                        <form class="row g-3" action="<?php echo base_url('update-personnel-person/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลบุคคล</h6>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelPersonalIDTypeCode" id="PersonnelPersonalIDTypeCode" aria-label="PersonnelPersonalIDTypeCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE');
                                        foreach ($result->result() as $CITIZEN_ID_TYPE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelPersonalIDTypeCode == $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE; ?>"><?= $CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelPersonalIDTypeCode">ประเภทบัตรประจำตัว<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="13" name="PersonnelPersonalID" id="PersonnelPersonalID" value="<?= base64_decode($PERSONNEL->PersonnelPersonalID); ?>">
                                    <label for="PersonnelPersonalID">หมายเลขบัตร<font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelPassportNumber" id="PersonnelPassportNumber" value="<?= $PERSONNEL->PersonnelPassportNumber ?>">
                                    <label for="PersonnelPassportNumber">เลขที่หนังสือเดินทาง </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelGenderCode" id="PersonnelGenderCode" aria-label="PersonnelGenderCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_GENDER');
                                        foreach ($result->result() as $GENDER) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelGenderCode == $GENDER->GENDER_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $GENDER->GENDER_CODE; ?>"><?= $GENDER->GENDER_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">เพศ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelNationalityCode" id="PersonnelNationalityCode" aria-label="PersonnelNationalityCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY ORDER BY NATIONALITY_NAME ASC');
                                        foreach ($result->result() as $NATIONALITY) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelNationalityCode == $NATIONALITY->NATIONALITY_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $NATIONALITY->NATIONALITY_CODE; ?>"><?= $NATIONALITY->NATIONALITY_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelNationalityCode">สัญชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelRaceCode" id="PersonnelRaceCode" aria-label="PersonnelRaceCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RACE ORDER BY RACE_NAME ASC');
                                        foreach ($result->result() as $RACE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelRaceCode == $RACE->RACE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RACE->RACE_CODE; ?>"><?= $RACE->RACE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelRaceCode">เชื้อชาติ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelReligionCode" id="PersonnelReligionCode" aria-label="PersonnelReligionCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_RELIGION ORDER BY RELIGION_NAME ASC');
                                        foreach ($result->result() as $RELIGION) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelReligionCode == $RELIGION->RELIGION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $RELIGION->RELIGION_CODE; ?>"><?= $RELIGION->RELIGION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelReligionCode">ศาสนา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="PersonnelBirthDate" id="PersonnelBirthDate" value="<?= $PERSONNEL->PersonnelBirthDate ?>">
                                    <label for="PersonnelBirthDate">วันที่เกิด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelBloodCode" id="PersonnelBloodCode" aria-label="PersonnelBloodCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_BLOOD');
                                        foreach ($result->result() as $BLOOD) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelBloodCode == $BLOOD->BLOOD_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $BLOOD->BLOOD_CODE; ?>"><?= $BLOOD->BLOOD_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelBloodCode">กลุ่มเลือด<font color="red"> *</font></label>
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

            var Year = /^[0-9]{13,13}$/;
            if (frm.PersonnelPersonalID.value == "") {
                alert("กรุณาหมายเลขบัตร");
                return false;
            } else if (!frm.PersonnelPersonalID.value.match(Year)) {
                alert("กรุณาหมายเลขบัตรให้ครบ 13 หลัก");
                frm.PersonnelPersonalID.value = "";
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