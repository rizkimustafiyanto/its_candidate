<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "Login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/


// $route['logout'] = 'employee/logout';
$route['logout'] = 'Employee/logout';
$route['employeeListing'] = 'employee/employeeListing';
$route['employeeListing/(:num)'] = "employee/employeeListing/$1";
$route['addNew'] = "employee/addNew";

// Login
$route['Login'] = 'login_controller/Login';
$route['ChangePass'] = 'profile/profile_controller/ChangePass';
$route['Dashboard'] = 'dashboard/Dashboard_Candidate_Controller';

// Profile Employee
$route['Profile'] = "profile/profile_controller/GetProfile";

// Home
$route['RoleUser'] = 'login_controller/cekRole';
$route['Home'] = 'login_controller/home';

//Application Form
$route['ApplicationForm'] = 'application_form/Application_Form_Controller/GetApplicationForm';

//CANDIDATE FORM
//Candidate Family
$route['InsertCandidateFamily'] = "application_form/Candidate_Family_Controller/InsertCandidateFamily";
$route['UpdateCandidateFamily'] = "application_form/Candidate_Family_Controller/UpdateCandidateFamily";
$route['DeleteCandidateFamily/(:any)'] = "application_form/Candidate_Family_Controller/DeleteCandidateFamily/$1";
$route['CandidateFamilyNext'] = "application_form/Candidate_Family_Controller/CandidateFamilyNext";


//Candidate Education History
$route['InsertCandidateEducationHistory'] = "application_form/Candidate_Education_History_Controller/InsertCandidateEducationHistory";
$route['UpdateCandidateEducationHistory'] = "application_form/Candidate_Education_History_Controller/UpdateCandidateEducationHistory";
$route['DeleteCandidateEducationHistory/(:any)'] = "application_form/Candidate_Education_History_Controller/DeleteCandidateEducationHistory/$1";
$route['CandidateEducationHistoryNext'] = "application_form/Candidate_Education_History_Controller/CandidateEducationHistoryNext";


//Candidate Courses
$route['InsertCandidateCourses'] = "application_form/Candidate_Courses_Controller/InsertCandidateCourses";
$route['UpdateCandidateCourses'] = "application_form/Candidate_Courses_Controller/UpdateCandidateCourses";
$route['DeleteCandidateCourses/(:any)'] = "application_form/Candidate_Courses_Controller/DeleteCandidateCourses/$1";
$route['CandidateCoursesNext'] = "application_form/Candidate_Courses_Controller/CandidateCoursesNext";

//Candidate Job History
$route['InsertCandidateJobHistory'] = "application_form/Candidate_Job_History_Controller/InsertCandidateJobHistory";
$route['UpdateCandidateJobHistory'] = "application_form/Candidate_Job_History_Controller/UpdateCandidateJobHistory";
$route['DeleteCandidateJobHistory/(:any)'] = "application_form/Candidate_Job_History_Controller/DeleteCandidateJobHistory/$1";
$route['CandidateJobHistoryNext'] = "application_form/Candidate_Job_History_Controller/CandidateJobHistoryNext";


//Candidate Reference
$route['InsertCandidateReference'] = "application_form/Candidate_Reference_Controller/InsertCandidateReference";
$route['UpdateCandidateReference'] = "application_form/Candidate_Reference_Controller/UpdateCandidateReference";
$route['DeleteCandidateReference/(:any)'] = "application_form/Candidate_Reference_Controller/DeleteCandidateReference/$1";
$route['CandidateReferenceNext'] = "application_form/Candidate_Reference_Controller/CandidateReferenceNext";

//Candidate Emergency Contact
$route['InsertCandidateEmergencyContact'] = "application_form/Candidate_Emergency_Contact_Controller/InsertCandidateEmergencyContact";
$route['UpdateCandidateEmergencyContact'] = "application_form/Candidate_Emergency_Contact_Controller/UpdateCandidateEmergencyContact";
$route['DeleteCandidateEmergencyContact/(:any)'] = "application_form/Candidate_Emergency_Contact_Controller/DeleteCandidateEmergencyContact/$1";
$route['CandidateEmergencyContactNext'] = "application_form/Candidate_Emergency_Contact_Controller/CandidateEmergencyContactNext";

//Candidate Social Activity
$route['InsertCandidateSocialActivity'] = "application_form/Candidate_Social_Activity_Controller/InsertCandidateSocialActivity";
$route['UpdateCandidateSocialActivity'] = "application_form/Candidate_Social_Activity_Controller/UpdateCandidateSocialActivity";
$route['DeleteCandidateSocialActivity/(:any)'] = "application_form/Candidate_Social_Activity_Controller/DeleteCandidateSocialActivity/$1";
$route['CandidateSocialActivityNext'] = "application_form/Candidate_Social_Activity_Controller/CandidateSocialActivityNext";

//Candidate Hobby
$route['InsertCandidateHobby'] = "application_form/Candidate_Hobby_Controller/InsertCandidateHobby";
$route['UpdateCandidateHobby'] = "application_form/Candidate_Hobby_Controller/UpdateCandidateHobby";
$route['DeleteCandidateHobby/(:any)'] = "application_form/Candidate_Hobby_Controller/DeleteCandidateHobby/$1";
$route['CandidateHobbyNext'] = "application_form/Candidate_Hobby_Controller/CandidateHobbyNext";

