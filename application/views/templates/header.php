<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  <link href="<?php  echo base_url('assets/img/mini-icon.png" rel="icon');?>">
  <link href="<?php  echo base_url('assets/img/apple-touch-icon.png" rel="apple-touch-icon');?>">

  <!-- Google Fonts -->
  <link href="<?php  echo base_url('https://fonts.gstatic.com" rel="preconnect');?>">
  <link href="<?php  echo base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet');?>">

  <!-- Vendor CSS Files -->
  <link href="<?php  echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/quill/quill.snow.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/quill/quill.bubble.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/vendor/simple-datatables/style.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php  echo base_url('assets/css/style.css" rel="stylesheet');?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php  echo base_url('assets/img/logo.png');?>" alt="">
        <span class="d-none d-lg-block">Satun Sandbox</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
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

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              คุณมี 4 ประกาศใหม่
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">แสดงทั้งหมด</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>กิจกรรมเด็กดี</h4>
                <p>กิจกรรมเด็กดี โรงเรียนอนุบาลสตูล</p>
                <p>30 นาทีที่แล้ว</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>พลเมืองนวัตกรในพื้นที่นวัตกรรม</h4>
                <p>กิจกรรมน่าสนใจบ่ายนี้ที่ ม.ทักษิณ “พลเมืองนวัตกรในพื้นที่นวัตกรรม”
เวลา 13:00 น. เป็นต้นไป หอประชุมปาริชาต มหาวิทยาลัยทักษิณ วิทยาเขตสงขลา</p>
                <p>1 ชั่วโมงที่แล้ว</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>สมัชชาการศึกษาจังหวัดสตูล</h4>
                <p>สมัชชาการศึกษาจังหวัดสตูล #3 ฐานสมรรถนะ = ฐานชีวิต ระหว่างวันที่ 22 – 23 กันยายน 2565 ณ มหาวิทยาลัยราชภัฏสงขลา วิทยาเขตสตูล</p>
                <p>2 ชั่วโมงที่แล้ว</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>สมัชชาการศึกษาจังหวัดสตูล ครั้งที่3</h4>
                <p>สมัชชาการศึกษาจังหวัดสตูล ครั้งที่3 8760 โรงเรียนเป็นส่วนหนึ่งของระบบการศึกษา เราเชื่อว่าการศึกษาเป็นเรื่องของทุกคน</p>
                <p>3 วันที่แล้ว</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">แสดงประกาศทั้งหมด</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

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
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
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
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
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
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
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
            <img src="<?php  echo base_url('assets/img/profile-img.jpg" alt="Profile" class="rounded-circle');?>">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>อำนาจ ทองขาว</h6>
              <span>ครู</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>ประวัติ</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>ตั้งค่าส่วนตัว</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>ช่วยเหลือ</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>ออกจากระบบ</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
