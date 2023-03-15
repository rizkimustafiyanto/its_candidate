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
                                    <h4>Company</h4>
                                </div>
                                <div class="col-sm-6">
								<?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-company">
                                            <i class="fa fa-plus"></i> Add Company
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
                                        <th>Company ID</th>
                                        <th>Company Initial</th>
                                        <th>Company Name</th>
                                        <th>Creation</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($CompanyRecords)) {
                                        foreach ($CompanyRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->company_id ?></td>
                                                <td><?php echo $record->company_initial ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->creation_user_name ?></td>
                                                <td><?php echo $record->change_datetime ?></td>
                                                <td class="text-center">
												<?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" data-companyid="<?= $record->company_id ?>" data-companyinitial="<?= $record->company_initial ?>" data-companyname="<?= $record->company_name ?>" data-email="<?= $record->email ?>" data-address="<?= $record->address ?>" data-description="<?= $record->description ?>" data-phoneno="<?= $record->phone_no ?>"><i class="fa fa-pen"></i></a>
                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCompany/' . $record->company_id; ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-company">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertCompany" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="companyinitial">Company Initial</label>
                                <input class="form-control" id="company_initial" placeholder="Company Initial" name="company_initial" maxlength="50" required>
                                <br>
                                <label for="companyname">Company Name</label>
                                <input class="form-control" id="company_name" placeholder="Company Name" name="company_name" maxlength="50" required>
                                <br>
                                <label for="email">Email</label>
                                <input class="form-control" id="email" placeholder="Email" name="email" maxlength="50">
                                <br>
                                <label for="phoneno">Phone No</label>
                                <input class="form-control" id="phone_no" placeholder="Phone No" name="phone_no" maxlength="50">
                                <br>
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" placeholder="Address" name="address"></textarea>
                                <br>
                                <label for="description">Description</label>
                                <textarea class="form-control" id="address" placeholder="Description" name="description"></textarea>
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


    <div class="modal fade" id="modal-company-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateCompany" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="company_id_update" id="company_id_update" />
                                <br>
                                <label for="companyinitial">Company Initial</label>
                                <input class="form-control" id="company_initial_update" value="<?= $record->company_initial; ?>" name="company_initial_update" maxlength="50" required readonly>
                                <br>
                                <label for="companyname">Company Name</label>
                                <input class="form-control" id="company_name_update" placeholder="Company Name" name="company_name_update" maxlength="50" required>
                                <br>
                                <label for="email">Email</label>
                                <input class="form-control" id="email_update" placeholder="Email" name="email_update" maxlength="50">
                                <br>
                                <label for="phoneno">Phone No</label>
                                <input class="form-control" id="phone_no_update" placeholder="Phone No" name="phone_no_update" maxlength="50">
                                <br>
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address_update" placeholder="Address" name="address_update"></textarea>
                                <br>
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description_update" placeholder="Description" name="description_update"></textarea>
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
        var company_id = $(this).data("companyid");
        var company_initial = $(this).data("companyinitial");
        var company_name = $(this).data("companyname");
        var phone_no = $(this).data("phoneno");
        var address = $(this).data("address");
        var description = $(this).data("description");
        var email = $(this).data("email");

        $("#company_id_update").val(company_id);
        $("#company_initial_update").val(company_initial);
        $("#company_name_update").val(company_name);
        $("#phone_no_update").val(phone_no);
        $("#address_update").val(address);
        $("#description_update").val(description);
        $("#email_update").val(email);

        $('#modal-company-update').modal('show');

    });

    $(document).on("click", "#btnAdd", function() {
        // dealer
        $("#company_id").val("");
        $("#company_name").val("");
        $("#phone_no").val("");
        $("#address").val("");
        $("#description").val("");
        $("#email").val("");
    });
</script>


<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>