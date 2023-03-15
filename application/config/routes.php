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

$route['default_controller'] = "login";
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
$route['DashboardAdmin'] = 'dashboard/dashboard_admin_controller';
$route['DashboardEmployee'] = 'dashboard/dashboard_employee_controller';

// Menu 
$route['Menu'] = "master/menu_controller/GetMenu";
$route['InsertMenu'] = "master/menu_controller/InsertMenu";
$route['GetMenuById/(:num)'] = "master/menu_controller/GetMenuById/$1";
$route['UpdateMenu'] = "master/menu_controller/UpdateMenu";
$route['DeleteMenu/(:num)'] = "master/menu_controller/DeleteMenu/$1";

// Sub Menu 
$route['SubMenu'] = "master/sub_menu_controller/GetSubMenu";
$route['InsertSubMenu'] = "master/sub_menu_controller/InsertSubMenu";
$route['GetSubMenuById/(:num)'] = "master/sub_menu_controller/GetSubMenuById/$1";
$route['GetSubMenuByMenuId'] = "master/sub_menu_controller/GetSubMenuByMenuId";
$route['UpdateSubMenu'] = "master/sub_menu_controller/UpdateSubMenu";
$route['DeleteSubMenu/(:num)'] = "master/sub_menu_controller/DeleteSubMenu/$1";

// Division
$route['Division'] = "master/division_controller/GetDivision";
$route['InsertDivision'] = "master/division_controller/InsertDivision";
$route['GetDivisionById/(:any)'] = "master/division_controller/GetDivisionById/$1";
$route['GetDivisionByCompanyId'] = "master/division_controller/GetDivisionByCompanyId";
$route['GetDivisionByCompanyId2'] = "master/division_controller/GetDivisionByCompanyId2";
$route['GetDivisionById/(:any)'] = "master/division_controller/GetDivisionById/$1";

//Address  City and Province
$route['GetCityByProvinceId'] = "master/city_controller/GetCityByProvinceId";
$route['GetProvinceByCountryId'] = "master/province_controller/GetProvinceByCountryId";
$route['UpdateDivision'] = "master/division_controller/UpdateDivision";
$route['DeleteDivision/(:any)'] = "master/division_controller/DeleteDivision/$1";

// Department
$route['Department'] = "master/department_controller/GetDepartment";
$route['InsertDepartment'] = "master/department_controller/InsertDepartment";
$route['GetDepartmentById/(:any)'] = "master/department_controller/GetDepartmentById/$1";
$route['GetDepartmentByMenuId'] = "master/department_controller/GetDepartmentByMenuId";
$route['GetDepartmentByDivisionId'] = "master/department_controller/GetDepartmentByDivisionId";
$route['GetDepartmentByDivisionId2'] = "master/department_controller/GetDepartmentByDivisionId2";
$route['UpdateDepartment'] = "master/department_controller/UpdateDepartment";
$route['DeleteDepartment/(:any)'] = "master/department_controller/DeleteDepartment/$1";

// Role 
$route['Role'] = "master/role_controller/GetRole";
$route['InsertRole'] = "master/role_controller/InsertRole";
$route['GetRoleById/(:num)'] = "master/role_controller/GetRoleById/$1";
$route['UpdateRole'] = "master/role_controller/UpdateRole";
$route['DeleteRole/(:num)'] = "master/role_controller/DeleteRole/$1";

// Menu Role
$route['MenuRole'] = "master/menu_role_controller/GetMenuRole";
$route['InsertMenuRole'] = "master/menu_role_controller/InsertMenuRole";
$route['GetMenuRoleById/(:num)'] = "master/menu_role_controller/GetMenuRoleById/$1";
$route['UpdateMenuRole'] = "master/menu_role_controller/UpdateMenuRole";
$route['DeleteMenuRole/(:num)'] = "master/menu_role_controller/DeleteMenuRole/$1";

// Employee
$route['Employee'] = "master/employee_controller/GetEmployee";
$route['InsertEmployee'] = "master/employee_controller/InsertEmployee";
$route['GetEmployeeById/(:any)'] = "master/employee_controller/GetEmployeeById/$1";
$route['UpdateEmployee'] = "master/employee_controller/UpdateEmployee";
$route['DeleteEmployee/(:any)'] = "master/employee_controller/DeleteEmployee/$1";
$route['EmployeeDetail/(:any)'] = "master/employee_controller/GetEmployeeById/$1";

// Variable 
$route['Variable'] = "master/variable_controller/GetVariable";
$route['InsertVariable'] = "master/variable_controller/InsertVariable";
$route['GetVariableById/(:any)'] = "master/variable_controller/GetVariableById/$1";
$route['UpdateVariable'] = "master/variable_controller/UpdateVariable";
$route['DeleteVariable/(:any)'] = "master/variable_controller/DeleteVariable/$1";

// Company 
$route['Company'] = "master/company_controller/GetCompany";
$route['GetCompanyById/(:any)/(:any)'] = "master/company_controller/GetCompanyById/$1/$2";
$route['InsertCompany'] = "master/company_controller/InsertCompany";
$route['UpdateCompany'] = "master/company_controller/UpdateCompany";
$route['DeleteCompany/(:any)'] = "master/company_controller/DeleteCompany/$1";