//Candidate Achievement
$route['InsertCandidateAchievement'] = "application_form/Candidate_Achievement_Controller/InsertCandidateAchievement";
$route['UpdateCandidateAchievement'] = "application_form/Candidate_Achievement_Controller/UpdateCandidateAchievement";
$route['DeleteCandidateAchievement/(:any)'] = "application_form/Candidate_Achievement_Controller/DeleteCandidateAchievement/$1";
$route['CandidateAchievementNext'] = "application_form/Candidate_Achievement_Controller/CandidateAchievementNext";

//Candidate Language Skill
$route['InsertCandidateLanguageSkill'] = "application_form/Candidate_Language_Skill_Controller/InsertCandidateLanguageSkill";
$route['UpdateCandidateLanguageSkill'] = "application_form/Candidate_Language_Skill_Controller/UpdateCandidateLanguageSkill";
$route['DeleteCandidateLanguageSkill/(:any)'] = "application_form/Candidate_Language_Skill_Controller/DeleteCandidateLanguageSkill/$1";
$route['CandidateLanguageSkillNext'] = "application_form/Candidate_Language_Skill_Controller/CandidateLanguageSkillNext";

//Candidate Computer Skill
$route['InsertCandidateComputerSkill'] = "application_form/Candidate_Computer_Skill_Controller/InsertCandidateComputerSkill";
$route['UpdateCandidateComputerSkill'] = "application_form/Candidate_Computer_Skill_Controller/UpdateCandidateComputerSkill";
$route['DeleteCandidateComputerSkill/(:any)'] = "application_form/Candidate_Computer_Skill_Controller/DeleteCandidateComputerSkill/$1";
$route['CandidateComputerSkillNext'] = "application_form/Candidate_Computer_Skill_Controller/CandidateComputerSkillNext";

//Candidate Company Structure
$route['InsertCandidateCompanyStructure'] = "application_form/Candidate_Company_Structure_Controller/InsertCandidateCompanyStructure";
$route['DeleteCandidateCompanyStructure/(:any)/(:any)'] = "application_form/Candidate_Company_Structure_Controller/DeleteCandidateCompanyStructure/$1/$2";
$route['CandidateCompanyStructureNext'] = "application_form/Candidate_Company_Structure_Controller/CandidateCompanyStructureNext";


//Candidate Understanding Position
$route['InsertCandidateUnderstandingPosition'] = "application_form/Candidate_Understanding_Position_Controller/InsertCandidateUnderstandingPosition";
$route['DeleteCandidateUnderstandingPosition/(:any)'] = "application_form/Candidate_Understanding_Position_Controller/DeleteCandidateUnderstandingPosition/$1";
$route['CandidateUnderstandingPositionNext'] = "application_form/Candidate_Understanding_Position_Controller/CandidateUnderstandingPositionNext";

//Candidate Character 
$route['InsertCandidateCharacter'] = "application_form/Candidate_Character_Controller/InsertCandidateCharacter";
$route['DeleteCandidateCharacter/(:any)'] = "application_form/Candidate_Character_Controller/DeleteCandidateCharacter/$1";
$route['CandidateCharacterNext'] = "application_form/Candidate_Character_Controller/CandidateCharacterNext";

//Candidate Health Information 
$route['InsertCandidateHealthInformation'] = "application_form/Candidate_Health_Information_Controller/InsertCandidateHealthInformation";
$route['DeleteCandidateHealthInformation/(:any)'] = "application_form/Candidate_Health_Information_Controller/DeleteCandidateHealthInformation/$1";
$route['CandidateHealthInformationNext'] = "application_form/Candidate_Health_Information_Controller/CandidateHealthInformationNext";

//Candidate Salary  
$route['InsertCandidateSalary'] = "application_form/Candidate_Salary_Controller/InsertCandidateSalary";
$route['DeleteCandidateSalary/(:any)'] = "application_form/Candidate_Salary_Controller/DeleteCandidateSalary/$1";
$route['CandidateSalaryNext'] = "application_form/Candidate_Salary_Controller/CandidateSalaryNext";

//Candidate Question  
$route['InsertCandidateQuestion'] = "application_form/Candidate_Question_Controller/InsertCandidateQuestion";
$route['DeleteCandidateQuestion/(:any)'] = "application_form/Candidate_Question_Controller/DeleteCandidateQuestion/$1";
$route['CandidateQuestionNext'] = "application_form/Candidate_Question_Controller/CandidateQuestionNext";

//Candidate Header  
$route['InsertCandidateHeader'] = "application_form/Candidate_Header_Controller/InsertCandidateHeader";
$route['CandidateHeaderNext'] = "application_form/Candidate_Header_Controller/CandidateHeaderNext";

//Candidate Attachment  
$route['InsertCandidateAttachment'] = "application_form/Candidate_Attachment_Controller/InsertCandidateAttachment";
$route['DeleteCandidateAttachment/(:any)'] = "application_form/Candidate_Attachment_Controller/DeleteCandidateAttachment/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */