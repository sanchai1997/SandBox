<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['main'] = 'main';
$route['forms-school'] = 'forms_school';
$route['forms-school-detail'] = 'forms_school_detail';
$route['add_school']['post'] = "add_school";

//Curriculum
$route['list-curriculum'] = 'CurriculumController/list_curriculum';
$route['forms-curriculum'] = 'CurriculumController/forms_curriculum';
$route['add_curriculum']['post'] = 'CurriculumController/add_curriculum';
//Curriculum_subject
$route['list-curriculum_subject'] = 'CurriculumController/list_curriculum_subject';
$route['forms-curriculum_subject'] = 'CurriculumController/forms_curriculum_subject';
$route['add_curriculum_subject']['post'] = 'CurriculumController/add_curriculum_subject';

//teacher_developmant_activity
$route['list-teacher_development_activity'] = 'Teacher_development_activity_controller/list_teacher_development_activity';
$route['forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms';
$route['add_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/add_teacher_development_activity';



