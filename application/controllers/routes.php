<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//////////////////////// ROUTE LOIN ////////////////////////
$route['login'] = 'login';
/////////////////////// LOIN - END /////////////////////////



//Curriculum
$route['list-curriculum'] = 'CurriculumController/list_curriculum';
$route['forms-curriculum'] = 'CurriculumController/forms_curriculum';
$route['add_curriculum']['post'] = 'CurriculumController/add_curriculum';
$route['edit_forms-curriculum'] = 'CurriculumController/forms_edit_curriculum';
$route['edit_curriculum']['post'] = 'CurriculumController/edit_curriculum';
$route['delete-curriculum/(:num)/(:num)'] = 'CurriculumController/delete_curriculum/$1/$2';
$route['list_curriculum_by_school'] = 'CurriculumController/list_curriculum_by_school';
//Curriculum_subject
$route['list-curriculum_subject'] = 'CurriculumController/list_curriculum_subject';
$route['forms-curriculum_subject'] = 'CurriculumController/forms_curriculum_subject';
$route['add_curriculum_subject']['post'] = 'CurriculumController/add_curriculum_subject';
$route['edit_forms-curriculum_subject'] = 'CurriculumController/forms_edit_curriculum_subject';
$route['edit_curriculum_subject']['post'] = 'CurriculumController/edit_curriculum_subject';
$route['delete-curriculum_subject/(:num)/(:num)'] = 'CurriculumController/delete_curriculum_subject/$1/$2';
//Curriculum__school_competency
$route['list-curriculum_school_competency'] = 'CurriculumController/list_curriculum_school_competency';
$route['forms-curriculum_school_competency'] = 'CurriculumController/forms_curriculum_school_competency';
$route['add_curriculum_school_competency']['post'] = 'CurriculumController/add_curriculum_school_competency';
$route['edit_forms-curriculum_school_competency'] = 'CurriculumController/forms_edit_curriculum_school_competency';
$route['edit_curriculum_school_competency']['post'] = 'CurriculumController/edit_curriculum_school_competency';
$route['delete-curriculum_school_competency/(:num)/(:num)/(:num)'] = 'CurriculumController/delete_curriculum_school_competency/$1/$2/$3';
//curriculum_plan
$route['list-curriculum_plan'] = 'CurriculumController/list_curriculum_plan';
$route['forms-curriculum_plan'] = 'CurriculumController/forms_curriculum_plan';
//Curriculum_by_school
$route['list_curriculum_by_school'] = 'CurriculumController/list_curriculum_by_school';
//Curriculum_by_school
$route['forms-curriculum_activity'] = 'CurriculumController/forms_curriculum_activity';
$route['add_curriculum_plan']['post'] = 'CurriculumController/add_curriculum_plan';
$route['edit_forms_curriculum_plan'] = 'CurriculumController/forms_edit_curriculum_plan';
$route['edit_curriculum_plan']['post'] = 'CurriculumController/edit_curriculum_plan';
$route['delete-curriculum_plan/(:num)/(:num)/(:num)'] = 'CurriculumController/delete_curriculum_plan/$1/$2/$3';
//Curriculum_activity
$route['list-curriculum_activity'] = 'CurriculumController/list_curriculum_activity';
$route['forms-curriculum_activity'] = 'CurriculumController/forms_curriculum_activity';
$route['add_curriculum_activity']['post'] = 'CurriculumController/add_curriculum_activity';
$route['edit_forms-curriculum_activity'] = 'CurriculumController/edit_forms_curriculum_activity';
$route['edit_curriculum_activity']['post'] = 'CurriculumController/edit_curriculum_activity';
$route['delete-curriculum_activity/(:num)/(:num)/(:num)/(:num)'] = 'CurriculumController/delete_curriculum_activity/$1/$2/$3/$4';
//curriculum_assessment
$route['forms-curriculum_assessment'] = 'CurriculumController/forms_curriculum_assessment';
$route['add_curriculum_assessment']['post'] = 'CurriculumController/add_curriculum_assessment';
$route['list_curriculum_assignment'] = 'CurriculumController/list_curriculum_assignment';
$route['edit_forms-curriculum_assessment'] = 'CurriculumController/edit_forms_curriculum_assessment';
//eportfolio
$route['list-eportfolio'] = 'CurriculumController/list_eportfolio';
$route['forms_eportfolio'] = 'CurriculumController/forms_eportfolio';
$route['add_eportfolio'] = 'CurriculumController/add_eportfolio';
$route['edit_forms_eportfolio'] = 'CurriculumController/edit_forms_eportfolio';
$route['edit_eportfolio']['post'] = 'CurriculumController/edit_eportfolio';
$route['delete-eportfolio/(:num)'] = 'CurriculumController/delete_eportfolio/$1';






