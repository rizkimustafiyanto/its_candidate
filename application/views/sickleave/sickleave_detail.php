<?php
$sick_leave_id = '';
$description = '';
$employee_id = '';
$employee_name = '';
$company_brand_id = '';
$company_brand_name = '';
$sick_leave_status_id = '';
$sick_leave_status_name = '';
$amount_sick_leave = '';


if (!empty($SickLeaveRecords)) {
    foreach ($SickLeaveRecords as $row) {
        $sick_leave_id = $row->sick_leave_id;
        $description = $row->description;
        $employee_id = $row->employee_id;
        $employee_name = $row->employee_name;
        $company_brand_id = $row->company_brand_id;
        $company_brand_name = $row->company_brand_name;
        $sick_leave_status_id = $row->sick_leave_status_id;
        $sick_leave_status_name = $row->sick_leave_status_name;
        $amount_sick_leave = $row->amount_sick_leave;
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
                                <h3>Detail Pengajuan Izin Sakit</h3>
                            </strong>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Pengajuan Izin Sakit</li>
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
                                <?php if ($sick_leave_status_id == 'ST-001') { ?>
                                    <button type="button" class="btn btn-md btn-primary" id="btnUpdateSickLeave">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <?php if ((!empty($SickLeaveDateTimeRecords)) && (!empty($SickLeaveAttachmentRecords))) { ?>
                                        <button type="button" class="btn btn-md btn-success show-loading" id="btnSubmitSickLeave">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-md btn-success" id="btnSubmitSickLeaveError">
                                            <i class="fa fa-paper-plane"></i> Submit
                                        </button>
                                    <?php } ?>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if ((str_replace('.', '', $this->session->userdata('employee_id')) == (str_replace('.', '', $SickLeaveApproval1Records)) && ($sick_leave_status_id == 'ST-003'))) { ?>
                                    <button type="button" class="btn btn-md btn-success" id="btnAdd" data-toggle="modal" data-target="#modal-approval">
                                        <i class="fa fa-check-circle"></i> Approval
                                    </button>
                                <?php } else { ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- <?php print_r($SickLeaveRequesterEmailRecords); ?> -->

                    <!-- /.card-header -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Edit Pengajuan Izin Sakit</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
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
                                            <label for="sickleaveid">Document No</label>
                                            <input class="form-control" id="sick_leave_id" placeholder="Sick Leave Id" name="sick_leave_id" value="<?php echo $sick_leave_id; ?>" readonly="true" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Keterangan</label>
                                                <?php if ($sick_leave_status_id == 'ST-001') { ?>
                                                    <textarea type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } else { ?>
                                                    <textarea readonly type="text" class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sickleavestatusid">Status</label>
                                                <input class="form-control" id="sick_leave_status_id" placeholder="Status" name="sick_leave_status_id" value="<?php echo $sick_leave_status_name; ?>" maxlength="50" readonly="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amountsickleave">Jumlah Izin Sakit</label>
                                                <input type="text" class="form-control" id="amount_sick_leave" name="amount_sick_leave" value="<?php echo $amount_sick_leave; ?>" readonly>
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
                                        <h4 class="card-title"><b>Tanggal Izin Sakit</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($sick_leave_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-datesickleave">
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-datesickleave" hidden>
                                                <i class="fa fa-plus"></i> Add Date
                                            </button>
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
                                                <th>Tanggal Izin Sakit</th>
                                                <?php
                                                if ($sick_leave_status_id == 'ST-001') {
                                                ?>
                                                    <th>Action</th>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($SickLeaveDateTimeRecords)) {
                                                foreach ($SickLeaveDateTimeRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($record->sick_leave_date)); ?></td>
                                                        <?php if ($sick_leave_status_id == 'ST-001') { ?>
                                                            <td class="text-center">
                                                                <a id="btnDelete" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'DeleteSickLeaveDateTime/' . $record->sick_leave_datetime_id . '/' . $record->sick_leave_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <strong>
                                        <h4 class="card-title"><b>Surat Izin Sakit</b></h4>
                                    </strong>
                                    <div class="card-tools">
                                        <?php if ($sick_leave_status_id == 'ST-001') { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-attachmentsickleave">
                                                <i class="fa fa-plus"></i> Add Attachment
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-datesickleave" hidden>
                                                <i class="fa fa-plus"></i> Add Attachment
                                            </button>
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
                                            if (!empty($SickLeaveAttachmentRecords)) {
                                                foreach ($SickLeaveAttachmentRecords as $record) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?php echo $record->attachment_name; ?></td>
                                                        <td> <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadSickLeaveAttachment/' . $record->attachment_url . '/' . $record->sick_leave_id; ?>"><i class="fa fa-download"></i></a>
                                                            <a href="<?= base_url('upload/' . $record->attachment_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                            <?php
                                                            if ($sick_leave_status_id == 'ST-001') { ?>
                                                                <a id="btnDelete" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'DeleteSickLeaveAttachment/' . $record->sick_leave_attachment_id . '/' . $record->sick_leave_id . '/' . $record->attachment_url; ?>"><i class="fa fa-trash"></i></a>
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
                                            if (!empty($SickLeaveApprovalRecords)) {
                                                foreach ($SickLeaveApprovalRecords as $record) {
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
                    </div>
                    <!-- /.card -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-datesickleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Tanggal Izin Sakit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSickLeaveDateTime" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label for="sickleaveid">Document No</label>
                                <input class="form-control" id="sick_leave_id" value="<?php echo $sick_leave_id; ?>" name="sick_leave_id" readonly>
                                <br>
                                <div class="form-group">
                                    <label for="sickleavedate">Tanggal Izin Sakit</label>
                                    <div class="input-group date" id="datetime2" data-target-input="nearest">
                                        <input type="text" id="sick_leave_date" placeholder="Tanggal Izin Sakit" name="sick_leave_date" class="form-control datetimepicker-input" data-target="#datetime2" required />
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

    <!-- modal attachemnt sick leave -->
    <div class="modal fade" id="modal-attachmentsickleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Attachment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSickLeaveAttachment" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label for="sickleaveid">Document No</label>
                                <input class="form-control" id="sick_leave_id" value="<?php echo $sick_leave_id; ?>" name="sick_leave_id" readonly>
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

    <div class="modal fade" id="modal-approval">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateSickLeaveApproval" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="employee_id" name="employee_id" value="<?php echo $employee_id; ?>" maxlength="50" hidden>
                                <label for="leaveid">Document No</label>
                                <input class="form-control" id="sick_leave_id" value="<?php echo $sick_leave_id; ?>" name="sick_leave_id" readonly>
                                <br>
                                <label for="leavestatusid">Status</label>
                                <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($SickLeaveApprovalStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="comment">Comment</label>
                                <!-- <input type="hidden" id="sick_leave_id_approval" name="sick_leave_id" value="<?php echo $sick_leave_id; ?>"> -->
                                <input type="hidden" id="status_id_approval" name="sick_leave_status_id" value="<?php echo $sick_leave_status_id; ?>">
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
</div>

<script>
    $(document).on("click", "#btnAdd", function() {

    });
</script>

<script>
    // Submit Leave
    $(document).ready(function() {
        $("#btnSubmitSickLeave").click(function() {

            var sickleaveid = $("#sick_leave_id").val();
            var description = $("#description").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var sickleavestatusid = 'ST-003';
            var amountsickleave = $("#amount_sick_leave").val();

            $.ajax({
                url: '<?php echo base_url() ?>SubmitSickLeave',
                data: {
                    sick_leave_id: sickleaveid,
                    description: description,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    sick_leave_status_id: sickleavestatusid,
                    amount_sick_leave: amountsickleave,
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>SickLeaveDetail/" +
                            sickleaveid;
                    } else {

                    }
                }
            })
        });
    })

    $(document).ready(function() {
        $("#btnUpdateSickLeave").click(function() {

            var sickleaveid = $("#sick_leave_id").val();
            var description = $("#description").val();
            var employeeid = $("#employee_id").val();
            var companybrandid = $("#company_brand_id").val();
            var sickleavestatusid = 'ST-001';
            var amountsickleave = $("#amount_sick_leave").val();


            $.ajax({
                url: '<?php echo base_url() ?>UpdateSickLeave',
                data: {
                    sick_leave_id: sickleaveid,
                    description: description,
                    employee_id: employeeid,
                    company_brand_id: companybrandid,
                    sick_leave_status_id: sickleavestatusid,
                    amount_sick_leave: amountsickleave,
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>SickLeaveDetail/" +
                            sickleaveid;
                    } else {}
                }
            })
        });
    })
</script>