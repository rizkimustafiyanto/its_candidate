<?php
$employee_id = '';
$overtime_flag = '';

if (!empty($EmployeeRecords)) {
    foreach ($EmployeeRecords as $row) {
        $employee_id = $row->employee_id;
        $overtime_flag = $row->overtime_flag;
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
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h4>Lembur</h4>
                                        <a data-toggle="popover" title="Overtime" data-content="Overtime merupakan menu untuk pengajuan lembur karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <?php if ($overtime_flag == 'OVT-001') { ?>
                                    <div class="col-sm-6">
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-overtime">
                                                <i class="fa fa-plus"></i> Tambah Lembur
                                            </button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-sm-6">
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAddOvertimeError">
                                                <i class="fa fa-plus"></i> Tambah Lembur
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
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

                    <!-- <?php print_r($overtime_flag); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Tanggal Mulai Lembur</th>
                                        <th>Tanggal Selesai Lembur</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($OvertimeRecords)) {
                                        foreach ($OvertimeRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->overtime_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($record->time_overtime_start)); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($record->time_overtime_finish)); ?></td>
                                                <?php if ($record->overtime_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->overtime_status_name; ?></a></td>
                                                <?php } else if ($record->overtime_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->overtime_status_name; ?></a></td>
                                                <?php } else if ($record->overtime_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->overtime_status_name; ?></a></td>
                                                <?php } else if ($record->overtime_status_id == 'ST-005') { ?>
                                                    <td><a class="badge badge-pill badge-primary float"> <?= $record->overtime_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->overtime_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <?php if ($record->overtime_status_id == 'ST-001') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'OvertimeDetail/' . $record->overtime_id . "/" . $record->employee_id; ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteOvertime/' . $record->overtime_id; ?>"><i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'OvertimeDetail/' . $record->overtime_id . "/" . $record->employee_id; ?>"><i class="fa fa-eye"></i></a>
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
    <div class="modal fade" id="modal-overtime">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Pengajuan Lembur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertOvertime" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label>Kategori</label>
                                <select class="form-control select2bs4" name="overtime_category_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CategoryRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group"><label for="timeovertimestart">Jam Mulai Lembur</label>
                                    <div class="input-group date" id="datetime3" data-target-input="nearest">
                                        <input type="text" id="time_overtime_start" placeholder="Jam Mulai Lembur" name="time_overtime_start" class="form-control datetimepicker-input" data-target="#datetime3" required />
                                        <div class="input-group-append" data-target="#datetime3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label for="timeovertimefinish">Jam Selesai Lembur</label>
                                    <div class="input-group date" id="datetime4" data-target-input="nearest">
                                        <input type="text" id="time_overtime_finish" placeholder="Jam Selesai Lembur" name="time_overtime_finish" class="form-control datetimepicker-input" data-target="#datetime4" required />
                                        <div class="input-group-append" data-target="#datetime4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
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


    });

    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>