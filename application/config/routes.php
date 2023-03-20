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
$route['delete-curriculum/(:num)'] = 'CurriculumController/delete_curriculum/$1';
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
//teacher_developmant_activity
$route['list-teacher_development_activity'] = 'Teacher_development_activity_controller/list_teacher_development_activity';
$route['forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms';
$route['add_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/add_teacher_development_activity';
$route['edit_forms-teacher_development_activity'] = 'Teacher_development_activity_controller/forms_edit_teacher_development_activity';
$route['edit_teacher_development_activity']['post'] = 'Teacher_development_activity_controller/edit_teacher_development_activity';
$route['delete-teacher_development_activity'] = 'Teacher_development_activity_controller/delete_teacher_development_activity';
//Files
$route['load_file'] = 'DocumentController/load_file';
//budget
$route['list-budget'] = 'BudgetController/list_budget';
$route['edit_forms_budget'] = 'BudgetController/edit_forms_budget';
$route['forms-budget'] = 'BudgetController/forms_budget';
$route['add-budget']['post'] = 'BudgetController/add_budget';
//curriculum_plan
$route['list-curriculum_plan'] = 'CurriculumController/list_curriculum_plan';
$route['forms-curriculum_plan'] = 'CurriculumController/forms_curriculum_plan';





//area_identitty
$route['forms-area_identitty'] = 'Area_identittyController/forms_Area_identitty';



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

////////////////////// ROUTE GRADUATED ////////////////////////
//GRADUATED 
$route['graduated'] = 'graduated';
$route['graduated-P2'] = 'graduated/P2';
$route['forms-graduated'] = 'forms_graduated';                                                                                                                                                                                  
///////////////////// GRADUATED - END /////////////////////////

////////////////////// ROUTE PERSONNEL ////////////////////////
//PERSONNEL
$route['personnel'] = 'personnel';
$route['forms-personnel'] = 'forms_personnel';
$route['forms-personnel-P2'] = 'forms_personnel/P2';
$route['add-personnel']['post'] = 'forms_personnel/add_personnel';
$route['edit-forms-personnel'] = 'forms_personnel/edit_personnel';
$route['update-personnel/(:any)'] = 'forms_personnel/update_personnel/$1';
$route['delete-personnel/(:any)'] = 'forms_personnel/delete_personnel/$1';

//AdditionalPosition
$route['personnel-additionalposition'] = 'personnel/additional_position';
$route['forms-personnel-additionalposition'] = 'forms_personnel/forms_additionalposition';
$route['add-additionalposition/(:any)']['post'] = 'forms_personnel/add_additionalposition/$1';
$route['edit-forms-personnel-additionalposition'] = 'forms_personnel/edit_additionalposition';
$route['update-additionalposition/(:any)/(:num)'] = 'forms_personnel/update_additionalposition/$1/$2';
$route['delete-additionalposition/(:any)/(:num)'] = 'forms_personnel/delete_additionalposition/$1/$2';

//Academic
$route['personnel-academic'] = 'personnel/academic';
$route['forms-personnel-academic'] = 'forms_personnel/forms_academic';
$route['add-academic/(:any)']['post'] = 'forms_personnel/add_academic/$1';
$route['edit-forms-personnel-academic'] = 'forms_personnel/edit_academic';
$route['update-academic/(:any)/(:num)'] = 'forms_personnel/update_academic/$1/$2';
$route['delete-academic/(:any)/(:num)'] = 'forms_personnel/delete_academic/$1/$2';

//Education
$route['personnel-education'] = 'personnel/education';
$route['forms-personnel-education'] = 'forms_personnel/forms_education';
$route['add-education/(:any)']['post'] = 'forms_personnel/add_education/$1';
$route['edit-forms-personnel-education'] = 'forms_personnel/edit_education';
$route['update-education/(:any)/(:num)/(:num)'] = 'forms_personnel/update_education/$1/$2/$3';
$route['delete-education/(:any)/(:num)/(:num)'] = 'forms_personnel/delete_education/$1/$2/$3';

//Assistance
$route['personnel-assistance'] = 'personnel/assistance';
$route['forms-personnel-assistance'] = 'forms_personnel/forms_assistance';
$route['add-assistance/(:any)']['post'] = 'forms_personnel/add_assistance/$1';
$route['edit-forms-personnel-assistance'] = 'forms_personnel/edit_assistance';
$route['update-assistance/(:any)/(:num)/(:num)'] = 'forms_personnel/update_assistance/$1/$2/$3';
$route['delete-assistance/(:any)/(:num)/(:num)'] = 'forms_personnel/delete_assistance/$1/$2/$3';
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



