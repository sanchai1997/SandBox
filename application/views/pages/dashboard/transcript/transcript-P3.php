<?php
$result = $this->db->query('SELECT * FROM STUDENT
                        INNER JOIN SCHOOL ON STUDENT.SchoolID = SCHOOL.SchoolID
                        INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                        INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                        WHERE STUDENT.DeleteStatus = 0  AND STUDENT.StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" 
                        ');
foreach ($result->result() as $STUDENT) {
?>
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col-12">
                    <h1>ข้อมูลนักเรียน : หมายเลขบัตรประจำตัวนักเรียน <?= $STUDENT->StudentID; ?> <?= $STUDENT->StudentNameThai; ?> <?= $STUDENT->StudentLastNameThai; ?>

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
                            <h5 class="card-title">รายงานใบแสดงผลการศึกษา<span></span> <a href="transcript-P2?SchoolID=<?= $STUDENT->SchoolID; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $STUDENT->Semester; ?>&&EducationLevelCode=<?= $STUDENT->EducationLevelCode; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript?StudentReferenceID=<?= $STUDENT->StudentReferenceID; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                <?php } ?>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ใบแสดงผลการศึกษา</th>
                            <th scope="col">ดาวน์โหลดใบแสดงผลการศึกษา</th>
                            <th scope="col">พิมพ์ใบแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * FROM TRANSCRIPT
                                                    WHERE TRANSCRIPT.DeleteStatus = 0  AND TRANSCRIPT.StudentReferenceID = "' . $_GET['StudentReferenceID'] . '" 
                                                    ');
                        foreach ($result->result() as $STUDENT) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-file-earmark-text"></i></a></td>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-file-arrow-down"></i></a></td>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-printer"></i></a></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P4?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                </div>


            </div>
        </div><!-- End Recent Sales -->
    </main><!-- End #main -->