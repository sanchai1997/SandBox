<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ตัวชี้วัดชั้นปี</h1>
            </div>

        </div>
    </div>
    <!-- End Page Title -->

    <!-- Alert -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <div class="col-12">
            <script>
                setTimeout(function() {
                    document.getElementById('myAlert').remove();
                }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
            </script>

            <div class="alert alert-success" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-check-circle-fill"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>
            </div>

        </div>
    <?php } ?>

    <!-- Alert -->
    <?php if (!empty($_SESSION['errors'])) { ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="alert alert-danger" id="myAlert" style="top: 0; left: 0; right: 0; z-index: 1;">
                    <strong>
                        <?php
                        echo '<i class="bi bi-exclamation-circle-fill"></i> ' . $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>
                    </strong>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h1 class="card-title">

                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $GRADE_LEVEL_NAME; ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php   $listGradeLevel = $this->Code_model->get_GradeLevel_All_LC();
                                        foreach ($listGradeLevel as $ls) { ?>
                                        <li>
                                            <a class="dropdown-item" href="list-kpi?gid=<?php echo $SUBJECT_GROUP_CODE; ?>&&y=<?php echo $ls->GRADE_LEVEL_CODE; ?>&&lc=<?php echo $LC_ID; ?>"><?php echo $ls->GRADE_LEVEL_NAME; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </h1>
                    </div>                    
                    <div class="col">
                        <h1 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $SUBJECT_GROUP_NAME; ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php $listSubjectGroup = $this->SubjectKPI_model->get_subject_group_All();
                                        foreach ($listSubjectGroup as $ls) { ?>
                                        <li>
                                            <a class="dropdown-item" href="list-kpi?gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>&&y=<?php echo $SUBJECT_KPI_YEAR; ?>&&lc=1"><?php echo $ls->SUBJECT_GROUP_NAME; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </h1>
                    </div>

                    <div class="col">
                        <h1 class="card-title">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $LC_NAME; ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php $listLC =$this->SubjectKPI_model->get_lc_All( $SUBJECT_GROUP_CODE);
                                        foreach ($listLC as $ls) { ?>
                                        <li>
                                            <a class="dropdown-item" href="list-kpi?gid=<?php echo $SUBJECT_GROUP_CODE; ?>&&y=<?php echo $SUBJECT_KPI_YEAR; ?>&&lc=<?php echo $ls->LC_ID; ?>"><?php echo $ls->LC_NAME; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </h1>
                    </div>

                    <?php if($R_200000 <> NULL && $R_200000['UR_Add']== "1") { ?>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title">&nbsp;&nbsp;<a href="forms-kpi?gid=<?php echo $SUBJECT_GROUP_CODE; ?>&&y=<?php echo $SUBJECT_KPI_YEAR; ?>&&lc=<?php echo $LC_ID; ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                            <h5 style="float: right; padding: 15px;" class="card-title">&nbsp;&nbsp;<a data-bs-toggle="modal" data-bs-target="#kpiModal" class="btn btn-success"><i class="bi bi-file-earmark-arrow-up"></i> อัปโหลดตัวชี้วัดชั้นปี</a></h5>
                        </div>
                    <?php } ?>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 8%"  scope="col">มาตรฐานการเรียนรู้</th>
                            <th style="text-align: center; width: 12%" scope="col">รหัสตัวชี้วัด</th>
                            <th style="text-align: center; width: 40% "    scope="col">รายละเอียดตัวชี้วัด</th>
                             
                            <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>
                                <th style="text-align: center; width: 11%;" scope="col">รายละเอียดเพิ่มเติม</th>
                            <?php } ?> 
        
                            <?php if($R_200000 <> NULL && ( $R_200000['UR_Edit']== "1" || $R_200000['UR_Delete']== "1") ){ ?>
                                <th style="text-align: center;  width: 11%" scope="col">ปฎิบัติ</th>
                            <?php } ?>


                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($listkpi != null) { ?>
                            
                            <?php $i =1;
                                foreach ($listkpi as $ls) { ?>

                                <tr>                             
                                    <td style="text-align: center;"><?php echo $ls->SUBJECT_STD_ID; ?></td>
                                    <td style="text-align: center;"><?php echo $ls->SUBJECT_KPI_ID; ?></td>
                                    <td style="text-overflow: ellipsis;">
                                        <?php echo $ls->SUBJECT_KPI_DETAIL; ?>
                                    </td>
                                    <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $i ?>"><i class="bi bi-card-list"></i></button>
                                            <div class="modal fade" id="view<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;" >
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                                                <?php echo $ls->GRADE_LEVEL_NAME; ?> - กลุ่มสาระการเรียนรู้<?php echo $SUBJECT_GROUP_NAME; ?> 
                                                                - สาระการเรียนรู้ : <?php echo $LC_NAME; ?> 
                                                                </h5>

                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <hr>
                                                            </div>
                                                            <div class="modal-body" >
                                                                <div class="row my-2">
                                                            
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <th style="text-align:center">รหัสมาตรฐานการเรียนรู้</th>
                                                                            <th style="text-align:center; " >มาตรฐานการเรียนรู้</th>
                                                                            <th style="text-align:center;  width: 15%" >รหัสตัวชี้วัด</th>                                                                       
                                                                            <th style="text-align:center;  width: 30%"" >รายละเอียดตัวชี้วัด</th>                                                                       
                                                                        </tr>
                                                                            <tr>
                                                                                <td class="col-2">
                                                                                    <p style="text-align:center">
                                                                                        <?php echo $ls->SUBJECT_STD_ID; ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>
                                                                                    <?php echo $ls->SUBJECT_STD_DETAILS; ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p style="text-align:center">
                                                                                    <?php echo $ls->SUBJECT_KPI_ID; ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>
                                                                                    <?php echo $ls->SUBJECT_KPI_DETAIL; ?>
                                                                                    </p>
                                                                                </td>


                                                                            </tr>
                                                                    </table>
                                                    
                                                                </div>
                                                            
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>     
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end view Modal -->    
                                        </td>
                                    <?php } ?>

                                    <?php if($R_200000 <> NULL && ( $R_200000['UR_Edit']== "1" || $R_200000['UR_Delete']== "1") ){ ?>
                                    <td style="text-align: center;">
                                        <?php if( $R_200000 <> NULL &&  $R_200000['UR_Edit']== "1"  ){ ?>
                                        <a href='edit_forms-kpi?kid=<?php echo $ls->SUBJECT_KPI_ID; ?>&&gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>&&y=<?php echo $ls->SUBJECT_KPI_YEAR; ?>&&lc=<?php echo $ls->LC_ID; ?>' class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <?php } ?>

                                        <?php if( $R_200000 <> NULL &&  $R_200000['UR_Delete']== "1"  ){ ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $i; ?>">
                                            <i class=" bi bi-trash"></i>
                                        </button>
                                        <?php } ?>

                                    </td>
                                    <?php } ?>

                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    <center>คุณต้องการลบข้อมูลใช่หรือไหม ?</center>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?php echo base_url('delete-kpi');?>" method="POST" name="delKPI" id="delKPI" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control" name="SUBJECT_KPI_ID" id="SUBJECT_KPI_ID " value="<?php echo $ls->SUBJECT_KPI_ID; ?>">
                                                    <input type="hidden" class="form-control" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE " value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                                                    <input type="hidden" class="form-control" name="SUBJECT_KPI_YEAR" id="SUBJECT_KPI_YEAR " value="<?php echo $SUBJECT_KPI_YEAR; ?>">
                                                    <input type="hidden" class="form-control" name="LC_ID" id="LC_ID " value="<?php echo $LC_ID; ?>">
                                                    <button type="submit" class="btn btn-danger">ลบ</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php $i++;} ?>
                        <?php } ?>
                    </tbody>
                </table>

                 <!-- upload file -->
                <div class="modal fade" id="kpiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-file-earmark-arrow-up"></i> อัปโหลดสถานศึกษา</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('uploadfile-kpi'); ?>" method="POST" id="UploadKPI" enctype="multipart/form-data">
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>คู่มือขั้นตอนการอัปโหลด : &nbsp;</label>
                                                <a href="assets/school/GuideUpload.pdf" class="btn btn-info" target="_blank"><i class="bi bi-file-earmark-text"></i> รายละเอียด</a>
                                            </div>
                                            <div class="col-6">
                                                <label>ฟอร์มกรอกข้อมูล : &nbsp;</label>
                                                <a href="assets/school/FormsSchool.xlsx" class="btn btn-success" download target="_blank"><i class="bi bi-file-earmark-arrow-down"></i> ดาวน์โหลด</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupFile01">แนบไฟล์ .CSV</label>
                                            <input type="file" class="form-control" name="FileUpload" id="FileUpload" placeholder="เอกสารแนบไฟล์" required>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function check(frm) {
                                            if (!frm.FileUpload.value == "") {
                                                var fty = new Array(".csv"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
                                                var a = frm.FileUpload.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
                                                var permiss = 0; // เงื่อนไขไฟล์อนุญาต
                                                a = a.toLowerCase();
                                                if (a != "") {
                                                    for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
                                                        if (a.lastIndexOf(fty[i]) >= 0) { // เงื่อนไขไฟล์ที่อนุญาต   
                                                            permiss = 1;
                                                            break;
                                                        } else {
                                                            continue;
                                                        }
                                                    }
                                                    if (permiss == 0) {
                                                        alert("กรุณาอัพโหลดไฟล์ได้เฉพาะไฟล์ csv");
                                                        return false;
                                                    }
                                                }
                                            }
                                        }
                                    </script>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" onclick="return check(UploadKPI)">อัปโหลด</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div><!-- End Recent Sales -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $("select").click(function() {
            var open = $(this).data("isopen");
            if (open) {
                window.location.href = $(this).val()
            }
            $(this).data("isopen", !open);
        });
    </script>

</main><!-- End #main -->