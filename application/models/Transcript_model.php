<?php

class Transcript_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //ADD Data transcript
    public function add_transcript($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode)
    {
        $data = [

            'TranscriptSeriesNumber' => $this->input->post('TranscriptSeriesNumber'),
            'TranscriptNumber' => $this->input->post('TranscriptNumber'),
            'EducationYear' => $EducationYear,
            'Semester' => $Semester,
            'OldSchoolID' => $SchoolID,
            'OldSchoolLastGradeLevelCode' => $GradeLevelCode,
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

    public function update_studentClass($StudentReferenceID, $GradeLevelCode)
    {
        $data = [

            'GradeLevelCode' => $GradeLevelCode

        ];

        $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->update('STUDENT', $data);
        return $result;
    }
    //Update Data transcript - Evaluation
    public function update_transcript_evaluation($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber, $EducationYear, $Semester, $GradeLevelCode)
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

        //อนุบาล 
        if ($GradeLevelCode == '111' || $GradeLevelCode == '112' || $GradeLevelCode == '211' || $GradeLevelCode == '212' || $GradeLevelCode == '214' || $GradeLevelCode == '215' || $GradeLevelCode == '311' || $GradeLevelCode == '312') {
            if ($Semester == 1) {
                $data_ST = [

                    'Semester' => $Semester + 1,

                ];
                $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->update('STUDENT', $data_ST);
            } elseif ($Semester == 2) {

                $data_ST = [
                    'EducationYear' => $EducationYear + 1,
                    'Semester' => $Semester - 1,
                    'GradeLevelCode' => $GradeLevelCode + 1,

                ];
                $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->update('STUDENT', $data_ST);
            }
        } elseif ($GradeLevelCode == '113') { ///สำเร็จการศึกษาา

            $data = [
                'EducationYear' => $EducationYear + 1,
                'Semester' => $Semester + 1,
                'GradeLevelCode' => $GradeLevelCode + 1,

            ];
        }


        return $result;
    }


    //ADD Data transcript - subject
    public function add_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {

        $result = $this->db->query('SELECT * FROM CURRICULUM_SUBJECT WHERE DeleteStatus = 0  
        AND CurriculumID  = ' . $_POST['CurriculumID'] . ' 
        ');
        foreach ($result->result() as $CURRICULUM_SUBJECT) {

            $data = [

                'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
                'TranscriptNumber' => $TranscriptNumber,
                'SubjectEducationYear' =>  $TranscriptEducationYear,
                'SubjectSemester' => $TranscriptSemester,
                'SubjectCode' =>  $CURRICULUM_SUBJECT->SubjectCode,
                'SubjectName' => $CURRICULUM_SUBJECT->SubjectName,
                'SubjectTypeCode' => $CURRICULUM_SUBJECT->SubjectTypeCode,
                'SubjectGroupCode' => $CURRICULUM_SUBJECT->SubjectGroupCode,
                'SubjectCredit' => $CURRICULUM_SUBJECT->Credit

            ];

            $result = $this->db->insert('TRANSCRIPT_SUBJECT', $data);
        }

        return $result;
    }

    //Delete Data transcript-Subject
    public function delete_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('SubjectEducationYear', $TranscriptEducationYear)
            ->where('SubjectSemester', $TranscriptSemester)->where('SubjectCode', $_POST['SubjectCode'])->update('TRANSCRIPT_SUBJECT', $data);
        return $result;
    }

    //Update Data transcript-Subject
    public function update_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectCredit' => $this->input->post('SubjectCredit'),
            'SubjectGradeCode' => $this->input->post('SubjectGradeCode')

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('SubjectEducationYear', $TranscriptEducationYear)
            ->where('SubjectSemester', $TranscriptSemester)->where('SubjectCode', $_POST['SubjectCode'])->update('TRANSCRIPT_SUBJECT', $data);
        return $result;
    }


    //ADD Data transcript - activity
    public function add_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'ActivityEducationYear' => $TranscriptEducationYear,
            'ActivitySemester' => $TranscriptSemester,
            'ActivityName' => $this->input->post('ActivityName'),
            'ActivityHour' => $this->input->post('ActivityHour'),
            'ActivityPassingCode' => $this->input->post('ActivityPassingCode')

        ];

        $result = $this->db->insert('TRANSCRIPT_EXTRACURRICULAR_ACTIVITY', $data);
        return $result;
    }

    //Update Data transcript-activity
    public function update_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester)
    {
        $data = [

            'ActivityHour' => $this->input->post('ActivityHour'),
            'ActivityPassingCode' => $this->input->post('ActivityPassingCode')

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('ActivityEducationYear', $ActivityEducationYear)
            ->where('ActivitySemester', $ActivitySemester)->where('ActivityName', $_POST['ActivityName'])->update('TRANSCRIPT_EXTRACURRICULAR_ACTIVITY', $data);
        return $result;
    }

    //Delete Data transcript-activity
    public function delete_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('ActivityEducationYear', $ActivityEducationYear)
            ->where('ActivitySemester', $ActivitySemester)->where('ActivityName', $_POST['ActivityName'])->update('TRANSCRIPT_EXTRACURRICULAR_ACTIVITY', $data);
        return $result;
    }


    //ADD Data transcript - onet
    public function add_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'ONETEducationYear' => $TranscriptEducationYear,
            'ONETGradeLevelCode' => $this->input->post('ONETGradeLevelCode'),
            'ONETSubjectGroupCode' => $this->input->post('ONETSubjectGroupCode'),
            'ONETSubjectGradeCode' => $this->input->post('ONETSubjectGradeCode')

        ];

        $result = $this->db->insert('TRANSCRIPT_ONET', $data);
        return $result;
    }


    //UPdate Data transcript-onet
    public function update_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode)
    {
        $data = [

            'ONETSubjectGradeCode' => $this->input->post('ONETSubjectGradeCode')

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('ONETEducationYear', $ONETEducationYear)
            ->where('ONETGradeLevelCode', $ONETGradeLevelCode)->where('ONETSubjectGroupCode', $ONETSubjectGroupCode)->update('TRANSCRIPT_ONET', $data);
        return $result;
    }

    //Delete Data transcript-onet
    public function delete_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('ONETEducationYear', $ONETEducationYear)
            ->where('ONETGradeLevelCode', $ONETGradeLevelCode)->where('ONETSubjectGroupCode', $ONETSubjectGroupCode)->update('TRANSCRIPT_ONET', $data);
        return $result;
    }


    //ADD Data transcript - nt
    public function add_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'NTEducationYear' => $TranscriptEducationYear,
            'NTSemester' => $TranscriptSemester,
            'NTGradeLevelCode' => $this->input->post('NTGradeLevelCode'),
            'NTMathScore' => $this->input->post('NTMathScore'),
            'NTThaiLanguageScore' => $this->input->post('NTThaiLanguageScore'),
            'NTMeanScore' => (($_POST['NTMathScore'] + $_POST['NTThaiLanguageScore']) / 2)

        ];

        $result = $this->db->insert('TRANSCRIPT_NT', $data);
        return $result;
    }

    //Update Data transcript-nt
    public function update_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode)
    {
        $data = [

            'NTMathScore' => $this->input->post('NTMathScore'),
            'NTThaiLanguageScore' => $this->input->post('NTThaiLanguageScore'),
            'NTMeanScore' => (($_POST['NTMathScore'] + $_POST['NTThaiLanguageScore']) / 2)

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('NTEducationYear', $NTEducationYear)
            ->where('NTSemester', $NTSemester)->where('NTGradeLevelCode', $NTGradeLevelCode)->update('TRANSCRIPT_NT', $data);
        return $result;
    }

    //Delete Data transcript-nt
    public function delete_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('NTEducationYear', $NTEducationYear)
            ->where('NTSemester', $NTSemester)->where('NTGradeLevelCode', $NTGradeLevelCode)->update('TRANSCRIPT_NT', $data);
        return $result;
    }


    //ADD Data transcript - rt
    public function add_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'RTEducationYear' => $TranscriptEducationYear,
            'RTSemester' => $TranscriptSemester,
            'RTEducationLevelCode' => $this->input->post('RTEducationLevelCode'),
            'RTGradeLevelCode' => $this->input->post('RTGradeLevelCode'),
            'RTPronounceScore' => $this->input->post('RTPronounceScore'),
            'RTUnderstandingScore' => $this->input->post('RTUnderstandingScore'),
            'RTMeanScore' => (($_POST['RTPronounceScore'] + $_POST['RTUnderstandingScore']) / 2)

        ];

        $result = $this->db->insert('TRANSCRIPT_RT', $data);
        return $result;
    }

    //update Data transcript-rt
    public function update_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode)
    {
        $data = [

            'RTPronounceScore' => $this->input->post('RTPronounceScore'),
            'RTUnderstandingScore' => $this->input->post('RTUnderstandingScore'),
            'RTMeanScore' => (($_POST['RTPronounceScore'] + $_POST['RTUnderstandingScore']) / 2)

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('RTEducationYear', $RTEducationYear)
            ->where('RTSemester', $RTSemester)->where('RTEducationLevelCode', $RTEducationLevelCode)->where('RTGradeLevelCode', $RTGradeLevelCode)->update('TRANSCRIPT_RT', $data);
        return $result;
    }

    //Delete Data transcript-rt
    public function delete_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)->where('RTEducationYear', $RTEducationYear)
            ->where('RTSemester', $RTSemester)->where('RTEducationLevelCode', $RTEducationLevelCode)->where('RTGradeLevelCode', $RTGradeLevelCode)->update('TRANSCRIPT_RT', $data);
        return $result;
    }

    //ADD Data transcript - competency
    public function add_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $data = [

            'TranscriptSeriesNumber' => $TranscriptSeriesNumber,
            'TranscriptNumber' => $TranscriptNumber,
            'CompetencyEducationYear' => $TranscriptEducationYear,
            'CompetencySemester' => $TranscriptSemester,
            'CompetencyCode' => $this->input->post('CompetencyCode'),
            'CompetencyScore' => $this->input->post('CompetencyScore'),
            'CompetencyEvaluationCode' => $this->input->post('CompetencyEvaluationCode')

        ];

        $result = $this->db->insert('TRANSCRIPT_COMPETENCY', $data);
        return $result;
    }

    //Update Data transcript-competency
    public function update_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode)
    {
        $data = [

            'CompetencyScore' => $this->input->post('CompetencyScore'),
            'CompetencyEvaluationCode' => $this->input->post('CompetencyEvaluationCode')

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)
            ->where('CompetencyEducationYear', $CompetencyEducationYear)->where('CompetencySemester', $CompetencySemester)->where('CompetencyCode', $CompetencyCode)->update('TRANSCRIPT_COMPETENCY', $data);
        return $result;
    }

    //Delete Data transcript-competency
    public function delete_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TranscriptSeriesNumber', $TranscriptSeriesNumber)->where('TranscriptNumber', $TranscriptNumber)
            ->where('CompetencyEducationYear', $CompetencyEducationYear)->where('CompetencySemester', $CompetencySemester)->where('CompetencyCode', $CompetencyCode)->update('TRANSCRIPT_COMPETENCY', $data);
        return $result;
    }
}
