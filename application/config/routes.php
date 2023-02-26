<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['main'] = 'main';


////////////////////// ROUTE SCHOOL ////////////////////////
$route['school'] = 'school';
$route['forms-school'] = 'forms_school';
$route['forms-school-detail'] = 'forms_school/detail';
$route['add-school']['post'] = 'forms_school/add_school';
/////////////////////////// END ////////////////////////////