// Leave
$route['Leave'] = "leave/leave_controller/GetLeave";
$route['InsertLeave'] = "leave/leave_controller/InsertLeave";
$route['GetLeaveById/(:num)'] = "leave/leave_controller/GetLeaveById/$1";
$route['UpdateLeave'] = "leave/leave_controller/UpdateLeave";
$route['SubmitLeave'] = "leave/leave_controller/SubmitLeave";
$route['DeleteLeave/(:any)'] = "leave/leave_controller/DeleteLeave/$1";
$route['LeaveDetail/(:any)'] = "leave/leave_controller/GetLeaveById/$1";
$route['UpdateLeaveApproval'] = "leave/leave_approval_controller/UpdateLeaveApproval";

// Leave Date Time
$route['LeaveDateTime'] = "leave/leavedatetime_controller/GetLeaveDateTime";
$route['InsertLeaveDateTime'] = "leave/leavedatetime_controller/InsertLeaveDateTime";
$route['GetLeaveDateTimeById/(:num)'] = "leave/leavedatetime_controller/GetLeaveDateTimeById/$1";
$route['UpdateLeaveDateTime'] = "leave/leavedatetime_controller/UpdateLeaveDateTime";
$route['DeleteLeaveDateTime/(:num)'] = "leave/leavedatetime_controller/DeleteLeaveDateTime/$1";
$route['LeaveDateTimeDetail/(:any)'] = "leave/leavedatetime_controller/GetLeaveDateTimeById/$1";
$route['DeleteLeaveDateTime/(:any)/(:any)'] = "leave/leavedatetime_controller/DeleteLeaveDateTime/$1/$2";

// Sick Leave
$route['SickLeave'] = "sickleave/sick_leave_controller/GetSickLeave";
$route['InsertSickLeave'] = "sickleave/sick_leave_controller/InsertSickLeave";
$route['UpdateSickLeave'] = "sickleave/sick_leave_controller/UpdateSickLeave";
$route['SubmitSickLeave'] = "sickleave/sick_leave_controller/SubmitSickLeave";
$route['DeleteSickLeave/(:any)'] = "sickleave/sick_leave_controller/DeleteSickLeave/$1";
$route['SickLeaveDetail/(:any)'] = "sickleave/sick_leave_controller/GetSickLeaveById/$1";
$route['UpdateSickLeaveApproval'] = "sickleave/sickleave_approval_controller/UpdateSickLeaveApproval";

// Sick Leave Date Time
$route['SickLeaveDateTime'] = "sickleave/sickleavedatetime_controller/GetSickLeaveDateTime";
$route['InsertSickLeaveDateTime'] = "sickleave/sickleavedatetime_controller/InsertSickLeaveDateTime";
$route['GetSickLeaveDateTimeById/(:num)'] = "sickleave/sickleavedatetime_controller/GetSickLeaveDateTimeById/$1";
$route['UpdateSickLeaveDateTime'] = "sickleave/sickleavedatetime_controller/UpdateSickLeaveDateTime";
$route['DeleteSickLeaveDateTime/(:num)'] = "sickleave/sickleavedatetime_controller/DeleteSickLeaveDateTime/$1";
$route['SickLeaveDateTimeDetail/(:any)'] = "sickleave/sickleavedatetime_controller/GetLeaveDateTimeById/$1";
$route['DeleteSickLeaveDateTime/(:any)/(:any)'] = "sickleave/sickleavedatetime_controller/DeleteSickLeaveDateTime/$1/$2";
$route['DeleteSickLeaveDateTime/(:any)'] = "sickleave/sickleavedatetime_controller/DeleteSickLeaveDateTime/$1";

// Sick Leave Attachment
$route['SickLeaveAttachment'] = "sickleave/sickleaveattachment_controller/GetSickLeaveAttachment";
$route['InsertSickLeaveAttachment'] = "sickleave/sickleaveattachment_controller/InsertSickLeaveAttachment";
$route['GetSickLeaveAttachmentById/(:num)'] = "sickleave/sickleaveattachment_controller/GetSickLeaveAttachmentById/$1";
$route['SickLeaveAttachmentDetail/(:any)'] = "sickleave/sickleaveattachment_controller/GetLeaveAttachmentById/$1";
$route['DeleteSickLeaveAttachment/(:any)/(:any)/(:any)'] = "sickleave/sickleaveattachment_controller/DeleteSickLeaveAttachment/$1/$2/$3";
$route['DeleteSickLeaveAttachment/(:any)'] = "sickleave/sickleaveattachment_controller/DeleteSickLeaveAttachment/$1";
$route['DownloadSickLeaveAttachment/(:any)/(:any)'] = "sickleave/sickleaveattachment_controller/DownloadSickLeaveAttachment/$1/$2";
$route['upload/(:any)'] = "sickleave/sickleaveattachment_controller/upload/$1";

// Overtime
$route['Overtime'] = "overtime/overtime_controller/GetOvertime";
$route['InsertOvertime'] = "overtime/overtime_controller/InsertOvertime";
$route['GetOvertimeById/(:any)/(:any)'] = "overtime/overtime_controller/GetOvertimeById/$1/$2";
$route['UpdateOvertime'] = "overtime/overtime_controller/UpdateOvertime";
$route['SubmitOvertime'] = "overtime/overtime_controller/SubmitOvertime";
$route['DeleteOvertime/(:any)'] = "overtime/overtime_controller/DeleteOvertime/$1";
$route['OvertimeDetail/(:any)/(:any)'] = "overtime/overtime_controller/GetOvertimeById/$1/$2";
$route['UpdateOvertimeApproval'] = "overtime/overtime_approval_controller/UpdateOvertimeApproval";
$route['UpdateOvertimeConfirmation'] = "overtime/overtime_confirmation_controller/UpdateOvertimeConfirmation";

