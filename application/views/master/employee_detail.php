<?php
$employee_id = '';
$employee_name = '';
$amountpaidleave = '';
$remainingpaidleave = '';
$amountpaidleaveandextpaidleave = '';
$email = '';
$phone_no = '';
$company_id = '';
$company_branch_id = '';
$division_id = '';
$department_id = '';
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
$employee_exit_date = '';
$employee_exit_reason = '';
$employee_exit_no = '';
$employee_exit_url = '';
$overtime_flag = '';
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
        $company_branch_id = $row->company_branch_id;
        $division_id = $row->division_id;
        $department_id = $row->department_id;
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
        $shift_id = $row->shift_id;
        $employee_exit_date = $row->employee_exit_date;
        $employee_exit_reason = $row->employee_exit_reason;
        $employee_exit_no = $row->employee_exit_no;
        $employee_exit_url = $row->employee_exit_url;
        $overtime_flag = $row->overtime_flag;
        $bank = $row->bank;
        $no_rekening = $row->no_rekening;
        $nama_rekening = $row->nama_rekening;
    }
}
?>


<div class="content-wrapper">
    <div style="height: 20px;"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <strong>
                                <h3>Employee Details</h3>
                            </strong>
                            <!-- <?php print_r($overtime_flag); ?> -->
                            <!-- 
                            <?php print_r($row->company_id); ?>
                            <br>
                            <?php print_r($row->division_id); ?>
                            <br>
                            <?php print_r($row->department_id); ?>
                            <br>
                            <?php print_r($row->company_branch_id); ?> -->

                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Employee Detail</li>
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

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="col-xs-12 text-left">
                                <a href="<?php echo base_url() ?>Employee" class="btn btn-md btn-circle btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12 text-right">
                                <button type=" button" class="btn btn-md btn-primary" id="btnUpdateEmployee">
                                    <i class="fa fa-save"></i> Update
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- /.card-header -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>EMPLOYEE DETAILS</b></h4>
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
                                            <input class="form-control" id="employee_name_update" placeholder="Employee Name" name="employee_name_update" value="<?php echo $employee_name; ?>" maxlength="50" required>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email_update" placeholder="Email" name="email_update" value="<?php echo $email; ?>" required>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="phoneno">Phone No</label>
                                            <input class="form-control" id="phone_no_update" placeholder="Phone No" name="phone_no_update" value="<?php echo $phone_no; ?>" maxlength="50" required>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <select data-width="100%" class="form-control select2bs4" name="company_id_update" id="company_id_update" data-companyid="<?= $company_id; ?>">
                                                    <?php
                                                    foreach ($CompanyRecords as $row) {
                                                        $selected = ($row->company_id == $company_id) ? 'selected' : ''; // bikin kondisi kaya gini
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
                                                    <select data-width="100%" class="form-control select2bs4" id="division_id_update" name="division_id_update" data-divisionid="<?= $division_id; ?>">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div id="divDepartment">
                                                    <label>Department</label>
                                                    <select data-width="100%" class="form-control select2bs4" id="department_id_update" name="department_id_update" data-departmentid="<?= $department_id; ?>">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div id="divCompanyBranch">
                                                    <label>Company Branch</label>
                                                    <select data-width="100%" class="form-control select2bs4" id="company_branch_id_update" name="company_branch_id_update" data-companybranchid="<?= $company_branch_id; ?>">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dateofbirth">Date of Birth</label>
                                                <div class="input-group date" id="datetime6" data-target-input="nearest">
                                                    <input type="text" id="date_of_birth_update" placeholder="Date Time Overtime Start" name="date_of_birth_update" value="<?php echo $date_of_birth; ?>" class="form-control datetimepicker-input" data-target="#datetime6" />
                                                    <div class="input-group-append" data-target="#datetime6" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="date_of_birth">Place of birth</label>
                                            <input class="form-control" id="place_of_birth_update" placeholder="Place of birth" name="place_of_birth_update" maxlength="50" value="<?php echo $place_of_birth; ?>" required>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender</label>
                                            <select data-width="100%" class="form-control select2bs4" name="gender_id_update" id="gender_id_update">
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
                                            <select data-width="100%" class="form-control select2bs4" name="religion_id_update" id="religion_id_update">
                                                <option disabled selected value="">--Select--</option>
                                                <?php
                                                foreach ($ReligionRecords as $row) {
                                                    $selected = ($row->variable_id == $religion_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Citizen Status</label>
                                            <select data-width="100%" class="form-control select2bs4" name="citizen_status_id_update" id="citizen_status_id_update">
                                                <option disabled selected value="">--Select--</option>
                                                <?php
                                                foreach ($CitizenStatusRecords as $row) {
                                                    $selected = ($row->variable_id == $citizen_status_id) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Employee Status</label>
                                            <select data-width="100%" class="form-control select2bs4" name="employee_status_id_update" id="employee_status_id_update">
                                                <option disabled selected value="">--Select--</option>
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
                                            <input class="form-control" name="jabatan_update" id="jabatan_update" placeholder="Jabatan" value="<?php echo $jabatan; ?>" maxlength="50">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Employee Level</label>
                                            <select data-width="100%" class="form-control select2bs4" name="level_id_update" id="level_id_update">
                                                <option disabled selected value="">--Select--</option>
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
                                            <select data-width="100%" class="form-control select2bs4" name="leave_type_id_update" id="leave_type_id_update">
                                                <option disabled selected value="">--Select--</option>
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
                                            <select data-width="100%" class="form-control select2bs4" name="approver_status_update" id="approver_status_update">
                                                <option disabled selected value="">--Select--</option>
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
                                                    <input type="text" id="join_date_update" placeholder="Join Date" name="join_date_update" value="<?php echo $join_date; ?>" class="form-control datetimepicker-input" data-target="#datetime8" />
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
                                            <label>Employee Shift</label>
                                            <select data-width="100%" class="form-control select2bs4" id="shift_id_update" name="shift_id_update" data-shiftid="<?= $shift_id; ?>">
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Hak Lembur</label>
                                            <select data-width="100%" class="form-control select2bs4" id="overtime_flag_update" name="overtime_flag_update">
                                                <option disabled selected value="">--Select--</option>
                                                <?php
                                                foreach ($HakLemburRecords as $row) {
                                                    $selected = ($row->variable_id == $overtime_flag) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bank">Bank</label>
                                            <input class="form-control" id="bank_update" placeholder="Bank" name="bank_update" value="<?php echo $bank; ?>" required>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Rekening</label>
                                            <input class="form-control" type="number" id="no_rekening_update" placeholder="No Rekening" name="no_rekening_update" value="<?php echo $no_rekening; ?>" maxlength="50" required>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Rekening</label>
                                            <input class="form-control" id="nama_rekening_update" placeholder="Nama Rekening" name="nama_rekening_update" value="<?php echo $nama_rekening; ?>" required>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <!-- /.card-header -->
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
                        <div class="col-md-12">
                            <!--
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Extended Paid Leave</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if (empty($ExtPaidLeaveRecords)) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-extendedpaidleave">
                                                <i class="fa fa-plus"></i> Add Extended Paid Leave
                                            </button>
                                        <?php } ?>
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
                                                <th>Action</th>
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
                                                        <td class="text-center">
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteExtPaidLeave/' . $record->employee_ext_paid_leave_id . '/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Leader</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employeeleader">
                                            <i class="fa fa-plus"></i> Add Employee Leader
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employeeleader_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Line No</th>
                                                <th>NIK</th>
                                                <th>Leader</th>
                                                <th>Action</th>
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
                                                        <td><?php echo  $record->line_no; ?></td>
                                                        <td><?php echo  $record->approver_id; ?></td>
                                                        <td><?php echo  $record->approver_name; ?></td>
                                                        <td class="text-center">
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeLeader/' . $record->employee_leader_id . '/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Brand</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee-brand">
                                            <i class="fa fa-plus"></i> Add Employee Brand
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="employeebrand_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Company Brand</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($EmployeeBrandRecords)) {
                                                foreach ($EmployeeBrandRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo  $record->company_name; ?></td>
                                                        <td><?php echo  $record->company_brand_name; ?></td>
                                                        <td class="text-center">
                                                            <a id="btnSelectEmployeeBrand" class="btn btn-xs btn-primary" data-employeebrandid="<?= $record->employee_brand_id ?>" data-employeeid="<?= $record->employee_id ?>" data-employeename="<?= $record->employee_name ?>" data-companybrandid="<?= $record->company_brand_id ?>" data-companybrandname="<?= $record->company_brand_name ?>"><i class="fa fa-pen"></i></a>
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeBrand/' . $record->employee_brand_id . '/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <div class="card">
                                <!-- card-header employee document -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Document</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employeedocument">
                                            <i class="fa fa-plus"></i> Add Document
                                        </button>
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
                                                            <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadEmployeeDocument/' . $record->document_url . '/' . $record->employee_id; ?>"><i class="fa fa-download"></i></a>
                                                            <a href="<?= base_url('upload/' . $record->document_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeDocument/' . $record->employee_document_id . '/' . $record->employee_id . '/' . $record->document_url; ?>"><i class="fa fa-trash"></i></a>
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
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Warning Letter</b></h4>
                                        <a data-toggle="popover" title="Employee Warning Letter" data-content="Employee Warning Letter merupakan table untuk melihat riwayat surat peringatan karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
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
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Employee Address</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employeeaddress">
                                            <i class="fa fa-plus"></i> Add Employee Address
                                        </button>
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
                                                <th>Aksi</th>
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
                                                        <td>
                                                            <a id="btnSelectAddress" class="btn btn-xs btn-primary" data-employeeaddressid="<?= $record->employee_address_id ?>" data-employeeid="<?= $record->employee_id ?>" data-addresstypeid="<?= $record->address_type_id ?>" data-addresstypename="<?= $record->address_type_name ?>" data-countryid="<?= $record->country_id ?>" data-contryname="<?= $record->country_name ?>" data-provinceid="<?= $record->province_id ?>" data-provincename="<?= $record->province_name ?>" data-cityid="<?= $record->city_id ?>" data-cityname="<?= $record->city_name ?>" data-address="<?= $record->address ?>" data-zipcode="<?= $record->zip_code ?>"><i class="fa fa-pen"></i></a>
                                                            <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeAddress/' . $record->employee_address_id . '/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
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
                        </div>
                    </div>
                    <!-- /.card -->

    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-extendedpaidleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Extended Paid Leave</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertExtPaidLeave" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <label for="employeeid">NIK</label> -->
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" type="hidden">
                                <br>
                                <label>Paid Leave Category</label>
                                <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id" disabled>
                                    <option value=""><?php echo 'Tahunan' ?></option>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label for="employeepaidleavedate">Amount</label>
                                    <input class="form-control" id="amount" name="amount">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-employeeleader">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Employee Leader</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertEmployeeLeader" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <?= $company_id; ?> -->
                                <input class="form-control" id="company_id" name="company_id" value="<?= $company_id; ?>" type="hidden">
                                <!-- <label for="employeeid">NIK</label> -->
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" type="hidden">
                                <br>
                                <div class="form-group">
                                    <label>Approver</label>
                                    <select class="form-control select2bs4" name="approver_id" id="approver_id">
                                        <option disabled selected value="">--Select--</option>
                                        <?php foreach ($EmployeeForLeaderRecords as $row) : ?>
                                            <option value="<?php echo $row->employee_id; ?>"><?php echo $row->company_name; ?> - <?php echo $row->employee_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-employeedocument">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Employee Document</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertEmployeeDocument" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <label for="employeeid">NIK</label> -->
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" type="hidden">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-employeeaddress">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Employee Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertEmployeeAddress" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <label for="employeeid">NIK</label> -->
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" type="hidden">
                                <br>
                                <label for="addresstypeid">Address Type</label>
                                <select class="form-control select2bs4" name="address_type_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($AddressTypeRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2bs4" id="country_id" name="country_id">
                                        <option disabled selected value="">--Select Country--</option>
                                        <?php foreach ($CountryRecords as $row) : ?>
                                            <option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div id="divProvince">
                                        <label>Province</label>
                                        <select class="form-control select2bs4" id="province_id" name="province_id" required>
                                            <option disabled selected value="">--Select Province--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="divCity">
                                        <label>City</label>
                                        <select class="form-control select2bs4" id="city_id" name="city_id">
                                            <option disabled selected value="">--Select City--</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="zipcode">Zip Code</label>
                                <input class="form-control" id="zip_code" name="zip_code" required>
                                <br>
                                <label for="address">Full Address</label>
                                <textarea class="form-control" id="address" placeholder="Full Address" name="address" required></textarea>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-employee-address-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateEmployeeAddress" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="employee_address_id_update" id="employee_address_id_update" />
                                <!-- <label for="employeeid">NIK</label> -->
                                <input class="form-control" id="employee_id_update" name="employee_id_update" value="<?php echo $employee_id; ?>" type="hidden">
                                <br>
                                <label for="addresstypeid">Address Type</label>
                                <select class="form-control select2bs4" name="address_type_id_update" id="address_type_id_update" required>
                                    <?php foreach ($AddressTypeRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2bs4" id="country_id_update" name="country_id_update">
                                        <?php foreach ($CountryRecords as $row) : ?>
                                            <option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div id="divProvince">
                                        <label>Province</label>
                                        <select class="form-control select2bs4" id="province_id_update" name="province_id_update" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="divCity">
                                        <label>City</label>
                                        <select class="form-control select2bs4" id="city_id_update" name="city_id_update">
                                        </select>
                                    </div>
                                </div>
                                <label for="zipcode">Zip Code</label>
                                <input class="form-control" id="zip_code_update" name="zip_code_update" required>
                                <br>
                                <label for="address">Full Address</label>
                                <textarea class="form-control" id="address_update" placeholder="Full Address" name="address_update" required></textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- EMPLOYEE Brand -->
    <div class="modal fade" id="modal-employee-brand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Employee Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertEmployeeBrand" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">Employee</label>
                                <select class="form-control select2bs4" id="employee_id" name="employee_id">
                                    <?php foreach ($EmployeeRecords as $row) : ?>
                                        <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_id; ?> - <?php echo $row->employee_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                <label for="companybrandid">Company Brand</label>
                                <select class="form-control select2bs4" id="company_brand_id" name="company_brand_id">
                                    <?php foreach ($CompanyBrandRecords as $row) : ?>
                                        <option value="<?php echo $row->company_brand_id; ?>"><?php echo $row->company_name; ?> - <?php echo $row->company_brand_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-employee-brand-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateEmployeeBrand" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="employee_brand_id_update" id="employee_brand_id_update" />
                                <div class="col-lg-12">
                                    <label for="employeeid">Employee</label>
                                    <select class="form-control select2bs4" id="employee_id_update" name="employee_id_update">
                                        <?php foreach ($EmployeeRecords as $row) : ?>
                                            <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_id; ?> - <?php echo $row->employee_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <label for="companybrandid">Company Brand</label>
                                    <select class="form-control select2bs4" id="company_brand_id_update" name="company_brand_id_update">
                                        <?php foreach ($CompanyBrandRecords as $row) : ?>
                                            <option value="<?php echo $row->company_brand_id; ?>"><?php echo $row->company_name; ?> - <?php echo $row->company_brand_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<script>
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#company_id_update").change(function() {
            var companyid = $("#company_id_update").val();

            // For set value Vehicle type on first load
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

            // For set value Vehicle type on first load
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

        $("#company_id_update").change(function() {
            var companyid = $("#company_id_update").val();
            var companybranchid = $("#company_branch_id_update").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: '../GetCompanyBranchByCompanyId2',
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
                            html += '<option value=' + response[is].company_branch_id + '>' + response[is].company_branch_name + '</option>';
                        }
                        $("#divCompanyBranch").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divCompanyBranch").hide();
                    }
                    $('#company_branch_id_update').html(html);
                }
            })
        })


        // tambahin ini 1
        $("#company_id_update").change(function() {
            var companyid = $("#company_id_update").val();
            var shiftid = $("#shift_id_update").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: '../GetShiftByCompanyId2',
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
                            html += '<option value=' + response[is].shift_id + '>' + response[is].shift_name + '</option>';
                        }
                    } else {}
                    $('#shift_id_update').html(html);
                }
            })
        })

    });

    //Update Employee Brand
    $(document).on("click", "#btnSelectEmployeeBrand", function() {
        var employee_brand_id = $(this).data("employeebrandid");
        var employee_id = $(this).data("employeeid");
        var company_brand_id = $(this).data("companybrandid");
        var company_brand_name = $(this).data("companybrandname");
        var employee_name = $(this).data("employeename");

        $("#employee_brand_id_update").val(employee_brand_id);
        $("#employee_id_update").val(employee_id);
        $("#company_brand_id_update").val(company_brand_id);

        $('#modal-employee-brand-update').modal('show');
        $("#employee_id_update").val(employee_id).trigger("change");
        $("#company_brand_id_update").val(company_brand_id).trigger("change");

    });

    //update now
    $(document).ready(function() {
        $("#btnUpdateEmployee").click(function() {

            var employeeid = $("#employee_id_update").val();
            var employeename = $("#employee_name_update").val();
            var email = $("#email_update").val();
            var phoneno = $("#phone_no_update").val();
            var companyid = $("#company_id_update").val();
            var companybranchid = $("#company_branch_id_update").val();
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
            var resignstatus = $("#resign_status_update").val();
            var jabatan = $("#jabatan_update").val();
            var shiftid = $("#shift_id_update").val();
            var overtimeflag = $("#overtime_flag_update").val();
            var bank = $("#bank_update").val();
            var norekening = $("#no_rekening_update").val();
            var namarekening = $("#nama_rekening_update").val();



            // For set value Vehicle type on first load

            $.ajax({
                url: '<?php echo base_url() ?>UpdateEmployee',
                data: {
                    employee_id_update: employeeid,
                    employee_name_update: employeename,
                    email_update: email,
                    phone_no_update: phoneno,
                    company_id_update: companyid,
                    company_branch_id_update: companybranchid,
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
                    join_date_update: joindate,
                    resign_status_update: resignstatus,
                    jabatan_update: jabatan,
                    shift_id_update: shiftid,
                    overtime_flag_update: overtimeflag,
                    bank_update: bank,
                    no_rekening_update: norekening,
                    nama_rekening_update: namarekening

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>EmployeeDetail/" +
                            employeeid;
                    } else {}
                }
            })
        });
    })