//teacher_developmant_activity
$route['list-teacher_development_activity'] = 'Teacher_development_activity_controller/list_teacher_development_activity';
$route['forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms';
$route['add_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/add_teacher_development_activity';
$route['edit_forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms_edit_teacher_development_activity';
$route['edit_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/edit_teacher_development_activity';
$route['delete-teacher_development_activity'] = 'Teacher_development_activity_controller/delete_teacher_development_activity';
//Files
#$route['load_file'] = 'DocumentController/load_file';
//budget
$route['list-budget'] = 'BudgetController/list_budget';
$route['edit_forms_budget'] = 'BudgetController/edit_forms_budget';
$route['forms-budget'] = 'BudgetController/forms_budget';
$route['list_budget_by_school'] = 'BudgetController/list_budget_by_school';
$route['add-budget']['post'] = 'BudgetController/add_budget';
$route['edit-budget']['post'] = 'BudgetController/edit_budget';
$route['delete_budget'] = 'BudgetController/delete_budget';
//Expense
$route['forms_Expense'] = 'ExpenseController/forms_Expense';
$route['add-Expense']['post'] = 'ExpenseController/add_Expense';
$route['edit_forms_Expense'] = 'ExpenseController/edit_forms_Expense';
$route['edit-Expense']['post'] = 'ExpenseController/edit_Expense';
$route['delete_Expense'] = 'ExpenseController/delete_Expense';

//area_identitty
$route['list-area_identity'] = 'Area_identittyController/list_area_identity';
$route['list-area_identity_by_school'] = 'Area_identittyController/list_area_identity_by_school';
$route['forms-area_identity'] = 'Area_identittyController/forms_Area_identitty';
$route['add-area_identity_by_school']['post'] = 'Area_identittyController/add_area_identity';
$route['delete_area_identity'] = 'Area_identittyController/delete_area_identity';
$route['edit_forms_area_identity'] = 'Area_identittyController/edit_forms_area_identity';
$route['edit-area_identity']['post'] = 'Area_identittyController/edit_area_identity';

//Region
$route['forms-Region'] = 'Area_identittyController/forms_Region';
$route['add-Region']['post'] = 'Area_identittyController/add_Region';
$route['delete_Region'] = 'Area_identittyController/delete_Region';
$route['edit_forms_Region'] = 'Area_identittyController/edit_forms_Region';
$route['edit-Region']['post'] = 'Area_identittyController/edit_Region';

//OCCUPATION
$route['forms-OCCUPATION'] = 'Area_identittyController/forms_OCCUPATION';
$route['add-OCCUPATION']['post'] = 'Area_identittyController/add_OCCUPATION';
$route['delete_OCCUPATION'] = 'Area_identittyController/delete_OCCUPATION';
$route['edit_forms_OCCUPATION'] = 'Area_identittyController/edit_forms_OCCUPATION';
$route['edit-OCCUPATION']['post'] = 'Area_identittyController/edit_OCCUPATION';


////////////////////// ROUTE SCHOOL ////////////////////////
//school
$route['school'] = 'school/index';
$route['forms-school'] = 'forms_school/index';
$route['add-school']['post'] = 'forms_school/add_school';
$route['edit-school-main'] = 'forms_school/edit_school_main';
$route['edit-forms-school-address'] = 'forms_school/edit_forms_school_address';
$route['edit-forms-school-contact'] = 'forms_school/edit_forms_school_contact';
$route['edit-forms-school-administrator'] = 'forms_school/edit_forms_school_administrator';
$route['edit-forms-school-utilities'] = 'forms_school/edit_forms_school_utilities';
$route['edit-forms-school-teaching'] = 'forms_school/edit_forms_school_teaching';
$route['edit-forms-school-statistical'] = 'forms_school/edit_forms_school_statistical';


$route['update-school-main/(:num)/(:any)'] = 'forms_school/update_school_main/$1/$2';
$route['update-school-address/(:num)'] = 'forms_school/update_school_address/$1';
$route['update-school-contact/(:num)'] = 'forms_school/update_school_contact/$1';
$route['update-school-administrator/(:num)'] = 'forms_school/update_school_administrator/$1';
$route['update-school-utilities/(:num)'] = 'forms_school/update_school_utilities/$1';
$route['update-school-teaching/(:num)'] = 'forms_school/update_school_teaching/$1';
$route['update-school-statistical/(:num)'] = 'forms_school/update_school_statistical/$1';


$route['delete-school/(:num)'] = 'forms_school/delete_school/$1';

//classrom
$route['school-classroom'] = 'school/classroom';
$route['forms-school-classroom'] = 'forms_school/classroom';
$route['add-classroom/(:num)']['post'] = 'forms_school/add_classroom/$1';
$route['edit-forms-classroom'] = 'forms_school/edit_classroom';
$route['update-classroom/(:num)/(:num)'] = 'forms_school/update_classroom/$1/$2';
$route['delete-classroom/(:num)/(:num)'] = 'forms_school/delete_classroom/$1/$2';

//AWARD
$route['school-award'] = 'school/award';
$route['forms-school-award'] = 'forms_school/award';
$route['add-award/(:num)']['post'] = 'forms_school/add_award/$1';
$route['edit-forms-award'] = 'forms_school/edit_award';
$route['update-award/(:num)/(:num)/(:any)'] = 'forms_school/update_award/$1/$2/$3';
$route['delete-award/(:num)/(:num)/(:any)'] = 'forms_school/delete_award/$1/$2/$3';

//building
$route['school-building'] = 'school/building';
$route['forms-school-building'] = 'forms_school/building';
$route['add-building/(:num)']['post'] = 'forms_school/add_building/$1';
$route['edit-forms-building'] = 'forms_school/edit_building';
$route['update-building/(:num)/(:any)'] = 'forms_school/update_building/$1/$2';
$route['delete-building/(:num)/(:any)'] = 'forms_school/delete_building/$1/$2';

////////////////////// SCHOOL - END /////////////////////////


////////////////////// ROUTE STUDENT ////////////////////////
//student
$route['student'] = 'student/index';
$route['forms-student'] = 'forms_student';
$route['forms-student-select'] = 'forms_student/forms_student_select';
$route['add-student/(:num)']['post'] = 'forms_student/add_student/$1';
$route['add-student-select/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/add_student_select/$1/$2/$3/$4';
$route['edit-forms-student-main'] = 'forms_student/edit_forms_student_main';
$route['edit-forms-student-person'] = 'forms_student/edit_forms_student_person';
$route['edit-forms-student-address'] = 'forms_student/edit_forms_student_address';
$route['edit-forms-student-parents'] = 'forms_student/edit_forms_student_parents';
$route['edit-forms-student-family'] = 'forms_student/edit_forms_student_family';
$route['edit-forms-student-journey'] = 'forms_student/edit_forms_student_journey';
$route['edit-forms-student-disadvantaged'] = 'forms_student/edit_forms_student_disadvantaged';
$route['edit-forms-student-talent'] = 'forms_student/edit_forms_student_talent';

$route['update-student-main/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)']['post'] = 'forms_student/update_student_main/$1/$2/$3/$4/$5/$6';
$route['update-student-person/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_person/$1/$2/$3/$4/$5';
$route['update-student-address/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_address/$1/$2/$3/$4/$5';
$route['update-student-parents/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_parents/$1/$2/$3/$4/$5';
$route['update-student-family/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_family/$1/$2/$3/$4/$5';
$route['update-student-journey/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_journey/$1/$2/$3/$4/$5';
$route['update-student-disadvantaged/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_disadvantaged/$1/$2/$3/$4/$5';
$route['update-student-talent/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_student/update_student_talent/$1/$2/$3/$4/$5';


$route['delete-student/(:any)/(:num)/(:num)/(:num)/(:num)'] = 'forms_student/delete_student/$1/$2/$3/$4/$5';

///////////////////// STUDENT - END /////////////////////////



////////////////////// ROUTE TEACHER ////////////////////////
//TEACHER
$route['teacher'] = 'teacher/index';
$route['forms-teacher'] = 'forms_teacher';
$route['forms-teacher-select'] = 'forms_teacher/forms_teacher_select';
$route['add-teacher/(:num)']['post'] = 'forms_teacher/add_teacher/$1';
$route['add-teacher-select/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_select/$1/$2/$3/$4/$5';
$route['edit-forms-teacher-main'] = 'forms_teacher/edit_forms_teacher_main';
$route['edit-forms-teacher-person'] = 'forms_teacher/edit_forms_teacher_person';
$route['edit-forms-teacher-marriage'] = 'forms_teacher/edit_forms_teacher_marriage';
$route['edit-forms-teacher-address'] = 'forms_teacher/edit_forms_teacher_address';
$route['edit-forms-teacher-contract'] = 'forms_teacher/edit_forms_teacher_contract';
$route['edit-forms-teacher-talent'] = 'forms_teacher/edit_forms_teacher_talent';
$route['update-teacher-main/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)']['post'] = 'forms_teacher/update_teacher_main/$1/$2/$3/$4/$5/$6/$7';
$route['update-teacher-person/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/update_teacher_person/$1/$2/$3/$4/$5/$6';
$route['update-teacher-marriage/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/update_teacher_marriage/$1/$2/$3/$4/$5/$6';
$route['update-teacher-address/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/update_teacher_address/$1/$2/$3/$4/$5/$6';
$route['update-teacher-contract/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/update_teacher_contract/$1/$2/$3/$4/$5/$6';
$route['update-teacher-talent/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/update_teacher_talent/$1/$2/$3/$4/$5/$6';
$route['delete-teacher/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/delete_teacher/$1/$2/$3/$4/$5/$6';


//Certificate
$route['teacher-certificate'] = 'teacher/teacher_certificate';
$route['forms-teacher-certificate'] = 'forms_teacher/forms_teacher_certificate';
$route['edit-forms-teacher-certificate'] = 'forms_teacher/edit_teacher_certificate';
$route['add-teacher-certificate/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_certificate/$1/$2/$3/$4/$5/$6';
$route['update-teacher-certificate/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/update_teacher_certificate/$1/$2/$3/$4/$5/$6/$7/$8';
$route['delete-teacher-certificate/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/delete_teacher_certificate/$1/$2/$3/$4/$5/$6/$7/$8';

//Position
$route['teacher-position'] = 'teacher/teacher_position';
$route['forms-teacher-position'] = 'forms_teacher/forms_teacher_position';
$route['edit-forms-teacher-position'] = 'forms_teacher/edit_teacher_position';
$route['add-teacher-position/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_position/$1/$2/$3/$4/$5/$6';
$route['update-teacher-position/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)/(:any)'] = 'forms_teacher/update_teacher_position/$1/$2/$3/$4/$5/$6/$7/$8/$9';
$route['delete-teacher-position/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)'] = 'forms_teacher/delete_teacher_position/$1/$2/$3/$4/$5/$6/$7/$8';

//Assistance
$route['teacher-assistance'] = 'teacher/teacher_assistance';
$route['forms-teacher-assistance'] = 'forms_teacher/forms_teacher_assistance';
$route['edit-forms-teacher-assistance'] = 'forms_teacher/edit_teacher_assistance';
$route['add-teacher-assistance/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_assistance/$1/$2/$3/$4/$5/$6';
$route['update-teacher-assistance/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)/(:any)'] = 'forms_teacher/update_teacher_assistance/$1/$2/$3/$4/$5/$6/$7/$8/$9';
$route['delete-teacher-assistance/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)'] = 'forms_teacher/delete_teacher_assistance/$1/$2/$3/$4/$5/$6/$7/$8';

//Academic
$route['graduated'] = 'teacher/teacher_academic';
$route['forms-teacher-academic'] = 'forms_teacher/forms_teacher_academic';
$route['edit-forms-teacher-academic'] = 'forms_teacher/edit_teacher_academic';
$route['add-teacher-academic/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_academic/$1/$2/$3/$4/$5/$6';
$route['update-teacher-academic/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/update_teacher_academic/$1/$2/$3/$4/$5/$6/$7';
$route['delete-teacher-academic/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/delete_teacher_academic/$1/$2/$3/$4/$5/$6/$7';

//Education
$route['teacher-education'] = 'teacher/teacher_education';
$route['forms-teacher-education'] = 'forms_teacher/forms_teacher_education';
$route['edit-forms-teacher-education'] = 'forms_teacher/edit_teacher_education';
$route['add-teacher-education/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_education/$1/$2/$3/$4/$5/$6';
$route['update-teacher-education/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/update_teacher_education/$1/$2/$3/$4/$5/$6/$7/$8/$9';
$route['delete-teacher-education/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/delete_teacher_education/$1/$2/$3/$4/$5/$6/$7/$8/$9';

//Teaching
$route['teacher-teaching'] = 'teacher/teacher_teaching';
$route['forms-teacher-teaching'] = 'forms_teacher/forms_teacher_teaching';
$route['edit-forms-teacher-teaching'] = 'forms_teacher/edit_teacher_teaching';
$route['add-teacher-teaching/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_teacher/add_teacher_teaching/$1/$2/$3/$4/$5/$6';
$route['update-teacher-teaching/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/update_teacher_teaching/$1/$2/$3/$4/$5/$6/$7/$8/$9';
$route['delete-teacher-teaching/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_teacher/delete_teacher_teaching/$1/$2/$3/$4/$5/$6/$7/$8/$9';
///////////////////// TEACHER - END /////////////////////////



////////////////////// ROUTE GRADUATED ////////////////////////
//GRADUATED 
$route['graduated'] = 'graduated';
$route['delete-graduated/(:any)/(:num)/(:num)/(:num)/(:num)'] = 'forms_graduated/delete_graduated/$1/$2/$3/$4/$5';

///////////////////// GRADUATED - END /////////////////////////

////////////////////// ROUTE Transcript ////////////////////////
//Transcript
$route['transcript'] = 'transcript';
$route['forms-transcript'] = 'forms_transcript';
$route['add-transcript/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript/$1/$2/$3/$4/$5/$6';
$route['edit-forms-transcript-main'] = 'forms_transcript/edit_transcript_main';
$route['edit-forms-transcript-evaluation'] = 'forms_transcript/edit_transcript_evaluation';
$route['update-transcript-main/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/update_transcript_main/$1/$2/$3/$4/$5/$6/$7/$8';
$route['update-transcript-evaluation/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/update_transcript_evaluation/$1/$2/$3/$4/$5/$6/$7/$8';
$route['delete-transcript/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript/$1/$2/$3/$4/$5/$6/$7/$8';

//transcript_student
$route['transcript-download'] = 'transcript/transcript_download';


//Subject
$route['transcript-subject'] = 'transcript/transcript_subject';
$route['forms-transcript-subject'] = 'forms_transcript/forms_transcript_subject';
$route['edit-forms-transcript-subject'] = 'forms_transcript/edit_forms_transcript_subject';
$route['add-transcript-subject/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_subject/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';
$route['delete-transcript-subject/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_subject/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';
$route['update-transcript-subject/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/update_transcript_subject/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';

//Activity
$route['transcript-activity'] = 'transcript/transcript_activity';
$route['forms-transcript-activity'] = 'forms_transcript/forms_transcript_activity';
$route['edit-forms-transcript-activity'] = 'forms_transcript/edit_forms_transcript_activity';
$route['add-transcript-activity/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_activity/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['delete-transcript-activity/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_activity/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['update-transcript-activity/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/update_transcript_activity/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';

//ONET
$route['transcript-onet'] = 'transcript/transcript_onet';
$route['forms-transcript-onet'] = 'forms_transcript/forms_transcript_onet';
$route['edit-forms-transcript-onet'] = 'forms_transcript/edit_forms_transcript_onet';
$route['add-transcript-onet/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_onet/$1/$2/$3/$4/$5/$6/$7/$8/$9';
$route['update-transcript-onet/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/update_transcript_onet/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';
$route['delete-transcript-onet/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_onet/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';

//NT
$route['transcript-nt'] = 'transcript/transcript_nt';
$route['forms-transcript-nt'] = 'forms_transcript/forms_transcript_nt';
$route['edit-forms-transcript-nt'] = 'forms_transcript/edit_forms_transcript_nt';
$route['add-transcript-nt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_nt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['update-transcript-nt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/update_transcript_nt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';
$route['delete-transcript-nt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_nt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';

//RT
$route['transcript-rt'] = 'transcript/transcript_rt';
$route['forms-transcript-rt'] = 'forms_transcript/forms_transcript_rt';
$route['edit-forms-transcript-rt'] = 'forms_transcript/edit_forms_transcript_rt';
$route['add-transcript-rt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_rt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['update-transcript-rt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/update_transcript_rt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11/$12';
$route['delete-transcript-rt/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_rt/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11/$12';

//RT
$route['transcript-competency'] = 'transcript/transcript_competency';
$route['forms-transcript-competency'] = 'forms_transcript/forms_transcript_competency';
$route['edit-forms-transcript-competency'] = 'forms_transcript/edit_forms_transcript_competency';
$route['add-transcript-competency/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)']['post'] = 'forms_transcript/add_transcript_competency/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['update-transcript-competency/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/update_transcript_competency/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';
$route['delete-transcript-competency/(:num)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_transcript/delete_transcript_competency/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11';

///////////////////// Transcript - END /////////////////////////

////////////////////// ROUTE PERSONNEL ////////////////////////
//PERSONNEL
$route['personnel'] = 'personnel';
$route['personnel-education'] = 'personnel/personnel_education';
$route['personnel-position'] = 'personnel/personnel_position';
$route['personnel-assistance'] = 'personnel/personnel_assistance';
$route['personnel-academic'] = 'personnel/personnel_academic';
$route['forms-personnel'] = 'forms_personnel';
$route['forms-personnel-education'] = 'forms_personnel/forms_personnel_education';
$route['forms-personnel-position'] = 'forms_personnel/forms_personnel_position';
$route['forms-personnel-assistance'] = 'forms_personnel/forms_personnel_assistance';
$route['forms-personnel-academic'] = 'forms_personnel/forms_personnel_academic';
$route['forms-personnel-select'] = 'forms_personnel/forms_personnel_select';
$route['add-personnel']['post'] = 'forms_personnel/add_personnel';
$route['add-personnel-education/(:any)/(:num)/(:num)/(:num)']['post'] = 'forms_personnel/add_personnel_education/$1/$2/$3/$4';
$route['add-personnel-position/(:any)/(:num)/(:num)/(:num)']['post'] = 'forms_personnel/add_personnel_position/$1/$2/$3/$4';
$route['add-personnel-assistance/(:any)/(:num)/(:num)/(:num)']['post'] = 'forms_personnel/add_personnel_assistance/$1/$2/$3/$4';
$route['add-personnel-academic/(:any)/(:num)/(:num)/(:num)']['post'] = 'forms_personnel/add_personnel_academic/$1/$2/$3/$4';
$route['edit-forms-personnel-main'] = 'forms_personnel/edit_forms_personnel_main';
$route['update-personnel-main/(:any)/(:num)/(:num)/(:num)/(:any)'] = 'forms_personnel/update_personnel_main/$1/$2/$3/$4/$5';
$route['edit-forms-personnel-person'] = 'forms_personnel/edit_forms_personnel_person';
$route['update-personnel-person/(:any)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_person/$1/$2/$3/$4';
$route['edit-forms-personnel-address'] = 'forms_personnel/edit_forms_personnel_address';
$route['update-personnel-address/(:any)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_address/$1/$2/$3/$4';
$route['edit-forms-personnel-contract'] = 'forms_personnel/edit_forms_personnel_contract';
$route['update-personnel-contract/(:any)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_contract/$1/$2/$3/$4';
$route['edit-forms-personnel-talent'] = 'forms_personnel/edit_forms_personnel_talent';
$route['update-personnel-talent/(:any)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_talent/$1/$2/$3/$4';
$route['edit-forms-personnel-education'] = 'forms_personnel/edit_forms_personnel_education';
$route['update-personnel-education/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_education/$1/$2/$3/$4/$5/$6/$7';
$route['edit-forms-personnel-position'] = 'forms_personnel/edit_forms_personnel_position';
$route['update-personnel-position/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)/(:any)'] = 'forms_personnel/update_personnel_position/$1/$2/$3/$4/$5/$6/$7';
$route['edit-forms-personnel-assistance'] = 'forms_personnel/edit_forms_personnel_assistance';
$route['update-personnel-assistance/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)/(:any)'] = 'forms_personnel/update_personnel_assistance/$1/$2/$3/$4/$5/$6/$7';
$route['edit-forms-personnel-academic'] = 'forms_personnel/edit_forms_personnel_academic';
$route['update-personnel-academic/(:any)/(:num)/(:num)/(:num)/(:num)'] = 'forms_personnel/update_personnel_academic/$1/$2/$3/$4/$5';

$route['delete-personnel-academic/(:any)/(:num)/(:num)/(:num)/(:num)'] = 'forms_personnel/delete_personnel_academic/$1/$2/$3/$4/$5';
$route['delete-personnel-position/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)'] = 'forms_personnel/delete_personnel_position/$1/$2/$3/$4/$5/$6';
$route['delete-personnel-assistance/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)'] = 'forms_personnel/delete_personnel_assistance/$1/$2/$3/$4/$5/$6';
$route['delete-personnel-education/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)'] = 'forms_personnel/delete_personnel_education/$1/$2/$3/$4/$5/$6/$7';
$route['delete-personnel/(:any)/(:num)/(:num)/(:num)'] = 'forms_personnel/delete_personnel/$1/$2/$3/$4';

///////////////////// PERSONNEL - END /////////////////////////

////////////////////// ROUTE innovation ////////////////////////
//innovation
$route['Fm_innovation'] = 'Fm_innovation';
$route['Fm_innovation_das_p1'] = 'Fm_innovation/sh1/$1';
$route['Fm_innovation_das_p2'] = 'Fm_innovation/sh2/$1';
$route['forms_p1'] = 'Fm_innovation/forms/$1';
$route['forms_p2'] = 'Fm_innovation/forms/$1';
$route['forms_up_p1'] = 'Fm_innovation/adding_sh1';
$route['forms_up_p2'] = 'Fm_innovation/adding_sh2';
$route['edit_p1'] = 'Fm_innovation/edit_sh1';
$route['edit_p2'] = 'Fm_innovation/edit_sh2';
$route['del_p1'] = 'Fm_innovation/del_sh1';
$route['del_p2'] = 'Fm_innovation/del_sh2';

///////////////////// innovation - END /////////////////////////

////////////////////// ROUTE lear_tech_media ////////////////////////
//lear_tech_media
$route['Fm_lear_tech_media'] = 'Fm_lear_tech_media';
$route['Fm_lear_tech_media_das_p1'] = 'Fm_lear_tech_media/sh1/$1';
$route['Fm_lear_tech_media_das_p2'] = 'Fm_lear_tech_media/sh2/$1';
$route['LTM_forms_p1'] = 'Fm_lear_tech_media/forms/$1';
$route['LTMC_forms_p2'] = 'Fm_lear_tech_media/forms/$1';
$route['LTM_forms_up_p1'] = 'Fm_lear_tech_media/adding_sh1';
$route['LTMC_forms_up_p2'] = 'Fm_lear_tech_media/adding_sh2';
$route['LTM_edit_p1'] = 'Fm_lear_tech_media/edit_sh1';
$route['LTMC_edit_p2'] = 'Fm_lear_tech_media/edit_sh2';
$route['LTM_del_p1'] = 'Fm_lear_tech_media/del_sh1';
$route['LTMC_del_p2'] = 'Fm_lear_tech_media/del_sh2';

///////////////////// lear_tech_media - END /////////////////////////

////////////////////// ROUTE best_practice ////////////////////////
//best_practice
$route['Fm_best_practice'] = 'Fm_best_practice';
$route['Fm_best_practice_das_p1'] = 'Fm_best_practice/sh1/$1';
$route['Fm_best_practice_das_p2'] = 'Fm_best_practice/sh2/$1';
$route['BP_forms_p1'] = 'Fm_best_practice/forms/$1';
$route['BPC_forms_p2'] = 'Fm_best_practice/forms/$1';
$route['BP_forms_up_p1'] = 'Fm_best_practice/add_sh1';
$route['BPC_forms_up_p2'] = 'Fm_best_practice/add_sh2';
$route['BP_edit_p1'] = 'Fm_best_practice/edit_sh1';
$route['BPC_edit_p2'] = 'Fm_best_practice/edit_sh2';
$route['BP_del_p1'] = 'Fm_best_practice/del_sh1';
$route['BPC_del_p2'] = 'Fm_best_practice/del_sh2';

///////////////////// best_practice - END /////////////////////////

////////////////////// ROUTE participant ////////////////////////
//participant
$route['Fm_participant'] = 'Fm_participant';
$route['Fm_participant_das_p1'] = 'Fm_participant/sh1/$1';
$route['Fm_participant_das_p2'] = 'Fm_participant/sh2/$1';
$route['Fm_participant_das_p3'] = 'Fm_participant/sh3/$1';
$route['Fm_participant_das_p4'] = 'Fm_participant/sh4/$1';
$route['par_forms_p1'] = 'Fm_participant/forms/$1';
$route['pc_forms_p2'] = 'Fm_participant/forms/$1';
$route['pcp_forms_p3'] = 'Fm_participant/forms/$1';
$route['pn_forms_p4'] = 'Fm_participant/forms/$1';
$route['par_forms_up_p1'] = 'Fm_participant/adding_sh1';
$route['pc_forms_up_p2'] = 'Fm_participant/adding_sh2';
$route['pcp_forms_up_p3'] = 'Fm_participant/adding_sh3';
$route['pn_forms_up_p4'] = 'Fm_participant/adding_sh4';
$route['par_edit_p1'] = 'Fm_participant/edit_sh1';
$route['pc_edit_p2'] = 'Fm_participant/edit_sh2';
$route['pcp_edit_p3'] = 'Fm_participant/edit_sh3';
$route['pn_edit_p4'] = 'Fm_participant/edit_sh4';
$route['par_del_p1'] = 'Fm_participant/del_sh1';
$route['pc_del_p2'] = 'Fm_participant/del_sh2';
$route['pcp_del_p3'] = 'Fm_participant/del_sh3';
$route['pn_del_p4'] = 'Fm_participant/del_sh4';

///////////////////// participant - END /////////////////////////
////////////////////// ROUTE committee ////////////////////////
//committee
$route['Fm_committee'] = 'Fm_committee';
$route['Fm_committee_das_p1'] = 'Fm_committee/committee/$1';
$route['Fm_committee_das_p2'] = 'Fm_committee/member/$1';
$route['c_forms_p1'] = 'Fm_committee/form_page/$1';
$route['cm_forms_p2'] = 'Fm_committee/form_page/$1';
$route['c_forms_up_p1'] = 'Fm_committee/adding';
$route['cm_forms_up_p2'] = 'Fm_committee/adding_member';
$route['c_edit_p1'] = 'Fm_committee/edit_committee';
$route['cm_edit_p2'] = 'Fm_committee/edit_member';
$route['c_del_p1'] = 'Fm_committee/del_committee';
$route['cm_del_p2'] = 'Fm_committee/del_member';

///////////////////// committee - END /////////////////////////

///////////////////// ROUTE evaluation ////////////////////////
//evaluation
$route['Fm_evaluation'] = 'Fm_evaluation';
$route['Fm_evaluation_das_p1'] = 'Fm_evaluation/sh1/$1';
$route['Fm_evaluation_das_p2'] = 'Fm_evaluation/sh2/$1';
$route['Fm_evaluation_das_p3'] = 'Fm_evaluation/sh3/$1';
$route['Fm_evaluation_das_p4'] = 'Fm_evaluation/sh4/$1';
$route['Fm_evaluation_das_p5'] = 'Fm_evaluation/sh5/$1';
$route['Fm_evaluation_das_p6'] = 'Fm_evaluation/sh6/$1';
$route['Fm_evaluation_das_p7'] = 'Fm_evaluation/sh7/$1';
$route['Fm_evaluation_das_p8'] = 'Fm_evaluation/sh8/$1';
$route['ass_ria_forms_p1'] = 'Fm_evaluation/forms/$1';
$route['ass_ria_lvl_forms_p2'] = 'Fm_evaluation/forms/$1';
$route['ass_ria_com_forms_p3'] = 'Fm_evaluation/forms/$1';
$route['ass_ria_com_lvl_forms_p4'] = 'Fm_evaluation/forms/$1';
$route['sc_ass_forms_p5'] = 'Fm_evaluation/forms/$1';
$route['sc_ass_ria_forms_p6'] = 'Fm_evaluation/forms/$1';
$route['sc_ass_res_forms_p7'] = 'Fm_evaluation/forms/$1';
$route['achie_ass_forms_p8'] = 'Fm_evaluation/forms/$1';
$route['ass_ria_forms_up_p1'] = 'Fm_evaluation/insert_ass_ria';
$route['ass_ria_lvl_forms_up_p2'] = 'Fm_evaluation/insert_ass_ria_lvl';
$route['ass_ria_com_forms_up_p3'] = 'Fm_evaluation/insert_ass_ria_com';
$route['ass_ria_com_lvl_forms_up_p4'] = 'Fm_evaluation/insert_ass_ria_com_lvl';
$route['sc_ass_forms_up_p5'] = 'Fm_evaluation/insert_sc_ass';
$route['sc_ass_ria_forms_up_p6'] = 'Fm_evaluation/insert_sc_ass_ria';
$route['sc_ass_res_forms_up_p7'] = 'Fm_evaluation/insert_sc_ass_res';
$route['achie_ass_forms_up_p8'] = 'Fm_evaluation/insert_achie_ass';
$route['ass_ria_edit_p1'] = 'Fm_evaluation/edit_ass_ria';
$route['ass_ria_lvl_edit_p2'] = 'Fm_evaluation/edit_ass_ria_lvl';
$route['ass_ria_com_edit_p3'] = 'Fm_evaluation/edit_ass_ria_com';
$route['ass_ria_com_lvl_edit_p4'] = 'Fm_evaluation/edit_ass_ria_com_lvl';
$route['sc_ass_edit_p5'] = 'Fm_evaluation/edit_sc_ass';
$route['sc_ass_ria_edit_p6'] = 'Fm_evaluation/edit_sc_ass_ria';
$route['sc_ass_res_edit_p7'] = 'Fm_evaluation/edit_sc_ass_res';
$route['achie_ass_edit_p8'] = 'Fm_evaluation/edit_achie_ass';
$route['ass_ria_del_p1'] = 'Fm_evaluation/del_ass_ria';
$route['ass_ria_lvl_del_p2'] = 'Fm_evaluation/del_ass_ria_lvl';
$route['ass_ria_com_del_p3'] = 'Fm_evaluation/del_ass_ria_com';
$route['ass_ria_com_lvl_del_p4'] = 'Fm_evaluation/del_ass_ria_com_lvl';
$route['sc_ass_del_p5'] = 'Fm_evaluation/del_sc_ass';
$route['sc_ass_ria_del_p6'] = 'Fm_evaluation/del_sc_ass_ria';
$route['sc_ass_res_del_p7'] = 'Fm_evaluation/del_sc_ass_res';
$route['achie_ass_del_p8'] = 'Fm_evaluation/del_achie_ass';

///////////////////// evaluation - END /////////////////////////