// Employee Role 
$route['EmployeeRole'] = "master/employee_role_controller/GetEmployeeRole";
$route['InsertEmployeeRole'] = "master/employee_role_controller/InsertEmployeeRole";
$route['GetEmployeeRoleById/(:num)'] = "master/employee_role_controller/GetEmployeeRoleById/$1";
$route['UpdateEmployeeRole'] = "master/employee_role_controller/UpdateEmployeeRole";
$route['DeleteEmployeeRole/(:num)'] = "master/employee_role_controller/DeleteEmployeeRole/$1";

// Paid Leave Level
$route['PaidLeaveLevel'] = "master/paid_leave_level_controller/GetPaidLeaveLevel";
$route['InsertPaidLeaveLevel'] = "master/paid_leave_level_controller/InsertPaidLeaveLevel";
$route['GetPaidLeaveLevelById/(:any)'] = "master/paid_leave_level_controller/GetPaidLeaveLevelById/$1";
$route['UpdatePaidLeaveLevel'] = "master/paid_leave_level_controller/UpdatePaidLeaveLevel";
$route['DeletePaidLeaveLevel/(:any)'] = "master/paid_leave_level_controller/DeletePaidLeaveLevel/$1";

// Paid Leave 
$route['PaidLeave'] = "paidleave/paidleave_controller/GetPaidLeave";
$route['InsertPaidLeave'] = "paidleave/paidleave_controller/InsertPaidLeave";
$route['GetPaidLeaveById/(:any)/(:any)/(:any)'] = "paidleave/paidleave_controller/GetPaidLeaveById/$1/$2/$3";
$route['UpdatePaidLeave'] = "paidleave/paidleave_controller/UpdatePaidLeave";
$route['SubmitPaidLeave'] = "paidleave/paidleave_controller/SubmitPaidLeave";
$route['DeletePaidLeave/(:any)'] = "paidleave/paidleave_controller/DeletePaidLeave/$1";
$route['PaidLeaveDetail/(:any)/(:any)/(:any)'] = "paidleave/paidleave_controller/GetPaidLeaveById/$1/$2/$3";
$route['UpdatePaidLeaveStatus'] = "paidleave/paidleave_controller/UpdatePaidLeaveStatus";
$route['UpdatePaidLeaveApproval'] = "paidleave/paidleave_approval_controller/UpdatePaidLeaveApproval";
$route['RequestCanceled'] = "paidleave/paidleave_controller/RequestCanceled";
$route['UpdatePaidLeaveCancelApproval'] = "paidleave/paidleave_approval_controller/UpdatePaidLeaveCancelApproval";


// Paid Leave Date Time
$route['PaidLeaveDateTime'] = "paidleave/paidleavedatetime_controller/GetPaidLeaveDateTime";
$route['InsertPaidLeaveDateTime'] = "paidleave/paidleavedatetime_controller/InsertPaidLeaveDateTime";
$route['GetPaidLeaveDateTimeById/(:num)'] = "paidleave/paidleavedatetime_controller/GetPaidLeaveDateTimeById/$1";
$route['UpdatePaidLeaveDateTime'] = "paidleave/paidleavedatetime_controller/UpdatePaidLeaveDateTime";
$route['DeletePaidLeaveDateTime/(:num)'] = "paidleave/paidleavedatetime_controller/DeletePaidLeaveDateTime/$1";
$route['DeletePaidLeaveDateTime/(:any)/(:any)/(:any)/(:any)'] = "paidleave/paidleavedatetime_controller/DeletePaidLeaveDateTime/$1/$2/$3/$4";
$route['DeletePaidLeaveDateTime/(:any)'] = "paidleave/paidleavedatetime_controller/DeletePaidLeaveDateTime/$1";

// Extended Paid Leave
$route['ExtPaidLeave'] = "master/employee_ext_paid_leave_controller/GetExtPaidLeave";
$route['InsertExtPaidLeave'] = "master/employee_ext_paid_leave_controller/InsertExtPaidLeave";
$route['GetExtPaidLeaveById/(:num)'] = "master/employee_ext_paid_leave_controller/GetExtPaidLeaveById/$1";
$route['UpdateExtPaidLeave'] = "master/employee_ext_paid_leave_controller/UpdateExtPaidLeave";
$route['DeleteExtPaidLeave/(:any)/(:any)'] = "master/employee_ext_paid_leave_controller/DeleteExtPaidLeave/$1/$2";

// Employee Leader / Approver 
$route['EmployeeLeader'] = "master/employee_leader_controller/GetEmployeeLeader";
$route['EmployeeLeaderFilter'] = "master/employee_leader_controller/GetEmployeeLeaderFilter";
$route['InsertEmployeeLeader'] = "master/employee_leader_controller/InsertEmployeeLeader";
$route['GetEmployeeLeaderById/(:num)'] = "master/employee_leader_controller/GetEmployeeLeaderById/$1";
$route['UpdateEmployeeLeader'] = "master/employee_leader_controller/UpdateEmployeeLeader";
$route['DeleteEmployeeLeader/(:any)/(:any)'] = "master/employee_leader_controller/DeleteEmployeeLeader/$1/$2";

// Approval Matrix
$route['ApprovalMatrix'] = "master/approval_matrix_controller/GetApprovalMatrix";
$route['InsertApprovalMatrix'] = "master/approval_matrix_controller/InsertApprovalMatrix";
$route['GetApprovalMatrixById/(:any)'] = "master/approval_matrix_controller/GetApprovalMatrixById/$1";
$route['UpdateApprovalMatrix'] = "master/approval_matrix_controller/UpdateApprovalMatrix";
$route['DeleteApprovalMatrix/(:any)'] = "master/approval_matrix_controller/DeleteApprovalMatrix/$1";

