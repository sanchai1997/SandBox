<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรายชื่อนักเรียน
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
                        <h5 class="card-title">รายละเอียดข้อมูล<span></span> <a href="transcript" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>

                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">หมายเลขประจำตัวนักเรียน</th>
                            <th scope="col">คำนำหน้าชื่อ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th style="text-align: center;" scope="col">สถานะภาพนักเรียน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['SchoolID'])) {
                            $result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.SchoolID = ' . $_GET['SchoolID'] . ' AND STUDENT.EducationYear = ' . $_GET['EducationYear'] . ' AND STUDENT.Semester = ' . $_GET['Semester'] . ' AND STUDENT.EducationLevelCode = ' . $_GET['EducationLevelCode'] . ' AND STUDENT.GradeLevelCode = ' . $_GET['GradeLevelCode'] . '
                        ');
                            foreach ($result->result() as $STUDENT) {
                        ?>
                                <tr>
                                    <?php
                                    ?>
                                    <td><?= $STUDENT->StudentID; ?></td>
                                    <td><?= $STUDENT->PREFIX_NAME; ?></td>
                                    <td><?= $STUDENT->StudentNameThai; ?></td>
                                    <td><?= $STUDENT->StudentLastNameThai; ?></td>
                                    <td>
                                        <center><?= $STUDENT->STUDENT_STATUS_NAME; ?></center>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="transcript-P3?StudentReferenceID=<?= $STUDENT->StudentReferenceID; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->