</script>


<script>
    $(document).ready(function() {
        var company_id = '<?php echo $company_id ?>';
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
                } else {
                    html += '<option value=""></option>';
                    $("#divDivision").hide();
                }
                $('#division_id_update').html(html);
                $("#division_id_update").val('<?php echo $division_id ?>').trigger("change");

                $.ajax({
                    url: '<?php echo base_url() ?>GetDepartmentByDivisionId',
                    data: {
                        division_id: '<?php echo $division_id ?>',
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
                        $("#department_id_update").val('<?php echo $department_id ?>').trigger("change");
                    }
                })
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

        // kedua
        var shift_id = $("#shift_id_update").attr('data-shiftid');
        var company_id = $("#company_id_update").attr('data-companyid');
        $.ajax({
            url: '<?php echo base_url() ?>GetShiftByCompanyId',
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
                        html += '<option value=' + response[is].shift_id + '>' + response[is].shift_name + '</option>';
                    }
                } else {}
                $('#shift_id_update').html(html);
                $("#shift_id_update").val(shift_id).trigger("change");
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#country_id").change(function() {
            var countryid = $("#country_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: '../GetProvinceByCountryId',
                data: {
                    country_id: countryid
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
                            html += '<option value=' + response[is].province_id + '>' + response[is].province_name + '</option>';
                        }
                        console.log(countryid)
                        $("#divProvince").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divProvince").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#province_id').html(html);
                    var provinceid = $("#province_id").val();

                    // For set value Vehicle type on first load
                    $.ajax({
                        url: '../GetCityByProvinceId',
                        data: {
                            province_id: provinceid
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
                                    html += '<option value=' + response[is].city_id + '>' + response[is].city_name + '</option>';
                                }
                                $("#divCity").show();
                            } else {
                                html += '<option value=""></option>';
                                $("#divCity").hide();
                            }
                            //alert(data[0].sub_menu_id);
                            $('#city_id').html(html);
                        }
                    })
                }
            })
        })

        $("#province_id").change(function() {
            var provinceid = $("#province_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: '../GetCityByProvinceId',
                data: {
                    province_id: provinceid
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
                            html += '<option value=' + response[is].city_id + '>' + response[is].city_name + '</option>';
                        }
                        $("#divCity").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divCity").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#city_id').html(html);
                }
            })
        })
    });