// Profile Employee
$route['Profile'] = "profile/profile_controller/GetProfile";

// Approval Leave
$route['Approval'] = "approval/approval_controller/GetApproval";

// Confirmation Leave
$route['Confirmation'] = "confirmation/confirmation_controller/GetConfirmation";

// Employee Document
$route['EmployeeDocument'] = "master/employeedocument_controller/GetEmployeeDocument";
$route['InsertEmployeeDocument'] = "master/employeedocument_controller/InsertEmployeeDocument";
$route['GetEmployeeDocumentById/(:num)'] = "master/employeedocument_controller/GetEmployeeDocumentById/$1";
$route['EmployeeDocumentDetail/(:any)'] = "master/employeedocument_controller/GetEmployeeDocumentById/$1";
$route['DeleteEmployeeDocument/(:any)/(:any)/(:any)'] = "master/employeedocument_controller/DeleteEmployeeDocument/$1/$2/$3";
$route['DeleteEmployeeDocument/(:any)'] = "master/employeedocument_controller/DeleteEmployeeDocument/$1";
$route['DownloadEmployeeDocument/(:any)/(:any)'] = "master/employeedocument_controller/DownloadEmployeeDocument/$1/$2";
$route['uploadEmployeeDoc/(:any)'] = "master/employeedocument_controller/uploadEmployeeDoc/$1";
$route['InsertProfileDocument'] = "master/employeedocument_controller/InsertProfileDocument";
$route['DeleteProfileDocument/(:any)/(:any)/(:any)'] = "master/employeedocument_controller/DeleteProfileDocument/$1/$2/$3";
$route['DownloadProfileDocument/(:any)/(:any)'] = "master/employeedocument_controller/DownloadProfileDocument/$1/$2";

// Report
$route['OvertimeReport'] = "reportleave/overtimereport_controller/GetOvertimeReport";
$route['GetDefaultOvertimeReport'] = "reportleave/overtimereport_controller/GetDefaultOvertimeReport";
$route['PaidLeaveReport'] = "reportleave/paidleavereport_controller/GetPaidLeaveReport";
$route['GetDefaultPaidLeaveReport'] = "reportleave/paidleavereport_controller/GetDefaultPaidLeaveReport";
$route['SickLeaveReport'] = "reportleave/sickleavereport_controller/GetSickLeaveReport";
$route['GetDefaultSickLeaveReport'] = "reportleave/sickleavereport_controller/GetDefaultSickLeaveReport";
$route['GetDefaultLeaveReport'] = "reportleave/leavereport_controller/GetDefaultLeaveReport";
$route['LeaveReport'] = "reportleave/leavereport_controller/GetLeaveReport";


// Employee History
$route['EmployeeHistory'] = "employeehistory/employee_history_controller/GetEmployeeHistory";

// Company Branch
$route['GetCompanyBranchByCompanyId'] = "master/company_branch_controller/GetCompanyBranchByCompanyId";
$route['GetCompanyBranchByCompanyId2'] = "master/company_branch_controller/GetCompanyBranchByCompanyId2";
$route['CompanyBranch'] = "master/company_branch_controller/GetCompanyBranch";
$route['InsertCompanyBranch'] = "master/company_branch_controller/InsertCompanyBranch";
$route['GetCompanyBranchById/(:any)'] = "master/company_branch_controller/GetCompanyBranchById/$1";
$route['UpdateCompanyBranch'] = "master/company_branch_controller/UpdateCompanyBranch";
$route['DeleteCompanyBranch/(:any)'] = "master/company_branch_controller/DeleteCompanyBranch/$1";

// Notice Letter
$route['NoticeLetter'] = "noticeletter/noticeletter_controller/GetNoticeLetter";
$route['InsertNoticeLetter'] = "noticeletter/noticeletter_controller/InsertNoticeLetter";
$route['GetNoticeLetterById/(:num)'] = "noticeletter/noticeletter_controller/GetNoticeLetterById/$1";
$route['NoticeLetterDetail/(:any)'] = "noticeletter/noticeletter_controller/GetNoticeLetterById/$1";
$route['DeleteNoticeLetter/(:any)/(:any)'] = "noticeletter/noticeletter_controller/DeleteNoticeLetter/$1/$2";
$route['DownloadNoticeLetter/(:any)/(:any)'] = "noticeletter/noticeletter_controller/DownloadNoticeLetter/$1/$2";
$route['upload/(:any)'] = "noticeletter/noticeletter_controller/upload/$1";
$route['GetEmployeeByCompanyId'] = "master/employee_controller/GetEmployeeByCompanyId";
$route['GetEmployeeHaveRemainingPaidLeaveByCompanyId'] = "master/employee_controller/GetEmployeeHaveRemainingPaidLeaveByCompanyId";
$route['GetEmployeeHaveRemainingPaidLeaveByCompanyId2'] = "master/employee_controller/GetEmployeeHaveRemainingPaidLeaveByCompanyId2";
$route['GetEmployeeHaveRemainingPaidLeaveByCompanyId3'] = "master/employee_controller/GetEmployeeHaveRemainingPaidLeaveByCompanyId3";

// Notice Letter History
$route['NoticeLetterHistory'] = "noticeletterhistory/noticeletter_history_controller/GetNoticeLetterHistory";

