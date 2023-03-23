<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลรหัสนักเรียน
            <?php if (isset($_GET['StudentReferenceID'])) { ?>
                -
                <?php
                $result = $this->db->query('SELECT *  FROM STUDENT WHERE StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                foreach ($result->result() as $STUDENT) {
                    echo $STUDENT->StudentID;
                }
                ?>
            <?php } ?>
        </h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-student-address/' . $_GET['StudentReferenceID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode']); ?>" method="POST" id="Student" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentOfficialAddressHouseNumber" id="StudentOfficialAddressHouseNumber" value="<?= $STUDENT->StudentOfficialAddressHouseNumber ?>">
                                    <label for="StudentOfficialAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentOfficialAddressMoo" id="StudentOfficialAddressMoo" value="<?= $STUDENT->StudentOfficialAddressMoo ?>">
                                    <label for="StudentOfficialAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentOfficialAddressStreet" id="StudentOfficialAddressStreet" value="<?= $STUDENT->StudentOfficialAddressStreet ?>">
                                    <label for="StudentOfficialAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentOfficialAddressSoi" id="StudentOfficialAddressSoi" value="<?= $STUDENT->StudentOfficialAddressSoi ?>">
                                    <label for="StudentOfficialAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentOfficialAddressTrok" id="StudentOfficialAddressTrok" value="<?= $STUDENT->StudentOfficialAddressTrok ?>">
                                    <label for="StudentOfficialAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentOfficialAddressProvinceCode" id="PROVINCE" aria-label="StudentOfficialAddressProvinceCode">
                                        <?php
                                        if ($STUDENT->StudentOfficialAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentOfficialAddressDistrictCode" id="DISTRICT" aria-label="StudentOfficialAddressDistrictCode">
                                        <?php
                                        if ($STUDENT->StudentOfficialAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentOfficialAddressSubdistrictCode" id="SUBDISTRICT" aria-label="StudentOfficialAddressSubdistrictCode">
                                        <?php
                                        if ($STUDENT->StudentOfficialAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentOfficialAddressPostcode" id="StudentOfficialAddressPostcode" value="<?= $STUDENT->StudentOfficialAddressPostcode ?>">
                                    <label for="StudentOfficialAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentOfficialAddressPhoneNumber" id="StudentOfficialAddressPhoneNumber" value="<?= $STUDENT->StudentOfficialAddressPhoneNumber ?>">
                                    <label for="StudentOfficialAddressPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ปัจจุบัน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentCurrentAddressHouseNumber" id="StudentCurrentAddressHouseNumber" value="<?= $STUDENT->StudentCurrentAddressHouseNumber ?>">
                                    <label for="StudentCurrentAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="StudentCurrentAddressMoo" id="StudentCurrentAddressMoo" value="<?= $STUDENT->StudentCurrentAddressMoo ?>">
                                    <label for="StudentCurrentAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentCurrentAddressStreet" id="StudentCurrentAddressStreet" value="<?= $STUDENT->StudentCurrentAddressStreet ?>">
                                    <label for="StudentCurrentAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentCurrentAddressSoi" id="StudentCurrentAddressSoi" value="<?= $STUDENT->StudentCurrentAddressSoi ?>">
                                    <label for="StudentCurrentAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentCurrentAddressTrok" id="StudentCurrentAddressTrok" value="<?= $STUDENT->StudentCurrentAddressTrok ?>">
                                    <label for="StudentCurrentAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentCurrentAddressProvinceCode" id="PROVINCE_2" aria-label="StudentCurrentAddressProvinceCode">
                                        <?php
                                        if ($STUDENT->StudentCurrentAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentCurrentAddressDistrictCode" id="DISTRICT_2" aria-label="StudentCurrentAddressDistrictCode">
                                        <?php
                                        if ($STUDENT->StudentCurrentAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="StudentCurrentAddressSubdistrictCode" id="SUBDISTRICT_2" aria-label="StudentCurrentAddressSubdistrictCode">
                                        <?php
                                        if ($STUDENT->StudentCurrentAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($STUDENT->StudentCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="StudentGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentCurrentAddressPostcode" id="StudentCurrentAddressPostcode" value="<?= $STUDENT->StudentCurrentAddressPostcode ?>">
                                    <label for="StudentCurrentAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="StudentCurrentAddressPhoneNumber" id="StudentCurrentAddressPhoneNumber" value="<?= $STUDENT->StudentCurrentAddressPhoneNumber ?>">
                                    <label for="StudentCurrentAddressPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="student?SchoolID=<?= $STUDENT->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT->StudentReferenceID ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" onclick="return check(Student)">บันทึกข้อมูล</button>
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