<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลการพัฒนาบุคลากร</h1>
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
              <h5 class="card-title">ข้อมูลการพัฒนาบุคลากร</h5>

              <!-- start Form ข้อมูลการพัฒนาบุคลากรครู -->
              <form class="row g-3" name="teacher_developmant_activity"id="teacher_developmant_activity">
                  
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityEducationYear"id="DevelopmentActivityEducationYear" placeholder="ปีการศึกษา">
                    <label >ปีการศึกษา</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <select class="form-select" aria-label="Default select example" name="DevelopmentActivitySemester" id="DevelopmentActivitySemester">
                      <option selected value="4">เลือกภาคเรียน</option>
                      <option value="0">ตลอดปีการศึกษา</option>
                      <option value="1">ภาคเรียนที่ 1</option>
                      <option value="2">ภาคเรียนที่ 2</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">ภาคเรียนที่ทำกิจกรรม</label>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รหัสครูและบุคลากรทางการศึกษา</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name=""id="" placeholder="รหัสครูและบุคลากรทางการศึกษา รอ TeacherID" maxlength="4">
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example"  name="DevelopmentActivityTypeCode"id="DevelopmentActivityTypeCode">
                      <option selected>เลือกรหัสประเภทกิจกรรม</option>
                      <option value="01">อมรม</option>
                      <option value="02">สัมมนา</option>
                      <option value="03">ดูงาน</option>
                      <option value="04">PLC/PLN</option>
                      <option value="05">เรียนรู้ด้วยตนเอง</option>
                      <option value="06">การปฏิบัติการวิจัย</option>
                    </select>
                    <label for="SCHOOL_STATUS_CODE">รหัสประเภทกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityName"id="DevelopmentActivityName" placeholder="ชื่อกิจกรรม">
                    <label >ชื่อกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"name="DevelopmentActivityHour"id="DevelopmentActivityHour" placeholder="ชื่อกิจกรรม">
                    <label >จำนวนชั่วโมง</label>
                  </div>
                </div>
                
                <div class="col-md-16">
                  <div class="form-floating">
                    <input type="text" class="form-control"id="DevelopmentActivityPlace" name="DevelopmentActivityPlace" placeholder="สถานที่จัดกิจกรรม">
                    <label >สถานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-16">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="Organizer"id="Organizer"placeholder="หน่วยงานที่จัดกิจกรรม">
                    <label >หน่วยงานที่จัดกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="DevelopmentActivityStartDate"id="DevelopmentActivityStartDate">
                    <label >วันที่เริ่มกิจกรรม</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control"name="DevelopmentActivityEndDate"id="DevelopmentActivityEndDate">
                    <label >วันที่สิ้นสุดกิจกรรม</label>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary" onclick="return check(teacher_developmant_activity)">ยืนยัน</button>
              </form><!-- End Form ข้อมูลการพัฒนาบุคลากรครู -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
    <script type="text/javascript">
  function check(frm){
  //Check_EDUCATION_YEAR
  var EducationYear = /^[0-9]{4}$/;
    if(frm.DevelopmentActivityEducationYear.value ==""){
        alert("กรุณากรอกข้อมูลปีการศึกษา");
        frm.DevelopmentActivityEducationYear.value = "";
        return false;
    }else if (!frm.DevelopmentActivityEducationYear.value.match(EducationYear)){
        alert("กรุณากรอกข้อมูลปีการศึกษาตัวเลขเท่านั้น");
        frm.DevelopmentActivityEducationYear.value = "";
        return false;
    }
  //Check_SEMESTER
    if(frm.DevelopmentActivitySemester.value==4){
      alert("กรุณาเลือกภาคเรียน");
      return false;
    }
  }
</script>  
  </main><!-- End #main -->
