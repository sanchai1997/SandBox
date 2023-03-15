<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//////////////////////// ROUTE LOIN ////////////////////////
$route['login'] = 'login';
/////////////////////// LOIN - END /////////////////////////

////////////////////// ROUTE SCHOOL ////////////////////////
//school
$route['school'] = 'school/index';
$route['forms-school'] = 'forms_school';
$route['forms-school-P2'] = 'forms_school/P2';
$route['add-school']['post'] = 'forms_school/add_school';
$route['edit-forms-school'] = 'forms_school/edit_school';
$route['update-school/(:num)'] = 'forms_school/update_school/$1';
$route['delete-school/(:num)'] = 'forms_school/delete_school/$1';

//Curriculum
$route['list-curriculum'] = 'CurriculumController/list_curriculum';
$route['forms-curriculum'] = 'CurriculumController/forms_curriculum';
$route['add_curriculum']['post'] = 'CurriculumController/add_curriculum';
$route['edit_forms-curriculum'] = 'CurriculumController/forms_edit_curriculum';
$route['edit_curriculum']['post'] = 'CurriculumController/edit_curriculum';
//Curriculum_subject
$route['list-curriculum_subject']= 'CurriculumController/list_curriculum_subject';
$route['forms-curriculum_subject'] = 'CurriculumController/forms_curriculum_subject';
$route['add_curriculum_subject']['post'] = 'CurriculumController/add_curriculum_subject';
$route['edit_forms-curriculum_subject'] = 'CurriculumController/forms_edit_curriculum_subject';
$route['edit_curriculum_subject']['post'] = 'CurriculumController/edit_curriculum_subject';
//Curriculum__school_competency
$route['list-curriculum_school_competency']= 'CurriculumController/list_curriculum_school_competency';
$route['forms-curriculum_school_competency'] = 'CurriculumController/forms_curriculum_school_competency';
$route['add_curriculum_school_competency']['post'] = 'CurriculumController/add_curriculum_school_competency';
$route['edit_forms-curriculum_school_competency'] = 'CurriculumController/forms_edit_curriculum_school_competency';
$route['edit_curriculum_school_competency']['post'] = 'CurriculumController/edit_curriculum_school_competency';

//teacher_developmant_activity
$route['list-teacher_development_activity'] = 'Teacher_development_activity_controller/list_teacher_development_activity';
$route['forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms';
$route['add_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/add_teacher_development_activity';
$route['edit_forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms_edit_teacher_development_activity';
$route['edit_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/edit_teacher_development_activity';
$route['delete-teacher_development_activity/(:any)/(:any)/(:any)'] = 'Teacher_development_activity_controller/delete_teacher_development_activity/$1/$2/$3';
//Files
$route['load_file'] = 'DocumentController/load_file';


//classrom
$route['school-classroom'] = 'school/classroom';
$route['school-classroom-P2'] = 'school/classroom_P2';
$route['forms-school-classroom'] = 'forms_school/classroom';
$route['add-classroom']['post'] = 'forms_school/add_classroom';
$route['edit-forms-classroom'] = 'forms_school/edit_classroom';
$route['update-classroom/(:num)/(:num)'] = 'forms_school/update_classroom/$1/$2';
$route['delete-classroom/(:num)/(:num)'] = 'forms_school/delete_classroom/$1/$2';

//AWARD
$route['school-award'] = 'school/award';
$route['school-award-P2'] = 'school/award_P2';
$route['forms-school-award'] = 'forms_school/award';
$route['add-award']['post'] = 'forms_school/add_award';
$route['edit-forms-award'] = 'forms_school/edit_award';
$route['update-award/(:num)/(:num)/(:any)'] = 'forms_school/update_award/$1/$2/$3';
$route['delete-award/(:num)/(:num)/(:any)'] = 'forms_school/delete_award/$1/$2/$3';
////////////////////// SCHOOL - END /////////////////////////

////////////////////// ROUTE STUDENT ////////////////////////
//student
$route['student'] = 'student/index';
$route['student-P2'] = 'student/student_P2';
$route['forms-student'] = 'forms_student';
$route['forms-student-P2'] = 'forms_student/P2';
$route['forms-student-P3'] = 'forms_student/P3';
$route['forms-student-P4'] = 'forms_student/P4';
$route['add-student']['post'] = 'forms_student/add_student';
$route['edit-forms-student'] = 'forms_student/edit_student';
$route['update-student/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'forms_student/update_student/$1/$2/$3/$4/$5/$6';
$route['delete-student/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'forms_student/delete_student/$1/$2/$3/$4/$5/$6';
///////////////////// STUDENT - END /////////////////////////

////////////////////// ROUTE TEACHER ////////////////////////
//TEACHER
$route['teacher'] = 'teacher';
$route['forms-teacher'] = 'forms_teacher';
$route['forms-teacher-P2'] = 'forms_teacher/teacher_P2';
$route['add-teacher']['post'] = 'forms_teacher/add_teacher';
$route['edit-forms-teacher'] = 'forms_teacher/edit_teacher';
$route['update-teacher/(:any)'] = 'forms_teacher/update_teacher/$1';
$route['delete-teacher/(:any)'] = 'forms_teacher/delete_teacher/$1';
///////////////////// TEACHER - END /////////////////////////

////////////////////// ROUTE CRADUATED ////////////////////////
//CRADUATED 
$route['craduated'] = 'craduated';
$route['forms-craduated'] = 'forms_craduated';
///////////////////// CRADUATED - END /////////////////////////

////////////////////// ROUTE PERSONNEL ////////////////////////
//PERSONNEL
$route['personnel'] = 'personnel';
$route['forms-personnel'] = 'forms_personnel';
$route['forms-personnel-P2'] = 'forms_personnel/P2';
$route['add-personnel']['post'] = 'forms_personnel/add_personnel';
$route['edit-forms-personnel'] = 'forms_personnel/edit_personnel';
$route['update-personnel/(:any)'] = 'forms_personnel/update_personnel/$1';
$route['delete-personnel/(:any)'] = 'forms_personnel/delete_personnel/$1';

$route['personnel-additional-position'] = 'personnel/additional_position';
///////////////////// PERSONNEL - END /////////////////////////


//budget
$route['forms-budget'] = 'BudgetController/forms_budget';
