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
                                    <h4>Company Brand</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-company_brand">
                                            <i class="fa fa-plus"></i> Add Company Brand
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

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Company Brand ID</th>
                                        <th>Company Name</th>
                                        <th>Company Brand Name</th>
                                        <th>Creation</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($CompanyBrandRecords)) {
                                        foreach ($CompanyBrandRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->company_brand_id ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->company_brand_name ?></td>
                                                <td><?php echo $record->creation_user_name ?></td>
                                                <td><?php echo $record->change_datetime ?></td>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" data-companybrandname="<?= $record->company_brand_name ?>" data-companyid="<?= $record->company_id ?>" data-companybrandid="<?= $record->company_brand_id ?>" data-toggle="modal" data-target="#modal-company_brand-update"><i class="fa fa-pen"></i></a>
                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCompanyBrand/' . $record->company_brand_id; ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-company_brand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Company Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertCompanyBrand" method="post">
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
                                <label for="companybrandname">Company Brand Name</label>
                                <input class="form-control" id="company_brand_name" placeholder="Company Brand Name" name="company_brand_name" maxlength="50" required>
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


    <div class="modal fade" id="modal-company_brand-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateCompanyBrand" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="company_brand_id_update" id="company_brand_id_update" />
                                <label for="companybrandname">Company Brand Name</label>
                                <input class="form-control" id="company_brand_name_update" placeholder="Division Name" name="company_brand_name_update" maxlength="50" required>
                                <br>
                                <label>Company Name</label>
                                <select id="company_id_update" class="form-control select2bs4" name="company_id_update">
                                    <?php foreach ($CompanyRecords as $row) : ?>
                                        <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
        var company_brand_name = $(this).data("companybrandname");
        var company_brand_id = $(this).data("companybrandid");
        var company_id = $(this).data("companyid");

        $("#company_brand_name_update").val(company_brand_name);
        $("#company_brand_id_update").val(company_brand_id);
        $("#company_id_update").val(company_id).trigger("change");;

    });

    $(document).on("click", "#btnAdd", function() {
        // Counter
        $("#company_brand_name").val("");

    });
</script>