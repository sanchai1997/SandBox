<main id="main" class="main">

    <div class="pagetitle">
        <h1>ข้อมูลผู้ปกครอง</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <h5 class="card-title">ข้อมูลครอบครัว</h5>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">เป็นบุตรลำดับที่</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">จำนวนพี่ชาย</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">จำนวนพี่สาว</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">จำนวนน้องชาย</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">จำนวนน้องสาว</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">ความพิการ</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือก</option>
                <option value="99">ไม่พิการ</option>
                <option value="10">ความพิการทางการมองเห็น</option>
                <option value="11">ความพิการทางการได้ยิน</option>
                <option value="12">ความพิการทางสติปัญญ</option>
                <option value="13">ความพิการร่างกาย,สุขภาพ</option>
                <option value="14">ความพิการทางการเรียนรู้</option>
                <option value="15">ความพิการทางการพูด,ภาษา</option>
                <option value="16">ความพิการทางพฤติกรรมและอารมณ์</option>
                <option value="17">ความพิการทางออทิสติก</option>
                <option value="18">ความพิการซ้ำซ้อน</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">รายละเอียดความพิการ</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">ระดับความพิการ</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือก</option>
                <option value="01">บกพร่องทางการมองเห็น (บอด)</option>
                <option value="02">บกพร่องทางการได้ยิน (หูหนวก)</option>
                <option value="03">บกพร่องทางสิตปัญญา</option>
                <option value="04">บกพร่องทางร่างกายหรือสุขภาพ</option>
                <option value="05">บกพร่องทางการเรียนรู้</option>
                <option value="06">บกพร่องทางการพูดและภาษา</option>
                <option value="07">บกพร่องทางพฤติกรรมหรืออารมณ์</option>
                <option value="08">ออทิสติก</option>
                <option value="09">ความพิการซ้ำซ้อน</option>
                <option value="10">บกพร่องทางการได้ยิน (หูตึง)</option>
                <option value="11">บกพร่องทางการเห็นฯ (เลือนลาง)</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">ความพิการ</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือก</option>
                <option value="99">ไม่ด้อยโอกาส</option>
                <option value="10">เด็กถูกบังคับให้ขายแรงงาน</option>
                <option value="11">เด็กที่อยู่ในธุรกิจทางเพศ</option>
                <option value="12">เด็กถูกทอดทิ้ง</option>
                <option value="13">เด็กในสถานพินิจและคุ้มครองเด็กเยาวชน</option>
                <option value="14">เด็กเร่ร่อน</option>
                <option value="15">ผลกระทบจากเอดส์</option>
                <option value="16">ชนกลุ่มน้อย</option>
                <option value="17">เด็กที่ถูกทำร้ายทารุณ</option>
                <option value="18">เด็กยากจน</option>
                <option value="18">เด็กมีปัญหาเกี่ยวกับยาเสพติด</option>
            </select>
        </div>
    </div>

    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนแบบเรียน</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0" checked>
                <label class="form-check-label" for="gridRadios1">
                    ไม่ขาดแคลน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                <label class="form-check-label" for="gridRadios2">
                    ขาดแคลน
                </label>
            </div>
        </div>
    </fieldset>

    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนอาหารกลางวัน</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0" checked>
                <label class="form-check-label" for="gridRadios1">
                    ไม่ขาดแคลน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                <label class="form-check-label" for="gridRadios2">
                    ขาดแคลน
                </label>
            </div>
        </div>
    </fieldset>

    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนเครื่องเขียน</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0" checked>
                <label class="form-check-label" for="gridRadios1">
                    ไม่ขาดแคลน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                <label class="form-check-label" for="gridRadios2">
                    ขาดแคลน
                </label>
            </div>
        </div>
    </fieldset>

    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">ขาดแคลนเครื่องแบบ</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0" checked>
                <label class="form-check-label" for="gridRadios1">
                    ไม่ขาดแคลน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                <label class="form-check-label" for="gridRadios2">
                    ขาดแคลน
                </label>
            </div>
        </div>
    </fieldset>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">รายครอบครัวต่อเดือน</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">สถานภาพครอบครัว</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือก</option>
                <option value="01">พ่อแม่อยู่ด้วยกัน</option>
                <option value="02">พ่อแม่แยกกันอยู่</option>
                <option value="03">พ่อแม่หย่าร้าง</option>
                <option value="04">พ่อเสียชีวิต/สาบสูญ</option>
                <option value="05">แม่เสียชีวิต/สาบสูญ</option>
                <option value="06">เสียชีวิตทั้งคู่/สาปสูญ</option>
                <option value="07">พ่อ/แม่ทอดทิ้ง</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">นักเรียนอาศัยอยู่กับ</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือก</option>
                <option value="01">พ่อ/แม่</option>
                <option value="02">ญาติ</option>
                <option value="03">อยู่ลำพัง</option>
                <option value="04">ผู้อุปการะ/นายจ้าง</option>
                <option value="05">ครัวเรือนสถาบัน</option>
            </select>
        </div>
    </div>

    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">ได้สวัสดิการแห่งรัฐ</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="0">
                <label class="form-check-label" for="gridRadios1">
                    ไม่มี
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="1">
                <label class="form-check-label" for="gridRadios2">
                    มี
                </label>
            </div>
        </div>
    </fieldset>

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

</main><!-- End #main -->