<?php
$employee_id = '';
$employee_name = '';
$amountpaidleave = '';
$remainingpaidleave = '';
$amountpaidleaveandextpaidleave = '';
$email = '';
$phone_no = '';
$company_id = '';
$division_id = '';
$department_id = '';
$company_branch_id = '';
$date_of_birth = '';
$place_of_birth = '';
$gender_id = '';
$religion_id = '';
$employee_status_id = '';
$level_id = '';
$leave_type_id = '';
$citizen_status_id = '';
$approver_status = '';
$join_date = '';
$resign_status = '';
$jabatan = '';
$shift_id = '';
$photo_url = '';
$employee_exit_date = '';
$employee_exit_reason = '';
$employee_exit_no = '';
$employee_exit_url = '';
$bank = '';
$no_rekening = '';
$nama_rekening = '';

if (!empty($EmployeeRecords)) {
    foreach ($EmployeeRecords as $row) {
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $amountpaidleave = $row->amountpaidleave;
        $remainingpaidleave = $row->remainingpaidleave;
        $amountpaidleaveandextpaidleave = $row->amountpaidleaveandextpaidleave;
        $email = $row->email;
        $phone_no = $row->phone_no;
        $company_id = $row->company_id;
        $division_id = $row->division_id;
        $department_id = $row->department_id;
        $company_branch_id = $row->company_branch_id;
        $date_of_birth = $row->date_of_birth;
        $place_of_birth = $row->place_of_birth;
        $gender_id = $row->gender_id;
        $religion_id = $row->religion_id;
        $employee_status_id = $row->employee_status_id;
        $level_id = $row->level_id;
        $leave_type_id = $row->leave_type_id;
        $citizen_status_id = $row->citizen_status_id;
        $approver_status = $row->approver_status;
        $join_date = $row->join_date;
        $resign_status = $row->resign_status;
        $jabatan = $row->jabatan;
        $photo_url = $row->photo_url;
        $shift_id = $row->shift_id;
        $employee_exit_date = $row->employee_exit_date;
        $employee_exit_reason = $row->employee_exit_reason;
        $employee_exit_no = $row->employee_exit_no;
        $employee_exit_url = $row->employee_exit_url;
        $bank = $row->bank;
        $no_rekening = $row->no_rekening;
        $nama_rekening = $row->nama_rekening;
    }
}
?>


