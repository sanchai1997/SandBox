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

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">ผู้เข้ามามีส่วนร่วม</li>
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
                        ) { case 'sh1': ?> <h5 class="card-title">ข้อมูลผู้เข้ามามีส่วนร่วม</h5>
                        <?php break;case 'sh2': ?> <h5 class="card-title">ข้อมูลการติดต่อของผู้มีส่วนร่วม</h5>
                        <?php break;case 'sh3': ?> <h5 class="card-title">ข้อมูลการมีส่วนร่วม</h5>
                        <?php break;case 'sh4': ?><h5 class="card-title">ข้อมูลบันทึกเพิ่มเติม</h5>
                        <?php break;default: ?>
                        <?php break;} ?>

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
                                        <option value="01">บุคคล</option>
                                        <option value="02">หน่วยงานรัฐ/รัฐวิสาหกิจ</option>
                                        <option value="03">บริษัทเอกชน</option>
                                        <option value="04">มูลนิธิ</option>
                                        <option value="05">สมาคม</option>
                                        <option value="06">องค์กรต่างประเทศ</option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสประเภทผู้เข้ามามีส่วนร่วม</label>
                                </div>
                            </div>
                             <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลบุคคลหรือหน่วยงานที่เข้ามามีส่วนร่วมในพื้นที่นวัตกรรมการศึกษา -->
                        <?php } ?>
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
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลการติดต่อของผู้มีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
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
                                        <option value="01">ยังมีส่วนร่วม</option>
                                        <option value="02">สิ้นสุดการมีส่วนร่วม</option>
                                        <option value="03">ไม่มีการเข้ามามีส่วนร่วม</option>
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
                                        <option value="01">ให้ข้อมูล</option>
                                        <option value="02">ให้คำปรึกษา</option>
                                        <option value="03">มีส่วนร่วมบางส่วน</option>
                                        <option value="04">ทำงานร่วมกัน</option>
                                        <option value="05">สนับสนุนงบประมาณ</option>
                                        <option value="06">สนับสนุนสื่อ/อุปกรณ์</option>
                                    </select>
                                    <label for="floatingSelect"><?php echo nbs(
                                        2
                                    ); ?>รหัสระดับการมีส่วนร่วม</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา" name="CooperationSchoolID">
                                    <label for="floatingName"><?php echo nbs(
                                        2
                                    ); ?> รหัสสถานศึกษาที่เข้าไปมีส่วนร่วม </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">ลิ้งก์เอกสารแนบ</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="CooperationAttachmentURL">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลการมีส่วนร่วมของผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } ?>
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
                             <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- end Form ข้อมูลความคิดเห็นต่อผู้เข้ามามีส่วนร่วมในพื้นที่ -->
                        <?php } ?>

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->