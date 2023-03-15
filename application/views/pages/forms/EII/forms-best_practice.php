<main id="main" class="main">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
    <div class="pagetitle">
        <h1>ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">แนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <?php switch (
                            $page
                        ) { case 'sh1': ?> <h5 class="card-title">ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจักดการศึกษา</h5>
                        <?php break;case 'sh2': ?> <h5 class="card-title">
                            ข้อมูลผู้จัดทำวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา</h5>
                        <?php break;default: ?>
                        <?php break;} ?>
                        <?php if ($page == 'sh1') { ?>

                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                            'BP_forms_up_p1'
                        ); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา" name="BestPracticeID">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ปีการศึกษา" name="EducationYear">
                                        <label for="floatingName"><?php echo nbs(2); ?> ปีการศึกษา </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ภาคเรียน"
                                            name="Semester">
                                        <label for="floatingName"><?php echo nbs(2); ?> ภาคเรียน </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="ชื่อวิธีปฏิบัติ" name="BestPracticeName">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อวิธีปฏิบัติ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="BestPracticeTypeCode">
                                            <option selected>เลือก</option>
                                            <option value="01">แผนการสอน</option>
                                            <option value="02">สื่อการสอน</option>
                                            <option value="03">นวัตกรรม</option>

                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทวิธีปฏิบัติ</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode"
                                            require>
                                            <option selected>เลือก</option>
                                            <option value="00">เตรียมอนุบาล</option>
                                            <option value="10">ก่อนประถมศึกษา </option>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="RecognizedCode" require>
                                            <option selected>เลือก</option>
                                            <option value="01">เผยแพร่ในสิ่งตีพิมพ์</option>
                                            <option value="02">ได้รับรางวัล </option>
                                            <option value="03">มีผู้มาศึกษาดูงานหรือได้รับเชิญเป็นวิทยากร </option>
                                        </select>
                                        <label
                                            for="floatingSelect"><?php echo nbs(2); ?>รหัสการเผยแพร่ที่ได้รับการยอมรับ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 60px" name="Benefit"></textarea>
                                        <label for="floatingTextarea2"><?php echo nbs(2); ?>ประโยชน์ที่ได้รับ</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="Abstract"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นหา"
                                            name="SearchKeyword">
                                        <label for="floatingName"><?php echo nbs(2); ?> คำค้นหา </label>
                                    </div>
                                </div>
                             
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                        <input type="file" class="form-control" id="inputGroupFile01"
                                            name="AttachmentURL">
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 60px" name="PracticeProcess"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>วิธีการปฏิบัติ</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="แหล่งที่มา" name="Source">
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งที่มา </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="Share" placeholder="Share"
                                            name="PublishDate">
                                        <label for="Share">วันที่เผยแพร่</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button name="Submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>

                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php } ?>
                        <?php if ($page == 'sh2') { ?>

                        <!-- start Form ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <form action="<?php echo site_url(
                            'BPC_forms_up_p2'
                        ); ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา"
                                            name="BestPracticeID" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ" name="CreatorPersonalID" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                        <option selected>เลือก</option>
                                        <option value="I">บัตรประจำตัวประชาชน</option>
                                        <option value="O">บัตรอื่นๆ</option>
                                        <option value="N">ไม่มีบัตรอะไรเลย</option>

                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="CreatorPrefixCode">
                                        <option selected>เลือก</option>
                                        <option value="003">นาย</option>
                                        <option value="004">นางสาว</option>
                                        <option value="005">นาง</option>

                                    </select>
                                    <label for="floatingSelect">
                                        <?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อผู้จัดทำ (ภาษาไทย)" name="CreatorNameThai" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" ชื่อผู้จัดทำ (ภาษาอังกฤษ)" name="CreatorNameEnglish" value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)" name="CreatorMiddleNameThai"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorMiddleNameEnglish"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ (ภาษาไทย)" name="CreatorLastNameThai"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย)
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder=" นามสกุลผู้จัดทำ(ภาษาอังกฤษ)" name="CreatorLastNameEnglish"
                                            value="">
                                        <label for="floatingName">
                                            <?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder=" สัดส่วนการมีส่วนร่วม" name="ParticipantRatio" value="">
                                    <label for="floatingName">
                                        <?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม
                                    </label>
                                </div>
                            </div>
                             <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- ข้อมูลแนวปฏิบัติที่เป็นเลิศในการจัดการศึกษา -->
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->