<div class="content-wrapper">
    <div style="height: 20px;"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <strong>
                                <h3>Employee Profile</h3>
                            </strong>
                            <!-- <?php print_r($photo_url); ?> -->
                        </div>
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Employee Profile</li>
                                <li class="breadcrumb-item active">
                                    Edit
                                </li>
                            </ol>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                        <?= $this->session->unset_userdata('success'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="col-xs-12 text-right">
                                <button type=" button" class="btn btn-md btn-primary" id="btnUpdateEmployee">
                                    <i class="fa fa-save"></i> Update
                                </button>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="col-xs-12 text-right">
                                <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-ChangePass">
                                    <i class="fa fa-edit"></i> Change Password
                                </button>
                            </div>
                        </div>
                    </div> -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Profile</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="employeeid">Employee ID</label>
                                            <input class="form-control" id="employee_id_update" placeholder="Employee Id" name="employee_id_update" value="<?php echo $employee_id; ?>" maxlength="50" readonly>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="employeename">Employee Name</label>
                                            <input class="form-control" id="employee_name_update" placeholder=Employee Name" name="employee_name_update" value="<?php echo $employee_name; ?>" maxlength="50" required readonly>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email_update" placeholder="Email" name="email_update" maxlength="50" value="<?php echo $email; ?>" required readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="phoneno">Phone No</label>
                                            <input class="form-control" id="phone_no_update" placeholder="Phone No" name="phone_no_update" value="<?php echo $phone_no; ?>" maxlength="50" required readonly>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dateofbirth">Date of Birth</label>
                                                <div class="input-group date" id="datetime6" data-target-input="nearest">
                                                    <input type="text" id="date_of_birth_update" placeholder="Date Time Overtime Start" name="date_of_birth_update" value="<?php echo $date_of_birth; ?>" class="form-control datetimepicker-input" data-target="#datetime6" disabled />
                                                    <div class="input-group-append" data-target="#datetime6" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date_of_birth">Place of birth</label>
                                            <input class="form-control" id="place_of_birth_update" placeholder="Place of birth" name="place_of_birth_update" maxlength="50" value="<?php echo $place_of_birth; ?>" required readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Gender</label>
                                            <select class="form-control select2bs4" name="gender_id_update" id="gender_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($GenderRecords as $row) {
                                                    $selected = ($row->variable_id == $gender_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Religion</label>
                                            <select class="form-control select2bs4" name="religion_id_update" id="religion_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($ReligionRecords as $row) {
                                                    $selected = ($row->variable_id == $religion_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Citizen Status</label>
                                            <select class="form-control select2bs4" name="citizen_status_id_update" id="citizen_status_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($CitizenStatusRecords as $row) {
                                                    $selected = ($row->variable_id == $citizen_status_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Details</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <select data-width="100%" class="form-control select2bs4" id="company_id_update" name="company_id_update" data-companyid="<?= $company_id; ?>" disabled>
                                                    <?php
                                                    foreach ($CompanyRecords as $row) {
                                                        $selected = ($row->company_id == $company_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $row->company_id; ?>" <?= $selected; ?> class=""><?= $row->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div id="divDivision">
                                                    <label>Division</label>
                                                    <select class="form-control select2bs4" id="division_id_update" name="division_id_update" data-divisionid="<?= $division_id; ?>" style="width: 100%" disabled>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div id="divDepartment">
                                                    <label>Department</label>
                                                    <select class="form-control select2bs4" id="department_id_update" name="department_id_update" data-departmentid="<?= $department_id; ?>" style="width: 100%" disabled>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div id="divCompanyBranch">
                                                    <label>Company Branch</label>
                                                    <select data-width="100%" class="form-control select2bs4" id="company_branch_id_update" name="company_branch_id_update" data-companybranchid="<?= $company_branch_id; ?>" disabled>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Employee Status</label>
                                            <select class="form-control select2bs4" name="employee_status_id_update" id="employee_status_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($EmployeeStatusRecords as $row) {
                                                    $selected = ($row->variable_id == $employee_status_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jabatan</label>
                                            <input class="form-control" placeholder="Jabatan" value="<?php echo $jabatan; ?>" maxlength="50" readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Employee Level</label>
                                            <select class="form-control select2bs4" name="level_id_update" id="level_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($EmployeeLevelRecords as $row) {
                                                    $selected = ($row->variable_id == $level_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Leave Type ID</label>
                                            <select class="form-control select2bs4" name="leave_type_id_update" id="leave_type_id_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($LeaveTypeRecords as $row) {
                                                    $selected = ($row->variable_id == $leave_type_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Aprover Status</label>
                                            <select class="form-control select2bs4" name="approver_status_update" id="approver_status_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($ApproverStatusRecords as $row) {
                                                    $selected = ($row->variable_id == $approver_status) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="joindate">Join Date</label>
                                                <div class="input-group date" id="datetime8" data-target-input="nearest">
                                                    <input type="text" id="join_date_update" placeholder="Join Date" name="join_date_update" value="<?php echo $join_date; ?>" class="form-control datetimepicker-input" data-target="#datetime8" disabled />
                                                    <div class="input-group-append" data-target="#datetime8" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Amount Paid Leave</label>
                                            <input class="form-control" placeholder="Amount Paid Leave" value="<?php echo $amountpaidleaveandextpaidleave; ?>" maxlength="50" readonly>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Remaining Paid Leave</label>
                                            <input class="form-control" placeholder="Remaining Paid Leave" value="<?php echo $remainingpaidleave; ?>" maxlength="50" readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="shiftid">Employee Shift</label>
                                            <select class="form-control select2bs4" id="shift_id_update" name="shift_id_update" disabled>
                                                <option disabled selected value="">--Select--</option>
                                                <?php
                                                foreach ($ShiftRecords as $row) {
                                                    $selected = ($row->shift_id == $shift_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->shift_id; ?>" <?= $selected; ?> class=""><?= $row->shift_id; ?> - <?= $row->shift_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bank">Bank</label>
                                            <input class="form-control" id="bank_update" placeholder="Bank" name="bank_update" value="<?php echo $bank; ?>" readonly>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Rekening</label>
                                            <input class="form-control" type="number" id="no_rekening_update" placeholder="No Rekening" name="no_rekening_update" value="<?php echo $no_rekening; ?>" maxlength="50" readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Rekening</label>
                                            <input class="form-control" id="nama_rekening_update" placeholder="Nama Rekening" name="nama_rekening_update" value="<?php echo $nama_rekening; ?>" readonly>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- EMPLOYEE STATUS AKTIF/RESIGN -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Status Details</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="resign_status_update" id="resign_status_update" style="width: 100%" disabled>
                                                <?php
                                                foreach ($ResignStatusRecords as $row) {
                                                    $selected = ($row->variable_id == $resign_status) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <?php if ($resign_status != 'RS-001') { ?>
                                                <div class="form-group">
                                                    <label for="employeeexitdate">Exit Date</label>
                                                    <div class="input-group date" id="datetime15" data-target-input="nearest">
                                                        <input type="text" id="employee_exit_date_update" placeholder="Join Date" name="employee_exit_date_update" value="<?php echo $employee_exit_date; ?>" class="form-control datetimepicker-input" data-target="#datetime15" disabled />
                                                        <div class="input-group-append" data-target="#datetime15" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeeexitno">Document</label>
                                                <?php if ($employee_exit_url != '') { ?>
                                                    <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadEmployeeExit/' . $employee_exit_url . '/' . $employee_id; ?>"><i class="fa fa-download"></i></a>
                                                    <a href="<?= base_url('upload/' . $employee_exit_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                <?php } ?>
                                                <input readonly type="text" class="form-control" id="employee_exit_no" name="employee_exit_no" value="<?php echo $employee_exit_no; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeeexitreason">Reason</label>
                                                <textarea readonly type="text" class="form-control" id="employee_exit_reason" name="employee_exit_reason"><?php echo $employee_exit_reason; ?></textarea>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EXTENDED PAID LEAVE TABLE -->
                        <div class="col-md-12">
                            <?php if (!empty($ExtPaidLeaveRecords)) { ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Extended Paid Leave</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="extpaidleave_table" class="table table-bordered  table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Amount</th>
                                                    <th>Paid Leave Category</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($ExtPaidLeaveRecords)) {
                                                    foreach ($ExtPaidLeaveRecords as $record) {
                                                ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?php echo  $record->amount; ?></td>
                                                            <td><?php echo  $record->paid_leave_name; ?></td>
                                                        <?php } ?>
                                                        </tr>
                                                    <?php
                                                }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- EMPLOYEE LEADER TABLE -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Leader</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="extpaidleave1_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Leader</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeLeaderRecords)) {
                                                foreach ($EmployeeLeaderRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo  $record->approver_name; ?></td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- EMPLOYEE LETTER TABLE -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Letter</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employee_letter_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Letter No</th>
                                                <th>Letter Type</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Description</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeLetterRecords)) {
                                                foreach ($EmployeeLetterRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->letter_no; ?></td>
                                                        <td><?php echo $record->letter_type_name; ?></td>
                                                        <td><?php echo $record->start_date; ?></td>
                                                        <td><?php echo $record->end_date; ?></td>
                                                        <?php if ($record->status == 'A') { ?>
                                                            <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                        <?php } else { ?>
                                                            <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                        <?php } ?>
                                                        <td><?php echo $record->description; ?></td>
                                                        <td>
                                                            <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadEmployeeLetter/' . $record->letter_url . '/' . $record->employee_id; ?>"><i class="fa fa-download"></i></a>
                                                            <a href="<?= base_url('upload/' . $record->letter_url); ?>" target="_blank" class="btn btn-xs btn-secondary"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- EMPLOYEE DOCUMENT TABLE -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Document</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employeedocument_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Document Type</th>
                                                <th>Document No</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeDocumentRecords)) {
                                                foreach ($EmployeeDocumentRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->document_type_name; ?></td>
                                                        <td><?php echo $record->document_no; ?></td>
                                                        <td>
                                                            <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadProfileDocument/' . $record->document_url . '/' . $record->employee_id; ?>"><i class="fa fa-download"></i></a>
                                                            <a href="<?= base_url('upload/' . $record->document_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- EMPLOYEE WARNING LETTER TABLE -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Warning Letter</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employeenoticeletter_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Warning Type</th>
                                                <th>Warning Letter No</th>
                                                <th>Warning Reason</th>
                                                <th>Warning Date</th>
                                                <th>Valid Until</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeNoticeLetterRecords)) {
                                                foreach ($EmployeeNoticeLetterRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->notice_letter_type_name; ?></td>
                                                        <td><?php echo $record->notice_letter_no; ?></td>
                                                        <td><?php echo $record->notice_reason; ?></td>
                                                        <td><?php echo $record->notice_letter_date; ?></td>
                                                        <?php $validnotice = date('Y-m-d', strtotime("+6 months", strtotime($record->notice_letter_date))) ?>
                                                        <?php $validsuratteguran = date('Y-m-d', strtotime("+30 days", strtotime($record->notice_letter_date))) ?>
                                                        <?php if ($record->notice_letter_id == 'NL-004') { ?>
                                                            <td><?php echo $validsuratteguran; ?></td>
                                                        <?php } else { ?>
                                                            <td><?php echo $validnotice; ?></td>
                                                        <?php } ?>
                                                        <?php if ($record->notice_letter_id == 'NL-004') { ?>
                                                            <?php if (strtotime(date('Y-m-d', time())) <= strtotime($validsuratteguran) && ($record->employee_notice_letter_id == $record->lastsp)) { ?>
                                                                <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                            <?php } else { ?>
                                                                <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php if (strtotime(date('Y-m-d', time())) <= strtotime($validnotice) && ($record->employee_notice_letter_id == $record->lastsp)) { ?>
                                                                <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                            <?php } else { ?>
                                                                <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <td>
                                                            <?php if ($record->notice_letter_url != '') { ?>
                                                                <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadNoticeLetter/' . $record->notice_letter_url . '/' . $record->employee_notice_letter_id; ?>"><i class="fa fa-download"></i></a>
                                                                <a href="<?= base_url('upload/' . $record->notice_letter_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- EMPLOYEE ADDRESS TABLE -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Address</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employeeaddress_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Address Type</th>
                                                <th>Country</th>
                                                <th>Province</th>
                                                <th>City</th>
                                                <th>Full Address</th>
                                                <th>Zip Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeAddressRecords)) {
                                                foreach ($EmployeeAddressRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->address_type_name; ?></td>
                                                        <td><?php echo $record->country_name; ?></td>
                                                        <td><?php echo $record->province_name; ?></td>
                                                        <td><?php echo $record->city_name; ?></td>
                                                        <td><?php echo $record->address; ?></td>
                                                        <td><?php echo $record->zip_code; ?></td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>


<!-- <div class="modal fade" id="modal-employeedocument">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Employee Document</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="<?php echo base_url() ?>InsertProfileDocument" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="employeeid">NIK</label>
                            <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" readonly>
                            <br>
                            <label for="documentid">Document Type</label>
                            <select class="form-control select2bs4" name="document_id" required>
                                <option disabled selected value="">--Select--</option>
                                <?php foreach ($EmployeeDocumentTypeRecords as $row) : ?>
                                    <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <label for="documentno">Document No</label>
                            <input class="form-control" id="document_no" name="document_no" required>
                            <br>
                            <label for="documenturl">Document</label>
                            <input class="form-control" type="file" name="image" id="image" required accept=".jpeg,.jpg,.png,.pdf">
                            <small>
                                <font color="red">Type file : jpeg/jpg/png/pdf</font>
                            </small>
                            <br>
                            <br>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </form>
        </div>
    </div>
</div> -->


<!--#Region Modal Change Password-->
<div class="modal fade" id="modal-ChangePass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="<?php echo base_url(); ?>ChangePass" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Old Password *</label>
                            <div class="input-group">
                                <input class="form-control pwd" id="voldPassword" name="oldPassword" type="password" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                </span>
                            </div>
                            <br>
                            <label for="">New Password *</label>
                            <div class="input-group">
                                <input class="form-control pwd1" id="vnewPassword" name="newPassword" type="password" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal1" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </form>
        </div>
    </div>
</div>
<!--#EndRegion Modal Change Password-->

<script>
    $(".reveal").on('click', function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });

    $(".reveal1").on('click', function() {
        var $pwd1 = $(".pwd1");
        if ($pwd1.attr('type') === 'password') {
            $pwd1.attr('type', 'text');
        } else {
            $pwd1.attr('type', 'password');
        }
    });
</script>


<script>
    $(document).ready(function() {

        $("#company_id_update").change(function() {
            var companyid = $("#company_id_update").val();

            $.ajax({
                url: '../GetDivisionByCompanyId2',
                data: {
                    company_id_update: companyid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    $('#division_id_update').html(html);
                }
            })
        })

        $("#division_id_update").change(function() {
            var divisionid = $("#division_id_update").val();

            $.ajax({
                url: '../GetDepartmentByDivisionId2',
                data: {
                    division_id_update: divisionid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].department_id + '>' + response[is].department_name + '</option>';
                        }
                        $("#divDepartment").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDepartment").hide();
                    }
                    $('#department_id_update').html(html);
                }
            })
        })
    });


    //update now
    $(document).ready(function() {
        $("#btnUpdateEmployee").click(function() {

            var employeeid = $("#employee_id_update").val();
            var employeename = $("#employee_name_update").val();
            var email = $("#email_update").val();
            var phoneno = $("#phone_no_update").val();
            var companyid = $("#company_id_update").val();
            // var companybranchid = $("#company_branch_id_update").val();
            var divisionid = $("#division_id_update").val();
            var departmentid = $("#department_id_update").val();
            var dateofbirth = $("#date_of_birth_update").val();
            var placeofbirth = $("#place_of_birth_update").val();
            var genderid = $("#gender_id_update").val();
            var religionid = $("#religion_id_update").val();
            var employeestatusid = $("#employee_status_id_update").val();
            var levelid = $("#level_id_update").val();
            var citizenstatusid = $("#citizen_status_id_update").val();
            var approverstatus = $("#approver_status_update").val();
            var leavetypeid = $("#leave_type_id_update").val()
            var joindate = $("#join_date_update").val();

            // For set value Vehicle type on first load

            $.ajax({
                url: '<?php echo base_url() ?>UpdateEmployee',
                data: {
                    employee_id_update: employeeid,
                    employee_name_update: employeename,
                    email_update: email,
                    phone_no_update: phoneno,
                    company_id_update: companyid,
                    // company_branch_id_update: companybranchid,
                    division_id_update: divisionid,
                    department_id_update: departmentid,
                    date_of_birth_update: dateofbirth,
                    place_of_birth_update: placeofbirth,
                    gender_id_update: genderid,
                    religion_id_update: religionid,
                    employee_status_id_update: employeestatusid,
                    level_id_update: levelid,
                    citizen_status_id_update: citizenstatusid,
                    approver_status_update: approverstatus,
                    leave_type_id_update: leavetypeid,
                    join_date_update: joindate
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>Profile"
                    } else {}
                }
            })
        });
    })
</script>

<script>
    $(document).ready(function() {
        var company_id = $("#company_id_update").attr('data-companyid');
        $.ajax({
            url: '<?php echo base_url() ?>GetDivisionByCompanyId',
            data: {
                company_id: company_id
            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {
                var html = '';
                var is = '';
                if (response != null) {
                    for (is = 0; is < response.length; is++) {
                        html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                    }
                    $("#divDivision").show();
                    console.log(company_id)
                } else {
                    html += '<option value=""></option>';
                    $("#divDivision").hide();
                }
                $('#division_id_update').html(html);
                $("#division_id_update").val(division_id).trigger("change");
            }
        })

        var division_id = $("#division_id_update").attr('data-divisionid');
        var department_id = $("#department_id_update").attr('data-departmentid');
        $.ajax({
            url: '<?php echo base_url() ?>GetDepartmentByDivisionId',
            data: {
                division_id: division_id,
                department_id: department_id
            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {
                var html = '';
                var is = '';
                if (response != null) {
                    for (is = 0; is < response.length; is++) {
                        html += '<option value=' + response[is].department_id + '>' + response[is].department_name + '</option>';
                    }
                    $("#divDepartment").show();
                    console.log(department_id)
                } else {
                    html += '<option value=""></option>';
                    $("#divDepartment").hide();
                }
                $('#department_id_update').html(html);
                $("#department_id_update").val(department_id).trigger("change");
            }
        })

        var company_branch_id = $("#company_branch_id_update").attr('data-companybranchid');
        var company_id = $("#company_id_update").attr('data-companyid');
        $.ajax({
            url: '<?php echo base_url() ?>GetCompanyBranchByCompanyId',
            data: {
                company_id: company_id
            },
            type: 'post',
            async: true,
            dataType: 'json',
            cache: false,
            success: function(response) {
                var html = '';
                var is = '';
                if (response != null) {
                    for (is = 0; is < response.length; is++) {
                        html += '<option value=' + response[is].company_branch_id + '>' + response[is].company_branch_name + '</option>';
                    }
                    $("#divCompanyBranch").show();
                    console.log(company_branch_id)
                } else {
                    html += '<option value=""></option>';
                    $("#divCompanyBranch").hide();
                }
                $('#company_branch_id_update').html(html);
                $("#company_branch_id_update").val(company_branch_id).trigger("change");
            }
        })
    });
</script>