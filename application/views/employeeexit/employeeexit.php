<?php
$employee_exit_url = '';

if (!empty($EmployeeExitRecords)) {
    foreach ($EmployeeExitRecords as $row) {
        $employee_exit_url = $row->employee_exit_url;
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
                                    <h4>List Karyawan Resign</h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee-exit">
                                                <i class="fa fa-plus"></i> Add Employee Exit
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                        <div class="card card-sm card-default">
                            <div class="card-header">
                                <div class="row ">
                                    <form role="form" action="<?php echo base_url() ?>EmployeeExitFilter" method="post">
                                        <div class="col-sm-12">
                                            <div class="row ">
                                                <div class="row-sm-6">
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
                                                <div class="row-sm-6">
                                                    <label>Company Brand</label>
                                                    <select class="form-control select2bs4" name="company_brand_id_pusat" id="company_brand_id_pusat" required>
                                                        <option disabled selected value="">--Select--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div style="width:11vw;">
                                                <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->userdata('role_id') == '2') { ?>
                        <div class="card card-sm card-default">
                            <div class="card-header">
                                <div class="row ">
                                    <form role="form" action="<?php echo base_url() ?>EmployeeExitFilter" method="post">
                                        <div class="col-sm-12">
                                            <div class="row ">
                                                <div class="row-sm-6">
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
                                                <div class="row-sm-6">
                                                    <label>Company Brand</label>
                                                    <select class="form-control select2bs4" name="company_brand_id_cabang" id="company_brand_id_cabang" required>
                                                        <option disabled selected value="">--Select--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div style="width:11vw;">
                                                <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                        <?= $this->session->unset_userdata('success'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>

                    <!-- <?php print_r($EmployeeExitUrl); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee Id</th>
                                        <th>Employee Name</th>
                                        <th>Company</th>
                                        <th>Exit Date</th>
                                        <th>Exit Reason</th>
                                        <th>Exit No</th>
                                        <th>Status</th>
                                        <th>Exit Doc</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($EmployeeExitRecords)) {
                                        foreach ($EmployeeExitRecords as $record) {
                                    ?>
                                            <tr>
                                                <!-- <td><?= $i++; ?></td> -->
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td>
                                                    <?php if ($record->employee_exit_date == '0000-00-00') { ?>
                                                    <?php } else { ?>
                                                        <?php echo $record->employee_exit_date ?>
                                                    <?php } ?>
                                                </td>

                                                <td><?php echo $record->employee_exit_reason ?></td>
                                                <td><?php echo $record->employee_exit_no ?></td>
                                                <?php if ($record->resign_status == 'RS-002') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"><?php echo $record->resign_status_name ?></a></td>
                                                <?php } else if ($record->resign_status == 'RS-003') { ?>
                                                    <td><a class="badge badge-pill badge-light float"><?php echo $record->resign_status_name ?></a></td>
                                                <?php } else if ($record->resign_status == 'RS-004') { ?>
                                                    <td><a class="badge badge-pill badge-dark float"><?php echo $record->resign_status_name ?></a></td>
                                                <?php } else if ($record->resign_status == 'RS-005') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"><?php echo $record->resign_status_name ?></a></td>
                                                <?php } ?>
                                                <td class="text-center">
                                                    <?php if ($record->employee_exit_url != '') { ?>
                                                        <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadEmployeeExit/' . $record->employee_exit_url . '/' . $record->employee_id; ?>"><i class="fa fa-download"></i></a>
                                                        <a href="<?= base_url('upload/' . $record->employee_exit_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-file"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a id="btnSelect" class="btn btn-xs btn-info" href="<?php echo base_url() . 'EmployeeDetail/' . $record->employee_id; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
													<a id="btnSelectEdit" class="btn btn-xs btn-warning" data-employeeid="<?= $record->employee_id ?>" data-employeename="<?= $record->employee_name ?>" data-resignstatus="<?= $record->resign_status ?>" data-employeeexitdate="<?= $record->employee_exit_date ?>" data-employeeexitreason="<?= $record->employee_exit_reason ?>" data-employeeexitno="<?= $record->employee_exit_no ?>" data-employeeexiturl="<?= $record->employee_exit_url ?>"><i class="fa fa-pen"></i></a>
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
    <div class="modal fade" id="modal-employee-exit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Employee Exit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertEmployeeExit" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Company Name</label>
                                <select class="form-control select2bs4" name="company_id" id="company_id">
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($CompanyRecords as $row) : ?>
                                        <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group">
                                    <div id="divEmployee">
                                        <label>EmployeeName</label>
                                        <select class="form-control select2bs4" name="employee_id" id="employee_id" required>
                                            <option disabled selected value="">--Select Employee--</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="resignstatus">Status</label>
                                <select class="form-control select2bs4" name="resign_status" required>
                                    <option disabled selected value="">--Select--</option>
                                    <option value="RS-002">Resign</option>
                                    <option value="RS-003">Off Contract</option>
                                    <option value="RS-004">Fired</option>
									<option value="RS-005">Mangkir</option>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label for="employeeexitdate">Employee Exit Date</label>
                                    <div class="input-group date" id="datetime13" data-target-input="nearest">
                                        <input type="text" id="employee_exit_date" placeholder="Employee Exit Date" name="employee_exit_date" class="form-control datetimepicker-input" data-target="#datetime13" required />
                                        <div class="input-group-append" data-target="#datetime13" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="employeeexitno">Document No</label>
                                <input class="form-control" id="employee_exit_no" name="employee_exit_no" required>
                                <br>
                                <label for="employeeexiturl">Document</label>
                                <input class="form-control" type="file" name="image" id="image" accept=".jpeg,.jpg,.png,.pdf">
                                <small>
                                    <font color="red">Type file : jpeg/jpg/png/pdf</font>
                                </small>
                                <br>
                                <br>
                                <label for="employeeexitreason">Reason</label>
                                <textarea class="form-control" id="employee_exit_reason" name="employee_exit_reason" required></textarea>
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

    <div class="modal fade" id="modal-resign-status-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Employee Exit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateEmployeeExit" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="employee_id_update" name="employee_id" type="hidden">
                                <label for="employeeename">Employee Name</label>
                                <input class="form-control" id="employee_name_update" name="employee_name" required readonly>
                                <br>
                                <label for="resignstatus">Status</label>
                                <select class="form-control select2bs4" name="resign_status" id="resign_status_update" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($ResignStatusRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div id="ExtColoumn">
                                    <div class="form-group">
                                        <label for="employeeexitdate">Employee Exit Date</label>
                                        <div class="input-group date" id="datetime17" data-target-input="nearest">
                                            <input type="text" id="employee_exit_date_update" placeholder="Employee Exit Date" name="employee_exit_date" class="form-control datetimepicker-input" data-target="#datetime17" required />
                                            <div class="input-group-append" data-target="#datetime17" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="employeeexitno">Document No</label>
                                    <input class="form-control" id="employee_exit_no_update" name="employee_exit_no" required>
                                    <br>
                                    <label for="employeeexiturl">Document</label>
                                    <?php if ($employee_exit_url != null || $employee_exit_url = "") { ?>
                                        <a id="hrefurl" href="" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                    <?php } ?>
                                    <input class="form-control" type="file" name="image" id="image_update" accept=".jpeg,.jpg,.png,.pdf">
                                    <input type="hidden" id="employee_exit_url" name="employee_exit_url">
                                    <small>
                                        <font color="red">Type file : jpeg/jpg/png/pdf</font>
                                    </small>
                                    <br>
                                    <br>
                                    <label for="employeeexitreason">Reason</label>
                                    <textarea class="form-control" id="employee_exit_reason_update" name="employee_exit_reason" required></textarea>
                                    <br>
                                </div>
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
    $(document).on("click", "#btnAdd", function() {

        // // Variable
        // $e_id("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });
</script>


<script>
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#company_id").change(function() {
            var companyid = $("#company_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetEmployeeByCompanyId',
                data: {
                    company_id: companyid
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
                            html += '<option value=' + response[is].employee_id + '>' + response[is].employee_name + '</option>';
                            console.log(company_id)
                        }
                        $("#divEmployee").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divEmployee").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#employee_id').html(html);
                }
            })
        })
    });