// Employee Exit
$route['EmployeeExit'] = "employeeexit/employeeexit_controller/GetEmployeeExit";
$route['InsertEmployeeExit'] = "employeeexit/employeeexit_controller/InsertEmployeeExit";
$route['UpdateEmployeeExit'] = "employeeexit/employeeexit_controller/UpdateEmployeeExit";
$route['GetEmployeeExitById/(:num)'] = "employeeexit/employeeexit_controller/GetEmployeeExitById/$1";
$route['EmployeeExitDetail/(:any)'] = "employeeexit/employeeexit_controller/GetEmployeeExitById/$1";
$route['DeleteEmployeeExit/(:any)/(:any)'] = "employeeexit/employeeexit_controller/DeleteEmployeeExit/$1/$2";
$route['DownloadEmployeeExit/(:any)/(:any)'] = "employeeexit/employeeexit_controller/DownloadEmployeeExit/$1/$2";
$route['upload/(:any)'] = "employeeexit/employeeexit_controller/upload/$1";

// Employee Address
$route['EmployeeAddress'] = "master/employee_address_controller/GetEmployeeAddress";
$route['InsertEmployeeAddress'] = "master/employee_address_controller/InsertEmployeeAddress";
$route['DeleteEmployeeAddress/(:any)/(:any)'] = "master/employee_address_controller/DeleteEmployeeAddress/$1/$2";
$route['UpdateEmployeeAddress'] = "master/employee_address_controller/UpdateEmployeeAddress";

// Home
$route['RoleUser'] = 'login_controller/cekRole';
$route['Home'] = 'login_controller/home';

// Overtime Attachment
$route['OvertimeAttachment'] = "overtime/overtimeattachment_controller/GetOvertimeAttachment";
$route['InsertOvertimeAttachment'] = "overtime/overtimeattachment_controller/InsertOvertimeAttachment";
$route['DeleteOvertimeAttachment/(:any)/(:any)/(:any)/(:any)'] = "overtime/overtimeattachment_controller/DeleteOvertimeAttachment/$1/$2/$3/$4";
$route['DownloadOvertimeAttachment/(:any)/(:any)'] = "overtime/overtimeattachment_controller/DownloadOvertimeAttachment/$1/$2";
$route['upload/(:any)'] = "overtime/overtimeattachment_controller/upload/$1";

// Approval Matrix Person
$route['ApprovalMatrixPerson'] = "master/approval_matrix_person_controller/GetApprovalMatrixPerson";
$route['InsertApprovalMatrixPerson'] = "master/approval_matrix_person_controller/InsertApprovalMatrixPerson";
$route['UpdateApprovalMatrixPerson'] = "master/approval_matrix_person_controller/UpdateApprovalMatrixPerson";
$route['DeleteApprovalMatrixPerson/(:any)'] = "master/approval_matrix_person_controller/DeleteApprovalMatrixPerson/$1";

// Shift
$route['Shift'] = "master/shift_controller/GetShift";
$route['InsertShift'] = "master/shift_controller/InsertShift";
$route['UpdateShift'] = "master/shift_controller/UpdateShift";
$route['ShiftDetail/(:any)'] = "master/shift_controller/GetShiftById/$1";
$route['DeleteShift/(:any)'] = "master/shift_controller/DeleteShift/$1";

// Shift Details
$route['ShiftDetails'] = "master/shift_details_controller/GetShiftDetails";
$route['InsertShiftDetails'] = "master/shift_details_controller/InsertShiftDetails";
$route['UpdateShiftDetails'] = "master/shift_details_controller/UpdateShiftDetails";
$route['DeleteShiftDetails/(:any)/(:any)'] = "master/shift_details_controller/DeleteShiftDetails/$1/$2";

// Attendance List
$route['Attendance'] = "attendance/attendance_controller/GetAttendance";
$route['GetDefaultAttendance'] = "attendance/attendance_controller/GetDefaultAttendance";
$route['InsertAttendance'] = "attendance/attendance_controller/InsertAttendance";
$route['UpdateAttendance'] = "attendance/attendance_controller/UpdateAttendance";
$route['ImportAttendanceInsert'] = "attendance/attendance_controller/ImportAttendanceInsert";
$route['InsertAttendanceTemptoAttendance'] = "attendance/attendance_controller/InsertAttendanceTemptoAttendance";
$route['ImportTempAttendanceInsert'] = "attendance/attendance_temp_controller/ImportTempAttendanceInsert";
$route['DownloadTemplate'] = "attendance/attendance_controller/download";
$route['DeleteAttendanceTemp'] = "attendance/attendance_temp_controller/DeleteAttendanceTemp";

// Attendance History
$route['AttendanceHistory'] = "attendance/attendance_history_controller/GetAttendanceHistory";

// Message
$route['Message'] = "master/message_controller/GetMessage";
$route['InsertMessage'] = "master/message_controller/InsertMessage";
$route['UpdateMessage'] = "master/message_controller/UpdateMessage";
$route['DeleteMessage/(:any)'] = "master/message_controller/DeleteMessage/$1";

// Announcement
$route['Announcement'] = "master/announcement_controller/GetAnnouncement";
$route['InsertAnnouncement'] = "master/announcement_controller/InsertAnnouncement";
$route['UpdateAnnouncement'] = "master/announcement_controller/UpdateAnnouncement";
$route['DeleteAnnouncement/(:any)'] = "master/announcement_controller/DeleteAnnouncement/$1";


//Approval
$route['MultipleApproval'] = "approval/approval_controller/MultipleApproval";


