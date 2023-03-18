<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลห้องเรียนสถานศึกษา</h1>
            </div>
            <div class="col-6" style="padding-right: 25px;">

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
                        <h5 class="card-title">รายละเอียดข้อมูล : <a href="school" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลสถานศึกษา</a>
                            <a href="school-classroom" class="btn btn-sm btn-outline-secondary" data-mdb-ripple-color="dark">ข้อมูลห้องเรียน</a>
                            <a href="school-award" class="btn btn-sm btn-light" active data-mdb-ripple-color="dark">ข้อมูลรางวัล</a>
                        </h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school-classroom" class="btn btn-success">เพิ่มข้อมูล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">จำนวนห้องเรียนทั้งหมด</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $this->db->query('SELECT SCHOOL_CLASSROOM.SchoolID, SCHOOL.SchoolNameThai ,SUM(SCHOOL_CLASSROOM.ClassroomAmount) AS Total 
                                FROM SCHOOL_CLASSROOM 
                                INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SchoolID = SCHOOL.SchoolID
                                WHERE SCHOOL_CLASSROOM.DeleteStatus = 0
                                GROUP BY SCHOOL_CLASSROOM.SchoolID');

                        foreach ($result->result() as $CLASSROOM) {
                        ?>
                            <tr>
                                <?php
                                ?>
                                <td><?= $CLASSROOM->SchoolNameThai; ?></td>
                                <td style="text-align: center;">
                                    <?= $CLASSROOM->Total; ?>
                                </td>
                                <td style="text-align: center;"><a class="btn btn-primary" href="school-classroom-P2?SchoolID=<?= $CLASSROOM->SchoolID; ?>"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->