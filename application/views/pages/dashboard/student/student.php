<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลนักเรียน</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </nav>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Student</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-student" class="btn btn-success">เพิ่มข้อมูลนักเรียน</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">ปีการศึกษา</th>
                            <th style="text-align: center;" scope="col">ภาคเรียน</th>
                            <th style="text-align: center;" scope="col">ระดับการศึกษา</th>
                            <th style="text-align: center;" scope="col">ชั้นเรียน</th>
                            <th style="text-align: center;" scope="col">ดูรายชื่อนักเรียน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT SCHOOL.SchoolNameThai, STUDENT.SchoolID, STUDENT.EducationYear, STUDENT.EducationLevelCode, STUDENT.GradeLevelCode, STUDENT.Semester, CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_NAME, CLS_GRADE_LEVEL.GRADE_LEVEL_NAME FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_EDUCATION_LEVEL ON STUDENT.EducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                        INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                        WHERE STUDENT.DeleteStatus = 0');
                        foreach ($result->result() as $STUDENT) {
                        ?>
                            <tr>
                                <td><?= $STUDENT->SchoolNameThai; ?></td>
                                <td><?= $STUDENT->EducationYear; ?></td>
                                <td><?= $STUDENT->Semester; ?></td>
                                <td><?= $STUDENT->EDUCATION_LEVEL_NAME; ?></td>
                                <td><?= $STUDENT->GRADE_LEVEL_NAME; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn btn-primary" href="student-P2?SchoolID=<?= $STUDENT->SchoolID; ?>&&EducationYear=<?= $STUDENT->EducationYear; ?>&&Semester=<?= $STUDENT->Semester; ?>&&EducationLevelCode=<?= $STUDENT->EducationLevelCode; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->