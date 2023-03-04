<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลสถานศึกษา</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">School</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="padding-right: 25px;">
                <a href="school-award" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลรางวัลสถานศึกษา</a>
                <h5 style="float: right;"> | </h5>
                <a href="school-classroom" style="float: right;" class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลห้องเรียนสถานศึกษา</a>
            </div>
        </div>
    </div>

    <!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
    <div style="position: relative;">
        <div class="alert alert-success" id="myAlert"
            style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
            <strong>
                <?php
                 echo '<i class="bi bi-clipboard2-check"></i> '. $_SESSION['success'];
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
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-school"
                                class="btn btn-success">เพิ่มข้อมูลสถานศึกษา</a></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">ชื่อสถานศึกษา</th>
                            <th style="text-align: center;" scope="col">พื้นที่นวัตกรรม</th>
                            <th style="text-align: center;" scope="col">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($schools as $school) { ?>
                        <tr>
                            <th scope="row"><?php echo $school->NAME_TH; ?></th>
                            <td style="text-align: center;">
                                <?php 
                          switch ($school->INNOVATION_AREA_CODE) {
                            case 21:
                              echo "ระยอง"; break;
                            case 33:
                              echo "ศรีสะเกษ"; break;
                            case 50:
                              echo "เชียงใหม่"; break;
                            case 71:
                              echo "กาญจนบุรี"; break;
                            case 91:
                              echo "สตูล"; break;
                            case 94:
                              echo "ปัตตานี"; break;
                            case 95:
                              echo "ยะลา"; break;
                            case 96:
                              echo "นราธิวาส"; break;
                          }
                        ?>
                            </td>
                            <td style="text-align: center;"><button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#Modal<?= $school->SCHOOL_ID; ?>"><i
                                        class="bi bi-card-list"></i></button></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->