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
                                        <h4>Attendance List</h4>
                                        <a data-toggle="popover" title="Attendance" data-content="Attendance merupakan menu untuk memantau serta menarik report kehadiran karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-attendance">
                                            <i class="fa fa-plus"></i> Add Attendance
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ((date('Y-m-d', strtotime($this->input->post('date_1'))) != "1970-01-01")
                        && (date('Y-m-d', strtotime($this->input->post('date_2'))) != "1970-01-01")
                    ) { ?>
                        <?= "Filter Date from : "  . "<b>" . date('Y-m-d', strtotime($this->input->post('date_1'))) . "</b>" . " to " . "<b>" . date('Y-m-d', strtotime($this->input->post('date_2'))) . "</b>" ?>
                    <?php } else { ?>
                    <?php } ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                        <?= $this->session->unset_userdata('success'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>

                    <!-- import excel -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- <div class="col-md-4 col-md-offset-3"> -->
                                    <!-- <h3>Import Data</h3> -->
                                    <?php if (!empty($this->session->flashdata('status'))) { ?>
                                        <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                    <?php } ?>
                                    <form action="<?= base_url('ImportTempAttendanceInsert'); ?>" method="post" enctype="multipart/form-data">
                                        <!-- <div class="row"> -->
                                        <label>Select Excel File</label>
                                        <div class="form-group">
                                            <input type="file" name="data" required accept=".xls,.xlsx,.csv">
                                        </div>
                                        <div>
                                            <button class='btn btn-success' type="submit">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                Import
                                            </button>
                                            <a id="btnDownload" class="btn btn-warning" href="<?php echo base_url() . 'DownloadTemplate' ?>"><i class="fa fa-download"></i> Download Template</a>
                                        </div>
                                        <!-- </div> -->
                                    </form>
                                    <!-- </div> -->
                                </div>
                                <div class="col-md-4">
                                    <form role="form" action="<?php echo base_url() ?>Attendance" method="post">
                                        <label>Filter</label>
                                        <div class="row">
                                            <div class="form-group" style="width:11vw;">
                                                <div class="input-group date" id="datetime11" data-target-input="nearest">
                                                    <input type="text" id="date_1" placeholder="Start Date" name="date_1" class="form-control datetimepicker-input" data-target="#datetime11" data-width="10%" />
                                                    <div class="input-group-append" data-target="#datetime11" data-toggle="datetimepicker">
                                                        <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="form-group" style="width:11vw;">
                                                <div class="input-group date" id="datetime12" data-target-input="nearest">
                                                    <input type="text" id="date_2" placeholder="Finish Date" name="date_2" class="form-control datetimepicker-input" data-target="#datetime12" data-width="10%" />
                                                    <div class="input-group-append" data-target="#datetime12" data-toggle="datetimepicker">
                                                        <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div style="width:11vw;">
                                                <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                                                <input type="submit" id="btnSubmit" class="btn btn-secondary" value="Reset" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <?php print_r($AttendanceTempRecords['employee_id']); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="attendance_table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Attendance ID</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Shift Name</th>
                                        <th>Shift Day</th>
                                        <th>Shift Start</th>
                                        <th>Shift Finish</th>
                                        <th>Date</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Late In</th>
                                        <th>Early In</th>
                                        <th>Early Out</th>
                                        <th>Overtime</th>
                                        <th>Amount Work</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($AttendanceRecords)) {
                                        foreach ($AttendanceRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->attendance_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->shift_name ?></td>
                                                <?php if ($record->shift_day == 'Monday') { ?>
                                                    <td><?php echo 'Senin'; ?></td>
                                                <?php } else if ($record->shift_day == 'Tuesday') { ?>
                                                    <td><?php echo 'Selasa'; ?></td>
                                                <?php } else if ($record->shift_day == 'Wednesday') { ?>
                                                    <td><?php echo 'Rabu'; ?></td>
                                                <?php } else if ($record->shift_day == 'Thursday') { ?>
                                                    <td><?php echo 'Kamis'; ?></td>
                                                <?php } else if ($record->shift_day == 'Friday') { ?>
                                                    <td><?php echo 'Jumat'; ?></td>
                                                <?php } else if ($record->shift_day == 'Saturday') { ?>
                                                    <td><?php echo 'Sabtu'; ?></td>
                                                <?php } ?>
                                                <td><?php echo $record->shift_start ?></td>
                                                <td><?php echo $record->shift_finish ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($record->date_time_attendance_start)); ?></td>
                                                <?php if ($record->date_time_attendance_start == date('Y-m-d', strtotime($record->date_time_attendance_start))) { ?>
                                                    <td><?php echo '-'; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->date_time_attendance_start ?></td>
                                                <?php } ?>

                                                <?php if ($record->date_time_attendance_finish == null) { ?>
                                                    <td><?php echo '-'; ?></td>
                                                <?php } else if ($record->date_time_attendance_finish == date('Y-m-d', strtotime($record->date_time_attendance_finish))) { ?>
                                                    <td><?php echo '-'; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->date_time_attendance_finish ?></td>
                                                <?php } ?>
                                                <?php if ($record->late_in == '-') { ?>
                                                    <td><?php echo $record->late_in ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->late_in ?> hours </td>
                                                <?php } ?>
                                                <?php if ($record->early_in == '-') { ?>
                                                    <td><?php echo $record->early_in ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->early_in ?> hours </td>
                                                <?php } ?>
                                                <?php if ($record->early_out == '-') { ?>
                                                    <td><?php echo $record->early_out ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->early_out ?> hours </td>
                                                <?php } ?>
                                                <?php if ($record->overtime == '-') { ?>
                                                    <td><?php echo $record->overtime ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $record->overtime ?> hours </td>
                                                <?php } ?>
                                                <?php if ($record->amount_work != null) { ?>
                                                    <td><?php echo $record->amount_work ?> hours </td>
                                                <?php } else { ?>
                                                    <td><?php echo '-'; ?></td>
                                                <?php } ?>
                                                <td>
                                                    <img src="<?php echo base_url(); ?>upload/<?php echo $record->photo_url ?>" class="img-thumbnail" />
                                                </td>
                                                <td><?php echo $record->attendance_status ?></td>
                                                <td><?php echo $record->description ?></td>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" data-attendanceid="<?= $record->attendance_id ?>" data-employeeid="<?= $record->employee_id ?>" data-datetimeattendancefinish="<?= $record->date_time_attendance_finish ?>"><i class="fa fa-pen"></i></a>
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
</div>
<div class="modal fade" id="modal-attendance">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Attendance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="<?php echo base_url() ?>InsertAttendance" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="employeeid">NIK</label>
                            <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                            <br>
                            <div class="form-group"><label for="datetimeattendancestart">In Time</label>
                                <div class="input-group date" id="datetime22" data-target-input="nearest">
                                    <input type="text" id="date_time_attendance_start" placeholder="In Time" name="date_time_attendance_start" class="form-control datetimepicker-input" data-target="#datetime22" required />
                                    <div class="input-group-append" data-target="#datetime22" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label for="datetimeattendancefinish">Out Time</label>
                                <div class="input-group date" id="datetime23" data-target-input="nearest">
                                    <input type="text" id="date_time_attendance_finish" placeholder="Out Time" name="date_time_attendance_finish" class="form-control datetimepicker-input" data-target="#datetime23" />
                                    <div class="input-group-append" data-target="#datetime23" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <label for="description">Keterangan</label>
                            <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50"></textarea>
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


<div class="modal fade" id="modal-attendance-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Attendance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="<?php echo base_url() ?>UpdateAttendance" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" value="" name="attendance_id_update" id="attendance_id_update" />
                            <label for="employeeid">NIK</label>
                            <input class="form-control" value="" name="employee_id_update" id="employee_id_update" />
                            <br>
                            <div class="form-group"><label for="datetimeattendancefinish">Date Time Attendance Finish</label>
                                <div class="input-group date" id="datetime24" data-target-input="nearest">
                                    <input type="text" id="date_time_attendance_finish_update" placeholder="Date Time Attendance Finish" name="date_time_attendance_finish_update" class="form-control datetimepicker-input" data-target="#datetime24" />
                                    <div class="input-group-append" data-target="#datetime24" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
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

<div class="modal fade bd-example-modal-xl" id="modal-preview" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Import Attendance</h4>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" id="btnInsertImport">Submit
                        <i class="fa fa-paper-plane"></i></button>
                    <button type="button" class="btn btn-danger" id="btnDeleteImport">Delete
                        <i class="fa fa-trash"></i></button>
                </div>
            </div>
            <div class="modal-body">
                <table id="attendance_2_table" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Attendance ID</th>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Shift Name</th>
                            <th>Shift Day</th>
                            <th>Shift Start</th>
                            <th>Shift Finish</th>
                            <th>Date</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Late In</th>
                            <th>Early In</th>
                            <th>Early Out</th>
                            <th>Overtime</th>
                            <th>Amount Work</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($AttendanceTempRecords)) {
                            foreach ($AttendanceTempRecords as $record) {
                        ?>
                                <tr>
                                    <td><?php echo $record->attendance_id ?></td>
                                    <td><?php echo $record->employee_id ?></td>
                                    <td><?php echo $record->employee_name ?></td>
                                    <td><?php echo $record->company_name ?></td>
                                    <td><?php echo $record->shift_name ?></td>
                                    <?php if ($record->shift_day == 'Monday') { ?>
                                        <td><?php echo 'Senin'; ?></td>
                                    <?php } else if ($record->shift_day == 'Tuesday') { ?>
                                        <td><?php echo 'Selasa'; ?></td>
                                    <?php } else if ($record->shift_day == 'Wednesday') { ?>
                                        <td><?php echo 'Rabu'; ?></td>
                                    <?php } else if ($record->shift_day == 'Thursday') { ?>
                                        <td><?php echo 'Kamis'; ?></td>
                                    <?php } else if ($record->shift_day == 'Friday') { ?>
                                        <td><?php echo 'Jumat'; ?></td>
                                    <?php } else if ($record->shift_day == 'Saturday') { ?>
                                        <td><?php echo 'Sabtu'; ?></td>
                                    <?php } ?>
                                    <td><?php echo $record->shift_start ?></td>
                                    <td><?php echo $record->shift_finish ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($record->date_time_attendance_start)); ?></td>
                                    <?php if ($record->date_time_attendance_start == date('Y-m-d', strtotime($record->date_time_attendance_start))) { ?>
                                        <td><?php echo '-'; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->date_time_attendance_start ?></td>
                                    <?php } ?>

                                    <?php if ($record->date_time_attendance_finish == null) { ?>
                                        <td><?php echo '-'; ?></td>
                                    <?php } else if ($record->date_time_attendance_finish == date('Y-m-d', strtotime($record->date_time_attendance_finish))) { ?>
                                        <td><?php echo '-'; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->date_time_attendance_finish ?></td>
                                    <?php } ?>
                                    <?php if ($record->late_in == '-') { ?>
                                        <td><?php echo $record->late_in ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->late_in ?> hours </td>
                                    <?php } ?>
                                    <?php if ($record->early_in == '-') { ?>
                                        <td><?php echo $record->early_in ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->early_in ?> hours </td>
                                    <?php } ?>
                                    <?php if ($record->early_out == '-') { ?>
                                        <td><?php echo $record->early_out ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->early_out ?> hours </td>
                                    <?php } ?>
                                    <?php if ($record->overtime == '-') { ?>
                                        <td><?php echo $record->overtime ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $record->overtime ?> hours </td>
                                    <?php } ?>
                                    <?php if ($record->amount_work != null) { ?>
                                        <td><?php echo $record->amount_work ?> hours </td>
                                    <?php } else { ?>
                                        <td><?php echo '-'; ?></td>
                                    <?php } ?>
                                    <td><?php echo $record->attendance_status_name ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).on("click", "#btnSelect", function() {
        var attendance_id = $(this).data("attendanceid");
        var employee_id = $(this).data("employeeid");
        var date_time_attendance_finish = $(this).data("datetimeattendancefinish");

        $("#attendance_id_update").val(attendance_id);
        $("#atttendace_id_update").val(attendance_id);
        $("#employee_id_update").val(employee_id);
        $("#date_time_attendance_finish_update").val(date_time_attendance_finish);

        $('#modal-attendance-update').modal('show');

    });
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>


<?php if ($this->session->flashdata('preview')) : ?>
    <script>
        // $('#modal-preview').modal('show');
        $('#modal-preview').modal({
            backdrop: 'static',
            keyboard: false
        });
        <?= $this->session->unset_userdata('preview'); ?>
    </script>
<?php endif; ?>


<script>
    // Update Overtime
    $(document).on("click", "#btnDeleteImport", function() {

        $.ajax({
            url: '<?php echo base_url() ?>DeleteAttendanceTemp',
            success: function(response) {
                if (response != null) {
                    Swal.fire({
                        title: 'Import Canceled !',
                        text: flashData,
                        icon: 'error'
                    });
                } else {}
            }
        })

        $('#modal-preview').modal('hide');

    });


    $(document).on("click", "#btnInsertImport", function() {

        $.ajax({
            url: '<?php echo base_url() ?>InsertAttendanceTemptoAttendance',
            success: function(response) {
                if (response != null) {
                    window.location.reload(true);
                    Swal.fire({
                        title: 'Import Succes !',
                        text: flashData,
                        icon: 'success'
                    });
                } else {}
            }
        })

        $('#modal-preview').modal('hide');

    });
</script>