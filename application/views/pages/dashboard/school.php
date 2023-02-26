<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลสถานศึกษา</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">School</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">รายละเอียดข้อมูล <span>| Table School</span></h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"><a  href="forms-school" class="btn btn-success">เพิ่มข้อมูลสถานศึกษา</a></h5>
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
                        <td><?php echo $school->INNOVATION_AREA_CODE; ?></td>
                        <td style="text-align: center;"><a href="#" class="text-primary"><i class="bi bi-card-list"></i></a></td>
                     
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

  </main><!-- End #main -->
