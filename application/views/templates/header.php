<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/img/mini.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>assets/vendor/jquery/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Notify -->
  <script src="<?php echo base_url(); ?>assets/vendor/notify/js/notify.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  
  if(!empty($UserID)){ ?> class="toggle-sidebar"
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url(); ?>Main" class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/img/uploads/logo.png'); ?>" alt="">
        <span class="d-none d-lg-block"></span>
      </a>
      <?php //if(!empty($UserID) && !empty($UserName)){ 
      ?>
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <?php //} 
      ?>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <?php
        if (!empty($UserID) && !empty($UserName)) {
        ?>

          <li class="nav-item dropdown">

          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
              <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                คุณมี 3 ข้อความใหม่
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">แสดงทั้งหมด</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="<?php echo base_url(); ?>assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>ไพลิน สุวรรณมาลา</h4>
                    <p>สอบถามเกี่ยวกับการร่วมกิจกรรม Workshop นวัตกรรมการศึกษาคนสตูล:...</p>
                    <p>4 ชั่วโมงที่แล้ว</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="<?php echo base_url(); ?>assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>ศศลักษณ์ ทองขาว</h4>
                    <p>สอบถามเกี่ยวกับการลงบทความความร่วมมือเชิงรุกในการสร้างนวัตกรรมการศึกษาและบริหารจัดการพื้นที่นวัตกรรมการศึกษาจังหวัดสตูล...</p>
                    <p>6 ชั่วโมงที่แล้ว</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="<?php echo base_url(); ?>assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>สมคิด ทองสง</h4>
                    <p>สอบถามเกี่ยวกับการนำวิดีโอที่จะประกอบการเรียนการสอนขึ้นระบบครับ...</p>
                    <p>8 ชั่วโมงที่แล้ว</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">แสดงข้อความทั้งหมด</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Nav -->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/profile-default.png" alt="Profile" class="rounded-circle'); ?>">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?= $UserName ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?= $UserFullName ?></h6>
                <?php
                if ($UserSchoolID == "-99999") {
                ?>
                  <span>ส่วนกลาง</span>
                <?php
                } else {
                ?>
                  <span><?= $UserTypeName ?></span>
                <?php
                }
                ?>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#" data-id="<?= $UserID; ?>" data-name="<?= $UserFullName; ?>" data-groupid="<?= $UserGroupID; ?>" data-schoolid="<?= $UserSchoolID; ?>" data-email="<?= $UserEmail; ?>" data-birthdate="<?= $UserBirthDate; ?>" data-phone="<?= $UserPhone; ?>" data-type="<?= $UserType; ?>" data-cardtype="<?= $UserCardType; ?>" data-cardno="<?= $UserCardNo; ?>" data-bs-toggle="modal" data-bs-target="#UserFRMModal">
                  <i class="bi bi-person"></i>
                  <span>ข้อมูลส่วนตัว</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <?php
              if ($GroupTypeCode == "Admin") {
              ?>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>Admin/ConfigSystem">
                    <i class="bi bi-gear"></i>
                    <span>จัดการระบบ</span>
                  </a>
                </li>
              <?php
              }
              ?>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>logout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>ออกจากระบบ</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        <?php
        } else {
        ?>

          <li class="nav-item dropdown">
          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown">
          </li><!-- End Messages Nav -->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/member-18-48.png" alt="Profile" class="rounded-circle'); ?>">
              <span class="d-none d-md-block ps-2">เข้าสู่ระบบ</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <form id="logForm" class="row g-3 needs-validation" method="post" action="<?php echo base_url(); ?>login">
                  <div class="col-12">
                    <label for="yourUsername" class="form-label float-start">ชื่อผู้ใช้งาน</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control" id="username" autocomplete="off" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label float-start">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="forgetpassword"><a href="#">ลืมรหัสผ่าน</a></label>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" name="submit">ลงชื่อเข้าใช้งาน</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">ยังไม่เป็นสมาชิก? <a href="#" data-bs-toggle="modal" data-bs-target="#UserPrivacyPolicyFRMModal">ลงทะเบียนใหม่</a></p>
                  </div>
                </form>
              </li>
            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        <?php
        }
        ?>

      </ul>
    </nav><!-- End Icons Navigation -->



  </header><!-- End Header -->

  <!------------------------ format Thai -----------------------!>
    <?php
    function DateThai($strDate)
    {
      $strYear = date("Y", strtotime($strDate)) + 543;
      $strMonth = date("n", strtotime($strDate));
      $strDay = date("j", strtotime($strDate));
      $strHour = date("H", strtotime($strDate));
      $strMinute = date("i", strtotime($strDate));
      $strSeconds = date("s", strtotime($strDate));
      $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
      $strMonthThai = $strMonthCut[$strMonth];
      return "$strDay $strMonthThai $strYear";
    }

    $strDate = "2008-08-14 13:42:44";
    echo "ThaiCreate.Com Time now : " . DateThai($strDate);
    ?>
  <!-------------------- format Thai - END ---------------------!>
  <?php
  // Function to get the client IP address
 function get_client_ip() {
    $ip_address = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
  ?>