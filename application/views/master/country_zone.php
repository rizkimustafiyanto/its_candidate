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
                                    <h4>Country Zone</h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-country-zone">
                                                <i class="fa fa-plus"></i> Add Country Zone
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
                                        <th>Country Zone ID</th>
                                        <th>Country Zone Name</th>
                                        <th>Zone Type</th>
                                        <th>Regional</th>
                                        <th>Creation</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($CountryZoneRecords)) {
                                        foreach ($CountryZoneRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->country_zone_id ?></td>
                                                <td><?php echo $record->country_name ?></td>
                                                <td><?php echo $record->zone_type_name ?></td>
                                                <td><?php echo $record->regional_name ?></td>
                                                <td><?php echo $record->creation_user_name ?></td>
                                                <td><?php echo $record->change_datetime ?></td>
                                                <td class="text-center">
                                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" data-countryzoneid="<?= $record->country_zone_id ?>" data-countryname="<?= $record->country_name ?>" data-zonetypeid="<?= $record->zone_type_id ?>" data-zonetypename="<?= $record->zone_type_name ?>" data-regionalid="<?= $record->regional_id ?>" data-regionalname="<?= $record->regional_name ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCountryZone/' . $record->country_zone_id; ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-country-zone">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Country Zone</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertCountryZone" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="countryname">Country Name</label>
                                <input class="form-control" id="country_name" placeholder="Country Name" name="country_name" required>
                                <br>
                                <label>Regional</label>
                                <select class="form-control select2bs4" name="regional_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($RegionalRecords as $row) : ?>
                                        <option value="<?php echo $row->regional_id; ?>"><?php echo $row->regional_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
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


    <div class="modal fade" id="modal-country-zone-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Country Zone</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateCountryZone" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="country_zone_id_update" id="country_zone_id_update" />
                                <br>
                                <label for="countryname">Country Name</label>
                                <input class="form-control" id="country_name_update" placeholder="Country Name" name="country_name_update" required>
                                <br>
                                <label for="regionalid">Regional</label>
                                <select class="form-control select2bs4" id="regional_id_update" name="regional_id_update">
                                    <?php foreach ($RegionalRecords as $row) : ?>
                                        <option value="<?php echo $row->regional_id; ?>"><?php echo $row->regional_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
        var country_zone_id = $(this).data("countryzoneid");
        var country_name = $(this).data("countryname");
        var zone_type_id = $(this).data("zonetypeid");
        var regional_id = $(this).data("regionalid");


        $("#country_zone_id_update").val(country_zone_id);
        $("#country_name_update").val(country_name);;
        $("#zone_type_id_update").val(zone_type_id);
        $("#regional_id_update").val(regional_id);

        $('#modal-country-zone-update').modal('show');
        $("#zone_type_id_update").val(zone_type_id).trigger("change");
        $("#regional_id_update").val(regional_id).trigger("change");

    });
</script>


<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>