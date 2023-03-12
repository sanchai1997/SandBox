<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรายละเอียดห้องเรียน -
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
                        <li class="breadcrumb-item active">Classrom-Detail</li>
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
                        <h5 class="card-title">รายละเอียดข้อมูล<span>| Table School-Classroom</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="school-classroom" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อระดับชั้น</th>
                            <th style="text-align: center;" scope="col">จำนวนห้องเรียน</th>
                            <th style="text-align: center;" scope="col">แก้ไขข้อมูล</th>
                            <th style="text-align: center;" scope="col">ลบข้อมูล</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $this->db->query('SELECT *  FROM SCHOOL_CLASSROOM 
                                INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID 
                                INNER JOIN CLS_GRADE_LEVEL ON SCHOOL_CLASSROOM.ClassroomGradeLevelCode  = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE 
                                WHERE SCHOOL_CLASSROOM.SchoolID = ' . $_GET['SchoolID'] . ' AND SCHOOL_CLASSROOM.DeleteStatus = 0');
                        foreach ($result->result() as $CLASSROOM) {
                        ?>
                            <tr>
                                <?php
                                ?>
                                <td><?= $CLASSROOM->GRADE_LEVEL_NAME; ?></td>
                                <td style="text-align: center;">
                                    <?= $CLASSROOM->ClassroomAmount; ?>
                                </td>
                                <td style="text-align: center;"><a href="edit-forms-classroom?SchoolID=<?= $CLASSROOM->SchoolID; ?>&&ClassroomGradeLevelCode=<?= $CLASSROOM->ClassroomGradeLevelCode; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td style="text-align: center;"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $CLASSROOM->SchoolID; ?><?= $CLASSROOM->ClassroomGradeLevelCode; ?>"><i class=" bi bi-trash"></i></button></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->


<?php

$result = $this->db->query('SELECT *  FROM SCHOOL_CLASSROOM 
    INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID 
    INNER JOIN CLS_GRADE_LEVEL ON SCHOOL_CLASSROOM.ClassroomGradeLevelCode  = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE 
    WHERE SCHOOL_CLASSROOM.SchoolID = ' . $_GET['SchoolID'] . '');
foreach ($result->result() as $CLASSROOM) {
?>
    <div class="modal fade" id="Delete<?= $CLASSROOM->SchoolID; ?><?= $CLASSROOM->ClassroomGradeLevelCode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-classroom/' . $CLASSROOM->SchoolID . '/' . $CLASSROOM->ClassroomGradeLevelCode);
                                ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>