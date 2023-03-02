<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login';


////////////////////// ROUTE SCHOOL ////////////////////////
//school
$route['school'] = 'school/index';
$route['forms-school'] = 'forms_school';
$route['forms-school-detail'] = 'forms_school/detail';
$route['add-school']['post'] = 'forms_school/add_school';

//classrom
$route['school-classroom'] = 'school/classroom';
$route['forms-school-classroom'] = 'forms_school/classroom';
$route['add-classroom']['post'] = 'forms_school/add_classroom';

//AWARD
$route['school-award'] = 'school/award';
$route['forms-school-award'] = 'forms_school/award';
$route['add-award']['post'] = 'forms_school/add_award';
////////////////////// SCHOOL - END /////////////////////////


////////////////////// ROUTE STUDENT ////////////////////////
//student
$route['student'] = 'student/index';
$route['forms-student'] = 'forms_student';
///////////////////// STUDENT - END /////////////////////////