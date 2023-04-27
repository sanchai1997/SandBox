<?php
if (empty($_SESSION['CountUploadSchool'])) {
    redirect(base_url('school'));
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>รายละเอียดการอัปโหลดข้อมูลสถานศึกษา
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
                        <h5 class="card-title"><span></span> <a href="school" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">รหัสสถานศึกษา</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">หน่วยงานต้นสังกัด</th>
                            <th scope="col">พื้นที่นวัตกรรม</th>
                            <th style="text-align: center;" scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 2; $i <= $_SESSION['CountUploadSchool']; $i++) { ?>
                            <tr>
                                <td><?= $_SESSION['UploadSchoolDetail'][$i][0]; ?></td>
                                <td><?= $_SESSION['UploadSchoolDetail'][$i][1]; ?></td>
                                <td><?= $_SESSION['UploadSchoolDetail'][$i][2]; ?></td>
                                <td><?= $_SESSION['UploadSchoolDetail'][$i][3]; ?></td>
                                <td style="text-align: center;">
                                    <?php if ($_SESSION['StatusUpload'][$i] == 0) { ?>
                                        <a class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
                                    <?php } else { ?>
                                        <a class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->