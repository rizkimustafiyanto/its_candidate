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
                                    <h4>Regional</h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-regional">
                                                <i class="fa fa-plus"></i> Add Regional
                                            </button>
                                        </div>
                                    <?php } ?>
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

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Regional ID</th>
                                        <th>Regional Name</th>
                                        <th>Currency</th>
                                        <th>Creation</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($RegionalRecords)) {
                                        foreach ($RegionalRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->regional_id ?></td>
                                                <td><?php echo $record->regional_name ?></td>
                                                <td><?php echo $record->currency ?></td>
                                                <td><?php echo $record->creation_user_name ?></td>
                                                <td><?php echo $record->change_datetime ?></td>
                                                <td class="text-center">
                                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" data-regionalid="<?= $record->regional_id ?>" data-regionalname="<?= $record->regional_name ?>" data-currency="<?= $record->currency ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteRegional/' . $record->regional_id; ?>"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
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

    <div class="modal fade" id="modal-regional">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Regional</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertRegional" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="regionalname">Regional Name</label>
                                <input class="form-control" id="regional_name" placeholder="Regional Name" name="regional_name" required>
                                <br>
                                <label for="currency">Currency</label>
                                <input class="form-control" id="currency" placeholder="Currency" name="currency">
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


    <div class="modal fade" id="modal-regional-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Regional</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateRegional" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="regional_id_update" id="regional_id_update" />
                                <br>
                                <label for="regionalname">Regional Name</label>
                                <input class="form-control" id="regional_name_update" placeholder="Regional Name" name="regional_name_update" required>
                                <br>
                                <label for="currency">Currency</label>
                                <input class="form-control" id="currency_update" placeholder="Currency" name="currency_update" maxlength="50">
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
</div>

<script>
    $(document).on("click", "#btnSelect", function() {
        var regional_id = $(this).data("regionalid");
        var regional_name = $(this).data("regionalname");
        var currency = $(this).data("currency");

        $("#regional_id_update").val(regional_id);
        $("#regional_name_update").val(regional_name);
        $("#currency_update").val(currency);

        $('#modal-regional-update').modal('show');

    });
</script>


<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>