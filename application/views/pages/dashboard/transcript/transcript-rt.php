<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-12">
                <h1>ผลการประเมินความสามารถด้านการอ่าน : ใบแสดงผลการศึกษาชุดที่
                    <?php if (isset($_GET['TranscriptSeriesNumber'])) {
                        echo $_GET['TranscriptSeriesNumber'] . ' - ' . $_GET['TranscriptNumber'];
                    } ?>
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
                    <div class="col-9">
                        <h1 class="card-title">
                            <?php if (isset($_GET['SchoolID'])) { ?>
                                <a href="transcript?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                            <?php }
                            $result = $this->db->query('SELECT * FROM CLS_GRADE_LEVEL WHERE GRADE_LEVEL_CODE = ' . $_GET['GradeLevelCode'] . '');
                            foreach ($result->result() as $GRADE_LEVEL) {
                                $GRADE_NAME = $GRADE_LEVEL->GRADE_LEVEL_NAME;
                            }
                            ?>
                            <a class="btn btn-sm btn-light text-dark"><b> ปีการศึกษา: <?= $_GET['EducationYear'] ?>&nbsp; ภาคเรียน: <?= $_GET['Semester'] ?> &nbsp;ระดับชั้นเรียน: <?= $GRADE_NAME ?> &nbsp;รหัสนักเรียน: <?= $_GET['StudentID'] ?></b></a>
                        </h1>
                    </div>
                    <div class="col-3">
                        <h5 style="float: right; padding: 15px;" class="card-title">
                            <a href="forms-transcript-rt?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus">
                                </i> เพิ่มข้อมูล
                            </a>
                        </h5>
                    </div>
                </div>

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีการศึกษา</th>
                            <th scope="col">ภาคเรียน</th>
                            <th scope="col">ระดับการศึกษา</th>
                            <th scope="col">ระดับชั้นปี</th>
                            <th style="text-align: center;" scope="col">อ่านออกเสียง</th>
                            <th style="text-align: center;" scope="col">อ่านรู้เรื่อง</th>
                            <th style="text-align: center;" scope="col">คะแนนเฉลี่ย</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * FROM TRANSCRIPT_RT 
                        INNER JOIN CLS_EDUCATION_LEVEL ON TRANSCRIPT_RT.RTEducationLevelCode = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                        INNER JOIN CLS_GRADE_LEVEL ON TRANSCRIPT_RT.RTGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                        WHERE DeleteStatus = 0
                        AND TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
                        AND TranscriptNumber = ' . $_GET['TranscriptNumber']  . '
                         ');
                        $Count = 0;
                        foreach ($result->result() as $TRANSCRIPT_RT) {
                            $Count++;
                        ?>
                            <tr>

                                <td><?= $TRANSCRIPT_RT->RTEducationYear ?></td>
                                <td><?= $TRANSCRIPT_RT->RTSemester ?></td>
                                <td><?= $TRANSCRIPT_RT->EDUCATION_LEVEL_NAME ?></td>
                                <td><?= $TRANSCRIPT_RT->GRADE_LEVEL_NAME ?></td>
                                <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTPronounceScore ?></td>
                                <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTUnderstandingScore ?></td>
                                <td style="text-align: center;"><?= $TRANSCRIPT_RT->RTMeanScore ?></td>
                                <td style="text-align: center;">
                                    <a href="edit-forms-transcript-rt?SchoolID=<?= $_GET['SchoolID']; ?>&&StudentReferenceID=<?= $_GET['StudentReferenceID']; ?>&&EducationYear=<?= $_GET['EducationYear']; ?>&&Semester=<?= $_GET['Semester']; ?>&&GradeLevelCode=<?= $_GET['GradeLevelCode']; ?>&&StudentID=<?= $_GET['StudentID']; ?>&&TranscriptSeriesNumber=<?= $_GET['TranscriptSeriesNumber']; ?>&&TranscriptNumber=<?= $_GET['TranscriptNumber']; ?>&&RTEducationYear=<?= $TRANSCRIPT_RT->RTEducationYear ?>&&RTSemester=<?= $TRANSCRIPT_RT->RTSemester ?>&&RTEducationLevelCode=<?= $TRANSCRIPT_RT->RTEducationLevelCode ?>&&RTGradeLevelCode=<?= $TRANSCRIPT_RT->RTGradeLevelCode ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $Count ?>"><i class=" bi bi-trash"></i></button>
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
$result = $this->db->query('SELECT * FROM TRANSCRIPT_RT 
WHERE DeleteStatus = 0
AND TranscriptSeriesNumber = ' . $_GET['TranscriptSeriesNumber'] . '
AND TranscriptNumber = ' . $_GET['TranscriptNumber']  . '
 ');
$CountI = 0;
foreach ($result->result() as $TRANSCRIPT_RT) {
    $CountI++;
?>
    <div class="modal fade" id="Delete<?= $CountI ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <form action="<?php echo base_url('delete-transcript-rt/'  . $_GET['SchoolID'] . '/' . $_GET['StudentReferenceID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['GradeLevelCode'] . '/' . $_GET['StudentID'] . '/' . $_GET['TranscriptSeriesNumber']  . '/' . $_GET['TranscriptNumber'] . '/' . $TRANSCRIPT_RT->RTEducationYear . '/' . $TRANSCRIPT_RT->RTSemester . '/' . $TRANSCRIPT_RT->RTEducationLevelCode . '/' . $TRANSCRIPT_RT->RTGradeLevelCode); ?>" method="POST">
                        <button type="submit" class="btn btn-danger">ลบ</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>