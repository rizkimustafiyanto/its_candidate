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
                                        <h4>LBPD</h4>
                                        <a data-toggle="popover" title="SPPD" aria-label="Description" data-content="LBPD merupakan menu untuk mengisi Laporan Perjalanan Dinas Karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">

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

                    <!-- <?php print_r($LPPDRecords); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>LBPD No</th>
                                        <th>SPPD No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Tujuan</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($LPPDRecords)) {
                                        foreach ($LPPDRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->lppd_id ?></td>
                                                <td><?php echo $record->sppd_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->tujuan_kota_id ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($record->start_date)) ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($record->finish_date)) ?></td>
                                                <?php if ($record->lppd_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->lppd_status_name; ?></a></td>
                                                <?php } else if ($record->lppd_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->lppd_status_name; ?></a></td>
                                                <?php } else if ($record->lppd_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->lppd_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->lppd_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LPPDDetail/' . $record->lppd_id . '/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-eye"></i></a>
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
    <div class="modal fade" id="modal-sppd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input SPPD Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertSPPD" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="employeeid">NIK</label>
                                <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                <br>
                                <label>Tujuan</label>
                                <select class="form-control select2bs4" name="zone_type" id="zone_type" required>
                                    <?php foreach ($ZoneTypeRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group" id="tujuankotaprovinsi">
                                    <select class="form-control select2bs4" name="tujuan_kota_id">
                                        <?php foreach ($ProvinceZoneRecords as $row) : ?>
                                            <option value="<?php echo $row->province_zone_id; ?>"><?php echo $row->province_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group" id="tujuankotacountry">
                                    <select class="form-control select2bs4" name="tujuan_kota_id_2">
                                        <?php foreach ($CountryZoneRecords as $row) : ?>
                                            <option value="<?php echo $row->country_zone_id; ?>"><?php echo $row->country_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="keperluan">Keperluan</label>
                                <input class="form-control" id="keperluan" placeholder="Keperluan" name="keperluan" required></input>
                                <br>
                                <label>Beban Biaya</label>
                                <select class="form-control select2bs4" name="beban_biaya_type" id="beban_biaya_type" required>
                                    <?php foreach ($BebanBiayaTypeRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group" id="bebanbiayainternal">
                                    <select class="form-control select2bs4" name="beban_biaya_company_id" id="beban_biaya_company_id">
                                        <?php foreach ($Company1Records as $row) : ?>
                                            <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br>
                                    <div class="form-group">
                                        <div id="divDivision">
                                            <select class="form-control select2bs4" name="beban_biaya_division_id" id="beban_biaya_division_id" required>
                                                <option disabled selected value="">--Select Division--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="bebanbiayaeksternal">
                                    <select class="form-control select2bs4" name="beban_biaya_company_id_2" id="beban_biaya_company_id_2">
                                        <?php foreach ($CompanyRecords as $row) : ?>
                                            <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br>
                                    <div class="form-group">
                                        <div id="divDivision">
                                            <select class="form-control select2bs4" name="beban_biaya_division_id_2" id="beban_biaya_division_id_2" required>
                                                <option disabled selected value="">--Select Division--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="bebanbiayalainnya">
                                    <input class="form-control" id="beban_biaya_lainnya_id" placeholder="Beban Biaya" name="beban_biaya_lainnya_id"></input>
                                </div>
                                <label for="description">Keterangan</label>
                                <textarea class="form-control" id="description" placeholder="Keterangan" name="description" required></textarea>
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
    $(document).on("click", "#btnSelect", function() {

        var leave_id = $(this).data("leaveid");
        var leave_name = $(this).data("leavename");
        var employee_id = $(this).data("employeeid");
        var description = $(this).data("description");
        var leave_category_id = $(this).data("leavecategoryid");
        var leave_status_id = $(this).data("leavestatusid");
        var leave_sub_category_id = $(this).data("leavesubcategoryid");
        var time_leave_start = $(this).data("timeleavestart");
        var time_leave_finish = $(this).data("timeleavefinish");

        $("#leave_id_update").val(leave_id);
        $("#leave_name_update").val(leave_name);
        $("#employee_id_update").val(employee_id);
        $("#description_update").val(description);
        $("#leave_category_id_update").val(leave_category_id);
        $("#leave_status_id_update").val(leave_status_id);
        $("#leave_sub_category_id_update").val(leave_sub_category_id);
        $("#time_leave_start_update").val(time_leave_start);
        $("#time_leave_finish_update").val(time_leave_finish);

    });

    $(document).on("click", "#btnAdd", function() {

        // // Variable
        // $("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });
</script>

<script>
    $("#zone_type").change(function() {
        var zonetype = $("#zone_type").val();

        if (zonetype == "ZT-001") {
            $('#tujuankotaprovinsi').show();
            $('#tujuankotacountry').hide();
        } else {
            $('#tujuankotaprovinsi').hide();
            $('#tujuankotacountry').show();
        }
    });

    $("#beban_biaya_type").change(function() {
        var bebanbiayatype = $("#beban_biaya_type").val();

        if (bebanbiayatype == "BB-001") {
            $('#bebanbiayainternal').show();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayalainnya').hide();
        } else if (bebanbiayatype == "BB-002") {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayaeksternal').show();
            $('#bebanbiayalainnya').hide();
        } else {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayalainnya').show();
        }
    });
</script>

<script>
    $(document).ready(function(e) {
        var zonetype = $("#zone_type").val();

        if (zonetype == "ZT-001") {
            $('#tujuankotaprovinsi').show();
            $('#tujuankotacountry').hide();
        } else {
            $('#tujuankotaprovinsi').hide();
            $('#tujuankotacountry').show();
        }
    });

    $(document).ready(function(e) {
        var bebanbiayatype = $("#beban_biaya_type").val();

        if (bebanbiayatype == "BB-001") {
            $('#bebanbiayainternal').show();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayalainnya').hide();
        } else if (bebanbiayatype == "BB-002") {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayaeksternal').show();
            $('#bebanbiayalainnya').hide();
        } else {
            $('#bebanbiayainternal').hide();
            $('#bebanbiayaeksternal').hide();
            $('#bebanbiayalainnya').show();
        }
    });
</script>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>


<script>
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#beban_biaya_company_id").ready(function() {
            var bebanbiayacompanyid = $("#beban_biaya_company_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#beban_biaya_division_id').html(html);
                }
            })
        })


        // Selected Change Dropdown Vehicle
        $("#beban_biaya_company_id").change(function() {
            var bebanbiayacompanyid = $("#beban_biaya_company_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#beban_biaya_division_id').html(html);
                }
            })
        })
    });
</script>


<script>
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#beban_biaya_company_id_2").ready(function() {
            var bebanbiayacompanyid2 = $("#beban_biaya_company_id_2").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid2
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#beban_biaya_division_id_2').html(html);
                }
            })
        })


        // Selected Change Dropdown Vehicle
        $("#beban_biaya_company_id_2").change(function() {
            var bebanbiayacompanyid2 = $("#beban_biaya_company_id_2").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetDivisionByCompanyId',
                data: {
                    company_id: bebanbiayacompanyid2
                },
                type: 'post',
                async: true,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    var html = '';
                    var is = '';
                    if (response != null) {
                        for (is = 0; is < response.length; is++) {
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#beban_biaya_division_id_2').html(html);
                }
            })
        })
    });
</script>