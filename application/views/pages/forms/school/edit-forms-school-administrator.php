<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลผู้บริหาร
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
                        <form class="row g-3" action="<?php echo base_url('update-school-administrator/' . $SCHOOL->SchoolID); ?>" method="POST" id="School" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title"></h6>


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">หมายเลขบัตรประจำตัวประชาชน</label>
                                <div class="col-sm-8">
                                    <input type="text" name="AdministratorPersonalID" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AdministratorPrefixCode">
                                        <option value="" selected>คำนำหน้าชื่อ</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                        foreach ($result->result() as $PREFIX) {
                                        ?>
                                            <option value="<?= $PREFIX->PREFIX_CODE; ?>"><?= $PREFIX->PREFIX_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ชื่อ (ภาษาไทย)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="AdministratorNameThai" id="AdministratorNameThai" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ชื่อกลาง (ภาษาไทย)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="AdministratorMiddleNameThai" id="AdministratorMiddleNameThai" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">นามสกุล (ภาษาไทย)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="AdministratorLastNameThai" id="AdministratorLastNameThai" class="form-control">
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

            var NameThai = /^[ก-์]{1,255}$/;
            if (frm.AdministratorNameThai.value != "") {
                if (!frm.AdministratorNameThai.value.match(NameThai)) {
                    alert("กรุณากรอกชื่อเป็น(ภาษาไทย)");
                    frm.AdministratorNameThai.value = "";
                    return false;
                }
            }
            if (frm.AdministratorMiddleNameThai.value != "") {
                if (!frm.AdministratorMiddleNameThai.value.match(NameThai)) {
                    alert("กรุณากรอกชื่อเป็น(ภาษาไทย)");
                    frm.AdministratorMiddleNameThai.value = "";
                    return false;
                }
            }
            if (frm.AdministratorLastNameThai.value != "") {
                if (!frm.AdministratorLastNameThai.value.match(NameThai)) {
                    alert("กรุณากรอกชื่อเป็น(ภาษาไทย)");
                    frm.AdministratorLastNameThai.value = "";
                    return false;
                }
            }

            $('#Modal').modal('show');
        }
    </script>
</main><!-- End #main -->