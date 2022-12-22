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
                                    <h4>Employee Warning Letter History</h4>
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
                            <table id="noticeletterhistorytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Company</th>
                                        <th>Warning Type</th>
                                        <th>Warning Letter No</th>
                                        <th>Warning Reason</th>
                                        <th>Active Date</th>
                                        <th>Valid Until</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($NoticeLetterHistoryListRecords)) {
                                        foreach ($NoticeLetterHistoryListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?php echo $record->employee_name; ?></td>
                                                <td><?php echo $record->company_name; ?></td>
                                                <td><?php echo $record->notice_letter_type_name; ?></td>
                                                <td><?php echo $record->notice_letter_no; ?></td>
                                                <td><?php echo $record->notice_reason; ?></td>
                                                <td><?php echo $record->notice_letter_date; ?></td>
                                                <?php $validnotice = date('Y-m-d', strtotime("+6 months", strtotime($record->notice_letter_date))) ?>
                                                <td><?php echo $validnotice; ?></td>
                                                <?php if (strtotime(date('Y-m-d', time())) <= strtotime($validnotice) && ($record->employee_notice_letter_id == $record->lastsp)) { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                <?php } ?>
                                                <td>
                                                    <!-- <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadNoticeLetter/' . $record->notice_letter_url . '/' . $record->employee_notice_letter_id; ?>"><i class="fa fa-download"></i></a> -->
                                                    <a href="<?= base_url('upload/' . $record->notice_letter_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
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