<?php

class Personnel_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }
    public function add_personnel()
    {
        $config['upload_path']          = 'assets/personnel/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImagePersonnel_' . $_POST['PersonnelPersonalID'] . date('Ymd');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImagePersonnel')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImagePersonnel']['name'], -4);
        $new_name = 'ImagePersonnel_' . $_POST['PersonnelPersonalID'] . date('Ymd') . $type;

        $data = [

            'PersonnelID' => $_POST['PersonnelPersonalIDTypeCode'] . $_POST['PersonnelPersonalID'],
            'EntryYear' => $this->input->post('EntryYear'),
            'EntryTimes' => $this->input->post('EntryTimes'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'ImagePersonnel' => $new_name,
            'PersonnelPersonalIDTypeCode' => $this->input->post('PersonnelPersonalIDTypeCode'),
            'PersonnelPersonalID' => base64_encode($this->input->post('PersonnelPersonalID')),
            'PersonnelPassportNumber' => $this->input->post('PersonnelPassportNumber'),
            'PersonnelPrefixCode' => $this->input->post('PersonnelPrefixCode'),
            'PersonnelNameThai' => $this->input->post('PersonnelNameThai'),
            'PersonnelLastNameThai' => $this->input->post('PersonnelLastNameThai'),
            'PersonnelGenderCode' => $this->input->post('PersonnelGenderCode'),
            'PersonnelNationalityCode' => $this->input->post('PersonnelNationalityCode'),
            'PersonnelRaceCode' => $this->input->post('PersonnelRaceCode'),
            'PersonnelReligionCode' => $this->input->post('PersonnelReligionCode'),
            'PersonnelBirthDate' => $this->input->post('PersonnelBirthDate'),
            'PersonnelBloodCode' => $this->input->post('PersonnelBloodCode')

        ];

        $result = $this->db->insert('PERSONNEL', $data);
        return $result;
    }



    //Update Data Student
    public function update_personnel_main($PersonnelID, $ImagePersonnel)
    {
        $config['upload_path']          = 'assets/personnel/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = $ImagePersonnel;

        copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.jpg');
        unlink($config['upload_path'] . $config['file_name']);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImagePersonnel')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            unlink($config['upload_path'] . 'logoold.jpg');
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $data = [

            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'PersonnelPrefixCode' => $this->input->post('PersonnelPrefixCode'),
            'PersonnelNameThai' => $this->input->post('PersonnelNameThai'),
            'PersonnelLastNameThai' => $this->input->post('PersonnelLastNameThai'),
            'PersonnelNameEnglish' => $this->input->post('PersonnelNameEnglish'),
            'PersonnelLastNameEnglish' => $this->input->post('PersonnelLastNameEnglish')

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //Update Data Personnel Person
    public function update_personnel_person($PersonnelID)
    {
        $data = [

            'PersonnelPersonalIDTypeCode' => $this->input->post('PersonnelPersonalIDTypeCode'),
            'PersonnelPersonalID' => base64_encode($this->input->post('PersonnelPersonalID')),
            'PersonnelPassportNumber' => $this->input->post('PersonnelPassportNumber'),
            'PersonnelGenderCode' => $this->input->post('PersonnelGenderCode'),
            'PersonnelNationalityCode' => $this->input->post('PersonnelNationalityCode'),
            'PersonnelRaceCode' => $this->input->post('PersonnelRaceCode'),
            'PersonnelReligionCode' => $this->input->post('PersonnelReligionCode'),
            'PersonnelBirthDate' => $this->input->post('PersonnelBirthDate'),
            'PersonnelBloodCode' => $this->input->post('PersonnelBloodCode')
        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }


    public function update_personnel_address($PersonnelID)
    {
        $data = [


            //ที่อยู่ตามทะเบียนบ้าน
            'PersonnelOfficialAddressHouseNumber' => $this->input->post('PersonnelOfficialAddressHouseNumber'),
            'PersonnelOfficialAddressMoo' => $this->input->post('PersonnelOfficialAddressMoo'),
            'PersonnelOfficialAddressStreet' => $this->input->post('PersonnelOfficialAddressStreet'),
            'PersonnelOfficialAddressSoi' => $this->input->post('PersonnelOfficialAddressSoi'),
            'PersonnelOfficialAddressTrok' => $this->input->post('PersonnelOfficialAddressTrok'),
            'PersonnelOfficialAddressSubdistrictCode' => $this->input->post('PersonnelOfficialAddressSubdistrictCode'),
            'PersonnelOfficialAddressDistrictCode' => $this->input->post('PersonnelOfficialAddressDistrictCode'),
            'PersonnelOfficialAddressProvinceCode' => $this->input->post('PersonnelOfficialAddressProvinceCode'),
            'PersonnelOfficialAddressPostcode' => $this->input->post('PersonnelOfficialAddressPostcode'),
            'PersonnelOfficialAddressPhoneNumber' => $this->input->post('PersonnelOfficialAddressPhoneNumber'),

            //ที่อยู่ปัจจุบัน
            'PersonnelCurrentAddressHouseNumber' => $this->input->post('PersonnelCurrentAddressHouseNumber'),
            'PersonnelCurrentAddressMoo' => $this->input->post('PersonnelCurrentAddressMoo'),
            'PersonnelCurrentAddressStreet' => $this->input->post('PersonnelCurrentAddressStreet'),
            'PersonnelCurrentAddressSoi' => $this->input->post('PersonnelCurrentAddressSoi'),
            'PersonnelCurrentAddressTrok' => $this->input->post('PersonnelCurrentAddressTrok'),
            'PersonnelCurrentAddressSubdistrictCode' => $this->input->post('PersonnelCurrentAddressSubdistrictCode'),
            'PersonnelCurrentAddressDistrictCode' => $this->input->post('PersonnelCurrentAddressDistrictCode'),
            'PersonnelCurrentAddressProvinceCode' => $this->input->post('PersonnelCurrentAddressProvinceCode'),
            'PersonnelCurrentAddressPostcode' => $this->input->post('PersonnelCurrentAddressPostcode'),
            'PersonnelCurrentPhoneNumber' => $this->input->post('PersonnelCurrentPhoneNumber'),
            //อีเมลล์
            'PersonnelEmail' => $this->input->post('PersonnelEmail')
        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //Update Data Personnel Contract
    public function update_personnel_contract($PersonnelID)
    {
        $data = [

            //ข้อมูลการว่าจ้าง
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),

            //ข้อมูลเงินเดือน
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary')

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //Update Data Personnel tatent
    public function update_personnel_talent($PersonnelID)
    {
        $data = [

            'PersonnelTalentCode' => $this->input->post('PersonnelTalentCode'),
            'EntryYear' => $this->input->post('EntryYear'),
            'EntryTimes' => $this->input->post('EntryTimes')

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //ADD Data Personnel Education
    public function add_personnel_education($PersonnelID)
    {
        $data = [

            'PersonnelID' => $PersonnelID,
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'EducationMajorCode' => $this->input->post('EducationMajorCode'),
            'EducationProgramCode' => $this->input->post('EducationProgramCode'),
            'EducationDegreeCode' => $this->input->post('EducationDegreeCode')

        ];

        $result = $this->db->insert('PERSONNEL_EDUCATION_DEGREE', $data);
        return $result;
    }

    //Delete Data personnel
    public function delete_personnel($PersonnelID)
    {
        $data = [

            'PersonnelID' => Date('Ymd') . rand(1, 9999),
            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //Delete Data Form personnel Education
    public function delete_personnel_education($PersonnelID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)
            ->where('EducationLevelCode', $EducationLevelCode)
            ->where('EducationMajorCode', $EducationMajorCode)
            ->where('EducationDegreeCode', $EducationDegreeCode)
            ->update('PERSONNEL_EDUCATION_DEGREE', $data);
        return $result;
    }

    //Update Data personnel Education
    public function update_personnel_education($PersonnelID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $data = [

            'EducationProgramCode' => $this->input->post('EducationProgramCode')

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)
            ->where('EducationLevelCode', $EducationLevelCode)
            ->where('EducationMajorCode', $EducationMajorCode)
            ->where('EducationDegreeCode', $EducationDegreeCode)
            ->update('PERSONNEL_EDUCATION_DEGREE', $data);
        return $result;
    }

    //ADD Data personnel Position
    public function add_personnel_position($PersonnelID, $JurisdictionCode)
    {
        if ($_FILES['AdditionalDocumentURL']['name'] != "") {

            $config['upload_path']          = 'assets/personnel/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = 'Document_' . $JurisdictionCode . $PersonnelID . $_POST['AdditionalDepartmentCode'] . $_POST['AdditionalDutyDate'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $type = substr($_FILES['AdditionalDocumentURL']['name'], -4);
            $new_name = 'Document_' . $JurisdictionCode . $PersonnelID . $_POST['AdditionalDepartmentCode'] . $_POST['AdditionalDutyDate'] . $type;

            $data = [

                'PersonnelID' => $PersonnelID,
                'JurisdictionCode' => $JurisdictionCode,
                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment'),
                'AdditionalDocumentURL' => $new_name

            ];

            $result = $this->db->insert('PERSONNEL_ADDITIONAL_POSITION', $data);
            return $result;
        } else {

            $data = [

                'PersonnelID' => $PersonnelID,
                'JurisdictionCode' => $JurisdictionCode,
                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment'),

            ];

            $result = $this->db->insert('PERSONNEL_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }

    //Update Data Personnel Position
    public function update_personnel_position($PersonnelID, $JurisdictionCode, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL)
    {
        if ($AdditionalDocumentURL == "") {
            if ($_FILES['AdditionalDocumentURL']['name'] != "") {

                $config['upload_path']          = 'assets/personnel/document/';
                $config['allowed_types']        = 'doc|pdf';
                $config['max_size']             = 50000;
                $config['file_name']            = 'Document_' . $JurisdictionCode . $PersonnelID . $AdditionalDepartmentCode . $AdditionalDutyDate;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                    echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
                } else {
                    echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
                }

                $type = substr($_FILES['AdditionalDocumentURL']['name'], -4);
                $new_name = 'Document_' . $JurisdictionCode . $PersonnelID . $AdditionalDepartmentCode . $AdditionalDutyDate . $type;

                $data = [

                    'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                    'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                    'AdditionalComment' => $this->input->post('AdditionalComment'),
                    'AdditionalDocumentURL' => $new_name

                ];

                $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
                return $result;
            } else {

                $data = [

                    'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                    'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                    'AdditionalComment' => $this->input->post('AdditionalComment')

                ];

                $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
                return $result;
            }
        } else {

            $config['upload_path']          = 'assets/personnel/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = $AdditionalDocumentURL;

            copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.pdf');
            unlink($config['upload_path'] . $config['file_name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                copy($config['upload_path'] . 'logoold.pdf', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                unlink($config['upload_path'] . 'logoold.pdf');
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $data = [

                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment')

            ];

            $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }

    //Delete Data Form personnel Position
    public function delete_personnel_position($PersonnelID, $JurisdictionCode, $AdditionalDepartmentCode, $AdditionalDutyDate)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
        return $result;
    }

    //ADD Data personnel Assistance
    public function add_personnel_assistance($PersonnelID, $JurisdictionCode)
    {
        if ($_FILES['AssistanceDocumentURL']['name'] != "") {

            $config['upload_path']          = 'assets/personnel/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = 'Document_' . $JurisdictionCode . $PersonnelID . $_POST['AssistanceTypeCode'] . $_POST['AssistanceStartDate'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $type = substr($_FILES['AssistanceDocumentURL']['name'], -4);
            $new_name = 'Document_' . $JurisdictionCode . $PersonnelID . $_POST['AssistanceTypeCode'] . $_POST['AssistanceStartDate'] . $type;

            $data = [

                'PersonnelID' => $PersonnelID,
                'JurisdictionCode' => $JurisdictionCode,
                'AssistanceTypeCode' => $this->input->post('AssistanceTypeCode'),
                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),
                'AssistanceDocumentURL' => $new_name

            ];

            $result = $this->db->insert('PERSONNEL_ASSISTANCE', $data);
            return $result;
        } else {

            $data = [

                'PersonnelID' => $PersonnelID,
                'JurisdictionCode' => $JurisdictionCode,
                'AssistanceTypeCode' => $this->input->post('AssistanceTypeCode'),
                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),

            ];

            $result = $this->db->insert('PERSONNEL_ASSISTANCE', $data);
            return $result;
        }
    }



    //Update Data personnel assistance
    public function update_personnel_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL)
    {
        if ($AssistanceDocumentURL == "") {
            if ($_FILES['AssistanceDocumentURL']['name'] != "") {
                $config['upload_path']          = 'assets/personnel/document/';
                $config['allowed_types']        = 'doc|pdf';
                $config['max_size']             = 50000;
                $config['file_name']            = 'Document_' . $JurisdictionCode . $PersonnelID . $AssistanceTypeCode . $AssistanceStartDate;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                    echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
                } else {
                    echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
                }


                $type = substr($_FILES['AssistanceDocumentURL']['name'], -4);
                $new_name = 'Document_' . $JurisdictionCode . $PersonnelID . $AssistanceTypeCode . $AssistanceStartDate . $type;

                $data = [

                    'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                    'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                    'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                    'AssistanceReason' => $this->input->post('AssistanceReason'),
                    'AssistanceDocumentURL' => $new_name

                ];

                $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('PERSONNEL_ASSISTANCE', $data);
                return $result;
            } else {

                $data = [

                    'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                    'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                    'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                    'AssistanceReason' => $this->input->post('AssistanceReason')

                ];

                $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('PERSONNEL_ASSISTANCE', $data);
                return $result;
            }
        } else {

            $config['upload_path']          = 'assets/personnel/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = $AssistanceDocumentURL;

            copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.pdf');
            unlink($config['upload_path'] . $config['file_name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                copy($config['upload_path'] . 'logoold.pdf', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                unlink($config['upload_path'] . 'logoold.pdf');
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $data = [

                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),

            ];

            $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('PERSONNEL_ASSISTANCE', $data);
            return $result;
        }
    }

    //Delete Data Form personnel assistance
    public function delete_personnel_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode, $AssistanceStartDate)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('PERSONNEL_ASSISTANCE', $data);
        return $result;
    }

    //ADD Data personnel Academic
    public function add_personnel_academic($PersonnelID, $JurisdictionCode)
    {
        $data = [

            'JurisdictionCode' => $JurisdictionCode,
            'PersonnelID' => $PersonnelID,
            'AcademicStandingCode' => $this->input->post('AcademicStandingCode'),
            'AcademicDate' => $this->input->post('AcademicDate'),
            'AcademicProgramCode' => $this->input->post('AcademicProgramCode')

        ];

        $result = $this->db->insert('PERSONNEL_ACADEMIC', $data);
        return $result;
    }

    //Update Data personnel Academic
    public function update_personnel_academic($PersonnelID, $JurisdictionCode, $AcademicStandingCode)
    {
        $data = [

            'AcademicDate' => $this->input->post('AcademicDate'),
            'AcademicProgramCode' => $this->input->post('AcademicProgramCode')

        ];

        $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AcademicStandingCode ', $AcademicStandingCode)->update('PERSONNEL_ACADEMIC', $data);
        return $result;
    }

    //Delete Data Form personnel Academic
    public function delete_personnel_academic($PersonnelID, $JurisdictionCode, $AcademicStandingCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID ', $PersonnelID)->where('JurisdictionCode ', $JurisdictionCode)->where('AcademicStandingCode ', $AcademicStandingCode)->update('PERSONNEL_ACADEMIC', $data);
        return $result;
    }
}
