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
                        <form class="row g-3" action="<?php echo base_url('update-personnel-contract/' . $_GET['PersonnelID'] . '/' . $_GET['JurisdictionCode'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode']); ?>" method="POST" id="Personnel" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลการว่าจ้าง</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="ContractNumber" id="ContractNumber" value="<?= $PERSONNEL->ContractNumber ?>">
                                    <label for="ContractNumber">เลขที่สัญญา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="2" name="ContractTimes" id="ContractTimes" value="<?= $PERSONNEL->ContractTimes ?>">
                                    <label for="ContractTimes">จำนวนครั้งที่ทำสัญญา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="ContractTypeCode" id="ContractTypeCode" aria-label="ContractTypeCode">
                                        <?php if ($PERSONNEL->MarriageStatusCode == NULL) { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE');
                                        foreach ($result->result() as $CONTRACT_TYPE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->ContractTypeCode == $CONTRACT_TYPE->CONTRACT_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $CONTRACT_TYPE->CONTRACT_TYPE_CODE; ?>"><?= $CONTRACT_TYPE->CONTRACT_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="ContractTypeCode">ลักษณะการจ้าง </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="2" name="ContractYear" id="ContractYear" value="<?= $PERSONNEL->ContractYear ?>">
                                    <label for="ContractYear">จ้างมาแล้วกี่ปี</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="ContractStartDate" id="ContractStartDate" value="<?php if ($PERSONNEL->ContractStartDate != NULL) {
                                                                                                                                        echo $PERSONNEL->ContractStartDate;
                                                                                                                                    } ?>">
                                    <label for="ContractStartDate">วันที่เริ่มต้นสัญญา</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="ContractEndDate" id="ContractEndDate" value="" <?php if ($PERSONNEL->ContractEndDate != NULL) {
                                                                                                                                        echo $PERSONNEL->ContractEndDate;
                                                                                                                                    } ?>">
                                    <label for="ContractEndDate">วันที่สิ้นสุดต้นสัญญา</label>
                                </div>
                            </div>

                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลเงินเดือนและเงินอื่นๆ</h6>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="SalaryTypeCode" id="SalaryTypeCode" aria-label="SalaryTypeCode">
                                        <?php if ($PERSONNEL->MarriageStatusCode == NULL) { ?>
                                            <option value="" selected>เลือก</option>
                                        <?php }
                                        $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE');
                                        foreach ($result->result() as $SALARY_TYPE) {
                                        ?>
                                            <option <?php if ($PERSONNEL->SalaryTypeCode == $SALARY_TYPE->SALARY_TYPE_CODE) {
                                                        echo 'selected';
                                                    } ?> value="<?= $SALARY_TYPE->SALARY_TYPE_CODE; ?>"><?= $SALARY_TYPE->SALARY_TYPE_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="SalaryTypeCode">ประเภทเงินงบประมาณ </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="7" name="CurrentSalary" id="CurrentSalary" value="<?= $PERSONNEL->CurrentSalary ?>">
                                    <label for="CurrentSalary">เงินเดือนปัจุบัน</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="7" name="AcademicSalary" id="AcademicSalary" value="<?= $PERSONNEL->AcademicSalary ?>">
                                    <label for="AcademicSalary">เงินวิทยฐานะ</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="7" name="CompensationSalary" id="CompensationSalary" value="<?= $PERSONNEL->CompensationSalary ?>">
                                    <label for="CompensationSalary">เงินค่าตอบแทน</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="7" name="EmolumentsSalary" id="EmolumentsSalary" value="<?= $PERSONNEL->EmolumentsSalary ?>">
                                    <label for="EmolumentsSalary">เงินประจำตำแหน่ง</label>
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

</main><!-- End #main -->