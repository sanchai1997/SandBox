<!-- Modal -->
<?php foreach ($schools as $model_school) { ?>
    <div class="modal fade" id="Modal<?= $model_school->SCHOOL_ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
        $ID = $model_school->SCHOOL_ID;
        ?>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <!---------------------  ข้อมูลทั่วไปสถานศึกษา --------------------->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;">
                        <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียดห้องเรียน
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr>
                </div>
                <div class="modal-body" style="padding-left: 60px; padding-right: 60px; padding-top: 30px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">ระดับชั้น</th>
                                <th scope="col" style="text-align: center;">จำนวนห้อง</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result_detail = $this->db->query('SELECT * ,SUM(CLASSROOM_AMOUNT) AS Total_classroom 
                                FROM SCHOOL_CLASSROOM 
                                INNER JOIN CLS_CLASSROOM_GRADE_LEVEL ON SCHOOL_CLASSROOM.CLASSROOM_GRADE_LEVEL_CODE = CLS_CLASSROOM_GRADE_LEVEL.CLS_CLASSROOM_GRADE_LEVEL_CODE;
                                WHERE SCHOOL_ID = ' . $ID . '
                                GROUP BY CLASSROOM_GRADE_LEVEL_CODE');

                            foreach ($result_detail->result() as $row_detail) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $row_detail->CLASSROOM_GRADE_LEVEL_NAME; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $row_detail->Total_classroom; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!----------------------------  END --------------------------------->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------  END --------------------------------->

<?php } ?>