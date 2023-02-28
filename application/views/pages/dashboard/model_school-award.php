<!-- Modal -->
<?php foreach ($schools as $model_school) { ?>
<div class="modal fade" id="Modal<?= $model_school->SCHOOL_ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php 
        $ID = $model_school->SCHOOL_ID;
    ?>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <!---------------------  ข้อมูลทั่วไปสถานศึกษา --------------------->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;">
                    <i class="bi bi-card-heading"></i> ข้อมูลรายละเอียดรางวัล
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr>
            </div>
            <div class="modal-body" style="padding-left: 60px; padding-right: 60px; padding-top: 30px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ปีที่ได้รับรางวัล</th>
                            <th scope="col">ชื่อรางวัล</th>
                            <th scope="col">แหล่งที่มาของรางวัล</th>
                            <th scope="col">แหล่งที่มาของรางวัล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result_detail = $this->db->query('SELECT * FROM SCHOOL_AWARD 
                                WHERE SCHOOL_ID = '.$ID.'');

                            foreach ($result_detail ->result() as $row_detail) {
                        ?>
                        <tr>
                            <td><?php echo $row_detail->AWARD_YEAR; ?></td>
                            <td><?php echo $row_detail->AWARD_NAME; ?></td>
                            <td><?php echo $row_detail->AWARD_SOURCE; ?></td>
                            <td>
                                <?php 
                            
                                    switch ($row_detail->AWARD_LEVEL_CODE) {
                                        case 01: echo "ระดับประเทศ"; break;
                                        case 02: echo "ระดับภาค"; break;
                                        case 03: echo "ระดับจังหวัด"; break;
                                        case 04: echo "ระดับอำเภอ"; break;
                                        case 05: echo "ระดับตำบล"; break;
                                        case 06: echo "ระดับเขตพื้นที่การศึกษา"; break;
                                    }
                            
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!----------------------------  END --------------------------------->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i
                        class="bi bi-pencil-square"></i></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="bi bi-x-square"></i></button>
            </div>
        </div>
    </div>
</div>
<!----------------------------  END --------------------------------->

<?php } ?>