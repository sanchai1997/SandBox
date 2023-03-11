<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรายละเอียดรางวัล
                    -
                    <?php
                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        echo $SCHOOL->SchoolNameThai;
                    }
                    ?>
                </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Award</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="school-award" style="float: right;" class="btn btn-sm btn-light" active data-mdb-ripple-color="dark">ข้อมูลรางวัลสถานศึกษา</a>
                <a href="school-classroom" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลห้องเรียนสถานศึกษา</a>
                <a href="school" style="float: right; " class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลสถานศึกษา</a>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School-Award</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="school-award" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีที่ได้รับรางวัล</th>
                            <th scope="col">ชื่อรางวัล</th>
                            <th style="text-align: center;" scope="col">แหล่งที่มา</th>
                            <th style="text-align: center;" scope="col">ระดับ</th>
                            <th style="text-align: center;" scope="col">แก้ไขข้อมูล</th>
                            <th style="text-align: center;" scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM SCHOOL_AWARD 
                                    INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
                                    INNER JOIN CLS_AWARD_LEVEL ON SCHOOL_AWARD.AwardLevelCode = CLS_AWARD_LEVEL.CLS_AWARD_LEVEL_CODE
                                    WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $_GET['SchoolID'] . '
                                    ');

                        foreach ($result->result() as $AWARD) {
                        ?>
                            <tr>
                                <td><?= $AWARD->AwardYear; ?></td>
                                <td><?= $AWARD->AwardName; ?></td>
                                <td><?= $AWARD->AwardSource; ?></td>
                                <td><?= $AWARD->CLS_AWARD_LEVEL_NAME; ?></td>
                                <td style="text-align: center;"><a href="edit-forms-award?SchoolID=<?= $AWARD->SchoolID; ?>&&AwardYear=<?= $AWARD->AwardYear; ?>&&AwardName=<?= $AWARD->AwardName; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td style="text-align: center;"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $AWARD->SchoolID; ?><?= $AWARD->AwardYear; ?><?= $AWARD->AwardName; ?>"><i class=" bi bi-trash"></i></button></td>
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
 FROM SCHOOL_AWARD 
 INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
 INNER JOIN CLS_AWARD_LEVEL ON SCHOOL_AWARD.AwardLevelCode = CLS_AWARD_LEVEL.CLS_AWARD_LEVEL_CODE
 WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $_GET['SchoolID'] . '
 ');

foreach ($result->result() as $AWARD) {
?>
    <div class="modal fade" id="Delete<?= $AWARD->SchoolID; ?><?= $AWARD->AwardYear; ?><?= $AWARD->AwardName; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('delete-award/'  . $AWARD->SchoolID . '/' . $AWARD->AwardYear . '/' . $AWARD->AwardName);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>