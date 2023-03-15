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
                                    <h4>Company Branch</h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-company_branch">
                                                <i class="fa fa-plus"></i> Add Company Branch
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
                                        <th>Company Branch ID</th>
                                        <th>Company Name</th>
                                        <th>Company Branch Name</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($CompanyBranchRecords)) {
                                        foreach ($CompanyBranchRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->company_branch_id ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->company_branch_name ?></td>
                                                <td><?php echo $record->longitude ?></td>
                                                <td><?php echo $record->latitude ?></td>
                                                <td class="text-center">
                                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" data-companybranchname="<?= $record->company_branch_name ?>" data-companyid="<?= $record->company_id ?>" data-companybranchid="<?= $record->company_branch_id ?>" data-longitude="<?= $record->longitude ?>" data-latitude="<?= $record->latitude ?>" data-toggle="modal" data-target="#modal-company_branch-update"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCompanyBranch/' . $record->company_branch_id; ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-company_branch">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Company Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertCompanyBranch" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Company Name</label>
                                <select class="form-control select2bs4" name="company_id">
                                    <?php foreach ($CompanyRecords as $row) : ?>
                                        <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="companybranchname">Company Branch Name</label>
                                <input class="form-control" id="company_branch_name" placeholder="Company Branch Name" name="company_branch_name" maxlength="50" required>
                                <br>
                                <label for="longitude">Longitude</label>
                                <input class="form-control" id="longitude" placeholder="Longitude" name="longitude" required>
                                <br>
                                <label for="latitude">Latitude</label>
                                <input class="form-control" id="latitude" placeholder="Latitude" name="latitude" required>
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


    <div class="modal fade" id="modal-company_branch-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateCompanyBranch" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="company_branch_id_update" id="company_branch_id_update" />
                                <label for="companybranchname">Company Branch Name</label>
                                <input class="form-control" id="company_branch_name_update" placeholder="Division Name" name="company_branch_name_update" maxlength="50" required>
                                <br>
                                <label>Company Name</label>
                                <select id="company_id_update" class="form-control select2bs4" name="company_id_update">
                                    <?php foreach ($CompanyRecords as $row) : ?>
                                        <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="longitude">Longitude</label>
                                <input class="form-control" id="longitude_update" placeholder="Longitude" name="longitude_update">
                                <br>
                                <label for="latitude">Latitude</label>
                                <input class="form-control" id="latitude_update" placeholder="Latitude" name="latitude_update">
                                <br>
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
        //Counter
        var company_branch_name = $(this).data("companybranchname");
        var company_branch_id = $(this).data("companybranchid");
        var company_id = $(this).data("companyid");
        var longitude = $(this).data("longitude");
        var latitude = $(this).data("latitude");


        $("#company_branch_name_update").val(company_branch_name);
        $("#company_branch_id_update").val(company_branch_id);
        $("#company_id_update").val(company_id).trigger("change");
        $("#longitude_update").val(longitude);
        $("#latitude_update").val(latitude);

    });

    $(document).on("click", "#btnAdd", function() {
        // Counter
        $("#company_branch_name").val("");

    });
</script>