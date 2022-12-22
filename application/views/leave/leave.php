<div class="content-wrapper">
    <div style="height: 20px;"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-sm card-default">
                        <div class="card-header">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h4>Izin</h4>
                                        <a data-toggle="popover" title="Regular Leave" aria-label="Description" data-content="Regular Leave merupakan menu untuk pengajuan izin karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-leave">
                                            <i class="fa fa-plus"></i> Tambah Izin
                                        </button>
                                    </div>
                                </div>
                            </div>
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

                    <!-- <?php print_r($CountPaidLeave); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Keperluan</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($LeaveRecords)) {
                                        foreach ($LeaveRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->leave_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->leave_category_name ?></td>
                                                <td><?php echo $record->start_date ?></td>
                                                <td><?php echo $record->finish_date ?></td>
                                                <?php if ($record->leave_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else if ($record->leave_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else if ($record->leave_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <?php if ($record->leave_status_id == 'ST-001') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->leave_id; ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteLeave/' . $record->leave_id; ?>"><i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->leave_id; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modal-leave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Leave Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertLeave" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label>Keperluan</label>
                                <select class="form-control select2bs4" name="leave_category_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CategoryRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label>Izin untuk</label>
                                <select class="form-control select2bs4" name="leave_sub_category_id" id="leave_sub_category_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($SubCategoryRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group" id="Divtime_leave_start"><label for="timeleavestart">Jam Mulai</label>
                                    <div class="input-group date" id="datetime" data-target-input="nearest">
                                        <input type="text" id="time_leave_start" placeholder="Jam Mulai" name="time_leave_start" class="form-control datetimepicker-input" data-target="#datetime" />
                                        <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="Divtime_leave_finish"><label for="timeleavefinish">Jam Selesai</label>
                                    <div class="input-group date" id="datetime1" data-target-input="nearest">
                                        <input type="text" id="time_leave_finish" placeholder="Jam Selesai" name="time_leave_finish" class="form-control datetimepicker-input" data-target="#datetime1" />
                                        <div class="input-group-append" data-target="#datetime1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="leavename">Alasan</label>
                                <textarea class="form-control" id="leave_name" placeholder="Alasan" name="leave_name" maxlength="50" required></textarea>
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
    $(document).on("click", "#btnSelect", function() {

        var leave_id = $(this).data("leaveid");
        var leave_name = $(this).data("leavename");
        var employee_id = $(this).data("employeeid");
        var description = $(this).data("description");
        var leave_category_id = $(this).data("leavecategoryid");
        var leave_status_id = $(this).data("leavestatusid");
        var leave_sub_category_id = $(this).data("leavesubcategoryid");
        var time_leave_start = $(this).data("timeleavestart");
        var time_leave_finish = $(this).data("timeleavefinish");

        $("#leave_id_update").val(leave_id);
        $("#leave_name_update").val(leave_name);
        $("#employee_id_update").val(employee_id);
        $("#description_update").val(description);
        $("#leave_category_id_update").val(leave_category_id);
        $("#leave_status_id_update").val(leave_status_id);
        $("#leave_sub_category_id_update").val(leave_sub_category_id);
        $("#time_leave_start_update").val(time_leave_start);
        $("#time_leave_finish_update").val(time_leave_finish);

    });

    $(document).on("click", "#btnAdd", function() {

        // // Variable
        // $("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });
</script>

<script>
    $("#leave_sub_category_id").change(function() {
        var leavesubcategoryid = $("#leave_sub_category_id").val();

        if (leavesubcategoryid == 'SC-001') {
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
    $(document).ready(function(e) {
        var leavesubcategoryid = $("#leave_sub_category_id").val();
        if (leavesubcategoryid == "SC-001") {
            $('#Divtime_leave_start').hide();
            $('#Divtime_leave_finish').hide()
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
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>