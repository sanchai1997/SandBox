<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดรางวัล
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
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school-award?SchoolID=<?= $_GET['SchoolID']; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีที่ได้รับรางวัล</th>
                            <th scope="col">ชื่อรางวัล</th>
                            <th scope="col">แหล่งที่มา</th>
                            <th scope="col">ระดับ</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT *
                                    FROM SCHOOL_AWARD 
                                    INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
                                    WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $_GET['SchoolID'] . '
                                    ');
                        $Count = 0;
                        foreach ($result->result() as $AWARD) {
                            $Count++;
                        ?>
                            <tr>
                                <td><?= $AWARD->AwardYear; ?></td>
                                <td><?= $AWARD->AwardName; ?></td>
                                <td>
                                    <?php if ($AWARD->AwardSource != NULL) {
                                        echo $AWARD->AwardSource;
                                    } else echo '-'; ?>
                                </td>
                                <td>
                                    <?php if ($AWARD->AwardLevelCode != NULL) {
                                        $result_fix = $this->db->query('SELECT *FROM CLS_AWARD_LEVEL 
                                        WHERE AWARD_LEVEL_CODE = ' . $AWARD->AwardLevelCode . '
                                        ');
                                        foreach ($result_fix->result() as $AWARD_LEVEL) {
                                            echo $AWARD_LEVEL->AWARD_LEVEL_NAME;
                                        }
                                    } else echo '-'; ?>
                                </td>
                                <td style="text-align: center;"><a href="edit-forms-award?SchoolID=<?= $AWARD->SchoolID; ?>&&AwardYear=<?= $AWARD->AwardYear; ?>&&AwardName=<?= $AWARD->AwardName; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $Count; ?>"><i class=" bi bi-trash"></i></button>
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
 FROM SCHOOL_AWARD 
 INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
 WHERE SCHOOL_AWARD.DeleteStatus = 0 AND SCHOOL_AWARD.SchoolID = ' . $_GET['SchoolID'] . '
 ');
$CountI = 0;
foreach ($result->result() as $AWARD) {
    $CountI++;
?>
    <div class="modal fade" id="Delete<?= $CountI; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-award/'  . $AWARD->ID . '/' . $AWARD->SchoolID . '/' . $AWARD->AwardYear);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>