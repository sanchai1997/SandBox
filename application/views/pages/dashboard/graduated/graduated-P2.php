<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรายชื่อผู้สำเร็จการศึกษา
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span></span> <a href="graduated" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีการศึกษา</th>
                            <th scope="col">หมายเลขประจำตัวนักเรียน</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th style="text-align: center;" scope="col">ปีการศึกษาที่จบ</th>
                            <th style="text-align: center;" scope="col">ใบเแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">ดาวโหลดใบแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">พิมพ์ใบแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * FROM GRADUATED
                        INNER JOIN SCHOOL ON GRADUATED.GraduatedSchoolID = SCHOOL.SchoolID
                        INNER JOIN STUDENT ON GRADUATED.StudentReferenceID  = STUDENT.StudentReferenceID 
                        INNER JOIN CLS_GRADE_LEVEL ON GRADUATED.GraduatedGradeLevelCode = CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                        WHERE GRADUATED.DeleteStatus = 0 AND GRADUATED.GraduatedSchoolID = ' . $_GET['SchoolID'] . ' AND GRADUATED.EducationYear = ' . $_GET['EducationYear'] . ' AND GRADUATED.GraduatedGradeLevelCode = ' . $_GET['GraduatedGradeLevelCode'] . '
                        ');
                        foreach ($result->result() as $GRADUATED) {
                        ?>
                            <tr>
                                <td><?= $GRADUATED->EducationYear; ?></td>
                                <td><?= $GRADUATED->StudentID; ?></td>
                                <td><?= $GRADUATED->StudentNameThai; ?></td>
                                <td><?= $GRADUATED->StudentLastNameThai; ?></td>
                                <td><?= $GRADUATED->GraduatedEducationYear; ?></td>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-file-earmark-text"></i></a></td>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-file-arrow-down"></i></a></td>
                                <td style="text-align: center;"><a class="btn btn-primary"><i class="bi bi-printer"></i></a></td>
                                <td style="text-align: center;"><a href="edit-forms-graduated?GraduatedSchoolID=<?= $GRADUATED->GraduatedSchoolID ?>&&StudentReferenceID=<?= $GRADUATED->StudentReferenceID ?>&&GraduatedGradeLevelCode=<?= $GRADUATED->GraduatedGradeLevelCode ?>&&EducationYear=<?= $GRADUATED->EducationYear ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $GRADUATED->GraduatedSchoolID ?><?= $GRADUATED->StudentReferenceID ?>"><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="Delete<?= $GRADUATED->GraduatedSchoolID ?><?= $GRADUATED->StudentReferenceID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                            <a href="<?php echo base_url('delete-graduated/' . $GRADUATED->GraduatedSchoolID . '/' . $GRADUATED->StudentReferenceID . '/' . $GRADUATED->GraduatedGradeLevelCode . '/' . $GRADUATED->EducationYear);
                                                        ?>" class="btn btn-danger">ลบ</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->