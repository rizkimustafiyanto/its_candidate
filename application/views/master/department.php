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
                                    <h4>Department</h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                        <div class="col-xs-12 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-department">
                                                <i class="fa fa-plus"></i> Add Department
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
                                        <th>Department ID</th>
                                        <th>Company Name</th>
                                        <th>Division Name</th>
                                        <th>Department Name</th>
                                        <th>Creation</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($DepartmentRecords)) {
                                        foreach ($DepartmentRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->department_id ?></td>
                                                <td><?php echo $record->company_name ?></td>
                                                <td><?php echo $record->division_name ?></td>
                                                <td><?php echo $record->department_name ?></td>
                                                <td><?php echo $record->creation_user_name ?></td>
                                                <td><?php echo $record->change_datetime ?></td>
                                                <td class="text-center">
                                                    <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" data-departmentname="<?= $record->department_name ?>" data-companyid="<?= $record->company_id ?>" data-companyname="<?= $record->company_name ?>" data-divisionid="<?= $record->division_id ?>" data-departmentid="<?= $record->department_id ?>" data-toggle="modal" data-target="#modal-department-update"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteDepartment/' . $record->department_id; ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-department">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertDepartment" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Company Name</label>
                                <select class="form-control select2bs4" name="company_id" id="company_id">
                                    <?php foreach ($CompanyRecords as $row) : ?>
                                        <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div id="divDivision">
                                    <label>Division Name</label>
                                    <select class="form-control select2bs4" id="division_id" name="division_id">
                                    </select>
                                </div>
                                <br>
                                <label for="departmentname">Department Name</label>
                                <input class="form-control" id="department_name" placeholder="Department Name" name="department_name" maxlength="50" required>
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


    <div class="modal fade" id="modal-department-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>UpdateDepartment" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" value="" name="department_id_update" id="department_id_update" />
                                <label>Company</label>
                                <input class="form-control" value="" id="company_name_update" name="company_name_update" readonly>
                                <br>
                                <div id="divDivisionUpdate">
                                    <label>Division</label>
                                    <select class="form-control select2bs4" id="division_id_update" name="division_id_update">
                                    </select>
                                </div>
                                <br>
                                <label for="departmentname">Department Name</label>
                                <input class="form-control" id="department_name_update" placeholder="Department Name" name="department_name_update" maxlength="50" required>
                                <br>
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
    $(document).ready(function() {

        // Selected Change Dropdown Vehicle
        $("#company_id").change(function() {
            var companyid = $("#company_id").val();

            // For set value Vehicle type on first load
            $.ajax({
                url: 'GetDivisionByCompanyId',
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
                            html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
                        }
                        $("#divDivision").show();
                    } else {
                        html += '<option value=""></option>';
                        $("#divDivision").hide();
                    }
                    //alert(data[0].sub_menu_id);
                    $('#division_id').html(html);
                }
            })
        })
    });

    $(document).on("click", "#btnSelect", function() {
        //Counter
        var department_id = $(this).data("departmentid");
        var company_id = $(this).data("companyid");
        var company_name = $(this).data("companyname");
        var division_id = $(this).data("divisionid");
        var department_name = $(this).data("departmentname");

        $("#department_id_update").val(department_id);
        // $("#company_id_update").val(company_id).trigger("change");
        $("#company_name_update").val(company_name);
        $("#division_id_update").val(division_id).trigger("change");
        $("#department_name_update").val(department_name);

        $('#modal-department-update').modal('show');

        $.ajax({
            url: 'GetDivisionByCompanyId',
            data: {
                company_id: company_id
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
                    $("#divDivisionUpdate").show();
                } else {
                    html += '<option value=""></option>';
                    $("#divDivisionUpdate").hide();
                }
                //alert(data[0].sub_menu_id);
                $('#division_id_update').html(html);
                $("#division_id_update").val(division_id).trigger("change");;

            }
        })

    });

    $(document).on("click", "#btnAdd", function() {
        // Counter
        // $("#department_name").val("");
        // $("#company_id").val("");
        // $("#division_id").val("");
        // $("#department_id").val("");

    });
</script>