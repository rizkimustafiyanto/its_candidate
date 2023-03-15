<?php
$employee_paid_leave_id = '';
$employee_id = '';
$employee_name = '';
$company_brand_id = '';
$company_brand_name = '';
$paid_leave_id = '';
$paid_leave_amount = '';
$remaining_paid_leave = '';
$count = '';
$paid_leave_name2 = '';
$paid_leave_status_id = '';
$paid_leave_status_name = '';
$description = '';
$changer_pic = '';
$pic_phone_no = '';
$urgent_phone_no = '';
$start_date = '';
$reason_canceled = '';
$creation_datetime = '';
$creation_user_name = '';
$creation_user_id = '';


if (!empty($PaidLeaveRecords)) {
    foreach ($PaidLeaveRecords as $row) {
        $employee_paid_leave_id = $row->employee_paid_leave_id;
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $company_brand_id = $row->company_brand_id;
        $company_brand_name = $row->company_brand_name;
        $paid_leave_id = $row->paid_leave_id;
        $paid_leave_amount = $row->paid_leave_amount;
        $remaining_paid_leave = $row->remaining_paid_leave;
        $count = $row->count;
        $paid_leave_name2 =  $row->paid_leave_name2;
        $paid_leave_status_id = $row->paid_leave_status_id;
        $paid_leave_status_name = $row->paid_leave_status_name;
        $description = $row->description;
        $changer_pic = $row->changer_pic;
        $pic_phone_no = $row->pic_phone_no;
        $urgent_phone_no = $row->urgent_phone_no;
        $start_date = $row->start_date;
        $reason_canceled = $row->reason_canceled;
        $creation_datetime = $row->creation_datetime;
        $creation_user_name = $row->creation_user_name;
        $creation_user_id = $row->creation_user_id;
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
                                <h3>Detail Pengajuan Cuti</h3>
                                <!-- <?php print_r($EmployeePaidLeaveKhususRecords2) ?> -->
                                <!-- <?php print_r($PaidLeaveRecords2) ?> -->
                            </strong>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Pengajuan Cuti</li>
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
                                <a href="javascript:window.history.go(-1);" class="btn btn-md btn-circle btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12 text-right">
                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                    <button type=" button" class="btn btn-md btn-primary" id="btnUpdatePaidLeave">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <?php if (!empty($PaidLeaveDateTimeRecords)) { ?>
                                        <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitPaidLeave">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } else if ($remaining_paid_leave <= 0) { ?>
                                        <button type=" button" class="btn btn-md btn-success" id="btnSubmitLeaveWithNoRemaining">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } else if (empty($PaidLeaveDateTimeRecords)) { ?>
                                        <button type=" button" class="btn btn-md btn-success" id="btnSubmitLeaveError">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } ?>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ((($this->session->userdata('employee_id') == $PaidLeaveApproval1Records) && ($paid_leave_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
                                <?php } ?>

                                <?php if (($this->session->userdata('employee_id') == $PaidLeaveApproval1Records) && ($paid_leave_status_id == 'ST-006')) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-cancel-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } ?>

                                <!-- cancel request -->
                                <?php if (($paid_leave_status_id == 'ST-002') && ((strtotime($start_date)) >= (time())) && ($this->session->userdata('employee_id') == $employee_id) && ($creation_user_id == $this->session->userdata('employee_id'))) { ?>
                                    <button type=" button" class="btn btn-md btn-danger" id="btnCancelRequest" data-toggle="modal" data-target="#modal-cancel">
                                        <i class="fa fa-paper-plane"></i> Cancel Request
                                    </button>
                                <?php } ?>
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
                                        <h4 class="card-title"><b>Edit Pengajuan Cuti</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" value="<?= $this->session->userdata('company_id'); ?>">
                                    <input type="hidden" value="<?= $this->session->userdata('division_id'); ?>">
                                    <input type="hidden" value="<?= $this->session->userdata('department_id'); ?>">
                                    <div class="row">
                                        <input class="form-control" id="company_brand_id" name="company_brand_id" value="<?php echo $company_brand_id; ?>" hidden>
                                        <div class="col-md-4">
                                            <label for="employeeid">NIK</label>
                                            <input class="form-control" id="employee_id" placeholder="NIK" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" readonly="true" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeename">Name</label>
                                                <input class="form-control" id="employee_name" placeholder="Name" name="employee_name" value="<?php echo $employee_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeepaidleaveid">Document No</label>
                                                <input class="form-control" id="employee_paid_leave_id" placeholder="Paid Leave Id" name="employee_paid_leave_id" value="<?php echo $employee_paid_leave_id; ?>" readonly="true" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="paidleavestatusid">Status</label>
                                                <input class="form-control" id="paid_leave_status_id" placeholder="Status" name="paid_leave_status_id" value="<?php echo $paid_leave_status_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="paidleaveamount">Jumlah Cuti</label>
                                                <input class="form-control" id="paid_leave_amount" placeholder="Paid Leave Amount" name="paid_leave_amount" value="<?php echo $paid_leave_amount; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sisa Cuti</label>
                                                <input class="form-control" placeholder="Paid Leave Amount" value="<?php echo $remaining_paid_leave; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal Diajukan</label>
                                                <input class="form-control" id="creation_datetime" placeholder="Creation Datetime" name="creation_datetime" value="<?php echo $creation_datetime; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Creator</label>
                                            <input class="form-control" id="creation_user_id" placeholder="Creator" name="creation_user_id" value="<?php echo $creation_user_name; ?>" maxlength="50" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Changer PIC</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <select data-width="100%" class="form-control select2bs4" id="changer_pic" name="changer_pic">
                                                        <?php
                                                        foreach ($EmployeeRecords as $row) {
                                                            $selected = ($row->employee_id == $changer_pic) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->employee_id; ?>" <?= $selected; ?> class=""><?= $row->employee_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <select data-width="100%" class="form-control select2bs4" id="changer_pic" name="changer_pic" disabled>
                                                        <?php
                                                        foreach ($EmployeeRecords as $row) {
                                                            $selected = ($row->employee_id == $changer_pic) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->employee_id; ?>" <?= $selected; ?> class=""><?= $row->employee_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <textarea type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } else { ?>
                                                    <textarea readonly type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="picphoneno">PIC Phone No</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <input class="form-control" id="pic_phone_no" placeholder="Phone No" name="pic_phone_no" value="<?php echo $pic_phone_no; ?>" maxlength="50" required>
                                                <?php } else { ?>
                                                    <input class="form-control" id="pic_phone_no" placeholder="Phone No" name="pic_phone_no" value="<?php echo $pic_phone_no; ?>" maxlength="50" readonly>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="urgentphoneno">Urgent Phone No</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <input class="form-control" id="urgent_phone_no" placeholder="Urgent Phone No" name="urgent_phone_no" value="<?php echo $urgent_phone_no; ?>" maxlength="50" required>
                                                <?php } else { ?>
                                                    <input class="form-control" id="urgent_phone_no" placeholder="Urgent Phone No" name="urgent_phone_no" value="<?php echo $urgent_phone_no; ?>" maxlength="50" readonly>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category Paid Leave</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <select data-width="100%" class="form-control select2bs4 paid_leave_name2" id="paid_leave_name2" name="paid_leave_name2">
                                                        <?php
                                                        foreach ($EmployeePaidLeaveRecords as $row) {
                                                            $selected = ($row->variable_id == $paid_leave_name2) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <select data-width="100%" class="form-control select2bs4" id="paid_leave_name2" name="paid_leave_name2" disabled>
                                                        <?php
                                                        foreach ($EmployeePaidLeaveRecords as $row) {
                                                            $selected = ($row->variable_id == $paid_leave_name2) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" id="Divpaid_leave_khusus">
                                                <label>Paid Leave Sub Category</label>
                                                <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                    <select class="form-control select2bs4 paid_leave_id" name="paid_leave_id" id="paid_leave_id">
                                                        <?php if ($PaidLeaveRecordsWisataRohani == 0 && $PaidLeaveRecordsIbadahHaji == 0) { ?>
                                                            <?php
                                                            foreach ($EmployeePaidLeaveKhususRecords as $row) {
                                                                $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        <?php } else if ($PaidLeaveRecordsIbadahHaji > 0 && $PaidLeaveRecordsWisataRohani > 0) { ?>
                                                            <?php if ($paid_leave_id == 'KC-012') { ?>
                                                                <option selected value="KC-012">Ibadah Haji</option>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususIbadahHajiAndWisataRohaniRecords as $row) {
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } else if ($paid_leave_id == 'KC-010') { ?>
                                                                <option selected value="KC-010">Wisata Rohani</option>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususIbadahHajiAndWisataRohaniRecords as $row) {
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususIbadahHajiAndWisataRohaniRecords as $row) {
                                                                    $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else if ($PaidLeaveRecordsWisataRohani > 0) { ?>
                                                            <?php if ($paid_leave_id == 'KC-010') { ?>
                                                                <option selected value="KC-010">Wisata Rohani</option>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususWisataRohaniRecords as $row) {
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususWisataRohaniRecords as $row) {
                                                                    $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else if ($PaidLeaveRecordsIbadahHaji > 0) { ?>
                                                            <?php if ($paid_leave_id == 'KC-012') { ?>
                                                                <option selected value="KC-012">Ibadah Haji</option>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususIbadahHajiRecords as $row) {
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                foreach ($EmployeePaidLeaveKhususIbadahHajiRecords as $row) {
                                                                    $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                                                                ?>
                                                                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <select class="form-control select2bs4 paid_leave_id" name="paid_leave_id" id="paid_leave_id" disabled>
                                                        <?php
                                                        foreach ($EmployeePaidLeaveKhususRecords as $row) {
                                                            $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <?php if (($paid_leave_status_id == 'ST-006') || ($paid_leave_status_id == 'ST-007') || ($paid_leave_status_id == 'ST-008')) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Alasan Batal Cuti</b></h4>
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
                                                <textarea readonly type="text" class="form-control" id="employee_exit_reason" name="employee_exit_reason"><?php echo $reason_canceled; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="card">
                            <div class="card-header">
                                <strong>
                                    <h4 class="card-title"><b>Tanggal Cuti</b></h4>
                                </strong>
                                <div class="card-tools">
                                    <?php if ($paid_leave_id == 'PL-001') { ?>
                                        <?php if (($paid_leave_status_id == 'ST-001') && ($remaining_paid_leave <= 0)) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-input-datetime-paidleave" hidden>
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                        <?php } else if ($paid_leave_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-input-datetime-paidleave">
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    <?php } ?>
                                    <?php if (substr($paid_leave_id, 0, 2) == 'KC') { ?>
                                        <?php if (($paid_leave_status_id == 'ST-001') && ($remaining_paid_leave == $paid_leave_amount)) { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-input-datetime-paidleave" hidden>
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                        <?php } else if ($paid_leave_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-input-datetime-paidleave">
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="sickleave_datetime_table" class="table table-bordered  table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Cuti</th>
                                            <?php
                                            if ($paid_leave_status_id == 'ST-001') {
                                            ?>
                                                <th>Action</th>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($PaidLeaveDateTimeRecords)) {
                                            foreach ($PaidLeaveDateTimeRecords as $record) {
                                        ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($record->employee_paid_leave_date)); ?></td>
                                                    <?php if ($paid_leave_status_id == 'ST-001') { ?>
                                                        <td class="text-center">
                                                            <a id="btnDelete" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'DeletePaidLeaveDateTime/' . $record->employee_paid_leave_datetime_id . '/' . $record->employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id; ?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    <?php } else { ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                </tr>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if ($paid_leave_status_id != 'ST-001') { ?>
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Approval</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="approval_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Line No</th>
                                                <th>Approver</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Approval Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($PaidLeaveApprovalRecords)) {
                                                foreach ($PaidLeaveApprovalRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $record->line_no; ?></td>
                                                        <td>
                                                            <?php echo $record->approver_name; ?>
                                                        </td>
                                                        <?php if ($record->comment != null) { ?>
                                                            <td>
                                                                <?php echo $record->comment; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td> -</td>
                                                        <?php } ?>
                                                        <?php if ($record->status_name != null) { ?>
                                                            <td>
                                                                <?php echo $record->status_name; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td> -</td>
                                                        <?php } ?>
                                                        <?php if ($record->change_datetime != null) { ?>
                                                            <td>
                                                                <?php echo $record->change_datetime; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td> -</td>
                                                        <?php } ?>
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
                    </div>
    </section>

    <div class="modal fade" id="modal-input-datetime-paidleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Tanggal Cuti</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertPaidLeaveDateTime" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="paid_leave_id" name="paid_leave_id" value="<?php echo $paid_leave_id; ?>">
                                <br>
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" readonly>
                                <br>
                                <label for="employeepaidleaveid">Document No</label>
                                <input class="form-control" id="employee_paid_leave_id" value="<?php echo $employee_paid_leave_id; ?>" name="employee_paid_leave_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="employeepaidleavedate">Tanggal Cuti</label>
                                    <div class="input-group date" id="datetime7" data-target-input="nearest">
                                        <input type="text" id="employee_paid_leave_date" placeholder="Tanggal Cuti" name="employee_paid_leave_date" class="form-control datetimepicker-input" data-target="#datetime7" required />
                                        <div class="input-group-append" data-target="#datetime7" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
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

    <div class="modal fade" id="modal-approval">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdatePaidLeaveApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="paid_leave_id" name="paid_leave_id" value="<?php echo $paid_leave_id; ?>">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="employee_paid_leave_id" value="<?php echo $employee_paid_leave_id; ?>" name="employee_paid_leave_id" readonly>
                                <br>
                                <label for="leavestatusid">Status *</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($PaidLeaveApprovalStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <input type="hidden" id="status_id_approval" name="paid_leave_status_id" value="<?php echo $paid_leave_status_id; ?>">
                                <label for="comment">Comment *</label>
                                <textarea class="form-control" id="comment" placeholder="Comment" name="comment" required>-</textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary show-loading" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cancel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Request Canceled</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>RequestCanceled" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="paid_leave_id" name="paid_leave_id" value="<?php echo $paid_leave_id; ?>">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <input class="form-control" id="company_brand_id" name="company_brand_id" value="<?php echo $company_brand_id; ?>" hidden>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="employee_paid_leave_id" value="<?php echo $employee_paid_leave_id; ?>" name="employee_paid_leave_id" readonly>
                                <br>
                                <label for="reasoncanceled">Reason Canceled *</label>
                                <textarea class="form-control" id="reason_canceled" placeholder="Reason Canceled" name="reason_canceled" maxlength="50" required></textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary show-loading" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cancel-approval">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdatePaidLeaveCancelApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="paid_leave_id" name="paid_leave_id" value="<?php echo $paid_leave_id; ?>">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" hidden>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="employee_paid_leave_id" value="<?php echo $employee_paid_leave_id; ?>" name="employee_paid_leave_id" readonly>
                                <br>
                                <label>Status *</label>
                                <?php if ($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '5') { ?>
                                    <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                        <option value="AOP-001">Approved</option>
                                    </select>
                                <?php } else { ?>
                                    <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                        <option disabled selected value="">--Select--</option>
                                        <?php foreach ($PaidLeaveApprovalStatusRecords as $row) : ?>
                                            <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php } ?>
                                <br>
                                <input type="hidden" id="status_id_approval" name="paid_leave_status_id" value="<?php echo $paid_leave_status_id; ?>">
                                <label for="comment">Comment *</label>
                                <textarea class="form-control" id="comment" placeholder="Comment" name="comment" maxlength="50" required>-</textarea>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="btnSubmit" class="btn btn-primary show-loading" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on("click", "#btnAdd", function() {

    });
</script>

<script>
    // Submit Paid Leave
    $(document).ready(function() {
        $("#btnSubmitPaidLeave").click(function() {

            var employeepaidleaveid = $("#employee_paid_leave_id").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleavename2 = $("#paid_leave_name2").val();
            var paidleaveamount = $("#paid_leave_amount").val();
            var paidleavestatusid = 'ST-003';
            var description = $("#description").val();
            var changerpic = $("#changer_pic").val();
            var picphoneno = $("#pic_phone_no").val();
            var urgentphoneno = $("#urgent_phone_no").val();

            $.ajax({
                url: '<?php echo base_url() ?>SubmitPaidLeave',
                data: {
                    employee_paid_leave_id: employeepaidleaveid,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    paid_leave_id: paidleaveid,
                    paid_leave_name2: paidleavename2,
                    paid_leave_amount: paidleaveamount,
                    paid_leave_status_id: paidleavestatusid,
                    description: description,
                    changer_pic: changerpic,
                    pic_phone_no: picphoneno,
                    urgent_phone_no: urgentphoneno
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        if (paidleavename2 == 'PL-002') {
                            paidleaveid = paidleaveid;
                        } else {
                            paidleaveid = paidleavename2;
                        }
                        window.location.href = "<?php echo base_url() ?>PaidLeaveDetail/" +
                            employeepaidleaveid + "/" + paidleaveid + "/" + employeeid;
                    } else {

                    }
                }
            })
        });

        $("#paid_leave_id").change(function() {
            var employeepaidleaveid = $("#employee_paid_leave_id").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleavename2 = $("#paid_leave_name2").val();
            var paidleaveamount = $("#paid_leave_amount").val();
            var paidleavestatusid = 'ST-001';
            var description = $("#description").val();
            var changerpic = $("#changer_pic").val();
            var picphoneno = $("#pic_phone_no").val();
            var urgentphoneno = $("#urgent_phone_no").val();

            $.ajax({
                url: '<?php echo base_url() ?>UpdatePaidLeaveStatus',
                data: {
                    employee_paid_leave_id: employeepaidleaveid,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    paid_leave_id: paidleaveid,
                    paid_leave_name2: paidleavename2,
                    paid_leave_amount: paidleaveamount,
                    paid_leave_status_id: paidleavestatusid,
                    description: description,
                    changer_pic: changerpic,
                    pic_phone_no: picphoneno,
                    urgent_phone_no: urgentphoneno
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        if (paidleavename2 == 'PL-002') {
                            paidleaveid = paidleaveid;
                        } else {
                            paidleaveid = paidleavename2;
                        }
                        window.location.href = "<?php echo base_url() ?>PaidLeaveDetail/" +
                            employeepaidleaveid + "/" + paidleaveid + "/" + employeeid;
                    } else {}
                }
            })
        })
    })


    $(document).ready(function() {
        $("#btnUpdatePaidLeave").click(function() {

            var employeepaidleaveid = $("#employee_paid_leave_id").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleavename2 = $("#paid_leave_name2").val();
            var paidleaveamount = $("#paid_leave_amount").val();
            var paidleavestatusid = 'ST-001';
            var description = $("#description").val();
            var changerpic = $("#changer_pic").val();
            var picphoneno = $("#pic_phone_no").val();
            var urgentphoneno = $("#urgent_phone_no").val();

            $.ajax({
                url: '<?php echo base_url() ?>UpdatePaidLeave',
                data: {
                    employee_paid_leave_id: employeepaidleaveid,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    paid_leave_id: paidleaveid,
                    paid_leave_name2: paidleavename2,
                    paid_leave_amount: paidleaveamount,
                    paid_leave_status_id: paidleavestatusid,
                    description: description,
                    changer_pic: changerpic,
                    pic_phone_no: picphoneno,
                    urgent_phone_no: urgentphoneno
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        if (paidleavename2 == 'PL-002') {
                            paidleaveid = paidleaveid;
                        } else {
                            paidleaveid = paidleavename2;
                        }
                        window.location.href = "<?php echo base_url() ?>PaidLeaveDetail/" +
                            employeepaidleaveid + "/" + paidleaveid + "/" + employeeid;
                    } else {}
                }
            })
        });
    })
</script>

<script>
    $("#paid_leave_name2").change(function() {
        var paidleavename2 = $("#paid_leave_name2").val();

        if (paidleavename2 == 'PL-001') {
            $('#Divpaid_leave_khusus').hide();

            var employeepaidleaveid = $("#employee_paid_leave_id").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleavename2 = $("#paid_leave_name2").val();
            var paidleaveamount = $("#paid_leave_amount").val();
            var paidleavestatusid = 'ST-001';
            var description = $("#description").val();
            var changerpic = $("#changer_pic").val();
            var picphoneno = $("#pic_phone_no").val();
            var urgentphoneno = $("#urgent_phone_no").val();

            $.ajax({
                url: '<?php echo base_url() ?>UpdatePaidLeaveStatus',
                data: {
                    employee_paid_leave_id: employeepaidleaveid,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    paid_leave_id: paidleaveid,
                    paid_leave_name2: paidleavename2,
                    paid_leave_amount: paidleaveamount,
                    paid_leave_status_id: paidleavestatusid,
                    description: description,
                    changer_pic: changerpic,
                    pic_phone_no: picphoneno,
                    urgent_phone_no: urgentphoneno
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        if (paidleavename2 == 'PL-002') {
                            paidleaveid = paidleaveid;
                        } else {
                            paidleaveid = paidleavename2;
                        }
                        window.location.href = "<?php echo base_url() ?>PaidLeaveDetail/" +
                            employeepaidleaveid + "/" + paidleaveid + "/" + employeeid;
                    } else {}
                }
            })
        } else {
            $('#Divpaid_leave_khusus').show();

            var employeepaidleaveid = $("#employee_paid_leave_id").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleavename2 = $("#paid_leave_name2").val();
            var paidleaveamount = $("#paid_leave_amount").val();
            var paidleavestatusid = 'ST-001';
            var description = $("#description").val();
            var changerpic = $("#changer_pic").val();
            var picphoneno = $("#pic_phone_no").val();
            var urgentphoneno = $("#urgent_phone_no").val();

            $.ajax({
                url: '<?php echo base_url() ?>UpdatePaidLeaveStatus',
                data: {
                    employee_paid_leave_id: employeepaidleaveid,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    paid_leave_id: paidleaveid,
                    paid_leave_name2: paidleavename2,
                    paid_leave_amount: paidleaveamount,
                    paid_leave_status_id: paidleavestatusid,
                    description: description,
                    changer_pic: changerpic,
                    pic_phone_no: picphoneno,
                    urgent_phone_no: urgentphoneno
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        if (paidleavename2 == 'PL-002') {
                            paidleaveid = paidleaveid;
                        } else {
                            paidleaveid = paidleavename2;
                        }
                        window.location.href = "<?php echo base_url() ?>PaidLeaveDetail/" +
                            employeepaidleaveid + "/" + paidleaveid + "/" + employeeid;
                    } else {}
                }
            })
        }
    });
</script>


<script>
    $(document).ready(function(e) {
        var paidleavename2 = $("#paid_leave_name2").val();

        if (paidleavename2 == 'PL-001') {
            $('#Divpaid_leave_khusus').hide();
        } else {
            $('#Divpaid_leave_khusus').show();
        }
    });
</script>