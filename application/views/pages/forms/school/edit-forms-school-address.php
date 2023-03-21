<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลที่ตั้ง
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
                        <form class="row g-3" action="<?php echo base_url('update-school-address/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>

                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolAddressHouseNumber" value="<?= $SCHOOL->SchoolAddressHouseNumber ?>">
                                    <label for="SchoolAddressHouseNumber">บ้านเลขที่</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="SchoolAddressMoo" value="<?= $SCHOOL->SchoolAddressMoo ?>">
                                        <label for="OFFICIAL_SchoolAddressMoo">หมู่ที่</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolAddressStreet" value="<?= $SCHOOL->SchoolAddressStreet ?>">
                                    <label for="SchoolAddressStreet">ถนน</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolAddressSoi" value="<?= $SCHOOL->SchoolAddressSoi ?>">
                                    <label for="SchoolAddressSoi">ซอย</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolAddressTrok" value="<?= $SCHOOL->SchoolAddressTrok ?>">
                                    <label for="SchoolAddressTrok">ตรอก</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolAddressPostcode" value="<?= $SCHOOL->SchoolAddressPostcode ?>">
                                    <label for="OFFICIAL_ADDRESS_POSTCODE">รหัสไปรษณีย์</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="PROVINCE" name="SchoolAddressProvinceCode" id="SchoolAddressProvinceCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = 91');
                                        foreach ($result->result() as $PROVINCE) {
                                        ?>
                                            <option <?php if ($SCHOOL->SchoolAddressProvinceCode == $PROVINCE->PROVINCE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $PROVINCE->PROVINCE_CODE; ?>"><?= $PROVINCE->PROVINCE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SchoolAddressProvinceCode">จังหวัด <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="DISTRICT" name="SchoolAddressDistrictCode">
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE PROVINCE_CODE = 91');
                                        foreach ($result->result() as $DISTRICT) {
                                        ?>
                                            <option <?php if ($SCHOOL->SchoolAddressDistrictCode == $DISTRICT->DISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $DISTRICT->DISTRICT_CODE; ?>"><?= $DISTRICT->DISTRICT_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="SchoolAddressDistrictCode">อำเภอ <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="SUBDISTRICT" aria-label="SUBDISTRICT" name="SchoolAddressSubdistrictCode">
                                        <option value="" selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE PROVINCE_CODE = 91');
                                        foreach ($result->result() as $SUBDISTRICT) {
                                        ?>
                                            <option <?php if ($SCHOOL->SchoolAddressSubdistrictCode == $SUBDISTRICT->SUBDISTRICT_CODE) {
                                                        echo 'selected';
                                                    } ?> id="<?= $SUBDISTRICT->DISTRICT_CODE; ?>" value="<?= $SUBDISTRICT->SUBDISTRICT_CODE; ?>"><?= $SUBDISTRICT->SUBDISTRICT_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="SchoolAddressSubdistrictCode">ตำบล <font color="red"> *</font></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolLatitude" id="SchoolLatitude" value="<?= $SCHOOL->SchoolLatitude ?>">
                                    <label for="SchoolLatitude">ค่าตำแหน่งพิกัดทาง Latitude</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolLongitude" id="SchoolLongitude" value="<?= $SCHOOL->SchoolLongitude ?>">
                                    <label for="SchoolLongitude">ค่าตำแหน่งพิกัดทาง Longitude</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="SchoolMapURL" id="SchoolMapURL" value="<?= $SCHOOL->SchoolMapURL ?>">
                                    <label for="SchoolMapURL">ลิงค์แผนที่</label>
                                </div>
                            </div>


                        <?php } ?>
                        <div class="d-flex justify-content-between">
                            <a href="school" class="btn btn-danger">ยกเลิก</a>
                            <button type="button" class="btn btn-warning" onclick="return check(School)">แก้ไขข้อมูล</button>
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

            //SchoolAddressProvinceCode
            if (frm.SchoolAddressProvinceCode.value == "") {
                alert("กรุณาเลือกจังหวัด");
                return false;
            }
            //SchoolAddressDistrictCode
            if (frm.DISTRICT.value == "") {
                alert("กรุณาเลือกอำเภอ");
                return false;
            } //SchoolAddressSubdistrictCode
            if (frm.SUBDISTRICT.value == "") {
                alert("กรุณาเลือกตำบล");
                return false;
            }

            $('#Modal').modal('show');
        }
    </script>
</main><!-- End #main -->