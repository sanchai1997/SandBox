<?php

class Transcript_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //ADD Data transcript
    public function add_transcript($StudentReferenceID)
    {
        $data = [

            'TranscriptSeriesNumber' => $this->input->post('TranscriptSeriesNumber'),
            'TranscriptNumber' => $this->input->post('TranscriptNumber'),
            'StudentReferenceID' => $StudentReferenceID
        ];

        $result = $this->db->insert('TRANSCRIPT', $data);
        return $result;
    }

    //Delete Data transcript
    public function delete_transcript($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->where('TranscriptSeriesNumber ', $TranscriptSeriesNumber)->where('TranscriptNumber ', $TranscriptNumber)->update('TRANSCRIPT', $data);
        return $result;
    }

    //Update Data transcript
    public function update_transcript_main($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $data = [

            'GraduatedSchoolID' => $this->input->post('GraduatedSchoolID'),
            'GraduatedSchoolAdmissionDate' => $this->input->post('GraduatedSchoolAdmissionDate'),
            'OldSchoolID' => $this->input->post('OldSchoolID'),
            'OldSchoolLastGradeLevelCode' => $this->input->post('OldSchoolLastGradeLevelCode')

        ];

        $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->where('TranscriptSeriesNumber ', $TranscriptSeriesNumber)->where('TranscriptNumber ', $TranscriptNumber)->update('TRANSCRIPT', $data);
        return $result;
    }

    //Update Data transcript - Evaluation
    public function update_transcript_evaluation($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $data = [

            'FundamentalEvaluationCode' => $this->input->post('FundamentalEvaluationCode'),
            'LiteracyEvaluationCode' => $this->input->post('LiteracyEvaluationCode'),
            'AttributeEvaluationCode' => $this->input->post('AttributeEvaluationCode'),
            'ExtracurricularEvaluationCode' => $this->input->post('ExtracurricularEvaluationCode'),
            'FundamentalSubjectPassingCode' => $this->input->post('FundamentalSubjectPassingCode'),
            'LiteracyPassingCode' => $this->input->post('LiteracyPassingCode'),
            'AttributePassingCode' => $this->input->post('AttributePassingCode'),
            'ExtracurricularPassingCode' => $this->input->post('ExtracurricularPassingCode')

        ];

        $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->where('TranscriptSeriesNumber ', $TranscriptSeriesNumber)->where('TranscriptNumber ', $TranscriptNumber)->update('TRANSCRIPT', $data);
        return $result;
    }


    //ADD Data transcript - subject
    public function add_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'SubjectSemester' => $this->input->post('SubjectEducationYear'),
            'SubjectSemester' => $this->input->post('SubjectSemester'),
            'SubjectCode' => $this->input->post('SubjectCode'),
            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectCredit' => $this->input->post('SubjectCredit'),
            'SubjectGradeCode' => $this->input->post('SubjectGradeCode')

        ];

        $result = $this->db->insert('TRANSCRIPT_SUBJECT', $data);
        return $result;
    }

    //Delete Data transcript-Subject
    public function delete_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('SubjectEducationYear', $SubjectEducationYear)
            ->where('SubjectSemester', $SubjectSemester)->where('SubjectCode', $_POST['SubjectCode'])->update('TRANSCRIPT_SUBJECT', $data);
        return $result;
    }

    //Update Data transcript-Subject
    public function update_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester)
    {
        $data = [

            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectCredit' => $this->input->post('SubjectCredit'),
            'SubjectGradeCode' => $this->input->post('SubjectGradeCode')

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('SubjectEducationYear', $SubjectEducationYear)
            ->where('SubjectSemester', $SubjectSemester)->where('SubjectCode', $_POST['SubjectCode'])->update('TRANSCRIPT_SUBJECT', $data);
        return $result;
    }
}
