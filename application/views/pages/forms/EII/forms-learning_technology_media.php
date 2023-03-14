<main id="main" class="main">
<?php $page = isset($_GET['page']) ? $_GET['page'] : '';  ?>
    <div class="pagetitle">
        <?php switch ($page) {
                case 'sh1':
            ?> <h1>เทคโนโลยีและสื่อการเรียนรู้</h1>
        <?php break;
                case 'sh2':
                ?> <h1>ผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h1>
        <?php
                    break;
                               default:
                ?>
        <?php
                    break;
            }  ?>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">ข้อมูลเทคโนโลยีและสื่อการเรียนรู้</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <?php switch ($page) {
                case 'sh1':
            ?> <h5 class="card-title">ข้อมูลเทคโนโลยี และสื่อการเรียนรู้</h5>
                        <?php break;
                case 'sh2':
                ?> <h5 class="card-title">ข้อมูลผู้จัดทำเทคโนโลยีและสื่อการเรียนรู้</h5>
                        <?php
                    break;
                               default:
                ?>
                        <?php
                    break;
            }  ?>
            <?php if($page=='sh1'){  ?>
                        <!-- start Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <form action="<?php echo site_url('LTM_forms_up_p1'); ?>" method="post"enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ปีการศึกษา"
                                            name="EducationYear">
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
                                    <input type="text" class="form-control" id="floatingName" placeholder="ชื่อเทคโนโลยีและสื่อการเรียนรู้"
                                        name="MediaName">
                                    <label for="floatingName"><?php echo nbs(2); ?> ชื่อเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="MediaTypeCode">
                                            <option selected>เลือก</option>
                                            <option value="01">สื่อประเภทวัสดุ</option>
                                            <option value="02">สื่อประเภทอุปกรณ์</option>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทเทคโนโลยีและสื่อการเรียนรู้</label>
                                    </div>
                                </div>
                           
                              <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="TargetEducationLevelCode" require>
                                            <option selected>เลือก</option>
                                            <option value="00">เตรียมอนุบาล</option>
                                            <option value="10">ก่อนประถมศึกษา </option>
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสระดับการศึกษาที่นำไปใช้</label>
                                    </div>
                              </div>
                            </div>
                             <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้"
                                        name="MediaBenefit">
                                    <label for="floatingName"><?php echo nbs(2); ?> ประโยชน์ของเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="Abstract"></textarea>
                                    <label for="floatingTextarea2"><?php echo nbs(2); ?>บทคัดย่อ</label>
                                </div>
                            </div>
                             <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="คำค้นห้า"
                                            name="SearchKeyword">
                                        <label for="floatingName"><?php echo nbs(2); ?> คำค้นห้า </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">เอกสารแนบ</label>
                                        <input type="file" class="form-control" id="inputGroupFile01" name="AttachmentURL" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="แหล่งที่มา"
                                            name="Source">
                                        <label for="floatingName"><?php echo nbs(2); ?> แหล่งที่มา </label>
                                    </div>
                               </div>
                           
                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="Share" placeholder="Share"
                                                name="PublishDate">
                                            <label for="Share">วันที่เผยแพร่</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                        <?php  } ?>
                        <?php if($page=='sh2'){ ?>
                          <form action="<?php echo site_url('LTMC_forms_up_p2'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้" name="MediaID">
                                    <label for="floatingName"><?php echo nbs(2); ?>
                                        รหัสข้อมูลเทคโนโลยีและสื่อการเรียนรู้ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="หมายเลขบัตรประจำตัวผู้จัดทำ"
                                        name="CreatorPersonalID">
                                    <label for="floatingName"><?php echo nbs(2); ?> หมายเลขบัตรประจำตัวผู้จัดทำ </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPersonalIDTypeCode">
                                            <option selected>เลือก</option>
                                            <option value="I">บัตรประจำตัวประชาชน</option>
                                            <option value="O">บัตรอื่นๆ</option>
                                            <option value="N">ไม่มีบัตรอะไรเลย</option>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสประเภทบัตรประจำตัวผู้จัดทำ</label>
                                    </div>
                        </div>
                           
                               <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="CreatorPrefixCode">
                                            <option selected>เลือก</option>
                                            <option value="003">นาย</option>
                                            <option value="004">นางสาว</option>
                                            <option value="005">นาง</option>
                                        
                                        </select>
                                        <label for="floatingSelect"><?php echo nbs(2); ?>รหัสคำนำหน้าชื่อผู้จัดทำ</label>
                                    </div>
                               </div>
                            </div>
                             <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorNameThai">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อผู้จัดทำ (ภาษาอังกฤษ)"
                                            name="CreatorNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อผู้จัดทำ (ภาษาอังกฤษ) </label>
                                    </div>
                                </div>
                            </div>
                             <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorMiddleNameThai">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                          
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorMiddleNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> ชื่อกลางผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                                </div>
                            </div>
                             <div class="row mb-3">
                               <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ (ภาษาไทย)"
                                            name="CreatorLastNameThai">
                                        <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ (ภาษาไทย) </label>
                                    </div>
                               </div>
                            
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="นามสกุลผู้จัดทำ(ภาษาอังกฤษ)"
                                            name="CreatorLastNameEnglish">
                                        <label for="floatingName"><?php echo nbs(2); ?> นามสกุลผู้จัดทำ(ภาษาอังกฤษ) </label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="สัดส่วนการมีส่วนร่วม"
                                        name="ParticipantRatio">
                                    <label for="floatingName"><?php echo nbs(2); ?> สัดส่วนการมีส่วนร่วม </label>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                                        <button name="Submit" type="submit"
                                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                        </form><!-- End Form ข้อมูลเทคโนโลยี และสื่อการเรียนรู้ -->
                          <?php }  ?>

                    </div>
                </div>

            </div>


        </div>
    </section>
    <script>
    setTimeout(function() {
        document.getElementById('myAlert').remove();
    }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
    </script>
</main><!-- End #main -->