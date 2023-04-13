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
                        <form class="row g-3" action="<?php echo base_url('update-personnel-address/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="PersonnelOfficialAddressHouseNumber" id="PersonnelOfficialAddressHouseNumber" value="<?= $PERSONNEL->PersonnelOfficialAddressHouseNumber ?>">
                                    <label for="PersonnelOfficialAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="PersonnelOfficialAddressMoo" id="PersonnelOfficialAddressMoo" value="<?= $PERSONNEL->PersonnelOfficialAddressMoo ?>">
                                    <label for="PersonnelOfficialAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelOfficialAddressStreet" id="PersonnelOfficialAddressStreet" value="<?= $PERSONNEL->PersonnelOfficialAddressStreet ?>">
                                    <label for="PersonnelOfficialAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelOfficialAddressSoi" id="PersonnelOfficialAddressSoi" value="<?= $PERSONNEL->PersonnelOfficialAddressSoi ?>">
                                    <label for="PersonnelOfficialAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelOfficialAddressTrok" id="PersonnelOfficialAddressTrok" value="<?= $PERSONNEL->PersonnelOfficialAddressTrok ?>">
                                    <label for="PersonnelOfficialAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelOfficialAddressProvinceCode" id="PROVINCE" aria-label="PersonnelOfficialAddressProvinceCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelOfficialAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelOfficialAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelOfficialAddressDistrictCode" id="DISTRICT" aria-label="PersonnelOfficialAddressDistrictCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelOfficialAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelOfficialAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelOfficialAddressSubdistrictCode" id="SUBDISTRICT" aria-label="PersonnelOfficialAddressSubdistrictCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelOfficialAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelOfficialAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelOfficialAddressPostcode" id="PersonnelOfficialAddressPostcode" value="<?= $PERSONNEL->PersonnelOfficialAddressPostcode ?>">
                                    <label for="PersonnelOfficialAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelOfficialAddressPhoneNumber" id="PersonnelOfficialAddressPhoneNumber" value="<?= $PERSONNEL->PersonnelOfficialAddressPhoneNumber ?>">
                                    <label for="PersonnelOfficialAddressPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลที่อยู่ (ปัจจุบัน)</h6>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="PersonnelCurrentAddressHouseNumber" id="PersonnelCurrentAddressHouseNumber" value="<?= $PERSONNEL->PersonnelCurrentAddressHouseNumber ?>">
                                    <label for="PersonnelCurrentAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="PersonnelCurrentAddressMoo" id="PersonnelCurrentAddressMoo" value="<?= $PERSONNEL->PersonnelCurrentAddressMoo ?>">
                                    <label for="PersonnelCurrentAddressMoo">หมู่ที่</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelCurrentAddressStreet" id="PersonnelCurrentAddressStreet" value="<?= $PERSONNEL->PersonnelCurrentAddressStreet ?>">
                                    <label for="PersonnelCurrentAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelCurrentAddressSoi" id="PersonnelCurrentAddressSoi" value="<?= $PERSONNEL->PersonnelCurrentAddressSoi ?>">
                                    <label for="PersonnelCurrentAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelCurrentAddressTrok" id="PersonnelCurrentAddressTrok" value="<?= $PERSONNEL->PersonnelCurrentAddressTrok ?>">
                                    <label for="PersonnelCurrentAddressTrok">ตรอก</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelCurrentAddressProvinceCode" id="PROVINCE_2" aria-label="PersonnelCurrentAddressProvinceCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelCurrentAddressProvinceCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE ORDER BY PROVINCE_NAME ASC');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelCurrentAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">จังหวัด </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelCurrentAddressDistrictCode" id="DISTRICT_2" aria-label="PersonnelCurrentAddressDistrictCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelCurrentAddressDistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT ORDER BY DISTRICT_NAME ASC');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelCurrentAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $DISTRICT->PROVINCE_CODE; ?>" value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">อำเภอ </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" name="PersonnelCurrentAddressSubdistrictCode" id="SUBDISTRICT_2" aria-label="PersonnelCurrentAddressSubdistrictCode">
                                        <?php
                                        if ($PERSONNEL->PersonnelCurrentAddressSubdistrictCode == '') {
                                        ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT ORDER BY SUBDISTRICT_NAME ASC');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($PERSONNEL->PersonnelCurrentAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="PersonnelGenderCode">ตำบล </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelCurrentAddressPostcode" id="PersonnelCurrentAddressPostcode" value="<?= $PERSONNEL->PersonnelCurrentAddressPostcode ?>">
                                    <label for="PersonnelCurrentAddressPostcode">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelCurrentPhoneNumber" id="PersonnelCurrentPhoneNumber" value="<?= $PERSONNEL->PersonnelCurrentPhoneNumber ?>">
                                    <label for="PersonnelCurrentPhoneNumber">หมายเลขโทรศัพท์</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="PersonnelEmail" id="PersonnelEmail" value="<?= $PERSONNEL->PersonnelEmail ?>">
                                    <label for="PersonnelEmail">อีเมลล์</label>
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