<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดอาคาร
                    -
                    <?php
                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        echo $SCHOOL->SchoolNameThai;
                    }
                    ?>
                </h1>
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
                        <h5 class="card-title"><span></span> <a href="school?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school-building?SchoolID=<?= $_GET['SchoolID']; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่ออาคาร</th>
                            <th scope="col">ประเภทสิ่งก่อสร้าง</th>
                            <th scope="col">วันที่เริ่มก่อสร้าง</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                     FROM SCHOOL_BUILDING 
                                        INNER JOIN SCHOOL ON SCHOOL_BUILDING.SchoolID = SCHOOL.SchoolID 
                                        INNER JOIN CLS_BUILDING_TYPE ON SCHOOL_BUILDING.BuildingTypeCode  = CLS_BUILDING_TYPE.BUILDING_TYPE_CODE 
                                        INNER JOIN CLS_BUILDING_DESIGN ON SCHOOL_BUILDING.BuildingDesignCode  = CLS_BUILDING_DESIGN.BUILDING_DESIGN_CODE 
                                    WHERE SCHOOL_BUILDING.DeleteStatus = 0 AND SCHOOL_BUILDING.SchoolID = ' . $_GET['SchoolID'] . '
                                    ');

                        foreach ($result->result() as $SCHOOL_BUILDING) {
                        ?>
                            <tr>
                                <td><?= $SCHOOL_BUILDING->BuildingName; ?></td>
                                <td><?= $SCHOOL_BUILDING->BUILDING_TYPE_NAME; ?></td>
                                <td><?= DateThai($SCHOOL_BUILDING->BuildingConstructionDate); ?></td>
                                <td style="text-align: center;"><a href="edit-forms-building?SchoolID=<?= $SCHOOL_BUILDING->SchoolID; ?>&&Id=<?= $SCHOOL_BUILDING->Id; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $SCHOOL_BUILDING->SchoolID; ?><?= $SCHOOL_BUILDING->BuildingName; ?><?= $SCHOOL_BUILDING->BuildingTypeCode; ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
$result = $this->db->query('SELECT *
 FROM SCHOOL_BUILDING
 WHERE SCHOOL_BUILDING.DeleteStatus = 0 AND SCHOOL_BUILDING.SchoolID = ' . $_GET['SchoolID'] . '
 ');

foreach ($result->result() as $SCHOOL_BUILDING) {
?>
    <div class="modal fade" id="Delete<?= $SCHOOL_BUILDING->SchoolID; ?><?= $SCHOOL_BUILDING->BuildingName; ?><?= $SCHOOL_BUILDING->BuildingTypeCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-building/'  . $SCHOOL_BUILDING->SchoolID . '/' . $SCHOOL_BUILDING->Id);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>