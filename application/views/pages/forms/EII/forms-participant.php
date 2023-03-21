<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <div class="pagetitle">
       
        <?php switch (
            $page
        ) { case 'sh1': ?> <h1>ผู้เข้ามามีส่วนร่วม</h1>
        <?php break;case 'sh2': ?> <h1>การติดต่อของผู้มีส่วนร่วม</h1>
        <?php break;case 'sh3': ?> <h1>การมีส่วนร่วม</h1>
        <?php break;case 'sh4': ?> <h1>ข้อมูลบันทึกเพิ่มเติม</h1>
        <?php break;default: ?>
        <?php break;} ?>

        <!-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">ผู้เข้ามามีส่วนร่วม</li>
            </ol>
        </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <!-- <?php switch (
                            $page
                        ) { case 'sh1': ?> <h5 class="card-title">ข้อมูลผู้เข้ามามีส่วนร่วม</h5>
                        <?php break;case 'sh2': ?> <h5 class="card-title">ข้อมูลการติดต่อของผู้มีส่วนร่วม</h5>
                        <?php break;case 'sh3': ?> <h5 class="card-title">ข้อมูลการมีส่วนร่วม</h5>
                        <?php break;case 'sh4': ?><h5 class="card-title">ข้อมูลบันทึกเพิ่มเติม</h5>
                        <?php break;case 'sh22': ?> <h5 class="card-title">ข้อมูลการติดต่อของผู้มีส่วนร่วม</h5>
                        <?php break;case 'sh33': ?> <h5 class="card-title">ข้อมูลการมีส่วนร่วม</h5>
                        <?php break;case 'sh44': ?><h5 class="card-title">ข้อมูลบันทึกเพิ่มเติม</h5>
                        <?php break;case 'sh11': ?><h5 class="card-title">ข้อมูลผู้เข้ามามีส่วนร่วม</h5>
                        <?php break;default: ?>
                        <?php break;} ?> -->
                           <?php echo br(2); ?>
                        <!-- start Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <?php if ($page == 'sh1') { ?>
                        <form action="<?php echo site_url(
                            'par_forms_up_p1'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantID">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantName">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="ParticipantTypeCode">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PARTICIPANT_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PARTICIPANT_TYPE_CODE ; ?>"><?= $cls->PARTICIPANT_TYPE_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div> 
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <?php } ?>
                        <?php if ($page == 'sh11') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <form action="<?php echo site_url(
                            'par_edit_p1'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           
<input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                            name="ParticipantName" value="<?php echo $show->ParticipantName ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>
                                            ชื่อภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="ParticipantTypeCode">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_PARTICIPANT_TYPE');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->PARTICIPANT_TYPE_CODE ; ?>"><?= $cls->PARTICIPANT_TYPE_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                                    <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>  
<script>
    function checkSelectedOption() {
                            const CLS_PERSONAL_ID_TYPE = document.querySelector('#CommitteeProvinceCode');
                            const CLS_PERSONAL_ID_TYPE_Value = CLS_PERSONAL_ID_TYPE.value;

                            if (CLS_PERSONAL_ID_TYPE_Value === '-1') {
                                alert('กรุณาเลือกประเภทบัตรประจำตัวผู้จัดทำ');
                                return false;
                            }
                            const CLS_PREFIX = document.querySelector('#CreatorPrefixCode');
                            const CLS_PREFIX_Value = CLS_PREFIX.value;

                            if (CLS_PREFIX_Value === '-1') {
                                alert('กรุณาเลือกคำนำหน้าชื่อผู้จัดทำ');
                                return false;
                            }
                        }
                        </script>
</script>
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <?php } }?>
                        <?php if ($page == 'sh2') { ?>
                        <!-- start Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pc_forms_up_p2'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                            

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อของผู้ติดต่อ" name="ContactName">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        ชื่อของผู้ติดต่อ </label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้ติดต่อ" name="ContactPhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้ติดต่อ </label>
                                    </div>
                                </div>
                           
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้ติดต่อ" name="ContactMobilePhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้ติดต่อ" name="ContactEmail">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้ติดต่อ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองคnกร (ของผู้ติดต่อ)" name="ContactOrganizationPosition">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ตำแหน่งในองคnกร (ของผู้ติดต่อ)
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div> 
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
                        <?php if ($page == 'sh22') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_CONTACT 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pc_edit_p2'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                            
<input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อของผู้ติดต่อ" name="ContactName" value="<?php echo $show->ContactName ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        ชื่อของผู้ติดต่อ </label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้ติดต่อ" name="ContactPhone" value="<?php echo $show->ContactPhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้ติดต่อ </label>
                                    </div>
                                </div>
                           
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้ติดต่อ" name="ContactMobilePhone" value="<?php echo $show->ContactMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้ติดต่อ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้ติดต่อ" name="ContactEmail" value="<?php echo $show->ContactEmail ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้ติดต่อ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ตำแหน่งในองคnกร (ของผู้ติดต่อ)" name="ContactOrganizationPosition" value="<?php echo $show->ContactOrganizationPosition ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ตำแหน่งในองคnกร (ของผู้ติดต่อ)
                                    </label>
                                </div>
                            </div>
                                   <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>  
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <?php } }?>
                        <?php if ($page == 'sh3') { ?>
                        <!-- start Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pcp_forms_up_p3'
                        ); ?>" method="post"
                            enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CooperationStartDate">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>วันที่เริ่มการมีส่วนร่วม</label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CooperationEndDate">
                                            <label for="Share">วันที่สิ้นสุดการมีส่วนร่วม</label>
                                        </div>
                                    </div>
                               </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationStatusCode">
                                        <option selected>เลือก</option>
                                     <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_STATUS_CODE ; ?>"><?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="CooperationActivity"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>กิจกรรมที่มีส่วนร่วม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationLevelCode">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_LEVEL_CODE ; ?>"><?= $cls->COOPERATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationSchoolID">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_STATUS_CODE  ; ?>"><?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="CooperationAttachmentURL">
                                </div>
                            </div>
                          <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div> 
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
                        <?php if ($page == 'sh33') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_COOPERATION 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pcp_edit_p3'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
