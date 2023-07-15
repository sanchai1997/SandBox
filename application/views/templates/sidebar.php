 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="main">
         <i class="bi bi-grid"></i>
         <span>หน้าหลัก</span>
       </a>
     </li><!-- End รายงาน Nav -->


     <?php if ($UserGroupID == '3') {  ////นักเรียน  
      ?>
       <li class="nav-item">
         <a class="nav-link collapsed" href="school">
           <i class="bi bi-file-earmark-text"></i><span>ข้อมูลสถานศึกษา</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="student?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
           <i class="bi bi-file-earmark-text"></i><span>ข้อมูลนักเรียน</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="transcript?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
           <i class="bi bi-file-earmark-text"></i><span>ข้อมูลผลสัมฤทธิ์ทางการศึกษา</span>
         </a>
       </li>
     <?php } ?>

     <?php if ($UserGroupID == '4') {  ////นักเรียน  
      ?>
       <li class="nav-item">
         <a class="nav-link collapsed" href="student?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
           <i class="bi bi-file-earmark-text"></i><span>ข้อมูลนักเรียน</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="transcript?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
           <i class="bi bi-file-earmark-text"></i><span>ข้อมูลผลสัมฤทธิ์ทางการศึกษา</span>
         </a>
       </li>
     <?php } ?>


     <?php if ($UserGroupID != '3' && $UserGroupID != '4') {  ////ไม่ใช่นักเรียน  
      ?>
       <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-journal-text"></i><span>ข้อมูลพื้นฐาน</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="school">
               <i class="bi bi-circle"></i><span>ข้อมูลสถานศึกษา</span>
             </a>
           </li>
           <li>
             <a href="student?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
               <i class="bi bi-circle"></i><span>ข้อมูลนักเรียน</span>
             </a>
           </li>
           <?php if ($UserGroupID != '3' && $UserGroupID != '4' && $UserGroupID != '7') { ?>
             <li>
               <a href="teacher?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
                 <i class="bi bi-circle"></i><span>ข้อมูลครูและบุคลากรทางการศึกษา</span>
               </a>
             </li>
           <?php } ?>
           <?php if ($UserGroupID == '1' ||  $UserGroupID == '6' ||  $UserGroupID == '7') { ?>
             <li>
               <a href="personnel?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>">
                 <i class="bi bi-circle"></i><span>ข้อมูลบุคลากรอื่น</span>
               </a>
             </li>
           <?php } ?>
           <li>
             <a href="transcript?UserReferenceID=<?php echo $UserCardNo; ?>&&UserGroupID=<?php echo $UserGroupID; ?>&&UserSchoolID=<?php echo $UserSchoolID; ?>">
               <i class="bi bi-circle"></i><span>ข้อมูลผลสัมฤทธิ์ทางการศึกษา</span>
             </a>
           </li>
           <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
             <li>
               <a href="graduated">
                 <i class="bi bi-circle"></i><span>ข้อมูลผู้สำเร็จการศึกษา</span>
               </a>
             </li>
           <?php } ?>
         </ul>
       </li><!-- End ข้อมูลพื้นฐาน Nav -->
     <?php } ?>
     <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
       <li class="nav-item">
         <a class="nav-link collapsed" href="list-curriculum">
           <i class="bi bi-journal-text"></i>
           <span>ข้อมูลหลักสูตร/หลักสูตรของพื้นที่นวัตกรรม</span>
         </a>
       </li><!-- End ข้อมูลหลักสูตร Page Nav -->

       <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#forms-kpi" data-bs-toggle="collapse" href="#">
           <i class="bi bi-journal-text"></i><span>มาตรฐานการเรียนรู้และตัวชี้วัด</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>

         <ul id="forms-kpi" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="list-subject_group">
               <i class="bi bi-circle"></i><span>กลุ่มสาระการเรียนรู้</span>
             </a>
           </li>
           <li>
           <a href="list-kpi?gid=1&&y=211&&lc=1">
               <i class="bi bi-circle"></i><span>ตัวชี้วัดชั้นปี</span>
             </a>
           </li>

         </ul>
       </li><!-- End ข้อมูลหลักสูตร Page Nav -->

       <li class="nav-item">
         <a class="nav-link collapsed" href="list-teacher_development_activity">
           <i class="bi bi-person "></i>
           <span>ข้อมูลการพัฒนาบุคลากร</span>
         </a>
       </li><!-- End ข้อมูลการพัฒนาบุคลากร Page Nav -->

       <li class="nav-item">
         <a class="nav-link collapsed" href="list-budget">
           <i class="bi bi-journal-text"></i>
           <span>ข้อมูลงบประมาณ</span>
         </a>
       </li><!-- End ข้อมูลงบประมาณ Page Nav -->

       <li class="nav-item">
         <a class="nav-link collapsed" href="list-area_identity">
           <i class="bi bi-card-list"></i>
           <span>ข้อมูลอัตลักษณ์ของแต่ละพื้นที่</span>
         </a>
       </li><!-- End ข้อมูลอัตลักษณ์ของแต่ละพื้นที่ Page Nav -->
     <?php } ?>
     <?php if ($UserGroupID != '4') { ?>
       <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-menu-button-wide"></i><span>ข้อมูลนวัตกรรมการศึกษา</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
             <li>
               <a href="<?php echo site_url('Fm_innovation_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>นวัตกรรมการศึกษา</span>
               </a>
             </li>
           <?php } ?>
           <?php if ($UserGroupID != '4') { ?>
             <li>
               <a href="<?php echo site_url('Fm_lear_tech_media_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>เทคโนโลยีและสื่อการเรียนรู้</span>
               </a>
             </li>
           <?php } ?>
           <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
             <li>
               <a href="<?php echo site_url('Fm_best_practice_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>แนวปฏิบัติที่เป็นเลิศ</span>
               </a>
             </li>
             <li>
               <a href="<?php echo site_url('Fm_participant_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>หน่วยงานที่เข้ามามีส่วนร่วม</span>
               </a>
             </li>
             <li>
               <a href="<?php echo site_url('Fm_committee_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>อำนาจและหน้าที่ของคณะกรรมการ</span>
               </a>
             </li>
             <li>
               <a href="<?php echo site_url('Fm_evaluation_das_p1?page=sh1') ?>">
                 <i class="bi bi-circle"></i><span>การประกันคุณภาพด้วยตัวชี้วัด</span>
               </a>
             </li>
           <?php } ?>
         </ul>
       </li><!-- End Components Nav -->
     <?php } ?>
     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-menu-button-wide"></i><span>รายงาน</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สรุปการวัดผลทั้งสองภาคทุกตัวชี้วัด</span>
             </a>
           </li>
         <?php } ?>
         <?php if ($UserGroupID != '7') { ?>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สมรรถนะผู้เรียนเป็นรายบุคคล</span>
             </a>
           </li>
         <?php } ?>
         <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สมรรถนะผู้เรียนเป็นรายห้องเรียน</span>
             </a>
           </li>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สมรรถนะผู้เรียนเป็นโรงเรียน</span>
             </a>
           </li>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สมรรถนะผู้เรียนเป็นพื้นที่</span>
             </a>
           </li>
         <?php } ?>
         <?php if ($UserGroupID != '3' && $UserGroupID != '7') { ?>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>การพัฒนาคุณภาพผู้เรียนรายบุคคล</span>
             </a>
           </li>
           <li>
           <?php } ?>
           <?php if ($UserGroupID != '3' && $UserGroupID != '4') { ?>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>การพัฒนาคุณภาพผู้เรียนเป็นโรงเรียน</span>
             </a>
           </li>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>การพัฒนาคุณภาพผู้เรียนเป็นพื้นที่</span>
             </a>
           </li>
         <?php } ?>
         <?php if ($UserGroupID != '7') { ?>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span> ปพ.5 ปพ.6 เป็นรายบุคคล</span>
             </a>
           </li>
           <li>
             <a href="<?php echo site_url('') ?>">
               <i class="bi bi-circle"></i><span>สมุดพกเป็นรายบุคคล</span>
             </a>
           </li>
         <?php } ?>
       </ul>
     </li><!-- End ข้อมูลอัตลักษณ์ของแต่ละพื้นที่ Page Nav -->
     <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li>End Login Page Nav -->

   </ul>

 </aside><!-- End Sidebar-->