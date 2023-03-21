<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">

                <h1>ข้อมูลนักเรียน
                    <?php if (isset($_GET['SchoolID'])) { ?>
                        -
                        <?php
                        $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                        foreach ($result->result() as $SCHOOL) {
                            echo $SCHOOL->SchoolNameThai;
                        }
                        ?>
                    <?php } ?>
                </h1>

            </div>
            <div class="col-6" style="padding-right: 25px;">
            </div>
        </div>
    </div>

    <!-- End Page Title -->
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
                        <h1 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    เลือกสถานศึกษา
                                </button>
                                <?php if (isset($_GET['SchoolID'])) { ?>
                                    &nbsp;<a href="student" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
                                <?php } ?>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php
                                    $result = $this->db->query('SELECT * FROM SCHOOL WHERE DeleteStatus = 0');
                                    foreach ($result->result() as $SHOW_SCHOOL) {
                                    ?>
                                        <li>
                                            <a class="dropdown-item" href="?SchoolID=<?= $SHOW_SCHOOL->SchoolID  ?>"><?= $SHOW_SCHOOL->SchoolNameThai  ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </h1>
                    </div>
                    <div class="col">
                        <?php if (isset($_GET['SchoolID'])) {
                        ?>
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student?SchoolID=<?= $_GET['SchoolID'] ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        <?php } ?>
                    </div>
                </div>
                <?php if (!isset($_GET['SchoolID'])) { ?>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ตราสัญลักษณ์</th>
                                <th scope="col">ชื่อสถานศึกษา</th>
                                <th scope="col">พื้นที่นวัตกรรม</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
                            foreach ($result->result() as $SCHOOL) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><img src="image/school/<?= $SCHOOL->ImageSchool; ?>" alt="" width="90px" height="80px"></td>
                                    <td style="padding-top: 30px;"><?= $SCHOOL->SchoolNameThai; ?></td>
                                    <td style="padding-top: 30px;"><?= $SCHOOL->INNOVATION_AREA_NAME; ?></td>
                                    <td style="padding-top: 30px; text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else if (isset($_GET['SchoolID'])) { ?>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ระดับชั้นเรียน</th>
                                <th style="text-align: center;" scope="col">รายชื่อนักเรียน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * FROM STUDENT As st
                            INNER JOIN CLS_GRADE_LEVEL As gl ON st.GradeLevelCode = gl.GRADE_LEVEL_CODE
                            WHERE st.DeleteStatus = 0
                            GROUP BY st.EducationYear, st.Semester, st.GradeLevelCode
                            ');
                            foreach ($result->result() as $STUDENT) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><img src="image/school/<?= $STUDENT->EducationYear; ?>" alt="" width="90px" height="80px"></td>
                                    <td style="padding-top: 30px;"><?= $STUDENT->Semester; ?></td>
                                    <td style="padding-top: 30px;"><?= $STUDENT->EDUCATION_LEVEL_NAME; ?></td>
                                    <td style="padding-top: 30px; text-align: center;"><a href="?SchoolID=<?= $SCHOOL->SchoolID; ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&EducationLevelCode=<?= $STUDENT->EducationLevelCode; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                <?php } ?>

            </div>



        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
$result = $this->db->query('SELECT * FROM SCHOOL INNER JOIN CLS_INNOVATION_AREA ON SCHOOL.InnovationAreaCode = CLS_INNOVATION_AREA.INNOVATION_AREA_CODE WHERE DeleteStatus = 0');
foreach ($result->result() as $SCHOOL) {
?>
    <div class="modal fade" id="Delete<?= $SCHOOL->SchoolID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <a href="<?php echo base_url('delete-school/' . $SCHOOL->SchoolID); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>