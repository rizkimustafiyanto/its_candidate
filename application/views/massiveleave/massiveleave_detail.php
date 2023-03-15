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
                                <h3>Cuti Bersama</h3>
                            </strong>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <ol class="breadcrumb float-sm-left" style="font-size: small; padding-top: 10px;">
                                <li class=" breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Cuti Bersama</li>
                                <li class="breadcrumb-item active">
                                    Input
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
                    <form role="form" action="<?php echo base_url() ?>InsertMassiveLeave" method="post">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="col-xs-12 text-left">
                                    <a href="javascript:window.history.go(-1);" class="btn btn-md btn-circle btn-primary">
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-md btn-success" id="btnSubmitMassiveLeave">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-header">
                                        <strong>
                                            <h4 class="card-title"><b>Input Cuti Bersama</b></h4>
                                        </strong>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="description">Keterangan</label>
                                                <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50" required></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Kategori Cuti</label>
                                                <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id">
                                                    <option value="PL-001">Tahunan</option>
                                                </select>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="col-md-12">
                        <!-- tambahan -->
                        <div class="card">
                            <!-- card-header -->
                            <div class="card-header">
                                <strong>
                                    <h4 class="card-title"><b>Tanggal Cuti</b></h4>
                                </strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-input-datetime-massiveleave">
                                        <i class="fa fa-plus"></i> Add Date
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- ganti -->
                                <table id="sickleave_datetime_table" class="table table-bordered  table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Cuti</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($MassiveLeaveDatetimeTempRecords)) {
                                            foreach ($MassiveLeaveDatetimeTempRecords as $record) {
                                        ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($record->massive_leave_date)); ?></td>
                                                    <td class="text-center">
                                                        <a id="btnDelete" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'DeleteMassiveLeaveDateTimeTemp/' . $record->massive_leave_date_temp_id; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
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
                                    <h4 class="card-title"><b>Employee</b></h4>
                                </strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="leave_datetime_table" class="table table-bordered  table-striped">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($EmployeeTempRecords)) {
                                            foreach ($EmployeeTempRecords as $record) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $record->employee_id ?></td>
                                                    <td><?php echo $record->employee_name ?></td>
                                                    <td><?php echo $record->company_name ?></td>
                                                    <td class="text-center"> <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeTemp/' . $record->employee_temp_id; ?>"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- /.card -->


    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-input-datetime-massiveleave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Tanggal Cuti</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertMassiveLeaveDateTimeTemp" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="employeepaidleavedate">Tanggal Cuti</label>
                                    <div class="input-group date" id="datetime27" data-target-input="nearest">
                                        <input type="text" id="massive_leave_date" placeholder="Tanggal Cuti" name="massive_leave_date" class="form-control datetimepicker-input" data-target="#datetime27" required />
                                        <div class="input-group-append" data-target="#datetime27" data-toggle="datetimepicker">
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


</div>

<!-- <script>
    $(document).ready(function() {
        $("#btnSubmitMassiveLeave").click(function() {

            var description = $("#description").val();
            var paidleaveid = $("#paid_leave_id").val();
            var paidleaveamount = $("#paid_leave_amount").val();

            $.ajax({
                url: '<?php echo base_url() ?>InsertMassiveLeave',
                data: {
                    description: description,
                    paid_leave_id: paidleaveid,
                    paid_leave_amount: paidleaveamount

                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response != null) {
                        window.location.href = "<?php echo base_url() ?>MassiveLeave"
                    } else {}
                }
            })
        });
    })
</script> -->