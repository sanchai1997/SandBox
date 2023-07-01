<style>
    .page-content img {
        max-width: 50%;
        height: 100%;
    }

    .page-detail img {
        max-width: 100%;
        height: 100%;
    }
</style>
<?php  $result = $this->db->query('SELECT * FROM STUDENT
                            INNER JOIN CLS_CITIZEN_ID_TYPE ON STUDENT.StudentPersonalIDTypeCode =  CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                            INNER JOIN CLS_GRADE_LEVEL ON STUDENT.GradeLevelCode =  CLS_GRADE_LEVEL.GRADE_LEVEL_CODE
                            INNER JOIN CLS_EDUCATION_LEVEL ON STUDENT.EducationLevelCode =  CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE
                            INNER JOIN CLS_STUDENT_STATUS ON STUDENT.StudentStatusCode = CLS_STUDENT_STATUS.STUDENT_STATUS_CODE
                            INNER JOIN CLS_PREFIX ON STUDENT.StudentPrefixCode = CLS_PREFIX.PREFIX_CODE
                            INNER JOIN CLS_GENDER ON STUDENT.StudentGenderCode = CLS_GENDER.GENDER_CODE
                            INNER JOIN CLS_NATIONALITY ON STUDENT.StudentNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                            INNER JOIN CLS_RACE ON STUDENT.StudentRaceCode = CLS_RACE.RACE_CODE
                            WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                                foreach ($result->result() as $STUDENT_DETAIL) {
                                ?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">

                <h1>แฟ้มสะสมผลงาน - 
                <?= $STUDENT_DETAIL->PREFIX_NAME . $STUDENT_DETAIL->StudentNameThai . ' ' . $STUDENT_DETAIL->StudentLastNameThai ?> <?php if ($STUDENT_DETAIL->StudentNameEnglish != NULL && $STUDENT_DETAIL->StudentLastNameEnglish != NULL) {
                                                                                                                                                                                        echo ' (' . $STUDENT_DETAIL->StudentNameEnglish . ' ' . $STUDENT_DETAIL->StudentLastNameEnglish . ')';
                                                                                                                                                                                    } ?>
                </h1>

            </div>
            <div class="col-6" style="padding-right: 25px;">
            </div>
        </div>
    </div>

    <!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-check"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <?php if (!empty($_SESSION['danger'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 4000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-danger" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-x"></i> ' . $_SESSION['danger'];
                    unset($_SESSION['danger']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>

    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                          
                        <?php foreach ($EPORTFOLIO as $ls) { ?>
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title" style="padding-left: 25px;">
                                      
                                            <a href="student?SchoolID=<?= $STUDENT_DETAIL->SchoolID; ?>&&StudentReferenceID=<?= $STUDENT_DETAIL->StudentReferenceID ?>&&EducationYear=<?= $STUDENT_DETAIL->EducationYear; ?>&&Semester=<?= $STUDENT_DETAIL->Semester; ?>&&GradeLevelCode=<?= $STUDENT_DETAIL->GradeLevelCode; ?>&&ShowDetail=" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;

                                    </h3>
                                </div>
                                <div class="row">
                                    <div class=" col-12" style="padding-top: 0px; padding-left: 60px; padding-right: 40px;">

                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ความชอบ
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_LIKE ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                        ความฝัน
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_DREAM ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ความหวัง
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_HOPE ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            เป้าหมาย
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_TARGET ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            สิ่งที่ได้เรียนรู้
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_LEARNING ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ผลงาน
                                                            <?php $result =   $this->db->select('*')
                                                                            ->where('DeleteStatus ', 0  ) 
                                                                            ->where('EPORTFOLIO_ID ',$ls->EPORTFOLIO_ID   ) 
                                                                            ->from('STUDENT_PROJECT')
                                                                            ->get();
                                                                 $STUDENT_PROJECT =   $result->result();     
                                                            ?>
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php foreach ($STUDENT_PROJECT as $pj) { ?>
                                                                <div class="page-content" style="text-align: center; padding-left: 20px;">
                                                                    <img src="assets/Eportfolio/document/<?= $pj->STUDENT_PROJECT_DOCUMENT; ?>" width="100%" height="100%" alt="">
                                                                </div> <br>
                                                                <label style="padding-left: 20px; text-align: center;display: block;">
                                                                    <?php echo $pj->STUDENT_PROJECT_DESCRIPTION ?>
                                                                </label><br>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ความดี
                                                            <?php $result =   $this->db->select('*')
                                                                            ->where('DeleteStatus ', 0  ) 
                                                                            ->where('EPORTFOLIO_ID ',$ls->EPORTFOLIO_ID   ) 
                                                                            ->from('STUDENT_GOODNESS')
                                                                            ->get();
                                                                 $STUDENT_GOODNESS =   $result->result();     
                                                            ?>
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                            <?php foreach ($STUDENT_GOODNESS as $gn) { ?>
                                                                <div class="page-content" style="text-align: center; padding-left: 20px;">
                                                                    <img src="assets/Eportfolio/document/<?= $gn->STUDENT_GOODNESS_DOCUMENT; ?>" width="100%" height="100%" alt="">
                                                                </div> <br>
                                                                <label style="padding-left: 20px; text-align: center;display: block;">
                                                                    <?php echo $gn->STUDENT_GOODNESS_DESCRIPTION ?>
                                                                </label><br>
                                                            <?php } ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            คุณประโยชน์
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_USEFULNESS ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            ความภาคภูมิใจ
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_PRIDE ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                            สรุป
                                                         
                                                        </h5>
                                                        <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                           
                                                            <label style="padding-left: 20px;">
                                                                <?php echo $ls->STUDENT_SUMMARY ?>
                                                            </label><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                         

                                    </div>
                                </div>
                            </div>
                        <?php } ?>   
                        </div>
                    </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
   



    </div>
    </div><!-- End Recent Sales -->

</main><!-- End #main -->

<?php
$result = $this->db->query('SELECT * FROM STUDENT WHERE DeleteStatus = 0');
foreach ($result->result() as $STUDENT) {
?>
    <div class="modal fade" id="Delete<?= $STUDENT->StudentReferenceID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('delete-student/' . $STUDENT->StudentReferenceID  . '/' . $STUDENT->SchoolID  . '/' . $STUDENT->EducationYear . '/' . $STUDENT->Semester . '/' . $STUDENT->GradeLevelCode); ?>" class="btn btn-danger">ลบ</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php } ?>