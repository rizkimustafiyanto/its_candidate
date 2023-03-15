 <?php

    $paid_leave_status_id = '';
    if (!empty($CuttingPaidLeaveRecords)) {
        foreach ($CuttingPaidLeaveRecords as $record) {
            $paid_leave_status_id = $record->paid_leave_status_id;
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
                                     <div class="row">
                                         <h4>Pemotongan Cuti Tahunan</h4>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <?php if ($paid_leave_status_id != 'ST-001') { ?>
                                         <div class="col-xs-12 text-right">
                                             <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-paid-leave">
                                                 <i class="fa fa-plus"></i> Tambah Pemotongan Cuti
                                             </button>
                                         </div>
                                     <?php } else { ?>
                                         <div class="col-xs-12 text-right">
                                             <button type=" button" class="btn btn-sm btn-primary" id="btnSubmitWithDraft">
                                                 <i class="fa fa-plus"></i> Tambah Pemotongan Cuti
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

                     <!-- <?php print_r($CuttingPaidLeaveRecords); ?> -->

                     <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                         <div class="card card-sm card-default">
                             <div class="card-header">
                                 <div class="row ">
                                     <form role="form" action="<?php echo base_url() ?>CuttingPaidLeaveFilter" method="post">
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
                                             <div class="row">
                                                 <div style="width:11vw;">
                                                     <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                                                     <button class="btn btn-secondary"><a style="text-decoration:none;color:white" href="<?php echo base_url() ?>CuttingPaidLeave">Reset</a></button>
                                                 </div>
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
                                     <form role="form" action="<?php echo base_url() ?>CuttingPaidLeaveFilter" method="post">
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
                                                 <button class="btn btn-secondary"><a style="text-decoration:none;color:white" href="<?php echo base_url() ?>CuttingPaidLeave">Reset</a></button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>

                     <div class="card">
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Document No</th>
                                         <th>NIK</th>
                                         <th>Name</th>
                                         <th>Company</th>
                                         <th>Category</th>
                                         <th>Start Date</th>
                                         <th>Finish Date</th>
                                         <th>Amount</th>
                                         <th>Creation Date</th>
                                         <th>Creator</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (!empty($CuttingPaidLeaveRecords)) {
                                            foreach ($CuttingPaidLeaveRecords as $record) {
                                        ?>
                                             <tr>
                                                 <td><?php echo $record->employee_paid_leave_id ?></td>
                                                 <td><?php echo $record->employee_id ?></td>
                                                 <td><?php echo $record->employee_name ?></td>
                                                 <td><?php echo $record->company_name ?></td>
                                                 <td><?php echo $record->paid_leave_name ?></td>
                                                 <td><?php echo $record->start_date ?></td>
                                                 <td><?php echo $record->finish_date ?></td>
                                                 <?php if ($record->paid_leave_amount != 0) { ?>
                                                     <td><?php echo $record->paid_leave_amount ?> day </td>
                                                 <?php } else { ?>
                                                     <td> - </td>
                                                 <?php } ?>
                                                 <td><?php echo $record->creation_datetime ?></td>
                                                 <td><?php echo $record->creator ?></td>
                                                 <?php if ($record->paid_leave_status_id == 'ST-001') { ?>
                                                     <td><a class="badge badge-pill badge-secondary float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else if ($record->paid_leave_status_id == 'ST-002' || $record->paid_leave_status_id == 'ST-007') { ?>
                                                     <td><a class="badge badge-pill badge-success float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else if ($record->paid_leave_status_id == 'ST-004') { ?>
                                                     <td><a class="badge badge-pill badge-danger float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else { ?>
                                                     <td><a class="badge badge-pill badge-warning float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php }  ?>
                                                 <td class="text-center">
                                                     <?php if ($record->paid_leave_status_id == 'ST-001') { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'CuttingPaidLeaveDetail/' . $record->employee_paid_leave_id . "/" . $record->paid_leave_id . "/" . $record->employee_id; ?>"><i class="fa fa-pen"></i></a>
                                                         <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteCuttingPaidLeave/' . $record->employee_paid_leave_id; ?>"><i class="fa fa-trash"></i></a>
                                                     <?php } else { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary " href="<?php echo base_url() . 'CuttingPaidLeaveDetail/' . $record->employee_paid_leave_id . "/" . $record->paid_leave_id . "/" . $record->employee_id; ?>"><i class="fa fa-eye"></i></a>
                                                     <?php }  ?>
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

     <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
         <!-- Modal -->
         <div class="modal fade" id="modal-paid-leave">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Input Pemotongan Cuti</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form role="form" action="<?php echo base_url() ?>InsertCuttingPaidLeave" method="post">
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <label>Company Name</label>
                                     <select class="form-control select2bs4" name="company_id" id="company_id">
                                         <option disabled selected value="">--Select--</option>
                                         <?php foreach ($CompanyInBrandPusatRecords as $row) : ?>
                                             <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <br>
                                     <div class="row-sm-6">
                                         <label>Company Brand</label>
                                         <select class="form-control select2bs4" name="company_brand_id" id="company_brand_id" required>
                                             <option disabled selected value="">--Select--</option>
                                         </select>
                                     </div>
                                     <br>
                                     <div class="form-group">
                                         <div id="divEmployee">
                                             <label>Employee Name</label>
                                             <select class="form-control select2bs4" name="employee_id" id="employee_id" required>
                                                 <option disabled selected value="">--Select Employee--</option>
                                             </select>
                                         </div>
                                     </div>
                                     <label>Kategori Cuti</label>
                                     <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id">
                                         <option value="PL-001">Tahunan</option>
                                     </select>
                                     <br>
                                     <label for="description">Keterangan</label>
                                     <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50" required></textarea>
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
             </div>
         </div>
     <?php } ?>

     <?php if ($this->session->userdata('role_id') == '2') { ?>
         <!-- Modal -->
         <div class="modal fade" id="modal-paid-leave">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Input Pemotongan Cuti</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form role="form" action="<?php echo base_url() ?>InsertCuttingPaidLeave" method="post">
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <label>Company Name</label>
                                     <select class="form-control select2bs4" name="company_id_2" id="company_id_2">
                                         <option disabled selected value="">--Select--</option>
                                         <?php foreach ($CompanyInBrandRecords as $row) : ?>
                                             <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <br>
                                     <div class="row-sm-6">
                                         <label>Company Brand</label>
                                         <select class="form-control select2bs4" name="company_brand_id_2" id="company_brand_id_2" required>
                                             <option disabled selected value="">--Select--</option>
                                         </select>
                                     </div>
                                     <br>
                                     <div class="form-group">
                                         <div id="divEmployee">
                                             <label>Employee Name</label>
                                             <select class="form-control select2bs4" name="employee_id" id="employee_id" required>
                                                 <option disabled selected value="">--Select Employee--</option>
                                             </select>
                                         </div>
                                     </div>
                                     <label>Kategori Cuti</label>
                                     <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id">
                                         <option value="PL-001">Tahunan</option>
                                     </select>
                                     <br>
                                     <label for="description">Keterangan</label>
                                     <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50" required></textarea>
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
             </div>
         </div>
     <?php } ?>


 </div>

 <script>
     $(document).on("click", "#btnAdd", function() {

         // // Variable
         // $("#variable_name").val("");
         // $("#variable_type").val("");
         // $("#variable_id").val("");
         // $("#leave_category_id").val("");
     });
 </script>

 <script>
     $("#paid_leave_id").change(function() {
         var paidleaveid = $("#paid_leave_id").val();

         if (paidleaveid == 'PL-001') {
             $('#Divpaid_leave_khusus').hide();
         } else {
             $('#Divpaid_leave_khusus').show();
         }
     });
 </script>


 <script>
     $(document).ready(function(e) {
         var paidleaveid = $("#paid_leave_id").val();

         if (paidleaveid == 'PL-001') {
             $('#Divpaid_leave_khusus').hide();
         } else {
             $('#Divpaid_leave_khusus').show();
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
         $("#company_id").change(function() {

         })
     });
 </script>

 <script type="text/javascript">
     $(document).ready(function() {
         //  $('#employee_id');

         $("#chkall").click(function() {
             if ($("#chkall").is(':checked')) {
                 $("#employee_id > option").prop("selected", true);
                 $("#employee_id").trigger("change");
             } else {
                 $("#employee_id > option").prop("selected", false);
                 $("#employee_id").trigger("change");
             }
         });
     });
 </script>


 <script>
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

     //pop up
     // get company brand
     $("#company_id").change(function() {
         var companyid = $("#company_id").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetCompanyBrandByCompanyId',
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
                         html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
                     }
                     $("#divCompanyBrand").show();
                 } else {
                     html += '<option value=""></option>';
                     $("#divCompanyBrand").hide();
                 }
                 //alert(data[0].sub_menu_id);
                 $('#company_brand_id').html(html);

                 //  $('#division_id').html(html);
                 var companybrandid = $("#company_brand_id").val();

                 // For set value Vehicle type on first load
                 $.ajax({
                     url: 'GetEmployeeHaveRemainingPaidLeaveByCompanyId2',
                     data: {
                         company_brand_id: companybrandid
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
             }
         })
     })

     // get company brand
     $("#company_id_2").change(function() {
         var company_id_2 = $("#company_id_2").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetCompanyBrandByCompanyId5',
             data: {
                 company_id_2: company_id_2
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
                 $('#company_brand_id_2').html(html);

                 var companybrandid2 = $("#company_brand_id_2").val();

                 // For set value Vehicle type on first load
                 $.ajax({
                     url: 'GetEmployeeHaveRemainingPaidLeaveByCompanyId3',
                     data: {
                         company_brand_id_2: companybrandid2
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
                                 //  console.log(company_id)
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
             }
         })
     })


     $("#company_brand_id").change(function() {

         //  $('#division_id').html(html);
         var companybrandid = $("#company_brand_id").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetEmployeeHaveRemainingPaidLeaveByCompanyId2',
             data: {
                 company_brand_id: companybrandid
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

     $("#company_brand_id_2").change(function() {
         var companybrandid2 = $("#company_brand_id_2").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetEmployeeHaveRemainingPaidLeaveByCompanyId3',
             data: {
                 company_brand_id_2: companybrandid2
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
                         //  console.log(company_id)
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
 </script>