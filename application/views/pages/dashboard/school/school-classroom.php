<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลห้องเรียนสถานศึกษา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Classrom</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="padding-right: 25px;">

                <a href="school" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลสถานศึกษา</a>
                <h5 style="float: right;"> | </h5>
                <a href="school-award" style="float: right;" class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลรางวัลสถานศึกษา</a>

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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School-Classroom</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school-classroom" class="btn btn-success">เพิ่มข้อมูลห้องเรียน</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">จำนวนห้องเรียนทั้งหมด</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $this->db->query('SELECT * ,SUM(CLASSROOM_AMOUNT) AS Total_classroom 
                                FROM SCHOOL_CLASSROOM 
                                INNER JOIN SCHOOL ON SCHOOL_CLASSROOM.SCHOOL_ID = SCHOOL.SCHOOL_ID 
                                GROUP BY SCHOOL_CLASSROOM.SCHOOL_ID');

                        foreach ($result->result() as $row) {
                        ?>
                            <tr>
                                <?php
                                ?>
                                <th scope="row"><?= $row->NAME_TH; ?></th>
                                <td style="text-align: center;">
                                    <?= $row->Total_classroom; ?>
                                </td>
                                <td style="text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $row->SCHOOL_ID; ?>"><i class="bi bi-card-list"></i></button>
                                </td>
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->