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
                                    <h4>Report LBPD</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= "Filter SPPD Date from : "  . "<b>" . ($this->input->post('date_1')) . "</b>" . " - " . "<b>" . ($this->input->post('date_2')) . "</b>" ?>

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
                    <!-- <?php print_r($ApprovalListRecords); ?> -->

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <form role="form" action="<?php echo base_url() ?>LPPDReport" method="post">
                                            <div class="col-sm-12">
                                                <div class="row ">
                                                    <div class="row-sm-3">
                                                        <label>Company</label>
                                                        <select class="form-control select2bs4" id="companypusat" name="companypusat" required>
                                                            <option disabled selected value="">--Select--</option>
                                                            <!-- <option value="all">All</option> -->
                                                            <?php foreach ($CompanyInBrandPusatRecords as $row) : ?>
                                                                <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-3">
                                                        <label>Company Brand</label>
                                                        <select class="form-control select2bs4" name="company_brand_id_pusat" id="company_brand_id_pusat" required>
                                                            <option disabled selected value="">--Select--</option>
                                                        </select>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-2">
                                                        <label>Start Date</label>
                                                        <div class="form-group" style="width:11vw;">
                                                            <div class="input-group date" id="datetime11" data-target-input="nearest">
                                                                <input type="text" id="date_1" placeholder="Start Date" name="date_1" class="form-control datetimepicker-input" data-target="#datetime11" data-width="10%" />
                                                                <div class="input-group-append" data-target="#datetime11" data-toggle="datetimepicker">
                                                                    <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-2">
                                                        <div class="form-group" style="width:11vw;">
                                                            <label>Finish Date</label>
                                                            <div class="input-group date" id="datetime12" data-target-input="nearest">
                                                                <input type="text" id="date_2" placeholder="Finish Date" name="date_2" class="form-control datetimepicker-input" data-target="#datetime12" data-width="10%" />
                                                                <div class="input-group-append" data-target="#datetime12" data-toggle="datetimepicker">
                                                                    <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <div class="row-sm-1">
                                                            <label style="color:white">Filter</label>
                                                            <br>
                                                            <input type="submit" id="btnSubmit" class="btn btn-primary" value="Filter" />
                                                        </div>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <div class="row-sm-1">
                                                            <label style="color:white">Reset</label>
                                                            <br>
                                                            <button class="btn btn-secondary">
                                                                <a style="text-decoration:none;color:white" href="<?php echo base_url() ?>GetDefaultLPPDReport">Reset</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '12') { ?>
                                        <form role="form" action="<?php echo base_url() ?>LPPDReport" method="post">
                                            <div class="col-sm-12">
                                                <div class="row ">
                                                    <div class="row-sm-4">
                                                        <label>Company</label>
                                                        <select class="form-control select2bs4" id="company" name="company" required>
                                                            <option disabled selected value="">--Select--</option>
                                                            <!-- <option value="all">All</option> -->
                                                            <?php foreach ($CompanyInBrandRecords as $row) : ?>
                                                                <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-2">
                                                        <label>Company Brand</label>
                                                        <select class="form-control select2bs4" name="company_brand_id_cabang" id="company_brand_id_cabang" required>
                                                            <option disabled selected value="">--Select--</option>
                                                        </select>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-2">
                                                        <label>Start Date</label>
                                                        <div class="form-group" style="width:11vw;">
                                                            <div class="input-group date" id="datetime11" data-target-input="nearest">
                                                                <input type="text" id="date_1" placeholder="Start Date" name="date_1" class="form-control datetimepicker-input" data-target="#datetime11" data-width="10%" />
                                                                <div class="input-group-append" data-target="#datetime11" data-toggle="datetimepicker">
                                                                    <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="row-sm-2">
                                                        <div class="form-group" style="width:11vw;">
                                                            <label>Finish Date</label>
                                                            <div class="input-group date" id="datetime12" data-target-input="nearest">
                                                                <input type="text" id="date_2" placeholder="Finish Date" name="date_2" class="form-control datetimepicker-input" data-target="#datetime12" data-width="10%" />
                                                                <div class="input-group-append" data-target="#datetime12" data-toggle="datetimepicker">
                                                                    <div class="input-group-text" data-width="10%"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <div class="row-sm-1">
                                                            <label style="color:white">Filter</label>
                                                            <br>
                                                            <input type="submit" id="btnSubmit" class="btn btn-primary" value="Filter" />
                                                        </div>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <div class="row-sm-1">
                                                            <label style="color:white">Reset</label>
                                                            <br>
                                                            <button class="btn btn-secondary">
                                                                <a style="text-decoration:none;color:white" href="<?php echo base_url() ?>GetDefaultLPPDReport">Reset</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="sppd_report" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Company Branch</th>
                                        <th>Company Brand</th>
                                        <th>Division</th>
                                        <th>Department</th>
                                        <th>SPPD Date</th>
                                        <th>Tujuan</th>
                                        <th>Creation Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($LPPDReportRecords)) {
                                        foreach ($LPPDReportRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->sppd_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->company_branch_name ?></td>
                                                <td><?php echo $record->company_brand_name ?></td>
                                                <td><?php echo $record->division_name ?></td>
                                                <td><?php echo $record->department_name ?></td>
                                                <td><?php echo $record->lppd_detail_date ?></td>
                                                <td><?php echo $record->tujuan_kota_id ?></td>
                                                <td><?php echo $record->creation_datetime ?></td>
                                                <td>
                                                    <?php if ($record->lppd_status_id == 'ST-001') { ?>
                                                        <a class="badge badge-pill badge-secondary float"> <?= $record->lppd_status_name; ?></a>
                                                    <?php } else if ($record->lppd_status_id == 'ST-002') { ?>
                                                        <a class="badge badge-pill badge-success float"> <?= $record->lppd_status_name; ?></a>
                                                    <?php } else if ($record->lppd_status_id == 'ST-004') { ?>
                                                        <a class="badge badge-pill badge-danger float"> <?= $record->lppd_status_name; ?></a>
                                                    <?php } else if ($record->lppd_status_id == 'ST-005') { ?>
                                                        <a class="badge badge-pill badge-primary float"> <?= $record->lppd_status_name; ?></a>
                                                    <?php } else { ?>
                                                        <a class="badge badge-pill badge-warning float"> <?= $record->lppd_status_name; ?></a>
                                                    <?php }  ?>
                                                </td>
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

</div>


<script>
    // get company brand
    $("#company").change(function() {
        var company = $("#company").val();

        // For set value Vehicle type on first load
        $.ajax({
            url: 'GetCompanyBrandByCompanyId3',
            data: {
                company: company
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
                        html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
                        // console.log(company);
                    }
                } else {
                    html += '<option value=""></option>';
                }
                //alert(data[0].sub_menu_id);
                $('#company_brand_id_cabang').html(html);
            }
        })
    })

    // get company brand untuk hrd pusat
    $("#companypusat").change(function() {
        var companypusat = $("#companypusat").val();

        // For set value Vehicle type on first load
        $.ajax({
            url: 'GetCompanyBrandByCompanyId4',
            data: {
                companypusat: companypusat
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
                        html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
                    }
                } else {
                    html += '<option value=""></option>';
                }
                $('#company_brand_id_pusat').html(html);
            }
        })
    })
</script>