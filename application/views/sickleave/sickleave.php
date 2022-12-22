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
                                        <h4>Izin Sakit</h4>
                                        <a data-toggle="popover" title="Sick Leave" data-content="Sick Leave merupakan menu untuk pengajuan izin sakit karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-sick-leave">
                                            <i class="fa fa-plus"></i> Tambah Izin Sakit
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

                    <!-- <?php print_r($LeaveRecords); ?> -->
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($SickLeaveRecords)) {
                                        foreach ($SickLeaveRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->sick_leave_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->start_date ?></td>
                                                <td><?php echo $record->finish_date ?></td>
                                                <?php if ($record->sick_leave_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->sick_leave_status_name; ?></a></td>
                                                <?php } else if ($record->sick_leave_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->sick_leave_status_name; ?></a></td>
                                                <?php } else if ($record->sick_leave_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->sick_leave_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->sick_leave_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <?php if ($record->sick_leave_status_id == 'ST-001') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SickLeaveDetail/' . $record->sick_leave_id; ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSickLeave/' . $record->sick_leave_id; ?>"><i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SickLeaveDetail/' . $record->sick_leave_id; ?>"><i class="fa fa-eye"></i></a>
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
    <div class="modal fade" id="modal-sick-leave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Sick Leave Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSickLeave" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label for="description">Keterangan</label>
                                <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50" required></textarea>
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

        // // Variable
        // $("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });
</script>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>