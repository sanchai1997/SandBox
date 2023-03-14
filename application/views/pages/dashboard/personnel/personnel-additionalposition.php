<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <?php
                $result = $this->db->query('SELECT *  FROM PERSONNEL WHERE PersonnelID = "' . $_GET['PersonnelID'] . '"');
                foreach ($result->result() as $PERSONNEL) {
                ?>
                    <h1>ตำแหน่งหน้าที่เพิ่มเติม - <?= $PERSONNEL->PersonnelNameThai; ?> <?= $PERSONNEL->PersonnelLastNameThai; ?>
                    <?php } ?>
                    </h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="main">Home</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Table Additional Position</li>
                        </ol>
                    </nav>
            </div>

        </div>
    </div><!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-check"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span style="padding-right:10px">| Table Additional Position</span> <a href="personnel" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-additionalposition" class="btn btn-success ">เพิ่มข้อมูลตำแหน่งหน้าที่เพิ่มเติม</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อตำแหน่งหน้าที่พิ่มเติม</th>
                            <th scope="col">กลุ่ม/หมวด ที่ปฏิบัติหน้าที่เพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">วันที่เริ่มปฏิบัติหน้าที่เพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">คำสั่งให้ปฎิบัติหน้าที่เพิ่มเติม</th>
                            <th style="text-align: center;" scope="col">หมายเหตุ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *  FROM PERSONNEL_ADDITIONAL_POSITION 
                        INNER JOIN CLS_DEPARTMENT ON PERSONNEL_ADDITIONAL_POSITION.AdditionalDepartmentCode = CLS_DEPARTMENT.DEPARTMENT_CODE
                        WHERE PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $ADDITIONAL_POSITION) {
                        ?>
                            <tr>
                                <td><?= $ADDITIONAL_POSITION->AdditionalPosition ?></td>
                                <td><?= $ADDITIONAL_POSITION->DEPARTMENT_NAME ?></td>
                                <td><?= DateThai($ADDITIONAL_POSITION->AdditionalDutyDate); ?></td>
                                <td><?= $ADDITIONAL_POSITION->AdditionalCommand ?></td>
                                <td><?= $ADDITIONAL_POSITION->AdditionalComment ?></td>
                                <td style="text-align: center;"><a href="edit-forms-award" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <h6>
                    <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                </h6>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('delete-award/');
                            ?>" class="btn btn-danger">ลบ</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>