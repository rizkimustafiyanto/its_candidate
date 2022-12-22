<?php
$overtime_id = '';
$description = '';
$employee_id = '';
$employee_name = '';
$company_brand_id = '';
$company_brand_name = '';
$overtime_status_id = '';
$overtime_status_name = '';
$overtime_category_id = '';
$overtime_category_name = '';
$time_overtime_start = '';
$time_overtime_finish = '';
$amount_time_overtime = '';
$actualtimeovertimestart = '';
$actualtimeovertimefinish = '';
$overtime = '';
$attendance_id = '';
$change_user_name = '';
$actual_time_overtime_start = '';
$actual_time_overtime_finish = '';
$actual_amount_time_overtime = '';

if (!empty($OvertimeRecords)) {
    foreach ($OvertimeRecords as $row) {
        $overtime_id = $row->overtime_id;
        $description = $row->description;
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $company_brand_id = $row->company_brand_id;
        $company_brand_name = $row->company_brand_name;
        $overtime_status_id = $row->overtime_status_id;
        $overtime_status_name = $row->overtime_status_name;
        $overtime_category_id = $row->overtime_category_id;
        $overtime_category_name = $row->overtime_category_name;
        $time_overtime_start = $row->time_overtime_start;
        $time_overtime_finish = $row->time_overtime_finish;
        $amount_time_overtime = $row->amount_time_overtime;
        $actualtimeovertimestart = $row->actualtimeovertimestart;
        $actualtimeovertimefinish = $row->actualtimeovertimefinish;
        $overtime = $row->overtime;
        $attendance_id = $row->attendance_id;
        $change_user_name = $row->change_user_name;
        $actual_time_overtime_start = $row->actual_time_overtime_start;
        $actual_time_overtime_finish = $row->actual_time_overtime_finish;
        $actual_amount_time_overtime = $row->actual_amount_time_overtime;
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
                                <h3>Detail Pengajuan Lembur</h3>
                                <!-- <?php print_r($actualtimeovertimestart) ?> -->
                            </strong>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Pengajuan Lembur</li>
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
                                <a href="javascript:window.history.go(-1);" class=" btn btn-md btn-circle btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12 text-right">
                                <?php if ($overtime_status_id == 'ST-001') { ?>
                                    <button type=" button" class="btn btn-md btn-primary" id="btnUpdateOvertime">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <button type=" button" class="btn btn-md btn-success show-loading" id="btnSubmitOvertime">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                <?php } ?>
                                <?php if ((str_replace('.', '', $this->session->userdata('employee_id')) == (str_replace('.', '', $OvertimeApproval1Records)) && ($overtime_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ($this->session->userdata('role_id') == '5' && ($overtime_status_id == 'ST-002')) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-confirmation">
                                        <i class="fa fa-check-circle"></i> Confirmation
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
                                        <h4 class="card-title"><b>Edit Pengajuan Lembur</b></h4>
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
                                        <input class="form-control" id="company_brand_id" name="company_brand_id" value="<?php echo $company_brand_id; ?>" hidden>
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
                                            <label for="overtimeid">Document No</label>
                                            <input class="form-control" id="overtime_id" placeholder="Overtime Id" name="overtime_id" value="<?php echo $overtime_id; ?>" readonly="true" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="overtimestatusid">Status</label>
                                            <input class="form-control" id="overtime_status_id" placeholder="Status" name="overtime_status_id" value="<?php echo $overtime_status_name; ?>" maxlength="50" readonly="true" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <?php if ($overtime_status_id == 'ST-001') { ?>
                                                    <select data-width="100%" class="form-control select2bs4" id="overtime_category_id" name="overtime_category_id">
                                                        <?php
                                                        foreach ($CategoryRecords as $row) {
                                                            $selected = ($row->variable_id == $overtime_category_id) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <select data-width="100%" class="form-control select2bs4" id="overtime_category_id" name="overtime_category_id" disabled>
                                                        <?php
                                                        foreach ($CategoryRecords as $row) {
                                                            $selected = ($row->variable_id == $overtime_category_id) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"> <label for="timeovertimestart">Jam Mulai Lembur</label>
                                                <div class="input-group date" id="datetime3" data-target-input="nearest">
                                                    <?php if ($overtime_status_id == 'ST-001') { ?>
                                                        <input type="text" id="time_overtime_start" placeholder="Jam Mulai Lembur" name="time_overtime_start" value="<?php echo $time_overtime_start; ?>" class="form-control datetimepicker-input" data-target="#datetime3" />
                                                    <?php } else { ?>
                                                        <input disabled type="text" id="time_overtime_start" placeholder="Jam Mulai Lembur" name="time_overtime_start" value="<?php echo $time_overtime_start; ?>" class="form-control datetimepicker-input" data-target="#datetime3" />
                                                    <?php } ?>
                                                    <div class="input-group-append" data-target="#datetime3" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Keterangan</label>
                                                <?php if ($overtime_status_id == 'ST-001') { ?>
                                                    <textarea type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } else { ?>
                                                    <textarea readonly type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"><label for="timeovertimefinish">Jam Selesai Lembur</label>
                                                <div class="input-group date" id="datetime4" data-target-input="nearest">
                                                    <?php if ($overtime_status_id == 'ST-001') { ?>
                                                        <input type="text" id="time_overtime_finish" placeholder="Jam Selesai Lembur" name="time_overtime_finish" value="<?php echo $time_overtime_finish; ?>" class="form-control datetimepicker-input" data-target="#datetime4" />
                                                    <?php } else { ?>
                                                        <input disabled type="text" id="time_overtime_finish" placeholder="Jam Selesai Lembur" name="time_overtime_finish" value="<?php echo $time_overtime_finish; ?>" class="form-control datetimepicker-input" data-target="#datetime4" />
                                                    <?php } ?>
                                                    <div class="input-group-append" data-target="#datetime4" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amounttimeovertime">Jumlah Jam Lembur</label>
                                                <input class="form-control" id="amount_timeover_time" placeholder="Jumlah Jam Lembur" name="amount_timeover_time" value="<?php echo $amount_time_overtime; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($overtime_status_id == 'ST-005') { ?>
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Realisasi Lembur</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($attendance_id != null) { ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label for="actualtimeovertimestart">Realisasi Jam Mulai Lembur</label>
                                                        <!-- <div class="input-group date" id="datetime9" data-target-input="nearest"> -->
                                                        <div class="input-group date" data-target-input="nearest">
                                                            <input disabled type="text" id="actual_time_overtime_start" placeholder="Realisasi Jam Mulai Lembur" name="actual_time_overtime_start" value="<?php echo $actualtimeovertimestart; ?>" class="form-control datetimepicker-input" data-target="#datetime9" />
                                                            <div class="input-group-append" data-target="#datetime9" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label for="actualtimeovertimesfinish">Realisasi Jam Selesai Lembur</label>
                                                        <div class="input-group date" id="datetime10" data-target-input="nearest">
                                                            <input disabled type="text" id="actual_time_overtime_finish" placeholder="Realisasi Jam Selesai Lembur" name="actual_time_overtime_finish" value="<?php echo $actualtimeovertimefinish; ?>" class="form-control datetimepicker-input" data-target="#datetime10" />
                                                            <div class="input-group-append" data-target="#datetime10" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="actualamounttimeovertime">Jumlah Jam Lembur</label>
                                                        <input class="form-control" id="actual_amount_timeover_time" placeholder="Jumlah Jam Lembur" name="actual_amount_timeover_time" value="<?php echo $overtime; ?>" maxlength="50" readonly="true" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="changeuserid">Dikonfirmasi Oleh</label>
                                                        <input class="form-control" id="change_user_id" placeholder="Dikonfirmasi Oleh" name="change_user_id" value="<?php echo $change_user_name; ?>" maxlength="50" readonly="true" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label for="actualtimeovertimestart">Realisasi Jam Mulai Lembur</label>
                                                        <div class="input-group date" id="datetime9" data-target-input="nearest">
                                                            <input disabled type="text" id="actual_time_overtime_start" placeholder="Realisasi Jam Mulai Lembur" name="actual_time_overtime_start" value="<?php echo $actual_time_overtime_start; ?>" class="form-control datetimepicker-input" data-target="#datetime9" />
                                                            <div class="input-group-append" data-target="#datetime9" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label for="actualtimeovertimesfinish">Realisasi Jam Selesai Lembur</label>
                                                        <div class="input-group date" id="datetime10" data-target-input="nearest">
                                                            <input disabled type="text" id="actual_time_overtime_finish" placeholder="Realisasi Jam Selesai Lembur" name="actual_time_overtime_finish" value="<?php echo $actual_time_overtime_finish; ?>" class="form-control datetimepicker-input" data-target="#datetime10" />
                                                            <div class="input-group-append" data-target="#datetime10" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="actualamounttimeovertime">Jumlah Jam Lembur</label>
                                                        <input class="form-control" id="actual_amount_timeover_time" placeholder="Jumlah Jam Lembur" name="actual_amount_timeover_time" value="<?php echo $actual_amount_time_overtime; ?>" maxlength="50" readonly="true" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="changeuserid">Dikonfirmasi Oleh</label>
                                                        <input class="form-control" id="change_user_id" placeholder="Dikonfirmasi Oleh" name="change_user_id" value="<?php echo $change_user_name; ?>" maxlength="50" readonly="true" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Surat Perintah Lembur</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($overtime_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-attachmentovertime">
                                                <i class="fa fa-plus"></i> Add Attachment
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="approval1_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Attachment Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($OvertimeAttachmentRecords)) {
                                                foreach ($OvertimeAttachmentRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->attachment_name; ?></td>
                                                        <td> <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadOvertimeAttachment/' . $record->attachment_url . '/' . $record->overtime_id; ?>"><i class="fa fa-download"></i></a>
                                                            <a href="<?= base_url('upload/' . $record->attachment_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                            <?php
                                                            if ($overtime_status_id == 'ST-001') { ?>
                                                                <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteOvertimeAttachment/' . $record->overtime_attachment_id . '/' . $record->overtime_id . '/' . $record->attachment_url . '/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
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
                                            if (!empty($OvertimeApprovalRecords)) {
                                                foreach ($OvertimeApprovalRecords as $record) {
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
                        </div>
                        <!-- /.card -->
    </section>

    <!-- /.content -->
    <div class="modal fade" id="modal-approval">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateOvertimeApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <label for="overtimeid">Document No</label>
                                <input class="form-control" id="overtime_id" value="<?php echo $overtime_id; ?>" name="overtime_id" readonly>
                                <br>
                                <label for="overtimestatusid">Status</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($OvertimeApprovalStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="comment">Comment</label>
                                <!-- <input type="hidden" id="overtime_id_approval" name="overtime_id" value="<?php echo $overtime_id; ?>"> -->
                                <input type="hidden" id="status_id_approval" name="overtime_status_id" value="<?php echo $overtime_status_id; ?>">
                                <textarea class="form-control" id="comment" placeholder="Comment" name="comment" maxlength="50" required></textarea>
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

    <div class="modal fade" id="modal-confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Lembur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateOvertimeConfirmation" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <label for="overtimeid">Document No</label>
                                <input class="form-control" id="overtime_id" value="<?php echo $overtime_id; ?>" name="overtime_id" readonly>
                                <br>
                                <label>Category</label>
                                <select class="form-control select2bs4" name="cara" id="cara" required>
                                    <option disabled selected>--Select--</option>
                                    <option value="XX-01">Manual</option>
                                    <option value="XX-02">From Import Attendance</option>
                                </select>
                                <br>
                                <div class="form-group" id="From_Import_class">
                                    <label for="attendanceid">Actual Overtime</label>
                                    <select class="form-control select2bs4" name="attendance_id" id="attendance_id">
                                        <option disabled selected value="">--Select--</option>
                                        <?php foreach ($AttendanceRecords as $row) : ?>
                                            <option value="<?php echo $row->attendance_id; ?>"><?php echo $row->employee_id; ?> - <?php echo $row->attendance_id; ?> - <?php echo date('Y-m-d', strtotime($row->date_time_attendance_start)); ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group" id="Manual_class">
                                    <div class="form-group"><label for="actualtimeovertimestart">Actual Date Time Overtime Start</label>
                                        <div class="input-group date" id="datetime9" data-target-input="nearest">
                                            <input type="text" id="actual_time_overtime_start" placeholder="Actual Date Time Overtime Start" name="actual_time_overtime_start" class="form-control datetimepicker-input" data-target="#datetime9" />
                                            <div class="input-group-append" data-target="#datetime9" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="timeovertimefinish">Actual Date Time Overtime Finish</label>
                                        <div class="input-group date" id="datetime10" data-target-input="nearest">
                                            <input type="text" id="actual_time_overtime_finish" placeholder="Actual Date Time Overtime Finish" name="actual_time_overtime_finish" class="form-control datetimepicker-input" data-target="#datetime10" />
                                            <div class="input-group-append" data-target="#datetime10" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- modal attachemnt overtime-->
    <div class="modal fade" id="modal-attachmentovertime">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Attachment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertOvertimeAttachment" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label for="overtimeid">Document No</label>
                                <input class="form-control" id="overtime_id" value="<?php echo $overtime_id; ?>" name="overtime_id" readonly>
                                <br>
                                <label for="attachmentname">Attachment Name</label>
                                <input class="form-control" id="attachment_name" name="attachment_name" required>
                                <br>
                                <label for="attachmenturl">Attachment</label>
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
</div>

<script>
    $(document).on("click", "#btnAdd", function() {

    });
</script>

<script>
    // Update Overtime
    $(document).ready(function() {
        $("#btnUpdateOvertime").click(function() {

            var overtimeid = $("#overtime_id").val();
            var description = $("#description").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var overtimecategoryid = $("#overtime_category_id").val();
            var overtimestatusid = 'ST-001';
            var dateovertime = $("#date_overtime").val();
            var timeovertimestart = $("#time_overtime_start").val();
            var timeovertimefinish = $("#time_overtime_finish").val();
            // var amounttimeovertime = $("#amount_time_overtime").val();

            $.ajax({
                url: '<?php echo base_url() ?>UpdateOvertime',
                data: {
                    overtime_id: overtimeid,
                    description: description,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    overtime_category_id: overtimecategoryid,
                    overtime_status_id: overtimestatusid,
                    date_overtime: dateovertime,
                    time_overtime_start: timeovertimestart,
                    time_overtime_finish: timeovertimefinish,
                    // amount_time_overtime: amounttimeovertime
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>OvertimeDetail/" +
                            overtimeid + "/" + employeeid;
                    } else {}
                }
            })

        });
    })

    // Submit Overtime
    $(document).ready(function() {
        $("#btnSubmitOvertime").click(function() {
            var overtimeid = $("#overtime_id").val();
            var description = $("#description").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var overtimecategoryid = $("#overtime_category_id").val();
            var overtimestatusid = 'ST-003';
            var dateovertime = $("#date_overtime").val();
            var timeovertimestart = $("#time_overtime_start").val();
            var timeovertimefinish = $("#time_overtime_finish").val();

            $.ajax({
                url: '<?php echo base_url() ?>SubmitOvertime',
                data: {
                    overtime_id: overtimeid,
                    description: description,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    overtime_category_id: overtimecategoryid,
                    overtime_status_id: overtimestatusid,
                    date_overtime: dateovertime,
                    time_overtime_start: timeovertimestart,
                    time_overtime_finish: timeovertimefinish,
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>OvertimeDetail/" +
                            overtimeid + "/" + employeeid;
                    } else {}
                }
            })
        });
    })
</script>

<script>
    $(document).change(function() {
        var cara = $("#cara").val();
        if (cara == "XX-01") {
            $('#Manual_class').show();
            $('#From_Import_class').hide()
        } else {
            $('#From_Import_class').show();
            $('#Manual_class').hide();
        }
    });
</script>

<script>
    $(document).ready(function(e) {
        var cara = $("#cara").val();
        if (cara == "XX-01") {
            $('#Manual_class').show();
            $('#From_Import_class').hide()
        } else if (cara == "XX-02") {
            $('#From_Import_class').show();
            $('#Manual_class').hide();
        } else {
            $('#From_Import_class').hide();
            $('#Manual_class').hide();
        }
    });
</script>