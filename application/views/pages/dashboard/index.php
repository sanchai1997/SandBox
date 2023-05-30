<main id="main" class="main">

<?php
// if(!isset($_COOKIE['cookie_policy'])) {
  // echo "Cookie named 'cookie_policy' is not set!";
// } else {
  // echo "Cookie 'cookie_policy' is set!<br>";
  // echo "Value is: " . $_COOKIE['cookie_policy'];
// }
?>

  <div class="pagetitle">
    <h1>ภาพรวม</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">สถานศึกษา</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bank2"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$SchoolCount;?></h6>
                    <span class="text-muted small pt-2 ps-1">โรงเรียน</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">บุคลากร</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$PersonnelCount;?></h6>
                    <span class="text-muted small pt-2 ps-1">คน</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->
    
          <!-- Revenue Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">ครู</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$TeacherCount?></h6>
                    <span class="text-muted small pt-2 ps-1">คน</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->			

          <!-- Customers Card -->
          <div class="col-xxl-3 col-md-6">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">นักเรียน</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$StudentCount;?></h6>
                    <span class="text-muted small pt-2 ps-1">คน</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">รายงานความสัมพันธ์จำนวนนักเรียน, ครู และ บุคลากรทางการศึกษา</h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'นักเรียน',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'ครู',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'บุคลากรทางการศึกษา',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">กิจกรรม <span>| วันนี้</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                      <tr>
                          <th style="text-align: left;" scope="col" width="30%">วันที่</th>
                          <th style="text-align: left;" scope="col" width="70%">รายละเอียด</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php

                      foreach ($SystemLogs as $SystemLog) {
                      ?>
                          <tr>
                              <td><?= $SystemLog['LogCreation']?></td>
                              <td><?= $SystemLog['LogMessage']?></td>
                          </tr>
                      <?php } ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Budget Report -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">สมรรถนะรวม</h5>

            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                  legend: {
                    data: ['สมรรถนะนักเรียน', 'สมรรถนะเฉลี่ย']
                  },
                  radar: {
                    // shape: 'circle',
                    indicator: [{
                        name: 'การจัดการตนเอง',
                        max: 6500
                      },
                      {
                        name: 'การคิดขั้นสูง',
                        max: 16000
                      },
                      {
                        name: 'การสื่อสาร',
                        max: 30000
                      },
                      {
                        name: 'การรวมพลังทำงานเป็นทีม',
                        max: 38000
                      },
                      {
                        name: 'การเป็นพลเมืองที่เข้มแข็ง',
                        max: 52000
                      },
                      {
                        name: 'การอยู่ร่วมกับธรรมชาติและวิทยาการที่ยั่งยืน',
                        max: 25000
                      }
                    ]
                  },
                  series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'สมรรถนะนักเรียน'
                      },
                      {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'สมรรถนะเฉลี่ย'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Budget Report -->

        <!-- Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">ผู้ใช้งานระบบ <span>| วันนี้</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'นักเรียน'
                      },
                      {
                        value: 735,
                        name: 'ครู'
                      },
                      {
                        value: 484,
                        name: 'ผู้ปกครอง'
                      },
                      {
                        value: 580,
                        name: 'บุคคลกรอื่นๆ'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

        <!-- News & Updates Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Speed Test </h5>

            <div class="news">
<!--OST Widget code start--><div style="text-align:right;"><div style="min-height:360px;"><div style="width:100%;height:0;padding-bottom:50%;position:relative;"><iframe style="border:none;position:absolute;top:0;left:0;width:100%;height:100%;min-height:360px;border:none;overflow:hidden !important;" src="//openspeedtest.com/speedtest"></iframe></div></div>Provided by <a href="https://openspeedtest.com">OpenSpeedtest.com</a></div><!-- OST Widget code end -->
            </div><!-- End sidebar recent posts-->

          </div>
        </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

    </div>
  </section>

<div class="modal inmodal"  id="UserPrivacyPolicyFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="UserGroupFRMModalTitle">นโยบายข้อมูลส่วนบุคคล</h5>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
              <div class="modal-body">
          <div class="col-md-12">
            <textarea class="form-control" id="privacy_policy_text" style="height: 440px"><?= $privacy_policy ?></textarea>
          </div>	
          <div class="col-md-12">
            &nbsp;&nbsp;&nbsp;ท่านสามารถ อ่านนโยบายการคุ้มครองข้อมูลส่วนบุคคล (Personal Data Protection Policy)<a href="assets/docs/privacy_policy_full.pdf" target="_blank"> ฉบับเต็ม </a> <br>
            &nbsp;&nbsp;&nbsp;ท่านสามารถ ดาวน์โหลด <a href="assets/docs/privacy_policy_form.pdf" target="_blank"> แบบฟอร์มคำร้องขอใช้สิทธิของเจ้าของข้อมูลส่วนบุคคล </a>
          </div>	
          
          <div class="col-md-12">
            <div class="row">
            </div>						
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <button type="button" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิก</button>
                <button type="button" id="btn-save-UserPrivacyPolicy" name="btn-save-UserPrivacyPolicy" class="btn btn-primary" style="float: right;"><i class=" bi bi-save"></i> ยอมรับ</button>					
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>						
              </div>
          </div>
      </div>
  </div>

<div class="modal inmodal"  id="UserRegisterFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="UserGroupFRMModalTitle">ลงทะเบียนสมาชิกใหม่</h5>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
              <div class="modal-body">
        <form class="row g-3" action="#" method="POST" name="UserRegisterForm" id="UserRegisterForm">
          <input type="hidden" id="FRM_UserID" name="FRM_UserID">
          <input type="hidden" id="FRM_UserSchoolID" name="FRM_UserSchoolID">
          <input type="hidden" id="FRM_UserGroupID" name="FRM_UserGroupID">
          <div class="col-md-12">
            <div class="form-floating">
            <select class="form-select" aria-label="Default select example" id="FRM_UserType" name="FRM_UserType" required>
              <option selected value="">กรุณาเลือก</option>
              <option value="Teacher">ครู</option>
              <option value="Student">นักเรียน</option>
              <option value="Father">บิดา</option>
              <option value="Mother">มารดา</option>
              <option value="Guardian">ผู้ปกครอง</option>
              <option value="Personnel">บุคลากรอื่นๆ</option>
            </select>
            <label >ประเภทผู้ใช้งานระบบ<font color="red"> *</font></label>
            </div>
          </div>	
          <div class="col-md-4">
            <div class="form-floating">
            <select class="form-select" aria-label="Default select example" id="FRM_UserCardType" name="FRM_UserCardType" required>
              <option selected value="">กรุณาเลือก</option>
              <option value="StudentID">บัตรประจำตัวนักเรียน</option>
              <option value="CardID">บัตรประจำตัวประชาชน</option>
              <option value="Passport">หนังสือเดินทาง</option>
            </select>
            <label >ประเภทบัตร<font color="red"> *</font></label>
            </div>
          </div>	
          <div class="col-md-8">
            <div class="form-floating">
            <input type="text" class="form-control" id="FRM_UserCardNo" name="FRM_UserCardNo" required>
            <label >หมายเลขบัตร<font color="red"> *</font></label>
            </div>
          </div>							
          <div class="col-md-8">
            <div class="form-floating">
            <input type="text" class="form-control" id="FRM_UserFullName" name="FRM_UserFullName" required>
            <label for="floatingName">ชื่อ นามสกุล<font color="red"> *</font></label>
            </div>					
          </div>	
          <div class="col-md-4">
            <div class="form-floating">
            <input type="date" class="form-control" id="FRM_UserBirthDate" name="FRM_UserBirthDate" required>
            <label for="floatingName">วัน/เดือน/ปีเกิด (คศ.)<font color="red"> *</font></label>
            </div>					
          </div>						
          <div class="col-md-6">
            <div class="form-floating">	
            <input type="email" class="form-control" id="FRM_UserEmail" name="FRM_UserEmail" required>
            <label >อีเมล์<font color="red"> *</font></label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
            <input type="text" class="form-control" id="FRM_UserPhone" name="FRM_UserPhone" required>
            <label >โทรศัพท์<font color="red"> *</font></label>
            </div>
          </div>	
          <div class="col-md-6">
            <div class="form-floating">
            <input id="user_change_password" name="user_change_password" type="hidden" value="N">   									
            <input type="password" class="form-control" id="FRM_UserPassword" name="FRM_UserPassword" required>
            <label >รหัสผ่านใหม่<font color="red"><data id="FRM_UserPasswordRequire"> *</data></font></label>
            </div>
          </div>	
          <div class="col-md-6">
            <div class="form-floating">
            <input type="password" class="form-control" id="FRM_UserPassword2" name="FRM_UserPassword2" required>
            <label >ยืนยันรหัสผ่านใหม่<font color="red"><data id="FRM_UserPassword2Require"> *</data></font></label>
            </div>
          </div>						
          <div class="col-md-12">
            <div class="row">
            </div>						
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <button type="button" id="btn-cancel-userregister" name="btn-cancel-userregister" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิก</button>
                <button type="submit" id="btn-save-userregister" name="btn-save-userregister" class="btn btn-primary" style="float: right;">									
                  <i class=" bi bi-save"></i> ลงทะเบียน
                </button>					
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>						
        </form>
              </div>
          </div>
      </div>
  </div>

<div class="modal inmodal"  id="UserFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">ข้อมูลสมาชิก</h5>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
              <div class="modal-body">
        <form class="row g-3" action="#" method="POST" name="UserForm" id="UserForm">
          <input type="hidden" id="FRMUserID" name="FRMUserID">
          <input type="hidden" id="FRMUserSchoolID" name="FRMUserSchoolID">
          <input type="hidden" id="FRMUserGroupID" name="FRMUserGroupID">
          <div class="col-md-12">
            <div class="form-floating">
            <input type="hidden" id="FRMUserType" name="FRMUserType">						  
            <select class="form-select" aria-label="Default select example" id="FRMUserTypeShow" name="FRMUserTypeShow" disabled>
              <option selected value="">กรุณาเลือก</option>
              <option value="Teacher">ครู</option>
              <option value="Student">นักเรียน</option>
              <option value="Father">บิดา</option>
              <option value="Mother">มารดา</option>
              <option value="Guardian">ผู้ปกครอง</option>
              <option value="Personnel">บุคลากรอื่นๆ</option>
            </select>
            <label >ประเภทผู้ใช้งานระบบ<font color="red"></font></label>
            </div>
          </div>	
          <div class="col-md-4">
            <div class="form-floating">
            <input type="hidden" id="FRMUserCardType" name="FRMUserCardType">						  
            <select class="form-select" aria-label="Default select example" id="FRMUserCardTypeShow" name="FRMUserCardTypeShow" disabled>
              <option selected value="">กรุณาเลือก</option>
              <option value="StudentID">บัตรประจำตัวนักเรียน</option>
              <option value="CardID">บัตรประจำตัวประชาชน</option>
              <option value="Passport">หนังสือเดินทาง</option>
            </select>
            <label >ประเภทบัตร<font color="red"></font></label>
            </div>
          </div>	
          <div class="col-md-8">
            <div class="form-floating">
            <input type="hidden" id="FRMUserCardNo" name="FRMUserCardNo">						  
            <input type="text" class="form-control" id="FRMUserCardNoShow" name="FRMUserCardNoShow" disabled>
            <label >หมายเลขบัตร<font color="red"></font></label>
            </div>
          </div>							
          <div class="col-md-8">
            <div class="form-floating">
            <input type="hidden" id="FRMUserFullName" name="FRMUserFullName">						  
            <input type="text" class="form-control" id="FRMUserFullNameShow" name="FRMUserFullNameShow" disabled>
            <label for="floatingName">ชื่อ นามสกุล<font color="red"></font></label>
            </div>					
          </div>	
          <div class="col-md-4">
            <div class="form-floating">
            <input type="hidden" id="FRMUserBirthDate" name="FRMUserBirthDate">						  
            <input type="date" class="form-control" id="FRMUserBirthDateShow" name="FRMUserBirthDateShow" disabled>
            <label for="floatingName">วัน/เดือน/ปีเกิด (คศ.)<font color="red"></font></label>
            </div>					
          </div>						
          <div class="col-md-6">
            <div class="form-floating">	
            <input type="hidden" id="FRMUserEmail" name="FRMUserEmail">						  
            <input type="email" class="form-control" id="FRMUserEmailShow" name="FRMUserEmailShow" disabled>
            <label >อีเมล์<font color="red"> *</font></label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
            <input type="text" class="form-control" id="FRMUserPhone" name="FRMUserPhone" required>
            <label >โทรศัพท์<font color="red"> *</font></label>
            </div>
          </div>	
          <div class="col-md-6">
            <div class="form-floating">
            <input id="user_change_password_edit" name="user_change_password_edit" type="hidden" value="N">   									
            <input type="password" class="form-control" id="FRMUserPassword" name="FRMUserPassword" required>
            <label >รหัสผ่านใหม่<font color="red"><data id="FRMUserPasswordRequire"> *</data></font></label>
            </div>
          </div>	
          <div class="col-md-6">
            <div class="form-floating">
            <input type="password" class="form-control" id="FRMUserPassword2" name="FRMUserPassword2" required>
            <label >ยืนยันรหัสผ่านใหม่<font color="red"><data id="FRMUserPassword2Require"> *</data></font></label>
            </div>
          </div>						
          <div class="col-md-12">
            <div class="row">
            </div>						
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <button type="button" id="btn-cancel-user" name="btn-cancel-user" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิก</button>
                <button type="submit" id="btn-save-user" name="btn-save-user" class="btn btn-primary" style="float: right;"><i class=" bi bi-save"></i> บันทึก</button>					
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>						
        </form>
              </div>
          </div>
      </div>
  </div>	

<div class="modal inmodal"  id="UserWaitingSuccessFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document" >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
        <div class="spinner-border text-info" role="status">
        <span class="visually-hidden">Loading...</span>
        </div>
        <p><h5><font color="green">กรุณารอสักครู่ ระบบกำลังดำเนินการลงทะเบียน</font></h5></center></p>				
              </div>
      <div class="modal-footer">
      </div>				
          </div>
      </div>
  </div>

<div class="modal inmodal"  id="UserRegisterSuccessFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document" >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="UserGroupFRMModalTitle">สถานะการลงทะเบียนใหม่</h5>
              </div>
              <div class="modal-body">
        <p>กรุณาดำเนินการยืนยันข้อมูลผ่านอีเมล์ : <font color="blue"><data id="EmailActivate"></data></font> ของท่าน</p>				
              </div>
      <div class="modal-footer">
      <button type="button" id="btn-accept-registersuccess" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> รับทราบ</button>
      </div>				
          </div>
      </div>
  </div>

<div class="modal inmodal"  id="UserSuccessFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document" >
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
        <p><center><h5><font color="green">ดำเนินการแก้ไขข้อมูลของท่านเรียบร้อย</font></h5></center></p>				
              </div>
      <div class="modal-footer">
      <button type="button" id="btn-accept-success" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> รับทราบ</button>
      </div>				
          </div>
      </div>
  </div>	

</main><!-- End #main -->

<!-- page script -->
<script>

  $(document).ready(function(){

/*----------------------------------------------------------------

Policy

-----------------------------------------------------------------*/


  $('#btn-save-UserPrivacyPolicy').click(function () {
    $("#UserPrivacyPolicyFRMModal").hide();
    $("#UserRegisterFRMModal").toggle();									
  })


/*----------------------------------------------------------------

Register Form

-----------------------------------------------------------------*/

  $('#FRM_UserType').click(function () {
     $('#FRM_UserCardType')
    .find('option')
    .remove()
    .end()
    .append('<option value="">กรุณาเลือก</option>')
    .val('');
    
    if($('#FRM_UserType').val() == "Student"){
      $('#FRM_UserCardType').append($('<option>', { 
        value: "CardID",
        text : "บัตรประจำตัวประชาชน" 
      }));		
      $('#FRM_UserCardType').append($('<option>', { 
        value: "StudentID",
        text : "บัตรประจำตัวนักเรียน" 
      }));
      $('#FRM_UserCardType').append($('<option>', { 
        value: "Passport",
        text : "หนังสือเดินทาง" 
      }));				
    }else{
      $('#FRM_UserCardType').append($('<option>', { 
        value: "CardID",
        text : "บัตรประจำตัวประชาชน" 
      }));		
      $('#FRM_UserCardType').append($('<option>', { 
        value: "Passport",
        text : "หนังสือเดินทาง" 
      }));				
    }
          
  })

  $('#FRM_UserCardType').change(function () {

    var PersonType = $('#FRM_UserType').val();
    var UserCardType = $('#FRM_UserCardType').val();
    var UserCardNo = $('#FRM_UserCardNo').val();

    var Person = JSON.parse(getPerson(PersonType, UserCardType, UserCardNo));				
          
    if(Person != null){
      $('#FRM_UserFullName').val(Person.PersonNameThai + ' ' + Person.PersonLastNameThai);
      $('#FRM_UserEmail').val(Person.PersonEmail);
      $('#FRM_UserPhone').val(Person.PersonEmail);
      $('#FRM_UserSchoolID').val(Person.PersonSchoolID);
      $('#FRM_UserGroupID').val(Person.PersonGroupID);				
    }else{
      $('#FRM_UserFullName').val('');
      $('#FRM_UserEmail').val('');
      $('#FRM_UserPhone').val('');
      $('#FRM_UserSchoolID').val('');
      $('#FRM_UserGroupID').val('');
    }
  })	
    
  $('#FRM_UserCardNo').change(function () {

    var PersonType = $('#FRM_UserType').val();
    var UserCardType = $('#FRM_UserCardType').val();
    var UserCardNo = $('#FRM_UserCardNo').val();

    var Person = JSON.parse(getPerson(PersonType, UserCardType, UserCardNo));					

    console.log(Person);
          
    if(Person != null){
      $('#FRM_UserFullName').val(Person.PersonNameThai + ' ' + Person.PersonLastNameThai);
      $('#FRM_UserEmail').val(Person.PersonEmail);
      $('#FRM_UserSchoolID').val(Person.PersonSchoolID);
      $('#FRM_UserGroupID').val(Person.PersonGroupID);				
    }else{
      $('#FRM_UserFullName').val('');
      $('#FRM_UserEmail').val('');
      $('#FRM_UserPhone').val('');
      $('#FRM_UserSchoolID').val('');
      $('#FRM_UserGroupID').val('');
    }
  })					


  $('#btn-cancel-userregister').click(function () {
    $("#UserRegisterFRMModal").hide();
    $('.modal-backdrop').hide();
    window.location.href = '<?php echo base_url();?>Main';
  })

      $('#UserRegisterForm').submit(function(e){ 
                
    var action = 'insert';
    
    var PersonType = $('#FRM_UserType').val();
    var UserCardType = $('#FRM_UserCardType').val();
    var UserCardNo = $('#FRM_UserCardNo').val();

    var Person = JSON.parse(getPerson(PersonType, UserCardType, UserCardNo));	
                
    
    if($('#FRM_UserPassword').val() != $('#FRM_UserPassword2').val()){
      alert('ข้อมูลรหัสผ่านที่ยืนยันต้องเหมือนกัน');
      return false;
    }else if(Person == null){
      alert('ไม่พบข้อมูลในระบบ กรุณาระบุหมายเลขบัตรใหม่');
      return false;
    }else{

      $("#btn-save-userregister").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กรุณารอสักครู่ ...');			
      $('#btn-cancel-userregister').prop('disabled', true);
      $('#btn-save-userregister').prop('disabled', true);
      e.preventDefault(); 

      $.ajax({
        url:'<?php echo base_url();?>index.php/Register/'+action,
        type:"post",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,				
        success: function(data){
          if(data=='บันทึกข้อมูลเรียบร้อยแล้ว'){
            $("#UserRegisterFRMModal").hide();		
            $('#EmailActivate').text($('#FRM_UserEmail').val());
            $("#UserRegisterSuccessFRMModal").toggle();		
          }else{
            // $("#btn-save-usergroup").notify(data, {position: "left midden", className: "error"});			
          }
        }
      });

    }
      });
  
  $('#btn-accept-registersuccess').click(function () {
    $("#UserRegisterSuccessFRMModal").hide();
    $('.modal-backdrop').hide();
    window.location.href = '<?php echo base_url();?>Main';									
  })

/*----------------------------------------------------------------

User Form

-----------------------------------------------------------------*/

  $("#UserFRMModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    
    var UserSchoolID = triggerLink.data("schoolid");
    var UserGroupID = triggerLink.data("groupid");			
    var UserID = triggerLink.data("id");
    var UserFullName = triggerLink.data("name");
    var UserEmail = triggerLink.data("email");
    var UserBirthDate = triggerLink.data("birthdate");
    var UserPhone = triggerLink.data("phone");
    var UserType = triggerLink.data("type");
    var UserCardType = triggerLink.data("cardtype");
    var UserCardNo = triggerLink.data("cardno");
    

    $('#FRMUserPassword').prop('required',false);
    $('#FRMUserPasswordRequire').text('');				
    $('#FRMUserPassword2').prop('required',false);
    $('#FRMUserPassword2Require').text('');				
          
    $('#FRMUserID').val(UserID);
    
    $('#FRMUserFullName').val(UserFullName);
    $('#FRMUserFullNameShow').val(UserFullName);
    
    $('#FRMUserSchoolID').val(UserSchoolID);
    $('#FRMUserGroupID').val(UserGroupID);
    
    $('#FRMUserEmail').val(UserEmail);
    $('#FRMUserEmailShow').val(UserEmail);
    
    $('#FRMUserBirthDate').val(UserBirthDate);
    $('#FRMUserBirthDateShow').val(UserBirthDate);
    
    $('#FRMUserPhone').val(UserPhone);
    
    $('#FRMUserType').val(UserType);
    $('#FRMUserTypeShow').val(UserType);
    
    $('#FRMUserCardType').val(UserCardType);
    $('#FRMUserCardTypeShow').val(UserCardType);
    
    $('#FRMUserCardNo').val(UserCardNo);
    $('#FRMUserCardNoShow').val(UserCardNo);
    
  });

  $('#FRMUserPassword').keypress(function(){
    $('#user_change_password_edit').val('Y');
    $('#FRMUserPassword').prop('required',true);
    $('#FRMUserPasswordRequire').text(' *');							
    $('#FRMUserPassword2').prop('required',true);
    $('#FRMUserPassword2Require').text(' *');							
      });	

      $('#UserForm').submit(function(e){ 
                          
    action = 'EditFromUser';
      
    //if($('#user_change_password').val() == "Y"){
        
      if($('#FRM_UserPassword').val() != $('#FRM_UserPassword2').val()){
        Alert('กรุณายืนยันพาสเวิร์ดให้เหมือนกับพาสเวิร์ด');
        return false;					
      }
    //}
              
    
          e.preventDefault(); 
              $.ajax({
        url:'<?php echo base_url();?>index.php/User/'+action,
                  type:"post",
                  data:new FormData(this),
                  processData:false,
                  contentType:false,
                  cache:false,
                  async:false,
                  success: function(data){
          if(data=='บันทึกข้อมูลเรียบร้อยแล้ว'){
            $("#UserFRMModal").hide();		
            $("#UserSuccessFRMModal").toggle();						
          }else{
            //$("#btn-save-usergroup").notify(data, {position: "left midden", className: "error"});			
          }
        }
      });
      });

  $('#btn-accept-success').click(function () {
    $("#UserSuccessFRMModal").hide();
    $('.modal-backdrop').hide();
    window.location.href = '<?php echo base_url();?>Main';									
  })

  });		

function getPerson(PersonType, UserCardType, UserCardNo){
var	ret	= null;		
var	data = {
      'PersonType': PersonType,
      'UserCardType': UserCardType,
      'UserCardNo': UserCardNo
      };
                
$.ajax({
    url: '<?php echo base_url(); ?>index.php/Register/getPerson',
    data: data,
    method: 'POST',
    dataType: 'JSON',
    cache: false,
    async: false,
    success: function (data) {
      //console.log(JSON.stringify(data));
      if(data != null){
        //JSON.stringify(data)
        ret = JSON.stringify(data)
       }
    }
})
.done(function () {
});	
return ret;		
}

</script> 	