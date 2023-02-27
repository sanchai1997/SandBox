<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลสถานศึกษา</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="main">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลจำนวนห้องเรียนของสถานศึกษา</h5>

                        <!-- General Form Elements -->
                        <form action="<?php echo base_url('add-classroom'); ?>" method="POST">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">สถานศึกษา</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="SCHOOL_ID" aria-label="Default select example">
                                        <option selected>เลือก</option>
                                        <?php foreach ($this->db->get("SCHOOL")->result() as $school) { ?>
                                        <option value=" <?= $school->SCHOOL_ID; ?>"><?= $school->NAME_TH; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">ระดับชั้นปี</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example"
                                        name="CLASSROOM_GRADE_LEVEL_CODE">
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
                                <label for="inputText" class="col-sm-2 col-form-label">จำนวนห้องเรียน</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="CLASSROOM_AMOUNT">
                                </div>
                            </div>


                            <div class="text-center">
                                <a href="school-classroom" style="float: left;" class="btn btn-light">ยกเลิก</a>
                                <button style="float: center;" type="reset" class="btn btn-secondary">รีเซ็ต</button>
                                <button style="float: right;" type="submit" class="btn btn-primary">ยืนยัน</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>


        </div>
    </section>

</main><!-- End #main -->