<input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="CooperationStartDate" value="<?php echo $show->CooperationStartDate ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?>วันที่เริ่มการมีส่วนร่วม</label>
                                    </div>
                               </div>
                            
                               <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="CooperationEndDate" value="<?php echo $show->CooperationEndDate ?>">
                                            <label for="Share">วันที่สิ้นสุดการมีส่วนร่วม</label>
                                        </div>
                                    </div>
                               </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationStatusCode">
                                        <option selected>เลือก</option>
                                     <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_STATUS_CODE ; ?>"><?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"
                                        name="CooperationActivity"><?php echo $show->CooperationActivity ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>กิจกรรมที่มีส่วนร่วม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationLevelCode">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_LEVEL');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_LEVEL_CODE ; ?>"><?= $cls->COOPERATION_LEVEL_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CooperationSchoolID">
                                        <option selected>เลือก</option>
                                       <?php
                                            $result = $this->db->query('SELECT * FROM CLS_COOPERATION_STATUS');
                                            foreach ($result->result() as $cls) {
                                            ?>
                                             <option value="<?= $cls->COOPERATION_STATUS_CODE  ; ?>"><?= $cls->COOPERATION_STATUS_NAME; ?></option>
                                            <?php } ?>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="CooperationAttachmentURL">
                                </div>
                            </div>
                               <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>  
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } } ?>
                        <?php if ($page == 'sh4') { ?>
                        <!-- start Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pn_forms_up_p4'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Note"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>บันทึกเพิ่มเติม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้บันทึกเพิ่มเติม" name="NoteReporterName">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ชื่อผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม" name="NoteReporterPhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                              </div>
                            
                               <div  class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม"
                                            name="NoteReporterMobilePhone">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                               </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้บันทึกเพิ่มเติม" name="NoteReporterEmail">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>
                            <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">บันทึกข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันกาบันทึก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องกาบันทึกข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div> 
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
                        <?php if ($page == 'sh44') { ?>
                            <?php $key = isset($_GET['key']) ? $_GET['key'] : '';  ?>
                            <?php
                            
                            $result = $this->db->query("SELECT * FROM PARTICIPANT_NOTE 
                            WHERE Id = '".$key."' 
                            ");
 
                     foreach ($result->result() as $show) {
                     ?>
                        <!-- start Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <form action="<?php echo site_url(
                            'pn_edit_p4'
                        ); ?>" method="post"
                            enctype="multipart/form-data">
                           <input type="hidden" name="Id" value="<?php echo $show->Id ?>">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา"
                                        name="ParticipantID" value="<?php echo $show->ParticipantID ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?>
                                        รหัสภาครัฐหรือภาคเอกชนที่เข้ามาขับเคลื่อนพื้นที่นวัตกรรมการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Note"><?php echo $show->Note ?></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(
                                        2
                                    ); ?>บันทึกเพิ่มเติม</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อผู้บันทึกเพิ่มเติม" name="NoteReporterName" value="<?php echo $show->NoteReporterName ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> ชื่อผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม" name="NoteReporterPhone" value="<?php echo $show->NoteReporterPhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์ของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                              </div>
                            
                               <div  class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม"
                                            name="NoteReporterMobilePhone" value="<?php echo $show->NoteReporterMobilePhone ?>">
                                        <label for="floatingName"><?php echo nbs(
                                            2
                                        ); ?> หมายเลขโทรศัพท์มือถือของผู้บันทึกเพิ่มเติม </label>
                                    </div>
                               </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="อีเมลของผู้บันทึกเพิ่มเติม" name="NoteReporterEmail" value="<?php echo $show->NoteReporterEmail ?>">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> อีเมลของผู้บันทึกเพิ่มเติม </label>
                                </div>
                            </div>
                                 <div class="text-center">
  <a href="list-teacher_development_activity" class="btn btn-danger" style="float: left;">ยกเลิก</a>

  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">แก้ไขข้อมูล</button>  
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการแก้ไขข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>
          <center>คุณต้องการแก้ไขข้อมูลใช่หรือไหม ?</center>
        </h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>  
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php }
                        } ?>

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->