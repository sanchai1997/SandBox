<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลอาคาร -
            <?php
            $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
            foreach ($result->result() as $SCHOOL) {
                echo $SCHOOL->SchoolNameThai;
            }
            ?>
        </h1>
    </div><!-- End Page Title -->
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- General Form Elements -->
                        <form action="<?php echo base_url('add-building/' . $_GET['SchoolID']); ?>" method="POST" id="Building">
                            <!-- ID สถานศึกษา -->
                            <input type="hidden" value="<?= $_GET['SchoolID']; ?>" name="SchoolID">
                            <!-- END -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ชื่ออาคาร<font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="BuildingName" id="BuildingName">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ประเภทสิ่งก่อสร้าง <font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="BuildingTypeCode" id="BuildingTypeCode">
                                        <option value="" selected>เลือก</option>
                                        <?php foreach ($this->db->get("CLS_BUILDING_TYPE")->result() as $BUILDING_TYPE) { ?>
                                            <option value="<?= $BUILDING_TYPE->BUILDING_TYPE_CODE; ?>"><?= $BUILDING_TYPE->BUILDING_TYPE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">แบบสิ่งก่อสร้าง</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="BuildingDesignCode" id="BuildingDesignCode">
                                        <option value="" selected>เลือก</option>
                                        <?php foreach ($this->db->get("CLS_BUILDING_DESIGN")->result() as $BUILDING_DESIGN) { ?>
                                            <option value="<?= $BUILDING_DESIGN->BUILDING_DESIGN_CODE; ?>"><?= $BUILDING_DESIGN->BUILDING_DESIGN_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">รายละเอียด</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="BuildingDetail" id="BuildingDetail">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้อง<font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="BuildingRoom" id="BuildingRoom">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">วันที่่เริ่มก่อสร้าง<font color="red"> *</font></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="BuildingConstructionDate" id="BuildingConstructionDate">
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="school-building?SchoolID=<?= $_GET['SchoolID']; ?>" style="float: left;" class="btn btn-danger">ยกเลิก</a>
                                <button type="button" class="btn btn-primary" style="float: right;" onclick="return check(Building)">บันทึกข้อมูล</button>
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

                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>


        </div>
    </section>
    <script type="text/javascript">
        function check(frm) {

            var NameBuilding = /^[A-Z,a-z,ก-์,0-9]{1,255}$/;
            if (frm.BuildingName.value == "") {
                alert("กรุณากรอกชื่ออาคาร)");
                frm.BuildingName.value = "";
                return false;
            } else if (!frm.BuildingName.value.match(NameBuilding)) {
                alert("กรุณากรอกชื่ออาคารให้น้อยกว่า 255 อักษร");
                frm.BuildingName.value = "";
                return false;
            }

            if (frm.BuildingTypeCode.value == "") {
                alert("กรุณาเลือกประเภทสิ่งก่อสร้าง");
                return false;
            }

            if (frm.BuildingRoom.value == "") {
                alert("กรุณากรอกจำนวนห้องอาคาร");
                return false;
            }

            if (frm.BuildingConstructionDate.value == "") {
                alert("กรุณาเลือกวันที่เริ่มก่อสร้างอาคาร");
                return false;
            }

            $('#Modal').modal('show');

        }
    </script>
</main><!-- End #main -->