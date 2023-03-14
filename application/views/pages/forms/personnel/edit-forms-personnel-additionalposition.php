<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<?php
$result = $this->db->query('SELECT *  FROM PERSONNEL_ADDITIONAL_POSITION 
                        INNER JOIN CLS_DEPARTMENT ON PERSONNEL_ADDITIONAL_POSITION.AdditionalDepartmentCode = CLS_DEPARTMENT.DEPARTMENT_CODE
                        WHERE JurisdictionCode = ' . $_GET['JurisdictionCode'] . ' AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
foreach ($result->result() as $ADDITIONAL_POSITION) {
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>แก้ไขข้อมูลตำแหน่งหน้าที่เพิ่มเติม</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active">Edit-Additional-Position </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="<?php echo base_url('update-additionalposition/' . $ADDITIONAL_POSITION->PersonnelID . '/' . $ADDITIONAL_POSITION->JurisdictionCode); ?>" method="POST" enctype="multipart/form-data">
                                <h5 class="card-title">เพิ่มตำแหน่งที่เพิ่มเติม</h5>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ตำแหน่งหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AdditionalPosition" value="<?= $ADDITIONAL_POSITION->AdditionalPosition; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">กลุ่ม/หมวด ที่ปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="AdditionalDepartmentCode">
                                            <?php
                                            $result = $this->db->query('SELECT * FROM CLS_DEPARTMENT');
                                            foreach ($result->result() as $DEPARTMENT) {
                                            ?>
                                                <option <?php if ($ADDITIONAL_POSITION->DEPARTMENT_CODE == $DEPARTMENT->DEPARTMENT_CODE) {
                                                            echo 'selected';
                                                        } ?>value="<?= $DEPARTMENT->DEPARTMENT_CODE; ?>"><?= $DEPARTMENT->DEPARTMENT_NAME; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="AdditionalDutyDate" value="<?= $ADDITIONAL_POSITION->AdditionalDutyDate; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">คำสั่งให้ปฏิบัติหน้าที่เพิ่มเติม</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AdditionalCommand" value="<?= $ADDITIONAL_POSITION->AdditionalCommand; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="AdditionalComment" value="<?= $ADDITIONAL_POSITION->AdditionalComment; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">เอกสารแนบ</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="AdditionalDocumentURL">
                                    </div>
                                </div>
                                <input type="hidden" name="PersonnelID" value="<?= $_GET['PersonnelID']; ?>">
                                <div class="text-center">
                                    <a href="personnel-additionalposition?PersonnelID=<?= $_GET['PersonnelID']; ?>" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                    <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                    <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDIT">บันทึกข้อมูล</button>
                                </div>
                                <div class="modal fade" id="EDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                                                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form> <!-- end Form ข้อมูลวุฒิการศึกษาของบุคลากรอื่น -->

                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
<?php } ?>