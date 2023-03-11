<body onload="onloadpage()">
<main id="main" class="main">
<?php foreach($CurriculumCompetency as $cc) { ?>

    <div class="pagetitle">
      <h1>แก้ไขข้อมูลสมรรถนะของหลักสูตร </h1>
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
              <form class="row g-3" action="<?php echo base_url('edit_curriculum_school_competency');?>" method="POST" name="CurriculumCompetency" id="CurriculumCompetency" enctype="multipart/form-data"> 
                <input type="hidden" name="CurriculumID" id="CurriculumID" value="<?php echo $cc->CurriculumID; ?>">
                <input type="hidden" name="SubjectCode" id="SubjectCode" value="<?php echo $cc->SubjectCode; ?>">
                <input type="hidden" name="Old_CompetencyCode" id="Old_CompetencyCode" value="<?php echo $cc->CompetencyCode; ?>">
                

                <div class="col-md-16">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="CompetencyCode" id="CompetencyCode">
                      <?php foreach($listCompetency as $ls) { ?>
                        <option value="<?php echo $ls->CompetencyCode; ?>"><?php echo $ls->CompetencyName; ?></option>
                      <?php } ?> 
                    </select>    
                    <label>สมรรถนะ</label>
                  </div>
                </div>

              <!-- End Form ข้อมูลสมรรถนะของหลักสูตร -->
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="return check(CurriculumCompetency)">ยืนยัน</button>
                  </div>
                </form>
                

            </div>
          </div>

        </div>

    
      </div>
    </section>

<script>
    function onloadpage(){
   
   ///CompetencyCode
   var my_CompetencyCode = "<?php echo $cc->CompetencyCode; ?>";
   var selectoption_CompetencyCode = document.querySelector('#CompetencyCode');
   var size_my_CompetencyCode =  document.getElementById("CompetencyCode").options.length;
   for (let i = 0; i < size_my_CompetencyCode; i++) {
     if(selectoption_CompetencyCode[i].value==my_CompetencyCode){
      selectoption_CompetencyCode[i].selected = true;
     }
   }

  }
  function check(frm2){
     //Check_CompetencyCode(สมรรถนะ)
     if(frm2.CompetencyCode.value==-1){
      alert("กรุณาเลือกสมรรถนะ");
      return false;
    }   
  }
</script>
<?php } ?>
  </main><!-- End #main -->
