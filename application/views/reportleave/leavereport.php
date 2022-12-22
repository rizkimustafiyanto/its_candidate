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
                                    <h4>Regular Leave Report</h4>
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
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= $this->session->unset_userdata('success'); ?>

                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>
                    <!-- <?php print_r($ApprovalListRecords); ?> -->
                    <form role="form" action="<?php echo base_url() ?>LeaveReport" method="post">
                        <div class="col-12">
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
                        </div>
                    </form>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="leave_report" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Company Branch</th>
                                        <th>Division</th>
                                        <th>Department</th>
                                        <th>Keperluan</th>
                                        <th>Izin Untuk</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Time Leave Start</th>
                                        <th>Time Leave Finish</th>
                                        <th>Description</th>
                                        <th>Creation Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($LeaveReportListRecords)) {
                                        foreach ($LeaveReportListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->leave_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->company_branch_name ?></td>
                                                <td><?php echo $record->division_name ?></td>
                                                <td><?php echo $record->department_name ?></td>
                                                <td><?php echo $record->leave_category_name ?></td>
                                                <td><?php echo $record->leave_sub_category_name ?></td>
                                                <td><?php echo $record->start_date ?></td>
                                                <td><?php echo $record->finish_date ?></td>
                                                <?php if ($record->time_leave_start != null) { ?>
                                                    <td><?php echo $record->time_leave_start ?></td>
                                                <?php } else { ?>
                                                    <td> -</td>
                                                <?php } ?>
                                                <?php if ($record->time_leave_finish != null) { ?>
                                                    <td><?php echo $record->time_leave_finish ?></td>
                                                <?php } else { ?>
                                                    <td> -</td>
                                                <?php } ?>
                                                <td><?php echo $record->leave_name ?></td>
                                                <td><?php echo $record->creation_datetime ?></td>
                                                <?php if ($record->leave_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else if ($record->leave_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else if ($record->leave_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else if ($record->leave_status_id == 'ST-005') { ?>
                                                    <td><a class="badge badge-pill badge-primary float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->leave_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->leave_id; ?>"><i class="fa fa-pen"></i></a>
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

</div>
<script>
    $(document).on("click", "#btnAdd", function() {

        // // Variable
        // $("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });
</script>

<script>
    $("#paid_leave_id").change(function() {
        var paidleaveid = $("#paid_leave_id").val();

        if (paidleaveid == 'PL-001') {
            $('#Divpaid_leave_khusus').hide();
        } else {
            $('#Divpaid_leave_khusus').show();
        }
    });
</script>


<script>
    $(document).ready(function(e) {
        var paidleaveid = $("#paid_leave_id").val();

        if (paidleaveid == 'PL-001') {
            $('#Divpaid_leave_khusus').hide();
        } else {
            $('#Divpaid_leave_khusus').show();
        }
    });
</script>