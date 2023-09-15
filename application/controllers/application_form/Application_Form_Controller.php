<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Application_Form_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/variable_model');
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Family_Model');
        $this->load->model('application_form/Candidate_Education_History_Model');
        $this->load->model('application_form/Candidate_Courses_Model');
        $this->load->model('application_form/Candidate_Job_History_Model');
        $this->load->model('application_form/Candidate_Reference_Model');
        $this->load->model('application_form/Candidate_Emergency_Contact_Model');
        $this->load->model('application_form/Candidate_Social_Activity_Model');
        $this->load->model('application_form/Candidate_Hobby_Model');
        $this->load->model('application_form/Candidate_Achievement_Model');
        $this->load->model('application_form/Candidate_Language_Skill_Model');
        $this->load->model('application_form/Candidate_Computer_Skill_Model');
        $this->load->model('application_form/Candidate_Company_Structure_Model');
        $this->load->model('application_form/Candidate_Understanding_Position_Model');
        $this->load->model('application_form/Candidate_Character_Model');
        $this->load->model('application_form/Candidate_Health_Information_Model');
        $this->load->model('application_form/Candidate_Salary_Model');
        $this->load->model('application_form/Candidate_Question_Model');
        $this->load->model('application_form/Candidate_Header_Model');
        $this->load->model('application_form/Candidate_Attachment_Model');
        $this->load->model('master/company_model');
        $this->load->model('master/position_detail_model');



        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function GetApplicationForm()
    {

        $application_form_parameter = array('p_candidate_header_id' => 0, 'p_employee_id' => 0, 'p_flag' => 0);
        $data['ApplicationFormRecords'] = $this->Application_Form_Model->GetApplicationForm($application_form_parameter);


        //Candidate Family
        $candidate_family_parameter = array('p_candidate_family_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateFamilyRecords'] = $this->Candidate_Family_Model->GetCandidateFamily($candidate_family_parameter);

        //Candidate Family Flag Accordion
        $candidate_family_flag_accordion_parameter = array('p_candidate_family_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateFamilyFlagAccordionRecords'] = $this->Candidate_Family_Model->GetCandidateFamilyFlagAccordion($candidate_family_flag_accordion_parameter);

        //Candidate Education History
        $candidate_education_history_parameter = array('p_candidate_education_history_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateEducationHistoryRecords'] = $this->Candidate_Education_History_Model->GetCandidateEducationHistory($candidate_education_history_parameter);

        //Candidate Education History Flag Accordion
        $candidate_education_history_flag_accordion_parameter = array('p_candidate_education_history_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateEducationHistoryFlagAccordionRecords'] = $this->Candidate_Education_History_Model->GetCandidateEducationHistoryFlagAccordion($candidate_education_history_flag_accordion_parameter);

        //Candidate Family
        $variable_candidate_family_parameter = array('p_variable_type' => 'Candidate_Family', 'p_flag' => 0);
        $data['CandidateFamilyOptionRecords'] = $this->variable_model->GetVariable2($variable_candidate_family_parameter);

        //Candidate Education History
        $variable_candidate_education_history_parameter = array('p_variable_type' => 'Candidate_Education_History', 'p_flag' => 0);
        $data['CandidateEducationHistoryOptionRecords'] = $this->variable_model->GetVariable2($variable_candidate_education_history_parameter);

        //Candidate Courses
        $candidate_courses_parameter = array('p_candidate_courses_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCoursesRecords'] = $this->Candidate_Courses_Model->GetCandidateCourses($candidate_courses_parameter);

        //Candidate Courses Flag Accordion
        $candidate_courses_flag_accordion_parameter = array('p_candidate_courses_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCoursesFlagAccordionRecords'] = $this->Candidate_Courses_Model->GetCandidateCoursesFlagAccordion($candidate_courses_flag_accordion_parameter);

        //Candidate Job History
        $candidate_job_history_parameter = array('p_candidate_job_history_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateJobHistoryRecords'] = $this->Candidate_Job_History_Model->GetCandidateJobHistory($candidate_job_history_parameter);

        //Candidate Job History Flag Accordion
        $candidate_job_history_flag_accordion_parameter = array('p_candidate_job_history_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateJobHistoryFlagAccordionRecords'] = $this->Candidate_Job_History_Model->GetCandidateJobHistoryFlagAccordion($candidate_job_history_flag_accordion_parameter);

        //Candidate Reference
        $candidate_reference_parameter = array('p_candidate_reference_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateReferenceRecords'] = $this->Candidate_Reference_Model->GetCandidateReference($candidate_reference_parameter);

        //Candidate Reference Flag Accordion
        $candidate_reference_flag_accordion_parameter = array('p_candidate_reference_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateReferenceFlagAccordionRecords'] = $this->Candidate_Reference_Model->GetCandidateReferenceFlagAccordion($candidate_reference_flag_accordion_parameter);


        //Candidate Emergency Contact
        $candidate_emergency_contact_parameter = array('p_candidate_emergency_contact_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateEmergencyContactRecords'] = $this->Candidate_Emergency_Contact_Model->GetCandidateEmergencyContact($candidate_emergency_contact_parameter);

        //Candidate Emergency Contact Flag Accordion
        $candidate_emergency_contact_flag_accordion_parameter = array('p_candidate_emergency_contact_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateEmergencyContactFlagAccordionRecords'] = $this->Candidate_Emergency_Contact_Model->GetCandidateEmergencyContactFlagAccordion($candidate_emergency_contact_flag_accordion_parameter);

        //Candidate Social Activity
        $candidate_social_activity_parameter = array('p_candidate_social_activity_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateSocialActivityRecords'] = $this->Candidate_Social_Activity_Model->GetCandidateSocialActivity($candidate_social_activity_parameter);

        //Candidate Social Activity Flag Accordion
        $candidate_social_activity_flag_accordion_parameter = array('p_candidate_social_activity_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateSocialActivityFlagAccordionRecords'] = $this->Candidate_Social_Activity_Model->GetCandidateSocialActivityFlagAccordion($candidate_social_activity_flag_accordion_parameter);

        //Candidate Hobby
        $candidate_hobby_parameter = array('p_candidate_hobby_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateHobbyRecords'] = $this->Candidate_Hobby_Model->GetCandidateHobby($candidate_hobby_parameter);

        //Candidate Hobby Flag Accordion
        $candidate_hobby_flag_accordion_parameter = array('p_candidate_hobby_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateHobbyFlagAccordionRecords'] = $this->Candidate_Hobby_Model->GetCandidateHobbyFlagAccordion($candidate_hobby_flag_accordion_parameter);

        //Candidate Achievement
        $candidate_achievement_parameter = array('p_candidate_achievement_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateAchievementRecords'] = $this->Candidate_Achievement_Model->GetCandidateAchievement($candidate_achievement_parameter);

        //Candidate Achievement Flag Accordion
        $candidate_achievement_flag_accordion_parameter = array('p_candidate_achievement_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateAchievementFlagAccordionRecords'] = $this->Candidate_Achievement_Model->GetCandidateAchievementFlagAccordion($candidate_achievement_flag_accordion_parameter);

        //Candidate Language Skill
        $candidate_language_skill_parameter = array('p_candidate_language_skill_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateLanguageSkillRecords'] = $this->Candidate_Language_Skill_Model->GetCandidateLanguageSkill($candidate_language_skill_parameter);

        //Candidate Language Skill Flag Accordion
        $candidate_language_flag_accordion_skill_parameter = array('p_candidate_language_skill_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateLanguageSkillFlagAccordionRecords'] = $this->Candidate_Language_Skill_Model->GetCandidateLanguageSkillFlagAccordion($candidate_language_flag_accordion_skill_parameter);

        //Language Type
        $variable_language_type_parameter = array('p_variable_type' => 'Language_Type', 'p_flag' => 0);
        $data['LanguageTypeRecords'] = $this->variable_model->GetVariable2($variable_language_type_parameter);

        //Candidate Computer Skill
        $candidate_computer_skill_parameter = array('p_candidate_computer_skill_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateComputerSkillRecords'] = $this->Candidate_Computer_Skill_Model->GetCandidateComputerSkill($candidate_computer_skill_parameter);

        //Candidate Computer Skill Flag Accordion
        $candidate_computer_skill_flag_accordion_parameter = array('p_candidate_computer_skill_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateComputerSkillFlagAccordionRecords'] = $this->Candidate_Computer_Skill_Model->GetCandidateComputerSkillFlagAccordion($candidate_computer_skill_flag_accordion_parameter);

        //Candidate Company Structure
        $candidate_company_structure_parameter = array('p_candidate_company_structure_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCompanyStructureRecords'] = $this->Candidate_Company_Structure_Model->GetCandidateCompanyStructure($candidate_company_structure_parameter);

        //Candidate Company Structure Flag Accordion
        $candidate_company_structure_flag_accordion_parameter = array('p_candidate_company_structure_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCompanyStructureFlagAccordionRecords'] = $this->Candidate_Company_Structure_Model->GetCandidateCompanyStructureFlagAccordion($candidate_company_structure_flag_accordion_parameter);

        //Candidate Understanding Position
        $candidate_understanding_position_parameter = array('p_candidate_understanding_position_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateUnderstandingPositionRecords'] = $this->Candidate_Understanding_Position_Model->GetCandidateUnderstandingPosition($candidate_understanding_position_parameter);

        //Candidate Understanding Position Flag Accordion
        $candidate_understanding_position_flag_accordion_parameter = array('p_candidate_understanding_position_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateUnderstandingPositionFlagAccordionRecords'] = $this->Candidate_Understanding_Position_Model->GetCandidateUnderstandingPositionFlagAccordion($candidate_understanding_position_flag_accordion_parameter);

        //Candidate Count Understanding Position
        $candidate_count_understanding_position_parameter = array('p_candidate_understanding_position_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateUnderstandingPositionRecords'] = $this->Candidate_Understanding_Position_Model->GetCountCandidateUnderstandingPosition($candidate_count_understanding_position_parameter);

        //Candidate Character
        $candidate_character_parameter = array('p_candidate_charcater_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCharacterRecords'] = $this->Candidate_Character_Model->GetCandidateCharacter($candidate_character_parameter);

        //Candidate Character Flag Accordion
        $candidate_character_flag_accordion_parameter = array('p_candidate_charcater_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateCharacterFlagAccordionRecords'] = $this->Candidate_Character_Model->GetCandidateCharacterFlagAccordion($candidate_character_flag_accordion_parameter);

        //Candidate Count Character
        $candidate_count_character_parameter = array('p_candidate_charcater_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateCharacterRecords'] = $this->Candidate_Character_Model->GetCountCandidateCharacter($candidate_count_character_parameter);

        //Candidate Health Information
        $candidate_health_information_parameter = array('p_candidate_health_information_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateHealthInformationRecords'] = $this->Candidate_Health_Information_Model->GetCandidateHealthInformation($candidate_health_information_parameter);

        //Candidate Health Information Flag Accordion
        $candidate_health_flag_accordion_information_parameter = array('p_candidate_health_information_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateHealthInformationFlagAccordionRecords'] = $this->Candidate_Health_Information_Model->GetCandidateHealthInformationFlagAccordion($candidate_health_flag_accordion_information_parameter);

        //Candidate Count Health Information
        $candidate_count_health_information_parameter = array('p_candidate_health_information_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateHealthInformationRecords'] = $this->Candidate_Health_Information_Model->GetCountCandidateHealthInformation($candidate_count_health_information_parameter);

        //Candidate Salary
        $candidate_salary_parameter = array('p_candidate_salary_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateSalaryRecords'] = $this->Candidate_Salary_Model->GetCandidateSalary($candidate_salary_parameter);

        //Candidate Salary Flag Accordion
        $candidate_salary_flag_accordion_parameter = array('p_candidate_salary_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateSalaryFlagAccordionRecords'] = $this->Candidate_Salary_Model->GetCandidateSalaryFlagAccordion($candidate_salary_flag_accordion_parameter);

        //Candidate Count Salary
        $candidate_count_salary_parameter = array('p_candidate_salary_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateSalaryRecords'] = $this->Candidate_Salary_Model->GetCountCandidateSalary($candidate_count_salary_parameter);

        //Candidate Question
        $candidate_question_parameter = array('p_candidate_question_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateQuestionRecords'] = $this->Candidate_Question_Model->GetCandidateQuestion($candidate_question_parameter);

        //Candidate Question Flag Accordion
        $candidate_question_flag_accordion_parameter = array('p_candidate_question_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateQuestionFlagAccordionRecords'] = $this->Candidate_Question_Model->GetCandidateQuestionFlagAccordion($candidate_question_flag_accordion_parameter);

        //Candidate Count Question
        $candidate_count_question_parameter = array('p_candidate_question_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateQuestionRecords'] = $this->Candidate_Question_Model->GetCountCandidateQuestion($candidate_count_question_parameter);

        //Candidate Header
        $candidate_header_parameter = array('p_candidate_question_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateHeaderRecords'] = $this->Candidate_Header_Model->GetCandidateHeader($candidate_header_parameter);

        //Candidate Count Header
        $candidate_count_header_parameter = array('p_candidate_header_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CountCandidateHeaderRecords'] = $this->Candidate_Header_Model->GetCountCandidateHeader($candidate_count_header_parameter);

        //Company Dropdown
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //Position Detail Dropdown
        $position_detail_parameter = array('p_position_detail_id' => 0, 'p_flag' => 1);
        $data['PositionDetailRecords'] = $this->position_detail_model->GetPositionDetail($position_detail_parameter);

        //Variable Religion
        $variable_religion_parameter = array('p_variable_type' => 'Religion', 'p_flag' => 0);
        $data['ReligionRecords'] = $this->variable_model->GetVariable2($variable_religion_parameter);

        //Variable Citizen Status
        $variable_citizen_status_parameter = array('p_variable_type' => 'Citizen_Status', 'p_flag' => 0);
        $data['CitizenStatusRecords'] = $this->variable_model->GetVariable2($variable_citizen_status_parameter);

        //Variable Marital Status
        $variable_marital_status_parameter = array('p_variable_type' => 'Marital_Status', 'p_flag' => 0);
        $data['MaritalStatusRecords'] = $this->variable_model->GetVariable2($variable_marital_status_parameter);

        //Variable Gender
        $variable_gender_parameter = array('p_variable_type' => 'Gender', 'p_flag' => 0);
        $data['GenderRecords'] = $this->variable_model->GetVariable2($variable_gender_parameter);

        //Variable Driving License Type
        $variable_driving_license_type_parameter = array('p_variable_type' => 'Driving_License_Type', 'p_flag' => 0);
        $data['DrivingLicenseTypeRecords'] = $this->variable_model->GetVariable2($variable_driving_license_type_parameter);

        //Variable Vehicle Type
        $variable_vehicle_type_parameter = array('p_variable_type' => 'vehicle_type', 'p_flag' => 0);
        $data['VehicleTypeRecords'] = $this->variable_model->GetVariable2($variable_vehicle_type_parameter);

        //Variable Vehicle Type
        $variable_vehicle_ownership_status_parameter = array('p_variable_type' => 'vehicle_ownership_status', 'p_flag' => 0);
        $data['VehicleOwnershipStatusRecords'] = $this->variable_model->GetVariable2($variable_vehicle_ownership_status_parameter);

        //Variable Status of Residence
        $variable_status_of_residence_parameter = array('p_variable_type' => 'status_of_residence', 'p_flag' => 0);
        $data['StatusofResidenceRecords'] = $this->variable_model->GetVariable2($variable_status_of_residence_parameter);

        //Candidate Attachment 
        $candidate_attachment_parameter = array('p_candidate_attachment_id' => 0, 'p_request_candidate_id' => $this->session->userdata('request_candidate_id'), 'p_flag' => 0);
        $data['CandidateAttachmentRecords'] = $this->Candidate_Attachment_Model->GetCandidateAttachment($candidate_attachment_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("application_form/Application_Form", $this->global, $data, NULL);
    }
}
