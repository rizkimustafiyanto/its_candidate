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
                                        <h4>Surat Peringatan</h4>
                                        <a data-toggle="popover" title="Warning Letter" data-content="Warning Letter merupakan menu untuk memasukkan surat peringatan untuk karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-notice-letter">
                                            <i class="fa fa-plus"></i> Add Warning Letter
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
                                    <form role="form" action="<?php echo base_url() ?>NoticeLetterFilter" method="post">
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
                                    <form role="form" action="<?php echo base_url() ?>NoticeLetterFilter" method="post">
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

                    <!-- <?php print_r($EmployeeNoticeLetterRecords); ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="noticelettertable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Company</th>
                                        <th>Warning Type</th>
                                        <th>Warning Letter No</th>
                                        <th>Warning Reason</th>
                                        <th>Active Date</th>
                                        <th>Valid Until</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($EmployeeNoticeLetterRecords)) {
                                        foreach ($EmployeeNoticeLetterRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?php echo $record->employee_name; ?></td>
                                                <td><?php echo $record->company_name; ?></td>
                                                <td><?php echo $record->notice_letter_type_name; ?></td>
                                                <td><?php echo $record->notice_letter_no; ?></td>
                                                <td><?php echo $record->notice_reason; ?></td>
                                                <td><?php echo $record->notice_letter_date; ?></td>
                                                <?php $validnotice = date('Y-m-d', strtotime("+6 months", strtotime($record->notice_letter_date))) ?>
                                                <?php $validsuratteguran = date('Y-m-d', strtotime("+30 days", strtotime($record->notice_letter_date))) ?>
                                                <?php if ($record->notice_letter_id == 'NL-004') { ?>
                                                    <td><?php echo $validsuratteguran; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $validnotice; ?></td>
                                                <?php } ?>
                                                <?php if ($record->notice_letter_id == 'NL-004') { ?>
                                                    <?php if (strtotime(date('Y-m-d', time())) <= strtotime($validsuratteguran) && ($record->employee_notice_letter_id == $record->lastsp)) { ?>
                                                        <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                    <?php } else { ?>
                                                        <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if (strtotime(date('Y-m-d', time())) <= strtotime($validnotice) && ($record->employee_notice_letter_id == $record->lastsp)) { ?>
                                                        <td><a class="badge badge-pill badge-success float"> <?= 'Aktif'; ?></a></td>
                                                    <?php } else { ?>
                                                        <td><a class="badge badge-pill badge-danger float"> <?= 'Non Aktif'; ?></a></td>
                                                    <?php } ?>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($record->notice_letter_url != '') { ?>
                                                        <a id="btnDownload" class="btn btn-xs btn-success" href="<?php echo base_url() . 'DownloadNoticeLetter/' . $record->notice_letter_url . '/' . $record->employee_notice_letter_id; ?>"><i class="fa fa-download"></i></a>
                                                        <a href="<?= base_url('upload/' . $record->notice_letter_url); ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a>
                                                    <?php } ?>
													<?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                                                    <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteNoticeLetter/' . $record->employee_notice_letter_id . '/' . $record->notice_letter_url; ?>"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="modal-notice-letter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Warning Letter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="<?php echo base_url() ?>InsertNoticeLetter" enctype="multipart/form-data" method="post">
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
                                        <label>Employee Name</label>
                                        <select class="form-control select2bs4" name="employee_id" id="employee_id">
                                            <option>--Select Employee--</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="noticeletterid">Warning Letter Type</label>
                                <select class="form-control select2bs4" name="notice_letter_id" required>
                                    <option disabled selected value="">--Select--</option>
                                    <?php foreach ($NoticeLetterTypeRecords as $row) : ?>
                                        <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label for="noticeletterdate">Warning Letter Date</label>
                                    <div class="input-group date" id="datetime14" data-target-input="nearest">
                                        <input type="text" id="notice_letter_date" placeholder="Notice Letter Date" name="notice_letter_date" class="form-control datetimepicker-input" data-target="#datetime14" required />
                                        <div class="input-group-append" data-target="#datetime14" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="noticeletterno">Document No</label>
                                <input class="form-control" id="notice_letter_no" name="notice_letter_no" required>
                                <br>
                                <label for="noticeletterurl">Document</label>
                                <input class="form-control" type="file" name="image" id="image" required accept=".jpeg,.jpg,.png,.pdf">
                                <small>
                                    <font color="red">Type file : jpeg/jpg/png/pdf</font>
                                </small>
                                <br>
                                <br>
                                <label for="noticereason">Warning Reason</label>
                                <textarea class="form-control" id="notice_reason" name="notice_reason" required></textarea>
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
    $(document).on("click", "#btnAdd", function() {

        // // Variable
        // $("#variable_name").val("");
        // $("#variable_type").val("");
        // $("#variable_id").val("");
        // $("#leave_category_id").val("");
    });

    $(function() {
        $('[data-toggle="popover"]').popover()
    })
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