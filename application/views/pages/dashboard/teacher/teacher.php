<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลครูและบุคลากรทางการศึกษา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Teacher</li>
                    </ol>
                </nav>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Teacher</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-teacher" class="btn btn-success">เพิ่มข้อมูลครูและบุคลากรทางการศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">คำนำหน้าชื่อ</th>
                            <th style="text-align: center;" scope="col">ชื่อ</th>
                            <th style="text-align: center;" scope="col">นามสกุล</th>
                            <th style="text-align: center;" scope="col">ชื่อตำแหน่ง</th>
                            <th style="text-align: center;" scope="col">กลุ่มสาระวิชาที่สอน</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td style="text-align: center;">

                            </td>
                            <td style="text-align: center;"><a class="btn btn-primary" href="school-award-P2?SchoolID="><i class="bi bi-card-list"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->