// Company Brand
$route['GetCompanyBrandByCompanyId'] = "master/company_brand_controller/GetCompanyBrandByCompanyId";
$route['GetCompanyBrandByCompanyId2'] = "master/company_brand_controller/GetCompanyBrandByCompanyId2";
$route['CompanyBrand'] = "master/company_brand_controller/GetCompanyBrand";
$route['InsertCompanyBrand'] = "master/company_brand_controller/InsertCompanyBrand";
$route['GetCompanyBrandById/(:any)'] = "master/company_brand_controller/GetCompanyBrandById/$1";
$route['UpdateCompanyBrand'] = "master/company_brand_controller/UpdateCompanyBrand";
$route['DeleteCompanyBrand/(:any)'] = "master/company_brand_controller/DeleteCompanyBrand/$1";


// Employee Brand
$route['EmployeeBrand'] = "master/employee_brand_controller/GetEmployeeBrand";
$route['InsertEmployeeBrand'] = "master/employee_brand_controller/InsertEmployeeBrand";
$route['GetEmployeeBrandById/(:num)'] = "master/employee_brand_controller/GetEmployeeBrandById/$1";
$route['UpdateEmployeeBrand'] = "master/employee_brand_controller/UpdateEmployeeBrand";
$route['DeleteEmployeeBrand/(:any)/(:any)'] = "master/employee_brand_controller/DeleteEmployeeBrand/$1/$2";

// Approval Cancel Request
$route['ApprovalCancelRequest'] = "approval/approval_cancel_request_controller/GetApprovalCancelRequest";

//Employee Per Cabang
$route['EmployeeInBrand'] = "master/employee_controller/EmployeeInBrand";

//Company Brand by Company
$route['GetCompanyBrandByCompanyId3'] = "master/company_brand_controller/GetCompanyBrandByCompanyId3";
$route['GetCompanyBrandByCompanyId4'] = "master/company_brand_controller/GetCompanyBrandByCompanyId4";
$route['GetCompanyBrandByCompanyId5'] = "master/company_brand_controller/GetCompanyBrandByCompanyId5";

//get shift by company
$route['GetShiftByCompanyId'] = "master/shift_controller/GetShiftByCompanyId";
$route['GetShiftByCompanyId2'] = "master/shift_controller/GetShiftByCompanyId2";

//Filter Employee Brand
$route['EmployeeBrandFilter'] = "master/employee_brand_controller/GetEmployeeBrandFilter";

//Filter Employee Exit
$route['EmployeeExitFilter'] = "employeeexit/employeeexit_controller/GetEmployeeExitFilter";

//Filter Notice Letter
$route['NoticeLetterFilter'] = "noticeletter/noticeletter_controller/GetNoticeLetterFilter";

//PEMOTONGAN CUTI
//Pemotongan Cuti / Cutting Paid Leave
$route['CuttingPaidLeave'] = "cuttingpaidleave/cuttingpaidleave_controller/GetCuttingPaidLeave";
$route['CuttingPaidLeaveFilter'] = "cuttingpaidleave/cuttingpaidleave_controller/GetCuttingPaidLeaveFilter";
$route['InsertCuttingPaidLeave'] = "cuttingpaidleave/cuttingpaidleave_controller/InsertCuttingPaidLeave";
$route['UpdateCuttingPaidLeave'] = "cuttingpaidleave/cuttingpaidleave_controller/UpdateCuttingPaidLeave";
$route['SubmitCuttingPaidLeave'] = "cuttingpaidleave/cuttingpaidleave_controller/SubmitCuttingPaidLeave";
$route['DeleteCuttingPaidLeave/(:any)'] = "cuttingpaidleave/cuttingpaidleave_controller/DeleteCuttingPaidLeave/$1";
$route['CuttingPaidLeaveDetail/(:any)/(:any)/(:any)'] = "cuttingpaidleave/cuttingpaidleave_controller/GetCuttingPaidLeaveById/$1/$2/$3";

// Cutting Paid Leave Date Time
$route['PaidLeaveDateTime'] = "paidleave/paidleavedatetime_controller/GetPaidLeaveDateTime";
$route['InsertCuttingPaidLeaveDateTime'] = "cuttingpaidleave/cuttingpaidleavedatetime_controller/InsertCuttingPaidLeaveDateTime";
$route['DeleteCuttingPaidLeaveDateTime/(:any)/(:any)/(:any)/(:any)'] = "cuttingpaidleave/cuttingpaidleavedatetime_controller/DeleteCuttingPaidLeaveDateTime/$1/$2/$3/$4";

// Report Detail
$route['OvertimeDetailReport'] = "reportdetail/overtimedetailreport_controller/GetOvertimeDetailReport";
$route['GetDefaultOvertimeDetailReport'] = "reportdetail/overtimedetailreport_controller/GetDefaultOvertimeDetailReport";
$route['PaidLeaveDetailReport'] = "reportdetail/paidleavedetailreport_controller/GetPaidLeaveDetailReport";
$route['GetDefaultPaidLeaveDetailReport'] = "reportdetail/paidleavedetailreport_controller/GetDefaultPaidLeaveDetailReport";
$route['SickLeaveDetailReport'] = "reportdetail/sickleavedetailreport_controller/GetSickLeaveDetailReport";
$route['GetDefaultSickLeaveDetailReport'] = "reportdetail/sickleavedetailreport_controller/GetDefaultSickLeaveDetailReport";
$route['GetDefaultLeaveDetailReport'] = "reportdetail/leavedetailreport_controller/GetDefaultLeaveDetailReport";
$route['LeaveDetailReport'] = "reportdetail/leavedetailreport_controller/GetLeaveDetailReport";



