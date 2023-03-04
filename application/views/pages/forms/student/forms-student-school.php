               <main id="main" class="main">

                 <div class="pagetitle">
                   <h1>ข้อมูลสถานศึกษา</h1>
                   <nav>
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                       <li class="breadcrumb-item">Form</li>
                       <li class="breadcrumb-item active">Student</li>
                     </ol>
                   </nav>
                 </div><!-- End Page Title -->

                 <form class="row g-3" action="<?php echo base_url('forms-student-presents'); ?>" method="POST">
                   <section class="section">
                     <div class="row">
                       <div class="col-lg-9">
                         <div class="card">
                           <div class="card-body">
                             <h5 class="card-title">ข้อมูลสถานศึกษา</h5>
                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>
                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>
                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ภาคเรียน</label>
                               <div class="col-sm-10">
                                 <input type="number" class="form-control">
                               </div>
                             </div>
                             <div class="row mb-3">
                               <label for="inputNumber" class="col-sm-2 col-form-label">หมายเลขประจำตัวนักเรียน</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>
                             <div class="row mb-3">
                               <label class="col-sm-2 col-form-label">สถานะภาพนักเรียน</label>
                               <div class="col-sm-10">
                                 <select class="form-select" aria-label="Default select example">
                                   <option selected>สถานะภาพ</option>
                                   <option value="1">กำลังเรียน</option>
                                   <option value="2">พักการเรียน</option>
                                   <option value="3">เสียชีวิต</option>
                                   <option value="4">อยู่ระหว่างดำเนินการติดตาม</option>
                                   <option value="5">ลาออก</option>
                                   <option value="6">พ้นสภาพ</option>
                                   <option value="7">สำเร็จการศึกษา</option>
                                 </select>
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label class="col-sm-2 col-form-label">ประเภทบัตรประจำดัว</label>
                               <div class="col-sm-10">
                                 <select class="form-select" aria-label="Default select example">
                                   <option selected>ประเภทบัตรประจำตัว</option>
                                   <option value="1">บัตรประจำตัวประชาชน</option>
                                   <option value="2">บัตรอื่นๆ</option>
                                   <option value="3">ไม่มีบัตรอะไรเลย</option>
                                 </select>
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">หมายเลขประจำตัว</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">เลขที่หนังสือเดินทาง</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียนในระดับการศึกษา</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ปีการศึกษาที่เริ่มเข้าเรียน</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label class="col-sm-2 col-form-label">ระดับการศึกษา</label>
                               <div class="col-sm-10">
                                 <select class="form-select" aria-label="Default select example">
                                   <option selected>เลือก</option>
                                   <option value="01">เตรียมอนุบาล</option>
                                   <option value="02">ก่อนประถมศึกษา</option>
                                   <option value="03">ประถมศึกษา</option>
                                   <option value="04">มัธยมศึกษาตอนต้น</option>
                                   <option value="05">มัธยมศึกษาตอนปลาย</option>
                                 </select>
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label class="col-sm-2 col-form-label">ชั้นเรียน</label>
                               <div class="col-sm-10">
                                 <select class="form-select" aria-label="Default select example">
                                   <option selected>เลือก</option>
                                   <option value="100">เตรียมอนุบาล</option>
                                   <option value="111">อนุบาล 1(หลักสูตร 3 ปีของ สช.)/อนุบาล 3 ขวบ</option>
                                   <option value="112">อนุบาล 2(หลักสูตร 3 ปีของ สช.)/อนุบาล 1</option>
                                   <option value="113">อนุบาล 3(หลักสูตร 3 ปีของ สช.)/อนุบาล 2</option>
                                   <option value="114">เด็กเล็ก</option>
                                   <option value="211">ประถมศึกษาปีที่ 1/เกรด 1</option>
                                   <option value="212">ประถมศึกษาปีที่ 2/เกรด 2</option>
                                   <option value="213">ประถมศึกษาปีที่ 3/เกรด 3</option>
                                   <option value="214">ประถมศึกษาปีที่ 4/เกรด 4</option>
                                   <option value="215">ประถมศึกษาปีที่ 5/เกรด 5</option>
                                   <option value="216">ประถมศึกษาปีที่ 6/เกรด 6</option>
                                   <option value="217">กศน.ประถมศึกษา (ป.6)</option>
                                   <option value="311">มัธยมศึกษาปีที่ 1 /เกรด 7/ นาฎศิลป์ชั้นที่ 1</option>
                                   <option value="312">มัธยมศึกษาปีที่ 2 /เกรด 8/ นาฎศิลป์ชั้นที่ 2</option>
                                   <option value="313">มัธยมศึกษาปีที่ 3 /เกรด 9/ นาฎศิลป์ชั้นที่ 3</option>
                                   <option value="414">กศน.มัธยมศึกษาตอนต้น (ม.3)</option>
                                   <option value="411">มัธยมศึกษาปีที่ 4/เกรด10/เตรียมทหารชั้นปีที่ 1</option>
                                   <option value="412">มัธยมศึกษาปีที่ 5/เกรด11/เตรียมทหารชั้นปีที่ 2</option>
                                   <option value="413">มัธยมศึกษาปีที่ 6/เกรด12/เตรียมทหารชั้นปีที่ 3</option>
                                   <option value="314">กศน.มัธยมศึกษาตอนปลาย (ม.6)</option>
                                 </select>
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ห้องเรียน</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <fieldset class="row mb-3">
                               <legend class="col-form-label col-sm-2 pt-0">เรียนหลักสูตรทวิศึกษา</legend>
                               <div class="col-sm-10">
                                 <div class="form-check">
                                   <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0" checked>
                                   <label class="form-check-label" for="gridRadios1">
                                     ไม่ได้เรียน
                                   </label>
                                 </div>
                                 <div class="form-check">
                                   <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                                   <label class="form-check-label" for="gridRadios2">
                                     เรียน
                                   </label>
                                 </div>
                               </div>
                             </fieldset>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">หลักสูตร</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label class="col-sm-2 col-form-label">ประเภทการเดินทางมาโรงเรียน</label>
                               <div class="col-sm-10">
                                 <select class="form-select" aria-label="Default select example">
                                   <option selected>เลือก</option>
                                   <option value="01">เดินเท้า</option>
                                   <option value="02">พาหนะไม่เสียค่าโดยสาร</option>
                                   <option value="03">พาหนะเสียค่าโดยสาร</option>
                                   <option value="04">จักรยานยืมเรียน</option>
                                 </select>
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ระยะเวลาการเดินทางจากบ้านมาโรงเรียน</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลูกรัง</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านถนนลาดยาง</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="row mb-3">
                               <label for="inputText" class="col-sm-2 col-form-label">ระยะทางไปโรงเรียนที่ผ่านทางน้ำ</label>
                               <div class="col-sm-10">
                                 <input type="text" class="form-control">
                               </div>
                             </div>

                             <div class="text-center">
                               <a href="student" style="float: left;" class="btn btn-light">ยกเลิก</a>
                               <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                               <button style="float: right;" type="submit" class="btn btn-primary">หน้าถัดไป</button>
                             </div>
                 </form><!-- End floating Labels Form -->
                 <br>

                 </div>
                 </div>

                 </div>

                 </div>
                 </section>

               </main><!-- End #main --