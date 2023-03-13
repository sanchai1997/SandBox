<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลผู้สำเร็จการศึกษา
                </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Craduated</li>
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table Craduated</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-craduated" class="btn btn-success">เพิ่มข้อมูลผู้สำเร็จการศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ปีการศึกษา</th>
                            <th scope="col">หมายเลขประจำตัวนักเรียน</th>
                            <th style="text-align: center;" scope="col">ชื่อ</th>
                            <th style="text-align: center;" scope="col">นามสกุล</th>
                            <th style="text-align: center;" scope="col">ปีการศึกษาที่จน</th>
                            <th style="text-align: center;" scope="col">ใบแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">ดาวน์โหลดใบแสดงผลการศึกษา</th>
                            <th style="text-align: center;" scope="col">พิมพ์ใบแสดงผลการศึกษา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;"><a href="edit-forms-award?" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                &nbsp; <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete"><i class=" bi bi-trash"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->