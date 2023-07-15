<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>สาระและมาตรฐานการเรียนรู้ - <?php echo $SUBJECT_GROUP_NAME; ?> </h1>
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
                        <h5 class="card-title"><a href="list-subject_group" class="btn btn-secondary" data-mdb-ripple-color="dark">ย้อนกลับ</a></h5>

                    </div>

                    <?php if($R_200000 <> NULL && $R_200000['UR_Add']== "1") { ?>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title">&nbsp;&nbsp;<a href="forms-lc?gid=<?php echo $SUBJECT_GROUP_CODE; ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                        </div>
                    <?php } ?>
                </div>
                <table class="table table-borderless datatable"  style="width: 100%">
                    <thead>
                        <tr>
                            <th style=" width: 35%" scope="col">สาระการเรียนรู้</th>
                            <th style="text-align: center;" scope="col">มาตรฐานการเรียนรู้</th>
                            <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            <?php } ?>         
                            <?php if($R_200000 <> NULL && ( $R_200000['UR_Edit']== "1" || $R_200000['UR_Delete']== "1") ){ ?>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($listLC != null) { ?>

                            <?php $i =1;
                                foreach ($listLC as $ls) { ?>

                                <tr>                             
                                    <td style=""><?php echo $ls->LC_NAME; ?></td>
                                    <td style="text-align: center;">
                                    <?php  $LC_ID = $ls->LC_ID;
                                        $list_std = $this->SubjectKPI_model->get_STD_by_lc($LC_ID,$SUBJECT_GROUP_CODE ); 
                                        $num =1;
                                         foreach($list_std as $lstd) { ?>
                                            <p> 
                                                <button type="button" class="my-link btn btn-link " data-bs-toggle="modal" data-bs-target="#viewSTD<?php echo $LC_ID; ?><?php echo $num ;?>"><?php echo $lstd->SUBJECT_STD_ID; ?></button>
                                            </p>
                                        
                                            <div class="modal fade" id="viewSTD<?php echo $LC_ID; ?><?php echo  $num ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                                                กลุ่มสาระการเรียนรู้<?php echo $SUBJECT_GROUP_NAME; ?> - สาระที่ <?php echo $ls->LC_ID; ?> <?php echo $ls->LC_NAME; ?>
                                                            </h5>

                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <hr>
                                                        </div>
                                                        <div class="modal-body" style="padding-left: 70px; padding-top: 20px;">
                                                            <div class="row">
                                                                <h6 style="padding-top: 10px;"><b>รหัสมาตรฐานการเรียนรู้</b></h6>
                                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                                        <?php echo $lstd->SUBJECT_STD_ID;  ?> 
                                                                    </div>
                                                            </div>

                                                            <div class="row">
                                                                <h6 style="padding-top: 10px;"><b>มาตรฐานการเรียนรู้</b></h6>
                                                                    <div class=" col-8" style="padding-bottom: 8px; padding-left: 40px;">
                                                                        <?php echo $lstd->SUBJECT_STD_DETAILS;  ?> 
                                                                    </div>
                                                            </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo base_url('edit_forms-std');?>" method="POST" name="delSTD" id="delSTD" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control" name="SUBJECT_GROUP_CODE" id="SUBJECT_GROUP_CODE " value="<?php echo $SUBJECT_GROUP_CODE; ?>">
                                                                <input type="hidden" class="form-control" name="SUBJECT_STD_ID" id="SUBJECT_STD_ID " value="<?php echo $lstd->SUBJECT_STD_ID; ?>">
                                                                <input type="hidden" class="form-control" name="LC_ID" id="LC_ID " value="<?php echo $LC_ID; ?>">
                                                                <button type="submit" class="btn btn-warning"> <i class="bi bi-pencil-square"></i> </button>
                                                            </form>

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>          </div>                                 
                                                        </div>
                                                </div>
                                            </div>
                                            <!----------------------------  END Modal view STD--------------------------------->

                                    <?php $num++; }  ?>

                                    <?php if($R_200000 <> NULL && $R_200000['UR_Add']== "1"){ ?>
                                        <a href='forms-std?gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>&&lc=<?php echo $ls->LC_ID; ?>' class="fw-bold my-link">>>เพิ่มมาตรฐานการเรียนรู้<< </a>                                                            
                                     <?php  }  ?>
                                    </td>
                                  
                                    <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>                                       
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?php echo $i ?>"><i class="bi bi-card-list"></i></button>
                                            <div class="modal fade" id="view<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;" >
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i>
                                                                กลุ่มสาระการเรียนรู้<?php echo $SUBJECT_GROUP_NAME; ?> - สาระที่ <?php echo $ls->LC_ID; ?> <?php echo $ls->LC_NAME; ?>
                                                            </h5>

                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <hr>
                                                        </div>
                                                        <div class="modal-body" >
                                                            <div class="row my-2">
                                                        
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th style="text-align:center">รหัสมาตรฐานการเรียนรู้</th>
                                                                        <th style="text-align:center" >มาตรฐานการเรียนรู้</th>
                                                                    </tr>
                                                                       <?php foreach ($list_std as $lstd) { ?>
                                                                        <tr>
                                                                            <td class="col-2">
                                                                                <p style="text-align:center">
                                                                                    <?php echo $lstd->SUBJECT_STD_ID; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>
                                                                                <?php echo $lstd->SUBJECT_STD_DETAILS; ?>
                                                                                </p>
                                                                            </td>

                                                                        <?php } ?>

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
                                        <a href='edit_forms-lc?gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>&&lc=<?php echo $ls->LC_ID; ?>' class="btn btn-warning">
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
                                                <a href="<?php echo base_url('delete-lc/' . $ls->LC_ID. '/' . $SUBJECT_GROUP_CODE ) ?>  " class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php $i++; } ?>
                        <?php } ?>
                    </tbody>
                </table>


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

<style>
    .my-link {
        color: black;
        text-decoration: none;
    }

    .my-link:hover {
        color: blue;
    }

</style>
</main><!-- End #main -->