//CUTI BERSAMA
//Cuti Bersama / Massive Leave
$route['MassiveLeave'] = "massiveleave/massiveleave_controller/GetMassiveLeave";
$route['MassiveLeaveFilter'] = "massiveleave/massiveleave_controller/GetMassiveLeaveFilter";
$route['InsertMassiveLeave'] = "massiveleave/massiveleave_controller/InsertMassiveLeave";

//Delete di table massive leave
$route['DeletePaidLeaveForMassiveLeave/(:any)'] = "massiveleave/massiveleave_controller/DeleteMassivePaidLeave/$1";
$route['DeleteLeaveForMassiveLeave/(:any)'] = "massiveleave/massiveleave_controller/DeleteMassiveLeave/$1";

//Massive leave temp
$route['InserttoEmployeeTemp'] = "massiveleave/massiveleave_controller/InserttoEmployeeTemp";
$route['InserttoEmployeeTempCabang'] = "massiveleave/massiveleave_controller/InserttoEmployeeTempCabang";
$route['MassiveLeaveDetail'] = "massiveleave/massiveleave_controller/GetMassiveLeaveById";
$route['DeleteEmployeeTemp/(:any)'] = "massiveleave/massiveleave_controller/DeleteEmployeeTemp/$1";

//Massive Leave Date Time Temp
$route['MassiveLeaveDateTimeTemp'] = "massiveleave/massiveleavedatetimetemp_controller/GetMassiveLeaveDateTimeTemp";
$route['InsertMassiveLeaveDateTimeTemp'] = "massiveleave/massiveleavedatetimetemp_controller/InsertMassiveLeaveDateTimeTemp";
$route['DeleteMassiveLeaveDateTimeTemp/(:any)'] = "massiveleave/massiveleavedatetimetemp_controller/DeleteMassiveLeaveDateTimeTemp/$1";

//SPPD
//Regional
$route['Regional'] = "master/regional_controller/GetRegional";
$route['GetRegionalById/(:any)/(:any)'] = "master/regional_controller/GetRegionalById/$1/$2";
$route['InsertRegional'] = "master/regional_controller/InsertRegional";
$route['UpdateRegional'] = "master/regional_controller/UpdateRegional";
$route['DeleteRegional/(:any)'] = "master/regional_controller/DeleteRegional/$1";

//Province Zone
$route['ProvinceZone'] = "master/province_zone_controller/GetProvinceZone";
$route['GetProvinceZoneById/(:any)/(:any)'] = "master/province_zone_controller/GetProvinceZoneById/$1/$2";
$route['InsertProvinceZone'] = "master/province_zone_controller/InsertProvinceZone";
$route['UpdateProvinceZone'] = "master/province_zone_controller/UpdateProvinceZone";
$route['DeleteProvinceZone/(:any)'] = "master/province_zone_controller/DeleteProvinceZone/$1";

//Country Zone
$route['CountryZone'] = "master/country_zone_controller/GetCountryZone";
$route['GetCountryZoneById/(:any)/(:any)'] = "master/country_zone_controller/GetCountryZoneById/$1/$2";
$route['InsertCountryZone'] = "master/country_zone_controller/InsertCountryZone";
$route['UpdateCountryZone'] = "master/country_zone_controller/UpdateCountryZone";
$route['DeleteCountryZone/(:any)'] = "master/country_zone_controller/DeleteCountryZone/$1";

//Cost
$route['Cost'] = "master/cost_controller/GetCost";
$route['GetCostById/(:any)/(:any)'] = "master/cost_controller/GetCostById/$1/$2";
$route['InsertCost'] = "master/cost_controller/InsertCost";
$route['UpdateCost'] = "master/cost_controller/UpdateCost";
$route['DeleteCost/(:any)'] = "master/cost_controller/DeleteCost/$1";

// Regional Cost
$route['RegionalCost'] = "master/regional_cost_controller/GetRegionalCost";
$route['InsertRegionalCost'] = "master/regional_cost_controller/InsertRegionalCost";
$route['GetRegionalCostById/(:any)'] = "master/regional_cost_controller/GetRegionalCostById/$1";
$route['UpdateRegionalCost'] = "master/regional_cost_controller/UpdateRegionalCost";
$route['DeleteRegionalCost/(:any)'] = "master/regional_cost_controller/DeleteRegionalCost/$1";

// SPPD transaksi
$route['SPPD'] = "sppd/sppd_controller/GetSPPD";
$route['InsertSPPD'] = "sppd/sppd_controller/InsertSPPD";
$route['GetSPPDById/(:any)'] = "sppd/sppd_controller/GetSPPDById/$1";
$route['UpdateSPPD'] = "sppd/sppd_controller/UpdateSPPD";
$route['UpdateSPPDZone'] = "sppd/sppd_controller/UpdateSPPDZone";
$route['GenerateSPPUM'] = "sppd/sppd_controller/GenerateSPPUM";
$route['SubmitSPPD'] = "sppd/sppd_controller/SubmitSPPD";
$route['DeleteSPPD/(:any)'] = "sppd/sppd_controller/DeleteSPPD/$1";
$route['SPPDDetail/(:any)/(:any)'] = "sppd/sppd_controller/GetSPPDById/$1/$2";
$route['UpdateSPPDApproval'] = "sppd/sppd_approval_controller/UpdateSPPDApproval";

//SPPD Detail
$route['SPPDDetail'] = "sppd/sppd_detail_controller/GetSPPDDetail";
$route['InsertSPPDDetail'] = "sppd/sppd_detail_controller/InsertSPPDDetail";
$route['GetSPPDDetailById/(:any)'] = "sppd/sppd_detail_controller/GetSPPDDetailById/$1";
$route['UpdateSPPDDetail'] = "sppd/sppd_detail_controller/UpdateSPPDDetail";
$route['DeleteSPPDDetail/(:any)/(:any)/(:any)'] = "sppd/sppd_detail_controller/DeleteSPPDDetail/$1/$2/$3";

