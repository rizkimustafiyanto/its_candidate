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
                                    <h4>Employee History</h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <!-- <?php print_r($EmployeeHistoryListRecords); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($EmployeeHistoryListRecords)) {
                                        foreach ($EmployeeHistoryListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->runningno ?></td>
                                                <td><?php echo $record->employeeid ?></td>
                                                <td><?php echo $record->employeename ?></td>
                                                <td><?php echo $record->start_date ?></td>
                                                <td><?php echo $record->finish_date ?></td>
                                                <?php if ($record->approvaltype == 'Overtime') { ?>
                                                    <td><a class="badge badge-dark"><?php echo $record->approvaltype ?></a></td>
                                                <?php } else if ($record->approvaltype == 'Paid Leave') { ?>
                                                    <td><a class="badge badge-light"><?php echo $record->approvaltype ?></a></td>
                                                <?php } else if ($record->approvaltype == 'Sick Leave') { ?>
                                                    <td><a class="badge badge-info"><?php echo $record->approvaltype ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-primary"><?php echo $record->approvaltype ?></a></td>
                                                <?php } ?>
                                                <?php if ($record->statusname == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else if ($record->statusname == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else if ($record->statusname == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else if ($record->statusname == 'ST-005') { ?>
                                                    <td><a class="badge badge-pill badge-primary float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->statusidname; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <?php if ($record->approvaltype == 'Overtime') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'OvertimeDetail/' . $record->runningno . "/" . $record->employeeid; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php } else if ($record->approvaltype == 'Paid Leave') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'PaidLeaveDetail/' . $record->runningno . "/" . $record->paidleaveid . "/" . $record->employeeid; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php } else if ($record->approvaltype == 'Sick Leave') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SickLeaveDetail/' . $record->runningno; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->runningno; ?>"><i class="fa fa-eye"></i></a>
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