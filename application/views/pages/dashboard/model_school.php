<!-- Modal -->
<?php foreach ($schools as $model_school) { ?>
<div class="modal fade" id="Modal<?= $model_school->SCHOOL_ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">

    <!---------------------  ข้อมูลทั่วไปสถานศึกษา --------------------->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"> <i class="bi bi-card-heading"></i> ข้อมูลทั่วไปสถานศึกษา</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <hr>
      </div>
      <div class="modal-body" style="padding-left: 60px; padding-top: 30px;">
        <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    ชื่อสถานศึกษา (ภาษาไทย) :  <?= $model_school->NAME_TH; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    ชื่อสถานศึกษา (อังกฤษ) :  <?= $model_school->NAME_EN; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    วันที่ก่องตั้ง :  <?= DateThai($model_school->ESTABLISHED_DATE); ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    ประเภทสถานศึกษา :  
                    <?php 
                          switch ($model_school->SCHOOL_TYPE_CODE) {
                            case 1:
                                echo "โรงเรียน ประเภทสามัญศึกษา"; break;
                            case 2:
                                echo "โรงเรียนเอกชนสามัญ (สามัญปกติ)"; break;
                           
                          }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    สถานะของสถานศึกษา :  
                    <?php 
                          switch ($model_school->SCHOOL_STATUS_CODE) {
                            case 1:
                                echo "ปกติ"; break;
                            case 2:
                                echo "ยุบ/เลิก"; break;
                            case 3:
                                echo "ถ่ายโอน"; break;
                          }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="padding-bottom: 8px;">
                    ที่อยู่ :  
                    <?= $model_school->ADDRESS_HOUSE_NO; ?>  
                    <?= $model_school->ADDRESS_MOO; ?> 
                    <?= $model_school->ADDRESS_STREET; ?> 
                    <?= $model_school->ADDRESS_SOI; ?> 
                    <?= $model_school->ADDRESS_TROK; ?> 
                    <?= $model_school->ADDRESS_SUBDISTRICT_CODE; ?> 
                    <?= $model_school->ADDRESS_DISTRICT_CODE; ?>

                    <?php 
                          switch ($model_school->ADDRESS_PROVINCE_CODE) {
                            case 10: echo "กรุงเทพมหานคร"; break;
                            case 11: echo "สมุทรปราการ"; break;
                            case 12: echo "นนทบุรี"; break;
                            case 13: echo "ปทุมธานี"; break;
                            case 14: echo "พระนครศรีอยุธยา"; break;
                            case 15: echo "อ่างทอง"; break;
                            case 16: echo "ลพบุรี"; break;
                            case 17: echo "สิงห์บุรี"; break;
                            case 18: echo "ชัยนาท"; break;
                            case 19: echo "สระบุรี"; break;
                            case 20: echo "ชลบุรี"; break;
                            case 21: echo "ระยอง"; break;
                            case 22: echo "จันทบุรี"; break;
                            case 23: echo "ตราด"; break;
                            case 24: echo "ฉะเชิงเทรา"; break;
                            case 25: echo "ปราจีนบุรี"; break;
                            case 26: echo "นครนายก"; break;
                            case 27: echo "สระแก้ว"; break;
                            case 30: echo "นครราชสีมา"; break;
                            case 31: echo "บุรีรัมย์"; break;
                            case 32: echo "สุรินทร์"; break;
                            case 33: echo "ศรีสะเกษ"; break;
                            case 34: echo "อุบลราชธานี"; break;
                            case 35: echo "ยโสธร"; break;
                            case 36: echo "ชัยภูมิ"; break;
                            case 37: echo "อำนาจเจริญ"; break;
                            case 38: echo "บึงกาฬ"; break;
                            case 39: echo "หนองบัวลำภู"; break;
                            case 40: echo "ขอนแก่น"; break;
                            case 41: echo "อุดรธานี"; break;
                            case 42: echo "เลย"; break;
                            case 43: echo "หนองคาย"; break;
                            case 44: echo "มหาสารคาม"; break;
                            case 45: echo "ร้อยเอ็ด"; break;
                            case 46: echo "กาฬสินธุ์"; break;
                            case 47: echo "สกลนคร"; break;
                            case 48: echo "นครพนม"; break;
                            case 49: echo "มุกดาหาร"; break;
                            case 50: echo "เชียงใหม่"; break;
                            case 51: echo "ลำพูน"; break;
                            case 52: echo "ลำปาง"; break;
                            case 53: echo "อุตรดิตถ์"; break;
                            case 54: echo "แพร่"; break;
                            case 55: echo "น่าน"; break;
                            case 56: echo "พะเยา"; break;
                            case 57: echo "เชียงราย"; break;
                            case 58: echo "แม่ฮ่องสอน"; break;
                            case 60: echo "นครสวรรค์"; break;
                            case 61: echo "อุทัยธานี"; break;
                            case 62: echo "กำแพงเพชร"; break;
                            case 63: echo "ตาก"; break;
                            case 64: echo "สุโขทัย"; break;
                            case 65: echo "พิษณุโลก"; break;
                            case 66: echo "พิจิตร"; break;
                            case 67: echo "เพชรบูรณ์"; break;
                            case 70: echo "ราชบุรี"; break;
                            case 71: echo "กาญจนบุรี"; break;
                            case 72: echo "สุพรรณบุรี"; break;
                            case 73: echo "นครปฐม"; break;
                            case 74: echo "สมุทรสาคร"; break;
                            case 75: echo "สมุทรสงคราม"; break;
                            case 76: echo "เพชรบุรี"; break;
                            case 77: echo "ประจวบคีรีขันธ์"; break;
                            case 80: echo "นครศรีธรรมราช"; break;
                            case 81: echo "กระบี่"; break;
                            case 82: echo "พังงา"; break;
                            case 83: echo "ภูเก็ต"; break;
                            case 84: echo "สุราษฎร์ธานี"; break;
                            case 85: echo "ระนอง"; break;
                            case 86: echo "ชุมพร"; break;
                            case 90: echo "สงขลา"; break;
                            case 91: echo "สตูล"; break;
                            case 92: echo "ตรัง"; break;
                            case 93: echo "พัทลุง"; break;
                            case 94: echo "ปัตตานี"; break;
                            case 95: echo "ยะลา"; break;
                            case 96: echo "นราธิวาส"; break;
                          }
                    ?>

                </div>
            </div>
            <div class="row">
                <div class="col-4" style="padding-bottom: 8px;">
                    รหัสไปรษณี :  <?= $model_school->ADDRESS_POSTCODE; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    ค่าตำแหน่งพิกัดทาง Latitude :  <?= $model_school->LATTITUDE; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    ค่าตำแหน่งพิกัดทาง Longitude :  <?= $model_school->LONGITUDE; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="padding-bottom: 8px;">
                    แผนที่ :  <?= $model_school->MAP_URL; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    หมายเลขโทรศัพท์ :  <?= $model_school->PHONE_NUMBER; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    หมายเลขโทรศัพท์ (สำรอง) :  <?= $model_school->SECOND_PHONE_NUMBER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    หมายเลขโทรสาร :  <?= $model_school->FAX_NUMBER; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    หมายเลขโทรสาร (สำรอง) :  <?= $model_school->SECOND_FAX_NUMBER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    อีเมล :  <?= $model_school->EMAIL; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    เว็บไซต์ :  <?= $model_school->WEBSITE_URL; ?>
                </div>
            </div>
      </div>
    <!----------------------------  END --------------------------------->


    <!---------------  ข้อมูลละเอียดสถานศึกษา ---------------------->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 30px; padding-top: 15px;"><i class="bi bi-card-heading"></i> ข้อมูลละเอียดสถานศึกษา</h5>
        <hr>
      </div>
      <div class="modal-body" style="padding-left: 60px; padding-top: 30px;">
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    ปีการศึกษา :  <?= $model_school->EDUCATION_YEAR; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    ภาคเรียน :  <?= $model_school->SEMESTER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    รหัสเขตพื้นที่ :  <?= $model_school->AREA_NO; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    ชื่อเขตพื้นที่ :  <?= $model_school->AREA_NAME; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    หน่วยงานต้นสังกัด :  <?= $model_school->JURISDICTION_CODE; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    เขตการปกครอง :  <?= $model_school->MUNICIPAL_CODE; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="padding-bottom: 8px;">
                    พื้นที่นวัตกรรม :  
                    <?php 
                          switch ($model_school->INNOVATION_AREA_CODE) {
                            case 21:
                              echo "ระยอง"; break;
                            case 33:
                              echo "ศรีสะเกษ"; break;
                            case 50:
                              echo "เชียงใหม่"; break;
                            case 71:
                              echo "กาญจนบุรี"; break;
                            case 91:
                              echo "สตูล"; break;
                            case 94:
                              echo "ปัตตานี"; break;
                            case 95:
                              echo "ยะลา"; break;
                            case 96:
                              echo "นราธิวาส"; break;
                          }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4" style="padding-bottom: 8px;">
                    ระดับการศึกษา :  <?= $model_school->EDUCATION_LEVEL_CODES; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    ประเภทแหล่งกำเนิดไฟฟ้า : <?= $model_school->ELECTRIC_TYPE_CODES; ?> 
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    แหล่งน้ำที่โรงเรียนใช้ :  <?= $model_school->WATER_TYPE_CODES; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    การมีอินเทอร์เน็ต :  <?= $model_school->INTERNET_TYPE_CODES; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    การใช้สื่อการเรียนการสอน :  <?= $model_school->EDUCATION_CONTENTS; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    จำนวนเครื่องคอมพิวเตอร์ที่เชื่อมต่อเครือข่าย :  <?= $model_school->COMPUTER_ONLINE_NUMBER; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                    จำนวนเครื่องคอมพิวเตอร์ Stan alone :  <?= $model_school->COMPUTER_STANDALONE_NUMBER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                    จำนวนเครื่องคอมพิวเตอร์สำหรับการเรียนการสอน :  <?= $model_school->COMPUTER_TEACH_NUMBER; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                จำนวนเครื่องคอมพิวเตอร์สำหรับการบริหารการจัดการ :  <?= $model_school->COMPUTER_MANAGE_NUMBER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                จำนวนห้องน้ำสำหรับนักเรียนชาย :  <?= $model_school->TOILET_STUDENT_MALE_NUMBER; ?>
                </div>
                <div class="col-6" style="padding-bottom: 8px;">
                จำนวนห้องน้ำสำหรับนักเรียนหญิง :  <?= $model_school->TOILET_STUDENT_FEMALE_NUMBER; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="padding-bottom: 8px;">
                จำนวนห้องน้ำทั้งหมด :  <?= $model_school->TOILET_COMBINATION; ?>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
    <!----------------------------  END --------------------------------->

<?php } ?>