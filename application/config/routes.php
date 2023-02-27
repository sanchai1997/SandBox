<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['main'] = 'main';


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
/////////////////////////// END ////////////////////////////