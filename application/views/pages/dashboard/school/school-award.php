<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลรางวัลสถานศึกษา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Award</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="school-award" style="float: right;" class="btn btn-sm btn-outline-secondary" active data-mdb-ripple-color="dark">ข้อมูลรางวัลสถานศึกษา</a>
                <a href="school-classroom" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลห้องเรียนสถานศึกษา</a>
                <a href="school" style="float: right; " class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลสถานศึกษา</a>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School-Award</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school-award" class="btn btn-success">เพิ่มข้อมูลรางวัล</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">จำนวนรางวัลทั้งหมด</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $this->db->query('SELECT * ,COUNT(AwardName) AS Total 
                                    FROM SCHOOL_AWARD 
                                    INNER JOIN SCHOOL ON SCHOOL_AWARD.SchoolID = SCHOOL.SchoolID
                                    WHERE SCHOOL_AWARD.DeleteStatus = 0
                                    GROUP BY SCHOOL_AWARD.SchoolID');

                        foreach ($result->result() as $AWARD) {
                        ?>
                            <tr>
                                <td><?= $AWARD->SchoolNameThai; ?></td>
                                <td style="text-align: center;">
                                    <?= $AWARD->Total; ?>
                                </td>
                                <td style="text-align: center;"><a class="btn btn-primary" href="school-award-P2?SchoolID=<?= $AWARD->SchoolID; ?>"><i class="bi bi-card-list"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->