</script>


<script>
    $(document).on("click", "#btnSelectEdit", function() {
        var employee_id = $(this).data("employeeid");
        var employee_name = $(this).data("employeename");
        var resign_status = $(this).data("resignstatus");
        var employee_exit_date = $(this).data("employeeexitdate");
        var employee_exit_reason = $(this).data("employeeexitreason");
        var employee_exit_no = $(this).data("employeeexitno");
        var employee_exit_url = $(this).data("employeeexiturl");


        $("#employee_id_update").val(employee_id);
        $("#employee_name_update").val(employee_name);
        $("#resign_status_update").val(resign_status);
        $("#employee_exit_date_update").val(employee_exit_date);
        $("#employee_exit_reason_update").val(employee_exit_reason);
        $("#employee_exit_no_update").val(employee_exit_no);
        $("#employee_exit_url").val(employee_exit_url);
        $("#hrefurl").attr("href", 'upload/' + employee_exit_url);

        $('#modal-resign-status-update').modal('show');
        $("#employee_id_update").val(employee_id).trigger("change");
        $("#resign_status_update").val(resign_status).trigger("change");

    });
</script>

<script>
    $("#resign_status_update").change(function() {
        var resignstatus = $("#resign_status_update").val();

        if (resignstatus == 'RS-001') {
            $('#ExtColoumn').hide();
        } else {
            $('#ExtColoumn').show();
        }
    });

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
                        // console.log(company);
                    }
                } else {
                    html += '<option value=""></option>';
                }
                //alert(data[0].sub_menu_id);
                $('#company_brand_id_pusat').html(html);
            }
        })
    })
</script>