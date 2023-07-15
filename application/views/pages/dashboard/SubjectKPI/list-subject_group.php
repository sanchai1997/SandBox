<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>กลุ่มสาระการเรียนรู้</h1>
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

                        </h1>
                    </div>

                    <?php if($R_200000 <> NULL && $R_200000['UR_Add']== "1") { ?>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title">&nbsp;&nbsp;<a href="forms-subject_group" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i> เพิ่มข้อมูล</a></h5>
                        </div>
                    <?php } ?>
                </div>
                <table class="table table-borderless datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 30%" scope="col">กลุ่มสาระการเรียนรู้</th>
                            <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>
                                <th style="text-align: center;" scope="col">สาระการเรียนรู้</th>
                            <?php } ?> 
        
                            <?php if($R_200000 <> NULL && ( $R_200000['UR_Edit']== "1" || $R_200000['UR_Delete']== "1") ){ ?>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            <?php } ?>


                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($listSubjectGroup != null) { ?>

                            <?php foreach ($listSubjectGroup as $ls) { ?>

                                <tr>                             
                                    <td style=""><?php echo $ls->SUBJECT_GROUP_NAME; ?></td>
                                    <?php if($R_200000 <> NULL && $R_200000['UR_Read']== "1"){ ?>
                                        <td style="text-align: center;">
                                             <a href='list-lc?gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>'>
                                                <button type="button" class="btn btn-info"><i class="bi bi-eye-fill"></i></button> 
                                            </a>
                                        </td>
                                    <?php } ?>

                                    <?php if($R_200000 <> NULL && ( $R_200000['UR_Edit']== "1" || $R_200000['UR_Delete']== "1") ){ ?>
                                    <td style="text-align: center;">
                                        <?php if( $R_200000 <> NULL &&  $R_200000['UR_Edit']== "1"  ){ ?>
                                        <a href='edit_forms-subject_group?gid=<?php echo $ls->SUBJECT_GROUP_CODE; ?>' class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <?php } ?>

                                        <?php if( $R_200000 <> NULL &&  $R_200000['UR_Delete']== "1"  ){ ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $ls->SUBJECT_GROUP_CODE; ?>">
                                            <i class=" bi bi-trash"></i>
                                        </button>
                                        <?php } ?>

                                    </td>
                                    <?php } ?>

                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete<?php echo $ls->SUBJECT_GROUP_CODE; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                <a href="<?php echo base_url('delete-subject_group/' . $ls->SUBJECT_GROUP_CODE ) ?>  " class="btn btn-danger">ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
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
</main><!-- End #main -->