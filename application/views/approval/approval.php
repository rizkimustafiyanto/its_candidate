<?php
$runningno = '';
$employeeid = '';
$employeename = '';
$approvaltype = '';


if (!empty($ApprovalListRecords)) {
    foreach ($ApprovalListRecords as $row) {
        $runningno = $row->runningno;
        $employeeid = $row->employeeid;
        $employeename = $row->employeename;
        $approvaltype = $row->approvaltype;
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
                    <div class="card card-sm card-default">
                        <div class="card-header">
                            <form role="form" action="<?php echo base_url() ?>MultipleApproval" method="post">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <h4>Approval</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-md btn-success" id="btnAdd">
                                                <i class="fa fa-check-circle"></i> Approval
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

                    <!-- <?php print_r($OvertimeDetails) ?> -->
                    <!-- <?php print_r($this->session->userdata('employee_id')) ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th><INPUT type="checkbox" onchange="checkAll(this)" name="checkbox_value2" id="ab" /> </th> -->
                                        <th>#</th>
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
                                <tbody id="details">
                                    <?php
                                    if (!empty($ApprovalListRecords)) {
                                        foreach ($ApprovalListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkbox_value" id="cb" value="<?php echo $record->runningno ?>">
                                                </td>
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
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'OvertimeDetail/' . $record->runningno . "/" . $record->employeeid; ?>"><i class="fa fa-pen"></i></a>
                                                    <?php } else if ($record->approvaltype == 'Paid Leave') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'PaidLeaveDetail/' . $record->runningno . "/" . $record->paidleaveid . "/" . $record->employeeid; ?>"><i class="fa fa-pen"></i></a>
                                                    <?php } else if ($record->approvaltype == 'Sick Leave') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SickLeaveDetail/' . $record->runningno; ?>"><i class="fa fa-pen"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->runningno; ?>"><i class="fa fa-pen"></i></a>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </form>
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

<div class="modal fade" id="modal-approval">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approval</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="<?php echo base_url() ?>MultipleApproval" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <input class="form-control" id="now_approver" name="now_approver" value="<?= $this->session->userdata('employee_id'); ?>"> -->
                            <label>Document No</label>
                            <input class="form-control" id="runningno" name="runningno" multiple="multiple" readonly>
                            <br>
                            <label>Status</label>
                            <select class="form-control select2bs4" name="status_id" id="status_id" required>
                                <option disabled selected value="">--Select--</option>
                                <?php foreach ($ApprovalStatusRecords as $row) : ?>
                                    <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <label>Comment</label>
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

<script>
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    $("#btnAdd").click(function() {
        var runningno = $('input[name="checkbox_value"]:checked').map(function() {
            return $(this).val();
        }).get().join(',')

        var boxes = $('input[name="checkbox_value"]:checked')

        if ($('input[name="checkbox_value"]').is(':checked')) {
            $("#runningno").val(runningno);

            $('#modal-approval').modal('show');
        } else {
            Swal.fire({
                title: 'Please select at least 1 data !',
                text: flashData,
                icon: 'error'
            });

        }
    });
    // });
</script>