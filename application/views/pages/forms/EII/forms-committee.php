<main id="main" class="main">
<?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
<div class="pagetitle">
        <div class="row "> 
         <?php switch ($page) {
                case 'sh1':
            ?> <h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง</h1>
                <?php break;
                case 'sh2':
                ?> <h1>ข้อมูลรายชื่อคณะกรรมการ</h1>
                <?php
                    break;
                default:
                ?>
            <?php
                    break;
            }  ?>

            <div class="col-3">
               
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-9" style="padding-right: 25px;">
                <a href="<?php echo site_url('Fm_committee/committee?page=sh1') ?>" style="float: right;"
                    class="btn btn-sm btn-light"
                    data-mdb-ripple-color="dark">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</a>
                <h5 style="float: right;"> | </h5>
                <a href="<?php echo site_url('Fm_committee/member?page=sh2') ?>" style="float: right;"
                    class="btn btn-sm btn-light" data-mdb-ripple-color="dark">ข้อมูลรายชื่อคณะกรรมการ</a>
            </div>
        </div>
    </div>
   
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body ">
        
            <?php

            $page = isset($_GET['page']) ? $_GET['page'] : '';
            
            if ($page == 'sh1') { 
             
              ?>

              <h5 class="card-title fs-5">ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ</h5>

              <!-- start Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
              <form action="<?php echo site_url('Fm_committee/adding'); ?>" method="post" enctype="multipart/form-data">

                <div class="row mb-3">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="CommitteeProvinceCode">
                      <option selected>เลือก</option>
                      <option value="10">กรุงเทพมหานคร</option>
                      <option value="11">สมุทรปราการ</option>
                      <option value="12">นนทบุรี</option>
                      <option value="13">ปทุมธานี</option>
                      <option value="14">พระนครศรีอยุธยา</option>
                      <option value="15">อ่างทอง</option>
                      <option value="16">ลพบุรี</option>
                      <option value="17">สิงห์บุรี</option>
                      <option value="18">ชัยนาท</option>
                      <option value="19">สระบุรี</option>
                      <option value="20">ชลบุรี</option>
                      <option value="21">ระยอง</option>
                      <option value="22">จันทบุรี</option>
                      <option value="23">ตราด</option>
                      <option value="24">ฉะเชิงเทรา</option>
                      <option value="25">ปราจีนบุรี</option>
                      <option value="26">นครนายก</option>
                      <option value="27">สระแก้ว</option>
                      <option value="30">นครราชสีมา</option>
                      <option value="31">บุรีรัมย์</option>
                      <option value="32">สุรินทร์</option>
                      <option value="33">ศรีสะเกษ</option>
                      <option value="34">อุบลราชธานี</option>
                      <option value="35">ยโสธร</option>
                      <option value="36">ชัยภูมิ</option>
                      <option value="37">อำนาจเจริญ</option>
                      <option value="38">บึงกาฬ</option>
                      <option value="39">หนองบัวลำภู</option>
                      <option value="40">ขอนแก่น</option>
                      <option value="41">อุดรธานี</option>
                      <option value="42">เลย</option>
                      <option value="43">หนองคาย</option>
                      <option value="44">มหาสารคาม</option>
                      <option value="45">ร้อยเอ็ด</option>
                      <option value="46">กาฬสินธุ์</option>
                      <option value="47">สกลนคร</option>
                      <option value="48">นครพนม</option>
                      <option value="49">มุกดาหาร</option>
                      <option value="50">เชียงใหม่</option>
                      <option value="51">ลำพูน</option>
                      <option value="52">ลำปาง</option>
                      <option value="53">อุตรดิตถ์</option>
                      <option value="54">แพร่</option>
                      <option value="55">น่าน</option>
                      <option value="56">พะเยา</option>
                      <option value="57">เชียงราย</option>
                      <option value="58">แม่ฮ่องสอน</option>
                      <option value="60">นครสวรรค์</option>
                      <option value="61">อุทัยธานี</option>
                      <option value="62">กำแพงเพชร</option>
                      <option value="63">ตาก</option>
                      <option value="64">สุโขทัย</option>
                      <option value="65">พิษณุโลก</option>
                      <option value="66">พิจิตร</option>
                      <option value="67">เพชรบูรณ์</option>
                      <option value="70">ราชบุรี</option>
                      <option value="71">กาญจนบุรี</option>
                      <option value="72">สุพรรณบุรี</option>
                      <option value="73">นครปฐม</option>
                      <option value="74">สมุทรสาคร</option>
                      <option value="75">สมุทรสงคราม</option>
                      <option value="76">เพชรบุรี</option>
                      <option value="77">ประจวบคีรีขันธ์</option>
                      <option value="80">นครศรีธรรมราช</option>
                      <option value="81">กระบี่</option>
                      <option value="82">พังงา</option>
                      <option value="83">ภูเก็ต</option>
                      <option value="84">สุราษฎร์ธานี</option>
                      <option value="85">ระนอง</option>
                      <option value="86">ชุมพร</option>
                      <option value="90">สงขลา</option>
                      <option value="91">สตูล</option>
                      <option value="92">ตรัง</option>
                      <option value="93">พัทลุง</option>
                      <option value="94">ปัตตานี</option>
                      <option value="95">ยะลา</option>
                      <option value="96">นราธิวาส</option>
                    </select>
                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                  </div>
                </div>

                <div class="row mb-3">
                 <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear">
                      <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                    </div>
                 </div>
              
                  <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="เลขออกคำสั่ง" name="CommitteeAppointmentNumber">
                      <label for="floatingName"><?php echo nbs(2); ?> เลขออกคำสั่ง </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeAppointmentTypeCode">
                                        <option selected>เลือก</option>
                                        <option value="01">แต่งตั้งคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</option>
                                        <option value="02">แต่งตั้งคณะอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษา</option>
                                        
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทการแต่งตั้ง</label>
                                </div>
                            </div>
                <div class="row mb-2">
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="CommitteeAppointmentAttachmentURL">
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
              </form> <!-- end Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
            <?php
            } ?>
            <?php

            if ($page == 'sh2') { ?>
              <!-- start Form ข้อมูลรายชื่อคณะกรรมการ -->
              <form action="<?php echo site_url('Fm_committee/adding_member'); ?>" method="post">
              <h5 class="card-title ">ข้อมูลรายชื่อคณะกรรมการ</h5>
              <div class="row mb-3">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="CommitteeProvinceCode">
                      <option selected>เลือก</option>
                      <option value="10">กรุงเทพมหานคร</option>
                      <option value="11">สมุทรปราการ</option>
                      <option value="12">นนทบุรี</option>
                      <option value="13">ปทุมธานี</option>
                      <option value="14">พระนครศรีอยุธยา</option>
                      <option value="15">อ่างทอง</option>
                      <option value="16">ลพบุรี</option>
                      <option value="17">สิงห์บุรี</option>
                      <option value="18">ชัยนาท</option>
                      <option value="19">สระบุรี</option>
                      <option value="20">ชลบุรี</option>
                      <option value="21">ระยอง</option>
                      <option value="22">จันทบุรี</option>
                      <option value="23">ตราด</option>
                      <option value="24">ฉะเชิงเทรา</option>
                      <option value="25">ปราจีนบุรี</option>
                      <option value="26">นครนายก</option>
                      <option value="27">สระแก้ว</option>
                      <option value="30">นครราชสีมา</option>
                      <option value="31">บุรีรัมย์</option>
                      <option value="32">สุรินทร์</option>
                      <option value="33">ศรีสะเกษ</option>
                      <option value="34">อุบลราชธานี</option>
                      <option value="35">ยโสธร</option>
                      <option value="36">ชัยภูมิ</option>
                      <option value="37">อำนาจเจริญ</option>
                      <option value="38">บึงกาฬ</option>
                      <option value="39">หนองบัวลำภู</option>
                      <option value="40">ขอนแก่น</option>
                      <option value="41">อุดรธานี</option>
                      <option value="42">เลย</option>
                      <option value="43">หนองคาย</option>
                      <option value="44">มหาสารคาม</option>
                      <option value="45">ร้อยเอ็ด</option>
                      <option value="46">กาฬสินธุ์</option>
                      <option value="47">สกลนคร</option>
                      <option value="48">นครพนม</option>
                      <option value="49">มุกดาหาร</option>
                      <option value="50">เชียงใหม่</option>
                      <option value="51">ลำพูน</option>
                      <option value="52">ลำปาง</option>
                      <option value="53">อุตรดิตถ์</option>
                      <option value="54">แพร่</option>
                      <option value="55">น่าน</option>
                      <option value="56">พะเยา</option>
                      <option value="57">เชียงราย</option>
                      <option value="58">แม่ฮ่องสอน</option>
                      <option value="60">นครสวรรค์</option>
                      <option value="61">อุทัยธานี</option>
                      <option value="62">กำแพงเพชร</option>
                      <option value="63">ตาก</option>
                      <option value="64">สุโขทัย</option>
                      <option value="65">พิษณุโลก</option>
                      <option value="66">พิจิตร</option>
                      <option value="67">เพชรบูรณ์</option>
                      <option value="70">ราชบุรี</option>
                      <option value="71">กาญจนบุรี</option>
                      <option value="72">สุพรรณบุรี</option>
                      <option value="73">นครปฐม</option>
                      <option value="74">สมุทรสาคร</option>
                      <option value="75">สมุทรสงคราม</option>
                      <option value="76">เพชรบุรี</option>
                      <option value="77">ประจวบคีรีขันธ์</option>
                      <option value="80">นครศรีธรรมราช</option>
                      <option value="81">กระบี่</option>
                      <option value="82">พังงา</option>
                      <option value="83">ภูเก็ต</option>
                      <option value="84">สุราษฎร์ธานี</option>
                      <option value="85">ระนอง</option>
                      <option value="86">ชุมพร</option>
                      <option value="90">สงขลา</option>
                      <option value="91">สตูล</option>
                      <option value="92">ตรัง</option>
                      <option value="93">พัทลุง</option>
                      <option value="94">ปัตตานี</option>
                      <option value="95">ยะลา</option>
                      <option value="96">นราธิวาส</option>
                    </select>
                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                  </div>
                </div>
                 <div class="row mb-3">
                               <div class="col">
                                  <div class="form-floating">
                                      <input type="text" class="form-control" id="floatingName" placeholder="ปีที่ออกคำสั่ง"
                                          name="CommitteeYear">
                                      <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                  </div>
                               </div>
                           
                                <div class="col">
                                  <div class="form-floating">
                                      <input type="text" class="form-control" id="floatingName" placeholder="เลขที่คำสั่ง"
                                          name="CommitteeAppointmentNumber">
                                      <label for="floatingName"><?php echo nbs(2); ?> เลขที่คำสั่ง </label>
                                  </div>
                                </div>
                            </div>
                <div class="row mb-3">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="CommitteeMemberPrefixCode">
                      <option selected>เลือก</option>
                      <option value="003">นาย</option>
                      <option value="004">นางสาว</option>
                      <option value="005">นาง</option>
                    </select>
                    <label for="floatingSelect"><?php echo nbs(2); ?>คำนำหน้าชื่อ</label>
                  </div>
                </div>
                <div class="row mb-3">
                 <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)" name="CommitteeMemberNameThai">
                      <label for="floatingName"><?php echo nbs(2); ?> ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย) </label>
                    </div>
                 </div>
                
                 <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)" name="CommitteeMemberNameEnglish">
                      <label for="floatingName"><?php echo nbs(2); ?> ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ) </label>
                    </div>
                 </div>
                </div>
                <div class="row mb-3">
                 <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)" name="CommitteeMemberMiddleNameThai">
                      <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)</label>
                    </div>
                    </div>
                 
              
                <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)" name="CommitteeMemberMiddleNameEnglish">
                      <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                    </div>
                </div>
                </div>
                <div class="row mb-3">
                 <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)" name="CommitteeMemberLastNameThai">
                      <label for="floatingName"><?php echo nbs(2); ?> นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)</label>
                    </div>
                 </div>
               
                  <div class="col">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)" name="CommitteeMemberLastNameEnglish">
                      <label for="floatingName"><?php echo nbs(2); ?> นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                    </div>
                  </div>
                </div>
            
                <div class="row mb-3">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="CommitteeMemberPositionCode">
                      <option selected>เลือก</option>
                      <option value="01">ประธาน</option>
                      <option value="23">อนุกรรมการ</option>
                      <option value="24">อนุกรรมการและเลขานุการ</option>
                      <option value="25">อนุกรรมการและผู้ช่วยเลขานุการ</option>
                    </select>
                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง" name="CommitteeMemberOrganizationPosition">
                    <label for="floatingName"><?php echo nbs(2); ?> ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="Share" placeholder="Share" name="CommitteeMemberTermStartDate">
                      <label for="Share">เริ่มวาระการดำรงตำแหน่ง</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="Share" placeholder="Share" name="CommitteeMemberTermEndDate">
                      <label for="Share">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
              </form><!-- end Form ข้อมูลรายชื่อคณะกรรมการ -->


            
<?php
           } ?>
              
           
          </div> <!--สุดขอบการ์ด -->
        </div>

      </div>


    </div>
  </section>

</main><!-- End #main -->