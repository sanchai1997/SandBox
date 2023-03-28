<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลครูและบุคลากรทางการศึกษา
            <?php if (isset($_GET['TeacherID'])) {
                $result = $this->db->query('SELECT *  FROM TEACHER 
                INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE TeacherID = "' . $_GET['TeacherID'] . '" AND SchoolID = ' . $_GET['SchoolID'] . '');
                foreach ($result->result() as $TEACHER) {

                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        $SchoolName = $SCHOOL->SchoolNameThai;
                    }
            ?>

        </h1>
        <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $TEACHER->PREFIX_NAME . $TEACHER->TeacherNameThai . ' ' . $TEACHER->TeacherLastNameThai ?></b></a>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-teacher-address/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="TeacherOfficialAddressHouseNumber" id="TeacherOfficialAddressHouseNumber" value="<?= $TEACHER->TeacherOfficialAddressHouseNumber ?>">
                                    <label for="TeacherOfficialAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="TeacherOfficialAddressMoo" id="TeacherOfficialAddressMoo" value="<?= $TEACHER->TeacherOfficialAddressMoo ?>">
                                    <label for="TeacherOfficialAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherOfficialAddressStreet" id="TeacherOfficialAddressStreet" value="<?= $TEACHER->TeacherOfficialAddressStreet ?>">
                                    <label for="TeacherOfficialAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherOfficialAddressSoi" id="TeacherOfficialAddressSoi" value="<?= $TEACHER->TeacherOfficialAddressSoi ?>">
                                    <label for="TeacherOfficialAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherOfficialAddressTrok" id="TeacherOfficialAddressTrok" value="<?= $TEACHER->TeacherOfficialAddressTrok ?>">
                                    <label for="TeacherOfficialAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherOfficialAddressProvinceCode" id="PROVINCE" aria-label="TeacherOfficialAddressProvinceCode">
                                        <?php
                                        if ($TEACHER->TeacherOfficialAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherOfficialAddressDistrictCode" id="DISTRICT" aria-label="TeacherOfficialAddressDistrictCode">
                                        <?php
                                        if ($TEACHER->TeacherOfficialAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherOfficialAddressSubdistrictCode" id="SUBDISTRICT" aria-label="TeacherOfficialAddressSubdistrictCode">
                                        <?php
                                        if ($TEACHER->TeacherOfficialAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherOfficialAddressPostcode" id="TeacherOfficialAddressPostcode" value="<?= $TEACHER->TeacherOfficialAddressPostcode ?>">
                                    <label for="TeacherOfficialAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherOfficialAddressPhoneNumber" id="TeacherOfficialAddressPhoneNumber" value="<?= $TEACHER->TeacherOfficialAddressPhoneNumber ?>">
                                    <label for="TeacherOfficialAddressPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ปัจจุบัน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="TeacherCurrentAddressHouseNumber" id="TeacherCurrentAddressHouseNumber" value="<?= $TEACHER->TeacherCurrentAddressHouseNumber ?>">
                                    <label for="TeacherCurrentAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="TeacherCurrentAddressMoo" id="TeacherCurrentAddressMoo" value="<?= $TEACHER->TeacherCurrentAddressMoo ?>">
                                    <label for="TeacherCurrentAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherCurrentAddressStreet" id="TeacherCurrentAddressStreet" value="<?= $TEACHER->TeacherCurrentAddressStreet ?>">
                                    <label for="TeacherCurrentAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherCurrentAddressSoi" id="TeacherCurrentAddressSoi" value="<?= $TEACHER->TeacherCurrentAddressSoi ?>">
                                    <label for="TeacherCurrentAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherCurrentAddressTrok" id="TeacherCurrentAddressTrok" value="<?= $TEACHER->TeacherCurrentAddressTrok ?>">
                                    <label for="TeacherCurrentAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherCurrentAddressProvinceCode" id="PROVINCE_2" aria-label="TeacherCurrentAddressProvinceCode">
                                        <?php
                                        if ($TEACHER->TeacherCurrentAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherCurrentAddressDistrictCode" id="DISTRICT_2" aria-label="TeacherCurrentAddressDistrictCode">
                                        <?php
                                        if ($TEACHER->TeacherCurrentAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="TeacherCurrentAddressSubdistrictCode" id="SUBDISTRICT_2" aria-label="TeacherCurrentAddressSubdistrictCode">
                                        <?php
                                        if ($TEACHER->TeacherCurrentAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($TEACHER->TeacherCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="TeacherGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherCurrentAddressPostcode" id="TeacherCurrentAddressPostcode" value="<?= $TEACHER->TeacherCurrentAddressPostcode ?>">
                                    <label for="TeacherCurrentAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherCurrentAddressPhoneNumber" id="TeacherCurrentAddressPhoneNumber" value="<?= $TEACHER->TeacherCurrentAddressPhoneNumber ?>">
                                    <label for="TeacherCurrentAddressPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="TeacherEmail" id="TeacherEmail" value="<?= $TEACHER->TeacherEmail ?>">
                                    <label for="TeacherEmail">อีเมลล์</label>
                                </div>
                            </div>


                    <?php }
            } ?>

                    <div class="d-flex justify-content-between">
                        <a href="teacher?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                        <button type="button" class="btn btn-warning" onclick="return check(Teacher)">แก้ไขข้อมูล</button>
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
    <!-- Multiple Dropdown PROVINCE DISTRICT SUBDISTRICT -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#DISTRICT").children('option:gt(0)').hide();
            $("#SUBDISTRICT").children('option:gt(0)').hide();


            $("#PROVINCE").change(function() {
                $("#DISTRICT").children('option').hide();
                $("#DISTRICT").children("option[ id^=" + $(this).val() + "]").show()
            })

            $("#DISTRICT").change(function() {
                $("#SUBDISTRICT").children('option').hide();
                $("#SUBDISTRICT").children("option[ id^=" + $(this).val() + "]").show()
            })

        })

        $(document).ready(function() {
            $("#DISTRICT_2").children('option:gt(0)').hide();
            $("#SUBDISTRICT_2").children('option:gt(0)').hide();


            $("#PROVINCE_2").change(function() {
                $("#DISTRICT_2").children('option').hide();
                $("#DISTRICT_2").children("option[ id^=" + $(this).val() + "]").show()
            })

            $("#DISTRICT_2").change(function() {
                $("#SUBDISTRICT_2").children('option').hide();
                $("#SUBDISTRICT_2").children("option[ id^=" + $(this).val() + "]").show()
            })

        })
    </script>
</main><!-- End #main -->