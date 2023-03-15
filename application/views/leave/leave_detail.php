<?php
$leave_id = '';
$leave_name = '';
$employee_id = '';
$employee_name = '';
$company_brand_id = '';
$company_brand_name = '';
$leave_status_id = '';
$leave_status_name = '';
$leave_category_id = '';
$leave_category_name = '';
$leave_sub_category_id = '';
$leave_sub_category_name = '';
$time_leave_start = '';
$time_leave_finish = '';
$creation_datetime = '';
$creation_user_id = '';
$creation_user_name = '';
// $amount_leave = '';


if (!empty($LeaveRecords)) {
    foreach ($LeaveRecords as $row) {
        $leave_id = $row->leave_id;
        $leave_name = $row->leave_name;
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $company_brand_id = $row->company_brand_id;
        $company_brand_name = $row->company_brand_name;
        $leave_status_id = $row->leave_status_id;
        $leave_status_name = $row->leave_status_name;
        $leave_category_id = $row->leave_category_id;
        $leave_category_name = $row->leave_category_name;
        $leave_sub_category_id = $row->leave_sub_category_id;
        $leave_sub_category_name = $row->leave_sub_category_name;
        $time_leave_start = $row->time_leave_start;
        $time_leave_finish = $row->time_leave_finish;
        $creation_datetime = $row->creation_datetime;
        $creation_user_id = $row->creation_user_id;
        $creation_user_name = $row->creation_user_name;
        // $amount_leave = $row->amount_leave;
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
                                <h3>Detail Pengajuan Izin </h3>
                            </strong>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Pengajuan Izin</li>
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
                            <!-- button back -->
                            <div class="col-xs-12 text-left">
                                <a href="javascript:window.history.go(-1);" class="btn btn-md btn-circle btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12 text-right">
                                <?php if ($leave_status_id == 'ST-001') { ?>
                                    <button type=" button" class="btn btn-md btn-primary" id="btnUpdateLeave">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <?php if (!empty($LeaveDateTimeRecords)) { ?>
                                        <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitLeave">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type=" button" class="btn btn-md btn-success" id="btnSubmitLeaveError">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } ?>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ((($this->session->userdata('employee_id') == $LeaveApproval1Records) && ($leave_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
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
                                        <h4 class="card-title"><b>Edit Pengajuan Izin</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- <form role="form" action="<?php echo base_url() ?>UpdateLeave" method="post"> -->
                                <div class="card-body">
                                    <div class="row">
                                        <input class="form-control" id="company_brand_id" name="company_brand_id" value="<?php echo $company_brand_id; ?>">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeeid">NIK</label>
                                                <input class="form-control" id="employee_id" placeholder="NIK" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="employeename">Name</label>
                                                <input class="form-control" id="employee_name" placeholder="Name" name="employee_name" value="<?php echo $employee_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="leaveid">Document No</label>
                                            <input class="form-control" id="leave_id" placeholder="Leave Id" name="leave_id" value="<?php echo $leave_id; ?>" readonly="true" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="leavestatusid">Status</label>
                                                <input class="form-control" id="leave_status_id" placeholder="Status" name="leave_status_id" value="<?php echo $leave_status_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="leavename">Alasan</label>
                                                <?php if ($leave_status_id == 'ST-001') { ?>
                                                    <textarea type="text" class="form-control" id="leave_name" name="leave_name"><?php echo $leave_name; ?></textarea>
                                                <?php } else { ?>
                                                    <textarea readonly type="text" class="form-control" id="leave_name" name="leave_name"><?php echo $leave_name; ?></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <?php if ($leave_category_id != 'BA-003') { ?>
                                                <div class="form-group">
                                                    <label>Keperluan</label>
                                                    <?php if ($leave_status_id == 'ST-001') { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_category_id" name="leave_category_id">
                                                            <?php
                                                            foreach ($CategoryRecords as $row) {
                                                                $selected = ($row->variable_id == $leave_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_category_id" name="leave_category_id" disabled>
                                                            <?php
                                                            foreach ($CategoryRecords as $row) {
                                                                $selected = ($row->variable_id == $leave_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            <?php } else if ($leave_category_id == 'BA-003') { ?>
                                                <div class="form-group">
                                                    <label>Keperluan</label>
                                                    <?php if ($leave_status_id == 'ST-001') { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_category_id" name="leave_category_id">
                                                            <?php
                                                            foreach ($CategoryRecords1 as $row) {
                                                                $selected = ($row->variable_id == $leave_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_category_id" name="leave_category_id" disabled>
                                                            <?php
                                                            foreach ($CategoryRecords1 as $row) {
                                                                $selected = ($row->variable_id == $leave_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php if ($leave_category_id == 'BA-003') { ?>
                                            <!-- <div class="col-md-4">
                                                <label>Jumlah Izin</label>
                                                <input class="form-control" id="amount_leave" placeholder="Jumlah Cuti" name="amount_leave" value="<?php echo $amount_leave; ?>" maxlength="50" readonly>
                                            </div> -->
                                        <?php } ?>
                                        <div class="col-md-4">
                                            <?php if ($leave_sub_category_id != null) { ?>
                                                <div class="form-group">
                                                    <label>Izin untuk</label>
                                                    <?php if ($leave_status_id == 'ST-001') { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_sub_category_id" name="leave_sub_category_id">
                                                            <?php
                                                            foreach ($SubCategoryRecords as $row) {
                                                                $selected = ($row->variable_id == $leave_sub_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <select data-width="100%" class="form-control select2bs4" id="leave_sub_category_id" name="leave_sub_category_id" disabled>
                                                            <?php
                                                            foreach ($SubCategoryRecords as $row) {
                                                                $selected = ($row->variable_id == $leave_sub_category_id) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="Divtime_leave_start" class="form-group"> <label for="timeleavestart">Jam Mulai</label>
                                                <?php if ($leave_status_id == 'ST-001') { ?>
                                                    <div class="input-group date" id="datetime" data-target-input="nearest">
                                                        <input type="text" id="time_leave_start" placeholder="Jam Mulai" name="time_leave_start" value="<?php echo $time_leave_start; ?>" class="form-control datetimepicker-input" data-target="#datetime" />
                                                        <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="input-group date" id="datetime" data-target-input="nearest">
                                                        <input type="text" id="time_leave_start" placeholder="Jam Mulai" name="time_leave_start" value="<?php echo $time_leave_start; ?>" class="form-control datetimepicker-input" data-target="#datetime" disabled />
                                                        <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="Divtime_leave_finish" class="form-group"><label for="timeleavefinish">Jam Selesai</label>
                                                <?php if ($leave_status_id == 'ST-001') { ?>
                                                    <div class="input-group date" id="datetime1" data-target-input="nearest">
                                                        <input type="text" id="time_leave_finish" placeholder="Jam Selesai" name="time_leave_finish" value="<?php echo $time_leave_finish; ?>" class="form-control datetimepicker-input" data-target="#datetime1" />
                                                        <div class="input-group-append" data-target="#datetime1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="input-group date" id="datetime1" data-target-input="nearest">
                                                        <input type="text" id="time_leave_finish" placeholder="Jam Selesai" name="time_leave_finish" value="<?php echo $time_leave_finish; ?>" class="form-control datetimepicker-input" data-target="#datetime1" disabled />
                                                        <div class="input-group-append" data-target="#datetime1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Tanggal Izin</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($leave_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-dateleave">
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-dateleave" hidden>
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- <?php print_r($TokenRequesterRecords); ?> -->

                                <div class="card-body">
                                    <table id="leave_datetime_table" class="table table-bordered  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Izin</th>
                                                <?php
                                                if ($leave_status_id == 'ST-001') {
                                                ?>
                                                    <th>Action</th>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($LeaveDateTimeRecords)) {
                                                foreach ($LeaveDateTimeRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo  date('d-m-Y', strtotime($record->leave_date)); ?></td>
                                                        <?php if ($leave_status_id == 'ST-001') { ?>
                                                            <td class="text-center">
                                                                <a id="btnDelete" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'DeleteLeaveDateTime/' . $record->leave_datetime_id . '/' . $record->leave_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <?php if ($leave_status_id != 'ST-001' && !empty($LeaveApprovalRecords)) { ?>
                                <div class="card">
                                    <!-- card-header -->
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
                                                if (!empty($LeaveApprovalRecords)) {
                                                    foreach ($LeaveApprovalRecords as $record) {
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

                        <!-- /.card -->


    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-dateleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Date Time</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertLeaveDateTime" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="leave_id" value="<?php echo $leave_id; ?>" name="leave_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="leavedate">Tanggal Izin</label>
                                    <div class="input-group date" id="datetime2" data-target-input="nearest">
                                        <input type="text" id="leave_date" placeholder="Leave Date" name="leave_date" class="form-control datetimepicker-input" data-target="#datetime2" required />
                                        <div class="input-group-append" data-target="#datetime2" data-toggle="datetimepicker">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
                <form role="form" action="<?php echo base_url() ?>UpdateLeaveApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="leave_id" value="<?php echo $leave_id; ?>" name="leave_id" readonly>
                                <br>
                                <label for="leavestatusid">Status *</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($LeaveApprovalStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="comment">Comment *</label>
                                <!-- <input type="hidden" id="leave_id_approval" name="leave_id" value="<?php echo $leave_id; ?>"> -->
                                <input type="hidden" id="status_id_approval" name="leave_status_id" value="<?php echo $leave_status_id; ?>">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>

<script>
    $(document).ready(function(e) {
        var leavesubcategoryid = $("#leave_sub_category_id").val();
        if (leavesubcategoryid == "SC-001" || leavesubcategoryid == "SC-005" || leavesubcategoryid == "SC-006") {
            $('#Divtime_leave_start').hide();
            $('#Divtime_leave_finish').hide();
        } else if (leavesubcategoryid == 'SC-002') {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').hide();
        } else if (leavesubcategoryid == 'SC-003') {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').hide();
        } else if (leavesubcategoryid == null) {
            $('#Divtime_leave_start').hide();
            $('#Divtime_leave_finish').hide();
        } else {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').show();
        }
    });
</script>

<script>
    $(document).on("click", "#btnAdd", function() {

    });
</script>

<script>
    $("#leave_sub_category_id").change(function() {
        var leavesubcategoryid = $("#leave_sub_category_id").val();

        if (leavesubcategoryid == "SC-001" || leavesubcategoryid == "SC-005" || leavesubcategoryid == "SC-006") {
            $('#Divtime_leave_start').hide();
            $('#Divtime_leave_finish').hide();
        } else if (leavesubcategoryid == 'SC-002') {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').hide();
        } else if (leavesubcategoryid == 'SC-003') {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').hide();
        } else {
            $('#Divtime_leave_start').show();
            $('#Divtime_leave_finish').show();
        }
    });
</script>

<script>
    // Update Leave
    $(document).ready(function() {
        $("#btnUpdateLeave").click(function() {

            var leaveid = $("#leave_id").val();
            var leavename = $("#leave_name").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var leavecategoryid = $("#leave_category_id").val();
            var leavestatusid = 'ST-001';
            var leavesubcategoryid = $("#leave_sub_category_id").val();
            var timeleavestart = $("#time_leave_start").val();
            var timeleavefinish = $("#time_leave_finish").val();


            $.ajax({
                url: '<?php echo base_url() ?>UpdateLeave',
                data: {
                    leave_id: leaveid,
                    leave_name: leavename,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    leave_category_id: leavecategoryid,
                    leave_status_id: leavestatusid,
                    leave_sub_category_id: leavesubcategoryid,
                    time_leave_start: timeleavestart,
                    time_leave_finish: timeleavefinish
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>LeaveDetail/" +
                            leaveid;
                    } else {}
                }
            })
        });
    })

    // Submit Leave
    $(document).ready(function() {
        $("#btnSubmitLeave").click(function() {

            var leaveid = $("#leave_id").val();
            var leavename = $("#leave_name").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var leavecategoryid = $("#leave_category_id").val();
            var leavestatusid = 'ST-003';
            var leavesubcategoryid = $("#leave_sub_category_id").val();
            var timeleavestart = $("#time_leave_start").val();
            var timeleavefinish = $("#time_leave_finish").val();

            $.ajax({
                url: '<?php echo base_url() ?>SubmitLeave',
                data: {
                    leave_id: leaveid,
                    leave_name: leavename,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    leave_category_id: leavecategoryid,
                    leave_status_id: leavestatusid,
                    leave_sub_category_id: leavesubcategoryid,
                    time_leave_start: timeleavestart,
                    time_leave_finish: timeleavefinish

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>LeaveDetail/" +
                            leaveid;
                    } else {

                    }
                }
            })
        });
    })
</script>