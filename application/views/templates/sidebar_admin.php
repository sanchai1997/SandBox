 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="<?php echo base_url(); ?>Main">
         <i class="bi bi-grid"></i>
         <span>หน้าหลัก</span>
       </a>
     </li><!-- End รายงาน Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url(); ?>Admin/ConfigSystem">
         <i class="bi bi-person "></i>
         <span>ข้อมูลพื้นฐาน</span>
       </a>
     </li><!-- End ข้อมูลพื้นฐาน Nav -->
	 
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url(); ?>Admin/UserGroups">
         <i class="bi bi-person "></i>
         <span>กลุ่มผู้ใช้งานระบบ</span>
       </a>
     </li><!-- End จัดการบัญชีผู้ใช้ระบบ Nav -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url(); ?>Admin/Registers">
         <i class="bi bi-person "></i>
         <span>บัญชีรอเปิดใช้งานระบบ</span>
       </a>
     </li><!-- End จัดการบัญชีผู้ลงทะเบียน Nav -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url(); ?>Admin/Users">
         <i class="bi bi-person "></i>
         <span>บัญชีผู้ใช้งานระบบ</span>
       </a>
     </li><!-- End จัดการบัญชีผู้ใช้ระบบ Nav -->
	 
    <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-gear-fill"></i><span>กำหนดค่าระบบ</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <li>
           <a href="<?php echo base_url(); ?>Admin/PrivacyPolicy">
             <i class="bi bi-circle"></i><span>นโยบายการคุ้มครองข้อมูลส่วนบุคคล</span>
           </a>
         </li>
         <li>
           <a href="<?php echo base_url(); ?>Admin/CookiePolicy">
             <i class="bi bi-circle"></i><span>นโยบายคุกกี้ (Cookie Policy)</span>
           </a>
         </li>		 
         <li>
		   <a href="<?php echo base_url(); ?>Admin/MailServer">
			 <i class="bi bi-circle "></i>
			 <span>Mail Server</span>
		   </a>
         </li>
       </ul>
     </li><!-- End กำหนดค่าระบบ Nav -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url(); ?>Admin/SystemLogs">
         <i class="bi bi-person "></i>
         <span>ข้อมูล System Logs</span>
       </a>
     </li><!-- End ข้อมูลพื้นฐาน Nav -->	 
    </ul>
  </li><!-- End Components Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li>End Login Page Nav -->

</ul>

</aside><!-- End Sidebar-->