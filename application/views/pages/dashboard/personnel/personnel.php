<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>ข้อมูลบุคลากรอื่น
                    <?php if (isset($_GET['JurisdictionCode'])) {
                        $result = $this->db->query('SELECT * 
                                            FROM CLS_JURISDICTION
                                            WHERE JURISDICTION_CODE = ' . $_GET['JurisdictionCode'] . '
                                            ');
                        foreach ($result->result() as $JURISDICTION) {
                            echo ' - หน่วยงานต้นสังกัด ' . $JURISDICTION->JURISDICTION_NAME;
                        }
                    } ?>
                </h1>
            </div>
        </div>
    </div><!-- End Page Title -->
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
    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <?php if (!isset($_GET['JurisdictionCode'])) { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        เลือกหน่วยงานต้นสังกัด
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                                    WHERE DeleteStatus = 0
                                    GROUP BY JurisdictionCode ASC
                                    ');

                                        foreach ($result->result() as $PERSONNEL) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="?JurisdictionCode=<?= $PERSONNEL->JURISDICTION_CODE  ?>"><?= $PERSONNEL->JURISDICTION_NAME  ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel" class="btn btn-success ">เพิ่มข้อมูล</a></h5>
                        </div>

                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">หน่วยงานต้นสังกัด</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                                    WHERE DeleteStatus = 0
                                    GROUP BY JurisdictionCode ASC
                                    ');

                            foreach ($result->result() as $PERSONNEL) {
                            ?>
                                <tr>

                                    <td><?= $PERSONNEL->JURISDICTION_NAME; ?></td>
                                    <td style="text-align: center;"><a href="?JurisdictionCode=<?= $PERSONNEL->JurisdictionCode ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else if (isset($_GET['JurisdictionCode'])  && !isset($_GET['PersonnelTypeCode']) && !isset($_GET['PositionCode']) && !isset($_GET['ShowDetail'])) { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if (!isset($_GET['JurisdictionCode'])) { ?>
                                            เลือกสถานศึกษา
                                        <?php } else {
                                            $result = $this->db->query('SELECT * 
                                            FROM CLS_JURISDICTION
                                            WHERE JURISDICTION_CODE = ' . $_GET['JurisdictionCode'] . '
                                            ');
                                            foreach ($result->result() as $JURISDICTION) {
                                                echo $JURISDICTION->JURISDICTION_NAME;
                                            }
                                        } ?>
                                    </button>
                                    &nbsp;<a href="personnel" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                                    WHERE DeleteStatus = 0
                                    GROUP BY JurisdictionCode ASC
                                    ');

                                        foreach ($result->result() as $PERSONNEL) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="?JurisdictionCode=<?= $PERSONNEL->JURISDICTION_CODE  ?>"><?= $PERSONNEL->JURISDICTION_NAME  ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 style="float: right; padding: 15px;" class="card-title"><a href="forms-personnel-select?JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>" class="btn btn-success ">เพิ่มข้อมูล</a></h5>
                        </div>

                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ประเภทบุคลากร</th>
                                <th scope="col">ตำแหน่ง</th>
                                <th style="text-align: center;" scope="col">จำนวน</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_PERSONNEL_TYPE  ON PERSONNEL.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                                    INNER JOIN CLS_POSITION  ON PERSONNEL.PositionCode = CLS_POSITION.POSITION_CODE
                                    WHERE DeleteStatus = 0 AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . '
                                    GROUP BY PersonnelTypeCode , PositionCode ASC
                                    ');
                            $CountPersonnel = 0;
                            foreach ($result->result() as $PERSONNEL) {
                                $CountPersonnel++;
                            ?>
                                <tr>

                                    <td><?= $PERSONNEL->PERSONNEL_TYPE_NAME; ?></td>
                                    <td><?= $PERSONNEL->POSITION_NAME; ?></td>
                                    <td style="text-align: center;"><?= $CountPersonnel; ?></td>
                                    <td style="text-align: center;"><a href="?JurisdictionCode=<?= $PERSONNEL->JurisdictionCode ?>&&PersonnelTypeCode=<?= $PERSONNEL->PersonnelTypeCode ?>&&PositionCode=<?= $PERSONNEL->PositionCode ?>" class="btn btn-primary"><i class="bi bi-card-list"></i></a></td>
                                </tr>

                            <?php
                                $CountPersonnel = 0;
                            } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else if (isset($_GET['JurisdictionCode']) && isset($_GET['PersonnelTypeCode']) && isset($_GET['PositionCode']) && !isset($_GET['ShowDetail'])) { ?>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $result = $this->db->query('SELECT * 
                                    FROM CLS_PERSONNEL_TYPE
                                    WHERE PERSONNEL_TYPE_CODE = ' . $_GET['PersonnelTypeCode'] . '
                                    ');
                        foreach ($result->result() as $CLS_PERSONNEL_TYPE) {
                            $PERSONNEL_TYPE = $CLS_PERSONNEL_TYPE->PERSONNEL_TYPE_NAME;
                        }
                        $result = $this->db->query('SELECT * 
                                    FROM CLS_POSITION
                                    WHERE POSITION_CODE = ' . $_GET['PositionCode'] . '
                                    ');
                        foreach ($result->result() as $CLS_POSITION) {
                            $POSITION = $CLS_POSITION->POSITION_NAME;
                        }
                        ?>
                        <div class="col">
                            <h1 class="card-title">
                                <a href="?JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>&nbsp;
                                <a class="btn btn-sm btn-light text-dark"><b> ประเภทบุคลากร:&nbsp; <?= $PERSONNEL_TYPE ?>&nbsp;&nbsp;ตำแหน่ง:&nbsp; <?= $POSITION ?></b></a>
                            </h1>

                        </div>

                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="100px">รูปภาพ</th>
                                <th scope="col">คำนำหน้า</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">สถานะปฎิบัติราชการ</th>
                                <th style="text-align: center;" scope="col">รายละเอียด</th>
                                <th style="text-align: center;" scope="col">ปฎิบัติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->db->query('SELECT * 
                                    FROM PERSONNEL
                                    INNER JOIN CLS_PREFIX  ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                                    INNER JOIN CLS_PERSONNEL_STATUS  ON PERSONNEL.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                                    WHERE DeleteStatus = 0 AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . '
                                    AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . '
                                    AND PositionCode = ' . $_GET['PositionCode'] . '
                                    GROUP BY PersonnelTypeCode , PositionCode ASC
                                    ');

                            foreach ($result->result() as $PERSONNEL) {
                            ?>
                                <tr>
                                    <td class="page-content" style="text-align: center;"><img src="assets/personnel/img/<?= $PERSONNEL->ImagePersonnel; ?>" alt="" width="100%"></td>
                                    <td style="padding-top: 40px;"><?= $PERSONNEL->PREFIX_NAME; ?></td>
                                    <td style="padding-top: 40px;"><?= $PERSONNEL->PersonnelNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $PERSONNEL->PersonnelLastNameThai; ?></td>
                                    <td style="padding-top: 40px;"><?= $PERSONNEL->PERSONNEL_STATUS_NAME; ?></td>
                                    <td style="text-align: center; padding-top: 40px;"><a href="?PersonnelID=<?= $PERSONNEL->PersonnelID ?>&&JurisdictionCode=<?= $PERSONNEL->JurisdictionCode ?>&&PersonnelTypeCode=<?= $PERSONNEL->PersonnelTypeCode ?>&&PositionCode=<?= $PERSONNEL->PositionCode ?>&&ShowDetail=" class="btn btn-primary"><i class="bi bi-card-list"></i></a></td>
                                    <td style="text-align: center; padding-top: 40px;">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $PERSONNEL->PersonnelID; ?>"><i class=" bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else if (isset($_GET['JurisdictionCode']) && isset($_GET['PersonnelTypeCode']) && isset($_GET['PersonnelTypeCode']) && isset($_GET['ShowDetail'])) {  ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title" style="padding-left: 25px;">
                                <i class="bi bi-card-list"></i> รายละเอียดข้อมูล &nbsp;&nbsp;
                                <a href="?JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-secondary btn-sm" data-mdb-ripple-color="dark">ย้อนกลับ</a>

                            </h3>
                        </div>
                        <?php
                        $result = $this->db->query('SELECT * FROM PERSONNEL
                            INNER JOIN CLS_CITIZEN_ID_TYPE ON PERSONNEL.PersonnelPersonalIDTypeCode =  CLS_CITIZEN_ID_TYPE.CITIZEN_ID_TYPE_CODE
                            INNER JOIN CLS_JURISDICTION ON PERSONNEL.JurisdictionCode = CLS_JURISDICTION.JURISDICTION_CODE
                            INNER JOIN CLS_PERSONNEL_STATUS ON PERSONNEL.PersonnelStatusCode = CLS_PERSONNEL_STATUS.PERSONNEL_STATUS_CODE
                            INNER JOIN CLS_PERSONNEL_TYPE ON PERSONNEL.PersonnelTypeCode = CLS_PERSONNEL_TYPE.PERSONNEL_TYPE_CODE
                            INNER JOIN CLS_POSITION ON PERSONNEL.PositionCode = CLS_POSITION.POSITION_CODE
                            INNER JOIN CLS_POSITION_LEVEL ON PERSONNEL.PositionLevelCode = CLS_POSITION_LEVEL.POSITION_LEVEL_CODE
                            INNER JOIN CLS_PREFIX ON PERSONNEL.PersonnelPrefixCode = CLS_PREFIX.PREFIX_CODE
                            INNER JOIN CLS_GENDER ON PERSONNEL.PersonnelGenderCode = CLS_GENDER.GENDER_CODE
                            INNER JOIN CLS_NATIONALITY ON PERSONNEL.PersonnelNationalityCode = CLS_NATIONALITY.NATIONALITY_CODE
                            INNER JOIN CLS_RACE ON PERSONNEL.PersonnelRaceCode = CLS_RACE.RACE_CODE
                            INNER JOIN CLS_RELIGION ON PERSONNEL.PersonnelReligionCode = CLS_RELIGION.RELIGION_CODE
                            INNER JOIN CLS_BLOOD ON PERSONNEL.PersonnelBloodCode = CLS_BLOOD.BLOOD_CODE
                            WHERE DeleteStatus = 0 AND PersonnelID = "' . $_GET['PersonnelID'] . '"');
                        foreach ($result->result() as $PERSONNEL_DETAIL) {
                        ?>
                            <div class="col">
                                <h5 style="float: left; padding: 15px;" class="card-title">
                                </h5>
                            </div>
                    </div>
                    <div class="row">
                        <?php if ($PERSONNEL_DETAIL->ImagePersonnel != '') { ?>
                            <div class="col-2" style="padding-bottom: 0px; padding-left: 70px; padding-top: 0px;">
                                <div class="card page-detail" style="width: 170px;">
                                    <img style=" text-align: center; padding: 15px;" src="assets/personnel/img/<?= $PERSONNEL_DETAIL->ImagePersonnel; ?>" alt="" width="100%" style="padding-top: 20px;">
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-2" style="padding-bottom: 8px; padding-left: 60px; padding-top: 60px;">
                                <div class="card">
                                    <h6 style="text-align: center; padding: 15px;">
                                        - ไม่พบรูปภาพ -
                                    </h6>
                                </div>
                            </div>
                        <?php } ?>
                        <div class=" col-10" style="padding-top: 0px; padding-left: 40px; padding-right: 60px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                        ชื่อ-นามสกุล : <?= $PERSONNEL_DETAIL->PREFIX_NAME . $PERSONNEL_DETAIL->PersonnelNameThai . ' ' . $PERSONNEL_DETAIL->PersonnelLastNameThai ?> <?php if ($PERSONNEL_DETAIL->PersonnelNameEnglish != NULL && $PERSONNEL_DETAIL->PersonnelLastNameEnglish != NULL) {
                                                                                                                                                                                            echo ' (' . $PERSONNEL_DETAIL->PersonnelNameEnglish . ' ' . $PERSONNEL_DETAIL->PersonnelLastNameEnglish . ')';
                                                                                                                                                                                        } ?>
                                        <a style="float: right;" href="edit-forms-personnel-main?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </h5>

                                    <div class="row">
                                        <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                            <label style="padding-left: 25px;"> หน่วยงานต้นสังกัด: &nbsp;<?= $PERSONNEL_DETAIL->JURISDICTION_NAME; ?></label><br>
                                            <label style="padding-left: 25px;"> ประเภทบุคลากร: &nbsp;<?= $PERSONNEL_DETAIL->PERSONNEL_TYPE_NAME; ?></label><br>
                                            <label style="padding-left: 25px;"> ตำแหน่ง: &nbsp;<?= $PERSONNEL_DETAIL->POSITION_NAME; ?></label><br>
                                            <label style="padding-left: 25px;"> ระดับตำแหน่ง: &nbsp;<?= $PERSONNEL_DETAIL->POSITION_LEVEL_NAME; ?></label><br>
                                        </div>
                                        <div class="col-6" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">

                                            <label style="padding-left: 25px;"> วันที่ดำรงตำแหน่ง: &nbsp;<?= DateThai($PERSONNEL_DETAIL->PositionStartDate); ?></label><br>
                                            <label style="padding-left: 25px;"> สถานนะปฎิบัติราชการ: &nbsp;<?= $PERSONNEL_DETAIL->PERSONNEL_STATUS_NAME; ?></label><br>
                                            <label style="padding-left: 25px;"> วันที่บรรจุ: &nbsp;<?= DateThai($PERSONNEL_DETAIL->PersonnelStartDate); ?></label><br>
                                            <label style="padding-left: 25px;"> วันเกษียณ: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelRetireDate == '0000-00-00') {
                                                                                                        echo '-';
                                                                                                    } else {
                                                                                                        echo DateThai($PERSONNEL_DETAIL->PersonnelRetireDate);
                                                                                                    } ?></label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class=" col-12" style="padding-top: 0px; padding-left: 60px; padding-right: 40px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                            ข้อมูลบุคคล
                                            <a style="float: right;" href="edit-forms-personnel-person?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </h5>
                                        <div class="row">
                                            <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                <label style="padding-left: 25px;"> ประเภทบัตรประจำตัว: &nbsp;<?= $PERSONNEL_DETAIL->CITIZEN_ID_TYPE_NAME ?></label><br>
                                                <label style="padding-left: 25px;"> หมายเลขบัตร: &nbsp;<?= $PERSONNEL_DETAIL->PersonnelPersonalID ?></label><br>
                                                <label style="padding-left: 25px;"> เลขที่หนังสือเดินทาง: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelPassportNumber == NULL) {
                                                                                                                    echo '-';
                                                                                                                } else echo $PERSONNEL_DETAIL->PersonnelPassportNumber; ?></label><br>

                                            </div>
                                            <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                <label style="padding-left: 25px;"> สัญชาติ: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelNationalityCode == NULL) {
                                                                                                        echo '-';
                                                                                                    } else echo $PERSONNEL_DETAIL->NATIONALITY_NAME; ?></label><br>
                                                <label style="padding-left: 25px;"> วันที่เกิด: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelBirthDate == NULL) {
                                                                                                            echo '-';
                                                                                                        } else echo DateThai($PERSONNEL_DETAIL->PersonnelBirthDate); ?></label><br>
                                                <label style="padding-left: 25px;"> เพศ: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelGenderCode == NULL) {
                                                                                                    echo '-';
                                                                                                } else echo $PERSONNEL_DETAIL->GENDER_NAME; ?></label><br>

                                            </div>
                                            <div class="col-4" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">

                                                <label style="padding-left: 25px;"> เชื้อชาติ: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelRaceCode == NULL) {
                                                                                                            echo '-';
                                                                                                        } else echo $PERSONNEL_DETAIL->RACE_NAME; ?></label><br>

                                                <label style="padding-left: 25px;"> ศาสนา: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelReligionCode == NULL) {
                                                                                                        echo '-';
                                                                                                    } else echo $PERSONNEL_DETAIL->RELIGION_NAME; ?></label><br>
                                                <label style="padding-left: 25px;"> กลุ่มเลือด: &nbsp;<?php if ($PERSONNEL_DETAIL->PersonnelBloodCode == NULL) {
                                                                                                            echo '-';
                                                                                                        } else echo $PERSONNEL_DETAIL->BLOOD_NAME; ?></label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลที่อยู่ (ตามทะเบียนบ้าน)
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 20px;">บ้านเลขที่
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressHouseNumber == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressHouseNumber;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">หมู่ที่
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressMoo == "0") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressMoo;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ถนน
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressStreet == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressStreet;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ซอย
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressSoi == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressSoi;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ตรอก
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressTrok == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressTrok;
                                                        } ?>
                                                    </label><br>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $PERSONNEL_DETAIL->PersonnelOfficialAddressSubdistrictCode . '"');
                                                    foreach ($result->result() as $SUBDISTRICT) {
                                                        $SUBDISTRICT_NAME_2 = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                    }
                                                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $PERSONNEL_DETAIL->PersonnelOfficialAddressDistrictCode . '"');
                                                    foreach ($result->result() as $DISTRICT) {
                                                        $DISTRICT_NAME_2 = $DISTRICT->DISTRICT_NAME;
                                                    }
                                                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $PERSONNEL_DETAIL->PersonnelOfficialAddressProvinceCode . '"');
                                                    foreach ($result->result() as $PROVINCE) {
                                                        $PROVINCE_NAME_2 = $PROVINCE->PROVINCE_NAME;
                                                    }
                                                    ?>
                                                    <label style="padding-left: 20px;">ตำบล
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressSubdistrictCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $SUBDISTRICT_NAME_2;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">อำเภอ
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressDistrictCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $DISTRICT_NAME_2;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">จังหวัด
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressProvinceCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PROVINCE_NAME_2;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressPostcode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressPostcode;
                                                        } ?>
                                                    </label><br>
                                                    <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelOfficialAddressPhoneNumber == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelOfficialAddressPhoneNumber;
                                                        } ?>
                                                    </label><br>

                                                    <label style="padding-left: 20px;">อีเมลล์
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelEmail == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelEmail;
                                                        } ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลที่อยู่ (ปัจจุบัน)
                                                    <a style="float: right;" href="edit-forms-personnel-address?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 20px;">บ้านเลขที่
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressHouseNumber == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressHouseNumber;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">หมู่ที่
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressMoo == "0") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressMoo;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ถนน
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressStreet == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressStreet;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ซอย
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressSoi == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressSoi;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">ตรอก
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressTrok == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressTrok;
                                                        } ?>
                                                    </label><br>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_CODE = "' . $PERSONNEL_DETAIL->PersonnelCurrentAddressSubdistrictCode . '"');
                                                    foreach ($result->result() as $SUBDISTRICT) {
                                                        $SUBDISTRICT_NAME = $SUBDISTRICT->SUBDISTRICT_NAME;
                                                    }
                                                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_CODE = "' . $PERSONNEL_DETAIL->PersonnelCurrentAddressDistrictCode . '"');
                                                    foreach ($result->result() as $DISTRICT) {
                                                        $DISTRICT_NAME = $DISTRICT->DISTRICT_NAME;
                                                    }
                                                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_CODE = "' . $PERSONNEL_DETAIL->PersonnelCurrentAddressProvinceCode . '"');
                                                    foreach ($result->result() as $PROVINCE) {
                                                        $PROVINCE_NAME = $PROVINCE->PROVINCE_NAME;
                                                    }
                                                    ?>
                                                    <label style="padding-left: 20px;">ตำบล
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressSubdistrictCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $SUBDISTRICT_NAME;
                                                        } ?>
                                                    </label>

                                                    <label style="padding-left: 10px;">อำเภอ
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressDistrictCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $DISTRICT_NAME;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">จังหวัด
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressProvinceCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PROVINCE_NAME;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 10px;">รหัสไปรษณีย์
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentAddressPostcode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentAddressPostcode;
                                                        } ?>
                                                    </label><br>
                                                    <label style="padding-left: 20px;">หมายเลขโทรศัพท์
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelCurrentPhoneNumber == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->PersonnelCurrentPhoneNumber;
                                                        } ?>
                                                    </label><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลการว่าจ้าง
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 20px;">เลขที่สัญญา:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractNumber == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->ContractNumber;
                                                        } ?>
                                                    </label>&nbsp;&nbsp;
                                                    <label style="padding-left: 20px;">จำนวนครั้งที่ทำสัญญา:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractTimes == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->ContractTimes;
                                                        } ?>
                                                    </label><br>
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE WHERE CONTRACT_TYPE_CODE = "' . $PERSONNEL_DETAIL->ContractTypeCode . '"');
                                                    foreach ($result->result() as $CONTRACT_TYPE) {
                                                        $CONTRACT_TYPE_NAME = $CONTRACT_TYPE->CONTRACT_TYPE_NAME;
                                                    }
                                                    ?>
                                                    <label style="padding-left: 20px;">ลักษณะการจ้าง:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractTypeCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $CONTRACT_TYPE_NAME;
                                                        } ?>
                                                    </label><br>
                                                    <label style="padding-left: 20px;">ผ่านการจ้างมาแล้ว:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractYear == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->ContractYear . ' ปี';
                                                        } ?>

                                                    </label><br>
                                                    <label style="padding-left: 20px;">วันที่เริ่มต้นสัญญา:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractStartDate == "" || $PERSONNEL_DETAIL->ContractStartDate == "0000-00-00") {
                                                            echo '-';
                                                        } else {
                                                            echo DateThai($PERSONNEL_DETAIL->ContractStartDate);
                                                        } ?>
                                                    </label>&nbsp;&nbsp;
                                                    <label style="padding-left: 20px;">วันที่สิ้นสุดสัญญา:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->ContractEndDate == "" || $PERSONNEL_DETAIL->ContractEndDate == "0000-00-00") {
                                                            echo '-';
                                                        } else {
                                                            echo DateThai($PERSONNEL_DETAIL->ContractEndDate);
                                                        } ?>
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    เงินเดือนและเงินอื่นๆ
                                                    <a style="float: right;" href="edit-forms-personnel-contract?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <?php
                                                    $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE WHERE SALARY_TYPE_CODE = "' . $PERSONNEL_DETAIL->SalaryTypeCode . '"');
                                                    foreach ($result->result() as $SALARY_TYPE) {
                                                        $SALARY_TYPE_NAME = $SALARY_TYPE->SALARY_TYPE_NAME;
                                                    }
                                                    ?>
                                                    <label style="padding-left: 20px;">ประเภทเงินงบประมาณ:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->SalaryTypeCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $SALARY_TYPE_NAME;
                                                        } ?>
                                                    </label>&nbsp;&nbsp;
                                                    <label style="padding-left: 20px;">เงินเดือนปัจุบัน:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->CurrentSalary == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->CurrentSalary;
                                                        } ?>
                                                    </label>
                                                    <br>
                                                    <label style="padding-left: 20px;">เงินวิทยฐานะ:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->AcademicSalary == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->AcademicSalary;
                                                        } ?>
                                                    </label><br>
                                                    <label style="padding-left: 20px;">เงินค่าตอบแทน:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->CompensationSalary == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->CompensationSalary;
                                                        } ?>
                                                    </label><br>
                                                    <label style="padding-left: 20px;">เงินประจำตำแหน่ง:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->EmolumentsSalary == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->EmolumentsSalary;
                                                        } ?>
                                                    </label><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    ข้อมูลความสามารถพิเศษ
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 20px;">ความสามารถพิเศษ:&nbsp;
                                                        <?php
                                                        $result = $this->db->query('SELECT * FROM CLS_TALENT WHERE TALENT_CODE = "' . $PERSONNEL_DETAIL->PersonnelTalentCode . '"');
                                                        foreach ($result->result() as $TALENT) {
                                                            $TALENT_NAME = $TALENT->TALENT_NAME;
                                                        }
                                                        ?>
                                                        <?php if ($PERSONNEL_DETAIL->PersonnelTalentCode == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $TALENT_NAME;
                                                        } ?>
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 style="text-align: left; padding-left: 25px; padding-top: 25px;" class="card-title">
                                                    <a style="float: right;" href="edit-forms-personnel-talent?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <br>
                                                <div class="col-" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <label style="padding-left: 20px;">ปีที่เก็บข้อมูล:&nbsp;
                                                        <?php if ($PERSONNEL_DETAIL->EntryYear == "") {
                                                            echo '-';
                                                        } else {
                                                            echo $PERSONNEL_DETAIL->EntryYear;
                                                        } ?>
                                                    </label>
                                                    <label style="padding-left: 20px;">
                                                        <?php if ($PERSONNEL_DETAIL->EntryTimes == "") {
                                                            echo '-';
                                                        } else {
                                                            if ($PERSONNEL_DETAIL->EntryTimes == 1) {
                                                                echo 'รอบที่ 1 ข้อมูล ณ วันที่ 10 มิถุนายน';
                                                            } else {
                                                                echo 'รอบที่ 2 ข้อมูล ณ วันที่ 10 พฤศจิกายน';
                                                            }
                                                        } ?>
                                                    </label>
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
                                                    ข้อมูลวุฒิการศึกษา
                                                    <a style="float: right;" href="personnel-education?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="col-4" scope="col">ระดับการศึกษา</td>
                                                                <td class="col-4" scope="col">กลุ่มวิชาเอก</td>
                                                                <td class="col-4" scope="col">วุฒิการศึกษา</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $result = $this->db->query('SELECT * 
                                                                FROM PERSONNEL_EDUCATION_DEGREE 
                                                                INNER JOIN CLS_EDUCATION_LEVEL ON PERSONNEL_EDUCATION_DEGREE.EducationLevelCode  = CLS_EDUCATION_LEVEL.EDUCATION_LEVEL_CODE 
                                                                INNER JOIN CLS_MAJOR ON PERSONNEL_EDUCATION_DEGREE.EducationMajorCode  = CLS_MAJOR.MAJOR_CODE 
                                                                INNER JOIN CLS_DEGREE ON PERSONNEL_EDUCATION_DEGREE.EducationDegreeCode  = CLS_DEGREE.DEGREE_CODE 
                                                                WHERE DeleteStatus = 0 AND PersonnelID = "' . $PERSONNEL_DETAIL->PersonnelID . '"  
                                                                ');
                                                            if ($result->result() != TRUE) {
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                foreach ($result->result() as $PERSONNEL_EDUCATION_DEGREE) {
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_EDUCATION_DEGREE->EducationLevelCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_EDUCATION_DEGREE->EDUCATION_LEVEL_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_EDUCATION_DEGREE->EducationMajorCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_EDUCATION_DEGREE->MAJOR_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_EDUCATION_DEGREE->EducationDegreeCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_EDUCATION_DEGREE->DEGREE_NAME;
                                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
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
                                                    ข้อมูลหน้าที่เพิ่มเติม
                                                    <a style="float: right;" href="personnel-position?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="col-4" scope="col">ตำแหน่งเพิ่มเติม</td>
                                                                <td class="col-4" scope="col">กลุ่ม/หมวดหน้าที่เพิ่มเติม</td>
                                                                <td class="col-4" scope="col">วันที่เริ่มปฎิบัติหน้าที่</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $result = $this->db->query('SELECT * 
                                                                FROM PERSONNEL_ADDITIONAL_POSITION 
                                                                INNER JOIN CLS_DEPARTMENT ON PERSONNEL_ADDITIONAL_POSITION.AdditionalDepartmentCode  = CLS_DEPARTMENT.DEPARTMENT_CODE 
                                                                WHERE DeleteStatus = 0 AND PersonnelID = "' . $PERSONNEL_DETAIL->PersonnelID . '"  AND JurisdictionCode = ' . $PERSONNEL_DETAIL->JurisdictionCode . '
                                                                ');
                                                            if ($result->result() != TRUE) {
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                foreach ($result->result() as $PERSONNEL_ADDITIONAL_POSITION) {

                                                                ?>

                                                                    <tr>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ADDITIONAL_POSITION->AdditionalPosition == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ADDITIONAL_POSITION->AdditionalPosition;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ADDITIONAL_POSITION->AdditionalDepartmentCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ADDITIONAL_POSITION->DEPARTMENT_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ADDITIONAL_POSITION->AdditionalDutyDate == "0000-00-00") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo DateThai($PERSONNEL_ADDITIONAL_POSITION->AdditionalDutyDate);
                                                                            } ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
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
                                                    ข้อมูลการช่วยราชการ
                                                    <a style="float: right;" href="personnel-assistance?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="col-4" scope="col">ประเภทการช่วยราชการ</td>
                                                                <td class="col-4" scope="col">หน่วยงาน</td>
                                                                <td class="col-2" scope="col">วันที่เริ่ม</td>
                                                                <td class="col-2" scope="col">วันที่สิ้นสุด</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $result = $this->db->query('SELECT *
                                                                FROM PERSONNEL_ASSISTANCE 
                                                                INNER JOIN CLS_ASSISTANCE_TYPE ON PERSONNEL_ASSISTANCE.AssistanceTypeCode  = CLS_ASSISTANCE_TYPE.ASSISTANCE_TYPE_CODE 
                                                                WHERE DeleteStatus = 0 AND PersonnelID = "' . $PERSONNEL_DETAIL->PersonnelID . '"  AND JurisdictionCode = ' . $PERSONNEL_DETAIL->JurisdictionCode . '
                                                                ');
                                                            if ($result->result() != TRUE) {
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center;" colspan="4">- ไม่พบข้อมูล -</td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                foreach ($result->result() as $PERSONNEL_ASSISTANCE) {

                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ASSISTANCE->AssistanceTypeCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ASSISTANCE->ASSISTANCE_TYPE_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ASSISTANCE->AssistanceOrganizationName == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ASSISTANCE->AssistanceOrganizationName;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ASSISTANCE->AssistanceStartDate == "0000-00-00") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo DateThai($PERSONNEL_ASSISTANCE->AssistanceStartDate);
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ASSISTANCE->AssistanceEndDate == "0000-00-00") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo DateThai($PERSONNEL_ASSISTANCE->AssistanceEndDate);
                                                                            } ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
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
                                                    ข้อมูลวิทยฐานะ
                                                    <a style="float: right;" href="personnel-academic?PersonnelID=<?= $_GET['PersonnelID'] ?>&&JurisdictionCode=<?= $_GET['JurisdictionCode'] ?>&&PersonnelTypeCode=<?= $_GET['PersonnelTypeCode'] ?>&&PositionCode=<?= $_GET['PositionCode'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                </h5>
                                                <div class="col-12" style="text-align: left; padding-left: 25px; padding-bottom: 5px;">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <td class="col-4" scope="col">วิทยาฐานะและตำแหน่งวิชาการ</td>
                                                                <td class="col-4" scope="col">สาขาที่ยื่นขอ</td>
                                                                <td class="col-4" scope="col">วันที่ได้วิทยฐานะ</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $result = $this->db->query('SELECT * 
                                                                FROM PERSONNEL_ACADEMIC 
                                                                INNER JOIN CLS_ACADEMIC_STANDING ON PERSONNEL_ACADEMIC.AcademicStandingCode  = CLS_ACADEMIC_STANDING.ACADEMIC_STANDING_CODE 
                                                                INNER JOIN CLS_PROGRAM ON PERSONNEL_ACADEMIC.AcademicProgramCode  = CLS_PROGRAM.PROGRAM_CODE 
                                                                WHERE DeleteStatus = 0 AND PersonnelID = "' . $PERSONNEL_DETAIL->PersonnelID . '"  AND JurisdictionCode = ' . $PERSONNEL_DETAIL->JurisdictionCode . '
                                                                ');
                                                            if ($result->result() != TRUE) {
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center;" colspan="3">- ไม่พบข้อมูล -</td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                foreach ($result->result() as $PERSONNEL_ACADEMIC) {

                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ACADEMIC->AcademicStandingCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ACADEMIC->ACADEMIC_STANDING_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ACADEMIC->AcademicProgramCode == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $PERSONNEL_ACADEMIC->PROGRAM_NAME;
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($PERSONNEL_ACADEMIC->AcademicDate == "") {
                                                                                echo '-';
                                                                            } else {
                                                                                echo DateThai($PERSONNEL_ACADEMIC->AcademicDate);
                                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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
<?php } ?>


</div><!-- End Recent Sales -->
</main><!-- End #main -->


<?php
if (isset($_GET['JurisdictionCode']) && isset($_GET['PersonnelTypeCode']) && isset($_GET['PositionCode'])) {
    $result = $this->db->query('SELECT *
    FROM PERSONNEL
    WHERE DeleteStatus = 0 AND JurisdictionCode = ' . $_GET['JurisdictionCode'] . '
    AND PersonnelTypeCode = ' . $_GET['PersonnelTypeCode'] . '
    AND PositionCode = ' . $_GET['PositionCode'] . '
    GROUP BY PersonnelTypeCode , PositionCode ASC
    ');

    foreach ($result->result() as $PERSONNEL) {
?>
        <div class=" modal fade" id="Delete<?= $PERSONNEL->PersonnelID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <a href="<?php echo base_url('delete-personnel/' . $PERSONNEL->PersonnelID  . '/' . $PERSONNEL->JurisdictionCode  . '/' . $PERSONNEL->PersonnelTypeCode . '/' . $PERSONNEL->PositionCode); ?>" class="btn btn-danger">ลบ</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>