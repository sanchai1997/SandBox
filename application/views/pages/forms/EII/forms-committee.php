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
                    case 'sh11':
                    ?> <h1>ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง</h1>
            <?php break;
                        case 'sh22':
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
                        <li class="breadcrumb-item active">อำนาจและหน้าที่ของคณะกรรมการขับเคลื่อน</li>
                    </ol>
                </nav>
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

                        <h5 class="card-title fs-5">
                            ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ</h5>

                        <!-- start Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                        <form action="<?php echo site_url('c_forms_up_p1'); ?>" method="post"
                            enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeProvinceCode">
                                        <option selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->PROVINCE_CODE; ?>"><?= $cls->PROVINCE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="เลขออกคำสั่ง" name="CommitteeAppointmentNumber">
                                        <label for="floatingName"><?php echo nbs(2); ?> เลขออกคำสั่ง </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeAppointmentTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                            $result = $this->db->query('SELECT * FROM CLS_APPOINTMENT_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                        <option value="<?= $cls->APPOINTMENT_TYPE_CODE ; ?>">
                                            <?= $cls->APPOINTMENT_TYPE_NAME; ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทการแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="input-group mb-2">
                                    <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                                    <input type="file" class="form-control" id="inputGroupFile01"
                                        name="CommitteeAppointmentAttachmentURL">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </form>
                        <!-- end Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                        <?php
            } ?>
                        <?php

$page = isset($_GET['page']) ? $_GET['page'] : '';

if ($page == 'sh11') { 
 
  ?>
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM COMMITTEE 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>

                        <h5 class="card-title fs-5">
                            ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ</h5>

                        <!-- start Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                        <form action="<?php echo site_url('c_edit_p1'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeProvinceCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->PROVINCE_CODE; ?>"><?= $cls->PROVINCE_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear"
                                            value="<?php echo $show->CommitteeYear ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="เลขออกคำสั่ง" name="CommitteeAppointmentNumber"
                                            value="<?php echo $show->CommitteeAppointmentNumber ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> เลขออกคำสั่ง </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeAppointmentTypeCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_APPOINTMENT_TYPE');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->APPOINTMENT_TYPE_CODE ; ?>">
                                            <?= $cls->APPOINTMENT_TYPE_NAME; ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทการแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="input-group mb-2">
                                    <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารคำสั่ง</label>
                                    <input type="file" class="form-control" id="inputGroupFile01"
                                        name="CommitteeAppointmentAttachmentURL">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </form>
                        <!-- end Form ข้อมูลอำนาจและหน้าที่ของคณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาด้านต่าง ๆ -->
                        <?php
} }?>
                        <?php

            if ($page == 'sh2') { ?>
                        <!-- start Form ข้อมูลรายชื่อคณะกรรมการ -->
                        <form action="<?php echo site_url('cm_forms_up_p2'); ?>" method="post">

                        <h5 class="card-title ">ข้อมูลรายชื่อคณะกรรมการ</h5>
                        <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeProvinceCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->PROVINCE_CODE  ; ?>">
                                            <?= $cls->PROVINCE_NAME; ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="เลขที่คำสั่ง" name="CommitteeAppointmentNumber">
                                        <label for="floatingName"><?php echo nbs(2); ?> เลขที่คำสั่ง </label>
                                    </div>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeMemberPrefixCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>คำนำหน้าชื่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberNameThai">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย) </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberMiddleNameThai"
                                            value="">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย)</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberMiddleNameEnglish"
                                            value="">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberLastNameThai"
                                            value="">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย)</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberLastNameEnglish"
                                            value="">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeMemberPositionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_COMMITEE_POSITION');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->COMMITEE_POSITION_CODE ; ?>">
                                            <?= $cls->COMMITEE_POSITION_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label
                                        for="floatingSelect"><?php echo nbs(2); ?>รหัสตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง"
                                        name="CommitteeMemberOrganizationPosition"
                                        value="">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CommitteeMemberTermStartDate"
                                                value="">
                                            <label for="Share">เริ่มวาระการดำรงตำแหน่ง</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CommitteeMemberTermEndDate"
                                                value="">
                                            <label for="Share">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </form><!-- end Form ข้อมูลรายชื่อคณะกรรมการ -->



                        <?php
           } ?>
                        <?php

if ($page == 'sh22') { ?>
                        <!-- start Form ข้อมูลรายชื่อคณะกรรมการ -->
                        <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                        <?php
                            
                            $result = $this->db->query("SELECT * FROM COMMITTEE_MEMBER 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <form action="<?php echo site_url('cm_edit_p2'); ?>" method="post">
                        <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                        <h5 class="card-title ">ข้อมูลรายชื่อคณะกรรมการ</h5>
                        <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeProvinceCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_PROVINCE');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->PROVINCE_CODE  ; ?>">
                                            <?= $cls->PROVINCE_NAME; ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>จังหวัด</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีที่ออกคำสั่ง" name="CommitteeYear" value="<?php echo $show->CommitteeYear ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีที่ออกคำสั่ง </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="เลขที่คำสั่ง" name="CommitteeAppointmentNumber" value="<?php echo $show->CommitteeAppointmentNumber ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?> เลขที่คำสั่ง </label>
                                    </div>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeMemberPrefixCode" >
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_PREFIX');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->PREFIX_CODE ; ?>"><?= $cls->PREFIX_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(2); ?>คำนำหน้าชื่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberNameThai" value="<?php echo $show->CommitteeMemberNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย) </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberNameEnglish" value="<?php echo $show->CommitteeMemberNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชือกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberMiddleNameThai"
                                            value="<?php echo $show->CommitteeMemberMiddleNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย)</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberMiddleNameEnglish"
                                           value="<?php echo $show->CommitteeMemberMiddleNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            ชื่อกลางกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง (ภาษาไทย)"
                                            name="CommitteeMemberLastNameThai"
                                            value="<?php echo $show->CommitteeMemberLastNameThai ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง
                                            (ภาษาไทย)</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)"
                                            name="CommitteeMemberLastNameEnglish"
                                            value="<?php echo $show->CommitteeMemberLastNameEnglish ?>">
                                        <label for="floatingName"><?php echo nbs(2); ?>
                                            นามสกุลกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง(ภาษาอังกฤษ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CommitteeMemberPositionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                $result = $this->db->query('SELECT * FROM CLS_COMMITEE_POSITION');
                                foreach ($result->result() as $cls) {
                                ?>
                                        <option value="<?= $cls->COMMITEE_POSITION_CODE ; ?>">
                                            <?= $cls->COMMITEE_POSITION_NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label
                                        for="floatingSelect"><?php echo nbs(2); ?>รหัสตำแหน่งกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง"
                                        name="CommitteeMemberOrganizationPosition"
                                        value="<?php echo $show->CommitteeMemberOrganizationPosition ?>">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        ตำแหน่งในองค์กรของกรรมการและอนุกรรมการที่คณะกรรมการขับเคลื่อนพื้นที่นวัตกรรมการศึกษาแต่งตั้ง</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CommitteeMemberTermStartDate"
                                                value="<?php echo $show->CommitteeMemberTermStartDate ?>">
                                            <label for="Share">เริ่มวาระการดำรงตำแหน่ง</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CommitteeMemberTermEndDate"
                                                value="<?php echo $show->CommitteeMemberTermEndDate ?>">
                                            <label for="Share">สิ้นสุดวาระการดำรงตำแหน่ง</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </form><!-- end Form ข้อมูลรายชื่อคณะกรรมการ -->



                        <?php
}
} ?>


                    </div>
                    <!--สุดขอบการ์ด -->
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->