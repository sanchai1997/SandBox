<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลบุคลากรอื่น</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลทั่วไปข้อมูลบุคลากรอื่น</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-personnel'); ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ปีที่เก็บข้อมูล</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="EntryYear">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">รอบที่เก็บข้อมูล</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="EntryTimes">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">หน่วยงานต้นสกัด</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="JurisdictionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                                        foreach ($result->result() as $JURISDICTION) {
                                        ?>
                                            <option value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">สถานะปฏิบัติราชการ</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="PersonnelStatusCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS');
                                        foreach ($result->result() as $PERSONNEL_STATUS) {
                                        ?>
                                            <option value="<?= $PERSONNEL_STATUS->PERSONNEL_STATUS_CODE; ?>"><?= $PERSONNEL_STATUS->PERSONNEL_STATUS_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันที่บรรจุ</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="PersonnelStartDate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันเกษียณ</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="PersonnelRetireDate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ประเภทบุคลากร</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="PersonnelTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE');
                                        foreach ($result->result() as $PERSONNEL_TYPE) {
                                        ?>
                                            <option value="<?= $PERSONNEL_TYPE->PERSONNEL_TYPE_CODE; ?>"><?= $PERSONNEL_TYPE->PERSONNEL_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ชื่อตำแหน่ง</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="PositionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION');
                                        foreach ($result->result() as $POSITION) {
                                        ?>
                                            <option value="<?= $POSITION->POSITION_CODE; ?>"><?= $POSITION->POSITION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับตำแหน่ง</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="PositionLevelCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL');
                                        foreach ($result->result() as $POSITION_LEVEL) {
                                        ?>
                                            <option value="<?= $POSITION_LEVEL->POSITION_LEVEL_CODE; ?>"><?= $POSITION_LEVEL->POSITION_LEVEL_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันที่ดำรงตำแหน่ง</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="PositionStartDate">
                                </div>
                            </div>
                            <h5 class="card-title">ข้อมูลว่าจ้าง</h5>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">เลขที่สัญญา</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ContractNumber">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">จำนวนครั้งที่ทำสัญญา</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ContractTimes">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ลักษณะการจ้าง</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="ContractTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE');
                                        foreach ($result->result() as $CONTRACT_TYPE) {
                                        ?>
                                            <option value="<?= $CONTRACT_TYPE->CONTRACT_TYPE_CODE; ?>"><?= $CONTRACT_TYPE->CONTRACT_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">จ้างมาแล้วกี่ปี</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="ContractYear">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มต้นสัญญา</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="ContractStartDate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันที่สิ้นสุดสัญญา</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="ContractEndDate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ประเภทเงินงบประมาณ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="SalaryTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE');
                                        foreach ($result->result() as $SALARY_TYPE) {
                                        ?>
                                            <option value="<?= $SALARY_TYPE->SALARY_TYPE_CODE; ?>"><?= $SALARY_TYPE->SALARY_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">เงินเดือนปัจจุบัน</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="CurrentSalary">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">เงินวิทยฐานะ</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="AcademicSalary">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">เงินค่าตอบแทน</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="CompensationSalary">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">เงินประจำตำแหน่ง</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="EmolumentsSalary">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ความสามารถพิเศษ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="PersonnelTalentCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_TALENT');
                                        foreach ($result->result() as $TALENT) {
                                        ?>
                                            <option value="<?= $TALENT->TALENT_CODE; ?>"><?= $TALENT->TALENT_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="text-center">
                                <a href="personnel" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADD">บันทึกข้อมูล</button>
                            </div>
                            <div class="modal fade" id="ADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันเพิ่มข้อมูล</h5>
                                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                        </div>
                                        <div class="modal-body">
                                            <h6>
                                                <center>คุณต้องการเพิ่มข้อมูลใช่หรือไหม ?</center>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="PersonnelID" value="<?= $_POST['PersonnelPersonalIDTypeCode']; ?><?= $_POST['PersonnelPersonalID']; ?>">
                            <input type="hidden" name="PersonnelPrefixCode" value="<?= $_POST['PersonnelPrefixCode']; ?>">
                            <input type="hidden" name="PersonnelNameThai" value="<?= $_POST['PersonnelNameThai']; ?>">
                            <input type="hidden" name="PersonnelMiddleNameThai" value="<?= $_POST['PersonnelMiddleNameThai']; ?>">
                            <input type="hidden" name="PersonnelLastNameThai" value="<?= $_POST['PersonnelLastNameThai']; ?>">
                            <input type="hidden" name="PersonnelNameEnglish" value="<?= $_POST['PersonnelNameEnglish']; ?>">
                            <input type="hidden" name="PersonnelMiddleNameEnglish" value="<?= $_POST['PersonnelMiddleNameEnglish']; ?>">
                            <input type="hidden" name="PersonnelLastNameEnglish" value="<?= $_POST['PersonnelLastNameEnglish']; ?>">
                            <input type="hidden" name="PersonnelPersonalIDTypeCode" value="<?= $_POST['PersonnelPersonalIDTypeCode']; ?>">
                            <input type="hidden" name="PersonnelPersonalID" value="<?= $_POST['PersonnelPersonalID']; ?>">
                            <input type="hidden" name="PersonnelPassportNumber" value="<?= $_POST['PersonnelPassportNumber']; ?>">
                            <input type="hidden" name="PersonnelGenderCode" value="<?= $_POST['PersonnelGenderCode']; ?>">
                            <input type="hidden" name="PersonnelBirthDate" value="<?= $_POST['PersonnelBirthDate']; ?>">
                            <input type="hidden" name="PersonnelNationalityCode" value="<?= $_POST['PersonnelNationalityCode']; ?>">
                            <input type="hidden" name="PersonnelRaceCode" value="<?= $_POST['PersonnelRaceCode']; ?>">
                            <input type="hidden" name="PersonnelReligionCode" value="<?= $_POST['PersonnelReligionCode']; ?>">
                            <input type="hidden" name="PersonnelBloodCode" value="<?= $_POST['PersonnelBloodCode']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressHouseNumber" value="<?= $_POST['PersonnelOfficialAddressHouseNumber']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressMoo" value="<?= $_POST['PersonnelOfficialAddressMoo']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressStreet" value="<?= $_POST['PersonnelOfficialAddressStreet']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressSoi" value="<?= $_POST['PersonnelOfficialAddressSoi']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressTrok" value="<?= $_POST['PersonnelOfficialAddressTrok']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressProvinceCode" value="<?= $_POST['PersonnelOfficialAddressProvinceCode']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressDistrictCode" value="<?= $_POST['PersonnelOfficialAddressDistrictCode']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressSubdistrictCode" value="<?= $_POST['PersonnelOfficialAddressSubdistrictCode']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressPostcode" value="<?= $_POST['PersonnelOfficialAddressPostcode']; ?>">
                            <input type="hidden" name="PersonnelOfficialAddressPhoneNumber" value="<?= $_POST['PersonnelOfficialAddressPhoneNumber']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressHouseNumber" value="<?= $_POST['PersonnelCurrentAddressHouseNumber']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressMoo" value="<?= $_POST['PersonnelCurrentAddressMoo']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressStreet" value="<?= $_POST['PersonnelCurrentAddressStreet']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressSoi" value="<?= $_POST['PersonnelCurrentAddressSoi']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressTrok" value="<?= $_POST['PersonnelCurrentAddressTrok']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressProvinceCode" value="<?= $_POST['PersonnelCurrentAddressProvinceCode']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressDistrictCode" value="<?= $_POST['PersonnelCurrentAddressDistrictCode']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressSubdistrictCode" value="<?= $_POST['PersonnelCurrentAddressSubdistrictCode']; ?>">
                            <input type="hidden" name="PersonnelCurrentAddressPostcode" value="<?= $_POST['PersonnelCurrentAddressPostcode']; ?>">
                            <input type="hidden" name="PersonnelCurrentPhoneNumber" value="<?= $_POST['PersonnelCurrentPhoneNumber']; ?>">
                            <input type="hidden" name="PersonnelEmail" value="<?= $_POST['PersonnelEmail']; ?>">


                        </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->