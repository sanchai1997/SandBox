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

$route['personnel-additionalposition'] = 'personnel/additional_position';
$route['forms-additionalposition'] = 'forms_personne/add_additionalposition';
///////////////////// PERSONNEL - END /////////////////////////
