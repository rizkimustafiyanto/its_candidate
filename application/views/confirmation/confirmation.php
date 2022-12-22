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
                                    <h4>Confirmation</h4>
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
                    <!-- <?php print_r($ApprovalListRecords); ?> -->
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
                                        <th>Approval Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($ConfirmationListRecords)) {
                                        foreach ($ConfirmationListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->runningno ?></td>
                                                <td><?php echo $record->employeeid ?></td>
                                                <td><?php echo $record->employeename ?></td>
                                                <td><?php echo $record->start_date ?></td>
                                                <td><?php echo $record->finish_date ?></td>
                                                <td><?php echo $record->approvaltype ?></td>
                                                <?php if ($record->statusname == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else if ($record->statusname == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else if ($record->statusname == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->statusidname; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->statusidname; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'OvertimeDetail/' . $record->runningno . "/" . $record->employeeid; ?>"><i class="fa fa-pen"></i></a>
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