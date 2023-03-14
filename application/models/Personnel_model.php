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
        $data = [

            'PersonnelID' => $this->input->post('PersonnelID'),
            'EntryYear' => $this->input->post('EntryYear'),
            'EntryTimes' => $this->input->post('EntryTimes'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'PersonnelPersonalID' => $this->input->post('PersonnelPersonalID'),
            'PersonnelPersonalIDTypeCode' => $this->input->post('PersonnelPersonalIDTypeCode'),
            'PersonnelPassportNumber' => $this->input->post('PersonnelPassportNumber'),
            'PersonnelPrefixCode' => $this->input->post('PersonnelPrefixCode'),
            'PersonnelNameThai' => $this->input->post('PersonnelNameThai'),
            'PersonnelNameEnglish' => $this->input->post('PersonnelNameEnglish'),
            'PersonnelMiddleNameThai' => $this->input->post('PersonnelMiddleNameThai'),
            'PersonnelMiddleNameEnglish' => $this->input->post('PersonnelMiddleNameEnglish'),
            'PersonnelLastNameThai' => $this->input->post('PersonnelLastNameThai'),
            'PersonnelLastNameEnglish' => $this->input->post('PersonnelLastNameEnglish'),
            'PersonnelGenderCode' => $this->input->post('PersonnelGenderCode'),
            'PersonnelBirthDate' => $this->input->post('PersonnelBirthDate'),
            'PersonnelNationalityCode' => $this->input->post('PersonnelNationalityCode'),
            'PersonnelRaceCode' => $this->input->post('PersonnelRaceCode'),
            'PersonnelReligionCode' => $this->input->post('PersonnelReligionCode'),
            'PersonnelBloodCode' => $this->input->post('PersonnelBloodCode'),
            'PersonnelOfficialAddressHouseRegisterID' => $this->input->post('PersonnelOfficialAddressHouseRegisterID'),
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
            'PersonnelCurrentAddressHouseRegisterID' => $this->input->post('PersonnelCurrentAddressHouseRegisterID'),
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
            'PersonnelEmail' => $this->input->post('PersonnelEmail'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary'),
            'PersonnelTalentCode' => $this->input->post('PersonnelTalentCode')

        ];

        $result = $this->db->insert('PERSONNEL', $data);
        return $result;
    }



    //Update Data Student
    public function update_personnel($PersonnelID)
    {
        $data = [

            'EntryYear' => $this->input->post('EntryYear'),
            'EntryTimes' => $this->input->post('EntryTimes'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'PersonnelPersonalID' => $this->input->post('PersonnelPersonalID'),
            'PersonnelPersonalIDTypeCode' => $this->input->post('PersonnelPersonalIDTypeCode'),
            'PersonnelPassportNumber' => $this->input->post('PersonnelPassportNumber'),
            'PersonnelPrefixCode' => $this->input->post('PersonnelPrefixCode'),
            'PersonnelNameThai' => $this->input->post('PersonnelNameThai'),
            'PersonnelNameEnglish' => $this->input->post('PersonnelNameEnglish'),
            'PersonnelMiddleNameThai' => $this->input->post('PersonnelMiddleNameThai'),
            'PersonnelMiddleNameEnglish' => $this->input->post('PersonnelMiddleNameEnglish'),
            'PersonnelLastNameThai' => $this->input->post('PersonnelLastNameThai'),
            'PersonnelLastNameEnglish' => $this->input->post('PersonnelLastNameEnglish'),
            'PersonnelGenderCode' => $this->input->post('PersonnelGenderCode'),
            'PersonnelBirthDate' => $this->input->post('PersonnelBirthDate'),
            'PersonnelNationalityCode' => $this->input->post('PersonnelNationalityCode'),
            'PersonnelRaceCode' => $this->input->post('PersonnelRaceCode'),
            'PersonnelReligionCode' => $this->input->post('PersonnelReligionCode'),
            'PersonnelBloodCode' => $this->input->post('PersonnelBloodCode'),
            'PersonnelOfficialAddressHouseRegisterID' => $this->input->post('PersonnelOfficialAddressHouseRegisterID'),
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
            'PersonnelCurrentAddressHouseRegisterID' => $this->input->post('PersonnelCurrentAddressHouseRegisterID'),
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
            'PersonnelEmail' => $this->input->post('PersonnelEmail'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary'),
            'PersonnelTalentCode' => $this->input->post('PersonnelTalentCode')

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }

    //Delete Data personnel
    public function delete_personnel($PersonnelID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->update('PERSONNEL', $data);
        return $result;
    }


    public function add_additionalposition()
    {

        $config['upload_path'] = './application/documents/personnel/additionalposition';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('AdditionalDocumentURL')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
            $filename = $data['file_name'];
            $data = [

                'PersonnelID' => $this->input->post('PersonnelID'),
                'JurisdictionCode' => $this->input->post('JurisdictionCode'),
                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment'),
                'AdditionalDocumentURL' => $filename
            ];

            $result = $this->db->insert('PERSONNEL_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }


    //Update Data additionalposition
    public function update_additionalposition($PersonnelID, $JurisdictionCode)
    {
        if (!empty($data['AdditionalDocumentURL'])) {
            $config['upload_path'] = './application/documents/personnel/additionalposition';
            $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                echo $this->upload->display_errors();
            } else {

                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = [
                    'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                    'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                    'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                    'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                    'AdditionalComment' => $this->input->post('AdditionalComment'),
                    'AdditionalDocumentURL' => $filename
                ];


                $result = $this->db->where('PersonnelID', $PersonnelID)->where('JurisdictionCode', $JurisdictionCode)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
                return $result;
            }
        } else {
            $data = [

                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment')
            ];

            $result = $this->db->where('PersonnelID', $PersonnelID)->where('JurisdictionCode', $JurisdictionCode)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }



    //Delete Data additionalposition
    public function delete_additionalposition($PersonnelID, $JurisdictionCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('PersonnelID', $PersonnelID)->where('JurisdictionCode', $JurisdictionCode)->update('PERSONNEL_ADDITIONAL_POSITION', $data);
        return $result;
    }
}
