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
                        <a href="transcript-P2?SchoolID=<?= $STUDENT->SchoolID; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $STUDENT->Semester; ?>&&EducationLevelCode=<?= $STUDENT->EducationLevelCode; ?>&&GradeLevelCode=<?= $STUDENT->GradeLevelCode; ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
                    </h1>
                </div>
            </div>
        <?php } ?>

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

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานใบแสดงผลการศึกษารายวิชา<span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">รหัววิชา</th>
                                <th style="text-align: center;" scope="col">ชื่อวิชา</th>
                                <th style="text-align: center;" scope="col">ประเภทรายวิชา</th>
                                <th style="text-align: center;" scope="col">กลุ่มสาระวิชา</th>
                                <th style="text-align: center;" scope="col">ผลการเรียน</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End Recent Sales -->

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานใบแสดงผลการศึกษากิจกรรมพัฒนาผู้เรียน<span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ชื่อกิจกรรม</th>
                                <th style="text-align: center;" scope="col">จำนวนชั่วโมง</th>
                                <th style="text-align: center;" scope="col">ผลประเมินกิจกรรม</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- End Recent Sales -->

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานใบแสดงผลการทดสอบระดับชาติ (ONET)<span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">กลุ่มสาระวิชา</th>
                                <th style="text-align: center;" scope="col">ผลการเรียน</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- End Recent Sales -->

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานใบแสดงผลการทดสอบระดับชาติ (NT)<span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">รหัสวิชา</th>
                                <th scope="col">ชื่อวิชา</th>
                                <th scope="col">ประเภทรายวิชา</th>
                                <th scope="col">กลุ่มสาระวิชา</th>
                                <th style="text-align: center;" scope="col">คะแนน</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- End Recent Sales -->

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานใบแสดงผลการทดสอบระดับชาติ (RT)<span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">ระดับการศึกษา</th>
                                <th style="text-align: center;" scope="col">ระดับชั้นปี</th>
                                <th style="text-align: center;" scope="col">คะแนนการอ่านออกเสียง</th>
                                <th style="text-align: center;" scope="col">คะแนนการอ่านรู้เรื่อง</th>
                                <th style="text-align: center;" scope="col">คะแนนรวม</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- End Recent Sales -->

        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">รายงานผลสมรรถนะ <span></span> </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-transcript" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ปีการศึกษา</th>
                                <th scope="col">ภาคเรียน</th>
                                <th scope="col">รหัสสมรรถนะ</th>
                                <th style="text-align: center;" scope="col">คะแนน</th>
                                <th style="text-align: center;" scope="col">ผลประเมินสมรถถนะ</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <a href="transcript-P3?StudentReferenceID=" class="btn btn-primary"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- End Recent Sales -->


    </main><!-- End #main -->