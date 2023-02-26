<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CurriculumModel extends CI_Model {
    protected $tabale = 'CURRICULUM';

    protected $primarykey = 'CURRICULUM_ID';

    protected $allowedFields = ['EDUCATION_YEAR', 'SEMESTER', 'SCHOOL_ID', 'CURRICULUM_NAME', 'CURRICULUM_CODE', 'EDUCATION_LEVEL_CODE', 
    'GRADE_LEVEL_CODE', 'CURRICULUM_DOCUMENT', 'LOCAL_CURRICULUM_FLAG', 'LOCAL_CURRICULUM_NAME', 'LOCAL_CURRICULUM_DOCUMENT']

}

?>