//SPPD Member
$route['SPPDMember'] = "sppd/sppd_member_controller/GetSPPDMember";
$route['InsertSPPDMember'] = "sppd/sppd_member_controller/InsertSPPDMember";
$route['GetSPPDMemberById/(:any)'] = "sppd/sppd_member_controller/GetSPPDMemberById/$1";
$route['DeleteSPPDMember/(:any)/(:any)/(:any)'] = "sppd/sppd_member_controller/DeleteSPPDMember/$1/$2/$3";

//SPPUM
$route['SPPUM'] = "sppd/sppum_controller/GetSPPUM";
$route['InsertSPPUM'] = "sppd/sppum_controller/InsertSPPUM";
$route['UpdateSPPUM'] = "sppd/sppum_controller/UpdateSPPUM";
$route['GetSPPUMById/(:any)'] = "sppd/sppum_controller/GetSPPUMById/$1";
$route['DeleteSPPUM/(:any)/(:any)/(:any)'] = "sppd/sppum_controller/DeleteSPPUM/$1/$2/$3";

// SPPD Approval
$route['MenuSPPDApproval'] = "sppd/menu_sppd_approval_controller/GetMenuSPPDApproval";

// Get Nominal By Cost ID, Level ID, and Tujuan Kota ID
$route['GetNominalByCostLevelTujuan'] = "master/cost_controller/GetNominalByCostLevelTujuan";

//LPPD
//LPPD
$route['LPPD'] = "sppd/lppd_controller/GetLPPD";
$route['LPPDDetail/(:any)/(:any)/(:any)'] = "sppd/lppd_controller/GetLPPDById/$1/$2/$3";
$route['UpdateLPPD'] = "sppd/lppd_controller/UpdateLPPD";
$route['SubmitLPPD'] = "sppd/lppd_controller/SubmitLPPD";
$route['ReSubmitLPPD'] = "sppd/lppd_controller/ReSubmitLPPD";
$route['UpdateLPPDApproval'] = "sppd/lppd_approval_controller/UpdateLPPDApproval";

//LPPD Approval
$route['MenuLPPDApproval'] = "sppd/menu_lppd_approval_controller/GetMenuLPPDApproval";

//LPPD Cost / Rincian Biaya Perjalanan Dinas
$route['LPPDCost'] = "sppd/lppd_cost_controller/GetLPPDCost";
$route['InsertLPPDCost'] = "sppd/lppd_cost_controller/InsertLPPDCost";
$route['GetLPPDCostById/(:any)'] = "sppd/lppd_cost_controller/GetLPPDCost/$1";
$route['UpdateLPPDCost'] = "sppd/lppd_cost_controller/UpdateLPPDCost";
$route['DeleteLPPDCost/(:any)/(:any)/(:any)/(:any)'] = "sppd/lppd_cost_controller/DeleteLPPDCost/$1/$2/$3/$4";
$route['DownloadLPPDCost/(:any)/(:any)'] = "sppd/lppd_cost_controller/DownloadLPPDCost/$1/$2";

//LPPD Adjustment / Pengurangan atau Penambahan Biaya Perjalanan Dinas oleh HRD atau FAD
$route['LPPDAdjustment'] = "sppd/lppd_adjustment_controller/GetLPPDAdjustment";
$route['InsertLPPDAdjustment'] = "sppd/lppd_adjustment_controller/InsertLPPDAdjustment";
$route['GetLPPDAdjustmentById/(:any)'] = "sppd/lppd_adjustment_controller/GetLPPDAdjustment/$1";
$route['UpdateLPPDAdjustment'] = "sppd/lppd_adjustment_controller/UpdateLPPDAdjustment";
$route['DeleteLPPDAdjustment/(:any)/(:any)/(:any)/(:any)'] = "sppd/lppd_adjustment_controller/DeleteLPPDAdjustment/$1/$2/$3/$4";

//LPPD Detail 
$route['LPPDDetail'] = "sppd/lppd_detail_controller/GetLPPDdetail";
$route['InsertLPPDDetail'] = "sppd/lppd_detail_controller/InsertLPPDDetail";
$route['GetLPPDDetailById/(:any)'] = "sppd/lppd_detail_controller/GetLPPDDetail/$1";
$route['UpdateLPPDDetail'] = "sppd/lppd_detail_controller/UpdateLPPDDetail";
$route['DeleteLPPDDetail/(:any)/(:any)/(:any)/(:any)'] = "sppd/lppd_detail_controller/DeleteLPPDDetail/$1/$2/$3/$4";

//SPPD and LPPD Report
$route['GetDefaultSPPDReport'] = "reportdetail/sppd_report_controller/GetDefaultSPPDReport";
$route['SPPDReport'] = "reportdetail/sppd_report_controller/GetSPPDReport";
$route['GetDefaultLPPDReport'] = "reportdetail/lppd_report_controller/GetDefaultLPPDReport";
$route['LPPDReport'] = "reportdetail/lppd_report_controller/GetLPPDReport";

// Apps Config
$route['AppsConfig'] = "master/apps_config_controller/GetAppsConfig";
$route['InsertAppsConfig'] = "master/apps_config_controller/InsertAppsConfig";
$route['UpdateAppsConfig'] = "master/apps_config_controller/UpdateAppsConfig";
$route['DeleteAppsConfig/(:any)'] = "master/apps_config_controller/DeleteAppsConfig/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */