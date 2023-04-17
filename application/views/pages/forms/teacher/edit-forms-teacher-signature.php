<main id="main" class="main">
    <div class="pagetitle">
        <h1>แก้ไขข้อมูลครูและบุคลากรทางการศึกษา
            <?php if (isset($_GET['TeacherID'])) {
                $result = $this->db->query('SELECT *  FROM TEACHER 
                INNER JOIN CLS_PREFIX ON TEACHER.TeacherPrefixCode = CLS_PREFIX.PREFIX_CODE
                WHERE TeacherID = "' . $_GET['TeacherID'] . '" 
                AND SchoolID = ' . $_GET['SchoolID'] . '
                AND EducationYear = ' . $_GET['EducationYear'] . '
                AND Semester = ' . $_GET['Semester'] . '
                AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . '
                AND PositionCode = ' . $_GET['PositionCode'] . '
                ');
                foreach ($result->result() as $TEACHER) {

                    $result = $this->db->query('SELECT *  FROM SCHOOL WHERE SchoolID = ' . $_GET['SchoolID'] . '');
                    foreach ($result->result() as $SCHOOL) {
                        $SchoolName = $SCHOOL->SchoolNameThai;
                    }
            ?>

        </h1>
        <a class="btn btn-light text-dark"><b><?= $SchoolName . ' - ' . $TEACHER->PREFIX_NAME . $TEACHER->TeacherNameThai . ' ' . $TEACHER->TeacherLastNameThai ?></b></a>
    </div><!-- End Page Title -->
    <?php if ($TEACHER->Signature == NULL) {
                        $Signature = '0';
                    } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('update-teacher-signature/' . $_GET['TeacherID'] . '/' . $_GET['SchoolID'] . '/' . $_GET['EducationYear'] . '/' . $_GET['Semester'] . '/' . $_GET['PersonnelTypeCode'] . '/' . $_GET['PositionCode'] . '/' . $Signature); ?>" method="POST" id="Teacher" enctype="multipart/form-data">
                            <h6 style="padding-left: 15px;" class="card-title">ข้อมูลลายเซ็น</h6>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">แนบไฟล์รูป .png</label>
                                    <input type="file" class="form-control" name="Signature" id="Signature" placeholder="รูปภาพครู">
                                </div>
                            </div>
                    <?php }
            } ?>

                    <div class="d-flex justify-content-between">
                        <a href="teacher?SchoolID=<?= $_GET['SchoolID'] ?>&&TeacherID=<?= $_GET['TeacherID'] ?>&&EducationYear=<?= $_GET['EducationYear'] ?>&&Semester=<?= $_GET['Semester'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>&&ShowDetail=" class="btn btn-danger">ยกเลิก</a>
                        <button type="button" class="btn btn-warning" onclick="return check(Teacher)">แก้ไขข้อมูล</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันแก้ไขข้อมูล</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>
                                        <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">ยืนยัน</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>


                        </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

                    </div>
                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript">
        function check(frm) {

            if (frm.Signature.value == "") {
                alert("กรุณาแนบไฟล์รูปลายเซ็น png");
                return false;
            }

            if (!frm.Signature.value == "") {
                var fty = new Array(".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
                var a = frm.Signature.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
                var permiss = 0; // เงื่อนไขไฟล์อนุญาต
                a = a.toLowerCase();
                if (a != "") {
                    for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
                        if (a.lastIndexOf(fty[i]) >= 0) { // เงื่อนไขไฟล์ที่อนุญาต   
                            permiss = 1;
                            break;
                        } else {
                            continue;
                        }
                    }
                    if (permiss == 0) {
                        alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ png");
                        return false;
                    }
                }
            }


            $('#Modal').modal('show');

        }
    </script>

</main><!-- End #main -->