</script>

<script>
    $(document).on("click", "#btnSelectAddress", function() {
        var employee_address_id = $(this).data("employeeaddressid");
        var employee_id = $(this).data("employeeid");
        var address_type_id = $(this).data("addresstypeid");
        var country_id = $(this).data("countryid");
        var province_id = $(this).data("provinceid");
        var city_id = $(this).data("cityid");
        var address = $(this).data("address");
        var zip_code = $(this).data("zipcode");
        var country_name = $(this).data("countryname");
        var province_name = $(this).data("provincename");
        var city_name = $(this).data("cityname");
        var address_type_name = $(this).data("addresstypename");


        $("#employee_address_id_update").val(employee_address_id);
        $("#employee_id_update").val(employee_id);
        $("#address_type_id_update").val(address_type_id);
        $("#country_id_update").val(country_id);
        $("#province_id_update").val(province_id);
        $("#city_id_update").val(city_id);
        $("#address_update").val(address);
        $("#zip_code_update").val(zip_code);

        $('#modal-employee-address-update').modal('show');
        $("#address_type_id_update").val(address_type_id).trigger("change");
        $("#country_id_update").val(country_id).trigger("change");
        $("#province_id_update").val(province_id).trigger("change");
        $("#city_id_update").val(city_id).trigger("change");

        $(document).ready(function() {

            var countryid = $("#country_id_update").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: '../GetProvinceByCountryId',
                data: {
                    country_id: countryid
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
                            html += '<option value=' + response[is].province_id + '>' + response[is].province_name + '</option>';
                        }
                        console.log(countryid)
                        $("#divProvince").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divProvince").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#province_id_update').html(html);
                    $("#province_id_update").val(province_id).trigger("change");

                    $.ajax({
                        url: '../GetCityByProvinceId',
                        data: {
                            province_id: province_id
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
                                    html += '<option value=' + response[is].city_id + '>' + response[is].city_name + '</option>';
                                }
                                $("#divCity").show();
                            } else {
                                html += '<option value=""></option>';
                                $("#divCity").hide();
                            }
                            //alert(data[0].sub_menu_id);
                            $('#city_id_update').html(html);
                            $("#city_id_update").val(city_id).trigger("change");
                        }
                    })
                }
            })
        });

        $(document).ready(function() {

            // Selected Change Dropdown Vehicle
            $("#country_id_update").change(function() {
                var countryid = $("#country_id_update").val();

                // For set value Vehicle type on first load
                $.ajax({
                    url: '../GetProvinceByCountryId',
                    data: {
                        country_id: countryid
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
                                html += '<option value=' + response[is].province_id + '>' + response[is].province_name + '</option>';
                            }
                            console.log(countryid)
                            $("#divProvince").show();
                        } else {
                            html += '<option value=""></option>';
                            $("#divProvince").hide();
                        }
                        //alert(data[0].sub_menu_id);
                        $('#province_id_update').html(html);
                    }
                })
            })

            $("#province_id_update").change(function() {
                var provinceid = $("#province_id_update").val();

                // For set value Vehicle type on first load
                $.ajax({
                    url: '../GetCityByProvinceId',
                    data: {
                        province_id: provinceid
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
                                html += '<option value=' + response[is].city_id + '>' + response[is].city_name + '</option>';
                            }
                            $("#divCity").show();
                        } else {
                            html += '<option value=""></option>';
                            $("#divCity").hide();
                        }
                        //alert(data[0].sub_menu_id);
                        $('#city_id_update').html(html);
                    }
                })
            })
        });
    });
</script>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>