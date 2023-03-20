<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลหลัก
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
                        <form class="row g-3" action="<?php echo base_url('update-school-main/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <h6 class="card-title"></h6>
                                <div class="form-floating">
                                    <select class="form-select" name="InnovationAreaCode" id="InnovationAreaCode" aria-label="InnovationAreaCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_INNOVATION_AREA ');
                                        foreach ($result->result() as $INNOVATION_AREA) {
                                        ?>
                                            <option <?php if ($SCHOOL->InnovationAreaCode == $INNOVATION_AREA->INNOVATION_AREA_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $INNOVATION_AREA->INNOVATION_AREA_CODE; ?>"><?= $INNOVATION_AREA->INNOVATION_AREA_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SCHOOL_STATUS_CODE">พื้นที่นวัฒกรรมการศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">ตราสัญลักษณ์ </label>
                                    <input type="file" class="form-control" name="ImageSchool" id="ImageSchool" placeholder="รูปตราโรงเรียน">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control " name="SchoolNameThai" id="SchoolNameThai" value="<?= $SCHOOL->SchoolNameThai; ?>">
                                    <label for="SchoolNameThai">ชื่อสถานศึกษา (ภาษาไทย) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control " name="SchoolNameEnglish" id="SchoolNameEnglish" value="<?= $SCHOOL->SchoolNameEnglish; ?>">
                                    <label for="SchoolNameEnglish">ชื่อสถานศึกษา (ภาษาอังกฤษ) <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control " name="SchoolEstablishedDate" value="<?= $SCHOOL->SchoolEstablishedDate; ?>">
                                    <label for="SchoolEstablishedDate">วันที่ก่อตั้ง <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="EducationLevelCode" id="EducationLevelCode" aria-label="EducationLevelCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL');
                                        foreach ($result->result() as $EDUCATION_LEVEL) {
                                        ?>
                                            <option <?php if ($SCHOOL->EducationLevelCode == $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $EDUCATION_LEVEL->EDUCATION_LEVEL_CODE; ?>"><?= $EDUCATION_LEVEL->EDUCATION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="EducationLevelCode">ระดับศึกษาที่เปิดสอน <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="SchoolTypeCode" id="SchoolTypeCode" aria-label="SchoolTypeCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_SCHOOL_TYPE');
                                        foreach ($result->result() as $SCHOOL_TYPE) {
                                        ?>
                                            <option <?php if ($SCHOOL->SchoolTypeCode == $SCHOOL_TYPE->SCHOOL_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $SCHOOL_TYPE->SCHOOL_TYPE_CODE; ?>"><?= $SCHOOL_TYPE->SCHOOL_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SchoolTypeCode">ประเภทสถานศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="SchoolStatusCode" id="SchoolStatusCode" aria-label="SchoolStatusCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_SCHOOL_STATUS');
                                        foreach ($result->result() as $SCHOOL_STATUS) {
                                        ?>
                                            <option <?php if ($SCHOOL->SchoolStatusCode == $SCHOOL_STATUS->SCHOOL_STATUS_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $SCHOOL_STATUS->SCHOOL_STATUS_CODE; ?>"><?= $SCHOOL_STATUS->SCHOOL_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SchoolStatusCode">สถานะของสถานศึกษา <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="MunicipalCode" id="MunicipalCode" aria-label="MunicipalCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_MUNICIPAL');
                                        foreach ($result->result() as $MUNICIPAL) {
                                        ?>
                                            <option <?php if ($SCHOOL->MunicipalCode == $MUNICIPAL->MUNICIPAL_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $MUNICIPAL->MUNICIPAL_CODE; ?>"><?= $MUNICIPAL->MUNICIPAL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SCHOOL_STATUS_CODE">ประเภทเขตการปกครอง <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="JurisdictionCode" id="JurisdictionCode" aria-label="JurisdictionCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                                        foreach ($result->result() as $JURISDICTION) {
                                        ?>
                                            <option <?php if ($SCHOOL->JurisdictionCode == $JURISDICTION->JURISDICTION_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SCHOOL_STATUS_CODE">หน่วยงานต้นสังกัด<font color="red"> *</font></label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="school?SchoolID=<?= $SCHOOL->SchoolID ?>" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-warning" onclick="return check(School)">แก้ไขข้อมูล</button>
                            </div>
                        <?php } ?>

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

            //Check_InnovationAreaCode
            if (frm.InnovationAreaCode.value == "") {
                alert("กรุณาเลือกพื้นที่นวัฒกรรมการศึกษา");
                return false;
            }

            var NameThai = /^[ก-์]{1,255}$/;
            if (frm.SchoolNameThai.value == "") {
                alert("กรุณากรอกชื่อโรงเรียน(ภาษาไทย)");
                frm.SchoolNameThai.value = "";
                return false;
            } else if (!frm.SchoolNameThai.value.match(NameThai)) {
                alert("กรุณากรอกชื่อโรงเรียนเป็น(ภาษาไทย)และให้น้อยกว่า 255 อักษร");
                frm.SchoolNameThai.value = "";
                return false;
            }

            var NameEnglish = /^[A-Z,a-z]{1,255}$/;
            if (frm.SchoolNameEnglish.value == "") {
                alert("กรุณากรอกชื่อโรงเรียน(ภาษาอังกฤษ)");
                frm.SchoolNameEnglish.value = "";
                return false;
            } else if (!frm.SchoolNameEnglish.value.match(NameEnglish)) {
                alert("กรุณากรอกชื่อโรงเรียนเป็น(ภาษาอังกฤษ)และให้น้อยกว่า 255 อักษร");
                frm.SchoolNameEnglish.value = "";
                return false;
            }

            //SchoolEstablishedDate
            if (frm.SchoolEstablishedDate.value == "") {
                alert("กรุณาเลือกวันที่ก่อตั้ง");
                return false;
            }

            //SchoolTypeCode
            if (frm.SchoolTypeCode.value == "") {
                alert("กรุณาเลือกประเภทสถานศึกษา");
                return false;
            }

            //SchoolStatusCode
            if (frm.SchoolStatusCode.value == "") {
                alert("กรุณาเลือกสถานะของสถานศึกษา");
                return false;
            }

            //EducationLevelCode
            if (frm.EducationLevelCode.value == "") {
                alert("กรุณาเลือกระดับการศึกษาที่เปิดสอน");
                return false;
            }

            //JurisdictionCode
            if (frm.JurisdictionCode.value == "") {
                alert("กรุณาเลือกหน่วยงานต้นสังกัด");
                return false;
            }

            //MunicipalCode
            if (frm.MunicipalCode.value == "") {
                alert("กรุณาเลือกประเภทเขตปกครอง");
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>
</main><!-- End #main -->