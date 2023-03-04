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
                                WHERE SCHOOL_ID = '.$ID.'
                                GROUP BY CLASSROOM_GRADE_LEVEL_CODE');

                            foreach ($result_detail ->result() as $row_detail) {
                        ?>
                        <tr>
                            <td>
                                <?php 
                            
                                    switch ($row_detail->CLASSROOM_GRADE_LEVEL_CODE) {
                                        case 100: echo "เตรียมอนุบาล"; break;
                                        case 111: echo "อนุบาล 1(หลักสูตร 3 ปีของ สช.)/อนุบาล 3 ขวบ"; break;
                                        case 112: echo "อนุบาล 2(หลักสูตร 3 ปีของ สช.)/อนุบาล 1"; break;
                                        case 113: echo "อนุบาล 3(หลักสูตร 3 ปีของ สช.)/อนุบาล 2"; break;
                                        case 114: echo "เด็กเล็ก"; break;
                                        case 211: echo "ประถมศึกษาปีที่ 1/เกรด 1"; break;
                                        case 212: echo "ประถมศึกษาปีที่ 2/เกรด 2"; break;
                                        case 213: echo "ประถมศึกษาปีที่ 3/เกรด 3"; break;
                                        case 214: echo "ประถมศึกษาปีที่ 4/เกรด 4"; break;
                                        case 215: echo "ประถมศึกษาปีที่ 5/เกรด 5"; break;
                                        case 216: echo "ประถมศึกษาปีที่ 6/เกรด 6"; break;
                                        case 217: echo "กศน.ประถมศึกษา (ป.6)"; break;
                                        case 311: echo "มัธยมศึกษาปีที่ 1 /เกรด 7/ นาฎศิลป์ชั้นที่ 1"; break;
                                        case 312: echo "มัธยมศึกษาปีที่ 2 /เกรด 8/ นาฎศิลป์ชั้นที่ 2"; break;
                                        case 313: echo "มัธยมศึกษาปีที่ 3 /เกรด 9/ นาฎศิลป์ชั้นที่ 3"; break;
                                        case 414: echo "กศน.มัธยมศึกษาตอนต้น (ม.3)"; break;
                                        case 411: echo "มัธยมศึกษาปีที่ 4/เกรด10/เตรียมทหารชั้นปีที่ 1"; break;
                                        case 412: echo "มัธยมศึกษาปีที่ 5/เกรด11/เตรียมทหารชั้นปีที่ 2"; break;
                                        case 413: echo "มัธยมศึกษาปีที่ 6/เกรด12/เตรียมทหารชั้นปีที่ 3"; break;
                                        case 314: echo "กศน.มัธยมศึกษาตอนปลาย (ม.6)"; break;
                                    }
                            
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo $row_detail->Total_classroom; ?></td>
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