
<main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลสมรรถนะของหลักสูตร </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <!-- Alert -->
      <?php if (!empty($_SESSION['errors'])) { ?>
      <div class="row">
        <div class="col-lg-9">
          <div class="alert alert-danger" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
              <strong>
                  <?php
                  echo '<i class="bi bi-exclamation-circle-fill"></i> '. $_SESSION['errors'];
                  unset($_SESSION['errors']);
                  ?>
              </strong>
          </div> 
        </div>
      </div>
      <?php } ?>  

      <div class="row">
        <div class="col-lg-9">

          <div class="card">

            <div class="card-body">


              <h5 class="card-title">ข้อมูลสมรรถนะของหลักสูตร </h5>

              <!-- start Form ข้อมูลหลักสูตรรายวิชา -->
              <form action="<?php echo base_url('add_curriculum_school_competency');?>" method="POST" name="addCurriculumCompetency" id="addCurriculumCompetency" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $CurriculumID; ?>">
                <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $SubjectCode; ?>">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">สมรรถนะ</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="CompetencyCode" id="CompetencyCode">
                      <option selected value="-1">เลือกสมรรถนะ</option>
                      <?php foreach($listCompetency as $ls) { ?>
                        <option value="<?php echo $ls->CompetencyCode; ?>"><?php echo $ls->CompetencyName; ?></option>
                      <?php } ?> 
                    </select>                   
                  </div>
                </div>

              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->

                <button type="submit" class="btn btn-primary" onclick="return check(addCurriculumCompetency)">ยืนยัน</button>
             </form>
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
  function check(frm2){
     //Check_CompetencyCode(สมรรถนะ)
     if(frm2.CompetencyCode.value==-1){
      alert("กรุณาเลือกสมรรถนะ");
      return false;
    }   
  }
</script>

  </main><!-- End #main -->
