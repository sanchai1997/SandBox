<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
    <div class="pagetitle">
        <div class="pagetitle">
            <div class="row ">
                <?php switch (
                    $page
                ) { case 'sh1': ?> <h1>การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h1>
                <?php break;case 'sh2': ?> <h1>ข้อมูลระดับตัวชี้วัด</h1>
                <?php break;case 'sh3': ?> <h1>ข้อมูลองค์ประกอบตัวชี้วัด</h1>
                <?php break;case 'sh4': ?> <h1>ข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h1>
                <?php break;case 'sh5': ?> <h1>ข้อมูลการประเมินผลสถานศึกษา</h1>
                <?php break;case 'sh6': ?> <h1>ข้อมูลการประเมินตามตัวชี้วัด</h1>
                <?php break;case 'sh7': ?> <h1>ระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h1>
                <?php break;case 'sh8': ?> <h1>ข้อมูลการประเมินสถานศึกษา</h1>
                <?php break;default: ?>
                <?php break;} ?>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="card">
                            <div class="card-body">

                                <?php if ($page == ''||$page == 'sh1') { ?>


                                <!-- start Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <form action="<?php echo site_url(
                                    'Fm_evaluation/insert_ass_ria'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มการประกันคุณภาพด้วยตัวชี้วัดของพื้นที่</h5>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อเกณฑ์" name="CriteriaName">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อเกณฑ์ </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="CriteriaDescription"></textarea>
                                            <label for="floatingTextarea2"><?php echo nbs(2); ?>คำฮธิบายเกณฑ์ </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaLevelAmount">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> จำนวนระดับของตัวชี้วัด</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด" name="CriteriaCompositionAmount">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> จำนวนองค์ประกอบของตัวชี้วัด</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="จำนวนระดับของตัวชี้วัด"
                                                name="CriteriaPassingScorePercentage">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คะแนนการผ่านเกณฑ์(%)</label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form การประกันคุณภาพด้วยตัวชี้วัดของพื้นที่ -->
                                <?php } ?>
                                <?php if ($page == 'sh2') { ?>
                                <!-- start Form ข้อมูลระดับตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                    'Fm_evaluation/insert_ass_ria_lvl'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลระดับตัวชี้วัด</h5>


                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex">
                                            <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อระดับตัวชี้วัด" name="LevelName">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> หัวข้อระดับตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนนระดับตัวชี้วัด" name="LevelScore">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คะแนนระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลระดับตัวชี้วัด -->
                                <?php } ?>
                                <?php if ($page == 'sh3') { ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                        'Fm_evaluation/insert_ass_ria_com'
                                    ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลองค์ประกอบตัวชี้วัด</h5>


                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หัวข้อองค์ประกอบตัวชี้วัด" name="CompositionName">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> หัวข้อองค์ประกอบตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ค่าน้ำหนักการประเมินตัวชี้วัด"
                                                name="CompositionWeightScore">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ค่าน้ำหนักการประเมินตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด"
                                                name="CompositionGuideline">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> หลักฐานประกอบการประเมินขององค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัด -->
                                <?php } ?>
                                <?php if ($page == 'sh4') { ?>
                                <!-- start Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <form action="<?php echo site_url(
                                        'Fm_evaluation/insert_ass_ria_com_lvl'
                                    ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลคำอธิบายระดับของแต่ละองค์ประกอบ</h5>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ลำดับองค์ประกอบตัวชี้วัด </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับของระดับตัวชี้วัด" name="LevelIndex">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ลำดับของระดับตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คำอธิบายระดับของแต่ละองค์ประกอบ"
                                                name="CompositionLevelDescription">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คำอธิบายระดับของแต่ละองค์ประกอบ </label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลองค์ประกอบตัวชี้วัดพื้นที่ -->
                                <?php } ?>
                                <?php if ($page == 'sh5') { ?>
                                <!-- start Form ข้อมูลผลการประเมินโรงเรียน -->
                                <form action="<?php echo site_url(
                                    'Fm_evaluation/insert_sc_ass'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินผลสถานศึกษา</h5>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำกระประเมิน"
                                                name="SchoolAssessmentEducationYear">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ปีการศึกษาที่ทำกระประเมิน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ภาคเรียนที่ทำการประเมิน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสสถานศึกษา" name="SchoolID">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> รหัสสถานศึกษา </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="SchoolAssessmentDescription"></textarea>
                                            <label
                                                for="floatingTextarea2"><?php echo nbs(2); ?>คำอธิบายการประเมิน</label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลผลการประเมินโรงเรียน -->
                                <?php } ?>
                                <?php if ($page == 'sh6') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url(
                                    'Fm_evaluation/insert_sc_ass_ria'
                                ); ?>" method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินตามตัวชี้วัด</h5>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?>
                                                ปีการศึกษาที่ทำการประเมิน </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ภาคเรียนที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสสถานศึกษา" name="SchoolID">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> รหัสสถานศึกษา </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="CritAssessmentorNameeriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คะแนน" name="SchoolAssessmentScore">
                                            <label for="floatingName"><?php echo nbs(2); ?> คะแนน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="SchoolAssessmentCode">
                                                <option selected>เลือก</option>
                                                <option value="1">ต้องปรับปรุง</option>
                                                <option value="2">พอใช้</option>
                                                <option value="3">ดี</option>
                                                <option value="4">ดีมาก</option>
                                                <option value="5">ดีเด่น</option>
                                            </select>
                                            <label for="floatingSelect"><?php echo nbs(
                                                2
                                            ); ?>ผลการประเมิน</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมิน</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                name="SchoolAssessmentAttachmentURL">
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <?php } ?>
                                <?php if ($page == 'sh7') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('Fm_evaluation/insert_sc_ass_res'); ?>"
                                    method="post">
                                    <h5 class="card-title">ฟอร์มระดับตัวชี้วัดที่ได้ในแต่ละองค์ประกอบ</h5>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="SchoolAssessmentEducationYear">
                                            <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ภาคเรียนที่ทำการประเมิน" name="SchoolAssessmentSemester">
                                            <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียนที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสสถานศึกษา" name="SchoolID">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> รหัสสถานศึกษา </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสตัวชี้วัด" name="CriteriaID">
                                            <label for="floatingName"><?php echo nbs(2); ?> รหัสตัวชี้วัด </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับองค์ประกอบตัวชี้วัด" name="CompositionIndex">
                                            <label for="floatingName"><?php echo nbs(2); ?> ลำดับองค์ประกอบตัวชี้วัด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ลำดับของระดับตัวชี้วัดที่ได้" name="LevelIndex">
                                            <label for="floatingName"><?php echo nbs(2); ?> ลำดับของระดับตัวชี้วัดที่ได้
                                            </label>
                                        </div>
                                    </div>
                                    <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <?php } ?>
                                <?php if ($page == 'sh8') { ?>
                                <!-- start Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <form action="<?php echo site_url('Fm_evaluation/insert_achie_ass'); ?>"
                                    method="post">
                                    <h5 class="card-title">ฟอร์มข้อมูลการประเมินสถานศึกษา</h5>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ปีการศึกษาที่ทำการประเมิน"
                                                name="AchievementAssessmentYear">
                                            <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษาที่ทำการประเมิน
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="รหัสสถานศึกษา" name="SchoolID">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> รหัสสถานศึกษา </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อการประเมิน" name="SchoolAssessmentName">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ชื่อการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="คำอธิบายการประเมิน" name="SchoolAssessmentDescription">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> คำอธิบายการประเมิน </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="ชื่อผู้ประเมิน" name="AssessmentorName">
                                            <label for="floatingName"><?php echo nbs(
                                                2
                                            ); ?> ชื่อผู้ประเมิน </label>
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">ผลการประเมินผลสัมฤทธิ์การศึกษา</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios"
                                                    id="gridRadios1" value="0">
                                                <label class="form-check-label" for="gridRadios1">
                                                    ไม่ผ่าน
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios"
                                                    id="gridRadios2" value="1">
                                                <label class="form-check-label" for="gridRadios2">
                                                    ผ่าน
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิงก์เอกสารแนบรายละเอียดการประเมินผลสัมฤทธิ์การศึกษา</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL">
                                </div>
                            </div>
                            <button style="float: right;" name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </form><!-- end Form ข้อมูลผลการประเมินตามตัวชี้วัด -->
                                <?php } ?>
                            </div>
                        </div>

                    </div>


                </div>
            </section>

</main><!-- End #main -->