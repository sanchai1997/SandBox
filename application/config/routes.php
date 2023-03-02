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
$route['forms-curriculum'] = 'CurriculumController';
$route['add_curriculum']['post'] = 'Add_CurriculumController';


