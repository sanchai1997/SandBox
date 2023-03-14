<style>
    label.col-form-label {
        padding-left: 30px;
    }

    h5.card-title {
        padding-left: 20px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>เพิ่มข้อมูลบุคลากรอื่น</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Add-Personnel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?php echo base_url('add-personnel'); ?>" method="POST">
                            <h5 class="card-title">เพิ่มตำแหน่งที่เพิ่มเติม</h5>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">หน่วยงานต้นสกัด</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="JurisdictionCode">
                                        <option selected>เลือก</option>
                                        <?php
                                        $result = $this->db->query('SELECT * FROM CLS_JURISDICTION');
                                        foreach ($result->result() as $JURISDICTION) {
                                        ?>
                                            <option value="<?= $JURISDICTION->JURISDICTION_CODE; ?>"><?= $JURISDICTION->JURISDICTION_NAME; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ตำแหน่งหน้าที่เพิ่มเติม</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AdditionalPosition">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">กลุ่ม/หมวด ที่ปฏิบัติหน้าที่เพิ่มเติม</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="AdditionalDepartmentCode">
                                        <option selected>เลือก</option>
                                        <option value="01">กลุ่มอำนวยการ</option>
                                        <option value="02">กลุ่มนโยบายและแผน</option>
                                        <option value="03">กลุ่มส่งเสริมการจัดการศึกษา</option>
                                        <option value="04">กลุ่มบริหารงานบุคคล (เขตพื้นที่)</option>
                                        <option value="05">กลุ่มนิเทศ ติดตาม และประเมินผลฯ</option>
                                        <option value="06">กลุ่มบริหารการเงิน และสินทรัพย์</option>
                                        <option value="07">กลุ่มส่งเสริมการศึกษาทางไกล
                                            เทคโนโลยีสารสนเทศและการสื่อสาร</option>
                                        <option value="08">กลุ่มพัฒนาครู และบุคลากรทางการศึกษา</option>
                                        <option value="09">กลุ่มกฏหมาย และคดี</option>
                                        <option value="10">หน่วยตรวจสอบภายใน</option>
                                        <option value="11">กลุ่มบริหารงานทั่วไป</option>
                                        <option value="12">กลุ่มบริหารงานวิชาการ</option>
                                        <option value="13">กลุ่มบริหารงานบุคคล (สถานศึกษา)</option>
                                        <option value="14">กลุ่มบริหารงานแผนงาน และงบประมาณ</option>
                                        <option value="15">กลุ่มบริหานงานกิจการนักเรียน</option>
                                        <option value="16">อื่นๆ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">วันที่เริ่มปฏิบัติหน้าที่เพิ่มเติม</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="AdditionalDutyDate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">คำสั่งให้ปฏิบัติหน้าที่เพิ่มเติม</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AdditionalCommand">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="AdditionalComment">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputFile" class="col-sm-2 col-form-label">เอกสารแนบ</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="AdditionalDocumentURL">
                                </div>
                            </div>